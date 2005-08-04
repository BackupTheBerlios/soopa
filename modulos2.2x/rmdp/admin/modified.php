<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: modified.php,v 1.3 2005/08/04 05:42:39 mauriciodelima Exp $                  //
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

$location = 'sended';
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}
$myts =& MyTextSanitizer::getInstance();

function ShowMods(){
	global $xoopsDB, $myts, $xoopsUser;
	include 'functions.php';
	xoops_cp_header();
	DP_ShowNav();
	
	echo "<table width='100%' class='outer' cellspacing='1'>
			<tr><th colspan='4'>"._RMDP_SENDED_TITLE."</th></tr>
			<tr align='center' class='head'><td>"._RMDP_NAME."</td>
			<td>"._RMDP_SENDBY."</td>
			<td>"._RMDP_DATE."</td>
			<td>"._AM_RMDP_OPTIONS."</td></tr>";
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_sended')." WHERE modify='1'");
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<tr class='even'><td align='left'>
			<strong>$row[nombre]</strong><br>
			<span style='font-size: 10px;'>".$myts->MakeTareaData4Show(substr($row['longdesc'], 0, 80))."</span></td>
			<td align='center'><a href='".XOOPS_URL."/userinfo.php?uid=$row[submitter]'>".$xoopsUser->getUnameFromId($row['submitter'])."</a></td>
			<td align='center'>".date('d/m/Y h:i:s', $row['fecha'])."</td>
			<td align='center'><a href='modified.php?op=del&amp;ids=$row[id_send]'>Eliminar</a>
			| <a href='modified.php?op=acept&amp;ids=$row[id_send]'>Aceptar</a></td></tr>";
	}
	echo "</table>";
	xoops_cp_footer();
}

function Aceptar(){
	global $xoopsDB;
	
	$ids = isset($_GET['ids']) ? $_GET['ids'] : 0;
	if ($ids<=0){ header('location: downs.php?op=new'); die(); }
	$tbl = $xoopsDB->prefix("rmdp_sended");
	$result = $xoopsDB->query("SELECT * FROM $tbl WHERE id_send='$ids'");
	$num = $xoopsDB->getRowsNum($result);
   /**
	* Si no encontramos la descarga redirigimos a otro lugar
	*/
	if ($num<=0){ redirect_header('sended.php', 2, _AM_RMDP_ERRNOEXIST); die(); }
	
	$row = $xoopsDB->fetchArray($result);
	
	xoops_cp_header();
	include 'functions.php';
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	DP_ShowNav();
	echo "<table width='100%'  border='0' cellpadding='0' cellspacing='1' class='outer'>
  			<tr align='left'>
    		<th colspan='2'>"._AM_RMDP_ACEPT."</th>
  			</tr>
  			<form name='frmNew' method='post' action='modified.php?op=save'>
  			<tr>
    		<td class='even'>"._AM_RMDP_FNAME."</td>
    		<td class='odd'><input value='$row[nombre]' name='nombre' type='text' id='nombre' size='30' maxlength='200'></td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FVERSION."</td>
    		<td class='odd'><input value='$row[version]' name='version' type='text' id='version' size='30' maxlength='10'></td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FLICENSE."</td>
    		<td class='odd'><select name='licencia' id='licencia'>
			<option value='0'>Nenhuma</option>";
			$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_licences')." ORDER BY nombre");
			while ($rw=$xoopsDB->fetchArray($result)){
				echo "<option value='$rw[id_lic]'"; 
				if ($rw['id_lic']==$row['licencia']){ echo "selected"; }
				echo ">$rw[nombre]</option>";
			}      		
    echo "  </select></td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FFILE."</td>
    		<td class='odd'><input value='$row[archivo]' name='archivo' type='text' id='archivo' size='30' maxlength='255'></td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FIMG."</td>
    		<td class='odd'><input value='$row[img]' name='img' type='text' id='img' size='30' maxlength='255'></td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FCATEGO."</td>
    		<td class='odd'><select name='idc' id='idc'>
      		<option value='0' selected>"._AM_RMDP_SELECT."</option>";
			DP_ChildCategoOption(0,0,$row['id_cat']);
    echo "	</select></td>
  			</tr><tr><td class='even'>"._AM_RMDP_FLONG."</td>
    		<td class='odd'>";
			$GLOBALS['longdesc'] = $row['longdesc'];
			xoopsCodeTarea("longdesc", 20, 15);
			xoopsSmilies("longdesc");
	echo "  </td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FSIZE."</td>
    		<td class='odd'><input value='$row[size]' name='size' type='text' id='size' size='30' maxlength='20'></td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FFAVS."</td>
    		<td class='odd'><input name='favorito' type='radio' value='1' "; 
			if ($row['favorito']){ echo "checked"; }
			echo "> 
      		"._AM_RMDP_YES."
        	<input name='favorito' type='radio' value='0' "; if ($row['favorito']==0){ echo "checked"; }
			echo "> 
      		"._AM_RMDP_NO."</td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FALLOWANONIM."</td>
    		<td class='odd'><input name='anonimo' type='radio' value='1' "; 
			if ($row['anonimo']){ echo "checked"; }
			echo ">
  			"._AM_RMDP_YES."
  			<input name='anonimo' type='radio' value='0' "; if ($row['anonimo']==0){ echo "checked"; }
			echo ">
  			"._AM_RMDP_NO."</td>
  			</tr>
			<tr>
    		<td class='even'>"._AM_RMDP_RATING."</td>
    		<td class='odd'>
			<select name='rating'>";
			for($i=0;$i<=5;$i++){
				if ($i==$row['calificacion']){
					echo "<option value='$i' selected>$i</option>";
				} else {
					echo "<option value='$i'>$i</option>";
				}
			}
	echo "  </select></td></tr>
  			<tr><td class='even'>"._AM_RMDP_FRESALTE."</td>
    		<td class='odd'><input name='resaltar' type='radio' value='1' "; 
			if ($row['resaltar']){ echo "checked"; }
			echo "> "._AM_RMDP_YES."
			<input name='resaltar' type='radio' value='0' "; if ($row['resaltar']==0){ echo "checked"; }
			echo "> "._AM_RMDP_NO."</td></tr>
			<tr><td class='even'>"._AM_RMDP_FURLTITLE."</td>
    		<td class='odd'><input value='$row[urltitle]' name='urltitle' type='text' id='url' size='30' maxlength='255'></td>
  			<tr><td class='even'>"._AM_RMDP_FURL."</td>
    		<td class='odd'><input value='$row[url]' name='url' type='text' id='url' size='30' maxlength='255'></td>
 			</tr><tr><td class='even'>"._AM_RMDP_SENDBY."</td>
    		<td class='odd'><select name='idu'>";
			$result = $xoopsDB->query("SELECT uid, uname FROM ".$xoopsDB->prefix('users')." ORDER BY uname");
			while ($rw=$xoopsDB->fetchArray($result)){
				echo "<option value='$rw[uid]' ";
				if ($rw['uid']==$row['submitter']){ echo "selected"; }
				echo ">$rw[uname]</option>";
			}
	echo "  </select></td>
 			</tr>
			<tr><td class='even' align='left'>"._AM_RMDP_OSS."</td>
			<td class='odd' align='left'>";
			$plats = explode("|", $row['plataformas']);
			foreach ($plats as $value){
				echo "<input type='hidden' name='os[]' value='$value'>";
				echo DP_OsName($value)."&nbsp;&nbsp;|&nbsp;&nbsp;";
			}
	echo "  </td></tr>
			<tr><td class='even'>&nbsp;<input type='hidden' name='id_soft' value='$row[ids]'></td>
    		<td class='odd'><input type='submit' name='Submit' value='"._AM_RMDP_SAVE."'></td>
  			</tr><input type='hidden' name='ids' value='$ids'></form></table>";
	xoops_cp_footer();
}

function Save(){
	global $xoopsDB, $xoopsUser, $member_handler, $xoopsConfig, $xoopsModuleConfig;
	
	foreach ($_POST as $key => $value){
		$$key = $value;
	}
	if ($ids<=0){ header('location: modified.php'); die(); }
	if ($id_soft<=0){ header('location: modified.php'); die(); }
	if ($nombre==''){ redirect_header('sended.php?op=acept&amp;ids='.$ids, 2, _AM_RMDP_ERRNAME); die(); }
	if ($version==''){ redirect_header('sended.php?op=acept&amp;ids='.$ids, 2, _AM_RMDP_ERRVERSION); die(); }
	if ($archivo==''){ redirect_header('sended.php?op=acept&amp;ids='.$ids, 2, _AM_RMDP_ERRFILE); die(); }
	if ($idc<=0){ redirect_header('sended.php?op=acept&amp;ids='.$ids, 2, _AM_RMDP_ERRCATEGO); die(); }
	if ($longdesc==''){ redirect_header('sended.php?op=acept&amp;ids='.$ids, 2, _AM_RMDP_ERRDESC); die(); }
	if ($size=='') { $size = 0; }
	
	$tbl = $xoopsDB->prefix("rmdp_software");
	list($num) = $xoopsDB->query("SELECT COUNT(*) FROM $tbl WHERE nombre='$nombre' AND id_soft<>'$id_soft'");
	if ($num>0){ redirect_header('sended.php?op=acept&amp;ids='.$ids, 2, _AM_RMDP_ERREXIST); die(); }
	
	$xoopsDB->query("UPDATE $tbl SET `nombre`='$nombre',`version`='$version',
			`licencia`='$licencia',`archivo`='$archivo',`img`='$img',`id_cat`='$idc',
			`longdesc`='$longdesc',`size`='$size',`favorito`='$favorito',
			`calificacion`='$rating',`anonimo`='$anonimo',`resaltar`='$resaltar',
			`update`='".time()."',`url`='$url',`submitter`='$idu',`urltitle`='$urltitle'
			WHERE id_soft='$id_soft'");
	$err = $xoopsDB->error();
	if ($err!=''){
		redirect_header('modified.php?op=acept&amp;ids='.$ids, 2, _AM_RMDP_CATEGOFAIL . $err);
	}
	$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_softos')." WHERE id_soft='$id_soft'");	
	foreach ($os as $value){
		$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix('rmdp_softos')." (`id_os`,`id_soft`) VALUES ('$value','$id_soft')");	
	}
	
	$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_sended')." WHERE id_send='$ids'");
	$user = $member_handler->getUser($idu);
	$xoopsMailer =& getMailer();
	$xoopsMailer->useMail();
	$xoopsMailer->setToEmails($user->getVar('email'));
	$xoopsMailer->setFromEmail($xoopsConfig['from']);
	$xoopsMailer->setFromName($xoopsConfig['sitename']." - ".$xoopsModuleConfig['rmdptitle']);
	$xoopsMailer->setSubject(_RMDP_MAIL_SUBJECT);
	$body = $xoopsModuleConfig['bodymail'];
	$body = str_replace('{USER}', $user->getVar('uname'), $body);
	$body = str_replace('{DOWN}',$nombre, $body);
	$body = str_replace('{LINK}', XOOPS_URL."/modules/rmdp/mysends.php", $body);
	$body = str_replace('{URL}',XOOPS_URL, $body);
	$xoopsMailer->setBody($body);
	$xoopsMailer->send();
	redirect_header('modified.php', 2, _AM_RMDP_SENDOK);
}

function Delete(){
	global $xoopsDB;
	
	$ok = isset($_POST['ok']) ? $_POST['ok'] : 0;
	
	if ($ok){
		$ids = $_POST['ids'];
		if ($ids<=0){ header('location: modified.php'); die(); }
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_sended')." WHERE id_send='$ids'");
		redirect_header('modified.php', 1, '');
	} else {
		$ids = $_GET['ids'];
		if ($ids<=0){ header('location: modified.php'); die(); }
		include 'functions.php';
		xoops_cp_header();
		DP_ShowNav();
		echo "<table width='60%' align='center' cellspacing='1'>
				<tr><td align='center' class='even'>
				<form name='frmDel' action='modified.php?op=del' method='post'>
				<br /><br />"._AM_RMDP_DELCONFIRM."<br />
				<br /><input type='submit' value='"._AM_RMDP_DELETE."'>
				<input type='button' name='cancel' value='"._AM_RMDP_CANCEL."' onClick='history.go(-1);'>
				<input type='hidden' name='ok' value='1'>
				<input type='hidden' name='ids' value='$ids'>
				</form></td></tr></table>";
		xoops_cp_footer();
	}
}

/**
* Seleccionamos la opcion
**/
switch ($op){
	case 'acept':
		Aceptar();
		break;
	case 'save':
		Save();
		break;
	case 'del':
	 	Delete();
	 	break;
	default:
		ShowMods();
		break;
}
?>
