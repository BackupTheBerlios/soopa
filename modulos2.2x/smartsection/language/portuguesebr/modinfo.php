<?php

/**
* $Id: modinfo.php,v 1.2 2005/08/03 21:53:00 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

// Module Info
// The name of this module

global $xoopsModule;

define("_MI_SS_MD_NAME", "SmartSection");

// A brief description of this module
define("_MI_SS_MD_DESC", "Section Management System for your XOOPS Site");
/*
// Language plugin captions
define("_MI_SS_LANG_PLUGIN_ARTICLE", "Articles");
define("_MI_SS_LANG_PLUGIN_ITEM", "Items");
define("_MI_SS_LANG_PLUGIN_TUTORIAL", "Turorials");
define("_MI_SS_LANG_PLUGIN_PROPERTY", "Properties");
define("_MI_SS_LANG_PLUGIN_CLASS_ACTION", "Class Action Suits");

global $xoopsConfig, $xoopsModule, $xoopsModuleConfig;
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
$file = XOOPS_ROOT_PATH . "/modules/smartsection/language/" . $xoopsConfig['language'] . "/plugin/" . $itemType . "/modinfo.php";
include_once($file);
*/
// Sub menus in main menu block
define("_MI_SS_SUB_SMNAME1", "Submit an article");
define("_MI_SS_SUB_SMNAME2", "Popular articles");

// Config options
define('_MI_SS_ALLOWADMINHITS', '[CONTENT OPTIONS] Admin counter reads:');
define('_MI_SS_ALLOWADMINHITSDSC', 'Allow admin hits for counter stats?');
define('_MI_SS_ALLOWCOMMENTS', "[PERMISSIONS] Control comments at the article level:");
define('_MI_SS_ALLOWCOMMENTSDSC', "If you set this option to 'Yes', you'll see comments only on those items that have their comment checkbox marked. <br /><br />Select 'No' to have comments managed at the global level (look below under the tag 'Comment rules'.");
define("_MI_SS_ALLOWSUBMIT", "[PERMISSIONS] User submissions:");
define("_MI_SS_ALLOWSUBMITDSC", "Allow users to submit articles on your website?");
define("_MI_SS_ALLOWUPLOAD", "[PERMISSIONS] User file upload");
define("_MI_SS_ALLOWUPLOADDSC", "Allow users to upload files linked to articles on your website?");
define("_MI_SS_ANONPOST", "[PERMISSIONS] Allow anonymous posting");
define("_MI_SS_ANONPOSTDSC", "Allow anonymous users to submit articles.");
define('_MI_SS_AUTOAPPROVE_SUB_ITEM', "[PERMISSIONS] Auto approve submitted articles:");
define('_MI_SS_AUTOAPPROVE_SUB_ITEMDSC', "Auto approves submitted articles without admin intervention.");
define('_MI_SS_BOTH_FOOTERS','Both footers');
define('_MI_SS_CATPERPAGE', '[FORMAT OPTIONS] Maximum Categories per page (User side):');
define('_MI_SS_CATPERPAGEDSC', 'Maximum number of top categories per page to be displayed at once in the user side.');
define('_MI_SS_COLLAPSABLE_HEADING', "[FORMAT OPTIONS] Display the collapsable bar:");
define('_MI_SS_COLLAPSABLE_HEADING_DSC', "If you set this option to 'Yes', the Categories summary will be displayed in a collapsable bar, as well as The articles. If you set this option to 'No', the collapsable will not be displayed.");
define('_MI_SS_DATEFORMAT', '[FORMAT OPTIONS] Date format:');
define('_MI_SS_DATEFORMATDSC', 'Use the final part of language/english/global.php to select a display style. Example: "d-M-Y H:i" translates to "30-Mar-2004 22:35"');
define('_MI_SS_DISPLAY_CAT_SUMMARY', "[CONTENT OPTIONS] Display the category summary ?");
define('_MI_SS_DISPLAY_CAT_SUMMARY_DSC', "Select 'Yes' to have the category summary displayed in the module.");
define("_MI_SS_DISPLAY_CATEGORY", "Display the category name ?");
define("_MI_SS_DISPLAY_CATEGORY_DSC", "Set to 'Yes' to display the category link in the individual article");
define("_MI_SS_DISPLAY_COMMENT", "[CONTENT OPTIONS] Display comment count?");
define("_MI_SS_DISPLAY_COMMENT_DSC", "Set to 'Yes' to display the comments count in the individual article");
define('_MI_SS_DISPLAY_DATE_COL', "[CONTENT OPTIONS] Display the 'Published on' column ?");
define('_MI_SS_DISPLAY_DATE_COLDSC', "When the 'Summary' display type is selected, select 'Yes' to display a 'Published on' date in the items table on the index and category page.");
define('_MI_SS_DISPLAY_HITS_COL', "[CONTENT OPTIONS] Display the 'Hits' column?");
define('_MI_SS_DISPLAY_HITS_COLDSC', "When the 'Summary' display type is selected, select 'Yes' to display the 'Hits' column in the items table on the index and category page.");
define('_MI_SS_DISPLAY_LAST_ITEM', '[CONTENT OPTIONS] Display last item column ?');
define('_MI_SS_DISPLAY_LAST_ITEMDSC', "Select 'Yes' to display the last item in each category in the index and category page.");
define('_MI_SS_DISPLAY_LAST_ITEMS', '[CONTENT OPTIONS] Display the list of newly published articles:');
define('_MI_SS_DISPLAY_LAST_ITEMS_DSC', "Select 'Yes' to have the list at the bottom of the first page of the module");
define('_MI_SS_DISPLAY_SBCAT_DSC', '[CONTENT OPTIONS] Display sub-categories description ?');
define('_MI_SS_DISPLAY_SBCAT_DSCDSC', "Select 'Yes' to display the description of sub-categories in the index and category page.");
define("_MI_SS_DISPLAY_WHOWHEN", "[CONTENT OPTIONS] Display the poster and date ?");
define("_MI_SS_DISPLAY_WHOWHEN_DSC", "Set to 'Yes' to display the poster and date information in the individual article");
define('_MI_SS_DISPLAYTYPE', "[FORMAT OPTIONS] Articles display type:");
define('_MI_SS_DISPLAYTYPE_FULL', "Full View");
define('_MI_SS_DISPLAYTYPE_LIST', "Bullet list");
define('_MI_SS_DISPLAYTYPE_SUMMARY', "Summary View");
define('_MI_SS_DISPLAYTYPEDSC', "If 'Summary View' is selected, only the Title, Date and Hits of each item will be displayed in a selected category. If 'Full View' is selected, each article will be fully displayed in a selected category.");
define('_MI_SS_FILEUPLOADDIR', 'Attached files upload directory:');
define('_MI_SS_FILEUPLOADDIRDSC', "Directory into which will be imported the files attached to the articles. Do not include any leading nor trailing slashes.");
define('_MI_SS_FOOTERPRINT','[PRINT OPTIONS] Print page footer');
define('_MI_SS_FOOTERPRINTDSC','Footer that will be printed for each article');
define('_MI_SS_HEADERPRINT','[PRINT OPTIONS] Print page header');
define('_MI_SS_HEADERPRINTDSC','Header that will be printed for each article');
define('_MI_SS_HELP_CUSTOM', "Custom Path");
define('_MI_SS_HELP_INSIDE', "Inside the module");
define('_MI_SS_HELP_PATH_CUSTOM', "Custom path of SmartSection's help files");
define('_MI_SS_HELP_PATH_CUSTOM_DSC', "If you selected 'Custom path' in the previous option 'Path of SmartSection's help files', please specify the URL of SmartSection's help files, in that format : http://www.yoursite.com/doc");
define('_MI_SS_HELP_PATH_SELECT', "Path of SmartSection's help files");
define('_MI_SS_HELP_PATH_SELECT_DSC', "Select from where you would like to access SmartSection's help files. If you downloaded the 'SmartSection's Help Package' and uploaded it in 'modules/smartsection/doc/', you can select 'Inside the module'. Alternatively, you can access the module's help file directly from docs.xoops.org by chosing this in the selector. You can also select 'Custom Path' and specify yourself the path of the help files in the next config option 'Custom path of SmartSection's help files'");
define('_MI_SS_HIGHLIGHT_COLOR', "[FORMAT OPTIONS] Highlight color for keywords");
define('_MI_SS_HIGHLIGHT_COLORDSC', "Color of the keywords highligting for the search function");
define('_MI_SS_INDEXFOOTER','[CONTENT OPTIONS] Index Footer');
define('_MI_SS_INDEXFOOTER_SEL','Index Footer');
define('_MI_SS_INDEXFOOTERDSC','Footer that will be displayed at the index page of the module');
define('_MI_SS_INDEXWELCOMEMSG', '[CONTENT OPTIONS] Index page welcome message:');
define('_MI_SS_INDEXWELCOMEMSGDEF', ""); 
define('_MI_SS_INDEXWELCOMEMSGDSC', 'Welcome message to be displayed in the index page of the module.');
define('_MI_SS_ITEMFOOTER', '[CONTENT OPTIONS] Item footer');
define('_MI_SS_ITEMFOOTER_SEL', 'Item footer');
define('_MI_SS_ITEMFOOTERDSC','Footer that wiil be displayed for each article');
define("_MI_SS_ITEM_TYPE", "Item type:");
define("_MI_SS_ITEM_TYPEDSC", "Select the kind of items this module is going to manage.");
define('_MI_SS_LAST_ITEM_SIZE', '[FORMAT OPTIONS] Last item size :');
define('_MI_SS_LAST_ITEM_SIZEDSC', "Set the maximum size of the title in the Last item column.");
define('_MI_SS_LINKED_PATH', '[FORMAT OPTIONS] Enable links on the current path:');
define('_MI_SS_LINKED_PATHDSC', "This option allows the user climb back up by clicking on a element of the current path displayed on the top of the page");
define('_MI_SS_ORDERBYDATE', '[FORMAT OPTIONS] Order the items by date :');
define('_MI_SS_ORDERBYDATEDSC', 'If you set this option to "Yes", the items inside a category will be ordered by decending date, otherwise, they will be ordered by their weight.');
define('_MI_SS_ORDERBY_DATE', 'Date DESC');
define('_MI_SS_ORDERBY_TITLE', 'Title ASC');
define('_MI_SS_ORDERBY_WEIGHT', 'Weight ASC');
define('_MI_SS_OTHER_ITEMS_TYPE', '[FORMAT OPTIONS] Other articles display type');
define('_MI_SS_OTHER_ITEMS_TYPE_ALL', "All articles");
define('_MI_SS_OTHER_ITEMS_TYPE_DSC', 'Select how you would like to display the other articles of the category in the article page.');
define('_MI_SS_OTHER_ITEMS_TYPE_NONE', "None");
define('_MI_SS_OTHER_ITEMS_TYPE_PREVIOUS_NEXT', "Previous and next article");
define('_MI_SS_NO_FOOTERS','None');
define('_MI_SS_PERPAGE', "[FORMAT OPTIONS] Maximum articles per page (Admin side):");
define('_MI_SS_PERPAGEDSC', "Maximum number of articles per page to be displayed at once in the admin side.");
define('_MI_SS_PERPAGEINDEX', "[FORMAT OPTIONS] Maximum articles per page (User side):");
define('_MI_SS_PERPAGEINDEXDSC', "[PRINT OPTIONS] Maximum number of articles per page to be displayed at once in the user side.");
define('_MI_SS_PRINTLOGOURL','[PRINT OPTIONS] Logo print url');
define('_MI_SS_PRINTLOGOURLDSC','Url of the logo that will be printed at the top of the page');
define('_MI_SS_SHOW_MODNAME_BREADCRUMB','[PRINT OPTIONS] Show the module name in the breadcrumb');
define('_MI_SS_SHOW_MODNAME_BRDCRMBDSC','If you select yes, the breadcrumb will show "Smartsection > category name > article name". <br>Otherwise, only "category name > article name" will be shown.');
define('_MI_SS_SHOW_SUBCATS', "[CONTENT OPTIONS] Display sub categories in the index page");
define('_MI_SS_SHOW_SUBCATS_DSC', "Select yes to display the sub categories in the categories list of the index page of the module");
define('_MI_SS_SUBMITINTROMSG', '[CONTENT OPTIONS] Submit page intro message:');
define('_MI_SS_SUBMITINTROMSGDEF', "");
define('_MI_SS_SUBMITINTROMSGDSC', 'Intro message to be displayed in the submit page of the module.');
define('_MI_SS_TITLE_AND_WELCOME', '[CONTENT OPTIONS] Display the welcome title and message:');
define('_MI_SS_TITLE_AND_WELCOME_DSC', "If this option is set to 'Yes', the module index page will display the title 'Welcome in the SmartSection of...', followed by the welcome message defined below. If this option is set to 'No', none of these lines will be displayed.");
define('_MI_SS_TITLE_SIZE', "[FORMAT OPTIONS] Title size :");
define('_MI_SS_TITLE_SIZEDSC', "Set the maximum size of the title in the single item display page.");
define('_MI_SS_USE_WYSIWYG', "[FORMAT OPTIONS] Use Koivi WYSIWYG editor?");
define('_MI_SS_USE_WYSIWYG_DSC', "The 'wysiwyg' folder must be present in " . XOOPS_URL . "/class/");
define('_MI_SS_USEIMAGENAVPAGE', '[FORMAT OPTIONS] Use the image Page Navigation:');
define('_MI_SS_USEIMAGENAVPAGEDSC', 'If you set this option to "Yes", the Page Navigation will be displayed with image, otherwise, the original Page Naviagation will be used.');
define('_MI_SS_USEREALNAME', '[FORMAT OPTIONS] Use the Real Name of users');
define('_MI_SS_USEREALNAMEDSC', 'When displaying a username, use the real name of that user if he has a set his real name.');

// Names of admin menu items
define("_MI_SS_ADMENU1", "Início");
define("_MI_SS_ADMENU2", "Categorias");
define("_MI_SS_ADMENU3", "Artigos");
define("_MI_SS_ADMENU4", "Permissões");
define("_MI_SS_ADMENU5", "Blocos & Grupos");
define("_MI_SS_ADMENU6", "Acessar Módulo");

//Names of Blocks and Block information
define("_MI_SS_ITEMSNEW", "Recent items List");
define("_MI_SS_ITEMSPOT", "In the Spotlight !");
define("_MI_SS_ITEMSRANDOM_ITEM", "Random item !");
define("_MI_SS_RECENTITEMS", "Recent items (Detail)");
define("_MI_SS_ITEMSMENU", "Menu block");

// Text for notifications
define('_MI_SS_CATEGORY_ITEM_NOTIFY', 'Category Items');
define('_MI_SS_CATEGORY_ITEM_NOTIFY_DSC', 'Notification options that apply to the current category.');
define('_MI_SS_CATEGORY_ITEM_PUBLISHED_NOTIFY', "New article published");
define('_MI_SS_CATEGORY_ITEM_PUBLISHED_NOTIFY_CAP', "Notify me when a new article is published in the current category.");   
define('_MI_SS_CATEGORY_ITEM_PUBLISHED_NOTIFY_DSC', "Receive notification when a new article is published in the current category.");      
define('_MI_SS_CATEGORY_ITEM_PUBLISHED_NOTIFY_SBJ', "[{X_SITENAME}] {X_MODULE} auto-notify : New article published in category"); 
define('_MI_SS_CATEGORY_ITEM_SUBMITTED_NOTIFY', "'Article submitted");
define('_MI_SS_CATEGORY_ITEM_SUBMITTED_NOTIFY_CAP', "Notify me when a new article is submitted in the current category.");   
define('_MI_SS_CATEGORY_ITEM_SUBMITTED_NOTIFY_DSC', "Receive notification when a new article is submitted in the current category.");      
define('_MI_SS_CATEGORY_ITEM_SUBMITTED_NOTIFY_SBJ', "[{X_SITENAME}] {X_MODULE} auto-notify : New article submitted in category"); 
define('_MI_SS_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY', 'New category');
define('_MI_SS_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_CAP', 'Notify me when a new category is created.');
define('_MI_SS_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_DSC', 'Receive notification when a new category is created.');
define('_MI_SS_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_SBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New category');
define('_MI_SS_GLOBAL_ITEM_NOTIFY', "Global Articles");
define('_MI_SS_GLOBAL_ITEM_NOTIFY_DSC', "Notification options that apply to all articles.");
define('_MI_SS_GLOBAL_ITEM_PUBLISHED_NOTIFY', "New article published");
define('_MI_SS_GLOBAL_ITEM_PUBLISHED_NOTIFY_CAP', "Notify me when any new article is published.");
define('_MI_SS_GLOBAL_ITEM_PUBLISHED_NOTIFY_DSC', "Receive notification when any new article is published.");
define('_MI_SS_GLOBAL_ITEM_PUBLISHED_NOTIFY_SBJ', "[{X_SITENAME}] {X_MODULE} auto-notify : New article published");
define('_MI_SS_GLOBAL_ITEM_SUBMITTED_NOTIFY', "Article submitted");
define('_MI_SS_GLOBAL_ITEM_SUBMITTED_NOTIFY_CAP', "Notify me when any article is submitted and is awaiting approval.");
define('_MI_SS_GLOBAL_ITEM_SUBMITTED_NOTIFY_DSC', "Receive notification when any article is submitted and is waiting approval.");
define('_MI_SS_GLOBAL_ITEM_SUBMITTED_NOTIFY_SBJ', "[{X_SITENAME}] {X_MODULE} auto-notify : New article submitted");
define('_MI_SS_ITEM_APPROVED_NOTIFY', "Article approved");
define('_MI_SS_ITEM_APPROVED_NOTIFY_CAP', "Notify me when this article is approved.");   
define('_MI_SS_ITEM_APPROVED_NOTIFY_DSC', "Receive notification when this article is approved.");      
define('_MI_SS_ITEM_APPROVED_NOTIFY_SBJ', "[{X_SITENAME}] {X_MODULE} auto-notify : article approved"); 
define('_MI_SS_ITEM_NOTIFY', "Article");
define('_MI_SS_ITEM_NOTIFY_DSC', "Notification options that apply to the current article.");
define('_MI_SS_ITEM_REJECTED_NOTIFY', "Article rejected");
define('_MI_SS_ITEM_REJECTED_NOTIFY_CAP', "Notify me if this article is rejected.");   
define('_MI_SS_ITEM_REJECTED_NOTIFY_DSC', "Receive notification if this article is rejected.");      
define('_MI_SS_ITEM_REJECTED_NOTIFY_SBJ', "[{X_SITENAME}] {X_MODULE} auto-notify : article rejected"); 

// About.php constants
define('_MI_SS_AUTHOR_INFO', "Developers");
define('_MI_SS_AUTHOR_WORD', "The Author's Word");
define('_MI_SS_BY', "by");
define('_MI_SS_DEMO_SITE', "SmartFactory Demo Site");
define('_MI_SS_DEVELOPER_CONTRIBUTOR', "Contributor(s)");
define('_MI_SS_DEVELOPER_CREDITS', "Credits");
define('_MI_SS_DEVELOPER_EMAIL', "Email");
define('_MI_SS_DEVELOPER_LEAD', "Lead developer(s)");
define('_MI_SS_DEVELOPER_WEBSITE', "Website");
define('_MI_SS_MODULE_BUG', "Report a bug for this module");
define('_MI_SS_MODULE_DEMO', "Demo Site");
define('_MI_SS_MODULE_DISCLAIMER', "Disclaimer");
define('_MI_SS_MODULE_FEATURE', "Suggest a new feature for this module");
define('_MI_SS_VERSION_HISTORY', "Version History");
define('_MI_SS_MODULE_INFO', "Module Developpment Informations");
define('_MI_SS_MODULE_RELEASE_DATE', "Release date");
define('_MI_SS_MODULE_STATUS', "Status");
define('_MI_SS_MODULE_SUBMIT_BUG', "Submit a bug");
define('_MI_SS_MODULE_SUBMIT_FEATURE', "Submit a feature request");
define('_MI_SS_MODULE_SUPPORT', "Official support site");

// Beta
define('_MI_SS_WARNING_BETA', "This module comes as is, without any guarantees whatsoever. 
This module is BETA, meaning it is still under active development. This release is meant for
<b>testing purposes only</b> and we <b>strongly</b> recommend that you do not use it on a live 
website or in a production environment.");

// RC
define('_MI_SS_WARNING_RC', "This module comes as is, without any guarantees whatsoever. This module 
is a Release Candidate and should not be used on a production web site. The module is still under 
active development and its use is under your own responsibility, which means the author is not responsible.");

// Final
define('_MI_SS_WARNING_FINAL', "This module comes as is, without any guarantees whatsoever. Although this 
module is not beta, it is still under active development. This release can be used in a live website 
or a production environment, but its use is under your own responsibility, which means the author 
is not responsible.");




?>