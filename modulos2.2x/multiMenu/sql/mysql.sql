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
INSERT INTO `multimenu_counter` VALUES ('multimenu_06', '0');
INSERT INTO `multimenu_counter` VALUES ('multimenu_07', '0');
INSERT INTO `multimenu_counter` VALUES ('multimenu_08', '0');


CREATE TABLE multimenu01 (
  id int(5) unsigned NOT NULL auto_increment,
  pid int(5) unsigned NOT NULL default '0',
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


CREATE TABLE multimenu02 (
  id int(5) unsigned NOT NULL auto_increment,
  pid int(5) unsigned NOT NULL default '0',
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

CREATE TABLE multimenu03 (
  id int(5) unsigned NOT NULL auto_increment,
  pid int(5) unsigned NOT NULL default '0',
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

 
CREATE TABLE multimenu04 (
  id int(5) unsigned NOT NULL auto_increment,
  pid int(5) unsigned NOT NULL default '0',
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

CREATE TABLE multimenu05 (
  id int(5) unsigned NOT NULL auto_increment,
  pid int(5) unsigned NOT NULL default '0',
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


CREATE TABLE multimenu06 (
  id int(5) unsigned NOT NULL auto_increment,
  pid int(5) unsigned NOT NULL default '0',
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


CREATE TABLE multimenu07 (
  id int(5) unsigned NOT NULL auto_increment,
  pid int(5) unsigned NOT NULL default '0',
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


CREATE TABLE multimenu08 (
  id int(5) unsigned NOT NULL auto_increment,
  pid int(5) unsigned NOT NULL default '0',
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
# Contenu de la table `multimenu08`
#

INSERT INTO `multimenu08` VALUES (1, 2, 'General Settings', 1, 1, 'modules/system/admin.php?fct=preferences&op=show&confcat_id=1', '', 2, '_blank', '1');
INSERT INTO `multimenu08` VALUES (2, 0, 'Admin', 1, 0, 'admin.php', '', 1, '_blank', '1');
INSERT INTO `multimenu08` VALUES (3, 2, 'User Settings', 1, 1, 'modules/system/admin.php?fct=preferences&op=show&confcat_id=2', '', 3, '_blank', '1');
INSERT INTO `multimenu08` VALUES (4, 2, 'Meta & Footer', 1, 1, 'modules/system/admin.php?fct=preferences&op=show&confcat_id=3', '', 4, '_blank', '1');
INSERT INTO `multimenu08` VALUES (5, 0, 'Core options', 1, 4, '', '', 0, '_blank', '1');
INSERT INTO `multimenu08` VALUES (6, 2, 'Word Censorship', 1, 1, 'modules/system/admin.php?fct=preferences&op=show&confcat_id=4', '', 5, '_blank', '1');
INSERT INTO `multimenu08` VALUES (7, 2, 'Search Options', 1, 1, 'modules/system/admin.php?fct=preferences&op=show&confcat_id=5', '', 6, '_blank', '1');
INSERT INTO `multimenu08` VALUES (8, 2, 'Mail Setup', 1, 1, 'modules/system/admin.php?fct=preferences&op=show&confcat_id=6', '', 7, '_blank', '1');
INSERT INTO `multimenu08` VALUES (9, 0, 'Modules', 1, 4, '', '', 8, '_blank', '1');
INSERT INTO `multimenu08` VALUES (10, 21, 'Installed', 1, 1, 'modules/system/admin.php?fct=modulesadmin', '', 10, '_blank', '1');
INSERT INTO `multimenu08` VALUES (11, 21, 'Available', 1, 1, 'modules/system/admin.php?fct=modulesadmin#availmods', '', 11, '_blank', '1');
INSERT INTO `multimenu08` VALUES (12, 0, 'Blocks', 1, 4, '', '', 12, '_blank', '1');
INSERT INTO `multimenu08` VALUES (13, 15, 'Visible', 1, 1, 'modules/system/admin.php?fct=blocksadmin&selmod=-1&selgrp=2&selvis=1', '', 14, '_blank', '1');
INSERT INTO `multimenu08` VALUES (14, 15, 'Hidden', 1, 1, 'modules/system/admin.php?fct=blocksadmin&selmod=-1&selgrp=2&selvis=0', '', 15, '_blank', '1');
INSERT INTO `multimenu08` VALUES (15, 0, 'Admin', 1, 0, 'modules/system/admin.php?fct=blocksadmin&selmod=-1&selgrp=2&selvis=2', '', 13, '_blank', '1');
INSERT INTO `multimenu08` VALUES (16, 15, 'Add custom block', 1, 1, 'modules/system/admin.php?fct=blocksadmin#newblock', '', 16, '_blank', '1');
INSERT INTO `multimenu08` VALUES (17, 0, 'Users', 1, 4, '', '', 17, '_blank', '1');
INSERT INTO `multimenu08` VALUES (18, 0, 'Admin', 1, 0, 'modules/system/admin.php?fct=groups', '', 23, '_blank', '1');
INSERT INTO `multimenu08` VALUES (19, 0, 'Admin', 1, 0, 'modules/system/admin.php?fct=users', '', 18, '_blank', '1');
INSERT INTO `multimenu08` VALUES (20, 19, 'Find', 1, 1, 'modules/system/admin.php?fct=findusers', '', 19, '_blank', '1');
INSERT INTO `multimenu08` VALUES (21, 0, 'Admin', 1, 0, 'modules/system/admin.php?fct=modulesadmin', '', 9, '_blank', '1');
INSERT INTO `multimenu08` VALUES (22, 19, 'Mail', 1, 1, 'modules/system/admin.php?fct=mailusers', '', 20, '_blank', '1');
INSERT INTO `multimenu08` VALUES (23, 19, 'Ranks', 1, 1, 'modules/system/admin.php?fct=userrank', '', 21, '_blank', '1');
INSERT INTO `multimenu08` VALUES (24, 0, 'Groups', 1, 4, '', '', 22, '_blank', '1');
INSERT INTO `multimenu08` VALUES (25, 18, 'Webmaster', 1, 1, 'modules/system/admin.php?fct=groups&op=modify&g_id=1', '', 24, '_blank', '1');
INSERT INTO `multimenu08` VALUES (26, 18, 'Registered', 1, 1, 'modules/system/admin.php?fct=groups&op=modify&g_id=2', '', 25, '_blank', '1');
INSERT INTO `multimenu08` VALUES (27, 18, 'Anonymous', 1, 1, 'modules/system/admin.php?fct=groups&op=modify&g_id=3', '', 26, '_blank', '1');
INSERT INTO `multimenu08` VALUES (28, 0, 'Misc.', 1, 4, '', '', 27, '_blank', '1');
INSERT INTO `multimenu08` VALUES (29, 0, 'Banner', 1, 0, 'modules/system/admin.php?fct=banners', '', 28, '_blank', '1');
INSERT INTO `multimenu08` VALUES (30, 0, 'Image manager', 1, 0, 'modules/system/admin.php?fct=images', '', 29, '_blank', '1');
INSERT INTO `multimenu08` VALUES (31, 0, 'Smilies', 1, 0, 'modules/system/admin.php?fct=smilies', '', 30, '_blank', '1');
INSERT INTO `multimenu08` VALUES (32, 0, 'Avatars', 1, 0, 'modules/system/admin.php?fct=avatars', '', 31, '_blank', '1');
INSERT INTO `multimenu08` VALUES (33, 0, 'Template manager', 1, 0, 'modules/system/admin.php?fct=tplsets', '', 32, '_blank', '1');
INSERT INTO `multimenu08` VALUES (34, 0, 'Comments', 1, 0, 'modules/system/admin.php?fct=comments', '', 33, '_blank', '1');
    
