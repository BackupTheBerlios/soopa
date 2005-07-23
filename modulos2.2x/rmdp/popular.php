<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: popular.php,v 1.1 2005/07/23 16:52:00 mauriciodelima Exp $                     //
// ------------------------------------------------------------------------  //
//                         RM+SOFT.Download.Plus                             //
//                    Copyright � 2005. Red Mexico Soft                      //
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
//  bajo los t�rminos de al GNU General Public Licencse como ha sido         //
//  publicada por The Free Software Foundation (Fundaci�n de Software Libre; //
//  en cualquier versi�n 2 de la Licencia o mas reciente.                    //
//                                                                           //
//  Este programa es distribuido esperando que sea �ltil pero SIN NINGUNA    //
//  GARANT�A. Ver The GNU General Public License para mas detalles.          //
//  ------------------------------------------------------------------------ //
//  Questions, Bugs or any comment plese write me                            //
//  Preguntas, errores o cualquier comentario escribeme                      //
//  <adminone@redmexico.com.mx>                                              //
//  ------------------------------------------------------------------------ //
//                                                                           //
///////////////////////////////////////////////////////////////////////////////

$rmdp_location = 'popular';
include 'header.php';

$xoopsOption['template_main'] = 'rmdp_view_popular.html';

include 'include/rmdp_functions.php';
include 'include/rmdp_downs.php';
include 'include/rmdp_search.php';

// Obtenemos las descargas patrocinadas
rmdp_get_sponsor();
// Creamos las opciones para la b�squeda
rmdp_make_searchnav();

$xoopsTpl->assign('lang_our_favorites', _RMDP_OUR_FAVORITES);
$xoopsTpl->assign('lang_popular_soft', _RMDP_POPULAR_SOFT);
$xoopsTpl->assign('lng_favmsg',sprintf(_RMDP_FAVORITE_TEXT, $xoopsModuleConfig['favo_downs']));
$xoopsTpl->assign('lng_populartitle', _RMDP_POPULAR_TITLE);
$xoopsTpl->assign('lang_toppop', sprintf(_RMDP_TOP_POP, $xoopsModuleConfig['toppop']));

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
/**
* Cargamos las descargas populares
**/
rmdp_search_top('descargas', $order." ".$ad);
$xoopsTpl->assign("rmdp_ad", $asdes);

$location = '<a href="'.XOOPS_URL.'/modules/rmdp/">'.$xoopsModuleConfig['rmdptitle'].'</a> &gt;
	<a href="popular.php">'._RMDP_POPULAR_TITLE.'</a>';
$xoopsTpl->assign('location_bar', $location);

$xoopsTpl->assign('lang_download_now',_RMDP_DOWNLOAD_NOW);
include 'footer.php';
?>
