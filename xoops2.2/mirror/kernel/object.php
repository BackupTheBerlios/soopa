<?php
// $Id: object.php,v 1.3 2005/08/08 23:43:18 mauriciodelima Exp $
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
 * @package kernel
 * @copyright copyright &copy; 2000 XOOPS.org
 */

/**#@+
* Xoops object datatype
*
**/
define('XOBJ_DTYPE_TXTBOX', 1);
define('XOBJ_DTYPE_TXTAREA', 2);
define('XOBJ_DTYPE_INT', 3);
define('XOBJ_DTYPE_URL', 4);
define('XOBJ_DTYPE_EMAIL', 5);
define('XOBJ_DTYPE_ARRAY', 6);
define('XOBJ_DTYPE_OTHER', 7);
define('XOBJ_DTYPE_SOURCE', 8);
define('XOBJ_DTYPE_STIME', 9);
define('XOBJ_DTYPE_MTIME', 10);
define('XOBJ_DTYPE_LTIME', 11);
/**#@-*/

//include_once "xoopspluginloader.php";

/**
 * Base class for all objects in the Xoops kernel (and beyond) 
 * 
 * @author Kazumi Ono (AKA onokazu)
 * @copyright copyright &copy; 2000 XOOPS.org
 * @package kernel
 **/
class XoopsObject
{

    /**
     * holds all variables(properties) of an object
     * 
     * @var array
     * @access protected
     **/
    var $vars = array();

    /**
    * variables cleaned for store in DB
    * 
    * @var array
    * @access protected
    */
    var $cleanVars = array();

    /**
    * is it a newly created object?
    * 
    * @var bool
    * @access private
    */
    var $_isNew = false;

    /**
    * has any of the values been modified?
    * 
    * @var bool
    * @access private
    */
    var $_isDirty = false;

    /**
    * errors
    * 
    * @var array
    * @access private
    */
    var $_errors = array();

    /**
    * additional filters registered dynamically by a child class object
    * 
    * @access private
    */
    var $_filters = array();

    /**
    * constructor
    * 
    * normally, this is called from child classes only
    * @access public
    */
    function XoopsObject()
    {
    }

    /**#@+
    * used for new/clone objects
    *
    * @access public
    */
    function setNew()
    {
        $this->_isNew = true;
    }
    function unsetNew()
    {
        $this->_isNew = false;
    }
    function isNew()
    {
        return $this->_isNew;
    }
    /**#@-*/

    /**#@+
    * mark modified objects as dirty
    *
    * used for modified objects only
    * @access public
    */
    function setDirty()
    {
        $this->_isDirty = true;
    }
    function unsetDirty()
    {
        $this->_isDirty = false;
    }
    function isDirty()
    {
        return $this->_isDirty;
    }
    /**#@-*/

    /**
    * initialize variables for the object
    * 
    * @access public
    * @param string $key
    * @param int $data_type  set to one of XOBJ_DTYPE_XXX constants (set to XOBJ_DTYPE_OTHER if no data type ckecking nor text sanitizing is required)
    * @param mixed
    * @param bool $required  require html form input?
    * @param int $maxlength  for XOBJ_DTYPE_TXTBOX type only
    * @param string $option  does this data have any select options?
    */
    function initVar($key, $data_type, $value = null, $required = false, $maxlength = null, $options = '')
    {
        $this->vars[$key] = array('value' => $value, 'required' => $required, 'data_type' => $data_type, 'maxlength' => $maxlength, 'changed' => false, 'options' => $options);
    }

    /**
    * assign a value to a variable
    * 
    * @access public
    * @param string $key name of the variable to assign
    * @param mixed $value value to assign
    */
    function assignVar($key, $value)
    {
        if (isset($value) && isset($this->vars[$key])) {
            $this->vars[$key]['value'] =& $value;
        }
    }

    /**
    * assign values to multiple variables in a batch
    * 
    * @access private
    * @param array $var_array associative array of values to assign
    */
    function assignVars($var_arr)
    {
        foreach ($var_arr as $key => $value) {
            $this->assignVar($key, $value);
        }
    }

    /**
    * assign a value to a variable
    * 
    * @access public
    * @param string $key name of the variable to assign
    * @param mixed $value value to assign
    * @param bool $not_gpc
    */
    function setVar($key, $value, $not_gpc = false)
    {
        if (!empty($key) && isset($value) && isset($this->vars[$key])) {
            $this->vars[$key]['value'] =& $value;
            $this->vars[$key]['not_gpc'] = $not_gpc;
            $this->vars[$key]['changed'] = true;
            $this->setDirty();
        }
    }

    /**
    * assign values to multiple variables in a batch
    * 
    * @access private
    * @param array $var_arr associative array of values to assign
    * @param bool $not_gpc
    */
    function setVars($var_arr, $not_gpc = false)
    {
        foreach ($var_arr as $key => $value) {
            $this->setVar($key, $value, $not_gpc);
        }
    }

    /**
	* Assign values to multiple variables in a batch
	*
	* Meant for a CGI contenxt:
	* - prefixed CGI args are considered save
	* - avoids polluting of namespace with CGI args
	*
	* @access private
	* @param array $var_arr associative array of values to assign
	* @param string $pref prefix (only keys starting with the prefix will be set)
	*/
    function setFormVars($var_arr=null, $pref='xo_', $not_gpc=false) {
        $len = strlen($pref);
        foreach ($var_arr as $key => $value) {
            if ($pref == substr($key,0,$len)) {
                $this->setVar(substr($key,$len), $value, $not_gpc);
            }
        }
    }


    /**
    * returns all variables for the object
    * 
    * @access public
    * @return array associative array of key->value pairs
    */
    function &getVars()
    {
        return $this->vars;
    }

    /**
    * returns a specific variable for the object in a proper format
    * 
    * @access public
    * @param string $key key of the object's variable to be returned
    * @param string $format format to use for the output
    * @return mixed formatted value of the variable
    */
    function &getVar($key, $format = 's')
    {
        $ret = $this->vars[$key]['value'];
        switch ($this->vars[$key]['data_type']) {

            case XOBJ_DTYPE_TXTBOX:
            switch (strtolower($format)) {
                case 's':
                case 'show':
                case 'e':
                case 'edit':
                $ts =& MyTextSanitizer::getInstance();
                return $ts->htmlSpecialChars($ret);
                break 1;
                case 'p':
                case 'preview':
                case 'f':
                case 'formpreview':
                $ts =& MyTextSanitizer::getInstance();
                return $ts->htmlSpecialChars($ts->stripSlashesGPC($ret));
                break 1;
                case 'n':
                case 'none':
                default:
                break 1;
            }
            break;
            case XOBJ_DTYPE_TXTAREA:
            switch (strtolower($format)) {
                case 's':
                case 'show':
                $ts =& MyTextSanitizer::getInstance();
                $html = !empty($this->vars['dohtml']['value']) ? 1 : 0;
                $xcode = (!isset($this->vars['doxcode']['value']) || $this->vars['doxcode']['value'] == 1) ? 1 : 0;
                $smiley = (!isset($this->vars['dosmiley']['value']) || $this->vars['dosmiley']['value'] == 1) ? 1 : 0;
                $image = (!isset($this->vars['doimage']['value']) || $this->vars['doimage']['value'] == 1) ? 1 : 0;
                $br = (!isset($this->vars['dobr']['value']) || $this->vars['dobr']['value'] == 1) ? 1 : 0;
                return $ts->displayTarea($ret, $html, $smiley, $xcode, $image, $br);
                break 1;
                case 'e':
                case 'edit':
                return htmlspecialchars($ret, ENT_QUOTES);
                break 1;
                case 'p':
                case 'preview':
                $ts =& MyTextSanitizer::getInstance();
                $html = !empty($this->vars['dohtml']['value']) ? 1 : 0;
                $xcode = (!isset($this->vars['doxcode']['value']) || $this->vars['doxcode']['value'] == 1) ? 1 : 0;
                $smiley = (!isset($this->vars['dosmiley']['value']) || $this->vars['dosmiley']['value'] == 1) ? 1 : 0;
                $image = (!isset($this->vars['doimage']['value']) || $this->vars['doimage']['value'] == 1) ? 1 : 0;
                $br = (!isset($this->vars['dobr']['value']) || $this->vars['dobr']['value'] == 1) ? 1 : 0;
                return $ts->previewTarea($ret, $html, $smiley, $xcode, $image, $br);
                break 1;
                case 'f':
                case 'formpreview':
                $ts =& MyTextSanitizer::getInstance();
                return htmlspecialchars($ts->stripSlashesGPC($ret), ENT_QUOTES);
                break 1;
                case 'n':
                case 'none':
                default:
                break 1;
            }
            break;
            case XOBJ_DTYPE_ARRAY:
            if (!is_array($ret)) {
                if ($ret != "") {
                    $ret =& unserialize($ret);
                }
            	$ret = is_array($ret)?$ret:array();
            }
            break;
            case XOBJ_DTYPE_SOURCE:
            switch (strtolower($format)) {
                case 's':
                case 'show':
                break 1;
                case 'e':
                case 'edit':
                return htmlspecialchars($ret, ENT_QUOTES);
                break 1;
                case 'p':
                case 'preview':
                $ts =& MyTextSanitizer::getInstance();
                return $ts->stripSlashesGPC($ret);
                break 1;
                case 'f':
                case 'formpreview':
                $ts =& MyTextSanitizer::getInstance();
                return htmlspecialchars($ts->stripSlashesGPC($ret), ENT_QUOTES);
                break 1;
                case 'n':
                case 'none':
                default:
                break 1;
            }
            break;
            default:
            if ($this->vars[$key]['options'] != '' && $ret != '') {
                switch (strtolower($format)) {
                    case 's':
                    case 'show':
                    $selected = explode('|', $ret);
                    $options = explode('|', $this->vars[$key]['options']);
                    $i = 1;
                    $ret = array();
                    foreach ($options as $op) {
                        if (in_array($i, $selected)) {
                            $ret[] = $op;
                        }
                        $i++;
                    }
                    return implode(', ', $ret);
                    case 'e':
                    case 'edit':
                    $ret = explode('|', $ret);
                    break 1;
                    default:
                    break 1;
                }

            }
            break;
        }
        return $ret;
    }

    /**
     * clean values of all variables of the object for storage. 
     * also add slashes whereever needed
     * 
     * @return bool true if successful
     * @access public
     */
    function cleanVars()
    {
        if ( file_exists(XOOPS_ROOT_PATH."/language/".$GLOBALS['xoopsConfig']['language']."/error.php") ) {
            include_once XOOPS_ROOT_PATH."/language/".$GLOBALS['xoopsConfig']['language']."/error.php";
        } else {
            include_once XOOPS_ROOT_PATH."/language/english/error.php";
        }
        $ts =& MyTextSanitizer::getInstance();
        foreach ($this->vars as $k => $v) {
            $cleanv = $v['value'];
            if (!$v['changed']) {
            } else {
                $cleanv = is_string($cleanv) ? trim($cleanv) : $cleanv;
                switch ($v['data_type']) {
                    case XOBJ_DTYPE_TXTBOX:
                    if ($v['required'] && $cleanv != '0' && $cleanv == '') {
                        $this->setErrors(sprintf(_ER_OB_ISREQUIRED, $k));
                        continue;
                    }
                    if (isset($v['maxlength']) && $v['maxlength'] > 0 && strlen($cleanv) > intval($v['maxlength'])) {
                        $this->setErrors(sprintf(_ER_OB_MUSTBESHORTER, $k, intval($v['maxlength'])));
                        continue;
                    }
                    if (!$v['not_gpc']) {
                        $cleanv = $ts->stripSlashesGPC($ts->censorString($cleanv));
                    } else {
                        $cleanv = $ts->censorString($cleanv);
                    }
                    break;
                    case XOBJ_DTYPE_TXTAREA:
                    if ($v['required'] && $cleanv != '0' && $cleanv == '') {
                        $this->setErrors(sprintf(_ER_OB_ISREQUIRED, $k));
                        continue;
                    }
                    if (isset($v['maxlength']) && $v['maxlength'] > 0 && strlen($cleanv) > intval($v['maxlength'])) {
                        $this->setErrors(sprintf(_ER_OB_MUSTBESHORTER, $k, intval($v['maxlength'])));
                        continue;
                    }
                    if (!$v['not_gpc']) {
                        $cleanv = $ts->stripSlashesGPC($ts->censorString($cleanv));
                    } else {
                        $cleanv = $ts->censorString($cleanv);
                    }
                    break;
                    case XOBJ_DTYPE_SOURCE:
                    if (!$v['not_gpc']) {
                        $cleanv = $ts->stripSlashesGPC($cleanv);
                    } else {
                        $cleanv = $cleanv;
                    }
                    break;
                    case XOBJ_DTYPE_INT:
                    $cleanv = intval($cleanv);
                    break;
                    case XOBJ_DTYPE_EMAIL:
                    if ($v['required'] && $cleanv == '') {
                        $this->setErrors(sprintf(_ER_OB_ISREQUIRED, $k));
                        continue;
                    }
                    if ($cleanv != '' && !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+([\.][a-z0-9-]+)+$/i",$cleanv)) {
                        $this->setErrors(_ER_OB_INVALIDEDMAIL);
                        continue;
                    }
                    if (!$v['not_gpc']) {
                        $cleanv = $ts->stripSlashesGPC($cleanv);
                    }
                    break;
                    case XOBJ_DTYPE_URL:
                    if ($v['required'] && $cleanv == '') {
                        $this->setErrors(sprintf(_ER_OB_ISREQUIRED, $k));
                        continue;
                    }
                    if ($cleanv != '' && !preg_match("/^http[s]*:\/\//i", $cleanv)) {
                        $cleanv = 'http://' . $cleanv;
                    }
                    if (!$v['not_gpc']) {
                        $cleanv =& $ts->stripSlashesGPC($cleanv);
                    }
                    break;
                    case XOBJ_DTYPE_ARRAY:
                    if (!$v['not_gpc']) {
                        $cleanv = array_map(array($ts, 'stripSlashesGPC'), $cleanv);
                    }
                    $cleanv = is_array($cleanv)?serialize($cleanv):serialize(array());
                        
                    break;
                    case XOBJ_DTYPE_STIME:
                    case XOBJ_DTYPE_MTIME:
                    case XOBJ_DTYPE_LTIME:
                    $cleanv = !is_string($cleanv) ? intval($cleanv) : strtotime($cleanv);
                    break;
                    default:
                    break;
                }
            }
            $this->cleanVars[$k] =& $cleanv;
            unset($cleanv);
        }
        if (count($this->_errors) > 0) {
            return false;
        }
        $this->unsetDirty();
        return true;
    }

    /**
     * dynamically register additional filter for the object
     * 
     * @param string $filtername name of the filter
     * @access public
     */
    function registerFilter($filtername)
    {
        $this->_filters[] = $filtername;
    }

    /**
     * load all additional filters that have been registered to the object
     * 
     * @access private
     */
    function _loadFilters()
    {
        //include_once XOOPS_ROOT_PATH.'/class/filters/filter.php';
        //foreach ($this->_filters as $f) {
        //    include_once XOOPS_ROOT_PATH.'/class/filters/'.strtolower($f).'php';
        //}
    }

    /**
     * create a clone(copy) of the current object
     * 
     * @access public
     * @return object clone
     */
    function &xoopsClone()
    {
        $class = get_class($this);
        $clone = new $class();
        foreach ($this->vars as $k => $v) {
            $clone->assignVar($k, $v['value']);
        }
        // need this to notify the handler class that this is a newly created object
        $clone->setNew();
        return $clone;
    }

    /**
     * add an error 
     * 
     * @param string $value error to add
     * @access public
     */
    function setErrors($err_str)
    {
        $this->_errors[] = trim($err_str);
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
        if ( file_exists(XOOPS_ROOT_PATH."/language/".$GLOBALS['xoopsConfig']['language']."/error.php") ) {
            include_once XOOPS_ROOT_PATH."/language/".$GLOBALS['xoopsConfig']['language']."/error.php";
        } else {
            include_once XOOPS_ROOT_PATH."/language/english/error.php";
        }
        $ret = '<h4>'._ERRORS.'</h4>';
        if (!empty($this->_errors)) {
            foreach ($this->_errors as $error) {
                $ret .= $error.'<br />';
            }
        } else {
            $ret .= _NONE.'<br />';
        }
        return $ret;
    }

    /**
    * Returns an array representation of the object
    *
    * @return array
    */
    function toArray() {
        $ret = array();
        $vars = $this->getVars();
        foreach (array_keys($vars) as $i) {
            $ret[$i] = $this->getVar($i);
        }
        return $ret;
    }
}

/**
* XOOPS object handler class.  
* This class is an abstract class of handler classes that are responsible for providing
* data access mechanisms to the data source of its corresponsing data objects
* @package kernel
* @abstract
*
* @author  Kazumi Ono <onokazu@xoops.org>
* @copyright copyright &copy; 2000 The XOOPS Project
*/
class XoopsObjectHandler
{

    /**
     * holds referenced to {@link XoopsDatabase} class object
	 * 
	 * @var object
	 * @see XoopsDatabase
     * @access protected
     */
    var $db;

    //
    /**
     * called from child classes only
	 * 
	 * @param object $db reference to the {@link XoopsDatabase} object
     * @access protected
     */
    function XoopsObjectHandler(&$db)
    {
        $this->db =& $db;
    }

    /**
     * creates a new object
     * 
     * @abstract
     */
    function &create()
    {
    }

    /**
     * gets a value object
     * 
	 * @param int $int_id
     * @abstract
     */
    function &get($int_id)
    {
    }

    /**
     * insert/update object
     * 
	 * @param object $object
     * @abstract
     */
    function insert(&$object)
    {
    }

    /**
     * delete obejct from database
     * 
	 * @param object $object
     * @abstract
     */
    function delete(&$object)
    {
    }

}

/**
* Persistable Object Handler class.  
* This class is responsible for providing data access mechanisms to the data source 
* of derived class objects.
*
* @author  Jan Keller Pedersen <mithrandir@xoops.org> - IDG Danmark A/S <www.idg.dk>
* @copyright copyright (c) 2000-2004 XOOPS.org
* @package Kernel
*/

class XoopsPersistableObjectHandler extends XoopsObjectHandler {

    /**#@+
    * Information about the class, the handler is managing
    *
    * @var string
    */
    var $table;
    var $keyName;
    var $className;
    var $identifierName;
    /**#@-*/

    /**
    * Constructor - called from child classes
    * @param object     $db         {@link XoopsDatabase} object
    * @param string     $tablename  Name of database table
    * @param string     $classname  Name of Class, this handler is managing
    * @param string     $keyname    Name of the property, holding the key
    *
    * @return void
    */
    function XoopsPersistableObjectHandler(&$db, $tablename, $classname, $keyname, $idenfierName = false) {
        $this->XoopsObjectHandler($db);
        $this->table = $db->prefix($tablename);
        $this->keyName = $keyname;
        $this->className = $classname;
        if ($idenfierName != false) {
            $this->identifierName = $idenfierName;
        }
    }

    /**
     * create a new user
     * 
     * @param bool $isNew Flag the new objects as "new"?
     *
     * @return object
     */
    function &create($isNew = true) {
        $obj = new $this->className();
        if ($isNew === true) {
            $obj->setNew();
        }
        return $obj;
    }

    /**
     * retrieve an object
     * 
     * @param mixed $id ID of the object - or array of ids for joint keys. Joint keys MUST be given in the same order as in the constructor
     * @param bool $as_object whether to return an object or an array
     * @return mixed reference to the object, FALSE if failed
     */
    function &get($id, $as_object = true) {
        if (is_array($this->keyName)) {
            $criteria = new CriteriaCompo();
            for ($i = 0; $i < count($this->keyName); $i++) {
                $criteria->add(new Criteria($this->keyName[$i], intval($id[$i])));
            }
        }
        else {
            $criteria = new Criteria($this->keyName, intval($id));
        }
        $criteria->setLimit(1);
        $obj_array = $this->getObjects($criteria, false, $as_object);
        if (count($obj_array) != 1) {
            return $this->create();
        }
        return $obj_array[0];
    }

    /**
     * retrieve objects from the database
     * 
     * @param object $criteria {@link CriteriaElement} conditions to be met
     * @param bool $id_as_key use the ID as key for the array?
     * @param bool $as_object return an array of objects?
     *
     * @return array
     */
    function &getObjects($criteria = null, $id_as_key = false, $as_object = true)
    {
        $ret = array();
        $limit = $start = 0;
        $sql = 'SELECT * FROM '.$this->table;
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $sql .= ' '.$criteria->renderWhere();
            if ($criteria->getSort() != '') {
                $sql .= ' ORDER BY '.$criteria->getSort().' '.$criteria->getOrder();
            }
            $limit = $criteria->getLimit();
            $start = $criteria->getStart();
        }
        $result = $this->db->query($sql, $limit, $start);
        if (!$result) {
            return $ret;
        }

        return $this->convertResultSet($result, $id_as_key, $as_object);
    }

    /**
     * Convert a database resultset to a returnable array
     *
     * @param object $result database resultset
     * @param bool $id_as_key - should NOT be used with joint keys
     * @param bool $as_object
     *
     * @return array
     */
    function convertResultSet($result, $id_as_key = false, $as_object = true) {
        $ret = array();
        while ($myrow = $this->db->fetchArray($result)) {
            $obj =& $this->create(false);
            $obj->assignVars($myrow);
            if (!$id_as_key) {
                if ($as_object) {
                    $ret[] =& $obj;
                }
                else {
                    $row = array();
                    $vars = $obj->getVars();
                    foreach (array_keys($vars) as $i) {
                        $row[$i] = $obj->getVar($i);
                    }
                    $ret[] = $row;
                }
            } else {
                if ($as_object) {
                    $ret[$myrow[$this->keyName]] =& $obj;
                }
                else {
                    $row = array();
                    $vars = $obj->getVars();
                    foreach (array_keys($vars) as $i) {
                        $row[$i] = $obj->getVar($i);
                    }
                    $ret[$myrow[$this->keyName]] = $row;
                }
            }
            unset($obj);
        }

        return $ret;
    }

    /**
    * Retrieve a list of objects as arrays - DON'T USE WITH JOINT KEYS
    *
    * @param object $criteria {@link CriteriaElement} conditions to be met
    * @param int   $limit      Max number of objects to fetch
    * @param int   $start      Which record to start at
    *
    * @return array
    */
    function getList($criteria = null, $limit = 0, $start = 0) {
        $ret = array();
        if ($criteria == null) {
            $criteria = new CriteriaCompo();
        }
        
        if ($criteria->getSort() == '') {
            $criteria->setSort($this->identifierName);
        }
            
        $sql = 'SELECT '.$this->keyName;
        if(!empty($this->identifierName)){
	        $sql .= ', '.$this->identifierName;
        }
        $sql .= ' FROM '.$this->table;
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $sql .= ' '.$criteria->renderWhere();
            if ($criteria->getSort() != '') {
                $sql .= ' ORDER BY '.$criteria->getSort().' '.$criteria->getOrder();
            }
            $limit = $criteria->getLimit();
            $start = $criteria->getStart();
        }
        $result = $this->db->query($sql, $limit, $start);
        if (!$result) {
            return $ret;
        }

        $myts =& MyTextSanitizer::getInstance();
        while ($myrow = $this->db->fetchArray($result)) {
            //identifiers should be textboxes, so sanitize them like that
            $ret[$myrow[$this->keyName]] = empty($this->identifierName)?1:$myts->htmlSpecialChars($myrow[$this->identifierName]);
        }
        return $ret;
    }

    /**

     * count objects matching a condition
     * 
     * @param object $criteria {@link CriteriaElement} to match
     * @return int count of objects
     */
    function getCount($criteria = null)
    {
        $field = "";
        $groupby = false;
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            if ($criteria->groupby != "") {
                $groupby = true;
                $field = $criteria->groupby.", "; //Not entirely secure unless you KNOW that no criteria's groupby clause is going to be mis-used
            }
        }
        $sql = 'SELECT '.$field.'COUNT(*) FROM '.$this->table;
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $sql .= ' '.$criteria->renderWhere();
            if ($criteria->groupby != "") {
                $sql .= $criteria->getGroupby();
            }
        }
        $result = $this->db->query($sql);
        if (!$result) {
            return 0;
        }
        if ($groupby == false) {
            list($count) = $this->db->fetchRow($result);
            return $count;
        }
        else {
            $ret = array();
            while (list($id, $count) = $this->db->fetchRow($result)) {
                $ret[$id] = $count;
            }
            return $ret;
        }
    }

    /**
     * delete an object from the database
     * 
     * @param object $obj reference to the object to delete
     * @param bool $force
     * @return bool FALSE if failed.
     */
    function delete(&$obj, $force = false)
    {
        if (is_array($this->keyName)) {
            $whereclause = "";
            for ($i = 0; $i < count($this->keyName); $i++) {
                $whereclause .= $this->keyName[$i]." = ".$obj->getVar($this->keyName[$i]);
            }
        }
        else {
            $whereclause = $this->keyName." = ".$obj->getVar($this->keyName);
        }
        $sql = "DELETE FROM ".$this->table." WHERE ".$whereclause;
        if (false != $force) {
            $result = $this->db->queryF($sql);
        } else {
            $result = $this->db->query($sql);
        }
        if (!$result) {
            return false;
        }
        return true;
    }

    /**
     * insert a new object in the database
     * 
     * @param object $obj reference to the object
     * @param bool $force whether to force the query execution despite security settings
     * @param bool $checkObject check if the object is dirty and clean the attributes
     * @return bool FALSE if failed, TRUE if already present and unchanged or successful
     */

    function insert(&$obj, $force = false, $checkObject = true)
    {
        if ($checkObject != false) {
            if (!is_object($obj)) {
                var_dump($obj);
                return false;
            }
            /**
        * @TODO: Change to if (!(class_exists($this->className) && $obj instanceof $this->className)) when going fully PHP5
        */
            if (!is_a($obj, $this->className)) {
                $obj->setErrors(get_class($obj)." Differs from ".$this->className);
                return false;
            }
            if (!$obj->isDirty()) {
                $obj->setErrors("Not dirty"); //will usually not be outputted as errors are not displayed when the method returns true, but it can be helpful when troubleshooting code - Mith
                return true;
            }
        }
        if (!$obj->cleanVars()) {
            return false;
        }

        foreach ($obj->cleanVars as $k => $v) {
            if ($obj->vars[$k]['data_type'] == XOBJ_DTYPE_INT) {
                $cleanvars[$k] = intval($v);
            }
            else {
                $cleanvars[$k] = $this->db->quoteString($v);
            }
        }
        if ($obj->isNew()) {
            if (!is_array($this->keyName)) {
                if ($cleanvars[$this->keyName] < 1) {
                    $cleanvars[$this->keyName] = $this->db->genId($this->table.'_'.$this->keyName.'_seq');
                }
            }
            $sql = "INSERT INTO ".$this->table." (".implode(',', array_keys($cleanvars)).") VALUES (".implode(',', array_values($cleanvars)) .")";
        } else {
            $sql = "UPDATE ".$this->table." SET";
            foreach ($cleanvars as $key => $value) {
                if ((!is_array($this->keyName) && $key == $this->keyName) || (is_array($this->keyName) && in_array($key, $this->keyName))) {
                    continue;
                }
                if (isset($notfirst) ) {
                    $sql .= ",";
                }
                $sql .= " ".$key." = ".$value;
                $notfirst = true;
            }
            if (is_array($this->keyName)) {
                $whereclause = "";
                for ($i = 0; $i < count($this->keyName); $i++) {
                    if ($i > 0) {
                        $whereclause .= " AND ";
                    }
                    $whereclause .= $this->keyName[$i]." = ".$obj->getVar($this->keyName[$i]);
                }
            }
            else {
                $whereclause = $this->keyName." = ".$obj->getVar($this->keyName);
            }
            $sql .= " WHERE ".$whereclause;
        }
        //echo "<script type=\"text/javascript\">alert(\"$sql\");</script>";
        if (false != $force) {
            $result = $this->db->queryF($sql);
        } else {
            $result = $this->db->query($sql);
        }
        if (!$result) {
            return false;
        }
        if ($obj->isNew() && !is_array($this->keyName)) {
            $obj->assignVar($this->keyName, $this->db->getInsertId());
        }
        return true;
    }

    /**
     * Change a value for objects with a certain criteria
     * 
     * @param   string  $fieldname  Name of the field
     * @param   string  $fieldvalue Value to write
     * @param   object  $criteria   {@link CriteriaElement} 
     * 
     * @return  bool
     **/
    function updateAll($fieldname, $fieldvalue, $criteria = null, $force = false)
    {
        $set_clause = is_numeric($fieldvalue) ? $fieldname.' = '.$fieldvalue : $fieldname.' = '.$this->db->quoteString($fieldvalue);
        $sql = 'UPDATE '.$this->table.' SET '.$set_clause;
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $sql .= ' '.$criteria->renderWhere();
        }
        if (false != $force) {
            $result = $this->db->queryF($sql);
        } else {
            $result = $this->db->query($sql);
        }
        if (!$result) {
            return false;
        }
        return true;
    }

    /**
     * delete all objects meeting the conditions
     * 
     * @param object $criteria {@link CriteriaElement} with conditions to meet
     * @return bool
     */

    function deleteAll($criteria = null)
    {
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $sql = 'DELETE FROM '.$this->table;
            $sql .= ' '.$criteria->renderWhere();
            if (!$this->db->query($sql)) {
                return false;
            }
            $rows = $this->db->getAffectedRows();
            return $rows > 0 ? $rows : true;
        }
        return false;
    }
}
?>