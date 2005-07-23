<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: index.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                  //
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
// Este programa es un programa libre; puedes distribuirlo y modificarlo    //
// bajo los términos de al GNU General Public Licencse como ha sido         //
// publicada por The Free Software Foundation (Fundación de Software Libre; //
// en cualquier versión 2 de la Licencia o mas reciente.                    //
//                                                                          //
// Este programa es distribuido esperando que sea últil pero SIN NINGUNA    //
// GARANTÍA. Ver The GNU General Public License para mas detalles.          //
// ------------------------------------------------------------------------ //
// Questions, Bugs or any comment plese write me                            //
// Preguntas, errores o cualquier comentario escribeme                      //
// <adminone@redmexico.com.mx>                                              //
// ------------------------------------------------------------------------ //
//////////////////////////////////////////////////////////////////////////////

include '../../../include/cp_header.php';
if (!file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/spanish/admin.php";
}

include 'functions.php';

xoops_cp_header();
ShowNav();
xoops_cp_footer();
?>
