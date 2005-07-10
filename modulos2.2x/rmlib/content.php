<?
// $Id: content.php,v 1.1 2005/07/10 02:32:17 mauriciodelima Exp $
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

if ($index <= 0){
	header("location: index.php");
	die();
}

$id = $index;
include("../../mainfile.php");
include XOOPS_ROOT_PATH."/header.php";
require("include/index_tree.php");
$myts =& MyTextSanitizer::getInstance();
$xoopsOption['template_main'] = 'rmlib_content.html'; //Plantilla para esta página

$xoopsTpl->assign('index_id', $index);
list($coid,$index,$texto,$fecha,$com,$author) = $xoopsDB->fetchRow($xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_contenido")." WHERE `index` = '$id'"));
list($nindice,$tid, $lecturas)= $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo, tema, lecturas FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE iid = '$id'"));
list($ntema,$cid)= $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo, catego FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE tid = '$tid'"));

if ($xoopsUser==''){
	$rau = $xoopsDB->query("SELECT uname FROM ".$xoopsDB->prefix("users")." WHERE uid='$author'");
	if ($author==0){
		$author = "Anónimo";
	} else {
	    list($author) = $xoopsDB->fetchArray($rau);
	}
} else {
	$author = $xoopsUser->getUnameFromId($author);
}
$xoopsTpl->assign('autor', $author);


if ($xoopsModuleConfig['xoopscode'] == 1){
	$texto = $myts->makeTareaData4Show($texto);
}

if ($texto == ""){
	$texto = sprintf(_RH_CONTENT_NOCONTENT, "[theme:".$tid."]".$ntema."[/theme]");
	$result = $xoopsDB->query("SELECT titulo, iid FROM ".$xoopsDB->prefix("rmlib_indice")." ORDER BY parent, orden");
}

// Obtenemos el arbol de indices
GetIndexTree($tid);
LocatePosition($id);

$patt = array();
$rep = array();

/***
* Reemplazamos el código generado para enlazar los contenidos
***/
$patt[] = "/\[index:(['\"]?)([^\"'<>]*)\\1](.*)\[\/index\]/sU";
$rep[] = '<a href="content.php?index=\2">\\3</a>';
$patt[] = "/\[theme:(['\"]?)([^\"'<>]*)\\1](.*)\[\/theme\]/sU";
$rep[] = '<a href="books.php?book=\2">\\3</a>';
$patt[] = "/\[catego:(['\"]?)([^\"'<>]*)\\1](.*)\[\/catego\]/sU";
$rep[] = '<a href="sections.php?section=\2">\\3</a>';
$texto = preg_replace($patt, $rep, $texto);
$texto = eregi_replace("coffee checker","<a href='http://www.redmexico.com.mx/modules/coffee'>Coffee Checker</a>",$texto);

$xoopsTpl->assign('back_sections', "<a href='index.php'>"._RH_BOOKS_BACK."</a>");
$xoopsTpl->assign('back_books', "<a href='sections.php?section=$cid'>"._RH_BOOKS_BACKBOOKS."</a>");
$xoopsTpl->assign('back_content', "<a href='books.php?book=$tid'>"._RH_CONTENT_BACKINDEX."</a>");
$xoopsTpl->assign('indice', $nindice);
$xoopsTpl->assign('contenido', $texto);
$xoopsTpl->assign('lecturas', $lecturas);
$xoopsTpl->assign('lang_lecturas', _RH_RMLIB_READ);
$xoopsTpl->assign('lang_published', sprintf(_RH_CONTENT_PUBLISHED, date("d/m/Y", $fecha)));
$xoopsTpl->assign('lang_back', _RH_CONTENT_BACK);
$xoopsTpl->assign('lang_next', _RH_CONTENT_NEXT);
$xoopsTpl->assign('lang_comments', _RH_CONTENT_COMMENTS);
$xoopsTpl->assign('link_book', "books.php?book=$tid");
$xoopsTpl->assign('comment_num', $com);
$xoopsTpl->assign('lib_name', $xoopsModuleConfig['libname']);

// Comprobamos si el usuario es un autor de este libro
if ($xoopsUser){
	$num = $xoopsDB->getRowsNum($xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_users")." WHERE iduser='".$xoopsUser->getvar('uid')."' AND idbook='$tid'"));
	if ($num>0 || $xoopsUser->isAdmin()){
		$is_author = true;
		$xoopsTpl->assign('is_author', 1);
	}
}

if (!$is_author) { $xoopsDB->queryF("UPDATE ".$xoopsDB->prefix("rmlib_indice")." SET lecturas=lecturas+1 WHERE iid='$id'"); }

include XOOPS_ROOT_PATH.'/include/comment_view.php';
include XOOPS_ROOT_PATH."/footer.php";
?>