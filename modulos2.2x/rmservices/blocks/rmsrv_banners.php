<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: rmsrv_banners.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $          //
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

function b_show_rmsrv_banners(){
	global $xoopsDB;
	$myts =& MyTextSanitizer::getInstance();
	$block = array();
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmsrv_banners")));
	if ($num<=0){ return; };
	
	if ($num>1) {
		$num = $num - 1;
    	mt_srand((double)microtime()*1000000);
    	$snum = mt_rand(0, $num);
 	} else {
    	$snum = 0;
 	}
	$sql = "SELECT * FROM ".$xoopsDB->prefix("rmsrv_banners")." LIMIT $snum, 1";
	$result = $xoopsDB->query($sql);
	$row = $xoopsDB->fetchArray($result);
	$rtn = array();
	include_once(XOOPS_ROOT_PATH."/modules/rmservices/include/functions.php");
	if ($row['buy']){$form = FormBuy(ServiceData($row['id_srv'], "nombre"), ServiceData($row['id_srv'], "codigo"), ServiceData($row['id_srv'], "precio"), 'srv');}
	$rtn['id'] = $row['id_ban'];
	$rtn['img'] = str_replace('{servicio}', $row['id_srv'], $row['img']);
	$rtn['desc'] = $myts->makeTareaData4Show($row['desc']);
	$rtn['border'] = $row['showborder'];
	$rtn['ids'] = $row['id_srv'];
	$rtn['form'] = $form;
	$block['bann'][] = $rtn;
	return $block;
}
?>
