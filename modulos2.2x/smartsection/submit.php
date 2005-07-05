<?php

/**
* $Id: submit.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("header.php");

Global $smartsection_category_handler, $smartsection_item_handler, $xoopsUser, $xoopsConfig, $xoopsModuleConfig, $xoopsModule;

// Get the total number of categories
$totalCategories = count($smartsection_category_handler->getCategories());

if ($totalCategories == 0) {
	redirect_header("index.php", 1, _AM_SS_NOCOLEXISTS);
	exit();
}

// Find if the user is admin of the module
$isAdmin = ss_userIsAdmin();
// If the user is not admin AND we don't allow user submission, exit
if (!($isAdmin || (isset($xoopsModuleConfig['allowsubmit']) && $xoopsModuleConfig['allowsubmit'] == 1 && (is_object($xoopsUser) || (isset($xoopsModuleConfig['anonpost']) && $xoopsModuleConfig['anonpost'] == 1))))) {
	redirect_header("index.php", 1, _NOPERM);
	exit();
}

$op = '';

if (isset($_POST['post'])) {
	$op = 'post';
} elseif (isset($_POST['preview'])) {
	$op = 'preview';	
} else {
	$op = 'form';	
}

switch ($op) {
	case 'preview':
	
	Global $xoopsUser, $xoopsConfig, $xoopsModule, $xoopsModuleConfig, $xoopsDB;
	
    $newItemObj = $smartsection_item_handler->create();
    
	if (!$xoopsUser) {
		if ($xoopsModuleConfig['anonpost'] == 1) {
			$uid = 0;
		} else {
			redirect_header("index.php", 3, _NOPERM);
			exit();
		}
	} else {
	  	$uid = $xoopsUser->uid();	
	}
	
	// Putting the values about the ITEM in the ITEM object
	$newItemObj->setVar('categoryid', $_POST['categoryid']);
    $newItemObj->setVar('uid', $uid);
	$newItemObj->setVar('title', $_POST['title']);	
	$newItemObj->setVar('summary', $_POST['summary']);
	$newItemObj->setVar('body', $_POST['body']);
	$newItemObj->setVar('notifypub', $_POST['notifypub']);
	
	$notifypub = isset($_POST['notifypub']) ? $_POST['notifypub'] : '';
	global $xoopsUser, $myts;
	
	$xoopsOption['template_main'] = 'smartsection_submit.html';
	include_once(XOOPS_ROOT_PATH . "/header.php");
	include_once("footer.php");
	
	$name = ($xoopsUser) ? (ucwords($xoopsUser->getVar("uname"))) : 'Anonymous';
	
	$categoryObj = $smartsection_category_handler->get($_POST['categoryid']);
	
	$item = $newItemObj->toArray(null, $categoryObj, false);
	
	$item['categoryPath'] = $categoryObj->getCategoryPath(true);
	$item['who_when'] = $newItemObj->getWhoAndWhen();
	
	
	$item['comments'] = -1;
	$xoopsTpl->assign('item', $item);
	$xoopsTpl->assign('op', 'preview');
	$xoopsTpl->assign('module_home', ss_module_home());
	$xoopsTpl->assign('categoryPath', _MD_SS_SUB_SNEWNAME);
	
	$xoopsTpl->assign('lang_intro_title', sprintf(_MD_SS_SUB_SNEWNAME, ucwords($xoopsModule->name())));
	$xoopsTpl->assign('lang_intro_text', ss_getConfig('submitintromsg'));
	
	include_once SMARTSECTION_ROOT_PATH . 'include/submit.inc.php';
	
	include_once XOOPS_ROOT_PATH . '/footer.php';

	exit();
	break;

	case 'post':
	
	Global $xoopsUser, $xoopsConfig, $xoopsModule, $xoopsModuleConfig, $xoopsDB;
	
    $newItemObj = $smartsection_item_handler->create();
    
	if (!$xoopsUser) {
		if ($xoopsModuleConfig['anonpost'] == 1) {
			$uid = 0;
		} else {
			redirect_header("index.php", 3, _NOPERM);
			exit();
		}
	} else {
	  	$uid = $xoopsUser->uid();	
	}
	
	// Putting the values about the ITEM in the ITEM object
	$newItemObj->setVar('categoryid', $_POST['categoryid']);
    $newItemObj->setVar('uid', $uid);
	$newItemObj->setVar('title', $_POST['title']);	
	$newItemObj->setVar('summary', isset($_POST['summary']) ? $_POST['summary'] : '');		
	$newItemObj->setVar('body', $_POST['body']);			
	$notifypub = isset($_POST['notifypub']) ? $_POST['notifypub'] : '';
	$newItemObj->setVar('notifypub', $notifypub);
	$newItemObj->setVar('datesub', time());	
	
	// Setting the status of the item
	If ( $xoopsModuleConfig['autoapprove_submitted'] ==  1) {
		$newItemObj->setVar('status', _SS_STATUS_PUBLISHED);
	} else {
		$newItemObj->setVar('status', _SS_STATUS_SUBMITTED);
	}
	
	// Storing the ITEM object in the database
	If ( !$newItemObj->store() ) {
		redirect_header("javascript:history.go(-1)", 2, _MD_SS_SUBMIT_ERROR);
		exit();
	}
	
	// Get the cateopry object related to that item
	$categoryObj =& $newItemObj->category();
	
	// If autoapprove_submitted
	If ( $xoopsModuleConfig['autoapprove_submitted'] ==  1) {
		// We do not not subscribe user to notification on publish since we publish it right away
		
		// Send notifications
		$newItemObj->sendNotifications(array(_SS_NOT_ITEM_PUBLISHED));
		
		$redirect_msg = _MD_SS_ITEM_RECEIVED_AND_PUBLISHED;
	} else {
		// Subscribe the user to On Published notification, if requested
		if ($notifypub) {
			include_once XOOPS_ROOT_PATH . '/include/notification_constants.php';
			$notification_handler = &xoops_gethandler('notification');
			$notification_handler->subscribe('item', $newItemObj->itemid(), 'approved', XOOPS_NOTIFICATION_MODE_SENDONCETHENDELETE);
		}
		// Send notifications
		$newItemObj->sendNotifications(array(_SS_NOT_ITEM_SUBMITTED));
		
		$redirect_msg = _MD_SS_ITEM_RECEIVED_NEED_APPROVAL;
	}
	
	redirect_header("index.php", 2, $redirect_msg);

	
	exit();
	break;
	
	case 'form':
	default:

	global $xoopsUser, $myts;
	
	$newItemObj = $smartsection_item_handler->create();
	$categoryObj = $smartsection_category_handler->create();
	
	$xoopsOption['template_main'] = 'smartsection_submit.html';
	include_once(XOOPS_ROOT_PATH . "/header.php");
	include_once("footer.php");
	
	$name = ($xoopsUser) ? (ucwords($xoopsUser->getVar("uname"))) : 'Anonymous';
	$notifypub = 1;
	$xoopsTpl->assign('module_home', ss_module_home());
	$xoopsTpl->assign('categoryPath', _MD_SS_SUB_SNEWNAME);
	
	$xoopsTpl->assign('lang_intro_title', sprintf(_MD_SS_SUB_SNEWNAME, ucwords($xoopsModule->name())));
	$xoopsTpl->assign('lang_intro_text', ss_getConfig('submitintromsg'));
	
	include_once SMARTSECTION_ROOT_PATH . 'include/submit.inc.php';
	
	include_once XOOPS_ROOT_PATH . '/footer.php';
	break;	
}

?>