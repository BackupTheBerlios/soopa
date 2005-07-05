<?php

/**
* $Id: common.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

if( !defined("SMARTSECTION_DIRNAME") ){
	define("SMARTSECTION_DIRNAME", 'smartsection');
}

if( !defined("SMARTSECTION_URL") ){
	define("SMARTSECTION_URL", XOOPS_URL.'/modules/'.SMARTSECTION_DIRNAME.'/');
}
if( !defined("SMARTSECTION_ROOT_PATH") ){
	define("SMARTSECTION_ROOT_PATH", XOOPS_ROOT_PATH.'/modules/'.SMARTSECTION_DIRNAME.'/');
}

if( !defined("SMARTSECTION_IMAGES_URL") ){
	define("SMARTSECTION_IMAGES_URL", SMARTSECTION_URL.'/images/');
}

include_once(SMARTSECTION_ROOT_PATH . "include/functions.php");
include_once(SMARTSECTION_ROOT_PATH . "class/keyhighlighter.class.php");

// Creating the SmartModule object
$smartModule =& ss_getModuleInfo();
$myts = MyTextSanitizer::getInstance();
$smartsection_moduleName = $myts->displayTarea($smartModule->getVar('name'));

// Creating the SmartModule config Object
$smartConfig =& ss_getModuleConfig();

include_once(SMARTSECTION_ROOT_PATH . "class/permission.php");
include_once(SMARTSECTION_ROOT_PATH . "class/category.php");
include_once(SMARTSECTION_ROOT_PATH . "class/item.php");
include_once(SMARTSECTION_ROOT_PATH . "class/file.php");

// Creating the item handler object
$smartsection_item_handler =& xoops_getmodulehandler('item', SMARTSECTION_DIRNAME);

// Creating the category handler object
$smartsection_category_handler =& xoops_getmodulehandler('category', SMARTSECTION_DIRNAME);

// Creating the permission handler object
$smartsection_permission_handler =& xoops_getmodulehandler('permission', SMARTSECTION_DIRNAME);

// Creating the file handler object
$smartsection_file_handler =& xoops_getmodulehandler('file', SMARTSECTION_DIRNAME);

?>