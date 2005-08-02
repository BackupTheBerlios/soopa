<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: main.php,v 1.1 2005/08/02 05:41:21 mauriciodelima Exp $                    //
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
//  bajo los t&eacute;rminos de al GNU General Public Licencse como ha sido  //
//  publicada por The Free Software Foundation (Fundaci&oacute;n de Software Libre; //
//  en cualquier versi&oacute;n 2 de la Licencia o mas reciente.                    //
//                                                                           //
//  Este programa es distribuido esperando que sea &uacute;ltil pero		 //
//	SIN NINGUNA GARANTÍA. Ver The GNU General Public License para mas 		 //
//	detalles.          														 //
//  ------------------------------------------------------------------------ //
//  Questions, Bugs or any comment plese write me                            //
//  Preguntas, errores o cualquier comentario escribeme                      //
//  <adminone@redmexico.com.mx>                                              //
//  ------------------------------------------------------------------------ //
//                                                                           //
///////////////////////////////////////////////////////////////////////////////
global $rmdp_location;

define('_RMDP_DOWNLOAD_NOW','Descargar Ahora');
define('_RMDP_DOWNLOAD_TODAY','Descarga de Hoy');
define('_RMDP_THENEW_INCAT','Lo nuevo en: %s');
define('_RMDP_SEALL_INCAT','Ver Todo');
define('_RMDP_MORE_DOWNLOADS','Mas Descargas');
define('_RMDP_POPULAR','Popular');
define('_RMDP_BEST_RATED','Mejor Valorado');
define('_RMDP_FORUMS','Foros');
define('_RMDP_OUR_FAVORITES','Nuestros Favoritos');
define('_RMDP_POPULAR_SOFT','Software Popular');
define('_RMDP_FAVORITE_TEXT','Aqui te mostramos %s descargas gratuitas que te gustar&aacute;n');
define('_RMDP_SPONSOR_NEWS','Novedades Destacadas');
define('_RMDP_TOTAL_RESULTS','%s - %s de %s');
define('_RMDP_RESULT_PAGES','P&aacute;gina: ');
define('_RMDP_VOTES','(%s votos)');
define('_RMDP_NEW_DOWN','Nuevo');
define('_RMDP_UPDATE_DOWN','Actualizado');
define('_RMDP_ERR_ACCESS','Lo sentimos, no tiene acceso a esta categor&iacute;a');

/**
 * Cadenas para la barra de busqueda
 */
define('_RMDP_ALL_WEB','Buscar en todo %s');
define('_RMDP_SEARCH_BUTTON','Buscar');
define('_RMDP_VIEW_FAV','Ver Favoritos');
define('_RMDP_VIEW_POP','Ver Popular');
define('_RMDP_VIEW_RATED','Ver Mejor Valorado');
define('_RMDP_SUBMIT_DOWN','Enviar Descargas');

/**
* Cadenas para los resultados
**/
define('_RMDP_SUBCATEGOS_IN','Subcategor&iacute;as en "%s"');
define('_RMDP_DOWNS_INCATEGO','Descargas en %s');
define('_RMDP_RESORT_BY','Ordenar por:');
define('_RMDP_ORDER_NAME','Nombre');
define('_RMDP_ORDER_DATE','Fecha');
define('_RMDP_ORDER_RATING','Rating');
define('_RMDP_ORDER_OURRATING','Nuestro Rating');
define('_RMDP_ORDER_DOWNLOADS','Descargas');
define('_RMDP_ORDER_SUBMITTER','Envi&oacute;');
define('_RMDP_OS','SO:');
define('_RMDP_VERSION','Versi&oacute;n:');
define('_RMDP_FILE_SIZE','Tama&ntilde;o:');
define('_RMDP_LICENCE','Licencia:');
define('_RMDP_SPONSORED','DESTACADO');
define('_RMDP_VIEW_SHOT','Ver Pantallas');
	
if($rmdp_location=='downloads'){

	define('_RMDP_DOWNLOADS','Descargas:');
	define('_RMDP_WEB_SITE','Sitio Web:');
	define('_RMDP_DATE','Fecha:');
	define('_RMDP_LICENCE','Licencia:');
	define('_RMDP_OS','Plataformas:');
	define('_RMDP_SCREEN_SHOT','Capturas de Pantalla');
	define('_RMDP_SEND_BY','Enviado por:');
	define('_RMDP_USER_RATING','Rating de Usuarios:');
	define('_RMDP_VOTE','Votar');
	define('_RMDP_OUR_RATING','Nuestro Rating:');
	define('_RMDP_SIZE','Tama&ntilde;o:');
	define('_RMDP_USER_COMMENTS','Comentarios de Usuarios');
	define('_RMDP_EDITOR_COM','Comentario de %s');
	define('_RMDP_PUBLISHER_DESC','Descripci&oacute;n de %s');
	define('_RMDP_REPORT_BROKEN','Reportar enlace roto');
	
	define('_RMDP_ERR_NOTFOUND','No se encontr&oacute; el archivo solicitado');
	define('_RMDP_ERR_NOACCESS','Lo sentimos, debes registrarte para poder descargar este archivo');

	define('_DOWNLOAD_IN_PROGRESS','DESCARGA EN PROGRESO');
	define('_RMDP_CLICK_HERE','Si la descarga no inicia autom&aacute;ticamente haz <a href="%s" target="_blank">click aqu&iacute;</a>');
	define('_RMDP_WHILE_DOWN','La descarga se abrir&aacute; en una nueva ventana. Puedes seguir navegando mientras tu descarga termina');

} elseif ($rmdp_location=='votos'){

	define('_RMDP_NO_ACCESS','Lo sentimos, debes registrarte para poder votar');
	define('_RMDP_IS_PUBLISHER','Lo sentimos, no puedes votar por tus propias descargas');
	define('_RMDP_VOTE_ONEDAY','Solo puedes votar una vez por dia por el mismo recurso');
	define('_RMDP_VOTE_THX','Gracias por tu voto. Por favor agrega un comentario acerca de este recurso');
	define('_RMDP_VOTE_ERR','Ocurrio un error al registrar tu voto, por favor vuelve a intentarlo');
	define('_RMDP_NOVOTE_TWICE','No puedes votar dos veces por el mismo recurso');

} elseif ($rmdp_location=='shots'){

	define('_RMDP_LOCATION_SHOT','Pantallas');
	define('_RMDP_DOWN_SHOTS','Pantallas de %s');
	define('_RMDP_ERR_NOTFOUND','No se encontr&oacute; la pantalla especificada');

} elseif ($rmdp_location=='popular'){
	define('_RMDP_POPULAR_TITLE','Descargas Populares');
	define('_RMDP_TOP_POP','Nuestras <strong>%s</strong> descargas mas populares');
} elseif ($rmdp_location=='favoritos'){
	define('_RMDP_TOP_FAVS','Nuestro Software Favorito');
	define('_RMDP_FAVORITE_TITLE','Nuestros Favoritos');
}  elseif ($rmdp_location=='mejorval'){

	define('_RMDP_RATED_TITLE','Descargas Mejor Valoradas');
	define('_RMDP_TOP_RATE','Las <strong>%s</strong> Descargas mejor valoradas');
	
} elseif ($rmdp_location=='submit'){
	
	define('_RMDP_SUBMIT_INACTIVE','Lo sentimos, el env&iacute;o de descargas esta deshabilitado por el momento');
	define('_RMDP_REGISTER_FORSUBMIT','Para poder enviar descargas necesitas estar registrado');
	define('_RMDP_FNAME','Nombre:');
	define('_RMDP_FVERSION','Versi&oacute;n:');
	define('_RMDP_FLIC','Licencia:');
	define('_RMDP_FFILE','Archivo:');
	define('_RMDP_FIMAGE','Im&aacute;gen:');
	define('_RMDP_FIMAGETIP','La im&aacute;gen debe tener %s pix. de ancho');
	define('_RMDP_FCATEGO','Categor&iacute;a:');
	define('_RMDP_FDESC','Descripci&oacute;n:');
	define('_RMDP_FDESCTIP','Por favor incluye los detalles de tu descarga (caracter&iacute;sticas, diferencias, etc)');
	define('_RMDP_FSIZE','Tama&ntilde;o en bytes:');
	define('_RMDP_FANONIM','Permitir descargas an&oacute;nimas:');
	define('_RMDP_FWEB','T&iacute;tulo del Sitio del Autor:');
	define('_RMDP_FURL','URL del autor:');
	define('_RMDP_SEND','Enviar Descarga');
	define('_RMDP_OSS','Plataformas:');
	define('_RMDP_YES','S&iacute;');
	define('_RMDP_NO','No');
	define('_RMDP_FORM_TITLE','Enviar Descarga');
	define('_RMDP_SUBMIT_INFO','Todas las descargas son sujetas a aprobaci&oacute;n por parte del equipo de <strong>%s</strong>.');
	define('_RMDP_SUBMIT_INFO2','Cuado tu descarga sea aprobada recibir&aacute;s un email de confirmaci&oacute;n con un enlace para que puedes editar los par&aacute;metros de tu descarga');
	
	// Cadenas de Errores y redirecciones
	define('_RMDP_ERRORS_HAPPEND','Ocurrieron los siguientes errores:');
	define('_RMDP_MUSTBE_NUM','debe contener un n&uacute;mero');
	define('_RMDP_IS_EMPTY','no ha sido completado');
	define('_RMDP_PLEASE_FILL', 'Por favor completa los campos requeridos');
	define('_RMDP_NAME_EXIST', 'Ya existe una descarga con un el mismo nombre');
	define('_RMDP_SENDOK','Tu descarga ha sido enviada correctamente, gracias');
	define('_RMDP_SENDFAIL','Ocurrio un error al enviar tu descarga. Por favor vuelve a intentarlo.');
	define('_RMDP_MAIL_SUBJECT','Envio de nueva descarga');
	define('_RMDP_MAIL_BODY','Un usuario ha enviado una nueva descarga.\n\nPara revisar los detalles de esta descarga:\n\n%s');

} elseif ($rmdp_location=='mysends'){
	
	define('_RMDP_FIRST_LOGIN','Ingresa con tu nombre de usuario y contrase&ntilde;a para poder ver tus descargas');
	define('_RMDP_NOHAVE_DOWNS','No has enviado ninguna descarga');
	define('_RMDP_MY_SENDS','Mis descargas');
	define('_RMDP_MODIFY_DOWN','Modificar');
	define('_RMDP_DELETE_DOWN','Eliminar');
	define('_RMDP_NAME_DOWN','Nombre');
	define('_RMDP_DATE_DOWN','Fecha');
	define('_RMDP_DOWNS_DOWN','Descargas');
	define('_RMDP_OPTIONS_DOWN','Opciones');
	define('_RMDP_ERR_NOTFOUND','No se encontr&oacute; la descarga especificada');
	define('_RMDP_NOT_OWNER','Lo siento, tu no eres el publicador de esta descarga');
	define('_RMDP_FORM_TITLE', 'Modificar Descarga');
	define('_RMDP_FNAME','Nombre:');
	define('_RMDP_FVERSION','Versi&oacute;n:');
	define('_RMDP_FLIC','Licencia:');
	define('_RMDP_FFILE','Archivo:');
	define('_RMDP_FIMAGE','Im&aacute;gen:');
	define('_RMDP_FIMAGETIP','La im&aacute;gen debe tener %s pix. de ancho');
	define('_RMDP_FCATEGO','Categor&iacute;a:');
	define('_RMDP_FDESC','Descripci&oacute;n:');
	define('_RMDP_FDESCTIP','Por favor incluye los detalles de tu descarga (caracter&iacute;sticas, diferencias, etc)');
	define('_RMDP_FSIZE','Tama&ntilde;o en bytes:');
	define('_RMDP_FANONIM','Permitir descargas an&oacute;nimas:');
	define('_RMDP_FWEB','T&iacute;tulo del Sitio del Autor:');
	define('_RMDP_FURL','URL del autor:');
	define('_RMDP_SEND','Enviar Descarga');
	define('_RMDP_OSS','Plataformas:');
	define('_RMDP_YES','S&iacute;');
	define('_RMDP_NO','No');
	define('_RMDP_SUBMIT_INFO','Las modificaciones son sujetas a aprobaci&oacute;n. Por favor copleta todos los campos requeridos (*).<br /><br />');
	define('_RMDP_MAIL_BODY','Un usuario ha solicitado la modificaci&oacute;n de una descarga. Para revisar los detalles de esta descarga: %s');
	define('_RMDP_SENDOK','Tu solicitud de modificaci&oacute;n ha sido enviada correctamente, gracias');
	define('_RMDP_SENDFAIL','Ocurrio un error al enviar tu solicitud. Por favor vuelve a intentarlo.');
	define('_RMDP_PLEASE_FILL', 'Por favor completa los campos requeridos');
	define('_RMDP_NAME_EXIST', 'Ya existe una descarga con un el mismo nombre');
	define('_RMDP_SEND_SHOTS','Pantallas');
	define('_RMDP_SHOTS_TITLE','Capturas de Pantalla de "%s"');
	define('_RMDP_SEND_HITS','Hits:');
	define('_RMDP_SEND_DATE','Fecha:');
	define('_RMDP_NEW_SHOT','Nueva Pantalla');
	define('_RMDP_MOD_SHOT','Modificar Pantalla');
	define('_RMDP_NEW_SMALLIMG','URL de Im&aacute;gen Peque&ntilde;a:');
	define('_RMDP_NEW_BIGIMG','URL de Im&aacute;gen Normal:');
	define('_RMDP_NEW_TEXT','Texto Descriptivo:');
	define('_RMDP_NEW_SEND','Enviar');
	define('_RMDP_SHOT_LIMIT','Lo sentimos, has llegado al l&iacute;mite de pantallas para tu descarga');
	
	define('_RMDP_ERR_IMAGES','Por favor especifica la url para la im&aacute;gen peque&ntilde;a y la im&aacute;gen normal');
	
} elseif ($rmdp_location=='search'){

	define('_RMDP_SEARCH_RESULTS','Resultados para "%s"');
	define('_RMDP_NOSEARCH_KEY','No especificaste una cadena de b&uacute;squeda');

}	elseif ($rmdp_location=='broken'){
	
	define('_RMDP_ERR_NOTFOUND','No se encontró la descarga especificada');
	define('_RMDP_NO_USER','Para poder reportar un enlace roto debes ser un usuario registrado');
	define('_RMDP_BROKEN_BODY',"Hola %s:\n\nUna descarga tuya ha sido reportada como errónea. Te suplicamos comprobar los datos cuanto antes. Para hacerlo puedes ingresar a:\n\n%s\n\nTambien puedes comprobar todas tus descargas en ".XOOPS_URL."/modules/rmdp/mysend.php \n\nAtentamente:\nEl equipo de Xoops México\nwww.xoops-mexico.net");
	define('_RMDP_BROKEN_BODYADMIN',"El usuario %s ha reportado una descarga como errónea. Puedes revisar los datos en:\n\n%s\n\n O puedes ver la descarga en\n\n%s");
	define('_RMDP_BROKEN_SEND','Tu reporte ha sido enviado. Gracias');
	define('_RMDP_BROKEN_SUBJECT','Reporte de descarga errónea');

}
?>
