<?php
// $Id: formselecteditor.php,v 1.3 2005/08/08 23:44:47 mauriciodelima Exp $
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
 * base class
 */
include_once XOOPS_ROOT_PATH."/class/xoopsform/formelementtray.php";

/**
 * A select box with available editors
 * 
 * @package     kernel
 * @subpackage  form
 * 
 * @author	    phppp (D.J.)
 * @copyright	copyright (c) 2000-2003 XOOPS.org
 */
class XoopsFormSelectEditor extends XoopsFormElementTray
{	
	/**
	 * Constructor
	 * 
	 * @param	object	$form	the form calling the editor selection	
	 * @param	string	$name	editor name
	 * @param	string	$value	Pre-selected text value
     * @param	bool	$noHtml  dohtml disabled
	 */
	function XoopsFormSelectEditor(&$form, $name="editor", $value=null, $noHtml=false)
	{
		$this->XoopsFormElementTray(_SELECTEDITOR);

		$editor_handler =& xoops_gethandler("editor");
		$option_select = new XoopsFormSelect("", $name, $value);
		$extra = 'onchange="if(this.options[this.selectedIndex].value.length > 0 ){
			window.document.forms.'.$form->getName().'.skipValidationJS.value=1;
			window.document.forms.'.$form->getName().'.submit();
			}"';
		$option_select->setExtra($extra);
		$option_select->addOptionArray($editor_handler->getList($noHtml));
		
		$this->addElement($option_select);
	}
}
?>