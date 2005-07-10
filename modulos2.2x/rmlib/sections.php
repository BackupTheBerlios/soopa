<?
// $Id: sections.php,v 1.1 2005/07/10 02:32:17 mauriciodelima Exp $
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

if (isset($_GET['section'])){
	$section = $_GET['section'];
}

if ($section <= 0){
	header("location: index.php");
	die();
}

include("../../mainfile.php");
include XOOPS_ROOT_PATH."/header.php";
$myts =& MyTextSanitizer::getInstance();
$xoopsOption['template_main'] = 'rmlib_temas.html'; //Plantilla para esta página

function GetAuthor($idb){
	global $xoopsDB;
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_users")." WHERE idbook='$idb'");
	while (list($idu,$idbook)=$xoopsDB->fetchRow($result)){
		$r1 = $xoopsDB->query("SELECT uname FROM ".$xoopsDB->prefix("users")." WHERE uid='$idu'");
		$num  = $xoopsDB->getRowsNum($r1);
		if ($num > 0){
			list($uname) = $xoopsDB->fetchRow($r1);
			$rtn .= "<a href='".XOOPS_URL."/userinfo.php?uid=".$idu."'>$uname</a>, ";
		}
	}
	$rtn = substr($rtn, 0, strlen($rtn) - 2);
	return($rtn);
}

// Obtenemos el nombre de la categoría
list($ncatego) = $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo FROM ".$xoopsDB->prefix("rmlib_categos")." WHERE cid = '$section'"));

$xoopsTpl->assign('categoria', $ncatego);
$xoopsTpl->assign('lib_name', $xoopsModuleConfig['libname']);

$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE catego = '$section' ORDER BY orden");
$num = $xoopsDB->getRowsNum($result);

while (list($tid,$catego,$titulo,$desc,$fecha,$orden,$tipo, $lecturas) = $xoopsDB->fetchRow($result)){
	if ($tipo==0){
		$type = _RH_BOOKS_HELP;
	} elseif ($tipo==1){
		$type = _RH_BOOKS_MANUAL;
	} else {
		$type = _RH_BOOKS_TUT;
	}
	$desc = $myts->makeTareaData4Show($desc);
	$xoopsTpl->append('books', array('id'=>$tid,'titulo'=>"<a href='books.php?book=$tid'>$titulo</a>",'desc'=>$desc,'fecha'=>sprintf(_RH_CATEGOS_DATE, date("d/m/Y", $fecha)), 'tipo'=>$tipo, 'lecturas'=>sprintf(_RH_RMLIB_OPENED, $lecturas), 'autores'=>GetAuthor($tid)));
}

$xoopsTpl->assign('lang_thereare', sprintf(_RH_BOOKS_THEREARE, $num, $ncatego));

$xoopsTpl->assign('lang_books', _RH_BOOKS_NAME);
$xoopsTpl->assign('lang_help', _RH_BOOKS_HELP);
$xoopsTpl->assign('lang_manual', _RH_BOOKS_MANUAL);
$xoopsTpl->assign('lang_tutorial', _RH_BOOKS_TUT);
$xoopsTpl->assign('lang_faq', _RH_BOOKS_FAQ);
$xoopsTpl->assign('lang_book', _RH_BOOKS_BOOK);
$xoopsTpl->assign('lang_pubas', _RH_BOOKS_PUBLISHEDAS);
$xoopsTpl->assign('lang_author', _RH_BOOKS_AUTHORS);
$xoopsTpl->assign('back_sections',"<a href='index.php'>"._RH_BOOKS_BACK."</a>");

include XOOPS_ROOT_PATH."/footer.php";
?>