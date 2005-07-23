<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: main.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                   //
// ------------------------------------------------------------------------ //
//                 RM+SOFT - Control de Servicios                           //
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
// Para Desarrollo de módulos, Diseño de temas para XOOPS y otros servicios //
// dirigete a http://www.redmexico.com.mx                                   //
//////////////////////////////////////////////////////////////////////////////

define('_MM_PRICE','Precio:');
define('_MM_PROMOS','Promociones Actuales');
define('_MM_LNGSERVICES','Servicios');
define('_MM_LNGPROMOS','Promociones');
define('_MM_CONVERT_CUR','¿Cuanto es en mi moneda local? (valor aproximado)');

if ($location=='index'){
	define('_MM_OURSERVICES','Nuestros Servicios');
}elseif($location=='servicios'){
	define('_MM_NOEXIST','No existe el servicio especificado');
	define('_MM_CARACT','Caracter&iacute;sticas del Servicio');
	define('_MM_CONTACT','Contáctanos para recibir mas detalles');
	define('_MM_PRESUP','Requiere Presupuesto');
}elseif($location=='caracts'){
	define('_MM_NOEXIST','No existe la característica especificada');
	define('_MM_YOUARE','Estas en:');
}elseif($location=='promos'){
	define('_MM_NOEXIST','No existe la promoción especificada');
	define('_MM_CONTACT','Contáctanos para recibir mas detalles');
	define('_MM_INCLUDED','Servicios Incluidos');
	define('_MM_LIST','Lista de Promociones');
}elseif($location=='order'){
	define('_MM_NOT_FOUND','No se encontró el elemento seleccionado');
	define('_MM_SRV_NAME','Nombre del Servicio:');
	define('_MM_PROMO_NAME','Nombre de la Promoción:');
	define('_MM_ITEM_CODE','Código:');
	define('_MM_FORM_TITLE','Formulario de solicitud');
	define('_MM_ITEM_MAIL','Email de contacto');
	define('_MM_ORDER_SEND','Tu solicitud ha sido enviada. En breve recibirás información nuestra');
	define('_MM_RMSRV_ACCEPT','Por favor antes de solicitar información lea los términos de servicio.');
	define('_MM_RMSRV_PROMOACCEPT','Por favor antes de enviar su solicitud por favor lea los términos de servicio incluidos en esta promoción.');
	define('_MM_TERMS_FOR','Términos de Servicio para %s');
	define('_RMDP_ERRORS_HAPPEND','Ocurrieron los siguientes errores:');
	define('_RMDP_MUSTBE_NUM','debe contener un n&uacute;mero');
	define('_RMDP_IS_EMPTY','no ha sido completado');
}
?>
