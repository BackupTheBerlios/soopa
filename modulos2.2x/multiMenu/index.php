<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//						- herve (www.herve-thouzard.com)   		//
//                  multiMenu 1.7								//
//  ------------------------------------------------------------------------ 	//

// This script is used to display the page list
include_once("header.php");
include_once(XOOPS_ROOT_PATH."/header.php");

// Activate the sitemap module
if ($xoopsModuleConfig['multimenu_show_main']) {
$xoopsOption['template_main'] = 'multimenu_index.html';
$myts =& MyTextSanitizer::getInstance();
$id = 'index.php';
$count ='';

// Module Banner
 if ($xoopsModuleConfig['multimenu_banner'] == 'banner') {
$banner = '<img src="images/logo.gif" alt="'.$xoopsModule -> getVar( 'name' ).'">'; 
} elseif ($xoopsModuleConfig['multimenu_banner'] == 'modname') {
$banner = '<h1>'.$xoopsModule -> getVar( 'name' ).'</h1>'; 
 } else {
 $banner = '';
 }

$xoopsTpl->assign("banner", $banner);
$xoopsTpl->assign("banner", $banner);

//Affiche le nom du module et le texte d'introduction
$xoopsTpl->assign("mm_module_name", $xoopsModule -> getVar( 'name' ));
$xoopsTpl->assign("mm_textindex", $myts->makeTareaData4Show($xoopsModuleConfig['multimenu_text_index']));

// Afficher le menu de navigation
if ($xoopsModuleConfig['multimenu_display_nav']){ include("include/nav.php"); } else { $nav = '';}
$xoopsTpl->assign('nav', $nav);



$id = "index";

//Affiche les liens d'administration & compteur
include("include/counter.php");
$xoopsTpl->assign("mm_read", $read);

include("include/footer.php");
$xoopsTpl->assign("mm_admin", $admin);


// Afficher le multiMenu 01
if ($xoopsModuleConfig['multimenu_mm01_index']){
$id = "01";
$xoopsTpl->assign("mm01_display", '1');
$mm01_title = '<a href="multimenu.php?Menu='.$id.'">'.$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm01_title']).'</a>';
$xoopsTpl->assign("mm01_title", $mm01_title);

	if (is_object($xoopsUser) AND $xoopsUser->isAdmin($xoopsModule->mid())) {
		$mm01_edit = '&nbsp;<a href="admin/index.php?Menu='.$id.'"><img src="images/icon/edit.gif" alt="'._EDIT.'" /></a>';
	} else {
		$mm01_edit = '';
	}

include("include/multimenu.php");
$xoopsTpl->assign("mm01_edit", $mm01_edit);
}


// Afficher le multiMenu 02
if ($xoopsModuleConfig['multimenu_mm02_index']){
$id = "02";
$xoopsTpl->assign("mm02_display", '1');
$mm02_title = '<a href="multimenu.php?Menu='.$id.'">'.$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm02_title']).'</a>';
$xoopsTpl->assign("mm02_title", $mm02_title);

	if (is_object($xoopsUser) AND $xoopsUser->isAdmin($xoopsModule->mid())) {
		$mm02_edit = '&nbsp;<a href="admin/index.php?Menu='.$id.'"><img src="images/icon/edit.gif" alt="'._EDIT.'" /></a>';
	} else {
		$mm02_edit = '';
	}
include("include/multimenu.php");
$xoopsTpl->assign("mm02_edit", $mm02_edit);
}

// Afficher le multiMenu 03
if ($xoopsModuleConfig['multimenu_mm03_index']){
$id = "03";
$xoopsTpl->assign("mm03_display", '1');
$mm03_title = '<a href="multimenu.php?Menu='.$id.'">'.$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm03_title']).'</a>';
$xoopsTpl->assign("mm03_title", $mm03_title);

	if (is_object($xoopsUser) AND $xoopsUser->isAdmin($xoopsModule->mid())) {
		$mm03_edit = '&nbsp;<a href="admin/index.php?Menu='.$id.'"><img src="images/icon/edit.gif" alt="'._EDIT.'" /></a>';
	} else {
		$mm03_edit = '';
	}
include("include/multimenu.php");
$xoopsTpl->assign("mm03_edit", $mm03_edit);
}


// Afficher le multiMenu 04
$xoopsTpl->assign("mm04_title", '');
if ($xoopsModuleConfig['multimenu_mm04_index']){
$id = "04";
$xoopsTpl->assign("mm04_display", '1');
$mm04_title = '<a href="multimenu.php?Menu='.$id.'">'.$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm04_title']).'</a>';
$xoopsTpl->assign("mm04_title", $mm04_title);

	if (is_object($xoopsUser) AND $xoopsUser->isAdmin($xoopsModule->mid())) {
		$mm04_edit = '&nbsp;<a href="admin/index.php?Menu='.$id.'"><img src="images/icon/edit.gif" alt="'._EDIT.'" /></a>';
	} else {
		$mm04_edit = '';
	}
include("include/multimenu.php");
$xoopsTpl->assign("mm04_edit", $mm04_edit);
}

// Afficher le multiMenu 05
$xoopsTpl->assign("mm05_title", '');
if ($xoopsModuleConfig['multimenu_mm05_index']){
$id = "05";
$xoopsTpl->assign("mm05_display", '1');
$mm05_title = '<a href="multimenu.php?Menu='.$id.'">'.$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm05_title']).'</a>';
$xoopsTpl->assign("mm05_title", $mm05_title);

	if (is_object($xoopsUser) AND $xoopsUser->isAdmin($xoopsModule->mid())) {
		$mm05_edit = '&nbsp;<a href="admin/index.php?Menu='.$id.'"><img src="images/icon/edit.gif" alt="'._EDIT.'" /></a>';
	} else {
		$mm05_edit = '';
	}
include("include/multimenu.php");
$xoopsTpl->assign("mm05_edit", $mm05_edit);
}


// Afficher le multiMenu 06
$xoopsTpl->assign("mm06_title", '');
if ($xoopsModuleConfig['multimenu_mm06_index']){
$id = "06";
$xoopsTpl->assign("mm06_display", '1');
$mm06_title = '<a href="multimenu.php?Menu='.$id.'">'.$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm06_title']).'</a>';
$xoopsTpl->assign("mm06_title", $mm06_title);

	if (is_object($xoopsUser) AND $xoopsUser->isAdmin($xoopsModule->mid())) {
		$mm06_edit = '&nbsp;<a href="admin/index.php?Menu='.$id.'"><img src="images/icon/edit.gif" alt="'._EDIT.'" /></a>';
	} else {
		$mm06_edit = '';
	}
include("include/multimenu.php");
$xoopsTpl->assign("mm06_edit", $mm06_edit);
}


// Afficher le multiMenu 07
$xoopsTpl->assign("mm07_title", '');
if ($xoopsModuleConfig['multimenu_mm07_index']){
$id = "07";
$xoopsTpl->assign("mm07_display", '1');
$mm07_title = '<a href="multimenu.php?Menu='.$id.'">'.$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm07_title']).'</a>';
$xoopsTpl->assign("mm07_title", $mm07_title);

	if (is_object($xoopsUser) AND $xoopsUser->isAdmin($xoopsModule->mid())) {
		$mm07_edit = '&nbsp;<a href="admin/index.php?Menu='.$id.'"><img src="images/icon/edit.gif" alt="'._EDIT.'" /></a>';
	} else {
		$mm07_edit = '';
	}
include("include/multimenu.php");
$xoopsTpl->assign("mm07_edit", $mm07_edit);
}


// Afficher le multiMenu 08
$xoopsTpl->assign("mm08_title", '');
if ($xoopsModuleConfig['multimenu_mm08_index']){
$id = "08";
$xoopsTpl->assign("mm08_display", '1');
$mm08_title = '<a href="multimenu.php?Menu='.$id.'">'.$myts->makeTareaData4Show($xoopsModuleConfig['multimenu_mm08_title']).'</a>';
$xoopsTpl->assign("mm08_title", $mm08_title);

	if (is_object($xoopsUser) AND $xoopsUser->isAdmin($xoopsModule->mid())) {
		$mm08_edit = '&nbsp;<a href="admin/index.php?Menu='.$id.'"><img src="images/icon/edit.gif" alt="'._EDIT.'" /></a>';
	} else {
		$mm08_edit = '';
	}
include("include/multimenu.php");
$xoopsTpl->assign("mm08_edit", $mm08_edit);
}

}

include_once(XOOPS_ROOT_PATH."/footer.php");
?>
