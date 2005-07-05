<?php

/**
* $Id: main.php,v 1.1 2005/07/05 05:34:14 mauriciodelima Exp $
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

include_once(XOOPS_ROOT_PATH . "/modules/smartsection/language/" . $xoopsConfig['language'] . "/plugin/" . $itemType . "/main.php");
*/

define("_MD_SS_ACTION", "Action");
define("_MD_SS_ADD_FILE", "Add a file");
define("_MD_SS_ADD_FILE_INTRO", "Please fill this form in order to attach a file to this this article : '%s'.");
define("_MD_SS_ADD_FILE_TITLE", "Add a file to an article");
define("_MD_SS_ADMIN_PAGE", ":: Administrative Section ::");
define("_MD_SS_ALL", "All");
define("_MD_SS_ALLOWCOMMENTS", "Allow comments?");
define("_MD_SS_APPROVE", "Approve");
define("_MD_SS_BODY", "Main body");
define("_MD_SS_BODY_DSC", "Article's man body");
define("_MD_SS_BODY_REQ", "Main body*");
define("_MD_SS_CANCEL", "Cancel");
define("_MD_SS_CATEGORY", "Category");
define("_MD_SS_CATEGORY_DSC", "Category to which belong this article.");
define("_MD_SS_CATEGORY_EDIT", "Edit category");
define("_MD_SS_CATEGORY_SUMMARY", "Summary of %s");
define("_MD_SS_CATEGORY_SUMMARY_INFO", "Sub-categories within %s.");
define("_MD_SS_CLEAR", "Clear");
define("_MD_SS_COMMENTS", "Comment(s)");
define("_MD_SS_CREATE", "Create article");
define("_MD_SS_DATE", "Date");
define("_MD_SS_DATESUB", "Published on");
define("_MD_SS_DELETE", "Delete article");
define("_MD_SS_DESCRIPTION", "Description");
define("_MD_SS_DOHTML", "Enable HTML tags ");
define("_MD_SS_DOIMAGE", "Enable images");
define("_MD_SS_DOLINEBREAK", "Enable linebreak");
define("_MD_SS_DOSMILEY", "Enable smiley icons ");
define("_MD_SS_DOWNLOAD_FILE", "Download this file");
define("_MD_SS_DOXCODE", "Enable XOOPS codes");
define("_MD_SS_EDIT", "Edit article");
define("_MD_SS_EMPTY", "This category has presently no article or sub-category");
define("_MD_SS_ERROR_ITEM_NOT_SAVED", "An error occured. The article was not saved in the database.");
define("_MD_SS_FILE", "Files");
define("_MD_SS_FILE_ADD", "Adding a file");
define("_MD_SS_FILE_ADDING", "Adding a new file");
define("_MD_SS_FILE_ADDING_DSC", "Please fill the following form in order to add a new file to this article.");
define("_MD_SS_FILE_DESCRIPTION", "Description");
define("_MD_SS_FILE_DESCRIPTION_DSC", "Description of the file to be uploaded.");
define("_MD_SS_FILE_EDITING", "Editing a file");
define("_MD_SS_FILE_EDITING_DSC", "You can edit this file. Modifications will immediatly take effect in the user side.");
define("_MD_SS_FILE_EDITING_ERROR", "An error occured while updating the file.");
define("_MD_SS_FILE_EDITING_SUCCESS", "The file was successfully modified.");
define("_MD_SS_FILE_INFORMATIONS", "File's informations");
define("_MD_SS_FILE_NAME_DSC", "Name that will be used to identify the file.");
define("_MD_SS_FILE_TO_UPLOAD", "File to upload :");
define("_MD_SS_FILE_TYPE", "File type");
define("_MD_SS_FILENAME", "File name");
define("_MD_SS_FILES_LINKED", "Files linked to this article");
define("_MD_SS_FILEUPLOAD_ERROR", "An error occured while uploading the file.");
define("_MD_SS_FILEUPLOAD_SUCCESS", "The file was successfully uploaded.");
define("_MD_SS_FINDITEMHERE", "Find this article here : ");
define("_MD_SS_GOODDAY", "Good day, ");
define("_MD_SS_HITS", "Hits");
define("_MD_SS_HITSDETAIL", "" . "This article has been read");
define("_MD_SS_HOME", "Home");
define("_MD_SS_INDEX_CATEGORIES_SUMMARY", "Categories summary");
define("_MD_SS_INDEX_CATEGORIES_SUMMARY_INFO", "Here is a list of the top categories and their sub-categories. Select a category to see the articles within.");
define("_MD_SS_INDEX_ITEMS", "Last published articles");
define("_MD_SS_INDEX_ITEMS_INFO", "Here is a list of the Last published articles.");
define("_MD_SS_INTITEM", "Have a look at this article at %s");
define("_MD_SS_INTITEMFOUND", "Here is an interesting article I have found at %s");
define("_MD_SS_ITEM", "article");
define("_MD_SS_ITEM_CAP", "Article");
define("_MD_SS_ITEM_RECEIVED_AND_PUBLISHED", "Your article has been sent and automatically published. Thank you for your contribution !");
define("_MD_SS_ITEM_RECEIVED_NEED_APPROVAL", "Your article has been sent and will be published upon approval by a moderator.<br />Thank you for your contribution !");
define("_MD_SS_ITEMCOMEFROM", "This article was found on ");
define("_MD_SS_ITEMS", "Articles");
define("_MD_SS_ITEMS_INFO", "Here are The articles of this category.");
define("_MD_SS_ITEMS_LINKS", "Navigate through the articles");
define("_MD_SS_ITEMS_TITLE", "Articles within %s");
define("_MD_SS_LAST_SMARTITEM", "Last published article");
define("_MD_SS_MAIL", "Send article");
define("_MD_SS_MAINHEAD", "Welcome in the");
define("_MD_SS_MAINNOITEMS", "There are no article in this category");
define("_MD_SS_MAINNOSELECTCAT", "You did not select a valid category");
define("_MD_SS_NAME", "Name");
define("_MD_SS_NEXT_ITEM", "Next article");
define("_MD_SS_NO", "No");
define("_MD_SS_NO_CAT_EXISTS", "Sorry, there&#8217s no category defined as yet.<br />Please contact the site administrator and tell him about this.");
define("_MD_SS_NO_CAT_PERMISSIONS", "Sorry, you don't have sufficient permissions to access this area.");
define("_MD_SS_NO_TOP_PERMISSIONS", "Sorry, there is no article to display.");
define("_MD_SS_NOCATEGORYSELECTED", "You did not select a valid category !");
define("_MD_SS_NOITEMS_INFO", "There is presently no article to display.");
define("_MD_SS_NOITEMSELECTED", "You did not select a validarticle !");
define("_MD_SS_NONE", "None");
define("_MD_SS_NOTIFY", "Notify on publish?");
define("_MD_SS_OF", "of");
define("_MD_SS_ON", "on");
define("_MD_SS_OPTIONS", "Options");
define("_MD_SS_OTHER_ITEMS", "Other articles in this category");
define("_MD_SS_PAGE", "Page");
define("_MD_SS_POSTEDBY", "Published by %s on %s");
define("_MD_SS_PREVIEW", "Preview");
define("_MD_SS_PREVIOUS_ITEM", "Previous article");
define("_MD_SS_PRINT", "Print article");
define("_MD_SS_PRINTERFRIENDLY", "Print this article in a printer friendly format");
define("_MD_SS_READMORE", "Read more...");
define("_MD_SS_READS", "reads");
define("_MD_SS_SENDSTORY", "Send this article to a friend");
define("_MD_SS_SMARTITEMS_INFO", "Here are the published articles of that category.");
define("_MD_SS_SUB_INTRO", "please fill this form to send your article. The site adminisrator will review it and then publish it as soon as possible. Thank you in advance for your contribution.");
define("_MD_SS_SUB_SMNAME", "Submit an article");
define("_MD_SS_SUB_SNEWNAME", "Submit an article");
define("_MD_SS_SUBMIT", "Submit an article");
define("_MD_SS_SUBMIT_ERROR", "An error occured. Your article was not submitted.");
define("_MD_SS_SUBMITITEM", "Submit an an article");
define("_MD_SS_SUMMARY", "Introduction");
define("_MD_SS_SUMMARY_DSC", "Article's introduction");
define("_MD_SS_THE", "the");
define("_MD_SS_TIMES", "times");
define("_MD_SS_TITLE", "Title");
define("_MD_SS_TITLE_REQ", "Title*");
define("_MD_SS_TOTAL_SMARTITEMS", "Total articles");
define("_MD_SS_UNKNOWNERROR", "ERROR.  Returning you to where you where!");
define("_MD_SS_UPLOAD", "Upload");
define("_MD_SS_UPLOAD_FILE", "Upload a file");
define("_MD_SS_VIEW_MORE", "Read the complete article");
define("_MD_SS_WEIGHT", "Weight");
define("_MD_SS_WHO_WHEN", "Published by %s on %s");
define("_MD_SS_YES", "Yes");

?>