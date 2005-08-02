<?php
// $Id: formhidden.php,v 1.1 2005/08/02 18:46:10 mauriciodelima Exp $
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
 * @package     kernel
 * @subpackage  form
 * 
 * @author	    Kazumi Ono	<onokazu@xoops.org>
 * @copyright	copyright (c) 2000-2003 XOOPS.org
 */
/**
 * A hidden field
 * 
 * @package     kernel
 * @subpackage  form
 * 
 * @author	    Kazumi Ono	<onokazu@xoops.org>
 * @copyright	copyright (c) 2000-2003 XOOPS.org
 */
class XoopsFormHidden extends XoopsFormElement {

	/**
     * Value
	 * @var	string	
	 * @access	private
	 */
	var $_value;

	/**
	 * Constructor
	 * 
	 * @param	string	$name	"name" attribute
	 * @param	string	$value	"value" attribute
	 */
	function XoopsFormHidden($name, $value, $id=""){
		$this->setName($name);
		$this->setHidden();
		$this->setValue($value);
		$this->setCaption("");
		$this->setId($id);
	}

	/**
	 * Get the "value" attribute
	 * 
	 * @return	string
	 */
	function getValue(){
		return $this->_value;
	}

	/**
	 * Sets the "value" attribute
	 * 
	 * @patam  $value	string
	 */
	function setValue($value){
		$this->_value = $value;
	}

	/**
	 * Prepare HTML for output
	 * 
	 * @return	string	HTML
	 */
	function render(){
		return "<input type='hidden' name='".$this->getName()."' id='".$this->getId()."' value='".$this->getValue()."' />";
	}
}
?>