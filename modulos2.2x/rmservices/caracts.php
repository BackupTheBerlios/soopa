<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: caracts.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                //
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

$location = 'caracts';
include '../../mainfile.php';
include XOOPS_ROOT_PATH."/header.php";
$myts =& MyTextSanitizer::getInstance();
$xoopsOption['template_main'] = 'rmsrv_caracts.html'; //Plantilla para esta página

$idc = $_GET['idc'];
if ($idc<=0){ header('location: index.php'); die(); }
$ids = $_GET['ids'];
if ($ids<=0){ header('location: index.php'); die(); }

$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmsrv_caract')." WHERE id_car='$idc'");
$num = $xoopsDB->getRowsNum($result);
if ($num<=0){ redirect_header('index.php', 1, _MM_NOEXIST); die(); }

include_once('include/functions.php');
$row = $xoopsDB->fetchArray($result);
$xoopsTpl->assign('caract',array('id'=>$row['id_car'],'ids'=>$ids,'nombre'=>$row['nombre'],'desc'=>$myts->makeTareaData4Show($row['longdesc'])));

$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmsrv_servicios')." WHERE id_srv='$ids'");
$row = $xoopsDB->fetchArray($result);

$xoopsTpl->assign('servicio',array('id'=>$row['id_srv'],'nombre'=>$row['nombre'],'desc'=>$row['shortdesc']));

$xoopsTpl->assign('lng_services', _MM_LNGSERVICES);
$xoopsTpl->assign('lng_lnkpromos', _MM_LNGPROMOS);
$xoopsTpl->assign('lng_youare', _MM_YOUARE);

include('include/banners.php');
GetBanner();
include XOOPS_ROOT_PATH."/footer.php";
?>
