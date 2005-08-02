<?php

/**
* $Id: print.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once 'header.php';
require_once XOOPS_ROOT_PATH.'/class/template.php';

Global $smartsection_item_handler;

$itemid = isset($_GET['itemid']) ? intval($_GET['itemid']) : 0;

If ($itemid == 0) {
	redirect_header("javascript:history.go(-1)", 1, _MD_SS_NOITEMSELECTED);
	exit();
}

// Creating the ITEM object for the selected ITEM
$itemObj = new ssItem($itemid);

// If the selected ITEM was not found, exit
If ($itemObj->notLoaded()) {
	redirect_header("javascript:history.go(-1)", 1, _MD_SS_NOITEMSELECTED);
	exit();
}

// Creating the category object that holds the selected ITEM
$categoryObj =& $itemObj->category();

// Check user permissions to access that category of the selected ITEM
if (!(ss_itemAccessGranted($itemObj->getVar('itemid'), $itemObj->getVar('categoryid')))) {
	redirect_header("javascript:history.go(-1)", 1, _NOPERM);
	exit;
}
$xoopsTpl = new XoopsTpl();
global $xoopsConfig, $xoopsDB, $xoopsModule, $myts;

$item=  $itemObj->toArray(null, $categoryObj, false);
$printtitle = $xoopsConfig['sitename']." - ".smartsection_metagen_html2text($categoryObj->getCategoryPath())." > ".$myts->displayTarea($item['title']);
$printheader = $myts->displayTarea(ss_getConfig('headerprint'));
$who_where = sprintf(_MD_SS_WHO_WHEN, $itemObj->posterName(), $itemObj->datesub());
$item['categoryname'] = $myts->displayTarea($categoryObj->name());

$xoopsTpl->assign('printtitle', $printtitle);
$xoopsTpl->assign('printlogourl', ss_getConfig('printlogourl'));
$xoopsTpl->assign('printheader', $printheader);
$xoopsTpl->assign('lang_category', _MD_SS_CATEGORY);
$xoopsTpl->assign('lang_author_date', $who_where);
$xoopsTpl->assign('item', $item);
if(ss_getConfig('footerprint')== 'item footer' || ss_getConfig('footerprint')== 'both'){
	$xoopsTpl->assign('itemfooter', $myts->displayTarea( ss_getConfig('itemfooter')));
}
if(ss_getConfig('footerprint')== 'index footer' || ss_getConfig('footerprint')== 'both'){
	$xoopsTpl->assign('indexfooter', $myts->displayTarea( ss_getConfig('indexfooter')));
}

$xoopsTpl->assign('display_whowhen_link', $xoopsModuleConfig['display_whowhen_link']);

$xoopsTpl->display('db:smartsection_print.html');

?>