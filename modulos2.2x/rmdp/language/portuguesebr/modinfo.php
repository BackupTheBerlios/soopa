<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: modinfo.php,v 1.1 2005/07/23 16:52:00 mauriciodelima Exp $                 //
//  ------------------------------------------------------------------------ //
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
//  bajo los t&eacute;rminos de al GNU General Public Licencse como ha sido         //
//  publicada por The Free Software Foundation (Fundaci&oacute;n de Software Libre; //
//  en cualquier versi&oacute;n 2 de la Licencia o mas reciente.                    //
//                                                                           //
//  Este programa es distribuido esperando que sea últil pero SIN NINGUNA    //
//  GARANTÍA. Ver The GNU General Public License para mas detalles.          //
//  ------------------------------------------------------------------------ //
//  Questions, Bugs or any comment plese write me                            //
//  Preguntas, errores o cualquier comentario escribeme                      //
//  <adminone@redmexico.com.mx>                                              //
//  ------------------------------------------------------------------------ //
///////////////////////////////////////////////////////////////////////////////
define("_MI_RMDP_NAME", "RM+Soft.Download.Plus");
define("_MI_RMDP_DESC", "Modulo para la administraci&oacute;n avanzada de software");

/**
 * Menus del administrador
 */
define('_MI_RMDP_AM1','Categor&iacute;as Existentes');
define('_MI_RMDP_AM2','Nueva Categor&iacute;a');
define('_MI_RMDP_AM3','Descargas Existentes');
define('_MI_RMDP_AM4','Nueva Descarga');
define('_MI_RMDP_AM5','Descargas Patrocinadas');
define('_MI_RMDP_AM6','Nueva Compa&ntilde;&iacute;a');
define('_MI_RMDP_AM8','Plataformas');
define('_MI_RMDP_AM9','Licencias');
define('_MI_RMDP_AM10','Descargas Enviadas');
define('_MI_RMDP_AM11','Modificaciones');

/**
 * SubMenu
 */
define('_MI_SEND_DOWNLOAD','Enviar');
define('_MI_SENDED_DOWNS','Mis Descargas');

/**
 * Opciones de Configuraci&oacute;n
 */
define('_MI_RMDP_MODTITLE','T&iacute;tulo del M&oacute;dulo:');
define('_MI_RMDP_CATGOIMGW','Tama&ntilde;o de las im&aacute;genes de categor&iacute;as:');
define('_MI_RMDP_DOWNIMGW','Tama&ntilde;o de las im&aacute;genes de descargas:');
define('_MI_RMDP_SHOTIMGW','Tama&ntilde;o de las im&aacute;genes peque&ntilde;as de pantallas:');
define('_MI_RMDP_SHOTIMGBIGW','Tama&ntilde;o de las im&aacute;genes grandes de pantallas:');
define('_MI_RMDP_SHOTIMGBIGD','&Uacute;til solo cuando no se vincula directamente a las im&aacute;genes');
define('_MI_RMDP_SHOTLINK','Vincular pantallas directamente a las im&aacute;genes:');
define('_MI_RMDP_CATEGODAYSNEW','D&iacute;as para mostrar una categor&iacute;a como nueva:');
define('_MI_RMDP_CARACTDAYSNEW','D&iacute;as para mostrar una carcter&iacute;stica como nueva:');
define('_MI_RMDP_SHOTDAYSNEW','D&iacute;as para mostrar una pantalla como nueva:');
define('_MI_RMDP_SENDDOWN','Activar el env&iacute;o de descargas:');
define('_MI_RMDP_SENDANONIMO','Usuarios an&oacute;nimos pueden enviar descargas:');
define('_MI_RMDP_CATWITHNEWS','Número de Categor&iacute;as con novedades en la p&aacute;gina principal:');
define('_MI_RMDP_SPONSORNUM','Número de descargas patrocinadas a mostrar:');
define('_MI_RMDP_FAVORITESNUM','Número de descargas a mostrar en Favoritos:');
define('_MI_RMDP_POPULARNUM','Número de descargas a mostrar en Populares:');
define('_MI_RMDP_LENDESC','Longitud en car&aacute;cteres de la descripci&oacute;n<br>de descargas patrocinadas:');
define('_MI_RMDP_SHOTLIMIT','Limite de pantallas por descarga:');
define('_MI_RMDP_SUBCATLIMIT','Número de subcategor&iacute;as para mostrar:');
define('_MI_RMDP_RESALTEBG','Color de Fondo para descargas resaltadas (HEX):');
define('_MI_RMDP_LIMITRESULT','L&iacute;mite de resultados por p&aacute;gina:');
define('_MI_RMDP_UPDATEDAYS','D&iacute;as para considerar un elemento como actualizado:');
define('_MI_RMDP_DOWNNEW','D&iacute;as para considerar una descarga como nueva:');
define('_MI_RMDP_DATEFORMAT','Formato de Fecha:');
define('_MI_RMDP_POPULARNEEDS','Descargas para considerar como popular<br>un elemento:');
define('_MI_RMDP_USERVOTE','Permitir votos de usuarios an&oacute;nimos');
define('_MI_RMDP_OPENWINDOW','Comportamiento de descargas:');
define('_MI_RMDP_OPENSAME','Abrir en la misma ventana');
define('_MI_RMDP_OPENNEW','Abrir en otra ventana');
define('_MI_RMDP_SHOTCOLS','Número de columnas para tablas de pantallas:');
define('_MI_RMDP_TOPPOP','Número de descargas populares a mostrar');
define('_MI_RMDP_TOPFAV','Número de descargas favoritas a mostrar');
define('_MI_RMDP_TOPRATE','Número de descargas mejor valoradas a mostrar');
define('_MI_RMDP_SENDMAIL','Notificar por email cuando se envia una descarga');
define('_MI_RMDP_BODYMAIL','Cuerpo del mensaje a usuarios');

// Bloques
define('_MI_RMDP_RECENT_TITLE','Descargas Recientes');
?>
