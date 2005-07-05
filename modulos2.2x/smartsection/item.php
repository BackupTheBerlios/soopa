<?php

/**
* $Id: item.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("header.php");

global $smartsection_item_handler, $smartsection_category_handler, $xoopsUser, $xoopsConfig, $xoopsModuleConfig, $xoopsModule;

$itemid = isset($_GET['itemid']) ? intval($_GET['itemid']) : 0;
$item_page_id = isset($_GET['page']) ? intval($_GET['page']) : -1;

If ($itemid == 0) {
	redirect_header("javascript:history.go(-1)", 1, _MD_SS_NOITEMSELECTED);
	exit();
}

// Creating the item object for the selected item
$itemObj = $smartsection_item_handler->get($itemid);

// If the selected item was not found, exit
If (!$itemObj) {
	redirect_header("javascript:history.go(-1)", 1, _MD_SS_NOITEMSELECTED);
	exit();
}

$xoopsOption['template_main'] = 'smartsection_item.html';
include_once(XOOPS_ROOT_PATH . "/header.php");
include_once("footer.php");

// Creating the category object that holds the selected item
$categoryObj =& $smartsection_category_handler->get($itemObj->categoryid());

// Check user permissions to access that category of the selected item
if (!(ss_itemAccessGranted($itemObj->itemid(), $itemObj->categoryid()))) {
	redirect_header("javascript:history.go(-1)", 1, _NOPERM);
	exit;
}

// Update the read counter of the selected item
if (!$xoopsUser || ($xoopsUser->isAdmin($xoopsModule->mid()) && $xoopsModuleConfig['adminhits'] == 1) || ($xoopsUser && !$xoopsUser->isAdmin($xoopsModule->mid()))) {
	$itemObj->updateCounter();
}

// Retreiving the objects of this category
if($xoopsModuleConfig['orderbydate'] == 1){
	$orderBy = 'datesub';
	$ascOrDesc = 'DESC';
}
else{
	$orderBy = 'weight';
	$ascOrDesc = 'ASC';
}

$itemsObj = $smartsection_item_handler->getAllPublished(0, 0, $categoryObj->categoryid(), $orderBy, $ascOrDesc, '', true, true);

// Retreiving the next and previous object
$array_keys = array_keys($itemsObj);
$current_item = array_search($itemid, $array_keys);
$items_count = count($array_keys);
$previous_item = $current_item - 1;
$next_item = $current_item + 1;

if ($previous_item >= 0) {
	$previous_item_link = $itemsObj[$array_keys[$previous_item]]->getItemLink();
	$previous_item_url = $itemsObj[$array_keys[$previous_item]]->getItemUrl();
} else {
	$previous_item_link = '';
	$previous_item_url = '';
}
if ($next_item < $items_count) {
	$next_item_link = $itemsObj[$array_keys[$next_item]]->getItemLink();
	$next_item_url = $itemsObj[$array_keys[$next_item]]->getItemUrl();
} else {
	$next_item_link = '';
	$next_item_url = '';
}

// Populating the smarty variables with informations related to the selected item
$item = $itemObj->toArray($item_page_id);
$item['categoryPath'] = $categoryObj->getCategoryPath($xoopsModuleConfig['linkedPath']);
$item['categoryname'] = $categoryObj->name();
$item['who_when'] = $itemObj->getWhoAndWhen();

if ($itemObj->pagescount() > 0) {
	include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
	if ($item_page_id == -1) ($item_page_id = 0);
    $pagenav = new XoopsPageNav($itemObj->pagescount(), 1, $item_page_id, 'page', 'itemid=' . $itemObj->itemid());
    $xoopsTpl->assign('pagenav', $pagenav->renderNav());
}


$items = array();

foreach($itemsObj as $theitemObj)
{
	$theitem = $theitemObj->toarray();
	if ($theitemObj->itemid() == $itemObj->itemid()) {
		$theitem['titlelink'] = $theitemObj->title();
	}
	$items[] = $theitem;
	unset($theitem);	
}
$xoopsTpl->assign('items', $items);

// Creating the files object associated with this item
$filesObj =& $itemObj->getFiles();

$files = array();

foreach($filesObj as $fileObj)
{
	$file['fileid'] = $fileObj->fileid();
	$file['name'] = $fileObj->name();
	$file['description'] = $fileObj->description();
	$file['name'] = $fileObj->name();
	$file['type'] = $fileObj->mimetype();
	$file['datesub'] = $fileObj->datesub();
	$file['hits'] = $fileObj->counter();
	$files[] = $file;
	unset($file);	
}
$item['files'] = $files;

// Language constants
$xoopsTpl->assign('item', $item);
$xoopsTpl->assign('mail_link', 'mailto:?subject=' . sprintf(_MD_SS_INTITEM, $xoopsConfig['sitename']) . '&amp;body=' . sprintf(_MD_SS_INTITEMFOUND, $xoopsConfig['sitename']) . ':  ' . XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/item.php?itemid=' . $itemObj->itemid());
$xoopsTpl->assign('lang_printerpage', _MD_SS_PRINTERFRIENDLY);
$xoopsTpl->assign('lang_sendstory', _MD_SS_SENDSTORY);
$xoopsTpl->assign('itemid', $itemObj->itemid());
$xoopsTpl->assign('sectionname', $myts->makeTboxData4Show($xoopsModule->getVar('name')));
$xoopsTpl->assign('modulename', $xoopsModule->dirname());
$xoopsTpl->assign('lang_home', _MD_SS_HOME);
$xoopsTpl->assign('lang_item', _MD_SS_OTHER_ITEMS);
$xoopsTpl->assign('lang_postedby', _MD_SS_POSTEDBY);
$xoopsTpl->assign('lang_on', _MD_SS_ON);
$xoopsTpl->assign('lang_datesub', _MD_SS_DATESUB);
$xoopsTpl->assign('lang_hitsdetail', _MD_SS_HITSDETAIL);
$xoopsTpl->assign('lang_reads', _MD_SS_READS);
$xoopsTpl->assign('lang_comments', _MD_SS_COMMENTS);
$xoopsTpl->assign('lang_files_linked', _MD_SS_FILES_LINKED);
$xoopsTpl->assign('lang_file_name', _MD_SS_FILENAME);
$xoopsTpl->assign('lang_file_type', _MD_SS_FILE_TYPE);
$xoopsTpl->assign('lang_hits', _MD_SS_HITS);
$xoopsTpl->assign('lang_download_file', _MD_SS_DOWNLOAD_FILE);
$xoopsTpl->assign('lang_page', _MD_SS_PAGE);
$xoopsTpl->assign('lang_previous_item', _MD_SS_PREVIOUS_ITEM);
$xoopsTpl->assign('lang_next_item', _MD_SS_NEXT_ITEM);

$xoopsTpl->assign('module_home', ss_module_home($xoopsModuleConfig['linkedPath']));
$xoopsTpl->assign('categoryPath', $item['categoryPath'] . " > " . $item['title']);
$xoopsTpl->assign('commentatarticlelevel', $xoopsModuleConfig['commentatarticlelevel']);
$xoopsTpl->assign('com_rule', ss_getConfig('com_rule'));
$xoopsTpl->assign('lang_items_links', _MD_SS_ITEMS_LINKS);
$xoopsTpl->assign('previous_item_link', $previous_item_link);
$xoopsTpl->assign('next_item_link', $next_item_link);
$xoopsTpl->assign('previous_item_url', $previous_item_url);
$xoopsTpl->assign('next_item_url', $next_item_url);
$xoopsTpl->assign('other_items', $xoopsModuleConfig['other_items_type']);
$xoopsTpl->assign('itemfooter', ss_getConfig('itemfooter'));

// MetaTag Generator
smartsection_createMetaTags($itemObj->title(), $categoryObj->name(), $itemObj->summary());

// Include the comments if the selected ITEM supports comments
if (($itemObj->cancomment() == 1) || (!$xoopsModuleConfig['commentatarticlelevel'] && ss_getConfig('com_rule') <> 0)) {
	include_once XOOPS_ROOT_PATH . "/include/comment_view.php";
}
if (file_exists(XOOPS_ROOT_PATH . '/modules/smarttie/smarttie_links.php')) {
	include_once XOOPS_ROOT_PATH . '/modules/smarttie/smarttie_links.php';
	$xoopsTpl->assign('smarttie',1);
}
include_once XOOPS_ROOT_PATH . '/footer.php';

?>