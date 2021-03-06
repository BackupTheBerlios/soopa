<?php
// $Id: viewtopic.php,v 1.4 2005/07/31 18:23:50 mauriciodelima Exp $
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

if (is_dir(XOOPS_ROOT_PATH."/modules/xoopspoll/"))
{
	include_once XOOPS_ROOT_PATH."/modules/xoopspoll/class/xoopspoll.php";
	include_once XOOPS_ROOT_PATH."/modules/xoopspoll/class/xoopspolloption.php";
	include_once XOOPS_ROOT_PATH."/modules/xoopspoll/class/xoopspolllog.php";
	include_once XOOPS_ROOT_PATH."/modules/xoopspoll/class/xoopspollrenderer.php";
}
$topic_id = isset($_GET['topic_id']) ? intval($_GET['topic_id']) : 0;
$post_id = !empty($_GET['post_id']) ? intval($_GET['post_id']) : 0;
$forum = !empty($_GET['forum']) ? intval($_GET['forum']) : 0;
$move = isset($_GET['move'])? strtolower($_GET['move']) : '';

// Show message to prompt anonymous users registering or login?
// Should be set through module preferences
$show_reg = 1;

if ( !$topic_id && !$post_id ) {
    redirect_header('viewforum.php?forum='.$forum, 2, _MD_ERRORTOPIC);
}

$topic_handler =& xoops_getmodulehandler('topic', 'newbb');
if ( !empty($post_id) ) {
    $forumtopic =& $topic_handler->getByPost($post_id);
} else {
    $forumtopic =& $topic_handler->get($topic_id);
}
$topic_id = $forumtopic->getVar('topic_id');
$forum = $forumtopic->getVar('forum_id');
if(!$approved = $forumtopic->getVar('approved')){
    redirect_header("viewforum.php?forum=".$forum,2,_MD_NORIGHTTOVIEW);
    exit();
}

$forum_handler =& xoops_getmodulehandler('forum', 'newbb');
$viewtopic_forum =& $forum_handler->get($forum);
if (!$forum_handler->getPermission($viewtopic_forum)){
    redirect_header("index.php", 2, _MD_NORIGHTTOACCESS);
    exit();
}

$perm =& xoops_getmodulehandler('permission', 'newbb');
$permission_set = $perm->getPermissions('topic', $forumtopic->getVar('forum_id'));

if (!$topic_handler->getPermission($viewtopic_forum, $forumtopic->getVar('topic_status'), "view")){
    redirect_header("viewforum.php?forum=".$viewtopic_forum->getVar('forum_id'),2,_MD_NORIGHTTOVIEW);
    exit();
}

$karma_handler =& xoops_getmodulehandler('karma', 'newbb');
$user_karma = $karma_handler->getUserKarma();

if ( !$forumdata =  $topic_handler->getViewData($topic_id, $forum, $move) ) {
	redirect_header('viewforum.php?forum='.$viewtopic_forum->getVar('forum_id'), 2, _MD_FORUMNOEXIST);
	exit();
} else {
	$topic_id = $forumdata['topic_id'];
	$forumtopic = @$topic_handler->get($topic_id);
}

//------------------------------------------------------
// rating_img
$rating = number_format($forumdata['rating']/2, 0);
if ( $rating < 1 ) {
	$rating_img = newbb_displayImage($forumImage['blank']);
}else{
	$rating_img  = newbb_displayImage($forumImage['rate'.$rating]);
}

$isadmin = newbb_isAdmin($viewtopic_forum);


$valid_modes = array("flat", "thread", "compact");
$viewmode_cookie = newbb_getcookie("V");
if(isset($_GET['viewmode']) && in_array($_GET['viewmode'], $valid_modes)) newbb_setcookie("V", $_GET['viewmode'], $forumCookie['expire']);
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
$order = (isset($_GET['order']) && in_array(strtoupper($_GET['order']),array("DESC","ASC")))?
			$_GET['order']:
			(
				(is_object($xoopsUser) && $xoopsUser->getVar('uorder')==1)?
				"DESC":"ASC"
			);
$qorder = "post_time ".$order;
$forumtopic->setOrder($qorder);

// initialize the start number of select query
$start = !empty($_GET['start']) ? intval($_GET['start']) : 0;
$total_posts = $topic_handler->getPostCount($forumtopic);

if ($viewmode == "thread") {
    $xoopsOption['template_main'] =  'newbb_viewtopic_thread.html';
    if(!empty($xoopsModuleConfig["posts_for_thread"]) && $total_posts > $xoopsModuleConfig["posts_for_thread"]) {
	    redirect_header("viewtopic.php?topic_id=$topic_id&amp;viewmode=flat", 2, _MD_EXCEEDTHREADVIEW);
	    exit();
    }
	$postsArray = $topic_handler->getAllPosts($forumtopic, $order, $total_posts, $start);
} else {
    $xoopsOption['template_main'] =  'newbb_viewtopic_flat.html';
    $postsArray = $topic_handler->getAllPosts($forumtopic, $order, $xoopsModuleConfig['posts_per_page'], $start, $post_id);
}

// cookie should be handled before calling XOOPS_ROOT_PATH."/header.php", otherwise it won't work for cache
$topic_lastread = newbb_getcookie('LT',true);
if ( empty($topic_lastread[$topic_id]) ) {
    $forumtopic->incrementCounter();
}
$topic_lastread[$topic_id] = time();
newbb_setcookie("LT", $topic_lastread);

$topic_title = $myts->htmlSpecialChars($forumdata['topic_title']);
$xoops_pagetitle = $xoopsModule->getVar('name'). ' - ' .$myts->htmlSpecialChars($forumdata['forum_name']). ' - ' .$topic_title;

include XOOPS_ROOT_PATH."/header.php";
$xoopsTpl->assign('xoops_pagetitle', $xoops_pagetitle);

if(!empty($xoopsModuleConfig['rss_enable'])){
	$xoops_module_header .= '<link rel="alternate" type="application/xml+rss" title="'.$xoopsModule->getVar('name').'-'.$viewtopic_forum->getVar('forum_name').'" href="'.XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/rss.php?f='.$viewtopic_forum->getVar("forum_id").'" />';
}
$xoopsTpl->assign('xoops_module_header', $xoops_module_header);

if ($xoopsModuleConfig['wol_enabled']){
	$online_handler =& xoops_getmodulehandler('online', 'newbb');
	$online_handler->init($viewtopic_forum, $forumtopic);
    $xoopsTpl->assign('online', $online_handler->show_online());
    $xoopsTpl->assign('color_admin', $xoopsModuleConfig['wol_admin_col']);
    $xoopsTpl->assign('color_mod', $xoopsModuleConfig['wol_mod_col']);
}

if($forumdata['parent_forum'] > 0){
    $q = "select forum_name from ".$xoopsDB->prefix('bb_forums')." WHERE forum_id=".$forumdata['parent_forum'];
    $row = $xoopsDB->fetchArray($xoopsDB->query($q));
    $xoopsTpl->assign(array('parent_forum' => $forumdata['parent_forum'], 'parent_name' => $myts->htmlSpecialChars($row['forum_name'])));
}

$forumdata['topic_title'] = $myts->htmlSpecialChars($forumdata['topic_title']);
$xoopsTpl->assign(array('topic_title' => '<a href="'.$forumUrl['root'].'/viewtopic.php?viewmode='.$viewmode.'&amp;topic_id='.$topic_id.'&amp;forum='.$forumdata['forum_id'].'">'. $forumdata['topic_title'].'</a>', 'forum_name' => $myts->htmlSpecialChars($forumdata['forum_name']), 'lang_nexttopic' => _MD_NEXTTOPIC, 'lang_prevtopic' => _MD_PREVTOPIC));

$xoopsTpl->assign('folder_topic', newbb_displayImage($forumImage['folder_topic']));

$xoopsTpl->assign('topic_id', $forumdata['topic_id']);
$topic_id = $forumdata['topic_id'];
$xoopsTpl->assign('forum_id', $forumdata['forum_id']);

if ($order == 'DESC') {
	$order_current = 'DESC';
    $xoopsTpl->assign(array('order_current' => 'DESC'));
} else {
	$order_current = 'ASC';
    $xoopsTpl->assign(array('order_current' => 'ASC'));
}

$t_new = newbb_displayImage($forumImage['t_new'],_MD_POSTNEW);

if ($topic_handler->getPermission($viewtopic_forum, $forumtopic->getVar('topic_status'), "post")){
    $xoopsTpl->assign('forum_post_or_register', "<a href=\"newtopic.php?forum=".$forumdata['forum_id']."\">".$t_new."</a>");
} elseif ( !empty($show_reg) ) {
    if($forumtopic->getVar('topic_status')){
    	$xoopsTpl->assign('forum_post_or_register', _MD_TOPICLOCKED);
    }elseif ( !is_object($xoopsUser)) {
    	$xoopsTpl->assign('forum_post_or_register', '<a href="'.XOOPS_URL.'/user.php?xoops_redirect='.htmlspecialchars($xoopsRequestUri).'">'._MD_REGTOPOST.'</a>');
	}
} else {
    $xoopsTpl->assign('forum_post_or_register', '');
}


$poster_array = array();
$require_reply = false;
foreach ($postsArray as $eachpost) {
	if($eachpost->getVar('uid')>0) $poster_array[$eachpost->getVar('uid')] = 1;
	if($eachpost->getVar('require_reply')>0) $require_reply = true;
}
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

if ($xoopsModuleConfig['wol_enabled'] && $online_handler){
	$online = array();
	if(!empty($user_criteria)){
		$online_full = $online_handler->getAll(new Criteria('online_uid', $user_criteria, 'IN'));
		if(is_array($online_full)&&count($online_full)>0){
			foreach ($online_full as $thisonline) {
			    if ($thisonline['online_uid'] > 0) $online[$thisonline['online_uid']] = 1;
			}
		}
	}
}

if($xoopsModuleConfig['groupbar_enabled']){
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
	    if (empty($forumdata['allow_sig'])) {
	        $viewtopic_users[$userid]["signature"] = "";
	    }
	}
}
unset($users);
unset($groups_disp);

if($xoopsModuleConfig['allow_require_reply'] && $require_reply){
	if(!empty($xoopsModuleConfig['cache_enabled'])){
		$viewtopic_posters = newbb_getsession("t".$forumtopic->getVar("topic_id"), true);
		if(!is_array($viewtopic_posters) || count($viewtopic_posters)==0){
			$viewtopic_posters =& $topic_handler->getAllPosters($forumtopic);
			newbb_setsession("t".$forumtopic->getVar("topic_id"), $viewtopic_posters);
		}
	}else{
		$viewtopic_posters =& $topic_handler->getAllPosters($forumtopic);
	}
}else{
	$viewtopic_posters =array();
}

if ($viewmode == "thread") {
	if(isset($post_id)&&$post_id){
		$post_handler =& xoops_getmodulehandler('post', 'newbb');
		$currentPost = $post_handler -> get($post_id);

		$topPost = $topic_handler->getTopPost($forumtopic->getVar('topic_id'));
	    $top_pid = $topPost->getVar('post_id');
	    unset($topPost);
	}else{
		$currentPost = $topic_handler->getTopPost($forumtopic->getVar('topic_id'));
	    $top_pid = $currentPost->getVar('post_id');
	}

	$currentPost->showPost($isadmin, $forumdata);
    $postArray =& $topic_handler->getPostTree($postsArray);
    if ( count($postArray) > 0 ) {
        foreach ($postArray as $treeItem) {
            $topic_handler->showTreeItem($forumtopic, $treeItem);
            if($treeItem['post_id'] == $post_id) $treeItem['subject'] = '<strong>'.$treeItem['subject'].'</strong>';
            $xoopsTpl->append("topic_trees", array("post_id" => $treeItem['post_id'], "post_time" => $treeItem['post_time'], "post_image" => $treeItem['icon'], "post_title" => $treeItem['subject'], "post_prefix" => $treeItem['prefix'], "poster" => $treeItem['poster']));
        }
        unset($postArray);
    }
}
else {
    foreach ($postsArray as $eachpost) {
        $eachpost->showPost($isadmin, $forumdata);
    }

    if ( $total_posts > $xoopsModuleConfig['posts_per_page'] ) {
        include XOOPS_ROOT_PATH.'/class/pagenav.php';
        $nav = new XoopsPageNav($total_posts, $xoopsModuleConfig['posts_per_page'], $start, "start", 'topic_id='.$topic_id.'&amp;viewmode='.$viewmode.'&amp;order='.$order);
        $xoopsTpl->assign('forum_page_nav', $nav->renderNav(4));
    } else {
        $xoopsTpl->assign('forum_page_nav', '');
    }
}
unset($postsArray);

$xoopsTpl->assign('topic_print_link', "print.php?form=1&amp;topic_id=$topic_id&amp;forum=".$forumdata['forum_id']."&amp;order=$order&amp;start=$start");

$admin_actions = array();

$ad_move = "";
$ad_delete = "";
$ad_lock = "";
$ad_unlock = "";
$ad_sticky = "";
$ad_unsticky = "";
$ad_digest = "";
$ad_undigest = "";

$admin_actions['move'] = array(
	"link" => $forumUrl['root'].'/topicmanager.php?mode=move&amp;topic_id='.$topic_id.'&amp;forum='.$forum,
	"name" => _MD_MOVETOPIC,
	"image" => $ad_move);
$admin_actions['delete'] = array(
	"link" => $forumUrl['root'].'/topicmanager.php?mode=delete&amp;topic_id='.$topic_id.'&amp;forum='.$forum,
	"name" => _MD_DELETETOPIC,
	"image" => $ad_delete);
if ( !$forumdata['topic_status'] ){
    $admin_actions['lock'] = array(
    	"link"=>$forumUrl['root'].'/topicmanager.php?mode=lock&amp;topic_id='.$topic_id.'&amp;forum='.$forum,
    	"image"=>$ad_lock,
    	"name"=>_MD_LOCKTOPIC);
}else{
    $admin_actions['unlock'] = array(
    	"link"=>$forumUrl['root'].'/topicmanager.php?mode=unlock&amp;topic_id='.$topic_id.'&amp;forum='.$forum,
    	"image"=>$ad_unlock,
    	"name"=>_MD_UNLOCKTOPIC);
}
if ( !$forumdata['topic_sticky'] ){
    $admin_actions['sticky'] = array(
    	"link"=>$forumUrl['root'].'/topicmanager.php?mode=sticky&amp;topic_id='.$topic_id.'&amp;forum='.$forum,
    	"image"=>$ad_sticky,
    	"name"=>_MD_STICKYTOPIC);
}else{
    $admin_actions['unsticky'] = array(
    	"link"=>$forumUrl['root'].'/topicmanager.php?mode=unsticky&amp;topic_id='.$topic_id.'&amp;forum='.$forum,
    	"image"=>$ad_unsticky,
    	"name"=>_MD_UNSTICKYTOPIC);
}
if ( !$forumdata['topic_digest'] ){
    $admin_actions['digest'] = array(
    	"link"=>$forumUrl['root'].'/topicmanager.php?mode=digest&amp;topic_id='.$topic_id.'&amp;forum='.$forum,
    	"image"=>$ad_digest,
    	"name"=>_MD_DIGESTTOPIC);
}else{
    $admin_actions['undigest'] = array(
    	"link"=>$forumUrl['root'].'/topicmanager.php?mode=undigest&amp;topic_id='.$topic_id.'&amp;forum='.$forum,
    	"image"=>$ad_undigest,
    	"name"=>_MD_UNDIGESTTOPIC);
}
$xoopsTpl->assign('admin_actions', $admin_actions);

$xoopsTpl->assign('viewer_is_admin', $isadmin );

if($xoopsModuleConfig['show_permissiontable']){
	$permission_table = & $perm->permission_table($permission_set,$viewtopic_forum, $forumtopic->getVar('topic_status'), $isadmin);
	$xoopsTpl->assign('permission_table', $permission_table);
	unset($permission_table);
}

$xoopsTpl->assign('votes',$forumdata['votes']);
$xoopsTpl->assign('rating_img',$rating_img);

///////////////////////////////
// show Poll
if ($topic_handler->getPermission($viewtopic_forum, $forumtopic->getVar('topic_status'), "vote")
	&& $viewtopic_forum->getVar('allow_polls') == 1
	&& $forumdata['topic_haspoll']
){

	$xoopsTpl->assign('topic_poll', 1);
	$poll = new XoopsPoll($forumdata['poll_id']);
	if ( is_object($xoopsUser) ) {
		if ( XoopsPollLog::hasVoted($forumdata['poll_id'], $_SERVER['REMOTE_ADDR'], $xoopsUser->getVar("uid")) ) {
			pollresults($forumdata['poll_id']);
			$xoopsTpl->assign('topic_pollresult', 1);
			setcookie("bb_polls[$forumdata[poll_id]]", 1);
		} else {
			pollview($forumdata['poll_id']);
			setcookie("bb_polls[$forumdata[poll_id]]", 1);
		}
	} else {
		if ( XoopsPollLog::hasVoted($forumdata['poll_id'], $_SERVER['REMOTE_ADDR']) ) {
			pollresults($forumdata['poll_id']);
			$xoopsTpl->assign('topic_pollresult', 1);
			setcookie("bb_polls[$forumdata[poll_id]]", 1);
		} else {
			pollview($forumdata['poll_id']);
			setcookie("bb_polls[$forumdata[poll_id]]", 1);
		}
	}
}
if ($topic_handler->getPermission($viewtopic_forum, $forumtopic->getVar('topic_status'), "addpoll")
	&& $viewtopic_forum->getVar('allow_polls') == 1
){
	if(!$forumdata['topic_haspoll']){	
		if( is_object($xoopsUser) && $xoopsUser->getVar("uid")==$forumtopic->getVar("topic_poster") ){
			$t_poll = newbb_displayImage($forumImage['t_poll'],_MD_ADDPOLL);
			$xoopsTpl->assign('forum_addpoll', "<a href=\"polls.php?op=add&amp;forum=".$forumdata['forum_id']."&amp;topic_id=".$topic_id."\">".$t_poll."</a>&nbsp;");
		}
	}elseif($isadmin
		|| (is_object($poll) && is_object($xoopsUser) && $xoopsUser->getVar("uid")==$poll->getVar("user_id") )
	){
		$poll_edit = "";
	    $poll_delete = "";
	    $poll_restart = "";

		$adminpoll_actions = array();
	    $adminpoll_actions['editpoll'] = array(
	    	"link" => $forumUrl['root'].'/polls.php?op=edit&amp;poll_id='.$forumdata['poll_id'].'&amp;topic_id='.$topic_id.'&amp;forum='.$forum,
	    	"image" => $poll_edit,
	    	"name" => _MD_EDITPOLL);
	    $adminpoll_actions['deletepoll'] = array(
	    	"link" => $forumUrl['root'].'/polls.php?op=delete&amp;poll_id='.$forumdata['poll_id'].'&amp;topic_id='.$topic_id.'&amp;forum='.$forum,
	    	"image" => $poll_delete,
	    	"name" => _MD_DELETEPOLL);
	    $adminpoll_actions['restartpoll'] = array(
	    	"link" => $forumUrl['root'].'/polls.php?op=restart&amp;poll_id='.$forumdata['poll_id'].'&amp;topic_id='.$topic_id.'&amp;forum='.$forum,
	    	"image" => $poll_restart,
	    	"name" => _MD_RESTARTPOLL);

	    $xoopsTpl->assign('adminpoll_actions', $adminpoll_actions);	
	    unset($adminpoll_actions);
	}
}
if(isset($poll)) unset($poll);
//newbb_message($adminpoll_actions);

$xoopsTpl->assign('p_up',newbb_displayImage($forumImage['p_up'],_MD_TOP));
$xoopsTpl->assign('rating_enable', $xoopsModuleConfig['rating_enabled']);
$xoopsTpl->assign('groupbar_enable', $xoopsModuleConfig['groupbar_enabled']);
$xoopsTpl->assign('anonymous_prefix', $xoopsModuleConfig['anonymous_prefix']);

$xoopsTpl->assign('threaded',newbb_displayImage($forumImage['threaded']));
$xoopsTpl->assign('flat',newbb_displayImage($forumImage['flat']));
$xoopsTpl->assign('left',newbb_displayImage($forumImage['left']));
$xoopsTpl->assign('right',newbb_displayImage($forumImage['right']));
$xoopsTpl->assign('down',newbb_displayImage($forumImage['doubledown']));
$xoopsTpl->assign('down2',newbb_displayImage($forumImage['down']));
$xoopsTpl->assign('up',newbb_displayImage($forumImage['up']));
$xoopsTpl->assign('printer',newbb_displayImage($forumImage['printer']));
$xoopsTpl->assign('personal',newbb_displayImage($forumImage['personal']));
$xoopsTpl->assign('post_content',newbb_displayImage($forumImage['post_content']));

$xoopsTpl->assign('rate1',newbb_displayImage($forumImage['rate1'],_MD_RATE1));
$xoopsTpl->assign('rate2',newbb_displayImage($forumImage['rate2'],_MD_RATE2));
$xoopsTpl->assign('rate3',newbb_displayImage($forumImage['rate3'],_MD_RATE3));
$xoopsTpl->assign('rate4',newbb_displayImage($forumImage['rate4'],_MD_RATE4));
$xoopsTpl->assign('rate5',newbb_displayImage($forumImage['rate5'],_MD_RATE5));

//Show Cat in naviagtion
$category_handler =& xoops_getmodulehandler('category', 'newbb');
$category = $category_handler->get($viewtopic_forum->getVar('cat_id'));
$xoopsTpl->assign('cat_title',$category->getVar('cat_title'));
$xoopsTpl->assign('cat_id',$category->getVar('cat_id'));

// create jump box
if(!empty($xoopsModuleConfig['show_jump']))
$xoopsTpl->assign('forum_jumpbox', newbb_make_jumpbox($forum));
$xoopsTpl->assign(array('lang_forum_index' => sprintf(_MD_FORUMINDEX,htmlspecialchars($xoopsConfig['sitename'], ENT_QUOTES)), 'lang_from' => _MD_FROM, 'lang_joined' => _MD_JOINED, 'lang_posts' => _MD_POSTS, 'lang_poster' => _MD_POSTER, 'lang_thread' => _MD_THREAD, 'lang_edit' => _EDIT, 'lang_delete' => _DELETE, 'lang_reply' => _REPLY, 'lang_postedon' => _MD_POSTEDON,'lang_groups' => _MD_GROUPS));

$viewmode_options = array();
if($viewmode=="thread"){
	$viewmode_options[]= array("link"=>$forumUrl['root']."/viewtopic.php?viewmode=flat&amp;topic_id=".$topic_id."&amp;forum=".$forumdata['forum_id'],"title"=>_FLAT);
	$viewmode_options[]= array("link"=>$forumUrl['root']."/viewtopic.php?viewmode=compact&amp;topic_id=".$topic_id."&amp;forum=".$forumdata['forum_id'],	"title"=>_MD_COMPACT);
}elseif($viewmode=="compact"){
	$viewmode_options[]= array("link"=>$forumUrl['root']."/viewtopic.php?viewmode=thread&amp;topic_id=".$topic_id."&amp;forum=".$forumdata['forum_id'],"title"=>_THREADED);
	$viewmode_options[]= array("link"=>$forumUrl['root']."/viewtopic.php?viewmode=flat&amp;order=".$order_current."&amp;topic_id=".$topic_id."&amp;forum=".$forumdata['forum_id'],	"title"=>_FLAT);
	if ($order == 'DESC') {
		$viewmode_options[]= array("link"=>$forumUrl['root']."/viewtopic.php?viewmode=compact&amp;order=ASC&amp;topic_id=".$topic_id."&amp;forum=".$forumdata['forum_id'],"title"=>_OLDESTFIRST);
	} else {
		$viewmode_options[]= array("link"=>$forumUrl['root']."/viewtopic.php?viewmode=compact&amp;order=DESC&amp;topic_id=".$topic_id."&amp;forum=".$forumdata['forum_id'],"title"=>_NEWESTFIRST);
	}
}else{
	$viewmode_options[]= array("link"=>$forumUrl['root']."/viewtopic.php?viewmode=thread&amp;topic_id=".$topic_id."&amp;forum=".$forumdata['forum_id'],"title"=>_THREADED);
	$viewmode_options[]= array("link"=>$forumUrl['root']."/viewtopic.php?viewmode=compact&amp;order=".$order_current."&amp;topic_id=".$topic_id."&amp;forum=".$forumdata['forum_id'],	"title"=>_MD_COMPACT);
	if ($order == 'DESC') {
		$viewmode_options[]= array("link"=>$forumUrl['root']."/viewtopic.php?viewmode=flat&amp;order=ASC&amp;topic_id=".$topic_id."&amp;forum=".$forumdata['forum_id'],"title"=>_OLDESTFIRST);
	} else {
		$viewmode_options[]= array("link"=>$forumUrl['root']."/viewtopic.php?viewmode=flat&amp;order=DESC&amp;topic_id=".$topic_id."&amp;forum=".$forumdata['forum_id'],"title"=>_NEWESTFIRST);
	}
}

$xoopsTpl->assign('viewmode_compact', ($viewmode=="compact")?1:0);
$xoopsTpl->assign_by_ref('viewmode_options', $viewmode_options);
unset($viewmode_options);
$xoopsTpl->assign('menumode',$menumode);
$xoopsTpl->assign('menumode_other',$menumode_other);

if( $isadmin ||
	(
		$xoopsModuleConfig['quickreply_enabled'] == 1	&&
		$forumdata['topic_status'] != 1 &&
		!(
			is_object($xoopsUser) &&
			empty($permission_set[$forumtopic->getVar('forum_id')]['forum_reply'])
		)
	)
){
    $post_id = $topic_handler->getTopPostId($topic_id);

	include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

	$forum_form = new XoopsThemeForm(_MD_POSTREPLY, 'quick_reply', "post.php", 'post', true);

	if(!is_object($xoopsUser)){
		$config_handler =& xoops_gethandler('config');
		$user_tray = new XoopsFormElementTray(_MD_ACCOUNT);
		$user_tray->addElement(new XoopsFormText(_MD_NAME, "uname", 26, 255));
		$user_tray->addElement(new XoopsFormPassword(_MD_PASSWORD, "pass", 10, 32));
		$login_checkbox = new XoopsFormCheckBox('', 'login', 1);
		$login_checkbox->addOption(1, _MD_LOGIN);
		$user_tray->addElement($login_checkbox);
		$forum_form->addElement($user_tray, '');
	}

	$quickform = "textarea";
	$editor_configs["caption"] = _MD_MESSAGEC;
	$editor_configs["name"] ="message";
	$editor_configs["rows"] = 10;
	$editor_configs["cols"] = 60;
	$editor_handler =& xoops_gethandler("editor");
	$editor_object = & $editor_handler->get($quickform, $editor_configs,"",1);
	$forum_form->addElement($editor_object, true);

	$forum_form->addElement(new XoopsFormHidden('dohtml', 0));
	$forum_form->addElement(new XoopsFormHidden('dosmiley', 1));
	$forum_form->addElement(new XoopsFormHidden('doxcode', 1));
	$forum_form->addElement(new XoopsFormHidden('dobr', 1));
	$forum_form->addElement(new XoopsFormHidden('attachsig', 1));

	$forum_form->addElement(new XoopsFormHidden('isreply', 1));
	
	$forum_form->addElement(new XoopsFormHidden('subject', 'Re: '.$myts->htmlSpecialChars($forumdata['topic_title'])));
	$forum_form->addElement(new XoopsFormHidden('pid', $post_id));
	$forum_form->addElement(new XoopsFormHidden('topic_id', $topic_id));
	$forum_form->addElement(new XoopsFormHidden('forum', $forum));
	$forum_form->addElement(new XoopsFormHidden('viewmode', $viewmode));
	$forum_form->addElement(new XoopsFormHidden('order', $order));
	$forum_form->addElement(new XoopsFormHidden('start', $start));

	// backward compatible
	if(!class_exists("XoopsSecurity")){
		$post_valid = 1;
		$_SESSION['submit_token'] = $post_valid;
		$forum_form->addElement(new XoopsFormHidden('post_valid', $post_valid));
	}

	$notification_handler =& xoops_gethandler('notification');
	if(is_object($xoopsUser) && $xoopsModuleConfig['notification_enabled'] && $notification_handler->isSubscribed('thread', $topic_id, 'new_post', $xoopsModule->getVar('mid'), $xoopsUser->getVar('uid'))){
		$forum_form->addElement(new XoopsFormHidden('notify', 1));
	}

	$forum_form->addElement(new XoopsFormHidden('contents_submit', 1));
	$submit_button = new XoopsFormButton('', 'submit', _SUBMIT, "submit");
	$submit_button->setExtra('onclick="if(document.quick_reply.message.value == \'RE\' || document.quick_reply.message.value == \'\'){ alert(\''._MD_QUICKREPLY_EMPTY.'\'); return false;}else{ document.quick_reply.submit();}"');
	$button_tray = new XoopsFormElementTray('');
	$button_tray->addElement($submit_button);
	$forum_form->addElement($button_tray);

	$toggles = newbb_getcookie('G', true);
	$display = (in_array('qr', $toggles)) ? 'none;' : 'block;';
    $xoopsTpl->assign('quickreply', array( 'show' => 1, 'display'=>$display, 'icon'=>newbb_displayImage($forumImage['t_qr']), 'form' => $forum_form->render()));
	unset($forum_form);
}else{
	$xoopsTpl->assign('quickreply', array( 'show' => 0));
}

include XOOPS_ROOT_PATH.'/footer.php';
?>