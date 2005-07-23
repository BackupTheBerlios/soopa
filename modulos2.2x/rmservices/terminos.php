<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: terminos.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                //
// ------------------------------------------------------------------------  //
//                  RM+SOFT - Control de Servicios                           //
//         Copyright Red México Soft © 2005. (Eduardo Cortés)                //
//                   <http:www.redmexico.com.mx/>                            //
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

include '../../mainfile.php';
$myts =& MyTextSanitizer::getInstance();

include XOOPS_ROOT_PATH."/header.php";

$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmsrv_terminos")." WHERE id_term='".$_GET['idt']."'");
$num = $xoopsDB->getRowsNum($result);
if ($num<=0){
	echo "<script language='javascript'>window.close();</script>";
	die();
}
$row = $xoopsDB->fetchArray($result);
echo "<html>
	  <head><title>".$xoopsConfig['sitename']."</title>
	  <link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL.'/themes/'.$xoopsConfig['theme_set']."/style.css' />
	  <body>
	  </head><table width='100%' align='center' style='font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: normal; color: #000000; border: 1px solid #000000; background-color: #FFFFFF;'>\n
		<tr><td align='left'>".$myts->makeTareaData4Show($row['texto'])."</td></tr></table>
	  </body>
	  </html>";

?>
