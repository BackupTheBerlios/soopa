<?php
// $Id: footer.php,v 1.3 2005/08/08 23:44:45 mauriciodelima Exp $
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

if ( !defined("XOOPS_FOOTER_INCLUDED") ) {
    global $xoopsLogger, $xoopsOption, $xTheme, $xoopsConfig, $xoopsUser, $xoopsModule;
    $xoopsLogger->context = "core";
    define("XOOPS_FOOTER_INCLUDED",1);
    // RMV-NOTIFY
    include_once XOOPS_ROOT_PATH . '/include/notification_select.php';

    if (!isset($xoopsOption['template_main'])) {
        $template = null;
    } else {
        $template = 'db:'.$xoopsOption['template_main'];
    }
    
    // Ensure charset
	if (!headers_sent()) {
		header('Content-Type:text/html; charset='._CHARSET);
	}
	
    //serve page
    $GLOBALS['xTheme']->display($template);

    $xoopsLogger->stopTime();
    if (in_array(2, $xoopsConfig['debug_mode']) && $xoopsUser && $xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
        echo $xoopsLogger->getSQLDebug();
    }
}
?>