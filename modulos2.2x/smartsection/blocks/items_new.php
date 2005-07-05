<?php

/**
* $Id: items_new.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

function b_items_new_show($options)
{	
	include_once(XOOPS_ROOT_PATH."/modules/smartsection/include/common.php");	
	
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
	$totalitems = count($itemsObj);
	If ($itemsObj) {
		for ( $i = 0; $i < $totalitems; $i++ ) {
            $newitems = array();
            $newitems['linktext'] = $itemsObj[$i]->title();
            $newitems['id'] = $itemsObj[$i]->itemid();
            if ($sort == "datesub") {
                $newitems['new'] = $itemsObj[$i]->datesub();
            } elseif ($sort == "counter") {
                $newitems['new'] = $itemsObj[$i]->counter();
            } elseif ($sort == "weight") {
                $newitems['new'] = $itemsObj[$i]->weight();
            } 
			
			$block['newitems'][] = $newitems;		
		}
	}
	
	return $block;	
} 

function b_items_new_edit($options)
{
    global $xoopsDB, $xoopsModule, $xoopsUser;
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