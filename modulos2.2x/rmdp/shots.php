<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: shots.php,v 1.2 2005/08/02 05:41:21 mauriciodelima Exp $                   //
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

$rmdp_location = 'shots';

/**
* Comprobamos que se haya especificado el id de descarga
**/
$id = isset($_GET['id']) ? $_GET['id'] : 0;
if ($id<=0){
	header('location: index.php');
	die();
}
$op = isset($_GET['op']) ? $_GET['op'] : '';

include 'header.php';
include 'include/rmdp_functions.php';
rmdp_make_searchnav();

if ($op=='view'){
	$xoopsOption['template_main'] = 'rmdp_shots_view.html'; 
	/**
	* Obtenemos el Id de la imagen a mostrar
	**/
	$shot = isset($_GET['shot']) ? $_GET['shot'] : 0;
	if ($shot<=0){ header('shots.php?id='.$id); die(); }
	
	$result = $xoopsDB->query("SELECT big, text, fecha, hits FROM ".$xoopsDB->prefix('rmdp_shots')." WHERE id_shot='$shot'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){ redirect_header('shots.php?id='.$id, 1, _RMDP_ERR_NOTFOUND); die(); }
	$row = $xoopsDB->fetchArray($result);
	
	$xoopsDB->query("UPDATE ".$xoopsDB->prefix('rmdp_shots')." SET `hits`=`hits`+1 WHERE id_shot='$shot'");
	
	$xoopsTpl->assign('shot', array('id'=>$row['id_shot'], 'img'=>$row['big'], 'desc'=>$row['text'],
	'isnew'=>rmdp_element_isnew($row['fecha'], $xoopsModuleConfig['shotnew']), 'views'=>$row['hits']));
	
	$xoopsTpl->assign('img_width', $xoopsModuleConfig['imgshotbw']);
	$xoopsTpl->assign('soft_id', $id);
	

} else {

	function rmdp_shot_link($shot, $img){
		global $xoopsModuleConfig, $id;
	
		if ($xoopsModuleConfig['shotlink']){
			return $img.'" target="_blank';
		} else {
			return 'shots.php?id='.$id.'&amp;shot='.$shot.'&amp;op=view';
		}
	}

	$xoopsOption['template_main'] = 'rmdp_shots.html'; 

	/**
	* Obtenemos las pantallas de una descarga
	**/
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_shots')." WHERE id_soft='$id'");
	while ($row=$xoopsDB->fetchArray($result)){
		$fecha = date($xoopsModuleConfig['dateformat'], $row['fecha']);
		$isnew = rmdp_element_isnew($row['fecha'], $xoopsModuleConfig['shotnew']);
		$xoopsTpl->append('shots', array('id'=>$row['id_shot'],'small'=>$row['small'],
			'link'=>rmdp_shot_link($row['id_shot'], $row['big']), 'desc'=>$row['text'], 'fecha'=>$fecha,'isnew'=>$isnew,
			'hits'=>$row['hits']));
	}
	$xoopsTpl->assign('img_width', $xoopsModuleConfig['imgshotsw']);

}
	
// Obtenemos las descargas patrocinadas
rmdp_get_sponsor();

rmdp_get_favorites(0);
rmdp_get_popular(0);

// Creamos la barra de localización
$location_bar = "<a href='".XOOPS_URL."/modules/rmdp/'>".$xoopsModuleConfig['rmdptitle']."</a> &gt; ";
list($idc, $nombre) = $xoopsDB->fetchRow($xoopsDB->query("SELECT id_cat, nombre FROM ".$xoopsDB->prefix("rmdp_software")." WHERE id_soft='$id'"));
$location_bar .= rmdp_get_location($idc);
$location_bar .= '<a href="down.php?id='.$id.'">'.$nombre.'</a> &gt; ';
$location_bar .= '<a href="shots.php?id='.$id.'">'._RMDP_LOCATION_SHOT.'</a>';

$xoopsTpl->assign('location_bar', $location_bar);

// Opciones de lenguaje
$xoopsTpl->assign('lng_shotsof', sprintf(_RMDP_DOWN_SHOTS, rmdp_download_name($id)));
$xoopsTpl->assign('total_cols', $xoopsModuleConfig['shotcols']);
$xoopsTpl->assign('lang_download_now',_RMDP_DOWNLOAD_NOW);
$xoopsTpl->assign('lang_our_favorites', _RMDP_OUR_FAVORITES);
$xoopsTpl->assign('lang_popular_soft', _RMDP_POPULAR_SOFT);
$xoopsTpl->assign('lng_favmsg',sprintf(_RMDP_FAVORITE_TEXT, $xoopsModuleConfig['favo_downs']));

include 'footer.php';
?>
