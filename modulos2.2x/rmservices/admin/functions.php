<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: functions.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $              //
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

# Cargamos nombres de las tablas para escritura rápida
$tcategos = $xoopsDB->prefix("rmsrv_categos");
$tservs = $xoopsDB->prefix("rmsrv_servicios");
$tbann = $xoopsDB->prefix("rmsrv_banners");
$tcar = $xoopsDB->prefix("rmsrv_caract");
$tcarrel = $xoopsDB->prefix("rmsrv_carrel");
$tpromos = $xoopsDB->prefix("rmsrv_promos");
$tprorel = $xoopsDB->prefix("rmsrv_promosrel");
$tvenpro = $xoopsDB->prefix("rmsrv_ventaspromo");
$tvensrv = $xoopsDB->prefix("rmsrv_ventassrv");
$tterms = $xoopsDB->prefix("rmsrv_terminos");
$ttrel = $xoopsDB->prefix("rmsrv_trel");

function ShowNav(){
	echo "<table width='100%' cellspacing='1' class='outer'>\n
			<tr class='even'><td align='center'><a href='index.php'>"._AM_PANEL."</a></td>\n
			<td align='center'><a href='categos.php'>"._AM_CATEGOS."</a></td>\n
			<td align='center'><a href='services.php'>"._AM_SERVICES."</a></td>\n
			<td align='center'><a href='promos.php'>"._AM_PROMOS."</a></td>\n
			<td align='center'><a href='banners.php'>"._AM_BANNERS."</a></td>\n
			<td align='center'><a href='terminos.php'>"._AM_SRV_TERMS."</a></td>\n
			<td align='center'><a href='http://www.xoops-mexico.net/modules/rmlib/books.php?book=7' target='_blank'>"._AM_HELP."</a></td>
			</tr></table><br>";
}

function CategoIsEmpty($idc){
	global $xoopsDB;
	
	/***
	 * Comprobamos que no existan servicios en esta categoría
	 * Si existen retornamos falso y si no existen retornamos verdadero
	 **/
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmsrv_servicios')." WHERE id_cat='$idc'"));

	if ($num<=0){
		return(1);
	} else {
		return;
	}
}	

function SrvInPromo($ids){
	global $xoopsDB;
	
	/***
	 * Comprobamos que no existan servicios asignados a las promociones
	 * Si existen retornamos true y si no existen retornamos false
	 **/
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmsrv_promosrel')." WHERE id_srv='$ids'"));

	if ($num>0){
		return(1);
	} else {
		return;
	}
}

function SrvInSales($ids){
	global $xoopsDB;
	
	/***
	 * Comprobamos que no existan servicios vendidos
	 * Si existen retornamos true y si no existen retornamos false
	 **/
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmsrv_ventassrv')." WHERE id_srv='$ids'"));

	if ($num>0){
		return(1);
	} else {
		return;
	}
}

function ServiceName($ids){
	global $xoopsDB;
	
	if ($ids<=0){ return; }
	
	list($sn) = $xoopsDB->fetchRow($xoopsDB->query("SELECT nombre FROM ".$xoopsDB->prefix("rmsrv_servicios")." WHERE id_srv='$ids'"));
	return($sn);
}

function CategoName($idc){
	global $xoopsDB;
	
	if ($idc<=0){ return; }
	
	list($cn) = $xoopsDB->fetchRow($xoopsDB->query("SELECT nombre FROM ".$xoopsDB->prefix("rmsrv_categos")." WHERE id_cat='$idc'"));
	return($cn);
}

function CarName($idc){
	global $xoopsDB;
	
	if ($idc<=0){ return; }
	
	list($cn) = $xoopsDB->fetchRow($xoopsDB->query("SELECT nombre FROM ".$xoopsDB->prefix("rmsrv_caract")." WHERE id_car='$idc'"));
	return($cn);
}

function TermName($idt){
	global $xoopsDB;
	
	if ($idt<=0){ return; }
	
	list($tn) = $xoopsDB->fetchRow($xoopsDB->query("SELECT titulo FROM ".$xoopsDB->prefix("rmsrv_terminos")." WHERE id_term='$idt'"));
	return($tn);
}

function PromoName($idp){
	global $xoopsDB;
	
	if ($idp<=0){ return; }
	
	list($pn) = $xoopsDB->fetchRow($xoopsDB->query("SELECT nombre FROM ".$xoopsDB->prefix("rmsrv_promos")." WHERE id_promo='$idp'"));
	return($pn);
}

function PromoInSales($idp){
	global $xoopsDB;
	
	if ($idp<=0){ return; }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmsrv_ventaspromo')." WHERE id_promo='$idp'"));

	if ($num>0){
		return(1);
	} else {
		return;
	}
}

function HavTerms($ids){
	global $xoopsDB;
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmsrv_trel")." WHERE id_srv='$ids'"));
	
	return $num;
}
?>
