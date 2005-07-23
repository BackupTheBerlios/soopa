<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: terminos.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                //
// ------------------------------------------------------------------------  //
//                  RM+SOFT - Control de Servicios                           //
//         Copyright Red México Soft © 2005. (Eduardo Cortés)                //
//                   <http:www.redmexico.com.mx/>                            //
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

function MakeTermsPromos($idp){
	global $xoopsDB;
	
	$trel = $xoopsDB->prefix('rmsrv_promosrel');
	$tsrv = $xoopsDB->prefix('rmsrv_servicios');
	$ttrel = $xoopsDB->prefix('rmsrv_trel');
	$rtn = _MM_RMSRV_PROMOACCEPT."<br><br>";
	$result = $xoopsDB->query("SELECT * FROM $trel WHERE id_promo='$idp'");
	while ($rw=$xoopsDB->fetchArray($result)){
		$rmore = $xoopsDB->query("SELECT $tsrv.nombre, $tsrv.codigo,$tsrv.terminos, $ttrel.id_term FROM $tsrv,
					$ttrel WHERE $tsrv.id_srv='$rw[id_srv]' AND $ttrel.id_srv='$rw[id_srv]'");
		$row = $xoopsDB->fetchArray($rmore);
		if ($row['terminos']){
			$rtn .= "<a style='font-weight: normal; font-size: 10px;' href='javascript:;' onClick=\"openWithSelfMain('terminos.php?idt=$row[id_term]', 450, 600);\">".sprintf(_MM_TERMS_FOR,  $row['nombre'])."</a><br>";
		}
	}
	return $rtn;
}

function MakeTermsServs($ids){
	global $xoopsDB;
	
	$tsrv = $xoopsDB->prefix('rmsrv_servicios');
	$trel = $xoopsDB->prefix('rmsrv_trel');
	$rtn = "<span style='font-size: 10px;'>"._MM_RMSRV_ACCEPT."</span><br><br>";
	$result = $xoopsDB->query("SELECT $tsrv.codigo, $tsrv.nombre, $tsrv.terminos, $trel.id_term FROM $tsrv, $trel WHERE $tsrv.id_srv='$ids' AND $trel.id_srv='$ids'");
	while ($row=$xoopsDB->fetchArray($result)){
		if ($row['terminos']){
			$rtn .= "<a href='javascript:;' onClick=\"openWithSelfMain('terminos.php?idt=$row[id_term]', 450, 600);\" style='font-weight: normal;'>".sprintf(_MM_TERMS_FOR,  $row['nombre'])."</a><br>";
		}
	}
	return $rtn;
}
?>
