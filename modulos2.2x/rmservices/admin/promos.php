<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: promos.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                 //
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

$location = 'promos';
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}
$myts =& MyTextSanitizer::getInstance();

function ShowPromos(){
	global $xoopsDB;
	
	include 'functions.php';
	$result = $xoopsDB->query("SELECT * FROM $tpromos ORDER BY nombre");
	$num = $xoopsDB->getRowsNum($result);
	if ($num <=0){
		NewForm(1);
		die();
	}
	xoops_cp_header();
	ShowNav();
	
	echo "<a href='promos.php?op=new'>"._AM_NEWPROMO."</a><br>
		  <table width='100%' class='outer' cellspacing='1'>\n
		  <tr><th colspan='4'>"._AM_PROMOSLIST."</th></tr>\n
		  <tr class='head'><td align='center'>"._AM_PROMONAME."</td>\n
		  <td align='center'>"._AM_PROMOPRICE."</td>\n
		  <td align='center'>"._AM_PROMOSTATUS."</td>\n
		  <td align='center'>"._AM_OPTIONS."</td></tr>\n";
	
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<tr class='even'><td align='left'>
			  <a href='promos.php?op=view&amp;idp=$row[id_promo]'>$row[nombre]</a><br>
			  <span style='font-size: 9px;'>$row[shortdesc]</span></td>\n
			  <td align='center'>$row[precio]</td>\n
			  <td align='center'>";
		if ($row['activa']==1){ echo _AM_ACTIVE; } else { echo _AM_INACTIVE; }
		echo "</td>\n<td align='center'>\n
			  <a href='promos.php?op=srvs&amp;idp=$row[id_promo]'>"._AM_SERVS."</a> |\n
			  <a href='promos.php?op=mod&amp;idp=$row[id_promo]'>"._AM_MODIFY."</a> |\n
			  <a href='promos.php?op=del&amp;idp=$row[id_promo]'>"._AM_DELETE."</a></td></tr>";
	}
	echo "</table>";
	xoops_cp_footer();
}

function NewForm(){
	global $xoopsDB;
	xoops_cp_header();
	
	include_once('functions.php');
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	ShowNav();
	echo "<table width='100%'  border='0' cellpadding='0' cellspacing='1' class='outer'>
  	<tr align='left'>
  	<th colspan='2'>"._AM_NEWPROMO."</th>
  	</tr>
  	<form name='frmNew' method='post' action='promos.php'>
  	<tr>
    <td class='even'>"._AM_FORMNAME."</td>
    <td class='odd'><input name='nombre' type='text' id='nombre' size='30' maxlength='200'></td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_FORMCODE."</td>
    <td class='odd'><input name='codigo' type='text' id='codigo' size='30' maxlength='20'></td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_FORMPRICE."</td>
    <td class='odd'><input name='precio' type='text' id='precio' size='30'></td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_FORMIMG."</td>
    <td class='odd'><input name='img' type='text' id='img' size='30' maxlength='255'></td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_SHORTDESC."</td>
    <td class='odd'><input name='shortdesc' type='text' id='shortdesc' size='30' maxlength='255'></td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_LONGDESC."</td>
    <td class='odd'>";
	xoopsCodeTarea("longdesc", 20, 15);
	xoopsSmilies("longdesc");
	echo "</td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_SHOWINBLOCK."</td>
    <td class='odd'><input name='inblock' type='radio' value='1' checked> S&iacute;
	<input name='inblock' type='radio' value='0'> No </td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_FORMACTIVE."</td>
    <td class='odd'><input name='activa' type='radio' value='1' checked> S&iacute;
	<input name='activa' type='radio' value='0'> No </td>
  	</tr>
  	<tr>
    <td class='even'>&nbsp;</td>
    <td class='odd'><input name='sbt' type='submit' id='sbt' value='   "._AM_SEND."   '></td>
  	</tr>
	<input type='hidden' name='op' value='save'></form></table>";
	xoops_cp_footer();
}

function SavePromo(){
	global $xoopsDB;
	
	$nombre = $_POST['nombre'];
	$codigo = $_POST['codigo'];
	$precio = $_POST['precio'];
	$img = $_POST['img'];
	$shortdesc = $_POST['shortdesc'];
	$longdesc = $_POST['longdesc'];
	$inblock = $_POST['inblock'];
	$activa = $_POST['activa'];
	
	if ($nombre==''){ redirect_header('promos.php?op=new', 1, _AM_ERRNAME); die(); }
	if ($codigo==''){ redirect_header('promos.php?op=new', 1, _AM_ERRCODE); die(); }
	if ($precio<0){ redirect_header('promos.php?op=new', 1, _AM_ERRPRICE); die(); }
	if ($shortdesc==''){ redirect_header('promos.php?op=new', 1, _AM_ERRSDESC); die(); }
	if ($longdesc==''){ redirect_header('promos.php?op=new', 1, _AM_ERRLDESC); die(); }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmsrv_promos')." WHERE nombre='$nombre'"));
	if ($num>0){ redirect_header('promos.php?op=new', 1, _AM_PROMOEXIST); die(); }
	
	$sql = "INSERT INTO ".$xoopsDB->prefix("rmsrv_promos")." (`precio`, `codigo`, `inblock`, `shortdesc`, `longdesc`, `img`, `activa`, `nombre`) 
			VALUES ('$precio','$codigo','$paycheck','$shortdesc','$longdesc','$img','$activa','$nombre')";

	$xoopsDB->query($sql);
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('promos.php', 1, _AM_PROMOOK);
		die();
	} else {
		redirect_header('promos.php', 5, _AM_ERRNEXT . $err);
		die();
	}
	
}

function ModForm(){
	global $xoopsDB;
	
	$idp = $_GET['idp'];
	if ($idp<=0){ header("location: promos.php"); die(); }
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmsrv_promos')." WHERE id_promo='$idp'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){ redirect_header('promos.php', 1, _AM_NOEXIST); die(); }
	
	$row = $xoopsDB->fetchArray($result);
	
	include_once('functions.php');
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	xoops_cp_header();
	ShowNav();
	echo "<table width='100%'  border='0' cellpadding='0' cellspacing='1' class='outer'>
  	<tr align='left'>
  	<th colspan='2'>"._AM_NEWPROMO."</th>
  	</tr>
  	<form name='frmNew' method='post' action='promos.php'>
  	<tr>
    <td class='even'>"._AM_FORMNAME."</td>
    <td class='odd'><input value='$row[nombre]' name='nombre' type='text' id='nombre' size='30' maxlength='200'></td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_FORMCODE."</td>
    <td class='odd'><input value='$row[codigo]' name='codigo' type='text' id='codigo' size='30' maxlength='20'></td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_FORMPRICE."</td>
    <td class='odd'><input value='$row[precio]' name='precio' type='text' id='precio' size='30'></td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_FORMIMG."</td>
    <td class='odd'><input value='$row[img]' name='img' type='text' id='img' size='30' maxlength='255'></td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_SHORTDESC."</td>
    <td class='odd'><input value='$row[shortdesc]' name='shortdesc' type='text' id='shortdesc' size='30' maxlength='255'></td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_LONGDESC."</td>
    <td class='odd'>";
	$GLOBALS['longdesc'] = $row['longdesc'];
	xoopsCodeTarea("longdesc", 20, 15);
	xoopsSmilies("longdesc");
	echo "</td>
  	</tr>
  	<tr>
    <td class='even'>"._AM_SHOWINBLOCK."</td>
    <td class='odd'>";
	if ($row['inblock']){
		echo "<input name='inblock' type='radio' value='1' checked> "._AM_YES."&nbsp;
			  <input name='inblock' type='radio' value='0'> "._AM_NO."</td>";
	} else {
		echo "<input name='inblock' type='radio' value='1'> "._AM_YES."&nbsp;
			  <input name='inblock' type='radio' value='0' checked> "._AM_NO."</td>";
	}
  	echo "</tr><tr><td class='even'>"._AM_FORMACTIVE."</td>
    <td class='odd'>";
	if ($row['activa']){
		echo "<input name='activa' type='radio' value='1' checked> "._AM_YES."&nbsp;
			  <input name='activa' type='radio' value='0'> "._AM_NO."</td>";
	}else{
		echo "<input name='activa' type='radio' value='1'> "._AM_YES."&nbsp;
			  <input name='activa' type='radio' value='0' checked> "._AM_NO."</td>";
	}
  	echo "</tr><tr><td class='even'>&nbsp;</td>
    <td class='odd'><input name='sbt' type='submit' id='sbt' value='   "._AM_SEND."   '></td>
  	</tr>
	<input type='hidden' name='op' value='savemod'>
	<input type='hidden' name='idp' value='$idp'>\n
	</form></table>";
	xoops_cp_footer();
}

function SaveMod(){
	global $xoopsDB;
	
	$nombre = $_POST['nombre'];
	$codigo = $_POST['codigo'];
	$precio = $_POST['precio'];
	$img = $_POST['img'];
	$shortdesc = $_POST['shortdesc'];
	$longdesc = $_POST['longdesc'];
	$inblock = $_POST['inblock'];
	$activa = $_POST['activa'];
	$idp = $_POST['idp'];
	
	if ($idp<=0){ header('location: promos.php'); die(); }
	if ($nombre==''){ redirect_header('promos.php?op=new', 1, _AM_ERRNAME); die(); }
	if ($codigo==''){ redirect_header('promos.php?op=new', 1, _AM_ERRCODE); die(); }
	if ($precio<0){ redirect_header('promos.php?op=new', 1, _AM_ERRPRICE); die(); }
	if ($shortdesc==''){ redirect_header('promos.php?op=new', 1, _AM_ERRSDESC); die(); }
	if ($longdesc==''){ redirect_header('promos.php?op=new', 1, _AM_ERRLDESC); die(); }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmsrv_promos')." WHERE id_promo='$idp'"));
	if ($num<=0){ redirect_header('promos.php', 1, _AM_NOEXIST); die(); }
	
	$sql = "UPDATE ".$xoopsDB->prefix("rmsrv_promos")." SET `precio`='$precio', `codigo`='$codigo',
		   `inblock`='$inblock', `shortdesc`='$shortdesc', `longdesc`='$longdesc', 
		   `img`='$img', `activa`='$activa', `nombre`='$nombre' WHERE id_promo='$idp'";

	$xoopsDB->query($sql);
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('promos.php', 1, _AM_PROMOMODOK);
		die();
	} else {
		redirect_header('promos.php', 5, _AM_ERRNEXT . $err);
		die();
	}
}

function Delete(){
	global $xoopsDB;
	
	$ok = $_POST['ok'];
	$idp = $_GET['idp'];
	if ($idp<=0){ $idp = $_POST['idp']; }
	if ($idp<=0){ header('location: promos.php'); die(); }
	include 'functions.php';
	if (PromoInSales($idp)){
		redirect_header('promos.php', 1, _AM_PROMOINSALES);
		die();
	}
	
	if ($ok){
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmsrv_promosrel')." WHERE id_promo='$idp'");
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmsrv_promos')." WHERE id_promo='$idp'");
		redirect_header('promos.php', 1, _AM_DELETED);
		die();
	} else {
		xoops_cp_header();
		ShowNav();
		echo "<table width='60%' class='outer' cellspacing='1' align='center'>\n
				<tr class='even'><td align='center'>\n
				<form name='frm' method='post' action='promos.php'>
				"._AM_CONFIRMDEL."<br><br>\n
				<input type='button' name='sbt' value='"._AM_CANCEL."' onClick='javascript: history.go(-1);'>\n
				<input type='submit' name='sbt' value='"._AM_DELETE."'>\n
				<input type='hidden' name='op' value='del'>\n
				<input type='hidden' name='ok' value='1'>\n
				<input type='hidden' name='idp' value='$idp'>\n
				</form></td></tr></table>";
		xoops_cp_footer();
	}
	
}

function Services(){
	global $xoopsDB;
	$idp = $_GET['idp'];
	if ($idp<=0){ header('location: promos.php'); die(); }
	$result = $xoopsDB->query("SELECT id_srv, nombre FROM ".$xoopsDB->prefix('rmsrv_servicios')." ORDER BY nombre");
	include 'functions.php';
	xoops_cp_header();
	ShowNav();
	echo "<table width='80%' class='outer' cellspacing='1' align='center'>\n
			<tr><th>"._AM_EXISTSERVICES."</th>
			<th>"._AM_ASSIGNED."</th></tr>\n
			<tr><td class='odd' align='center'>
			<form name='frmAdd' action='promos.php' method='post'>
			<select name='ids' size='10'>";
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<option value='$row[id_srv]'>$row[nombre]</option>";
	}
	echo "</select><br><br><input type='submit' name='sbtAdd' value='"._AM_ADDSERVICE."'>
		  <input type='hidden' name='op' value='addsrv'>\n
		  <input type='hidden' name='idp' value='$idp'>\n
		  </form></td>
		  <td class='even' align='center'>
		  <form name='frmEx' method='post' action='promos.php'>
		  <select name='idse' size='10'>";
	$result = $xoopsDB->query("SELECT * FROM $tprorel WHERE id_promo='$idp'");
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<option value='$row[id_srv]'>".ServiceName($row['id_srv'])."</option>";
	}
	echo "</select><br><br>
		  <input type='submit' name='sbtE' value='"._AM_DELETE."'>\n
		  <input type='hidden' name='op' value='delsrv'>\n
		  <input type='hidden' name='idp' value='$idp'>\n
		  </form></td></tr></table>";
	xoops_cp_footer();

}

function AddService(){
	global $xoopsDB;
	
	$idp = $_POST['idp'];
	if ($idp<=0){ header('location: promos.php'); die(); }
	$ids = $_POST['ids'];
	
	if ($ids<=0){
		redirect_header('promos.php?op=srvs&amp;idp='.$idp, 1, _AM_ERRSERVICE);
		die();
	}
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmsrv_servicios')." WHERE id_srv='$ids'"));
	if ($num<=0){ redirect_header('promos.php?op=srvs&amp;idp='.$idp, 1, _AM_SRVNOEXIST); }
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmsrv_promos')." WHERE id_promo='$idp'"));
	if ($num<=0){ redirect_header('promos.php?op=srvs&amp;idp='.$idp, 1, _AM_NOEXIST); }
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmsrv_promosrel')." WHERE id_promo='$idp' AND id_srv='$ids'"));
	if ($num>0){ redirect_header('promos.php?op=srvs&amp;idp='.$idp, 1, _AM_RELATION_EXIST); die(); }
	
	$sql = "INSERT INTO ".$xoopsDB->prefix('rmsrv_promosrel')." (`id_srv`,`id_promo`)
			VALUES ('$ids','$idp')";
	$xoopsDB->query($sql);
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('promos.php?op=srvs&amp;idp='.$idp, 1, _AM_ADDSERVOK);
		die();
	} else {
		redirect_header('promos.php?op=srvs&amp;idp='.$idp, 5, _AM_ERRNEXT . $err);
		die();
	}
}

function DeleteService(){
	global $xoopsDB;
	
	$idp = $_POST['idp'];
	if ($idp<=0){ header('location: promos.php'); die(); }
	$ids = $_POST['idse'];
	
	if ($ids<=0){
		redirect_header('promos.php?op=srvs&amp;idp='.$idp, 1, _AM_ERRSERVICE);
		die();
	}
	
	$sql = "DELETE FROM ".$xoopsDB->prefix('rmsrv_promosrel')." WHERE id_srv='$ids' AND id_promo='$idp'";
	$xoopsDB->query($sql);
	
	if ($err==''){
		redirect_header('promos.php?op=srvs&amp;idp='.$idp, 1, _AM_DELSERVOK);
		die();
	} else {
		redirect_header('promos.php?op=srvs&amp;idp='.$idp, 5, _AM_ERRNEXT . $err);
		die();
	}
}

function ViewPromo(){
	global $xoopsDB, $myts;
	
	$idp = $_GET['idp'];
	if ($idp<=0){
		ShowPromos();
		die();
	}
	include_once('functions.php');
	$result = $xoopsDB->query("SELECT * FROM $tpromos WHERE id_promo='$idp'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){ redirect_header('promos.php', 1, _AM_NOEXIST); die(); }
	
	$row = $xoopsDB->fetchArray($result);
	xoops_cp_header();
	ShowNav();
	echo "<table width='100%' class='outer' cellspacing='2'>\n
			<tr><th colspan='2'>$row[nombre]</th></tr>
			<tr><td class='even' align='center'>";
			if ($row['img']!=''){
				echo "<img src='$row[img]' border='0'>";
			}
			echo "<br><br>
			<a href='promos.php?op=mod&amp;idp=".$idp."'>"._AM_MODIFY."</a><br>
			<a href='promos.php?op=del&amp;idp=".$idp."'>"._AM_DELETE."</a></td>
			<td class='odd' align='left'>".$myts->makeTareaData4Show($row['longdesc'])."<br><br>
			<strong>"._AM_FORMPRICE."</strong> $row[precio]<br>
			<strong>"._AM_FORMCODE."</strong> <span style='font-family: courier'>$row[codigo]</a><br>
			</td></table><br>";
	
	echo "<table width='100%' class='outer' cellspacing='2'>\n
			<tr><th colspan='2'>"._AM_ASSIGNED."</th></tr>";
			$result = $xoopsDB->query("SELECT * FROM $tprorel WHERE id_promo='$idp'");
			while ($row=$xoopsDB->fetchArray($result)){
				echo "<tr><td class='even' align='left'>
					<a href='services.php?op=view&amp;ids=".$row['id_srv']."'>".ServiceName($row['id_srv'])."</a></td>\n
					<td class='even' align='center'>
					<a href='services.php?op=mod&amp;ids=".$row['id_srv']."'>"._AM_MODIFY."</a></td></tr>";
			}
	echo "  </table>";
	xoops_cp_footer();
}

/////////////////////////////////////////////

$op = $_GET['op'];
if ($op==''){
	$op = $_POST['op'];
}

switch ($op){
	case 'save':
		SavePromo();
		break;
	case 'new':
		NewForm();
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
	case 'srvs':
		Services();
		break;
	case 'addsrv':
		AddService();
		break;
	case 'delsrv':
		DeleteService();
		break;
	case 'view':
		ViewPromo();
		break;
	default:
		ShowPromos();
		break;
}
?>
