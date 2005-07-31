<?php
// $Id: permission.php,v 1.4 2005/07/31 18:23:50 mauriciodelima Exp $
// ------------------------------------------------------------------------ //
// XOOPS - PHP Content Management System                      //
// Copyright (c) 2000 XOOPS.org                           //
// <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// //
// You may not change or alter any portion of this comment or credits       //
// of supporting developers from this source code or any supporting         //
// source code which is considered copyrighted (c) material of the          //
// original comment or credit authors.                                      //
// //
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //
// //
// You should have received a copy of the GNU General Public License        //
// along with this program; if not, write to the Free Software              //
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------ //
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //
if (!defined('FORUM_PERM_ITEMS')) define('FORUM_PERM_ITEMS', 'access,view,post,reply,edit,delete,addpoll,vote,attach,noapprove');

class NewbbPermissionHandler extends XoopsObjectHandler {
    /*
	* Returns permissions for a certain type
	*
	* @param string $type "global", "forum" (should perhaps have "post" as well - but I don't know)
	* @param int $id id of the item (forum, topic or possibly post) to get permissions for
	*
	* @return array
	*/
    function getPermissions($type = "forum", $id = null)
    {
        global $xoopsUser;
        static $permissions;

        $type = (strtolower($type) !="category")?"forum":"category";
        
        $module_handler = &xoops_gethandler('module');
        $xoopsNewBB = &$module_handler->getByDirname('newbb');

        if (!isset($permissions[$type]) || ($id != null && !isset($permissions[$type][$id]))) {
            // Get group permissions handler
            $gperm_handler = &xoops_gethandler('groupperm');
            // Get user's groups
            $groups = is_object($xoopsUser) ? $xoopsUser->getGroups() : array(XOOPS_GROUP_ANONYMOUS);
            // Create string of groupid's separated by commas, inserted in a set of brackets
            if (count($groups) < 1) return false;
            $groupstring = "(" . implode(',', $groups) . ")";
            // Create criteria for getting only the permissions regarding this module and this user's groups
            $criteria = new CriteriaCompo(new Criteria('gperm_modid', $xoopsNewBB->getVar('mid')));
            $criteria->add(new Criteria('gperm_groupid', $groupstring, 'IN'));
            if ($id != null) {
                if (is_array($id)) {
                    $counter = 0;
                    $idstring = "(" . implode(',', $id) . ")";
                    $criteria->add(new Criteria('gperm_itemid', $idstring, 'IN'));
                } else {
                    $criteria->add(new Criteria('gperm_itemid', intval($id)));
                }
            }

            switch ($type) {
                case "forum":
                    $items = array_map("trim",explode(',', FORUM_PERM_ITEMS));
                    $full_items = array();
                    foreach($items as $item) {
                        $full_items[] = "'forum_" . $item . "'";
                    }
                    $gperm_names = implode(',', $full_items);
                    break;

                /*
                case "forum":
                    $gperm_names = "'global_forum_access'";
                    break;
                */

                case "category":
                    $gperm_names = "'category_access'";
                    break;
            }
            // Add criteria for gpermnames
            $criteria->add(new Criteria('gperm_name', "(" . $gperm_names . ")", 'IN'));
            // Get all permission objects in this module and for this user's groups
            $userpermissions = &$gperm_handler->getObjects($criteria, true);
            // Set the granted permissions to 1
            foreach ($userpermissions as $gperm_id => $gperm) {
                $permissions[$type][$gperm->getVar('gperm_itemid')][$gperm->getVar('gperm_name')] = 1;
            }
        }
        // Return the permission array
        return isset($permissions[$type]) ? $permissions[$type] : array();
    }

    function &permission_table($permission_set, $forum = 0, $topic_locked = false, $isadmin = false)
    {
        global $xoopsUser;

        if (is_object($forum)) $forumid = $forum->getVar('forum_id');
        else $forumid = $forum;

        $perm_items = explode(',', FORUM_PERM_ITEMS);
        $perm = array();
        foreach($perm_items as $item) {
	        if($item=="access") continue;
            if ($isadmin ||
                (isset($permission_set[$forumid]['forum_' . $item]) && (!$topic_locked || $item=="view"))
                    ) {
                $perm[] = constant('_MD_CAN_' . strtoupper($item));
            } else {
                $perm[] = constant('_MD_CANNOT_' . strtoupper($item));
            }
        }

        return $perm;
    }
    
    function deleteByForum($forum)
    {
        $gperm_handler = &xoops_gethandler('groupperm');
        $criteria = new CriteriaCompo(new Criteria('gperm_modid', $GLOBALS["xoopsModule"]->getVar('mid')));
        $criteria->add(new Criteria('gperm_name', '('.FORUM_PERM_ITEMS.')', 'IN'));
        $criteria->add(new Criteria('gperm_itemid', $forum));
        return $gperm_handler->deleteAll($criteria);
    }
    
    function deleteByCategory($category)
    {
        $gperm_handler = &xoops_gethandler('groupperm');
        $criteria = new CriteriaCompo(new Criteria('gperm_modid', $GLOBALS["xoopsModule"]->getVar('mid')));
        $criteria->add(new Criteria('gperm_name', 'category_access'));
        $criteria->add(new Criteria('gperm_itemid', $category));
        return $gperm_handler->deleteAll($criteria);
    }

    function setCategoryPermission($category, $groups=null)
    {
	    if(is_object($GLOBALS["xoopsModule"]) && $GLOBALS["xoopsModule"]->getVar("dirname")=="newbb"){
		    $mid = $GLOBALS["xoopsModule"]->getVar("mid");
	    }else{
    		$module_handler =& xoops_gethandler('module');
			$newbb =& $module_handler->getByDirname('newbb');
			$mid = $newbb->getVar("mid");
	    }
		$groupperm_handler =& xoops_gethandler('groupperm');
		if(!is_array($groups)){
		    $member_handler =& xoops_gethandler('member');
		    $glist =& $member_handler->getGroupList();
		    $groups = array_keys($glist);
	    }
		$ids = $groupperm_handler->getGroupIds("category_access", $category, $mid);
	    $ids_add = array_diff($groups, $ids);
	    $ids_rmv = array_diff($ids, $groups);
		foreach($ids_add as $group){
			$groupperm_handler->addRight("category_access", $category, $group, $mid);
		}
		foreach($ids_rmv as $group){
			$groupperm_handler->deleteRight("category_access", $category, $group, $mid);
		}
		
        return true;
    }
        
    function applyTemplate($forum, $mid=null)
    {
	    if(empty($mid)){
		    if(is_object($GLOBALS["xoopsModule"]) && $GLOBALS["xoopsModule"]->getVar("dirname")=="newbb"){
			    $mid = $GLOBALS["xoopsModule"]->getVar("mid");
		    }else{
    			$module_handler =& xoops_gethandler('module');
				$newbb =& $module_handler->getByDirname('newbb');
				$mid = $newbb->getVar("mid");
		    }
	    }
	    $perm_template = $this->getTemplate();
	    if(empty($perm_template)) return false;
	    
		$groupperm_handler =& xoops_gethandler('groupperm');
	    $member_handler =& xoops_gethandler('member');
	    $glist =& $member_handler->getGroupList();
		$perms = array_map("trim",explode(',', FORUM_PERM_ITEMS));
		foreach(array_keys($glist) as $group){
		    foreach($perms as $perm){
				if(empty($perm_template[$group][$perm])){
					$groupperm_handler->addRight($perm, $forum, $group, $mid);
				}
		    }
		}
	    return true;
    }
    
    function &getTemplate()
    {
		$file_perm = XOOPS_CACHE_PATH."/newbb_perm_template.php";
		if(!is_readable($file_perm)) {
			//newbb_message("the template file can not be read: ".$file_perm);
			return null;
		}
		include($file_perm);
		$perms = unserialize($perms);
		return $perms;
    }
    
    function &setTemplate($perms)
    {
		$file_perm = XOOPS_CACHE_PATH."/newbb_perm_template.php";
		if(!$fp = fopen($file_perm,"w")) {
			newbb_message("the template file can not be created: ".$file_perm);
			return false;
		}
		$file_content = "<?php\n";
		$file_content .= "\treturn \$perms = '".serialize($perms)."';\n";
		$file_content .= "?>";
	    fputs($fp, $file_content);
	    fclose($fp);
        return true;		
    }
}

?>
