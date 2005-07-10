<?php
//  ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System				//
//                    Copyright (c) 2004 XOOPS.org					//
//                       <http://www.xoops.org/>					//
//													//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)			//
//                                 	- herve (www.herve-thouzard.com)		//
//                  multiMenu v1.7							//
//  ------------------------------------------------------------------------	//

	global $xoopsDB, $xoopsUser, $xoopsConfig, $xoopsModule; 
	$myts =& MyTextSanitizer::getInstance();
	$group = is_object($xoopsUser) ? $xoopsUser->getGroups() : array(XOOPS_GROUP_ANONYMOUS);
	$mainid = '';
    	$block = array();

// Check user agent. If Spider, display list
if (
(eregi("bot", getenv("HTTP_USER_AGENT"))) || 
(eregi("Google", getenv("HTTP_USER_AGENT"))) || 
(eregi("Slurp", getenv("HTTP_USER_AGENT"))) || 
(eregi("Scooter", getenv("HTTP_USER_AGENT"))) || 
(eregi("Spider", getenv("HTTP_USER_AGENT"))) || 
(eregi("Infoseek", getenv("HTTP_USER_AGENT")))) 
	{
	$block['format'] = "ul";
	} else {
	$block['format'] = $options[0];
	}

// General options regarding block type
	$width = '';
	$block['marquee'] = '';
	$block['columns'] = $options[2];
	$block['block_size'] = $options[8];
	$block['marquee_height'] = $options[9];
	$block['marquee_delay'] = $options[10];

if 	($options[1] != "all" ) {$where = "hide = 1 AND submenu = ".$options[1]."";} else {$where = "hide = 1";}
if 	($options[0] == "scrollist") {$block['marquee'] = 'behavior="scroll" direction="up"'; $block['format'] = "ul";} 
if 	($options[0] == "slidelist") {$block['marquee'] = 'behavior="slide" direction="up"'; $block['format'] = "ul";} 
if 	($options[0] == "picscroll" ) {$block['marquee'] = 'behavior="scroll" direction="up"';} 

if ($options[0] == 'menu' 
 OR $options[0] == 'ul' 
 OR $options[0] == 'ol' 
 OR $options[0] == 'scrollist'
 OR $options[0] == 'slidelist' )
{$align = 'align="absmiddle" ';} else { $align= ''; }

// Random function and list count
if ($options[0] != "droplist" or $options[0] != "selectlist") { 
	$randresult = $xoopsDB -> queryF( "	SELECT COUNT(*) 
							FROM " .$xoopsDB->prefix("multimenu").$options[13]." 
							WHERE $where");
	list( $total )=$xoopsDB->fetchRow($randresult);}

if 	($options[11]) { 
	$randlimit = $options[12];
	$total = $total-1-$randlimit;
	$block['columns_limit'] = "";
	$rand  = rand(0,$total);
	} else {
	$rand  = "";
	$block['columns_limit'] = $total/$options[2];
	$randlimit = "";
	}

// SQL
    	$sql = 	"SELECT id, pid, groups, link, submenu, title, target, imageurl, weight
			FROM ".$xoopsDB->prefix('multimenu').$options[13]." 
			WHERE $where
			ORDER BY ".$options[3];

	$result = $xoopsDB->queryF($sql ,$randlimit ,$rand);

	while ( $myrow = $xoopsDB->fetchArray($result) ) {

// Group access
	$groups = explode(" ",$myrow['groups']);
	if (count(array_intersect($group,$groups)) > 0) {

    $imenu['submenu'] = $myrow['submenu']; 

// Link title
if ( $options[4] == 1 ) {
	if (strlen($myrow['title']) >= $options[5]) {
		$title = $myts->makeTboxData4Show(substr($myrow['title'],0,($options[5]-1)))."...";
	} else {
		$title = $myts->makeTareaData4Show($myrow['title']);
	}
$imenu['title'] = $title;
	} else {
$imenu['title'] = "";
}

$alt_title = $myts->makeTareaData4Show(strip_tags($myrow['title']));


// Link url
if ($myrow['link']) {

// Link Type
	if (	(eregi("mailto:", $myrow['link'])) || 
		(eregi("http://", $myrow['link'])) || 
		(eregi("https://", $myrow['link'])) || 
		(eregi("ftp://", $myrow['link'])))
 		{
		$link = $myrow['link'];
		} else {
		$link = XOOPS_URL."/".$myrow['link'];
		}

// Sub link Display
$imenu['showsub'] = 0;
	if ( !empty($xoopsModule) 
		&& eregi( "/".$xoopsModule->getVar('dirname')."/", $link) 
		&& ( $myrow['submenu'] < 1 || $myrow['submenu'] > 2 )
	   ) 	{ 
	$mainid = $myrow['id']; 
		}

// Test 1 : link is sub of an active module with same directory
// if ( !empty($xoopsModule) && eregi("/".$xoopsModule->getVar('dirname')."/", $link) || // $myrow['submenu'] == 1) {
//  $imenu['showsub'] = 1;
//  }

// Test : link is sub of a main link
if ( 	!empty($xoopsModule) 
	&& $myrow['pid'] == $mainid 
//	&& eregi( "/".$xoopsModule->getVar('dirname')."/", $link)
	&& ( $myrow['submenu'] == 1 || $myrow['submenu'] == 2 )
    ) {
  $imenu['showsub'] = 1;
  }

// Target function
if ($myrow['target'] != '_self') { $target = 'target="'.$myrow['target'].'" '; } else { $target = ''; }
	$imenu['target'] = $target;

// Create link
	$imenu['link'] = '<a href="'.$link.'" '.$target.'" title="'.$alt_title.'">';
	$imenu['linkurl'] = $link;
} else {
	$imenu['link'] = '';
	$imenu['linkurl'] = '';
}



// Create image
if( $myrow['imageurl'] AND $options[6] ){

// Image type : relative or absolute link
	if (
		eregi("http://", $myrow['imageurl']) || 
		eregi("https://", $myrow['imageurl']) )
 	{
		$image = $myrow['imageurl'];
	} else {
		$image = XOOPS_URL.'/'.$myrow['imageurl'];
	}

// Theme and modle tag replace 
		$image = str_replace('{theme}', $xoopsConfig['theme_set'], $image);

if ( !empty($xoopsModule) ) { $image = str_replace('{module}', $xoopsModule->getVar('dirname'), $image); } else { $image = str_replace('{module}', 'default', $image); }

// Image resize if bigger
	if 	( $options[7] == '' ) {
		$image_width = '';
		$width = '1';
	} else {
		$image_size = getimagesize("$image");
		$width 	= $image_size[0];
		if ($options[1] <= $width) {
		$image_width = 'width="'.$options[7].'" ';
		} else {
		$image_width = 'width="'.$width.'" ';
		}
	}

// Create image
	$imenu['image'] = '<img src="'.$image.'" '.$image_width.'alt="'.$alt_title.'" '.$align.'/>';
if ( !$width ) { $imenu['image'] = '<img src="'.XOOPS_URL.'/modules/multiMenu/images/error.gif" '.$image_width.'alt="'.$alt_title.'" '.$align.'/>'; }
}else {
	$imenu['image'] = "";
}
	$block['contents'][] = $imenu;
}
}
return $block;
?>
