<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: index.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                  //
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

$location = 'index';
include '../../mainfile.php';
include XOOPS_ROOT_PATH."/header.php";
$myts =& MyTextSanitizer::getInstance();
$xoopsOption['template_main'] = 'rmsrv_index.html'; //Plantilla para esta página

include ('include/banners.php');
include_once ('include/functions.php');

GetBanner();

//Cargamos los servicios existentes
$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmsrv_servicios')." WHERE activo=1 ORDER BY nombre, id_cat");
while($row=$xoopsDB->fetchArray($result)){
	setlocale(LC_MONETARY, $xoopsModuleConfig['money']);
	$p1 = money_format($xoopsModuleConfig['formatmoney'], $row['precio']);
	setlocale(LC_MONETARY, $xoopsModuleConfig['secondmoney']);
	$p2 = money_format($xoopsModuleConfig['formatsecondmoney'], $row['precio'] * $xoopsModuleConfig['changetype']);
	$form = FormBuy($row['nombre'],$row['codigo'],$row['precio'],'srv');
	$xoopsTpl->append('servicios',array('id'=>$row['id_srv'],'nombre'=>$row['nombre'],'img'=>$row['img'],
					  'desc'=>$myts->makeTboxData4Show($row['shortdesc']), 'precio'=>$p1, 'precio2'=>$p2,
					  'catego'=>CategoName($row['id_cat']),'formbuy'=>$form,
					  'curconvert'=>"<br><a href='javascript:;' style='font-size: 10px; font-weight: normal;' onClick=\"openWithSelfMain('http://www.xe.com/ecc/input.cgi?Template=sw&Amount=$row[precio]','convert',600,170)\">"._MM_CONVERT_CUR."</a>"));
}

$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmsrv_categos')." ORDER BY nombre");
while($row=$xoopsDB->fetchArray($result)){
	$xoopsTpl->append('categos', array('id'=>$row['id_cat'],'nombre'=>$row['nombre']));
}

LoadPromos();


$xoopsTpl->assign('lng_precio',_MM_PRICE);
$xoopsTpl->assign('lng_servicios', _MM_OURSERVICES);

include XOOPS_ROOT_PATH."/footer.php";
?>
