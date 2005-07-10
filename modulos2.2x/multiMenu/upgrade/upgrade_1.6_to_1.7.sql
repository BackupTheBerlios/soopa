

#
# Dumping data for table `multimenu_counter`
#

INSERT INTO `multimenu_counter` VALUES ('multimenu_06', '0');
INSERT INTO `multimenu_counter` VALUES ('multimenu_07', '0');
INSERT INTO `multimenu_counter` VALUES ('multimenu_08', '0');

#
# Altering data for table `multimenu`
#
ALTER TABLE multimenu01 ADD `pid` int(5) unsigned NOT NULL default '0'; 
ALTER TABLE multimenu02 ADD `pid` int(5) unsigned NOT NULL default '0'; 
ALTER TABLE multimenu03 ADD `pid` int(5) unsigned NOT NULL default '0'; 
ALTER TABLE multimenu04 ADD `pid` int(5) unsigned NOT NULL default '0'; 
ALTER TABLE multimenu05 ADD `pid` int(5) unsigned NOT NULL default '0'; 


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