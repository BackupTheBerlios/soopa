# phpMyAdmin MySQL-Dump
# version 2.5.0
# http://www.phpmyadmin.net/ (download page)
#
# Host: localhost
# Generation Time: Mar 16, 2004 at 03:09 PM
# Server version: 4.0.18
# PHP Version: 4.3.4
# --------------------------------------------------------

#
# Table structure for table `smartsection_categories`
#
# Creation: Mar 16, 2004 at 11:14 AM
# Last update: Mar 16, 2004 at 12:31 PM
#

CREATE TABLE `smartsection_categories` (
  `categoryid` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL default '0',
  `name` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL default '',
  `total` int(11) NOT NULL default '0',
  `weight` int(11) NOT NULL default '1',
  `created` int(11) NOT NULL default '1033141070',
  PRIMARY KEY  (`categoryid`)
) TYPE=MyISAM COMMENT='SmartSection by The SmartFactory <www.smartfactory.ca>' AUTO_INCREMENT=1 ;
# --------------------------------------------------------

#
# Table structure for table `smartsection_items`
#
# Creation: Mar 16, 2004 at 02:04 PM
# Last update: Mar 16, 2004 at 02:04 PM
#

CREATE TABLE `smartsection_items` (
  `itemid` int(11) NOT NULL auto_increment,
  `categoryid` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `summary` TEXT NOT NULL,
  `display_summary` tinyint(1) NOT NULL default '1',
  `body` LONGTEXT NOT NULL,
  `uid` int(6) default '0',
  `datesub` int(11) NOT NULL default '0',
  `status` int(1) NOT NULL default '-1',
  `image` varchar(255) NOT NULL default '',
  `counter` int(8) unsigned NOT NULL default '0',
  `weight` int(11) NOT NULL default '1',
  `dohtml` tinyint(1) NOT NULL default '1',
  `dosmiley` tinyint(1) NOT NULL default '1',
  `doxcode` tinyint(1) NOT NULL default '1',
  `doimage` tinyint(1) NOT NULL default '1',
  `dobr` tinyint(1) NOT NULL default '1',
  `cancomment` tinyint(1) NOT NULL default '1',
  `comments` int(11) NOT NULL default '0',
  `notifypub` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`itemid`)
) TYPE=MyISAM COMMENT='SmartSection by The SmartFactory <www.smartfactory.ca>' AUTO_INCREMENT=1 ;


#
# Table structure for table `smartsection_files`
#
# Creation: Mar 16, 2004 at 02:04 PM
# Last update: Mar 16, 2004 at 02:04 PM
#

CREATE TABLE `smartsection_files` (
  `fileid` int(11) NOT NULL auto_increment,
  `itemid` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `description` TEXT NOT NULL,
  `filename` varchar(255) NOT NULL default '', 
  `mimetype` varchar(64) NOT NULL default '',
  `uid` int(6) default '0',
  `datesub` int(11) NOT NULL default '0',
  `status` int(1) NOT NULL default '-1',
  `notifypub` tinyint(1) NOT NULL default '1',
  `counter` int(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`fileid`)
) TYPE=MyISAM COMMENT='SmartSection by The SmartFactory <www.smartfactory.ca>' AUTO_INCREMENT=1 ;


# --------------------------------------------------------


CREATE TABLE `smartsection_meta` (
  `metakey` varchar(50) NOT NULL default '',
  `metavalue` varchar(255) NOT NULL default '',
  PRIMARY KEY (`metakey`)
) TYPE=MyISAM COMMENT='SmartDoc by The SmartFactory <www.smartfactory.ca>' ;

# 
# Dumping data for table `smartsection_categories`
# 

INSERT INTO `smartsection_meta` VALUES ('version','1.0');

