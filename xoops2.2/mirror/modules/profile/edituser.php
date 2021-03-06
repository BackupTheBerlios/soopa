<?php
// $Id: edituser.php,v 1.3 2005/08/08 23:43:18 mauriciodelima Exp $
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

include '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH.'/modules/profile/include/functions.php';

// If not a user, redirect
if (!is_object($xoopsUser)) {
    redirect_header(XOOPS_URL,3,_PROFILE_MA_NOEDITRIGHT);
    exit();
}

// initialize $op variable
$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : 'editprofile';

if ($op == 'save') {
    if (!$GLOBALS['xoopsSecurity']->check()) {
        redirect_header('index.php',3,_PROFILE_MA_NOEDITRIGHT."<br />".implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
        exit;
    }
    $uid = 0;
    if (!empty($_POST['uid'])) {
        $uid = intval($_POST['uid']);
    }
    if (empty($uid) || ($xoopsUser->getVar('uid') != $uid && !$xoopsUser->isAdmin())) {
        redirect_header(XOOPS_URL,3,_PROFILE_MA_NOEDITRIGHT);
        exit();
    }
    $errors = array();
    $myts =& MyTextSanitizer::getInstance();
    if ($xoopsUser->isAdmin() || $xoopsModuleConfig['allow_chgmail'] == 1) {
        $email = '';
        if (!empty($_POST['email'])) {
            $email = $myts->stripSlashesGPC(trim($_POST['email']));
        }
        if ($email == '' || !checkEmail($email)) {
            $errors[] = _PROFILE_MA_INVALIDMAIL;
        }
    }
    if (count($errors) > 0) {
        include XOOPS_ROOT_PATH.'/header.php';
        echo '<div>';
        foreach ($errors as $er) {
            echo '<span style="color: #ff0000; font-weight: bold;">'.$er.'</span><br />';
        }
        echo '</div><br />';
        $op = 'editprofile';
    } else {
        $member_handler =& xoops_gethandler('member');
        $edituser =& $member_handler->getUser($uid);
        if ($xoopsModuleConfig['allow_chgmail'] == 1) {
            $edituser->setVar('email', $email);
        }
        $edituser->setVar('name', $myts->stripSlashesGPC(trim($_POST['name'])));
        $edituser->setVar('uname', $myts->stripSlashesGPC(trim($_POST['uname'])));
        if ($xoopsUser->isAdmin()) {
            $edituser->setVar('rank', intval($_POST['rank']));
            $edituser->setVar('loginname', $myts->stripSlashesGPC(trim($_POST['loginname'])));
        }
	    $stop = userCheck($edituser);
	    if (!empty($stop)) {
        	echo "<span style='color:#ff0000;'>$stop</span>";
            redirect_header('userinfo.php?uid='.$uid, 2);
    	}
        
        // Dynamic fields
        $profile_handler =& xoops_gethandler('profile');
        // Get fields
        $fields =& $profile_handler->loadFields();
        // Get ids of fields that can be edited
        $gperm_handler =& xoops_gethandler('groupperm');
        $editable_fields =& $gperm_handler->getItemIds('profile_edit', $xoopsUser->getGroups(), $xoopsModule->getVar('mid'));

        foreach (array_keys($fields) as $i) {
            if (in_array($fields[$i]->getVar('fieldid'), $editable_fields)) {
                $edituser->setVar($fields[$i]->getVar('field_name'), $fields[$i]->getValueForSave($_REQUEST[$fields[$i]->getVar('field_name')]));
            }
        }
        if (!$member_handler->insertUser($edituser)) {
            include XOOPS_ROOT_PATH.'/header.php';
            echo $edituser->getHtmlErrors();
        } else {
            unset($_SESSION['xoopsUserTheme']);
            redirect_header('userinfo.php?uid='.$uid, 1, _PROFILE_MA_PROFUPDATED);
        }
    }
}


if ($op == 'editprofile') {
    include_once XOOPS_ROOT_PATH.'/header.php';
    include_once 'include/forms.php';
    echo '<a href="userinfo.php?uid='.$xoopsUser->getVar('uid').'">'. _PROFILE_MA_PROFILE .'</a>&nbsp;<span style="font-weight:bold;">&raquo;&raquo;</span>&nbsp;'. _PROFILE_MA_EDITPROFILE .'<br /><br />';
    $form =& getUserForm($xoopsUser);
    $form->display();
}


if ($op == 'avatarform') {
    include XOOPS_ROOT_PATH.'/header.php';
    echo '<a href="userinfo.php?uid='.$xoopsUser->getVar('uid').'">'. _PROFILE_MA_PROFILE .'</a>&nbsp;<span style="font-weight:bold;">&raquo;&raquo;</span>&nbsp;'. _PROFILE_MA_UPLOADMYAVATAR .'<br /><br />';
    $oldavatar = $xoopsUser->getVar('user_avatar');
    if (!empty($oldavatar) && $oldavatar != 'blank.gif') {
        echo '<div style="text-align:center;"><h4 style="color:#ff0000; font-weight:bold;">'._PROFILE_MA_OLDDELETED.'</h4>';
        echo '<img src="'.XOOPS_UPLOAD_URL.'/'.$oldavatar.'" alt="" /></div>';
    }
    if ($xoopsModuleConfig['avatar_allow_upload'] == 1 && $xoopsUser->getVar('posts') >= $xoopsModuleConfig['avatar_minposts']) {
        include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
        $form = new XoopsThemeForm(_PROFILE_MA_UPLOADMYAVATAR, 'uploadavatar', 'edituser.php', 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        $form->addElement(new XoopsFormLabel(_PROFILE_MA_MAXPIXEL, $xoopsModuleConfig['avatar_width'].' x '.$xoopsModuleConfig['avatar_height']));
        $form->addElement(new XoopsFormLabel(_PROFILE_MA_MAXIMGSZ, $xoopsModuleConfig['avatar_maxsize']));
        $form->addElement(new XoopsFormFile(_PROFILE_MA_SELFILE, 'avatarfile', $xoopsModuleConfig['avatar_maxsize']), true);
        $form->addElement(new XoopsFormHidden('op', 'avatarupload'));
        $form->addElement(new XoopsFormHidden('uid', $xoopsUser->getVar('uid')));
        $form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
            $form->display();
    }
    $avatar_handler =& xoops_gethandler('avatar');
    $form2 = new XoopsThemeForm(_PROFILE_MA_CHOOSEAVT, 'uploadavatar', 'edituser.php', 'post', true);
    $avatar_select = new XoopsFormSelect('', 'user_avatar', $xoopsUser->getVar('user_avatar'));
    $avatar_select->addOptionArray($avatar_handler->getList('S'));
    $avatar_select->setExtra("onchange='showImgSelected(\"avatar\", \"user_avatar\", \"uploads\", \"\", \"".XOOPS_URL."\")'");
    $avatar_tray = new XoopsFormElementTray(_PROFILE_MA_AVATAR, '&nbsp;');
    $avatar_tray->addElement($avatar_select);
    $avatar_tray->addElement(new XoopsFormLabel('', "<img src='".XOOPS_UPLOAD_URL."/".$xoopsUser->getVar("user_avatar", "E")."' name='avatar' id='avatar' alt='' /> <a href=\"javascript:openWithSelfMain('".XOOPS_URL."/misc.php?action=showpopups&amp;type=avatars','avatars',600,400);\">"._LIST."</a>"));
    $form2->addElement($avatar_tray);
    $form2->addElement(new XoopsFormHidden('uid', $xoopsUser->getVar('uid')));
    $form2->addElement(new XoopsFormHidden('op', 'avatarchoose'));
    $form2->addElement(new XoopsFormButton('', 'submit2', _SUBMIT, 'submit'));
    $form2->display();
}

if ($op == 'avatarupload') {
    if (!$GLOBALS['xoopsSecurity']->check()) {
        redirect_header('index.php',3,_PROFILE_MA_NOEDITRIGHT."<br />".implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
        exit;
    }
    $xoops_upload_file = array();
    $uid = 0;
    if (!empty($_POST['xoops_upload_file']) && is_array($_POST['xoops_upload_file'])){
        $xoops_upload_file = $_POST['xoops_upload_file'];
    }
    if (!empty($_POST['uid'])) {
        $uid = intval($_POST['uid']);
    }
    if (empty($uid) || $xoopsUser->getVar('uid') != $uid ) {
        redirect_header('index.php',3,_PROFILE_MA_NOEDITRIGHT);
        exit();
    }
    if ($xoopsModuleConfig['avatar_allow_upload'] == 1 && $xoopsUser->getVar('posts') >= $xoopsModuleConfig['avatar_minposts']) {
        include_once XOOPS_ROOT_PATH.'/class/uploader.php';
        $uploader = new XoopsMediaUploader(XOOPS_UPLOAD_PATH, array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png'), $xoopsModuleConfig['avatar_maxsize'], $xoopsModuleConfig['avatar_width'], $xoopsModuleConfig['avatar_height']);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            $uploader->setPrefix('cavt');
            if ($uploader->upload()) {
                $avt_handler =& xoops_gethandler('avatar');
                $avatar =& $avt_handler->create();
                $avatar->setVar('avatar_file', $uploader->getSavedFileName());
                $avatar->setVar('avatar_name', $xoopsUser->getVar('uname'));
                $avatar->setVar('avatar_mimetype', $uploader->getMediaType());
                $avatar->setVar('avatar_display', 1);
                $avatar->setVar('avatar_type', 'C');
                if (!$avt_handler->insert($avatar)) {
                    @unlink($uploader->getSavedDestination());
                } else {
                    $oldavatar = $xoopsUser->getVar('user_avatar');
                    if (!empty($oldavatar) && $oldavatar != 'blank.gif' && !preg_match("/^savt/", strtolower($oldavatar))) {
                        $avatars =& $avt_handler->getObjects(new Criteria('avatar_file', $oldavatar));
                        $avt_handler->delete($avatars[0]);
                        $oldavatar_path = str_replace("\\", "/", realpath(XOOPS_UPLOAD_PATH.'/'.$oldavatar));
                        if (0 === strpos($oldavatar_path, XOOPS_UPLOAD_PATH) && is_file($oldavatar_path)) {
                            unlink($oldavatar_path);
                        }
                    }
                    $sql = sprintf("UPDATE %s SET user_avatar = %s WHERE uid = %u", $xoopsDB->prefix('users'), $xoopsDB->quoteString($uploader->getSavedFileName()), $xoopsUser->getVar('uid'));
                    $xoopsDB->query($sql);
                    $avt_handler->addUser($avatar->getVar('avatar_id'), $xoopsUser->getVar('uid'));
                    redirect_header('userinfo.php?t='.time().'&amp;uid='.$xoopsUser->getVar('uid'),0, _PROFILE_MA_PROFUPDATED);
                }
            }
        }
        include XOOPS_ROOT_PATH.'/header.php';
        echo $uploader->getErrors();
    }
}

if ($op == 'avatarchoose') {
    if (!$GLOBALS['xoopsSecurity']->check()) {
        redirect_header('index.php',3,_PROFILE_MA_NOEDITRIGHT."<br />".implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
        exit;
    }
    $uid = 0;
    if (!empty($_POST['uid'])) {
        $uid = intval($_POST['uid']);
    }
    if (empty($uid) || $xoopsUser->getVar('uid') != $uid ) {
        redirect_header('index.php', 3, _PROFILE_MA_NOEDITRIGHT);
        exit();
    }
    $user_avatar = '';
    if (!empty($_POST['user_avatar'])) {
        $user_avatar = trim($_POST['user_avatar']);
    }
    $user_avatarpath = str_replace("\\", "/", realpath(XOOPS_UPLOAD_PATH.'/'.$user_avatar));
    if (0 === strpos($user_avatarpath, XOOPS_UPLOAD_PATH) && is_file($user_avatarpath)) {
        $oldavatar = $xoopsUser->getVar('user_avatar');
        $xoopsUser->setVar('user_avatar', $user_avatar);
        $member_handler =& xoops_gethandler('member');
        if (!$member_handler->insertUser($xoopsUser)) {
            include XOOPS_ROOT_PATH.'/header.php';
            echo $xoopsUser->getHtmlErrors();
            include XOOPS_ROOT_PATH.'/footer.php';
            exit();
        }
        $avt_handler =& xoops_gethandler('avatar');
        if ($oldavatar && $oldavatar != 'blank.gif' && !preg_match("/^savt/", strtolower($oldavatar))) {
            $avatars =& $avt_handler->getObjects(new Criteria('avatar_file', $oldavatar));
            if (is_object($avatars[0])) {
                $avt_handler->delete($avatars[0]);
            }
            $oldavatar_path = str_replace("\\", "/", realpath(XOOPS_UPLOAD_PATH.'/'.$oldavatar));
            if (0 === strpos($oldavatar_path, XOOPS_UPLOAD_PATH) && is_file($oldavatar_path)) {
                unlink($oldavatar_path);
            }
        }
        if ($user_avatar != 'blank.gif') {
            $avatars =& $avt_handler->getObjects(new Criteria('avatar_file', $user_avatar));
            if (is_object($avatars[0])) {
                $avt_handler->addUser($avatars[0]->getVar('avatar_id'), $xoopsUser->getVar('uid'));
            }
        }
    }
    redirect_header('userinfo.php?uid='.$uid, 0, _PROFILE_MA_PROFUPDATED);
}
include XOOPS_ROOT_PATH.'/footer.php';
?>