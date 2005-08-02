<?
///////////////////////////////////////////////////////////////////////////////
// $Id: index.php,v 1.2 2005/08/02 05:41:21 mauriciodelima Exp $                   //
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

$location = 'indice';
include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}

include 'functions.php';
xoops_cp_header();
DP_ShowNav();

/**
 * Mostramos la lista de categorias
 */
// $result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmdp_categos")." WHERE parent='0' LIMIT 0,10");
$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmdp_categos"));
list($numCat) = $xoopsDB->fetchRow($result); // Numero de categorias existentes
$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmdp_software"));
list($numSoft) = $xoopsDB->fetchRow($result); // Numero de programas existentes
$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmdp_partners"));
list($numSpon) = $xoopsDB->fetchRow($result); // Numero de patrocinadores existentes
$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmdp_caracteristicas"));
list($numCars) = $xoopsDB->fetchRow($result); // Numero de patrocinadores existentes
$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmdp_licences"));
list($numLics) = $xoopsDB->fetchRow($result); // Numero de patrocinadores existentes
$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmdp_plataformas"));
list($numOs) = $xoopsDB->fetchRow($result); // Numero de patrocinadores existentes
$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmdp_sended"));
list($numSend) = $xoopsDB->fetchRow($result); // Numero de patrocinadores existentes
$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("rmdp_shots"));
list($numShots) = $xoopsDB->fetchRow($result); // Numero de patrocinadores existentes

// Creamos la tabla con la información actual
echo "<br><table width='50%' cellspacing='1' class='outer' align='left'>";
echo "<tr><th colspan='3'>"._AM_RMDP_ACTUALSTATUS."</th></tr>";
echo "<tr><td class='even' align='left'>"._AM_RMDP_CATEGOS."</td>\n
      <td class='odd' align='center'><strong>$numCat</strong></td><td class='odd' align='center'>
	  <a href='categos.php'>"._AM_RMDP_SEE."</a></td></tr>";
echo "<tr><td class='even' align='left'>"._AM_RMDP_DOWNS."</td>\n
      <td class='odd' align='center'><strong>$numSoft</strong></td><td class='odd' align='center'>
	  <a href='downs.php'>"._AM_RMDP_SEE."</a></td></tr>";
echo "<tr><td class='even' align='left'>"._AM_RMDP_SPONSOR."</td>\n
      <td class='odd' align='center'><strong>$numSpon</strong></td><td class='odd' align='center'>
	  <a href='sponsor.php'>"._AM_RMDP_SEE."</a></td></tr>";
echo "<tr><td class='even' align='left'>"._AM_RMDP_CARS."</td>\n
      <td class='odd' align='center'><strong>$numCars</strong></td><td class='odd' align='center'>
	  &nbsp;</td></tr>";
echo "<tr><td class='even' align='left'>"._AM_RMDP_LICS."</td>\n
      <td class='odd' align='center'><strong>$numLics</strong></td><td class='odd' align='center'>
	  <a href='lics.php'>"._AM_RMDP_SEE."</a></td></tr>";
echo "<tr><td class='even' align='left'>"._AM_RMDP_OSNUM."</td>\n
      <td class='odd' align='center'><strong>$numOs</strong></td><td class='odd' align='center'>
	  <a href='os.php'>"._AM_RMDP_SEE."</a></td></tr>";
echo "<tr><td class='even' align='left'>"._AM_RMDP_DSEND."</td>\n
      <td class='odd' align='center'><strong>$numSend</strong></td><td class='odd' align='center'>
	  <a href='sended.php'>"._AM_RMDP_SEE."</a></td></tr>";
echo "<tr><td class='even' align='left'>"._AM_RMDP_NSHOTS."</td>\n
      <td class='odd' align='center'><strong>$numShots</strong></td><td class='odd' align='center'>
	  &nbsp;</td></tr>";
echo "</table>";

// Mostramos la configuración actual del sistema
echo "<table width='50%' class='outer' cellspacing='1'>\n
		<tr><th colspan='2' align='center'>Configuración del Sistema</th></tr>";
echo "<tr><td class='even'>&nbsp;</td>";
echo "<td class='odd'>&nbsp;</td></tr></table>";

xoops_cp_footer();
?>

