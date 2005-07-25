<?php
// $Id: admin.php,v 1.1 2005/07/25 15:21:26 mauriciodelima Exp $

//Vers�o Portuguesebr por agamen0n (Hugo Christiano)

// Template constant
// define("_AM_ART_*",	"");

// Generic form captions
// Table titles
define("_AM_ART_FRMTTLPRVWEDTS",	"Visualizar artigo"); //(for pop-up preview)
define("_AM_ART_FRMTTLPRVWART",		"Visualizar artigo"); // for in article form page
define("_AM_ART_FRMTTLPRVWCAT",		"Visualizar categoria");
define("_AM_ART_FRMTTLADDART",		"Adicionar artigo");
define("_AM_ART_FRMTTLADDCAT",		"Adicionar categoria");
define("_AM_ART_FRMTTLEDTCAT",		"Editar categoria");
define("_AM_ART_FRMTTLVALART",		"Validar artigos");
// Table column headers
define("_AM_ART_FRMCAPHDRID",		"ID");
define("_AM_ART_FRMCAPHDRTTL",		"T�tulo");
define("_AM_ART_FRMCAPHDCATLNG",	"Categoria");
define("_AM_ART_FRMCAPHDCATSRT",	"Gato");
define("_AM_ART_FRMCAPHDRORDR",		"Ordem");
// Table side caption
define("_AM_ART_FRMCAPSDTTL",		"T�tulo");
define("_AM_ART_FRMCAPSDCTGRY",		"Categoria");
define("_AM_ART_FRMCAPSDORDR",		"Ordem");
define("_AM_ART_FRMCAPSDDSPLY",		"Exibi��o");
define("_AM_ART_FRMCAPSDDSCRN",		"Descri��o");
define("_AM_ART_FRMCAPSDCATDSC",	"Descri��o da Categoria");
define("_AM_ART_FRMCAPSDARTCL",		"Texto do Artigo");
// Link captions
define("_AM_ART_FRMCAPLNKPRVW",		"Clique para visualizar");
define("_AM_ART_FRMCAPLNKEDT",		"Clique para editar");
define("_AM_ART_FRMCAPLNKDLT",		"Clique para apagar");
define("_AM_ART_FRMCAPLNKGTFRM",	"Formul�rio");
define("_AM_ART_FRMCAPLNKVLTSHW",	"Clique para validar e publicar");
define("_AM_ART_FRMCAPLNKVLTHDE",	"Clique para validar e n�o publicar");
// Button caption
define("_AM_ART_FRMBTTNCLS",	"Fechar janela");
define("_AM_ART_FRMBTTNSAVE",	"Salvar");
define("_AM_ART_FRMBTTNRST",	"Apagar");
define("_AM_ART_FRMBTTNCNCL",	"Cancelar");
define("_AM_ART_FRMBTTNPRVW",	"Visualizar");
// Form Element captions
define("_AM_ART_FRMCAPSLCTSHW",		"Selecione para mostrar artigo");
define("_AM_ART_FRMCAPSLCTNOHTML",	"Desativar tag HTML (deixe desmarcado ao usar o editor WYSIWYG). ");
define("_AM_ART_FRMCAPSLCTNOBR",	"Desativar quebras de linha autom�tica (deixe marcado ao usar o editor WYSIWYG). ");
define("_AM_ART_FRMCAPSLCTNOSMLY",	"Selecione para desativar XOOPS smiley �cones");
define("_AM_ART_FRMCAPSLCTNOXIMG",	"Selecione para desativar imagens exibidas com c�digos de XOOPS.");
define("_AM_ART_FRMCAPSLCTNOXCDE",	"Selecione para desativar c�digos XOOPS ");
define("_AM_ART_FRMCAPSLCTCATSHW",	"Selecione para mostrar categoria e seus artigos relacionados");
// Misc
define("_AM_ART_FRMCAPSLCT",	"Por favor selecione uma categoria");
define("_AM_ART_FRMCAPNOVAL",	"n�o h� nenhum artigo para validar");
define("_AM_ART_FRMCAPSTTSPUB",	"Situa��o: publicado");
define("_AM_ART_FRMCAPSTTSHDN",	"Situa��o: oculto");
define("_AM_ART_FRMCAPPGBRK",	"Use <strong>[pagebreak]</strong> para dividir o artigo em p�ginas.");
// Javascript messages
define("_AM_ART_JVSRPTADDTTL",	"Por favor entre com um t�tulo");
define("_AM_ART_JVSRPTSLTCAT",	"Por favor selecione uma categoria da lista dropdown");
// Confirmation messages
define("_AM_ART_ERRORNOCATS",	"Por favor <a href=\"". XOOPS_URL ."/modules/". $xoopsModule->getVar('dirname') ."/admin/catadd.php\">add a category</a> before an article.");

// Navigation/breadcrumbs/info bar
// Navigation bar
define("_AM_ART_NAVINDEX",		"�ndice");
define("_AM_ART_NAVARTADD",		"Adicionar artigo");
define("_AM_ART_NAVARTEDDEL",	"Editar/Deletar artigo");
define("_AM_ART_NAVARTEDT",		"Editar artigo");
define("_AM_ART_NAVCATADD",		"Adicionar categoria");
define("_AM_ART_NAVCATEDDEL",	"Editar/Deletar categoria");
define("_AM_ART_NAVCATEDT",		"Editar categoria");
define("_AM_ART_NAVVALIDATE",	"Validar");
define("_AM_ART_NAVFRNTPAGE",	"P�gina Principal");
define("_AM_ART_NAVABOUT",		"Sobre");
// "Breadcrumbs" bar
define("_AM_ART_NAVBCINDEX",	"�ndice");
define("_AM_ART_NAVBCARTEDDE",	"Editar/Deletar artigo");
define("_AM_ART_NAVBCVALART",	"Validar artigos");
// Info bar
define("_AM_ART_NAVINFMOD",		"m�dulo");
define("_AM_ART_NAVINFPREF",	"prefs");
define("_AM_ART_NAVINFHELP",	"ajuda");
define("_AM_ART_NAVINFABOUT",	"sobre");

// artadd.php


// arteddel.php
define("_AM_ART_LISTTITLE",		"Artigos");
define("_AM_ART_EDITTITLE",		"Editar artigo");
define("_AM_ART_FRMCAPNOARTS",	"n�o h� nenhum artigo para editar");

// catadd.php
define("_AM_ART_FRMCAPNOCATS",	"n�o h� nenhuma categoria para editar");

// validate.php


// index.php
define("_AM_ART_TTLGENSTATS",		"Situa��o Geral");
define("_AM_ART_TTLGENVLDT",		"Valida��o:");
define("_AM_ART_TTLGENVLDTDSC",		"artigos aguardando para serem <a href=\"". XOOPS_URL ."/modules/". $xoopsModule->getVar('dirname') ."/admin/validate.php\">be validated</a>.");
define("_AM_ART_TTLGENNUMARTS",		"N�mero de artigos:");
define("_AM_ART_TTLGENNUMARTSDSC",	"<a href=\"". XOOPS_URL ."/modules/". $xoopsModule->getVar('dirname') ."/admin/arteddel.php\">articles</a>.");
define("_AM_ART_TTLGENNUMCATS",		"N�mero de categorias:");
define("_AM_ART_TTLGENNUMCATSDSC",	"<a href=\"". XOOPS_URL ."/modules/". $xoopsModule->getVar('dirname') ."/admin/cateddel.php\">categories</a>.");
define("_AM_ART_TTLGENNUMVIEWS",	"N�mero de visualiza��es:");
define("_AM_ART_TTLGENNUMVIEWSDSC",	"visualiza��es do <a href=\"". XOOPS_URL ."/modules/". $xoopsModule->getVar('dirname') ."/admin/arteddel.php\">article</a> views.");
define("_AM_ART_TTLGENNUMPUB",		"Publicados:");
define("_AM_ART_TTLGENNUMPUBDSC",	"<a href=\"". XOOPS_URL ."/modules/". $xoopsModule->getVar('dirname') ."/admin/arteddel.php\">articles</a> have been published.");
define("_AM_ART_TTLGENNUMHIDDN",	"Ocultos:");
define("_AM_ART_TTLGENNUMHIDDNDSC",	"artigos est�o ocultos (incluindo <a href=\"". XOOPS_URL ."/modules/". $xoopsModule->getVar('dirname') ."/admin/arteddel.php\">articles</a>).");


// about.php



?>
