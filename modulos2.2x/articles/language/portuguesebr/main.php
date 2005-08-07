<?php
// $Id: main.php,v 1.3 2005/08/07 06:54:57 mauriciodelima Exp $

// Versão em Portuguesebr por agamen0n (Hugo Christiano), Maurício de Lima


// Cat/Article listing index.
define("_MD_CATLIST_CAPTION",	"Artigos");			// Caption of category/article list
define("_MD_INDEX_PAGE_TITLE",	"Título da página inicial");	// Title of category/article list page (not used in shipped package)
define("_MD_ARTICLE_VIEW_CAP",	"leituras");				// Caption for number of views
define("_MD_NUM_ARTICLE_CAP",	"artigos");			// Caption for number of articles for category
define("_MD_NUM_ARTICLE_NUM",	"Artigos");
define("_MD_NUM_ARTICLE_OF",	"of");
define("_MD_NUM_ARTICLE_TO",	"to");
define("_MD_NUM_ARTICLE_PREV",	"&#171;anterior");
define("_MD_NUM_ARTICLE_NEXT",	"próximo&#187;");
define("_MD_NUM_ARTICLE_SEP",	"::");

// Article page
define("_MD_INDEXLINKTEXT",		"Índice");		// Text for return to index page
define("_MD_INDEXLINKPRINT",	"Imprimir");		// Text for printable version
define("_MD_POSTEDON",			"Enviado em");	// Posted on text
define("_MD_READS", 			"leituras");		// Text for reads
define("_MD_EMAIL", 			"Enviar a um Amigo");		// Text for email friend.
define("_MD_NOARTICLE",			"O artigo solicitado não foi encontrado.");		// Text for email friend.
define("_MD_PAGENEXT",			"Próxima");
define("_MD_PAGEPREV",			"Prévia");
define("_MD_PAGENUM",			"Página");
define("_MD_PAGEOF",			"de");
define("_MD_ART_POSTER",		"por");


// E-mail page
define("_MD_EMAILHEADTTL", 		"Enviar artigo a um amigo");
define("_MD_EMAILYOURNAME",		"Teu nome:");
define("_MD_EMAILYOUREMAIL",	"Seu e-mail:");
define("_MD_EMAILRECIPIENT",	"Receptor:");
define("_MD_EMAILMESSAGE",		"Mensagem:");
define("_MD_EMAILMESSAGEDESC",	"Isto será incluído no email.");
define("_MD_EMAILSEND",			"enviar");
define("_MD_EMAILSET",			"limpar");
define("_MD_EMAILSECNOTE",		"<strong>Nota Importante:</strong> Com este e-mail serão enviadas informações de segurança para prevenir abusos neste serviço."); 

// Print page
define("_MD_ARTPRINTTITLE",		"Título do artigo:");
define("_MD_ARTPRINTPOSTED",	"Publicação original:");
define("_MD_ARTPRINTDESCRIP",	"Descrição:");
define("_MD_ARTPRINTTEXT",		"Texto do artigo:");
define("_MD_ARTPRINTPUB",		"Este artigo foi originalmente publicado em:");
define("_MD_ARTPRINTSITENAME",	"Site:");
define("_MD_ARTPRINTSITEURL",	"URL:");

// General
define("_MD_MOD_WHOBY",		"<span style=\"font-size: smaller; text-align: center;\">Articles Copyright &copy 2004 <a href=\"ajmills@sirium.net\">Andrew Mills</a></span>");

// Confirmation messages
define("_MD_DBUPDATED",					"Banco de Datos Atualizado Corretamente!");
define("_MD_DBNOTUPDATED",				"Banco de Datos não Atualizado!"); 
define("_MD_ITEMDELETED",				"Eliminado Corretamente!");
define("_MD_ITEMNOTDELETED",			"Não foi Eliminado");
define("_MD_ITEM_DELETED_CANCELLED",	"Cancelado!");
define("_MD_CONFIRMDELETE",             "Quer Apagar Realmente?");
define("_MD_DBSUBMITTED",				"Thank you for your submission, we will review it for publication as soon as possible.");

// Errors
define("_MD_NOACCESSHERE",	"Sem acesso a esta página.");
define("_MD_LOGGEDIN",		"Acesso exclusivo para usuários.");
define("_MD_EMLMAXCHARS",	"Excesso de caracteres.");
define("_MD_NOTALLOWED",	"Você não tem acesso a esta página.");

// Submit page
define("_MD_ART_SUBINTRO",		"Você pode usar o seguinte formulário para enviar seu artigo. Esteja avisado de que ele terá que ser aprovado por um administrador antes de ser publicado.");
define("_MD_SUBMIT_PAGE_TITLE", "Enviar um artigo");
define("_MD_ART_SUBALERTTITLE",	"Entre com pelo menos 3 caracteres para um título.");
define("_MD_ART_SUBALERTCAT",	"Selecione uma categoria para a lista 'drop down'.");
define("_MD_ART_SUBTITLE",		"Título:");
define("_MD_ART_SUBCAT",		"Categoria:");
define("_MD_ART_SUBDESC",		"Descrição:");
define("_MD_ART_SUBTART",		"Artigo:");
define("_MD_ART_SUBTNOTIFY",	"Notificar:");
define("_MD_ART_SUBTNOTIFYDES",	"Notificar quando o artigo for publicado?");
define("_MD_ART_SUBMIT",		" Enviar artigo");
define("_MD_ART_SUBRESET",		" Apagar");
define("_MD_ART_PREVIEW",		" Exibir");
define("_MD_SUBMITTEDMSG",		"Artigo enviado");
define("_MD_SUBMITTEDMSGDESC",	"Obrigado pelo seu envio, estaremos avaliando seu material antes de publicá-lo.");
define("_MD_FORMCAPTIONPAGEBRK",	"Use <strong>[pagebreak]</strong> para quebrar o artigo em mais de uma página.");
define("_MD_FORMCAPTIONNOHTML",		"Desabilitar tags HTML");
define("_MD_FORMCAPTIONNOSMILEY",	"Desabilitar icones smile");
define("_MD_FORMCAPTIONNOXCODE",	"Desabilitar códigos XOOPS");
define("_MD_FORMCAPTIONNOIMAGE",	"Desabilitar imagens (usando código XOOPS)");
define("_MD_FORMCAPTIONNOBR",		"Desabilitar quebra de linha automática");
define("_MD_FORMCAPTIONSELECT",		"Selecione uma categoria");


?>
