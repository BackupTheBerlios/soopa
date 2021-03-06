<?php
// $Id: class.newstopic.php,v 1.4 2005/08/12 00:03:54 mauriciodelima Exp $
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
include_once XOOPS_ROOT_PATH."/class/xoopsstory.php";
include_once XOOPS_ROOT_PATH."/class/xoopstree.php";
include_once XOOPS_ROOT_PATH."/modules/news/include/functions.php";

class NewsTopic extends XoopsTopic
{
	var $menu;
	var $topic_description;
	var $topic_frontpage;
	var $topic_rssurl;
	var $topic_color;

	function NewsTopic($topicid=0)
	{
		$this->db =& Database::getInstance();
		$this->table = $this->db->prefix("topics");
		if ( is_array($topicid) ) {
			$this->makeTopic($topicid);
		} elseif ( $topicid != 0 ) {
			$this->getTopic(intval($topicid));
		} else {
			$this->topic_id = $topicid;
		}
	}

	function MakeMyTopicSelBox($none=0, $seltopic=-1, $selname="", $onchange="", $checkRight = false, $perm_type='news_view')
	{
	    $perms='';
	    if ($checkRight) {
	        global $xoopsUser;
	        $module_handler =& xoops_gethandler('module');
	        $newsModule =& $module_handler->getByDirname('news');
	        $groups = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
	        $gperm_handler =& xoops_gethandler('groupperm');
	        $topics = $gperm_handler->getItemIds($perm_type, $groups, $newsModule->getVar('mid'));
	        if(count($topics)>0) {
	        	$topics = implode(',', $topics);
	        	$perms = " AND topic_id IN (".$topics.") ";
	        } else {
	        	return null;
	        }
	    }

		if ( $seltopic != -1 ) {
			return $this->makeMySelBox("topic_title", "topic_title", $seltopic, $none, $selname, $onchange, $perms);
		} elseif ( !empty($this->topic_id) ) {
			return $this->makeMySelBox("topic_title", "topic_title", $this->topic_id, $none, $selname, $onchange, $perms);
		} else {
			return $this->makeMySelBox("topic_title", "topic_title", 0, $none, $selname, $onchange, $perms);
		}
	}

	/**
 	* makes a nicely ordered selection box
 	*
 	* @param	int	$preset_id is used to specify a preselected item
 	* @param	int	$none set $none to 1 to add a option with value 0
 	*/
	function makeMySelBox($title,$order="",$preset_id=0, $none=0, $sel_name="topic_id", $onchange="", $perms)
	{
		$myts =& MyTextSanitizer::getInstance();
		$outbuffer='';
		$outbuffer = "<select name='".$sel_name."'";
		if ( $onchange != "" ) {
			$outbuffer .= " onchange='".$onchange."'";
		}
		$outbuffer .= ">\n";
		$sql = "SELECT topic_id, ".$title." FROM ".$this->table." WHERE (topic_pid=0)".$perms;
		if ( $order != "" ) {
			$sql .= " ORDER BY $order";
		}
		$result = $this->db->query($sql);
		if ( $none ) {
			$outbuffer .= "<option value='0'>----</option>\n";
		}
		while ( list($catid, $name) = $this->db->fetchRow($result) ) {
			$sel = "";
			if ( $catid == $preset_id ) {
				$sel = " selected='selected'";
			}
			$name=$myts->displayTarea($name);
			$outbuffer .= "<option value='$catid'$sel>$name</option>\n";
			$sel = "";
			$arr = $this->getChildTreeArray($catid, $order, $perms);
			foreach ( $arr as $option ) {
				$option['prefix'] = str_replace(".","--",$option['prefix']);
				$catpath = $option['prefix']."&nbsp;".$myts->displayTarea($option[$title]);

				if ( $option['topic_id'] == $preset_id ) {
					$sel = " selected='selected'";
				}
				$outbuffer .= "<option value='".$option['topic_id']."'$sel>$catpath</option>\n";
				$sel = "";
			}
		}
		$outbuffer .= "</select>\n";
		return $outbuffer;
	}

	function getChildTreeArray($sel_id=0,$order="",$perms,$parray = array(),$r_prefix="")
	{
		$sql = "SELECT * FROM ".$this->table." WHERE (topic_pid=".$sel_id.")".$perms;
		if ( $order != "" ) {
			$sql .= " ORDER BY $order";
		}
		$result = $this->db->query($sql);
		$count = $this->db->getRowsNum($result);
		if ( $count == 0 ) {
			return $parray;
		}
		while ( $row = $this->db->fetchArray($result) ) {
			$row['prefix'] = $r_prefix.".";
			array_push($parray, $row);
			$parray = $this->getChildTreeArray($row['topic_id'],$order,$perms,$parray,$row['prefix']);
		}
		return $parray;
	}

	function getVar($var) {
		if(method_exists($this, $var)) {
			return call_user_func(array($this,$var));
		} else {
	    	return $this->$var;
	    }
	}

	/**
 	* Get the total number of topics in the base
 	*/
	function getAllTopicsCount($checkRight = true)
	{
	    $perms='';
	    if ($checkRight) {
	        global $xoopsUser;
	        $module_handler =& xoops_gethandler('module');
	        $newsModule =& $module_handler->getByDirname('news');
	        $groups = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
	        $gperm_handler =& xoops_gethandler('groupperm');
	        $topics = $gperm_handler->getItemIds('news_submit', $groups, $newsModule->getVar('mid'));
	        if(count($topics)>0) {
	        	$topics = implode(',', $topics);
	        	$perms = " WHERE topic_id IN (".$topics.") ";
	        } else {
	        	return null;
	        }
	    }

		$sql = "SELECT count(topic_id) as cpt FROM ".$this->table.$perms;
		$array = $this->db->fetchArray($this->db->query($sql));
		return($array['cpt']);
	}

	function getAllTopics($checkRight = true, $permission = "news_view")
	{
	    $topics_arr = array();
	    $db =& Database::getInstance();
	    $table = $db->prefix('topics');
        $sql = "SELECT * FROM ".$table;
        if ($checkRight) {
			$topics = MygetItemIds($permission);
			if (count($topics) == 0) {
				return array();
			}
			$topics = implode(',', $topics);
			$sql .= " WHERE topic_id IN (".$topics.")";
		}
		$sql .= " ORDER BY topic_title";
		$result = $db->query($sql);
		while ($array = $db->fetchArray($result)) {
			$topic = new NewsTopic();
			$topic->makeTopic($array);
			$topics_arr[$array['topic_id']] = $topic;
			unset($topic);
		}
		return $topics_arr;
	}


	/**
	* Returns the number of news per topic
	*/
	function getNewsCountByTopic()
	{
		$ret=array();
		$sql="SELECT count(storyid) as cpt, topicid FROM ".$this->db->prefix('stories')." GROUP BY topicid";
		$result = $this->db->query($sql);
		while ($row = $this->db->fetchArray($result)) {
			$ret[$row["topicid"]]=$row["cpt"];
		}
		return $ret;
	}

	/**
	* Returns some stats about a topic
	*/
	function getTopicMiniStats($topicid)
	{
		$ret=array();
		$sql="SELECT count(storyid) as cpt FROM ".$this->db->prefix('stories')." WHERE topicid=" . $topicid;
		$result = $this->db->query($sql);
		$row = $this->db->fetchArray($result);
		$ret['count']=$row["cpt"];
		$sql="SELECT sum(counter) as cpt FROM ".$this->db->prefix('stories')." WHERE topicid=" . $topicid;
		$result = $this->db->query($sql);
		$row = $this->db->fetchArray($result);
		$ret['reads']=$row["cpt"];
		return $ret;
	}


	function setMenu($value)
	{
		$this->menu=$value;
	}

	function setTopic_color($value)
	{
		$this->topic_color=$value;
	}

	function getTopic($topicid)
	{
		$sql = "SELECT * FROM ".$this->table." WHERE topic_id=".$topicid."";
		$array = $this->db->fetchArray($this->db->query($sql));
		$this->makeTopic($array);
	}

	function makeTopic($array)
	{
		if(is_array($array)) {
			foreach($array as $key=>$value){
				$this->$key = $value;
			}
		}
	}

	function store()
	{
		$myts =& MyTextSanitizer::getInstance();
		$title = "";
		$imgurl = "";
		$topic_description=$myts->censorString($this->topic_description);
		$topic_description= $myts->addSlashes($topic_description);
		$topic_rssurl=$myts->addSlashes($this->topic_rssurl);
		$topic_color=$myts->addSlashes($this->topic_color);

		if ( isset($this->topic_title) && $this->topic_title != "" ) {
			$title = $myts->addSlashes($this->topic_title);
		}
		if ( isset($this->topic_imgurl) && $this->topic_imgurl != "" ) {
			$imgurl = $myts->addSlashes($this->topic_imgurl);
		}
		if ( !isset($this->topic_pid) || !is_numeric($this->topic_pid) ) {
			$this->topic_pid = 0;
		}
		$topic_frontpage=intval($this->topic_frontpage);

		if ( empty($this->topic_id) ) {
			$this->topic_id = $this->db->genId($this->table."_topic_id_seq");
			$sql = sprintf("INSERT INTO %s (topic_id, topic_pid, topic_imgurl, topic_title, menu, topic_description, topic_frontpage, topic_rssurl, topic_color) VALUES (%u, %u, '%s', '%s', %u, '%s', %d, '%s', '%s')", $this->table, intval($this->topic_id), intval($this->topic_pid), $imgurl, $title, intval($this->menu), $topic_description, $topic_frontpage, $topic_rssurl, $topic_color);
		} else {
			$sql = sprintf("UPDATE %s SET topic_pid = %u, topic_imgurl = '%s', topic_title = '%s', menu=%d, topic_description='%s', topic_frontpage=%d, topic_rssurl='%s', topic_color='%s' WHERE topic_id = %u", $this->table, intval($this->topic_pid), $imgurl, $title, intval($this->menu), $topic_description, $topic_frontpage, $topic_rssurl,$topic_color, intval($this->topic_id));
		}
		if ( !$result = $this->db->query($sql) ) {
			ErrorHandler::show('0022');
		}
		if ( $this->use_permission == true ) {
			if ( empty($this->topic_id) ) {
				$this->topic_id = $this->db->getInsertId();
			}
			$xt = new XoopsTree($this->table, "topic_id", "topic_pid");
			$parent_topics = $xt->getAllParentId($this->topic_id);
			if ( !empty($this->m_groups) && is_array($this->m_groups) ){
				foreach ( $this->m_groups as $m_g ) {
					$moderate_topics = XoopsPerms::getPermitted($this->mid, "ModInTopic", $m_g);
					$add = true;
					// only grant this permission when the group has this permission in all parent topics of the created topic
					foreach($parent_topics as $p_topic){
						if ( !in_array($p_topic, $moderate_topics) ) {
							$add = false;
							continue;
						}
					}
					if ( $add == true ) {
						$xp = new XoopsPerms();
						$xp->setModuleId($this->mid);
						$xp->setName("ModInTopic");
						$xp->setItemId($this->topic_id);
						$xp->store();
						$xp->addGroup($m_g);
					}
				}
			}
			if ( !empty($this->s_groups) && is_array($this->s_groups) ){
				foreach ( $s_groups as $s_g ) {
					$submit_topics = XoopsPerms::getPermitted($this->mid, "SubmitInTopic", $s_g);
					$add = true;
					foreach($parent_topics as $p_topic){
						if ( !in_array($p_topic, $submit_topics) ) {
							$add = false;
							continue;
						}
					}
					if ( $add == true ) {
						$xp = new XoopsPerms();
						$xp->setModuleId($this->mid);
						$xp->setName("SubmitInTopic");
						$xp->setItemId($this->topic_id);
						$xp->store();
						$xp->addGroup($s_g);
					}
				}
			}
			if ( !empty($this->r_groups) && is_array($this->r_groups) ){
				foreach ( $r_groups as $r_g ) {
					$read_topics = XoopsPerms::getPermitted($this->mid, "ReadInTopic", $r_g);
					$add = true;
					foreach($parent_topics as $p_topic){
						if ( !in_array($p_topic, $read_topics) ) {
							$add = false;
							continue;
						}
					}
					if ( $add == true ) {
						$xp = new XoopsPerms();
						$xp->setModuleId($this->mid);
						$xp->setName("ReadInTopic");
						$xp->setItemId($this->topic_id);
						$xp->store();
						$xp->addGroup($r_g);
					}
				}
			}
		}
		return true;
	}

	function Settopic_rssurl($value)
	{
		$this->topic_rssurl=$value;
	}

	function topic_rssurl($format='S')
	{
		$myts =& MyTextSanitizer::getInstance();
		switch($format){
			case "S":
				$topic_rssurl= $myts->displayTarea($this->topic_rssurl);
				break;
			case "P":
				$topic_rssurl = $myts->previewTarea($this->topic_rssurl);
				break;
			case "F":
			case "E":
				$topic_rssurl = $myts->htmlSpecialChars($this->topic_rssurl);
				break;
		}
		return $topic_rssurl;
	}

	function topic_color($format='S')
	{
		$myts =& MyTextSanitizer::getInstance();
		switch($format){
			case "S":
				$topic_color= $myts->displayTarea($this->topic_color);
				break;
			case "P":
				$topic_color = $myts->previewTarea($this->topic_color);
				break;
			case "F":
			case "E":
				$topic_color = $myts->htmlSpecialChars($this->topic_color);
				break;
		}
		return $topic_color;
	}

	function menu()
	{
		return $this->menu;
	}

	function topic_description($format="S")
	{
		$myts =& MyTextSanitizer::getInstance();
		switch($format){
			case "S":
				$topic_description = $myts->displayTarea($this->topic_description,1);
				break;
			case "P":
				$topic_description = $myts->previewTarea($this->topic_description);
				break;
			case "F":
			case "E":
				$topic_description = $myts->htmlSpecialChars($myts->stripSlashesGPC($this->topic_description));
				break;
		}
		return $topic_description;
	}

	function getTopicTitleFromId($topic,&$topicstitles)
	{
		$myts =& MyTextSanitizer::getInstance();
		$sql="SELECT topic_id, topic_title, topic_imgurl FROM ".$this->table." WHERE ";
	    if (!is_array($topic)) {
        	$sql .= " topic_id=".intval($topic);
	    } else {
	    	if(count($topic)>0) {
	        	$sql .= " topic_id IN (".implode(',', $topic).")";
	    	} else {
	    		return null;
	    	}
	    }
	    $result = $this->db->query($sql);
		while ($row = $this->db->fetchArray($result)) {
			$topicstitles[$row["topic_id"]]=array("title"=>$myts->displayTarea($row["topic_title"]),"picture"=>XOOPS_URL.'/modules/news/images/topics/'.$row["topic_imgurl"]);
		}
		return $topicstitles;
	}


	function &getTopicsList($frontpage=false,$perms=false)
	{
		$sql='SELECT topic_id, topic_pid, topic_title, topic_color FROM '.$this->table." WHERE 1 ";
		if($frontpage) {
			$sql .= " AND topic_frontpage=1";
		}
		if($perms) {
			$topicsids=array();
			$topicsids=MygetItemIds();
            if (count($topicsids) == 0) {
            	return '';
            }
            $topics = implode(',', $topicsids);
            $sql .= " AND topic_id IN (".$topics.")";
		}
		$result = $this->db->query($sql);
		$ret = array();
		$myts =& MyTextSanitizer::getInstance();
		while ($myrow = $this->db->fetchArray($result)) {
			$ret[$myrow['topic_id']] = array('title' => $myts->displayTarea($myrow['topic_title']), 'pid' => $myrow['topic_pid'], 'color'=> $myrow['topic_color']);
		}
		return $ret;
	}

	function setTopicDescription($value)
	{
		$this->topic_description = $value;
	}

	function topic_frontpage()
	{
		return $this->topic_frontpage;
	}

	function setTopicFrontpage($value)
	{
		$this->topic_frontpage=$value;
	}
}
?>