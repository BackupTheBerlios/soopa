<?php
// $Id: groupperms.php,v 1.4 2005/08/12 00:03:53 mauriciodelima Exp $
// ------------------------------------------------------------------------ //
// XOOPS - PHP Content Management System            				        //
// Copyright (c) 2000 XOOPS.org                           					//
// <http://www.xoops.org/>                             						//
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// 																			//
// You may not change or alter any portion of this comment or credits       //
// of supporting developers from this source code or any supporting         //
// source code which is considered copyrighted (c) material of the          //
// original comment or credit authors.                                      //
// 																			//
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //
// 																			//
// You should have received a copy of the GNU General Public License        //
// along with this program; if not, write to the Free Software              //
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------ //
include_once '../../../include/cp_header.php';
include_once XOOPS_ROOT_PATH . "/class/xoopstopic.php";
include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';
include_once XOOPS_ROOT_PATH . "/modules/news/admin/functions.php";

xoops_cp_header();

adminmenu(2);
echo "<br /><br />";
$permtoset= isset($_POST['permtoset']) ? intval($_POST['permtoset']) : 1;
$selected=array('','','');
$selected[$permtoset-1]=' selected';
echo "<form method='post' name='fselperm' action='groupperms.php'><table border=0><tr><td><select name='permtoset' onChange='javascript: document.fselperm.submit()'><option value='1'".$selected[0].">"._AM_APPROVEFORM."</option><option value='2'".$selected[1].">"._AM_SUBMITFORM."</option><option value='3'".$selected[2].">"._AM_VIEWFORM."</option></select></td><td><input type='submit' name='go'></tr></table></form>";
$module_id = $xoopsModule->getVar('mid');

switch($permtoset)
{
	case 1:
		$title_of_form = _AM_APPROVEFORM;
		$perm_name = "news_approve";
		$perm_desc = _AM_APPROVEFORM_DESC;
		break;
	case 2:
		$title_of_form = _AM_SUBMITFORM;
		$perm_name = "news_submit";
		$perm_desc = _AM_SUBMITFORM_DESC;
		break;
	case 3:
		$title_of_form = _AM_VIEWFORM;
		$perm_name = "news_view";
		$perm_desc = _AM_VIEWFORM_DESC;
		break;
}

$permform = new XoopsGroupPermForm($title_of_form, $module_id, $perm_name, $perm_desc);
$xt = new XoopsTopic( $xoopsDB -> prefix( "topics" ) );
$alltopics =& $xt->getTopicsList();
foreach ($alltopics as $topic_id => $topic) {
    $permform->addItem($topic_id, $topic['title'], $topic['pid']);
}
echo $permform->render();
echo "<br /><br /><br /><br />\n";
unset ($permform);

xoops_cp_footer();
?>
