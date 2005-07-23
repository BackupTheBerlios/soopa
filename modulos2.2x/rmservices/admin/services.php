<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: services.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $               //
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

$location = 'services';
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}
$myts =& MyTextSanitizer::getInstance();

/***
 * Mostramos los servicios existentes
 * Esta lista no esta ordenada por categorías
 **/
function ShowServices(){
	global $xoopsDB;
	include('functions.php');
	
	$result = $xoopsDB->query("SELECT * FROM $tservs ORDER BY nombre, id_cat");
	$num = $xoopsDB->getRowsNum($result);
	
	// Si no existen servicios entonces enviamos al formulario de creación
	if ($num<=0){ NewForm(); die(); }
	
	// Mostramos los servicios
	xoops_cp_header();
	ShowNav();
	echo "<a href='services.php?op=new'>"._AM_NEWSERVICE."</a>\n
		  <table width='100%' class='outer' cellspacing='1'>\n
		  <tr><th colspan='6' align='left'>"._AM_SERVICESLIST."</th></tr>\n
		  <tr class='head'><td>&nbsp;</td>\n
		  <td algn='center'>"._AM_SRVNAME."</td>\n
		  <td algn='center'>"._AM_SRVSTATUS."</td>\n
		  <td algn='center'>"._AM_SRVPRICE."</td>\n
		  <td algn='center'>"._AM_SRV_TERMS."</td>\n
		  <td algn='center'>"._AM_OPTIONS."</td></tr>\n";
	
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<tr class='even'><td align='center'>\n
			  <img src='$row[img]' border='0'></td>\n
			  <td align='left'>
			  <a href='services.php?op=view&amp;ids=$row[id_srv]'>$row[nombre]</a><br>
			  <span style='font-size: 9px'>$row[shortdesc]</span></td>\n
			  <td align='center'>";
			  if ($row['activo']==1){ echo _AM_ACTIVE; } else { echo _AM_INACTIVE; }
		echo "</td>\n<td align='center'>$row[precio]</td>\n
			  <td align='center'>";
			if ($row['terminos']){
				if (HavTerms($row['id_srv'])){
					echo "<img src='../images/termok.gif' border='0'>";
				} else {
					echo "<img src='../images/termno.gif' border='0'>";
				}
			} else {
				echo "<img src='../images/termno.gif' border='0'>";
			}
		echo "</td><td align='center'><a href='services.php?op=caract&amp;ids=$row[id_srv]'>"._AM_CARACTS."</a> | ";
			if ($row['terminos']){ echo "<a href='services.php?op=terms&amp;ids=$row[id_srv]'>"._AM_SRV_TERMS."</a> | "; }
		echo "<a href='services.php?op=mod&amp;ids=$row[id_srv]'>"._AM_MODIFY."</a> |
			  <a href='services.php?op=del&amp;ids=$row[id_srv]'>"._AM_DELETE."</a></td></tr>";
	}
	echo "</table><br>";
	ShowNav();
	xoops_cp_footer();
}

/***
 * Formulario para agregar un nuevo servicio
 **/
function NewForm(){
	global $xoopsDB;
	xoops_cp_header();
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	include_once('functions.php');
	ShowNav();
	echo "<table width='100%'  border='0' cellpadding='0' cellspacing='1' class='outer'>
  			<tr align='left'><th colspan='2'>"._AM_NEWSERVICE."</th>\n
  			</tr><form name='frm' method='post' action='services.php'>\n
  			<tr><td class='even'>"._AM_FORMNAME."</td>\n
    		<td class='odd'><input name='nombre' type='text' id='nombre' size='30'></td></tr>\n
  			<tr><td class='even'>"._AM_FORMCATEGO."</td>\n
    		<td class='odd'><select name='idc' id='idc'>\n
      		<option value='0' selected>"._AM_SELECTCAT."</option>\n";
	$result = $xoopsDB->query("SELECT nombre, id_cat FROM ".$xoopsDB->prefix("rmsrv_categos")." ORDER BY nombre");
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<option value=$row[id_cat]>$row[nombre]</option>";
	}
    echo "  </select></td></tr>\n
		  	<tr><td class='even'>"._AM_FORMPRICE."</td>\n
    		<td class='odd'><input name='precio' type='text' id='precio' size='30'></td></tr>\n
  			<tr><td class='even'>"._AM_FORMCODE."</td>\n
    		<td class='odd'><input name='codigo' type='text' id='codigo' size='30' maxlength='20'></td></tr>\n
  			<tr><td class='even'>"._AM_SHORTDESC."</td>\n
    		<td class='odd'><input name='shortdesc' type='text' id='shortdesc' value='' size='30' maxlength='255'></td></tr>\n
  			<tr><td class='even'>"._AM_LONGDESC."</td>
    		<td class='odd'>";
			xoopsCodeTarea("longdesc", 20, 15);
			xoopsSmilies("longdesc");
	echo "	</td></tr>\n
  			<tr><td class='even'>"._AM_FORMIMG."</td>\n
    		<td class='odd'><input name='img' type='text' id='img' size='30' maxlength='255'></td></tr>\n
  			<tr><td class='even'>"._AM_SHOWINBLOCK."</td>\n
    		<td class='odd'><input name='inblock' type='radio' value='1' checked> "._AM_YES." &nbsp;
			<input name='inblock' type='radio' value='0'> "._AM_NO."</td></tr>\n
  			<tr><td class='even'>"._AM_FORMACTIVE."</td>\n
    		<td class='odd'><input name='activo' type='radio' value='1' checked> "._AM_YES." &nbsp;
			<input name='activo' type='radio' value='0'> "._AM_NO."</td></tr>\n
			<tr><td class='even'>"._AM_FORMPRE."</td>\n
    		<td class='odd'><input name='presu' type='radio' value='1' checked> "._AM_YES." &nbsp;
			<input name='presu' type='radio' value='0'> "._AM_NO."</td></tr>\n
			<tr><td class='even'>"._AM_SRV_HAVETERMS."</td>\n
    		<td class='odd'><input name='terminos' type='radio' value='1' checked> "._AM_YES." &nbsp;
			<input name='terminos' type='radio' value='0'> "._AM_NO."</td></tr>\n
			<tr><td class='even'>"._AM_FORM."<br><span style='font-size: 9px; color: #FF0000;'>"._AM_FORM_TIP."</span></td>\n
    		<td class='odd'><textarea name='form' rows='4'></textarea></td></tr>\n
  			<tr><td class='even'>&nbsp;</td>\n
    		<td class='odd'><input type='submit' name='Submit' value='"._AM_SEND."'></td></tr>\n
  			<input type='hidden' name='op' value='save'></form></table>";
	xoops_cp_footer();
}


function ModForm(){
	global $xoopsDB;
	$ids = $_GET['ids'];
	include_once('functions.php');
	if ($ids<=0){ header('location: services.php'); die(); }
	
	$result = $xoopsDB->query("SELECT * FROM $tservs WHERE id_srv='$ids'");
	$num = $xoopsDB->getRowsNum($result);
	
	if ($num<=0){ redirect_header('services.php', 1, _AM_SRVNOEXIST); die(); }
	
	$row = $xoopsDB->fetchArray($result);
	
	xoops_cp_header();
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	ShowNav();
	echo "<table width='100%'  border='0' cellpadding='0' cellspacing='1' class='outer'>
  			<tr align='left'><th colspan='2'>"._AM_NEWSERVICE."</th>\n
  			</tr><form name='frm' method='post' action='services.php'>\n
  			<tr><td class='even'>"._AM_FORMNAME."</td>\n
    		<td class='odd'><input value='$row[nombre]' name='nombre' type='text' id='nombre' size='30'></td></tr>\n
  			<tr><td class='even'>"._AM_FORMCATEGO."</td>\n
    		<td class='odd'><select name='idc' id='idc'>\n
      		<option value='0' selected>"._AM_SELECTCAT."</option>\n";
	$result = $xoopsDB->query("SELECT nombre, id_cat FROM ".$xoopsDB->prefix("rmsrv_categos")." ORDER BY nombre");
	while ($rw=$xoopsDB->fetchArray($result)){
		if ($row['id_cat']==$rw['id_cat']){
			echo "<option value=$rw[id_cat] selected>$rw[nombre]</option>";
		} else {
			echo "<option value=$rw[id_cat]>$rw[nombre]</option>";
		}
	}
    echo "  </select></td></tr>\n
		  	<tr><td class='even'>"._AM_FORMPRICE."</td>\n
    		<td class='odd'><input value='$row[precio]' name='precio' type='text' id='precio' size='30'></td></tr>\n
  			<tr><td class='even'>"._AM_FORMCODE."</td>\n
    		<td class='odd'><input  value='$row[codigo]' name='codigo' type='text' id='codigo' size='30' maxlength='20'></td></tr>\n
  			<tr><td class='even'>"._AM_SHORTDESC."</td>\n
    		<td class='odd'><input  value='$row[shortdesc]' name='shortdesc' type='text' id='shortdesc' value='' size='30' maxlength='255'></td></tr>\n
  			<tr><td class='even'>"._AM_LONGDESC."</td>
    		<td class='odd'>";
			$GLOBALS['longdesc'] = $row['longdesc'];
			xoopsCodeTarea("longdesc", 20, 15);
			xoopsSmilies("longdesc");
	echo "	</td></tr>\n
  			<tr><td class='even'>"._AM_FORMIMG."</td>\n
    		<td class='odd'><input  value='$row[img]' name='img' type='text' id='img' size='30' maxlength='255'></td></tr>\n
  			<tr><td class='even'>"._AM_SHOWINBLOCK."</td>\n
    		<td class='odd'>";
			if ($row['inblock']==1){
				echo "<input name='inblock' type='radio' value='1' checked> "._AM_YES." &nbsp;";
				echo "<input name='inblock' type='radio' value='0'> "._AM_NO;
			} else {
				echo "<input name='inblock' type='radio' value='1'> "._AM_YES." &nbsp;";
				echo "<input name='inblock' type='radio' value='0' checked> "._AM_NO;
			}
	echo   "</td></tr>\n
  			<tr><td class='even'>"._AM_FORMACTIVE."</td>\n
    		<td class='odd'>";
			if ($row['activo']==1){
				echo "<input name='activo' type='radio' value='1' checked> "._AM_YES." &nbsp;";
				echo "<input name='activo' type='radio' value='0'> "._AM_NO;
			} else {
				echo "<input name='activo' type='radio' value='1'> "._AM_YES." &nbsp;";
				echo "<input name='activo' type='radio' value='0' checked> "._AM_NO;
			}
	echo   "</td></tr>\n
			<tr><td class='even'>"._AM_FORMPRE."</td>\n
    		<td class='odd'>";
			if ($row['presupuesto']==1){
				echo "<input name='presu' type='radio' value='1' checked> "._AM_YES." &nbsp;";
				echo "<input name='presu' type='radio' value='0'> "._AM_NO;
			} else {
				echo "<input name='presu' type='radio' value='1'> "._AM_YES." &nbsp;";
				echo "<input name='presu' type='radio' value='0' checked> "._AM_NO;
			}
	echo   "</td></tr>\n
			<tr><td class='even'>"._AM_SRV_HAVETERMS."</td>\n
    		<td class='odd'>";
			if ($row['terminos']==1){
				echo "<input name='terminos' type='radio' value='1' checked> "._AM_YES." &nbsp;";
				echo "<input name='terminos' type='radio' value='0'> "._AM_NO;
			} else {
				echo "<input name='terminos' type='radio' value='1'> "._AM_YES." &nbsp;";
				echo "<input name='terminos' type='radio' value='0' checked> "._AM_NO;
			}
	echo   "</td></tr>\n
			<tr><td class='even'>"._AM_FORM."<br><span style='font-size: 9px; color: #FF0000;'>"._AM_FORM_TIP."</span></td>\n
    		<td class='odd'><textarea name='form' rows='4'>$row[form]</textarea></td></tr>\n
  			<tr><td class='even'>&nbsp;</td>\n
    		<td class='odd'><input type='submit' name='Submit' value='"._AM_SEND."'></td></tr>\n
  			<input type='hidden' name='op' value='savemod'>\n
			<input type='hidden' name='ids' value='$ids'></form></table>";
	xoops_cp_footer();
}

/***
 * Guardamos los datos del nuevo servicio
 **/
function SaveService(){
	global $xoopsDB;
	
	$nombre = $_POST['nombre'];
	$idc = $_POST['idc'];
	$precio = $_POST['precio'];
	$codigo = $_POST['codigo'];
	$shortdesc = $_POST['shortdesc'];
	$longdesc = $_POST['longdesc'];
	$img = $_POST['img'];
	$inblock = $_POST['inblock'];
	$activo = $_POST['activo'];
	$presupuesto = $_POST['presu'];
	$form = $_POST['form'];
	$terminos = $_POST['terminos'];
	
	// Comprobamos los datos recibidos
	if ($nombre==''){ redirect_header('services.php?op=new', 1, _AM_ERRNAME); die(); }
	if ($idc<=0){ redirect_header('services.php?op=new', 1, _AM_ERRCAT); die(); }
	if ($precio<0){ redirect_header('services.php?op=new', 1, _AM_ERRPRICE); die(); }
	if ($codigo==''){ redirect_header('services.php?op=new', 1, _AM_ERRCODE); die(); }
	if ($shortdesc==''){ redirect_header('services.php?op=new', 1, _AM_ERRSDESC); die(); }
	if ($longdesc==''){ redirect_header('services.php?op=new', 1, _AM_ERRLDESC); die(); }
	if ($form==''){ redirect_header('services.php?op=new', 1, _AM_ERRFORM); die(); }
	
	include 'functions.php';
	
	//Comprobamos que no exista un servicio con el mismo nombre y categoria
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM $tservs WHERE nombre='$nombre' AND id_cat='$idc'"));
	if ($num>0){ redirect_header('services.php?op=new', 1, _AM_ERREXIST); die(); }
	
	$sql = "INSERT INTO $tservs (`nombre`, `id_cat`, `img`, `precio`, `shortdesc`, `longdesc`, `inblock`, `codigo`, `activo`,`presupuesto`,`form`,`terminos`)
			VALUES ('$nombre','$idc','$img','$precio','$shortdesc','$longdesc','$inblock','$codigo','$activo','$presupuesto','$form','$terminos')";
	$xoopsDB->query($sql);
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('services.php', 1, _AM_SERVICEOK);
		die();
	} else {
		redirect_header('services.php', 5, _AM_ERRNEXT . $err);
		die();
	}
}

function SaveModify(){
	global $xoopsDB;
	
	$nombre = $_POST['nombre'];
	$idc = $_POST['idc'];
	$precio = $_POST['precio'];
	$codigo = $_POST['codigo'];
	$shortdesc = $_POST['shortdesc'];
	$longdesc = $_POST['longdesc'];
	$img = $_POST['img'];
	$inblock = $_POST['inblock'];
	$activo = $_POST['activo'];
	$presupuesto = $_POST['presu'];
	$ids = $_POST['ids'];
	$form = $_POST['form'];
	$terminos = $_POST['terminos'];
	
	if ($ids<=0){ header('location: services.php'); die(); }
	
	// Comprobamos los datos recibidos
	if ($nombre==''){ redirect_header('services.php?op=new', 1, _AM_ERRNAME); die(); }
	if ($idc<=0){ redirect_header('services.php?op=new', 1, _AM_ERRCAT); die(); }
	if ($precio<0){ redirect_header('services.php?op=new', 1, _AM_ERRPRICE); die(); }
	if ($codigo==''){ redirect_header('services.php?op=new', 1, _AM_ERRCODE); die(); }
	if ($shortdesc==''){ redirect_header('services.php?op=new', 1, _AM_ERRSDESC); die(); }
	if ($longdesc==''){ redirect_header('services.php?op=new', 1, _AM_ERRLDESC); die(); }
	if ($form==''){ redirect_header('services.php?op=new', 1, _AM_ERRFORM); die(); }
	
	include 'functions.php';
	
	//Comprobamos que no exista un servicio con el mismo nombre y categoria
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM $tservs WHERE id_srv='$ids'"));
	if ($num<=0){ redirect_header('services.php?op=new', 1, _AM_SRVNOEXIST); die(); }
	
	$sql = "UPDATE $tservs SET `nombre`='$nombre', `id_cat`='$idc', `img`='$img',
		   `precio`='$precio', `shortdesc`='$shortdesc', `longdesc`='$longdesc', 
		   `inblock`='$inblock', `codigo`='$codigo', `activo`='$activo',`presupuesto`='$presupuesto',
		   `form`='$form',`terminos`='$terminos' WHERE id_srv='$ids'";

	$xoopsDB->query($sql);
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('services.php', 1, _AM_SERVICEMODOK);
		die();
	} else {
		redirect_header('services.php', 5, _AM_ERRNEXT . $err);
		die();
	}
}

function Delete(){
	global $xoopsDB;
	
	$ok = $_POST['ok'];
	$ids = $_GET['ids'];
	if ($ids<=0){ $ids = $_POST['ids']; }
	
	if ($ids<=0){
		header('location: services.php');
		die();
	}
	
	include('functions.php');	
	$inPromo = SrvInPromo($ids);
	$inSales = SrvInSales($ids);
	if ($inPromo || $inSales){
		xoops_cp_header();
		ShowNav();
		
		echo "<table width='60%' align='center' class='outer' cellspacing='1'>\n
			  <tr class='even'><td align='left'><br><br>\n
			  <strong>"._AM_NOTDELETE."</strong><br>";
		
		if ($inPromo){
			echo " - "._AM_INPROMO."<br>";
		}
		if ($inSales){
			echo " - "._AM_INSALES."<br>";
		}
		
		echo "<br><br></td></tr></table>";
			  
		xoops_cp_footer();
		die();
	}
	
	if ($ok){
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmsrv_servicios')." WHERE id_srv='$ids'");
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmsrv_banners')." WHERE id_srv='$ids'");
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmsrv_caract')." WHERE id_srv='$ids'");
		redirect_header('services.php', 1, _AM_DELETED);
		die();
	} else {
		xoops_cp_header();
		ShowNav();
		echo "<table width='60%' class='outer' cellspacing='1' align='center'>\n
				<tr class='even'><td align='center'>\n
				<form name='frm' method='post' action='services.php'>
				"._AM_CONFIRMDEL."<br><br>\n
				<input type='button' name='sbt' value='"._AM_CANCEL."' onClick='javascript: history.go(-1);'>\n
				<input type='submit' name='sbt' value='"._AM_DELETE."'>\n
				<input type='hidden' name='op' value='del'>\n
				<input type='hidden' name='ok' value='1'>\n
				<input type='hidden' name='ids' value='$ids'>\n
				</form></td></tr></table>";
		xoops_cp_footer();
	}
}

function Caracteristicas(){
	global $xoopsDB;
	$ids = $_GET['ids'];
	if ($ids<=0){ $ids = $_POST['ids']; }
	if ($ids<=0){
		header('location: services.php');
		die();
	}
	
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
	xoops_cp_header();
	include 'functions.php';
	ShowNav();
	echo "<table width='80%' align='center' class='outer' cellspacing='1'>\n
			<tr>
			<td colspan='2'>
			<table width='100%' cellpadding='0' cellspacing='0'>
			<tr>
				<th>"._AM_ALLCARACT."</th>
				<th align='left' colspan='2'>".sprintf(_AM_EXISTCAR, ServiceName($ids))."</th>
			</tr>
			<tr>
			<td align='center' class='even'>
			<form name='frmAdd' method='post' action='services.php'>
			<select name='idc' size='10'>";
	$result = $xoopsDB->query("SELECT id_car, nombre FROM $tcar ORDER BY nombre");
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<option value='$row[id_car]'>$row[nombre]</option>";
	}
	echo "</select><br><br>
		  <input type='button' name='del' value='"._AM_DELETE."' onClick=\"frmAdd.op.value='delcar'; frmAdd.submit();\">\n
		  <input type='button' name='modify' value='"._AM_MODIFY."' onClick=\"frmAdd.op.value='modcar'; frmAdd.submit();\">\n
		  <input type='submit' name='sbt' value='"._AM_ADD."'>\n
		  <input type='hidden' name='op' value='addcar'>\n
		  <input type='hidden' name='ids' value='$ids'>\n
			</form>
			</td>
			<td align='center' class='odd' width='50%'><form name='frmE' method='post' action='services.php'>\n
			<select name='idc' size='10'>";
	$result = $xoopsDB->query("SELECT id_car FROM $tcarrel WHERE id_srv='$ids'");
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<option value='$row[id_car]'>".CarName($row['id_car'])."</option>";
	}
	echo "</select><br><br>\n
		  <input type='button' name='del' value='"._AM_DELETE."' onClick=\"frmE.op.value='delcars'; frmE.submit();\">\n
		  <input type='submit' name='sbt' value='"._AM_MODIFY."'>\n
		  <input type='hidden' name='op' value='modcar'>\n
		  <input type='hidden' name='ids' value='$ids'>\n</form></td>
			</tr>
			</table>
			</td>
			</tr>\n
		  <tr><th align='left' colspan='2'>"._AM_NEWCAR."</th></tr>\n
		  <form name='frmNew' action='services.php' method='post'>\n
		  <tr><td align='left' class='even'>"._AM_FORMNAME."</td>\n
		  <td class='odd' align='left'><input type='text' size='30' name='nombre'>\n</td></tr>
		  <tr><td align='left' class='even'>"._AM_SHORTDESC."</td>\n
		  <td class='odd' align='left'><input type='text' size='50' name='shortdesc' maxlenght='255'>\n</td></tr>
		  <tr><td class='even' align='left'>"._AM_LONGDESC."</td>\n
		  <td class='odd' align='left'>";
		  xoopsCodeTarea("longdesc", 20, 15);
		  xoopsSmilies("longdesc");
	echo "</td></tr>\n
		  <tr><td class='even' align='left'>"._AM_FORMIMG."</td>\n
		  <td class='odd' align='left'><select name='img'><option value=''>--</option>\n";
			$imgArray = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . "/modules/rmservices/images/caracts/" ); 
			foreach( $imgArray as $image ){
        		echo "<option value='" . $image . "'>" . $image . "</option>";
    		}
	echo "  </select><br></td></tr>\n
		  <tr><td class='even'>&nbsp;</td>\n
		  <td class='odd' align='left'><input type='submit' name='sbt' value='"._AM_SEND."'></td></tr>\n
		  <input type='hidden' name='op' value='savecar'>\n
		  <input type='hidden' name='ids' value='$ids'>\n
		  </form></table>";
	
	xoops_cp_footer();
}

function Terminos(){
	global $xoopsDB;
	$ids = $_GET['ids'];
	if ($ids<=0){ $ids = $_POST['ids']; }
	if ($ids<=0){
		header('location: services.php');
		die();
	}
	
	xoops_cp_header();
	include 'functions.php';
	ShowNav();
	echo "<table width='80%' align='center' class='outer' cellspacing='1'>\n
			<tr>
			<td colspan='2'>
			<table width='100%' cellpadding='0' cellspacing='0'>
			<tr>
				<th>"._AM_ALL_TERMS."</th>
				<th align='left' colspan='2'>".sprintf(_AM_ASSIGNED_TERMS, ServiceName($ids))."</th>
			</tr>
			<tr>
			<td align='center' class='even'>
			<form name='frmAdd' method='post' action='services.php'>
			<select name='idt' size='10'>";
	$result = $xoopsDB->query("SELECT id_term, titulo FROM $tterms ORDER BY titulo");
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<option value='$row[id_term]'>$row[titulo]</option>";
	}
	echo "</select><br><br>
		  <input type='button' name='del' value='"._AM_DELETE."' onClick=\"frmAdd.op.value='delterm'; frmAdd.submit();\">\n
		  <input type='button' name='modify' value='"._AM_MODIFY."' onClick=\"frmAdd.op.value='modterm'; frmAdd.submit();\">\n
		  <input type='submit' name='sbt' value='"._AM_ADD."'>\n
		  <input type='hidden' name='op' value='addterm'>\n
		  <input type='hidden' name='ids' value='$ids'>\n
			</form>
			</td>
			<td align='center' class='odd' width='50%'><form name='frmE' method='post' action='services.php'>\n
			<select name='idt' size='10'>";
	$result = $xoopsDB->query("SELECT id_term FROM $ttrel WHERE id_srv='$ids'");
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<option value='$row[id_term]'>".TermName($row['id_term'])."</option>";
	}
	echo "</select><br><br>\n
		  <input type='submit' name='del' value='"._AM_DELETE."'>\n
		  <input type='hidden' name='op' value='delterm'>\n
		  <input type='hidden' name='ids' value='$ids'>\n</form></td>
			</tr>
			</table>
			</td>
			</tr>\n
		  </table>";
	
	xoops_cp_footer();
}

function SaveCar(){
	global $xoopsDB;
	
	$nombre = $_POST['nombre'];
	$shortdesc = $_POST['shortdesc'];
	$longdesc = $_POST['longdesc'];
	$img = $_POST['img'];
	$ids = $_POST['ids'];
	
	if ($nombre==''){ redirect_header('services.php?op=caract&amp;ids=$ids', 1, _AM_ERRNAMECAR); die(); }
	if ($shortdesc==''){ redirect_header('services.php?op=caract&amp;ids=$ids', 1, _AM_ERRSDESCCAR); die(); }
	if ($longdesc==''){ redirect_header('services.php?op=caract&amp;ids=$ids', 1, _AM_ERRLDESCCAR); die(); }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmsrv_caract")." WHERE id_srv='$ids' AND nombre='$nombre'"));
	if ($num>0){ redirect_header('services.php?op=caract&amp;ids=$ids', 1, _AM_ERRLCAREXIST); die(); }
	
	$sql = "INSERT INTO ".$xoopsDB->prefix('rmsrv_caract')." (`nombre`,`shortdesc`,`longdesc`,`img`)
			VALUES ('$nombre','$shortdesc','$longdesc','$img')";
	$xoopsDB->query($sql);
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('services.php?op=caract&amp;ids='.$ids, 1, _AM_CARACTOK);
		die();
	} else {
		redirect_header('services.php?op=caract&amp;ids='.$ids, 5, _AM_ERRNEXT . $err);
		die();
	}
}

function SaveModCar(){
	global $xoopsDB;
	
	$ids = $_POST['ids'];
	$nombre = $_POST['nombre'];
	$shortdesc = $_POST['shortdesc'];
	$longdesc = $_POST['longdesc'];
	$img = $_POST['img'];
	$idc = $_POST['idc'];
	
	//if ($ids<=0 || $idc<=0){ header('location: services.php'); die(); }
	if ($nombre==''){ redirect_header('services.php?op=caract&amp;ids=$ids', 1, _AM_ERRNAMECAR); die(); }
	if ($shortdesc==''){ redirect_header('services.php?op=caract&amp;ids=$ids', 1, _AM_ERRSDESCCAR); die(); }
	if ($longdesc==''){ redirect_header('services.php?op=caract&amp;ids=$ids', 1, _AM_ERRLDESCCAR); die(); }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmsrv_caract")." WHERE id_car='$idc'"));
	if ($num<=0){ redirect_header('services.php?op=caract&amp;ids=$ids', 1, _AM_CARNOEXIST); die(); }
	
	$sql = "UPDATE ".$xoopsDB->prefix('rmsrv_caract')." SET `nombre`='$nombre',`shortdesc`='$shortdesc',
			`longdesc`='$longdesc',`img`='$img' WHERE id_car='$idc'";
	$xoopsDB->query($sql);
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('services.php?op=caract&amp;ids='.$ids, 1, _AM_CARMODOK);
		die();
	} else {
		redirect_header('services.php?op=caract&amp;ids='.$ids, 5, _AM_ERRNEXT . $err);
		die();
	}
}

function ModifyCar(){
	global $xoopsDB;
	
	$idc = $_POST['idc'];
	$ids = $_POST['ids'];
	if ($idc<=0){ header('location: services.php'); die(); }
	include('functions.php');
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
	$result = $xoopsDB->query("SELECT * FROM $tcar WHERE id_car='$idc'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){ redirect_header('services.php', 1, _AM_CARNOEXIST); die(); }
	$row = $xoopsDB->fetchArray($result);
	xoops_cp_header();
	ShowNav();
	echo "<table width='80%' align='center' class='outer' cellspacing='1'>\n
		  <tr><th align='left' colspan='2'>"._AM_MODCAR."</th></tr>\n
		  <form name='frmNew' action='services.php' method='post'>\n
		  <tr><td align='left' class='even'>"._AM_FORMNAME."</td>\n
		  <td class='odd' align='left'><input value='$row[nombre]' type='text' size='30' name='nombre'>\n</td></tr>
		  <tr><td align='left' class='even'>"._AM_SHORTDESC."</td>\n
		  <td class='odd' align='left'><input value='$row[shortdesc]' type='text' size='50' name='shortdesc' maxlenght='255'>\n</td></tr>
		  <tr><td class='even' align='left'>"._AM_LONGDESC."</td>\n
		  <td class='odd' align='left'>";
		  $GLOBALS['longdesc'] = $row['longdesc'];
		  xoopsCodeTarea("longdesc", 20, 15);
		  xoopsSmilies("longdesc");
	echo "</td></tr>\n
		  <tr><td class='even' align='left'>"._AM_FORMIMG."</td>\n
		  <td class='odd' align='left'><select name='img'><option value=''>--</option>\n";
			$imgArray = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . "/modules/rmservices/images/caracts/" ); 
			foreach( $imgArray as $image ){
				if ($row['img']==$image){
        			echo "<option value='" . $image . "' selected>" . $image . "</option>";
				} else {
					echo "<option value='" . $image . "'>" . $image . "</option>";
				}
    		}
	echo "  </select></td></tr>\n
		  <tr><td class='even'>&nbsp;</td>\n
		  <td class='odd' align='left'><input type='submit' name='sbt' value='"._AM_SEND."'></td></tr>\n
		  <input type='hidden' name='op' value='savemodcar'>\n
		  <input type='hidden' name='ids' value='$ids'>\n
		  <input type='hidden' name='idc' value='$idc'>\n
		  </form></table>";
	xoops_cp_footer();
	
}

function DelCar(){
	global $xoopsDB;
	
	$ok = $_POST['ok'];
	$idc = $_POST['idc'];
	$ids = $_POST['ids'];
	if ($idc<=0){ header('location: services.php?op=caract&ids='.$ids); die(); }
	
	if ($ok){
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmsrv_caract')." WHERE id_car='$idc'");
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmsrv_carrel')." WHERE id_car='$idc'");
		redirect_header('services.php?op=caract&amp;ids='.$ids, 1, _AM_CARDELETED);
		die();
	} else {
		include 'functions.php';
		xoops_cp_header();
		ShowNav();
		echo "<table width='60%' class='outer' cellspacing='1' align='center'>\n
				<tr class='even'><td align='center'>\n
				<form name='frm' method='post' action='services.php'>
				"._AM_CONFIRMDELCAR."<br><br>\n
				<input type='button' name='sbt' value='"._AM_CANCEL."' onClick='javascript: history.go(-1);'>\n
				<input type='submit' name='sbt' value='"._AM_DELETE."'>\n
				<input type='hidden' name='op' value='delcar'>\n
				<input type='hidden' name='ok' value='1'>\n
				<input type='hidden' name='ids' value='$ids'>\n
				<input type='hidden' name='idc' value='$idc'>\n
				</form></td></tr></table>";
		xoops_cp_footer();
	}
}

function AddCar(){
	global $xoopsDB;
	
	$idc = $_POST['idc'];
	$ids = $_POST['ids'];
	
	if ($ids<=0 || $idc<=0){ header('location: services.php'); break; }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmsrv_carrel")." WHERE id_car='$idc' AND id_srv='$ids'"));
	
	if ($num>0) { redirect_header('services.php?op=caract&amp;ids='.$ids, 1, _AM_ALREADYADD); die(); }
	
	$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("rmsrv_carrel")." (`id_srv`,`id_car`) VALUES ('$ids','$idc')");
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('services.php?op=caract&amp;ids='.$ids, 1, _AM_CAROK);
		die();
	} else {
		redirect_header('services.php?op=caract&amp;ids='.$ids, 5, _AM_ERRNEXT . $err);
		die();
	}
}

function AddTerm(){
	global $xoopsDB;
	
	$idt = $_POST['idt'];
	$ids = $_POST['ids'];
	
	if ($ids<=0 || $idt<=0){ header('location: services.php?op=terms&ids=$ids'); break; }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmsrv_trel")." WHERE id_term='$idc' AND id_srv='$ids'"));
	
	if ($num>0) { redirect_header('services.php?op=terms&amp;ids='.$ids, 1, _AM_TERMS_EXIST); die(); }
	
	$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("rmsrv_trel")." (`id_srv`,`id_term`) VALUES ('$ids','$idt')");
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('services.php?op=terms&amp;ids='.$ids, 1, _AM_TERM_ADDED);
		die();
	} else {
		redirect_header('services.php?op=terms&amp;ids='.$ids, 5, _AM_ERRNEXT . $err);
		die();
	}
}

function DelCarFromService(){
	global $xoopsDB;
	
	$ids = $_POST['ids'];
	$idc = $_POST['idc'];
	if ($ids<=0 || $idc<=0){ header('location: services.php'); break; }
	
	$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix("rmsrv_carrel")." WHERE id_car='$idc' AND id_srv='$ids'");
	
	redirect_header('services.php?op=caract&amp;ids='.$ids, 1, _AM_CARDELSOK);
	
}

function DelTermFromService(){
	global $xoopsDB;
	
	$ids = $_POST['ids'];
	$idt = $_POST['idt'];
	if ($ids<=0 || $idt<=0){ header('location: services.php?op=terms&ids=$ids'); break; }
	
	$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix("rmsrv_trel")." WHERE id_term='$idt' AND id_srv='$ids'");
	
	redirect_header('services.php?op=terms&amp;ids='.$ids, 1, _AM_TERMS_DELETED);
	
}


// -------------------------------- //

$op = $_GET['op'];
if ($op==''){ $op = $_POST['op']; }

switch ($op){
	case 'del':
		Delete();
		break;
	case 'savemod':
		SaveModify();
		break;
	case 'mod':
		ModForm();
		break;
	case 'save':
		SaveService();
		break;
	case 'new':
		NewForm();
		break;
	case 'caract':
		Caracteristicas();
		break;
	case 'savecar':
		SaveCar();
		break;
	case 'modcar':
		ModifyCar();
		break;
	case 'savemodcar':
		SaveModCar();
		break;
	case 'delcar':
		DelCar();
		break;
	case 'delcars':
		DelCarFromService();
		break;
	case 'addcar':
		AddCar();
		break;
	case 'terms':
		Terminos();
		break;
	case 'addterm':
		AddTerm();
		break;
	case 'delterm';
		DelTermFromService();
		break;
	default:
		ShowServices();
		break;
}
?>
