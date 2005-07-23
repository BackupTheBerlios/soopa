<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: lics.php,v 1.1 2005/07/23 16:52:00 mauriciodelima Exp $                    //
// ------------------------------------------------------------------------  //
//                         RM+SOFT.Download.Plus                             //
//                    Copyright © 2005. Red Mexico Soft                      //
//                     <http:www.redmexico.com.mx>                           //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it andor modify      //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//  ------------------------------------------------------------------------ //
//  Este programa es un programa libre; puedes distribuirlo y modificarlo    //
//  bajo los términos de al GNU General Public Licencse como ha sido         //
//  publicada por The Free Software Foundation (Fundación de Software Libre; //
//  en cualquier versión 2 de la Licencia o mas reciente.                    //
//                                                                           //
//  Este programa es distribuido esperando que sea últil pero SIN NINGUNA    //
//  GARANTÍA. Ver The GNU General Public License para mas detalles.          //
//  ------------------------------------------------------------------------ //
//  Questions, Bugs or any comment plese write me                            //
//  Preguntas, errores o cualquier comentario escribeme                      //
//  <adminone@redmexico.com.mx>                                              //
//  ------------------------------------------------------------------------ //
//                                                                           //
///////////////////////////////////////////////////////////////////////////////

$location = 'licencias';
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}

function Main(){
	global $xoopsDB;
	
	xoops_cp_header();
	include 'functions.php';
	DP_ShowNav();
	$tbl = $xoopsDB->prefix("rmdp_licences");
	echo "<table width='100%' class='outer' cellspacing='1'>
		<tr><th align='center' colspan='2'>"._AM_RMDP_LICEXISTS."</th></tr>
		<form name='frmE' method='post' action='lics.php'>
		<tr><td class='even' align='center' colspan='2'>
		<select name='idl'>";
		$result = $xoopsDB->query("SELECT * FROM $tbl ORDER BY nombre");
		while ($row=$xoopsDB->fetchArray($result)){
			echo "<option value='$row[id_lic]'>$row[nombre]</option>";
		}
	echo "</select><br>
	    <input type='button' name='sbtmod' value='"._AM_RMDP_MODIFY."' onClick=\"frmE.op.value='mod'; frmE.submit();\">
		<input type='button' name='sbtdel' value='"._AM_RMDP_DELETE."' onClick=\"frmE.op.value='del'; frmE.submit();\">
		</td></tr>
		<input type='hidden' name='op' value='mod'></form>
		<tr><th colspan='2' align='left'>"._AM_RMDP_NEWLIC."</th></tr>
		<form name='frmNew' action='lics.php' method='post'>
		<tr><td class='even' align='left'>"._AM_RMDP_FNAME."</td>
		<td class='odd' align='left'><input type='text' size='30' name='nombre'></td></tr>
		<tr><td class='even' align='left'>"._AM_RMDP_FURL."</td>
		<td class='odd' align='left'><input type='text' size='30' name='url'></td></tr>
		<tr><td class='even' align='left'>&nbsp;</td>
		<td class='odd' align='left'><input type='submit' name='sbt' value='"._AM_RMDP_SEND."'></td></tr>
		<input type='hidden' name='op' value='save'>
		</form></table>";
	xoops_cp_footer();
}

function Save(){
	global $xoopsDB;
	$tbl = $xoopsDB->prefix("rmdp_licences");
	$nombre = $_POST['nombre'];
	$url = $_POST['url'];
	
	if ($nombre==''){ redirect_header('lics.php', 2, _AM_RMDP_ERRNAME); die(); }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM $tbl WHERE nombre='$nombre'"));
	if ($num>0){ redirect_header('lics.php', 1, _AM_RMDP_ERREXIST); die(); }
	
	$xoopsDB->query("INSERT INTO $tbl (`nombre`,`url`) VALUES ('$nombre','$url')");
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('lics.php', 2, _AM_RMDP_LICOK);
	} else {
		redirect_header('lics.php', 2, _AM_RMDP_CATEGOFAIL . $err);
	}
}

function Modify(){
	global $xoopsDB;
	$tbl = $xoopsDB->prefix("rmdp_licences");
	$idl = $_POST['idl'];
	if ($idl<=0){ header('location: lics.php'); die(); }

	$result = $xoopsDB->query("SELECT * FROM $tbl WHERE id_lic='$idl'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){ redirect_header('lics.php', 2, _AM_RMDP_ERRNOEXIST); die(); }
	
	$row = $xoopsDB->fetchArray($result);
	xoops_cp_header();
	include('functions.php');
	DP_ShowNav();
	echo "<table width='100%' class='outer' cellspacing='1'>
		  <tr><th colspan='2' align='left'>"._AM_RMDP_MODLIC."</th></tr>
		<form name='frmMod' action='lics.php' method='post'>
		<tr><td class='even' align='left'>"._AM_RMDP_FNAME."</td>
		<td class='odd' align='left'><input value='$row[nombre]' type='text' size='30' name='nombre'></td></tr>
		<tr><td class='even' align='left'>"._AM_RMDP_FURL."</td>
		<td class='odd' align='left'><input value='$row[url]' type='text' size='30' name='url'></td></tr>
		<tr><td class='even' align='left'>&nbsp;</td>
		<td class='odd' align='left'><input type='submit' name='sbt' value='"._AM_RMDP_SEND."'></td></tr>
		<input type='hidden' name='op' value='savemod'>
		<input type='hidden' name='idl' value='$idl'>
		</form></table>";
	xoops_cp_footer();
	
}

function SaveMod(){
	global $xoopsDB;
	
	$tbl = $xoopsDB->prefix("rmdp_licences");
	$idl = $_POST['idl'];
	if ($idl<=0){ header('location: lics.php'); die(); }
	$nombre = $_POST['nombre'];
	$url = $_POST['url'];
	
	if ($nombre==''){ redirect_header('lics.php', 2, _AM_RMDP_ERRNAME); die(); }
	$xoopsDB->query("UPDATE $tbl SET `nombre`='$nombre',`url`='$url' WHERE id_lic='$idl'");
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('lics.php', 2, _AM_RMDP_LICMODOK);
	} else {
		redirect_header('lics.php', 2, _AM_RMDP_CATEGOFAIL . $err);
	}
}

function Delete(){
	global $xoopsDB;
	
	$ok = $_POST['ok'];
	$idl = $_POST['idl'];
	
	if ($idl<=0){ header('location: lics.php'); die(); }
	
	if ($ok){
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_licences')." WHERE id_lic='$idl'");
		redirect_header('lics.php', 2, _AM_RMDP_DELOK);
	} else {
		xoops_cp_header();
		include('functions.php');
		DP_ShowNav();
		echo "<table width='60%' align='center' cellspacing='1' class='outer'>
				<tr><td align='center' class='even'>
				<form name='frmDel' method='post' action='lics.php'>
				<br><br>"._AM_RMDP_CONFIRM."<br><br>
				<input type='submit' name='sbt' value='"._AM_RMDP_DELETE."'>
				<input type='button' value='"._AM_RMDP_CANCEL."' name='cancel' onClick='history.go(-1);'>
				<input type='hidden' name='op' value='del'>
				<input type='hidden' name='idl' value='$idl'>
				<input type='hidden' name='ok' value='1'>
				</td></tr></table>";
		xoops_cp_footer();
	}
}

/**
 * Que accion tomar
 */
$op = $_GET['op'];
if ($op<=0){ $op = $_POST['op']; }

switch ($op){
	case 'save':
		Save();
		break;
	case 'mod':
		Modify();
		break;
	case 'savemod';
		SaveMod();
		break;
	case 'del':
		Delete();
		break;
	default:
		Main();
		break;
}
?>
