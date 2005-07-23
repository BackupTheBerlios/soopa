<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: mysends.php,v 1.1 2005/07/23 16:52:00 mauriciodelima Exp $                 //
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

$rmdp_location = 'mysends';
include 'header.php';

if ($xoopsUser==''){
	redirect_header(XOOPS_URL."/user.php?xoops_redirect=".parse_url($_SERVER['PHP_SELF']), 1, _RMDP_FIRST_LOGIN);
	die();
}

/**
* Seleccionamos la opcion
**/
$op = isset($_GET['op']) ? $_GET['op'] : '';
if ($op==''){
	$op = isset($_POST['op']) ? $_POST['op'] : '';
}

include('include/rmdp_functions.php');
include 'include/rmdp_downs.php'; // Archivo para manejo de descargas

if ($op==''){
	/**
	* Seleccionamos las descargas del usuario actual
	**/
	if ($xoopsUserIsAdmin){
		$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_software')." WHERE submitter='".$xoopsUser->getVar('uid')."' OR submitter='0' ORDER BY nombre");
	} else {
		$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_software')." WHERE submitter='".$xoopsUser->getVar('uid')."' ORDER BY nombre");
	}
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){
		redirect_header('index.php', 1, _RMDP_NOHAVE_DOWNS);
		die();
	}
	$xoopsOption['template_main'] = 'rmdp_show_sends.html';
	// Ubicación
	$location_bar = '<a href="index.php">'.$xoopsModuleConfig['rmdptitle'].'</a> &gt;
		<a href="mysends.php">'._RMDP_MY_SENDS.'</a>';
	$xoopsTpl->assign('location_bar', $location_bar);
	rmdp_make_searchnav();
	
	while($row=$xoopsDB->fetchArray($result)){
		$xoopsTpl->append('downloads', array('id'=>$row['id_soft'],'nombre'=>$row['nombre'],
		'desc'=>$myts->MakeTareaData4Show(substr($row['longdesc'], 0, 60)),
		'fecha'=>date($xoopsModuleConfig['dateformat'], $row['fecha']),
		'descargas'=>$row['descargas']));
	}
	
	$xoopsTpl->assign('lang_mydowns', _RMDP_MY_SENDS);
	$xoopsTpl->assign('lang_modify', _RMDP_MODIFY_DOWN);
	$xoopsTpl->assign('lang_name', _RMDP_NAME_DOWN);
	$xoopsTpl->assign('lang_date', _RMDP_DATE_DOWN);
	$xoopsTpl->assign('lang_downs', _RMDP_DOWNS_DOWN);
	$xoopsTpl->assign('lang_options', _RMDP_OPTIONS_DOWN);
	$xoopsTpl->assign('lang_shots', _RMDP_SEND_SHOTS);
	
} elseif ($op=='modify'){

	/**
	* Comprobamos que se haya especificado un id de descarga
	* de lo contarios regresamos
	**/
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	if ($id<=0){
		header('location: mysends.php'); die();
	}
	
	$soft = rmdp_get_download_data($id);
	if (!$soft){
		redirect_header('mysends.php', 1, _RMDP_ERR_NOTFOUND);
		die();
	}
	
	/**
	* Comprobamos que el usuario actual sea el publicador
	* del archivo seleccionado
	**/
	if ($soft['submitter']!=$xoopsUser->getVar('uid')){
		redirect_header('mysends.php', 1, _RMDP_NOT_OWNER);
		die();
	}
	
	/**
	* Si todas las comprobaciones son correctas asignamos variables
	**/
	$xoopsOption['template_main'] = 'rmdp_modify_submit.html';
	foreach($soft as $key => $value){
		$xoopsTpl->assign('param_'.$key, $value);
	}
	
	rmdp_make_searchnav();
	// Cargmos las licencias
	rmdp_licence_list();
	// Cargamos los sistemas operativos
	rmdp_plataforms_list();
	
	// Creamos el editor para la descripción
	include_once XOOPS_ROOT_PATH."/include/xoopscodes.php";
	ob_start();
	$GLOBALS['desc'] = $soft['longdesc'];
	xoopsCodeTarea("desc",37,8);
	$xoopsTpl->assign('xoops_codes', ob_get_contents());
	ob_end_clean();
	ob_start();
	xoopsSmilies("desc");
	$xoopsTpl->assign('xoops_smilies', ob_get_contents());
	ob_end_clean();
	
	$xoopsTpl->assign('modify_title', _RMDP_FORM_TITLE);
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
	$xoopsTpl->assign('lang_os', _RMDP_OSS);
	$xoopsTpl->assign('lang_info', _RMDP_SUBMIT_INFO);

} elseif ($op=='send'){

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

	if ($id<=0){ header('location: mysends.php'); die(); }
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
		redirect_header('mysends.php?op=modify&amp;id='.$id, 1, _RMDP_PLEASE_FILL);
		die();
	}
	/**
	* Comprobamos que el usuario actual sea el publicador
	* del archivo seleccionado
	**/
	$soft = rmdp_get_download_data($id);
	if (!$soft){
		redirect_header('mysends.php', 1, _RMDP_ERR_NOTFOUND);
		die();
	}
	if ($soft['submitter']!=$xoopsUser->getVar('uid')){
		redirect_header('mysends.php', 1, _RMDP_NOT_OWNER);
		die();
	}
	/**
	* Comprobamos que no exista una descarga con el mismo nombre
	**/
	if (rmdp_check_download_name($nombre, 'mod', $id)){
		redirect_header('mysends.php?op=modify&amp;id='.$id, 1, _RMDP_NAME_EXIST);
		die();
	}
	/**
	* guardamos los datos de la descarga
	**/
	$sql = "INSERT INTO ".$xoopsDB->prefix('rmdp_sended')." (`nombre`,`version`,`licencia`,
		`archivo`,`img`,`id_cat`,`longdesc`,`size`,`urltitle`,`url`,`submitter`,`plataformas`,
		`fecha`,`anonimo`,`modify`,`ids`) VALUES ('$nombre','$version','$licencia','$archivo','$img','$catego','$desc',
		'$size','$web','$url','".$xoopsUser->getVar('uid')."','$plataforma','".time()."','$anonimo','1','$id')";
	$xoopsDB->query($sql);
	$err = $xoopsDB->error();
	
	if ($err==''){
		$xoopsMailer =& getMailer();
		$xoopsMailer->useMail();
		$xoopsMailer->setToEmails($xoopsConfig['adminmail']);
		$xoopsMailer->setFromEmail($xoopsConfig['from']);
		$xoopsMailer->setFromName($xoopsConfig['sitename']." - ".$xoopsModuleConfig['rmdptitle']);
		$xoopsMailer->setSubject(_RMDP_MAIL_SUBJECT);
		$xoopsMailer->setBody(sprintf(_RMDP_MAIL_BODY, XOOPS_URL."/modules/rmdp/admin/modified.php"));
		$xoopsMailer->send();
		redirect_header('mysends.php', 1, _RMDP_SENDOK);
		die();
	} else {
		redirect_header('mysends.php?op=modify&amp;id='.$id, 1, _RMDP_SENDFAIL);
		die();
	}

} elseif ($op=='shots' || $op=='editshot'){

	/**
	* Mostramos la lista y el formulario para agregar nuevas Pantallas
	**/
	/**
	* Comprobamos que el usuario actual sea el publicador
	* del archivo seleccionado
	**/
	$soft = rmdp_get_download_data($id);
	if (!$soft){
		redirect_header('mysends.php', 1, _RMDP_ERR_NOTFOUND);
		die();
	}
	if ($soft['submitter']!=$xoopsUser->getVar('uid')){
		redirect_header('mysends.php', 1, _RMDP_NOT_OWNER);
		die();
	}
	
	$xoopsOption['template_main'] = 'rmdp_send_shots.html';
	$shot = isset($_GET['shot']) ? $_GET['shot'] : 0;
	/**
	* Cargamos la lista de pantallas existentes
	**/
	$shotsnum = rmdp_get_shots_list($id);
	if ($shotsnum >= $xoopsModuleConfig['shotlimit']){
		$xoopsTpl->assign('shotlimit', true);
		$shot = 0;
	}
	// Barra de búsqueda
	rmdp_make_searchnav();
	
	if ($op=='editshot' && $shot>0){
		$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_shots')." WHERE id_shot='$shot'");
		$num = $xoopsDB->getRowsNum($result);
		if ($num>0){
			$row = $xoopsDB->fetchArray($result);
			$xoopsTpl->assign('edit_small', $row['small']);
			$xoopsTpl->assign('edit_big', $row['big']);
			$xoopsTpl->assign('edit_text', $row['text']);
			$xoopsTpl->assign('edit_shot', $row['id_shot']);
		}
		$xoopsTpl->assign('lang_newshot', _RMDP_MOD_SHOT);
		$xoopsTpl->assign('action', 'savemodshot');
	} else {
		$xoopsTpl->assign('lang_newshot', _RMDP_NEW_SHOT);
		$xoopsTpl->assign('action', 'addshot');
	}
	
	// Varlores para el formato de la imágen
	$xoopsTpl->assign('img_width', $xoopsModuleConfig['imgshotsw']);
	$xoopsTpl->assign('lang_downshot', sprintf(_RMDP_SHOTS_TITLE, $soft['nombre']));
	$xoopsTpl->assign('lang_hits', _RMDP_SEND_HITS);
	$xoopsTpl->assign('lang_date', _RMDP_SEND_DATE);
	$xoopsTpl->assign('lang_small', _RMDP_NEW_SMALLIMG);
	$xoopsTpl->assign('lang_big', _RMDP_NEW_BIGIMG);
	$xoopsTpl->assign('lang_text', _RMDP_NEW_TEXT);
	$xoopsTpl->assign('lang_send', _RMDP_NEW_SEND);
	$xoopsTpl->assign('lang_modify', _RMDP_MODIFY_DOWN);
	$xoopsTpl->assign('lang_delete', _RMDP_DELETE_DOWN);
	$xoopsTpl->assign('soft_id', $id);

} elseif ($op=='addshot'){

	/**
	* Guardamos una nueva pantalla
	**/
	$small = isset($_POST['small']) ? $_POST['small'] : '';
	$big = isset($_POST['big']) ? $_POST['big'] : '';
	$text = isset($_POST['text']) ? $_POST['text'] : '';
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	
	if ($id<=0){ header('location: mysends.php'); die(); }
	
	if ($small == '' || $big==''){
		redirect_header('mysends.php?op=shots&amp;id='.$id, 1, _RMDP_ERR_IMAGES);
		die();
	}
	
	$soft = rmdp_get_download_data($id);
	
	if (!$soft){
		redirect_header('mysends.php', 1, _RMDP_ERR_NOTFOUND);
		die();
	}
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmdp_shots')." WHERE id_soft='$id'"));
	if ($num >= $xoopsModuleConfig['shotlimit']){
		redirect_header('mysends.php', 1, _RMDP_SHOT_LIMIT);
		die();
	}
	
	$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix('rmdp_shots')." (`id_soft`,`small`,`big`,`text`,`fecha`,`hits`)
		VALUES ('$id','$small','$big','$text','".time()."','0')");
	redirect_header('mysends.php?op=shots&amp;id='.$id,1,'');

} elseif ($op=='savemodshot'){
	
	/**
	* Guardamos los cambios hechos a una pantalla
	**/
	$small = isset($_POST['small']) ? $_POST['small'] : '';
	$big = isset($_POST['big']) ? $_POST['big'] : '';
	$text = isset($_POST['text']) ? $_POST['text'] : '';
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$shot = isset($_POST['shot']) ? $_POST['shot'] : '';
	
	// Si no se ha especificado la descarga
	if ($id<=0){ header('location: mysends.php'); die(); }
	// Si no se ha especificado la pantalla
	if ($shot<=0){ header('location: mysends.php?op=shots&id='.$id); die(); }
	//Comprobamos que se hayan especificado las urls
	if ($small == '' || $big==''){
		redirect_header('mysends.php?op=editshot&amp;&amp;shot='.$shot.'&amp;id='.$id, 1, _RMDP_ERR_IMAGES);
		die();
	}
	// Comprobamos que exista la descarga
	$soft = rmdp_get_download_data($id);
	if (!$soft){
		redirect_header('mysends.php', 1, _RMDP_ERR_NOTFOUND);
		die();
	}
	$xoopsDB->query("UPDATE  ".$xoopsDB->prefix('rmdp_shots')." SET `small`='$small',`big`='$big',`text`='$text',
	`fecha`='".time()."' WHERE id_shot='$shot'");
	redirect_header('mysends.php?op=shots&amp;id='.$id,1,'');
}

include 'footer.php';
?>
