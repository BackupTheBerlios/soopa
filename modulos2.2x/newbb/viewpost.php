<?php
// $Id: viewpost.php,v 1.4 2005/07/31 18:23:50 mauriciodelima Exp $
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
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //
include 'header.php';

$start = !empty($_GET['start']) ? intval($_GET['start']) : 0;
$forum_id = !empty($_GET['forum']) ? intval($_GET['forum']) : 0;
$isnew = !empty($_GET['new']) ? intval($_GET['new']) : 0;
$order = isset($_GET['order'])?$_GET['order']:"DESC";

$forum_handler =& xoops_getmodulehandler('forum', 'newbb');
$post_handler =& xoops_getmodulehandler('post', 'newbb');

$isadmin = newbb_isAdmin();

$perm = ($isnew)?"access":"view";

if(empty($forum_id)){
	$forums = $forum_handler->getForums(0, $perm);
	$access_forums = array_keys($forums);
}
else{
	$forum =& $forum_handler->get($forum_id);
	$forums[$forum_id] =& $forum;
	$access_forums = array($forum_id);
}

$post_perpage = ($isnew)?$xoopsModuleConfig['topics_per_page'] : $xoopsModuleConfig['posts_per_page'];

$criteria_count = new CriteriaCompo(new Criteria("forum_id", "(".implode(",",$access_forums).")", "IN"));
$criteria_count->add(new Criteria("approved", 1));
$criteria_post = new CriteriaCompo(new Criteria("p.forum_id", "(".implode(",",$access_forums).")", "IN"));
$criteria_post->add(new Criteria("p.approved", 1));
$criteria_post->setSort("p.post_time");
$criteria_post->setOrder($order);

$viewmode="";
if(!$isnew){
	$karma_handler =& xoops_getmodulehandler('karma', 'newbb');
	$user_karma = $karma_handler->getUserKarma();

	$valid_modes = array("flat", "compact");
	$viewmode_cookie = newbb_getcookie("V");
	if(isset($_GET['viewmode'])&&$_GET['viewmode']=="compact") newbb_setcookie("V", "compact", $forumCookie['expire']);
	$viewmode = isset($_GET['viewmode'])?
				$_GET['viewmode']:
				(
					!empty($viewmode_cookie)?
					$viewmode_cookie:
					(
						is_object($xoopsUser)?
						$xoopsUser->getVar('umode'):
						$valid_modes[$xoopsModuleConfig['view_mode']-1]
					)
				);
	$viewmode = in_array($viewmode, $valid_modes)?$viewmode:"flat";
}else{
	$criteria_count->add(new Criteria("post_time", intval($last_visit), ">"));
	$criteria_post->add(new Criteria("p.post_time", intval($last_visit), ">"));
}
$postCount = $post_handler->getPostCount($criteria_count);
$posts = $post_handler->getPostsByLimit($post_perpage, $start, $criteria_post, $isnew);

$poster_array = array();
$topic_lastread = newbb_getcookie('LT',true);
if(count($posts)>0) foreach (array_keys($posts) as $id) {
	$poster_array[$posts[$id]->getVar('uid')] = 1;
	$topic_lastread[$posts[$id]->getVar('topic_id')] = time();
}
newbb_setcookie("LT", $topic_lastread);

$xoops_pagetitle = $xoopsModule->getVar('name'). ' - ' .($isnew)?_MD_VIEWNEWPOSTS:_MD_VIEWALLPOSTS;
$xoopsOption['template_main'] = ($isnew)? 'newbb_viewpost_list.html' : 'newbb_viewpost.html';
include XOOPS_ROOT_PATH."/header.php";

if(!empty($forum_id)){
	if (!$forum_handler->getPermission($forum, $perm)){
	    redirect_header("index.php", 2, _MD_NORIGHTTOACCESS);
	    exit();
	}
	if($forum->isSubforum())
	{
		$q = "select forum_name from ".$xoopsDB->prefix('bb_forums')." WHERE forum_id=".$forum->getVar('parent_forum');
		$row = $xoopsDB->fetchArray($xoopsDB->query($q));
		$xoopsTpl->assign(array('parent_forum' => $forum->getVar('parent_forum'), 'parent_name' => $myts->htmlSpecialChars($row['forum_name'])));
	}
	$xoopsTpl->assign('forum_name', $forum->getVar('forum_name'));
	$xoopsTpl->assign('forum_moderators', $forum->disp_forumModerators());

	$forum_lastview = newbb_getcookie('LF',true);
	$forum_lastview[$forum_id] = time();
	newbb_setcookie("LF", $forum_lastview);
	$xoops_pagetitle = $xoopsModule->getVar('name'). ' - ' .$forum->getVar('forum_name'). ' - ' ._MD_VIEWALLPOSTS;
	$xoopsTpl->assign("forum_id", $forum->getVar('forum_id'));

	if(!empty($xoopsModuleConfig['rss_enable'])){
		$xoops_module_header .= '<link rel="alternate" type="application/xml+rss" title="'.$xoopsModule->getVar('name').'-'.$forum->getVar('forum_name').'" href="'.XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/rss.php?f='.$forum_id.'" />';
	}
}elseif(!empty($xoopsModuleConfig['rss_enable'])){
	$xoops_module_header .= '<link rel="alternate" type="application/xml+rss" title="'.$xoopsModule->getVar('name').'" href="'.XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/rss.php" />';
}
$xoopsTpl->assign('xoops_module_header', $xoops_module_header);
$xoopsTpl->assign('xoops_pagetitle', $xoops_pagetitle);

$userid_array=array();
if(count($poster_array)>0){
	$member_handler =& xoops_gethandler('member');
	$userid_array = array_keys($poster_array);
	$user_criteria = "(".implode(",",$userid_array).")";
	$users = $member_handler->getUsers( new Criteria('uid', $user_criteria, 'IN'), true);
}else{
	$user_criteria = '';
	$users = null;
}

if ((!$isnew) &&$xoopsModuleConfig['wol_enabled']){
	$online = array();
	if(!empty($user_criteria)){
		$online_handler =& xoops_getmodulehandler('online', 'newbb');
		$online_handler->init($forum_id);
		$online_full = $online_handler->getAll(new Criteria('online_uid', $user_criteria, 'IN'));
		if(is_array($online_full)&&count($online_full)>0){
			foreach ($online_full as $thisonline) {
			    if ($thisonline['online_uid'] > 0) $online[$thisonline['online_uid']] = 1;
			}
		}
	}
}

if((!$isnew) && $xoopsModuleConfig['groupbar_enabled']){
	$groups_disp = array();
	$groups =& $member_handler->getGroups();
	$count = count($groups);
	for ($i = 0; $i < $count; $i++) {
		$groups_disp[$groups[$i]->getVar('groupid')] = $groups[$i]->getVar('name');
	}
	unset($groups);
}

$viewtopic_users = array();

if(count($userid_array)>0){
	$user_handler =& xoops_getmodulehandler('user', 'newbb');
	$user_handler->setUsers($users);
	$user_handler->setGroups($groups_disp);
	$user_handler->setStatus($online);
	foreach($userid_array as $userid){
		$viewtopic_users[$userid] =& $user_handler->get($userid);
	}
}
unset($users);
unset($groups_disp);

$pn =0;
foreach($posts as $id=>$post){
	$pn++;

    $post_title = $post->getVar('subject');

    $posticon = $post->getVar('icon');
    if (!empty($posticon) && is_file(XOOPS_ROOT_PATH . '/images/subject/'.$posticon) ){
        $post_image = '<a name="' . $post->getVar('post_id') . '"><img src="' . XOOPS_URL . '/images/subject/' . $post->getVar('icon') . '" alt="" /></a>';
    }else{
        $post_image = '<a name="' . $post->getVar('post_id') . '"><img src="' . XOOPS_URL . '/images/icons/no_posticon.gif" alt="" /></a>';
    }
    if($post->getVar('uid')>0 && isset($viewtopic_users[$post->getVar('uid')])) {
	    $poster = $viewtopic_users[$post->getVar('uid')];
    }
    else $poster= array(
    	'uid' => 0,
        'name' => $post->getVar('poster_name')?$post->getVar('poster_name'):$myts->HtmlSpecialChars($xoopsConfig['anonymous']),
        'link' => $post->getVar('poster_name')?$post->getVar('poster_name'):$myts->HtmlSpecialChars($xoopsConfig['anonymous'])
  	);
if(!$isnew){
    if ($isadmin or $post->checkIdentity()) {
        $post_text = $post->getVar('post_text');
        $post_attachment = $post->displayAttachment();
    } elseif ($xoopsModuleConfig['enable_karma'] && $post->getVar('post_karma') > $user_karma) {
        $post_text = "<div class='karma'>" . sprintf(_MD_KARMA_REQUIREMENT, $user_karma, $post->getVar('post_karma')) . "</div>";
        $post_attachment = '';
    } elseif (
        	$xoopsModuleConfig['allow_require_reply']
        	&& $post->getVar('require_reply')
    	) {
        $post_text = "<div class='karma'>" . _MD_REPLY_REQUIREMENT . "</div>";
        $post_attachment = '';
    } else {
        $post_text = $post->getVar('post_text');
        $post_attachment = $post->displayAttachment();
    }

    $thread_buttons = array();
    $topic_handler = &xoops_getmodulehandler('topic', 'newbb');

    $edit_ok = false;
    if ($isadmin) {
        $edit_ok = true;
    } elseif ($post->checkIdentity() && $post->checkTimelimit('edit_timelimit')) {
        $edit_ok = true;
    }
    if ($edit_ok) {
        $thread_buttons['edit']['image'] = newbb_displayImage($forumImage['p_edit'], _EDIT);
        $thread_buttons['edit']['link'] = "edit.php?forum=" .$post->getVar('forum_id') . "&amp;topic_id=" . $post->getVar('topic_id');
        $thread_buttons['edit']['name'] = _EDIT;
    } else {
        $thread_buttons['edit']['image'] = "";
        $thread_buttons['edit']['link'] = "";
        $thread_buttons['edit']['name'] = "";
    }

    if ($post->checkIdentity() && $post->checkTimelimit('delete_timelimit')) {
        $thread_buttons['delete']['image'] = newbb_displayImage($forumImage['p_delete'], _DELETE);
        $thread_buttons['delete']['link'] = "delete.php?forum=" . $post->getVar('forum_id') . "&amp;topic_id=" . $post->getVar('topic_id') . "&amp;act=1";
        $thread_buttons['delete']['name'] = _DELETE;
    } else {
        $thread_buttons['delete']['image'] = "";
        $thread_buttons['delete']['link'] = "";
        $thread_buttons['delete']['name'] = "";
    }
    if ($isadmin) {
        $thread_buttons['delete']['image'] = newbb_displayImage($forumImage['p_delete'], _DELETE);
        $thread_buttons['delete']['link'] = "delete.php?forum=" . $post->getVar('forum_id') . "&amp;topic_id=" . $post->getVar('topic_id') . "&amp;act=99";
        $thread_buttons['delete']['name'] = _DELETE;
    }
    if (is_object($xoopsUser)) {
        $thread_buttons['reply']['image'] = newbb_displayImage($forumImage['p_reply'], _MD_REPLY);
        $thread_buttons['reply']['link'] = "reply.php?forum=" . $post->getVar('forum_id') . "&amp;topic_id=" . $post->getVar('topic_id');
        $thread_buttons['reply']['name'] = _MD_REPLY;
        $thread_buttons['quote']['image'] = newbb_displayImage($forumImage['p_quote'], _MD_QUOTE);
        $thread_buttons['quote']['link'] = "reply.php?forum=" . $post->getVar('forum_id') . "&amp;topic_id=" . $post->getVar('topic_id') . "&amp;quotedac=1";
        $thread_buttons['quote']['name'] = _MD_QUOTE;
    }

    if (!$isadmin && $xoopsModuleConfig['reportmod_enabled']) {
        $thread_buttons['report']['image'] = newbb_displayImage($forumImage['p_report'], _MD_REPORT);
        $thread_buttons['report']['link'] = "report.php?forum=" . $post->getVar('forum_id') . "&amp;topic_id=" . $post->getVar('topic_id');
        $thread_buttons['report']['name'] = _MD_REPORT;
    }
    if ($isadmin) {
    	$thread_action['news']['image'] = newbb_displayImage($forumImage['news'], _MD_POSTTONEWS);
    	$thread_action['news']['link'] = "posttonews.php?topic_id=" . $post->getVar('topic_id');
    	$thread_action['news']['name'] = _MD_POSTTONEWS;
    }

    $thread_action['pdf']['image'] = newbb_displayImage($forumImage['pdf'], _MD_PDF);
    $thread_action['pdf']['link'] = "makepdf.php?type=post&amp;pageid=0&amp;scale=0.66";
    $thread_action['pdf']['name'] = _MD_PDF;

    $thread_action['print']['image'] = newbb_displayImage($forumImage['printer'], _MD_PRINT);
    $thread_action['print']['link'] = "print.php?form=2&amp;forum=". $post->getVar('forum_id')."&amp;topic_id=" . $post->getVar('topic_id');
    $thread_action['print']['name'] = _MD_PRINT;

    $xoopsTpl->append('posts',
    		array(
    			'post_id' => $post->getVar('post_id'),
    			'topic_id' => $post->getVar('topic_id'),
    			'forum_id' => $post->getVar('forum_id'),
                'post_date' => newbb_formatTimestamp($post->getVar('post_time')),
                'post_image' => $post_image,
                'post_title' => $post_title,
                'post_text' => $post_text,
                'post_attachment' => $post_attachment,
                'post_edit' => $post->displayPostEdit(),
                'post_no' => $start+$pn,
                'post_signature' => ($post->getVar('attachsig'))?@$poster["signature"]:"",
	            'poster_ip' => ($isadmin && $xoopsModuleConfig['show_ip'])?long2ip($post->getVar('poster_ip')):"",
		    	'thread_action' => $thread_action,
                'thread_buttons' => $thread_buttons,
                'poster' => $poster
       		)
  	);

    unset($thread_buttons);
}else{
    $xoopsTpl->append('posts',
		array(
			'title' => "<a href=viewtopic.php?post_id=".$post->getVar('post_id')."&amp;topic_id=".$post->getVar('topic_id').">".$post_title."</a>",
			'forum' => "<a href=viewforum.php?forum=".$post->getVar('forum_id').">".$forums[$post->getVar('forum_id')]->getVar("forum_name")."</a>",
            'time' => newbb_formatTimestamp($post->getVar('post_time')),
            'image' => $post_image,
            'poster' => $poster['link']
   		)
  	);
}
unset($poster);
}
unset($viewtopic_users);
unset($forums);

if(!empty($xoopsModuleConfig['show_jump']))
$xoopsTpl->assign('forum_jumpbox', newbb_make_jumpbox($forum_id));

if ( $postCount > $post_perpage ) {
    include XOOPS_ROOT_PATH.'/class/pagenav.php';
    $nav = new XoopsPageNav($postCount, $post_perpage, $start, "start", 'forum='.$forum_id.'&amp;viewmode='.$viewmode.'&amp;new='.$isnew.'&amp;order='.$order);
    $xoopsTpl->assign('pagenav', $nav->renderNav(4));
} else {
    $xoopsTpl->assign('pagenav', '');
}

$xoopsTpl->assign('lang_forum_index', sprintf(_MD_FORUMINDEX,htmlspecialchars($xoopsConfig['sitename'], ENT_QUOTES)));
$xoopsTpl->assign('folder_topic', newbb_displayImage($forumImage['folder_topic']));

$xoopsTpl->assign('lang_title',($isnew)?_MD_VIEWNEWPOSTS:_MD_VIEWALLPOSTS);
$xoopsTpl->assign('p_up',newbb_displayImage($forumImage['p_up'],_MD_TOP));
$xoopsTpl->assign('groupbar_enable', $xoopsModuleConfig['groupbar_enabled']);
$xoopsTpl->assign('anonymous_prefix', $xoopsModuleConfig['anonymous_prefix']);
$xoopsTpl->assign('down',newbb_displayImage($forumImage['doubledown']));
$xoopsTpl->assign('down2',newbb_displayImage($forumImage['down']));
$xoopsTpl->assign('up',newbb_displayImage($forumImage['up']));
$xoopsTpl->assign('printer',newbb_displayImage($forumImage['printer']));
$xoopsTpl->assign('personal',newbb_displayImage($forumImage['personal']));
$xoopsTpl->assign('post_content',newbb_displayImage($forumImage['post_content']));

$all_link = "viewall.php?forum=".$forum_id."&amp;start=$start";
$post_link = "viewpost.php?forum=".$forum_id;
$newpost_link = "viewpost.php?forum=".$forum_id."&amp;new=1";
$digest_link = "viewall.php?forum=".$forum_id."&amp;start=$start&amp;type=digest";
$unreplied_link = "viewall.php?forum=".$forum_id."&amp;start=$start&amp;type=unreplied";
$unread_link = "viewall.php?forum=".$forum_id."&amp;start=$start&amp;type=unread";

$xoopsTpl->assign('all_link', $all_link);
$xoopsTpl->assign('post_link', $post_link);
$xoopsTpl->assign('newpost_link', $newpost_link);
$xoopsTpl->assign('digest_link', $digest_link);
$xoopsTpl->assign('unreplied_link', $unreplied_link);
$xoopsTpl->assign('unread_link', $unread_link);

$viewmode_options = array();
if($isnew){
		if ($order == 'DESC') {
			$viewmode_options[]= array("link"=>"viewpost.php?new=1&amp;order=ASC&amp;forum=".$forum_id,"title"=>_OLDESTFIRST);
		} else {
			$viewmode_options[]= array("link"=>"viewpost.php?new=1&amp;order=DESC&amp;forum=".$forum_id,"title"=>_NEWESTFIRST);
		}
}else{
	if($viewmode=="compact"){
		$viewmode_options[]= array("link"=>"viewpost.php?viewmode=flat&amp;order=".$order."&amp;forum=".$forum_id,	"title"=>_FLAT);
		if ($order == 'DESC') {
			$viewmode_options[]= array("link"=>"viewpost.php?viewmode=compact&amp;order=ASC&amp;forum=".$forum_id,"title"=>_OLDESTFIRST);
		} else {
			$viewmode_options[]= array("link"=>"viewpost.php?viewmode=compact&amp;order=DESC&amp;forum=".$forum_id,"title"=>_NEWESTFIRST);
		}
	}else{
		$viewmode_options[]= array("link"=>"viewpost.php?viewmode=compact&amp;order=".$order."&amp;forum=".$forum_id,	"title"=>_MD_COMPACT);
		if ($order == 'DESC') {
			$viewmode_options[]= array("link"=>"viewpost.php?viewmode=flat&amp;order=ASC&amp;forum=".$forum_id,"title"=>_OLDESTFIRST);
		} else {
			$viewmode_options[]= array("link"=>"viewpost.php?viewmode=flat&amp;order=DESC&amp;forum=".$forum_id,"title"=>_NEWESTFIRST);
		}
	}
}

$xoopsTpl->assign('viewmode_compact', ($viewmode=="compact")?1:0);
$xoopsTpl->assign('viewmode_options', $viewmode_options);
unset($viewmode_options);
$xoopsTpl->assign('menumode',$menumode);
$xoopsTpl->assign('menumode_other',$menumode_other);

include XOOPS_ROOT_PATH.'/footer.php';
?>