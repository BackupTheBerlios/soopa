<?php
// $Id: xoops_version.php,v 1.2 2005/08/02 05:41:21 mauriciodelima Exp $
// ------------------------------------------------------------------------ //
//                        RM+SOFT.Download.Plus                             //
//                   Copyright � 2005. Red Mexico Soft                      //
//                    <http://www.redmexico.com.mx/>                        //
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
//                                                                          //
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //
// ------------------------------------------------------------------------ //
// Este programa es un programa libre; puedes distribuirlo y modificarlo    //
// bajo los t�rminos de al GNU General Public Licencse como ha sido         //
// publicada por The Free Software Foundation (Fundaci�n de Software Libre; //
// en cualquier versi�n 2 de la Licencia o mas reciente.                    //
//                                                                          //
// Este programa es distribuido esperando que sea �ltil pero SIN NINGUNA    //
// GARANT�A. Ver The GNU General Public License para mas detalles.          //
// ------------------------------------------------------------------------ //
// Questions, Bugs or any comment plese write me                            //
// Preguntas, errores o cualquier comentario escribeme                      //
// <adminone@redmexico.com.mx>                                              //
// ------------------------------------------------------------------------ //
//                                                                          //

$modversion['name'] = _MI_RMDP_NAME;
$modversion['version'] = 0.1;
$modversion['description'] = _MI_RMDP_DESC;
$modversion['author'] = "Eduardo Cort�s (AdminOne) http://www.redmexico.com.mx";
$modversion['credits'] = "AdminOne - RM+Soft";
$modversion['help'] = "http://www.xoops-mexico.net/modules/rmlib/books.php?book=5";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 0;
$modversion['image'] = "images/logo.png";
$modversion['dirname'] = "rmdp";

// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = "sql/rmdp.sql";
//$modversion['sqlfile']['postgresql'] = "sql/pgsql.sql";

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = "rmdp_categos";
$modversion['tables'][1] = "rmdp_plataformas";
$modversion['tables'][2] = "rmdp_softos";
$modversion['tables'][3] = "rmdp_software";
$modversion['tables'][4] = "rmdp_shots";
$modversion['tables'][5] = "rmdp_partners";
$modversion['tables'][6] = "rmdp_licences";
$modversion['tables'][7] = "rmdp_sended";
$modversion['tables'][8] = "rmdp_data";
$modversion['tables'][9] = "rmdp_editorcom";
$modversion['tables'][10] = "rmdp_votes";

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

$modversion['hasMain'] = 1;
$modversion['sub'][1]['name'] = _MI_SEND_DOWNLOAD;
$modversion['sub'][1]['url'] = "submit.php";
$modversion['sub'][2]['name'] = _MI_SENDED_DOWNS;
$modversion['sub'][2]['url'] = "mysends.php";


// Blocks
$modversion['blocks'][1]['file'] = "rmdp_recent_downs.php";
$modversion['blocks'][1]['name'] = _MI_RMDP_RECENT_TITLE;
$modversion['blocks'][1]['description'] = 'Muestra las descargas recientes';
$modversion['blocks'][1]['show_func'] = "rmdp_b_show_recent";
$modversion['blocks'][1]['edit_func'] = "rmdp_b_show_recent_edit";
$modversion['blocks'][1]['options'] = "5";
$modversion['blocks'][1]['template'] = 'rmdp_recent.html';

// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/rmdp_xoops_search.php";
$modversion['search']['func'] = "rmdp_xoops_search";


// Templates
$modversion['templates'][1]['file'] = 'rmdp_index.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'rmdp_categos.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = 'rmdp_nav_srh.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = 'rmdp_download_now.html';
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file'] = 'rmdp_download_data.html';
$modversion['templates'][5]['description'] = '';
$modversion['templates'][6]['file'] = 'rmdp_shots.html';
$modversion['templates'][6]['description'] = '';
$modversion['templates'][7]['file'] = 'rmdp_shots_view.html';
$modversion['templates'][7]['description'] = '';
$modversion['templates'][8]['file'] = 'rmdp_view_popular.html';
$modversion['templates'][8]['description'] = '';
$modversion['templates'][9]['file'] = 'rmdp_submit.html';
$modversion['templates'][9]['description'] = '';
$modversion['templates'][10]['file'] = 'rmdp_show_sends.html';
$modversion['templates'][10]['description'] = '';
$modversion['templates'][11]['file'] = 'rmdp_search_result.html';
$modversion['templates'][11]['description'] = '';
$modversion['templates'][12]['file'] = 'rmdp_modify_submit.html';
$modversion['templates'][12]['description'] = '';
$modversion['templates'][13]['file'] = 'rmdp_send_shots.html';
$modversion['templates'][13]['description'] = '';
$modversion['templates'][14]['file'] = 'rmdp_categos_simple.html';
$modversion['templates'][14]['description'] = '';
$modversion['templates'][15]['file'] = 'rmdp_categos_images.html';
$modversion['templates'][15]['description'] = '';

// Opcion para configurar el titulo del modulo
$modversion['config'][1]['name'] = 'rmdptitle';
$modversion['config'][1]['title'] = '_MI_RMDP_MODTITLE';
$modversion['config'][1]['description'] = '';
$modversion['config'][1]['formtype'] = 'textbox';
$modversion['config'][1]['valuetype'] = 'text';
$modversion['config'][1]['default'] = "Descargas";

// Tama�o (width) para las im�genes de las categor�as
$modversion['config'][2]['name'] = 'imgcategow';
$modversion['config'][2]['title'] = '_MI_RMDP_CATGOIMGW';
$modversion['config'][2]['description'] = '';
$modversion['config'][2]['formtype'] = 'textbox';
$modversion['config'][2]['valuetype'] = 'int';
$modversion['config'][2]['default'] = "80";

// Tama�o (width) para las im�genes de las categor�as
$modversion['config'][3]['name'] = 'showimgcat';
$modversion['config'][3]['title'] = '_MI_RMDP_SHOWCATIMG';
$modversion['config'][3]['description'] = '';
$modversion['config'][3]['formtype'] = 'yesno';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = 0;

// Tama�o (width) para las im�genes de descargas
$modversion['config'][4]['name'] = 'imgdownw';
$modversion['config'][4]['title'] = '_MI_RMDP_DOWNIMGW';
$modversion['config'][4]['description'] = '';
$modversion['config'][4]['formtype'] = 'textbox';
$modversion['config'][4]['valuetype'] = 'int';
$modversion['config'][4]['default'] = "80";

// Tama�o (width) para las im�genes peque�as de pantallas
$modversion['config'][5]['name'] = 'imgshotsw';
$modversion['config'][5]['title'] = '_MI_RMDP_SHOTIMGW';
$modversion['config'][5]['description'] = '';
$modversion['config'][5]['formtype'] = 'textbox';
$modversion['config'][5]['valuetype'] = 'int';
$modversion['config'][5]['default'] = "80";

// Tama�o (width) para las im�genes grandes de pantallas
$modversion['config'][6]['name'] = 'imgshotbw';
$modversion['config'][6]['title'] = '_MI_RMDP_SHOTIMGBIGW';
$modversion['config'][6]['description'] = _MI_RMDP_SHOTIMGBIGD;
$modversion['config'][6]['formtype'] = 'textbox';
$modversion['config'][6]['valuetype'] = 'int';
$modversion['config'][6]['default'] = "400";

// Comporatamiento de los vinculos de pantallas
$modversion['config'][7]['name'] = 'shotlink';
$modversion['config'][7]['title'] = '_MI_RMDP_SHOTLINK';
$modversion['config'][7]['description'] = '';
$modversion['config'][7]['formtype'] = 'yesno';
$modversion['config'][7]['valuetype'] = 'int';
$modversion['config'][7]['default'] = "0";

// Limite de pantallas por descarga
$modversion['config'][8]['name'] = 'shotlimit';
$modversion['config'][8]['title'] = '_MI_RMDP_SHOTLIMIT';
$modversion['config'][8]['description'] = '';
$modversion['config'][8]['formtype'] = 'textbox';
$modversion['config'][8]['valuetype'] = 'int';
$modversion['config'][8]['default'] = 5;

// Dias para considerar una categoria como nueva
$modversion['config'][9]['name'] = 'categonew';
$modversion['config'][9]['title'] = '_MI_RMDP_CATEGODAYSNEW';
$modversion['config'][9]['description'] = '';
$modversion['config'][9]['formtype'] = 'select';
$modversion['config'][9]['valuetype'] = 'int';
$modversion['config'][9]['default'] = 10;
$modversion['config'][9]['options'] = array('5 d�as'=>5,'10 d�as'=>10,'20 d�as'=>20,'30 d�as'=>30);

// N�mero de subcategor�as para mostrar en cada categor�a
$modversion['config'][10]['name'] = 'subcategoslimit';
$modversion['config'][10]['title'] = '_MI_RMDP_SUBCATLIMIT';
$modversion['config'][10]['description'] = '';
$modversion['config'][10]['formtype'] = 'textbox';
$modversion['config'][10]['valuetype'] = 'int';
$modversion['config'][10]['default'] = 5;

// Dias para considerar una caracter�stica como nueva
$modversion['config'][11]['name'] = 'caractnew';
$modversion['config'][11]['title'] = '_MI_RMDP_CARACTDAYSNEW';
$modversion['config'][11]['description'] = '';
$modversion['config'][11]['formtype'] = 'select';
$modversion['config'][11]['valuetype'] = 'int';
$modversion['config'][11]['default'] = 10;
$modversion['config'][11]['options'] = array('5 d�as'=>5,'10 d�as'=>10,'20 d�as'=>20,'30 d�as'=>30);

// Dias para considerar una pantalla como nueva
$modversion['config'][12]['name'] = 'shotnew';
$modversion['config'][12]['title'] = '_MI_RMDP_SHOTDAYSNEW';
$modversion['config'][12]['description'] = '';
$modversion['config'][12]['formtype'] = 'select';
$modversion['config'][12]['valuetype'] = 'int';
$modversion['config'][12]['default'] = 5;
$modversion['config'][12]['options'] = array('5 d�as'=>5,'10 d�as'=>10,'20 d�as'=>20,'30 d�as'=>30);

// Activar el envi� de descargas
$modversion['config'][13]['name'] = 'downsend';
$modversion['config'][13]['title'] = '_MI_RMDP_SENDDOWN';
$modversion['config'][13]['description'] = '';
$modversion['config'][13]['formtype'] = 'yesno';
$modversion['config'][13]['valuetype'] = 'int';
$modversion['config'][13]['default'] = 1;

// Permitir a los usuarios an�nimos enviar descargas
$modversion['config'][14]['name'] = 'sendanonimo';
$modversion['config'][14]['title'] = '_MI_RMDP_SENDANONIMO';
$modversion['config'][14]['description'] = '';
$modversion['config'][14]['formtype'] = 'yesno';
$modversion['config'][14]['valuetype'] = 'int';
$modversion['config'][14]['default'] = 0;

// Numero de descargas patrocinadas en la p�gina principal
$modversion['config'][15]['name'] = 'sponsor_downs';
$modversion['config'][15]['title'] = '_MI_RMDP_SPONSORNUM';
$modversion['config'][15]['description'] = '';
$modversion['config'][15]['formtype'] = 'textbox';
$modversion['config'][15]['valuetype'] = 'int';
$modversion['config'][15]['default'] = 3;

// Numero de descargas a mostrar en "Favoritos"
$modversion['config'][16]['name'] = 'favo_downs';
$modversion['config'][16]['title'] = '_MI_RMDP_FAVORITESNUM';
$modversion['config'][16]['description'] = '';
$modversion['config'][16]['formtype'] = 'select';
$modversion['config'][16]['valuetype'] = 'int';
$modversion['config'][16]['default'] = 5;
$modversion['config'][16]['options'] = array('5'=>5,'10'=>10,'15'=>15,'20'=>20);

// Numero de descargas a mostrar en "Populares"
$modversion['config'][17]['name'] = 'popular_downs';
$modversion['config'][17]['title'] = '_MI_RMDP_POPULARNUM';
$modversion['config'][17]['description'] = '';
$modversion['config'][17]['formtype'] = 'select';
$modversion['config'][17]['valuetype'] = 'int';
$modversion['config'][17]['default'] = 5;
$modversion['config'][17]['options'] = array('5'=>5,'10'=>10,'15'=>15,'20'=>20);

// Numero de car�cteres a mostrar en descripci�n de descargas patrocinadas
$modversion['config'][18]['name'] = 'len_desc';
$modversion['config'][18]['title'] = '_MI_RMDP_LENDESC';
$modversion['config'][18]['description'] = '';
$modversion['config'][18]['formtype'] = 'textbox';
$modversion['config'][18]['valuetype'] = 'int';
$modversion['config'][18]['default'] = 100;

// Color de Fondo para descargas resaltadas
$modversion['config'][19]['name'] = 'bgresalte';
$modversion['config'][19]['title'] = '_MI_RMDP_RESALTEBG';
$modversion['config'][19]['description'] = '';
$modversion['config'][19]['formtype'] = 'textbox';
$modversion['config'][19]['valuetype'] = 'text';
$modversion['config'][19]['default'] = '#EBEBEB';

// Numero de Resultados por p�gina
$modversion['config'][20]['name'] = 'limit_result';
$modversion['config'][20]['title'] = '_MI_RMDP_LIMITRESULT';
$modversion['config'][20]['description'] = '';
$modversion['config'][20]['formtype'] = 'textbox';
$modversion['config'][20]['valuetype'] = 'int';
$modversion['config'][20]['default'] = 20;

// Dias para considerar un elemento como actualizado
$modversion['config'][21]['name'] = 'update_days';
$modversion['config'][21]['title'] = '_MI_RMDP_UPDATEDAYS';
$modversion['config'][21]['description'] = '';
$modversion['config'][21]['formtype'] = 'select';
$modversion['config'][21]['valuetype'] = 'int';
$modversion['config'][21]['default'] = 10;
$modversion['config'][21]['options'] = array('5 d�as'=>5,'10 d�as'=>10,'15 d�as'=>15,'20 d�as'=>20,'30 d�as'=>30);

// Dias para considerar una descarga como nueva
$modversion['config'][22]['name'] = 'downnew';
$modversion['config'][22]['title'] = '_MI_RMDP_DOWNNEW';
$modversion['config'][22]['description'] = '';
$modversion['config'][22]['formtype'] = 'select';
$modversion['config'][22]['valuetype'] = 'int';
$modversion['config'][22]['default'] = 10;
$modversion['config'][22]['options'] = array('5 d�as'=>5,'10 d�as'=>10,'15 d�as'=>15,'20 d�as'=>20,'30 d�as'=>30);

// Formato de fecha
$modversion['config'][23]['name'] = 'dateformat';
$modversion['config'][23]['title'] = '_MI_RMDP_DATEFORMAT';
$modversion['config'][23]['description'] = '';
$modversion['config'][23]['formtype'] = 'textbox';
$modversion['config'][23]['valuetype'] = 'text';
$modversion['config'][23]['default'] = 'd/m/Y';

// Numero de descargas para considerar un elemento como popular
$modversion['config'][24]['name'] = 'popular_needs';
$modversion['config'][24]['title'] = '_MI_RMDP_POPULARNEEDS';
$modversion['config'][24]['description'] = '';
$modversion['config'][24]['formtype'] = 'textbox';
$modversion['config'][24]['valuetype'] = 'int';
$modversion['config'][24]['default'] = 100;

// Permitir a los usuarios anonimos votar
$modversion['config'][25]['name'] = 'uservote';
$modversion['config'][25]['title'] = '_MI_RMDP_USERVOTE';
$modversion['config'][25]['description'] = '';
$modversion['config'][25]['formtype'] = 'yesno';
$modversion['config'][25]['valuetype'] = 'int';
$modversion['config'][25]['default'] = 0;

// Abrir descargas en nueva ventana
$modversion['config'][26]['name'] = 'newwindow';
$modversion['config'][26]['title'] = '_MI_RMDP_OPENWINDOW';
$modversion['config'][26]['description'] = '';
$modversion['config'][26]['formtype'] = 'select';
$modversion['config'][26]['valuetype'] = 'int';
$modversion['config'][26]['default'] = 0;
$modversion['config'][26]['options'] = array(_MI_RMDP_OPENSAME=>0,_MI_RMDP_OPENNEW=>1);

// Columnas para las pantallas de descargas
$modversion['config'][27]['name'] = 'shotcols';
$modversion['config'][27]['title'] = '_MI_RMDP_SHOTCOLS';
$modversion['config'][27]['description'] = '';
$modversion['config'][27]['formtype'] = 'select';
$modversion['config'][27]['valuetype'] = 'int';
$modversion['config'][27]['default'] = 3;
$modversion['config'][27]['options'] = array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5);

// N�mero de descargas populares a mostrar
$modversion['config'][28]['name'] = 'toppop';
$modversion['config'][28]['title'] = '_MI_RMDP_TOPPOP';
$modversion['config'][28]['description'] = '';
$modversion['config'][28]['formtype'] = 'textbox';
$modversion['config'][28]['valuetype'] = 'int';
$modversion['config'][28]['default'] = 20;

// N�mero de descargas populares a mostrar
$modversion['config'][29]['name'] = 'toprate';
$modversion['config'][29]['title'] = '_MI_RMDP_TOPRATE';
$modversion['config'][29]['description'] = '';
$modversion['config'][29]['formtype'] = 'textbox';
$modversion['config'][29]['valuetype'] = 'int';
$modversion['config'][29]['default'] = 20;

// Enviar notificaci�n por email cuando se recibe una descarga
$modversion['config'][30]['name'] = 'senmail';
$modversion['config'][30]['title'] = '_MI_RMDP_SENDMAIL';
$modversion['config'][30]['description'] = '';
$modversion['config'][30]['formtype'] = 'yesno';
$modversion['config'][30]['valuetype'] = 'int';
$modversion['config'][30]['default'] = 1;

// cuerpo del email de configmraci�n para usuarios
$modversion['config'][31]['name'] = 'bodymail';
$modversion['config'][31]['title'] = '_MI_RMDP_BODYMAIL';
$modversion['config'][31]['description'] = '';
$modversion['config'][31]['formtype'] = 'textarea';
$modversion['config'][31]['valuetype'] = 'text';

// Comentarios
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = 'id';
$modversion['comments']['pageName'] = 'down.php';
$modversion['comments']['extraParams'] = array('cid');
// Comment callback functions
$modversion['comments']['callbackFile'] = 'include/rmdp_comments.php';
$modversion['comments']['callback']['approve'] = 'rmdp_com_approve';
$modversion['comments']['callback']['update'] = 'rmdp_com_update';

?>
