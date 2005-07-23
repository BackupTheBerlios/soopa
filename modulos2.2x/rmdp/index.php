<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: index.php,v 1.1 2005/07/23 16:52:00 mauriciodelima Exp $                   //
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

include 'header.php';
$xoopsOption['template_main'] = 'rmdp_index.html'; //Plantilla para esta página

//Cargamos las descargas patrocinadas
include('include/rmdp_functions.php');
rmdp_get_sponsor();

// Obtenemos una descarga aleatoría
rmdp_today_download();

// Obtenemos la lista de categorías
get_categos_list();

//Obtenemos lo nuevo en las categorías
rmdp_get_thenew($xoopsModuleConfig['cat_with_news']);

//Obtenemos los favoritos
rmdp_get_favorites(0);

//Obtenemos las descargas recientes
rmdp_get_popular(0);

$xoopsTpl->assign('lang_download_now',_RMDP_DOWNLOAD_NOW);
$xoopsTpl->assign('lang_today', _RMDP_DOWNLOAD_TODAY);
$xoopsTpl->assign('lang_seall', _RMDP_SEALL_INCAT);
$xoopsTpl->assign('lang_popular', _RMDP_POPULAR);
$xoopsTpl->assign('lang_bestrated', _RMDP_BEST_RATED);
$xoopsTpl->assign('lang_forums', _RMDP_FORUMS);
$xoopsTpl->assign('lng_moredownloads',_RMDP_MORE_DOWNLOADS);
$xoopsTpl->assign('download_imgw', $xoopsModuleConfig['imgdownw']);
$xoopsTpl->assign('lang_our_favorites', _RMDP_OUR_FAVORITES);
$xoopsTpl->assign('lang_popular_soft', _RMDP_POPULAR_SOFT);
$xoopsTpl->assign('lng_favmsg',sprintf(_RMDP_FAVORITE_TEXT, $xoopsModuleConfig['favo_downs']));
$xoopsTpl->assign('lang_sponsornews',_RMDP_SPONSOR_NEWS);

include "footer.php";
?>
