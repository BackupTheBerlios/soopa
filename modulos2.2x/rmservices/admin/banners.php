<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: banners.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                //
// ------------------------------------------------------------------------ //
//                 RM+SOFT - Control de Servicios                           //
//        Copyright Red México Soft © 2005. (Eduardo Cortés)                //
//                  <http:www.redmexico.com.mx/>                            //
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
//                                                                          //
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //
// ------------------------------------------------------------------------ //
// Para Desarrollo de módulos, Diseño de temas para XOOPS y otros servicios //
// dirigete a http://www.redmexico.com.mx                                   //
//////////////////////////////////////////////////////////////////////////////

$location = 'banners';
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}
$myts =& MyTextSanitizer::getInstance();

function ShowBanns(){
	global $xoopsDB;
	include 'functions.php';
	$result = $xoopsDB->query("SELECT * FROM $tbann");
	$num = $xoopsDB->getRowsNum($result);
	if ($num <=0){
		NewForm(1);
		die();
	}
	xoops_cp_header();
	ShowNav();
	
	echo "<a href='banners.php?op=new'>"._AM_NEWBANN."</a><br>
		  <table width='100%' class='outer' cellspacing='1'>\n
			<tr><th colspan='2' align='left'>"._AM_BANNLIST."</th></tr>";
	while($row = $xoopsDB->fetchArray($result)){
		echo "<tr class='even'><td align='left'><strong>".ServiceName($row['id_srv'])."</strong></td>
			  <td align='center'><a href='banners.php?op=view&amp;idb=$row[id_ban]'>"._AM_VIEW."</a>
			  | <a href='banners.php?op=mod&amp;idb=$row[id_ban]'>"._AM_MODIFY."</a>
			  | <a href='banners.php?op=del&amp;idb=$row[id_ban]'>"._AM_DELETE."</a></td></tr>";
	}
	echo "</table>";

	xoops_cp_footer();
}

function NewForm($err = 0){
	global $xoopsDB;
	
	include_once('functions.php');
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	xoops_cp_header();
	ShowNav();
	echo "<table width='100%' class='outer' cellspacing='1'>\n
			<tr><th colspan='2'>"._AM_NEWBANN."</th></tr>
			<form name='frmNew' method='post' action='banners.php'>
			<tr><td class='even' align='left'>"._AM_FORMSERV."</td>\n
			<td class='odd' align='left'><select name='ids'>\n
			<option value='0'>"._AM_SELECTSRV."</option>";
	$result = $xoopsDB->query("SELECT nombre, id_srv, id_cat FROM ".$xoopsDB->prefix("rmsrv_servicios")." ORDER BY nombre");
	while($row=$xoopsDB->fetchArray($result)){
		echo "<option value='$row[id_srv]'>$row[nombre] (".CategoName($row['id_cat']).")</option>";
	}
	echo "</select></td></tr>
		  <tr><td class='even' align='left'>"._AM_FORMIMG."</td>
		  <td class='odd' align='left'><textarea cols='30' rows='3' name='img'></textarea></td></tr>
		  <tr><td align='left' class='even'>"._AM_DESC."</td>
		  <td class='odd' align='left'>";
		  xoopsCodeTarea("desc", 20, 15);
		  xoopsSmilies("desc");
	echo "</td></tr>\n
		  <tr><td class='even' align='left'>"._AM_SHOWBUY."</td>
		  <td class='odd' align='left'>
		  <input type='radio' name='buy' value='1' checked='checked' /> "._AM_YES."&nbsp;
		  <input type='radio' name='buy' value='0' /> "._AM_NO."</td></tr>
		  <tr><td class='even' align='left'>"._AM_SHOWBORDER."</td>
		  <td class='odd' align='left'>
		  <input type='radio' name='borde' value='1' checked='checked' /> "._AM_YES."&nbsp;
		  <input type='radio' name='borde' value='0' /> "._AM_NO."</td></tr>
		  <tr><td class='even'>&nbsp;</td>
		  <td class='odd' align='left'><input type='submit' name='sbt' value='"._AM_SEND."'></td></tr>
		  <input type='hidden' name='op' value='save'></form></table>";
	xoops_cp_footer();
}

function Save(){
	global $xoopsDB;
	
	$ids = $_POST['ids'];
	$img = $_POST['img'];
	$desc = $_POST['desc'];
	$buy = $_POST['buy'];
	$borde = $_POST['borde'];
	
	if ($ids<=0){ redirect_header('banners.php?op=new', 1, _AM_ERRSRV); die(); }
	if ($img==''){ redirect_header('banners.php?op=new', 1, _AM_ERRIMG); die(); }
	
	$sql = "INSERT INTO ".$xoopsDB->prefix("rmsrv_banners")." (`id_srv`,`img`,`desc`,`buy`,`showborder`)
			VALUES ('$ids','$img','$desc','$buy','$borde')";
	$xoopsDB->query($sql);
	$err = $xoopsDB->error();
	
	if ($err==''){
		redirect_header('banners.php', 1, _AM_BANNOK);
		die();
	} else {
		redirect_header('banners.php?op=new', 1, _AM_ERRNEXT . $err);
		die();
	}
	
}

function ModForm(){
	global $xoopsDB;
	
	$idb = $_GET['idb'];
	if ($idb<=0){ ShowBanns(); die(); }
	
	include 'functions.php';
	$result = $xoopsDB->query("SELECT * FROM $tbann WHERE id_ban='$idb'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){ redirect_header('banners.php', 1, _AM_NOEXIST); die(); }
	$row = $xoopsDB->fetchArray($result);
	
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	xoops_cp_header();
	ShowNav();
	echo "<table width='100%' class='outer' cellspacing='1'>\n
			<tr><th colspan='2'>"._AM_MODBANN."</th></tr>
			<form name='frmNew' method='post' action='banners.php'>
			<tr><td class='even' align='left'>"._AM_FORMSERV."</td>\n
			<td class='odd' align='left'><select name='ids'>\n
			<option value='0'>"._AM_SELECTSRV."</option>";
	$result = $xoopsDB->query("SELECT nombre, id_srv, id_cat FROM ".$xoopsDB->prefix("rmsrv_servicios")." ORDER BY nombre");
	while($rw=$xoopsDB->fetchArray($result)){
		if ($row['id_srv']==$rw['id_srv']){
			echo "<option value='$rw[id_srv]' selected>$rw[nombre] (".CategoName($rw['id_cat']).")</option>";
		}else{
			echo "<option value='$rw[id_srv]'>$rw[nombre] (".CategoName($rw['id_cat']).")</option>";
		}
	}
	echo "</select></td></tr>
		  <tr><td class='even' align='left'>"._AM_FORMIMG."</td>
		  <td class='odd' align='left'><textarea cols='30' rows='3' name='img'>$row[img]</textarea></td></tr>
		  <tr><td align='left' class='even'>"._AM_DESC."</td>
		  <td class='odd' align='left'>";
		  $GLOBALS['desc'] = $row['desc'];
		  xoopsCodeTarea("desc", 20, 15);
		  xoopsSmilies("desc");
	echo "</td></tr>\n
		  <tr><td class='even' align='left'>"._AM_SHOWBUY."</td>
		  <td class='odd' align='left'>";
		  if ($row['buy']){
		 	echo "<input type='radio' name='buy' value='1' checked='checked' /> "._AM_YES."&nbsp;
		  		  <input type='radio' name='buy' value='0' /> "._AM_NO."</td></tr>";
		  }else{
		  	echo "<input type='radio' name='buy' value='1' /> "._AM_YES."&nbsp;
		  		  <input type='radio' name='buy' value='0' checked='checked' /> "._AM_NO."</td></tr>";
		  }
	echo "<tr><td class='even' align='left'>"._AM_SHOWBORDER."</td>
		  <td class='odd' align='left'>";
		  if ($row['showborder']){
		 	echo "<input type='radio' name='borde' value='1' checked='checked' /> "._AM_YES."&nbsp;
		  		  <input type='radio' name='borde' value='0' /> "._AM_NO."</td></tr>";
		  }else{
		  	echo "<input type='radio' name='borde' value='1' /> "._AM_YES."&nbsp;
		  		  <input type='radio' name='borde' value='0' checked='checked' /> "._AM_NO."</td></tr>";
		  }
	echo "<tr><td class='even'>&nbsp;</td>
		  <td class='odd' align='left'><input type='submit' name='sbt' value='"._AM_SEND."'></td></tr>
		  <input type='hidden' name='op' value='savemod'>
		  <input type='hidden' name='idb' value='$idb'></form></table>";
	xoops_cp_footer();
}

function SaveMod(){
	global $xoopsDB;
	
	$ids = $_POST['ids'];
	$img = $_POST['img'];
	$desc = $_POST['desc'];
	$buy = $_POST['buy'];
	$idb = $_POST['idb'];
	$borde = $_POST['borde'];
	
	if ($idb<=0){ ShowBanns(); die(); }
	if ($ids<=0){ redirect_header('banners.php?op=mod&amp;idb='.$idb, 1, _AM_ERRSRV); die(); }
	if ($img==''){ redirect_header('banners.php?op=mod&amp;idb='.$idb, 1, _AM_ERRIMG); die(); }
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmsrv_banners')." WHERE id_ban='$idb'"));
	if ($num<=0){ redirect_header('banners.php', 1, _AM_NOEXIST); die(); }
	
	$sql = "UPDATE ".$xoopsDB->prefix("rmsrv_banners")." SET `id_srv`='$ids',
			`img`='$img',`desc`='$desc',`buy`='$buy', `showborder`='$borde' WHERE id_ban='$idb'";
	$xoopsDB->query($sql);
	$err = $xoopsDB->error();
	
	if ($err==''){
		redirect_header('banners.php', 1, _AM_BANNMODOK);
		die();
	} else {
		redirect_header('banners.php?op=mod&amp;idb='.$idb, 1, _AM_ERRNEXT . $err);
		die();
	}
	
}

function Delete(){
	global $xoopsDB;
	$ok = $_POST['ok'];
	
	if ($ok){
		$idb = $_POST['idb'];

		if ($idb<=0){ ShowBanns(); die(); }
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix("rmsrv_banners")." WHERE id_ban='$idb'");
	
		$err = $xoopsDB->error();
	
		if ($err==''){
			redirect_header('banners.php', 1, _AM_BANNDELOK);
			die();
		} else {
			redirect_header('banners.php?op=mod&amp;idb='.$idb, 1, _AM_ERRNEXT . $err);
			die();
		}
	}else{
		include 'functions.php';
		xoops_cp_header();
		ShowNav();
		echo "<table class='outer' width='60%' align='center' cellspacing='1'>
				<tr><td class='even' align='center'>
				<form name='frmDel' method='post' action='banners.php'>
				<br><br>"._DEL_CONFIRM."<br><br>
				<input type='button' name='cancel' value='"._AM_CANCEL."' onClick='javascript: history.go(-1);'>
				<input type='submit' name='sbt' value='"._AM_DELETE."'>
				<input type='hidden' name='op' value='del'>
				<input type='hidden' name='ok' value='1'>
				<input type='hidden' name='idb' value='".$_GET['idb']."'>
				</form></td></table>";
		xoops_cp_footer();
	}
}



/********************************************/

$op = $_GET['op'];
if ($op==''){
	$op = $_POST['op'];
}

switch ($op){
	case 'new':
		NewForm();
		break;
	case 'save':
		Save();
		break;
	case 'mod':
		ModForm();
		break;
	case 'savemod':
		SaveMod();
		break;
	case 'del';
		Delete();
		break;
	default:
		ShowBanns();
		break;
}
?>
