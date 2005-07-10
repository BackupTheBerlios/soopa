<?php
// $Id: index_tree.php,v 1.1 2005/07/10 02:32:18 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//              RM+SOFT - Systema de Ayuda y Manuales en L�nea               //
//                Copyright RM+SOFT � 2005. (Eduardo Cort�s)                 //
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
//	bajo los t�rminos de al GNU General Public Licencse como ha sido		 //
//	publicada por The Free Software Foundation (Fundaci�n de Software Libre; //
//	en cualquier versi�n 2 de la Licencia o mas reciente.					 //
//                                                                           //
//	Este programa es distribuido esperando que sea �ltil pero SIN NINGUNA	 //
//	GARANT�A. Ver The GNU General Public License para mas detalles.			 //
//  ------------------------------------------------------------------------ //
//	Questions, Bugs or any comment plese write me						 	 //
//	Preguntas, errores o cualquier comentario escribeme						 //
//	<adminone@redmexico.com.mx>												 //
//  ------------------------------------------------------------------------ //

/****
* Esta funci�n permite obtener el arbold e subindices de un
* indice propocionado. Los par�metros que acepta son:
*
*	$index = Identificador del indice padre
****/
$tree = array();

function GetSubIndexTree($index){
	global $xoopsDB, $tree;
	
	$result = $xoopsDB->query("SELECT iid, titulo FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE parent='$index' ORDER BY orden");
	while (list($iid,$titulo)=$xoopsDB->fetchRow($result)){
		$indice = array();
		$indice['id'] = $iid;
		$indice['titulo'] = $titulo;
		$tree['indices'][] = $indice;
		GetSubIndexTree($iid);
	}
}

/****
* Esta funci�n permite obtener el arbol de indices principales
* es decir, Indices que no tienen un indice padre
****/
function GetIndexTree($tid){
	global $xoopsDB, $tree;
	
	$result = $xoopsDB->query("SELECT iid, titulo FROM ".$xoopsDB->prefix("rmlib_indice")." WHERE tema='$tid' AND parent='0' ORDER BY orden");
	while (list($iid,$titulo) = $xoopsDB->fetchRow($result)){
		$indice = array();
		$indice['id'] = $iid;
		$indice['titulo'] = $titulo;
		$tree['indices'][] = $indice;
		GetSubIndexTree($iid, $tree);
	}
}

/****
*	Esta funci�n localiza la posici�n del indice actual y
*	establece el elemento previo y siguiente para pasarlo a la plantilla
****/
function LocatePosition($iid){
	global $xoopsTpl, $tree;
	$found = 0;
	foreach ($tree as $indice){
		foreach($indice as $key => $value){
			if ($found){
				$xoopsTpl->assign('next_index', $value['titulo']);
				$xoopsTpl->assign('link_next',"content.php?index=".$value[id]);
				return;
			}
			if ($value['id'] == $iid){
				if ($prev[titulo]<>""){
					$xoopsTpl->assign('prev_index',$prev['titulo']);
					$xoopsTpl->assign('link_back',"content.php?index=".$prev[id]);
				}
				$found = 1;
			}
			$prev = array();
			$prev['id'] = $value['id'];
			$prev['titulo'] = $value['titulo'];
		}
	}
}

?>