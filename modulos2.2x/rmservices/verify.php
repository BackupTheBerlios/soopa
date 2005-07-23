<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: verify.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                 //
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

// Leemos el post de paypal para comprobar
$location = 'verify';
include '../../mainfile.php';
include XOOPS_ROOT_PATH."/header.php";
$myts =& MyTextSanitizer::getInstance();
$xoopsOption['template_main'] = 'rmsrv_verify.html'; //Plantilla para esta página

foreach ($_POST as $key => $value) {
	$$key = $value;
	//echo "$key = $value<br>";
}

if ($txn_type!='web_accept'){ redirect_header('index.php', 2, _MM_ERRORVERIFY); die(); }
if ($last_name==''){ redirect_header('index.php', 2, _MM_ERRORVERIFY); die(); }
if ($receiver_email != $xoopsModuleConfig['business']){ redirect_header('index.php', 2, _MM_ERRBUSINESS); die(); }
if ($verify_sign ==''){ redirect_header('index.php', 2, _MM_ERRORVERIFY); die(); }
if ($payer_email ==''){ redirect_header('index.php', 2, _MM_ERRORVERIFY); die(); }
if ($first_name ==''){ redirect_header('index.php', 2, _MM_ERRORVERIFY); die(); }
if ($item_number ==''){ redirect_header('index.php', 2, _MM_ERRORVERIFY); die(); }
if ($payment_status==''){ redirect_header('index.php', 2, _MM_ERRORVERIFY); die(); }

$item = $_GET['item'];
switch ($item){
	case 'srv':
		$sql = "SELECT * FROM ".$xoopsDB->prefix('rmsrv_servicios')." WHERE codigo='$item_number'";
		break;
	case 'promo':
		$sql = "SELECT * FROM ".$xoopsDB->prefix('rmsrv_promos')." WHERE codigo='$item_number'";
		break;
}

$result = $xoopsDB->query($sql);
$num = $xoopsDB->getRowsNum($result);
if ($num>0){ $row = $xoopsDB->fetchArray($result); }

if ($row['nombre'] != $item_name){ redirect_header('index.php', 2, _MM_ERRORVERIFY); die(); }

$xoopsTpl->assign('thanks', sprintf(_MM_THANKS, $payer_email));
$xoopsTpl->assign('info_next', _MM_NEXTINFO);
$xoopsTpl->assign('srvname', $row['nombre']);
setlocale(LC_MONETARY, $xoopsModuleConfig['money']);
$p1 = money_format($xoopsModuleConfig['formatmoney'], $row['precio']);
$xoopsTpl->assign('srvprice', $p1);
$xoopsTpl->assign('img', $row['img']);
$xoopsTpl->assign('desc', $row['shortdesc']);
$xoopsTpl->assign('clientname', $last_name.", ".$first_name);
$xoopsTpl->assign('payermail', $payer_email);
$xoopsTpl->assign('lng_price', _MM_PRICE);
$xoopsTpl->assign('lng_desc', _MM_DESC);
$xoopsTpl->assign('lng_yourname', _MM_YOURNAME);
$xoopsTpl->assign('lng_yourmail', _MM_YOURMAIL);

switch ($item){
	case 'srv':
		$sql = "INSERT INTO ".$xoopsDB->prefix('rmsrv_ventassrv')." (`id_srv`,`fecha`,`buyermail`)
				VALUES ('$row[id_srv]','".time()."','$payer_email')";
		break;
	case 'promo':
		$sql = "INSERT INTO ".$xoopsDB->prefix('rmsrv_ventaspromo')." (`id_promo`,`fecha`,`buyermail`)
				VALUES ('$row[id_promo]','".time()."','$payer_email')";
		break;
}

$xoopsDB->query($sql);

include XOOPS_ROOT_PATH."/footer.php";
?>