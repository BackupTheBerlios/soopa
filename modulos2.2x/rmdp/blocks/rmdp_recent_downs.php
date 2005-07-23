<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: rmdp_recent_downs.php,v 1.1 2005/07/23 16:52:00 mauriciodelima Exp $       //
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

function rmdp_b_show_recent($options){
	global $xoopsDB, $xoopsTpl;
	
	$result = $xoopsDB->query("SELECT id_soft, nombre, descargas FROM ".$xoopsDB->prefix('rmdp_software')." ORDER BY id_soft DESC LIMIT 0, $options[0]");
	$block = array();
	while ($row=$xoopsDB->fetchArray($result)){
		$rtn = array();
		$rtn['id'] = $row['id_soft'];
		$rtn['nombre'] = $row['nombre'];
		$rtn['descargas'] = $row['descargas'];
		$block['recentdowns'][] = $rtn;
	}
	
	return $block;
}

function rmdp_b_show_recent_edit($options){
	$form = _BK_RMDP_RECENTNUM."<br><input type='text' name='options[]' value='$options[0]'>";
	return $form;
}
?>
