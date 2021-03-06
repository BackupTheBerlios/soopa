<?php

/**
* $Id: fileform.inc.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once XOOPS_ROOT_PATH . "/modules/smartsection/include/functions.php";
include_once XOOPS_ROOT_PATH . "/class/xoopstree.php";
include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";

global $smartsection_file_handler;

$fileid = isset($_GET['fileid']) ? intval($_GET['fileid']) : 0;

If ($fileid != 0) {
	$fileObj = new ssFile($fileid);	
} else {
	$fileObj =& $smartsection_file_handler->create();	
}
	
// FILES UPLOAD FORM
$files_form = new XoopsThemeForm(_MD_SS_UPLOAD_FILE, "files_form", xoops_getenv('PHP_SELF'));
$files_form->setExtra( "enctype='multipart/form-data'" ) ;

// NAME

$name_text = new XoopsFormText(_MD_SS_FILENAME, 'name', 50, 255, $fileObj->name());
$name_text->setDescription(_MD_SS_FILE_NAME_DSC);
$files_form->addElement($name_text, true);

// DESCRIPTION
$description_text = new XoopsFormTextArea(_MD_SS_FILE_DESCRIPTION, 'description', $fileObj->description());
$description_text->setDescription(_MD_SS_FILE_DESCRIPTION_DSC);
$files_form->addElement($description_text, 7, 60);

// FILE TO UPLOAD
If ($fileid == 0) {
	$file_box = new XoopsFormFile(_MD_SS_FILE_TO_UPLOAD, "my_file", $max_imgsize);
	$file_box->setExtra( "size ='50'") ;
	$files_form->addElement($file_box);
}

$files_button_tray = new XoopsFormElementTray('', '');
$files_hidden = new XoopsFormHidden('op', 'uploadfile');
$files_button_tray->addElement($files_hidden);

If ($fileid == 0) {
	$files_butt_create = new XoopsFormButton('', '', _MD_SS_UPLOAD, 'submit');
	$files_butt_create->setExtra('onclick="this.form.elements.op.value=\'uploadfile\'"');
	$files_button_tray->addElement($files_butt_create);
} else {
	$files_butt_create = new XoopsFormButton('', '', _MD_SS_MODIFY, 'submit');
	$files_butt_create->setExtra('onclick="this.form.elements.op.value=\'modify\'"');
	$files_button_tray->addElement($files_butt_create);
}

$files_butt_clear = new XoopsFormButton('', '', _MD_SS_CLEAR, 'reset');
$files_button_tray->addElement($files_butt_clear);

$butt_cancel = new XoopsFormButton('', '', _MD_SS_CANCEL, 'button');
$butt_cancel->setExtra('onclick="history.go(-1)"');
$files_button_tray->addElement($butt_cancel);

$files_form->addElement($files_button_tray);

// fileid
$files_form->addElement(new XoopsFormHidden('fileid', $fileid));

// itemid
$files_form->addElement(new XoopsFormHidden('itemid', $itemid));

$files_form->display();

?>