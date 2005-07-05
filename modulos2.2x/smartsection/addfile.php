<?php

/**
* $Id: addfile.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
include_once("header.php");
include_once(XOOPS_ROOT_PATH . "/header.php");

Global $xoopsUser, $xoopsConfig, $xoopsModuleConfig, $xoopsModule;

global $smartsection_item_handler, $smartsection_file_handler;

// Find if the user is admin of the module
$isAdmin = ss_userIsAdmin();
// If the user is not admin AND we don't allow user submission, exit
if (!($isAdmin || (isset($xoopsModuleConfig['allowsubmit']) && $xoopsModuleConfig['allowsubmit'] == 1 && (is_object($xoopsUser) || (isset($xoopsModuleConfig['anonpost']) && $xoopsModuleConfig['anonpost'] == 1))))) {
	redirect_header("index.php", 1, _NOPERM);
	exit();
}

$op = '';

if (isset($_GET['op'])) $op = $_GET['op'];
if (isset($_POST['op'])) $op = $_POST['op'];

$itemid = isset($_GET['itemid']) ? intval($_GET['itemid']) : 0;
$itemid = isset($_POST['itemid']) ? intval($_POST['itemid']) : $itemid;

If ($itemid == 0) {
	redirect_header("index.php", 2, _MD_SS_NOITEMSELECTED);
	exit();
} else {
	$itemObj =& new ssItem($itemid);	
}

switch ($op) {
	case "uploadfile";
	
	global $xoopsModuleConfig;
	
	$itemid = isset($_POST['itemid']) ? intval($_POST['itemid']) : 0;
	
	$max_size = 10000000; // ou = $xoopsModuleConfig[max_imgsize]
	$max_imgwidth = 0; // ou = $xoopsModuleConfig['max_imgwidth']
	$max_imgheight = 0; // ou =$xoopsModuleConfig['max_imgheight']
	
	$allowed_mimetypes = '';
	
	include_once(XOOPS_ROOT_PATH."/class/uploader.php");
	
	// Retreive the filename to be uploaded
	$filename = $_POST["xoops_upload_file"][0] ;
	
	if( !empty( $filename ) || $filename != "" ) {

		if( $_FILES[$filename]['tmp_name'] == "" || ! is_readable( $_FILES[$filename]['tmp_name'] ) ) {
			redirect_header( 'javascript:history.go(-1)' , 2, _MD_SS_FILEUPLOAD_ERROR ) ;
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
				redirect_header("javascript:history.go(-1)", 3, _MD_SS_FILEUPLOAD_ERROR . ss_formatErrors($fileObj->getErrors()));
				exit;
			}

			redirect_header("item.php?op=mod&itemid=" . $fileObj->itemid(), 2, _MD_SS_FILEUPLOAD_SUCCESS);			
			
		} else {
			echo _MD_SS_FILEUPLOAD_ERROR . $uploader->getErrors();
		}
	}
	
	
	exit;
	break;
	
	case 'form':
	default:
	
	global $xoopsUser, $myts;
	
	$name = ($xoopsUser) ? (ucwords($xoopsUser->getVar("uname"))) : 'Anonymous';
	
	$sectionname = $myts->makeTboxData4Show($xoopsModule->getVar('name'));
	
	echo "<table width='100%' style='padding: 0; margin: 0; border-bottom: 1px solid #2F5376;'><tr>";
	echo "<td width='50%'><span style='font-size: 10px; line-height: 18px;'><a href='" . XOOPS_URL . "'>" . _MD_SS_HOME . "</a> > <a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/index.php'>" . $sectionname . "</a> > " . _MD_SS_ADD_FILE . "</span></td>";
	echo "<td width='50%' align='right'><span style='font-size: 18px; text-align: right; font-weight: bold; color: #2F5376; letter-spacing: -1.5px; margin: 0; line-height: 18px;'>" . $sectionname . "</span></td></tr></table>";
	
	echo "<span style='margin-top: 8px; color: #33538e; margin-bottom: 8px; font-size: 18px; line-height: 18px; font-weight: bold; display: block;'>" . sprintf(_MD_SS_ADD_FILE_TITLE, ucwords($xoopsModule->name())) . "</span>";
	echo "<span style='color: #456; margin-bottom: 8px; line-height: 130%; display: block;}#33538e'>" . _MD_SS_GOODDAY . "<b>$name</b>, " . sprintf(_MD_SS_ADD_FILE_INTRO, $itemObj->title()) . "</span>";
	
	include_once 'include/fileform.inc.php';
	
	include_once XOOPS_ROOT_PATH . '/footer.php';
	break;
}

?>