<?php
// $Id: functions.inc.php,v 1.2 2005/08/07 06:58:41 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//  Author: Andrew Mills                                                     //
//  Email:  ajmills@sirium.net                                         //
//	About:  This file is part of the Articles module for Xoops v2.           //
//                                                                           //
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

// This file contain various functions.
include_once(XOOPS_ROOT_PATH . "/modules/" . $xoopsModule->getVar('dirname') . '/include/config.php');


################################################################################
# find number of articles for a category
function art_count($cat_id) {
global $xoopsDB;

	$sql = ("SELECT COUNT(id) AS count FROM " . $xoopsDB->prefix("articles_main") . " WHERE art_showme=1 AND art_validated=1 AND art_cat_id='$cat_id'");
	$result=$xoopsDB->query($sql);
	
		if ($xoopsDB->getRowsNum($result) > 0) {
			while($myrow = $xoopsDB->fetchArray($result)) {

				$num_articles = $myrow['count'];
		
				//return $num_articles;
				//unset ($num_articles);
			}
		} else {
			$num_articles = 0;
		}
	//echo $num_articles;
	return($num_articles);
} #

################################################################################
# Format dates
function post_date($datetime, $format) {

// DateTime format:  YYYY-MM-DD hh:mm:ss

	$yr=strval(substr($datetime, 0, 4));  
	$mo=strval(substr($datetime, 5, 2));  
	$da=strval(substr($datetime, 8, 2));  
	$hr=strval(substr($datetime, 11, 2));  
	$mi=strval(substr($datetime, 14, 2));  
	$se=strval(substr($datetime, 17, 2));

	$date_format = date($format, mktime ($hr,$mi,$se,$mo,$da,$yr)); //." GMT";
   
	return $date_format;
	
} // end function

################################################################################
#
function htmlentitydecode(&$text) {

    // thingy
    $text = preg_replace("/&quot;/", "\"", $text);
    $text = preg_replace("/&pound;/", "\"", $text);
    $text = preg_replace("/&#039;/", "'", $text);
    $text = preg_replace("/&lt;/", "<", $text);
    $text = preg_replace("/&gt;/", ">", $text);
    
    #echo $text;
    return $text;    
    
} // end thingy

################################################################################
# Article/cat status
function pub_status($id = "0", $type = "art") {
global $xoopsDB, $xoopsModule;
	
	if ($type == "art") {
		$result = $xoopsDB->query("SELECT art_showme FROM " .$xoopsDB->prefix('articles_main') . " WHERE id=$id LIMIT 1");
		list($showme) = $xoopsDB->fetchRow($result);
	}
	if ($type == "cat") {
		$result = $xoopsDB->query("SELECT cat_showme FROM " .$xoopsDB->prefix('articles_cat') . " WHERE id=$id LIMIT 1");
		list($showme) = $xoopsDB->fetchRow($result);
	}
	
		// Article hidden, return greyed out image name
		if ($showme == "0") {
			//return("bulb-grey.png");
			$status = "<img src=\"". XOOPS_URL ."/modules/". $xoopsModule->getVar('dirname') ."/images/bulb-grey.png\" width=\"16\" height=\"16\" alt=\"". _AM_ART_FRMCAPSTTSHDN ."\" title=\"". _AM_ART_FRMCAPSTTSHDN ."\" onMouseover=\"window.status='". _AM_ART_FRMCAPSTTSHDN ."'; return true\" onMouseout=\"window.status=' '; return true\">";
			
			/* <img src="<?php echo XOOPS_URL; ?>/modules/<?php echo $xoopsModule->getVar('dirname'); ?>/images/<?php echo pub_status($id); ?>" width="16" height="16" alt="<?php echo _AM_ART_FRMCAPLNKEDT; ?>"> */
		}
		// Article published, return yellow image name
		if ($showme == "1") {
			//return("bulb-yell.png");
			$status = "<img src=\"". XOOPS_URL ."/modules/". $xoopsModule->getVar('dirname') ."/images/bulb-yell.png\" width=\"16\" height=\"16\" alt=\"". _AM_ART_FRMCAPSTTSPUB ."\" title=\"". _AM_ART_FRMCAPSTTSPUB ."\" onMouseover=\"window.status='". _AM_ART_FRMCAPSTTSPUB ."'; return true\" onMouseout=\"window.status=' '; return true\">";
		}
	return($status);
} //

################################################################################
#
function admin_header($holder = "", $breadcrumbs = "Top") {
global $xoopsModule, $xoopsConfig;
?>
<style type="text/css">
#toptext { font-size: 11px; }
#listitem { display: inline; list-style: none; margin-left: 0px; }
#listitemurl { padding: 3px 0.5em; border: 1px solid #777788; margin-left: 3px; }
</style>

<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
  <tr>
    <td style="text-align: left;">
      <span id="toptext"><?php echo $breadcrumbs; ?></span>
    </td>
    <td style="text-align: right;">
      <span id="toptext"><strong><?php echo $xoopsModule->name(); ?> 
      <?php echo _AM_ART_NAVINFMOD; ?></strong> 
      : 
      <a href="<?php echo XOOPS_URL."/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=".$xoopsModule->getVar('mid'); ?>"><?php echo _AM_ART_NAVINFPREF; ?></a>
      :
      <a href="#"><?php echo _AM_ART_NAVINFHELP; ?></a>
      :
      <a href="about.php"><?php echo _AM_ART_NAVINFABOUT; ?></a>
      </span>
    </td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
  <tr><td style="height: 10px;"></td></tr>
  <tr>
    <td>
      <ul style="padding-left: 0px; margin-left: 0px;">
		<li id="listitem"><a href="<?php echo XOOPS_URL; ?>/modules/<?php echo $xoopsModule->getVar('dirname'); ?>/admin/index.php" id="listitemurl"><?php echo _AM_ART_NAVINDEX; ?></a></li>
		<li id="listitem"><a href="<?php echo XOOPS_URL; ?>/modules/<?php echo $xoopsModule->getVar('dirname'); ?>/admin/artadd.php" id="listitemurl"><?php echo _AM_ART_NAVARTADD; ?></a></li>
		<li id="listitem"><a href="<?php echo XOOPS_URL; ?>/modules/<?php echo $xoopsModule->getVar('dirname'); ?>/admin/arteddel.php" id="listitemurl"><?php echo _AM_ART_NAVARTEDDEL; ?></a></li>
		<li id="listitem"><a href="<?php echo XOOPS_URL; ?>/modules/<?php echo $xoopsModule->getVar('dirname'); ?>/admin/catadd.php" id="listitemurl"><?php echo _AM_ART_NAVCATADD; ?></a></li>
		<li id="listitem"><a href="<?php echo XOOPS_URL; ?>/modules/<?php echo $xoopsModule->getVar('dirname'); ?>/admin/cateddel.php" id="listitemurl"><?php echo _AM_ART_NAVCATEDDEL; ?></a></li>
		<li id="listitem"><a href="<?php echo XOOPS_URL; ?>/modules/<?php echo $xoopsModule->getVar('dirname'); ?>/admin/validate.php" id="listitemurl"><?php echo _AM_ART_NAVVALIDATE; ?></a></li>
      </ul>
    </td>
  </tr>
</table>


<?
} //

################################################################################
#
function admin_artfoot_text() {
global $xoopsModule;
    
    echo "<span style=\"font-size: smaller;\">";
    echo "<br />";
    //echo $xoopsModule->getVar('name') . ", version " . round($xoopsModule->getVar('version')/100 , 2) . "<br />";
    echo $xoopsModule->getVar('name') . ", version " . _ARTICLESVERSION . "<br />";
    echo "Updates are available from <a href=\"http://support.sirium.net\" target=\"_blank\">http://support.sirium.net</a>";
    echo "</span>";
       
} 

################################################################################
# // return cat name for admin area
function match_cats($cat_id = "0"){
global $xoopsDB;

	$result = $xoopsDB->query("SELECT cat_name FROM " .$xoopsDB->prefix('articles_cat') . " WHERE id=$cat_id LIMIT 1");
	list($cat_name) = $xoopsDB->fetchRow($result);// {

	return($cat_name);
} //

//
// Stats function
//

################################################################################
#
function wait_validation() {
global $xoopsDB;

	//$result = $xoopsDB->query("SELECT COUNT(id) AS count FROM " .$xoopsDB->prefix('articles_main') . " WHERE art_validated=0");
	//list($count) = $xoopsDB->fetchRow($result);
	
	$sql = ("SELECT COUNT(id) AS count FROM " . $xoopsDB->prefix("articles_main") . " WHERE art_validated=0");
	$result=$xoopsDB->query($sql);
	
	if ($xoopsDB->getRowsNum($result) > 0) {
		$rowclass = "even"; // set default call to use for rows
		while($myrow = $xoopsDB->fetchArray($result)) {
			//$count	= $myrow['count'];
			
			$validate = "<span style=\"color: red; font-weight: bold;\">". $myrow['count'] ."</span>";
			
		} // while
		
	} else {
		$validate = "0";
	} // else
	
	return($validate);

} //

################################################################################
#
function total_arts() {
global $xoopsDB;

	$result = $xoopsDB->query("SELECT COUNT(id) AS count FROM " .$xoopsDB->prefix('articles_main') . " ");
	list($count) = $xoopsDB->fetchRow($result);
	
	return($count);

} //

################################################################################
#
function total_cats() {
global $xoopsDB;

	$result = $xoopsDB->query("SELECT COUNT(id) AS count FROM " .$xoopsDB->prefix('articles_cat') . " ");
	list($count) = $xoopsDB->fetchRow($result);
	
	return($count);

} //

################################################################################
#
function total_views() {
global $xoopsDB;

	$sql = ("SELECT art_views FROM " . $xoopsDB->prefix("articles_main") . " ");
	$result=$xoopsDB->query($sql);
	
	if ($xoopsDB->getRowsNum($result) > 0) {
		
		$count = "0";
		while($myrow = $xoopsDB->fetchArray($result)) {
			//$count	= $myrow['count'];
			$count = $count + $myrow['art_views'];
		}
	} else {
		$count = 0;
	}
	return($count);
			
} //

################################################################################
#
function hidden_arts() {
global $xoopsDB;

	$result = $xoopsDB->query("SELECT COUNT(id) AS count FROM " .$xoopsDB->prefix('articles_main') . " WHERE art_showme=0 OR art_validated=0");
	list($count) = $xoopsDB->fetchRow($result);
	
	return($count);

} //

################################################################################
#
function published_arts() {
global $xoopsDB;

	$result = $xoopsDB->query("SELECT COUNT(id) AS count FROM " .$xoopsDB->prefix('articles_main') . " WHERE art_showme=1 AND art_validated=1");
	list($count) = $xoopsDB->fetchRow($result);
	
	return($count);

} //

################################################################################
# Check for add article, returns false if there are none
function cat_check() {
global $xoopsDB;

	$result = $xoopsDB->query("SELECT COUNT(id) AS count FROM " .$xoopsDB->prefix('articles_cat') . " ");
	list($count) = $xoopsDB->fetchRow($result);
	
	if($count < 1) {
		return(false);
	} else {
		return(true);
	}

} //

################################################################################
# Increment views value for articles
function increment_article_views($id) {
global $xoopsDB;

	$sql = ("UPDATE ".$xoopsDB->prefix("articles_main")." SET art_views=art_views+1 WHERE id=$id");
	$xoopsDB->queryF($sql);

} // end function

?>