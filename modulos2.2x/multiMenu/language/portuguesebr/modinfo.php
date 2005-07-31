<?php
//  ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System				//
//                    Copyright (c) 2004 XOOPS.org					//
//                       <http://www.xoops.org/>					//
//													//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)			//
//                                 	- herve (www.herve-thouzard.com)		//
//                  multiMenu v1.6								//
//  ------------------------------------------------------------------------	//

define("_MI_MULTIMENU_MODULE",	"multiMenu");
define("_MI_MULTIMENU_NAME_",		"multiMenu ");

for ($i = 1; $i <= 8; $i++) {
$idMenu = sprintf("%02d",$i);
define("_MI_MULTIMENU_NAME_".$idMenu,	"multiMenu ".$idMenu);
define("_MI_MULTIMENU_MM_INDEX_".$idMenu, "Display in index multiMenu ".$idMenu);
define("_MI_MULTIMENU_MM_TITLE_".$idMenu,	"Menu Title ".$idMenu);
}
define("_MI_MULTIMENU_NAME_A",	"multiMenu A");
define("_MI_MULTIMENU_NAME_B",	"multiMenu B");
define("_MI_MULTIMENU_NAME_ADMIN",	"Admin Bloc");
define("_MI_MULTIMENU_DESC",		"Allow to create up to 7 different custom menus.");

define("_MI_MULTIMENU_TEXT_INDEX",	"Introduction text");
define("_MI_MULTIMENU_TEXT_INDEXDSC","Insert here the text to display in the index page");
define("_MI_MULTIMENU_WELCOME",	"Welcome to multiMenu*. 

For more informations or bugs report about this module, please visit the <a href='http://www.wolfpackclan.com/wolfactory/' target='_blank'>WolFactory</a>.

:-D

<div align='right'>Solo</div>

<div align='left'>*To edit this text, go in the module settings.</div>");
define("_MI_MULTIMENU_SHOW_MAIN",	"Display Main page");
define("_MI_MULTIMENU_DISPLAY_NAV",	"Display Nav Bar");

define("_MI_MULTIMENU_INDEX",		"Index");
define("_MI_MULTIMENU_ADMIN",		"Admin");
define("_MI_MULTIMENU_READ",		"Read: ");
define("_MI_MULTIMENU_IMAGE_WIDTH",	"Defaut images width: ");
define("_MI_MULTIMENU_ICONS",		"Display icons: ");
define("_MI_MULTIMENU_THEME",		"Menu to display in theme:<br /><br />
Insert your theme :<br /><font color='blue'><nobr><{include file=\"../modules/multiMenu/theme/multimenu.php\"}></nobr></font><br /><br />
<font color='red'> Note: Only '<i>main links</i>' are displayed in theme !</font>");

define("_MI_MULTIMENU_BANNER_DISP",	"Display banner:");
define("_MI_MULTIMENU_BANNER",	"Banner");
define("_MI_MULTIMENU_MODULENAME",	"Module Name");
define("_MI_MULTIMENU_NONE",		"None");
define("_MI_MULTIMENU_THEME_TYPE",	"Theme menu display model");
define("_MI_MULTIMENU_THEME_TABLE",	"Table");
define("_MI_MULTIMENU_THEME_PATH",	"Path");

?>
