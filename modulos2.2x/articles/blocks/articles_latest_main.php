<?php
// $Id: articles_latest_main.php,v 1.2 2005/08/07 06:58:41 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
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

function articles_latest_main_show($options) {
    global $xoopsDB, $xoopsModule, $xoopsUser;
    $class = "odd";
    
    $myts =& MyTextSanitizer::getInstance();
    $block = array();
    $sql = "SELECT * FROM ".$xoopsDB->prefix("articles_main")." WHERE art_validated=1 and art_showme=1 ORDER BY art_posted_datetime DESC LIMIT $options[0]";

    $result = $xoopsDB->query($sql);
        while ($myrow = $xoopsDB->fetchArray($result)) {
            $title = $myts->makeTboxData4Show($myrow['art_title']);
            if (!XOOPS_USE_MULTIBYTES) {
                if (strlen($myrow['art_title']) >= $options[1]) {
                    $title = $myts->makeTboxData4Show(substr($myrow['art_title'], 0, ($options[1] - 1))) . "...";
                } 
            }
            $text = $myts->makeTboxData4Show($myrow['art_description']);
            if (!XOOPS_USE_MULTIBYTES) {
                if (strlen($myrow['art_article_text']) >= $options[2]) {
                    $text = $myts->makeTboxData4Show(substr($myrow['art_description'], 0, ($options[2] - 1))) . "...";
                } 
            }
            
            if ($class == "even") { $class = "odd"; }
                else { $class = "even"; }
            
            $arts['title']                  = $title;
            $arts['text']                   = $text;
            $arts['id']                     = $myrow['id'];
            $arts['art_posted_datetime']    = $myrow['art_posted_datetime'];
            $arts['class']                  = $class;
            //$arts['dir']                    = $xoopsModule->dirname();
            
		    $block['arts'][] = $arts;
        }
    
    return $block;
	
}


function articles_latest_main_edit($options) {

	$form  = "&nbsp;" . _MB_ART_SHOW . "&nbsp;<input type=\"text\" name=\"options[]\" value=\"" . $options[0] . "\" size=\"5\" />&nbsp;" . _MB_ART_NUMBERS . "<br />";
	$form .= "&nbsp;" . _MB_ART_SHOW . "&nbsp;<input type=\"text\" name=\"options[]\" value=\"" . $options[1] . "\" size=\"5\" />&nbsp;" . _MB_ART_CHARS . "<br />";
	$form .= "&nbsp;" . _MB_ART_SHOW . "&nbsp;<input type=\"text\" name=\"options[]\" value=\"" . $options[2] . "\" size=\"5\" />&nbsp;" . _MB_ART_TEXT . "";

	return $form;    
}


?>