<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: rmsrv_promos.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $           //
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

function b_show_rmsrv_promos($options){
	global $xoopsDB;
	
	$block = array();
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmsrv_promos")." WHERE inblock='1' AND activa='1'"));
	if ($num<=0){ return; };
	include_once(XOOPS_ROOT_PATH."/modules/rmservices/include/functions.php");
	
	for ($i=1;$i<=$options[0];$i++){
		if ($num>1) {
			$num = $num - 1;
    		mt_srand((double)microtime()*1000000);
    		$snum = mt_rand(0, $num);
 		} else {
    		$snum = 0;
 		}
		$sql = "SELECT id_promo, nombre, shortdesc, img, codigo, precio FROM ".$xoopsDB->prefix("rmsrv_promos")." WHERE inblock='1' AND activa='1' LIMIT $snum, 1";
		$result = $xoopsDB->query($sql);
		$row = $xoopsDB->fetchArray($result);
		$rtn = array();
		if ($options[1]){ $form = FormBuy($row['nombre'],$row['codigo'],$row['precio'],'promo'); }
		$rtn['form'] = $form;
		$rtn['nombre'] = $row['nombre'];
		if ($options[2]){ $rtn['desc'] = $row['shortdesc']; }
		$rtn['img'] = $row['img'];
		$rtn['id'] = $row['id_promo'];
		$block['promos'][] = $rtn;
	}
	return $block;
}

function bedit_promos($options){
	if ($options[1]){ $chk1 = "checked='checked'"; $chk2 = ''; }else{ $chk2 = "checked='checked'"; $chk1 = ''; }
	
	$form = _MI_BEDIT_PRMNUM."<br><input type=\"text\" name=\"options[]\" value=\"$options[0]\" /><br>";
	$form .= _MI_BEDIT_SHOWBUY."<br><input type='radio' name='options[1]' value='1' $chk1 /> "._MI_YES." 
			 <input type='radio' name='options[1]' value='0' $chk2 /> "._AM_NO."<br>";
			 
	if ($options[2]){ $chk1 = "checked='checked'"; $chk2 = ''; }else{ $chk2 = "checked='checked'"; $chk1 = ''; }
	
	$form .= _MI_BEDIT_SHOWDESC."<br><input type='radio' name='options[2]' value='1' $chk1 /> "._MI_YES."
			 <input type='radio' name='options[2]' value='0' $chk2 /> "._AM_NO."<br>";
	return $form;
}
?>
