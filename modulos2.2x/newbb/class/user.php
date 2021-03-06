<?php
// $Id: user.php,v 1.4 2005/07/31 18:23:50 mauriciodelima Exp $
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
class User extends XoopsObject
{
	var $user = null;
    function User(&$user)
    {
	    if(!is_object($user)) return null;
	    $this->user=&$user;
    }

    function &getUserbar()
    {
	    global $xoopsModuleConfig, $xoopsUser, $isadmin;
    	if (empty($xoopsModuleConfig['userbar_enabled'])) return null;
    	$user =& $this->user;
    	$userbar = array();
        $userbar[] = array("link"=>XOOPS_URL . "/userinfo.php?uid=" . $user->getVar("uid"), "name" =>_PROFILE);
		if (is_object($xoopsUser))
        $userbar[]= array("link"=>"javascript:void openWithSelfMain('" . XOOPS_URL . "/pmlite.php?send2=1&amp;to_userid=" . $user->getVar("uid") . "', 'pmlite', 450, 380);", "name"=>_MD_PM);
        if($user->getVar('user_viewemail') || $isadmin)
        $userbar[]= array("link"=>"javascript:void window.open('mailto:" . $user->getVar('email') . "', 'new');", "name"=>_MD_EMAIL);
        if($user->getVar('url'))
        $userbar[]= array("link"=>"javascript:void window.open('" . $user->getVar('url') . "', 'new');", "name"=>_MD_WWW);
        if($user->getVar('user_icq'))
        $userbar[]= array("link"=>"javascript:void window.open('http://wwp.icq.com/scripts/search.dll?to=" . $user->getVar('user_icq')."', 'new');", "name" => _MD_ICQ);
        if($user->getVar('user_aim'))
        $userbar[]= array("link"=>"javascript:void window.open('aim:goim?screenname=" . $user->getVar('user_aim') . "&amp;message=Hi+" . $user->getVar('user_aim') . "+Are+you+there?" . "', 'new');", "name"=>_MD_AIM);
        if($user->getVar('user_yim'))
        $userbar[]= array("link"=>"javascript:void window.open('http://edit.yahoo.com/config/send_webmesg?.target=" . $user->getVar('user_yim') . "&.src=pg" . "', 'new');", "name"=> _MD_YIM);
        if($user->getVar('user_msnm'))
        $userbar[]= array("link"=>"javascript:void window.open('http://members.msn.com?mem=" . $user->getVar('user_msnm') . "', 'new');", "name" => _MD_MSNM);
		return $userbar;
    }

    function getLevel()
    {
	    global $xoopsModuleConfig, $forumUrl;
	    $user =& $this->user;
		$level =& get_user_level($user);
		if($xoopsModuleConfig['user_level']==2){
			$table = "<table class='userlevel'><tr><td class='end'><img src='" . $forumUrl['images_set'] . "/rpg/img_left.gif' alt='' /></td><td class='center' background='" . $forumUrl['images_set'] . "/rpg/img_backing.gif'><img src='" . $forumUrl['images_set'] . "/rpg/%s.gif' width='%d' alt='' /></td><td><img src='" . $forumUrl['images_set'] . "/rpg/img_right.gif' alt='' /></td></tr></table>";

			$info = _MD_LEVEL . " " . $level['level'] . "<br />" . _MD_HP . " " . $level['hp'] . " / " . $level['hp_max'] . "<br />".
				sprintf($table, "orange", $level['hp_width']);
            $info .= _MD_MP . " " . $level['mp'] . " / " . $level['mp_max'] . "<br />".
				sprintf($table, "green", $level['mp_width']);
            $info .= _MD_EXP . " " . $level['exp'] . "<br />".
				sprintf($table, "blue", $level['exp_width']);
		}else{
			$info = _MD_LEVEL . " " . $level['level'] . "; ". _MD_EXP . " " . $level['exp'] . "<br />";
			$info .= _MD_HP . " " . $level['hp'] . " / " . $level['hp_max'] . "<br />";
            $info .= _MD_MP . " " . $level['mp'] . " / " . $level['mp_max'];
		}
		return $info;
    }

    function getInfo()
    {
	    global $xoopsModuleConfig, $myts;
	    $userinfo=array();
	    $user =& $this->user;
		if ( !(is_object($user)) || !($user->isActive()) )	 return null;
		$userinfo["uid"] = $user->getVar("uid");
	    $name = $user->getVar('name');
	    $name = (empty($xoopsModuleConfig['show_realname'])||empty($name))?$user->getVar('uname'):$name;
		$userinfo["name"] = $name;
		$userinfo["link"] = "<a href=\"".XOOPS_URL . "/userinfo.php?uid=" . $user->getVar("uid") ."\">".$name."</a>";
		$userinfo["avatar"] = (is_file(XOOPS_UPLOAD_PATH."/".$user->getVar('user_avatar')))?$user->getVar('user_avatar'):"";
		$userinfo["from"] = $user->getVar('user_from');
		$userinfo["regdate"] = newbb_formatTimestamp($user->getVar('user_regdate'), 'reg');
		$userinfo["posts"] = $user->getVar('posts');
		$userinfo["groups_id"] = $user -> getGroups();
		if(!empty($xoopsModuleConfig['user_level'])){
			$userinfo["level"] = $this->getLevel();
		}
		if(!empty($xoopsModuleConfig['userbar_enabled'])){
			$userinfo["userbar"] =& $this->getUserbar();
		}

		$rank =& $user->rank();
		$userinfo['rank']["title"] = $rank['title'];
	    if (is_file(XOOPS_UPLOAD_PATH."/".$rank['image'])) {
	        $userinfo['rank']['image'] = "<img src='" . XOOPS_UPLOAD_URL . "/" . $rank['image'] . "' alt='' />";
	    }
	    if ($user->attachsig()) {
	        //$userinfo["signature"] = $myts->displayTarea($user->getVar("user_sig", "N"), 0, 1, 1);
	        $userinfo["signature"] = $user->user_sig();
	    }
	    return $userinfo;
    }
}

class NewbbUserHandler extends XoopsObjectHandler
{
	var $users = array();
	var $groups = array();
	var $status = array();

    function &get($uid)
    {
	    global $xoopsModuleConfig, $forumImage;
        if(!isset($this->users[$uid])) return false;
        if(class_exists("User_language")){
        	$user = new User_language($this->users[$uid]);
    	}else{
        	$user = new User($this->users[$uid]);
    	}
        $userinfo =& $user->getInfo();
		if($xoopsModuleConfig['groupbar_enabled']){
			foreach($userinfo["groups_id"] as $id){
				if(isset($this->groups[$id])) $userinfo['groups'][] = $this->groups[$id];
			}
		}
	    if ($xoopsModuleConfig['wol_enabled']) {
	        $userinfo["status"] = isset($this->status[$uid]) ?
	        	newbb_displayImage($forumImage['online'], _MD_ONLINE) :
	        	newbb_displayImage($forumImage['offline'],_MD_OFFLINE);
	    }
		return $userinfo;
    }

    function setUsers(&$users)
    {
	    $this->users = &$users;
    }

    function setGroups(&$groups)
    {
	    $this->groups = &$groups;
    }

    function setStatus(&$status)
    {
	    $this->status = &$status;
    }
}

?>