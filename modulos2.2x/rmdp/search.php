<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: search.php,v 1.2 2005/08/02 05:41:21 mauriciodelima Exp $                  //
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

$rmdp_location = 'search';
include('header.php');

$key = $_GET['key'];
if ($key==''){ $key=$_POST['key']; }
$cat = $_GET['cat'];
if ($cat<=0){ $cat=$_POST['cat']; }

if ($key==''){
	redirect_header('index.php', 1, _RMDP_NOSEARCH_KEY);
	die();
}

$xoopsOption['template_main'] = 'rmdp_search_result.html';

// Realizamos la busqueda
include 'include/rmdp_functions.php';
include 'include/rmdp_downs.php';
include 'include/rmdp_search.php';

// Obtenemos las descargas patrocinadas
rmdp_get_sponsor();
// Creamos las opciones para la búsqueda
rmdp_make_searchnav();

$xoopsTpl->assign('lang_our_favorites', _RMDP_OUR_FAVORITES);
$xoopsTpl->assign('lang_popular_soft', _RMDP_POPULAR_SOFT);
$xoopsTpl->assign('lng_favmsg',sprintf(_RMDP_FAVORITE_TEXT, $xoopsModuleConfig['favo_downs']));
$xoopsTpl->assign('lang_toppop', sprintf(_RMDP_SEARCH_RESULTS, $key));
$xoopsTpl->assign('lang_download_now',_RMDP_DOWNLOAD_NOW);

// Cargamos favoritos y populares
rmdp_get_favorites(0);

/**
 * Identificamos el orden de los resultados
 */
$sort = isset($_GET['sort']) ? $_GET['sort'] : 4;
$asdes = $_GET['ad'];
if ($asdes<=0){ $asdes=1; $ad='DESC'; } else { $asdes='0'; $ad='ASC'; }
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
		$order = 'descargas';
		break;
}

rmdp_search_keyword($key, $cat, $order." ".$ad);
$xoopsTpl->assign("rmdp_ad", $asdes);
$xoopsTpl->assign("rmdp_cat", $cat);

include('footer.php');
?>
