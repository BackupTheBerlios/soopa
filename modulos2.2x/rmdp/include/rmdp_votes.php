<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: rmdp_votes.php,v 1.2 2005/08/02 05:41:21 mauriciodelima Exp $              //
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


/**
* Determina si un usuario anonimo ha votado
* el día de hoy un recurso
* 
* @ids = Id del recurso
* @return = true o false
**/
function rmdp_vote_today($ids){
	global $xoopsDB;
	
	if ($ids<=0){ return false; }
	$ip = getenv("REMOTE_ADDR");
	// Obtenemos el tiempo de hace 24 horas
	$yest = time() - 86400;
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmdp_votes')." WHERE id_soft='$ids' AND user_ip='$ip' AND fecha > $yest"));
	if ($num<=0){ 
		return false; 
	} else {
		return true;
	}
	
}

/**
* Almacena el voto del usuario anónimo e incrementa las estadísticas
**/
function rmdp_set_anonym_vote($ids, $rate){
	global $xoopsDB;
	
	$ip = getenv("REMOTE_ADDR");
	$fecha = time();
	$xoopsDB->queryF("INSERT INTO ".$xoopsDB->prefix('rmdp_votes')." (`id_soft`,`uid`,`user_ip`,`fecha`)
			VALUES ('$ids','0','$ip','$fecha') ;");
	
	if ($xoopsDB->error() != ''){
		return false;
	}
	
	$xoopsDB->queryF("UPDATE ".$xoopsDB->prefix('rmdp_software')." SET `votos`=votos+1, `rating`=rating+$rate
		WHERE id_soft='$ids'");
		
	if ($xoopsDB->error() != ''){
		return false;
	}
	
	return true;
	
}


/**
* Almacena el voto de un usuario registrado
**/
function rmdp_set_vote($ids, $uid, $rate){
	global $xoopsDB;
	
	$ip = getenv("REMOTE_ADDR");
	$fecha = time();
	$xoopsDB->queryF("INSERT INTO ".$xoopsDB->prefix('rmdp_votes')." (`id_soft`,`uid`,`user_ip`,`fecha`)
			VALUES ('$ids','$uid','$ip','$fecha') ;");
	
	if ($xoopsDB->error() != ''){
		return false;
	}
	
	$xoopsDB->queryF("UPDATE ".$xoopsDB->prefix('rmdp_software')." SET `votos`=votos+1, `rating`=rating+$rate
		WHERE id_soft='$ids'");
		
	if ($xoopsDB->error() != ''){
		return false;
	}
	
	return true;
	
}


/**
* Comprueba si un usuario ha votado por un recurso
**/
function rmdp_user_voted($ids, $uid){
	global $xoopsDB;
	
	if ($ids<=0 || $uid<=0){ return false; }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmdp_votes')." WHERE id_soft='$ids' AND uid='$uid'"));
	if ($num<=0){ return false; } else { return true; }
}
?>
