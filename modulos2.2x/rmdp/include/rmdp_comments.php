<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: rmdp_comments.php,v 1.2 2005/08/02 05:41:21 mauriciodelima Exp $           //
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

function rmdp_com_update($ids, $total_num){
	$db =& Database::getInstance();
	$sql = 'UPDATE '.$db->prefix('rmdp_software').' SET reviews = '.$total_num.' WHERE id_soft = '.$ids;
	$db->query($sql);
}

function mydownloads_com_approve(&$comment){
	// notification mail here
}
?>
