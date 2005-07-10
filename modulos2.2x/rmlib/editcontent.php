<?php
// $Id: editcontent.php,v 1.1 2005/07/10 02:32:17 mauriciodelima Exp $
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

include("../../mainfile.php");

if (!file_exists("language/".$xoopsConfig['language']."/main.php") ) {
	include "language/spanish/main.php";
}

$action = $_POST['action'];

if ($action=="save"){
	$myts =& MyTextSanitizer::getInstance();
	$contenido = $myts->makeTareaData4Save($contenido);
	$result = $xoopsDB->query("SELECT coid FROM ".$xoopsDB->prefix("rmlib_contenido")." WHERE `index`='$index' ;");
	$num = $xoopsDB->getRowsNum($result);
	if ($num>0){
		$xoopsDB->query("UPDATE ".$xoopsDB->prefix("rmlib_contenido")." SET `texto`='$contenido',`fecha`='".time()."',`iduser`='".$xoopsUser->getvar('uid')."' WHERE `index`='$index';");
	} else {
		$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("rmlib_contenido")." (`index`,`texto`,`fecha`,`com`,`iduser`) VALUES ('$index','$contenido','".time()."','0','".$xoopsUser->getvar('uid')."') ;");
	}
	redirect_header('content.php?index='.$index, 1, _RH_RMLIB_CONTENTSUCESS);
} else {
	$xoopsOption['template_main'] = 'rmlib_editcontent.html'; //Plantilla para esta página

	include XOOPS_ROOT_PATH."/header.php";
	include_once XOOPS_ROOT_PATH."/include/xoopscodes.php";

	$myts =& MyTextSanitizer::getInstance();

	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_contenido")." WHERE `index`='$index'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num > 0){ list($coid,$index,$texto,$fecha,$com,$author) = $xoopsDB->fetchRow($result); }
	list($nindice,$tid, $lecturas)= $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo, tema, lecturas FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE iid = '$index'"));
	list($ntema,$cid)= $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo, catego FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE tid = '$tid'"));
	
	$GLOBALS['contenido'] = $texto;
	ob_start();
	xoopsCodeTarea("contenido",37,8);
	$xoopsTpl->assign('xoops_codes', ob_get_contents());
	ob_end_clean();
	ob_start();
	xoopsSmilies("contenido");
	$xoopsTpl->assign('xoops_smilies', ob_get_contents());
	ob_end_clean();
	
	// Comprobamos si el usuario es un autor de este libro
	$num = $xoopsDB->getRowsNum($xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_users")." WHERE iduser='".$xoopsUser->getvar('uid')."' AND idbook='$tid'"));
	if ($num<=0 && !$xoopsUser->isAdmin()){
		header("location: content.php?index=$index");
		die();
	}
	
	$xoopsTpl->assign('lang_edit', _RH_RMLIB_EDITCONTENT);
	$xoopsTpl->assign('lang_book', _RH_BOOKS_BOOK);
	$xoopsTpl->assign('lang_title', _RH_RMLIB_INDEXTITLE);
	$xoopsTpl->assign('lang_content', _RH_RMLIB_INDEXCONTENT);
	$xoopsTpl->assign('book_title', $ntema);
	$xoopsTpl->assign('index_title', $nindice);
	$xoopsTpl->assign('data_extra', '<input type="hidden" name="index" value="'.$index.'"><input type="hidden" name="action" value="save">');
	include XOOPS_ROOT_PATH."/footer.php";
}
?>