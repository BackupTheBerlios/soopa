<?php

/**
* $Id: upgrade.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartClient
* Author: The SmartFactory <www.smartfactory.ca>
* Credit : Thanks to the xHelp development team :-)
* Licence: GNU
*/

include_once('admin_header.php'); 
include_once(SMARTSECTION_ROOT_PATH . "class/dbupdater.php");      

$dbupdater = new SmartsectionDbupdater();

global $xoopsModule;
$module_id = $xoopsModule->getVar('mid');

$op = 'default';

if ( isset( $_REQUEST['op'] ) )
{
    $op = $_REQUEST['op'];
}

switch ( $op )
{
    case "checkTables":
        checkTables();
        break;
    
    case "upgradeDB":
        upgradeDB();
        break;
    
    default:
        header("Location: ".SMARTSECTION_URL."admin/index.php");
        break;
}


function checkTables()
{
    global $xoopsModule, $oAdminButton;
    xoops_cp_header();
    ss_adminmenu(-1, _AM_SS_DB_CHECKTABLES);
    //1. Determine previous release
    if (!ss_TableExists('smartsection_meta')) {
        $ver = '0.93';
    } else {
        if (!$ver = ss_GetMeta('version')) {
            echo('Unable to determine previous version.');
        }
    }
    
    $currentVer = round($xoopsModule->getVar('version') / 100, 2);

    printf('<h2>'._AM_SS_DB_CURRENTVER.'</h2>', $currentVer);
    printf('<h2>'._AM_SS_DB_DBVER.'</h2>', $ver);

    
    if ($ver == $currentVer) {
        //No updates are necessary
        echo '<div>'._AM_SS_DB_NOUPDATE.'</div>';
        
    } elseif ( $ver < $currentVer) {
        //Needs to upgrade
        echo '<div>'._AM_SS_DB_NEEDUPDATE.'</div>';
        echo "<form method=\"post\" action=\"upgrade.php\"><input type=\"hidden\" name=\"op\" value=\"upgradeDB\" /><input type=\"submit\" value=\"". _AM_SS_DB_UPDATE_NOW . "\" /></form>";
    } else {
        //Tried to downgrade
        echo '<div>'._AM_SS_DB_NEEDINSTALL.'</div>';
    }
    
    ss_modFooter();
    xoops_cp_footer();
} 

function upgradeDB()
{
    
    global $xoopsModule, $dbupdater;
    $xoopsDB =& Database::getInstance();
    //1. Determine previous release
    //   *** Update this in sql/mysql.sql for each release **
    if (!ss_TableExists('smartsection_meta')) {
        $ver = '0.93';
    } else {
        if (!$ver = ss_GetMeta('version')) {
            exit(_AM_SS_DB_VERSION_ERR);
        }
    }
    
    $mid = $xoopsModule->getVar('mid');

    xoops_cp_header();
    ss_adminMenu(-1, _AM_SS_DB_UPDATE_DB);
    echo "<h2>"._AM_SS_DB_UPDATE_DB."</h2>";
    $ret = true;
    //2. Do All Upgrades necessary to make current
    //   Break statements are omitted on purpose

    switch($ver) {      
    case '0.93':
        set_time_limit(60);
        printf("<h3>". _AM_SS_DB_UPDATE_TO."</h3>", '1.0' );
        echo "<ul>";
        
        // Create table smartsection_meta
        $table = new SmartsectionTable('smartsection_meta');
        $table->setStructure(	"CREATE TABLE %s (
        						metakey varchar(50) NOT NULL default '', 
        						metavalue varchar(255) NOT NULL default '', 
        						PRIMARY KEY (metakey)) 
        						TYPE=MyISAM;");

        $table->setData(sprintf("'version', %s", $xoopsDB->quoteString($ver)));
       	$ret = $ret && $dbupdater->updateTable($table);
        unset($table);
        
        // Add fields in smartsection_categories
        $table = new SmartsectionTable('smartsection_categories');
        $table->addAlteredField('categoryid', "`categoryid` INT( 11 ) NOT NULL AUTO_INCREMENT");
        $table->addAlteredField('parentid', "`parentid` INT( 11 ) DEFAULT '0' NOT NULL");
       	$ret = $dbupdater->updateTable($table) && $ret;
        unset($table); 
        
        // Add fields in smartsection_items
        $table = new SmartsectionTable('smartsection_items');
        $table->addAlteredField('categoryid', "`categoryid` INT( 11 ) DEFAULT '0' NOT NULL");
        $table->addAlteredField('itemid', "`itemid` INT( 11 ) NOT NULL AUTO_INCREMENT");
       	$ret = $dbupdater->updateTable($table) && $ret;
        unset($table); 
        
        // Add fields in smartsection_files
        $table = new SmartsectionTable('smartsection_files');
        $table->addAlteredField('itemid', "`itemid` INT( 11 ) DEFAULT '0' NOT NULL");
        $table->addAlteredField('fileid', "`fileid` INT( 11 )  NOT NULL AUTO_INCREMENT");
       	$ret = $dbupdater->updateTable($table) && $ret;
        unset($table);         
        echo "</ul>";
        
    case '1.0':
    set_time_limit(60);
        printf("<h3>". _AM_SS_DB_UPDATE_TO."</h3>", '1.01' );
        echo "<ul>";
        
        // Add fields in smartsection_items
        $table = new SmartsectionTable('smartsection_items');
        $table->addAlteredField('body', "`body` LONGTEXT NOT NULL");
       	$ret = $dbupdater->updateTable($table) && $ret;
        unset($table); 
        
        echo "</ul>";          
    } 

    $newversion = round($xoopsModule->getVar('version') / 100, 2);
    //if successful, update smartsection_meta table with new ver
    if ($ret) {
        printf(_AM_SS_DB_UPDATE_OK, $newversion);
        $ret = ss_SetMeta('version', $newversion);
    } else {
        printf(_AM_SS_DB_UPDATE_ERR, $newversion);
    }
    
    
    ss_modFooter();
    xoops_cp_footer(); 
}
?>