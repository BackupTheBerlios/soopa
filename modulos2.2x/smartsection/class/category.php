<?php

/**
* $Id: category.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}

include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/common.php';

class ssCategory extends XoopsObject
{
    /**
     * @var array
	 * @access private
     */
    var $_groups_read = null;

    /**
     * @var array
	 * @access private
     */
    var $_groups_admin = null;    
	
	/**
	* constructor
	*/
	function ssCategory($id = null)
	{
		$this->db =& Database::getInstance();
		$this->initVar("categoryid", XOBJ_DTYPE_INT, null, false);
		$this->initVar("parentid", XOBJ_DTYPE_INT, null, false);
		$this->initVar("name", XOBJ_DTYPE_TXTBOX, null, true, 100);
		$this->initVar("description", XOBJ_DTYPE_TXTAREA, null, false, 255);
		$this->initVar("image", XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar("total", XOBJ_DTYPE_INT, 1, false);
		$this->initVar("weight", XOBJ_DTYPE_INT, 1, false);
		$this->initVar("created", XOBJ_DTYPE_INT, null, false);
		
		//not persistent values
		$this->initVar("itemcount", XOBJ_DTYPE_INT, 0, false);
		$this->initVar('last_itemid', XOBJ_DTYPE_INT);
		$this->initVar('last_title_link', XOBJ_DTYPE_TXTBOX);	
		
		if (isset($id)) {
			if (is_array($id)) {
				$this->assignVars($id);
			} else {
				
				$smartsection_category_handler =& ss_gethandler('category');
				$category =& $smartsection_category_handler->get($id);
				foreach ($category->vars as $k => $v) {
					$this->assignVar($k, $v['value']);
				}
				$this->assignOtherProperties();
			}
		}
	}
	
	function notLoaded()
	{
	   return ($this->getVar('categoryid')== -1);
	}
	
	function assignOtherProperties()
	{
		global $xoopsUser;
		
	    $hModule =& xoops_gethandler('module');
    	$smartModule =& ss_getModuleInfo();
	    $module_id = $smartModule->getVar('mid');

		$gperm_handler = &xoops_gethandler('groupperm');		
		
		$this->_groups_read = $gperm_handler->getGroupIds('category_read', $this->categoryid(), $module_id);
	}
	
	function checkPermission()
	{
		include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/functions.php';
		
		$userIsAdmin = ss_userIsAdmin();
		if ($userIsAdmin) {
			return true;
		}
		
		$smartsectionPermHandler =& xoops_getmodulehandler('permission', 'smartsection');
		
		$categoriesGranted = $smartsectionPermHandler->getGrantedItems('category');
		if ( in_array($this->categoryid(), $categoriesGranted) ) {
			$ret = true;	
		}
		return $ret;
	}
	
	function categoryid()
	{
		return $this->getVar("categoryid");
	}
	
	function parentid()
	{
		return $this->getVar("parentid");
	}
	
	function name($format="S")
	{
		$ret = $this->getVar("name", $format);
		If (($format=='s') || ($format=='S') || ($format=='show')) {
			$myts = &MyTextSanitizer::getInstance();
			$ret = $myts->displayTarea($ret);	
		}
		return $ret;
	}
	
	function description($format="S")
	{
		return $this->getVar("description", $format);
	}	
	
	function image($format="S")
	{
		if ($this->getVar('image') != '') {
		 	return $this->getVar('image', $format);
		} else {
			return 'blank.png';
		}
	}
	
	function weight()
	{
		return $this->getVar("weight");
	}	
	
	function getCategoryPath($withAllLink=true)
	{
        $filename = "category.php";
		If ($withAllLink) {
			$ret = "<a href='" . XOOPS_URL . "/modules/smartsection/".$filename."?categoryid=" . $this->categoryid() . "'>" . $this->name() . "</a>";	
		} else {
			$ret = $this->name();
		}
		$parentid = $this->parentid();
		global $smartsection_category_handler;
		if ($parentid != 0) {
			$parentObj =& $smartsection_category_handler->get($parentid);
			if ($parentObj->notLoaded()) {
				exit;
			}
			$parentid = $parentObj->parentid();
			$ret = $parentObj->getCategoryPath($withAllLink) . " > " .$ret;
		}
		return $ret;
	}
	
	function getGroups_read()
	{
	    if (count($this->_groups_read) < 1) {
		    $this->assignOtherProperties();
		}
		return $this->_groups_read;		
	}
	
	function setGroups_read($groups_read = array('0') )
	{
	  $this->_groups_read = $groups_read;
	}	
	
	function publishedItemsCount($inSubCat=0)
	{
		return $this->itemsCount($inSubCat, $status=array(_SS_STATUS_PUBLISHED));
	}
	
	function itemsCount($inSubCat=0, $status='')
	{
		
		Global $xoopsUser;
		include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/functions.php';
		
	    $hModule =& xoops_gethandler('module');
    	$smartModule =& $hModule->getByDirname('smartsection');
    	$module_id = $smartModule->getVar('mid');

    	
		$gperm_handler = &xoops_gethandler('groupperm');
		$groups = ($xoopsUser) ? ($xoopsUser->getGroups()) : XOOPS_GROUP_ANONYMOUS;
		
		$userIsAdmin = ss_userIsAdmin();
		if (!$userIsAdmin) {
			$itemsGranted = $gperm_handler->getItemIds('item_read', $groups, $module_id);
			$grantedItem = new Criteria('itemid', "(".implode(',', $itemsGranted).")", 'IN');
		}
		
		$criteriaCategory = new criteria('categoryid', $this->categoryid());

		$criteriaStatus = new CriteriaCompo();
		If ( !empty($status) && (is_array($status)) ) {
			foreach ($status as $v) {
				$criteriaStatus->add(new Criteria('status', $v), 'OR');
			}
		} elseif ( !empty($status) && ($status != -1)) {
			$criteriaStatus->add(new Criteria('status', $status), 'OR');
		}

		$criteria = new CriteriaCompo();
		$criteria->add($criteriaCategory);
		if (!$userIsAdmin) {
			$criteria->add($grantedItem);
		}
		$criteria->add($criteriaStatus);		
		
		global $smartsection_item_handler;
		$count = $smartsection_item_handler->getCount($criteria);
		
		unset($criteria);
		
		if ($inSubCat) {
			include_once XOOPS_ROOT_PATH . "/class/xoopstree.php";
			$mytree = new XoopsTree($this->db->prefix("smartsection_categories"), "categoryid", "parentid");
			$subCats = $mytree->getAllChildId($this->categoryid());
			
			foreach ($subCats as $key => $value) {
				$categoryid = $value['categoryid'];
				
				// TODO : If I could just go through the CriteriaCompo to only change the categoryCriteria...

				$criteriaCategory = new criteria('categoryid', $categoryid);
				
				$criteria = new CriteriaCompo();
				$criteria->add($criteriaCategory);
				if (!$userIsAdmin) {
					$criteria->add($grantedItem);
				}
				$criteria->add($criteriaStatus);		
				
				$count = $count + $smartsection_item_handler->getCount($criteria);
				unset($criteria);
			}
			
		}
	
		return $count;
	}	
	
	function getCategoryUrl()
	{
		return SMARTSECTION_URL  . "category.php?categoryid=" . $this->categoryid();	
	}
	
	function getCategoryLink()
	{
	  return "<a href='" . $this->getCategoryUrl() . "'>" . $this->name() . "</a>";
	}
	
	function store($sendNotifications = true, $force = true )
	{
		global $smartsection_category_handler;
		
		$ret = $smartsection_category_handler->insert($this, $force);
		If ( $sendNotifications && $ret && ($this->isNew()) ) {
			$this->sendNotifications();
		}
		$this->unsetNew();
		return $ret;
	}
	
	function sendNotifications()
	{
		$hModule =& xoops_gethandler('module');
    	$smartModule =& $hModule->getByDirname('smartsection');
    	$module_id = $smartModule->getVar('mid');
		
		$myts =& MyTextSanitizer::getInstance();
		$notification_handler = &xoops_gethandler('notification');
		
		$tags = array();
		$tags['MODULE_NAME'] = $myts->makeTareaData4Show($smartModule->getVar('name'));
		$tags['CATEGORY_NAME'] = $this->name();
		$tags['CATEGORY_URL'] = XOOPS_URL . '/modules/' . $smartModule->getVar('dirname') . '/category.php?categoryid=' . $this->categoryid();

		$notification_handler = &xoops_gethandler('notification');
		$notification_handler->triggerEvent('global_item', 0, 'category_created', $tags);
	}
	
	function toArray($category = array()) {
		$category['categoryid'] = $this->categoryid();
		$category['name'] = $this->name();
	    $category['categorylink'] = $this->getCategoryLink();
		$category['total'] = $this->getVar('itemcount');
		$category['description'] = $this->description();
		
		if ($this->getVar('last_itemid') > 0) {
		    $category['last_itemid'] = $this->getVar('last_itemid', 'n');
			$category['last_title_link'] = $this->getVar('last_title_link', 'n');
		}
		
		if ($this->image() != 'blank.png') {
			$category['image_path'] = ss_getImageDir('category', false) . $this->image();
		} else {
			$category['image_path'] = '';
		}
		return $category;
	}	
}

/**
* Categories handler class.
* This class is responsible for providing data access mechanisms to the data source
* of Category class objects.
*
* @author marcan <marcan@notrevie.ca>
* @package SmartSection
*/

class SmartsectionCategoryHandler extends XoopsObjectHandler
{
	
	/**
	* create a new category
	*
	* @param bool $isNew flag the new objects as "new"?
	* @return object ssCategory
	*/
	function &create($isNew = true)
	{
		$category = new ssCategory();
		if ($isNew) {
			$category->setNew();
		}
		return $category;
	}
	
	/**
	* retrieve a category
	*
	* @param int $id categoryid of the category
	* @return mixed reference to the {@link ssCategory} object, FALSE if failed
	*/
	function &get($id)
	{
		if (intval($id) > 0) {
			$sql = 'SELECT * FROM '.$this->db->prefix('smartsection_categories').' WHERE categoryid='.$id;
			if (!$result = $this->db->query($sql)) {
				return false;
			}
			
			$numrows = $this->db->getRowsNum($result);
			if ($numrows == 1) {
				$category = new ssCategory();
				$category->assignVars($this->db->fetchArray($result));
				return $category;
			}
		}
		return false;
	}
	
	/**
	* insert a new category in the database
	*
	* @param object $category reference to the {@link ssCategory} object
	* @param bool $force
	* @return bool FALSE if failed, TRUE if already present and unchanged or successful
	*/
	function insert(&$category, $force = false)
	{
		if (get_class($category) != 'sscategory') {
			return false;
		}
		if (!$category->isDirty()) {
			return true;
		}
		if (!$category->cleanVars()) {
			return false;
		}
		
		foreach ($category->cleanVars as $k => $v) {
			${$k} = $v;
		}
		
		if ($category->isNew()) {
			$sql = sprintf("INSERT INTO %s (
								categoryid, 
								parentid, 
								name, 
								description, 
								image, 
								total, 
								weight, 
								created
							) VALUES (
								'', 
								%u, 
								%s, 
								%s, 
								%s,
								%u, 
								%u, 
								%u
							)", 
								$this->db->prefix('smartsection_categories'),  
								$parentid, 
								$this->db->quoteString($name), 
								$this->db->quoteString($description), 
								$this->db->quoteString($image), 
								$total, 
								$weight, 
								time());
		} else {
			$sql = sprintf("UPDATE %s SET 
								parentid = %u, 
								name = %s, 
								description = %s, 
								image = %s,
								total = %s, 
								weight = %u, 
								created = %u 
							WHERE categoryid = %u", 
							$this->db->prefix('smartsection_categories'), 
							$parentid, $this->db->quoteString($name), 
							$this->db->quoteString($description), 
							$this->db->quoteString($image), 
							$total, 
							$weight, 
							$created, 
							$categoryid);
		}
		
		//echo "<br />" . $sql . "<br />";
		
		if (false != $force) {
			$result = $this->db->queryF($sql);
		} else {
			$result = $this->db->query($sql);
		}
		if (!$result) {
			$category->setErrors('The query returned an error.');
			return false;
		}
		if ($category->isNew()) {
			$category->assignVar('categoryid', $this->db->getInsertId());
		}

		$category->assignVar('categoryid', $categoryid);
		return true;
	}
	
	/**
	* delete a category from the database
	*
	* @param object $category reference to the category to delete
	* @param bool $force
	* @return bool FALSE if failed.
	*/
	function delete(&$category, $force = false)
	{
		
		if (get_class($category) != 'sscategory') {
			return false;
		}
		
		// Deleting the ITEMs
		global $smartsection_item_handler;
		$items =& $smartsection_item_handler->getItems(0, 0, -1, $category->categoryid());
		If ($items) {
			foreach ($items as $item) {
				$smartsection_item_handler->delete($item);
			}
		}
		
		// Deleteing the sub categories
		$subcats =& $this->getCategories(0, 0, $category->categoryid());
		foreach ($subcats as $subcat) {
			$this->delete($subcat);
		}
		
		$sql = sprintf("DELETE FROM %s WHERE categoryid = %u", $this->db->prefix("smartsection_categories"), $category->getVar('categoryid'));
		
		$hModule =& xoops_gethandler('module');
    	$smartModule =& $hModule->getByDirname('smartsection');
    	$module_id = $smartModule->getVar('mid');

		if (false != $force) {
			$result = $this->db->queryF($sql);
		} else {
			$result = $this->db->query($sql);
		}

		xoops_groupperm_deletebymoditem ($module_id, "category_read", $category->categoryid());
		//xoops_groupperm_deletebymoditem ($module_id, "category_admin", $categoryObj->categoryid());
		
		if (!$result) {
			return false;
		}
		return true;
	}
	
	/**
	* retrieve categories from the database
	*
	* @param object $criteria {@link CriteriaElement} conditions to be met
	* @param bool $id_as_key use the categoryid as key for the array?
	* @return array array of {@link XoopsItem} objects
	*/
	function &getObjects($criteria = null, $id_as_key = false)
	{
		$ret = array();
		$limit = $start = 0;
		$sql = 'SELECT * FROM '.$this->db->prefix('smartsection_categories');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
			if ($criteria->getSort() != '') {
				$sql .= ' ORDER BY '.$criteria->getSort().' '.$criteria->getOrder();
			}
			$limit = $criteria->getLimit();
			$start = $criteria->getStart();
		}
		//echo "<br />" . $sql . "<br />";
		$result = $this->db->query($sql, $limit, $start);
		if (!$result) {
			return $ret;
		}
		
		while ($myrow = $this->db->fetchArray($result)) {
			$category = new ssCategory();
			$category->assignVars($myrow);
			$category->assignOtherProperties();
			if (!$id_as_key) {
				$ret[] =& $category;
			} else {
				$ret[$myrow['categoryid']] =& $category;
			}
			unset($category);
		}
		return $ret;
	}
	
	function &getCategories($limit=0, $start=0, $parentid=0, $sort='weight', $order='ASC', $id_as_key = true)
	{
		
		include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/functions.php';
		
		$criteria = new CriteriaCompo();
		
		$criteria->setSort($sort);
		$criteria->setOrder($order);
				
		If ($parentid != -1 ) {
			$criteria->add(new Criteria('parentid', $parentid));
		}
		if (!ss_userIsAdmin()) {
		    $smartsectionPermHandler =& xoops_getmodulehandler('permission', 'smartsection');

		    $categoriesGranted = $smartsectionPermHandler->getGrantedItems('category');
			$criteria->add(new Criteria('categoryid', "(".implode(',', $categoriesGranted).")", 'IN'));	
		}
		$criteria->setStart($start);
		$criteria->setLimit($limit);
		return $this->getObjects($criteria, $id_as_key);
	}
	
	/**
	* count Categories matching a condition
	*
	* @param object $criteria {@link CriteriaElement} to match
	* @return int count of categories
	*/
	function getCount($criteria = null)
	{
		$sql = 'SELECT COUNT(*) FROM '.$this->db->prefix('smartsection_categories');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		$result = $this->db->query($sql);
		if (!$result) {
			return 0;
		}
		list($count) = $this->db->fetchRow($result);
		return $count;
	}
	
	function getCategoriesCount($parentid=0)
	{
		If ($parentid == -1)  {
			return $this->getCount();
		}
		$criteria = new CriteriaCompo();
		If (isset($parentid) && ($parentid != -1)) {
		    $criteria->add(new criteria('parentid', $parentid));
		    if (!ss_userIsAdmin()) {
		        $smartsectionPermHandler =& xoops_getmodulehandler('permission', 'smartsection');
		        
		        $categoriesGranted = $smartsectionPermHandler->getGrantedItems('category');
		        $criteria->add(new Criteria('categoryid', "(".implode(',', $categoriesGranted).")", 'IN'));
		    }
		}		
		return $this->getCount($criteria);
	}	

	function getSubCats(&$categories) {
	    $criteria = new CriteriaCompo('parentid', "(".implode(',', array_keys($categories)).")", 'IN');
	    $ret = array();
	    if (!ss_userIsAdmin()) {
	        $smartsectionPermHandler =& xoops_getmodulehandler('permission', 'smartsection');
	        
	        $categoriesGranted = $smartsectionPermHandler->getGrantedItems('category');
	        $criteria->add(new Criteria('categoryid', "(".implode(',', $categoriesGranted).")", 'IN'));
	    }
	    $subcats = $this->getObjects($criteria, true);
	    foreach ($subcats as $subcat_id => $subcat) {
	        $ret[$subcat->getVar('parentid')][$subcat->getVar('categoryid')] = $subcat;
	    }
	    return $ret;
	}	
	
	/**
	* delete categories matching a set of conditions
	*
	* @param object $criteria {@link CriteriaElement}
	* @return bool FALSE if deletion failed
	*/
	function deleteAll($criteria = null)
	{
		$sql = 'DELETE FROM '.$this->db->prefix('smartsection_categories');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		if (!$result = $this->db->query($sql)) {
			return false;
			// TODO : Also delete the permissions related to each ITEM
			// TODO : What about sub-categories ???
		}
		return true;
	}
	
	/**
	* Change a value for categories with a certain criteria
	*
	* @param   string  $fieldname  Name of the field
	* @param   string  $fieldvalue Value to write
	* @param   object  $criteria   {@link CriteriaElement}
	*
	* @return  bool
	**/
	function updateAll($fieldname, $fieldvalue, $criteria = null)
	{
		$set_clause = is_numeric($fieldvalue) ? $fieldname.' = '.$fieldvalue : $fieldname.' = '.$this->db->quoteString($fieldvalue);
		$sql = 'UPDATE '.$this->db->prefix('smartsection_categories').' SET '.$set_clause;
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		if (!$result = $this->db->queryF($sql)) {
			return false;
		}
		return true;
	}
	
	function publishedItemsCount($cat_id = 0)
	{
		return $this->itemsCount($cat_id, $status=array(_SS_STATUS_PUBLISHED));
	}
	
	function itemsCount($cat_id = 0, $status='')
	{
		
		Global $xoopsUser, $smartsection_item_handler;
		include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/functions.php';
		
		return $smartsection_item_handler->getCountsByCat($cat_id, $status);
	}	
		
}
?>
