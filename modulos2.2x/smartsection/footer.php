<?php

/**
* $Id: footer.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

global $xoopsModule, $xoopsModuleConfig;

include_once XOOPS_ROOT_PATH . "/modules/smartsection/include/functions.php";

$uid = ($xoopsUser) ? ($xoopsUser->getVar("uid")) : 0;
$isAdmin = (ss_userIsAdmin() || ss_moderator());

$xoopsTpl->assign("smartsection_adminpage", "<a href='" . XOOPS_URL . "/modules/smartsection/admin/index.php'>" ._MD_SS_ADMIN_PAGE . "</a>");
$xoopsTpl->assign("isAdmin", $isAdmin);
$xoopsTpl->assign('smartsection_url', SMARTSECTION_URL);
$xoopsTpl->assign('smartsection_images_url', SMARTSECTION_IMAGES_URL);

$xoopsTpl->assign("xoops_module_header", '<link rel="stylesheet" type="text/css" href="smartsection.css" />');

$xoopsTpl->assign('lang_total', _MD_SS_TOTAL_SMARTITEMS);
$xoopsTpl->assign('lang_home', _MD_SS_HOME);
$xoopsTpl->assign('lang_description', _MD_SS_DESCRIPTION);
$xoopsTpl->assign('displayList', $xoopsModuleConfig['displaytype']=='list');
$xoopsTpl->assign('displayFull', $xoopsModuleConfig['displaytype']=='full');
$xoopsTpl->assign('modulename', $xoopsModule->dirname());
$xoopsTpl->assign('displaylastitem', $xoopsModuleConfig['displaylastitem']);
$xoopsTpl->assign('displaysubcatdsc', $xoopsModuleConfig['displaysubcatdsc']);
$xoopsTpl->assign('collapsable_heading', $xoopsModuleConfig['collapsable_heading']);
$xoopsTpl->assign('display_comment_link', $xoopsModuleConfig['display_comment_link']);
$xoopsTpl->assign('display_whowhen_link', $xoopsModuleConfig['display_whowhen_link']);

$xoopsTpl->assign('display_date_col', $xoopsModuleConfig['display_date_col']);
$xoopsTpl->assign('display_hits_col', $xoopsModuleConfig['display_hits_col']);

$xoopsTpl->assign('lang_reads', _MD_SS_READS);
$xoopsTpl->assign('lang_items', _MD_SS_ITEMS);
$xoopsTpl->assign('lang_last_smartsection', _MD_SS_LAST_SMARTITEM);
$xoopsTpl->assign('lang_categories_summary', _MD_SS_INDEX_CATEGORIES_SUMMARY);
$xoopsTpl->assign('lang_categories_summary_info', _MD_SS_INDEX_CATEGORIES_SUMMARY_INFO);
$xoopsTpl->assign('lang_index_items', _MD_SS_INDEX_ITEMS);
$xoopsTpl->assign('lang_index_items_info', _MD_SS_INDEX_ITEMS_INFO);
$xoopsTpl->assign('lang_category_column', _MD_SS_CATEGORY );
$xoopsTpl->assign('lang_editcategory', _MD_SS_CATEGORY_EDIT);
$xoopsTpl->assign('lang_comments', _MD_SS_COMMENTS);
$xoopsTpl->assign('lang_view_more',_MD_SS_VIEW_MORE);
$xoopsTpl->assign("ref_smartfactory", "SmartSection is developed by The SmartFactory (http://www.smartfactory.ca), a division of InBox Solutions (http://www.inboxsolutions.net)");

?>