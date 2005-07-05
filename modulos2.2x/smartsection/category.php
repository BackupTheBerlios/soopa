<?php

/**
* $Id: category.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("header.php");

global $smartsection_category_handler, $smartsection_item_handler;

$categoryid = isset($_GET['categoryid']) ? intval($_GET['categoryid']) : 0;

// Creating the category object for the selected category
$categoryObj = new ssCategory($categoryid);

// If the selected category was not found, exit
If ($categoryObj->notLoaded()) {
    redirect_header("javascript:history.go(-1)", 1, _MD_SS_NOCATEGORYSELECTED);
    exit();
}

// Check user permissions to access this category
if (!$categoryObj->checkPermission()) {
    redirect_header("javascript:history.go(-1)", 1, _NOPERM);
    exit;
}

$item_page_id = isset($_GET['page']) ? intval($_GET['page']) : -1;

$totalItem = $smartsection_category_handler->publishedItemsCount();

// If there is no Item under this categories or the sub-categories, exit
If (!isset($totalItem[$categoryid]) || $totalItem[$categoryid] == 0) {
    //redirect_header("index.php", 1, _MD_SS_MAINNOFAQS);
    //exit;
}
$xoopsOption['template_main'] = 'smartsection_category.html';

include_once(XOOPS_ROOT_PATH . "/header.php");
include_once("footer.php");

// At which record shall we start
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;

// creating the Item objects that belong to the selected category
If ($xoopsModuleConfig['orderbydate'] == 1) {
    $sort = 'datesub';
    $order = 'DESC';
} else {
    $sort = 'weight';
    $order = 'ASC';
}

$itemsObj = $smartsection_item_handler->getAllPublished($xoopsModuleConfig['indexperpage'], $start, $categoryid, $sort, $order);

If ($itemsObj) {
    $totalItemOnPage = count($itemsObj);
} else {
    $totalItemOnPage = 0;
}

// Arrays that will hold the informations passed on to smarty variables
$category = array();
$items = array();

// Populating the smarty variables with informations related to the selected category
$category = $categoryObj->toArray(null, true);
$category['categoryPath'] = $categoryObj->getCategoryPath($xoopsModuleConfig['linkedPath']);

//$totalItem = $smartsection_category_handler->publishedItemsCount($xoopsModuleConfig['displaylastitem']);

if ($xoopsModuleConfig['displaylastitem'] == 1) {
	// Get the last smartitem
	$last_itemObj = $smartsection_item_handler->getLastPublishedByCat();
}
$lastitemsize = intval($xoopsModuleConfig['lastitemsize']);

// Creating the sub-categories objects that belong to the selected category
$subcatsObj = $smartsection_category_handler->getCategories(0, 0, $categoryid);
$total_subcats = count($subcatsObj);

//$totalItems = array();
$total_items = 0;
If ($total_subcats != 0) {
    $subcat_keys = array_keys($subcatsObj);
    foreach ( $subcat_keys as $i) {
        $subcat_id = $subcatsObj[$i]->getVar('categoryid');
            
        If (isset($totalItem[$subcat_id]) && $totalItem[$subcat_id] > 0 ) {
            if (isset($last_itemObj[$subcat_id])) {
             	$subcatsObj[$i]->setVar('last_itemid', $last_itemObj[$subcat_id]->getVar('itemid'));
                $subcatsObj[$i]->setVar('last_title_link', "<a href='item.php?itemid=" . $last_itemObj[$subcat_id]->getVar('itemid') . "'>" . $last_itemObj[$subcat_id]->title() . "</a>");
            }
        }
           // if(isset($subcatid)){
            	$subcatsObj[$i]->setVar('itemcount', $totalItem[$subcat_id]);
            	$subcats[$subcat_id] = $subcatsObj[$i]->toArray();
           		$total_items += $totalItem[$subcat_id];
            //}
      //}replacé à la ligne 95
    }
        if (isset($subcats)) {
    	$xoopsTpl->assign('subcats', $subcats);
    }
}
   
$thiscategory_itemcount = isset($totalItem[$categoryid]) ? $totalItem[$categoryid] : 0;
$category['total'] = $thiscategory_itemcount + $total_items;
if (count($itemsObj)>0) {
    $userids = array();
    if($itemsObj){
	    foreach ($itemsObj as $key => $thisitem) {
	        $itemids[] = $thisitem->getVar('itemid');
	        $userids[$thisitem->uid()] = 1;
	    }
    }
    $member_handler = &xoops_gethandler('member');
    $users = $member_handler->getUsers(new Criteria('uid', "(".implode(',', array_keys($userids)).")", "IN"), true);
    // Adding the items of the selected category
    
    for ( $i = 0; $i < $totalItemOnPage; $i++ ) {
		$item = $itemsObj[$i]->toArray();
		$item['categoryname'] = $categoryObj->name();
		$item['categorylink'] = "<a href='" . SMARTSECTION_URL . "category.php?categoryid=" . $itemsObj[$i]->categoryid() . "'>" . $categoryObj->name() . "</a>";
		$item['who_when'] = $itemsObj[$i]->getWhoAndWhen($users);

        $xoopsTpl->append('items', $item);
    }
    //var_dump( $last_itemObj[$categoryObj->getVar('categoryid')]);
    If (isset($last_itemObj[$categoryObj->getVar('categoryid')]) && $last_itemObj[$categoryObj->getVar('categoryid')]) {
    	
        $category['last_itemid'] = $last_itemObj[$categoryObj->getVar('categoryid')]->getVar('itemid');
        $category['last_title_link'] = "<a href='item.php?itemid=" . $last_itemObj[$categoryObj->getVar('categoryid')]->getVar('itemid') . "'>" . $last_itemObj[$categoryObj->getVar('categoryid')]->title($lastitemsize) . "</a>";    }
}

// Language constants

$xoopsTpl->assign(array('lang_on' => _MD_SS_ON, 'lang_postedby' => _MD_SS_POSTEDBY, 'lang_total' => $totalItemOnPage, 'lang_title' => _MD_SS_TITLE, 'lang_datesub' => _MD_SS_DATESUB, 'lang_hits' => _MD_SS_HITS));
$xoopsTpl->assign('sectionname', $myts->displayTarea($xoopsModule->getVar('name')));
$xoopsTpl->assign('whereInSection', $myts->displayTarea($xoopsModule->getVar('name')));
$xoopsTpl->assign('modulename', $xoopsModule->dirname());
$xoopsTpl->assign('lang_category_summary', sprintf(_MD_SS_CATEGORY_SUMMARY,$categoryObj->name()));
$xoopsTpl->assign('lang_category_summary_info', sprintf(_MD_SS_CATEGORY_SUMMARY_INFO,$categoryObj->name()));
$xoopsTpl->assign('lang_items_title', sprintf(_MD_SS_ITEMS_TITLE,$categoryObj->name()));
$xoopsTpl->assign('lang_items_info', _MD_SS_ITEMS_INFO);
$xoopsTpl->assign('module_home', ss_module_home($xoopsModuleConfig['linkedPath']));
$xoopsTpl->assign('categoryPath', $category['categoryPath']);
$xoopsTpl->assign('lang_name_column',_MD_SS_NAME);
$xoopsTpl->assign('lang_empty',_MD_SS_EMPTY);
$xoopsTpl->assign('lang_view_more',_MD_SS_VIEW_MORE);
//$xoopsTpl->assign('lang_items_list', _MD_SS_ITEMS_LIST);
//$xoopsTpl->assign('lang_link_xplain', _MD_SS_LINK_XPLAIN);

// The Navigation Bar
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
$pagenav = new XoopsPageNav($thiscategory_itemcount, $xoopsModuleConfig['indexperpage'], $start, 'start', 'categoryid=' . $categoryObj->getVar('categoryid'));
If ($xoopsModuleConfig['useimagenavpage'] == 1) {
    $category['navbar'] = '<div style="text-align:right;">' . $pagenav->renderImageNav() . '</div>';
} else {
    $category['navbar'] = '<div style="text-align:right;">' . $pagenav->renderNav() . '</div>';
}
//echo  $category['last_title_link'];exit;
$xoopsTpl->assign('category', $category);

// MetaTag Generator
smartsection_createMetaTags($categoryObj->name(), '', $categoryObj->description());

if (file_exists(XOOPS_ROOT_PATH . '/modules/smarttie/smarttie_links.php')) {
	include_once XOOPS_ROOT_PATH . '/modules/smarttie/smarttie_links.php';
	$xoopsTpl->assign('smarttie',1);
}
include_once(XOOPS_ROOT_PATH . "/footer.php");

?>