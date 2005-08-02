<?php

/**
* $Id: item.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}

include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/common.php';

// ITEM status
define("_SS_STATUS_NOTSET", -1);
define("_SS_STATUS_ALL", 0);
define("_SS_STATUS_SUBMITTED", 1);
define("_SS_STATUS_PUBLISHED", 2);
define("_SS_STATUS_OFFLINE", 3);
define("_SS_STATUS_REJECTED", 4);

// Notification Events
define("_SS_NOT_CATEGORY_CREATED", 1);
define("_SS_NOT_ITEM_SUBMITTED", 2);
define("_SS_NOT_ITEM_PUBLISHED", 3);
define("_SS_NOT_ITEM_REJECTED", 4);

class ssItem extends XoopsObject
{
	
    /**
     * @var ssCategory
	 * @access private
     */
    var $_category = null;
        
	/**
     * @var array
	 * @access private
     */
    var $_groups_read = null;
	
	/**
	* constructor
	*/
	function ssItem($id = null)
	{
		$this->db =& Database::getInstance();
		$this->initVar("itemid", XOBJ_DTYPE_INT, -1, false);
		$this->initVar("categoryid", XOBJ_DTYPE_INT, 0, false);
		$this->initVar("title", XOBJ_DTYPE_TXTBOX, null, true, 255);
		$this->initVar("summary", XOBJ_DTYPE_TXTAREA, null, false);
		$this->initVar("display_summary", XOBJ_DTYPE_INT, 1, false);
		$this->initVar("body", XOBJ_DTYPE_TXTAREA, null, true);
		$this->initVar("uid", XOBJ_DTYPE_INT, 0, false);
		$this->initVar("datesub", XOBJ_DTYPE_INT, null, false);
		$this->initVar("status", XOBJ_DTYPE_INT, -1, false);
		$this->initVar("image", XOBJ_DTYPE_TXTBOX, 'blank.png', false, 255);
		$this->initVar("counter", XOBJ_DTYPE_INT, 0, false);
		$this->initVar("weight", XOBJ_DTYPE_INT, 0, false);
		$this->initVar("dohtml", XOBJ_DTYPE_INT, 1, false);
		$this->initVar("dosmiley", XOBJ_DTYPE_INT, 1, false);
		$this->initVar("doimage", XOBJ_DTYPE_INT, 1, false);
		$this->initVar("dobr", XOBJ_DTYPE_INT, 1, false);
		$this->initVar("doxcode", XOBJ_DTYPE_INT, 1, false);
		$this->initVar("cancomment", XOBJ_DTYPE_INT, 1, false);
		$this->initVar("comments", XOBJ_DTYPE_INT, 0, false);
		$this->initVar("notifypub", XOBJ_DTYPE_INT, 1, false);
		
		// Non consistent values
		$this->initVar("pagescount", XOBJ_DTYPE_INT, 0, false);
		
		if (isset($id)) {
			$smartsection_item_handler =& ss_gethandler('item');
			$item =& $smartsection_item_handler->get($id);
			foreach ($item->vars as $k => $v) {
				$this->assignVar($k, $v['value']);
			}
			$this->assignOtherProperties();
		} else {
			// it's a new item	
			// Check to see if $smartlanguage_tag_handler is available
			
			// Hack by marcan for condolegal.smartfactory.ca
		/*	$this->setVar('title', "[fr]entrez le texte en français[/fr][en]entrez le texte en anglais[/en]");
			$this->setVar('summary', "[fr]entrez le texte en français[/fr][en]entrez le texte en anglais[/en]");
			$this->setVar('body', "[fr]entrez le texte en français[/fr][en]entrez le texte en anglais[/en]");
			// End of Hack by marcan for condolegal.smartfactory.ca
				
			global $smartlanguage_tag_handler;
			if (isset($smartlanguage_tag_handler)) {
				$theLanguageTags = $smartlanguage_tag_handler->getAllTagsForInput();
				$this->setVar('title', $theLanguageTags);
				$this->setVar('summary', $theLanguageTags);
				$this->setVar('body', $theLanguageTags);
			}
			*/	
		}
	}
	
	function assignOtherProperties()
	{
	    $smartModule =& ss_getModuleInfo();
	    $module_id = $smartModule->getVar('mid');

    	$gperm_handler = &xoops_gethandler('groupperm');		
		
		$this->_category = new ssCategory($this->getVar('categoryid'));
		$this->_groups_read = $gperm_handler->getGroupIds('item_read', $this->itemid(), $module_id);
	}	
	
	function checkPermission()
	{
		include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/functions.php';
		
		$userIsAdmin = ss_userIsAdmin();
		if ($userIsAdmin) {
			return true;
		}
		
		$smartsectionPermHandler =& xoops_getmodulehandler('permission', 'smartsection');
		
		$itemsGranted = $smartsectionPermHandler->getGrantedItems('item');
		if ( in_array($this->categoryid(), $itemsGranted) ) {
			$ret = true;	
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
	
	function setGroups_read($groups_read = array('0'))
	{
	  $this->_groups_read = $groups_read;
	}		
	
	function itemid()
	{
		return $this->getVar("itemid");
	}
	
	function categoryid()
	{
		return $this->getVar("categoryid");
	}	
	
	function category()
	{
		return $this->_category;
	}
	
	function title($maxLength=0, $format="S")
    {
		$ret = $this->getVar("title", $format);
    	If (($format=='s') || ($format=='S') || ($format=='show')) {
			$myts = &MyTextSanitizer::getInstance();
			$ret = $myts->displayTarea($ret);	
		}
		
    	If ($maxLength != 0) {
        	if (!XOOPS_USE_MULTIBYTES) {
                if (strlen($ret) >= $maxLength) {
                    $ret = substr($ret , 0, ($maxLength -1)) . "...";
                } 
            } 
        }		

    	return $ret;
    }	

	function summary($maxLength=0, $format="S")
    {
    	$ret = $this->getVar("summary", $format);
    	If ($maxLength != 0) {
        	if (!XOOPS_USE_MULTIBYTES) {
                if (strlen($ret) >= $maxLength) {
                    $ret = substr($ret , 0, ($maxLength -1)) . "...";
                } 
            } 
        }
        
        return $ret;
    }
    
    function display_summary()
	{
		return $this->getVar("display_summary");
	}
        

    function body($maxLength=0, $format="S")
    {
    	$ret = $this->getVar("body", $format);

        If ($maxLength != 0) {
        	if (!XOOPS_USE_MULTIBYTES) {
                if (strlen($ret) >= $maxLength) {
                    $ret = substr($ret , 0, ($maxLength -1)) . "...";
                } 
            } 
        }
        
        return $ret;
    }
    
    function uid()
	{
		return $this->getVar("uid");
	}
    
	function datesub($dateFormat='s', $format="S")
	{
		return formatTimestamp($this->getVar('datesub', $format), $dateFormat);
	}
	
	function status()
	{
		return $this->getVar("status");
	}
	
	function image($format="S")
	{
		if ($this->getVar('image') != '') {
		 	return $this->getVar('image', $format);
		} else {
			return 'blank.png';
		}
	}
	
	function counter()
	{
		return $this->getVar("counter");
	}	
	
	function weight()
	{
		return $this->getVar("weight");
	}    	

	function dohtml()
	{
		return $this->getVar("dohtml");
	}    	
	
	function dosmiley()
	{
		return $this->getVar("dosmiley");
	}    		

	function doxcode()
	{
		return $this->getVar("doxcode");
	}    

	function doimage()
	{
		return $this->getVar("doimage");
	}    	
	function dobr()
	{
		return $this->getVar("dobr");
	}    	

	function cancomment()
	{
		return $this->getVar("cancomment");
	}    	
	
	function comments()
	{
		return $this->getVar("comments");
	}   

	function notifypub()
	{
		return $this->getVar("notifypub");
	}    	

	function pagescount()
	{
		return $this->getVar("pagescount");
	}    		
	
	function posterName($realName = -1)
	{
		If ($realName == -1) {
			global $xoopsModuleConfig;
			$smartConfig =& ss_getModuleConfig();
			$realName = $smartConfig['userealname'];
		}
		return ss_getLinkedUnameFromId($this->uid(), $realName);	
	}
	
	function getPage($page)
	{
	    $body_parts = explode('[pagebreak]', $ret);
        var_dump($body_parts);	
	}
	
	function updateCounter()
	{
		global $smartsection_item_handler;
		return $smartsection_item_handler->updateCounter($this->itemid());
	}
	
	function store($force = true)
	{
		global $smartsection_item_handler;
		return $smartsection_item_handler->insert($this, $force);
	}
	
	function getCategoryName()
	{
		If (!isset ($this->_category)) {
			$this->_category = new ssCategory($this->getVar('categoryid'));
		}
		return $this->_category->name();
	}
	
	function getFiles()
	{
		global $smartsection_file_handler;
		return $smartsection_file_handler->getAllFiles($this->itemid());
	}
	
	function getAdminLinks()
	{
		return ss_getAdminLinks($this->itemid());	
	}
	
	function sendNotifications($notifications=array())
	{
		$hModule =& xoops_gethandler('module');
    	$smartModule =& $hModule->getByDirname('smartsection');
    	$module_id = $smartModule->getVar('mid');
		
		$myts =& MyTextSanitizer::getInstance();
		$notification_handler = &xoops_gethandler('notification');
		$categoryObj = $this->category();
		
		$tags = array();
		$tags['MODULE_NAME'] = $myts->displayTarea($smartModule->getVar('name'));
		$tags['ITEM_NAME'] = $this->title();
		$tags['CATEGORY_NAME'] = $this->getCategoryName();
		$tags['CATEGORY_URL'] = XOOPS_URL . '/modules/' . $smartModule->getVar('dirname') . '/category.php?categoryid=' . $this->categoryid();
		$tags['ITEM_BODY'] = $this->body();
		$tags['DATESUB'] = $this->datesub();

		foreach ( $notifications as $notification ) {
			switch ($notification) {
				case _SS_NOT_ITEM_PUBLISHED :
				$tags['ITEM_URL'] = XOOPS_URL . '/modules/' . $smartModule->getVar('dirname') . '/item.php?itemid=' . $this->itemid();

				$notification_handler->triggerEvent('global_item', 0, 'published', $tags);
				$notification_handler->triggerEvent('category_item', $this->categoryid(), 'published', $tags);
				$notification_handler->triggerEvent('item', $this->itemid(), 'approved', $tags);
				break;
				
				case _SS_NOT_ITEM_SUBMITTED :
				$tags['WAITINGFILES_URL'] = XOOPS_URL . '/modules/' . $smartModule->getVar('dirname') . '/admin/item.php?itemid=' . $this->itemid();
				$notification_handler->triggerEvent('global_item', 0, 'submitted', $tags);
				$notification_handler->triggerEvent('category_item',  $this->categoryid(), 'submitted', $tags);
				break;
				
				case _SS_NOT_ITEM_REJECTED :
				$notification_handler->triggerEvent('item', $this->itemid(), 'rejected', $tags);
				break;				

				case -1 :
				default:
				break;
			}
		}	
	}
	
	function setDefaultPermissions()
	{
			$member_handler = &xoops_gethandler('member');
			$groups = &$member_handler->getGroupList();
	
			$j = 0;
			$group_ids = array();
			foreach (array_keys($groups) as $i) {
				$group_ids[$j] = $i;
				$j++;
			}
		$this->_groups_read = $group_ids;		
	}
	
	function setPermissions($group_ids)
	{
		If (!isset($group_ids)) {
			$member_handler = &xoops_gethandler('member');
			$groups = &$member_handler->getGroupList();
	
			$j = 0;
			$group_ids = array();
			foreach (array_keys($groups) as $i) {
				$group_ids[$j] = $i;
				$j++;
			}
		}
	}
	
	function notLoaded()
	{
	   return ($this->getVar('itemid')== -1);
	}
	
	function getItemUrl()
	{
		return SMARTSECTION_URL . 'item.php?itemid=' . $this->itemid();	
	}
	
	function getItemLink($class=false)
	{
		if ($class) {
			return '<a class=' . $class . ' href="' . $this->getItemUrl() . '">' . $this->title() . '</a>';			
		} else {
			return '<a href="' . $this->getItemUrl() . '">' . $this->title() . '</a>';
		}
	}
	
	function getWhoAndWhen($users = array())
	{
	    $smartModuleConfig =& ss_getModuleConfig();
	
		$posterName = ss_getLinkedUnameFromId($this->uid(), $smartModuleConfig['userealname'], $users);
		$postdate = $this->datesub();
		return sprintf(_MD_SS_POSTEDBY, $posterName, $postdate);
	}	
	
	function plain_maintext()
	{
	  	$ret = '';
	  	if ($this->display_summary() && ($this->summary())) {
			$ret .= $this->summary();
		  	if ($this->body()) {
			  	$ret .= "<br /><br />";
			  }
		}
		$ret .= str_replace('[pagebreak]', '<br /><br />', $this->body());
		return $ret;
	}
	
	function buildmaintext($item_page_id = -1)
	{
		$body_parts = explode('[pagebreak]', $this->body());
		$this->setVar('pagescount', count($body_parts));
		if (count($body_parts) <= 1) {
			return $this->plain_maintext();
		}
		
		$ret = '';
		
		if ($this->display_summary() && ($this->summary()) && ($item_page_id < 1)) {
			$ret .= $this->summary();
			$ret .= "<br /><br />";
		}
				
		if ($item_page_id == -1) {
			$ret .= trim($body_parts[0]);
			return $ret;
		}
		
		if ($item_page_id >= count($body_parts)) {
			$item_page_id = count($body_parts) - 1;
		}
		$ret .= trim($body_parts[$item_page_id]);
		return $ret;
	}
	
	function test()
	{
				foreach($language_definitions as $lang => $tag) {
			$patterns[] = "/\[" . $tag ."](.*)\[\/" . $tag ."\]/sU"; 
  			if ($language == $lang) {
		  		$replacements[] = '\\1';
  			} else { 
	  			$replacements[] = "";
  			}			
		}

		return preg_replace($patterns, $replacements, $text);
	}
	function toArray($item_page_id = -1)
	{
		$item = array();
		$item['id'] = $this->itemid();
		$item['categoryid'] = $this->categoryid();
		$item['title'] = $this->title();
		$item['itemurl'] = $this->getItemUrl();
		$item['titlelink'] = $this->getItemLink();
		$item['summary'] = $this->summary();

		$item['maintext'] = $this->buildmaintext($item_page_id);
		$item['body'] = $this->body();
		if ($this->image() != 'blank.png') {
			$item['image_path'] = ss_getImageDir('item', false) . $this->image();
		} else {
			$item['image_path'] = '';
		}
		$item['posterName'] = $this->posterName();
		$item['titlelink'] = "<a href='" . SMARTSECTION_URL . "item.php?itemid=" . $this->itemid() . "'>" . $this->title(). "</a>";
		$item['itemid'] = $this->itemid();
		$item['counter'] = $this->counter();
		$item['cancomment'] = $this->cancomment();
		$item['comments'] = $this->comments();
		$item['datesub'] = $this->datesub();
		$item['adminlink'] = ss_getAdminLinks($this->itemid());
		
		
		// Hightlighting searched words
		$highlight = true;
		if($highlight && isset($_GET['keywords']))
		{
			$myts =& MyTextSanitizer::getInstance();
			$keywords=$myts->htmlSpecialChars(trim(urldecode($_GET['keywords'])));
			$h= new SmartsectionKeyhighlighter ($keywords, true , 'smartsection_highlighter');
			$item['title'] = $h->highlight($item['title']);
			$item['summary'] = $h->highlight($item['summary']);
			$item['maintext'] = $h->highlight($item['maintext']);
		}			
		
		
		return $item;
	}

}

/**
* Items handler class.
* This class is responsible for providing data access mechanisms to the data source
* of Q&A class objects.
*
* @author marcan <marcan@notrevie.ca>
* @package SmartSection
*/

class SmartsectionItemHandler extends XoopsObjectHandler
{
	
	function &create($isNew = true)
	{
		$item = new ssItem();
		if ($isNew) {
			$item->setDefaultPermissions();
			$item->setNew();
		}
		return $item;
	}
	
	/**
	* retrieve an item
	*
	* @param int $id itemid of the user
	* @return mixed reference to the {@link ssItem} object, FALSE if failed
	*/
	function &get($id)
	{
		if (intval($id) > 0) {
			$sql = 'SELECT * FROM '.$this->db->prefix('smartsection_items').' WHERE itemid='.$id;
			
			if (!$result = $this->db->query($sql)) {
				return false;
			}
			
			$numrows = $this->db->getRowsNum($result);
			if ($numrows == 1) {
				$item = new ssItem();
				$item->assignVars($this->db->fetchArray($result));
				return $item;
			}
		}
		return false;
	}
	
	/**
	* insert a new item in the database
	*
	* @param object $item reference to the {@link ssItem} object
	* @param bool $force
	* @return bool FALSE if failed, TRUE if already present and unchanged or successful
	*/
	function insert(&$item, $force = false)
	{

        if (strtolower(get_class($item)) != 'ssitem') {
            return false;
        }

		if (!$item->isDirty()) {
			return true;
		}

		if (!$item->cleanVars()) {
			return false;
		}
	
		foreach ($item->cleanVars as $k => $v) {
            ${$k} = $v;
        }
		
		if ($item->isNew()) {
			$sql = sprintf("INSERT INTO %s (itemid, categoryid, title, summary, display_summary, body, uid, datesub, `status`, image, counter, weight, dohtml, dosmiley, doxcode, doimage, dobr, cancomment, comments, notifypub) VALUES ('', %u, %s, %s, %u, %s, %u, %u, %u, %s, %s, %u, %u, %u, %u, %u, %u, %u, %u, %u)", $this->db->prefix('smartsection_items'), $categoryid, $this->db->quoteString($title), $this->db->quoteString($summary), $display_summary, $this->db->quoteString($body), $uid, $datesub, $status, $this->db->quoteString($image), $counter, $weight, $dohtml, $dosmiley, $doxcode, $doimage, $dobr, $cancomment, $comments, $notifypub);
		} else {
			$sql = sprintf("UPDATE %s SET categoryid = %u, title = %s, summary = %s, display_summary = %u, body = %s, uid = %u, datesub = %u, `status` = %u, image = %s, counter = %u, weight = %u, dohtml = %u, dosmiley = %u, doxcode = %u, doimage = %u, dobr = %u, cancomment = %u, comments = %u, notifypub = %u WHERE itemid = %u", $this->db->prefix('smartsection_items'), $categoryid, $this->db->quoteString($title), $this->db->quoteString($summary), $display_summary, $this->db->quoteString($body), $uid, $datesub, $status, $this->db->quoteString($image), $counter, $weight, $dohtml, $dosmiley, $doxcode, $doimage, $dobr, $cancomment, $comments, $notifypub, $itemid);
		}

		//echo "<br />" . $sql . "<br />";

		if (false != $force) {
			$result = $this->db->queryF($sql);
		} else {
			$result = $this->db->query($sql);
		}

		if (!$result) {
			$item->setErrors('The query returned an error.');
			return false;
		}
		if ($item->isNew()) {
			$item->assignVar('itemid', $this->db->getInsertId());
		}

		// Saving permissions
		ss_saveItemPermissions($item->getGroups_read(), $item->itemid());
		
		return true;
	}
	
	/**
	* delete an item from the database
	*
	* @param object $item reference to the ITEM to delete
	* @param bool $force
	* @return bool FALSE if failed.
	*/
	function delete(&$item, $force = false)
	{
	    $hModule =& xoops_gethandler('module');
    	$smartModule =& $hModule->getByDirname('smartsection');
    	$module_id = $smartModule->getVar('mid');
		
		if (strtolower(get_class($item)) != 'ssitem') {
			return false;
		}
		
		// Deleting the files
		global $smartsection_file_handler;
		If (!$smartsection_file_handler->deleteItemFiles($item)) {
			$item->setErrors('An error while deleting a file.');
		}
				
		$sql = sprintf("DELETE FROM %s WHERE itemid = %u", $this->db->prefix("smartsection_items"), $item->itemid());

		if (false != $force) {
			$result = $this->db->queryF($sql);
		} else {
			$result = $this->db->query($sql);
		}
		if (!$result) {
			$item->setErrors('An error while deleting.');
			return false;
		}
		
		xoops_groupperm_deletebymoditem ($module_id, "item_read", $item->itemid());
		return true;
	}
	
	/**
	* retrieve items from the database
	*
	* @param object $criteria {@link CriteriaElement} conditions to be met
	* @param bool $id_key what shall we use as array key ? none, itemid, categoryid
	* @return array array of {@link ssItem} objects
	*/
	function &getObjects($criteria = null, $id_key = 'none', $notNullFields='')
	{
		$ret = false;
		$limit = $start = 0;
		$sql = 'SELECT * FROM '.$this->db->prefix('smartsection_items');
		
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$whereClause = $criteria->renderWhere();
			
			If ($whereClause != 'WHERE ()') {
				$sql .= ' '.$criteria->renderWhere();
				If (!empty($notNullFields)) {
					$sql .= $this->NotNullFieldClause($notNullFields, true);
				}
			} elseif (!empty($notNullFields)) {
				$sql .= " WHERE " . $this->NotNullFieldClause($notNullFields);
			}
			if ($criteria->getSort() != '') {
				$sql .= ' ORDER BY '.$criteria->getSort().' '.$criteria->getOrder();
			}
			$limit = $criteria->getLimit();
			$start = $criteria->getStart();
		} elseif (!empty($notNullFields)) {
			$sql .= $sql .= " WHERE " . $this->NotNullFieldClause($notNullFields);
		}
		
		//echo "<br />" . $sql . "<br />";
		
		$result = $this->db->query($sql, $limit, $start);
		if (!$result) {
			return $ret;
		}
		
		If (count($result) == 0) {
			return $ret;
		}
		
		while ($myrow = $this->db->fetchArray($result)) {
			$item = new ssItem();
			$item->assignVars($myrow);
			$item->assignOtherProperties();
			
			if ($id_key == 'none') {
				$ret[] =& $item;
			} elseif ($id_key == 'itemid') {
				$ret[$myrow['itemid']] =& $item;
			} else {
				if (isset($myrow[$id_key])) {
					$ret[$myrow[$id_key]][$myrow['itemid']] =& $item;
				}
			}
			unset($item);
		}
		return $ret;
	}
	
	/**
	* count items matching a condition
	*
	* @param object $criteria {@link CriteriaElement} to match
	* @return int count of items
	*/
	function getCount($criteria = null, $notNullFields='')
	{
		$sql = 'SELECT COUNT(*) FROM '.$this->db->prefix('smartsection_items');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$whereClause = $criteria->renderWhere();
			If ($whereClause != 'WHERE ()') {
				$sql .= ' '.$criteria->renderWhere();
				If (!empty($notNullFields)) {
					$sql .= $this->NotNullFieldClause($notNullFields, true);
				}
			} elseif (!empty($notNullFields)) {
				$sql .= " WHERE " . $this->NotNullFieldClause($notNullFields);	
			}
		} elseif (!empty($notNullFields)) {
			$sql .= " WHERE " . $this->NotNullFieldClause($notNullFields);	
		}
			
		//echo "<br />" . $sql . "<br />";
		$result = $this->db->query($sql);
		if (!$result) {
			return 0;
		}
		list($count) = $this->db->fetchRow($result);
		return $count;
	}
	
	function getItemsCount($categoryid=-1, $status='', $notNullFields='')
	{

		global $xoopsUser;
		
	//	If ( ($categoryid = -1) && (empty($status) || ($status == -1)) ) {
			//return $this->getCount();
		//}

	    $hModule =& xoops_gethandler('module');
	    $hModConfig =& xoops_gethandler('config');
    	$smartModule =& $hModule->getByDirname('smartsection');
    	$module_id = $smartModule->getVar('mid');
		
		$gperm_handler = &xoops_gethandler('groupperm');
		$groups = ($xoopsUser) ? ($xoopsUser->getGroups()) : XOOPS_GROUP_ANONYMOUS;
		
		$ret = array();
		
		$userIsAdmin = ss_userIsAdmin();
		// Categories for which user has access
		if (!$userIsAdmin) {
			$categoriesGranted = $gperm_handler->getItemIds('category_read', $groups, $module_id);
			$grantedCategories = new Criteria('categoryid', "(".implode(',', $categoriesGranted).")", 'IN');
		}
		// ITEMs for which user has access
		if (!$userIsAdmin) {
			$itemsGranted = $gperm_handler->getItemIds('item_read', $groups, $module_id);
			$grantedItem = new Criteria('itemid', "(".implode(',', $itemsGranted).")", 'IN');
		}
			
		If (isset($categoryid) && ($categoryid != -1)) {
			$criteriaCategory = new criteria('categoryid', $categoryid);
		}

		$criteriaStatus = new CriteriaCompo();
		If ( !empty($status) && (is_array($status)) ) {
			foreach ($status as $v) {
				$criteriaStatus->add(new Criteria('status', $v), 'OR');
			}
		} elseif ( !empty($status) && ($status != -1)) {
			$criteriaStatus->add(new Criteria('status', $status), 'OR');
		}

		$criteriaPermissions = new CriteriaCompo();
		if (!$userIsAdmin) {
			$criteriaPermissions->add($grantedCategories, 'AND');
			$criteriaPermissions->add($grantedItem, 'AND');
		}
		
		$criteria = new CriteriaCompo();
		If (!empty($criteriaCategory)) {
			$criteria->add($criteriaCategory);
		}
		
		If (!empty($criteriaPermissions) && (!$userIsAdmin)) {
			$criteria->add($criteriaPermissions);
		}		

		if (!empty($criteriaStatus)) {
			$criteria->add($criteriaStatus);		
		}
		
		if (!empty($otherCriteria)) {
			$criteria->add($otherCriteria);		
		}

		return $this->getCount($criteria, $notNullFields);
	}	

	function getAllPublished($limit=0, $start=0, $categoryid=-1, $sort='datesub', $order='DESC', $notNullFields='', $asobject=true, $id_key='none')
	{
		return $this->getItems($limit, $start, array(_SS_STATUS_PUBLISHED), $categoryid, $sort, $order, $notNullFields, $asobject, null, $id_key);
	}
	
	function getItems($limit=0, $start=0, $status='', $categoryid=-1, $sort='datesub', $order='DESC', $notNullFields='', $asobject=true, $otherCriteria=null, $id_key='none')
	{
		include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/functions.php';
		
		global $xoopsUser;

		//if ( ($categoryid == -1) && (empty($status) || ($status == -1)) && ($limit == 0) && ($start ==0) ) {
		//	return $this->getObjects();
		//}

	    $hModule =& xoops_gethandler('module');
	    $hModConfig =& xoops_gethandler('config');
    	$smartModule =& $hModule->getByDirname('smartsection');
    	$module_id = $smartModule->getVar('mid');
		
		$gperm_handler = &xoops_gethandler('groupperm');
		$groups = ($xoopsUser) ? ($xoopsUser->getGroups()) : XOOPS_GROUP_ANONYMOUS;
		
		$ret = array();
		
		$userIsAdmin = ss_userIsAdmin();
		// Categories for which user has access
		if (!$userIsAdmin) {
			$categoriesGranted = $gperm_handler->getItemIds('category_read', $groups, $module_id);
			$grantedCategories = new Criteria('categoryid', "(".implode(',', $categoriesGranted).")", 'IN');
		}
		// ITEMs for which user has access
		if (!$userIsAdmin) {
			$itemsGranted = $gperm_handler->getItemIds('item_read', $groups, $module_id);
			$grantedItem = new Criteria('itemid', "(".implode(',', $itemsGranted).")", 'IN');
		}
			
		If (isset($categoryid) && ($categoryid != -1)) {
			$criteriaCategory = new criteria('categoryid', $categoryid);
		}

		If ( !empty($status) && (is_array($status)) ) {
			$criteriaStatus = new CriteriaCompo();
			foreach ($status as $v) {
				$criteriaStatus->add(new Criteria('status', $v), 'OR');
			}
		} elseif ( !empty($status) && ($status != -1)) {
			$criteriaStatus = new CriteriaCompo();
			$criteriaStatus->add(new Criteria('status', $status), 'OR');
		}

		$criteriaPermissions = new CriteriaCompo();
		if (!$userIsAdmin) {
			$criteriaPermissions->add($grantedCategories, 'AND');
			$criteriaPermissions->add($grantedItem, 'AND');
		}
		
		$criteria = new CriteriaCompo();
		If (!empty($criteriaCategory)) {
			$criteria->add($criteriaCategory);
		}
		
		If (!empty($criteriaPermissions) && (!$userIsAdmin)) {
			$criteria->add($criteriaPermissions);
		}		

		if (!empty($criteriaStatus)) {
			$criteria->add($criteriaStatus);		
		}
		
		if (!empty($otherCriteria)) {
			$criteria->add($otherCriteria);		
		}

		$criteria->setLimit($limit);
		$criteria->setStart($start);
		$criteria->setSort($sort);
		$criteria->setOrder($order);
		$ret =& $this->getObjects($criteria, $id_key, $notNullFields);
		
		return $ret;
	}		
	
	
	function getRandomItem($field='', $status='', $categoryId=-1)
	{
		$ret = false;

		$notNullFields = $field;
		
		// Getting the number of published Items   
		$totalItems = $this->getItemsCount($categoryId, $status, $notNullFields);
		
		if ($totalItems > 0) {
			$totalItems = $totalItems - 1;
        	mt_srand((double)microtime() * 1000000);
        	$entrynumber = mt_rand(0, $totalItems); 
        	$item =& $this->getItems(1, $entrynumber, $status, $categoryId, $sort='datesub', $order='DESC', $notNullFields);
			If ($item) {
				$ret =& $item[0];
			}
		}	
		return $ret;
		
	}
	
	/**
	* delete Items matching a set of conditions
	*
	* @param object $criteria {@link CriteriaElement}
	* @return bool FALSE if deletion failed
	*/
	function deleteAll($criteria = null)
	{
		$sql = 'DELETE FROM '.$this->db->prefix('smartsection_items');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		if (!$result = $this->db->query($sql)) {
			return false;
			// TODO : Also delete the permissions related to each ITEM
		}
		return true;
	}
	
	/**
	* Change a value for Item with a certain criteria
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
		$sql = 'UPDATE '.$this->db->prefix('smartsection_items').' SET '.$set_clause;
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		if (!$result = $this->db->queryF($sql)) {
			return false;
		}
		return true;
	}
	
	function updateCounter($itemid)
	{
		$sql = "UPDATE " . $this->db->prefix("smartsection_items") . " SET counter=counter+1 WHERE itemid = " . $itemid;
		If ($this->db->queryF($sql)) {
			return true;
		} else {
			return false;
		}	
	}
	
	function NotNullFieldClause($notNullFields='', $withAnd=false)
	{
		$ret = '';
		If ($withAnd) {
			$ret .= " AND ";
		}
		If ( !empty($notNullFields) && (is_array($notNullFields)) ) {
			foreach ($notNullFields as $v) {
				$ret .= " ($v IS NOT NULL AND $v <> ' ' )";
			}
		} elseif ( !empty($notNullFields)) {
			$ret .= " ($notNullFields IS NOT NULL AND $notNullFields <> ' ' )";
		}
		return $ret;
	}
	
	function getItemsFromSearch($queryarray = array(), $andor = 'AND', $limit = 0, $offset = 0, $userid = 0)
	{
	
	Global $xoopsUser;
	
	$ret = array();
		
	$hModule =& xoops_gethandler('module');
	$hModConfig =& xoops_gethandler('config');
	$smartModule =& $hModule->getByDirname('smartsection');
	$module_id = $smartModule->getVar('mid');

	$gperm_handler = &xoops_gethandler('groupperm');
	$groups = ($xoopsUser) ? ($xoopsUser->getGroups()) : XOOPS_GROUP_ANONYMOUS;
	$userIsAdmin = ss_userIsAdmin();
	

	if ($userid != 0) {
		$criteriaUser = new CriteriaCompo();
		$criteriaUser->add(new Criteria('item.uid', $userid), 'OR');
	}

	If ($queryarray) {
		$criteriaKeywords = new CriteriaCompo();	
		for ($i = 0; $i < count($queryarray); $i++) {
			$criteriaKeyword = new CriteriaCompo();
			$criteriaKeyword->add(new Criteria('item.title', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
			$criteriaKeyword->add(new Criteria('item.body', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
			$criteriaKeyword->add(new Criteria('item.summary', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
			$criteriaKeywords->add($criteriaKeyword, $andor);
			unset($criteriaKeyword);
		}
	}

	// Categories for which user has access
	if (!$userIsAdmin) {
		$categoriesGranted = $gperm_handler->getItemIds('category_read', $groups, $module_id);
		If (!$categoriesGranted) {
			return $ret;
		}		
		$grantedCategories = new Criteria('item.categoryid', "(".implode(',', $categoriesGranted).")", 'IN');
	}
	// items for which user has access
	if (!$userIsAdmin) {
		$itemsGranted = $gperm_handler->getItemIds('item_read', $groups, $module_id);
		If (!$itemsGranted) {
			return $ret;
		}	
		$grantedItem = new Criteria('item.itemid', "(".implode(',', $itemsGranted).")", 'IN');
	}
			
	$criteriaPermissions = new CriteriaCompo();
	if (!$userIsAdmin) {
		$criteriaPermissions->add($grantedCategories, 'AND');
		$criteriaPermissions->add($grantedItem, 'AND');
	}
	
	$criteriaItemsStatus = new CriteriaCompo();
	$criteriaItemsStatus->add(new Criteria('item.status', _SS_STATUS_PUBLISHED, 'OR'));	
		
	$criteria = new CriteriaCompo();	
	If (!empty($criteriaUser)) {
		$criteria->add($criteriaUser, 'AND');
	}
	
	If (!empty($criteriaKeywords)) {
		$criteria->add($criteriaKeywords, 'AND');
	}	
	
	If (!empty($criteriaPermissions) && (!$userIsAdmin)) {
		$criteria->add($criteriaPermissions);
	}		
	
	If (!empty($criteriaItemsStatus)) {
		$criteria->add($criteriaItemsStatus, 'AND');
	}		

	$criteria->setLimit($limit);
	$criteria->setStart($offset);
	$criteria->setSort('item.datesub');
	$criteria->setOrder('DESC');


	$sql = 'SELECT item.itemid, item.title, item.datesub, item.uid FROM ('.$this->db->prefix('smartsection_items') . ' as item) ';
		
	if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
		$whereClause = $criteria->renderWhere();
			
		If ($whereClause != 'WHERE ()') {
			$sql .= ' '.$criteria->renderWhere();
			if ($criteria->getSort() != '') {
				$sql .= ' ORDER BY '.$criteria->getSort().' '.$criteria->getOrder();
			}
			$limit = $criteria->getLimit();
			$start = $criteria->getStart();
		}
	}

	//echo "<br />" . $sql . "<br />";

	$result = $this->db->query($sql, $limit, $start);
	if (!$result) {
		return $ret;
	}
		
	If (count($result) == 0) {
		return $ret;
	}
			
	while ($myrow = $this->db->fetchArray($result)) {
		$item['id'] = $myrow['itemid'];
		$item['title'] = $myrow['title'];
		$item['datesub'] = $myrow['datesub'];
		$item['uid'] = $myrow['uid'];
		$ret[] = $item;
		unset($item);
	}
	return $ret;
	}
	
	function getLastPublishedByCat($status = array(_SS_STATUS_PUBLISHED)) {
		
		$ret = array();
	    $itemclause = "";
   	    if (!ss_userIsAdmin()) {
	        $smartsectionPermHandler =& xoops_getmodulehandler('permission', 'smartsection');
	        $items = $smartsectionPermHandler->getGrantedItems('item');
	        $itemclause = " AND itemid IN (".implode(',', $items).")";
	    }

	    $sql = "CREATE TEMPORARY TABLE tmp (categoryid INT(8) UNSIGNED NOT NULL,datesub int(11) DEFAULT '0' NOT NULL);";
	    $sql2 = " LOCK TABLES ".$this->db->prefix('smartsection_items')." READ;";
	    $sql3 = " INSERT INTO tmp SELECT categoryid, MAX(datesub) FROM ".$this->db->prefix('smartsection_items')." WHERE status IN (". implode(',', $status).") $itemclause GROUP BY categoryid;";
	    $sql4 = " SELECT ".$this->db->prefix('smartsection_items').".categoryid, itemid, title, uid, ".$this->db->prefix('smartsection_items').".datesub FROM ".$this->db->prefix('smartsection_items').", tmp
	                  WHERE ".$this->db->prefix('smartsection_items').".categoryid=tmp.categoryid AND ".$this->db->prefix('smartsection_items').".datesub=tmp.datesub;";
        /*
	    //Old implementation
	    $sql = "SELECT categoryid, itemid, question, uid, MAX(datesub) AS datesub FROM ".$this->db->prefix("smartitem_item")." 
	           WHERE status IN (". implode(',', $status).")";
	    $sql .= " GROUP BY categoryid";
	    */
	    $this->db->queryF($sql);
	    $this->db->queryF($sql2);
	    $this->db->queryF($sql3);
	    $result = $this->db->query($sql4);
	    $error = $this->db->error();
	    $this->db->queryF("UNLOCK TABLES;");
	    $this->db->queryF("DROP TABLE tmp;");
	    if (!$result) {
	        trigger_error("Error in getLastPublishedByCat SQL: ".$error);
	        return $ret;
	    }
		while ($row = $this->db->fetchArray($result)) {
		    $item = new ssItem();
			$item->assignVars($row);
			$ret[$row['categoryid']] =& $item;
			unset($item);
		}
		return $ret;
	}	
	
	function getCountsByCat($cat_id = 0, $status) {
	    $ret = array();
	    $sql = 'SELECT categoryid, COUNT(*) AS count FROM '.$this->db->prefix('smartsection_items');
	    if (intval($cat_id) > 0) {
	        $sql .= ' WHERE categoryid = '.intval($cat_id);
	        $sql .= ' AND status IN ('.implode(',', $status).')';
	    }
	    else {
	        $sql .= ' WHERE status IN ('.implode(',', $status).')';
	        if (!ss_userIsAdmin()) {
	            $smartsectionPermHandler =& xoops_getmodulehandler('permission', 'smartsection');
	            $items = $smartsectionPermHandler->getGrantedItems('item');
	            $sql .= ' AND itemid IN ('.implode(',', $items).')';
	        }
	    }
	    $sql .= ' GROUP BY categoryid';

		$result = $this->db->query($sql);
		if (!$result) {
			return $ret;
		}
		while ($row = $this->db->fetchArray($result)) {
		    $ret[$row['categoryid']] = intval($row['count']);
		}
	    return $ret;
	}	
}
?>
