<?php

/**
* $Id: permissions.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("admin_header.php");
include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';

if (!ss_userIsAdmin()) {
    redirect_header("javascript:history.go(-1)", 1, _NOPERM);
    exit;
} 

$op = '';

foreach ($_POST as $k => $v) {
    ${$k} = $v;
} 

foreach ($_GET as $k => $v) {
    ${$k} = $v;
} 

switch ($op) {
    case "default":
    default:
        global $xoopsDB, $xoopsModule;

        ss_xoops_cp_header();
        ss_adminMenu(4, _AM_SS_PERMISSIONS); 
        // View Categories permissions
        $item_list_view = array();
        $block_view = array(); 
        // echo "<h3 style='color: #2F5376; '>"._AM_SS_PERMISSIONSADMIN."</h3>\n" ;
        ss_collapsableBar('permissionstable', 'permissionsicon', _AM_SS_PERMISSIONSVIEWMAN, _AM_SS_VIEW_CATS);

        $result_view = $xoopsDB->query("SELECT categoryid, name FROM " . $xoopsDB->prefix("smartsection_categories") . " ");
        if ($xoopsDB->getRowsNum($result_view)) {
            while ($myrow_view = $xoopsDB->fetcharray($result_view)) {
                $item_list_view['cid'] = $myrow_view['categoryid'];
                $item_list_view['title'] = $myrow_view['name'];
                $form_view = new XoopsGroupPermForm("", $xoopsModule->getVar('mid'), "category_read", "");
                $block_view[] = $item_list_view;
                foreach ($block_view as $itemlists) {
                    $form_view->addItem($itemlists['cid'], $itemlists['title']);
                } 
            } 
            echo $form_view->render();
        } else {
			echo "<img id='toptableicon' src=" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/close12.gif alt='' /></a>&nbsp;" . _AM_SS_PERMISSIONSVIEWMAN . "</h3><div id='toptable'><span style=\"color: #567; margin: 3px 0 0 0; font-size: small; display: block; \">" . _AM_SS_NOPERMSSET . "</span>";

        } 
        ss_close_collapsable('permissionstable', 'permissionsicon');

        echo "<br />\n";
} 
$modfooter = ss_modFooter();
echo "<div align='center'>" . $modfooter . "</div>";
xoops_cp_footer();

?>