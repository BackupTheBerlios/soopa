<?php
//  ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System				//
//                    Copyright (c) 2004 XOOPS.org					//
//                       <http://www.xoops.org/>					//
//													//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)			//
//                                 	- herve (www.herve-thouzard.com)		//
//                  multiMenu v1.4								//
//  ------------------------------------------------------------------------	//


include_once( "admin_header.php" );

$op = '';

$Menu = isset($_GET['Menu']) ? intval($_GET['Menu']) : 1;
$Menu = sprintf("%02d",$Menu);
$op = isset($_GET['op']) ? $_GET['op'] : "";
if($op == '') {
	$op = isset($_POST['op']) ? $_POST['op'] : "";
}
if (isset($_GET['id'])) {
	$id = intval($_GET['id']);
}

switch($op)
{
	case "new":
		im_admin_new();
		break;
	case "edit":
		im_admin_edit($id);
		break;
	case "update":
		im_admin_update();
		break;
	case "del":
		im_admin_del();
		break;
	case "help":
		im_admin_help();
		break;
	case "move":
		im_admin_move();
		im_admin_list();
		break;
	default:
		im_admin_list();
		break;
}

function switchmenu()
{

	global $Menu, $xoopsModule, $xoopsConfig;
	
	if ( file_exists("../language/".$xoopsConfig['language']."/modinfo.php") ) {
		include_once("../language/".$xoopsConfig['language']."/modinfo.php");
	} else {
		include_once("../language/english/modinfo.php");
	}
	include_once("../include/adminnav.php");
	include_once("../include/myblocks.php");
	echo "<h3>"._AD_MULTIMENU_ADMIN.$multimenu."</h3>";
}

function im_admin_update()
{
	global $Menu;
	$xoopsDB =& Database::getInstance();
	$myts =& MyTextSanitizer::getInstance();

	$id = intval($_POST["id"]);
	$submenu = $_POST["submenu"];
	$pid = intval($_POST["pid"]);

	$title = $_POST["title"];
	$link = $_POST["link"];
	$hide = $_POST["hide"];
	$groups = $_POST["groups"];
	$target = $_POST["target"];
	$imageurl = $_POST["imageurl"];

	$title = $myts->makeTboxData4Save($title);
	$link = $myts->makeTboxData4Save($link);
	$imageurl = $myts->makeTboxData4Save($imageurl);
	$groups = (is_array($groups)) ? implode(" ", $groups) : '';

	if ( empty($id) ) {

		$sql="INSERT INTO ".$xoopsDB->prefix("multimenu").$Menu." (pid, title, hide, submenu, link, weight, groups, target, imageurl) 
			VALUES ('$pid', '$title', '$hide', '$submenu', '$link', '255', '$groups', '$target', '$imageurl')";
		$success = $xoopsDB->query($sql);
		im_admin_clean();

	} else {

		$success = $xoopsDB->query("
			UPDATE ".$xoopsDB->prefix("multimenu").$Menu." 
			SET pid='$pid', title='$title', hide='$hide', submenu='$submenu', link='$link', groups='$groups', target='$target', imageurl='$imageurl' 
			WHERE id='$id'");
		im_admin_clean();
	}

	redirect_header("index.php?Menu=".$Menu,2,_AD_MULTIMENU_UPDATED);
	exit();
}

function im_admin_edit ($id) {
	global $Menu;
	$id = intval($_GET["id"]);
	xoops_cp_header();
	include_once("../include/adminnav.php");
	$xoopsDB =& Database::getInstance();
	$result = $xoopsDB->query("SELECT pid, title, hide, submenu, link, groups, target, imageurl FROM ".$xoopsDB->prefix("multimenu").$Menu." WHERE id=$id");
	list($pid, $title, $hide, $submenu, $link, $groups, $target, $imageurl) = $xoopsDB->fetchrow($result);
	$groups = explode(" ", $groups);
	include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
	$form = new XoopsThemeForm(_AD_MULTIMENU_EDITIMENU.' : '.$multimenu, "editform", "index.php?Menu=".$Menu);
	include '../form/multimenuform.inc.php';
	$form->display();	
	echo _AD_MULTIMENU_NOTES;
	xoops_cp_footer();
}

function im_admin_del()
{
	global $Menu;
	$id = isset($_POST['id']) ? intval($_POST['id']) : -1;
	if($id==-1)
	{
		$id = isset($_GET['id']) ? intval($_GET['id']) : -1;
	}
	$del = isset($_POST['del']) ? intval($_POST['del']) : 0;
	$xoopsDB =& Database::getInstance();
	if ( $del == 1 ) {
		if ( $xoopsDB->query("DELETE FROM ".$xoopsDB->prefix("multimenu").$Menu." WHERE id=$id") ) {
			im_admin_clean();
			redirect_header("index.php?Menu=".$Menu, 0, _AD_MULTIMENU_UPDATED);
		} else {
			redirect_header("index.php?Menu=".$Menu, 2, _AD_MULTIMENU_NOTUPDATED);
		}
		exit();
	} else {
		xoops_cp_header();
		echo "<h4>"._AD_MULTIMENU_ADMIN.$Menu."</h4>";
		xoops_confirm(array('op' => 'del', 'id' => $id, 'del' => 1), 'index.php?Menu='.$Menu, _AD_MULTIMENU_SUREDELETE);
		xoops_cp_footer();
	}
}

function im_admin_move ()
{
	global $Menu;
	$id = intval($_GET["id"]);
	$weight = intval($_GET["weight"]);

	$xoopsDB =& Database::getInstance();
	$xoopsDB->queryF("UPDATE ".$xoopsDB->prefix("multimenu").$Menu." SET weight=weight+1 WHERE weight>=$weight AND id<>$id");
	$xoopsDB->queryF("UPDATE ".$xoopsDB->prefix("multimenu").$Menu." SET weight=$weight WHERE id=$id");
	im_admin_clean();
}


function im_admin_clean()
{
	global $xoopsDB, $Menu;
	$i=0;

	$result = $xoopsDB->query("
			SELECT id, pid, submenu 
			FROM ".$xoopsDB->prefix("multimenu").$Menu." 
			ORDER BY weight ASC");

	while (list($id, $pid, $submenu) = $xoopsDB->fetchrow($result)) {
	if ( $submenu == 0 OR $submenu == 3 OR $submenu == 4 ) { $change = $id; }
		$xoopsDB->queryF("
			UPDATE ".$xoopsDB->prefix("multimenu").$Menu." 
			SET pid='$change', weight='$i' 
			WHERE id=$id");
		$i++;
	}
}


function im_admin_new()
{
	global $Menu;

	xoops_cp_header();
	$id = 0;
	$pid = $id;
	$title = '';
	$link = '';
	$hide = '1';
	$submenu = '0';
	$imageurl='';
	$weight = 255;
	$target = "_self";
	$member_handler =& xoops_gethandler('member');
	$xoopsgroups =& $member_handler->getGroups();
	$count = count($xoopsgroups);
	$groups = array();
	for ($i = 0; $i < $count; $i++)  $groups[] = $xoopsgroups[$i]->getVar('groupid');
	include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
	$form = new XoopsThemeForm(_AD_MULTIMENU_NEWIMENU, "newform", "index.php?Menu=".$Menu);
	include_once("../include/adminnav.php");
	include '../form/multimenuform.inc.php';
	$form->display();
	echo _AD_MULTIMENU_NOTES;
	xoops_cp_footer();
}

function im_admin_list()
{
	global $Menu, $xoopsConfig, $xoopsModuleConfig;
	$myts =& MyTextSanitizer::getInstance();
	xoops_cp_header();
	$xoopsDB =& Database::getInstance();
	switchmenu();
	echo "
	<form action='index.php?op=new&Menu=".$Menu."' method='post' name='form1'>
	<div align='right'>
	<input type='hidden' name='Menu' value='".$Menu."'>
	<input type='submit' name='submit' value='"._AD_MULTIMENU_NEW."'><p />
	</div>
	<table width='100%' border='0' cellspacing='1' cellpadding='0' class='outer'><tr>
	<th align='center'>"._AD_MULTIMENU_IMAGE."</th>
	<th align='center'>"._AD_MULTIMENU_TITLE."</th>
	<th align='center'>"._AD_MULTIMENU_LINK."</th>
	<th align='center'>"._AD_MULTIMENU_STATUS."</th>
	<th align='center'>"._AD_MULTIMENU_SUBMENU."</th>
	<th align='center'>"._AD_MULTIMENU_OPERATION."</th></tr>";
	$result=$xoopsDB->query("
		SELECT id, pid, link, title, hide, submenu, weight, imageurl 
		FROM ".$xoopsDB->prefix("multimenu").$Menu." 
		ORDER BY weight ASC");
	$class = 'even';
	while ($row=$xoopsDB->fetcharray($result)) {

// Status links
		$status = ( $row['hide'] == 1 ) ? "<img src='../images/icon/online.gif' alt='"._AD_MULTIMENU_ONLINE."'>" : "<img src='../images/icon/offline.gif' alt='"._AD_MULTIMENU_OFFLINE."'>";


// Order links
		if ($row['weight'] != 0) {
		$moveup = "	<a href='index.php?op=move&id=".$row['id']."&weight=".($row['weight']-1)."&Menu=".$Menu."'>
				<img src='../images/icon/up.gif' alt='"._AD_MULTIMENU_UP."'></a>";
		} else { 
		$moveup = "	<img src='../images/icon/noup.gif' alt='"._AD_MULTIMENU_UP."'>"; 
		}

		if ($row['weight'] != ($xoopsDB->getRowsNum($result) - 1)) {
		$movedown = "<a href='index.php?op=move&id=".$row['id']."&weight=".($row['weight']+2)."&Menu=".$Menu."'>
				<img src='../images/icon/down.gif' alt='"._AD_MULTIMENU_DOWN."'></a>";
		} else {
		 $movedown = "<img src='../images/icon/nodown.gif' alt='"._AD_MULTIMENU_DOWN."'>";
		}

		$image = '';

// Images

	if( $row['imageurl'] )
		{
			if ((eregi("http://", $row['imageurl'])) || 
			    (eregi("https://", $row['imageurl']))) {
				$image = $row['imageurl'];
				} else {
				$image = XOOPS_URL."/".$row['imageurl'];
			}


			$image = str_replace('{theme}', $xoopsConfig['theme_set'], $image);
if ( !empty($xoopsModule) ) { $image = str_replace('{module}', $xoopsModule->getVar('dirname'), $image); } else { $image = str_replace('{module}', 'default', $image); }


// Image resize if bigger

		$image_size = getimagesize("$image");
		$width 	= $image_size[0];
		if (40 <= $width OR !$width ) {
		$image_width = 'width="40" ';
		} else {
		$image_width = 'width="'.$width.'" ';
		}
$image = '<img src="'.$image.'" '.$image_width.'/>';
if ( !$width ) { $image = '<img src="'.XOOPS_URL.'/modules/multiMenu/images/error.gif" '.$image_width.'/>'; }

	}


			if ($row['submenu'] == 0) {
				$row['title'] = "<b>".$myts->makeTareaData4Show($row['title'])."</b>"; 
				$row['link'] = "<b>".$row['link']."</b>"; 
				$sub = "<b>"._AD_MULTIMENU_MAINLINK."</b>";}

			if ($row['submenu'] == 1 ) {
				$row['title'] = "&nbsp;&nbsp;&nbsp;<i>".$row['title']."</i>";
				$row['link'] = "&nbsp;&nbsp;&nbsp;<i>".$row['link']."</i>";
				$sub = "<nobr>&nbsp;&nbsp;&nbsp;<i>"._AD_MULTIMENU_PERMSUBLINK."</i></nobr>";}

			if ($row['submenu'] == 2 ) {
				$row['title'] = "- <font color='#666666'><i>".$row['title']."</i></font>";
				$row['link'] = "- <font color='#666666'><i>".$row['link']."</i></font>";
				$sub = "<font color='#666666'><i>"._AD_MULTIMENU_SUBLINK."</i></font>";}

			if ($row['submenu'] == 3 ) {
				$row['title'] = $row['title'];
				$row['link'] = $row['link'];
				$sub = _AD_MULTIMENU_NOTE;}

			if ($row['submenu'] == 4) {
				$row['title'] = "<font color='#FF0000'><b>".$row['title']."</b></font>"; 
				$row['link'] = "<font color='#FF0000'><b>".$row['link']."</b></font>"; 
				$sub = "<font color='#FF0000'><b>"._AD_MULTIMENU_CATEGORY."</b></font>";}

		if ($row['pid']) {$pid = $row['pid']; } else {$pid ='';}

		echo "<tr>
			<td class='$class'>".$image."</td>
			<td class='$class'>".$row['title']."</td>
			<td class='$class'>".$row['link']."</td>
			<td class='$class' align='center'>$status</td>
			<td class='$class'>$sub</td>
			<td class='$class' align='center'><nobr><small>
		<a href='index.php?op=edit&id=".$row['id']."&Menu=".$Menu."'><img src='../images/icon/edit.gif' alt='"._EDIT."'></a>
		<a href='index.php?op=del&id=".$row['id']."&Menu=".$Menu."'><img src='../images/icon/delete.gif' alt='"._DELETE."'></a>
			".$moveup.$movedown."</small></nobr></td></tr>";
		$class = ($class == 'odd') ? 'even' : 'odd';
	}
	echo "<tr><td class='foot' colspan='6' align='right'><input type='hidden' name='Menu' value='".$Menu."'><input type='submit' name='submit' value='"._AD_MULTIMENU_NEW."'></td></tr></table></form>";
	xoops_cp_footer();
}


function im_admin_help ()
{
	global $Menu;
	xoops_cp_header();
	include_once("../include/adminnav.php");
	include_once("../include/helpnav.php");
	echo $help;
	xoops_cp_footer();
}



?>
