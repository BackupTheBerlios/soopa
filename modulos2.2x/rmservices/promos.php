<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: promos.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                 //
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

$location = 'promos';
include '../../mainfile.php';
$myts =& MyTextSanitizer::getInstance();

$op = $_GET['op'];
if ($op==''){ $op = $_POST['op']; }

switch ($op){
	case 'view':
		include XOOPS_ROOT_PATH."/header.php";
		$xoopsOption['template_main'] = 'rmsrv_promos.html'; //Plantilla para esta página
		$idp = $_GET['idp'];
		if ($idp<=0){ header('location: index.php'); die(); }
		$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmsrv_promos')." WHERE id_promo='$idp'");
		$num = $xoopsDB->getRowsNum($result);
		if ($num<=0){ redirect_header('index.php', 1, _MM_NOEXIST); die(); }
		$row = $xoopsDB->fetchArray($result);
		setlocale(LC_MONETARY, $xoopsModuleConfig['money']);
		$p1 = money_format($xoopsModuleConfig['formatmoney'], $row['precio']);
		include_once('include/functions.php');
		$form = FormBuy($row['nombre'], $row['codigo'], $row['precio'], 'promo');
		$xoopsTpl->assign('promo', array('id'=>$row['id_promo'],'nombre'=>$row['nombre'],'codigo'=>$row['codigo'],
						'desc'=>$myts->makeTareaData4Show($row['longdesc']),'img'=>$row['img'],'precio'=>$p1,'formbuy'=>$form,
						'curconvert'=>"<br><a href='javascript:;' style='font-size: 10px; font-weight: normal;' onClick=\"openWithSelfMain('http://www.xe.com/ecc/input.cgi?Template=sw&Amount=$row[precio]&From=USD','convert',600,170)\">"._MM_CONVERT_CUR."</a>"));
		GetPromosRel ($idp);
		include 'include/banners.php';
		GetBanner();
		$xoopsTpl->assign('lng_contact', _MM_CONTACT);
		$xoopsTpl->assign('lng_precio', _MM_PRICE);
		$xoopsTpl->assign('lng_included', _MM_INCLUDED);
		$xoopsTpl->assign('show', 0);
		$xoopsTpl->assign('lng_services', _MM_LNGSERVICES);
		$xoopsTpl->assign('lng_lnkpromos', _MM_LNGPROMOS);
		include XOOPS_ROOT_PATH."/footer.php";
		break;
	default:
		include XOOPS_ROOT_PATH."/header.php";
		$xoopsOption['template_main'] = 'rmsrv_promos.html'; //Plantilla para esta página
		$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmsrv_promos')." ORDER BY nombre");
		setlocale(LC_MONETARY, $xoopsModuleConfig['money']);
		include_once('include/functions.php');
		include('include/banners.php');
		GetBanner();
		while ($row=$xoopsDB->fetchArray($result)){
			$form = FormBuy($row['nombre'],$row['codigo'],$row['precio'],'promo');
			$p1 = money_format($xoopsModuleConfig['formatmoney'], $row['precio']);
			$xoopsTpl->append('promos',array('id'=>$row['id_promo'],'nombre'=>$row['nombre'],
				'desc'=>$row['shortdesc'],'precio'=>$p1,'img'=>$row['img'],'formbuy'=>$form,
				'curconvert'=>"<br><a href='javascript:;' style='font-size: 10px; font-weight: normal;' onClick=\"openWithSelfMain('http://www.xe.com/ecc/input.cgi?Template=sw&Amount=$row[precio]&From=USD','convert',600,170)\">"._MM_CONVERT_CUR."</a>"));
		}
		$xoopsTpl->assign('lng_list', _MM_LIST);
		$xoopsTpl->assign('show', 1);
		$xoopsTpl->assign('lng_services', _MM_LNGSERVICES);
		$xoopsTpl->assign('lng_lnkpromos', _MM_LNGPROMOS);
		$xoopsTpl->assign('lng_precio', _MM_PRICE);
		include XOOPS_ROOT_PATH."/footer.php";
		break;
}
?>
