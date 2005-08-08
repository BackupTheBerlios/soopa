<?php
// $Id: auth.php,v 1.3 2005/08/08 23:44:45 mauriciodelima Exp $
// auth.php - defines abstract authentification wrapper class 
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
if ( file_exists(XOOPS_ROOT_PATH."/language/".$GLOBALS['xoopsConfig']['language']."/error.php") ) {
    include_once XOOPS_ROOT_PATH."/language/".$GLOBALS['xoopsConfig']['language']."/error.php";
} else {
    include_once XOOPS_ROOT_PATH."/language/english/error.php";
}
/**
 * @package     kernel
 * @subpackage  auth
 * 
 * @author	    Pierre-Eric MENUET	<pemphp@free.fr>
 * @copyright	copyright (c) 2000-2003 XOOPS.org
 */
class XoopsAuth {

	var	$_dao;

	var	$_errors;
	/**
	 * Authentication Service constructor
	 */
	function XoopsAuth (&$dao){
		$this->_dao = $dao;
	}

	/**
	 * @abstract need to be write in the dervied class
	 */	
	function authenticate() {
		$authenticated = false;
				
		return $authenticated;
	}		
	
    /**
     * add an error 
     * 
     * @param string $value error to add
     * @access public
     */
    function setErrors($err_no, $err_str)
    {
        $this->_errors[$err_no] = trim($err_str);
    }

    /**
     * return the errors for this object as an array
     * 
     * @return array an array of errors
     * @access public
     */
    function getErrors()
    {
        return $this->_errors;
    }

    /**
     * return the errors for this object as html
     * 
     * @return string html listing the errors
     * @access public
     */
    function getHtmlErrors()
    {
	    /*
        if ( file_exists(XOOPS_ROOT_PATH."/language/".$GLOBALS['xoopsConfig']['language']."/error.php") ) {
            include_once XOOPS_ROOT_PATH."/language/".$GLOBALS['xoopsConfig']['language']."/error.php";
        } else {
            include_once XOOPS_ROOT_PATH."/language/english/error.php";
        }
        */
        //$ret = '<h4>'._ERRORS.'</h4>';
        $ret = '<br>';
        if (!empty($this->_errors)) {
            foreach ($this->_errors as $errno => $errstr) {
            	$msg = (function_exists("ldap_err2str") ? ldap_err2str ($errno) : ''); 
                $ret .=  $msg . ' <br> ' . $errstr .'<br />';
            }
        } else {
            $ret .= _NONE.'<br />';
        }
        return $ret;
    }	
}

?>