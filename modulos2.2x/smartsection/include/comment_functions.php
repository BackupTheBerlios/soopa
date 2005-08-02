<?php

/**
* $Id: comment_functions.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
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