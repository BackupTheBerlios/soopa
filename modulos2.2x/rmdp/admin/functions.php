<?
///////////////////////////////////////////////////////////////////////////////
// $Id: functions.php,v 1.1 2005/07/23 16:52:00 mauriciodelima Exp $               //
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

function DP_ShowNav(){
	echo "<table class='outer' width='100%' cellpadding='0' cellspacing='1' align='center'>";
	echo "<tr><td class='even' align='center'><a href='categos.php'>"._AM_RMDP_CATEGOS."</a></td>";
	echo "<td class='even' align='center'><a href='downs.php'>"._AM_RMDP_DOWNLOADS."</a></td>";
	echo "<td class='even' align='center'><a href='sponsor.php'>"._AM_RMDP_DSPONSOR."</a></td>";
	echo "<td class='even' align='center'><a href='os.php'>"._AM_RMDP_OS."</a></td>";
	echo "<td class='even' align='center'><a href='lics.php'>"._AM_RMDP_SLICS."</a></td>";
	echo "<td class='even' align='center'><a href='sended.php'>"._AM_RMDP_SNSENDED."</a></td>";
	echo "<td class='even' align='center'><a href='modified.php'>"._AM_RMDP_SMODIFIED."</a></td>";
	echo "<td class='even' align='center'><a href='http://www.xoops-mexico.net/modules/rmlib/books.php?book=5' target='_blank'>"._AM_RMDP_HELP."</td></tr></table><br>";
}

function DP_ChildCatego($parent = '0', $tabs = 0, $class = 'even'){
	global $xoopsDB;
	
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_categos')." WHERE parent=$parent");
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<tr><td class='$class' align='left'>".str_repeat('&nbsp;',$tabs)."
			  <a href='categos.php?op=view&amp;idc=$row[id_cat]'>$row[nombre]</a></td>\n
				<td class='$class' align='center'>";
				if ($row['acceso']){
					echo _AM_RMDP_REGISTERED;
				} else {
					echo _AM_RMDP_EVERYBODY;
				}
		echo "</td>\n
				<td class='$class'align='center'><a href='categos.php?op=mod&amp;idc=$row[id_cat]'>"._AM_RMDP_MODIFY."</a> &nbsp;| &nbsp;
				<a href='categos.php?op=del&amp;idc=$row[id_cat]'>"._AM_RMDP_DELETE."</a></td></tr>";
		DP_ChildCatego($row['id_cat'], $tabs + 2, $class='odd');
		if ($tabs==0){ $class = 'even'; }
	}
}

function DP_ChildCategoOption($start = 0, $tabs = 0, $parent = 0){
	global $xoopsDB;
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix('rmdp_categos')." WHERE parent=$start");
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<option value='$row[id_cat]'"; 
		if ($row['id_cat']==$parent){ echo "selected"; }
		echo ">".str_repeat('-',$tabs)." $row[nombre]</option>\n";
		DP_ChildCategoOption($row['id_cat'], $tabs + 2, $parent);
	}
}

function DP_CategoName($idc){
	global $xoopsDB;
	
	if ($idc<=0){ return; }
	
	list($cn) = $xoopsDB->fetchRow($xoopsDB->query("SELECT nombre FROM ".$xoopsDB->prefix("rmdp_categos")." WHERE id_cat='$idc'"));
	return($cn);
}

function DP_DownloadName($ids){
	global $xoopsDB;
	
	if ($ids<=0){ return; }
	
	list($dn) = $xoopsDB->fetchRow($xoopsDB->query("SELECT nombre FROM ".$xoopsDB->prefix("rmdp_software")." WHERE id_soft='$ids'"));
	return($dn);
}

function DP_OsName($ido){
	global $xoopsDB;
	
	if ($ido<=0){ return; }
	
	list($on) = $xoopsDB->fetchRow($xoopsDB->query("SELECT nombre FROM ".$xoopsDB->prefix("rmdp_plataformas")." WHERE id_os='$ido'"));
	return($on);
}

function DP_show_groups(){
	global $xoopsDB;
	
	$result = $xoopsDB->query("SELECT groupid, name FROM ".$xoopsDB->prefix('groups')." ORDER BY name");
	echo "<option value='0' selected>"._AM_RMDP_EVERYBODY."</option>";
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<option value='$row[groupid]'>$row[name]</option>";
	}
	
}
?>