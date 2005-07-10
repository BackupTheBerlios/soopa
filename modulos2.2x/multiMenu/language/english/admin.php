<?php
//  ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System				//
//                    Copyright (c) 2004 XOOPS.org					//
//                       <http://www.xoops.org/>					//
//													//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)			//
//                                 	- herve (www.herve-thouzard.com)		//
//                  multiMenu v1.4								//
//  ------------------------------------------------------------------------	//

define("_AD_MULTIMENU_ADMIN", 	"Administration : ");
define("_AD_MULTIMENU_EDITIMENU", 	"Edit");
define("_AD_MULTIMENU_NEWIMENU", 	"New Link");
define("_AD_MULTIMENU_NEW",		"New Link");
define("_AD_MULTIMENU_TITLE",		"Title");
define("_AD_MULTIMENU_STATUS",	"Status");
define("_AD_MULTIMENU_ONLINE",	"Online");
define("_AD_MULTIMENU_OFFLINE",	"Offline");
define("_AD_MULTIMENU_SUBMENU",	"Type");
define("_AD_MULTIMENU_SUBMENUEXP",	"");
define("_AD_MULTIMENU_SUBYES",	"Yes");
define("_AD_MULTIMENU_SUBNO",		"No");
define("_AD_MULTIMENU_MAINLINK",	"Mainlink");
define("_AD_MULTIMENU_SUBLINK",	"Dynamic Sublink");
define("_AD_MULTIMENU_PERMSUBLINK",	"Permanent Sublink");
define("_AD_MULTIMENU_NOTE",		"Note");
define("_AD_MULTIMENU_TARGET",	"Target");
define("_AD_MULTIMENU_GROUPS",	"Groups");
define("_AD_MULTIMENU_LINK",		"Link <font color='red'>*</font>");
define("_AD_MULTIMENU_OPERATION",	"Functions");
define("_AD_MULTIMENU_UP",		"Up");
define("_AD_MULTIMENU_DOWN",		"Down");
define("_AD_MULTIMENU_TARG_SELF",	"self");
define("_AD_MULTIMENU_TARG_BLANK",	"blank");
define("_AD_MULTIMENU_TARG_PARENT",	"parent");
define("_AD_MULTIMENU_TARG_TOP",	"top");
define("_AD_MULTIMENU_SUREDELETE",	"Are you sure you want to delete this link?");
define("_AD_MULTIMENU_UPDATED",	"Database successfully updated!");
define("_AD_MULTIMENU_NOTUPDATED",	"Could not update database!");
define("_AD_MULTIMENU_SUBMIT", 	"Submit");
define("_AD_MULTIMENU_IMAGE", 	"Picture <font color='red'>*</font>");

define("_AD_MULTIMENU_CATEGORY",	"Category");
define("_AD_MULTIMENU_NOTES",		"<font color='red'>*</font> multiMenu supports absolutes and relatives urls.<br /><br />
<b><u>Exemples</u> :</b><br /><br />
<u>Absolute URL</u> : <i>".XOOPS_URL."/modules/multiMenu/index.php</i><br />
<u>Relative URL</u> : <i>modules/multiMenu/</i><br /><br />
<table><tr><td><img src='../images/attention.png' /></td><td>To make the dynamic links to work,<br />it is necessary to add ' / ' (trailin slash)<br />at the end of links linking to directory!</td><tr></table><br />
<br />
You can use the following tag in your picture path:<br />
- {theme} which would display the current used theme.<br />
- {module} which would display the current used module.");

define("_AD_MULTIMENU_PREFERENCES", "Preferences");
define("_AD_MULTIMENU_HELP",		"Guide");

define("_AD_MULTIMENU_FATHER_INDEX","Parent Index");
define("_AD_MULTIMENU_CANTPARENT",	"An entry can't link to itself or to a child!");
define("_AD_MULTIMENU_ID",		"Id");
define("_AD_MULTIMENU_PID",		"Pid");
define("_AD_MULTIMENU_BLOCK_LINK",	"Visible Block list");

define("_AD_MULTIMENU_GUIDET_GENERAL",	"General");
define("_AD_MULTIMENU_GUIDET_PREF",		"Preferences");
define("_AD_MULTIMENU_GUIDET_INDEX",	"Index");
define("_AD_MULTIMENU_GUIDET_BLOCKS",	"Blocks");

define("_AD_MULTIMENU_GUIDE_GENERAL",	"
<p align='center'><strong><font size='5'>How to use multiMenu ?</font>
</strong></p><br />
<br />
<strong><u>GENERAL</u>
</strong>
<br />multiMenu is a multifunction links menu manager. It has been designed to easily display links and menus on a Xoops site. For webmasters, links can be added either from the administration side, or directly from a link in the index pages of the module. This 1.7 version now includes a sitemap interface, which will allow the webmaster to design his own navigation.
<br />
<br />
<strong><u>FEATURES</u>
</strong>
<br />The main objective of this module is to allow webmasters who are not used with website or module management to easily display custom menus. Other benefits include plenty of features that allow the webmaster to personalise the use of the module. This includes very flexible block menu allowing many disply type options, as we will see later in this short guide.
<br />
<br /><strong><u>CREDITS</u></strong>
<br />With respect to the design and creation of this module, credits and thanks go to several well-known xoopers: <br />Herv&eacute;, Marcan and Solo for their help and collaboration on this project.
");

define("_AD_MULTIMENU_GUIDE_PREF",	"
<p align='center'><strong><font size='5'>How to use multiMenu ?</font></strong>
</p>
<br /><strong><u>ADMINISTRATION<br /></u></strong>
<br /><strong><u>Preferences (or module general settings)</u>
</strong>
<br /><br />Before using this multiMenu module, we suggest to have a careful look at the admin settings. This is where you will define the functional and personal settings of your module. Those settings have a direct impact on the index pages (but not on block settings).
<br />
<br />
<br /><strong><em>~Display Main page: <br /></em></strong>
You may activate or not the Sitemap option here. If you desactivate it, you may eventuellay keep using it as a fake module to display whatever block you want, or use is as a secondary homepage. Keep in mind this would only deactivate the main index page, not the sub-index sitemap pages.
<br />
<br />
<strong><em>~Introduction text: <br /></em></strong>
Put here the text you want to see above the main index page. This text accept Xoops and HTML codes.
<br />
<br />
<strong><em>~Display banner:</em></strong>
You have the possibility to display or not a banner or the module name above all the module pages. If you want to change the banner, change the '/module/multiMenu/images/logo.gif' file.
<br />
<br />
<strong><em>~Display multiMenu page (from 1 to 4):</em></strong>
Choose the multiMenu content you want to display in the index pages. 
<br />
<br />
<strong><em>~Menu Title (from 1 to 4): <br /></em></strong>
Define the index and admin multiMenu page titles. Pay attention, this won't affect the related blocks title!
<br />
<br />
<strong><em>~Display Nav Bar:</em></strong>
 <br />A navigation bar with the activated index page would display above each and every page. If you don't want this function, you can desactivate it here.
<br />
<br /><strong><em>~Default image width:</em>
</strong>
<br />Fix the standard maximum size value a picture would display on the index pages. It would only resize pictures which are bigger than this value (thus, no stretching effect).
<br />
<br />
<br /><strong><em>~Display icons:</em></strong>
<br />Activating this function would display icons in front of each and every links. There are actually 4 types of links :<br />
<ul>
<li><img src='../images/icon/urllink_01.gif' align='absmiddle' /> Absolute main links</li>
<li><img src='../images/icon/urllink.gif' align='absmiddle' /> Absolute sub links</li>
<li><img src='../images/icon/links_01.gif' align='absmiddle' /> Relative main links</li>
<li><img src='../images/icon/links.gif' align='absmiddle' /> Relative sub links</li>
</ul>
<br />
<br />
<strong><em>~Menu to display in theme:<br /></em></strong>
This option allow you to display  one of your multiMenu directly in your theme. All you need to do is to insert that code in your current theme *:
<p align='center'><font color='blue'><nobr><{include file=\"../modules/multiMenu/theme/multimenu.php\"}></nobr></font></p>
<br />
<i>* Note: Only 'main links' are displayed in theme!</i>
");

define("_AD_MULTIMENU_GUIDE_INDEX",	"
<p align='center'><strong><font size='5'>How to use multiMenu ?</font></strong></p>
<br /><strong><u>ADMINISTRATION<br /></u></strong><br />
<strong><u>Admin Index</u></strong>
<br />
<br />
There are 2 differentparts here: A dynamic module navigation bar and the current edited multiMenu.
<br />
<br />
<strong>Module navigation bar consisting of-</strong>
<ul><li> multiMenu main Index Page</li>
<li>Preferences</li>
<li> Help</li>
<li> Admin links</li>
<li> multiMenu (ranging from 1 to 4)</li></ul><br />
Note: there is a color code which indicate if the current multiMenu is displayed or not in the index page.<br />
<br />
You can navigate through the whole module and it&rsquo;s option thanks to this nav bar. Keep in mind that on each and every page generated by Edito, as admin of the module, you will be able to directly access the edit, delete or administration function.
<br />
<br />
<strong><u>multiMenu index page</u></strong><br />
<br />
Display each and every multiMenu links. <br />
On the main page, you can get some valuable informations regarding your custom links :<br />
<ul>
<li>Picture: display a reduced version of the used picture.</li>
<li>Title</li>
<li>Link</li>
<li>Status: Green for online, red for offline.</li>
<li>Type</li>
<li>Functions: main admin functions, edit, delete, move up and down.</li>
</ul>
Links are ranked in display order. This order can be changed clicking on the green arrows (up and down).
<br />
<br />
Click on 'New Link' to create a new entry. 
<br />
<br />
<strong><u>New link</u></strong><br />
<br />
multiMenu is designed to easily create menu links. You just have to fill in the form to create a new link.<br />
You can choose to display a picture with or without links, with different possible display options.<br />
<br />
<strong><em>~Title:</em></strong> is the link title. You can use html code (to color your links for instance) or smilies. It is better not use the BBCodes.<br />
<br />
<strong><em>~Link:</em></strong> is the url you want your link to point at. Leave it blank if you don't want a clickable link (for information purpose, for instance). The url can be  absolute or relative. If set relative, multiMenu would automatically add the current website path, so that, wherever your block appears on your site, the url would be a correct link. <br />
<br />
<strong><em>~Image:</em></strong> is the picture url of the current link. Same goes as for link regarding the relative or absolute url. If the picture is unavailable or fake, multiMenu would display a default picture (a red paw).<br />
In this version, you have the possibility to use two different tages <strong>{module}</strong> <strong>{theme}</strong>, respectively displaying the module or theme used on the current page. Those option would allow you to display specific logos regarding the module or theme the user is navigating the website.<br />
<br />
<strong><em>~Status:</em></strong> define wether you want that link to be dispalyed or not.<br />
<br />
<strong><em>~Type:</em></strong> set the link type you want to apply to the current link. There are 5 different link type :<br />
<ul>
<li><strong>Category:</strong> display as a category link type.</li>
<li><strong>Main link:</strong> standard main link type.</li>
<li><strong>Permanent sublink:</strong> sublink type which would display permanently.</li>
<li><strong>Dynamic sublink:</strong> sublink type which would display dynamically, regarding the parent mainlink. Note that to make the dynamic links to work, it is necessary to add '\ / ' (trailin slash) at the end of main links linking to a directory!
</li>
<li>Note: would display like a standard comment text.</li>
</ul><br />
<strong><em>~Target:</em></strong> 4 different classical target type.</li><br />
<br />
<strong><em>~Groups:</em></strong> selct which group can see or not the current link.</li></ul>
");

define("_AD_MULTIMENU_GUIDE_BLOCKS",	"
<p align='center'><strong><font size='5'>How to use multiMenu ?</font></strong></p><br />
<br />
<strong><u>multiMenu's blocks</u></strong><br />
<br />
One of the most important features of multiMenu are his blocks. As stated above, you have for each menu a corresponding block (ranging from 1 to 4 + the admin one), plus 2 other custom menu blocks (A and B). For each and every available blocks, you can have a very wide range of applications, display and options.<br /><br />When editing a multiMenu block, use the &ldquo;Setting&rdquo; option, in 6 different catégories.<br />
<br />
<strong>1) Block Format</strong><br />
<br />
<strong><em>~Format:</em></strong><br />
You can display the multiMenu links under 11 different forms:<br />
- Standard Menu (Main Menu like)<br />
- Drop List<br />
- Select Box<br />
- Fixed Picture<br />
- Scrolling Picture (scrolling without pause)<br />
- Sliding Picture (scrolling with pause)<br />
- Unordered list (without numbers)<br />
- Ordered list (with numbers)<br />
- Unordered list<br />
- Scrolling List (scrolling without pause)<br />
- Sliding List (scrolling with pause at the end)<br />
<br />
<strong><em>~Number of columns:</em></strong><br />
Define the amount of columns you want your links to be displayed. This option is only available for Standard Menu and Fixed Picture option.<br />
<br />
<strong>2) Links</strong><br />
<br />
<strong><em>~Link type to display:</em></strong><br />
Define which kind of links your want to display amongs all links category. <br />
<strong><em>~Order by:</em></strong><br />
In which order do you want to display your links: by weight (defined by admin order) or by ordered or reversed alphabetical order.<br />
<br />
<strong>3) Title</strong><br />
<br />
<strong><em>~Display Title:</em></strong><br />
Do you want to display the links title. This option should be used only with links which have an illustration picture!<br />
<strong><em>~Max. Lenght:</em></strong><br />
How maximum long should be the title ? Define the maximum value here.<br />
<br />
<strong>4) Picture</strong><br />
<br />
<strong><em>~Display Picture:</em></strong><br />
Do you want to display the links title.<br />
<strong><em>~Max. Widht:</em></strong><br />
Set the maximum picture width to keep a uniform look of your illustrations and menus. If the picture is smaller, it won't be resized to prevent any pixelisation effect.<br />
<br />
<strong>5) Scroll Settings</strong><br />
<br />Those options are only valuable if you select the Sliding Picture format. 
<strong><em>~Block width and height:</em></strong><br />
Define the block general size. Check picture width option to tweak the perfect sttings.<br />
<strong><em>~Speed:</em><br /></strong>
Define the general scrolling speed of your pictures and links. <br />
<br />
<strong>6) Random Links</strong><br />
<br />
<strong><em>~Random links:</em></strong></strong><br />
multiMenu gives you the possibility to display a selection of random links. Define here wether you want it or not. Of course, this options should be used carefully if you are using several different link types (category, main links, sublinks and note) and work better with only one link type.<br />
<strong><em>~Number of random link to display:</em></strong><br />
This option define the number of random link to dispalay. Keep in mind that it would display X links after the first random picked links. 
<br /><br />Thanks for choosing multiMenu, as always, we are happy to receive any comments and feedback so that we may continually improve the quality and features of this module.<br /><br />- The authors");
?>
