<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: submit.php,v 1.2 2005/08/02 05:41:21 mauriciodelima Exp $                  //
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

$rmdp_location = 'submit';
include ('header.php');

/**
* Comprobamos que este habilitado el envio de descargas
**/
if (!$xoopsModuleConfig['downsend']){
	redirect_header('index.php', 1, _RMDP_SUBMIT_INACTIVE);
	die();
}

/**
* Comprobamos si el usuario es anónimo y si tiene
* permitido el envio de descargas
**/
$anon = $xoopsModuleconfig['sendanonimo'];
if ($xoopsUser=='' && $anon==0){
	redirect_header(XOOPS_URL.'/user.php?xoops_redirect='.parse_url($_SERVER['PHP_SELF']), 1, _RMDP_REGISTER_FORSUBMIT);
	die();
}

// Elegimos que hacer
$op = isset($_POST['op']) ? $_POST['op'] : '';

include 'include/rmdp_functions.php';
include 'include/rmdp_downs.php';

if ($op=='send'){
	/**
	* Guardamos las descargas
	**/
	foreach($_POST as $key => $value){
		$$key = $value;
		if ($urlparam==''){
			$urlparam .= "$key=$value";
		} else {
			$urlparam .= "&amp;$key=$value";
		}
	}
	/**
	* Seleccionamos la plataformas
	**/
	foreach ($os as $key){
		$plataforma .= $key."|";
	}
	if ($plataforma != ''){
		$plataforma = substr($plataforma, 0, strlen($plataforma) - 1);
	}
	/**
	* Comprobamos que los datos sean correctos
	**/
	if ($nombre=='' || $version=='' || $licencia<=0 || $archivo=='' || $catego<=0 || $desc==''
		|| $size<=0 || $plataforma==''){
		redirect_header('submit.php?'.$urlparam, 1, _RMDP_PLEASE_FILL);
		die();
	}
	/**
	* Comprobamos que no exista una descarga con el mismo nombre
	**/
	if (rmdp_check_download_name($nombre, 'save')){
		redirect_header('submit.php?'.$urlparam, 1, _RMDP_NAME_EXIST);
		die();
	}
	/**
	* Obtenmos quien envía
	**/
	if ($xoopsUser!=''){
		$submitter = $xoopsUser->getVar('uid');
	} else {
		$submitter = 0;
	}
	/**
	* guardamos los datos de la descarga
	**/
	$sql = "INSERT INTO ".$xoopsDB->prefix('rmdp_sended')." (`nombre`,`version`,`licencia`,
		`archivo`,`img`,`id_cat`,`longdesc`,`size`,`urltitle`,`url`,`submitter`,`plataformas`,
		`fecha`,`anonimo`) VALUES ('$nombre','$version','$licencia','$archivo','$img','$catego','$desc',
		'$size','$web','$url','$submitter','$plataforma','".time()."','$anonimo')";
	$xoopsDB->query($sql);
	$err = $xoopsDB->error();
	
	if ($err==''){
		$xoopsMailer =& getMailer();
		$xoopsMailer->useMail();
		$xoopsMailer->setToEmails($xoopsConfig['adminmail']);
		$xoopsMailer->setFromEmail($xoopsConfig['from']);
		$xoopsMailer->setFromName($xoopsConfig['sitename']." - ".$xoopsModuleConfig['rmdptitle']);
		$xoopsMailer->setSubject(_RMDP_MAIL_SUBJECT);
		$xoopsMailer->setBody(sprintf(_RMDP_MAIL_BODY, XOOPS_URL."/modules/rmdp/admin/sended.php"));
		$xoopsMailer->send();
		redirect_header('mysends.php', 1, _RMDP_SENDOK);
		die();
	} else {
		redirect_header('submit.php?'.$urlparam, 1, _RMDP_SENDFAIL);
		die();
	}
	
} else {
	
	rmdp_make_searchnav();
	// Cargmos las licencias
	rmdp_licence_list();
	// Cargamos los sistemas operativos
	rmdp_plataforms_list();
	
	$xoopsOption['template_main'] = 'rmdp_submit.html';
	$xoopsTpl->assign('submit_title', _RMDP_FORM_TITLE);
	$xoopsTpl->assign('lang_nombre', _RMDP_FNAME);
	$xoopsTpl->assign('lang_version', _RMDP_FVERSION);
	$xoopsTpl->assign('lang_licencia', _RMDP_FLIC);
	$xoopsTpl->assign('lang_archivo', _RMDP_FFILE);
	$xoopsTpl->assign('lang_img', _RMDP_FIMAGE);
	$xoopsTpl->assign('lang_imgtip', sprintf(_RMDP_FIMAGETIP, $xoopsModuleConfig['imgdownw']));
	$xoopsTpl->assign('lang_catego', _RMDP_FCATEGO);
	$xoopsTpl->assign('lang_desc', _RMDP_FDESC);
	$xoopsTpl->assign('lang_desctip', _RMDP_FDESCTIP);
	$xoopsTpl->assign('lang_size', _RMDP_FSIZE);
	$xoopsTpl->assign('lang_anonimo', _RMDP_FANONIM);
	$xoopsTpl->assign('lang_web', _RMDP_FWEB);
	$xoopsTpl->assign('lang_url', _RMDP_FURL);
	$xoopsTpl->assign('lang_send', _RMDP_SEND);
	$xoopsTpl->assign('lang_yes', _RMDP_YES);
	$xoopsTpl->assign('lang_no', _RMDP_NO);
	$xoopsTpl->assign('lang_info', sprintf(_RMDP_SUBMIT_INFO, $xoopsConfig['sitename']));
	$xoopsTpl->assign('lang_info2', _RMDP_SUBMIT_INFO2);
	$xoopsTpl->assign('lang_os', _RMDP_OSS);
	
	// Cadenas de errores
	$xoopsTpl->assign('lang_errores_happen', _RMDP_ERRORS_HAPPEND);
	$xoopsTpl->assign('lang_mustbe_num', _RMDP_MUSTBE_NUM);
	$xoopsTpl->assign('lang_is_empty', _RMDP_IS_EMPTY);
	
	// Cargamos los valores de url si estamos regresando por un error
	foreach ($_GET as $key => $value){
		$xoopsTpl->assign('param_'.$key, $value); 
	}
	
	// Creamos el editor para la descripción
	include_once XOOPS_ROOT_PATH."/include/xoopscodes.php";
	ob_start();
	$GLOBALS['desc'] = isset($_GET['desc']) ? $_GET['desc'] : '';
	xoopsCodeTarea("desc",37,8);
	$xoopsTpl->assign('xoops_codes', ob_get_contents());
	ob_end_clean();
	ob_start();
	xoopsSmilies("desc");
	$xoopsTpl->assign('xoops_smilies', ob_get_contents());
	ob_end_clean();
}

include 'footer.php';
?>
