<?php
// $Id: formselectuser.php,v 1.1 2005/07/13 03:55:48 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

require_once XOOPS_ROOT_PATH . "/class/xoopsform/formselect.php";
require_once XOOPS_ROOT_PATH . "/class/xoopsform/formelementtray.php";

class NewbbFormSelectUser extends XoopsFormElementTray
{
    //function NewbbFormSelectUser($caption, $name, $start = 0, $limit = 200, $value = null, $include_anon = false, $size = 10, $multiple = true)
    function NewbbFormSelectUser($caption, $name, $value = array(), $include_anon = false, $size = 10, $multiple = true)
    {
	    $this->XoopsFormElementTray($caption, "<br /><br />", $name);
	    
        $select_form = new XoopsFormSelect("", $name, $value, $size, $multiple);
        if ($include_anon) {
            $select_form->addOption(0, $GLOBALS["xoopsConfig"]['anonymous']);
        }
        $member_handler = &xoops_gethandler('member');
        $criteria = new CriteriaCompo();
	    if(is_array($value) && count($value)>0) {
		    $id_in = "(".implode(",", $value).")";
			$criteria->add(new Criteria("uid", $id_in, "IN"));
	        $criteria->setSort('uname');
	        $criteria->setOrder('ASC');
        	$users = $member_handler->getUserList($criteria);
        	$select_form->addOptionArray($member_handler->getUserList($criteria));
	    }
	    
	    $action_tray = new XoopsFormElementTray("", " | ");
	    $action_tray->addElement(new XoopsFormLabel('', "<a href='###' onclick='return openWithSelfMain(\"".XOOPS_URL."/modules/newbb/include/userselect.php?action=1&amp;target=".$name."&amp;multiple=".$multiple."\", \"userselect\", 800, 500, null);' >"._LIST."</a>"));
	    $action_tray->addElement(new XoopsFormLabel('', "<a href='###' onclick='return openWithSelfMain(\"".XOOPS_URL."/modules/newbb/include/userselect.php?action=0&amp;target=".$name."&amp;multiple=".$multiple."\", \"userselect\", 800, 500, null);' >"._SEARCH."</a>"));
	    $action_tray->addElement(new XoopsFormLabel('', "<a href='###' onclick='var sel = document.getElementById(\"".$name.(($multiple)?"[]":"")."\");	sel.options.length = 0;' >"._CLEAR."</a>"));
	    
	    $this->addElement($select_form);
	    $this->addElement($action_tray);
    }
}
?>
