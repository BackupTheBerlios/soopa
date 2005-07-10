<{php}>

Global $xoopsDB, $xoopsConfig, $xoopsUser, $xoopsModule;
$myts =& MyTextSanitizer::getInstance();
$group = is_object($xoopsUser) ? $xoopsUser->getGroups() : array(XOOPS_GROUP_ANONYMOUS);

	include_once (XOOPS_ROOT_PATH. "/modules/multiMenu/include/functions_block.php");

if ( multimenu_getmoduleoption('multimenu_theme') ) {

$id = multimenu_getmoduleoption('multimenu_theme');

// Vérifier le nombre de liens
	$count = $xoopsDB -> queryF( "SELECT COUNT(*)
			FROM ".$xoopsDB->prefix('multimenu').$id." 
			WHERE hide = 1 AND submenu = 0");
	list( $counter )=$xoopsDB->fetchRow($count);

if ($counter  != 0) {
	$count = 100/($counter); 
} else {
	return '';
	exit(); 
}


// Récupérer les liens
    	$sql =	"SELECT groups, link, submenu, title, target, imageurl, weight
			FROM ".$xoopsDB->prefix('multimenu').$id." 
			WHERE hide = 1 AND submenu = 0
			ORDER BY weight ASC";

	$result = $xoopsDB->queryF($sql);

	while ( $myrow = $xoopsDB->fetchArray($result) ) {

		$groups = explode(" ",$myrow['groups']);
		if (count(array_intersect($group,$groups)) > 0) {
$link = '';
$images = '';
$title = '';
$links = '';
$title = $myts->makeTareaData4Show($myrow['title']);
$alt_title = $myts->makeTareaData4Show(strip_tags($myrow['title']));

// Orizontale Menu creation
$aa++;
if (multimenu_getmoduleoption('multimenu_theme_type') == 'path') {
	// Path
	if ( $aa == 1 ) {
 	$td_in = '
	<table class="navbar">
	  <tr>
	    <td class="navbar" width="100%">
			'; 
	$td_out = '';
	} else {
	$td_in = '&nbsp;|&nbsp;'; 
	$td_out = '';
	}
} elseif (multimenu_getmoduleoption('multimenu_theme_type') == 'table') {
// Table
	if ( $aa == 1 ) { 
		$td_in = '
	<table class="navbar">
	  <tr>
	    <td class="navbar" width="'.$count.'%">
			'; 
		$td_out = '
	    </td>';
	} else {
		$td_in = '
	    <td class="navbar" width="'.$count.'%">
		'; 
		$td_out = '
	    </td>';
	 }
}
		$table_out = '
	  <tr>
	</table>
';


// Link
if ($myrow['link']) {

		if (	(eregi("mailto:", $myrow['link'])) || 
			(eregi("http://", $myrow['link'])) || 
			(eregi("https://", $myrow['link'])) || 
			(eregi("ftp://", $myrow['link'])))
 			{
			$links = $myrow['link'];
			} else {
			$links = XOOPS_URL."/".$myrow['link'];
			}

	}



$link = '<a href="'.$links.'" target="'.$myrow['target'].'" title="'.$alt_title.'">';

if ($myrow['imageurl']) {
		if (
			(eregi("http://", $myrow['imageurl'])) || 
			(eregi("https://", $myrow['imageurl'])))
 			{
			$image = $myrow['imageurl'];
			} else {
			$image = XOOPS_URL."/".$myrow['imageurl'];
		}

// Theme tag and size check
			$image = str_replace('{theme}', $xoopsConfig['theme_set'], $image);
if ( !empty($xoopsModule) ) { $image = str_replace('{module}', $xoopsModule->getVar('dirname'), $image); } else { $image = str_replace('{module}', 'default', $image); }

			$image_size =  	getimagesize("$image");
			$width 	=	$image_size[0];
			if (multimenu_getmoduleoption('multimenu_img_width') <= $width) {
				$image_width = 'width="'.multimenu_getmoduleoption('multimenu_img_width').'"';
			} else {
				$image_width = 'width="'.$width.'"';
			}

if ( !$width ) { $image = XOOPS_URL.'/modules/multiMenu/images/error.gif'; }


	if (multimenu_getmoduleoption('multimenu_theme_type') == 'path') {
		$images = '<img src="'.$image.'" '.$image_width.' alt="'.$alt_title.'" align="absmiddle" />&nbsp;';
	} elseif (multimenu_getmoduleoption('multimenu_theme_type') == 'table') {
		$images = '<img src="'.$image.'" '.$image_width.' alt="'.$alt_title.'" /><br />';
	}

}

	if ( $myrow['submenu'] == 0 ) {
	echo $td_in.$link.$images.$title.'</a>';
	}

	if ( $myrow['submenu'] == 1 or $myrow['submenu'] == 2) {
	echo 
	$link.$images.'<i><nobr>'.$title.'</nobr></i></a></div>';
	}

	if ( $myrow['submenu'] == 3) {
	echo
	$link.$images.'<i>'.$title.'</i></a>
	';
	
	if ( $myrow['submenu'] == 4) {
	echo
	$link.$images.'<h3>'.$title.'</h3>'.$aa
	;
	}
}
echo $td_out;
		}
}
echo $table_out;
}

<{/php}>