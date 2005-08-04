<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: downs.php,v 1.3 2005/08/04 05:42:39 mauriciodelima Exp $                   //
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

$location = 'descargas';
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}

function ShowDowns(){
	global $xoopsDB, $xoopsModuleConfig;
	
	$limit = 20;
	
	$pag = $_GET['pag'];
	if ($pag > 0){ $pag -= 1; }
	$start = $pag * $limit;
	if ($pactual>$tpages){
		$rest = $pactual - $tpages;
		$pactual = $pactual - $rest + 1;
		$start = ($pactual - 1) * $limit;
	}
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_software')." ORDER BY nombre LIMIT $start,$limit");
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmdp_software')));
	$rtotal = $num; // Numero total de resultados
	$tpages = (int)($num / $limit);
	
	if (($num % $limit) > 0){ $tpages++; }
	
	$pactual = $pag + 1;
	
	xoops_cp_header();
	include('functions.php');
	DP_ShowNav();
	$catego = DP_CategoName($idc);
	echo "<table width='100%' cellpadding='0' cellspacing='0' border='0'>
		  <tr><td><a href='downs.php?op=new'>"._AM_RMDP_NEWDOWN."</a></td>
		  <td align='right'>";
		  echo _AM_RMDP_GOPAGE;
		  for ($i=1;$i<=$tpages;$i++){
				echo "<a href='downs.php?pag=$i&amp;sort=$order'>$i</a>&nbsp;";
		  }
	echo "</td></tr></table>
		 <table width='100%' class='outer' cellspacing='1'>
			<tr><th colspan='3'>"._AM_RMDP_DOWNSLIST."</th></tr>
			<tr align='center' class='head'><td>"._AM_RMDP_LISTNAME."</td>
			<td>"._AM_RMDP_LISTACCESS."</td>
			<td>"._AM_RMDP_OPTIONS."</td></tr>";
	while ($row=$xoopsDB->fetchArray($result)){
		if ($class=='even'){ $class='odd'; } else { $class='even'; }
		echo "<tr class='$class'><td align='left'>
			<a href='../down.php?id=$row[id_soft]'>$row[nombre]</a><br>
			</td>
			<td align='center'>";
			if ($row['anonimo']){
				echo _AM_RMDP_EVERYBODY;
			} else {
				echo _AM_RMDP_REGISTERED;
			}
		echo "</td><td align='center' style='font-size: 10px;'>
			<a href='downs.php?op=os&amp;ids=$row[id_soft]'>"._AM_RMDP_SOFTOS."</a> |
			<a href='downs.php?op=shots&amp;ids=$row[id_soft]'>"._AM_RMDP_SOFTSHOTS."</a> |
			<a href='downs.php?op=mod&amp;ids=$row[id_soft]'>"._AM_RMDP_MODIFY."</a> |
			<a href='downs.php?op=del&amp;ids=$row[id_soft]'>"._AM_RMDP_DELETE."</a>
			</td></tr>";
	}			
	echo "</table>";
	xoops_cp_footer();
}

function NewDown(){
	global $xoopsDB;
	
	xoops_cp_header();
	include 'functions.php';
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	DP_ShowNav();
	echo "<table width='100%'  border='0' cellpadding='0' cellspacing='1' class='outer'>
  			<tr align='left'>
    		<th colspan='2'>"._AM_RMDP_NEWDOWN."</th>
  			</tr>
  			<form name='frmNew' method='post' action='downs.php?op=save'>
  			<tr>
    		<td class='even'>"._AM_RMDP_FNAME."</td>
    		<td class='odd'><input name='nombre' type='text' id='nombre' size='30' maxlength='200'></td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FVERSION."</td>
    		<td class='odd'><input name='version' type='text' id='version' size='30' maxlength='10'></td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FLICENSE."</td>
    		<td class='odd'><select name='licencia' id='licencia'>
			<option value='0'>Nenhuma</option>";
			$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_licences')." ORDER BY nombre");
			while ($row=$xoopsDB->fetchArray($result)){
				echo "<option value='$row[id_lic]'>$row[nombre]</option>";
			}      		
    echo "  </select></td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FFILE."</td>
    		<td class='odd'><input name='archivo' type='text' id='archivo' size='30' maxlength='255'></td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FIMG."</td>
    		<td class='odd'><input name='img' type='text' id='img' size='30' maxlength='255'></td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FCATEGO."</td>
    		<td class='odd'><select name='idc' id='idc'>
      		<option value='0' selected>"._AM_RMDP_SELECT."</option>";
			DP_ChildCategoOption();
    echo "	</select></td>
  			</tr><tr><td class='even'>"._AM_RMDP_FLONG."</td>
    		<td class='odd'>";
			xoopsCodeTarea("longdesc", 20, 15);
			xoopsSmilies("longdesc");
	echo "  </td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FSIZE."</td>
    		<td class='odd'><input name='size' type='text' id='size' size='30' maxlength='20'></td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FFAVS."</td>
    		<td class='odd'><input name='favorito' type='radio' value='1'> 
      		"._AM_RMDP_YES."
        	<input name='favorito' type='radio' value='0' checked> 
      		"._AM_RMDP_NO."</td>
  			</tr>
  			<tr>
    		<td class='even'>"._AM_RMDP_FALLOWANONIM."</td>
    		<td class='odd'><input name='anonimo' type='radio' value='1'>
  			"._AM_RMDP_YES."
  			<input name='anonimo' type='radio' value='0' checked>
  			"._AM_RMDP_NO."</td>
  			</tr>
			<tr>
    		<td class='even'>"._AM_RMDP_RATING."</td>
    		<td class='odd'>
			<select name='rating'>
			<option value='0'>0</option>
			<option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='5'>5</option>
			</select></td></tr>
  			<tr><td class='even'>"._AM_RMDP_FRESALTE."</td>
    		<td class='odd'><input name='resaltar' type='radio' value='1'> "._AM_RMDP_YES."
			<input name='resaltar' type='radio' value='0' checked> "._AM_RMDP_NO."</td></tr>
			<tr><td class='even'>"._AM_RMDP_FURLTITLE."</td>
    		<td class='odd'><input name='urltitle' type='text' id='url' size='30' maxlength='255'></td>
  			<tr><td class='even'>"._AM_RMDP_FURL."</td>
    		<td class='odd'><input name='url' type='text' id='url' size='30' maxlength='255'></td>
 			</tr><tr><td class='even'>&nbsp;</td>
    		<td class='odd'><input type='submit' name='Submit' value='"._AM_RMDP_SEND."'></td>
  			</tr></form></table>";
	xoops_cp_footer();
}

function SaveDown(){
	global $xoopsDB, $xoopsUser;
	
	foreach ($_POST as $key => $value){
		$$key = $value;
	}
	
	if ($nombre==''){ redirect_header('downs.php?op=new', 2, _AM_RMDP_ERRNAME); die(); }
	if ($version==''){ redirect_header('downs.php?op=new', 2, _AM_RMDP_ERRVERSION); die(); }
	if ($archivo==''){ redirect_header('downs.php?op=new', 2, _AM_RMDP_ERRFILE); die(); }
	if ($idc<=0){ redirect_header('downs.php?op=new', 2, _AM_RMDP_ERRCATEGO); die(); }
	if ($longdesc==''){ redirect_header('downs.php?op=new', 2, _AM_RMDP_ERRDESC); die(); }
	if ($size=='') { $size = 0; }
	
	$tbl = $xoopsDB->prefix("rmdp_software");
	list($num) = $xoopsDB->query("SELECT COUNT(*) FROM $tbl WHERE nombre='$nombre'");
	if ($num>0){ redirect_header('downs.php?op=new', 2, _AM_RMDP_ERREXIST); die(); }
	
	$xoopsDB->query("INSERT INTO $tbl (`nombre`,`version`,`licencia`,`archivo`,`img`,
			`id_cat`,`longdesc`,`size`,`favorito`,`calificacion`,`anonimo`,`resaltar`,
			`fecha`,`update`,`url`,`submitter`,`urltitle`) VALUES ('$nombre','$version','$licencia',
			'$archivo','$img','$idc','$longdesc','$size','$favorito','$rating',
			'$anonimo','$resaltar','".time()."','".time()."','$url','".$xoopsUser->getvar('uid')."','$urltitle')");
	$err = $xoopsDB->error();

	if ($err==''){
		redirect_header('categos.php?op=view&amp;idc='.$idc, 2, _AM_RMDP_DOWNOK);
	} else {
		redirect_header('downs.php?op=new', 2, _AM_RMDP_CATEGOFAIL . $err);
	}
}

function Modify(){
	global $xoopsDB;
	
	$ids = $_GET['ids'];
	if ($ids<=0){ header('location: downs.php?op=new'); die(); }
	$tbl = $xoopsDB->prefix("rmdp_software");
	$result = $xoopsDB->query("SELECT * FROM $tbl WHERE id_soft='$ids'");
	$num = $xoopsDB->getRowsNum($result);
   /**
	* Si no encontramos la descarga redirigimos a otro lugar
	*/
	if ($num<=0){ redirect_header('downs.php', 2, _AM_RMDP_ERRNOEXIST); die(); }
	
	$row = $xoopsDB->fetchArray($result);
	
	xoops_cp_header();
	include 'functions.php';
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	DP_ShowNav();
	echo "<table width='100%'  border='0' cellpadding='0' cellspacing='1' class='outer'>
  			<tr align='left'>
    		<th colspan='2'>"._AM_RMDP_MODDOWN."</th>
  			</tr>
  			<form name='frmNew' method='post' action='downs.php?op=savemod'>
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
 			</tr><tr><td class='even'>&nbsp;</td>
    		<td class='odd'><input type='submit' name='Submit' value='"._AM_RMDP_SEND."'></td>
  			</tr><input type='hidden' name='ids' value='$ids'></form></table>";
	xoops_cp_footer();
}

function SaveMod(){
	global $xoopsDB, $xoopsUser;
	$ids = $_POST['ids'];
	if ($ids<=0){ header('location: downs.php'); die(); }
	
	foreach ($_POST as $key => $value){
		$$key = $value;
	}
	
	if ($nombre==''){ redirect_header('downs.php?op=new', 2, _AM_RMDP_ERRNAME); die(); }
	if ($version==''){ redirect_header('downs.php?op=new', 2, _AM_RMDP_ERRVERSION); die(); }
	if ($archivo==''){ redirect_header('downs.php?op=new', 2, _AM_RMDP_ERRFILE); die(); }
	if ($idc<=0){ redirect_header('downs.php?op=new', 2, _AM_RMDP_ERRCATEGO); die(); }
	if ($longdesc==''){ redirect_header('downs.php?op=new', 2, _AM_RMDP_ERRDESC); die(); }
	if ($size=='') { $size = 0; }
	
	$tbl = $xoopsDB->prefix("rmdp_software");
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM $tbl WHERE id_soft='$ids'"));
	if ($num<=0){ redirect_header('downs.php?op=new', 2, _AM_RMDP_ERRNOEXIST); die(); }
	
	$xoopsDB->query("UPDATE $tbl SET `nombre`='$nombre',`version`='$version',
			`licencia`='$licencia',`archivo`='$archivo',`img`='$img',`id_cat`='$idc',
			`longdesc`='$longdesc',`size`='$size',`favorito`='$favorito',`calificacion`='$rating',
			`anonimo`='$anonimo',`resaltar`='$resaltar',`update`='".time()."',
			`url`='$url',`submitter`='$idu',
			`urltitle`='$urltitle' WHERE id_soft='$ids'");
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('categos.php?op=view&amp;idc='.$idc, 2, _AM_RMDP_DOWNMODOK);
	} else {
		redirect_header('categos.php?op=view&amp;idc='.$idc, 2, _AM_RMDP_CATEGOFAIL . $err);
	}
}

function Delete(){
	global $xoopsDB;
	
	$ok = $_POST['ok'];
	$ids = $_GET['ids'];
	if ($ids<=0){ $ids = $_POST['ids']; }
	
	if ($ids<=0){ header('location: downs.php'); die(); }
	
	if ($ok){
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_softos')." WHERE id_soft='$ids'");
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_shots')." WHERE id_soft='$ids'");
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_carrel')." WHERE id_soft='$ids'");
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_partners')." WHERE id_soft='$ids'");
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_software')." WHERE id_soft='$ids'");
		redirect_header('categos.php', 2, _AM_RMDP_DELOK);
	} else {
		xoops_cp_header();
		include('functions.php');
		DP_ShowNav();
		echo "<table width='60%' align='center' cellspacing='1' class='outer'>
				<tr><td align='center' class='even'>
				<form name='frmDel' method='post' action='downs.php'>
				<br><br>"._AM_RMDP_CONFIRM."<br><br>
				<input type='submit' name='sbt' value='"._AM_RMDP_DELETE."'>
				<input type='button' value='"._AM_RMDP_CANCEL."' name='cancel' onClick='history.go(-1);'>
				<input type='hidden' name='op' value='del'>
				<input type='hidden' name='ids' value='$ids'>
				<input type='hidden' name='ok' value='1'>
				</td></tr></table>";
		xoops_cp_footer();
	}
}
	
function Plataformas(){
	global $xoopsDB;
	$ids = $_GET['ids'];
	if ($ids<=0){ header('location: downs.php'); die(); }
	include('functions.php');
	xoops_cp_header();
	DP_ShowNav();
	echo "<table align='center' class='outer' cellspacing='1'>
			<tr><th width='50%'>"._AM_RMDP_OSALL."</th>
			<th width='50%'>"._AM_RMDP_OSASSIGN."</th></tr>
			<tr><td width='50%' align='center' class='even'>
			<form name='frmAdd' method='post' action='downs.php'>
			<select size='15' name='ido'>";
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_plataformas')." ORDER BY nombre");
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<option value='$row[id_os]'>$row[nombre]</option>";
	}
	echo "</select><br><br>
			<input type='submit' name='sbt' value='"._AM_RMDP_ADD."'>
			<input type='hidden' name='op' value='addos'>
			<input type='hidden' name='ids' value='$ids'>
			</form>
			</td>
			<td class='odd' width='50%' align='center'>
			<form name='frmDel' action='downs.php' method='post'>
			<select name='ido' size='15'>";
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_softos')." WHERE id_soft='$ids'");
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<option value='$row[id_os]'>".DP_OsName($row['id_os'])."</option>";
	}
	echo "</select><br><br>
			<input type='submit' name='sbt' value='"._AM_RMDP_DELETE."'>
			<input type='hidden' name='op' value='delos'>
			<input type='hidden' name='ids' value='$ids'></form></td>
			</tr></table>";
	xoops_cp_footer();
}

function AddOs(){
	global $xoopsDB;
	$ido = $_POST['ido'];
	$ids = $_POST['ids'];
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmdp_softos')." WHERE id_os='$ido' AND id_soft='$ids'"));
	if ($num>0){ redirect_header('downs.php?op=os&amp;ids='.$ids, 1, _AM_RMDP_OSEXIST); die(); }
	
	$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix('rmdp_softos')." (`id_soft`,`id_os`) VALUES ('$ids','$ido')");
	$err = $xoopsDB->error();
	if ($err==''){
		redirect_header('downs.php?op=os&amp;ids='.$ids, 1, '');
		die();
	} else {
		redirect_header('downs.php?op=os&amp;ids='.$ids, 5, _AM_RMDP_CATEGOFAIL . $err);
		die();
	}
}

function DelOs(){
	global $xoopsDB;
	
	$ids = $_POST['ids'];
	$ido = $_POST['ido'];
	if ($ids<=0 || $ido<=0){ header('location: categos.php'); die(); }
	
	$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_softos')." WHERE id_soft='$ids' AND id_os='$ido'");
	redirect_header('downs.php?op=os&amp;ids='.$ids, 1, '');
	
}

function reviews(){
	global $xoopsDB;
	
	$ids = isset($_GET['ids']) ? $_GET['ids'] : 0;
	if ($ids<=0){ header('location: downs.php'); die(); }
	
	include 'functions.php';
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	xoops_cp_header();
	DP_ShowNav();
	
	echo "<table width='100%' cellspacing='1' class='outer'>
			<tr><th colspan='2'>"._AM_RMDP_REVIEWTITLE."</th></tr>
			<form name='frmRev' method='post' action='downs.php'>
			<tr><td class='even' align='left'>"._AM_RMDP_SHOTDOWN."</td>
			<td class='odd' align='left'><strong>".DP_DownloadName($ids)."</strong></td>
			</tr><tr align='left'><td class='even'>"._AM_RMDP_REVIEW."</td>
			<td class='odd'>
			";
	list($text) = $xoopsDB->fetchRow($xoopsDB->query("SELECT text FROM ".$xoopsDB->prefix('rmdp_editorcom')." WHERE id_soft='$ids'"));
		  $GLOBALS['text'] = $text;
		  xoopsCodeTarea("text", 20, 15);
		  xoopsSmilies("text");
	echo "</td></tr>
		  <tr align='left'><td class='even'>"._AM_RMDP_RATING."</td>
		  <td class='odd'><select name='rate'>";
	list($rate) = $xoopsDB->fetchRow($xoopsDB->query("SELECT calificacion FROM ".$xoopsDB->prefix('rmdp_software')." WHERE id_soft='$ids'"));
	for($i=1;$i<=5;$i++){
		if ($i==$rate){
			echo "<option value='$i' selected>$i</option>";
		} else {
			echo "<option value='$i'>$i</option>";
		}
	}
	echo "</td></tr>
		  <tr align='left'><td class='even'>&nbsp;</td>
		  <td class='odd'><input type='submit' name='sbt' value='"._AM_RMDP_MODIFY."'>
		  <input type='hidden' name='op' value='savereview'>
		  <input type='hidden' name='ids' value='$ids'></td></tr></form></table>";
	
	xoops_cp_footer();
}

function savereview(){
	global $xoopsDB;
	
	$ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
	$text = isset($_POST['text']) ? $_POST['text'] : '';
	$rate = isset($_POST['rate']) ? $_POST['rate'] : 0;
	
	if ($ids<=0){ header('downs.php'); die(); }
	if ($text==''){ header('downs.php?op=review&ids='.$ids); die(); }
	
	$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('rmdp_editorcom')." WHERE id_soft='$ids'");
	$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix('rmdp_editorcom')." (`id_soft`,`text`,`fecha`)
			VALUES ('$ids','$text','".time()."')");
	$xoopsDB->query("UPDATE ".$xoopsDB->prefix('rmdp_software')." SET `calificacion`='$rate' WHERE id_soft='$ids'");
	redirect_header('downs.php?op=review&amp;ids='.$ids, 1, _AM_RMDP_REVIEWOK);
}

/*
function View(){
	Funcion para ver todas las propiedades de las descargas
}
*/

/**
 * Seleccionamos el tipo de acción
 */
$op = $_GET['op'];
if ($op == ''){ $op = $_POST['op']; }

switch ($op){
	case 'new':
		NewDown();
		break;
	case 'save':
		SaveDown();
		break;
	case 'mod':
		Modify();
		break;
	case  'savemod':
		SaveMod();
		break;
	case 'del':
		Delete();
		break;
	case 'cars':
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
	case 'os':
		Plataformas();
		break;
	case 'addos':
		AddOs();
		break;
	case 'delos':
		DelOs();
		break;
	case 'sended':
		Sended();
		break;
	case 'shots':
		include 'shots.php';
		break;
	case 'review':
		reviews();
		break;
	case 'savereview':
		savereview();
		break;
	default:
		ShowDowns();
		break;
}
?>
