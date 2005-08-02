<?php

/**
* $Id: index.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("admin_header.php");
$myts = &MyTextSanitizer::getInstance();

$op = isset($_GET['op']) ? $_GET['op'] : '';

switch ($op) {
	case "createdir":
	$path = isset($_GET['path']) ? $_GET['path'] : false;
	if ($path) {
		if ($path == 'root') {
			$path = '';	
		}
		$thePath = ss_getUploadDir(true, $path);
		
		$res = ss_admin_mkdir($thePath);
		
		
		if ($res) {
			$source = SMARTSECTION_ROOT_PATH . "images/blank.png";
			$dest = $thePath . "blank.png";
			ss_copyr($source, $dest);
		}
		$msg = ($res)?_AM_SS_DIRCREATED:_AM_SS_DIRNOTCREATED;
		
	} else {
		$msg = _AM_SS_DIRNOTCREATED;
	}
	
	redirect_header('index.php', 2, $msg . ': ' . $thePath);
	exit();
	break;
}

$itemid = isset($_POST['itemid']) ? intval($_POST['itemid']) : 0;

$pick = isset($_GET['pick']) ? intval($_GET['pick']) : 0;
$pick = isset($_POST['pick']) ? intval($_POST['pick']) : $pick;

$statussel = isset($_GET['statussel']) ? intval($_GET['statussel']) : 0;
$statussel = isset($_POST['statussel']) ? intval($_POST['statussel']) : $statussel;

$sortsel = isset($_GET['sortsel']) ? $_GET['sortsel'] : 'itemid';
$sortsel = isset($_POST['sortsel']) ? $_POST['sortsel'] : $sortsel;

$ordersel = isset($_GET['ordersel']) ? $_GET['ordersel'] : 'DESC';
$ordersel = isset($_POST['ordersel']) ? $_POST['ordersel'] : $ordersel;

$module_id = $xoopsModule->getVar('mid');
$gperm_handler = &xoops_gethandler('groupperm');
$groups = ($xoopsUser) ? ($xoopsUser->getGroups()) : XOOPS_GROUP_ANONYMOUS;

function pathConfiguration()
{
	global $xoopsModule;
	// Upload and Images Folders
	ss_collapsableBar('configtable', 'configtableicon', _AM_SS_PATHCONFIGURATION);
	echo "<br />";
	echo "<table width='100%' class='outer' cellspacing='1' cellpadding='3' border='0' ><tr>";
	echo "<td class='bg3'><b>" . _AM_SS_PATH_ITEM . "</b></td>";
	echo "<td class='bg3'><b>" . _AM_SS_PATH . "</b></td>";
	echo "<td class='bg3' align='center'><b>" . _AM_SS_STATUS . "</b></td></tr>";
	echo "<tr><td class='odd'>" . _AM_SS_PATH_FILES . "</td>";
	$upload_path = ss_getUploadDir();

	echo "<td class='odd'>" . $upload_path . "</td>";
	echo "<td class='even' style='text-align: center;'>" . ss_admin_getPathStatus('root') . "</td></tr>";
	
	echo "<tr><td class='odd'>" . _AM_SS_PATH_IMAGES . "</td>";
	$image_path = ss_getImageDir();
	echo "<td class='odd'>" . $image_path . "</td>";
	echo "<td class='even' style='text-align: center;'>" . ss_admin_getPathStatus('images') . "</td></tr>";
	
	echo "<tr><td class='odd'>" . _AM_SS_PATH_IMAGES_CATEGORY . "</td>";
	$image_path = ss_getImageDir('category');
	echo "<td class='odd'>" . $image_path . "</td>";
	echo "<td class='even' style='text-align: center;'>" . ss_admin_getPathStatus('images/category') . "</td></tr>";
	
	echo "<tr><td class='odd'>" . _AM_SS_PATH_IMAGES_ITEM . "</td>";
	$image_path = ss_getImageDir('item');
	echo "<td class='odd'>" . $image_path . "</td>";
	echo "<td class='even' style='text-align: center;'>" . ss_admin_getPathStatus('images/item') . "</td></tr>";
	
	echo "</table>";
	echo "<br />";
	
	ss_close_collapsable('configtable', 'configtableicon');
}

function buildTable()
{
	global $xoopsConfig, $xoopsModuleConfig, $xoopsModule;
	echo "<table width='100%' cellspacing='1' cellpadding='3' border='0' class='outer'>";
	echo "<tr>";
	echo "<td width='40' class='bg3' align='center'><b>" . _AM_SS_ITEMID . "</b></td>";
	echo "<td width='20%' class='bg3' align='center'><b>" . _AM_SS_ITEMCAT . "</b></td>";
	echo "<td class='bg3' align='center'><b>" . _AM_SS_TITLE . "</b></td>";
	echo "<td width='90' class='bg3' align='center'><b>" . _AM_SS_CREATED . "</b></td>";
	echo "<td width='90' class='bg3' align='center'><b>" . _AM_SS_STATUS . "</b></td>";
	echo "<td width='90' class='bg3' align='center'><b>" . _AM_SS_ACTION . "</b></td>";
	echo "</tr>";
}
// Code for the page
include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';

global $smartsection_category_handler, $smartsection_item_handler;

$startentry = isset($_GET['startentry']) ? intval($_GET['startentry']) : 0;

ss_xoops_cp_header();

global $xoopsUser, $xoopsUser, $xoopsConfig, $xoopsDB, $xoopsModuleConfig, $xoopsModule, $itemid;

ss_adminMenu(0, _AM_SS_INDEX);

// Total ITEMs -- includes everything on the table
$totalitems = $smartsection_item_handler->getItemsCount();

// Total categories
$totalcategories = $smartsection_category_handler->getCategoriesCount(-1);

// Total submitted ITEMs
$totalsubmitted = $smartsection_item_handler->getItemsCount(-1, array(_SS_STATUS_SUBMITTED));

// Total published ITEMs
$totalpublished = $smartsection_item_handler->getItemsCount(-1, array(_SS_STATUS_PUBLISHED));

// Total offline ITEMs
$totaloffline = $smartsection_item_handler->getItemsCount(-1, array(_SS_STATUS_OFFLINE));

// Total rejected
$totalrejected = $smartsection_item_handler->getItemsCount(-1, array(_SS_STATUS_REJECTED));


// Check Path Configuration
if ((ss_admin_getPathStatus('root', true) < 0) ||
(ss_admin_getPathStatus('images', true) < 0) ||
(ss_admin_getPathStatus('images/category', true) < 0) ||
(ss_admin_getPathStatus('images/item', true) < 0)
) {
	pathConfiguration();
}

// -- //
ss_collapsableBar('inventorytable', 'inventoryicon', _AM_SS_INVENTORY);
echo "<br />";
echo "<table width='100%' class='outer' cellspacing='1' cellpadding='3' border='0' ><tr>";
echo "<td class='head'>" . _AM_SS_TOTALCAT . "</td><td align='center' class='even'>" . $totalcategories . "</td>";
echo "<td class='head'>" . _AM_SS_TOTALSUBMITTED . "</td><td align='center' class='even'>" . $totalsubmitted . "</td>";
echo "<td class='head'>" . _AM_SS_TOTALPUBLISHED . "</td><td align='center' class='even'>" . $totalpublished . "</td>";
echo "<td class='head'>" . _AM_SS_TOTAL_OFFLINE . "</td><td align='center' class='even'>" . $totaloffline . "</td>";
echo "</tr></table>";
echo "<br />";

echo "<form><div style=\"margin-bottom: 12px;\">";
echo "<input type='button' name='button' onclick=\"location='category.php?op=mod'\" value='" . _AM_SS_CATEGORY_CREATE . "'>&nbsp;&nbsp;";
echo "<input type='button' name='button' onclick=\"location='item.php?op=mod'\" value='" . _AM_SS_CREATEITEM . "'>&nbsp;&nbsp;";
echo "</div></form>";

ss_close_collapsable('inventorytable', 'inventoryicon');

// Construction of lower table
ss_collapsableBar('allitemstable', 'allitemsicon', _AM_SS_ALLITEMS, _AM_SS_ALLITEMSMSG);

$showingtxt = '';
$selectedtxt = '';
$cond = "";
$selectedtxt0 = '';
$selectedtxt1 = '';
$selectedtxt2 = '';
$selectedtxt3 = '';
$selectedtxt4 = '';

$sorttxttitle = "";
$sorttxtcreated = "";
$sorttxtweight = "";
$sorttxtitemid = "";

$ordertxtasc='';
$ordertxtdesc='';

switch ($sortsel) {
	case 'title':
	$sorttxttitle = "selected='selected'";
	break;
	
	case 'datesub':
	$sorttxtcreated = "selected='selected'";
	break;
	
	case 'weight':
	$sorttxtweight = "selected='selected'";
	break;
	
	default :
	$sorttxtitemid = "selected='selected'";
	break;
}

switch ($ordersel) {
	case 'ASC':
	$ordertxtasc = "selected='selected'";
	break;
	
	default :
	$ordertxtdesc = "selected='selected'";
	break;
}

switch ($statussel) {
	case _SS_STATUS_ALL :
	$selectedtxt0 = "selected='selected'";
	$caption = _AM_SS_ALL;
	$cond = "";
	$status_explaination = _AM_SS_ALL_EXP;
	break;
	
	case _SS_STATUS_SUBMITTED :
	$selectedtxt1 = "selected='selected'";
	$caption = _AM_SS_SUBMITTED;
	$cond = " WHERE status = " . _SS_STATUS_SUBMITTED . " ";
	$status_explaination = _AM_SS_SUBMITTED_EXP;
	break;
	
	case _SS_STATUS_PUBLISHED :
	$selectedtxt2 = "selected='selected'";
	$caption = _AM_SS_PUBLISHED;
	$cond = " WHERE status = " . _SS_STATUS_PUBLISHED . " ";
	$status_explaination = _AM_SS_PUBLISHED_EXP;
	break;
	
	case _SS_STATUS_OFFLINE :
	$selectedtxt3 = "selected='selected'";
	$caption = _AM_SS_OFFLINE;
	$cond = " WHERE status = " . _SS_STATUS_OFFLINE . " ";
	$status_explaination = _AM_SS_OFFLINE_EXP;
	break;
	
	case _SS_STATUS_REJECTED :
	$selectedtxt4 = "selected='selected'";
	$caption = _AM_SS_REJECTED;
	$cond = " WHERE status = " . _SS_STATUS_REJECTED . " ";
	$status_explaination = _AM_SS_REJECTED_ITEM_EXP;
	break;
}

/* -- Code to show selected terms -- */
echo "<form name='pick' id='pick' action='" . $_SERVER['PHP_SELF'] . "' method='POST' style='margin: 0;'>";

echo "
	<table width='100%' cellspacing='1' cellpadding='2' border='0' style='border-left: 1px solid silver; border-top: 1px solid silver; border-right: 1px solid silver;'>
		<tr>
			<td><span style='font-weight: bold; font-variant: small-caps;'>" . _AM_SS_SHOWING . " " . $caption . "</span></td>
			<td align='right'>" . _AM_SS_SELECT_SORT . " 
				<select name='sortsel' onchange='submit()'>
					<option value='itemid' $sorttxtitemid>" . _AM_SS_ID . "</option>
					<option value='title' $sorttxttitle>" . _AM_SS_TITLE . "</option>
					<option value='datesub' $sorttxtcreated>" . _AM_SS_CREATED . "</option>
					<option value='weight' $sorttxtweight>" . _AM_SS_WEIGHT . "</option>
				</select>
				<select name='ordersel' onchange='submit()'>
					<option value='ASC' $ordertxtasc>" . _AM_SS_ASC . "</option>
					<option value='DESC' $ordertxtdesc>" . _AM_SS_DESC . "</option>
				</select>
			" . _AM_SS_SELECT_STATUS . " : 
				<select name='statussel' onchange='submit()'>
					<option value='0' $selectedtxt0>" . _AM_SS_ALL . " [$totalitems]</option>
					<option value='1' $selectedtxt1>" . _AM_SS_SUBMITTED . " [$totalsubmitted]</option>
					<option value='2' $selectedtxt2>" . _AM_SS_PUBLISHED . " [$totalpublished]</option>
					<option value='3' $selectedtxt3>" . _AM_SS_OFFLINE . " [$totaloffline]</option>
					<option value='4' $selectedtxt4>" . _AM_SS_REJECTED . " [$totalrejected]</option>
				</select>
			</td>
		</tr>
	</table>
	</form>";


// Get number of entries in the selected state
$statusSelected = ($statussel == 0) ? -1 : $statussel;

$numrows = $smartsection_item_handler->getItemsCount(-1, $statusSelected);
// creating the Q&As objects
$itemsObj = $smartsection_item_handler->getItems($xoopsModuleConfig['perpage'], $startentry, $statusSelected, -1, $sortsel, $ordersel);

$totalItemsOnPage = count($itemsObj);

buildTable();

if ($numrows > 0) {
	
	for ( $i = 0; $i < $totalItemsOnPage; $i++ ) {
		// Creating the category object to which this item is linked
		$categoryObj =& $itemsObj[$i]->category();
		
		$approve = '';
		
		switch ($itemsObj[$i]->status()) {
			
			case _SS_STATUS_SUBMITTED :
			$statustxt = _AM_SS_SUBMITTED;
			$approve = "<a href='item.php?op=mod&itemid=" . $itemsObj[$i]->itemid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/approve.gif' title='" . _AM_SS_SUBMISSION_MODERATE . "' alt='" . _AM_SS_SUBMISSION_MODERATE . "' /></a>&nbsp;";
			$delete = "<a href='item.php?op=del&itemid=" . $itemsObj[$i]->itemid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/delete.gif' title='" . _AM_SS_DELETEITEM . "' alt='" . _AM_SS_DELETEITEM . "' /></a>";
			$modify = "";
			break;
			
			case _SS_STATUS_PUBLISHED :
			$statustxt = _AM_SS_PUBLISHED;
			$approve = "";
			$modify = "<a href='item.php?op=mod&itemid=" . $itemsObj[$i]->itemid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/edit.gif' title='" . _AM_SS_ITEM_EDIT . "' alt='" . _AM_SS_ITEM_EDIT . "' /></a>&nbsp;";
			$delete = "<a href='item.php?op=del&itemid=" . $itemsObj[$i]->itemid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/delete.gif' title='" . _AM_SS_DELETEITEM . "' alt='" . _AM_SS_DELETEITEM . "' /></a>";
			break;
			
			case _SS_STATUS_OFFLINE :
			$statustxt = _AM_SS_OFFLINE;
			$approve = "";
			$modify = "<a href='item.php?op=mod&itemid=" . $itemsObj[$i]->itemid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/edit.gif' title='" . _AM_SS_ITEM_EDIT . "' alt='" . _AM_SS_ITEM_EDIT . "' /></a>&nbsp;";
			$delete = "<a href='item.php?op=del&itemid=" . $itemsObj[$i]->itemid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/delete.gif' title='" . _AM_SS_DELETEITEM . "' alt='" . _AM_SS_DELETEITEM . "' /></a>";
			break;
			
			case _SS_STATUS_REJECTED :
			$statustxt = _AM_SS_REJECTED;
			$approve = "";
			$modify = "<a href='item.php?op=mod&itemid=" . $itemsObj[$i]->itemid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/edit.gif' title='" . _AM_SS_REJECTED_EDIT . "' alt='" . _AM_SS_REJECTED_EDIT . "' /></a>&nbsp;";
			$delete = "<a href='item.php?op=del&itemid=" . $itemsObj[$i]->itemid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/delete.gif' title='" . _AM_SS_DELETEITEM . "' alt='" . _AM_SS_DELETEITEM . "' /></a>";
			break;
			
			case "default" :
			default :
			$statustxt = _AM_SS_STATUS0;
			$approve = "";
			$modify = "";
			break;
		}
		
		echo "<tr>";
		echo "<td class='head' align='center'>" . $itemsObj[$i]->itemid() . "</td>";
		echo "<td class='even' align='left'>" . $categoryObj->getCategoryLink() . "</td>";
		echo "<td class='even' align='left'>" . $itemsObj[$i]->getItemLink() . "</td>";
		echo "<td class='even' align='center'>" . $itemsObj[$i]->datesub() . "</td>";
		echo "<td class='even' align='center'>" . $statustxt . "</td>";
		echo "<td class='even' align='center'> ". $approve . $modify . $delete . "</td>";
		echo "</tr>";
	}
} else {
	// that is, $numrows = 0, there's no entries yet
	echo "<tr>";
	echo "<td class='head' align='center' colspan= '7'>" . _AM_SS_NOITEMSSEL . "</td>";
	echo "</tr>";
}
echo "</table>\n";
echo "<span style=\"color: #567; margin: 3px 0 18px 0; font-size: small; display: block; \">$status_explaination</span>";
$pagenav = new XoopsPageNav($numrows, $xoopsModuleConfig['perpage'], $startentry, 'startentry', "statussel=$statussel&amp;sortsel=$sortsel&amp;ordersel=$ordersel");

if ($xoopsModuleConfig['useimagenavpage'] == 1) {
	echo '<div style="text-align:right; background-color: white; margin: 10px 0;">' . $pagenav->renderImageNav() . '</div>';
} else {
	echo '<div style="text-align:right; background-color: white; margin: 10px 0;">' . $pagenav->renderNav() . '</div>';
}
// ENDs code to show active entries
ss_close_collapsable('allitemstable', 'allitemsicon');
// Close the collapsable div


// Check Path Configuration
if ((ss_admin_getPathStatus('root', true) > 0) &&
(ss_admin_getPathStatus('images', true) > 0) &&
(ss_admin_getPathStatus('images/category', true) > 0) &&
(ss_admin_getPathStatus('images/item', true) > 0)
) {
	pathConfiguration();
}
echo "</div>";

echo "</div>";


$modfooter = ss_modFooter();
echo "<div align='center'>" . $modfooter . "</div>";

xoops_cp_footer();

?>