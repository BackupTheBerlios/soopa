<?php
// $Id: index.php,v 1.1 2005/07/10 02:32:17 mauriciodelima Exp $
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

include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}
$myts =& MyTextSanitizer::getInstance();
$saltos = 0;

function ShowThemes(){
	global $xoopsDB, $myts;
	
	if ($_GET[cid]<=0){ header("location: index.php"); die(); }
	//Nombre de la categoría
	list($nombre) = $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo FROM ".$xoopsDB->prefix("rmlib_categos")." WHERE cid = '$_GET[cid]'"));
	xoops_cp_header();
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE catego = '$_GET[cid]' ORDER BY tipo, orden, tid");
	$num = $xoopsDB->getRowsNum($result);
	echo "<center><img src='../images/up.gif' border='0' align='absmiddle'>\n
		  <a href='index.php'>"._RH_GENERAL_BACKCATEGO."</a>\n
		  &nbsp;&nbsp;<img src='../images/new.gif' border='0' align='absmiddle'>\n
		  <a href='index.php?op=newtheme&amp;cid=$_GET[cid]'>"._RH_THEMES_NEWTHEME."</a></center>\n
		  <table width='100%' class='outer' cellspacing='1' cellpadding='0'>\n
			<tr><th colspan='6'>".sprintf(_RH_THEMES_TITLE, $nombre)."</th></tr>\n";
	if ($num==0){	//Si no se encuentran temas cerramos la tabla
		echo "<tr><td class='head' align='left'>"._RH_THEMES_NOTFOUND."<br /><br />\n
			  <a href='index.php?op=newtheme&cid=$_GET[cid]'>"._RH_THEMES_NEWTHEME."</a></td></tr></table>";
		return;
	}
	// Creamos la tabla de resultados
	echo "<tr class='head'><td align='center' colspan='2'>"._RH_THEMES_TITLET."</td>\n
			<td align='center'>"._RH_THEMES_DATE."</td>\n
			<td align='center'>"._RH_THEMES_TYPE."</td>\n
			<td align='center'>"._RH_THEMES_ORDER."</td>\n
			<td align='center'>"._RH_THEMES_OPTIONS."</td>\n
		 </tr>";
	while(list($tid,$catego,$titulo,$desc,$fecha,$orden,$tipo) = $xoopsDB->fetchRow($result)){
		if ($class=="even"){
			$class="odd";
		} else {
			$class="even";
		}
		if ($tipo==0){
			$type = _RH_THEMES_TYPEHELP;
			$imagen = "images/theme_closed.gif";
		}elseif ($tipo==1){
			$type = _RH_THEMES_TYPEMANUAL;
			$imagen = "images/manual_closed.gif";
		} else {
			$type = _RH_THEMES_TYPETUTORIAL;
			$imagen = "images/tut_closed.gif";
		}
		$desc = $myts->makeTareaData4Show($desc);
		echo "<tr class='$class'><td align='left' width='20' rowspan='2'><img src='../$imagen' border='0'></td>\n
			  <td align='left'><a href='books.php?op=showindex&amp;tid=$tid&amp;cid=$catego'>$titulo</a></td>\n
			  <td align='center' rowspan='2'>".date("d/m/Y", $fecha)."</td>\n
		      <td align='center' rowspan='2'>$type</td>\n
			  <td align='center' rowspan='2'>$orden</td>\n
			  <td align='center' rowspan='2'>\n
			  <a href='books.php?op=showindex&amp;tid=$tid&amp;cid=$catego'><img src='../images/view.gif' border='0'></a>\n
			  <a href='index.php?op=edittheme&amp;tid=$tid&amp;cid=$catego'><img src='../images/edit.gif' border='0'></a>\n
			  <a href='index.php?op=deletetheme&amp;id=$tid&amp;cid=$catego'><img src='../images/delete.gif' border='0'></a>\n
			  </td></tr>\n
			  <tr class='$class'><td>$desc</td></tr>\n";
	}
	
	echo "</table>\n";
	xoops_cp_footer();
}

function NewTheme_Form($action = 0){
	global $xoopsDB;
	
	if ($_GET[cid]<=0){ header("location: index.php"); die(); }
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	//Nombre de la categoria
	$result = $xoopsDB->query("SELECT titulo FROM ".$xoopsDB->prefix("rmlib_categos")." WHERE cid = '$_GET[cid]'");
	list($nombre) = $xoopsDB->fetchRow($result);
	
	if ($action){
		$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE tid = '$_GET[tid]'");
		list($tid,$catego,$titulo,$desc,$fecha,$orden,$tipo) = $xoopsDB->fetchRow($result);
		if ($tipo==0){
			$uno = "checked";
		}elseif ($tipo==1){
			$dos = "checked";
		}elseif ($tipo==2){
			$tres = "checked";
		}elseif ($tipo==3){
			$cuatro = "checked";
		}elseif ($tipo==4){
			$cinco = "checked";
		}
		$GLOBALS['description'] = $desc;
	}
	
	xoops_cp_header();
	echo "<table align='center' class='outer' cellspacing='1' cellpadding='0' width='80%'>\n
			<tr><th align='left' colspan='2'>"._RH_THEMES_NEWTHEME."</th><tr>\n
			<form name='frmNew' method='post' action='index.php'>
			<tr><td class='even'>"._RH_CATEGOS_CATNAME."</td>\n
			<td class='odd'><strong>$nombre</strong></td></tr>\n
			<tr><td class='even' align='left'>"._RH_THEMES_TITLET."</td>\n
			<td class='odd' align='left'><input type='text' value='$titulo' name='title' size='30' maxlength='100'></td></tr>\n
			<tr><td class='even' align='left'>"._RH_THEMES_DESC."</td>\n
			<td class='odd' align='left'>";
			xoopsCodeTarea("description", 20, 15);
			xoopsSmilies("description");
	echo "	</td></tr>\n
			<tr><td class='even' align='left'>"._RH_THEMES_ORDER."</td>\n
			<td class='odd' align='left'><input type='text' size='5' value='$orden' name='order' value='0' maxlenght='10'></td></tr>\n
			<tr><td class='even' align='left'>"._RH_THEMES_TYPENEW."</td>\n
			<td class='odd' align='left'><input type='radio' name='type' value='0' $uno>".
			_RH_THEMES_TYPEHELP."\n<br><input type='radio' name='type' value='1' $dos>".
			_RH_THEMES_TYPEMANUAL."\n<br><input type='radio' name='type' value='2' $tres>".
			_RH_THEMES_TYPETUTORIAL."\n<br><input type='radio' name='type' value='3' $cuatro>".
			_RH_THEMES_TYPEFAQ."\n<br><input type='radio' name='type' value='4' $cinco>".
			_RH_THEMES_TYPEBOOK."\n<br></td></tr>\n
			<tr><td class='even'>&nbsp;</td>\n
			<td class='odd' align='left'><input type='submit' name='sbt' value='"._RH_GENERAL_SEND."'>\n
			<input type='button' name='cancel' value='"._RH_GENERAL_CANCEL."' onClick='javascript: history.go(-1)'></td></tr>\n
			<input type='hidden' name='op' value='savetheme'>\n
			<input type='hidden' name='tid' value='$_GET[tid]'>\n
			<input type='hidden' name='cid' value='$_GET[cid]'>\n</form></table>";
	xoops_cp_footer();
}

function SaveTheme($action = 0){
	global $xoopsDB, $myts;
	
	$title = $_POST[title];
	$desc = $_POST['description'];
	$order = $_POST[order];
	$type = $_POST[type];
	$cid = $_POST[cid];
	
	if ($title=="" || $desc=="" || $order<0 || $cid<=0){
		redirect_header("index.php?op=newtheme&amp;cid=$cid", 2, _RH_THEMES_DATAMISSING);
		die();
	}

	$title = $myts->makeTboxData4Save($title);
	$desc = $myts->makeTboxData4Save($desc);
	if ($action == 0){
		$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE titulo='$title' AND tipo='$type'");
		list($num) = $xoopsDB->fetchRow($result);
	}
	//Si existe el tema entonces salimos
	if ($num>0){
		redirect_header("index.php?op=newtheme&amp;cid=$cid", 1, _RH_THEMES_EXIST);
		die();
	}
	
	if ($action){
		$xoopsDB->query("UPDATE ".$xoopsDB->prefix("rmlib_temas")." SET `titulo`='$title', `desc`='$desc',`orden`='$order',
						`tipo`='$type' WHERE tid = $_POST[tid]");
	} else {
		$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("rmlib_temas")." (`catego`,`titulo`,`desc`,`fecha`,`orden`,`tipo`)
						VALUES ('$cid','$title','$desc','".mktime(0,0,0,date("m"),date("d"),date("Y"))."','$order','$type')");
	}
	redirect_header("index.php?op=showthemes&amp;cid=$cid", 1, _RH_THEMES_SUCEFULLY);
}

function ShowCategos(){
	global $xoopsDB, $myts;
	
	xoops_cp_header();			
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_categos")." ORDER BY titulo");
	$num = $xoopsDB->getRowsNum($result);	
	echo "<center><a href='index.php?op=newcatego'>"._RH_CATEGOS_NEWCATEGO."</a></center>
	      <table width='100%' class='outer' cellspacing='1' cellpadding='0'>\n
			<tr><th colspan='5'>"._RH_CATEGOS_TITLE."</th></tr>\n";
	if ($num==0){	//Si no se encuentran temas cerramos la tabla
		echo "<tr><td class='head' align='left'>"._RH_CATEGOS_NOTFOUND."<br /><br />\n
			  <a href='index.php?op=newcatego'>"._RH_CATEGOS_NEWCATEGO."</a></td></tr></table>";
		return;
	}
	// Creamos la tabla de resultados
	echo "<tr class='head'><td align='center' colspan='2'>"._RH_CATEGOS_TITLEC."</td>\n
			<td align='center'>"._RH_CATEGOS_DESC."</td>\n
			<td align='center'>"._RH_CATEGOS_DATE."</td>\n
			<td align='center'>"._RH_THEMES_OPTIONS."</td>\n
		 </tr>";
	while(list($cid,$titulo,$desc,$fecha) = $xoopsDB->fetchRow($result)){
		if ($class=="even"){
			$class="odd";
		} else {
			$class="even";
		}
		$desc = $myts->makeTareaData4Show($desc);
		echo "<tr class='$class'><td align='left' width='20'><img src='../images/catego.gif' border='0'></td>\n
			  <td align='left'><a href='index.php?op=showthemes&amp;cid=$cid'>$titulo</a></td>\n
			  <td align='left'>$desc</td>\n
			  <td align='center'>".date("d/m/Y", $fecha)."</td>\n
			  <td align='center'>
			  <a href='index.php?op=showthemes&amp;cid=$cid'><img src='../images/view.gif' border='0' alt='Editar'></a>\n
			  <a href='index.php?op=editcatego&amp;cid=$cid'><img src='../images/edit.gif' border='0' alt='Editar'></a>
			  <a href='index.php?op=deletecatego&amp;id=$cid'><img src='../images/delete.gif' border='0' alt=\"Eliminar\"></a></td></tr>\n";
	}
	
	echo "</table>\n<br>";
	xoops_cp_footer();
}

function NewCatego_Form($action = 0){
	global $xoopsDB;
	include XOOPS_ROOT_PATH."/include/xoopscodes.php";
	if ($action){
		$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_categos")." WHERE cid='$_GET[cid]'");
		list($tid,$titulo,$desc,$fecha) = $xoopsDB->fetchRow($result);
	}
	$GLOBALS['desc'] = $desc;
	$cid = $_GET['cid'];
	xoops_cp_header();
	echo "<table align='center' class='outer' cellspacing='1' cellpadding='0' width='80%'>\n
			<tr><th align='left' colspan='2'>"._RH_CATEGOS_NEWCATEGO."</th><tr>\n
			<form name='frmNew' method='post' action='index.php'>
			<tr><td class='even' align='left'>"._RH_CATEGOS_TITLEC."</td>\n
			<td class='odd' align='left'><input type='text' name='title' size='30' maxlength='100' value='$titulo'></td></tr>\n
			<tr><td class='even' align='left'>"._RH_CATEGOS_DESC."</td>\n
			<td class='odd' align='left'>";
			xoopsCodeTarea("desc", 20, 15);
			xoopsSmilies("desc");
	echo "  </td></tr>\n
			<tr><td class='even'>&nbsp;</td>\n
			<td class='odd' align='left'><input type='submit' name='sbt' value='"._RH_GENERAL_SEND."'>\n
			<input type='button' name='cancel' value='"._RH_GENERAL_CANCEL."' onClick='javascript: history.go(-1)'></td></tr>\n
			<input type='hidden' name='op' value='savecatego'>\n
			<input type='hidden' name='tid' value='$tid'>\n
			<input type='hidden' name='cid' value='$cid'>\n</form></table>";
	xoops_cp_footer();
}

function SaveCatego($action = 0){
	global $xoopsDB, $myts;
	
	$title = $_POST[title];
	$desc = $_POST['desc'];
	
	if ($title=="" || $desc==""){
		echo "Aqui";
		redirect_header("index.php?op=newtheme", 2, _RH_THEMES_DATAMISSING);
		die();
	}

	$title = $myts->makeTboxData4Save($title);
	$desc = $myts->makeTareaData4Save($desc);
	if ($action == 0){
		$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmlib_categos")." WHERE titulo='$title'");
		list($num) = $xoopsDB->fetchRow($result);
	}
	//Si existe el tema entonces salimos
	if ($num>0){
		redirect_header("index.php?op=newtheme", 1, _RH_CATEGOS_EXIST);
		die();
	}
	
	if ($action){
		$xoopsDB->query("UPDATE ".$xoopsDB->prefix("rmlib_categos")." SET `titulo`='$title',`desc`='$desc' WHERE cid='$_POST[cid]'");
	} else {
		$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("rmlib_categos")." (`titulo`,`desc`,`fecha`)
						VALUES ('$title','$desc','".mktime(0,0,0,date("m"),date("d"),date("Y"))."')");
	}
	redirect_header("index.php", 1, _RH_CATEGOS_SUCEFULLY);
}

function DeleteItem($item, $id){
	global $xoopsDB;
	
	$ok = $_POST[ok];
	
	if ($ok == 1){
		switch ($item){
			case 0:
				$sql = "DELETE FROM ".$xoopsDB->prefix("rmlib_categos")." WHERE cid='$id'";
				$newop = "showcategos";
				break;
			case 1:
				$sql = "DELETE FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE tid='$id'";
				$newop = "showthemes&amp;cid=".$_POST[cid];
				break;
			case 2:
				$sql = "DELETE FROM ".$xoopsDB->prefix("rmlib_indice").", ".$xoopsDB->prefix("rmlib_contenido")." WHERE iid='$id' AND index_id='$id'";
				$newop = "showthemes&amp;cid=".$_POST[cid];
				break;
		}
		$xoopsDB->query($sql);
		redirect_header("index.php?op=$newop", 2, _RH_GENERAL_DELETED);
		die();
	}
	
	xoops_cp_header();
	echo "<table class='outer' cellpadding='0' cellspacing='1' width='60%' align='center'>\n
			<tr><td class='head' align='center'>"._RH_GENERAL_DELELEMET."\n
			<br /><br /><form name='frmDel' method='post' action='index.php'>\n
			<input type='submit' name='sbt' value='"._RH_GENERAL_SEND."'>\n
			<input type='button' name='cancel' value='"._RH_GENERAL_CANCEL."' onClick='javascript: history.go(-1);'>
			<input type='hidden' name='op' value='$_GET[op]'>\n
			<input type='hidden' name='ok' value='1'>\n
			<input type='hidden' name='cid' value='$_GET[cid]'>\n
			<input type='hidden' name='id' value='$id'>\n</td></tr></table>";
	xoops_cp_footer();
}





function AddUserToBook(){

}

if (isset($_GET['op'])){
	$op = $_GET['op'];
} else {
	$op = $_POST['op'];
}

switch ($op){
	case "showthemes":
		ShowThemes();
		break;
	case "newtheme":
		NewTheme_Form();
		break;
	case "edittheme":
		NewTheme_Form(1);
		break;
	case "savetheme":
		if ($tid>0){
			SaveTheme(1);
		} else {
			SaveTheme();
		}
		break;
	case "newcatego":
		NewCatego_Form();
		break;
	case "editcatego":
		NewCatego_Form(1);
		break;
	case "savecatego":
		if ($cid>0){
			SaveCatego(1);
		} else {
			SaveCatego();
		}
		break;
	case "deletecatego":
		DeleteItem(0, $id);
		break;
	case "deletetheme":
		DeleteItem(1, $id);
		break;
	case "showcategos":
	default:
		ShowCategos();
		break;
}
?>