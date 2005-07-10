<?php

// Retreive counter
$sql = 'SELECT conf_value FROM '. $xoopsDB->prefix('multimenu_counter') . " WHERE conf_key='multimenu_".$id."'";
$result = $xoopsDB->query($sql);
If ( $result ) {
	$myrow = $xoopsDB->fetchArray($result);
	$counter = $myrow['conf_value'];

// Update counter for non-admins
if ( is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->mid()) )
{
$read = $counter;
} else {
	$counter = $counter + 1;
	$sql = 'UPDATE '. $xoopsDB->prefix('multimenu_counter') . " SET conf_value=" . $counter . " WHERE conf_key='multimenu_".$id."' ";
	$result = $xoopsDB->queryF($sql);
$read = '';
}
}
?>