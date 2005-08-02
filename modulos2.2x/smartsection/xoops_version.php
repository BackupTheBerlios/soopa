<?php

/**
* $Id: xoops_version.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

$modversion['name'] = _MI_SS_MD_NAME;
$modversion['version'] = 1.01;
$modversion['description'] = _MI_SS_MD_DESC;
$modversion['author'] = "The SmartFactory [www.smartfactory.ca]";
$modversion['credits'] = "w4z004, hsalazar, Mithrandir, Mariuss, Michiel, phppp, outch, Xvitry, fx2024 & Catzwolf";
$modversion['help'] = "";
$modversion['license'] = "GNU General Public License (GPL)";
$modversion['official'] = 0;
$modversion['image'] = "images/smartsection_logo.png";
$modversion['dirname'] = "smartsection";

// Added by marcan for the About page in admin section
$modversion['adminMenu'] = "ss_adminMenu";
$modversion['modFooter'] = "ss_modFooter";
$modversion['developer_lead'] = "marcan [Marc-André Lanciault]";
$modversion['developer_contributor'] = "w4z004, hsalazar, Mithrandir, Mariuss, Michiel, phppp, outch, Xvitry, fx2024 & Catzwolf";
$modversion['developer_website_url'] = "http://www.smartfactory.ca";
$modversion['developer_website_name'] = "SmartFactory.ca";
$modversion['developer_email'] = "marcan@smartfactory";
$modversion['status_version'] = "Beta 1 ";
$modversion['status'] = "Beta";
$modversion['date'] = "2005-06-14";

$modversion['warning'] = _MI_SS_WARNING_BETA;

$modversion['demo_site_url'] = "ttp://www.smartfactory.ca/modules/smartsection";
$modversion['demo_site_name'] = "SmartFactory's Library";
$modversion['support_site_url'] = "http://dev.xoops.org/modules/xfmod/project/?smartsection";
$modversion['support_site_name'] = "SmartSection on the Developpers Forge";
$modversion['submit_bug'] = "http://dev.xoops.org/modules/xfmod/tracker/?func=add&group_id=1102&atid=546";
$modversion['submit_feature'] = "http://dev.xoops.org/modules/xfmod/tracker/?func=add&group_id=1102&atid=549";

$modversion['author_word'] = "
To come...
";

$modversion['version_history'] = "
=> Version 1 Beta 1 (2005-06-14)<br />
===================================<br />
<br />
- Addition of check database table functionnality, including  a new dbUpdater class that performs the db upgrade<br />
- Keyword highlighting added in the search function<br />
- A lot of errors were fixed in the Spotlight block<br />
- The Preferences page now has naviation tabs, just like the other admin pages. Thanks to Xavier from Wiwimod :-)<br />
- A bug prevented the creation of a category with an id greater than 128. This has been fixed, thanks to tommyz<br />
- Blocks were not displaying items by hits of weight<br />
- Files deletion bug is fixed<br />
- Displaying multiple nested categories bug is fixed<br />
- Bug fix related to the date when submitting an item from the user side<br />
- Implementation of a template in the Submit an item form<br />
- Implementation of a preview function<br />
- Add some item links in the admin side<br />
<br />
=> Version 0.93 Beta 1 (2005-02-18)<br />
===================================<br />
<br />
- Improvments in the folder creation script<br />
- Corrections in the french language files for the Article plugin<br />
- Add a config option to display or not the sub-categories under the top categories<br />
- Add a config option to display or not a list of last articles in the index page<br />
<br />
=> Version 0.92 Beta 1 (2005-01-30)<br />
===================================<br />
<br />
- Plugins are now better implemented as they are complete sentences and not only words (feature #1943)<br />
- The About page is now managed by a class<br />
- Navigation throught previous and next items within a category is now possible<br />
- An item now has an image field (feature #1942)<br />
- Bug fixed when uploading category image (the category is still not used in user side thought...) (bug #1565)<br />
- All uploaded images and files are now uploaded in xoops_root/uploads/smartsection. This fixes a couple of reported bugs... (bug #1620)<br />
- Bug fixed in collapse javascript functions (#bug 1859)<br />
- Block editing was causin some fatal errors. This has been fixed (bug #1717)<br />
- The module was causing Fatal errors in the user profile and the search results page. This has been fixed (bug #1718)<br />
- The icon to edit a category had a wrong link. This has been fixed. (bug #1719)<br />
- Missing/trunked object in sent email has been fixed (bug #1791)<br />
- Anonymous blank page has been fixed (bug # 1777)<br />
- Problem with article title in multilanguage has been fixed (bug #1830)<br />
- 'Published By' missing has been fixed (bug #1696)<br />
- Datetime error on the Datesub field has been fixed (bug #1621)<br />
<br />
=> Version 0.81 Beta 1<br />
======================<br />
<br />
- Adding the [pagebreak] functionnality<br />
- Adding Koivi WYSIWYG support (feature #1932)<br />
<br />
=> Version 0.8 Beta 2<br />
=====================<br />
<br />
- Add a function to create the upload and images folder in the admin section<br />
- Uploading files linked to articles is now working<br />
- Fix the bug of anonymous access<br />
- Fix the bug of Fatal error in the user profile<br />
- Fix the bug of Fatal error in the global search<br />
- Other bug fixing<br />
<br />
=> Version 0.8 Beta 1<br />
=====================<br />
<br />
- First public release of the module.
";

// Language plugins
/*$modversion['lang_plugin'] = array(_MI_SS_LANG_PLUGIN_ARTICLE  => 'article',
                                   _MI_SS_LANG_PLUGIN_ITEM     => 'item',
                                   _MI_SS_LANG_PLUGIN_TUTORIAL => 'tutorial'
                                   );*/
                                   
// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";
// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
// Tables created by sql file (without prefix!)
$modversion['tables'][0] = "smartsection_categories";
$modversion['tables'][1] = "smartsection_items";
$modversion['tables'][2] = "smartsection_files";
$modversion['tables'][3] = "smartsection_meta";
// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "smartsection_search";
// Menu
$modversion['hasMain'] = 1;

global $xoopsModule;
if (is_object($xoopsModule) && $xoopsModule->getVar('dirname') == $modversion['dirname']) {
    global $xoopsModuleConfig, $xoopsUser;
    $isAdmin = false;
    if (!empty($xoopsUser)) {
        $isAdmin = ($xoopsUser->isAdmin($xoopsModule->getVar('mid')));
    }
    // Add the Submit new item button
    if ($isAdmin || (isset($xoopsModuleConfig['allowsubmit']) && $xoopsModuleConfig['allowsubmit'] == 1 && (is_object($xoopsUser) || (isset($xoopsModuleConfig['anonpost']) && $xoopsModuleConfig['anonpost'] == 1)))) {
        $modversion['sub'][1]['name'] = _MI_SS_SUB_SMNAME1;
        $modversion['sub'][1]['url'] = "submit.php?op=add";
    }
}
$modversion['blocks'][1]['file'] = "items_new.php";
$modversion['blocks'][1]['name'] = _MI_SS_ITEMSNEW;
$modversion['blocks'][1]['description'] = "Shows new items";
$modversion['blocks'][1]['show_func'] = "b_items_new_show";
$modversion['blocks'][1]['edit_func'] = "b_items_new_edit";
$modversion['blocks'][1]['options'] = "0|datesub|5|65";
$modversion['blocks'][1]['template'] = "items_new.html";

$modversion['blocks'][2]['file'] = "items_recent.php";
$modversion['blocks'][2]['name'] = _MI_SS_RECENTITEMS;
$modversion['blocks'][2]['description'] = "Shows recent items";
$modversion['blocks'][2]['show_func'] = "b_items_recent_show";
$modversion['blocks'][2]['edit_func'] = "b_items_recent_edit";
$modversion['blocks'][2]['options'] = "0|datesub|5|65";
$modversion['blocks'][2]['template'] = "items_recent.html";

$modversion['blocks'][3]['file'] = "items_spot.php";
$modversion['blocks'][3]['name'] = _MI_SS_ITEMSPOT;
$modversion['blocks'][3]['description'] = "Shows last item";
$modversion['blocks'][3]['show_func'] = "b_items_spot_show";
$modversion['blocks'][3]['edit_func'] = "b_items_spot_edit";
$modversion['blocks'][3]['options'] = "1|5|0|0|1|1|bullet";
$modversion['blocks'][3]['template'] = "items_spot.html";

$modversion['blocks'][4]['file'] = "items_random_item.php";
$modversion['blocks'][4]['name'] = _MI_SS_ITEMSRANDOM_ITEM;
$modversion['blocks'][4]['description'] = "Shows a random 'item' item";
$modversion['blocks'][4]['show_func'] = "b_items_random_item_show";
$modversion['blocks'][4]['template'] = "items_random_item.html";

$modversion['blocks'][5]['file'] = "items_menu.php";
$modversion['blocks'][5]['name'] = _MI_SS_ITEMSMENU;
$modversion['blocks'][5]['description'] = "Display a menu";
$modversion['blocks'][5]['show_func'] = "b_items_menu_show";
$modversion['blocks'][5]['edit_func'] = "b_items_menu_edit";
$modversion['blocks'][5]['template'] = "items_menu.html";

// Templates
$modversion['templates'][1]['file'] = 'smartsection_header.html';
$modversion['templates'][1]['description'] = 'Display header';

$modversion['templates'][2]['file'] = 'smartsection_singleitem.html';
$modversion['templates'][2]['description'] = 'Display a single item';

$modversion['templates'][3]['file'] = 'smartsection_index.html';
$modversion['templates'][3]['description'] = 'Display index';

$modversion['templates'][4]['file'] = 'smartsection_category.html';
$modversion['templates'][4]['description'] = 'Display category';

$modversion['templates'][5]['file'] = 'smartsection_item.html';
$modversion['templates'][5]['description'] = 'Display item';

$modversion['templates'][6]['file'] = 'smartsection_submit.html';
$modversion['templates'][6]['description'] = 'Form to submit an item';

$modversion['templates'][7]['file'] = 'smartsection_singleitem_block.html';
$modversion['templates'][7]['description'] = 'Display a single item in a block';

$modversion['templates'][8]['file'] = 'smartsection_print.html';
$modversion['templates'][8]['description'] = 'Print page template';

// Config Settings (only for modules that need config settings generated automatically)

$modversion['config'][1]['name'] = 'show_subcats';
$modversion['config'][1]['title'] = '_MI_SS_SHOW_SUBCATS';
$modversion['config'][1]['description'] = '_MI_SS_SHOW_SUBCATS_DSC';
$modversion['config'][1]['formtype'] = 'yesno';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = 1;

$modversion['config'][2]['name'] = 'displaylastitems';
$modversion['config'][2]['title'] = '_MI_SS_DISPLAY_LAST_ITEMS';
$modversion['config'][2]['description'] = '_MI_SS_DISPLAY_LAST_ITEMS_DSC';
$modversion['config'][2]['formtype'] = 'yesno';
$modversion['config'][2]['valuetype'] = 'int';
$modversion['config'][2]['default'] = 1;

$modversion['config'][3]['name'] = 'displaylastitem';
$modversion['config'][3]['title'] = '_MI_SS_DISPLAY_LAST_ITEM';
$modversion['config'][3]['description'] = '_MI_SS_DISPLAY_LAST_ITEMDSC';
$modversion['config'][3]['formtype'] = 'yesno';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = 1;

$modversion['config'][4] ['name'] = 'displaysubcatdsc';
$modversion['config'][4]['title'] = '_MI_SS_DISPLAY_SBCAT_DSC';
$modversion['config'][4]['description'] = '_MI_SS_DISPLAY_SBCAT_DSCDSC';
$modversion['config'][4]['formtype'] = 'yesno';
$modversion['config'][4]['valuetype'] = 'int';
$modversion['config'][4]['default'] = 1;

$modversion['config'][5]['name'] = 'display_date_col';
$modversion['config'][5]['title'] = '_MI_SS_DISPLAY_DATE_COL';
$modversion['config'][5]['description'] = '_MI_SS_DISPLAY_DATE_COLDSC';
$modversion['config'][5]['formtype'] = 'yesno';
$modversion['config'][5]['valuetype'] = 'int';
$modversion['config'][5]['default'] = 1;

$modversion['config'][6]['name'] = 'display_hits_col';
$modversion['config'][6]['title'] = '_MI_SS_DISPLAY_HITS_COL';
$modversion['config'][6]['description'] = '_MI_SS_DISPLAY_HITS_COLDSC';
$modversion['config'][6]['formtype'] = 'yesno';
$modversion['config'][6]['valuetype'] = 'int';
$modversion['config'][6]['default'] = 1;

/*$modversion['config'][7]['name'] = 'display_category_summary';
$modversion['config'][7]['title'] = '_MI_SS_DISPLAY_CAT_SUMMARY';
$modversion['config'][7]['description'] = '_MI_SS_DISPLAY_CAT_SUMMARY_DSC';
$modversion['config'][7]['formtype'] = 'yesno';
$modversion['config'][7]['valuetype'] = 'int';
$modversion['config'][7]['default'] = 1;*/

$modversion['config'][7]['name'] = 'display_comment_link';
$modversion['config'][7]['title'] = '_MI_SS_DISPLAY_COMMENT';
$modversion['config'][7]['description'] = '_MI_SS_DISPLAY_COMMENT_DSC';
$modversion['config'][7]['formtype'] = 'yesno';
$modversion['config'][7]['valuetype'] = 'int';
$modversion['config'][7]['default'] = 1;

$modversion['config'][8]['name'] = 'display_whowhen_link';
$modversion['config'][8]['title'] = '_MI_SS_DISPLAY_WHOWHEN';
$modversion['config'][8]['description'] = '_MI_SS_DISPLAY_WHOWHEN_DSC';
$modversion['config'][8]['formtype'] = 'yesno';
$modversion['config'][8]['valuetype'] = 'int';
$modversion['config'][8]['default'] = 1;

$modversion['config'][9]['name'] = 'adminhits';
$modversion['config'][9]['title'] = '_MI_SS_ALLOWADMINHITS';
$modversion['config'][9]['description'] = '_MI_SS_ALLOWADMINHITSDSC';
$modversion['config'][9]['formtype'] = 'yesno';
$modversion['config'][9]['valuetype'] = 'int';
$modversion['config'][9]['default'] = 0;

$modversion['config'][10]['name'] = 'indexwelcomemsg';
$modversion['config'][10]['title'] = '_MI_SS_INDEXWELCOMEMSG';
$modversion['config'][10]['description'] = '_MI_SS_INDEXWELCOMEMSGDSC';
$modversion['config'][10]['formtype'] = 'textarea';
$modversion['config'][10]['valuetype'] = 'text';
$modversion['config'][10]['default'] = _MI_SS_INDEXWELCOMEMSGDEF;

$modversion['config'][11]['name'] = 'title_and_welcome';
$modversion['config'][11]['title'] = '_MI_SS_TITLE_AND_WELCOME';
$modversion['config'][11]['description'] = '_MI_SS_TITLE_AND_WELCOME_DSC';
$modversion['config'][11]['formtype'] = 'yesno';
$modversion['config'][11]['valuetype'] = 'int';
$modversion['config'][11]['default'] = 1;

$modversion['config'][12]['name'] = 'submitintromsg';
$modversion['config'][12]['title'] = '_MI_SS_SUBMITINTROMSG';
$modversion['config'][12]['description'] = '_MI_SS_SUBMITINTROMSGDSC';
$modversion['config'][12]['formtype'] = 'textarea';
$modversion['config'][12]['valuetype'] = 'text';
$modversion['config'][12]['default'] = _MI_SS_SUBMITINTROMSGDEF;

$modversion['config'][13]['name'] = 'indexfooter';
$modversion['config'][13]['title'] = '_MI_SS_INDEXFOOTER';
$modversion['config'][13]['description'] = '_MI_SS_INDEXFOOTERDSC';
$modversion['config'][13]['formtype'] = 'textarea';
$modversion['config'][13]['valuetype'] = 'text';
$modversion['config'][13]['default'] = '';

$modversion['config'][14]['name'] = 'itemfooter';
$modversion['config'][14]['title'] = '_MI_SS_ITEMFOOTER';
$modversion['config'][14]['description'] = '_MI_SS_ITEMFOOTERDSC';
$modversion['config'][14]['formtype'] = 'textarea';
$modversion['config'][14]['valuetype'] = 'text';
$modversion['config'][14]['default'] = '';

$modversion['config'][15]['name'] = 'headerprint';
$modversion['config'][15]['title'] = '_MI_SS_HEADERPRINT';
$modversion['config'][15]['description'] = '_MI_SS_HEADERPRINTDSC';
$modversion['config'][15]['formtype'] = 'textarea';
$modversion['config'][15]['valuetype'] = 'text';
$modversion['config'][15]['default'] = '';

$modversion['config'][16]['name'] = 'printlogourl';
$modversion['config'][16]['title'] = '_MI_SS_PRINTLOGOURL';
$modversion['config'][16]['description'] = '_MI_SS_PRINTLOGOURLDSC';
$modversion['config'][16]['formtype'] = 'textbox';
$modversion['config'][16]['valuetype'] = 'text';
$modversion['config'][16]['default'] = XOOPS_URL . '/images/logo.gif';

$modversion['config'][17]['name'] = 'footerprint';
$modversion['config'][17]['title'] = '_MI_SS_FOOTERPRINT';
$modversion['config'][17]['description'] = '_MI_SS_FOOTERPRINTDSC';
$modversion['config'][17]['formtype'] = 'select';
$modversion['config'][17]['valuetype'] = 'text';
$modversion['config'][17]['default'] = 'item footer';
$modversion['config'][17]['options'] = array(_MI_SS_ITEMFOOTER_SEL  => 'item footer',
                                   		_MI_SS_INDEXFOOTER_SEL   => 'index footer',
                                  		 _MI_SS_BOTH_FOOTERS => 'both',
                                  		 _MI_SS_NO_FOOTERS => 'none');                                   
                                  		 
$modversion['config'][18]['name'] = 'dateformat';
$modversion['config'][18]['title'] = '_MI_SS_DATEFORMAT';
$modversion['config'][18]['description'] = '_MI_SS_DATEFORMATDSC';
$modversion['config'][18]['formtype'] = 'textbox';
$modversion['config'][18]['valuetype'] = 'text';
$modversion['config'][18]['default'] = 'd-M-Y H:i';

$modversion['config'][19]['name'] = 'displaytype';
$modversion['config'][19]['title'] = '_MI_SS_DISPLAYTYPE';
$modversion['config'][19]['description'] = '_MI_SS_DISPLAYTYPEDSC';
$modversion['config'][19]['formtype'] = 'select';
$modversion['config'][19]['valuetype'] = 'text';
$modversion['config'][19]['options'] = array(_MI_SS_DISPLAYTYPE_SUMMARY => 'summary', _MI_SS_DISPLAYTYPE_FULL => 'full',_MI_SS_DISPLAYTYPE_LIST => 'list');
$modversion['config'][19]['default'] = 'summary';

$modversion['config'][20]['name'] = 'use_wysiwyg';
$modversion['config'][20]['title'] = '_MI_SS_USE_WYSIWYG';
$modversion['config'][20]['description'] = '_MI_SS_USE_WYSIWYG_DSC';
$modversion['config'][20]['formtype'] = 'yesno';
$modversion['config'][20]['valuetype'] = 'int';
$modversion['config'][20]['default'] =0;

$modversion['config'][21]['name'] = 'lastitemsize';
$modversion['config'][21]['title'] = '_MI_SS_LAST_ITEM_SIZE';
$modversion['config'][21]['description'] = '_MI_SS_LAST_ITEM_SIZEDSC';
$modversion['config'][21]['formtype'] = 'textbox';
$modversion['config'][21]['valuetype'] = 'text';
$modversion['config'][21]['default'] = '50';

$modversion['config'][22]['name'] = 'titlesize';
$modversion['config'][22]['title'] = '_MI_SS_TITLE_SIZE';
$modversion['config'][22]['description'] = '_MI_SS_TITLE_SIZEDSC';
$modversion['config'][22]['formtype'] = 'textbox';
$modversion['config'][22]['valuetype'] = 'text';
$modversion['config'][22]['default'] = '60';

$modversion['config'][23]['name'] = 'collapsable_heading';
$modversion['config'][23]['title'] = '_MI_SS_COLLAPSABLE_HEADING';
$modversion['config'][23]['description'] = '_MI_SS_COLLAPSABLE_HEADING_DSC';
$modversion['config'][23]['formtype'] = 'yesno';
$modversion['config'][23]['valuetype'] = 'int';
$modversion['config'][23]['default'] = 1;

$modversion['config'][24]['name'] = 'orderby';
$modversion['config'][24]['title'] = '_MI_SS_ORDERBYDATE';
$modversion['config'][24]['description'] = '_MI_SS_ORDERBYDATEDSC';
$modversion['config'][24]['formtype'] = 'select';
$modversion['config'][24]['valuetype'] = 'text';
$modversion['config'][24]['options'] = array(_MI_SS_ORDERBY_TITLE => 'title', _MI_SS_ORDERBY_DATE => 'date',_MI_SS_ORDERBY_WEIGHT => 'weight');
$modversion['config'][24]['default'] = 'date';

$modversion['config'][25]['name'] = 'useimagenavpage';
$modversion['config'][25]['title'] = '_MI_SS_USEIMAGENAVPAGE';
$modversion['config'][25]['description'] = '_MI_SS_USEIMAGENAVPAGEDSC';
$modversion['config'][25]['formtype'] = 'yesno';
$modversion['config'][25]['valuetype'] = 'int';
$modversion['config'][25]['default'] = 0;

$modversion['config'][26]['name'] = 'catperpage';
$modversion['config'][26]['title'] = '_MI_SS_CATPERPAGE';
$modversion['config'][26]['description'] = '_MI_SS_CATPERPAGEDSC';
$modversion['config'][26]['formtype'] = 'select';
$modversion['config'][26]['valuetype'] = 'int';
$modversion['config'][26]['default'] = 5;
$modversion['config'][26]['options'] = array('5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50);

$modversion['config'][27]['name'] = 'perpage';
$modversion['config'][27]['title'] = '_MI_SS_PERPAGE';
$modversion['config'][27]['description'] = '_MI_SS_PERPAGEDSC';
$modversion['config'][27]['formtype'] = 'select';
$modversion['config'][27]['valuetype'] = 'int';
$modversion['config'][27]['default'] = 5;
$modversion['config'][27]['options'] = array('5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50);

$modversion['config'][28]['name'] = 'indexperpage';
$modversion['config'][28]['title'] = '_MI_SS_PERPAGEINDEX';
$modversion['config'][28]['description'] = '_MI_SS_PERPAGEINDEXDSC';
$modversion['config'][28]['formtype'] = 'select';
$modversion['config'][28]['valuetype'] = 'int';
$modversion['config'][28]['default'] = 5;
$modversion['config'][28]['options'] = array('5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50);

$modversion['config'][29]['name'] = 'userealname';
$modversion['config'][29]['title'] = '_MI_SS_USEREALNAME';
$modversion['config'][29]['description'] = '_MI_SS_USEREALNAMEDSC';
$modversion['config'][29]['formtype'] = 'yesno';
$modversion['config'][29]['valuetype'] = 'int';
$modversion['config'][29]['default'] = 0;

$modversion['config'][30]['name'] = 'other_items_type';
$modversion['config'][30]['title'] = '_MI_SS_OTHER_ITEMS_TYPE';
$modversion['config'][30]['description'] = '_MI_SS_OTHER_ITEMS_TYPE_DSC';
$modversion['config'][30]['formtype'] = 'select';
$modversion['config'][30]['valuetype'] = 'text';
$modversion['config'][30]['options'] = array(_MI_SS_OTHER_ITEMS_TYPE_NONE => 'none', _MI_SS_OTHER_ITEMS_TYPE_PREVIOUS_NEXT => 'previous_next', _MI_SS_OTHER_ITEMS_TYPE_ALL => 'all');
$modversion['config'][30]['default'] = 'previous_next';

$modversion['config'][31]['name'] = 'highlight_color';
$modversion['config'][31]['title'] = '_MI_SS_HIGHLIGHT_COLOR';
$modversion['config'][31]['description'] = '_MI_SS_HIGHLIGHT_COLORDSC';
$modversion['config'][31]['formtype'] = 'textbox';
$modversion['config'][31]['valuetype'] = 'text';
$modversion['config'][31]['default'] = '#FFFF80';

$modversion['config'][32]['name'] = 'linkedPath';
$modversion['config'][32]['title'] = '_MI_SS_LINKED_PATH';
$modversion['config'][32]['description'] = '_MI_SS_LINKED_PATHDSC';
$modversion['config'][32]['formtype'] = 'yesno';
$modversion['config'][32]['valuetype'] = 'int';
$modversion['config'][32]['default'] = 1;

$modversion['config'][33]['name'] = 'show_mod_name_breadcrumb';
$modversion['config'][33]['title'] = '_MI_SS_SHOW_MODNAME_BREADCRUMB';
$modversion['config'][33]['description'] = '_MI_SS_SHOW_MODNAME_BRDCRMBDSC';
$modversion['config'][33]['formtype'] = 'yesno';
$modversion['config'][33]['valuetype'] = 'int';
$modversion['config'][33]['default'] = 1;
                                  		 
$modversion['config'][34]['name'] = 'allowsubmit';
$modversion['config'][34]['title'] = '_MI_SS_ALLOWSUBMIT';
$modversion['config'][34]['description'] = '_MI_SS_ALLOWSUBMITDSC';
$modversion['config'][34]['formtype'] = 'yesno';
$modversion['config'][34]['valuetype'] = 'int';
$modversion['config'][34]['default'] = 0;

$modversion['config'][35]['name'] = 'anonpost';
$modversion['config'][35]['title'] = '_MI_SS_ANONPOST';
$modversion['config'][35]['description'] = '_MI_SS_ANONPOSTDSC';
$modversion['config'][35]['formtype'] = 'yesno';
$modversion['config'][35]['valuetype'] = 'int';
$modversion['config'][35]['default'] = 0;

$modversion['config'][36]['name'] = 'allowupload';
$modversion['config'][36]['title'] = '_MI_SS_ALLOWUPLOAD';
$modversion['config'][36]['description'] = '_MI_SS_ALLOWUPLOADDSC';
$modversion['config'][36]['formtype'] = 'yesno';
$modversion['config'][36]['valuetype'] = 'int';
$modversion['config'][36]['default'] = 1;

$member_handler = &xoops_gethandler('member');
$groups = &$member_handler->getGroupList();

$modversion['config'][37]['name'] = 'commentatarticlelevel';
$modversion['config'][37]['title'] = '_MI_SS_ALLOWCOMMENTS';
$modversion['config'][37]['description'] = '_MI_SS_ALLOWCOMMENTSDSC';
$modversion['config'][37]['formtype'] = 'yesno';
$modversion['config'][37]['valuetype'] = 'int';
$modversion['config'][37]['default'] = 1;



$modversion['config'][38]['name'] = 'autoapprove_submitted';
$modversion['config'][38]['title'] = '_MI_SS_AUTOAPPROVE_SUB_ITEM';
$modversion['config'][38]['description'] = '_MI_SS_AUTOAPPROVE_SUB_ITEMDSC';
$modversion['config'][38]['formtype'] = 'yesno';
$modversion['config'][38]['valuetype'] = 'int';
$modversion['config'][38]['default'] = 0;

// Comments
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = 'itemid';
$modversion['comments']['pageName'] = 'item.php';

// Comment callback functions
$modversion['comments']['callbackFile'] = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'smartsection_com_approve';
$modversion['comments']['callback']['update'] = 'smartsection_com_update';

// Notification
$modversion['hasNotification'] = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'smartsection_notify_iteminfo';

$modversion['notification']['category'][1]['name'] = 'global_item';
$modversion['notification']['category'][1]['title'] = _MI_SS_GLOBAL_ITEM_NOTIFY;
$modversion['notification']['category'][1]['description'] = _MI_SS_GLOBAL_ITEM_NOTIFY_DSC;
$modversion['notification']['category'][1]['subscribe_from'] = array('index.php', 'category.php', 'item.php');

$modversion['notification']['category'][2]['name'] = 'category_item';
$modversion['notification']['category'][2]['title'] = _MI_SS_CATEGORY_ITEM_NOTIFY;
$modversion['notification']['category'][2]['description'] = _MI_SS_CATEGORY_ITEM_NOTIFY_DSC;
$modversion['notification']['category'][2]['subscribe_from'] = array('index.php', 'category.php', 'item.php');
$modversion['notification']['category'][2]['item_name'] = 'categoryid';
$modversion['notification']['category'][2]['allow_bookmark'] = 1;

$modversion['notification']['category'][3]['name'] = 'item';
$modversion['notification']['category'][3]['title'] = _MI_SS_ITEM_NOTIFY;
$modversion['notification']['category'][3]['description'] = _MI_SS_ITEM_NOTIFY_DSC;
$modversion['notification']['category'][3]['subscribe_from'] = array('item.php');
$modversion['notification']['category'][3]['item_name'] = 'itemid';
$modversion['notification']['category'][3]['allow_bookmark'] = 1;

$modversion['notification']['event'][1]['name'] = 'category_created';
$modversion['notification']['event'][1]['category'] = 'global_item';
$modversion['notification']['event'][1]['title'] = _MI_SS_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY;
$modversion['notification']['event'][1]['caption'] = _MI_SS_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_CAP;
$modversion['notification']['event'][1]['description'] = _MI_SS_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_DSC;
$modversion['notification']['event'][1]['mail_template'] = 'global_item_category_created';
$modversion['notification']['event'][1]['mail_subject'] = _MI_SS_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_SBJ;

$modversion['notification']['event'][2]['name'] = 'submitted';
$modversion['notification']['event'][2]['category'] = 'global_item';
$modversion['notification']['event'][2]['admin_only'] = 1;
$modversion['notification']['event'][2]['title'] = _MI_SS_GLOBAL_ITEM_SUBMITTED_NOTIFY;
$modversion['notification']['event'][2]['caption'] = _MI_SS_GLOBAL_ITEM_SUBMITTED_NOTIFY_CAP;
$modversion['notification']['event'][2]['description'] = _MI_SS_GLOBAL_ITEM_SUBMITTED_NOTIFY_DSC;
$modversion['notification']['event'][2]['mail_template'] = 'global_item_submitted';
$modversion['notification']['event'][2]['mail_subject'] = _MI_SS_GLOBAL_ITEM_SUBMITTED_NOTIFY_SBJ;

$modversion['notification']['event'][3]['name'] = 'published';
$modversion['notification']['event'][3]['category'] = 'global_item';
$modversion['notification']['event'][3]['title'] = _MI_SS_GLOBAL_ITEM_PUBLISHED_NOTIFY;
$modversion['notification']['event'][3]['caption'] = _MI_SS_GLOBAL_ITEM_PUBLISHED_NOTIFY_CAP;
$modversion['notification']['event'][3]['description'] = _MI_SS_GLOBAL_ITEM_PUBLISHED_NOTIFY_DSC;
$modversion['notification']['event'][3]['mail_template'] = 'global_item_published';
$modversion['notification']['event'][3]['mail_subject'] = _MI_SS_GLOBAL_ITEM_PUBLISHED_NOTIFY_SBJ;

$modversion['notification']['event'][4]['name'] = 'submitted';
$modversion['notification']['event'][4]['category'] = 'category_item';
$modversion['notification']['event'][4]['admin_only'] = 1;
$modversion['notification']['event'][4]['title'] = _MI_SS_CATEGORY_ITEM_SUBMITTED_NOTIFY;
$modversion['notification']['event'][4]['caption'] = _MI_SS_CATEGORY_ITEM_SUBMITTED_NOTIFY_CAP;
$modversion['notification']['event'][4]['description'] = _MI_SS_CATEGORY_ITEM_SUBMITTED_NOTIFY_DSC;
$modversion['notification']['event'][4]['mail_template'] = 'category_item_submitted';
$modversion['notification']['event'][4]['mail_subject'] = _MI_SS_CATEGORY_ITEM_SUBMITTED_NOTIFY_SBJ;

$modversion['notification']['event'][5]['name'] = 'published';
$modversion['notification']['event'][5]['category'] = 'category_item';
$modversion['notification']['event'][5]['title'] = _MI_SS_CATEGORY_ITEM_PUBLISHED_NOTIFY;
$modversion['notification']['event'][5]['caption'] = _MI_SS_CATEGORY_ITEM_PUBLISHED_NOTIFY_CAP;
$modversion['notification']['event'][5]['description'] = _MI_SS_CATEGORY_ITEM_PUBLISHED_NOTIFY_DSC;
$modversion['notification']['event'][5]['mail_template'] = 'category_item_published';
$modversion['notification']['event'][5]['mail_subject'] = _MI_SS_CATEGORY_ITEM_PUBLISHED_NOTIFY_SBJ;

$modversion['notification']['event'][6]['name'] = 'rejected';
$modversion['notification']['event'][6]['category'] = 'item';
$modversion['notification']['event'][6]['invisible'] = 1;
$modversion['notification']['event'][6]['title'] = _MI_SS_ITEM_REJECTED_NOTIFY;
$modversion['notification']['event'][6]['caption'] = _MI_SS_ITEM_REJECTED_NOTIFY_CAP;
$modversion['notification']['event'][6]['description'] = _MI_SS_ITEM_REJECTED_NOTIFY_DSC;
$modversion['notification']['event'][6]['mail_template'] = 'item_rejected';
$modversion['notification']['event'][6]['mail_subject'] = _MI_SS_ITEM_REJECTED_NOTIFY_SBJ;

$modversion['notification']['event'][7]['name'] = 'approved';
$modversion['notification']['event'][7]['category'] = 'item';
$modversion['notification']['event'][7]['invisible'] = 1;
$modversion['notification']['event'][7]['title'] = _MI_SS_ITEM_APPROVED_NOTIFY;
$modversion['notification']['event'][7]['caption'] = _MI_SS_ITEM_APPROVED_NOTIFY_CAP;
$modversion['notification']['event'][7]['description'] = _MI_SS_ITEM_APPROVED_NOTIFY_DSC;
$modversion['notification']['event'][7]['mail_template'] = 'item_approved';
$modversion['notification']['event'][7]['mail_subject'] = _MI_SS_ITEM_APPROVED_NOTIFY_SBJ;

// On Update
if( ! empty( $_POST['fct'] ) && ! empty( $_POST['op'] ) && $_POST['fct'] == 'modulesadmin' && $_POST['op'] == 'update_ok' && $_POST['dirname'] == $modversion['dirname'] ) {
	include dirname( __FILE__ ) . "/include/onupdate.inc.php" ;
}
?>