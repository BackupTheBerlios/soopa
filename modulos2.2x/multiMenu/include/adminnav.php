<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//                       				                             //
//                  Author : solo (www.wolfpackclan.com)                     //
//                  multiMenu v1.7			                             //
//  ------------------------------------------------------------------------ //

global $xoopsModuleConfig, $xoopsModule, $xoopsConfig;

$myts =& MyTextSanitizer::getInstance();

	$tblcolor=Array();
	$tblcolor[1]=$tblcolor[2]=$tblcolor[3]=$tblcolor[4]=$tblcolor[5]=$tblcolor[6]=$tblcolor[7]=$tblcolor[8]="#E88";
	$tblcolor[0]="#DDE";

	if ($xoopsModuleConfig['multimenu_mm01_index']){$tblcolor[1]="#8E8"; }
	if ($xoopsModuleConfig['multimenu_mm02_index']){$tblcolor[2]="#8E8"; }
	if ($xoopsModuleConfig['multimenu_mm03_index']){$tblcolor[3]="#8E8"; }
	if ($xoopsModuleConfig['multimenu_mm04_index']){$tblcolor[4]="#8E8"; }
	if ($xoopsModuleConfig['multimenu_mm05_index']){$tblcolor[5]="#8E8"; }
	if ($xoopsModuleConfig['multimenu_mm06_index']){$tblcolor[6]="#8E8"; }
	if ($xoopsModuleConfig['multimenu_mm07_index']){$tblcolor[7]="#8E8"; }
	if ($xoopsModuleConfig['multimenu_mm08_index']){$tblcolor[8]="#8E8"; }

	if ($Menu == '01') { $multimenu = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm01_title']); }
	if ($Menu == '02') { $multimenu = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm02_title']); }
	if ($Menu == '03') { $multimenu = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm03_title']); }
	if ($Menu == '04') { $multimenu = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm04_title']); }
	if ($Menu == '05') { $multimenu = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm05_title']); }
	if ($Menu == '06') { $multimenu = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm06_title']); }
	if ($Menu == '07') { $multimenu = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm07_title']); }
	if ($Menu == '08') { $multimenu = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm08_title']); }

$tblcolor[intval($Menu)]="white";

		echo "
<a href='http://www.wolfpackclan.com/wolfactory/' target='_blank'><img src='../images/wolfactory.gif' alt='wolFactory' align='right' /></a>
<h2 align='center'>multiMenu 1.7</h2>
<div id='navcontainer'>
<ul style='padding: 1px 0; margin-left: 0; font: bold 12px Verdana, sans-serif; '>

<li style='list-style: none; margin: 0; display: inline; '>
<a href='../index.php'  style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: #DDE; text-decoration: none;'>
".$xoopsModule -> getVar( 'name' )."</a></li>

<li style='list-style: none; margin: 0; display: inline; '>
<a href='../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=".$xoopsModule -> getVar( 'mid' )."' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: #DDE; text-decoration: none; '>
"._AD_MULTIMENU_PREFERENCES."</a></li>

<li style='list-style: none; margin: 0; display: inline; '>
<a href='index.php?op=help&Menu=help' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[0]."; text-decoration: none; '>
"._AD_MULTIMENU_HELP."</a></li><br /><br />";

echo"<li style='list-style: none; margin: 0; display: inline; '>
<a href='index.php?Menu=01' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[1]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm01_title'])."</a></li>";

echo"<li style='list-style: none; margin: 0; display: inline; '>
<a href='index.php?Menu=02' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[2]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm02_title'])."</a></li>";

echo"<li style='list-style: none; margin: 0; display: inline; '>
<a href='index.php?Menu=03' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[3]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm03_title'])."</a></li>";

echo"<li style='list-style: none; margin: 0; display: inline; '>
<a href='index.php?Menu=04' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[4]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm04_title'])."</a></li><br /><br />";

echo"<li style='list-style: none; margin: 0; display: inline; '>
<a href='index.php?Menu=05' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[5]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm05_title'])."</a></li>";

echo"<li style='list-style: none; margin: 0; display: inline; '>
<a href='index.php?Menu=06' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[6]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm06_title'])."</a></li>";

echo"<li style='list-style: none; margin: 0; display: inline; '>
<a href='index.php?Menu=07' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[7]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm07_title'])."</a></li>";

echo"<li style='list-style: none; margin: 0; display: inline; '>
<a href='index.php?Menu=08' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: ".$tblcolor[8]."; text-decoration: none; '>
".$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm08_title'])."</a></li>";

echo"</ul>
</div><hr />";

?>

