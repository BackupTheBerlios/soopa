-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmsrv_banners`
-- 

CREATE TABLE `rmsrv_banners` (
  `id_ban` int(11) NOT NULL auto_increment,
  `id_srv` int(11) NOT NULL default '0',
  `img` text NOT NULL,
  `desc` text NOT NULL,
  `buy` smallint(1) NOT NULL default '1',
  `showborder` smallint(1) NOT NULL default '1',
  PRIMARY KEY  (`id_ban`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmsrv_caract`
-- 

CREATE TABLE `rmsrv_caract` (
  `id_car` int(11) NOT NULL auto_increment,
  `nombre` varchar(150) NOT NULL default '',
  `shortdesc` varchar(255) NOT NULL default '',
  `longdesc` text NOT NULL,
  `img` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id_car`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmsrv_carrel`
-- 

CREATE TABLE `rmsrv_carrel` (
  `id_car` int(11) NOT NULL default '0',
  `id_srv` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_car`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmsrv_categos`
-- 

CREATE TABLE `rmsrv_categos` (
  `id_cat` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL default '',
  `desc` text NOT NULL,
  `img` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id_cat`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmsrv_promos`
-- 

CREATE TABLE `rmsrv_promos` (
  `id_promo` int(11) NOT NULL auto_increment,
  `precio` double NOT NULL default '0',
  `codigo` varchar(20) NOT NULL default '',
  `inblock` smallint(1) NOT NULL default '1',
  `shortdesc` varchar(255) NOT NULL default '',
  `longdesc` text NOT NULL,
  `img` varchar(255) NOT NULL default '',
  `activa` smallint(1) NOT NULL default '1',
  `nombre` varchar(200) NOT NULL default '',
  `form` text NOT NULL,
  PRIMARY KEY  (`id_promo`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmsrv_promosrel`
-- 

CREATE TABLE `rmsrv_promosrel` (
  `id_srv` int(11) NOT NULL default '0',
  `id_promo` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_srv`,`id_promo`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmsrv_servicios`
-- 

CREATE TABLE `rmsrv_servicios` (
  `id_srv` int(11) NOT NULL auto_increment,
  `nombre` varchar(150) NOT NULL default '',
  `id_cat` int(11) NOT NULL default '0',
  `img` varchar(255) NOT NULL default '',
  `precio` double NOT NULL default '0',
  `shortdesc` varchar(255) NOT NULL default '',
  `longdesc` text NOT NULL,
  `inblock` smallint(1) NOT NULL default '1',
  `codigo` varchar(20) NOT NULL default '',
  `activo` smallint(1) NOT NULL default '1',
  `presupuesto` smallint(1) NOT NULL default '0',
  `form` text NOT NULL,
  `terminos` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id_srv`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmsrv_terminos`
-- 

CREATE TABLE `rmsrv_terminos` (
  `id_term` int(11) NOT NULL auto_increment,
  `titulo` varchar(255) NOT NULL default '',
  `texto` text NOT NULL,
  PRIMARY KEY  (`id_term`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmsrv_trel`
-- 

CREATE TABLE `rmsrv_trel` (
  `id_term` int(11) NOT NULL default '0',
  `id_srv` int(11) NOT NULL default '0'
) TYPE=MyISAM;