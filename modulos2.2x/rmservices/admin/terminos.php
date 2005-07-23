<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: terminos.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                //
// ------------------------------------------------------------------------  //
//                  RM+SOFT - Control de Servicios                           //
//         Copyright Red México Soft © 2005. (Eduardo Cortés)                //
//                   <http:www.redmexico.com.mx/>                            //
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

$location = 'terminos';
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}

function ShowTerms(){
	global $xoopsDB;
	
	xoops_cp_header();
	include_once('functions.php');
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	ShowNav();
	
	$result = $xoopsDB->query("SELECT titulo, id_term FROM $tterms ORDER BY titulo");
	echo "<table width='100%' class='outer' cellspacing='1'>\n
			<tr><th colspan='2'>"._AM_TERM_LIST."</th></tr>\n
			<tr><td align='center' class='even' colspan='2'><form name='frmMod' method='post' action='terminos.php'>\n
			<select name='idt'>";
		while ($row=$xoopsDB->fetchArray($result)){
			echo "<option value='$row[id_term]'>$row[titulo]</option>";
		}
	echo "</select>&nbsp;<input type='submit' value='"._AM_MODIFY."'>
			<input type='button' value='"._AM_DELETE."' onClick=\"frmMod.op.value='del'; frmMod.submit();\">\n
			<input type='hidden' name='op' value='mod'></form>\n
			</td></tr>
			<tr><th colspan='2'>"._AM_TERMS_NEW."</th></tr>
			<form name='frmNew' method='post' action='terminos.php'>
			<tr><td class='even' align='left'>"._AM_TERM_TITLE."</td>\n
			<td class='odd' align='left'><input type='text' name='titulo' size='30'></td></tr>
			<tr><td class='even' align='left'>"._AM_TERMS_TEXT."</td>\n
			<td class='odd' align='left'>";
			xoopsCodeTarea("texto", 20, 15);
			xoopsSmilies("texto");
	echo "	</td></tr>\n
			<tr><td class='even'>&nbsp;</td>\n
			<td class='odd' align='left'><input type='submit' name='sbt' value='"._AM_SEND."'></td></tr>\n
			<input type='hidden' name='op' value='save'>
			</form></table>";
			
	
	xoops_cp_footer();
}

function ModForm(){
	global $xoopsDB;
	$idt = $_POST['idt'];
	if ($idt<=0){ header('location: terminos.php'); die(); }
	xoops_cp_header();
	include_once('functions.php');
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	ShowNav();
	
	$result = $xoopsDB->query("SELECT * FROM $tterms WHERE id_term='$idt'");
	$row = $xoopsDB->fetchArray($result);
	echo "<table width='100%' class='outer' cellspacing='1'>\n
			<tr><th colspan='2'>"._AM_TERMS_MOD."</th></tr>
			<form name='frmNew' method='post' action='terminos.php'>
			<tr><td class='even' align='left'>"._AM_TERM_TITLE."</td>\n
			<td class='odd' align='left'><input value='$row[titulo]' type='text' name='titulo' size='30'></td></tr>
			<tr><td class='even' align='left'>"._AM_TERMS_TEXT."</td>\n
			<td class='odd' align='left'>";
			$GLOBALS['texto'] = $row['texto'];
			xoopsCodeTarea("texto", 20, 15);
			xoopsSmilies("texto");
	echo "	</td></tr>\n
			<tr><td class='even'>&nbsp;</td>\n
			<td class='odd' align='left'><input type='submit' name='sbt' value='"._AM_SEND."'></td></tr>\n
			<input type='hidden' name='op' value='savemod'>
			<input type='hidden' name='idt' value='$idt'>
			</form></table>";
			
	
	xoops_cp_footer();
}

function SaveTerm(){
	global $xoopsDB;
	
	$titulo = $_POST['titulo'];
	$texto = $_POST['texto'];
	
	if ($titulo==''){ redirect_header('terminos.php', 1, _AM_ERROR_NOTITLE); }
	if ($texto==''){ redirect_header('terminos.php', 1, _AM_ERROR_NOTEXT); }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmsrv_terminos')." WHERE titulo='$titulo'"));
	if ($num>0){ redirect_header('terminos.php', 1, _AM_ERROR_EXIST); }
	
	$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix('rmsrv_terminos')." (`titulo`,`texto`) VALUES ('$titulo','$texto');");
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('terminos.php', 1, _AM_TERMS_OK);
		die();
	} else {
		redirect_header('terminos.php', 5, _AM_ERRNEXT . $err);
		die();
	}
}

function SaveMod(){
	global $xoopsDB;
	
	$titulo = $_POST['titulo'];
	$texto = $_POST['texto'];
	$idt = $_POST['idt'];
	
	if ($idt<=0){ header('location: terminos.php'); die(); }
	if ($titulo==''){ redirect_header('terminos.php', 1, _AM_ERROR_NOTITLE); }
	if ($texto==''){ redirect_header('terminos.php', 1, _AM_ERROR_NOTEXT); }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmsrv_terminos')." WHERE id_term='$idt'"));
	if ($num<=0){ redirect_header('terminos.php', 1, _AM_ERROR_NOEXIST); }
	
	$xoopsDB->query("UPDATE ".$xoopsDB->prefix('rmsrv_terminos')." SET `titulo`='$titulo',`texto`='$texto' WHERE id_term='$idt'");
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('terminos.php', 1, _AM_TERMS_MODOK);
		die();
	} else {
		redirect_header('terminos.php', 5, _AM_ERRNEXT . $err);
		die();
	}
}

function Delete(){
	global $xoopsDB;
	$idt = $_POST['idt'];
	if ($idt<=0){ header('location: terminos.php'); die(); }
	$ok = $_POST['ok'];
	if ($ok){
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmsrv_trel')." WHERE id_term='$idt'");
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmsrv_terminos')." WHERE id_term='$idt'");
		redirect_header('terminos.php', 1, _AM_TERMS_DELETED);
		die();
	} else {
		include_once 'functions.php';
		xoops_cp_header();
		ShowNav();
		echo "<table width='60%' class='outer' cellspacing='1' align='center'>\n
				<tr class='even'><td align='center'>\n
				<form name='frm' method='post' action='terminos.php'>
				"._AM_TERM_CONFIRMDEL."<br><br>\n
				<input type='button' name='sbt' value='"._AM_CANCEL."' onClick='javascript: history.go(-1);'>\n
				<input type='submit' name='sbt' value='"._AM_DELETE."'>\n
				<input type='hidden' name='op' value='del'>\n
				<input type='hidden' name='ok' value='1'>\n
				<input type='hidden' name='idt' value='$idt'>\n
				</form></td></tr></table>";
		xoops_cp_footer();
	}
}


/**********************************************/

$op = $_GET['op'];
if ($op==''){ $op = $_POST['op']; }

switch ($op){
	case 'save':
		SaveTerm();
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
	default:
		ShowTerms();
		break;
}
?>
