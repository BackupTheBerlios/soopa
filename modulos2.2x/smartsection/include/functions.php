<?php

/**
* $Id: functions.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/common.php';

function ss_xoops_cp_header()
{
	xoops_cp_header();
	
	?>
	<script type='text/javascript' src='funcs.js'></script>
	<script type='text/javascript' src='cookies.js'></script>
	<?php
	
}

function smartsection_getOrderBy($sort) 
{
    if ($sort == "datesub") {
        return "DESC";
    } elseif ($sort == "counter") {
         return "DESC";
    } elseif ($sort == "weight") {
         return "ASC";
    } 	
}
/**
 * Detemines if a table exists in the current db
 *
 * @param string $table the table name (without XOOPS prefix)
 * @return bool True if table exists, false if not
 *
 * @access public
 * @author xhelp development team
 */
function ss_TableExists($table)
{

    $bRetVal = false;
    //Verifies that a MySQL table exists
    $xoopsDB =& Database::getInstance();
    $realname = $xoopsDB->prefix($table);
    $ret = mysql_list_tables(XOOPS_DB_NAME, $xoopsDB->conn);
    while (list($m_table)=$xoopsDB->fetchRow($ret)) {
        
        if ($m_table ==  $realname) {
            $bRetVal = true;
            break;
        }
    }
    $xoopsDB->freeRecordSet($ret);
    return ($bRetVal);
}
/**
 * Gets a value from a key in the xhelp_meta table
 *
 * @param string $key
 * @return string $value
 *
 * @access public
 * @author xhelp development team
 */
function ss_GetMeta($key)
{
    $xoopsDB =& Database::getInstance();
    $sql = sprintf("SELECT metavalue FROM %s WHERE metakey=%s", $xoopsDB->prefix('smartsection_meta'), $xoopsDB->quoteString($key));
    $ret = $xoopsDB->query($sql);
    if (!$ret) {
        $value = false;
    } else {
        list($value) = $xoopsDB->fetchRow($ret);
        
    }
    return $value;
}

/**
 * Sets a value for a key in the xhelp_meta table
 *
 * @param string $key
 * @param string $value
 * @return bool TRUE if success, FALSE if failure
 *
 * @access public
 * @author xhelp development team
 */ 
function ss_SetMeta($key, $value)
{
    $xoopsDB =& Database::getInstance();
    if($ret = ss_GetMeta($key)){   
        $sql = sprintf("UPDATE %s SET metavalue = %s WHERE metakey = %s", $xoopsDB->prefix('smartsection_meta'), $xoopsDB->quoteString($value), $xoopsDB->quoteString($key));
    } else {
        $sql = sprintf("INSERT INTO %s (metakey, metavalue) VALUES (%s, %s)", $xoopsDB->prefix('smartsection_meta'), $xoopsDB->quoteString($key), $xoopsDB->quoteString($value));
    }
    $ret = $xoopsDB->queryF($sql);
    if (!$ret) {
        return false;
    }
    return true;
}

function smartsection_highlighter ($matches) {
	
	$smartConfig =& ss_getModuleConfig();
	$color = $smartConfig['highlight_color'];
	if(substr($color,0,1)!='#') {
		$color='#'.$color;
	}
	return '<span style="font-weight: bolder; background-color: '.$color.';">' . $matches[0] . '</span>';
}
function ss_getConfig($key)
{
	$configs = ss_getModuleConfig(); 
	return $configs[$key];
}

function smartsection_metagen_html2text($document)
{
	// PHP Manual:: function preg_replace
	// $document should contain an HTML document.
	// This will remove HTML tags, javascript sections
	// and white space. It will also convert some
	// common HTML entities to their text equivalent.
	// Credits : newbb2

	$search = array ("'<script[^>]*?>.*?</script>'si",  // Strip out javascript
					 "'<img.*?/>'si",       // Strip out img tags
	                 "'<[\/\!]*?[^<>]*?>'si",          // Strip out HTML tags
	                 "'([\r\n])[\s]+'",                // Strip out white space
	                 "'&(quot|#34);'i",                // Replace HTML entities
	                 "'&(amp|#38);'i",
	                 "'&(lt|#60);'i",
	                 "'&(gt|#62);'i",
	                 "'&(nbsp|#160);'i",
	                 "'&(iexcl|#161);'i",
	                 "'&(cent|#162);'i",
	                 "'&(pound|#163);'i",
	                 "'&(copy|#169);'i",
	                 "'&#(\d+);'e");                    // evaluate as php

	$replace = array ("",
					 "",
	                 "",
	                 "\\1",
	                 "\"",
	                 "&",
	                 "<",
	                 ">",
	                 " ",
	                 chr(161),
	                 chr(162),
	                 chr(163),
	                 chr(169),
	                 "chr(\\1)");

	$text = preg_replace($search, $replace, $document);
	return $text;
}

function ss_getAllowedImagesTypes()
{
	return array('jpg/jpeg', 'image/bmp', 'image/gif', 'image/jpeg', 'image/jpg', 'image/x-png', 'image/png', 'image/pjpeg');
}


function ss_module_home($withLink=true)
{
	global $smartsection_moduleName, $xoopsModuleConfig;
	if(!$xoopsModuleConfig['show_mod_name_breadcrumb']){
		return	'';
	}
	if (!$withLink)	{
		return $smartsection_moduleName;	
	} else {
		return '<a href="' . SMARTSECTION_URL . '">' . $smartsection_moduleName . '</a>';
	}
}

/**
 * Copy a file, or a folder and its contents
 *
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0.0
 * @param       string   $source    The source
 * @param       string   $dest      The destination
 * @return      bool     Returns true on success, false on failure
 */
function ss_copyr($source, $dest)
{
    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }
 
    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest);
    }
 
    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }
 
        // Deep copy directories
        if (is_dir("$source/$entry") && ($dest !== "$source/$entry")) {
            copyr("$source/$entry", "$dest/$entry");
        } else {
            copy("$source/$entry", "$dest/$entry");
        }
    }
 
    // Clean up
    $dir->close();
    return true;
}

function ss_getEditor($caption, $name, $value)
{
	$smartConfig =& ss_getModuleConfig();
	if ($smartConfig['use_wysiwyg'] == 1) {
		if ( is_readable(XOOPS_ROOT_PATH . "/class/wysiwyg/formwysiwygtextarea.php"))	{
			include_once(XOOPS_ROOT_PATH . "/class/wysiwyg/formwysiwygtextarea.php");
			$options= array
			(
			"fontname","fontsize","formatblock","forecolor","hilitecolor","bold","italic","underline","strikethrough","newline",
			"justifyleft","justifycenter","justifyright","justifyfull","separator","insertorderedlist","insertunorderedlist","indent","outdent","separator",
			"quote","code","separator","createlink","unlink","separator","inserthorizontalrule","createtable","insertimage","imagemanager","imageproperties","togglemode"
			);
			$editor = new XoopsFormWysiwygTextArea($caption, $name, $value, '100%', '400px', $options);
		} else {
			$editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 20, 60);
		}
	} else {
		$editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 20, 60);	
	}
	return $editor;
}

/**
* Thanks to the NewBB2 Development Team
*/
function &ss_admin_getPathStatus($item, $getStatus=false)
{
	if ($item == 'root') {
		$path = '';	
	} else {
		$path = $item;	
	}
	
	$thePath = ss_getUploadDir(true, $path);
	
	if(empty($thePath)) return false;
	if(@is_writable($thePath)){
		$pathCheckResult = 1;
		$path_status = _AM_SS_AVAILABLE;
	}elseif(!@is_dir($thePath)){
		$pathCheckResult = -1;
		$path_status = _AM_SS_NOTAVAILABLE." <a href=index.php?op=createdir&amp;path=$item>"._AM_SS_CREATETHEDIR.'</a>';
	}else{
		$pathCheckResult = -2;
		$path_status = _AM_SS_NOTWRITABLE." <a href=index.php?op=setperm&amp;path=$item>"._AM_SCS_SETMPERM.'</a>';
	}
	if (!$getStatus) {
	 	return $path_status;
	} else {
		return $pathCheckResult;
	}
}




/**
* Thanks to the NewBB2 Development Team
*/
function ss_admin_mkdir($target)
{
	// http://www.php.net/manual/en/function.mkdir.php
	// saint at corenova.com
	// bart at cdasites dot com
	if (is_dir($target) || empty($target)) {
		return true; // best case check first
	}
	 
	if (file_exists($target) && !is_dir($target)) {
		return false;
	}

	if (ss_admin_mkdir(substr($target,0,strrpos($target,'/')))) {
		if (!file_exists($target)) {
			$res = mkdir($target, 0777); // crawl back up & create dir tree
			ss_admin_chmod($target);
	  	    return $res;
	  }
	}
    $res = is_dir($target);
	return $res;
}

/**
* Thanks to the NewBB2 Development Team
*/
function ss_admin_chmod($target, $mode = 0777)
{
	return @chmod($target, $mode);
}


function ss_getUploadDir($local=true, $item=false)
{
	if ($item) {
		if ($item=='root') {
			$item = '';
		} else {
			$item = $item . '/';
		}
	} else {
		$item = '';
	}
	
	If ($local) {
		return XOOPS_ROOT_PATH . "/uploads/smartsection/$item";
	} else {
		return XOOPS_URL . "/uploads/smartsection/$item";
	}
}

function ss_getImageDir($item='', $local=true)
{
	if ($item) {
		$item = "images/$item";
	} else {
		$item = 'images';
	}
	
	return ss_getUploadDir($local, $item);
}

function ss_imageResize($src, $maxWidth, $maxHeight)
{
	$width = '';
	$height = '';
	$type = '';
	$attr = '';
	
	if (file_exists($src)) {
		list($width, $height, $type, $attr) = getimagesize($src);
		If ($width > $maxWidth) {
			$originalWidth = $width;
			$width = $maxWidth;
			$height = $width * $height / $originalWidth;
		}
					
		If ($height > $maxHeight) {
			$originalHeight = $height;
			$height = $maxHeight;
			$width = $height * $width / $originalHeight;
		}
		
		$attr = " width='$width' height='$height'";
	}
	return array($width, $height, $type, $attr);	
}

function ss_getHelpPath()
{
	$smartConfig =& ss_getModuleConfig();
	switch ($smartConfig['helppath_select'])
	{
		case 'docs.xoops.org' :
			return 'http://docs.xoops.org/help/ssectionh/index.htm';
		break;
		
		case 'inside' :
			return XOOPS_URL . "/modules/smartsection/doc/";
		break;	
		
		case 'custom' :
		    return $smartConfig['helppath_custom'];
		break;
	}
}

function &ss_getModuleInfo()
{
    static $smartModule;
	if (!isset($smartModule)) {
	    global $xoopsModule;
	    if (isset($xoopsModule) && is_object($xoopsModule) && $xoopsModule->getVar('dirname') == 'smartsection') {
	        $smartModule =& $xoopsModule;
	    }
	    else {
	        $hModule = &xoops_gethandler('module');
	        $smartModule = $hModule->getByDirname('smartsection');
	    }
	}
	return $smartModule;
}

function &ss_getModuleConfig()
{
    static $smartConfig;
    if (!$smartConfig) {
        global $xoopsModule;
	    if (isset($xoopsModule) && is_object($xoopsModule) && $xoopsModule->getVar('dirname') == 'smartsection') {
	        global $xoopsModuleConfig;
	        $smartConfig =& $xoopsModuleConfig;
	    }
	    else {
	        $smartModule =& ss_getModuleInfo();
	        $hModConfig = &xoops_gethandler('config');
	        $smartConfig = $hModConfig->getConfigsByCat(0, $smartModule->getVar('mid'));
	    }
    }
	return $smartConfig;
}


function ss_deleteFile($dirname)
{
    // Simple delete for a file
    if (is_file($dirname)) {
        return unlink($dirname);
    }
}

function ss_formatErrors($errors=array())
{
	$ret = '';
	foreach ($errors as $key=>$value)
	{
		$ret .= "<br /> - " . $value;
	}
	return $ret;
}

/*function ss_addCategoryOption($categoryObj, $selectedid=0, $level = 0, $ret='')
{
	// Creating the category handler object
	$category_handler =& ss_gethandler('category');
	$spaces = '';
	for ( $j = 0; $j < $level; $j++ ) {
		$spaces .= '--';	
	}
		
	$ret .= "<option value='" . $categoryObj->categoryid() . "'";
	if ($selectedid == $categoryObj->categoryid()) {
		$ret .= " selected='selected'";
	}
	$ret .= ">" . $spaces . $categoryObj->name() . "</option>\n";
	
	$subCategoriesObj = $category_handler->getCategories(0, 0, $categoryObj->categoryid());
	if (count($subCategoriesObj) > 0) {
		$level++;
		foreach ( $subCategoriesObj as $catID => $subCategoryObj) {
			$ret .= ss_addCategoryOption($subCategoryObj, $selectedid, $level);	
		}		
	}
	return $ret;
}*/

function ss_createCategoryOptions($selectedid=0, $parentcategory=0, $allCatOption=true)
{
	$ret = "";
	If ($allCatOption) {
		$ret .= "<option value='0'";
		$ret .= ">" . _MB_SS_ALLCAT . "</option>\n";	
	}
	
	// Creating the category handler object
	$category_handler =& ss_gethandler('category');
	
	// Creating category objects
	$categoriesObj = $category_handler->getCategories(0, 0, $parentcategory);
	if (count($categoriesObj) > 0) {
		foreach ( $categoriesObj as $catID => $categoryObj) {
			$ret .= ss_addCategoryOption($categoryObj, $selectedid);			
		}
	} 
	return $ret;
}


function ss_getStatusArray ()
{
	$result = array("1" => _AM_SS_STATUS1,
	"2" => _AM_SS_STATUS2,
	"3" => _AM_SS_STATUS3,
	"4" => _AM_SS_STATUS4,
	"5" => _AM_SS_STATUS5,
	"6" => _AM_SS_STATUS6,
	"7" => _AM_SS_STATUS7,
	"8" => _AM_SS_STATUS8);
	return $result;
}

function ss_moderator ()
{
	global $xoopsUser, $xoopsDB, $xoopsConfig, $xoopsUser;
	
	If (!$xoopsUser) {
		$result = false;
	} else {
		$hModule = &xoops_gethandler('module');
		$hModConfig = &xoops_gethandler('config');
		
		if ($smartModule = &$hModule->getByDirname('smartsection')) {
			$module_id = $smartModule->getVar('mid');
		}
		
		$module_name = $smartModule->getVar('dirname');
		$smartConfig = &$hModConfig->getConfigsByCat(0, $smartModule->getVar('mid'));
		
		$gperm_handler = &xoops_gethandler('groupperm');
		
		$categories = $gperm_handler->getItemIds('category_moderation', $xoopsUser->getVar('uid'), $module_id);
		If (count($categories) == 0) {
			$result = false;
		} else {
			$result = true;
		}
	}
	return $result;
}

function ss_modFooter ()
{
	global $xoopsUser, $xoopsDB, $xoopsConfig;
	
	$hModule = &xoops_gethandler('module');
	$hModConfig = &xoops_gethandler('config');
	
	$smartModule = &$hModule->getByDirname('smartsection');
	$module_id = $smartModule->getVar('mid');
	
	$module_name = $smartModule->getVar('dirname');
	$smartConfig = &$hModConfig->getConfigsByCat(0, $smartModule->getVar('mid'));
	
	$module_id = $smartModule->getVar('mid');
	
	$versioninfo = &$hModule->get($smartModule->getVar('mid'));
	$modfootertxt = "Module " . $versioninfo->getInfo('name') . " - Version " . $versioninfo->getInfo('version') . "";
	
	$modfooter = "<a href='" . $versioninfo->getInfo('support_site_url') . "' target='_blank'><img src='" . XOOPS_URL . "/modules/smartsection/images/sscssbutton.gif' title='" . $modfootertxt . "' alt='" . $modfootertxt . "'/></a>";
	
	return $modfooter;
}

/**
* Checks if a user is admin of SmartSection
*
* ss_userIsAdmin()
*
* @return boolean : array with userids and uname
*/
function ss_userIsAdmin()
{
	global $xoopsUser, $xoopsModule;
	
	$result = false;
	
	$hModule = &xoops_gethandler('module');
	if ($smartModule = &$hModule->getByDirname('smartsection')) {
		$module_id = $smartModule->getVar('mid');
	}
	
	if (!empty($xoopsUser)) {
		$groups = $xoopsUser->getGroups();
		$result = (in_array(XOOPS_GROUP_ADMIN, $groups)) || ($xoopsUser->isAdmin($module_id));
	}
	return $result;
}

/**
* Checks if a user has access to a selected item. If no item permissions are
* set, access permission is denied. The user needs to have necessary category
* permission as well.
*
* ss_itemAccessGranted()
*
* @param integer $itemid : itemid on which we are setting permissions
* @param integer $ categoryid : categoryid of the item
* @return boolean : TRUE if the no errors occured
*/

// TODO : Move this function to ssItem class
function ss_itemAccessGranted($itemid, $categoryid)
{
	Global $xoopsUser;
	
	if (ss_userIsAdmin()) {
		$result = true;
	} else {
		$result = false;
		
		$groups = ($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
		
		$gperm_handler = &xoops_gethandler('groupperm');
		$hModule = &xoops_gethandler('module');
		$hModConfig = &xoops_gethandler('config');
		
		$smartModule = &$hModule->getByDirname('smartsection');
		
		$module_id = $smartModule->getVar('mid');
		// Do we have access to the parent category
		If ($gperm_handler->checkRight('category_read', $categoryid, $groups, $module_id)) {
			// Do we have access to the item ?
			If ($gperm_handler->checkRight('item_read', $itemid, $groups, $module_id)) {
				$result = true;
			} else { // No we don't !
			$result = false;
			}
		} else { // No we don't !
		$result = false;
		}
	}
	
	return $result;
}

/**
* Override ITEMs permissions of a category by the category read permissions
*
*   ss_overrideItemsPermissions()
*
* @param array $groups : group with granted permission
* @param integer $categoryid :
* @return boolean : TRUE if the no errors occured
*/
function ss_overrideItemsPermissions($groups, $categoryid)
{
	Global $xoopsDB;
	
	$result = true;
	$hModule = &xoops_gethandler('module');
	$smartModule = &$hModule->getByDirname('smartsection');
	
	$module_id = $smartModule->getVar('mid');
	$gperm_handler = &xoops_gethandler('groupperm');
	
	$sql = "SELECT itemid FROM " . $xoopsDB->prefix("smartsection_items") . " WHERE categoryid = '$categoryid' ";
	$result = $xoopsDB->query($sql);
	
	if (count($result) > 0) {
		while (list($itemid) = $xoopsDB->fetchrow($result)) {
			// First, if the permissions are already there, delete them
			$gperm_handler->deleteByModule($module_id, 'item_read', $itemid);
			// Save the new permissions
			if (count($groups) > 0) {
				foreach ($groups as $group_id) {
					$gperm_handler->addRight('item_read', $itemid, $group_id, $module_id);
				}
			}
		}
	}
	
	return $result;
}

/**
* Saves permissions for the selected item
*
*   ss_saveItemPermissions()
*
* @param array $groups : group with granted permission
* @param integer $itemID : itemid on which we are setting permissions
* @return boolean : TRUE if the no errors occured

*/
function ss_saveItemPermissions($groups, $itemID)
{
	$result = true;
	$hModule = &xoops_gethandler('module');
	$smartModule = &$hModule->getByDirname('smartsection');
	
	$module_id = $smartModule->getVar('mid');
	$gperm_handler = &xoops_gethandler('groupperm');
	// First, if the permissions are already there, delete them
	$gperm_handler->deleteByModule($module_id, 'item_read', $itemID);
	// Save the new permissions
	if (count($groups) > 0) {
		foreach ($groups as $group_id) {
			$gperm_handler->addRight('item_read', $itemID, $group_id, $module_id);
		}
	}
	return $result;
}

/**
* Saves permissions for the selected category
*
*   ss_saveCategory_Permissions()
*
* @param array $groups : group with granted permission
* @param integer $categoryid : categoryid on which we are setting permissions
* @param string $perm_name : name of the permission
* @return boolean : TRUE if the no errors occured
*/

function ss_saveCategory_Permissions($groups, $categoryid, $perm_name)
{
	$result = true;
	$hModule = &xoops_gethandler('module');
	$smartModule = &$hModule->getByDirname('smartsection');
	
	$module_id = $smartModule->getVar('mid');
	$gperm_handler = &xoops_gethandler('groupperm');
	// First, if the permissions are already there, delete them
	$gperm_handler->deleteByModule($module_id, $perm_name, $categoryid);
	// Save the new permissions
	if (count($groups) > 0) {
		foreach ($groups as $group_id) {
			$gperm_handler->addRight($perm_name, $categoryid, $group_id, $module_id);
		}
	}
	return $result;
}

/**
* Saves permissions for the selected category
*
*   ss_saveModerators()
*
* @param array $moderators : moderators uids
* @param integer $categoryid : categoryid on which we are setting permissions
* @return boolean : TRUE if the no errors occured
*/

function ss_saveModerators($moderators, $categoryid)
{
	$result = true;
	$hModule = &xoops_gethandler('module');
	$smartModule = &$hModule->getByDirname('smartsection');
	$module_id = $smartModule->getVar('mid');
	$gperm_handler = &xoops_gethandler('groupperm');
	// First, if the permissions are already there, delete them
	$gperm_handler->deleteByModule($module_id, 'category_moderation', $categoryid);
	// Save the new permissions
	if (count($moderators) > 0) {
		foreach ($moderators as $uid) {
			$gperm_handler->addRight('category_moderation', $categoryid, $uid, $module_id);
		}
	}
	return $result;
}


/**
* ss_getAdminLinks()
*
* @param integer $itemid
* @return
*/

// TODO : Move this to the ssItem class
function ss_getAdminLinks($itemid = 0)
{
	// include language file
	global $xoopsConfig;	
	
	$filePath = XOOPS_ROOT_PATH."/modules/smartsection/language/".$xoopsConfig['language']."/main.php";
	if (file_exists($filePath)) {
		include_once(XOOPS_ROOT_PATH."/modules/smartsection/language/".$xoopsConfig['language']."/main.php");
	} else {
		include_once(XOOPS_ROOT_PATH."/modules/smartsection/language/english/main.php");
	}
	
	global $xoopsUser, $xoopsDB;
	
	$smartModule =& ss_getModuleInfo();
	$smartConfig =& ss_getModuleConfig();
	
	$adminLinks = '';
	$modulePath = XOOPS_URL . "/modules/" . $smartModule->dirname() . "/";
	if ($xoopsUser && $xoopsUser->isAdmin($smartModule->getVar('mid'))) {
		// Edit button
		$adminLinks .= "<a href='" . $modulePath . "admin/item.php?op=mod&itemid=" . $itemid . "'><img src='" . $modulePath . "images/links/edit.gif'" . " title='" . _MD_SS_EDIT . "' alt='" . _MD_SS_EDIT . "'/></a>";
		$adminLinks .= " ";
		// Delete button
		$adminLinks .= "<a href='" . $modulePath . "admin/item.php?op=del&itemid=" . $itemid . "'><img src='" . $modulePath . "images/links/delete.gif'" . " title='" . _MD_SS_DELETE . "' alt='" . _MD_SS_DELETE . "'/></a>";
		$adminLinks .= " ";
	}
	// Print button
	$adminLinks .= "<a href='" . $modulePath . "print.php?itemid=" . $itemid . "' target='_blank'><img src='" . $modulePath . "images/links/print.gif' title='" . _MD_SS_PRINT . "' alt='" . _MD_SS_PRINT . "'/></a>";
	$adminLinks .= " ";
	
	// Email button
	$maillink = 'mailto:?subject=' . sprintf(_MD_SS_INTITEM, $xoopsConfig['sitename']) . '&amp;body=' . sprintf(_MD_SS_INTITEMFOUND, $xoopsConfig['sitename']) . ':  ' . $modulePath . '/item.php?itemid=' . $itemid;
	$adminLinks .= "<a href='" . $maillink . "'><img src='" . $modulePath . "images/links/friend.gif' title='" . _MD_SS_MAIL . "' alt='" . _MD_SS_MAIL . "'/></a>";
	$adminLinks .= " ";
	
	If ($smartConfig['allowupload']) {
		// Add a file button
		$adminLinks .= "<a href='" . $modulePath . "addfile.php?itemid=" . $itemid . "'><img src='" . $modulePath . "images/icon/file.gif' title='" . _MD_SS_ADD_FILE . "' alt='" . _MD_SS_ADD_FILE . "'/></a>";
		$adminLinks .= " ";
	}
	
	
	return $adminLinks;
}

/**
* ss_getLinkedUnameFromId()
*
* @param integer $userid Userid of poster etc
* @param integer $name :  0 Use Usenamer 1 Use realname
* @return
*/
function ss_getLinkedUnameFromId($userid = 0, $name = 0, $users = array())
{
	if (!is_numeric($userid)) {
		return $userid;
	}
	
	$userid = intval($userid);
	if ($userid > 0) {
	    if ($users == array()) {
	        //fetching users
	        $member_handler = &xoops_gethandler('member');
	        $user = &$member_handler->getUser($userid);
	    }
	    else {
	        if (!isset($users[$userid])) {
	            return $GLOBALS['xoopsConfig']['anonymous'];
	        }
	        $user =& $users[$userid];
	    }
		
		if (is_object($user)) {
			$ts = &MyTextSanitizer::getInstance();
			$username = $user->getVar('uname');
			$fullname = '';
			
			$fullname2 = $user->getVar('name');
			
			if (($name) && !empty($fullname2)) {
				$fullname = $user->getVar('name');
			}
			if (!empty($fullname)) {
				$linkeduser = "$fullname [<a href='" . XOOPS_URL . "/userinfo.php?uid=" . $userid . "'>" . $ts->htmlSpecialChars($username) . "</a>]";
			} else {
				$linkeduser = "<a href='" . XOOPS_URL . "/userinfo.php?uid=" . $userid . "'>" . ucwords($ts->htmlSpecialChars($username)) . "</a>";
			}
			return $linkeduser;
		}
	}
	return $GLOBALS['xoopsConfig']['anonymous'];
}

function ss_getxoopslink($url = '')
{
	$xurl = $url;
	If (strlen($xurl) > 0) {
		If ($xurl[0] = '/') {
			$xurl = str_replace('/', '', $xurl);
		}
		$xurl = str_replace('{SITE_URL}', XOOPS_URL, $xurl);
	}
	$xurl = $url;
	return $xurl;
}

function ss_adminMenu ($currentoption = 0, $breadcrumb = '')
{
	
	/* Nice buttons styles */
	echo "
    	<style type='text/css'>
    	#buttontop { float:left; width:100%; background: #e7e7e7; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }
    	#buttonbar { float:left; width:100%; background: #e7e7e7 url('" . XOOPS_URL . "/modules/smartsection/images/bg.gif') repeat-x left bottom; font-size:93%; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 12px; }
    	#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }
		#buttonbar li { display:inline; margin:0; padding:0; }
		#buttonbar a { float:left; background:url('" . XOOPS_URL . "/modules/smartsection/images/left_both.gif') no-repeat left top; margin:0; padding:0 0 0 9px; border-bottom:1px solid #000; text-decoration:none; }
		#buttonbar a span { float:left; display:block; background:url('" . XOOPS_URL . "/modules/smartsection/images/right_both.gif') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }
		/* Commented Backslash Hack hides rule from IE5-Mac \*/
		#buttonbar a span {float:none;}
		/* End IE5-Mac hack */
		#buttonbar a:hover span { color:#333; }
		#buttonbar #current a { background-position:0 -150px; border-width:0; }
		#buttonbar #current a span { background-position:100% -150px; padding-bottom:5px; color:#333; }
		#buttonbar a:hover { background-position:0% -150px; }
		#buttonbar a:hover span { background-position:100% -150px; }
		</style>
    ";
	// global $xoopsDB, $xoopsModule, $xoopsConfig, $xoopsModuleConfig;
	global $xoopsModule, $xoopsConfig;
	$myts = &MyTextSanitizer::getInstance();
	
	$tblColors = Array();
	$tblColors[0] = $tblColors[1] = $tblColors[2] = $tblColors[3] = $tblColors[4] = $tblColors[5] = $tblColors[6] = $tblColors[7] = $tblColors[8] = '';
	$tblColors[$currentoption] = 'current';
	
	//echo SMARTSECTION_ROOT_PATH . 'language/' . $xoopsConfig['language'] . '/modinfo.php';
	
	if (file_exists(SMARTSECTION_ROOT_PATH . 'language/' . $xoopsConfig['language'] . '/modinfo.php')) {
		include_once SMARTSECTION_ROOT_PATH . 'language/' . $xoopsConfig['language'] . '/modinfo.php';
	} else {
		include_once SMARTSECTION_ROOT_PATH . 'language/english/modinfo.php';
	}
	
	if (file_exists(SMARTSECTION_ROOT_PATH . 'language/' . $xoopsConfig['language'] . '/admin.php')) {
		include_once SMARTSECTION_ROOT_PATH . 'language/' . $xoopsConfig['language'] . '/admin.php';
	} else {
		include_once SMARTSECTION_ROOT_PATH . 'language/english/admin.php';
	}	
	
	echo "<div id='buttontop'>";
	echo "<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\"><tr>";
	//echo "<td style=\"width: 45%; font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;\"><a class=\"nobutton\" href=\"../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . $xoopsModule->getVar('mid') . "\">" . _AM_SS_OPTS . "</a> | <a href=\"../index.php\">" . _AM_SS_GOMOD . "</a> | <a href='" . ss_getHelpPath() ."' target=\"_blank\">" . _AM_SS_HELP . "</a> | <a href=\"about.php\">" . _AM_SS_ABOUT . "</a></td>";
	//echo "<td style=\"width: 45%; font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;\"><a class=\"nobutton\" href=\"preferences.php\">" . _AM_SS_OPTS . "</a> | <a href=\"../index.php\">" . _AM_SS_GOMOD . "</a> | <a href=\"about.php\">" . _AM_SS_ABOUT . "</a></td>";
	echo "<td style=\"width: 65%; font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;\"><a class=\"nobutton\" href=\"../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . $xoopsModule->getVar('mid') . "\">" . _AM_SS_OPTS . "</a> | <a href='" . XOOPS_URL . "/modules/system/admin.php?fct=modulesadmin&op=update&module=" . $xoopsModule->getVar('dirname') . "'>" . _AM_SS_UPDATE_MODULE . " | <a href='" . SMARTSECTION_URL . "admin/upgrade.php?op=checkTables'>" . _AM_SS_DB_CHECKTABLES . "</a> | <a href=\"../index.php\">" . _AM_SS_GOMOD . "</a> |  <a href=\"about.php\">" . _AM_SS_ABOUT . "</a></td>";
	echo "<td style=\"width: 55%; font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;\">" . $breadcrumb . "</td>";
	echo "</tr></table>";
	echo "</div>";
	
	echo "<div id='buttonbar'>";
	echo "<ul>";
	echo "<li id='" . $tblColors[0] . "'><a href=\"index.php\"><span>" . _AM_SS_INDEX . "</span></a></li>";
	echo "<li id='" . $tblColors[1] . "'><a href=\"category.php\"><span>" . _AM_SS_CATEGORIES . "</span></a></li>";
	echo "<li id='" . $tblColors[2] . "'><a href=\"item.php\"><span>" . _AM_SS_ITEMS . "</span></a></li>";
	echo "<li id='" . $tblColors[4] . "'><a href=\"permissions.php\"><span>" . _AM_SS_PERMISSIONS . "</span></a></li>";
	echo "<li id='" . $tblColors[5] . "'><a href=\"myblocksadmin.php\"><span>" . _AM_SS_BLOCKSANDGROUPS . "</span></a></li>";
	echo "</ul></div>";
}

function ss_collapsableBar($tablename = '', $iconname = '', $tabletitle = '', $tabledsc='')
{
	
	global $xoopsModule;
	echo "<h3 style=\"color: #2F5376; font-weight: bold; font-size: 14px; margin: 6px 0 0 0; \"><a href='javascript:;' onclick=\"toggle('" . $tablename . "'); toggleIcon('" . $iconname . "')\";>";
	echo "<img id='$iconname' src=" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/close12.gif alt='' /></a>&nbsp;" . $tabletitle . "</h3>";
	echo "<div id='$tablename'>";
	if ($tabledsc != '') {
		echo "<span style=\"color: #567; margin: 3px 0 12px 0; font-size: small; display: block; \">" . $tabledsc . "</span>";
	}
	

}

function ss_openclose_collapsable($name, $icon) 
{
	$urls = ss_getCurrentUrls();
	$path = $urls['phpself'];
	
	$cookie_name = $path . '_smartsection_collaps_' . $name;
	$cookie_name = str_replace('.', '_', $cookie_name);
	$cookie = ss_getCookieVar($cookie_name, '');
	
	if ($cookie == 'none') {
		echo '
		<script type="text/javascript"><!--
		toggle("' . $name . '"); toggleIcon("' . $icon . '");
			//-->
		</script>
		';	
	}
}

function ss_close_collapsable($name, $icon)
{
	echo "</div>";
	ss_openclose_collapsable($name, $icon);	
}

function ss_setCookieVar($name, $value, $time=0)
{
	if ($time == 0) {
		$time = time()+3600*24*365;	
		//$time = '';	
	}
	setcookie($name, $value, $time, '/');
}

function ss_getCookieVar($name, $default='')
{
	if ((isset($_COOKIE[$name])) && ($_COOKIE[$name] > '')) {
		return 	$_COOKIE[$name];
	} else {
		return	$default;
	}
}

function ss_getCurrentUrls(){
	$http = ((strpos(XOOPS_URL, "https://")) === false) ? ("http://") : ("https://");
	$phpself = $_SERVER['PHP_SELF'];
	$httphost = $_SERVER['HTTP_HOST'];
	$querystring = $_SERVER['QUERY_STRING'];

	If ( $querystring != '' ) {
		$querystring = '?' . $querystring;
	}

	$currenturl = $http . $httphost . $phpself . $querystring;

	$urls = array();
	$urls['http'] = $http;
	$urls['httphost'] = $httphost;
	$urls['phpself'] = $phpself;
	$urls['querystring'] = $querystring;
	$urls['full'] = $currenturl;

	return $urls;
}

function &ss_gethandler($name)
{
	static $smartsection_handlers;
	
	if (!isset($smartsection_handlers[$name])) {
		$smartsection_handlers[$name] =& xoops_getmodulehandler($name, 'smartsection');
	}
	return $smartsection_handlers[$name];
}

function ss_addCategoryOption($categoryObj, $selectedid=0, $level = 0, $ret='')
{
	// Creating the category handler object
	$category_handler =& ss_gethandler('category');
	
	$spaces = '';
	for ( $j = 0; $j < $level; $j++ ) {
		$spaces .= '--';	
	}
		
	$ret .= "<option value='" . $categoryObj->categoryid() . "'";
	if ($selectedid == $categoryObj->categoryid()) {
		$ret .= " selected='selected'";
	}
	$ret .= ">" . $spaces . $categoryObj->name() . "</option>\n";
	
	$subCategoriesObj = $category_handler->getCategories(0, 0, $categoryObj->categoryid());
	if (count($subCategoriesObj) > 0) {
		$level++;
		foreach ( $subCategoriesObj as $catID => $subCategoryObj) {
			$ret .= ss_addCategoryOption($subCategoryObj, $selectedid, $level);	
		}	
	}
	return $ret;
}

function ss_createCategorySelect($selectedid=0, $parentcategory=0, $allCatOption=true)
{
	$ret = "" . _MB_SS_SELECTCAT . "&nbsp;<select name='options[]'>";
	If ($allCatOption) {
		$ret .= "<option value='0'";
		$ret .= ">" . _MB_SS_ALLCAT . "</option>\n";	
	}
	
	// Creating the category handler object
	$category_handler =& ss_gethandler('category');
	
	// Creating category objects
	$categoriesObj = $category_handler->getCategories(0, 0, $parentcategory);
	
	if (count($categoriesObj) > 0) {
		foreach ( $categoriesObj as $catID => $categoryObj) {
			$ret .= ss_addCategoryOption($categoryObj, $selectedid);			
		}
	} 
	$ret .= "</select>\n";
	return $ret;
}

?>