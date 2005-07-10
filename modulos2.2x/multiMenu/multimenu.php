<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//						- christian (www.edom.org)		 	//
//						- herve (www.herve-thouzard.com)   		//
//						- Marcan (www.smartfactory.ca)   		//
//                  Edito 2.4								//
//  ------------------------------------------------------------------------ 	//

// This script is used to display the page list
include_once("header.php");
include_once(XOOPS_ROOT_PATH."/header.php");
$xoopsOption['template_main'] = 'multimenu_index.html';
$myts =& MyTextSanitizer::getInstance();

$id = isset($_GET['Menu']) ? intval($_GET['Menu']) : 1;
$id = sprintf("%02d",$id);

// Variables à zero
$read = '';

// Afficher le titre
if ($id == '01') { $title = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm01_title']); $xoopsTpl->assign("mm01_display", '1');} 
if ($id == '02') { $title = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm02_title']); $xoopsTpl->assign("mm02_display", '1');}
if ($id == '03') { $title = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm03_title']); $xoopsTpl->assign("mm03_display", '1');}
if ($id == '04') { $title = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm04_title']); $xoopsTpl->assign("mm04_display", '1');}
if ($id == '05') { $title = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm05_title']); $xoopsTpl->assign("mm05_display", '1');}
if ($id == '06') { $title = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm06_title']); $xoopsTpl->assign("mm06_display", '1');}
if ($id == '07') { $title = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm07_title']); $xoopsTpl->assign("mm07_display", '1');}
if ($id == '08') { $title = $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm08_title']); $xoopsTpl->assign("mm08_display", '1');}
$xoopsTpl->assign("mm_module_name", "<a href='index.php'>".$xoopsModule -> getVar( 'name' )."&nbsp;:&nbsp;</a>&nbsp;".$title );
$xoopsTpl->assign("mm_textindex", "");

// Module Banner
 if ($xoopsModuleConfig['multimenu_banner'] == 'banner') {
$banner = '<img src="images/logo.gif" alt="'.$title.'">'; 
} elseif ($xoopsModuleConfig['multimenu_banner'] == 'modname') {
$banner = '<h1>'.$title .'</h1>'; 
 } else {
 $banner = '';
 }
$xoopsTpl->assign("banner", $banner);


// Afficher le menu de navigation
if ($xoopsModuleConfig['multimenu_display_nav']){ include("include/nav.php"); } else { $nav = ''; }
$xoopsTpl->assign('nav', $nav);


//Affiche les liens d'administration & compteur
include("include/counter.php");
$xoopsTpl->assign("mm_read", $read);

include("include/footer.php");
$xoopsTpl->assign("mm_admin", $admin);

// Afficher le multiMenu en cours

	if (is_object($xoopsUser) AND $xoopsUser->isAdmin($xoopsModule->mid())) {
		$mm_edit = '&nbsp;<a href="admin/index.php?Menu='.$id.'"><img src="images/icon/edit.gif" alt="'._EDIT.'" /></a>';
	} else {
		$mm_edit = '';
	}
$xoopsTpl->assign("mm_edit", $mm_edit);
include("include/multimenu.php");

include_once(XOOPS_ROOT_PATH."/footer.php");
?>

