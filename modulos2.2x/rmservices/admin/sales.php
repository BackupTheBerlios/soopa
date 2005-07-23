<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: sales.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                  //
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

$location = 'sales';
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}

function ShowPromos(){
	global $xoopsDB;
	
	include 'functions.php';
	$result = $xoopsDB->query("SELECT * FROM $tvenpro ORDER BY id_promo");
	xoops_cp_header();
	ShowNav();
	echo "<table width='100%' class='outer' cellspacing='1'>
			<tr><th colspan='4'>"._AM_PROMOS_LIST."</th></tr>";
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<tr class='even'><td align='left'>
			  <a href='promos.php?op=view&amp;idp=$row[id_promo]'>".PromoName($row['id_promo'])."</a></td>
			  <td align='center'>".date("d/m/Y h:i:s", $row['fecha'])."</td>
			  <td align='center'>$row[buyermail]</td>
			  <td align='center'><a href='sales.php?op=promos&amp;action=del'>"._AM_DELETE."</a></td>
			  </tr>";
	}
	echo "</table>";
	xoops_cp_footer();
}

function ShowServs(){
	global $xoopsDB;
	
	include 'functions.php';
	$result = $xoopsDB->query("SELECT * FROM $tvensrv ORDER BY id_srv");
	xoops_cp_header();
	ShowNav();
	echo "<table width='100%' class='outer' cellspacing='1'>
			<tr><th colspan='4'>"._AM_SERVS_LIST."</th></tr>";
	while ($row=$xoopsDB->fetchArray($result)){
		echo "<tr class='even'><td align='left'>
			  <a href='promos.php?op=view&amp;idp=$row[id_promo]'>".ServiceName($row['id_srv'])."</a></td>
			  <td align='center'>".date("d/m/Y h:i:s", $row['fecha'])."</td>
			  <td align='center'>$row[buyermail]</td>
			  <td align='center'><a href='sales.php?op=promos&amp;action=del'>"._AM_DELETE."</a></td>
			  </tr>";
	}
	echo "</table>";
	xoops_cp_footer();
}

/****************************************************/
$op = $_GET['op'];
if ($op==''){
	$op = $_POST['op'];
}

switch ($op){
	case 'promos':
		ShowPromos();
		break;
	case 'srvs':
		ShowServs();
		break;
}
?>
