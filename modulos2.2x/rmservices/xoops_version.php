<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: xoops_version.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $          //
// ------------------------------------------------------------------------ //
//            RM+SOFT - Servicios y Productos en Línea                      //
//        Copyright Red México Soft © 2005. (Eduardo Cortés)                //
//                  <http:www.redmexico.com.mx/>                            //
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
// bajo los términos de al GNU General Public Licencse como ha sido         //
// publicada por The Free Software Foundation (Fundación de Software Libre; //
// en cualquier versión 2 de la Licencia o mas reciente.                    //
//                                                                          //
// Este programa es distribuido esperando que sea últil pero SIN NINGUNA    //
// GARANTÍA. Ver The GNU General Public License para mas detalles.          //
// ------------------------------------------------------------------------ //
// Questions, Bugs or any comment plese write me                            //
// Preguntas, errores o cualquier comentario escribeme                      //
// <adminone@redmexico.com.mx>                                              //
// ------------------------------------------------------------------------ //
//////////////////////////////////////////////////////////////////////////////

$modversion['name'] = "RM+SOFT Services";
$modversion['version'] = "1.0 Beta";
$modversion['description'] = "Sistema de Servicios";
$modversion['author'] = "Eduardo Cortés (AdminOne) http://www.redmexico.com.mx";
$modversion['credits'] = "AdminOne";
$modversion['help'] = "http://www.xoops-mexico.net/modules/rmlib/books.php?book=7";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 0;
$modversion['image'] = "images/logo.png";
$modversion['dirname'] = "rmservices";

$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

// Tablas
$modversion['tables'][0] = "rmsrv_banners";
$modversion['tables'][1] = "rmsrv_caract";
$modversion['tables'][2] = "rmsrv_promos";
$modversion['tables'][3] = "rmsrv_promosrel";
$modversion['tables'][4] = "rmsrv_servicios";
$modversion['tables'][5] = "rmsrv_carrel";
$modversion['tables'][6] = "rmsrv_categos";
$modversion['tables'][7] = "rmsrv_terminos";

// Seccion de Administrador
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

$modversion['hasMain'] = 1;

// Datos de depósito bancario
$modversion['config'][1]['name'] = 'bankcheck';
$modversion['config'][1]['title'] = '_MI_BANKCHECK';
$modversion['config'][1]['description'] = '';
$modversion['config'][1]['formtype'] = 'textarea';
$modversion['config'][1]['valuetype'] = 'text';
$modversion['config'][1]['default'] = "";

// Formato de Moneda
$modversion['config'][2]['name'] = 'money';
$modversion['config'][2]['title'] = '_MI_MONEY';
$modversion['config'][2]['description'] = '';
$modversion['config'][2]['formtype'] = 'textbox';
$modversion['config'][2]['valuetype'] = 'text';
$modversion['config'][2]['default'] = "en_US";

$modversion['config'][3]['name'] = 'formatmoney';
$modversion['config'][3]['title'] = '_MI_MONEYFORMAT';
$modversion['config'][3]['description'] = '';
$modversion['config'][3]['formtype'] = 'textbox';
$modversion['config'][3]['valuetype'] = 'text';
$modversion['config'][3]['default'] = "%i";

$modversion['config'][4]['name'] = 'secondmoney';
$modversion['config'][4]['title'] = '_MI_SECONDMONEY';
$modversion['config'][4]['description'] = '';
$modversion['config'][4]['formtype'] = 'textbox';
$modversion['config'][4]['valuetype'] = 'text';
$modversion['config'][4]['default'] = "es_MX";

$modversion['config'][5]['name'] = 'formatsecondmoney';
$modversion['config'][5]['title'] = '_MI_SECONDMONEYFORMAT';
$modversion['config'][5]['description'] = '';
$modversion['config'][5]['formtype'] = 'textbox';
$modversion['config'][5]['valuetype'] = 'text';
$modversion['config'][5]['default'] = "%.2n";

/* Canversión de Moneda */
$modversion['config'][6]['name'] = 'changetype';
$modversion['config'][6]['title'] = '_MI_CHANGETYPE';
$modversion['config'][6]['description'] = '';
$modversion['config'][6]['formtype'] = 'textbox';
$modversion['config'][6]['valuetype'] = 'text';
$modversion['config'][6]['default'] = "1.0";

// Promociones en la página principal
$modversion['config'][7]['name'] = 'promosnum';
$modversion['config'][7]['title'] = '_MI_PROMOSNUM';
$modversion['config'][7]['description'] = '';
$modversion['config'][7]['formtype'] = 'textbox';
$modversion['config'][7]['valuetype'] = 'int';
$modversion['config'][7]['default'] = "2";

// PInformación antes de comprar
$modversion['config'][8]['name'] = 'buyinfo';
$modversion['config'][8]['title'] = '_MI_BUYINFO';
$modversion['config'][8]['description'] = '';
$modversion['config'][8]['formtype'] = 'textarea';
$modversion['config'][8]['valuetype'] = 'text';
$modversion['config'][8]['default'] = "";

// PInformación antes de comprar
$modversion['config'][9]['name'] = 'linkcontact';
$modversion['config'][9]['title'] = '_MI_LNKCONTACT';
$modversion['config'][9]['description'] = '';
$modversion['config'][9]['formtype'] = 'textbox';
$modversion['config'][9]['valuetype'] = 'text';
$modversion['config'][9]['default'] = "";

// Email de la cuenta de PayPal®
$modversion['config'][10]['name'] = 'business';
$modversion['config'][10]['title'] = '_MI_BUSINESS';
$modversion['config'][10]['description'] = '';
$modversion['config'][10]['formtype'] = 'textbox';
$modversion['config'][10]['valuetype'] = 'text';
$modversion['config'][10]['default'] = "";

// Email de la cuenta de PayPal®
$modversion['config'][11]['name'] = 'mailorder';
$modversion['config'][11]['title'] = '_MI_MAIL_ORDER';
$modversion['config'][11]['description'] = '';
$modversion['config'][11]['formtype'] = 'textbox';
$modversion['config'][11]['valuetype'] = 'text';
$modversion['config'][11]['default'] = "";

// Email de la cuenta de PayPal®
$modversion['config'][12]['name'] = 'subject';
$modversion['config'][12]['title'] = '_MI_MAIL_SUBJECT';
$modversion['config'][12]['description'] = '';
$modversion['config'][12]['formtype'] = 'textbox';
$modversion['config'][12]['valuetype'] = 'text';
$modversion['config'][12]['default'] = "";

// Email de la cuenta de PayPal®
$modversion['config'][13]['name'] = 'mailbody';
$modversion['config'][13]['title'] = '_MI_MAIL_BODY';
$modversion['config'][13]['description'] = '';
$modversion['config'][13]['formtype'] = 'textarea';
$modversion['config'][13]['valuetype'] = 'text';
$modversion['config'][13]['default'] = "";

// Email de la cuenta de PayPal®
$modversion['config'][14]['name'] = 'mailbodyadmin';
$modversion['config'][14]['title'] = '_MI_MAIL_BODYADMIN';
$modversion['config'][14]['description'] = '';
$modversion['config'][14]['formtype'] = 'textarea';
$modversion['config'][14]['valuetype'] = 'text';
$modversion['config'][14]['default'] = "";

// Templates
$modversion['templates'][1]['file'] = 'rmsrv_index.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'rmsrv_servicios.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = 'rmsrv_caracts.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = 'rmsrv_promos.html';
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file'] = 'rmsrv_verify.html';
$modversion['templates'][5]['description'] = '';
$modversion['templates'][5]['file'] = 'rmsrv_order.html';
$modversion['templates'][5]['description'] = '';

// Bloques
$modversion['blocks'][1]['file'] = "rmsrv_srvs.php";
$modversion['blocks'][1]['name'] = _MI_BSERVICE;
$modversion['blocks'][1]['description'] = _MI_BSERVICE_DESC;
$modversion['blocks'][1]['show_func'] = "b_show_rmsrv_service";
$modversion['blocks'][1]['edit_func'] = "bedit_service";
$modversion['blocks'][1]['options'] = "2|0|0";
$modversion['blocks'][1]['template'] = 'rmsrv_service.html';

$modversion['blocks'][2]['file'] = "rmsrv_promos.php";
$modversion['blocks'][2]['name'] = _MI_BPROMOS;
$modversion['blocks'][2]['description'] = _MI_BPROMOS_DESC;
$modversion['blocks'][2]['show_func'] = "b_show_rmsrv_promos";
$modversion['blocks'][2]['edit_func'] = "bedit_promos";
$modversion['blocks'][2]['options'] = "2|0|0";
$modversion['blocks'][2]['template'] = 'rmsrv_block_promos.html';

$modversion['blocks'][3]['file'] = "rmsrv_banners.php";
$modversion['blocks'][3]['name'] = _MI_BBANNERS;
$modversion['blocks'][3]['description'] = _MI_BBANNERS_DESC;
$modversion['blocks'][3]['show_func'] = "b_show_rmsrv_banners";
$modversion['blocks'][3]['template'] = 'rmsrv_block_banners.html';
?>


