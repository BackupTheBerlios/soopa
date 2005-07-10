<?
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

if ($book <= 0){
	header("location: index.php");
	die();
}

include("../../mainfile.php");
include XOOPS_ROOT_PATH."/header.php";
$myts =& MyTextSanitizer::getInstance();
$xoopsOption['template_main'] = 'rmlib_books.html'; //Plantilla para esta página
$tab = 0;

function GetSubIndex($id){
	global $xoopsDB, $xoopsTpl, $tab;

	$tab += 20;
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE parent = '$id' ORDER BY orden");
	while (list($iid,$titulo,$tema,$parent,$orden,$fecha) = $xoopsDB->fetchRow($result)){
		list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE parent = '$iid'"));
		if ($num>0){ $imagen = 0; } else { $imagen = 1; }
		$xoopsTpl->append('indices',array('id'=>$iid,'titulo'=>$titulo,'fecha'=>date("d/m/Y",$fecha),'imagen'=>$imagen, 'link'=>'content.php?index='.$iid,'tabs'=>$tab));
		GetSubIndex($iid);
	}
	$tab -= 20;
}

//Incrementamos las lecturas
$xoopsDB->queryF("UPDATE ".$xoopsDB->prefix("rmlib_temas")." SET lecturas=lecturas+1 WHERE tid='$book'");
// Obtenemos el nombre del tema
list($ntema, $cid, $lecturas) = $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo, catego, lecturas FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE tid = '$book'"));

// Obtenemos el nombre de la sección
list($ncatego) = $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo FROM ".$xoopsDB->prefix("rmlib_categos")." WHERE cid = '$cid'"));

$xoopsTpl->assign('categoria',$ncatego);
$xoopsTpl->assign('libro',$ntema);

$xoopsTpl->assign('back_sections',"<a href='index.php'>"._RH_BOOKS_BACK."</a>");
$xoopsTpl->assign('back_books',"<a href='sections.php?section=$cid'>"._RH_BOOKS_BACKBOOKS."</a>");
$xoopsTpl->assign('lang_content', _RH_CONTENT_NAME);
$xoopsTpl->assign('lang_withsub', _RH_CONTENT_WITHSUB);
$xoopsTpl->assign('lang_withoutsub', _RH_CONTENT_WITHOUTSUB);
$xoopsTpl->assign('lib_title', $xoopsModuleConfig['libname']);

$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE tema = '$book' AND parent = '0' ORDER BY orden");
$num = $xoopsDB->getRowsNum($result);

while (list($iid,$titulo,$tema,$parent,$orden,$fecha) = $xoopsDB->fetchRow($result)){
	$xoopsTpl->append('indices',array('id'=>$iid,'titulo'=>$titulo,'fecha'=>date("d/m/Y",$fecha),'imagen'=>0,'link'=>'content.php?index='.$iid,'tabs'=>0));
	GetSubIndex($iid, $xoopsTpl);
}

$xoopsTpl->assign("lang_thereare", sprintf(_RH_CONTENT_THEREARE, $num, $ntema));

include XOOPS_ROOT_PATH."/footer.php";
?>