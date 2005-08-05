<?php
// $Id: themeform.php,v 1.2 2005/08/05 03:41:07 mauriciodelima Exp $
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
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //
/**
 * 
 * 
 * @package     kernel
 * @subpackage  form
 * 
 * @author	    Kazumi Ono	<onokazu@xoops.org>
 * @copyright	copyright (c) 2000-2003 XOOPS.org
 */
/**
 * base class
 */
include_once XOOPS_ROOT_PATH."/class/xoopsform/form.php";

/**
 * Form that will output as a theme-enabled HTML table
 * 
 * Also adds JavaScript to validate required fields
 * 
 * @author	Kazumi Ono	<onokazu@xoops.org>
 * @copyright	copyright (c) 2000-2003 XOOPS.org
 * 
 * @package     kernel
 * @subpackage  form
 */
class XoopsThemeForm extends XoopsForm
{
    /**
	 * Insert an empty row in the table to serve as a seperator.
	 * 
     * @param	string  $extra  HTML to be displayed in the empty row.
	 * @param	string	$class	CSS class name for <td> tag
	 */
    function insertBreak($extra = '', $class= '')
    {
        $class = ($class != '') ? " class='$class'" : '';
        //Fix for $extra tag not showing
        if ($extra) {
            $extra = "<tr><td colspan='2' $class>$extra</td></tr>";
            $this->addElement($extra);
        } else {
            $extra = "<tr><td colspan='2' $class>&nbsp;</td></tr>";
            $this->addElement($extra);
        }
    }

    /**
	 * create HTML to output the form as a theme-enabled table with validation.
     * 
	 * @return	string
	 */
    function render()
    {
        $hidden = "";
        $required =& $this->getRequired();
        // Hack Herv� Thouzard
        $reqnames=array();
        foreach(array_keys($required) as $i) {
            $reqnames[] = $required[$i]->getName();
        }
        // End Hack Herv� Thouzard
        $ret = "<form name='".$this->getName()."' id='".$this->getName()."' action='".$this->getAction()."' method='".$this->getMethod()."' ".$this->getExtra().">\n<table width='100%' class='outer' cellspacing='1'><tr><th colspan='2'>".$this->getTitle()."</th></tr>";
        //$count = 0;
        foreach ( $this->getElements() as $ele ) {
            if (!is_object($ele)) {
                $ret .= $ele;
            } elseif (!$ele->isHidden()) {
                $class = 'even';
                $suppl='';
                if(in_array($ele->getName(),$reqnames)) {
                    $suppl=' *';
                }
                $ret .= "<tr valign='top' align='left'><td class='head'>".$ele->getCaption().$suppl;
                // End Hack Herv� Thouzard
                if ($ele->getDescription() != '') {
                    $ret .= '<br /><br /><span style="font-weight: normal;">'.$ele->getDescription().'</span>';
                }
                $ret .= "</td><td class='$class'>".$ele->render()."</td></tr>";
                //$count++;
            } else {
                $hidden .= $ele->render()."\n";
            }
        }
        if (count($reqnames) > 0) {
            //We have required fields - provide explanation for *
            $ret .= "<tr class='foot'><td colspan='2'>* = "._REQUIRED."</td></tr>";
        }
        $ret .= "</table>".$hidden."\n</form>\n";
        $ret .= $this->renderValidationJS( true );
        return $ret;
    }
}
?>