<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: vote.php,v 1.1 2005/07/23 16:52:00 mauriciodelima Exp $                    //
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

$rmdp_location = 'votos';
include 'header.php';

/**
* Comprobamos que se haya especificado el id de la descarga
**/
$id = isset($_GET['id']) ? $_GET['id'] : 0;
if ($id<=0){ header('location: index.php'); die(); }

/**
* Comprobamos que se haya especificado un voto
**/
$rate = isset($_GET['rate']) ? $_GET['rate'] : 0;
if ($rate<=0){ header('location: down.php?id='.$id); die(); }

/**
* Comprobamos si el usuario tiene permisos para votar
**/
if ($xoopsUser == '' && !$xoopsModuleConfig['uservote']){
	redirect_header(XOOPS_URL.'/user.php?xoops_redirect='.parse_url($_SERVER['PHP_SELF']), 1, _RMDP_NO_ACCESS);
	die();
}

if ($xoopsUser == ''){ $vote_user = 0; } else { $vote_user = $xoopsUser->getVar('uid'); }

/**
* Comprobamos que el usuario actual no sea el publicador
* de la descarga
**/
include 'include/rmdp_functions.php';
if (rmdp_is_publisher($vote_user, $id)){
	redirect_header('down.php?id='.$id, 1, _RMDP_IS_PUBLISHER);
	die();
}

/**
* Comprobamos que un usuario no vote dos veces
* por la misma descarga
**/
include('include/rmdp_votes.php');
if ($vote_user == 0){
	/**
	* Si es un usuario anónimo comprobamos que haya transcurrido
	* un dia desde su último voto
	**/
	if (rmdp_vote_today($id)){
		redirect_header('down.php?id='.$id, 1, _RMDP_VOTE_ONEDAY);
		die();
	}
	/**
	* Asignamos el voto a la descarga seleccionada
	**/
	if (rmdp_set_anonym_vote($id, $rate)){
		redirect_header('down.php?id='.$id, 1, _RMDP_VOTE_THX);
		die();
	} else {
		redirect_header('down.php?id='.$id, 1, _RMDP_VOTE_ERR);
		die();
	}
} else {
	/**
	* Si el usuario esta registrado impedimos que
	* vote dos veces por el mismo recurso
	**/
	if (rmdp_user_voted($id, $vote_user)){
		redirect_header('down.php?id='.$id, 1, _RMDP_NOVOTE_TWICE);
		die();
	}
	
	/**
	* Agregamos el voto a la descarga
	**/
	if (rmdp_set_vote($id, $vote_user, $rate)){
		redirect_header('down.php?id='.$id, 1, _RMDP_VOTE_THX);
		die();
	} else {
		redirect_header('down.php?id='.$id, 1, _RMDP_VOTE_ERR);
		die();
	}

}
?>
