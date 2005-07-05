<?php
// $Id: print.php,v 1.1 2005/07/05 12:55:20 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
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
/**
 * Print an article
 *
 * This page is used to print an article. The advantage of this script is that you
 * only see the article and nothing else.
 *
 * @package News
 * @author Xoops Modules Dev Team
 * @copyright	(c) The Xoops Project - www.xoops.org
 *
 * Parameters received by this page :
 * @page_param 	int		storyid 					Id of news to print
 *
 * @page_title			Story's title - Printer Friendly Page - Topic's title - Site's name
 *
 * @template_name		This page does not use any template
 *
*/
include_once "../../mainfile.php";
include_once XOOPS_ROOT_PATH."/modules/news/class/class.newsstory.php";
include_once XOOPS_ROOT_PATH.'/modules/news/include/functions.php';
$storyid = isset($_GET['storyid']) ? intval($_GET['storyid']) : 0;
if ( empty($storyid) ) {
	redirect_header(XOOPS_URL."/modules/news/index.php",2,_NW_NOSTORY);
}

// Verify that the article is published
$story = new NewsStory($storyid);
if ( $story->published() == 0 || $story->published() > time() ) {
    redirect_header(XOOPS_URL.'/modules/news/index.php', 2, _NW_NOSTORY);
    exit();
}

// Verify permissions
$gperm_handler =& xoops_gethandler('groupperm');
if (is_object($xoopsUser)) {
    $groups = $xoopsUser->getGroups();
} else {
	$groups = XOOPS_GROUP_ANONYMOUS;
}
if (!$gperm_handler->checkRight("news_view", $story->topicid(), $groups, $xoopsModule->getVar('mid'))) {
	redirect_header(XOOPS_URL.'/modules/news/index.php', 3, _NOPERM);
	exit();
}

$xoops_meta_keywords='';
$xoops_meta_description='';


if(trim($story->keywords())!='') {
	$xoops_meta_keywords=$story->keywords();
} else {
	$xoops_meta_keywords=news_createmeta_keywords($story->hometext().'<br />'.$story->bodytext());
}

if(trim($story->description())!='') {
	$xoopsTpl->assign('xoops_meta_description', $story->description());
} else {
	$xoops_meta_description=$story->title();
}


function PrintPage()
{
	global $xoopsConfig, $xoopsModule, $story, $xoops_meta_keywords,$xoops_meta_description;
	$myts =& MyTextSanitizer::getInstance();
    $datetime = formatTimestamp($story->published(),getmoduleoption('dateformat'));
    echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">';
	echo '<html><head>';
	echo '<meta http-equiv="Content-Type" content="text/html; charset='._CHARSET.'" />';
	echo '<title>'.$myts->htmlSpecialChars($story->title()) . ' - ' . _NW_PRINTER . ' - ' . $myts->htmlSpecialChars($story->topic_title()) . ' - ' . $xoopsConfig['sitename'].'</title>';
	echo '<meta name="AUTHOR" content="'.$xoopsConfig['sitename'].'" />';
	echo '<meta name="keywords" content="'.$xoops_meta_keywords.'" />';
	echo '<meta name="COPYRIGHT" content="Copyright (c) 2001 by '.$xoopsConfig['sitename'].'" />';
	echo '<meta name="DESCRIPTION" content="'.$xoops_meta_description.'" />';
	echo '<meta name="GENERATOR" content="'.XOOPS_VERSION.'" />';
	echo '<body bgcolor="#ffffff" text="#000000" onload="window.print()">
    	<table border="0"><tr><td align="center">
    	<table border="0" width="640" cellpadding="0" cellspacing="1" bgcolor="#000000"><tr><td>
    	<table border="0" width="640" cellpadding="20" cellspacing="1" bgcolor="#ffffff"><tr><td align="center">
    	<img src="'.XOOPS_URL.'/images/logo.gif" border="0" alt="" /><br /><br />
    	<h3>'.$story->title().'</h3>
    	<small><b>'._NW_DATE.'</b>&nbsp;'.$datetime.' | <b>'._NW_TOPICC.'</b>&nbsp;'.$myts->htmlSpecialChars($story->topic_title()).'</small><br /><br /></td></tr>';
	echo '<tr valign="top" style="font:12px;"><td>'.$story->hometext().'<br />';
	$bodytext = $story->bodytext();
	$bodytext = str_replace("[pagebreak]","<br style=\"page-break-after:always;\">",$bodytext);
	if ( $bodytext != '' ){
    		echo $bodytext.'<br /><br />';
	}
	echo '</td></tr></table></td></tr></table>
	<br /><br />';
	printf(_NW_THISCOMESFROM,htmlspecialchars($xoopsConfig['sitename'],ENT_QUOTES));
	echo '<br /><a href="'.XOOPS_URL.'/">'.XOOPS_URL.'</a><br /><br />
    	'._NW_URLFORSTORY.' <!-- Tag below can be used to display Permalink image --><!--img src="'.XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/images/x.gif" /--><br />
    	<a href="'.XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/article.php?storyid='.$story->storyid().'">'.XOOPS_URL.'/modules/news/article.php?storyid='.$story->storyid().'</a>
    	</td></tr></table>
    	</body>
    	</html>
    	';
}

PrintPage();
?>