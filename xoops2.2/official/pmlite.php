<?php
// $Id: pmlite.php,v 1.3 2005/08/08 23:45:41 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
include 'mainfile.php';
$parsed_url = parse_url($_SERVER['REQUEST_URI']);
$url = "modules/pm/pmlite.php";
if ($querystring = strpos($parsed_url['path'], "?")) {
    $url .= "?".substr($parsed_url['path'], $querystring, strlen($parsed_url['path'])-$querystring);
}

$url .= isset($_SERVER['QUERY_STRING']) ? "?".$_SERVER['QUERY_STRING'] : "";
header('location: '.$url);
//this file is deprecated
?>