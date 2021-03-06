<?php
// $Id: header.php,v 1.4 2005/07/31 18:23:50 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

include '../../mainfile.php';
include XOOPS_ROOT_PATH.'/modules/newbb/include/functions.php';
include XOOPS_ROOT_PATH.'/modules/newbb/include/vars.php';
$myts =& MyTextSanitizer::getInstance();

// MENU handler
$valid_menumodes = array(
	0 => _MD_MENU_SELECT,
	1 => _MD_MENU_CLICK,
	2 => _MD_MENU_HOVER
	);
// menumode cookie
if(isset($_REQUEST['menumode'])){
	$menumode = intval($_REQUEST['menumode']);
	newbb_setcookie("M", $menumode, $forumCookie['expire']);
}else{
	$cookie_M = intval(newbb_getcookie("M"));
	$menumode = ($cookie_M === null || !isset($valid_menumodes[$cookie_M]))?$xoopsModuleConfig['menu_mode']:$cookie_M;
}

$menumode_other = array();
$menu_url = htmlSpecialChars($_SERVER[ 'REQUEST_URI' ]);
$menu_url .= (false === strpos($menu_url, "?"))?"?menumode=":"&amp;menumode=";
foreach($valid_menumodes as $key=>$val){
	if($key != $menumode) $menumode_other[]=array("title"=>$val, "link"=>$menu_url.$key);
}
if(!empty($xoopsModuleConfig['pngforie_enabled'])){
	$xTheme->addCSS(null,null,'img {behavior:url("include/pngbehavior.htc");}');
}
$xTheme->addJS(XOOPS_URL."/modules/".$xoopsModule->getVar("dirname")."/include/js/newbb_toggle.js");
$xTheme->addJS(null, null, 'var toggle_cookie="'.$forumCookie['prefix'].'G'.'";');
if($menumode==2){
	$xTheme->addCSS(XOOPS_URL."/modules/".$xoopsModule->getVar("dirname")."/templates/newbb_menu_hover.css");
	$xTheme->addCSS(null,null,'body {behavior:url("include/newbb.htc");}');
}
if($menumode==1){
	$xTheme->addCSS(XOOPS_URL."/modules/".$xoopsModule->getVar("dirname")."/templates/newbb_menu_click.css");
	$xTheme->addJS(XOOPS_URL."/modules/".$xoopsModule->getVar("dirname")."/include/js/newbb_menu_click.js");
}

$xoops_module_header = '<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL."/modules/".$xoopsModule->getVar("dirname").'/templates/newbb.css" />';

newbb_welcome();
?>