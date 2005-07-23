<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: admin.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                  //
// ------------------------------------------------------------------------ //
//                 RM+SOFT - Control de Servicios                           //
//        Copyright Red M�xico Soft � 2005. (Eduardo Cort�s)                //
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
//////////////////////////////////////////////////////////////////////////////

define('_AM_CATEGOS','Categor�as');
define('_AM_SERVICES','Servicios');
define('_AM_PROMOS','Promociones');
define('_AM_BANNERS','Banners');
define('_AM_PROMOV','Ventas de Promociones');
define('_AM_SERVICEV','Ventas de Servicios');
define('_AM_PANEL','Panel de Control');
define('_AM_SEND','Enviar');
define('_AM_CANCEL','Cancelar');
define('_AM_DELETE','Eliminar');
define('_AM_MODIFY','Modificar');
define('_AM_OPTIONS','Opciones');
define('_AM_FORMNAME','Nombre:');
define('_AM_FORMCODE','C&oacute;digo:');
define('_AM_YES','S&iacute;');
define('_AM_NO','No');
define('_AM_ERRNEXT','Ocurrio el siguiente error:<br>');
define('_AM_VIEW','Ver');
define('_AM_SRV_TERMS','T�rminos');
define('_AM_HELP','Ayuda');

if ($location=='categos'){
	define('_AM_NEWFORM','Crear una categor�a');
	define('_AM_MODIFYFORM','Modificar Categor�a');
	define('_AM_FORMIMG','Im�gen de la Categor�a:');
	define('_AM_DESC','Descripci�n:');
	define('_AM_NOCATEGOS','No existen categor�as a�n. Por favor crea una.');
	define('_AM_ERRNAME','ERROR: No has especificado el nombre de la categor&iacute;a');
	define('_AM_ERRDESC','ERROR: No has escrito una descripci�n para esta categor�a');
	define('_AM_ERREXIST','ERROR: Ya existe una categor�ia con el mismo nombre');
	define('_AM_ERRNEXT','Ocurrio el siguiente error:<br>');
	define('_AM_CATEGOOK','Categor&iacute;a creada correctamente');
	define('_AM_INFOIMG','Las im�genes deben existir en '.XOOPS_ROOT_PATH.'/modules/rmservices/images/categos/');
	define('_AM_CATEGOLIST','Lista de Categor&iacute;as');
	define('_AM_NOEXIST','No existe la categor�a especificada');
	define('_AM_CONFIRMDEL','�Realmente deseas eliminar esta categor&iacute;a?');
	define('_AM_DELETED','Categor&iacute;a eliminada correctamente');
	define('_AM_NEWCATEGO','Crear Nueva Categor&iacute;a');
	define('_AM_NOTDELETE','Lo siento, esta categor�a no se puede eliminar debido a<br>que contiene Servicios. Primero elimina los servicios dentro de esta categor�a');
	define('_AM_SERVICESIN','Servicios en - %s -');
	define('_AM_ACTIVE','Activo');
	define('_AM_INACTIVE','Inactivo');
}

if ($location=='services'){
	define('_AM_NEWSERVICE','Crear nuevo Servicio');
	define('_AM_FORMCATEGO','Categor&iacute;a:');
	define('_AM_SELECTCAT','Selecciona...');
	define('_AM_FORMPRICE','Precio:');
	define('_AM_FORMPRE','Requiere Presupuesto:');
	define('_AM_SRV_HAVETERMS','Mostrar T�rminos de Servicio:');
	define('_AM_ALL_TERMS','T�rminos Existentes');
	define('_AM_ASSIGNED_TERMS','T�rminos de: "%s"');
	define('_AM_CHKPAYPAL','Comprobar pago PayPal&reg; Localmente:');
	define('_AM_PAYPALURL','URL externa para comprobar el pago:');
	define('_AM_SHORTDESC','Descripci&oacute;n Corta:');
	define('_AM_LONGDESC','Descripci&oacute;n Amplia:');
	define('_AM_FORMIMG','Im�gen:');
	define('_AM_SHOWINBLOCK','Mostrar en Bloque:');
	define('_AM_FORMACTIVE','Activar Servicio:');
	define('_AM_ERRNAME','ERROR: No has escrito el nombre para el Servicio');
	define('_AM_ERRCAT','ERROR: No has seleccionado una categor�a para este servicio');
	define('_AM_ERRPRICE','ERROR: El precio de este servicio no puede ser menor que cero');
	define('_AM_ERRCODE','ERROR: No has escrito el c�digo para el servicio');
	define('_AM_ERRFORM','ERROR: No has especificado elementos para el formulario de compra');
	define('_AM_ERRSDESC','ERROR: No has escrito una descripci�n corta para el servicio');
	define('_AM_ERRLDESC','ERROR: No has escrito una descripci�n amplia para el servicio');
	define('_AM_ERREXIST','Ya existe un servicio con el mismo nombre dentro de la misma categor�a');
	define('_AM_TERMS_EXIST','Estos t�rminos han sido agregados al servicio previamente');
	define('_AM_TERM_ADDED','T�rmino asignado correctamente');
	define('_AM_TERMS_DELETED','T�rminos eliminados del servicio');
	define('_AM_SERVICEOK','Servicio creado correctamente');
	define('_AM_SERVICEMODOK','Servicio modificado correctamente');
	define('_AM_SERVICESLIST','Lista de Servicios Existentes');
	define('_AM_ACTIVE','Activo');
	define('_AM_INACTIVE','Inactivo');
	define('_AM_CARACTS','Caracter�sticas');
	define('_AM_SRVNAME','Nombre del Servicio');
	define('_AM_SRVSTATUS','Estado');
	define('_AM_SRVPRICE','Precio');
	define('_AM_DELETED','Servicio eliminado correctamente');
	define('_AM_SRVNOEXIST','No existe el servicio especificado');
	define('_AM_CONFIRMDEL','�Realmente deseas eliminar este Servicio junto con <br>sus caracter�sticas y banners?');
	define('_AM_NOTDELETE','Lo siento, este servicio no se puede eliminar por las siguientes razones:<br><br>');
	define('_AM_INPROMO','Este servicio pertenece a una promoci�n');
	define('_AM_INSALES','Existen registros de venta para este servicio');
	define('_AM_EXISTCAR','Caracter�sticas Existentes en "%s"');
	define('_AM_ALLCARACT','Caracter�sticas Existentes');
	define('_AM_ADD','Agregar');
	define('_AM_NEWCAR','Nueva Caracter�stica');
	define('_AM_MODCAR','Modificar Caracter�stica');
	define('_AM_ERRNAMECAR','ERROR: No has escrito el nombre para la categor&iacute;a');
	define('_AM_ERRSDESCCAR','ERROR: No has escrito una descripci�n corta para esta caracteristica');
	define('_AM_ERRLDESCCAR','ERROR: No has escrito una descripci�n amplia para esta caracteristica');
	define('_AM_ERRLCAREXIST','ERROR: Ya existe esta caracter�stica');
	define('_AM_ALREADYADD','Esa caracter�stica ha sido agregada previamente');
	define('_AM_CARDELSOK','Caracter�stica eliminada del servicio correctamente');
	define('_AM_CARACTOK','Caracter�stica creada correctamente');
	define('_AM_CARNOEXIST','No existe la caracter�stica especificada');
	define('_AM_CARMODOK','Caracter�stica modificada correctamente');
	define('_AM_CONFIRMDELCAR','�Realmente deseas eliminar esta Caracter�stica?');
	define('_AM_CARDELETED','Caracter�stica eliminada correctamente');
	define('_AM_CAROK','Caracter&iacute;stica agregada correctamente');
	define('_AM_FORM','Campos de formulario de solicitud:');
	define('_AM_FORM_TIP','Los campos se crean en el siguiente formato: Texto del Campo{/}Campo. Por ejemplo: Nombre {/} &lt;input type="text" name="nombre" size="30"&gt;');
}

if ($location=='promos'){
	define('_AM_NEWPROMO','Crear Nueva Promoci&oacute;n');
	define('_AM_FORMNAME','Nombre:');
	define('_AM_FORMPRICE','Precio:');
	define('_AM_FORMIMG','Im�gen:');
	define('_AM_SHORTDESC','Descripci&oacute;n Corta:');
	define('_AM_LONGDESC','Descripci&oacute;n Amplia:');
	define('_AM_CHKPAYPAL','Comprobar pago PayPal&reg; Localmente:');
	define('_AM_PAYPALURL','URL externa para comprobar el pago:');
	define('_AM_SHOWINBLOCK','Mostrar en Bloque:');
	define('_AM_FORMACTIVE','Activar Promoci�n:');
	define('_AM_ERRNAME','ERROR: No especificaste el nombre de la promoci&oacute;n');
	define('_AM_ERRCODE','ERROR: No especificaste el c&oacute;digo de la promoci&oacute;n');
	define('_AM_ERRPRICE','ERROR: El precio de la promoci&oacute;n no puede ser menor que cero');
	define('_AM_ERRSDESC','ERROR: No escribiste una descripci&oacute;n corta para esta promoci&oacute;');
	define('_AM_ERRLDESC','ERROR: No escribiste una descripci&oacute;n amplia para esta promoci&oacute;n');
	define('_AM_PROMOEXIST','Ya existe la promoci&oacute;n especificada');
	define('_AM_PROMOOK', 'Promoci�n creada correctamente');
	define('_AM_PROMOMODOK', 'Promoci�n modificada correctamente');
	define('_AM_PROMOSLIST','Lista de Promociones Existentes');
	define('_AM_PROMONAME','Nombre de la Promoci&oacute;n');
	define('_AM_PROMOPRICE','Precio');
	define('_AM_PROMOSTATUS','Estado');
	define('_AM_ACTIVE','Activo');
	define('_AM_INACTIVE','Inactivo');
	define('_AM_SERVS','Servicios');
	define('_AM_NOEXIST','No existe la promoci�n especificada');
	define('_AM_PROMOINSALES','Lo siento, no es posible eliminar esta promoci�n debido<br>a que existen registros de ventas para ella.');
	define('_AM_CONFIRMDEL','�Realmente deseas eliminar esta promoci�n?');
	define('_AM_EXISTSERVICES','Servicios Existentes');
	define('_AM_ADDSERVICE','Agregar Servicio');
	define('_AM_ASSIGNED','Servicios Asignados');
	define('_AM_ERRSERVICE','No especificaste ning�n servicio');
	define('_AM_SRVNOEXIST','No existe el servicio especificado');
	define('_AM_ADDSERVOK','Servicio agregado correctamente');
	define('_AM_DELSERVOK','Servicio eliminado correctamente de esta promoci�n');
	define('_AM_RELATION_EXIST','Este producto ya ha sido asignado a esta promoci�n');
}

if ($location=='banners'){
	define('_AM_NEWBANN','Crear Nuevo Banner');
	define('_AM_MODBANN','Modificar Banner');
	define('_AM_FORMSERV','Servicio:');
	define('_AM_SELECTSRV','Selecciona un servicio...');
	define('_AM_FORMIMG','Im�gen:');
	define('_AM_DESC','Texto del Banners:');
	define('_AM_SHOWBUY','Mostrar v�nculo de compra directa');
	define('_AM_SHOWBORDER','Mostrar borde de tabla en el banner');
	define('_AM_ERRSRV','ERROR: No has seleccionado un servicio');
	define('_AM_ERRIMG','ERROR: No has especificado un URL para la im�gen');
	define('_AM_BANNOK','El banner ha sido creado correctamente');
	define('_AM_BANNMODOK','El banner ha sido modificado correctamente');
	define('_AM_BANNDELOK','El banner ha sido eliminado correctamente');
	define('_AM_BANNLIST','Lista de Banners Existentes');
	define('_AM_NOEXIST','No existe el banner especificado');
	define('_DEL_CONFIRM','�Realmente deseas eliminar este banner?');
}

if ($location=='sales'){
	define('_AM_PROMOS_LIST','Venta de Promociones');
	define('_AM_SERVS_LIST','Venta de Servicios');
}

if ($location=='terminos'){
	define('_AM_ERROR_NOTITLE','ERROR: NO especificaste el t�tulo');
	define('_AM_ERROR_NOTEXT','ERROR: No has escrito el texto de los t�rminos');
	define('_AM_ERROR_EXIST','ERROR: Ya existen t�rminos con el mismo t�tulo');
	define('_AM_ERROR_NOEXIST','ERROR: No existen los t�rminos especificados');
	define('_AM_TERMS_OK','T�rminos creados correctamente');
	define('_AM_TERMS_MODOK','T�rminos modificados correctamente');
	define('_AM_TERM_LIST','Terminos Existentes');
	define('_AM_TERMS_NEW','Crear Nuevos T�rminos');
	define('_AM_TERMS_MOD','Modificar T�rminos');
	define('_AM_TERM_TITLE','T�tulo descriptivo:');
	define('_AM_TERMS_TEXT','Texto Completo:');
	define('_AM_TERM_CONFIRMDEL','�Realmente deseas eliminar estos t�rminos?');
	define('_AM_TERMS_DELETED','Terminos eliminados');
}
?>
