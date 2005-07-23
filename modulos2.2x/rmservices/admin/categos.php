<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: categos.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                //
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
// Este programa es un programa libre; puedes distribuirlo y modificarlo    //
// bajo los términos de al GNU General Public Licencse como ha sido         //
// publicada por The Free Software Foundation (Fundación de Software Libre; //
// en cualquier versión 2 de la Licencia o mas reciente.                    //
//                                                                          //
// Este programa es distribuido esperando que sea últil pero SIN NINGUNA    //
// GARANTÍA. Ver The GNU General Public License para mas detalles.          //
// ------------------------------------------------------------------------ //
// Questions, Bugs or any comment plese write me                            //
// Preguntas, errores o cualquier comentario escribeme                      //
// <adminone@redmexico.com.mx>                                              //
// ------------------------------------------------------------------------ //
//////////////////////////////////////////////////////////////////////////////

$location = 'categos';
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}
$myts =& MyTextSanitizer::getInstance();

function ShowCategos(){
	global $xoopsDB;
	include 'functions.php';
	$result = $xoopsDB->query("SELECT * FROM $tcategos ORDER BY nombre");
	$num = $xoopsDB->getRowsNum($result);
	if ($num <=0){
		NewForm(1);
		die();
	}
	xoops_cp_header();
	ShowNav();
	
	echo "<a href='categos.php?op=new'>"._AM_NEWCATEGO."</a><br>
	      <table width='100%' class='outer' cellspacing='1'>\n
			<tr><th align='left' colspan='2'>"._AM_CATEGOLIST."</th></tr>\n";
	
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<tr><td class='even' align='left'>
			  <a href='categos.php?op=view&amp;idc=$row[id_cat]'>$row[nombre]</a></td>\n
			  <td class='even' align='center'>
			  <a href='categos.php?op=mod&amp;idc=$row[id_cat]'>"._AM_MODIFY."</a> |
			  <a href='categos.php?op=del&amp;idc=$row[id_cat]'>"._AM_DELETE."</a></td></tr>";
	}
	echo "</table>";
	xoops_cp_footer();
}

function NewForm($err = 0){
	global $xoopsDB;
	
	xoops_cp_header();
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
	include_once('functions.php');
	ShowNav();
	
	if ($err==1){
		echo "<div class='errorMsg'>"._AM_NOCATEGOS."</div><br>";
	}
	
	echo "<table width='100%' class='outer' cellspacing='1'>\n
			<tr><th colspan='2'>"._AM_NEWFORM."</th></tr>\n
			<form name='frm' method='post' action='categos.php'>\n
			<tr><td class='even' align='left'>"._AM_FORMNAME."</td>\n
			<td align='left' class='odd'><input type='text' name='nombre' size='30'></td></tr>\n
			<tr><td class='even' align='left'>"._AM_FORMIMG."</td>\n
			<td align='left' class='odd'>\n
			<select name='img'><option value=''>--</option>\n";
			$imgArray = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . "/modules/rmservices/images/categos/" ); 
			foreach( $imgArray as $image ){
        		echo "<option value='" . $image . "'>" . $image . "</option>";
    		}
	echo "  </select><br>
			<span style='font-size: 9px;'>"._AM_INFOIMG."</span></td></tr>\n
			<tr><td class='even' align='left'>"._AM_DESC."</td>\n
			<td align='left' class='odd'>";
			xoopsCodeTarea("desc", 20, 15);
			xoopsSmilies("desc");
	echo "  </td></tr>\n
	        <tr><td align='left' class='even'>&nbsp;</td>\n
			<td class='odd' align='left'><input type='submit' name='sbt' value='"._AM_SEND."'></td>
			<input type='hidden' name='op' value='save'>\n
			</tr></form></table>";
	xoops_cp_footer();
}

function SaveCatego(){
	global $xoopsDB;
	
	include('functions.php');
	
	$nombre = $_POST['nombre'];
	$img = $_POST['img'];
	$desc = $_POST['desc'];
	
	if ($nombre==''){
		redirect_header('categos.php?op=new', 1, _AM_ERRNAME);
		die();
	}
	if ($desc==''){
		redirect_header('categos.php?op=new', 1, _AM_ERRDESC);
		die();
	}
	
	$result = $xoopsDB->query("SELECT * FROM $tcategos WHERE nombre='$nombre'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num>0){
		redirect_header('categos.php?op=new', 1, _AM_ERREXIST);
		die();
	}
	
	$xoopsDB->query("INSERT INTO $tcategos (`nombre`,`desc`,`img`) VALUES ('$nombre','$desc','$img')");
	$err = $xoopsDB->error();
	
	if ($err==''){
		redirect_header('categos.php', 1, _AM_CATEGOOK);
		die();
	} else {
		redirect_header('categos.php?op=new', 1, _AM_ERRNEXT . $err);
		die();
	}
	
}

function SaveCategoMod(){
	global $xoopsDB;
	
	include('functions.php');
	
	$nombre = $_POST['nombre'];
	$img = $_POST['img'];
	$desc = $_POST['desc'];
	$idc = $_POST['idc'];
	
	if ($nombre==''){
		redirect_header('categos.php?op=new', 1, _AM_ERRNAME);
		die();
	}
	if ($desc==''){
		redirect_header('categos.php?op=new', 1, _AM_ERRDESC);
		die();
	}
	if ($idc<=0){
		header('location: categos.php');
		die();
	}
	
	$xoopsDB->query("UPDATE $tcategos SET `nombre`='$nombre',`desc`='$desc',`img`='$img' WHERE id_cat='$idc'");
	$err = $xoopsDB->error();
	
	if ($err==''){
		redirect_header('categos.php', 1, _AM_CATEGOOK);
		die();
	} else {
		redirect_header('categos.php', 5, _AM_ERRNEXT . $err);
		die();
	}
	
}

function Modify(){
	global $xoopsDB;
	
	$idc = $_GET['idc'];
	
	if ($idc<=0){
		header('location: categos.php');
		die();
	}
	
	xoops_cp_header();
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
	include_once('functions.php');
	ShowNav();
	
	$result = $xoopsDB->query("SELECT * FROM $tcategos WHERE id_cat='$idc'");
	$num = $xoopsDB->getRowsNum($result);
	
	if ($num<=0){
		redirect_header('categos.php', 1, _AM_NOEXIST);
		die();
	}
	$row = $xoopsDB->fetchArray($result);
	
	echo "<table width='100%' class='outer' cellspacing='1'>\n
			<tr><th colspan='2'>"._AM_MODIFYFORM."</th></tr>\n
			<form name='frm' method='post' action='categos.php'>\n
			<tr><td class='even' align='left'>"._AM_FORMNAME."</td>\n
			<td align='left' class='odd'><input value='$row[nombre]' type='text' name='nombre' size='30'></td></tr>\n
			<tr><td class='even' align='left'>"._AM_FORMIMG."</td>\n
			<td align='left' class='odd'>\n
			<select name='img'><option value=''>--</option>\n";
			$imgArray = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . "/modules/rmservices/images/categos/" ); 
			foreach( $imgArray as $image ){
				if ($row['img']==$image){
					echo "<option value='" . $image . "' selected>" . $image . "</option>";
				} else {
					echo "<option value='" . $image . "'>" . $image . "</option>";
				}
    		}
			
	echo "  </select><br>
			<span style='font-size: 9px;'>"._AM_INFOIMG."</span></td></tr>\n
			<tr><td class='even' align='left'>"._AM_DESC."</td>\n
			<td align='left' class='odd'>";
			$GLOBALS['desc'] = $row['desc'];
			xoopsCodeTarea("desc", 20, 15);
			xoopsSmilies("desc");
	echo "  </td></tr>\n
	        <tr><td align='left' class='even'>&nbsp;</td>\n
			<td class='odd' align='left'><input type='submit' name='sbt' value='"._AM_SEND."'></td>
			<input type='hidden' name='op' value='savemod'>\n
			<input type='hidden' name='idc' value='$idc'>\n
			</tr></form></table>";
	
	xoops_cp_footer();
}

function Delete(){
	global $xoopsDB;
	
	include('functions.php');
	$ok = $_POST['ok'];
	$idc = $_GET['idc'];
	if ($idc<=0){ $idc = $_POST['idc']; }
	
	if (!CategoIsEmpty($idc)){
		redirect_header("categos.php", 3, _AM_NOTDELETE);
		die();
	}

	if ($ok){
		if ($idc<=0){
			header('location: categos.php');
			die();
		}
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmsrv_categos')." WHERE id_cat='$idc'");
		redirect_header('categos.php', 1, _AM_DELETED);
		die();
	} else {
		if ($idc<=0){
			header('location: categos.php');
			die();
		}
		xoops_cp_header();
		ShowNav();
		echo "<table width='60%' class='outer' cellspacing='1' align='center'>\n
				<tr class='even'><td align='center'>\n
				<form name='frm' method='post' action='categos.php'>
				"._AM_CONFIRMDEL."<br><br>\n
				<input type='button' name='sbt' value='"._AM_CANCEL."' onClick='javascript: history.go(-1);'>\n
				<input type='submit' name='sbt' value='"._AM_DELETE."'>\n
				<input type='hidden' name='op' value='del'>\n
				<input type='hidden' name='ok' value='1'>\n
				<input type='hidden' name='idc' value='$idc'>\n
				</form></td></tr></table>";
		xoops_cp_footer();
	}
}

function ViewCatego(){
	global $xoopsDB, $myts;
	
	$idc = $_GET['idc'];
	if ($idc<=0){ header('location: categos.php'); die(); }
	include('functions.php');
	$result = $xoopsDB->query("SELECT * FROM $tcategos WHERE id_cat='$idc'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){ redirect_header('categos.php', 1, _AM_NOEXIST); die(); }
	$row = $xoopsDB->fetchArray($result);
	
	xoops_cp_header();
	ShowNav();
	echo "<table width='100%' cellspacing='1' class='outer'>\n
			<tr><th colspan='2'>$row[nombre]</th></tr>\n
			<tr><td class='even' align='center'>";
			if ($row['img']!=''){
				echo "<img src='".XOOPS_URL."/modules/rmservices/images/categos/$row[img]' border='0'>";
			}
	echo "  </td><td class='odd' align='left'>".$myts->makeTareaData4Show($row['desc'])."<br><br><br>
			<a href='categos.php?op=mod&amp;idc=".$idc."'>"._AM_MODIFY."</a>\n |
			<a href='categos.php?op=del&amp;idc=".$idc."'>"._AM_DELETE."</a>\n</td></tr></table><br>";
	
	echo "<table width='100%' class='outer' cellspacing='1'>
			<tr><th colspan='2'>".sprintf(_AM_SERVICESIN, $row['nombre'])."</th></tr>";
		$result = $xoopsDB->query("SELECT id_srv, nombre, activo, shortdesc FROM $tservs WHERE id_cat='$idc'");
		while($row = $xoopsDB->fetchArray($result)){
			echo "<tr class='even'><td align='left'>
					<a href='services.php?op=view&amp;ids=".$row['id_srv']."'>$row[nombre]</a><br>
					<span style='font-size: 9px;'>
					$row[shortdesc]<br><strong>";
					if ($row['activo']==1){
						echo _AM_ACTIVE;
					} else {
						echo _AM_INACTIVE;
					}
			echo "</strong></span></td>
					<td align='center'>
					<a href='services.php?op=mod&amp;ids=".$row['id_srv']."'>"._AM_MODIFY."</a>\n
				    <a href='services.php?op=del&amp;ids=".$row['id_srv']."'>"._AM_DELETE."</a>\n
					</td></tr>";
		}
	echo "</table>";
	xoops_cp_footer();
}

$op = $_GET['op'];
if ($op==''){
	$op = $_POST['op'];
}

switch ($op){
	case 'del':
		Delete();
		break;
	case 'savemod':
		SaveCategoMod();
		break;
	case 'mod':
		Modify();
		break;
	case 'save':
		SaveCatego();
		break;
	case 'new':
		NewForm();
		break;
	case 'view':
		ViewCatego();
		break;
	default:
		ShowCategos();
		break;
}
?>
