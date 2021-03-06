<?php
// $Id: modinfo.php,v 1.5 2005/08/12 00:03:54 mauriciodelima Exp $
// Module Info

// The name of this module
define('_MI_NEWS_NAME','News');

// A brief description of this module
define('_MI_NEWS_DESC','Creates a Slashdot-like news section, where users can post news/comments.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NEWS_BNAME1','News Topics');
define('_MI_NEWS_BNAME3','Big Story');
define('_MI_NEWS_BNAME4','Top News');
define('_MI_NEWS_BNAME5','Recent News');
define('_MI_NEWS_BNAME6','Moderate News');
define('_MI_NEWS_BNAME7','Navigate thru topics');

// Sub menus in main menu block
define('_MI_NEWS_SMNAME1','Submit News');
define('_MI_NEWS_SMNAME2','Archive');

// Names of admin menu items
define('_MI_NEWS_ADMENU2', 'Topics Manager');
define('_MI_NEWS_ADMENU3', 'Post/Edit News');
define('_MI_NEWS_GROUPPERMS', 'Permissions');
// Added by Herv� for prune option
define('_MI_NEWS_PRUNENEWS', 'Prune news');
// Added by Herv�
define('_MI_NEWS_EXPORT', 'News Export');

// Title of config items
define('_MI_STORYHOME', 'Select the number of news items to display on top page');
define('_MI_NOTIFYSUBMIT', 'Select yes to send notification message to webmaster upon new submission');
define('_MI_DISPLAYNAV', 'Select yes to display navigation box at the top of each news page');
define('_MI_AUTOAPPROVE','Auto approve news stories without admin intervention?');
define("_MI_ALLOWEDSUBMITGROUPS", "Groups who can Submit News");
define("_MI_ALLOWEDAPPROVEGROUPS", "Groups who can Approve News");
define("_MI_NEWSDISPLAY", "News Display Layout");
define("_MI_NAMEDISPLAY","Author's name");
define("_MI_COLUMNMODE","Columns");
define("_MI_STORYCOUNTADMIN","Number of new articles to display in admin area (this option will be also used to limit the number of topics displayed in the admin area and it will be used in the statistics) : ");
define('_MI_UPLOADFILESIZE', 'MAX Filesize Upload (KB) 1048576 = 1 Meg');
define("_MI_UPLOADGROUPS","Authorized groups to upload");


// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');
define("_MI_ALLOWEDSUBMITGROUPSDESC", "The selected groups will be able to submit news items");
define("_MI_ALLOWEDAPPROVEGROUPSDESC", "The selected groups will be able to approve news items");
define("_MI_NEWSDISPLAYDESC", "Classic shows all news ordered by date of publish. News by topic will group the news by topic with the latest story in full and the others with just the title");
define('_MI_ADISPLAYNAMEDSC', 'Select how to display the author\'s name');
define("_MI_COLUMNMODE_DESC","You can choose the number of columns to display articles list");
define("_MI_STORYCOUNTADMIN_DESC","");
define("_MI_UPLOADFILESIZE_DESC","");
define("_MI_UPLOADGROUPS_DESC","Select the groups who can upload to the server");

// Name of config item values
define("_MI_NEWSCLASSIC", "Classic");
define("_MI_NEWSBYTOPIC", "By Topic");
define("_MI_DISPLAYNAME1", "Username");
define("_MI_DISPLAYNAME2", "Real Name");
define("_MI_DISPLAYNAME3", "Do not display author");
define("_MI_UPLOAD_GROUP1","Submitters and Approvers");
define("_MI_UPLOAD_GROUP2","Approvers Only");
define("_MI_UPLOAD_GROUP3","Upload Disabled");

// Text for notifications

define('_MI_NEWS_GLOBAL_NOTIFY', 'Global');
define('_MI_NEWS_GLOBAL_NOTIFYDSC', 'Global news notification options.');

define('_MI_NEWS_STORY_NOTIFY', 'Story');
define('_MI_NEWS_STORY_NOTIFYDSC', 'Notification options that apply to the current story.');

define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY', 'New Topic');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notify me when a new topic is created.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receive notification when a new topic is created.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New news topic');

define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY', 'New Story Submitted');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Notify me when any new story is submitted (awaiting approval).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Receive notification when any new story is submitted (awaiting approval).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New news story submitted');

define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY', 'New Story');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP', 'Notify me when any new story is posted.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC', 'Receive notification when any new story is posted.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New news story');

define('_MI_NEWS_STORY_APPROVE_NOTIFY', 'Story Approved');
define('_MI_NEWS_STORY_APPROVE_NOTIFYCAP', 'Notify me when this story is approved.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYDSC', 'Receive notification when this story is approved.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Story approved');

define('_MI_RESTRICTINDEX', 'Restrict Topics on Index Page?');
define('_MI_RESTRICTINDEXDSC', 'If set to yes, users will only see news items listed in the index from the topics, they have access to as set in News Permissions');

define('_MI_NEWSBYTHISAUTHOR', 'News by the same author');
define('_MI_NEWSBYTHISAUTHORDSC', 'If you set this option to yes, then a link \'Articles by this author\' will be visible');

define('_MI_NEWS_PREVNEX_LINK','Show Previous and Next link ?');
define('_MI_NEWS_PREVNEX_LINK_DESC','When this option is set to \'Yes\', two new links are visibles at the bottom of each article. Those links are used to go to the previous and next article according to the publish date');
define('_MI_NEWS_SUMMARY_SHOW','Show summary table ?');
define('_MI_NEWS_SUMMARY_SHOW_DESC','When you use this option, a summary containing links to all the recent published articles is visible at the bottom of each article');
define('_MI_NEWS_AUTHOR_EDIT','Enable authors to edit their post ?');
define('_MI_NEWS_AUTHOR_EDIT_DESC','With this option, authors can edit their posts.');
define('_MI_NEWS_RATE_NEWS','Enable users to rate news ?');
define('_MI_NEWS_TOPICS_RSS','Enable RSS feeds per topics ?');
define('_MI_NEWS_TOPICS_RSS_DESC',"If you set this option to 'Yes' then the topics content will be available as RSS feeds");
define('_MI_NEWS_DATEFORMAT', "Date's format");
define('_MI_NEWS_DATEFORMAT_DESC',"Please refer to the Php documentation (http://fr.php.net/manual/en/function.date.php) for more information on how to select the format. Note, if you don't type anything then the default date's format will be used");
define('_MI_NEWS_META_DATA', "Enable meta datas (keywords and description) to be entered ?");
define('_MI_NEWS_META_DATA_DESC', "If you set this option to 'yes' then the approvers will be able to enter the following meta datas : keywords and description");
define('_MI_NEWS_BNAME8','Random news');
define('_MI_NEWS_NEWSLETTER','Newsletter');
define('_MI_NEWS_STATS','Statistics');
define("_MI_NEWS_FORM_OPTIONS","Form Option");
define("_MI_NEWS_FORM_COMPACT","Compact");
define("_MI_NEWS_FORM_DHTML","DHTML");
define("_MI_NEWS_FORM_SPAW","Spaw Editor");
define("_MI_NEWS_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_NEWS_FORM_FCK","FCK Editor");
define("_MI_NEWS_FORM_KOIVI","Koivi Editor");
define("_MI_NEWS_FORM_OPTIONS_DESC","Select the editor to use. If you have a 'simple' install (e.g you use only xoops core editor class, provided in the standard xoops core package), then you can just select DHTML and Compact");
define("_MI_NEWS_KEYWORDS_HIGH","Use keywords highlighting ?");
define("_MI_NEWS_KEYWORDS_HIGH_DESC","If you use this option then the keywords typed in the search will be highlited in the articles");
define("_MI_NEWS_HIGH_COLOR","Color used to highlight keywords ?");
define("_MI_NEWS_HIGH_COLOR_DES","Only use this option if you have choosed Yes for the previous option");
define("_MI_NEWS_INFOTIPS","Tooltips length");
define("_MI_NEWS_INFOTIPS_DES","If you use this option, links related to news will contains the first (n) characters of the article. If you set this value to 0 then the infotips will be empty");
define("_MI_NEWS_SITE_NAVBAR","Use Mozilla and Opera Site Navigation's Bar ?");
define("_MI_NEWS_SITE_NAVBAR_DESC","If you set this option to Yes then the visitors of your website will be able to use the Site Navigation's Bar to navigate thru your articles.");
define("_MI_NEWS_TABS_SKIN","Select the skin to use in tabs");
define("_MI_NEWS_TABS_SKIN_DESC","This skin will be used by all blocks which uses tabs");
define("_MI_NEWS_SKIN_1","Bar Style");
define("_MI_NEWS_SKIN_2","Beveled");
define("_MI_NEWS_SKIN_3","Classic");
define("_MI_NEWS_SKIN_4","Folders");
define("_MI_NEWS_SKIN_5","MacOs");
define("_MI_NEWS_SKIN_6","Plain");
define("_MI_NEWS_SKIN_7","Rounded");
define("_MI_NEWS_SKIN_8","ZDnet style");
?>