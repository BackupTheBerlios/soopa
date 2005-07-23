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
// Para Desarrollo de módulos, Diseño de temas para XOOPS y otros servicios //
// dirigete a http://www.redmexico.com.mx                                   //
//////////////////////////////////////////////////////////////////////////////

function CategoName($idc){
	global $xoopsDB;
	
	if ($idc<=0){ return; }
	
	list($cn) = $xoopsDB->fetchRow($xoopsDB->query("SELECT nombre FROM ".$xoopsDB->prefix("rmsrv_categos")." WHERE id_cat='$idc'"));
	return($cn);
}

function ServiceData($ids, $table = 'nombre'){
	global $xoopsDB;
	
	if ($ids<=0){ return; }
	
	list($cn) = $xoopsDB->fetchRow($xoopsDB->query("SELECT $table FROM ".$xoopsDB->prefix("rmsrv_servicios")." WHERE id_srv='$ids'"));
	return($cn);
}

function LoadPromos(){
	global $xoopsDB, $xoopsModuleConfig, $xoopsTpl;
	//Cargamos las promociones
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmsrv_promos")." WHERE activa=1 ORDER BY id_promo LIMIT 0,".$xoopsModuleConfig['promosnum']);
	while ($row=$xoopsDB->fetchArray($result)){
		$xoopsTpl->append('promos',array('id'=>$row['id_promo'],'nombre'=>$row['nombre'],'img'=>$row['img'],'desc'=>$row['shortdesc']));
	}
	$xoopsTpl->assign('lng_promos',_MM_PROMOS);
	$xoopsTpl->assign('total_promos', $xoopsModuleConfig['promosnum']);
}

function FormBuy($nombre, $codigo, $precio, $type, $recursive=0){
	$rtn = XOOPS_URL."/modules/rmservices/order.php?item=$codigo&amp;type=$type";
	return $rtn;
}

function GetPromosRel($idp){
	global $xoopsDB, $xoopsTpl;
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmsrv_promosrel")." WHERE id_promo='$idp'");
	while ($row=$xoopsDB->fetchArray($result)){
		$xoopsTpl->append('servicios',array('id'=>$row['id_srv'],'nombre'=>ServiceData($row['id_srv']),'desc'=>ServiceData($row['id_srv'], 'shortdesc')));
	}
}
?>
