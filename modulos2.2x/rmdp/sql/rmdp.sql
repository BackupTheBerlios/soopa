-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmdp_categos`
-- 

CREATE TABLE `rmdp_categos` (
  `id_cat` int(11) NOT NULL auto_increment,
  `nombre` varchar(200) NOT NULL default '',
  `parent` int(11) NOT NULL default '0',
  `acceso` smallint(1) NOT NULL default '0',
  `img` varchar(200) NULL default '',
  `fecha` varchar(20) NOT NULL,
  `shownews` smallint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_cat`)
) TYPE=MyISAM COMMENT='Categorias de Software' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmdp_plataformas`
-- 

CREATE TABLE `rmdp_plataformas` (
  `id_os` int(11) NOT NULL auto_increment,
  `nombre` varchar(200) NOT NULL default '',
  `img` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id_os`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmdp_softos`
-- 

CREATE TABLE `rmdp_softos` (
  `id_os` int(11) NOT NULL default '0',
  `id_soft` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_os`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmdp_software`
-- 

CREATE TABLE `rmdp_software` (
  `id_soft` int(11) NOT NULL auto_increment,
  `nombre` varchar(200) NOT NULL default '',
  `version` varchar(10) NOT NULL default '',
  `licencia` smallint(1) NOT NULL default '0',
  `archivo` varchar(255) NOT NULL default '',
  `img` varchar(255) NOT NULL default '',
  `id_cat` int(11) NOT NULL default '0',
  `longdesc` text NOT NULL,
  `size` double NOT NULL default '0',
  `favorito` smallint(1) NOT NULL default '0',
  `descargas` int(11) NOT NULL default '0',
  `reviews` int(11) NOT NULL default '0',
  `votos` int(11) NOT NULL default '0',
  `rating` bigint(20) NOT NULL default '0',
  `calificacion` int(1) NOT NULL default '0',
  `anonimo` smallint(1) NOT NULL default '0',
  `resaltar` smallint(1) NOT NULL default '0',
  `fecha` varchar(20) NOT NULL default '0',
  `update` varchar(20) NOT NULL default '0',
  `url` varchar(255) NOT NULL default '',
  `urltitle` varchar(255) NOT NULL default '',
  `submitter` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_soft`)
) TYPE=MyISAM COMMENT='Software para descargar desde el sitio' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmdp_sponsors`
-- 

CREATE TABLE `rmdp_shots` (
  `id_shot` int(11) NOT NULL auto_increment,
  `id_soft` int(11) NOT NULL default '0',
  `small` varchar(255) NOT NULL,
  `big` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL default '',
  `fecha` varchar(20) NOT NULL default '0',
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_shot`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;
        
-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmdp_licences`
-- 

CREATE TABLE `rmdp_licences` (
  `id_lic` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id_lic`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmdp_partners`
-- 

CREATE TABLE `rmdp_partners` (
  `id_par` int(11) NOT NULL auto_increment,
  `id_soft` int(11) NOT NULL default '0',
  `text` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id_par`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmdp_sended`
-- 

CREATE TABLE `rmdp_sended` (
  `id_send` int(11) NOT NULL auto_increment,
  `nombre` varchar(200) NOT NULL default '',
  `version` varchar(20) NOT NULL default '',
  `licencia` int(11) NOT NULL default '0',
  `archivo` varchar(255) NOT NULL default '',
  `img` varchar(255) NOT NULL default '',
  `id_cat` int(11) NOT NULL default '0',
  `longdesc` text NOT NULL,
  `size` double NOT NULL default '0',
  `urltitle` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `submitter` int(11) NOT NULL default '0',
  `plataformas` varchar(255) NOT NULL default '',
  `fecha` varchar(20) NOT NULL default '',
  `anonimo` smallint(1) NOT NULL default '0',
  `modify` smallint(1) NOT NULL default '0',
  `ids` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_send`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmdp_data`
-- 

CREATE TABLE `rmdp_data` (
`total_votos` INT DEFAULT '0' NOT NULL ,
`total_descargas` INT DEFAULT '0' NOT NULL ,
`download_day` INT DEFAULT '0' NOT NULL
);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmdp_editorcom`
-- 

CREATE TABLE `rmdp_editorcom` (
  `id_ce` int(11) NOT NULL auto_increment,
  `id_soft` int(11) NOT NULL default '0',
  `text` text NOT NULL,
  `fecha` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id_ce`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rmdp_votes`
-- 

CREATE TABLE `rmdp_votes` (
  `id_vote` int(11) NOT NULL auto_increment,
  `id_soft` int(11) NOT NULL default '0',
  `uid` int(11) NOT NULL default '0',
  `user_ip` varchar(30) NOT NULL default '',
  `fecha` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id_vote`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;
