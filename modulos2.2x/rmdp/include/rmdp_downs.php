<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: rmdp_downs.php,v 1.1 2005/07/23 16:52:00 mauriciodelima Exp $              //
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


/**
 * Obtiene todos los datos de una descarga
 * Parámetros
 * @ids = Id de la descarga
 * @return = Datos de la descarga
 */
function rmdp_load_downdata($ids){
	global $xoopsDB, $xoopsModuleConfig, $xoopsTpl, $myts, $xoopsConfig;
	global $cid, $xoopsUser, $xoopsUserIsAdmin;
	
	if ($ids<=0){ return; }
	$tbls = $xoopsDB->prefix('rmdp_software');
	$result = $xoopsDB->query("SELECT * FROM $tbls WHERE id_soft='$ids'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){ return; }
   /**
	* Calulamos el indice del rating
	*/
	$rate = rmdp_set_rating();
	$row = $xoopsDB->fetchArray($result);
   /**
	* formatemos la fecha en base a las preferencias
	* del módulo
	*/
	$fecha = date($xoopsModuleConfig['dateformat'], $row['fecha']);
	/**
	 * Comprobamos si la descarga es nueva
	 * o si ha sido actualizada
	 */
	$isnew = rmdp_element_isnew($row['fecha'], $xoopsModuleConfig['downnew']);
	$isupdate = rmdp_element_isnew($row['update'], $xoopsModuleConfig['update_days']);
	/**
	 * Obtenmos el nombre del publicador
	 */
	$uname = rmdp_get_username($row['submitter']);
	$cid = $row['reviews'];
	$xoopsTpl->assign('download', array('id'=>$row['id_soft'], 'nombre'=>$row['nombre'],
		'fecha'=>$fecha,'isnew'=>$isnew,'isupdate'=>$isupdate,'licence'=>rmdp_get_licencelink($row['licencia']),
		'os'=>rmdp_get_downos($row['id_soft']),'shots'=>rmdp_get_shotsnum($row['id_soft']),
		'size'=>rmdp_convert_size($row['size']), 'rating'=>rmdp_calculate_rating($row['rating'], $rate),
		'calificacion'=>$row['calificacion'],'descargas'=>$row['descargas'],
		'url'=>$row['url'],'homepage'=>$row['urltitle'],'uname'=>$uname,
		'submitter'=>$row['submitter'],'ispopular'=>rmdp_is_popular($row['descargas']),
		'desc'=>$myts->MakeTareaData4Show($row['longdesc']),'img'=>$row['img'],
		'editor'=>rmdp_get_editor_review($row['id_soft'])));
	
	$xoopsTpl->assign('lng_downloads',_RMDP_DOWNLOADS);
	$xoopsTpl->assign('lng_web_site',_RMDP_WEB_SITE);
	$xoopsTpl->assign('lng_date',_RMDP_DATE);
	$xoopsTpl->assign('lng_isnew',_RMDP_NEW_DOWN);
	$xoopsTpl->assign('lng_isupdate',_RMDP_UPDATE_DOWN);
	$xoopsTpl->assign('lng_licence',_RMDP_LICENCE);
	$xoopsTpl->assign('lng_os',_RMDP_OS);
	$xoopsTpl->assign('lng_screenshot',_RMDP_SCREEN_SHOT);
	$xoopsTpl->assign('lng_sendby',_RMDP_SEND_BY);
	$xoopsTpl->assign('lng_viewshots', _RMDP_VIEW_SHOT);
	$xoopsTpl->assign('lng_rating',_RMDP_USER_RATING);
	$xoopsTpl->assign('lng_vote',_RMDP_VOTE);
	$xoopsTpl->assign('lng_our_rating',_RMDP_OUR_RATING);
	$xoopsTpl->assign('lng_filesize',_RMDP_SIZE);
	$xoopsTpl->assign('lng_usercomments',_RMDP_USER_COMMENTS);
	$xoopsTpl->assign('lng_editorcom', sprintf(_RMDP_EDITOR_COM, $xoopsConfig['sitename']));
	$xoopsTpl->assign('lng_publisher_desc', sprintf(_RMDP_PUBLISHER_DESC, $uname));
	
	if ($xoopsUser=='' && $xoopsModuleConfig['uservote']){
		/**
		 * El usuario anónimo puede votar
		 */
		$xoopsTpl->assign('vote_form', rmdp_make_voteform($row['id_soft']));
		
	} elseif ($xoopsUser){
		/**
		 * Si el usuario esta registrado y no es el publicador
		 * entonces mostramos las opciones de voto
		 */
		if ($xoopsUser->getvar('uid')!=$row['submitter']) { $xoopsTpl->assign('vote_form', rmdp_make_voteform($row['id_soft'])); }
		
		/**
		 * Si el usuario es el administrador mostramos
		 * Opciones administrativas
		 */
		if ($xoopsUserIsAdmin){
			$adminoptions = "<div align='center'>
				<a href='admin/downs.php?op=mod&amp;ids=".$row['id_soft']."'><img src='images/edit.gif' border='0'></a>
				<a href='admin/downs.php?op=review&amp;ids=".$row['id_soft']."'><img src='images/review.gif' border='0'></a>
				</div>";

			$xoopsTpl->assign('admin_options', $adminoptions);
		}
		/**
		* Opcion para reportar un enlace roto
		**/
		$useroptions = "<br><div align='center'><a href='broken.php?id=$row[id_soft]'><img src='images/report.gif' border='0' alt='"._RMDP_REPORT_BROKEN."'></a>&nbsp;&nbsp;";
		/**
		 * Si el usuario es el publicador de la descarga
		 * Mostramos opciones administrativas del usuario
		 */
		 
		if ($xoopsUser->getvar('uid')==$row['submitter']){
			$xoopsTpl->assign('is_Submitter', true);
			$useroptions .= "<a href='mysends.php?op=modify&amp;id=".$row['id_soft']."'><img src='images/edit.gif' border='0'></a>";
		}
		$useroptions .= "</div>";
		$xoopsTpl->assign('user_options', $useroptions);
	}
	
	
}

/**
 * Devuelve el número de pantallas de una descarga
 */
function rmdp_get_shotsnum($ids){
	global $xoopsDB;
	
	if ($ids<=0){ return 0; }
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmdp_shots")." WHERE id_soft='$ids'"));
	
	return $num;
}

/**
 * Determina si una descarga es popular
 * Parametros
 * @downs = número de descargas
 */
function rmdp_is_popular($downs){
	global $xoopsModuleConfig;
	
	if ($downs >= $xoopsModuleConfig['popular_needs']){
		return 1;
	} else {
		return 0;
	}
}

/**
 * Devuelve el comentario completo de los editores
 * Parámetros
 * @ids = Id del programa
 */
function rmdp_get_editor_review($ids){
	global $xoopsDB, $myts;
	
	if ($ids<=0) { return; }
	$tbler = $xoopsDB->prefix('rmdp_editorcom');
	$result = $xoopsDB->query("SELECT text FROM $tbler WHERE id_soft='$ids'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){ return; }
	$row = $xoopsDB->fetchArray($result);
	
	$rtn = $myts->MakeTareaData4Show($row['text']);
	return $rtn;
	
}

/**
 * Crea el formulario para votar por un recurso
 * Parámetros
 * @ids = Id del programa
 */
function rmdp_make_voteform($ids){
	if ($ids<=0) { return; }
	
	$rtn = "<br /><br /><div align='center'><strong>"._RMDP_VOTE."</strong><br /><hr />
			 <a href='vote.php?id=".$ids."&amp;rate=1'><img src='images/starvote.gif' border='0'></a>
			 <a href='vote.php?id=".$ids."&amp;rate=2'><img src='images/starvote.gif' border='0'></a>
			 <a href='vote.php?id=".$ids."&amp;rate=3'><img src='images/starvote.gif' border='0'></a>
			 <a href='vote.php?id=".$ids."&amp;rate=4'><img src='images/starvote.gif' border='0'></a>
			 <a href='vote.php?id=".$ids."&amp;rate=5'><img src='images/starvote.gif' border='0'></a>
			 </div>";
	return $rtn;
}

/**
* Devuelve un array con los datos de una descarga
* @ids = Id de descarga
* @return = array con los datos, false si no se encuentra
**/
function rmdp_get_download_data($ids){
	global $xoopsDB;
	
	if ($ids<=0){ return false; }
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmdp_software")." WHERE id_soft='$ids'");
	if ($xoopsDB->getRowsNum($result)<=0){ return false; }
	$row = $xoopsDB->fetchArray($result);
	return $row;
}

/**
* Comprueba que no exista una descarga repetida
* Parámetros
* @nombre = Nombre de la descarga a comprobar
* @action = "mod" o "save"
* @ids = solo util si $action = "mod"
* @return = true, existe. false, no existe
**/
function rmdp_check_download_name($nombre, $action = 'save', $ids = 0){
	global $xoopsDB;
	
	if ($action=='save'){
		list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmdp_software')." WHERE nombre='$nombre'"));
		if ($num>0){ return true; } else { return false; }
	} else {
		list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmdp_software')." WHERE nombre='$nombre' AND id_soft<>'$ids'"));
		if ($num>0){ return true; } else { return false; }
	}
}


/**
* Obtiene todas las pantallas de un programa
**/
function rmdp_get_shots_list($ids){
	global $xoopsDB, $xoopsTpl, $xoopsModuleConfig;
	
	if ($ids<=0) { return 0; }
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_shots')." WHERE id_soft='$ids'");
	while ($row = $xoopsDB->fetchArray($result)){
		$xoopsTpl->append('shots', array('id'=>$row['id_shot'],'small'=>$row['small'],
		'big'=>$row['big'],'text'=>$row['text'],'fecha'=>date($xoopsModuleConfig['dateformat'], $row['fecha']),
		'hits'=>$row['hits']));
	}
	
	return $xoopsDB->getRowsNum($result);
}
?>
