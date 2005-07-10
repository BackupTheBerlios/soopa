<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//                       				                             //
//                  Author : solo (www.wolfpackclan.com)                     //
//                  easyinstall v1.0			                             //
//  ------------------------------------------------------------------------ //

if (is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->mid())) {
$read = _MULTIMENU_READ.$count;
$admin = "
<a href='../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=".$xoopsModule -> getVar( 'mid' )."'>"._MULTIMENU_PREFERENCES."</a><br />
<a href='admin/index.php?Menu=01'>".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm01_title'])."</a> | 
<a href='admin/index.php?Menu=02'>".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm02_title'])."</a> | 
<a href='admin/index.php?Menu=03'>".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm03_title'])."</a> | 
<a href='admin/index.php?Menu=04'>".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm04_title'])."</a> | 
<a href='admin/index.php?Menu=05'>".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm05_title'])."</a> |
<a href='admin/index.php?Menu=06'>".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm06_title'])."</a> | 
<a href='admin/index.php?Menu=07'>".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm07_title'])."</a> | 
<a href='admin/index.php?Menu=08'>".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm08_title'])."</a>";
} else { $admin = ''; }

?>

