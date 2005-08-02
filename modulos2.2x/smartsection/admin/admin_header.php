<?php

/**
* $Id: admin_header.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once "../../../mainfile.php";
if (!defined("SMARTSECTION_NOCPFUNC")) {
	include_once '../../../include/cp_header.php';
}
include_once XOOPS_ROOT_PATH . "/class/xoopsmodule.php";
include_once XOOPS_ROOT_PATH . "/class/xoopstree.php";
include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
include_once XOOPS_ROOT_PATH . "/class/uploader.php";

include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/common.php';
//include_once XOOPS_ROOT_PATH.'/modules/smartsection/class/category.php';
//include_once XOOPS_ROOT_PATH.'/modules/smartsection/class/item.php';
//include_once XOOPS_ROOT_PATH.'/modules/smartsection/class/file.php';

$myts = &MyTextSanitizer::getInstance();

?>