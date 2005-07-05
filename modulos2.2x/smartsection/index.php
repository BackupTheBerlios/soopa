<?php

/**
* $Id: index.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("header.php");


global $smartsection_category_handler, $smartsection_item_handler, $xoopsUser, $xoopsModuleConfig;

// At which record shall we start for the Categories
$catstart = isset($_GET['catstart']) ? intval($_GET['catstart']) : 0;

// At which record shall we start for the ITEM
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;

$totalCategories = $smartsection_category_handler->getCategoriesCount(0);

$item_page_id = isset($_GET['page']) ? intval($_GET['page']) : -1;

// Total number of published ITEM in the module
$totalItems = $smartsection_item_handler->getItemsCount(-1, array(_SS_STATUS_PUBLISHED));
If ($totalCategories  == 0 ) {
	/*If ( ($totalCategories > 0) && ($xoopsModuleConfig['allowsubmit'] && ($xoopsModuleConfig['anonpost']) || is_object($xoopsUser))){
		redirect_header("submit.php", 2, _MD_SS_NO_TOP_PERMISSIONS);
	} else {*/
		redirect_header("../../index.php", 2, _MD_SS_NO_TOP_PERMISSIONS . "---");
	//}
	exit;
}

$xoopsOption['template_main'] = 'smartsection_index.html';

include_once(XOOPS_ROOT_PATH . "/header.php");
include_once("footer.php");

// Creating the categories objects
$categoriesObj = $smartsection_category_handler->getCategories($xoopsModuleConfig['catperpage'], $catstart);
// If no categories are found, exit
$totalCategoriesOnPage = count($categoriesObj);
If ($totalCategoriesOnPage  == 0 ) {
	redirect_header("javascript:history.go(-1)", 2, _MD_SS_NO_CAT_EXISTS);
	exit;
}
// Arrays that will hold the informations passed on to smarty variables

$items = array();

$subcats = $smartsection_category_handler->getSubCats($categoriesObj);

$totalItems = $smartsection_category_handler->publishedItemsCount();

if ($xoopsModuleConfig['displaylastitem'] == 1) {
	// Get the last smartsection in each category
	$last_itemObj = $smartsection_item_handler->getLastPublishedByCat();
}
$lastitemsize = intval($xoopsModuleConfig['lastitemsize'])	;
$categories = array();
foreach ($categoriesObj as $cat_id => $category) {
	$total = 0;
	if (isset($subcats[$cat_id])) {
		foreach ($subcats[$cat_id] as $key => $subcat) {
			$subcat_id = $subcat->getVar('categoryid');
			if (isset($totalItems[$subcat_id]) && $totalItems[$subcat_id] > 0) {
				if (isset($last_itemObj[$subcat_id])) {
					$subcat->setVar('last_itemid', $last_itemObj[$subcat_id]->getVar('itemid'));
					$subcat->setVar('last_title_link', "<a href='item.php?itemid=" . $last_itemObj[$subcat_id]->getVar('itemid') . "'>" . $last_itemObj[$subcat_id]->title() . "</a>");
				}
			}
			
			$numItems= isset($totalItems[$subcat_id])? $totalItems[$subcat_id] :0;
			$subcat->setVar('itemcount', $numItems);
			$categories[$cat_id]['subcats'][$subcat_id] = $subcat->toArray();
			$total += $numItems;
		}
	}
	if (isset($totalItems[$cat_id]) && $totalItems[$cat_id] > 0) {
		$total += $totalItems[$cat_id];
	}
	if ($total > 0) {
		if (isset($last_itemObj[$cat_id])) {
			$category->setVar('last_itemid', $last_itemObj[$cat_id]->getVar('itemid'));
			$category->setVar('last_title_link', "<a href='item.php?itemid=" . $last_itemObj[$cat_id]->getVar('itemid') . "'>" . $last_itemObj[$cat_id]->title() . "</a>");
		}
		$category->setVar('itemcount', $total);
		if (!isset($categories[$cat_id])) {
			$categories[$cat_id] = array();
		}
	}
	if(isset($categories[$cat_id])){
		$categories[$cat_id] = $category->toArray($categories[$cat_id]);
		$categories[$cat_id]['categoryPath'] = $category->getCategoryPath($xoopsModuleConfig['linkedPath']);
	}
	
}
$xoopsTpl->assign('categories', $categories);

// Creating the last ITEMs
$itemsObj = $smartsection_item_handler->getAllPublished($xoopsModuleConfig['indexperpage'], $start);
$totalItemsOnPage = count($itemsObj);
$allcategories = $smartsection_category_handler->getObjects(null, true);
If ($itemsObj) {
	$userids = array();
	foreach ($itemsObj as $key => $thisitem) {
		$itemids[] = $thisitem->getVar('itemid');
		$userids[$thisitem->uid()] = 1;
	}
	
	$member_handler = &xoops_gethandler('member');
	$users = $member_handler->getUsers(new Criteria('uid', "(".implode(',', array_keys($userids)).")", "IN"), true);
	for ( $i = 0; $i < $totalItemsOnPage; $i++ ) {
		$item = $itemsObj[$i]->toArray($item_page_id);
		$item['categoryname'] = $allcategories[$itemsObj[$i]->categoryid()]->name();
		$item['categorylink'] = "<a href='" . XOOPS_URL . "/modules/smartsection/category.php?categoryid=" . $itemsObj[$i]->categoryid() . "'>" . $allcategories[$itemsObj[$i]->categoryid()]->name() . "</a>";
		$item['who_when'] = $itemsObj[$i]->getWhoAndWhen($users);
		
		$xoopsTpl->append('items', $item);
		
	}
}
/// sizeof($items);exit;
// Language constants
$moduleName = $myts->displayTarea($xoopsModule->getVar('name'));
$xoopsTpl->assign(array('lang_on' => _MD_SS_ON, 'lang_postedby' => _MD_SS_POSTEDBY, 'lang_total' => $totalItemsOnPage, 'lang_item' => _MD_SS_TITLE, 'lang_datesub' => _MD_SS_DATESUB, 'lang_hits' => _MD_SS_HITS));
$xoopsTpl->assign('lang_mainintro', $myts->displayTarea($xoopsModuleConfig['indexwelcomemsg'], 1));
$xoopsTpl->assign('sectionname', $moduleName);
$xoopsTpl->assign('whereInSection', $moduleName);
$xoopsTpl->assign('module_home', ss_module_home(false));
$xoopsTpl->assign('indexfooter', ss_getConfig('indexfooter'));

// Category Navigation Bar
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
$pagenav = new XoopsPageNav($totalCategories, $xoopsModuleConfig['catperpage'], $catstart, 'catstart', '');
If ($xoopsModuleConfig['useimagenavpage'] == 1) {
	$xoopsTpl->assign('catnavbar', '<div style="text-align:right;">' . $pagenav->renderImageNav() . '</div>');
} else {
	$xoopsTpl->assign('catnavbar', '<div style="text-align:right;">' . $pagenav->renderNav() . '</div>');
}

// ITEM Navigation Bar
$pagenav = new XoopsPageNav($totalItems, $xoopsModuleConfig['indexperpage'], $start, 'start', '');
If ($xoopsModuleConfig['useimagenavpage'] == 1) {
	$xoopsTpl->assign('navbar', '<div style="text-align:right;">' . $pagenav->renderImageNav() . '</div>');
} else {
	$xoopsTpl->assign('navbar', '<div style="text-align:right;">' . $pagenav->renderNav() . '</div>');
}
//show subcategories
$xoopsTpl->assign('show_subcats', $xoopsModuleConfig['show_subcats']);
$xoopsTpl->assign('displaylastitems', $xoopsModuleConfig['displaylastitems']);

// MetaTag Generator
smartsection_createMetaTags($moduleName, '', $myts->displayTarea($xoopsModuleConfig['indexwelcomemsg']));

include_once(XOOPS_ROOT_PATH . "/footer.php");

?>