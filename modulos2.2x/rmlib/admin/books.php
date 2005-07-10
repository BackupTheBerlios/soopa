<?php
// $Id: books.php,v 1.1 2005/07/10 02:32:17 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//              RM+SOFT - Systema de Ayuda y Manuales en Línea               //
//                Copyright RM+SOFT © 2005. (Eduardo Cortés)                 //
//                     <http://www.redmexico.com.mx/>                        //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//  ------------------------------------------------------------------------ //
//	Este programa es un programa libre; puedes distribuirlo y modificarlo	 //
//	bajo los términos de al GNU General Public Licencse como ha sido		 //
//	publicada por The Free Software Foundation (Fundación de Software Libre; //
//	en cualquier versión 2 de la Licencia o mas reciente.					 //
//                                                                           //
//	Este programa es distribuido esperando que sea últil pero SIN NINGUNA	 //
//	GARANTÍA. Ver The GNU General Public License para mas detalles.			 //
//  ------------------------------------------------------------------------ //
//	Questions, Bugs or any comment plese write me						 	 //
//	Preguntas, errores o cualquier comentario escribeme						 //
//	<adminone@redmexico.com.mx>												 //
//  ------------------------------------------------------------------------ //

/***
 * Este archivo maneja y controla los libros. Elimina, crea, modifica
 * y establece permisos necesarios
 **/
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}

$myts =& MyTextSanitizer::getInstance();
$saltos = 0;

/******************************************************/

function GetSubIndex($index){
	global $xoopsDB, $saltos;
	
	if (!$index){ return; }
	$saltos += 2;
	$result = $xoopsDB->query("SELECT iid, titulo, orden, fecha FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE parent = '$index'");
	while (list($iid, $titulo,$orden, $fecha) = $xoopsDB->fetchRow($result)){
		list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE parent = '$iid'"));
		if ($num > 0){
			$imagen = "../images/chapter.gif";
			$class="even";
		} else {
			$imagen = "../images/content.gif";
			$class="odd";
		}
		echo "<tr class='$class'><td><span style='color: #E6E6E6'>".str_pad("-", $saltos, "-")."</span>\n
			  <img src='$imagen' align='absmiddle'> $titulo</td>\n
			  <td align='center'>$orden</td>\n
			  <td align='center'>".date("d/m/Y", $fecha)."</td>\n
			  <td align='center'>\n
			  <a href='books.php?op=content&amp;iid=$iid'><img src='../images/content.gif' border='0'></a>\n
				<a href='books.php?op=editindex&amp;iid=$iid'><img src='../images/edit.gif' border='0'></a>\n
				<a href='books.php?op=deleteindex&amp;iid=$iid'><img src='../images/delete.gif' border='0'></a>\n</td></tr>\n";
		GetSubIndex($iid);
	}
	$saltos -= 2;
}

/******************************************************/

function WritePermissions($tid){
	global $xoopsDB;
	
	$result = $xoopsDB->query("SELECT uid, uname FROM ".$xoopsDB->prefix("users")." ORDER BY uname");
	echo "<table width='40%' class='outer' cellspacing='1'>\n
			<tr><th>"._RH_THEMES_PERMISSIONS."</th></tr>\n
			<tr><td class='even'><form name='frmaddu' method='post' action='books.php'>\n
			<select name='user'>";
	while ($row = $xoopsDB->fetchArray($result)){
		echo "<option value='$row[uid]'>$row[uname]</option>\n";
	}
	echo "</select> <input type='submit' name='sbtAdd' value='"._RH_CONTENT_ADD."'>\n
		  <input type='hidden' name='op' value='addusertobook'>\n
		  <input type='hidden' name='tid' value='$tid'>\n
		  <input type='hidden' name='cid' value='$cid'>\n</form><br>\n
		  <form name='existprm' action='books.php' method='post'>\n"._RH_THEMES_EXISTSPERM."<br>
		  <select name='exuser' size='5'>\n";
		  $result = $xoopsDB->query("SELECT iduser FROM ".$xoopsDB->prefix("rmlib_users")." WHERE idbook='$tid' ORDER BY iduser;");
		  while ($row = $xoopsDB->fetchArray($result)){
		  		$r1 = $xoopsDB->query("SELECT uname FROM ".$xoopsDB->prefix("users")." WHERE uid='$row[iduser]'");
				$num = $xoopsDB->getRowsNum($r1);
				if ($num>0){
					list($uname) = $xoopsDB->fetchRow($r1);
					echo "<option value='$row[iduser]'>$uname</option>\n";
				}
		  }
	echo" </select><br><input type='submit' name='sbt' value='"._RH_CONTENT_DELETE."'>
		  <input type='hidden' name='op' value='deluserfrombook'>\n
		  <input type='hidden' name='tid' value='$tid'>\n
		  </form></td></tr></table><br>";
}

/******************************************************/

function ShowIndex(){
	global $xoopsDB;
	
	if ($_GET['tid']<=0){ header("location: index.php?op=showthemes&amp;cid=$_GET[cid]"); die();}
	$tid = $_GET['tid'];
	list($catego) = $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo FROM ".$xoopsDB->prefix("rmlib_categos")." WHERE cid = '$_GET[cid]'"));
	list($ntema, $cid) = $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo, catego FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE tid = '$_GET[tid]'"));
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE tema = '$_GET[tid]' AND parent = '0' ORDER by orden");
	$num = $xoopsDB->getRowsNum($result);
	xoops_cp_header();
	echo "<img src='../images/up.gif' align='absmiddle'>&nbsp;<a href='index.php?op=showthemes&amp;cid=$cid'>"._RH_GENERAL_BACKTHEMES."</a>\n
		  <table width='60%' cellpadding='0' cellspacing='1' class='outer' align='left'>\n
			<tr><th>".sprintf(_RH_INDEX_TITLE, $catego, $ntema)."</th>\n
			<th align='center'>"._RH_INDEX_ORDER."</th>\n
			<th align='center'>"._RH_THEMES_DATE."</th>\n
			<th align='center'>"._RH_THEMES_OPTIONS."</th></tr>\n";
	if ($num<=0){
		echo "<tr><td class='head' colspan='4'>"._RH_INDEX_NOTFOUND."</td></tr>";
	}
	while (list($iid,$titulo,$tema,$parent,$orden,$fecha) = $xoopsDB->fetchRow($result)){
		list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE parent = '$iid'"));
		if ($num > 0 || $parent == 0){
			$imagen = "../images/chapter.gif";
		} else {
			$imagen = "../images/content.gif";
		}
		echo "<tr class='even'><td><img src='$imagen' border='0' align='absmiddle'> $titulo</td>\n
				<td align='center'>$orden</td>\n
				<td align='center'>".date("d/m/Y", $fecha)."</td>\n
				<td width='80' align='center'>\n
				<a href='books.php?op=content&amp;iid=$iid'><img src='../images/content.gif' border='0'></a>\n
				<a href='books.php?op=editindex&amp;iid=$iid'><img src='../images/edit.gif' border='0'></a>\n
				<a href='books.php?op=deleteindex&amp;iid=$iid'><img src='../images/delete.gif' border='0' alt='Eliminar'></a>\n</td></tr>\n";
		GetSubIndex($iid);
	}
	
	echo "</table>\n<br>";
	
	echo "<table width='40%' class='outer' cellpadding='0' cellspacing='1' align='center'>\n
		  	<tr><th colspan='2'>"._RH_INDEX_NEWINDEX."</th></tr>\n
			<form name='frmNew' action='books.php' method='post'>\n
			<tr><td class='even' align='left'>"._RH_INDEX_TITLEI."</td>\n
			<td class='odd' align='left'><input type='text' name='titulo' size='30' maxlength='150'></td></tr>\n
			<tr><td class='even' align='left'>"._RH_INDEX_THEME."</td>\n
			<td class='odd' align='left'><strong>$ntema</strong></td></tr>\n
			<tr><td class='even' align='left'>"._RH_INDEX_PARENT."</td>\n
			<td class='odd' align='left'><select name='parent'>\n
			<option value='0'>Sin Indice superior</option>\n";
	$result = $xoopsDB->query("SELECT iid, titulo FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE tema = '$_GET[tid]'");
	while (list($iid, $titulo)=$xoopsDB->fetchRow($result)){
		echo "<option value='$iid'>$titulo</option>";
	}
	echo "</select></td></tr>\n
	 	    <tr><td class='even' align='left'>"._RH_INDEX_ORDER."</td>\n
			<td align='left' class='odd'><input type='text' name='orden' size='5' value='0'></td></tr>\n
			<tr><td class='even'>&nbsp;</td>\n
			<td class='odd' align='left'>\n
			<input type='submit' name='sbt' value='"._RH_GENERAL_SEND."'>\n
			<input type='hidden' name='op' value='saveindex'>\n
			<input type='hidden' name='tid' value='$_GET[tid]'>\n
			</form>
			</table>\n";
	WritePermissions($tid);
	xoops_cp_footer();
}

/******************************************************/

function SaveIndex($action = 0){
	global $xoopsDB;
	
	$titulo = $_POST[titulo];
	$tid = $_POST[tid];
	$cid = $_POST[cid];
	$parent = $_POST['parent'];
	$orden = $_POST[orden];
	$iid = $_POST[iid];
	$fecha = mktime(0,0,0,date("m"),date("d"),date("Y"));
	
	if ($titulo == "" || $tid<=0){
		redirect_header("books.php?op=showindex&amp;tid=$tid&amp;cid=$cid", 1, _RH_THEMES_DATAMISSING);
		die();
	}
	if ($action){
		$xoopsDB->query("UPDATE ".$xoopsDB->prefix("rmlib_indice")." SET `titulo`='$titulo',
						`parent`='$parent',`orden`='$orden' WHERE iid = '$iid'");
	} else {
		$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("rmlib_indice")." (`titulo`,`tema`,`parent`,
						`orden`,`fecha`) VALUES ('$titulo','$tid','$parent','$orden','$fecha')");
	}
	redirect_header("books.php?op=showindex&amp;tid=$tid&amp;cid=$cid", 1, _RH_INDEX_SUCESS);
}

/******************************************************/

function DeleteIndex($iid){
	global $xoopsDB;
	
	if ($iid<=0){ header("location:index.php");}
	$ok = $_POST[ok];
	
	if ($ok){
		$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE iid = '$iid'");
		list($index,$titulo,$tema,$parent,$orden,$fecha) = $xoopsDB->fetchRow($result);
		$xoopsDB->query("UPDATE ".$xoopsDB->prefix("rmlib_indice")." SET `parent` = '0' WHERE parent = '$iid'");
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE iid = '$iid'");
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix("rmlib_contenido")." WHERE index = '$iid'");
		redirect_header("books.php?op=showindex&amp;tid=$tema&amp;", 1, _RH_GENERAL_DELETED);
		die();
	} else {
		xoops_cp_header();
		echo "<table width='60%' class='outer' cellspacing='1' align='center'>\n
				<tr class='head'><td align='center'>\n"._RH_INDEX_CONFIRM."<br />"._RH_INDEX_BEFORE."\n
				<br /><br /><form name='frmDel' action='books.php' method='post'>\n
				<input type='submit' name='sbt' value='"._RH_GENERAL_SEND."'>\n
				<input type='button' name='cancel' value='"._RH_GENERAL_CANCEL."' onClick='javascript: history.go(-1);'>\n
				<input type='hidden' name='op' value='deleteindex'>\n
				<input type='hidden' name='ok' value='1'>\n
				<input type='hidden' name='iid' value='$iid'>\n
				</form></td></tr></table>\n";
		xoops_cp_footer();
	}
}

/******************************************************/

function EditIndex($iid){
	global $xoopsDB;
	
	if ($iid<=0){ header("location: index.php");}
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE iid = '$iid'");
	list($index,$titulo,$tema,$parent,$orden,$fecha) = $xoopsDB->fetchRow($result);
	$result = $xoopsDB->query("SELECT titulo, catego FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE tid = '$tema'");
	list($ntema, $cid) = $xoopsDB->fetchRow($result);
	xoops_cp_header();
	echo "<table width='70%' align='center' class='outer' cellpadding='0' cellspacing='1'>\n
			<tr><th colspan='2'>"._RH_INDEX_EDIT."</th></tr>\n
			<form name='frmEdit' action='books.php' method='post'>\n
			<tr><td class='even' align='left'>"._RH_INDEX_TITLEI."</td>\n
			<td class='odd'><input type='text' name='titulo' value='$titulo' size='30' maxlength='150'></td></tr>\n
			<tr><td class='even' align='left'>"._RH_INDEX_THEME."</td>\n
			<td class='odd' align='left'>$ntema</td></tr>\n
			<tr><td class='even' align='left'>"._RH_INDEX_PARENT."</td>\n
			<td class='odd' align='left'><select name='parent'>\n";
	$result = $xoopsDB->query("SELECT iid, titulo FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE tema = '$tema' ORDER BY orden, titulo");
	if ($parent==0){
		echo "<option value='0' selected>"._RH_INDEX_NOPARENT."</option>\n";
	} else {
		echo "<option value='0'>"._RH_INDEX_NOPARENT."</option>\n";
	}
	
	while (list($pid,$ititle)=$xoopsDB->fetchRow($result)){
		if ($pid==$parent){
			echo "<option value='$pid' selected>$ititle</option>\n";
		} else {
			echo "<option value='$pid'>$ititle</option>\n";
		}
	}
	
	echo "  </select></td></tr>\n
			<tr><td class='even' align='left'>"._RH_INDEX_ORDER."</td>\n
			<td class='odd' align='left'><input type='text' size='4' name='orden' value='$orden'></td></tr>\n
			<tr><td class='even' align='left'>&nbsp;</td>\n
			<td class='odd' align='left'><input type='submit' name='sbt' value='"._RH_GENERAL_SEND."'>\n
			<input type='button' name='cancel' value='"._RH_GENERAL_CANCEL."' onClick='javascript: history.go(-1);'>\n
			<input type='hidden' name='op' value='saveindex'>\n
			<input type='hidden' name='iid' value='$iid'>\n
			<input type='hidden' name='tid' value='$tema'>\n
			<input type='hidden' name='cid' value='$cid'>\n
			</form></td></tr></table>\n";
	xoops_cp_footer();
}

/******************************************************/

function AddUserToBook(){
	global $xoopsDB;
	$idu = $_POST['user'];
	$tid = $_POST['tid'];
	if ($idu<=0 || $tid<=0){
		header("location: books.php?tid=$tid");
		die();
	}

	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_users")." WHERE iduser='$idu' AND idbook='$tid'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num > 0){
		redirect_header("books.php?tid=$tid", 1, _RH_THEMES_USEREXIST);
		die();
	}
	$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("rmlib_users")." (`iduser`,`idbook`) VALUES ('$idu','$tid');");
	redirect_header("books.php?tid=$tid", 1, _RH_THEMES_USERADDED);
}

/******************************************************/

function DeleteUserFromBook(){
	global $xoopsDB;
	
	$ok = $_POST['ok'];
	$exuser = $_POST['exuser'];
	$tid = $_POST['tid'];
	if ($ok){
		if ($exuser<=0 || $tid<=0){ header("location: books.php?tid=$tid"); die(); }
		$xoopsDB->query("DELETE FROM ".$xoopsDB->prefix("rmlib_users")." WHERE iduser='$exuser' AND idbook='$tid';");
		redirect_header("books.php?tid=$tid", 1, _RH_GENERAL_DELETED);
		die();
	} else {
		xoops_cp_header();
		echo "<table class='outer' cellspacing='1' width='60%' align='center'>\n
				<tr><td class='even' align='center'>\n
				<form name='delform' method='post' action='books.php'>\n
				<br><br>"._RH_GENERAL_DELETEUSERCONFIRM."<br><br>
				<input type='submit' name='sbt' value='"._RH_CONTENT_DELETE."'>\n
				<input type='button' name='cancel' value='"._RH_GENERAL_CANCEL."' onclick='javascript:history.go(-1);'>\n
				<input type='hidden' name='op' value='deluserfrombook'>\n
				<input type='hidden' name='tid' value='$tid'>\n
				<input type='hidden' name='exuser' value='$exuser'>\n
				<input type='hidden' name='ok' value='1'>\n
				</form>\n
				</td></tr></table>";
		xoops_cp_footer();
	}
}

/******************************************************/

function Content($iid){
	global $xoopsDB;
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	$cs = $_POST[catego];
	$ct = $_POST[temas];
	/**
	* Buscamos si existe contenido para este indice
	**/
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_contenido")." WHERE `index` = '$iid'");
	$num = $xoopsDB->getRowsNum($result);

	if ($num>0){
		list($coid,$index,$texto,$fecha) = $xoopsDB->fetchRow($result);
		$GLOBALS['texto'] = $texto;
	}
	list($tid, $ititle) = $xoopsDB->fetchRow($xoopsDB->query("SELECT tema, titulo FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE iid = '$iid'"));
	list($cid,$ntema) = $xoopsDB->fetchRow($xoopsDB->query("SELECT catego, titulo FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE tid = '$tid'"));
	if ($cs<=0){ $cs = $cid; }
	if ($ct<=0){ $ct = $tid; }
	/**
	* Dibujamos la tabla d eedición
	**/
	xoops_cp_header();
	echo "<script type='text/javascript'>\n<!--
			function wcatego(){
				document.frmContent.texto.value = document.frmContent.texto.value + '[catego:' + document.frmContent.catego.value + ']' + document.frmContent.txtC.value + '[/catego]';				
			}
			function wtheme(){
				document.frmContent.texto.value = document.frmContent.texto.value + '[theme:' + document.frmContent.temas.value + ']' + document.frmContent.txtT.value + '[/theme]';				
			}
			function windex(){
				document.frmContent.texto.value = document.frmContent.texto.value + '[index:' + document.frmContent.indices.value + ']' + document.frmContent.txtI.value + '[/index]';				
			}
		  -->\n</script>\n";
	echo "<table width='100%' cellpadding='0' cellspacing='1' class='outer'>\n
			<tr><th colspan='3'>".sprintf(_RH_CONTENT_TITLE, $ititle)."</th></tr>\n
			<form name='frmContent' action='books.php' method='post'>\n
		    <tr><td class='even' align='left'>"._RH_CONTENT_TEXT."<br />
			<span style:'font-size: 8px;'>"._RH_CONTENT_INST."</span></td>\n
			<td class='odd' align='left'>";
			xoopsCodeTarea("texto", 20, 15);
			xoopsSmilies("texto");
	echo "  </td>\n
			<td class='even' align='left' valign='top'><strong>"._RH_CONTENT_LINKS."</strong><br /><br />"._RH_CONTENT_CATEGO."<br />
			<select name='catego' onChange=\"document.frmContent.op.value='content'; document.frmContent.submit();\">";
			
			$result = $xoopsDB->query("SELECT cid, titulo FROM ".$xoopsDB->prefix("rmlib_categos")." ORDER BY titulo");
			while (list($catego, $ncatego) = $xoopsDB->fetchRow($result)){
				if ($cs == $catego){
					echo "<option value='$catego' selected>$ncatego</option>\n";
				} else {
					echo "<option value='$catego'>$ncatego</option>\n";
				}
			}
			
	echo "</select><br /><input type='text' size='20' name='txtC'><input type='button' name='btnC' value='"._RH_CONTENT_ADD."' onclick=\"wcatego();\"><br /><br />\n
		  "._RH_CONTENT_THEME."<br /><select name='temas' onChange=\"document.frmContent.op.value='content'; document.frmContent.submit();\">\n";
			$result = $xoopsDB->query("SELECT tid, titulo FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE catego = '$cs' ORDER BY titulo");
			while (list($temas, $ntemas) = $xoopsDB->fetchRow($result)){
				if ($ct == $temas){
					echo "<option value='$temas' selected>$ntemas</option>\n";
				} else {
					echo "<option value='$temas'>$ntemas</option>\n";
				}
			}
	echo "	</select><br /><input type='text' size='20' name='txtT'><input type='button' name='btnT' value='"._RH_CONTENT_ADD."' onclick=\"wtheme();\"><br /><br />\n
			<select name='indices'>\n";
			$result = $xoopsDB->query("SELECT iid, titulo FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE tema = '$ct' ORDER BY titulo");
			while (list($indice, $nindice) = $xoopsDB->fetchRow($result)){
					echo "<option value='$indice'>$nindice</option>\n";
			}
	echo "  </select><br /><input type='text' size='20' name='txtI'><input type='button' name='btnI' value='"._RH_CONTENT_ADD."' onclick=\"windex();\">
			<input type='hidden' name='op' value='savecontent'>\n
	        <input type='hidden' name='iid' value='$iid'>\n
			<input type='hidden' name='cid' value='$cid'>\n";
			if ($coid > 0){
				echo "<input type='hidden' name='save' value='0'>\n";
				echo "<input type='hidden' name='coid' value='$coid'>\n";
			} else {
				echo "<input type='hidden' name='save' value='1'>\n";
			}
	echo "	<input type='hidden' name='tid' value='$tid'>\n</td></tr>
			<tr><td class='even'>&nbsp;</td>\n
			<td class='odd' align='left'><input type='submit' name='sbt' value='"._RH_GENERAL_SEND."'>\n
			<input type='button' value='"._RH_GENERAL_CANCEL."' name='cancel' onclick=\"javascript: window.location = 'index.php?op=showindex&tid=$tid';\">\n</td>\n
			<td class='even'></td></form>\n
		  </table>";
	xoops_cp_footer();
}

/******************************************************/

function SaveContent(){
	global $xoopsDB, $myts, $xoopsUser;
	$iid = $_POST[iid];
	$tid = $_POST[tid];
	$texto = $myts->makeTboxData4Save($_POST['texto']);
	$save = $_POST[save];
	$coid = $_POST[coid];
	if ($iid <= 0 || $tid <= 0 || $texto == ""){
		redirect_header('books.php?op=content&amp;iid=$iid', 1, _RH_THEMES_DATAMISSING);
		die();
	}
	
	if ($save){
		$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("rmlib_contenido")." (`index`,`texto`,`fecha`,`iduser`) VALUES 
					 	('$iid','$texto','".mktime()."','".$xoopsUser->getvar('uid')."')");
	} else {
		$xoopsDB->query("UPDATE ".$xoopsDB->prefix("rmlib_contenido")." SET `texto`='$texto', `fecha`='".mktime()."', `iduser`='".$xoopsUser->getvar('uid')."' WHERE coid = '$coid'");
	}
	redirect_header("books.php?op=showindex&amp;tid=$tid", 1, _RH_CONTENT_SUCESS);
}

/******************************************************/
switch ($op){
	case "saveindex":
		if ($iid>0){
			SaveIndex(1);
		} else {
			SaveIndex();
		}
		break;
	case "deleteindex":
		DeleteIndex($iid);
		break;
	case "editindex":
		EditIndex($iid);
		break;
	case "addusertobook":
		AddUserToBook();
		break;
	case "deluserfrombook":
		DeleteUserFromBook();
		break;
	case "content":
		Content($iid);
		break;
	case "savecontent":
		SaveContent();
		break;
	case "showindex":
	default:
		ShowIndex();
		break;
}
?>