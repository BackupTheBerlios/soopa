<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: categos.php,v 1.1 2005/07/23 16:52:00 mauriciodelima Exp $                 //
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

$location = 'categorias';
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}

function ShowCategos(){
	global $xoopsDB;
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmdp_categos")." ORDER BY nombre"));
	if ($num<=0){
		header('location: categos.php?op=new');
		die();
	}
	include 'functions.php';
	xoops_cp_header();
	DP_ShowNav();
	echo "<a href='categos.php?op=new'>"._AM_RMDP_NEWCATEGO."</a><br>
		  <table width='100%' class='outer' cellspacing='1'>
			<tr><th colspan='3' align='left'>"._AM_RMDP_CATEGOLIST."</th></tr>
			<tr align='center'><td class='head'>"._AM_RMDP_LNAME."</td>
			<td class='head'>"._AM_RMDP_LACCESS."</td>
			<td class='head'>"._AM_RMDP_OPTIONS."</td></tr>";
			
	DP_ChildCatego();
	echo "</table>";
	xoops_cp_footer();
}

function NewForm(){
	global $xoopsDB;
	include 'functions.php';
	xoops_cp_header();
	DP_ShowNav();
	echo "<table class='outer' width='100%'  border='0' cellspacing='1' cellpadding='0'>
  			<tr align='left'>
	    	<th colspan='2'>"._AM_RMDP_NEWCATEGO."</th>
  			</tr>
  			<form name='frmNew' method='post' action='categos.php'>
  			<tr align='left'>
    		<td class='even'>"._AM_RMDP_FNAME."</td>
    		<td class='odd'><input name='nombre' type='text' id='nombre' size='30' maxlength='200' /></td>
  			</tr>
  			<tr align='left'>
    		<td class='even'>"._AM_RMDP_FPARENT."</td>
    		<td class='odd'><select name='parent' id='parent'>
      		<option value='0' selected='selected'>"._AM_RMDP_SELECT."</option>";
			DP_ChildCategoOption();
    echo "	</select></td>
  			</tr>
  			<tr align='left'>
    		<td class='even'>"._AM_RMDP_FACCESS."</td>
    		<td class='odd'><input name='acceso' type='radio' value='0' checked='checked' /> 
      		"._AM_RMDP_EVERYBODY." &nbsp;&nbsp;
      		<input name='acceso' type='radio' value='1' /> 
      		"._AM_RMDP_REGISTERED." </td>
  			</tr>
  			<tr align='left'>
    		<td class='even'>"._AM_RMDP_FIMG."</td>
    		<td class='odd'><input name='img' type='text' id='img' size='30' maxlength='255' /></td>
  			</tr>
			<tr align='left'>
    		<td class='even'>"._AM_RMDP_SHOWNEWS."</td>
    		<td class='odd'>
			<input name='shownews' type='radio' value='1' /> "._AM_RMDP_YES." &nbsp;
			<input name='shownews' type='radio' value='0' checked='checked' /> "._AM_RMDP_NO."
			</td>
  			</tr>
  			<tr align='left'>
    		<td class='even'>&nbsp;</td>
    		<td class='odd'><input type='submit' name='Submit' value='"._AM_RMDP_SEND."' /></td>
  			</tr>
			<input type='hidden' name='op' value='save'>
  			</form>
			</table>";
	xoops_cp_footer();
}

function ModForm(){
	global $xoopsDB;
	
	$idc = $_GET['idc'];
	$table = $xoopsDB->prefix("rmdp_categos");
	if ($idc<=0){ header('location: categos.php'); die(); }
	$result = $xoopsDB->query("SELECT * FROM $table WHERE id_cat='$idc'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){
		redirect_header('categos.php', 1, _AM_NOEXIST);
		die();
	}
	$row = $xoopsDB->fetchArray($result);
	
	include 'functions.php';
	xoops_cp_header();
	DP_ShowNav();
	echo "<table class='outer' width='100%'  border='0' cellspacing='1' cellpadding='0'>
  			<tr align='left'>
	    	<th colspan='2'>"._AM_RMDP_MODCATEGO."</th>
  			</tr>
  			<form name='frmNew' method='post' action='categos.php'>
  			<tr align='left'>
    		<td class='even'>"._AM_RMDP_FNAME."</td>
    		<td class='odd'><input value='$row[nombre]' name='nombre' type='text' id='nombre' size='30' maxlength='200' /></td>
  			</tr>
  			<tr align='left'>
    		<td class='even'>"._AM_RMDP_FPARENT."</td>
    		<td class='odd'><select name='parent' id='parent'>
      		<option value='0' selected='selected'>"._AM_RMDP_SELECT."</option>";
			DP_ChildCategoOption(0,0,$row['parent']);
    echo "	</select></td>
  			</tr>
  			<tr align='left'>
    		<td class='even'>"._AM_RMDP_FACCESS."</td>
    		<td class='odd'>";
			if ($row['acceso']){
				echo "<input name='acceso' type='radio' value='0' /> 
      			"._AM_RMDP_EVERYBODY." &nbsp;&nbsp;
      			<input name='acceso' type='radio' value='1' checked='checked' /> 
      			"._AM_RMDP_REGISTERED;
			} else {
				echo "<input name='acceso' type='radio' value='0' checked='checked' /> 
      			"._AM_RMDP_EVERYBODY." &nbsp;&nbsp;
      			<input name='acceso' type='radio' value='1' /> 
      			"._AM_RMDP_REGISTERED;
			}
	echo "  </td>
  			</tr>
  			<tr align='left'>
    		<td class='even'>"._AM_RMDP_FIMG."</td>
    		<td class='odd'><input value='$row[img]' name='img' type='text' id='img' size='30' maxlength='255' /></td>
  			</tr>
			<tr align='left'>
    		<td class='even'>"._AM_RMDP_SHOWNEWS."</td>
    		<td class='odd'>";
			if ($row['shownews']){
				echo "<input name='shownews' type='radio' value='1' checked='checked' /> "._AM_RMDP_YES." &nbsp;
					<input name='shownews' type='radio' value='0' /> "._AM_RMDP_NO;
			} else {
				echo "<input name='shownews' type='radio' value='1' /> "._AM_RMDP_YES." &nbsp;
					<input name='shownews' type='radio' value='0' checked='checked' /> "._AM_RMDP_NO;
			}
	echo "  </td>
  			</tr>
  			<tr align='left'>
    		<td class='even'>&nbsp;</td>
    		<td class='odd'><input type='submit' name='Submit' value='"._AM_RMDP_MODIFY."' />
			<input type='button' name='Submit' value='"._AM_RMDP_CANCEL."' onClick='history.go(-1);' /></td>
  			</tr>
			<input type='hidden' name='op' value='savemod'>
			<input type='hidden' name='idc' value='$idc'>
  			</form>
			</table>";
	xoops_cp_footer();
}

function SaveCatego(){
	global $xoopsDB;
	
	$nombre = $_POST['nombre'];
	$parent = $_POST['parent'];
	$acceso = $_POST['acceso'];
	$img = $_POST['img'];
	$shownews = $_POST['shownews'];
	$fecha = time();
	
	if ($nombre==''){ redirect_header('categos.php?op=new', 2, _AM_RMDP_ERRNAME); die(); }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmdp_categos')." WHERE nombre='$nombre'"));
	if ($num>0){ redirect_header('categos.php?op=new', 2, _AM_RMDP_ERREXIST); die(); }
	
	$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("rmdp_categos")." (`nombre`,`parent`,`acceso`,`img`,`fecha`,`shownews`) VALUES
			('$nombre','$parent','$acceso','$img','$fecha','$shownews')");
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('categos.php', 2, _AM_RMDP_CATEGOOK); die();
	} else {
		redirect_header('categos.php?op=new', 2, _AM_RMDP_CATEGOFAIL); die();
	}
	
}

function SaveMod(){
	global $xoopsDB;
	
	$nombre = $_POST['nombre'];
	$parent = $_POST['parent'];
	$acceso = $_POST['acceso'];
	$shownews = $_POST['shownews'];
	$img = $_POST['img'];
	$fecha = time();
	$idc = $_POST['idc'];
	
	if ($idc<=0){ header('location: categos.php'); die(); }
	
	if ($nombre==''){ redirect_header('categos.php?op=new', 2, _AM_RMDP_ERRNAME); die(); }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmdp_categos')." WHERE id_cat='$idc'"));
	if ($num<=0){ redirect_header('categos.php', 2, _AM_RMDP_ERRNOEXIST); die(); }
	
	$xoopsDB->query("UPDATE ".$xoopsDB->prefix("rmdp_categos")." SET `nombre`='$nombre',`parent`='$parent',
			`acceso`='$acceso',`img`='$img',`fecha`='$fecha',`shownews`='$shownews' WHERE id_cat='$idc'");
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('categos.php', 2, _AM_RMDP_CATEGOMODOK); die();
	} else {
		redirect_header('categos.php', 2, _AM_RMDP_CATEGOFAIL . $err); die();
	}
	
}

function Delete(){
	global $xoopsDB;
	
	$ok = $_POST['ok'];
	$idc = $_POST['idc'];
	if ($idc=='') $idc = $_GET['idc'];
	
	if ($idc<=0){ header('location: categos.php'); die(); }
	
	if ($ok){
		$xoopsDB->query("UPDATE ".$xoopsDB->prefix('rmdp_categos')." SET parent='0' WHERE parent='$idc'");
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_categos')." WHERE id_cat='$idc'");
		redirect_header('categos.php', 2, _AM_RMDP_DELOK);
	} else {
		xoops_cp_header();
		include('functions.php');
		DP_ShowNav();
		echo "<table width='60%' align='center' cellspacing='1' class='outer'>
				<tr><td align='center' class='even'>
				<form name='frmDel' method='post' action='categos.php'>
				<br><br>"._AM_RMDP_CONFIRM."<br><br>
				<input type='submit' name='sbt' value='"._AM_RMDP_DELETE."'>
				<input type='button' value='"._AM_RMDP_CANCEL."' name='cancel' onClick='history.go(-1);'>
				<input type='hidden' name='op' value='del'>
				<input type='hidden' name='idc' value='$idc'>
				<input type='hidden' name='ok' value='1'>
				</td></tr></table>";
		xoops_cp_footer();
	}
}

/**
 * Mostramos una lista de las descargas que
 * pertenecen a esta categoría
 */
function View(){
	global $xoopsDB;
	
	$idc = $_GET['idc'];
	if ($idc<=0){ header('location: categos.php'); die(); }
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_software')." WHERE id_cat='$idc' ORDER BY nombre");
	
	xoops_cp_header();
	include('functions.php');
	DP_ShowNav();
	$catego = DP_CategoName($idc);
	echo "<a href='downs.php?op=new'>"._AM_RMDP_NEWDOWN."</a><br>
		 <table width='100%' class='outer' cellspacing='1'>
			<tr><th colspan='2'>".sprintf(_AM_RMDP_DOWNSLIST, $catego)."</th></tr>";
	while ($row=$xoopsDB->fetchArray($result)){
		if ($class=='even'){ $class='odd'; } else { $class='even'; }
		echo "<tr class='$class'><td align='left'>
			<a href='downs.php?op=view&amp;ids=$row[id_soft]'>$row[nombre]</a><br>
			<span style='font-size: 10px;'>".substr($row['longdesc'], 0, 160)." [...]</span></td>
			<td align='center'>
			<a href='downs.php?op=os&amp;ids=$row[id_soft]'>"._AM_RMDP_SOFTOS."</a> |
			<a href='downs.php?op=shots&amp;ids=$row[id_soft]'>"._AM_RMDP_SOFTSHOTS."</a> |
			<a href='downs.php?op=mod&amp;ids=$row[id_soft]'>"._AM_RMDP_MODIFY."</a> |
			<a href='downs.php?op=del&amp;ids=$row[id_soft]'>"._AM_RMDP_DELETE."</a>
			</td></tr>";
	}			
	echo "</table>";
	xoops_cp_footer();
}

/**
 * Seleccionamos las opciones para ejecutar
 */

switch ($op){
	case 'new':
		NewForm();
		break;
	case 'save':
		SaveCatego();
		break;
	case 'mod':
		ModForm();
		break;
	case 'savemod':
		SaveMod();
		break;
	case 'del':
		Delete();
		break;
	case 'view':
		View();
		break;
	default:
		ShowCategos();
		break;
}
?>
