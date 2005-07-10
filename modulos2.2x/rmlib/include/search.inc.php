<?php
// $Id: search.inc.php,v 1.1 2005/07/10 02:32:18 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//              RM+SOFT - Systema de Ayuda y Manuales en Línea               //
//                Copyright RM+SOFT © 2005. (Eduardo Cortés)                 //
//                     <http://www.redmexico.com.mx/>                        //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//  ------------------------------------------------------------------------ //
//	Este programa es un programa libre; puedes distribuirlo y modificarlo	 //
//	bajo los términos de al GNU General Public Licencse como ha sido		 //
//	publicada por The Free Software Foundation (Fundación de Software Libre; //
//	en cualquier versión 2 de la Licencia o mas reciente.					 //
//                                                                           //
//	Este programa es distribuido esperando que sea últil pero SIN NINGUNA	 //
//	GARANTÍA. Ver The GNU General Public License para mas detalles.			 //
//  ------------------------------------------------------------------------ //
//	Questions, Bugs or any comment plese write me						 	 //
//	Preguntas, errores o cualquier comentario escribeme						 //
//	<adminone@redmexico.com.mx>												 //
//  ------------------------------------------------------------------------ //

function rmlib_search($queryarray, $andor, $limit, $offset, $userid){
	global $xoopsDB;
	
	$sql = "SELECT d.iid, d.titulo, c.index, c.fecha FROM ".$xoopsDB->prefix("rmlib_indice")." d LEFT JOIN
			".$xoopsDB->prefix("rmlib_contenido")." c ON c.index=d.iid WHERE ";
	
	if ( is_array($queryarray) && $count = count($queryarray) ) {
		$sql .= "((d.titulo LIKE '%$queryarray[0]%' OR c.texto LIKE '%$queryarray[0]%')";
		for($i=1;$i<$count;$i++){
			$sql .= " $andor ";
			$sql .= "(d.titulo LIKE '%$queryarray[i]%' OR c.texto LIKE '%$queryarray[i]%')";
		}
		$sql .= ") ";
	}
	$sql .= "ORDER BY d.titulo";
	$result = $xoopsDB->query($sql,$limit,$offset);
	$ret = array();
	$i = 0;
 	while($myrow = $xoopsDB->fetchArray($result)){
		$ret[$i]['image'] = "images/sections.gif";
		$ret[$i]['link'] = "content.php?index=".$myrow['iid']."";
		$ret[$i]['title'] = $myrow['titulo'];
		$ret[$i]['time'] = $myrow['fecha'];
		$i++;
	}
	return $ret;
}

?>
