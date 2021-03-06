<?php
// $Id: blocksadmin.php,v 1.3 2005/08/08 23:43:18 mauriciodelima Exp $
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


$_REQUEST["selmod"]=empty($_REQUEST["selmod"])?0:intval($_REQUEST["selmod"]);

function list_blocks()
{
    global $xoopsUser, $xoopsConfig, $xoopsTpl, $xoopsOption;
    include_once XOOPS_ROOT_PATH.'/class/xoopslists.php';

    $block_handler =& xoops_gethandler('block');
    if($_REQUEST["selmod"]<1){
        $crit = null;
    }else{
        $crit = new Criteria("mid", $_REQUEST["selmod"]);
    }
    $criteria = new CriteriaCompo($crit);
    $criteria->setSort('name');
    $blocks =& $block_handler->getObjects($criteria, true);
    unset($criteria);

    $module_handler =& xoops_gethandler('module');
    $modules =& $module_handler->getObjects(null, true);

    include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
    $newform = new XoopsForm('', 'newform', 'admin.php');
    $block_select = new XoopsFormSelect('', 'bid');
    foreach ($blocks as $block) {
        $block_arr[$block->getVar('mid')]['modname'] = $modules[$block->getVar('mid')]->getVar('name');
        $block_arr[$block->getVar('mid')]['blocks'][$block->getVar('bid')] = " - ".$block->getVar('name');
        $modnames[$block->getVar('mid')] = $modules[$block->getVar('mid')]->getVar('name');
        $bids[]=$block->getVar('bid');
    }
    array_multisort($modnames, SORT_ASC, $block_arr);
    foreach (array_keys($block_arr) as $i) {
        $block_select->addOption("-".$i, $block_arr[$i]['modname'], true);
        $block_select->addOptionArray($block_arr[$i]['blocks']);
        //$newblockarray[] = $modules[$i]->getVar('name');
        //foreach ($block_arr[$i] as $bid => $bname) {
        //$newblockarray[] = " - ".$bname;
        //}
    }
    //$block_select->addOptionArray($newblockarray);
    $newform->addElement($block_select);
    $newform->addElement(new XoopsFormHidden('op', 'new'));
    $newform->addElement(new XoopsFormHidden('fct', 'blocksadmin'));
    $newform->addElement(new XoopsFormButton('', 'submit', _ADD, 'submit'));
    $newform->assign($xoopsTpl);

    $blockform = new XoopsForm('', 'blockform', 'admin.php', 'post', true);
    $crit = is_object($crit)?(new Criteria("bid", "(".implode(",",$bids).")", "IN")):null;
    $criteria = new CriteriaCompo($crit);
    $criteria->setSort('visible ASC, side ASC, weight');
    $instance_handler =& xoops_gethandler('blockinstance');
    $instances =& $instance_handler->getObjects($criteria, true, true);

    foreach (array_keys($instances) as $i) {
        $visiblein = $instances[$i]->getVisibleIn();
        //quickfix for upgraded installations where visibility was still a yes-no toggle in addition to side selector
        if ($instances[$i]->getVar('visible') == 0) {
            $instances[$i]->setVar('side', -1);
        }
        $instances[$i] = $instances[$i]->toArray();

        $blockform->addElement(new XoopsFormHidden('id['.$i.']', $i));
        $instances[$i]['block_name'] = isset($blocks[$instances[$i]['bid']]) ? $blocks[$instances[$i]['bid']]->getVar('name') : "";
        $instances[$i]['module_name'] = isset($blocks[$instances[$i]['bid']]) ? $modules[$blocks[$instances[$i]['bid']]->getVar('mid')]->getVar('name') : "";
        $instances[$i]['visiblein'] = $visiblein;

        $xoopsTpl->append('instances', $instances[$i]);
    }
    $xoopsTpl->assign('selmod', $_REQUEST["selmod"]);
    $blockform->addElement(new XoopsFormHidden('selmod', $_REQUEST["selmod"]));
    $blockform->addElement(new XoopsFormHidden('fct', 'blocksadmin'));
    $blockform->addElement(new XoopsFormHidden('op', 'order'));
    $blockform->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
    $blockform->assign($xoopsTpl);

    $side_options = array(-1 => _AM_NOTVISIBLE, 0 => _AM_SBLEFT, 1 => _AM_SBRIGHT, 3 => _AM_CBLEFT, 4 => _AM_CBRIGHT, 5 => _AM_CBCENTER, );
    $xoopsTpl->assign('side_options', $side_options);


    //Get modules and pages for visible in
    $module_list[_AM_SYSTEMLEVEL]["0-2"] = _AM_ADMINBLOCK;
    $module_list[_AM_SYSTEMLEVEL]["0-1"] = _AM_TOPPAGE;
    $module_list[_AM_SYSTEMLEVEL]["0-0"] = _AM_ALLPAGES;

    $criteria = new CriteriaCompo(new Criteria('hasmain', 1));
    $criteria->add(new Criteria('isactive', 1));
    $module_main =& $module_handler->getObjects($criteria, true, true);
    if (count($module_main) > 0) {
        foreach (array_keys($module_main) as $mid) {
            $module_list[$module_main[$mid]->getVar('name')][$mid."-0"] = _AM_ALLMODULEPAGES;
            $pages = $module_main[$mid]->getInfo("pages");
            if ($pages == false) {
                $pages = $module_main[$mid]->getInfo("sub");
            }
            if (is_array($pages) && $pages != array()) {
                foreach ($pages as $id => $pageinfo) {
                    $module_list[$module_main[$mid]->getVar('name')][$mid."-".$id] = $pageinfo['name'];
                }
            }
        }
    }
    //ksort($module_list);
    $xoopsTpl->assign('module_options', $module_list);

    $xoopsOption['template_main'] = 'system_admin_block.html';
}

function save_block($id, $bside, $bweight, $btitle, $bid, $bcachetime, $bmodule, $groups, $options)
{
    $instance_handler =& xoops_gethandler('blockinstance');
    if ($id > 0) {
        $instance =& $instance_handler->get($id);
    }
    else {
        $instance =& $instance_handler->create();
    }
    $bvisible = $bside != -1 ? 1 : 0;
    $instance->setVar('side', $bside);
    $instance->setVar('weight', $bweight);
    $instance->setVar('visible', $bvisible);
    $instance->setVar('title', $btitle);
    $instance->setVar('bcachetime', $bcachetime);
    $instance->setVar('bid', $bid);
    $instance->setVar('options', $options);
    if ($instance_handler->insert($instance)) {
        $GLOBALS['xoopsDB']->query("DELETE FROM ".$GLOBALS['xoopsDB']->prefix('block_module_link')." WHERE block_id=".$instance->getVar('instanceid'));
        foreach ($bmodule as $mid) {
            $page = explode('-', $mid);
            $mid = $page[0];
            $pageid = $page[1];
            $GLOBALS['xoopsDB']->query("INSERT INTO ".$GLOBALS['xoopsDB']->prefix('block_module_link')." VALUES (".$instance->getVar('instanceid').", ".intval($mid).", ".intval($pageid).")");
        }
        $gperm_name = "block_read";
        $gperm_itemid = $instance->getVar('instanceid');

        $groupperm_handler =& xoops_gethandler('groupperm');
        $groups_with_access =& $groupperm_handler->getGroupIds($gperm_name, $gperm_itemid);

        $removed_groups = array_diff($groups_with_access, $groups);
        if (count($removed_groups) > 0) {
            foreach ($removed_groups as $groupid) {
                $groupperm_handler->deleteRight($gperm_name, $gperm_itemid, $groupid);
            }
        }
        $new_groups = array_diff($groups, $groups_with_access);
        if (count($new_groups) > 0) {
            foreach ($new_groups as $groupid) {
                $groupperm_handler->addRight($gperm_name, $gperm_itemid, $groupid);
            }
        }
        return true;
    }
    return false;
}

function edit_block($id)
{
    echo '<a href="admin.php?fct=blocksadmin&amp;selmod='.$_REQUEST["selmod"].'">'. _AM_BADMIN .'</a>&nbsp;<span style="font-weight:bold;">&raquo;&raquo;</span>&nbsp;'._AM_EDITBLOCK.'<br /><br />';

    $instance_handler =& xoops_gethandler('blockinstance');
    $instance =& $instance_handler->get($id);
    $block_handler =& xoops_gethandler('block');
    $instance->setBlock($block_handler->get($instance->getVar('bid')));

    include XOOPS_ROOT_PATH.'/modules/system/admin/blocksadmin/blockform.php';
    $form =& getInstanceForm($instance, _AM_EDITBLOCK, 'save');
    $form->display();
}

function delete_block($bid)
{
    $instance_handler =& xoops_gethandler('blockinstance');
    $instance =& $instance_handler->get($bid);
    xoops_confirm(array('fct' => 'blocksadmin', 'op' => 'delete_ok', 'bid' => $bid, 'selmod' => $_REQUEST["selmod"]), 'admin.php', sprintf(_AM_RUSUREDEL,$instance->getVar('title')));
}

function delete_block_ok($bid)
{
    $instance_handler =& xoops_gethandler('blockinstance');
    $instance =& $instance_handler->get($bid);
    $instance_handler->delete($instance);

    redirect_header('admin.php?fct=blocksadmin&amp;selmod='.$_REQUEST["selmod"].'&amp;t='.time(),1,_MD_AM_DBUPDATED);
    exit();
}

function order_block($id, $weight, $side, $bmodule)
{
    $instance_handler =& xoops_gethandler('blockinstance');
    $id = array_map('intval', $id);
    $instances =& $instance_handler->getObjects(new Criteria('instanceid', "(".implode(',', $id).")", "IN"), true);

    $oldpages = array();
    $sql = "SELECT * FROM ".$GLOBALS['xoopsDB']->prefix('block_module_link');
    $result = $GLOBALS['xoopsDB']->query($sql);
    while (list($instanceid, $moduleid, $pageid) = $GLOBALS['xoopsDB']->fetchRow($result)) {
        $oldpages[$instanceid][$moduleid][] = $pageid;
    }

    if (count($instances) > 0) {
        foreach (array_keys($instances) as $i) {
            $visible = $side[$i] != -1 ? 1 : 0;
            if ($weight[$i] != $instances[$i]->getVar('weight') || $side[$i] != $instances[$i]->getVar('side') || $visible != $instances[$i]->getVar('visible')) {
                $instance_handler =& xoops_gethandler('blockinstance');
                $instances[$i]->setVar('weight', $weight[$i]);
                $instances[$i]->setVar('visible', $visible);
                $instances[$i]->setVar('side', $side[$i]);
                $instance_handler->insert($instances[$i]);
            }

            if (isset($bmodule[$i])) {
                foreach ($bmodule[$i] as $mid) {
                    $page = explode('-', $mid);
                    $mid = $page[0];
                    $pageid = $page[1];

                    if (!isset($oldpages[$i][$mid]) || !in_array($pageid, $oldpages[$i][$mid])) {
                        $GLOBALS['xoopsDB']->query("INSERT INTO ".$GLOBALS['xoopsDB']->prefix('block_module_link')." VALUES (".$instances[$i]->getVar('instanceid').", ".intval($mid).", ".intval($pageid).")");
                    }
                    $newpages[$i][$mid][] = $pageid;
                }
                if (isset($oldpages[$i])) {
                    foreach ($oldpages[$i] as $mid => $pageids) {
                        foreach ($pageids as $oldid) {
                            if (!isset($newpages[$i][$mid]) || !in_array($oldid, $newpages[$i][$mid])) {
                                $GLOBALS['xoopsDB']->query("DELETE FROM ".$GLOBALS['xoopsDB']->prefix('block_module_link')." WHERE block_id=".$instances[$i]->getVar('instanceid')." AND module_id=".$mid." AND pageid = ".intval($oldid));
                            }
                        }
                    }
                }
            }
            else {
                $GLOBALS['xoopsDB']->query("DELETE FROM ".$GLOBALS['xoopsDB']->prefix('block_module_link')." WHERE block_id=".$instances[$i]->getVar('instanceid'));
            }
        }
    }
    return true;
}

function instantiate_block($bid)
{
    global $xoopsConfig;
    xoops_cp_header();

    $instance_handler =& xoops_gethandler('blockinstance');
    $instance =& $instance_handler->create();
    $block_handler =& xoops_gethandler('block');
    $instance->setBlock($block_handler->get($bid));

    echo '<a href="admin.php?fct=blocksadmin&amp;selmod='.$_REQUEST["selmod"].'">'. _AM_BADMIN .'</a>&nbsp;<span style="font-weight:bold;">&raquo;&raquo;</span>&nbsp;'._AM_ADDBLOCK.'<br /><br />';
    include XOOPS_ROOT_PATH.'/modules/system/admin/blocksadmin/blockform.php';
    $form =& getInstanceForm($instance, _AM_ADDBLOCK, 'save');
    $form->display();
    xoops_cp_footer();
    exit();
}

?>