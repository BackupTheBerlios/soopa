<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: down.php,v 1.1 2005/07/23 16:52:00 mauriciodelima Exp $                    //
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

$rmdp_location = 'downloads';
$id = $_GET['id'];
if ($id<=0){ header('location: index.php'); die(); }

include 'header.php';

include 'include/rmdp_functions.php';
// Creamos la barra de localización
$location_bar = "<a href='".XOOPS_URL."/modules/rmdp/'>".$xoopsModuleConfig['rmdptitle']."</a> &gt; ";
list($idc, $nombre) = $xoopsDB->fetchRow($xoopsDB->query("SELECT id_cat, nombre FROM ".$xoopsDB->prefix("rmdp_software")." WHERE id_soft='$id'"));
$location_bar .= rmdp_get_location($idc);
$location_bar .= '<a href="down.php?id='.$id.'">'.$nombre.'</a>';
$xoopsTpl->assign('location_bar', $location_bar);

/**
* Creamos la barra de busqueda
**/
rmdp_make_searchnav();
/**
 * Detectamos que acción realizar
 * @sw = now; Decargar ahora mismo
 * @sw != now; Mostramos los datos
 */
if (isset($_GET['sw'])){ $sw = $_GET['sw']; } else { $sw = 'show'; }

if ($sw=='now'){
	/**
	* Comprobamos el acceso a la categoría
	**/
	include 'include/rmdp_access.php';
	if ($xoopsUser == '' && rmdp_check_access($idc)){
		redirect_header(XOOPS_URL."/user.php?xoops_redirect=".parse_url($_SERVER['PHP_SELF']), 1, _RMDP_ERR_ACCESS);
		die();
	}
	/**
	* Transferimos la descarga
	*/
	$xoopsOption['template_main'] = 'rmdp_download_now.html';
	/**
	* Cargamos los datos
	**/
	$result = $xoopsDB->query("SELECT nombre, archivo, descargas, anonimo FROM ".$xoopsDB->prefix('rmdp_software')." WHERE id_soft='$id'");
	$num = $xoopsDB->getRowsNum($result);
	if ($num<=0){
		/**
		* Si no existe la descarga enviamos a index.php
		**/
		redirect_header('index.php', 1, _RMDP_ERR_NOTFOUND);
		die();
	}
	$row = $xoopsDB->fetchArray($result);
	$nombre = $row['nombre'];
	$file = $row['archivo'];
	$anonimo = $row['anonimo'];
	$descargas = $row['descargas'];
	
	if ($xoopsUser==''){
		if (!$anonimo){
			redirect_header(XOOPS_URL."/user.php?xoops_redirect=".parse_url($_SERVER['PHP_SELF']), 1, _RMDP_ERR_NOACCESS);
			die();
		}
	}
	
	$xoopsDB->queryF("UPDATE ".$xoopsDB->prefix('rmdp_software')." SET `descargas`=".($descargas + 1)." WHERE id_soft='$id'");
	/**
	* Agregamos el script para iniciar automáticamente la descarga
	**/
	if ($xoopsModuleConfig['newwindow']){
		$xoops_module_header .= "\n<script language='javascript' type='text/javascript'>
			function startDownload(){
				document.download.submit();
			}
			function Temporizador(){
				setTimeout('startDownload()',3000);
			}
			window.onLoad=Temporizador();
			</script>";
		$xoopsTpl->assign('form_download',"<form action='".$file."' method='get' name='download' target='_blank' id='download'></form>");
	} else {
		$xoops_module_header .= "\n<script language='javascript' type='text/javascript'>
			function startDownload(){
				 window.location = \"".$file."\";
			}
			function Temporizador(){
				setTimeout('startDownload()',5000);
			}
			window.onLoad=Temporizador();
			</script>";
	}
	/**
	* Establecemos las variables Smarty
	**/
	$xoopsTpl->assign('lng_inprogress', _DOWNLOAD_IN_PROGRESS);
	$xoopsTpl->assign('lng_ifnostart', sprintf(_RMDP_CLICK_HERE, $file));
	$xoopsTpl->assign('lng_while_down', _RMDP_WHILE_DOWN);
	$xoopsTpl->assign('lang_our_favorites', _RMDP_OUR_FAVORITES);
	$xoopsTpl->assign('lang_popular_soft', _RMDP_POPULAR_SOFT);
	$xoopsTpl->assign('lng_favmsg',sprintf(_RMDP_FAVORITE_TEXT, $xoopsModuleConfig['favo_downs']));
	
	//Obtenemos los favoritos
	rmdp_get_favorites(0);

	//Obtenemos las descargas recientes
	rmdp_get_popular(0);
	
} else {
	/**
	* MOstramos los datos de la descarga
	**/
	$xoopsOption['template_main'] = 'rmdp_download_data.html';
	// Cargamos los datos de la descarga
	include 'include/rmdp_downs.php';
	rmdp_load_downdata($id);

	include XOOPS_ROOT_PATH.'/include/comment_view.php';

	$xoopsTpl->assign('lang_popular',_RMDP_POPULAR);
	$xoopsTpl->assign('lang_download_now',_RMDP_DOWNLOAD_NOW);

}

include 'footer.php';
?>
