<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: banners.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                //
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

function GetBanner(){
	global $xoopsDB, $xoopsTpl, $myts;
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmsrv_banners")));
	if ($num>1) {
		$num = $num - 1;
    	mt_srand((double)microtime()*1000000);
    	$bnum = mt_rand(0, $num);
 	} else {
    	$bnum = 0;
 	}
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmsrv_banners')." LIMIT $bnum, 1 ;");
	$row = $xoopsDB->fetchArray($result);
	
	$xoopsTpl->assign('bann', array('id'=>$row['id_ban'], 'img'=>$row['img'],'desc'=>$myts->makeTareaData4Show($row['desc']),'buy'=>$row['buy'],'showborder'=>$row['showborder'],'serv'=>$row['id_srv'],'buylnk'=>"https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&business=ohervis%40redmexico%2ecom%2emx&item_name=Hosting%20100%20MB&item_number=HOS001&no_shipping=1&no_note=1&currency_code=USD&a3=4%2e00&p3=1&t3=M&src=1"));
	
}
?>
