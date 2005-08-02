<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: categos.php,v 1.2 2005/08/02 05:41:21 mauriciodelima Exp $                 //
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
$rmdp_location = 'categos';

$id = $_GET['id'];
if ($id<=0){ header('location: index.php'); die(); }

include 'header.php';

// Comprobamos el acceso a la categoría
include 'include/rmdp_access.php';
if ($xoopsUser == '' && rmdp_check_access($id)){
	redirect_header(XOOPS_URL."/user.php?xoops_redirect=".parse_url($_SERVER['PHP_SELF']), 1, _RMDP_ERR_ACCESS);
	die();
}

$xoopsOption['template_main'] = 'rmdp_categos.html';

include('include/rmdp_functions.php');
include('include/rmdp_downs.php');

// Obtenemos las descargas patrocinadas
rmdp_get_sponsor();

// Obtenemos la lista de categorías
$xoopsTpl->assign('show_catego_table', get_categos_list($id));

// Creamos las opciones para la búsqueda
rmdp_make_searchnav();

// Creamos la barra de localización
$location_bar = "<a href='".XOOPS_URL."/modules/rmdp/'>".$xoopsModuleConfig['rmdptitle']."</a> &gt; ";
$location_bar .= rmdp_get_location($id);
$location_bar = substr($location_bar, 0, strlen($location_bar) - 6);

$xoopsTpl->assign('location_bar', $location_bar);

// Buscamos las descargas en esta categoría
include 'include/rmdp_search.php';
$categoname = rmdp_get_categoname($id);
/**
 * Identificamos el orden de los resultados
 */
$sort = $_GET['sort'];
$asdes = $_GET['ad'];
if ($asdes<=0){ $asdes=1; $ad='ASC'; } else { $asdes='0'; $ad='DESC'; }
switch ($sort){
	case 0:
		$order='nombre';
		break;
	case 1:
		$order='fecha';
		break;
	case 2:
		$order='rating';
		break;
	case 3:
		$order = 'calificacion';
		break;
	case 4:
		$order = 'descargas';
		break;
	case 5:
		$order = 'submitter';
		break;
	default:
		$order = 'nombre';
		break;
}

$have_results = rmdp_basic_search("id_cat='$id'", "categos.php?id=".$id, $order." ".$ad, sprintf(_RMDP_DOWNS_INCATEGO, $categoname));
$xoopsTpl->assign('have_results', $have_results);

rmdp_get_favorites(0);
rmdp_get_popular(0);

	$xoopsTpl->assign('lng_favmsg',sprintf(_RMDP_FAVORITE_TEXT, $xoopsModuleConfig['favo_downs']));

// Cargamos la información de la categoría
$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_categos')." WHERE id_cat='$id'");
if ($result){
	$row = $xoopsDB->fetchArray($result);
	$fecha = date($xoopsModuleConfig['dateformat'], $row['fecha']);
	$xoopsTpl->assign('catego',array('id'=>$row['id_cat'],'nombre'=>$row['nombre'],'img'=>$row['img'],
			'fecha'=>$fecha,'isnew'=>rmdp_element_isnew($row['fecha'], $xoopsModuleConfig['categonew']),
			'ad'=>$asdes));
}


// Lenguaje
$xoopsTpl->assign('lang_download_now',_RMDP_DOWNLOAD_NOW);
$xoopsTpl->assign('lang_subcategos_in', sprintf(_RMDP_SUBCATEGOS_IN, $categoname));
$xoopsTpl->assign('lang_our_favorites', _RMDP_OUR_FAVORITES);
$xoopsTpl->assign('lang_popular_soft', _RMDP_POPULAR_SOFT);
$xoopsTpl->assign('view_shots', _RMDP_VIEW_SHOT);

include "footer.php";
?>
