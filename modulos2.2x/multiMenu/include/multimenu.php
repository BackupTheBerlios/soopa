<?php

    	$sql = 	" SELECT groups, link, submenu, title, target, imageurl, weight
			FROM ".$xoopsDB->prefix('multimenu').$id." 
			WHERE hide = 1
			ORDER BY weight ";
	$group = is_object($xoopsUser) ? $xoopsUser->getGroups() : array(XOOPS_GROUP_ANONYMOUS);
	$result = $xoopsDB->queryF($sql);

	while ( $myrow = $xoopsDB->fetchArray($result) ) {

	$groups = explode(" ",$myrow['groups']);
	if (count(array_intersect($group,$groups)) > 0) {

// Reset all values
$link = '';
$imageurl = '';
$a = '';
$title = '';
$links = '';
$links_type = '';
$links_type_main = '';
$li_in = ''; 
$li_out = '';
$title = $myts->makeTareaData4Show($myrow['title']);
$alt_title = strip_tags($myrow['title']);

// Create links if exist
if ($myrow['link']) {
		if (	(eregi("mailto:", $myrow['link'])) || 
			(eregi("http://", $myrow['link'])) || 
			(eregi("https://", $myrow['link'])) || 
			(eregi("ftp://", $myrow['link'])))
 		{
			$links = $myrow['link'];
				if ($xoopsModuleConfig['multimenu_icon']) {
				$links_type = '<br />&nbsp;&nbsp;&nbsp;<img src="images/icon/urllink.gif" alt="Absolu" align="absmiddle" />&nbsp;';
				$links_type_main = '<br /><img src="images/icon/urllink_01.gif" alt="Absolu" align="absmiddle" />&nbsp;';
				}
		} else {
			$links = XOOPS_URL."/".$myrow['link'];
				if ($xoopsModuleConfig['multimenu_icon']) {
				$links_type = '<br />&nbsp;&nbsp;&nbsp;<img src="images/icon/links.gif" alt="Relatif" align="absmiddle" />&nbsp;';
				$links_type_main = '<br /><img src="images/icon/links_01.gif" alt="Relatif" align="absmiddle" />&nbsp;';
				}
		}

$link = '<a href="'.$links.'" target="'.$myrow['target'].'" title="'.$alt_title.'">';
$a = '</a>';
}

// Create picture if exist
$images = '';
if ($myrow['imageurl']) {
		if (
			(eregi("http://", $myrow['imageurl'])) || 
			(eregi("https://", $myrow['imageurl'])))
 			{
			$image = $myrow['imageurl'];
			} else {
			$image = XOOPS_URL."/".$myrow['imageurl'];
		}

if ( !empty($xoopsModule) ) { $image = str_replace('{module}', $xoopsModule->getVar('dirname'), $image); } else { $image = str_replace('{module}', 'default', $image); }

			$image = str_replace('{theme}', $xoopsConfig['theme_set'], $image);
			$image_size =  	getimagesize("$image");
			$width 	=	$image_size[0];

			if ($xoopsModuleConfig['multimenu_img_width'] <= $width) {
				$image_width = 'width="'.$xoopsModuleConfig['multimenu_img_width'].'" ';
			} else {
				$image_width = 'width="'.$width.'" ';
			}

$images = '<img src="'.$image.'" '.$image_width.'alt="'.$alt_title.'" align="absmiddle" />';
if ( !$width ) { $images = '<img src="'.XOOPS_URL.'/modules/multiMenu/images/error.gif" '.$image_width.'alt="'.$alt_title.'" align="absmiddle" />'; }

}

// Create list tags if no icons
if ( !$xoopsModuleConfig['multimenu_icon'] && $myrow['submenu'] == 0  ) {
	$li_in = '<li>'; $li_out = '</li>';
} elseif ( !$xoopsModuleConfig['multimenu_icon'] && ($myrow['submenu'] == 1 OR $myrow['submenu'] == 2 ) ) {
//	$li_in = '|~&nbsp;'; $li_out = '<br />';
	$li_in = '<ul><li>'; $li_out = '</li></ul>';
} 

// Generate the differents links
$menu = array();

// Main links
if ( $myrow['submenu'] == 0 ) {
$counter = 0;
$menu['link'] = $li_in.$link.$links_type_main.$images.$title.$a.$li_out;
}

// Dyn. or Perm. Sublinks
if ( $myrow['submenu'] == 1 or $myrow['submenu'] == 2) {
$menu['link'] = $li_in.$link.$links_type.$images.'<i>'.$title.'</i>'.$a.$li_out;
}

// Note
if ( $myrow['submenu'] == 3) {
$counter = 0;
$menu['link'] = $link.$links_type.$images.'<i>'.$title.'</i>'.$a.'<br /><br />';
}

// Category
if ( $myrow['submenu'] == 4) {
$counter = 0;
$menu['link'] =  '<div class="itemHead"><div class="itemTitle">'.$link.$images.''.$title.''.$a.'</div></div>';
}

// Apply to the index page
	if ($id == '01') { $xoopsTpl->append('mm_content01', $menu); }
 	if ($id == '02') { $xoopsTpl->append('mm_content02', $menu); }
	if ($id == '03') { $xoopsTpl->append('mm_content03', $menu); }
	if ($id == '04') { $xoopsTpl->append('mm_content04', $menu); }
	if ($id == '05') { $xoopsTpl->append('mm_content05', $menu); }
	if ($id == '06') { $xoopsTpl->append('mm_content06', $menu); }
	if ($id == '07') { $xoopsTpl->append('mm_content07', $menu); }
	if ($id == '08') { $xoopsTpl->append('mm_content08', $menu); }
	unset($menu);		
	}
}

?>