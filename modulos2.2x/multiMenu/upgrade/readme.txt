In order to upgrade your multiMenu 1.5 to 1.6 version, please enter in your browser the following url :
http://YOUR_SITE_URL/modules/multiMenu/ugrade/multimenu_1.5_to_1.6.php

------------------------------

In order to upgrade your multiMenu 1.6 to 1.7 version:

1) Edit the xoops_version.php file and change the follwing lines:

$modversion['blocks'][7]['file'] = "multimenu.php";
$modversion['blocks'][7]['name'] = _MI_MULTIMENU_NAME_05;
$modversion['blocks'][7]['description'] = "admin link menu";
$modversion['blocks'][7]['show_func'] = "multimenu_show";
$modversion['blocks'][7]['edit_func'] = "multimenu_edit";
$modversion['blocks'][7]['options'] = "ul|all|1|weight ASC|1|255|1||160|160|1|0|3|05";
// UPDATE : Reverse below lines to update from 1.6 to 1.7
//$modversion['blocks'][7]['template'] = 'multimenu_block_05.html';
$modversion['blocks'][7]['template'] = 'multimenu_block_admin.html';
// UPDATE
	

2) enter in your browser the following url :
http://YOUR_SITE_URL/modules/multiMenu/ugrade/multimenu_1.6_to_1.7.php

------------------------------


Remplace the "YOUR_SITE_URL" by the url of your site.


Solo
www.wolfpackclan.com/wolfactory
