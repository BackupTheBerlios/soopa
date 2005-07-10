<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//                       				                             //
//                  Author : solo (www.wolfpackclan.com)                     //
//                  easyinstall v1.0			                             //
//  ------------------------------------------------------------------------ //

	$tblcolor=Array();
	$tblcolor[0]=$tblcolor[1]=$tblcolor[2]=$tblcolor[3]=$tblcolor[4]=$tblcolor[5]=$tblcolor[6]=$tblcolor[7]=$tblcolor[8]="#DDE";

$id = isset($_GET['Menu']) ? intval($_GET['Menu']) : 0;
$id = sprintf("%02d",$id);	
$tblcolor[intval($id)]="white";

$index = '';
$preferences = '';
$menu01 = '';
$menu02 = '';
$menu03 = '';
$menu04 = '';
$menu05 = '';
$menu06 = '';
$menu07 = '';
$menu08 = '';

// Index
$index = "
<div id='navcontainer'>
<ul style='padding: 1px 0; margin-left: 0; font: bold 12px Verdana, sans-serif; '>

<li style='list-style: none; margin: 0; display: inline; '>
<a href='index.php'  style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[0]."; text-decoration: none;'>
".$xoopsModule -> getVar( 'name' )."</a></li>";


// Préférences + menu admin
if (is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->mid())) {
$preferences = "
<li style='list-style: none; margin: 0; display: inline;'>
<a href='../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=".$xoopsModule -> getVar( 'mid' )."' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: #DDE; text-decoration: none; '>
"._MULTIMENU_PREFERENCES."</a></li>
";
}


// Menu 1
if ($xoopsModuleConfig['multimenu_mm01_index']){
$menu01 = "<li style='list-style: none; margin: 0; display: inline; '>
<a href='multimenu.php?Menu=01' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background:".$tblcolor[1]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm01_title'])."</a></li>";
}

// Menu 2
if ($xoopsModuleConfig['multimenu_mm02_index']){
$menu02 = "<li style='list-style: none; margin: 0; display: inline; '>
<a href='multimenu.php?Menu=02' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[2]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm02_title'])."</a></li>";
}

// Menu 3
if ($xoopsModuleConfig['multimenu_mm03_index']){
$menu03 = "<li style='list-style: none; margin: 0; display: inline; '>
<a href='multimenu.php?Menu=03' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[3]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm03_title'])."</a></li>";
}

// Menu 4
if ($xoopsModuleConfig['multimenu_mm04_index']){
$menu04 = "<li style='list-style: none; margin: 0; display: inline; '>
<a href='multimenu.php?Menu=04' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[4]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm04_title'])."</a></li>";
}

// Menu 5
if ($xoopsModuleConfig['multimenu_mm05_index']){
$menu05 = "<li style='list-style: none; margin: 0; display: inline; '>
<a href='multimenu.php?Menu=05' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[5]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm05_title'])."</a></li>";
}

// Menu 6
if ($xoopsModuleConfig['multimenu_mm06_index']){
$menu06 = "<li style='list-style: none; margin: 0; display: inline; '>
<a href='multimenu.php?Menu=06' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[6]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm06_title'])."</a></li>";
}

// Menu 7
if ($xoopsModuleConfig['multimenu_mm07_index']){
$menu07 = "<li style='list-style: none; margin: 0; display: inline; '>
<a href='multimenu.php?Menu=07' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[7]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm07_title'])."</a></li>";
}

// Menu 8
if ($xoopsModuleConfig['multimenu_mm08_index']){
$menu08 = "<li style='list-style: none; margin: 0; display: inline; '>
<a href='multimenu.php?Menu=08' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[8]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm08_title'])."</a></li>";
}
// nav
$nav = "<ul>".$index.$preferences."<br /><br />".$menu01.$menu02.$menu03.$menu04.$menu05.$menu06.$menu07.$menu08."</ul><br /></div>";


?>

