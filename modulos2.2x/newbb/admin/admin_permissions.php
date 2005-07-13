<?php
// $Id: admin_permissions.php,v 1.1 2005/07/13 03:55:47 mauriciodelima Exp $
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
// Author: XOOPS Foundation                                                  //
// URL: http://www.xoops.org/                                                //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //
include 'admin_header.php';
xoops_cp_header();

$xTheme->loadModuleAdminMenu(3);

$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : "view";

include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

$perms = array_map("trim",explode(',', FORUM_PERM_ITEMS));
$op_options = array("category"=>_AM_NEWBB_CAT_ACCESS);
$fm_options = array("category"=>array("title"=>_AM_NEWBB_CAT_ACCESS, "item"=>"category_access", "desc"=>"", "anonymous"=>true));
foreach($perms as $perm){
	$op_options[$perm] = CONSTANT("_AM_NEWBB_CAN_".strtoupper($perm));
	$fm_options[$perm] = array("title"=>CONSTANT("_AM_NEWBB_CAN_".strtoupper($perm)), "item"=>"forum_".$perm, "desc"=>"", "anonymous"=>true);
}

$opform = new XoopsSimpleForm('', 'opform', 'admin_permissions.php', "get");
$op_select = new XoopsFormSelect("", 'op', $op);
$op_select->setExtra('onchange="document.forms.opform.submit()"');
$op_select->addOptionArray($op_options);
$opform->addElement($op_select);
$opform->display();

$module_id = $xoopsModule->getVar('mid');
$perm_desc = "";
include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';
$form = new XoopsGroupPermForm($fm_options[$op]["title"], $module_id, $fm_options[$op]["item"], $fm_options[$op]["desc"], 'admin/admin_permissions.php', $fm_options[$op]["anonymous"]);

$category_handler = &xoops_getmodulehandler('category', 'newbb');
$forums = $category_handler->getForums(0, '', false);
if($op=="category"){
	$categories = $category_handler->getAllCats("", true);
	foreach (array_keys($categories) as $key) {
		$form->addItem($key, $categories[$key]->getVar('cat_title'));
	}
	unset($categories);
}else{
	foreach (array_keys($forums) as $c) {
		foreach(array_keys($forums[$c]) as $f){
	        $form->addItem($f, $forums[$c][$f]["title"]);
	        if(!isset($forums[$c][$f]["sub"])) continue;
			foreach(array_keys($forums[$c][$f]["sub"]) as $s){
	        	$form->addItem($s, "&rarr;".$forums[$c][$f]["sub"][$s]["title"]);
			}
		}
	}
}
$form->display();
xoops_cp_footer();
?>