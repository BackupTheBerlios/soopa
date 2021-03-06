<?php
if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

$mydirname = basename( dirname( __FILE__ ) ) ;
if( preg_match( '/^myalbum(\d*)$/' , $mydirname , $regs ) ) {
	$myalbum_number = $regs[1] ;
} else {
	echo "invalid dirname of myalbum: " . htmlspecialchars( $mydirname ) ;
}
$_SESSION['myalbum_mydirname'] = $mydirname ;

$modversion['name'] = _ALBM_MYALBUM_NAME . $myalbum_number ;
$modversion['version'] = 2.84 ;
$modversion['description'] = _ALBM_MYALBUM_DESC;
$modversion['author'] = "GIJ=CHECKMATE<br />PEAK Corp.(http://www.peak.ne.jp/)" ;
$modversion['credits'] = "Original: Daniel Branco<br />(http://bluetopia.homeip.net)<br />Kazumi Ono<br />(http://www.mywebaddons.com/)<br />The XOOPS Project" ;
$modversion['help'] = "" ;
$modversion['license'] = "GPL see LICENSE" ;
$modversion['official'] = 0;
$modversion['image'] = "images/{$mydirname}_slogo.gif" ;
$modversion['dirname'] = $mydirname ;

// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = "sql/{$mydirname}.sql";
//$modversion['sqlfile']['postgresql'] = "sql/pgsql.sql";

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = "{$mydirname}_cat";
$modversion['tables'][1] = "{$mydirname}_photos";
$modversion['tables'][2] = "{$mydirname}_text";
$modversion['tables'][3] = "{$mydirname}_votedata";

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// Blocks
$modversion['blocks'][1]['file'] = "myalbum_rphoto.php";
$modversion['blocks'][1]['name'] = _ALBM_BNAME_RANDOM . $myalbum_number ;
$modversion['blocks'][1]['description'] = "Shows a random photo";
$modversion['blocks'][1]['show_func'] = "b_myalbum_rphoto_show";
$modversion['blocks'][1]['edit_func'] = "b_myalbum_rphoto_edit";
$modversion['blocks'][1]['options'] = "$mydirname|140|1||1|60|1";
$modversion['blocks'][1]['template'] = "{$mydirname}_block_rphoto.html" ;

$modversion['blocks'][2]['file'] = "myalbum_topnews.php";
$modversion['blocks'][2]['name'] = _ALBM_BNAME_RECENT . $myalbum_number ;
$modversion['blocks'][2]['description'] = "Shows recently added photos";
$modversion['blocks'][2]['show_func'] = "b_myalbum_topnews_show";
$modversion['blocks'][2]['edit_func'] = "b_myalbum_topnews_edit";
$modversion['blocks'][2]['options'] = "$mydirname|10|20||1||1";
$modversion['blocks'][2]['template'] = "{$mydirname}_block_topnews.html" ;

$modversion['blocks'][3]['file'] = "myalbum_tophits.php";
$modversion['blocks'][3]['name'] = _ALBM_BNAME_HITS . $myalbum_number ;
$modversion['blocks'][3]['description'] = "Shows most viewed photos";
$modversion['blocks'][3]['show_func'] = "b_myalbum_tophits_show";
$modversion['blocks'][3]['edit_func'] = "b_myalbum_tophits_edit";
$modversion['blocks'][3]['options'] = "$mydirname|10|20||1||1";
$modversion['blocks'][3]['template'] = "{$mydirname}_block_tophits.html" ;

$modversion['blocks'][4]['file'] = "myalbum_topnews.php";
$modversion['blocks'][4]['name'] = _ALBM_BNAME_RECENT_P . $myalbum_number ;
$modversion['blocks'][4]['description'] = "Shows recently added photos";
$modversion['blocks'][4]['show_func'] = "b_myalbum_topnews_show";
$modversion['blocks'][4]['edit_func'] = "b_myalbum_topnews_edit";
$modversion['blocks'][4]['options'] = "$mydirname|5|20||1||1";
$modversion['blocks'][4]['template'] = "{$mydirname}_block_topnews_p.html" ;

$modversion['blocks'][5]['file'] = "myalbum_tophits.php";
$modversion['blocks'][5]['name'] = _ALBM_BNAME_HITS_P . $myalbum_number ;
$modversion['blocks'][5]['description'] = "Shows most viewed photos";
$modversion['blocks'][5]['show_func'] = "b_myalbum_tophits_show";
$modversion['blocks'][5]['edit_func'] = "b_myalbum_tophits_edit";
$modversion['blocks'][5]['options'] = "$mydirname|5|20||1||1";
$modversion['blocks'][5]['template'] = "{$mydirname}_block_tophits_p.html" ;


// Menu
global $xoopsDB , $xoopsUser , $myalbum_catonsubmenu , $myalbum_mid , $table_cat ;

$modversion['hasMain'] = 1 ;
$subcount = 1 ;
include( 'include/get_perms.php' ) ;
if( $global_perms & 1 ) {	// GPERM_INSERTABLE
	$modversion['sub'][$subcount]['name'] = _ALBM_TEXT_SMNAME1;
	$modversion['sub'][$subcount++]['url'] = "submit.php";
	$modversion['sub'][$subcount]['name'] = _ALBM_TEXT_SMNAME4;
	$modversion['sub'][$subcount++]['url'] = "viewcat.php?uid=-1";
}
$modversion['sub'][$subcount]['name'] = _ALBM_TEXT_SMNAME2;
$modversion['sub'][$subcount++]['url'] = "topten.php?hit=1";
if( $global_perms & 256 ) {	// GPERM_RATEVIEW
	$modversion['sub'][$subcount]['name'] = _ALBM_TEXT_SMNAME3;
	$modversion['sub'][$subcount++]['url'] = "topten.php?rate=1";
}
if( isset( $myalbum_catonsubmenu ) && $myalbum_catonsubmenu ) {
	$crs = $xoopsDB->query( "SELECT cid, title FROM $table_cat WHERE pid=0 ORDER BY title") ;
	if( $crs !== false ) {
		while( list( $cid , $title ) = $xoopsDB->fetchRow( $crs ) ) {
			$modversion['sub'][$subcount]['name'] = " - $title" ;
			$modversion['sub'][$subcount++]['url'] = "viewcat.php?cid=$cid" ;
		}
	}
}


// Config
$modversion['config'][] = array(
	'name'			=> 'myalbum_photospath' ,
	'title'			=> '_ALBM_CFG_PHOTOSPATH' ,
	'description'	=> '_ALBM_CFG_DESCPHOTOSPATH' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "/uploads/photos{$myalbum_number}" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_thumbspath' ,
	'title'			=> '_ALBM_CFG_THUMBSPATH' ,
	'description'	=> '_ALBM_CFG_DESCTHUMBSPATH' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "/uploads/thumbs{$myalbum_number}" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_imagingpipe' ,
	'title'			=> '_ALBM_CFG_IMAGINGPIPE' ,
	'description'	=> '_ALBM_CFG_DESCIMAGINGPIPE' ,
	'formtype'		=> 'select' ,
	'valuetype'		=> 'int' ,
	'default'		=> '0' ,
	'options'		=> array( 'GD' => 0 , 'ImageMagick' => 1 , 'NetPBM' => 2 )
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_forcegd2' ,
	'title'			=> '_ALBM_CFG_FORCEGD2' ,
	'description'	=> '_ALBM_CFG_DESCFORCEGD2' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> '0' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_imagickpath' ,
	'title'			=> '_ALBM_CFG_IMAGICKPATH' ,
	'description'	=> '_ALBM_CFG_DESCIMAGICKPATH' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> '' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_netpbmpath' ,
	'title'			=> '_ALBM_CFG_NETPBMPATH' ,
	'description'	=> '_ALBM_CFG_DESCNETPBMPATH' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> '' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_width' ,
	'title'			=> '_ALBM_CFG_WIDTH' ,
	'description'	=> '_ALBM_CFG_DESCWIDTH' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'int' ,
	'default'		=> '1024' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_height' ,
	'title'			=> '_ALBM_CFG_HEIGHT' ,
	'description'	=> '_ALBM_CFG_DESCHEIGHT' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'int' ,
	'default'		=> '1024' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_fsize' ,
	'title'			=> '_ALBM_CFG_FSIZE' ,
	'description'	=> '_ALBM_CFG_DESCFSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'int' ,
	'default'		=> '100000' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_middlepixel' ,
	'title'			=> '_ALBM_CFG_MIDDLEPIXEL' ,
	'description'	=> '_ALBM_CFG_DESCMIDDLEPIXEL' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> '480x480' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_allownoimage' ,
	'title'			=> '_ALBM_CFG_ALLOWNOIMAGE' ,
	'description'	=> '' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> '1' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_makethumb' ,
	'title'			=> '_ALBM_CFG_MAKETHUMB' ,
	'description'	=> '_ALBM_CFG_DESCMAKETHUMB' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> '0' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_thumbsize' ,
	'title'			=> '_ALBM_CFG_THUMBSIZE' ,
	'description'	=> '' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'int' ,
	'default'		=> '140' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_thumbrule' ,
	'title'			=> '_ALBM_CFG_THUMBRULE' ,
	'description'	=> '' ,
	'formtype'		=> 'select' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'w' ,
	'options'		=> array(
		'_ALBUM_OPT_CALCFROMWIDTH' => 'w' , '_ALBUM_OPT_CALCFROMHEIGHT' => 'h' , '_ALBUM_OPT_CALCWHINSIDEBOX' => 'b' )
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_popular' ,
	'title'			=> '_ALBM_CFG_POPULAR' ,
	'description'	=> '' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'int' ,
	'default'		=> '100' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_newdays' ,
	'title'			=> '_ALBM_CFG_NEWDAYS' ,
	'description'	=> '' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'int' ,
	'default'		=> '7' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_newphotos' ,
	'title'			=> '_ALBM_CFG_NEWPHOTOS' ,
	'description'	=> '' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'int' ,
	'default'		=> '10' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_defaultorder' ,
	'title'			=> '_ALBM_CFG_DEFAULTORDER' ,
	'description'	=> '' ,
	'formtype'		=> 'select' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'dateD' ,
	'options'		=> array(
		"photo_id ASC" => 'lidA' ,
		"title ASC" => 'titleA' ,
		"date ASC" => 'dateA' ,
		"hits ASC" => 'hitsA' ,
		"rating ASC" => 'ratingA' ,
		"photo_id DESC" => 'lidD' ,
		"title DESC" => 'titleD' ,
		"date DESC" => 'dateD' ,
		"hits DESC" => 'hitsD' ,
		"rating DESC" => 'ratingD'
		)
	) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_perpage' ,
	'title'			=> '_ALBM_CFG_PERPAGE' ,
	'description'	=> '_ALBM_CFG_DESCPERPAGE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> '10|20|50|100' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_addposts' ,
	'title'			=> '_ALBM_CFG_ADDPOSTS' ,
	'description'	=> '_ALBM_CFG_DESCADDPOSTS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'int' ,
	'default'		=> '1' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_catonsubmenu' ,
	'title'			=> '_ALBM_CFG_CATONSUBMENU' ,
	'description'	=> '' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> '0' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_nameoruname' ,
	'title'			=> '_ALBM_CFG_NAMEORUNAME' ,
	'description'	=> '_ALBM_CFG_DESCNAMEORUNAME' ,
	'formtype'		=> 'select' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'uname' ,
	'options'		=> array('_ALBM_OPT_USENAME'=>'name','_ALBM_OPT_USEUNAME'=>'uname')
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_viewcattype' ,
	'title'			=> '_ALBM_CFG_VIEWCATTYPE' ,
	'description'	=> '' ,
	'formtype'		=> 'select' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'list' ,
	'options'		=> array('_ALBM_OPT_VIEWLIST'=>'list','_ALBM_OPT_VIEWTABLE'=>'table')
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_colsoftableview' ,
	'title'			=> '_ALBM_CFG_COLSOFTABLEVIEW' ,
	'description'	=> '' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'int' ,
	'default'		=> '4' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_allowedexts' ,
	'title'			=> '_ALBM_CFG_ALLOWEDEXTS' ,
	'description'	=> '_ALBM_CFG_DESCALLOWEDEXTS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'jpg|jpeg|gif|png' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_allowedmime' ,
	'title'			=> '_ALBM_CFG_ALLOWEDMIME' ,
	'description'	=> '_ALBM_CFG_DESCALLOWEDMIME' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'image/gif|image/pjpeg|image/jpeg|image/x-png|image/png' ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'myalbum_usesiteimg' ,
	'title'			=> '_ALBM_CFG_USESITEIMG' ,
	'description'	=> '_ALBM_CFG_DESCUSESITEIMG' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> '0' ,
	'options'		=> array()
) ;

// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "{$mydirname}_search";

// Comments
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = 'lid';
$modversion['comments']['pageName'] = 'photo.php';
// Comment callback functions
$modversion['comments']['callbackFile'] = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'myalbum_comments_approve';
$modversion['comments']['callback']['update'] = 'myalbum_comments_update';

// Templates
$modversion['templates'][1]['file'] = "{$mydirname}_photo.html" ;
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = "{$mydirname}_viewcat_list.html" ;
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = "{$mydirname}_viewcat_table.html" ;
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = "{$mydirname}_index.html" ;
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file'] = "{$mydirname}_ratephoto.html" ;
$modversion['templates'][5]['description'] = '';
$modversion['templates'][6]['file'] = "{$mydirname}_topten.html" ;
$modversion['templates'][6]['description'] = '';
$modversion['templates'][7]['file'] = "{$mydirname}_photo_in_list.html" ;
$modversion['templates'][7]['description'] = '';
$modversion['templates'][8]['file'] = "{$mydirname}_header.html" ;
$modversion['templates'][8]['description'] = '';
$modversion['templates'][9]['file'] = "{$mydirname}_footer.html" ;
$modversion['templates'][9]['description'] = '';
$modversion['templates'][10]['file'] = "{$mydirname}_categories.html" ;
$modversion['templates'][10]['description'] = '';
$modversion['templates'][11]['file'] = "{$mydirname}_imagemanager.html" ;
$modversion['templates'][11]['description'] = '';

//Install
$modversion['onInstall'] = "include/oninstall.inc.php";

// Notification
$modversion['hasNotification'] = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php' ;
$modversion['notification']['lookup_func'] = "{$mydirname}_notify_iteminfo" ;

$modversion['notification']['category'][1]['name'] = 'global';
$modversion['notification']['category'][1]['title'] = _MI_MYALBUM_GLOBAL_NOTIFY;
$modversion['notification']['category'][1]['description'] = _MI_MYALBUM_GLOBAL_NOTIFYDSC;
$modversion['notification']['category'][1]['subscribe_from'] = array('index.php','viewcat.php','photo.php');
$modversion['notification']['category'][2]['name'] = 'category';
$modversion['notification']['category'][2]['title'] = _MI_MYALBUM_CATEGORY_NOTIFY;
$modversion['notification']['category'][2]['description'] = _MI_MYALBUM_CATEGORY_NOTIFYDSC;
$modversion['notification']['category'][2]['subscribe_from'] = array('viewcat.php','photo.php');
$modversion['notification']['category'][2]['item_name'] = 'cid';
$modversion['notification']['category'][2]['allow_bookmark'] = 1;

$modversion['notification']['category'][3]['name'] = 'photo';
$modversion['notification']['category'][3]['title'] = _MI_MYALBUM_PHOTO_NOTIFY;
$modversion['notification']['category'][3]['description'] = _MI_MYALBUM_PHOTO_NOTIFYDSC;
$modversion['notification']['category'][3]['subscribe_from'] = array('photo.php');
$modversion['notification']['category'][3]['item_name'] = 'lid';
$modversion['notification']['category'][3]['allow_bookmark'] = 1;

$modversion['notification']['event'][1]['name'] = 'new_photo';
$modversion['notification']['event'][1]['category'] = 'global';
$modversion['notification']['event'][1]['title'] = _MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY;
$modversion['notification']['event'][1]['caption'] = _MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP;
$modversion['notification']['event'][1]['description'] = _MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC;
$modversion['notification']['event'][1]['mail_template'] = 'global_newphoto_notify';
$modversion['notification']['event'][1]['mail_subject'] = _MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ;

$modversion['notification']['event'][2]['name'] = 'new_photo';
$modversion['notification']['event'][2]['category'] = 'category';
$modversion['notification']['event'][2]['title'] = _MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY;
$modversion['notification']['event'][2]['caption'] = _MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP;
$modversion['notification']['event'][2]['description'] = _MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC;
$modversion['notification']['event'][2]['mail_template'] = 'category_newphoto_notify';
$modversion['notification']['event'][2]['mail_subject'] = _MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ;

?>