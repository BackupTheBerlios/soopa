<?php

/**
* $Id: items_recent.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

function b_items_recent_show($options)
{
	include_once(XOOPS_ROOT_PATH."/modules/smartsection/include/common.php");

	$myts = &MyTextSanitizer::getInstance();
	
   	$smartModule =& ss_getModuleInfo();
	
	$block = array();
	
	If ($options[0] == 0) {
		$categoryid = -1;
	} else {
		$categoryid = $options[0];
	}
	
	$sort = $options[1];
	$order = smartsection_getOrderBy($sort);	
	$limit = $options[2];
	$smartsection_item_handler =& ss_gethandler('item');
	// creating the ITEM objects that belong to the selected category
	$itemsObj = $smartsection_item_handler->getAllPublished($limit, 0, $categoryid, $sort, $order);
	$totalItems = count($itemsObj);
	
	If ($itemsObj) {
		for ( $i = 0; $i < $totalItems; $i++ ) {
			
			$newItems['itemid'] = $itemsObj[$i]->itemid();
			$newItems['title'] = $itemsObj[$i]->title();
			$newItems['categoryname'] = $itemsObj[$i]->getCategoryName();
			$newItems['categoryid'] = $itemsObj[$i]->categoryid();
			$newItems['date'] = $itemsObj[$i]->datesub();
			$newItems['poster'] = xoops_getLinkedUnameFromId($itemsObj[$i]->uid());
			
			$block['items'][] = $newItems;			
		}
		
		$block['lang_title'] = _MB_SS_ITEMS;
		$block['lang_category'] = _MB_SS_CATEGORY;
		$block['lang_poster'] = _MB_SS_POSTEDBY;
		$block['lang_date'] = _MB_SS_DATE;
		$modulename = $myts->makeTboxData4Show($smartModule->getVar('name'));
		$block['lang_visitItem'] = _MB_SS_VISITITEM . " " . $modulename;		
	}
	
	return $block;	
}

function b_items_recent_edit($options)
{
	include_once(XOOPS_ROOT_PATH."/modules/smartsection/include/functions.php");
	
	$form = ss_createCategorySelect($options[0]);
	
	$form .= "&nbsp;<br>" . _MB_SS_ORDER . "&nbsp;<select name='options[]'>";
	
	$form .= "<option value='datesub'";
	if ($options[1] == "datesub") {
		$form .= " selected='selected'";
	}
	$form .= ">" . _MB_SS_DATE . "</option>\n";
	
	$form .= "<option value='counter'";
	if ($options[1] == "counter") {
		$form .= " selected='selected'";
	}
	$form .= ">" . _MB_SS_HITS . "</option>\n";
	
	$form .= "<option value='weight'";
	if ($options[1] == "weight") {
		$form .= " selected='selected'";
	}
	$form .= ">" . _MB_SS_WEIGHT . "</option>\n";
	
	$form .= "</select>\n";
	
	$form .= "&nbsp;" . _MB_SS_DISP . "&nbsp;<input type='text' name='options[]' value='" . $options[2] . "' />&nbsp;" . _MB_SS_ITEMS . "";
	
	return $form;
}

?>