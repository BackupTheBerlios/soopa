<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: rmdp_functions.php,v 1.2 2005/08/02 05:41:21 mauriciodelima Exp $               //
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

/**
 * Comprobar si un elemento es nuevo o no
 * Parámetros:
 * @fecha = fecha de creación o actualización del elemento
 * @days = días para considerar nuevo un elemento
 *
 * @return = 1 verdadero 0 falso
 */
function rmdp_element_isnew($fecha, $days){
	
	$today = time();
	$lapso = $today - $fecha;
	$lapso = (int)($lapso / 86400);
	if ($lapso <= $days){
		return 1;
	} else {
		return 0;
	}
	
}

/**
 * Obtiene la lista de categorías existentes
 * junto con sus subcategorías.
 * Necesita de rmdp_subcategos() para funcionar correctamente
 * Params
 *
 * @idc = Id de la categoría padre por la cual empezar
 */
function get_categos_list($idc = 0){
	global $xoopsDB, $xoopsTpl, $xoopsModuleConfig;
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmdp_categos")." WHERE parent='$idc'");
	$num = $xoopsDB->getRowsNum($result);
	
	// Amplitud de la imágen (29/07/2005)
	$xoopsTpl->assign('catego_img_width', $xoopsModuleConfig['imgcategow']);
	$xoopsTpl->assign('catego_show_images', $xoopsModuleConfig['showimgcat']);
	
	while ($row=$xoopsDB->fetchArray($result)){
		$new = rmdp_element_isnew($row['fecha'], $xoopsModuleConfig['categonew']);
		$xoopsTpl->append('categos', array('id'=>$row['id_cat'], 'nombre'=>$row['nombre'], 'img'=>$row['img'], 'fecha'=>$row['fecha'],'isnew'=>$new,'subcats'=>rmdp_subcategos($row['id_cat'])));
	}
	
	if ($num>0){ return 1; } else { return 0; }
}

function rmdp_subcategos($parent){
	global $xoopsDB, $xoopsModuleConfig;
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmdp_categos")." WHERE parent='$parent' LIMIT 0, $xoopsModuleConfig[subcategoslimit]");
	while ($row=$xoopsDB->fetchArray($result)){
		$rtn .= "<a href='categos.php?id=$row[id_cat]'>$row[nombre]</a> · ";
	}
	if (substr($rtn, strlen($rtn) - 2, 2) == "· "){
		$rtn = substr($rtn, 0, strlen($rtn) - 3);
	}
	if ($xoopsDB->getRowsNum($result)==$xoopsModuleConfig['subcategoslimit']){
		$rtn .= " ...";
	}
	return $rtn;
}

/**
 * Obtiene las descargas patrocinadas dependiendo
 * del número de descargas establecidas en la configuración
 * Param
 *
 * @$xoopsModuleConfig['sponsor_downs'] = Limita el numero de resultados
 * 
 * @return = No retorno. Establece el array Smarty sponsors
 */
function rmdp_get_sponsor(){
	global $xoopsDB, $xoopsTpl, $myts, $xoopsModuleConfig;
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmdp_partners")));
	if ($num>=$xoopsModuleConfig['sponsor_downs']){
		$do = $xoopsModuleConfig['sponsor_downs'];
	} elseif ($num>=1 && $num<$xoopsModuleConfig['sponsor_downs']){
		$do = $num;
	} else {
	 	return;
	}
	
	$num = $num - 1;
	$numero = array();
	for ($i=0; $i<=$num; $i++){
		$numero[$i] = $i;
	}
	
	$values = array();
	mt_srand((double)microtime()*1000000);
	for ($i=0;$i<=$do-1;$i++){
		$item = mt_rand(0, count($numero) - 1); //Elemento a obtener
		$search = $numero[$item]; // Obtenmos el numero inicial del spaonsor
		array_splice($numero, $item, 1);
		$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmdp_partners")." LIMIT $search, 1 ;");
		$row = $xoopsDB->fetchArray($result);
		$xoopsTpl->append('sponsors', array('id'=>$row['id_soft'], 'desc'=>$myts->makeTareaData4Show(substr($row['text'], 0, $xoopsModuleConfig['len_desc'])),'title'=>rmdp_download_name($row['id_soft'])));
	}
	$xoopsTpl->assign('lang_sponsornews',_RMDP_SPONSOR_NEWS);

}

/**
 * Obtiene el nombre de una descarga
 * Params
 *
 * @ids = Identificador de la descarga
 *
 * @return = Nombre de la descarga
 */
function rmdp_download_name($ids){
	global $xoopsDB;
	
	if ($ids<=0){ return; }
	
	list($dn) = $xoopsDB->fetchRow($xoopsDB->query("SELECT nombre FROM ".$xoopsDB->prefix("rmdp_software")." WHERE id_soft='$ids'"));
	return($dn);
}


/**
 * Obtiene el nombre de una categoría dada
 * Params
 *
 * @idc = Id de la categoría requerida
 * @return = Nombre de la categoría
 */
 function rmdp_get_categoname($idc){
 	global $xoopsDB;
	
	if ($idc<=0){ return; }
	
	list($rtn) = $xoopsDB->fetchRow($xoopsDB->query("SELECT nombre FROM ".$xoopsDB->prefix("rmdp_categos")." WHERE id_cat='$idc'"));
	return($rtn);
 }
 

/**
 * Obtiene la descarga del día
 * No hay parámetros
 */
function rmdp_today_download(){
	global $xoopsDB, $xoopsTpl, $myts;
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmdp_software")));
	if ($num>1) {
		$num = $num - 1;
    	mt_srand((double)microtime()*1000000);
    	$bnum = mt_rand(0, $num);
 	} else {
    	$bnum = 0;
 	}
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_software')." LIMIT $bnum, 1 ;");
	$row = $xoopsDB->fetchArray($result);
	if ($row['img']==''){ $img = 'images/no_image.gif'; } else { $img = $row['img']; }
	
	$xoopsTpl->assign('drandom', array('id'=>$row['id_soft'], 'desc'=>$myts->makeTareaData4Show(substr($row['longdesc'], 0, 255))."[...]",'title'=>$row['nombre'],'img'=>$img));
}

/**
 * Obtiene los datos de la descarga reciente de una
 * categoría
 * Params
 *
 * @idc = Identificador de la categoría
 * 
 * @return = Array con los valores de la descarga
 */
function rmdp_recentdown_catego($idc){
	global $xoopsDB, $myts;
	
	if ($idc<=0){ return; }
	$rtn = array();
	$result = $xoopsDB->query("SELECT id_soft, nombre, img, longdesc FROM ".$xoopsDB->prefix("rmdp_software")." WHERE id_cat='$idc' ORDER BY `update` DESC LIMIT 0, 1");
	$row = $xoopsDB->fetchArray($result);
	$rtn['id'] = $row['id_soft'];
	$rtn['nombre'] = $row['nombre'];
	if ($row['img']==''){ $img = 'images/no_image.gif'; } else { $img = $row['img']; }
	$rtn['img'] = $img;
	$rtn['desc'] = $myts->MakeTareaData4Show(substr($row['longdesc'], 0, 150))." ...";
	
	return $rtn;
}

/**
 * Obtiene lo nuevo de las categorías
 * Params
 *
 * @limite = Limita el numero de categorías a mostrar
 */
function rmdp_get_thenew($limite = 2){
	global $xoopsDB, $xoopsTpl;
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_categos')." WHERE shownews='1'");
	while ($row=$xoopsDB->fetchArray($result)){
		$soft = rmdp_recentdown_catego($row['id_cat']);
		$xoopsTpl->append('categos_with_news', array('id'=>$row['id_cat'], 'nombre'=>$row['nombre'], 
		'down_nombre'=>$soft['nombre'], 'down_id'=>$soft['id'], 'down_img'=>$soft['img'], 'down_desc'=>$soft['desc'],
		'lng_thenewin'=>sprintf(_RMDP_THENEW_INCAT, $row['nombre'])));
	}
}

/**
 * Obtiene las descargas asignadas como favoritos
 * Params
 *
 * @idc = Identificador de la categoría donde se busca
 */
function rmdp_get_favorites($idc = 0){
	global $xoopsDB, $xoopsTpl, $xoopsModuleConfig, $myts;
	
	$sql = "SELECT id_soft, nombre, longdesc FROM ".$xoopsDB->prefix('rmdp_software')." WHERE favorito='1'";
	if ($idc<=0){
		$sql .= " ORDER BY `update` DESC LIMIT 0, $xoopsModuleConfig[favo_downs]";
	} else {
		$sql .= " AND id_cat='$idc' ORDER BY `update` DESC LIMIT 0, $xoopsModuleConfig[favo_downs]";
	}
	
	$result = $xoopsDB->query($sql);
	while ($row=$xoopsDB->fetchArray($result)){
		$desc = $myts->MakeTareaData4Show(substr($row['longdesc'], 0, 80));
		$desc = str_replace("<br />", ". ", $desc);
		$xoopsTpl->append('favoritos', array('id'=>$row['id_soft'], 'nombre'=>$row['nombre'],'desc'=>$desc));
	}
}

/**
 * Obtiene las descargas mas populares
 * de una categoría en particular o de todas
 * Param
 *
 * @idc = identificador de la categorías
 */
function rmdp_get_popular($idc){
	global $xoopsDB, $xoopsModuleConfig, $xoopsTpl, $myts;
	
	$sql = "SELECT id_soft, nombre, longdesc FROM ".$xoopsDB->prefix('rmdp_software');
	if ($idc<=0){
		$sql .= " ORDER BY `descargas` DESC LIMIT 0, $xoopsModuleConfig[popular_downs]";
	} else {
		$sql .= " WHERE id_cat='$idc' ORDER BY `descargas` DESC LIMIT 0, $xoopsModuleConfig[popular_downs]";
	}
	
	$result = $xoopsDB->query($sql);
	while ($row=$xoopsDB->fetchArray($result)){
		$desc = $myts->MakeTareaData4Show(substr($row['longdesc'], 0, 80));
		$desc = str_replace("<br />", ". ", $desc);
		$xoopsTpl->append('populares', array('id'=>$row['id_soft'], 'nombre'=>$row['nombre'],'desc'=>$desc));
	}
	
}


/**
 * Crea las opciones para la barra de búsqueda
 * Utiliza rmdp_subcats_options() para funcionar
 */
function rmdp_make_searchnav(){
	global $xoopsDB, $xoopsTpl, $xoopsModule;
	
	$xoopsTpl->assign('lng_allweb', sprintf(_RMDP_ALL_WEB, $xoopsModule->getVar('name')));
	$xoopsTpl->assign('lng_search_button',_RMDP_SEARCH_BUTTON);
	$key = $_POST['key'];
	if ($key==''){ $key=$_GET['key']; }
	$xoopsTpl->assign('key', $key);
	
	$result = $xoopsDB->query("SELECT id_cat, nombre FROM ".$xoopsDB->prefix('rmdp_categos')." WHERE parent='0' ORDER BY nombre");
	while ($row = $xoopsDB->fetchArray($result)){
		$xoopsTpl->append('srhoptions', array('id'=>$row['id_cat'],'nombre'=>$row['nombre']));
		rmdp_subcats_option($row['id_cat'], 2);
	}
	$xoopsTpl->assign('lng_viewfav', _RMDP_VIEW_FAV);
	$xoopsTpl->assign('lng_viewpop', _RMDP_VIEW_POP);
	$xoopsTpl->assign('lng_bestrate', _RMDP_VIEW_RATED);
	$xoopsTpl->assign('lng_senddown', _RMDP_SUBMIT_DOWN);
}

function rmdp_subcats_option($idc, $saltos = 0){
	global $xoopsDB, $xoopsTpl;
	$result = $xoopsDB->query("SELECT id_cat, nombre FROM ".$xoopsDB->prefix('rmdp_categos')." WHERE parent=$idc");
	while ($row=$xoopsDB->fetchArray($result)){
		$xoopsTpl->append('srhoptions', array('id'=>$row['id_cat'],'nombre'=>str_repeat('-',$saltos)." ".$row['nombre']));
		rmdp_subcats_option($row['id_cat'], $saltos + 2);
	}
}


/**
 * Obtiene el nombre de una licencia dada
 * Params
 *
 * @idl = Id de la licencia solicitada
 */
function rmdp_get_licencename($idl){
	global $xoopsDB;
	
	if ($idl<=0){ return; }
	
	$rtn = $xoopsDB->fetchArray($xoopsDB->query("SELECT nombre FROM ".$xoopsDB->prefix("rmdp_licences")." WHERE id_lic='$idl'"));
	return($rtn['nombre']);
}

/**
* Devuelve un vinculo a la licencia especificada
**/
function rmdp_get_licencelink($idl){
	global $xoopsDB;
	
	if ($idl<=0){ return; }
	
	$rtn = $xoopsDB->fetchArray($xoopsDB->query("SELECT url, nombre FROM ".$xoopsDB->prefix("rmdp_licences")." WHERE id_lic='$idl'"));
	if ($rtn['url']!=''){
		return "<a href='$rtn[url]' target='_blank'>$rtn[nombre]</a>";
	} else {
		return $rtn['nombre'];
	}
}

/**
 * Formatea un tamño de archivo en KB, MB o GB
 * Params tomada de modulo mydownloads
 * Nombre original PrettySize
 *
 * @size = Tamaño del archivo
 * @return = Cadena formateada
 */
function rmdp_convert_size($size) {
	$mb = 1024*1024;

	if ( $size > $mb ) {
		$mysize = sprintf ("%01.2f",$size/$mb) . " MB";
	}
	elseif ( $size >= 1024 ) {
		$mysize = sprintf ("%01.2f",$size/1024) . " KB";
	}
	else {
	    $mysize = sprintf(_MD_NUMBYTES,$size);
	}
	return $mysize;
}

/**
 * Establece el array para calcular los ratings
 * Sin Parámetros
 * Devuelve el porcentaje de votos para aumentar
 * un punto de rating
 */
function rmdp_set_rating(){
	global $xoopsDB;
	
	list($rate) = $xoopsDB->fetchRow($xoopsDB->query("SELECT rating FROM ".$xoopsDB->prefix("rmdp_software")." ORDER BY rating DESC LIMIT 0, 1"));
	$rtn = $rate/5;
	return $rtn;
}

/**
 * Calcula el rating de una descarga
 * Params
 * @votos = Cantidad de votos de la descarga
 * @rate = valor necesario de votos para ganar puntos
 */
function rmdp_calculate_rating($votos, $rate){
	
	if ($rate==0){ return 0; }
	if ($votos < $rate){ 
		return 0; 
	} elseif ($votos == $rate){ 
		return 1; 
	} else {
		$rtn = (int)($votos / $rate);
	}
	
	return $rtn;
}


/**
 * Determina si una descarga pertenece a las descargas patrocinadas
 * Parámetros:
 * @ids = Id de la descarga
 * @return = true o false
 */
function rmdp_element_issponsor($ids){
	global $xoopsDB;
	
	if ($ids<=0){ return 0; }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT id_soft FROM ".$xoopsDB->prefix("rmdp_partners")." WHERE id_soft='$ids'"));
	
	if ($num>0){ return 1; } else { return 0; }
	
}


/**
 * Devuelve el nombre de usuario
 * Parámetros
 * @idu = Id del usuario
 */
function rmdp_get_username($idu){
	global $xoopsDB;
	
	if ($idu<=0){ return; }
	
	list($rtn) = $xoopsDB->fetchRow($xoopsDB->query("SELECT uname FROM ".$xoopsDB->prefix("users")." WHERE uid='$idu'"));
	return($rtn);
}

/**
 * Devuelve el nombre de una plataforma
 * Parámetros
 * @ids = id de la descarga
 */
function rmdp_get_downos($ids){
	global $xoopsDB;
	if ($ids<=0){ return; }
	$tblos = $xoopsDB->prefix("rmdp_plataformas");
	$tblr = $xoopsDB->prefix("rmdp_softos");
	$result = $xoopsDB->query("SELECT $tblr.*, $tblos.nombre FROM $tblr, $tblos WHERE $tblr.id_soft='$ids' AND $tblos.id_os=$tblr.id_os LIMIT 0,3");
	$num = $xoopsDB->getRowsNum($result);

	while ($row=$xoopsDB->fetchArray($result)){
		$rtn .= $row['nombre'].", ";
	}
	
	if (substr($rtn, strlen($rtn) - 2, 2) == ", "){
		$rtn = substr($rtn, 0, strlen($rtn) - 3);
	}
	
	if ($num>3) { $rtn .= " ..."; }
	return($rtn);
}

/**
 * Obtiene la cadena de posición actual del objeto
 */
function rmdp_get_location($idc){
	global $xoopsDB;
	list($id, $nombre, $parent) = $xoopsDB->fetchRow($xoopsDB->query("SELECT id_cat, nombre, parent FROM ".$xoopsDB->prefix('rmdp_categos')." WHERE id_cat='$idc'"));
	if ($parent > 0){ $rtn .= rmdp_get_location($parent); }
	$rtn .= "<a href='categos.php?id=".$id."'>$nombre</a> &gt; ";
	return $rtn;
	
}

/**
* Comprueba si un usuario es el publicador de una descarga
* Parámetros
* @uid = Id del usuario
* @ids = Id de la descarga
* @return = true, false
**/
function rmdp_is_publisher($uid, $ids){
	global $xoopsDB;
	
	if ($uid<=0 || $ids<=0){ return false; }
	
	list($num) = $xoopsDB->fetchRow($xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix('rmdp_software')." WHERE id_soft='$ids' AND submitter='$uid'"));
	
	if ($num<=0){
	 	return false;
	} elseif ($num==1){
		return true;
	}
}


/**
* Devuelve las licencias existentes en la base de datos
**/
function rmdp_licence_list(){
	global $xoopsDB, $xoopsTpl;
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_licences')." ORDER BY nombre");
	while ($row=$xoopsDB->fetchArray($result)){
		$xoopsTpl->append('licencias',array('id'=>$row['id_lic'],'nombre'=>$row['nombre']));
	}
}


/**
* Devuelve las plataformas existentes en la base de datos
**/
function rmdp_plataforms_list(){
	global $xoopsDB, $xoopsTpl;
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_plataformas')." ORDER BY nombre");
	while ($row=$xoopsDB->fetchArray($result)){
		$xoopsTpl->append('plataformas',array('id'=>$row['id_os'],'nombre'=>$row['nombre']));
	}
}


?>