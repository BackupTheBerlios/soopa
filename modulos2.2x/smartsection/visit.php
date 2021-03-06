<?php
/**
* $Id: visit.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartSection
* Author: marcan <marcan@notrevie.ca>
* Licence: GNU
*/

include_once "header.php";
$myts =& MyTextSanitizer::getInstance();

$fileid = isset($_GET['fileid']) ? intval($_GET['fileid']) : 0;

// Creating the item object for the selected item
$fileObj = new ssFile($fileid);
$fileObj->updateCounter();

if (!preg_match("/^ed2k*:\/\//i", $fileObj->getFileUrl())) {
	Header("Location: " . $fileObj->getFileUrl());
}

echo "<html><head><meta http-equiv=\"Refresh\" content=\"0; URL=".$myts->oopsHtmlSpecialChars($fileObj->getFileUrl())."\"></meta></head><body></body></html>";
exit();
?>
