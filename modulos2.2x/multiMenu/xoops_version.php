<?php
//  ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System				//
//                    Copyright (c) 2004 XOOPS.org					//
//                       <http://www.xoops.org/>					//
//													//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)			//
//                                 	- herve (www.herve-thouzard.com)		//
//                  multiMenu v1.7								//
//  ------------------------------------------------------------------------	//

$modversion['name'] = _MI_MULTIMENU_MODULE;
$modversion['version'] = "1.74";
$modversion['description'] = _MI_MULTIMENU_DESC;
$modversion['credits'] = "luinithil<br /><a href='http://www.luinithil.com'>luinithil</a>";
$modversion['author'] = "Solo (<a href='http://www.wolfpackclan.com'>Wolf Pack Clan</a>)<br />Hervé (<a href='http://www.herve-thouzard.com'>Hervé Thouzard</a>)";
$modversion['help'] = "help.html";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 0;
$modversion['image'] = "images/multimenu_slogo.png";
$modversion['dirname'] = "multiMenu";

$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "multimenu_counter";
$modversion['tables'][2] = "multimenu01";
$modversion['tables'][3] = "multimenu02";
$modversion['tables'][4] = "multimenu03";
$modversion['tables'][5] = "multimenu04";
$modversion['tables'][6] = "multimenu05";
$modversion['tables'][7] = "multimenu06";
$modversion['tables'][8] = "multimenu07";
$modversion['tables'][9] = "multimenu08";


$modversion['hasMain'] = 1;
global $xoopsUser, $xoopsModule, $xoopsModuleConfig;
if ($xoopsModule && $xoopsModule -> getVar( 'dirname' ) == 'multiMenu') {
$subcount = 1 ;
if ($xoopsModuleConfig['multimenu_mm01_index']){
			$modversion['sub'][$subcount]['name'] = $xoopsModuleConfig['multimenu_mm01_title'];
			$modversion['sub'][$subcount]['url'] = "multimenu.php?Menu=01" ;
			$subcount++ ;
}
if ($xoopsModuleConfig['multimenu_mm02_index']){
			$modversion['sub'][$subcount]['name'] = $xoopsModuleConfig['multimenu_mm02_title'];
			$modversion['sub'][$subcount]['url'] = "multimenu.php?Menu=02" ;
			$subcount++ ;
}
if ($xoopsModuleConfig['multimenu_mm03_index']){
			$modversion['sub'][$subcount]['name'] = $xoopsModuleConfig['multimenu_mm03_title'];
			$modversion['sub'][$subcount]['url'] = "multimenu.php?Menu=03" ;
			$subcount++ ;
}
if ($xoopsModuleConfig['multimenu_mm04_index']){
			$modversion['sub'][$subcount]['name'] = $xoopsModuleConfig['multimenu_mm04_title'];
			$modversion['sub'][$subcount]['url'] = "multimenu.php?Menu=04" ;
			$subcount++ ;
}
if ($xoopsModuleConfig['multimenu_mm05_index']){
			$modversion['sub'][$subcount]['name'] = $xoopsModuleConfig['multimenu_mm05_title'];
			$modversion['sub'][$subcount]['url'] = "multimenu.php?Menu=05" ;
			$subcount++ ;
}
if ($xoopsModuleConfig['multimenu_mm06_index']){
			$modversion['sub'][$subcount]['name'] = $xoopsModuleConfig['multimenu_mm06_title'];
			$modversion['sub'][$subcount]['url'] = "multimenu.php?Menu=06" ;
			$subcount++ ;
}
if ($xoopsModuleConfig['multimenu_mm07_index']){
			$modversion['sub'][$subcount]['name'] = $xoopsModuleConfig['multimenu_mm07_title'];
			$modversion['sub'][$subcount]['url'] = "multimenu.php?Menu=07" ;
			$subcount++ ;
}
if ($xoopsModuleConfig['multimenu_mm08_index']){
			$modversion['sub'][$subcount]['name'] = $xoopsModuleConfig['multimenu_mm08_title'];
			$modversion['sub'][$subcount]['url'] = "multimenu.php?Menu=08" ;
			$subcount++ ;
}
}

// Admin
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php?Menu=01";
$modversion['adminmenu'] = "admin/menu.php";

// Templates
$modversion['templates'][1]['file'] = 'multimenu_menu.html';
$modversion['templates'][1]['description'] = 'Menu style';
$modversion['templates'][2]['file'] = 'multimenu_pic.html';
$modversion['templates'][2]['description'] = 'Picture style';
$modversion['templates'][3]['file'] = 'multimenu_picslide.html';
$modversion['templates'][3]['description'] = 'Picture slide show';
$modversion['templates'][4]['file'] = 'multimenu_droplist.html';
$modversion['templates'][4]['description'] = 'Drop or select list';
$modversion['templates'][5]['file'] = 'multimenu_list.html';
$modversion['templates'][5]['description'] = 'Scrolling, ordered or not list';

$modversion['templates'][6]['file'] = 'multimenu_index.html';
$modversion['templates'][6]['description'] = 'Index page';
$modversion['templates'][7]['file'] = 'multimenu_content.html';
$modversion['templates'][7]['description'] = 'Menu pages';

// Options
$modversion['config'][1]['name'] = 'multimenu_show_main';
$modversion['config'][1]['title'] = '_MI_MULTIMENU_SHOW_MAIN';
$modversion['config'][1]['description'] = '';
$modversion['config'][1]['formtype'] = 'yesno';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = 1;

// Index page settings
$modversion['config'][2]['name'] = 'multimenu_text_index';
$modversion['config'][2]['title'] = '_MI_MULTIMENU_TEXT_INDEX';
$modversion['config'][2]['description'] = '_MI_MULTIMENU_TEXT_INDEXDSC';
$modversion['config'][2]['formtype'] = 'textarea';
$modversion['config'][2]['valuetype'] = 'text';
$modversion['config'][2]['default'] = _MI_MULTIMENU_WELCOME;

$modversion['config'][3]['name'] = 'multimenu_banner';
$modversion['config'][3]['title'] = '_MI_MULTIMENU_BANNER_DISP';
$modversion['config'][3]['description'] = '';
$modversion['config'][3]['formtype'] = 'select';
$modversion['config'][3]['valuetype'] = 'text';
$modversion['config'][3]['default'] = 'banner';
$modversion['config'][3]['options'] = array( _MI_MULTIMENU_NONE => 'none', _MI_MULTIMENU_BANNER => 'banner', _MI_MULTIMENU_MODULENAME => 'modname');

$modversion['config'][4]['name'] = 'multimenu_display_nav';
$modversion['config'][4]['title'] = '_MI_MULTIMENU_DISPLAY_NAV';
$modversion['config'][4]['description'] = '';
$modversion['config'][4]['formtype'] = 'yesno';
$modversion['config'][4]['valuetype'] = 'int';
$modversion['config'][4]['default'] = 1;

$modversion['config'][5]['name'] = 'multimenu_icon';
$modversion['config'][5]['title'] = '_MI_MULTIMENU_ICONS';
$modversion['config'][5]['description'] = '';
$modversion['config'][5]['formtype'] = 'yesno';
$modversion['config'][5]['valuetype'] = 'int';
$modversion['config'][5]['default'] = 1;

$modversion['config'][6]['name'] = 'multimenu_img_width';
$modversion['config'][6]['title'] = '_MI_MULTIMENU_IMAGE_WIDTH';
$modversion['config'][6]['description'] = '';
$modversion['config'][6]['formtype'] = 'textbox';
$modversion['config'][6]['valuetype'] = 'int';
$modversion['config'][6]['default'] = '';

// Theme settings
$modversion['config'][7]['name'] = 'multimenu_theme';
$modversion['config'][7]['title'] = '_MI_MULTIMENU_THEME';
$modversion['config'][7]['description'] = '';
$modversion['config'][7]['formtype'] = 'select';
$modversion['config'][7]['valuetype'] = 'text';
$modversion['config'][7]['default'] = '01';
$modversion['config'][7]['options'] = array( _MI_MULTIMENU_NONE => '0', _MI_MULTIMENU_NAME_01 => '01', _MI_MULTIMENU_NAME_02 => '02', _MI_MULTIMENU_NAME_03 => '03', _MI_MULTIMENU_NAME_04 => '04', _MI_MULTIMENU_NAME_05 => '05', _MI_MULTIMENU_NAME_06 => '06' , _MI_MULTIMENU_NAME_07 => '07', _MI_MULTIMENU_NAME_08 => '08');

$modversion['config'][8]['name'] = 'multimenu_theme_type';
$modversion['config'][8]['title'] = '_MI_MULTIMENU_THEME_TYPE';
$modversion['config'][8]['description'] = '';
$modversion['config'][8]['formtype'] = 'select';
$modversion['config'][8]['valuetype'] = 'text';
$modversion['config'][8]['default'] = 'table';
$modversion['config'][8]['options'] = array( _MI_MULTIMENU_THEME_TABLE => 'table', _MI_MULTIMENU_THEME_PATH => 'path');

// MultiMenu to Index settings
$modversion['config'][9]['name'] = 'multimenu_mm01_title';
$modversion['config'][9]['title'] = '_MI_MULTIMENU_MM_TITLE_01';
$modversion['config'][9]['description'] = '';
$modversion['config'][9]['formtype'] = 'textbox';
$modversion['config'][9]['valuetype'] = 'text';
$modversion['config'][9]['default'] = _MI_MULTIMENU_NAME_01;

$modversion['config'][10]['name'] = 'multimenu_mm01_index';
$modversion['config'][10]['title'] = '_MI_MULTIMENU_MM_INDEX_01';
$modversion['config'][10]['description'] = '';
$modversion['config'][10]['formtype'] = 'yesno';
$modversion['config'][10]['valuetype'] = 'int';
$modversion['config'][10]['default'] = 1;

$modversion['config'][11]['name'] = 'multimenu_mm02_title';
$modversion['config'][11]['title'] = '_MI_MULTIMENU_MM_TITLE_02';
$modversion['config'][11]['description'] = '';
$modversion['config'][11]['formtype'] = 'textbox';
$modversion['config'][11]['valuetype'] = 'text';
$modversion['config'][11]['default'] = _MI_MULTIMENU_NAME_02;

$modversion['config'][12]['name'] = 'multimenu_mm02_index';
$modversion['config'][12]['title'] = '_MI_MULTIMENU_MM_INDEX_02';
$modversion['config'][12]['description'] = '';
$modversion['config'][12]['formtype'] = 'yesno';
$modversion['config'][12]['valuetype'] = 'int';
$modversion['config'][12]['default'] = 1;

$modversion['config'][13]['name'] = 'multimenu_mm03_title';
$modversion['config'][13]['title'] = '_MI_MULTIMENU_MM_TITLE_03';
$modversion['config'][13]['description'] = '';
$modversion['config'][13]['formtype'] = 'textbox';
$modversion['config'][13]['valuetype'] = 'text';
$modversion['config'][13]['default'] = _MI_MULTIMENU_NAME_03;

$modversion['config'][14]['name'] = 'multimenu_mm03_index';
$modversion['config'][14]['title'] = '_MI_MULTIMENU_MM_INDEX_03';
$modversion['config'][14]['description'] = '';
$modversion['config'][14]['formtype'] = 'yesno';
$modversion['config'][14]['valuetype'] = 'int';
$modversion['config'][14]['default'] = 1;

$modversion['config'][15]['name'] = 'multimenu_mm04_title';
$modversion['config'][15]['title'] = '_MI_MULTIMENU_MM_TITLE_04';
$modversion['config'][15]['description'] = '';
$modversion['config'][15]['formtype'] = 'textbox';
$modversion['config'][15]['valuetype'] = 'text';
$modversion['config'][15]['default'] = _MI_MULTIMENU_NAME_04;

$modversion['config'][16]['name'] = 'multimenu_mm04_index';
$modversion['config'][16]['title'] = '_MI_MULTIMENU_MM_INDEX_04';
$modversion['config'][16]['description'] = '';
$modversion['config'][16]['formtype'] = 'yesno';
$modversion['config'][16]['valuetype'] = 'int';
$modversion['config'][16]['default'] = 1;

$modversion['config'][17]['name'] = 'multimenu_mm05_title';
$modversion['config'][17]['title'] = '_MI_MULTIMENU_MM_TITLE_05';
$modversion['config'][17]['description'] = '';
$modversion['config'][17]['formtype'] = 'textbox';
$modversion['config'][17]['valuetype'] = 'text';
$modversion['config'][17]['default'] = _MI_MULTIMENU_NAME_05;

$modversion['config'][18]['name'] = 'multimenu_mm05_index';
$modversion['config'][18]['title'] = '_MI_MULTIMENU_MM_INDEX_05';
$modversion['config'][18]['description'] = '';
$modversion['config'][18]['formtype'] = 'yesno';
$modversion['config'][18]['valuetype'] = 'int';
$modversion['config'][18]['default'] = 1;

$modversion['config'][19]['name'] = 'multimenu_mm06_title';
$modversion['config'][19]['title'] = '_MI_MULTIMENU_MM_TITLE_06';
$modversion['config'][19]['description'] = '';
$modversion['config'][19]['formtype'] = 'textbox';
$modversion['config'][19]['valuetype'] = 'text';
$modversion['config'][19]['default'] = _MI_MULTIMENU_NAME_06;

$modversion['config'][20]['name'] = 'multimenu_mm06_index';
$modversion['config'][20]['title'] = '_MI_MULTIMENU_MM_INDEX_06';
$modversion['config'][20]['description'] = '';
$modversion['config'][20]['formtype'] = 'yesno';
$modversion['config'][20]['valuetype'] = 'int';
$modversion['config'][20]['default'] = 1;

$modversion['config'][21]['name'] = 'multimenu_mm07_title';
$modversion['config'][21]['title'] = '_MI_MULTIMENU_MM_TITLE_07';
$modversion['config'][21]['description'] = '';
$modversion['config'][21]['formtype'] = 'textbox';
$modversion['config'][21]['valuetype'] = 'text';
$modversion['config'][21]['default'] = _MI_MULTIMENU_NAME_07;

$modversion['config'][22]['name'] = 'multimenu_mm07_index';
$modversion['config'][22]['title'] = '_MI_MULTIMENU_MM_INDEX_07';
$modversion['config'][22]['description'] = '';
$modversion['config'][22]['formtype'] = 'yesno';
$modversion['config'][22]['valuetype'] = 'int';
$modversion['config'][22]['default'] = 1;

$modversion['config'][23]['name'] = 'multimenu_mm08_title';
$modversion['config'][23]['title'] = '_MI_MULTIMENU_MM_TITLE_08';
$modversion['config'][23]['description'] = '';
$modversion['config'][23]['formtype'] = 'textbox';
$modversion['config'][23]['valuetype'] = 'text';
$modversion['config'][23]['default'] = _MI_MULTIMENU_NAME_08;

$modversion['config'][24]['name'] = 'multimenu_mm08_index';
$modversion['config'][24]['title'] = '_MI_MULTIMENU_MM_INDEX_08';
$modversion['config'][24]['description'] = '';
$modversion['config'][24]['formtype'] = 'yesno';
$modversion['config'][24]['valuetype'] = 'int';
$modversion['config'][24]['default'] = 1;

// Blocks
$modversion['blocks'][1]['file'] = "multimenu.php";
$modversion['blocks'][1]['name'] = _MI_MULTIMENU_NAME_01;
$modversion['blocks'][1]['description'] = "link menu";
$modversion['blocks'][1]['show_func'] = "multimenu_show";
$modversion['blocks'][1]['edit_func'] = "multimenu_edit";
$modversion['blocks'][1]['options'] = "menu|all|1|weight ASC|1|255|1||160|160|1|0|3|01";
$modversion['blocks'][1]['template'] = 'multimenu_block_01.html';

$modversion['blocks'][2]['file'] = "multimenu.php";
$modversion['blocks'][2]['name'] = _MI_MULTIMENU_NAME_02;
$modversion['blocks'][2]['description'] = "link menu";
$modversion['blocks'][2]['show_func'] = "multimenu_show";
$modversion['blocks'][2]['edit_func'] = "multimenu_edit";
$modversion['blocks'][2]['options'] = "menu|all|1|weight ASC|1|255|1||160|160|1|0|3|02";
$modversion['blocks'][2]['template'] = 'multimenu_block_02.html';

$modversion['blocks'][3]['file'] = "multimenu.php";
$modversion['blocks'][3]['name'] = _MI_MULTIMENU_NAME_03;
$modversion['blocks'][3]['description'] = "link menu";
$modversion['blocks'][3]['show_func'] = "multimenu_show";
$modversion['blocks'][3]['edit_func'] = "multimenu_edit";
$modversion['blocks'][3]['options'] = "menu|all|1|weight ASC|1|255|1||160|160|1|0|3|03";
$modversion['blocks'][3]['template'] = 'multimenu_block_03.html';

$modversion['blocks'][4]['file'] = "multimenu.php";
$modversion['blocks'][4]['name'] = _MI_MULTIMENU_NAME_04;
$modversion['blocks'][4]['description'] = "link menu";
$modversion['blocks'][4]['show_func'] = "multimenu_show";
$modversion['blocks'][4]['edit_func'] = "multimenu_edit";
$modversion['blocks'][4]['options'] = "menu|all|1|weight ASC|1|255|1||160|160|1|0|3|04";
$modversion['blocks'][4]['template'] = 'multimenu_block_04.html';

$modversion['blocks'][5]['file'] = "multimenu_add.php";
$modversion['blocks'][5]['name'] = _MI_MULTIMENU_NAME_A;
$modversion['blocks'][5]['description'] = "link menu";
$modversion['blocks'][5]['show_func'] = "multimenu_add_show";
$modversion['blocks'][5]['edit_func'] = "multimenu_add_edit";
$modversion['blocks'][5]['options'] = "ul|all|1|weight ASC|1|255|1||160|160|1|0|3|01";
$modversion['blocks'][5]['template'] = 'multimenu_block_A.html';

$modversion['blocks'][6]['file'] = "multimenu_add.php";
$modversion['blocks'][6]['name'] = _MI_MULTIMENU_NAME_B;
$modversion['blocks'][6]['description'] = "link menu";
$modversion['blocks'][6]['show_func'] = "multimenu_add_show";
$modversion['blocks'][6]['edit_func'] = "multimenu_add_edit";
$modversion['blocks'][6]['options'] = "ul|all|1|weight ASC|1|255|1||160|160|1|0|3|01";
$modversion['blocks'][6]['template'] = 'multimenu_block_B.html';

$modversion['blocks'][7]['file'] = "multimenu.php";
$modversion['blocks'][7]['name'] = _MI_MULTIMENU_NAME_05;
$modversion['blocks'][7]['description'] = "admin link menu";
$modversion['blocks'][7]['show_func'] = "multimenu_show";
$modversion['blocks'][7]['edit_func'] = "multimenu_edit";
$modversion['blocks'][7]['options'] = "ul|all|1|weight ASC|1|255|1||160|160|1|0|3|05";
// UPDATE : Reverse below lines to update from 1.6 to 1.7
$modversion['blocks'][7]['template'] = 'multimenu_block_05.html';
//$modversion['blocks'][7]['template'] = 'multimenu_block_admin.html';
// UPDATE

$modversion['blocks'][8]['file'] = "multimenu.php";
$modversion['blocks'][8]['name'] = _MI_MULTIMENU_NAME_06;
$modversion['blocks'][8]['description'] = "admin link menu";
$modversion['blocks'][8]['show_func'] = "multimenu_show";
$modversion['blocks'][8]['edit_func'] = "multimenu_edit";
$modversion['blocks'][8]['options'] = "ul|all|1|weight ASC|1|255|1||160|160|1|0|3|06";
$modversion['blocks'][8]['template'] = 'multimenu_block_06.html';

$modversion['blocks'][9]['file'] = "multimenu.php";
$modversion['blocks'][9]['name'] = _MI_MULTIMENU_NAME_07;
$modversion['blocks'][9]['description'] = "admin link menu";
$modversion['blocks'][9]['show_func'] = "multimenu_show";
$modversion['blocks'][9]['edit_func'] = "multimenu_edit";
$modversion['blocks'][9]['options'] = "ul|all|1|weight ASC|1|255|1||160|160|1|0|3|07";
$modversion['blocks'][9]['template'] = 'multimenu_block_07.html';

$modversion['blocks'][10]['file'] = "multimenu.php";
$modversion['blocks'][10]['name'] = _MI_MULTIMENU_NAME_08;
$modversion['blocks'][10]['description'] = "admin link menu";
$modversion['blocks'][10]['show_func'] = "multimenu_show";
$modversion['blocks'][10]['edit_func'] = "multimenu_edit";
$modversion['blocks'][10]['options'] = "ul|all|1|weight ASC|1|255|1||160|160|1|0|3|08";
$modversion['blocks'][10]['template'] = 'multimenu_block_08.html';
?>
