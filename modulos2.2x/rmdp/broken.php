<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: broken.php,v 1.1 2005/07/23 16:52:00 mauriciodelima Exp $                    //
// ------------------------------------------------------------------------  //
//                         RM+SOFT.Download.Plus                             //
//                    Copyright © 2005. Red Mexico Soft                      //
//                     <http:www.redmexico.com.mx>                           //
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

$rmdp_location = "broken";
include "../../mainfile.php";

$id = isset($_GET['id']) ? $_GET['id'] : 0;

if ($id<=0){ header('location: index.php'); die(); }

if ($xoopsUser==''){
	redirect_header('down.php?id='.$id, 1, _RMDP_NO_USER);
	die();
}

$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmdp_software")." WHERE id_soft='$id'");
$num = $xoopsDB->getRowsNum($result);
if ($num<=0){ redirect_header('index.php', 1, _RMDP_ERR_NOTFOUND); die(); }

$row = $xoopsDB->fetchArray($result);
$user =& $member_handler->getUser($row['submitter']);
$xoopsMailer =& getMailer();
$xoopsMailer->useMail();
$xoopsMailer->setToEmails($user->getVar('email'));
$xoopsMailer->setFromEmail($xoopsConfig['from']);
$xoopsMailer->setFromName($xoopsConfig['sitename']." - ".$xoopsModuleConfig['rmdptitle']);
$xoopsMailer->setSubject(_RMDP_BROKEN_SUBJECT);
$xoopsMailer->setBody(sprintf(_RMDP_BROKEN_BODY, $user->getVar('uname'), XOOPS_URL."/modules/rmdp/down.php?id=$id"));
$xoopsMailer->send();

$xoopsMailer->setToEmails($xoopsConfig['adminmail']);
$xoopsMailer->setFromEmail($xoopsConfig['from']);
$xoopsMailer->setFromName($xoopsConfig['sitename']." - ".$xoopsModuleConfig['rmdptitle']);
$xoopsMailer->setSubject(_RMDP_BROKEN_SUBJECT);
$xoopsMailer->setBody(sprintf(_RMDP_BROKEN_BODYADMIN, $xoopsUser->getVar('uname'), XOOPS_URL."/modules/rmdp/admin/downs.php?op=mod&ids=$id", XOOPS_URL."/modules/rmdp/down.php?id=$id"));
$xoopsMailer->send();

redirect_header('down.php?id='.$id, 1, _RMDP_BROKEN_SEND);
?>
