<?php
// $Id: configcategory.php,v 1.3 2005/08/08 23:44:48 mauriciodelima Exp $
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

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}

/**
 * 
 * 
 * @package     kernel
 * 
 * @author	    Kazumi Ono	<onokazu@xoops.org>
 * @copyright	copyright (c) 2000-2003 XOOPS.org
 */


/**
 * A category of configs
 * 
 * @author	Kazumi Ono	<onokazu@xoops.org>
 * @copyright	copyright (c) 2000-2003 XOOPS.org
 * 
 * @package     kernel
 */
class XoopsConfigCategory extends XoopsObject
{
    /**
     * Constructor
     * 
     */
    function XoopsConfigCategory()
    {
        $this->XoopsObject();
        $this->initVar('confcat_id', XOBJ_DTYPE_INT, null);
        $this->initVar('confcat_modid', XOBJ_DTYPE_INT, 0);
        $this->initVar('confcat_name', XOBJ_DTYPE_OTHER, null);
        $this->initVar('confcat_order', XOBJ_DTYPE_INT, 0);
        $this->initVar('confcat_nameid', XOBJ_DTYPE_TXTBOX, null, true, 50);
        $this->initVar('confcat_description', XOBJ_DTYPE_TXTAREA, null, false);
    }
}


/**
 * XOOPS configuration category handler class.  
 * 
 * This class is responsible for providing data access mechanisms to the data source 
 * of XOOPS configuration category class objects.
 *
 * @author  Kazumi Ono <onokazu@xoops.org>
 * @copyright	copyright (c) 2000-2003 XOOPS.org
 * 
 * @package     kernel
 * @subpackage  config
 */
class XoopsConfigCategoryHandler extends XoopsPersistableObjectHandler
{
    function XoopsConfigCategoryHandler(&$db) {
        $this->XoopsPersistableObjectHandler($db, 'configcategory', 'XoopsConfigCategory', array('confcat_id', 'confcat_modid'), 'confcat_name');
    }
    
    /**
    * Get array of categories for a module
    *
    * @param int $modid ID of module
    *
    * @return array
    **/
    function getCatByModule($modid = 0)
    {
    	$criteria = new criteria('confcat_modid', $modid);
    	$ret = $this->getObjects($criteria, false);
    	return $ret;
    }
}
?>