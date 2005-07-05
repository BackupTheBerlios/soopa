<?php

/**
* $Id: items_random_item.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

function b_items_random_item_show()
{
	include_once(XOOPS_ROOT_PATH."/modules/smartsection/include/common.php");
    
    $block = array();
	$smartsection_item_handler =& ss_gethandler('item');
    // creating the ITEM object
    $itemsObj = $smartsection_item_handler->getRandomItem('summary', array(_SS_STATUS_PUBLISHED));
    
    If ($itemsObj) {
       	$block['content'] = $itemsObj->summary();
       	$block['id'] = $itemsObj->itemid();
       	$block['lang_fullitem'] = _MB_SS_FULLITEM;
    } 
    
    return $block;
} 

?>