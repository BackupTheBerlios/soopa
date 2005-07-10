<?php
// $Id: print.php,v 1.1 2005/07/10 02:32:17 mauriciodelima Exp $
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

$myts =& MyTextSanitizer::getInstance();

list($coid,$index,$texto,$fecha,$com,$author) = $xoopsDB->fetchRow($xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_contenido")." WHERE `index` = '$id'"));
list($nindice,$tid, $lecturas)= $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo, tema, lecturas FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE iid = '$id'"));
list($ntema,$cid)= $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo, catego FROM ".$xoopsDB->prefix("rmlib_temas")." WHERE tid = '$tid'"));

if (!$xoopsUser){
	$xoopsUser =& $member_handler->getUser($author);
	$author = $xoopsUser->getUnameFromId($author);
	$xoopsUser = '';
} else {
	$author = $xoopsUser->getUnameFromId($author);
}

if ($xoopsModuleConfig['xoopscode'] == 1){
	$texto = $myts->makeTareaData4Show($texto);
}

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">';
echo '<html><head>';
echo '<meta http-equiv="Content-Type" content="text/html; charset='._CHARSET.'" />';
echo '<title>'.$xoopsConfig['sitename'].'</title>';
echo '<meta name="AUTHOR" content="'.$xoopsConfig['sitename'].'" />';
echo '<meta name="COPYRIGHT" content="Copyright (c) 2001 by '.$xoopsConfig['sitename'].'" />';
echo '<meta name="DESCRIPTION" content="'.$xoopsConfig['slogan'].'" />';
echo '<meta name="GENERATOR" content="'.XOOPS_VERSION.'" />';
echo '<body bgcolor="#ffffff" text="#000000" onload="window.print()" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px;">
		<table width="640" cellspacing="1" border="0" bgcolor="#000000" cellpadding="0">
		<tr><td>
		<table width="640" border="0" cellspacing="0" cellpadding="20" bgcolor="#FFFFFF" style="font-size: 12px;">
		<tr><td align="center">
		<img src="'.XOOPS_URL.'/images/logo.gif" border="0" alt="" /><br /><br />
    	<h3>'.$nindice.'</h3>
    	<small><b>Fecha:</b>&nbsp;'.$fecha.' | <b>Libro:</b>&nbsp;'.$ntema.'</small><br /><br /></td></tr>';
echo "<tr><td align='left'>\n
		$texto
	  </tr></td></table></td></tr></table>";
echo '<br><br>Este texto proviene de: <strong>'.$xoopsConfig['sitename'].'</strong><br>
		URL: <a href="'.XOOPS_URL.'/">'.XOOPS_URL.'</a>';

echo '</body></html>';

?>