<?php

/**
* $Id: item.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
include_once("admin_header.php");

/*
	$member_handler = xoops_gethandler('member');
	$criteria = new CriteriaCompo();
	$criteria->setSort('uname');
	$criteria->setOrder('ASC');
	$users = $member_handler->getUserList($criteria);
	
	var_dump($users);
	exit;

*/

global $smartsection_item_handler, $smartsection_category_handler, $smartsection_file_handler;

$op = '';
if (isset($_GET['op'])) $op = $_GET['op'];
if (isset($_POST['op'])) $op = $_POST['op'];

// Where shall we start ?
$startitem = isset($_GET['startitem']) ? intval($_GET['startitem']) : 0;

function showfiles($itemObj)
{
	// UPLOAD FILES
	//include_once XOOPS_ROOT_PATH . '/modules/smartsection/include/functions.php';
	global $xoopsModule, $smartsection_file_handler;
	
	ss_collapsableBar('filetable', 'filetableicon', _AM_SS_FILES_LINKED);
	$filesObj =& $smartsection_file_handler->getAllFiles($itemObj->itemid());
	If (count($filesObj) > 0) {
		echo "<table width='100%' cellspacing=1 cellpadding=3 border=0 class = outer>";
		echo "<tr>";
		echo "<td width='150' class='bg3' align='left'><b>" . _AM_SS_FILENAME . "</b></td>";
		echo "<td class='bg3' align='left'><b>" . _AM_SS_DESCRIPTION . "</b></td>";
		echo "<td width='60' class='bg3' align='center'><b>" . _AM_SS_HITS . "</b></td>";
		echo "<td width='100' class='bg3' align='center'><b>" . _AM_SS_UPLOADED_DATE . "</b></td>";
		echo "<td width='60' class='bg3' align='center'><b>" . _AM_SS_ACTION . "</b></td>";
		echo "</tr>";
		
		for ( $i = 0; $i < count($filesObj); $i++ ) {
			$modify = "<a href='file.php?op=mod&fileid=" . $filesObj[$i]->fileid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/edit.gif' title='" . _AM_SS_EDITFILE . "' alt='" . _AM_SS_EDITFILE . "' /></a>";
			$delete = "<a href='file.php?op=del&fileid=" . $filesObj[$i]->fileid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/delete.gif' title='" . _AM_SS_DELETEFILE . "' alt='" . _AM_SS_DELETEFILE . "'/></a>";
			
			echo "<tr>";
			echo "<td class='head' align='left'>" . $filesObj[$i]->getFileLink() . "</td>";
			echo "<td class='even' align='left'>" . $filesObj[$i]->description() . "</td>";
			echo "<td class='even' align='center'>" . $filesObj[$i]->counter() . "";
			echo "<td class='even' align='center'>" . $filesObj[$i]->datesub() . "</td>";
			echo "<td class='even' align='center'> $modify $delete </td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<br >";
	} else {
		echo "<span style=\"color: #567; margin: 3px 0 12px 0; font-size: small; display: block; \">" . _AM_SS_NOFILE . "</span>";
	}
	
	echo "<form><div style=\"margin-bottom: 24px;\">";
	echo "<input type='button' name='button' onclick=\"location='file.php?op=mod&itemid=" . $itemObj->itemid(). "'\" value='" . _AM_SS_UPLOAD_FILE_NEW . "'>&nbsp;&nbsp;";
	echo "</div></form>";
	
	ss_close_collapsable('filetable', 'filetableicon');
}

function edititem($showmenu = false, $itemid = 0)
{
	
	global $smartsection_file_handler, $smartsection_item_handler, $smartsection_category_handler, $xoopsUser, $xoopsModule, $xoopsConfig, $xoopsDB;

	include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
	// If there is a parameter, and the id exists, retrieve data: we're editing a item
	if ($itemid != 0) {
		
		// Creating the ITEM object
		$itemObj = new ssItem($itemid);
		
		if ($itemObj->notLoaded()) {
			redirect_header("item.php", 1, _AM_SS_NOITEMSELECTED);
			exit();
		}
		
		switch ($itemObj->status()) {
			
			case _SS_STATUS_SUBMITTED :
			$breadcrumb_action1 = 	_AM_SS_SUBMITTED;
			$breadcrumb_action2 = 	_AM_SS_APPROVING;
			$page_title = _AM_SS_SUBMITTED_TITLE;
			$page_info = _AM_SS_SUBMITTED_INFO;
			$button_caption = _AM_SS_APPROVE;
			$new_status = _SS_STATUS_PUBLISHED;
			break;
			
			case _SS_STATUS_PUBLISHED :
			$breadcrumb_action1 = 	_AM_SS_PUBLISHED;
			$breadcrumb_action2 = 	_AM_SS_EDITING;
			$page_title = _AM_SS_PUBLISHEDEDITING;
			$page_info = _AM_SS_PUBLISHEDEDITING_INFO;
			$button_caption = _AM_SS_MODIFY;
			$new_status = _SS_STATUS_PUBLISHED;
			break;
			
			case _SS_STATUS_OFFLINE :
			$breadcrumb_action1 = 	_AM_SS_OFFLINE;
			$breadcrumb_action2 = 	_AM_SS_EDITING;
			$page_title = _AM_SS_OFFLINEEDITING;
			$page_info = _AM_SS_OFFLINEEDITING_INFO;
			$button_caption = _AM_SS_MODIFY;
			$new_status = _SS_STATUS_OFFLINE;
			break;
			
			case "default" :
			default :
			break;
		}
		
		$categoryObj =& $itemObj->category();
		
		If ($showmenu) {
			ss_adminMenu(2, $breadcrumb_action1 . " > " . $breadcrumb_action2);
		}
		
		echo "<br />\n";
		ss_collapsableBar('edititemtable', 'edititemicon', $page_title, $page_info);
	} else {
		// there's no parameter, so we're adding an item
		
		$itemObj =& $smartsection_item_handler->create();
		$categoryObj =& $smartsection_category_handler->create();
		$breadcrumb_action1 = _AM_SS_ITEMS;
		$breadcrumb_action2 = _AM_SS_CREATINGNEW;
		$button_caption = _AM_SS_CREATE;
		$new_status = _SS_STATUS_PUBLISHED;
		If ($showmenu) {
			ss_adminMenu(2, $breadcrumb_action1 . " > " . $breadcrumb_action2);
		}
		
		$sel_categoryid = isset($_GET['categoryid']) ? $_GET['categoryid'] : 0;
		$categoryObj->setVar('categoryid', $sel_categoryid);
		
		ss_collapsableBar('createitemtable', 'createitemicon', _AM_SS_ITEM_CREATING, _AM_SS_ITEM_CREATING_DSC);
	}
	
	// ITEM FORM
	$sform = new XoopsThemeForm(_AM_SS_ITEMS, "op", xoops_getenv('PHP_SELF'));
	$sform->setExtra('enctype="multipart/form-data"');
	
	// CATEGORY
	
	$mytree = new XoopsTree($xoopsDB->prefix("smartsection_categories"), "categoryid" , "parentid");
	ob_start();
	$sform->addElement(new XoopsFormHidden('categoryid', $categoryObj->categoryid()));
	$mytree->makeMySelBox("name", "weight", $categoryObj->categoryid());
	$category_label = new XoopsFormLabel(_AM_SS_CATEGORY, ob_get_contents());
	$category_label->setDescription(_AM_SS_CATEGORY_DSC);
	$sform->addElement($category_label);
	ob_end_clean();
	
	
	// TITLE
	$title_text = new XoopsFormText(_AM_SS_TITLE, 'title', 50, 255, $itemObj->title(0, 'e'));
	$sform->addElement($title_text, true);
	
	// SUMMARY
	$summary_text = ss_getEditor(_AM_SS_SUMMARY, 'summary', $itemObj->summary(0, 'e'));
	$summary_text->setDescription(_AM_SS_SUMMARY_DSC);
	$sform->addElement($summary_text, false);

	// DISPLAY_SUMMARY
	$display_summary_radio = new XoopsFormRadioYN(_AM_SS_DISPLAY_SUMMARY, 'display_summary', $itemObj->display_summary(), ' ' . _AM_SS_YES . '', ' ' . _AM_SS_NO . '');
	$sform->addElement($display_summary_radio);
	
	// BODY
	$body_text = ss_getEditor(_AM_SS_BODY, 'body', $itemObj->body(0, 'e'));
	//$body_text = new XoopsFormDhtmlTextArea(_AM_SS_BODY, 'body', $itemObj->body(0, 'e'), 20, 60);
	$body_text->setDescription(_AM_SS_BODY_DSC);
	$sform->addElement($body_text, true);
	
	// IMAGE
	$image_array = & XoopsLists :: getImgListAsArray( ss_getImageDir('item') );
	$image_select = new XoopsFormSelect( '', 'image', $itemObj->image() );
	//$image_select -> addOption ('-1', '---------------');
	$image_select -> addOptionArray( $image_array );
	$image_select -> setExtra( "onchange='showImgSelected(\"image3\", \"image\", \"" . 'uploads/smartsection/images/item/' . "\", \"\", \"" . XOOPS_URL . "\")'" );
	$image_tray = new XoopsFormElementTray( _AM_SS_IMAGE_ITEM, '&nbsp;' );
	$image_tray -> addElement( $image_select );
	$image_tray -> addElement( new XoopsFormLabel( '', "<br /><br /><img src='" . ss_getImageDir('item', false) .$itemObj->image() . "' name='image3' id='image3' alt='' />" ) );
	$image_tray->setDescription(_AM_SS_IMAGE_ITEM_DSC);
	$sform -> addElement( $image_tray );

	// IMAGE UPLOAD
	$max_size = 5000000;
	$file_box = new XoopsFormFile(_AM_SS_IMAGE_UPLOAD, "image_file", $max_size);
	$file_box->setExtra( "size ='45'") ;
	$file_box->setDescription(_AM_SS_IMAGE_UPLOAD_ITEM_DSC);
	$sform->addElement($file_box);

	
	// Uid
	/*  We need to retreive the users manually because for some reason, on the frxoops.org server,
	    the method users::getobjects encounters a memory error 
	*/
	$uid = ($itemObj->uid() == 0) ? $xoopsUser->uid() : $itemObj->uid();
	$uid_select = new XoopsFormSelect(_AM_SS_UID, 'uid', $uid, 1, false);
	$uid_select->setDescription(_AM_SS_UID_DSC);
	
	$sql = "SELECT uid, uname FROM " . $xoopsDB->prefix('users') . " ORDER BY uname ASC";
	$result = $xoopsDB->query($sql);
	$users_array = array();
	while ($myrow = $xoopsDB->fetchArray($result)) {
		$users_array[$myrow['uid']] = $myrow['uname'];
	}	
	
	$uid_select->addOptionArray($users_array);
	$sform -> addElement( $uid_select );

	// Datesub
	$datesub = ($itemObj->getVar('datesub') == 0) ? time() : $itemObj->getVar('datesub');
	$datesub_datetime = new XoopsFormDateTime(_AM_SS_DATESUB, 'datesub', $size = 15, $datesub);
	$datesub_datetime->setDescription(_AM_SS_DATESUB_DSC);
	$sform -> addElement( $datesub_datetime );
	
	// STATUS
	$options = array(_SS_STATUS_PUBLISHED=>_AM_SS_PUBLISHED, _SS_STATUS_OFFLINE=>_AM_SS_OFFLINE);
	$status_select = new XoopsFormSelect(_AM_SS_STATUS, 'status', $new_status);
	$status_select->addOptionArray($options);
	$status_select->setDescription(_AM_SS_STATUS_DSC);
	$sform -> addElement( $status_select );
	
	// WEIGHT
	$sform->addElement(new XoopsFormText(_AM_SS_WEIGHT, 'weight', 5, 5, $itemObj->weight()), true);
	
	// COMMENTS
	$addcomments_radio = new XoopsFormRadioYN(_AM_SS_ALLOWCOMMENTS, 'cancomment', $itemObj->cancomment(), ' ' . _AM_SS_YES . '', ' ' . _AM_SS_NO . '');
	$sform->addElement($addcomments_radio);
	
	// PER ITEM PERMISSIONS
	$member_handler = &xoops_gethandler('member');
	$group_list = &$member_handler->getGroupList();
	$groups_checkbox = new XoopsFormCheckBox(_AM_SS_PERMISSIONS_ITEM, 'groups[]', $itemObj->getGroups_read());
	$groups_checkbox->setDescription(_AM_SS_PERMISSIONS_ITEM_DSC);
	foreach ($group_list as $group_id => $group_name) {
		If ($group_id != XOOPS_GROUP_ADMIN) {
			$groups_checkbox->addOption($group_id, $group_name);
		}
	}
	$sform->addElement($groups_checkbox);
	
	// VARIOUS OPTIONS
	$options_tray = new XoopsFormElementTray(_AM_SS_OPTIONS, '<br />');
	
	$html_checkbox = new XoopsFormCheckBox('', 'dohtml', $itemObj->dohtml());
	$html_checkbox->addOption(1, _AM_SS_DOHTML);
	$options_tray->addElement($html_checkbox);
	
	$smiley_checkbox = new XoopsFormCheckBox('', 'dosmiley', $itemObj->dosmiley());
	$smiley_checkbox->addOption(1, _AM_SS_DOSMILEY);
	$options_tray->addElement($smiley_checkbox);
	
	$xcodes_checkbox = new XoopsFormCheckBox('', 'doxcode', $itemObj->doxcode());
	$xcodes_checkbox->addOption(1, _AM_SS_DOXCODE);
	$options_tray->addElement($xcodes_checkbox);
	
	$images_checkbox = new XoopsFormCheckBox('', 'doimage', $itemObj->doimage());
	$images_checkbox->addOption(1, _AM_SS_DOIMAGE);
	$options_tray->addElement($images_checkbox);
	
	$linebreak_checkbox = new XoopsFormCheckBox('', 'dobr', $itemObj->dobr());
	$linebreak_checkbox->addOption(1, _AM_SS_DOLINEBREAK);
	$options_tray->addElement($linebreak_checkbox);
	
	$sform->addElement($options_tray);
	
	// item ID
	$sform->addElement(new XoopsFormHidden('itemid', $itemObj->itemid()));
	
	$button_tray = new XoopsFormElementTray('', '');
	$hidden = new XoopsFormHidden('op', 'additem');
	$button_tray->addElement($hidden);
	
	if (!$itemid) {
		// there's no itemid? Then it's a new item
		// $button_tray -> addElement( new XoopsFormButton( '', 'mod', _AM_SS_CREATE, 'submit' ) );
		$butt_create = new XoopsFormButton('', '', _AM_SS_CREATE, 'submit');
		$butt_create->setExtra('onclick="this.form.elements.op.value=\'additem\'"');
		$button_tray->addElement($butt_create);
		
		$butt_clear = new XoopsFormButton('', '', _AM_SS_CLEAR, 'reset');
		$button_tray->addElement($butt_clear);
		
		$butt_cancel = new XoopsFormButton('', '', _AM_SS_CANCEL, 'button');
		$butt_cancel->setExtra('onclick="history.go(-1)"');
		$button_tray->addElement($butt_cancel);
		
		$sform->addElement($button_tray);
		
		$sform->display();
		ss_close_collapsable('createitemtable', 'createitemicon');			
	} else {
		// else, we're editing an existing item
		// $button_tray -> addElement( new XoopsFormButton( '', 'mod', _AM_SS_MODIFY, 'submit' ) );
		$butt_create = new XoopsFormButton('', '', $button_caption, 'submit');
		$butt_create->setExtra('onclick="this.form.elements.op.value=\'additem\'"');
		$button_tray->addElement($butt_create);
		
		$butt_cancel = new XoopsFormButton('', '', _AM_SS_CANCEL, 'button');
		$butt_cancel->setExtra('onclick="history.go(-1)"');
		$button_tray->addElement($butt_cancel);
		
		$sform->addElement($button_tray);
	
		$sform->display();
		ss_close_collapsable('edititemtable', 'edititemicon');		
	}
	
	unset($hidden);
	if ($itemid != 0) {
		showfiles($itemObj);
	}
}

/* -- Available operations -- */
switch ($op) {
	case "mod":
	
	Global $xoopsUser, $xoopsUser, $xoopsConfig, $xoopsDB, $xoopsModuleConfig, $xoopsModule, $modify, $myts;
	$itemid = (isset($_GET['itemid'])) ? $_GET['itemid'] : 0;
	if ($itemid == 0) {
		$totalcategories = $smartsection_category_handler->getCategoriesCount(-1);
		if ($totalcategories == 0) {
			redirect_header("category.php?op=mod", 3, _AM_SS_NEED_CATEGORY_ITEM);
			exit();
		}
	}
	
	ss_xoops_cp_header();
	include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
	edititem(true, $itemid);
	break;
	
	case "additem":
	global $xoopsUser;
	
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
	
	$itemid = (isset($_POST['itemid'])) ? intval($_POST['itemid']) : -1;
	
	// Creating the ITEM object
	If ($itemid != -1) {
		$itemObj =& new ssItem($itemid);
	} else {
		$itemObj = $smartsection_item_handler->create();
	}
	
	// Putting the values in the ITEM object
	
	if(isset($_POST['groups'])){
		$itemObj->setGroups_read($_POST['groups']);
	}
	else{
		$itemObj->setGroups_read();
	}
	
	$itemObj->setVar('categoryid', (isset($_POST['categoryid'])) ? intval($_POST['categoryid']) : 0);
	$itemObj->setVar('title', $_POST['title']);
	$itemObj->setVar('summary', $_POST['summary']);
	$itemObj->setVar('display_summary', (isset($_POST['display_summary'])) ? intval($_POST['display_summary']) : 0);
	$itemObj->setVar('body', $_POST['body']);
	
	// Uploading the image, if any
	// Retreive the filename to be uploaded
	if ( $_FILES['image_file']['name'] != "" ) {
		$filename = $_POST["xoops_upload_file"][0] ;
		if( !empty( $filename ) || $filename != "" ) {
			global $xoopsModuleConfig;
			
			$max_size = 10000000;
			$max_imgwidth = 800;
			$max_imgheight = 800;
			$allowed_mimetypes = ss_getAllowedImagesTypes();
			
			include_once(XOOPS_ROOT_PATH."/class/uploader.php");
			
			if( $_FILES[$filename]['tmp_name'] == "" || ! is_readable( $_FILES[$filename]['tmp_name'] ) ) {
				redirect_header( 'javascript:history.go(-1)' , 2, _AM_SS_FILEUPLOAD_ERROR ) ;
				exit ;
			}
			
			$uploader = new XoopsMediaUploader(ss_getImageDir('item'), $allowed_mimetypes, $max_size, $max_imgwidth, $max_imgheight);
			
			if( $uploader->fetchMedia( $filename ) && $uploader->upload() ) {
				
				$itemObj->setVar('image', $uploader->getSavedFileName());
				
			} else {
				redirect_header( 'javascript:history.go(-1)' , 2, _AM_SS_FILEUPLOAD_ERROR . $uploader->getErrors() ) ;
				exit ;
			}
		}
	} else {
		$itemObj->setVar('image', $_POST['image']);
	}
	
	//$itemObj->setVar('status', (isset($_POST['status'])) ? intval($_POST['status']) : _SS_STATUS_NOTSET);
	$old_status = $itemObj->status();
	$new_status = isset($_POST['status']) ? intval($_POST['status']) : _SS_STATUS_NOTSET;
	$itemObj->setVar('uid', (isset($_POST['uid'])) ? intval($_POST['uid']) : 0);
	$itemObj->setVar('datesub', (isset($_POST['datesub'])) ? strtotime($_POST['datesub']['date']) + $_POST['datesub']['time'] : date());
	
	$itemObj->setVar('weight', (isset($_POST['weight'])) ? intval($_POST['weight']) : $itemObj->weight());
	$itemObj->setVar('dohtml', (isset($_POST['dohtml'])) ? intval($_POST['dohtml']) : 0);
	$itemObj->setVar('dosmiley', (isset($_POST['dosmiley'])) ? intval($_POST['dosmiley']) : 0);
	$itemObj->setVar('doxcode', (isset($_POST['doxcode'])) ? intval($_POST['doxcode']) : 0);
	$itemObj->setVar('doimage', (isset($_POST['doimage'])) ? intval($_POST['doimage']) : 0);
	$itemObj->setVar('dobr', (isset($_POST['dobr'])) ? intval($_POST['dobr']) : 0);
	$itemObj->setVar('cancomment', (isset($_POST['cancomment'])) ? intval($_POST['cancomment']) : 0);
	
	switch ($new_status) {
		
		case _SS_STATUS_PUBLISHED :
		if (($old_status == _SS_STATUS_NOTSET) || ($old_status == _SS_STATUS_SUBMITTED)) {
			$redirect_msg = _AM_SS_SUBMITTED_APPROVE_SUCCESS;
			// Setting the new status
			$notifToDo = array(_SS_NOT_ITEM_PUBLISHED);
		} else {
			$redirect_msg = _AM_SS_PUBLISHED_MOD_SUCCESS;
		}
		$error_msg = _AM_SS_ITEMNOTUPDATED;
		$status = _SS_STATUS_PUBLISHED;
		break;
		
		case _SS_STATUS_OFFLINE :
		if (($old_status == _SS_STATUS_NOTSET)) {
			$redirect_msg = _AM_SS_OFFLINE_CREATED_SUCCESS;
		} else {
			$redirect_msg = _AM_SS_OFFLINE_MOD_SUCCESS;
		}
		$error_msg = _AM_SS_ITEMNOTUPDATED;
		$status = _SS_STATUS_OFFLINE;
		
		break;
	}
	$itemObj->setVar('status', $status);
	
	// Storing the item
	If ( !$itemObj->store() ) {
		redirect_header("javascript:history.go(-1)", 3, $error_msg . ss_formatErrors($itemObj->getErrors()));
		exit;
	}
	
	// Send notifications
	If (!empty($notifToDo)) {
		$itemObj->sendNotifications($notifToDo);
	}
	
	redirect_header("item.php", 2, $redirect_msg);
	
	exit();
	break;
	
	case "del":
	global $xoopsUser, $xoopsUser, $xoopsConfig, $xoopsDB, $_GET;
	
	$module_id = $xoopsModule->getVar('mid');
	$gperm_handler = &xoops_gethandler('groupperm');
	
	$itemid = (isset($_POST['itemid'])) ? intval($_POST['itemid']) : 0;
	$itemid = (isset($_GET['itemid'])) ? intval($_GET['itemid']) : $itemid;
	
	$itemObj = new ssItem($itemid);
	
	$confirm = (isset($_POST['confirm'])) ? $_POST['confirm'] : 0;
	$title = (isset($_POST['title'])) ? $_POST['title'] : '';
	
	if ($confirm) {
		If ( !$smartsection_item_handler->delete($itemObj)) {
			redirect_header("item.php", 2, _AM_SS_ITEM_DELETE_ERROR . ss_formatErrors($itemObj->getErrors()));
			exit;
		}
		
		redirect_header("item.php", 2, sprintf(_AM_SS_ITEMISDELETED, $itemObj->title()));
		exit();
	} else {
		// no confirm: show deletion condition
		$itemid = (isset($_GET['itemid'])) ? intval($_GET['itemid']) : 0;
		xoops_cp_header();
		xoops_confirm(array('op' => 'del', 'itemid' => $itemObj->itemid(), 'confirm' => 1, 'name' => $itemObj->title()), 'item.php', _AM_SS_DELETETHISITEM . " <br />'" . $itemObj->title() . "'. <br /> <br />", _AM_SS_DELETE);
		xoops_cp_footer();
	}
	
	exit();
	break;
	
	case "default":
	default:
	ss_xoops_cp_header();
	
	ss_adminMenu(2, _AM_SS_ITEMS);
	
	include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
	include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
	
	global $xoopsUser, $xoopsUser, $xoopsConfig, $xoopsDB, $xoopsModuleConfig, $xoopsModule;
	
	echo "<br />\n";
	echo "<form><div style=\"margin-bottom: 12px;\">";
	//echo "<input type='button' name='button' onclick=\"location='category.php?op=mod'\" value='" . _AM_SS_CATEGORY_CREATE . "'>&nbsp;&nbsp;";
	echo "<input type='button' name='button' onclick=\"location='item.php?op=mod'\" value='" . _AM_SS_CREATEITEM . "'>&nbsp;&nbsp;";
	echo "</div></form>";

	ss_collapsableBar('publisheditemstable', 'publisheditemsicon', _AM_SS_PUBLISHEDITEMS, _AM_SS_PUBLISHED_DSC);
	
	// Get the total number of published ITEM
	$totalitems = $smartsection_item_handler->getItemsCount(-1, array(_SS_STATUS_PUBLISHED));
	
	// creating the item objects that are published
	switch ($xoopsModuleConfig['orderby']) {
		case 'title' :
			$orderBy = 'categoryid, title';
			$ascOrDesc = 'ASC';
		break;	
		
		case 'weight' :
			$orderBy = 'categoryid, weight';
			$ascOrDesc = 'ASC';		
		break;
		
		default :
			$orderBy = 'categoryid, datesub';
			$ascOrDesc = 'DESC';			
		break;
	}

	$itemsObj = $smartsection_item_handler->getAllPublished($xoopsModuleConfig['perpage'], $startitem, -1, $orderBy, $ascOrDesc);

	//$itemsObj = $smartsection_item_handler->getAllPublished($xoopsModuleConfig['perpage'], $startitem);
	$totalItemsOnPage = count($itemsObj);
	
	echo "<table width='100%' cellspacing=1 cellpadding=3 border=0 class = outer>";
	echo "<tr>";
	echo "<td width='40' class='bg3' align='center'><b>" . _AM_SS_ITEMID . "</b></td>";
	echo "<td width='20%' class='bg3' align='left'><b>" . _AM_SS_ITEMCATEGORYNAME . "</b></td>";
	echo "<td class='bg3' align='left'><b>" . _AM_SS_TITLE . "</b></td>";
	echo "<td width='90' class='bg3' align='center'><b>" . _AM_SS_CREATED . "</b></td>";
	echo "<td width='60' class='bg3' align='center'><b>" . _AM_SS_ACTION . "</b></td>";
	echo "</tr>";
	if ($totalitems > 0) {
		for ( $i = 0; $i < $totalItemsOnPage; $i++ ) {
			$categoryObj =& $itemsObj[$i]->category();
			
			$modify = "<a href='item.php?op=mod&itemid=" . $itemsObj[$i]->itemid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/edit.gif' title='" . _AM_SS_EDITITEM . "' alt='" . _AM_SS_EDITITEM . "' /></a>";
			$delete = "<a href='item.php?op=del&itemid=" . $itemsObj[$i]->itemid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/delete.gif' title='" . _AM_SS_EDITITEM . "' alt='" . _AM_SS_DELETEITEM . "'/></a>";
			
			echo "<tr>";
			echo "<td class='head' align='center'>" . $itemsObj[$i]->itemid() . "</td>";
			echo "<td class='even' align='left'>" . $categoryObj->getCategoryLink() . "</td>";
			echo "<td class='even' align='left'><a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/item.php?itemid=" . $itemsObj[$i]->itemid() . "'>" . $itemsObj[$i]->title() . "</a></td>";
			echo "<td class='even' align='center'>" . $itemsObj[$i]->datesub() . "</td>";
			echo "<td class='even' align='center'> $modify $delete </td>";
			echo "</tr>";
		}
	} else {
		$itemid = -1;
		echo "<tr>";
		echo "<td class='head' align='center' colspan= '7'>" . _AM_SS_NOITEMS . "</td>";
		echo "</tr>";
	}
	echo "</table>\n";
	echo "<br />\n";
	
	$pagenav = new XoopsPageNav($totalitems, $xoopsModuleConfig['perpage'], $startitem, 'startitem');
	echo '<div style="text-align:right;">' . $pagenav->renderNav() . '</div>';
	
	ss_close_collapsable('publisheditemstable', 'publisheditemsicon');		
	
	$totalcategories = $smartsection_category_handler->getCategoriesCount(-1);
	/*if ($totalcategories > 0) {
		edititem();
	}*/

	break;
}
$modfooter = ss_modFooter();
echo "<div align='center'>" . $modfooter . "</div>";
xoops_cp_footer();

?>