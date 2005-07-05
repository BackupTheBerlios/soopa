<?php

/**
* $Id: 0_8_x_to_0_9_2.php,v 1.1 2005/07/05 05:34:14 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("../../../mainfile.php");
include_once(XOOPS_ROOT_PATH . "/header.php");

function createField($field, $table)
{
	global $xoopsDB;
	
	$sql = "ALTER TABLE " . $xoopsDB->prefix($table) . "
        ADD $field
		";
	
	$result = $xoopsDB->queryF($sql);
	
	If (!$result) {
		// Problem with the query
		echo "- An error occured while altering the table '$table'.<br />";
		echo "- Here is the SQL query we tried to execute : $sql<br />";
		echo "- Here is the error : " . mysql_errno() . ": " . mysql_error(). "<br />\n";
		return false;
	} else {
		echo "- The field '$field' was successfully added to the table '$table'.<br />";
		return true;	
	}
}

function fieldExists($field, $table)
{
	global $xoopsDB;
	
	$sql = "SHOW COLUMNS FROM " . $xoopsDB->prefix($table) . " LIKE '$field' ";
	
	$result = $xoopsDB->queryF($sql);
	
	If (!$result) {
		// Problem with the query
		echo "- An error occured while checking if the field '$field' exists." . "<br />\n";
		echo "- Here is the error : " . mysql_errno() . ": " . mysql_error(). "<br />\n";
		echo "- We will try an create it anyway.<br />\n";
		return -1;
	} else {
		// No problem in the query, let's continue
		$ret = 0;
		$rowCount = $xoopsDB->getRowsNum($result);
		if ($rowCount == 0) {
			// The field was not found so it does not exists
			echo "- The field '$field' does not exist. We will create it." . "<br />\n";
			return 0;
		} else {
			// The fiels exists
			echo "- The field '$field' already exists." . "<br />\n";
			return 1;
		}
	}
}

Global $xoopsDB;

$errors = false;
$moduldeVersion = "SmartSection 0.92";
$updateFile = "0_8_to_0_81.php";

echo "<u><b>$moduldeVersion upgrade script</b></u><br /><br />";

// Check to see if display_summary field is there
if (fieldExists('display_summary', 'smartsection_items') < 1)
{
	// Let's try and create it
	if (!createField("`display_summary` tinyint(1) NOT NULL default '1'", 'smartsection_items')) {
		$errors = true;	
	}
}

// Check to see if image field is there
if (fieldExists('image', 'smartsection_items') < 1)
{
	// Let's try and create it
	if (!createField("`image` varchar(255) NOT NULL default ''", 'smartsection_items')) {
		$errors = true;	
	}
}

if (!$errors) 
{
	$myts =& MyTextSanitizer::getInstance();
	$smiley = ";-)"; 
	$smiley = $myts->displayTarea($smiley);
	echo "<br /><b>$moduldeVersion was successfully upgraded ! </b><br /><br />";
	echo "Please delete this file : modules/smartsection/update/$updateFile<br />";
	echo "<br /><b>Enjoy $moduldeVersion $smiley </b>";
	echo ;
}
include_once(XOOPS_ROOT_PATH . "/footer.php");

?>