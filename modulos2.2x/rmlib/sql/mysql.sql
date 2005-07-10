-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 12-02-2005 a las 17:39:27
-- Versión del servidor: 4.0.20
-- Versión de PHP: 4.3.8
-- 
-- Base de datos: `temporal`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmhelp_categos`
-- 

CREATE TABLE `rmlib_categos` (
  `cid` int(11) NOT NULL auto_increment,
  `titulo` varchar(150) NOT NULL default '',
  `desc` varchar(255) NOT NULL default '',
  `fecha` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`cid`)
) TYPE=MyISAM COMMENT='Categorias de manuales o documentación' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmhelp_contenido`
-- 

CREATE TABLE `rmlib_contenido` (
  `coid` int(11) NOT NULL auto_increment,
  `index` int(11) NOT NULL default '0',
  `texto` text NOT NULL,
  `fecha` varchar(50) NOT NULL default '',
  `com` int(11) NOT NULL default '0',
  `lecturas` int(11) NOT NULL default '0',
  `iduser` int(11) NOT NULL default '0',
  PRIMARY KEY  (`coid`)
) TYPE=MyISAM COMMENT='Contenido de los temas en las indices' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmhelp_indice`
-- 

CREATE TABLE `rmlib_indice` (
  `iid` int(11) NOT NULL auto_increment,
  `titulo` varchar(150) NOT NULL default '',
  `tema` int(11) NOT NULL default '0',
  `parent` int(11) NOT NULL default '0',
  `orden` int(1) NOT NULL default '0',
  `fecha` varchar(50) NOT NULL default '',
  `lecturas` int(11) NOT NULL default '0',
  PRIMARY KEY  (`iid`)
) TYPE=MyISAM COMMENT='Indices que contienen los temas principales';

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmhelp_temas`
-- 

CREATE TABLE `rmlib_temas` (
  `tid` int(11) NOT NULL auto_increment,
  `catego` int(11) NOT NULL default '0',
  `titulo` varchar(100) NOT NULL default '',
  `desc` text NOT NULL,
  `fecha` varchar(50) NOT NULL default '',
  `orden` int(2) NOT NULL default '0',
  `tipo` int(1) NOT NULL default '0',
  `lecturas` int(11) NOT NULL default '0',
  PRIMARY KEY  (`tid`)
) TYPE=MyISAM COMMENT='Temas principales o libros de ayuda';

CREATE TABLE `rmlib_users` (
  `iduser` int(11) NOT NULL default '0',
  `idbook` int(11) NOT NULL default '0'
) TYPE=MyISAM;