<?php

/**
* $Id: comment_functions.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

function smartsection_com_update($item_id, $total_num)
{
    $db = &Database::getInstance();
    $sql = 'UPDATE ' . $db->prefix('smartsection_items') . ' SET comments = ' . $total_num . ' WHERE itemid = ' . $item_id;
    $db->query($sql);
} 

function smartsection_com_approve(&$comment)
{ 
    // notification mail here
} 

?>