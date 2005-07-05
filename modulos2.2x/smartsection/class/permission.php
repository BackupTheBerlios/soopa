<?php

/**
* $Id: permission.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Credits: Mithrandir
* Licence: GNU
*/

include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/common.php';

class SmartsectionPermissionHandler extends XoopsObjectHandler
{
	
	/*
	* Returns permissions for a certain type
	*
	* @param string $type "global", "forum" or "topic" (should perhaps have "post" as well - but I don't know)
	* @param int $id id of the item (forum, topic or possibly post) to get permissions for
	*
	* @return array
	*/
	function getGrantedGroups($type = "item", $id = null) {
		static $groups;
		
		if (!isset($groups[$type]) || ($id != null && !isset($groups[$type][$id]))) {
			$smartModule =& ss_getModuleInfo();
			//Get group permissions handler
			$gperm_handler =& xoops_gethandler('groupperm');
			
			switch ($type) {
				
				case "item":
				$gperm_name = "item_read";
				break;
				
				case "category":
				$gperm_name = "category_read";
				break;
			}
			
			//Get groups allowed for an item id
			$allowedgroups =& $gperm_handler->getGroupIds($gperm_name, $id, $smartModule->getVar('mid'));
			$groups[$type] = $allowedgroups;
		}
		//Return the permission array
		return isset($groups[$type]) ? $groups[$type] : array();
	}
	
	/*
	* Returns permissions for a certain type
	*
	* @param string $type "global", "forum" or "topic" (should perhaps have "post" as well - but I don't know)
	* @param int $id id of the item (forum, topic or possibly post) to get permissions for
	*
	* @return array
	*/
	function getGrantedItems($type = "item", $id = null) {
		global $xoopsUser;
		static $permissions;
		
		if (!isset($permissions[$type]) || ($id != null && !isset($permissions[$type][$id]))) {
			
			$smartModule =& ss_getModuleInfo();
			//Get group permissions handler
			$gperm_handler =& xoops_gethandler('groupperm');
			//Get user's groups
			$groups = is_object($xoopsUser) ? $xoopsUser->getGroups() : array(XOOPS_GROUP_ANONYMOUS);
			
			switch ($type) {
				
				case "item":
				$gperm_name = "item_read";
				break;
				
				case "category":
				$gperm_name = "category_read";
				break;
			}
			
			//Get all allowed item ids in this module and for this user's groups
			$userpermissions =& $gperm_handler->getItemIds($gperm_name, $groups, $smartModule->getVar('mid'));
			$permissions[$type] = $userpermissions;
		}
		//Return the permission array
		return isset($permissions[$type]) ? $permissions[$type] : array();
	}
	
	/**
	* Saves permissions for the selected category
	*
	*  saveCategory_Permissions()
	*
	* @param array $groups : group with granted permission
	* @param integer $categoryID : categoryID on which we are setting permissions for Categories and Forums
	* @param string $perm_name : name of the permission
	* @return boolean : TRUE if the no errors occured
	**/
	
	function saveItem_Permissions($groups, $itemid, $perm_name)
	{
		$smartModule =& ss_getModuleInfo();
		
		$result = true;
		$module_id = $smartModule->getVar('mid')   ;
		$gperm_handler =& xoops_gethandler('groupperm');
		
		// First, if the permissions are already there, delete them
		$gperm_handler->deleteByModule($module_id, $perm_name, $pageid);
		
		// Save the new permissions
		if (count($groups) > 0) {
			foreach ($groups as $group_id) {
				$gperm_handler->addRight($perm_name, $pageid, $group_id, $module_id);
			}
		}
		return $result;
	}
	
	/**
	* Delete all permission for a specific item
	*
	*  deletePermissions()
	*
	* @param integer $itemid : id of the item for which to delete the permissions
	* @return boolean : TRUE if the no errors occured
	**/
	
	function deletePermissions($itemid, $type='item')
	{
		global $xoopsModule;
		
		$smartModule =& ss_getModuleInfo();
		
		$result = true;
		$module_id = $smartModule->getVar('mid')   ;
		$gperm_handler =& xoops_gethandler('groupperm');
		
		switch ($type) {
			
			case "item":
			$gperm_name = "item_read";
			break;
			
			case "category":
			$gperm_name = "category_read";
			break;
		}
		
		$gperm_handler->deleteByModule($module_id, $gperm_name, $itemid);
		
		return $result;
	}
	
}
?>
