<?php

/**
* $Id: blocks.php,v 1.2 2005/08/02 03:47:52 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

/*global $xoopsConfig, $xoopsModule, $xoopsModuleConfig;
If (isset($xoopsModuleConfig) && isset($xoopsModule) && $xoopsModule->getVar('dirname') == 'smartsection') {
	$itemType = $xoopsModuleConfig['itemtype'];
} else {
	$hModule = &xoops_gethandler('module');
	$hModConfig = &xoops_gethandler('config');
	if ($ss_Module = &$hModule->getByDirname('smartsection')) {
		$module_id = $ss_Module->getVar('mid');
		$ss_Config = &$hModConfig->getConfigsByCat(0, $ss_Module->getVar('mid'));
		$itemType = $ss_Config['itemtype'];
	} else {
		$itemType = 'article';
	}	
}

include_once(XOOPS_ROOT_PATH . "/modules/smartsection/language/" . $xoopsConfig['language'] . "/plugin/" . $itemType . "/blocks.php");
*/
// Blocks

define("_MB_SS_ALLCAT", "All categories");
define("_MB_SS_AUTO_LAST_ITEMS", "Automatically display last item(s)?");
define("_MB_SS_CATEGORY", "Category");
define("_MB_SS_CHARS", "Length of the title");
define("_MB_SS_COMMENTS", "Comment(s)");
define("_MB_SS_DATE", "Published date");
define("_MB_SS_DISP", "Display");
define("_MB_SS_DISPLAY_CATEGORY", "Display the category name?");
define("_MB_SS_DISPLAY_COMMENTS", "Display comment count?");
define("_MB_SS_DISPLAY_TYPE", "Display type :");
define("_MB_SS_DISPLAY_TYPE_BLOCK", "Each item is a block");
define("_MB_SS_DISPLAY_TYPE_BULLET", "Each item is a bullet");
define("_MB_SS_DISPLAY_WHO_AND_WHEN", "Display the poster and date?");
define("_MB_SS_FULLITEM", "Read the complete article");
define("_MB_SS_HITS", "Number of hits");
define("_MB_SS_ITEMS", "Articles");
define("_MB_SS_LAST_ITEMS_COUNT", "If yes, how many items to display?");
define("_MB_SS_LENGTH", " characters");
define("_MB_SS_ORDER", "Display order");
define("_MB_SS_POSTEDBY", "Published by");
define("_MB_SS_READMORE", "Read more...");
define("_MB_SS_READS", "reads");
define("_MB_SS_SELECT_ITEMS", "If no, select the articles to be displayed :");
define("_MB_SS_SELECTCAT", "Display the articles of :");
define("_MB_SS_VISITITEM", "Visit the");
define("_MB_SS_WEIGHT", "List by weight");
define("_MB_SS_WHO_WHEN", "Published by %s on %s");
?>