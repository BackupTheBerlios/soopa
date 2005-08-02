<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: sponsor.php,v 1.2 2005/08/02 05:41:21 mauriciodelima Exp $                 //
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

$location = 'sponsor';
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}

function Main(){
	global $xoopsDB;
	$tbl = $xoopsDB->prefix('rmdp_partners');
	$tbls = $xoopsDB->prefix('rmdp_software');
	$result = $xoopsDB->query("SELECT $tbl.*, $tbls.nombre FROM  $tbl, $tbls WHERE $tbls.id_soft = $tbl.id_soft");
	include 'functions.php';
	xoops_cp_header();
	DP_ShowNav();
	echo "<a href='sponsor.php?op=new'>"._AM_RMDP_NEWSPONSOR."</a><br>
			<table width='100%' class='outer' cellspacing='1'>
			<tr><th align='left' colspan='2'>"._AM_RMDP_SPONSORLIST."</th></tr>
			<tr><td class='head' align='center'>"._AM_RMDP_SNAME."</td>
			<td class='head' align='center'>"._AM_RMDP_SOPTIONS."</td></tr>";
	while ($row=$xoopsDB->fetchArray($result)){
		if ($class=='even'){ $class='odd'; } else { $class='even'; }
		echo "<tr class='$class'><td align='left'>".$row['nombre']."</td>
			  <td align='center'><a href='sponsor.php?op=mod&amp;idp=$row[id_par]'>
			  "._AM_RMDP_MODIFY."</a>&nbsp; |&nbsp;
			  <a href='sponsor.php?op=del&amp;idp=$row[id_par]'>"._AM_RMDP_DELETE."</a>
			  </td></tr>";
	}
	echo "</table>";
	xoops_cp_footer();
}

function NewForm(){
	global $xoopsDB;
	
	include 'functions.php';
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	
	xoops_cp_header();
	DP_ShowNav();
	echo "<table width='100%' class='outer' cellspacing='1'>
			<tr><th colspan='2'>"._AM_RMDP_NEWSPONSOR."</th></tr>
			<form name='frmNew' method='post' action='sponsor.php'>
			<tr><td class='even' align='left'>"._AM_RMDP_FDOWN."</td>
			<td align='left' class='odd'><select name='ids'>";
	$result = $xoopsDB->query("SELECT id_soft, nombre FROM ".$xoopsDB->prefix('rmdp_software')." ORDER BY nombre");
	while($row=$xoopsDB->fetchArray($result)){
		echo "<option value='$row[id_soft]'>$row[nombre]</option>";
	}
	echo "</select></td></tr>
			<tr><td class='even' align='left'>"._AM_RMDP_FTEXT."</td>
			<td class='odd' align='left'>";
			xoopsCodeTarea("text", 20, 6);
			xoopsSmilies("text");
	echo "</td></tr>
		  <tr><td class='even'>&nbsp;</td>
		  <td class='odd'><input type='submit' name='sbt' value='"._AM_RMDP_SEND."'></td></tr>
		  <input type='hidden' name='op' value='save'>
		  </form></table>";
	xoops_cp_footer();
}

function Save(){
	global $xoopsDB;
	
	$ids = $_POST['ids'];
	$text = $_POST['text'];
	
	if ($ids<=0){
		redirect_header('sponsor.php?op=new', 1, _AM_RMDP_ERRDOWN);
		die();
	}
	if ($text==''){
		redirect_header('sponsor.php?op=new', 1, _AM_RMDP_ERRTEXT);
		die();
	}
	
	$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix('rmdp_partners')." (`id_soft`,`text`)
			VALUES ('$ids','$text')");
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('sponsor.php', 1, '');
		die();
	} else {
		redirect_header('sponsor.php?op=new', 1, _AM_RMDP_CATEGOFAIL . $err);
		die();
	}
}

function ModForm(){
	global $xoopsDB;
	
	$idp = $_GET['idp'];
	if ($idp<=0){ header('location: sponsor.php'); die(); }
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_partners')." WHERE id_par='$idp'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){ redirect_header('sponsor.php', 1, _AM_RMDPO_SPONNOEXIST); die(); }
	$row = $xoopsDB->fetchArray($result);
	
	include('functions.php');
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	xoops_cp_header();
	DP_ShowNav();
	echo "<table width='100%' class='outer' cellspacing='1'>
			<tr><th colspan='2'>"._AM_RMDP_NEWSPONSOR."</th></tr>
			<form name='frmNew' method='post' action='sponsor.php'>
			<tr><td class='even' align='left'>"._AM_RMDP_FDOWN."</td>
			<td align='left' class='odd'><select name='ids'>";
	$result = $xoopsDB->query("SELECT id_soft, nombre FROM ".$xoopsDB->prefix('rmdp_software')." ORDER BY nombre");
	while($rw=$xoopsDB->fetchArray($result)){
		echo "<option value='$rw[id_soft]' ";
		if ($rw['id_soft']==$row['id_soft']) { echo "selected"; }
		echo ">$rw[nombre]</option>";
	}
	echo "</select></td></tr>
			<tr><td class='even' align='left'>"._AM_RMDP_FTEXT."</td>
			<td class='odd' align='left'>";
			$GLOBALS['text'] = $row['text'];
			xoopsCodeTarea("text", 20, 6);
			xoopsSmilies("text");
	echo "</td></tr>
		  <tr><td class='even'>&nbsp;</td>
		  <td class='odd'><input type='submit' name='sbt' value='"._AM_RMDP_SEND."'>
		  <input type='button' name='cancel' value='"._AM_RMDP_CANCEL."' onClick='history.go(-1);'></td></tr>
		  <input type='hidden' name='op' value='savemod'>
		  <input type='hidden' name='idp' value='$idp'>
		  </form></table>";
	xoops_cp_footer();
	
}

function SaveMod(){
	global $xoopsDB;
	$ids = $_POST['ids'];
	$idp = $_POST['idp'];
	$text = $_POST['text'];
	if ($text==''){
		redirect_header('sponsor.php?op=new', 1, _AM_RMDP_ERRTEXT);
		die();
	}
	if ($ids<=0 || $idp<=0){ header('location: sponsor.php'); die(); }
	
	$xoopsDB->query("UPDATE ".$xoopsDB->prefix('rmdp_partners')." SET `id_soft`='$ids',
			`text`='$text' WHERE id_par='$idp'");
	redirect_header('sponsor.php', 1, '');
}

function Delete(){
	global $xoopsDB;
	
	$ok = $_POST['ok'];
	
	if ($ok){
		$idp = $_POST['idp'];
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_partners')." WHERE id_par='$idp'");
		redirect_header('sponsor.php', 1, '');
	} else {
		include 'functions.php';
		xoops_cp_header();
		DP_ShowNav();
		echo "<table width='60%' class='outer' cellspacing='1' align='center'>
				<tr class='even' align='center'>
				<td><form name='frmDel' method='post' action='sponsor.php'>
				<br><br>"._AM_RMDP_CONFIRM."<br><br>
				<input type='submit' name='sbt' value='"._AM_RMDP_DELETE."'>
				<input type='button' name='cancel' value='"._AM_RMDP_CANCEL."' onClick='history.go(-1)'>
				<input type='hidden' name='op' value='del'>
				<input type='hidden' name='ok' value='1'>
				<input type='hidden' name='idp' value='".$_GET['idp']."'></form>
				</td></tr></table>";
		xoops_cp_footer();
	}
}


/**
 * Decidimos que acción ejecutar
 */
$op = $_GET['op'];
if ($op==''){ $op = $_POST['op'];}

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
