<?php

/**
* $Id: search.inc.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

function smartsection_search($queryarray, $andor, $limit, $offset, $userid)
{
	include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/functions.php';
	
	$ret = array();
    
	if (!isset($smartsection_item_handler)) {
		$smartsection_item_handler = xoops_getmodulehandler('item', 'smartsection');
	}
	
	if ($queryarray == ''){
		$keywords= '';
		$hightlight_key = '';
	} else {
		$keywords=implode('+', $queryarray);
		$hightlight_key = "&amp;keywords=" . $keywords;
	}		
	
	$itemsObj =& $smartsection_item_handler->getItemsFromSearch($queryarray, $andor, $limit, $offset, $userid);

	foreach ($itemsObj as $result) {
		$item['image'] = "images/smartsection.gif";
		$item['link'] = "item.php?itemid=" . $result['id'] . $hightlight_key;
		$item['title'] = "" . $result['title'];
		$item['time'] = $result['datesub'];
		$item['uid'] = $result['uid'];
		$ret[] = $item;
		unset($item);
	}	
	
	return $ret;
}

?>