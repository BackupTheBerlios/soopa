<?php
// $Id: admin.php,v 1.2 2005/07/25 15:48:20 mauriciodelima Exp $

//Versão Portuguesebr por agamen0n (Hugo Christiano)

// Template constant
// define("_AM_ART_*",	"");

// Generic form captions
// Table titles
define("_AM_ART_FRMTTLPRVWEDTS",	"Exibir artigo"); //(for pop-up preview)
define("_AM_ART_FRMTTLPRVWART",		"Exibir artigo"); // for in article form page
define("_AM_ART_FRMTTLPRVWCAT",		"Exibir categoria");
define("_AM_ART_FRMTTLADDART",		"Incluir artigo");
define("_AM_ART_FRMTTLADDCAT",		"Incluir categoria");
define("_AM_ART_FRMTTLEDTCAT",		"Editar categoria");
define("_AM_ART_FRMTTLVALART",		"Aprovar artigos");
// Table column headers
define("_AM_ART_FRMCAPHDRID",		"ID");
define("_AM_ART_FRMCAPHDRTTL",		"Título");
define("_AM_ART_FRMCAPHDCATLNG",	"Categoria");
define("_AM_ART_FRMCAPHDCATSRT",	"Gato");
define("_AM_ART_FRMCAPHDRORDR",		"Ordem");
// Table side caption
define("_AM_ART_FRMCAPSDTTL",		"Título");
define("_AM_ART_FRMCAPSDCTGRY",		"Categoria");
define("_AM_ART_FRMCAPSDORDR",		"Ordem");
define("_AM_ART_FRMCAPSDDSPLY",		"Exibição");
define("_AM_ART_FRMCAPSDDSCRN",		"Descrição");
define("_AM_ART_FRMCAPSDCATDSC",	"Descrição da Categoria");
define("_AM_ART_FRMCAPSDARTCL",		"Texto do Artigo");
// Link captions
define("_AM_ART_FRMCAPLNKPRVW",		"Clique para exibir");
define("_AM_ART_FRMCAPLNKEDT",		"Clique para editar");
define("_AM_ART_FRMCAPLNKDLT",		"Clique para apagar");
define("_AM_ART_FRMCAPLNKGTFRM",	"Formulário");
define("_AM_ART_FRMCAPLNKVLTSHW",	"Clique para aprovar e publicar");
define("_AM_ART_FRMCAPLNKVLTHDE",	"Clique para aprovar e não publicar");
// Button caption
define("_AM_ART_FRMBTTNCLS",	"Fechar janela");
define("_AM_ART_FRMBTTNSAVE",	"Salvar");
define("_AM_ART_FRMBTTNRST",	"Apagar");
define("_AM_ART_FRMBTTNCNCL",	"Cancelar");
define("_AM_ART_FRMBTTNPRVW",	"Exibir");
// Form Element captions
define("_AM_ART_FRMCAPSLCTSHW",		"Selecione para mostrar artigo");
define("_AM_ART_FRMCAPSLCTNOHTML",	"Desativar tag HTML (deixe desmarcado ao usar o editor WYSIWYG). ");
define("_AM_ART_FRMCAPSLCTNOBR",	"Desativar quebras de linha automática (deixe marcado ao usar o editor WYSIWYG). ");
define("_AM_ART_FRMCAPSLCTNOSMLY",	"Selecione para desativar XOOPS smiley ícones");
define("_AM_ART_FRMCAPSLCTNOXIMG",	"Selecione para desativar imagens exibidas com códigos de XOOPS.");
define("_AM_ART_FRMCAPSLCTNOXCDE",	"Selecione para desativar códigos XOOPS ");
define("_AM_ART_FRMCAPSLCTCATSHW",	"Selecione para mostrar categoria e seus artigos relacionados");
// Misc
define("_AM_ART_FRMCAPSLCT",	"Por favor selecione uma categoria");
define("_AM_ART_FRMCAPNOVAL",	"não há nenhum artigo para aprovar");
define("_AM_ART_FRMCAPSTTSPUB",	"Situação: publicado");
define("_AM_ART_FRMCAPSTTSHDN",	"Situação: oculto");
define("_AM_ART_FRMCAPPGBRK",	"Use <strong>[pagebreak]</strong> para dividir o artigo em páginas.");
// Javascript messages
define("_AM_ART_JVSRPTADDTTL",	"Por favor entre com um título");
define("_AM_ART_JVSRPTSLTCAT",	"Por favor selecione uma categoria da lista dropdown");
// Confirmation messages
define("_AM_ART_ERRORNOCATS",	"Por Favor <a href=\"". XOOPS_URL ."/modules/articles/admin/catadd.php\">inclua uma categoria</a> antes de incluir artigos.");


// Navigation/breadcrumbs/info bar
// Navigation bar
define("_AM_ART_NAVINDEX",		"Índice");
define("_AM_ART_NAVARTADD",		"Incluir artigo");
define("_AM_ART_NAVARTEDDEL",	"Editar/Excluir artigo");
define("_AM_ART_NAVARTEDT",		"Editar artigo");
define("_AM_ART_NAVCATADD",		"Incluir categoria");
define("_AM_ART_NAVCATEDDEL",	"Editar/Excluir categoria");
define("_AM_ART_NAVCATEDT",		"Editar categoria");
define("_AM_ART_NAVVALIDATE",	"Aprovar");
define("_AM_ART_NAVFRNTPAGE",	"Página Inícial");
define("_AM_ART_NAVABOUT",		"Sobre");
// "Breadcrumbs" bar
define("_AM_ART_NAVBCINDEX",	"Índice");
define("_AM_ART_NAVBCARTEDDE",	"Editar/Excluir artigo");
define("_AM_ART_NAVBCVALART",	"Aprovar artigos");
// Info bar
define("_AM_ART_NAVINFMOD",		"Módulo");
define("_AM_ART_NAVINFPREF",	"Preferências");
define("_AM_ART_NAVINFHELP",	"Ajuda");
define("_AM_ART_NAVINFABOUT",	"Sobre");

// artadd.php


// arteddel.php
define("_AM_ART_LISTTITLE",		"Artigos");
define("_AM_ART_EDITTITLE",		"Editar artigo");
define("_AM_ART_FRMCAPNOARTS",	"não há nenhum artigo para editar");

// catadd.php
define("_AM_ART_FRMCAPNOCATS",	"não há nenhuma categoria para editar");

// validate.php


// index.php
define("_AM_ART_TTLGENSTATS",		"Informações Gerais");
define("_AM_ART_TTLGENVLDT",		"Validação:");
define("_AM_ART_TTLGENVLDTDSC",		"artigos aguardando para serem <a href=\"". XOOPS_URL ."/modules/articles/admin/validate.php\">aprovador</a>.");
define("_AM_ART_TTLGENNUMARTS",		"Número de artigos:");
define("_AM_ART_TTLGENNUMARTSDSC",	"<a href=\"". XOOPS_URL ."/modules/articles/admin/arteddel.php\">Artigos</a>.");
define("_AM_ART_TTLGENNUMCATS",		"Número de categorias:");
define("_AM_ART_TTLGENNUMCATSDSC",	"<a href=\"". XOOPS_URL ."/modules/articles/admin/cateddel.php\">Categorias</a>.");
define("_AM_ART_TTLGENNUMVIEWS",	"Número de visualizações:");
define("_AM_ART_TTLGENNUMVIEWSDSC",	"exibições do <a href=\"". XOOPS_URL ."/modules/articles/admin/arteddel.php\">article</a> views.");
define("_AM_ART_TTLGENNUMPUB",		"Publicados:");
define("_AM_ART_TTLGENNUMPUBDSC",	"<a href=\"". XOOPS_URL ."/modules/articles/admin/arteddel.php\">artigos</a> estão publicados.");
define("_AM_ART_TTLGENNUMHIDDN",	"Ocultos:");
define("_AM_ART_TTLGENNUMHIDDNDSC",	"artigos estão ocultos (incluindo <a href=\"". XOOPS_URL ."/modules/articles/admin/arteddel.php\">artigos</a>).");


// about.php



?>
