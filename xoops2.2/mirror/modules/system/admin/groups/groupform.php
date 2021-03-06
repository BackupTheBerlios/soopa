<?php
// $Id: groupform.php,v 1.3 2005/08/08 23:43:18 mauriciodelima Exp $
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
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

$name_text = new XoopsFormText(_AM_NAME, "name", 30, 50, $name_value);
$desc_text = new XoopsFormTextArea(_AM_DESCRIPTION, "desc", $desc_value);

$s_cat_checkbox = new XoopsFormCheckBox(_AM_SYSTEMRIGHTS, "system_catids[]", $s_cat_value);
//if (isset($s_cat_disable) && $s_cat_disable) {
//  $s_cat_checkbox->setExtra('checked="checked" disabled="disabled"');
//}
include_once(XOOPS_ROOT_PATH.'/modules/system/constants.php');
$handle = opendir(XOOPS_ROOT_PATH.'/modules/system/admin');
while (false != $file = readdir($handle)) {
    if (strtolower($file) != 'cvs' && !preg_match("/[.]/", $file) && is_dir(XOOPS_ROOT_PATH.'/modules/system/admin/'.$file)) {
        include XOOPS_ROOT_PATH.'/modules/system/admin/'.$file.'/xoops_version.php';
        if (!empty($modversion['category'])) {
            $s_cat_checkbox->addOption($modversion['category'], $modversion['name']);
        }
        unset($modversion);
    }
}

$a_mod_checkbox = new XoopsFormCheckBox(_AM_ACTIVERIGHTS, "admin_mids[]", $a_mod_value);
$module_handler =& xoops_gethandler('module');
$criteria = new CriteriaCompo(new Criteria('hasadmin', 1));
$criteria->add(new Criteria('isactive', 1));
$criteria->add(new Criteria('dirname', 'system', '<>'));
$a_mod_checkbox->addOptionArray($module_handler->getList($criteria));

$r_mod_checkbox = new XoopsFormCheckBox(_AM_ACCESSRIGHTS, "read_mids[]", $r_mod_value);
$criteria = new CriteriaCompo(new Criteria('hasmain', 1));
$criteria->add(new Criteria('isactive', 1));
$r_mod_checkbox->addOptionArray($module_handler->getList($criteria));

$r_lblock_checkbox = new XoopsFormCheckBox('<b>'._LEFT.'</b><br />', "read_bids[]", $r_block_value);
$r_cblock_checkbox = new XoopsFormCheckBox("<b>"._CENTER."</b><br />", "read_bids[]", $r_block_value);
$r_rblock_checkbox = new XoopsFormCheckBox("<b>"._RIGHT."</b><br />", "read_bids[]", $r_block_value);

$instance_handler =& xoops_gethandler('blockinstance');
$instance_array = $instance_handler->getObjects(null, true);
if (count($instance_array) > 0 ) {
    foreach ($instance_array as $key => $instance) {
        $value = "<a href='".XOOPS_URL."/modules/system/admin.php?fct=blocksadmin&amp;op=edit&amp;bid=".$key."'>".$instance->getVar('title')." (ID: ".$key.")</a>";

        switch ($instance->getVar('side')) {
            case XOOPS_SIDEBLOCK_LEFT:
            $r_lblock_checkbox->addOption($key, $value);
            break;

            case XOOPS_CENTERBLOCK_LEFT:
            case XOOPS_CENTERBLOCK_CENTER:
            case XOOPS_CENTERBLOCK_RIGHT:
            $r_cblock_checkbox->addOption($key, $value);
            break;
            case XOOPS_SIDEBLOCK_RIGHT:
            $r_rblock_checkbox->addOption($key, $value);
            break;
        }
    }

    $r_block_tray = new XoopsFormElementTray(_AM_BLOCKRIGHTS, "<br /><br />");
    $r_block_tray->addElement($r_lblock_checkbox);
    $r_block_tray->addElement($r_cblock_checkbox);
    $r_block_tray->addElement($r_rblock_checkbox);
}
$op_hidden = new XoopsFormHidden("op", $op_value);
$fct_hidden = new XoopsFormHidden("fct", "groups");
$submit_button = new XoopsFormButton("", "groupsubmit", $submit_value, "submit");
$form = new XoopsThemeForm($form_title, "groupform", "admin.php", "post", true);
$form->addElement($name_text);
$form->addElement($desc_text);
$form->addElement($s_cat_checkbox);
$form->addElement($a_mod_checkbox);
$form->addElement($r_mod_checkbox);
if (isset($r_block_tray)) {
    $form->addElement($r_block_tray);
}
$form->addElement($op_hidden);
$form->addElement($fct_hidden);
if ( !empty($g_id_value) ) {
    $g_id_hidden = new XoopsFormHidden("g_id", $g_id_value);
    $form->addElement($g_id_hidden);
}
$form->addElement($submit_button);
$form->setRequired($name_text);
$form->display();
?>