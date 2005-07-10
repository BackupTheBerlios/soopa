CREATE TABLE `multimenu_counter` (
  `conf_key` varchar(255) NOT NULL default '',
  `conf_value` varchar(255) NOT NULL default ''
) TYPE=MyISAM;

#
# Dumping data for table `multimenu_counter`
#

INSERT INTO `multimenu_counter` VALUES ('multimenu_index', '0');
INSERT INTO `multimenu_counter` VALUES ('multimenu_01', '0');
INSERT INTO `multimenu_counter` VALUES ('multimenu_02', '0');
INSERT INTO `multimenu_counter` VALUES ('multimenu_03', '0');
INSERT INTO `multimenu_counter` VALUES ('multimenu_04', '0');
INSERT INTO `multimenu_counter` VALUES ('multimenu_05', '0');

CREATE TABLE multimenu05 (
  id int(5) unsigned NOT NULL auto_increment,
  title varchar(150) NOT NULL default '',
  hide tinyint(1) unsigned NOT NULL default '0',
  submenu tinyint(1) NOT NULL default '0',
  link varchar(255) default NULL,
  imageurl varchar(255) NOT NULL default '',  
  weight tinyint(4) unsigned NOT NULL default '0',
  target varchar(10) default NULL,
  groups varchar(255) default NULL,
  PRIMARY KEY (id)
) TYPE=MyISAM;


#
# Contenu de la table `multimenu05`
#

INSERT INTO multimenu05 (`id`, `title`, `hide`, `submenu`, `link`, `imageurl`, `weight`, `target`, `groups`) VALUES (1, 'General Settings', 1, 1, 'modules/system/admin.php?fct=preferences&op=show&confcat_id=1', '', 2, '_blank', '1'),
(2, 'Admin', 1, 0, 'admin.php', '', 1, '_blank', '1'),
(3, 'User Settings', 1, 1, 'modules/system/admin.php?fct=preferences&op=show&confcat_id=2', '', 3, '_blank', '1'),
(4, 'Meta & Footer', 1, 1, 'modules/system/admin.php?fct=preferences&op=show&confcat_id=3', '', 4, '_blank', '1'),
(5, 'Core options', 1, 4, '', '', 0, '_blank', '1'),
(6, 'Word Censorship', 1, 1, 'modules/system/admin.php?fct=preferences&op=show&confcat_id=4', '', 5, '_blank', '1'),
(7, 'Search Options', 1, 1, 'modules/system/admin.php?fct=preferences&op=show&confcat_id=5', '', 6, '_blank', '1'),
(8, 'Mail Setup', 1, 1, 'modules/system/admin.php?fct=preferences&op=show&confcat_id=6', '', 7, '_blank', '1'),
(9, 'Modules', 1, 4, '', '', 8, '_blank', '1'),
(10, 'Installed', 1, 1, 'modules/system/admin.php?fct=modulesadmin', '', 10, '_blank', '1'),
(11, 'Available', 1, 1, 'modules/system/admin.php?fct=modulesadmin#availmods', '', 11, '_blank', '1'),
(12, 'Blocks', 1, 4, '', '', 12, '_blank', '1'),
(13, 'Visible', 1, 1, 'modules/system/admin.php?fct=blocksadmin&selmod=-1&selgrp=2&selvis=1', '', 14, '_blank', '1'),
(14, 'Hidden', 1, 1, 'modules/system/admin.php?fct=blocksadmin&selmod=-1&selgrp=2&selvis=0', '', 15, '_blank', '1'),
(15, 'Admin', 1, 0, 'modules/system/admin.php?fct=blocksadmin&selmod=-1&selgrp=2&selvis=2', '', 13, '_blank', '1'),
(16, 'Add custom block', 1, 1, 'modules/system/admin.php?fct=blocksadmin#newblock', '', 16, '_blank', '1'),
(17, 'Users', 1, 4, '', '', 17, '_blank', '1'),
(18, 'Admin', 1, 0, 'modules/system/admin.php?fct=groups', '', 23, '_blank', '1'),
(19, 'Admin', 1, 0, 'modules/system/admin.php?fct=users', '', 18, '_blank', '1'),
(20, 'Find', 1, 1, 'modules/system/admin.php?fct=findusers', '', 19, '_blank', '1'),
(21, 'Admin', 1, 0, 'modules/system/admin.php?fct=modulesadmin', '', 9, '_blank', '1'),
(22, 'Mail', 1, 1, 'modules/system/admin.php?fct=mailusers', '', 20, '_blank', '1'),
(23, 'Ranks', 1, 1, 'modules/system/admin.php?fct=userrank', '', 21, '_blank', '1'),
(24, 'Groups', 1, 4, '', '', 22, '_blank', '1'),
(25, 'Webmaster', 1, 1, 'modules/system/admin.php?fct=groups&op=modify&g_id=1', '', 24, '_blank', '1'),
(26, 'Registered', 1, 1, 'modules/system/admin.php?fct=groups&op=modify&g_id=2', '', 25, '_blank', '1'),
(27, 'Anonymous', 1, 1, 'modules/system/admin.php?fct=groups&op=modify&g_id=3', '', 26, '_blank', '1'),
(28, 'Misc.', 1, 4, '', '', 27, '_blank', '1'),
(29, 'Banner', 1, 0, 'modules/system/admin.php?fct=banners', '', 28, '_blank', '1'),
(30, 'Image manager', 1, 0, 'modules/system/admin.php?fct=images', '', 29, '_blank', '1'),
(31, 'Smilies', 1, 0, 'modules/system/admin.php?fct=smilies', '', 30, '_blank', '1'),
(32, 'Avatars', 1, 0, 'modules/system/admin.php?fct=avatars', '', 31, '_blank', '1'),
(33, 'Template manager', 1, 0, 'modules/system/admin.php?fct=tplsets', '', 32, '_blank', '1'),
(34, 'Comments', 1, 0, 'modules/system/admin.php?fct=comments', '', 33, '_blank', '1');

