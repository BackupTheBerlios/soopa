<?php

/**
* $Id: file.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("admin_header.php");

global $smartsection_file_handler;

$op = '';
if (isset($_GET['op'])) $op = $_GET['op'];
if (isset($_POST['op'])) $op = $_POST['op'];

function editfile($showmenu = false, $fileid = 0, $itemid = 0)
{
	global $smartsection_file_handler, $xoopsModule;
	
	include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
	// If there is a parameter, and the id exists, retrieve data: we're editing a file
	if ($fileid != 0) {
		
		// Creating the File object
		$fileObj = new ssfile($fileid);
		
		if ($fileObj->notLoaded()) {
			redirect_header("javascript:history.go(-1)", 1, _AM_SS_NOFILESELECTED);
			exit();
		}
		
		If ($showmenu) {
			ss_adminMenu(2, _AM_SS_FILE . " > " . _AM_SS_EDITING);
		}
		
		echo "<br />\n";
		echo "<span style='color: #2F5376; font-weight: bold; font-size: 16px; margin: 6px 06 0 0; '>" . _AM_SS_FILE_EDITING . "</span>";
		echo "<span style=\"color: #567; margin: 3px 0 12px 0; font-size: small; display: block; \">" . _AM_SS_FILE_EDITING_DSC . "</span>";
		ss_collapsableBar('bottomtable', 'bottomtableicon', _AM_SS_FILE_INFORMATIONS);
	} else {
		// there's no parameter, so we're adding an item
		$fileObj =& $smartsection_file_handler->create();
		$fileObj->setVar('itemid', $itemid);
		If ($showmenu) {
			ss_adminMenu(2, _AM_SS_FILE . " > " . _AM_SS_FILE_ADD);
		}
		echo "<span style='color: #2F5376; font-weight: bold; font-size: 16px; margin: 6px 06 0 0; '>" . _AM_SS_FILE_ADDING . "</span>";
		echo "<span style=\"color: #567; margin: 3px 0 12px 0; font-size: small; display: block; \">" . _AM_SS_FILE_ADDING_DSC . "</span>";
		ss_collapsableBar('bottomtable', 'bottomtableicon', _AM_SS_FILE_INFORMATIONS);
	}
	
	// FILES UPLOAD FORM
	$files_form = new XoopsThemeForm(_AM_SS_UPLOAD_FILE, "files_form", xoops_getenv('PHP_SELF'));
	$files_form->setExtra( "enctype='multipart/form-data'" ) ;

	// NAME
	$name_text = new XoopsFormText(_AM_SS_FILE_NAME, 'name', 50, 255, $fileObj->name());
	$name_text->setDescription(_AM_SS_FILE_NAME_DSC);
	$files_form->addElement($name_text, true);
	
	// DESCRIPTION
	$description_text = new XoopsFormTextArea(_AM_SS_FILE_DESCRIPTION, 'description', $fileObj->description());
	$description_text->setDescription(_AM_SS_FILE_DESCRIPTION_DSC);
	$files_form->addElement($description_text, 7, 60);	
	
	// FILE TO UPLOAD
	If ($fileid == 0) {
		$file_box = new XoopsFormFile(_AM_SS_FILE_TO_UPLOAD, "my_file", 0);
		$file_box->setExtra( "size ='50'") ;
		$files_form->addElement($file_box);
	}
	
	$files_button_tray = new XoopsFormElementTray('', '');
	$files_hidden = new XoopsFormHidden('op', 'uploadfile');
	$files_button_tray->addElement($files_hidden);
	
	If ($fileid == 0) {
		$files_butt_create = new XoopsFormButton('', '', _AM_SS_UPLOAD, 'submit');
		$files_butt_create->setExtra('onclick="this.form.elements.op.value=\'uploadfile\'"');
		$files_button_tray->addElement($files_butt_create);
	} else {
		$files_butt_create = new XoopsFormButton('', '', _AM_SS_MODIFY, 'submit');
		$files_butt_create->setExtra('onclick="this.form.elements.op.value=\'modify\'"');
		$files_button_tray->addElement($files_butt_create);
	}
	
	$files_butt_clear = new XoopsFormButton('', '', _AM_SS_CLEAR, 'reset');
	$files_button_tray->addElement($files_butt_clear);
	
	$butt_cancel = new XoopsFormButton('', '', _AM_SS_CANCEL, 'button');
	$butt_cancel->setExtra('onclick="history.go(-1)"');
	$files_button_tray->addElement($butt_cancel);
	
	$files_form->addElement($files_button_tray);
	
	// fileid
	$files_form->addElement(new XoopsFormHidden('fileid', $fileid));
	
	// itemid
	$files_form->addElement(new XoopsFormHidden('itemid', $itemid));
	
	$files_form->display();
	
	echo "</div>";

}

/* -- Available operations -- */
switch ($op) {
	case "uploadfile";
	
	global $xoopsModuleConfig;
	
	$itemid = isset($_POST['itemid']) ? intval($_POST['itemid']) : 0;
	
	$max_size = 10000000; // ou = $xoopsModuleConfig[max_imgsize]
	$max_imgwidth = 0; // ou = $xoopsModuleConfig['max_imgwidth']
	$max_imgheight = 0; // ou =$xoopsModuleConfig['max_imgheight']
	//$allowed_mimetypes = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png');
	$allowed_mimetypes = '';
	
	include_once(XOOPS_ROOT_PATH."/class/uploader.php");
	
	// Retreive the filename to be uploaded
	$filename = $_POST["xoops_upload_file"][0] ;
	
	if( !empty( $filename ) || $filename != "" ) {

		if( $_FILES[$filename]['tmp_name'] == "" || ! is_readable( $_FILES[$filename]['tmp_name'] ) ) {
			redirect_header( 'javascript:history.go(-1)' , 2, _AM_SS_FILEUPLOAD_ERROR ) ;
			exit ;
		}
		
		$uploader = new XoopsMediaUploader(ss_getUploadDir(), $allowed_mimetypes, $max_size, null, null);
	
		$ext = preg_replace( "/^.+\.([^.]+)$/sU" , "\\1" , $_FILES["my_file"]['name']) ;
		$new_name = time() . "." . $ext;
		$uploader->setTargetFileName($new_name);
		
		if( $uploader->fetchMedia( $filename ) && $uploader->upload() ) {
			
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

			$fileObj = $smartsection_file_handler->create();
			$fileObj->setVar('name', $_POST['name']);
			$fileObj->setVar('description', $_POST['description']);
			$fileObj->setVar('filename', $uploader->getSavedFileName());
			$fileObj->setVar('mimetype', $uploader->getMediaType());
			$fileObj->setVar('uid', $uid);
			$fileObj->setVar('itemid', $itemid);
						
			// Storing the file
			If ( !$fileObj->store() ) {
				redirect_header("javascript:history.go(-1)", 3, _AM_SS_FILEUPLOAD_ERROR . ss_formatErrors($fileObj->getErrors()));
				exit;
			}

			redirect_header("item.php?op=mod&itemid=" . $fileObj->itemid(), 2, _AM_SS_FILEUPLOAD_SUCCESS);			
			
		} else {
			echo _AM_SS_FILEUPLOAD_ERROR . $uploader->getErrors();
		}
	}
	
	
	exit;
	break;
	
	case "mod":
	
	Global $smartsection_file_handler;
	$fileid = (isset($_GET['fileid'])) ? $_GET['fileid'] : 0;
	$itemid = (isset($_GET['itemid'])) ? $_GET['itemid'] : 0;
	if (($fileid == 0) && ($itemid == 0)) {
		redirect_header("javascript:history.go(-1)", 3, _AM_SS_NOITEMSELECTED);
		exit();
	}
	
	xoops_cp_header();
	include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
	
	editfile(true, $fileid, $itemid);
	break;
	
	case "modify":
	global $xoopsUser;
	
	$fileid = (isset($_POST['fileid'])) ? intval($_POST['fileid']) : 0;
	
	// Creating the file object
	If ($fileid != 0) {
		$fileObj =& new ssFile($fileid);
	} else {
		$fileObj = $smartsection_file_handler->create();
	}
	
	// Putting the values in the file object
	$fileObj->setVar('name', $_POST['name']);
	$fileObj->setVar('description', $_POST['description']);
	
	// Storing the file
	If ( !$fileObj->store() ) {
		redirect_header("item.php?op=mod&itemid=" . $fileObj->itemid(), 3, _AM_SS_FILE_EDITING_ERROR . ss_formatErrors($fileObj->getErrors()));
		exit;
	}
	
	redirect_header("item.php?op=mod&itemid=" . $fileObj->itemid(), 2, _AM_SS_FILE_EDITING_SUCCESS);
	
	exit();
	break;
	
	case "del":
	global $xoopsUser, $xoopsUser, $xoopsConfig, $xoopsDB, $_GET;
	
	$module_id = $xoopsModule->getVar('mid');
	$gperm_handler = &xoops_gethandler('groupperm');
	
	$fileid = (isset($_POST['fileid'])) ? intval($_POST['fileid']) : 0;
	$fileid = (isset($_GET['fileid'])) ? intval($_GET['fileid']) : $fileid;
	
	$fileObj = new ssFile($fileid);
	
	$confirm = (isset($_POST['confirm'])) ? $_POST['confirm'] : 0;
	$title = (isset($_POST['title'])) ? $_POST['title'] : '';
	
	if ($confirm) {
		If ( !$smartsection_file_handler->delete($fileObj)) {
			redirect_header("item.php", 2, _AM_SS_FILE_DELETE_ERROR);
			exit;
		}
		
		redirect_header("item.php", 2, sprintf(_AM_SS_FILEISDELETED, $fileObj->name()));
		exit();
	} else {
		// no confirm: show deletion condition
		$fileid = (isset($_GET['fileid'])) ? intval($_GET['fileid']) : 0;
		
		xoops_cp_header();
		xoops_confirm(array('op' => 'del', 'fileid' => $fileObj->fileid(), 'confirm' => 1, 'name' => $fileObj->name()), 'file.php', _AM_SS_DELETETHISFILE . " <br />" . $fileObj->name() . " <br /> <br />", _AM_SS_DELETE);
		xoops_cp_footer();
	}
	
	exit();
	break;
	
	case "default":
	default:
	xoops_cp_header();
	
	ss_adminMenu(2, _AM_SS_ITEMS);
	exit;
	include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
	include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
	
	global $xoopsUser, $xoopsUser, $xoopsConfig, $xoopsDB, $xoopsModuleConfig, $xoopsModule;
	
	echo "<br />\n";
	
	ss_collapsableBar('toptable', 'toptableicon', _AM_SS_PUBLISHEDITEMS, _AM_SS_PUBLISHED_DSC);
	
	// Get the total number of published ITEM
	$totalitems = $smartsection_item_handler->getItemsCount(-1, array(_SS_STATUS_PUBLISHED));
	
	// creating the item objects that are published
	$itemsObj = $smartsection_item_handler->getAllPublished($xoopsModuleConfig['perpage'], $startitem);
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
			echo "<td class='even' align='left'>" . $categoryObj->name() . "</td>";
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
	echo "</div>";
	
	$totalcategories = $smartsection_category_handler->getCategoriesCount(-1);
	if ($totalcategories > 0) {
		edititem();
	}
	
	break;
}
$modfooter = ss_modFooter();
echo "<div align='center'>" . $modfooter . "</div>";
xoops_cp_footer();

?>