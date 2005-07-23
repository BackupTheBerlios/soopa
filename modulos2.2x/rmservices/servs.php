<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: servs.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                  //
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

$location = 'servicios';
include '../../mainfile.php';

$myts =& MyTextSanitizer::getInstance();
include 'include/banners.php';
include 'include/functions.php';

$op = $_GET['op'];
if ($op==''){ $op = $_POST['op']; }

switch ($op){
	case 'view':
		$ids = $_GET['ids'];
		if ($ids<=0){ header('location: index.php'); die(); }
		$xoopsOption['template_main'] = 'rmsrv_servicios.html'; //Plantilla para esta página
		$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmsrv_servicios")." WHERE id_srv='$ids'");
		$num = $xoopsDB->getRowsNum($result);
		if ($num<=0){ redirect_header('index.php', 1, _MM_NOEXIST); die(); }
		$row = $xoopsDB->fetchArray($result);
		include XOOPS_ROOT_PATH."/header.php";
		// Precio del producto
		if ($row['presupuesto']){
			$p1 = "Requiere Presupuesto";
			$form = "<a href='reqpre.php?item=srv&amp;idc=$row[id_srv]'><img src='images/presu.gif' border='0'></a>";
		}else{
			setlocale(LC_MONETARY, $xoopsModuleConfig['money']);
			$p1 = money_format($xoopsModuleConfig['formatmoney'], $row['precio']);
			$form = FormBuy($row['nombre'], $row['codigo'], $row['precio'], 'srv', 1);
		}
		$xoopsTpl->assign('servicio', array('id'=>$row['id_srv'],'nombre'=>$row['nombre'],'img'=>$row['img'],
						  'precio'=>$p1, 'desc'=>$myts->makeTareaData4Show($row['longdesc']),'codigo'=>$row['codigo'],
						  'presup'=>$row['presupuesto'],
						  'curconvert'=>"<br><a href='javascript:;' style='font-size: 10px; font-weight: normal;' onClick=\"openWithSelfMain('http://www.xe.com/ecc/input.cgi?Template=sw&Amount=$row[precio]','convert',600,170)\">"._MM_CONVERT_CUR."</a>"));
		
		$xoopsTpl->assign('srvform',$form);
		$xoopsTpl->assign('lng_caract', _MM_CARACT);
		$xoopsTpl->assign('lng_precio', _MM_PRICE);
		$xoopsTpl->assign('buyinfo', $xoopsModuleConfig['buyinfo']);
		$xoopsTpl->assign('lng_contact', _MM_CONTACT);
		$xoopsTpl->assign('link_contact', $xoopsModuleConfig['linkcontact']);
		$xoopsTpl->assign('lng_services', _MM_LNGSERVICES);
		$xoopsTpl->assign('lng_lnkpromos', _MM_LNGPROMOS);
		
		$tblcr = $xoopsDB->prefix("rmsrv_carrel");
		$tblc = $xoopsDB->prefix("rmsrv_caract");
		$result = $xoopsDB->query("SELECT $tblcr.*, $tblc.* FROM $tblcr, $tblc WHERE $tblcr.id_srv='$ids' AND $tblc.id_car=$tblcr.id_car");
		while($row=$xoopsDB->fetchArray($result)){
			if ($row['img']!=''){ $img = XOOPS_URL."/modules/rmservices/images/caracts/$row[img]"; }
			$xoopsTpl->append('caracts',array('id'=>$row['id_car'],'nombre'=>$row['nombre'],'desc'=>$row['shortdesc'],'img'=>$img));
		}
		GetBanner();
		LoadPromos();
		include XOOPS_ROOT_PATH."/footer.php";
		break;
	default:
}

?>
