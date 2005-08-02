<?php

/**
* $Id: category.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("admin_header.php");

global $smartsection_category_handler;

$op = '';

if (isset($_GET['op'])) $op = $_GET['op'];
if (isset($_POST['op'])) $op = $_POST['op'];

// Where do we start ?
$startcategory = isset($_GET['startcategory']) ? intval($_GET['startcategory']) : 0;

function displayCategory($categoryObj, $level = 0)
{
	Global $xoopsModule, $smartsection_category_handler;
	$description = $categoryObj->description();
	if (!XOOPS_USE_MULTIBYTES) {
		if (strlen($description) >= 100) {
			$description = substr($description, 0, (100 -1)) . "...";
		}
	}
	$modify = "<a href='category.php?op=mod&categoryid=" . $categoryObj->categoryid() ."&parentid=".$categoryObj->parentid(). "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/edit.gif' title='" . _AM_SS_EDITCOL . "' alt='" . _AM_SS_EDITCOL . "' /></a>";
	$delete = "<a href='category.php?op=del&categoryid=" . $categoryObj->categoryid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/delete.gif' title='" . _AM_SS_DELETECOL . "' alt='" . _AM_SS_DELETECOL . "' /></a>";
	
	$spaces = '';
	for ( $j = 0; $j < $level; $j++ ) {
		$spaces .= '&nbsp;&nbsp;&nbsp;';	
	}
	
	echo "<tr>";
	echo "<td class='even' align='lefet'>" . $spaces . "<a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/category.php?categoryid=" . $categoryObj->categoryid() . "'><img src='" . XOOPS_URL . "/modules/smartsection/images/icon/subcat.gif' alt='' />&nbsp;" . $categoryObj->name() . "</a></td>";
	echo "<td class='even' align='left'>" . $description . "</td>";
	echo "<td class='even' align='center'>" . $categoryObj->weight() . "</td>";
	echo "<td class='even' align='center'> $modify $delete </td>";
	echo "</tr>";
	$subCategoriesObj = $smartsection_category_handler->getCategories(0, 0, $categoryObj->categoryid());
	if (count($subCategoriesObj) > 0) {
		$level++;
		foreach ( $subCategoriesObj as $key => $thiscat ) {
			displayCategory($thiscat, $level);
		}	
	}
	unset($categoryObj);
}

function editcat($showmenu = false, $categoryid = 0, $nb_subcats=4, $categoryObj=null)
{
	Global $xoopsDB, $smartsection_category_handler, $xoopsUser, $myts, $xoopsConfig, $xoopsModuleConfig, $xoopsModule;
	include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
	
	// If there is a parameter, and the id exists, retrieve data: we're editing a category
	if ($categoryid != 0) {
		
		// Creating the category object for the selected category
		$categoryObj = new ssCategory($categoryid);
		
		if ($showmenu) {
			ss_adminMenu(1, _AM_SS_CATEGORIES . " > " . _AM_SS_EDITING);
		}
		echo "<br />\n";
		if ($categoryObj->notLoaded()) {
			redirect_header("category.php", 1, _AM_SS_NOCOLTOEDIT);
			exit();
		}
		ss_collapsableBar('edittable', 'edittableicon', _AM_SS_EDITCOL, _AM_SS_CATEGORY_EDIT_INFO);
	} else {
		
		 if (!$categoryObj) { 
            $categoryObj = $smartsection_category_handler->create();
          }
	
		if ($showmenu) {
			ss_adminMenu(1, _AM_SS_CATEGORIES . " > " . _AM_SS_CREATINGNEW);
		}
		
		//echo "<br />\n";
		ss_collapsableBar('createtable', 'createtableicon', _AM_SS_CATEGORY_CREATE, _AM_SS_CATEGORY_CREATE_INFO);
	}
	// Start category form
	$mytree = new XoopsTree( $xoopsDB -> prefix( "smartsection_categories" ), "categoryid", "parentid" );
	$sform = new XoopsThemeForm(_AM_SS_CATEGORY, "op", xoops_getenv('PHP_SELF'));
	$sform->setExtra('enctype="multipart/form-data"');
	
	// Name
	$sform->addElement(new XoopsFormText(_AM_SS_CATEGORY, 'name', 50, 255, $categoryObj->name('e')), true);

	// Decsription
	$sform->addElement(new XoopsFormTextArea(_AM_SS_COLDESCRIPT, 'description', $categoryObj->description('e'), 7, 60));
	
	/*
	// IMAGE
	$image_array = & XoopsLists :: getImgListAsArray( ss_getImageDir('category') );
	$image_select = new XoopsFormSelect( '', 'image', $categoryObj->image() );
	$image_select -> addOption ('-1', '---------------');
	$image_select -> addOptionArray( $image_array );
	$image_select -> setExtra( "onchange='showImgSelected(\"image3\", \"image\", \"" . 'uploads/smartsection/images/category/' . "\", \"\", \"" . XOOPS_URL . "\")'" );
	$image_tray = new XoopsFormElementTray( _AM_SS_IMAGE, '&nbsp;' );
	$image_tray -> addElement( $image_select );
	$image_tray -> addElement( new XoopsFormLabel( '', "<br /><br /><img src='" . ss_getImageDir('category', false) .$categoryObj->image() . "' name='image3' id='image3' alt='' />" ) );
	$image_tray->setDescription(_AM_SS_IMAGE_DSC);
	$sform -> addElement( $image_tray );
	
	// IMAGE UPLOAD
	$max_size = 5000000;
	$file_box = new XoopsFormFile(_AM_SS_IMAGE_UPLOAD, "image_file", $max_size);
	$file_box->setExtra( "size ='45'") ;
	$file_box->setDescription(_AM_SS_IMAGE_UPLOAD_DSC);
	$sform->addElement($file_box);
	*/
	// Weight
	$sform->addElement(new XoopsFormText(_AM_SS_COLPOSIT, 'weight', 4, 4, $categoryObj->weight()));
	
	// READ PERMISSIONS
	$member_handler = &xoops_gethandler('member');
	$group_list = &$member_handler->getGroupList();
	
	$groups_read_checkbox = new XoopsFormCheckBox(_AM_SS_PERMISSIONS_CAT_READ, 'groups_read[]', $categoryObj->getGroups_read());
	foreach ($group_list as $group_id => $group_name) {
		if ($group_id != XOOPS_GROUP_ADMIN) {
			$groups_read_checkbox->addOption($group_id, $group_name);
		}
	}
	$sform->addElement($groups_read_checkbox);
	// Apply permissions on all items
	$apply = isset($_POST['applyall']) ? intval($_POST['applyall']) : 0 ;
	
	$addapplyall_radio = new XoopsFormRadioYN(_AM_SS_PERMISSIONS_APPLY_ON_ITEMS, 'applyall', $apply, ' ' . _AM_SS_YES . '', ' ' . _AM_SS_NO . '');
	$sform->addElement($addapplyall_radio);
	// MODERATORS
	//$moderators_tray = new XoopsFormElementTray(_AM_SS_MODERATORS_DEF, '');
	
	$module_id = $xoopsModule->getVar('mid');
	
	
		// Parent Category
	ob_start();
		$mytree -> makeMySelBox( "name", "weight", $categoryObj->parentid(), 1, 'parentid' );
	//makeMySelBox($title,$order="",$preset_id=0, $none=0, $sel_name="", $onchange="")
	$sform -> addElement( new XoopsFormLabel( _AM_SS_PARENT_CATEGORY_EXP, ob_get_contents() ) );
	ob_end_clean();
	
	// Added by fx2024
	// sub Categories
	
	$cat_tray = new XoopsFormElementTray(_AM_SS_SCATEGORYNAME, '<br /><br />');
	for( $i=0; $i<$nb_subcats; $i++){
		if ($i<(isset($_POST['scname']) ? sizeof($_POST['scname']) : 0 )){
			 $subname = isset($_POST['scname']) ? $_POST['scname'][$i] : '' ;
		}
		else{
			$subname = '';
		}
		$cat_tray->addElement(new XoopsFormText('' , 'scname['.$i.']', 50, 255,$subname), true);
	
	}
		
	$t = new XoopsFormText('', 'nb_subcats', 3, 2);
	$l = new XoopsFormLabel('', sprintf(_AM_SS_ADD_OPT, $t->render()));
	$b = new XoopsFormButton('', 'submit', _AM_SS_ADD_OPT_SUBMIT, 'submit');
	if ($categoryid==0){
	$b->setExtra('onclick="this.form.elements.op.value=\'addsubcats\'"');
	}
	else{
	$b->setExtra('onclick="this.form.elements.op.value=\'mod\'"');
	}
	$r = new XoopsFormElementTray('');
	$r->addElement($l);
	$r->addElement($b);
	$cat_tray->addElement($r);
	
	$sform->addElement($cat_tray);
	//End of fx2024 code
	
	
	/*$gperm_handler = &xoops_gethandler('groupperm');
	$mod_perms = $gperm_handler->getGroupIds('category_moderation', $categoryid, $module_id);
	
	$moderators_select = new XoopsFormSelect('', 'moderators', $moderators, 5, true);
	$moderators_tray->addElement($moderators_select);
	
	$butt_mngmods = new XoopsFormButton('', '', 'Manage mods', 'button');
	$butt_mngmods->setExtra('onclick="javascript:small_window(\'pop.php\', 370, 350);"');
	$moderators_tray->addElement($butt_mngmods);
	
	$butt_delmod = new XoopsFormButton('', '', 'Delete mod', 'button');
	$butt_delmod->setExtra('onclick="javascript:deleteSelectedItemsFromList(this.form.elements[\'moderators[]\']);"');
	$moderators_tray->addElement($butt_delmod);
	
	$sform->addElement($moderators_tray);
	*/
	$sform -> addElement( new XoopsFormHidden( 'categoryid', $categoryid ) );
	
	
	//$parentid = $categoryObj->parentid('s');
	
	//$sform -> addElement( new XoopsFormHidden( 'parentid', $parentid ) );
	
	$sform -> addElement( new XoopsFormHidden( 'nb_sub_yet', $nb_subcats ) );
	
	
	
	// Action buttons tray
	$button_tray = new XoopsFormElementTray('', '');
	
	/*for ($i = 0; $i < sizeof($moderators); $i++) {
	$allmods[] = $moderators[$i];
	}
	
	$hiddenmods = new XoopsFormHidden('allmods', $allmods);
	$button_tray->addElement($hiddenmods);
	*/
	$hidden = new XoopsFormHidden('op', 'addcategory');
	$button_tray->addElement($hidden);
	
	// No ID for category -- then it's new category, button says 'Create'
	if (!$categoryid) {
		$butt_create = new XoopsFormButton('', '', _AM_SS_CREATE, 'submit');
		$butt_create->setExtra('onclick="this.form.elements.op.value=\'addcategory\'"');
		$button_tray->addElement($butt_create);
		
		$butt_clear = new XoopsFormButton('', '', _AM_SS_CLEAR, 'reset');
		$button_tray->addElement($butt_clear);
		
		$butt_cancel = new XoopsFormButton('', '', _AM_SS_CANCEL, 'button');
		$butt_cancel->setExtra('onclick="history.go(-1)"');
		$button_tray->addElement($butt_cancel);
		
		$sform->addElement($button_tray);
		$sform->display();		
		ss_close_collapsable('createtable', 'createtableicon');
	} else {
		// button says 'Update'
		$butt_create = new XoopsFormButton('', '', _AM_SS_MODIFY, 'submit');
		$butt_create->setExtra('onclick="this.form.elements.op.value=\'addcategory\'"');
		$button_tray->addElement($butt_create);
		
		$butt_cancel = new XoopsFormButton('', '', _AM_SS_CANCEL, 'button');
		$butt_cancel->setExtra('onclick="history.go(-1)"');
		$button_tray->addElement($butt_cancel);

		$sform->addElement($button_tray);
		$sform->display();			
		ss_close_collapsable('edittable', 'edittableicon');
	}
	
	//Added by fx2024
	if ($categoryid) {
		include_once XOOPS_ROOT_PATH . "/modules/smartsection/include/displaysubcats.php";
		include_once XOOPS_ROOT_PATH . "/modules/smartsection/include/displayitems.php";
	}
	//end of fx2024 code
	
	unset($hidden);
}

switch ($op) {
	case "mod":
	
	$categoryid = isset($_GET['categoryid']) ? intval($_GET['categoryid']) : 0 ;
	
	//Added by fx2024

	$nb_subcats = isset($_POST['nb_subcats']) ? intval($_POST['nb_subcats']) : 0;
	$nb_subcats = $nb_subcats + (isset($_POST['nb_sub_yet']) ? intval($_POST['nb_sub_yet']) : 4);
		if($categoryid ==0){
		$categoryid = isset($_POST['categoryid']) ? intval($_POST['categoryid']) : 0 ;
	}
	//end of fx2024 code
	
	ss_xoops_cp_header();
		
	editcat(true, $categoryid,$nb_subcats);
	break;
	
	case "addcategory":
	global $_POST, $xoopsUser, $xoopsUser, $xoopsConfig, $xoopsDB, $xoopsModule, $xoopsModuleConfig, $modify, $myts, $categoryid;
	
	$categoryid = (isset($_POST['categoryid'])) ? intval($_POST['categoryid']) : 0;
	$parentid =(isset($_POST['parentid'])) ? intval($_POST['parentid']) : 0;
	
	If ($categoryid != 0) {
		$categoryObj = new ssCategory($categoryid);
	} else {
		$categoryObj = $smartsection_category_handler->create();
	}
	
	// Uploading the image, if any
	// Retreive the filename to be uploaded
	if (isset ($_FILES['image_file']['name']) && $_FILES['image_file']['name'] != "" ) {
		$filename = $_POST["xoops_upload_file"][0] ;
		if( !empty( $filename ) || $filename != "" ) {
			global $xoopsModuleConfig;
			
			$max_size = 10000000;
			$max_imgwidth = 800;
			$max_imgheight = 800;
			$allowed_mimetypes = ss_getAllowedImagesTypes();
			
			include_once(XOOPS_ROOT_PATH."/class/uploader.php");
			
			if( $_FILES[$filename]['tmp_name'] == "" || ! is_readable( $_FILES[$filename]['tmp_name'] ) ) {
				redirect_header( 'javascript:history.go(-1)' , 2, _AM_SS_FILEUPLOAD_ERROR ) ;
				exit ;
			}
			
			$uploader = new XoopsMediaUploader(ss_getImageDir('category'), $allowed_mimetypes, $max_size, $max_imgwidth, $max_imgheight);
			
			if( $uploader->fetchMedia( $filename ) && $uploader->upload() ) {
				
				$categoryObj->setVar('image', $uploader->getSavedFileName());
				
			} else {
				redirect_header( 'javascript:history.go(-1)' , 2, _AM_SS_FILEUPLOAD_ERROR . $uploader->getErrors() ) ;
				exit ;
			}
		}
	} else {
		if (isset($_POST['image'])){
			$categoryObj->setVar('image', $_POST['image']);
		}
	}
	$categoryObj->setVar('parentid', (isset($_POST['parentid'])) ? intval($_POST['parentid']) : 0);

	$applyall = (isset($_POST['applyall'])) ? intval($_POST['applyall']) : 0;
	$categoryObj->setVar('weight', (isset($_POST['weight'])) ? intval($_POST['weight']) : 1);
	
	// Groups and permissions
	if(isset($_POST['groups_read'])){
		$categoryObj->setGroups_read($_POST['groups_read']);
	}
	else{
		$categoryObj->setGroups_read();
	}
	$grpread = (isset($_POST['groups_read']) ? $_POST['groups_read'] : array());
	
	$categoryObj->setVar('name', $_POST['name']);
	
	$categoryObj->setVar('description', $_POST['description']);

	if ($categoryObj->isNew()) {
		$redirect_msg = _AM_SS_CATCREATED;
		$redirect_to = 'category.php?op=mod';
	} else {
		$redirect_msg = _AM_SS_COLMODIFIED;
		$redirect_to = 'category.php';
	}
	
	If ( !$categoryObj->store() ) {
		redirect_header("javascript:history.go(-1)", 3, _AM_SS_CATEGORY_SAVE_ERROR . ss_formatErrors($categoryObj->getErrors()));
		exit;
	}
	// TODO : put this function in the category class
	ss_saveCategory_Permissions($categoryObj->getGroups_read(), $categoryObj->categoryid(), 'category_read');
	//ss_saveCategory_Permissions($groups_admin, $categoriesObj->categoryid(), 'category_admin');
	
	
	if ($applyall) {
		// TODO : put this function in the category class
		ss_overrideItemsPermissions($categoryObj->getGroups_read(), $categoryObj->categoryid());
	}
//Added by fx2024
	$parentCat = $categoryObj->categoryid();
	
	for($i=0;$i<sizeof($_POST['scname']);$i++) {
		
		if($_POST['scname'][$i]!=''){
		$categoryObj = $smartsection_category_handler->create();
		$categoryObj->setVar('name', $_POST['scname'][$i]);
		$categoryObj->setVar('parentid', $parentCat);
		$categoryObj->setGroups_read($grpread);
			
			If ( !$categoryObj->store() ) {
				redirect_header("javascript:history.go(-1)", 3, _AM_SS_SUBCATEGORY_SAVE_ERROR . ss_formatErrors($categoryObj->getErrors()));
				exit;
			}
			// TODO : put this function in the category class
			ss_saveCategory_Permissions($categoryObj->getGroups_read(), $categoryObj->categoryid(), 'category_read');
			//ss_saveCategory_Permissions($groups_admin, $categoriesObj->categoryid(), 'category_admin');


			if ($applyall) {
				// TODO : put this function in the category class
				ss_overrideItemsPermissions($categoryObj->getGroups_read(), $categoryObj->categoryid());
			}

		}
	}

//end of fx2024 code	
	redirect_header($redirect_to, 2, $redirect_msg);
	
	exit();
	break;
	
//Added by fx2024	
	
	 case "addsubcats":
	 
     $categoryid = 0; 
     $nb_subcats = intval($_POST['nb_subcats'])+ $_POST['nb_sub_yet'];   
    
     ss_xoops_cp_header(); 
     
	 $categoryObj =& $smartsection_category_handler->create();
	 $categoryObj->setVar('name', $_POST['name']);
	 $categoryObj->setVar('description', $_POST['description']);
	 $categoryObj->setVar('weight', $_POST['weight']);
	 $categoryObj->setGroups_read(isset($_POST['groups_read']) ? $_POST['groups_read'] : array());		
	 if (isset($parentCat)){ 
	 	$categoryObj->setVar('parentid', $parentCat);
	 }
	
	 
	 editcat(true, $categoryid, $nb_subcats, $categoryObj);
	 exit();		
                     
     break;
//end of fx2024 code


	case "del":
	global $xoopsUser, $xoopsUser, $xoopsConfig, $xoopsDB, $_GET;
	
	$module_id = $xoopsModule->getVar('mid');
	$gperm_handler = &xoops_gethandler('groupperm');
	
	$categoryid = (isset($_POST['categoryid'])) ? intval($_POST['categoryid']) : 0;
	$categoryid = (isset($_GET['categoryid'])) ? intval($_GET['categoryid']) : $categoryid;
	
	$categoryObj = new ssCategory($categoryid);
	
	$confirm = (isset($_POST['confirm'])) ? $_POST['confirm'] : 0;
	$name = (isset($_POST['name'])) ? $_POST['name'] : '';
	
	if ($confirm) {
		If ( !$smartsection_category_handler->delete($categoryObj)) {
			redirect_header("category.php", 1, _AM_SS_DELETE_CAT_ERROR);
			exit;
		}
		
		redirect_header("category.php", 1, sprintf(_AM_SS_COLISDELETED, $name));
		exit();
	} else {
		// no confirm: show deletion condition
		$categoryid = (isset($_GET['categoryid'])) ? intval($_GET['categoryid']) : 0;
		xoops_cp_header();
		xoops_confirm(array('op' => 'del', 'categoryid' => $categoryObj->categoryid(), 'confirm' => 1, 'name' => $categoryObj->name()), 'category.php', _AM_SS_DELETECOL . " '" . $categoryObj->name() . "'. <br /> <br />" . _AM_SS_DELETE_CAT_CONFIRM, _AM_SS_DELETE);
		xoops_cp_footer();
	}
	exit();
	break;
	
	case "cancel":
	redirect_header("category.php", 1, sprintf(_AM_SS_BACK2IDX, ''));
	exit();
	
	case "default":
	default:
	
	ss_xoops_cp_header();		
	
	ss_adminMenu(1, _AM_SS_CATEGORIES);
	
	echo "<br />\n";
	echo "<form><div style=\"margin-bottom: 12px;\">";
	echo "<input type='button' name='button' onclick=\"location='category.php?op=mod'\" value='" . _AM_SS_CATEGORY_CREATE . "'>&nbsp;&nbsp;";
	//echo "<input type='button' name='button' onclick=\"location='item.php?op=mod'\" value='" . _AM_SS_CREATEITEM . "'>&nbsp;&nbsp;";
	echo "</div></form>";

	// Creating the objects for top categories
	$categoriesObj = $smartsection_category_handler->getCategories($xoopsModuleConfig['perpage'], $startcategory, 0);
	
	ss_collapsableBar('createdcategories', 'createdcategoriesicon', _AM_SS_CATEGORIES_TITLE, _AM_SS_CATEGORIES_DSC);
	
	echo "<table width='100%' cellspacing=1 cellpadding=3 border=0 class = outer>";
	echo "<tr>";
	echo "<td width='35%' class='bg3' align='left'><b>" . _AM_SS_ITEMCATEGORYNAME . "</b></td>";
	echo "<td class='bg3' align='left'><b>" . _AM_SS_DESCRIP . "</b></td>";
	echo "<td class='bg3' width='65' align='center'><b>" . _AM_SS_WEIGHT . "</b></td>";
	echo "<td width='60' class='bg3' align='center'><b>" . _AM_SS_ACTION . "</b></td>";
	echo "</tr>";
	$totalCategories = $smartsection_category_handler->getCategoriesCount(0);
	if (count($categoriesObj) > 0) {
		foreach ( $categoriesObj as $key => $thiscat) {
			displayCategory($thiscat);
		}
	} else {
		echo "<tr>";
		echo "<td class='head' align='center' colspan= '7'>" . _AM_SS_NOCAT . "</td>";
		echo "</tr>";
		$categoryid = '0';
	}
	echo "</table>\n";
	include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
	$pagenav = new XoopsPageNav($totalCategories, $xoopsModuleConfig['perpage'], $startcategory, 'startcategory');
	echo '<div style="text-align:right;">' . $pagenav->renderNav() . '</div>';
	echo "<br />";
	ss_close_collapsable('createdcategories', 'createdcategoriesicon');
	echo "<br>";
	//editcat(false);
	break;
}

$modfooter = ss_modFooter();
echo "<div align='center'>" . $modfooter . "</div>";
xoops_cp_footer();

?>