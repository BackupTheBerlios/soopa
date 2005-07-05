<?php

/**
* $Id: preferences.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartPartner
* Author: Xavier JIMENEZ
* Licence: GNU
*/

define("SMARTSECTION_NOCPFUNC",1);  // cp_functions will be loaded by /system/admin.php, so prevent initial load
include_once("admin_header.php");

include_once XOOPS_ROOT_PATH."/kernel/module.php";
$xoopsModule = XoopsModule::getByDirname("smartsection");

if (file_exists(SMARTSECTION_ROOT_PATH . 'language/' . $xoopsConfig['language'] . '/modinfo.php')) {
	include_once SMARTSECTION_ROOT_PATH . 'language/' . $xoopsConfig['language'] . '/modinfo.php';
} else {
	include_once SMARTSECTION_ROOT_PATH . 'language/english/modinfo.php';
}

if (file_exists(SMARTSECTION_ROOT_PATH . 'language/' . $xoopsConfig['language'] . '/admin.php')) {
	include_once SMARTSECTION_ROOT_PATH . 'language/' . $xoopsConfig['language'] . '/admin.php';
} else {
	include_once SMARTSECTION_ROOT_PATH . 'language/english/admin.php';
}


ob_start();
ss_adminmenu(0, _AM_SS_OPTS);
$btnsbar = ob_get_contents();
ob_end_clean();

//ss_adminmenu(0, 'preferences');

function addAdminMenu($buf) {
	global $btnsbar;
	
	$pattern = array(
	"#admin.php?#",
	"#(<div class='content'>)#",
	);
	$replace = array(
	"preferences.php?",
	" $1 <br />".$btnsbar . "<div style='clear: both' class='content'>",
	);
	$html = preg_replace($pattern,$replace,$buf);
	return $html;
	
	//		ereg("(.*)(<div class='content'>.*)",$buf,$regs);
	//		return $regs[1].$btnsbar.$regs[2];
}


/*
* Display and capture preferences screen
*/

if (!isset($HTTP_POST_VARS['fct'])) $HTTP_GET_VARS['fct'] = $_GET['fct'] = "preferences";
if (!isset($HTTP_POST_VARS['op'])) $HTTP_GET_VARS['op' ] = $_GET['op' ] = "showmod";
if (!isset($HTTP_POST_VARS['mod'])) $HTTP_GET_VARS['mod'] = $_GET['mod'] = $xoopsModule->getVar('mid');
chdir(XOOPS_ROOT_PATH."/modules/system/");
ob_start("addAdminMenu");
include XOOPS_ROOT_PATH."/modules/system/admin.php";
ob_end_flush();
?>