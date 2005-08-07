<?php

// Versão em Portuguesebr por agamen0n (Hugo Christiano)

// The name of this module.
define('_MI_ARTICLES_NAME',		'Artigos');

// Description for this module.
define('_MI_ARTICLES_DESC',		'Artigos: Gerenciador de Artigos para Xoops v2');

// Names of blocks for this module.
define('_MI_ARTICLES_BNAME1',	'Últimos Artigos'); // New articles
define('_MI_ARTICLES_BNAME2',	'Artigos Populares'); // Top by views
define('_MI_ARTICLES_BNAME3',	'Últimos Artigos Publicados'); // New articles - main display
define('_MI_ARTICLES_BNAME4',	'Artigos Populares Publicados'); // Top by rates - main display

// Names of admin menu items
define('_MI_ARTICLE_ADMENU1',	'Indice');
define('_MI_ARTICLE_ADMENU2',	'Incluir/Editar Artigos');
define('_MI_ARTICLE_ADMENU3',	'Incluir/Editar Categorias');
define('_MI_ARTICLE_ADMENU4',	'Preferências Gerais ');
define('_MI_ARTICLE_ADMENU5',	'Incluir/Editar categorias');
define('_MI_ARTICLE_ADMENU6',	'Aprovar artigos');

// Sub menu items
define('_MI_ARTICLE_SUBMENU1',	'Enviar artigo');

// Notification stuff
define('_MI_ARTICLE_GLOBAL_NOTIFY',     'Global');
define('_MI_ARTICLE_GLOBAL_NOTIFYDSC',  ' opções globais de links de notificação.');

define('_MI_ARTICLE_USERSUBNOTIFY',		'Administração');
define('_MI_ARTICLE_USERSUBNOTIFYDSC',	'Quando um usuário enviar artigo.');

define('_MI_ARTICLE_GLOBAL_NEWARTICLE_NOTIFY',      'Novo artigo adicionado.');
define('_MI_ARTICLE_GLOBAL_NEWARTICLE_NOTIFYCAP',   'Quando um artigo for incluído.');
define('_MI_ARTICLE_GLOBAL_NEWARTICLE_NOTIFYDSC',   'Receber notificação quando um novo artigo for adicionado.');
define('_MI_ARTICLE_GLOBAL_NEWARTICLE_NOTIFYSBJ',   '[{X_SITENAME}] Novo artigo adicionado.');

define('_MI_ARTICLE_GLOBAL_NEWCATEGORY_NOTIFY',      'Quando uma categoria for incluída.');
define('_MI_ARTICLE_GLOBAL_NEWCATEGORY_NOTIFYCAP',   'Notificar quando novas categorias forem adicionadas.');
define('_MI_ARTICLE_GLOBAL_NEWCATEGORY_NOTIFYDSC',   'Receber notificação quando uma nova categoria é adicionada.');
define('_MI_ARTICLE_GLOBAL_NEWCATEGORY_NOTIFYSBJ',   '[{X_SITENAME}]  Nova categoria adicionada.');

define('_MI_ART_ADMIN_USERNEWARTICLE_NOTIFY',		'Novo artigo enviado.');
define('_MI_ART_ADMIN_USERNEWARTICLE_NOTIFYCAP',	'Notificar os administradores quando um usuário enviar um artigo.');
define('_MI_ART_ADMIN_USERNEWARTICLE_NOTIFYDSC',	'receber notifica quando um usuário enviar um artigo para publicação.');
define('_MI_ART_ADMIN_USERNEWARTICLE_NOTIFYSBJ',	'[{X_SITENAME}] Um usuário enviou um artigo para validação.');


// Config stuff
define('_MI_ART_OPTION_LOGGEDIN',		'Permitir envios anonimos:');
define('_MI_ART_OPTION_LOGGEDINDSC',	'Permitir envios de artigos de usuários anonimos.');
define('_MI_ART_OPTIONALLOWSUB',		'Permitir artigos de usuários');
define('_MI_ART_OPTIONALLOWSUBDSC',		'Permitir que usuários enviem artigos.');
define('_MI_ART_OPTION_ICONSIZE',		'Tamanho do icone de artigo');
define('_MI_ART_OPTION_ICONSIZEDSC',	'Tamanho dos icones nas listas de artigos.');
define('_MI_ART_OPTION_EDITADMIN',		'Editor do administrador.');
define('_MI_ART_OPTION_EDITADMINDSC',	'O editor que será usado na área administrativa. Se um editor de terceiros for selecionado, mas não instalado, o editor padrão será usado.');
define('_MI_ART_OPTION_EDITUSER',		'Editor dos usuários.');
define('_MI_ART_OPTION_EDITUSERDSC',	'O editor que será usado nas áreas de usuário/visitantes. Se um editor de terceiros for selecionado, mas não instalado, o editor padrão será usado.');
define('_MI_ART_OPTION_INDEXVIEW',		'Tipo de exibição da página principal');
define('_MI_ART_OPTION_INDEXVIEWDSC',	'selecione como a pagina principal deve ser mostrada.');
define('_MI_ART_OPTION_INDEXFLAT',		'Inflado');
define('_MI_ART_OPTION_INDEXTHREAD',	'Tópicos');
define('_MI_ART_OPTION_BGCOLOR',		'Background dos artigos');
define('_MI_ART_OPTION_BGCOLORDSC',		'A cor de background para o texto dos artigos.');
define('_MI_ART_OPTION_SHWREADS',		'Mostrar leituras do artigo');
define('_MI_ART_OPTION_SHWREADSDSC',	'mostra o número de vezes que o artigo foi lido.');
define('_MI_ART_OPTION_SHWPOSTED',		'Mostrar data do artigo');
define('_MI_ART_OPTION_SHWPOSTEDSC',	'Mostra quando o artigo foi enviado.');
define('_MI_ART_OPTION_SHWPOSTR',		'Mostrar autor do artigo');
define('_MI_ART_OPTION_SHWPOSTRDSC',	'mostra quem enviou o artigo.');
define('_MI_ART_OPTION_SHWINDRDS',		'Mostrar leituras na lista');
define('_MI_ART_OPTION_SHWINDRDSDSC',	'mostra o número de leituras do artigo na lista principal.');
define('_MI_ART_OPTION_ALLOWEMAIL',		'Permitir email');
define('_MI_ART_OPTION_ALLOWEMAILDSC',	'permite envio de emails para amigo');
define('_MI_ART_OPTION_EMLLOGGEDIN',	'Logado para enviar email');
define('_MI_ART_OPTION_EMLLOGGEDINDSC',	'Usuário precisa estar logado para enviar email para amigo.');
define('_MI_ART_OPTION_EMLOWNMSG',		'Permitir mensagem personalizada');
define('_MI_ART_OPTION_EMLOWNMSGDSC',	'Permite ao usuário incluir uma mensagem personalizada ao email.');
define('_MI_ART_OPTION_EMLMSGSBJCT',	'Assunto do email');
define('_MI_ART_OPTION_EMLMSGSBJCTDSC',	'O texto que irá aparecer no campo assunto do email.');
define('_MI_ART_OPTION_EMLMSGSUBJECT',	'Um amigo te recomendou este Artigo');
define('_MI_ART_OPTION_EMLMSGCHRS',		'Número de caracteres na mensagem personalizada');
define('_MI_ART_OPTION_EMLMSGCHRSDSC',	'o número maximo de caracteres permitidos para a mensagem personalizada.');
define('_MI_ART_OPTION_NOINCADN',		'Não contar as visualizações dos administradores');
define('_MI_ART_OPTION_NOINCADNDSC',	'quando ativo, administradores não terão suas visualizações contadas.');
define('_MI_ART_OPTION_EMAILTXT',		'Mensagem de email');
define('_MI_ART_OPTION_EMAILTXTSC',		'O texto que será enviado no email para um amigo.');
define('_MI_ART_OPTION_EMAILTXTMSG',	'Olá,

Um usuário do {SITE_NAME} achou que a seguinte página podia ser do seu interesse.

{ARTICLE_URL}

Mensagem abaixo:

**

{USER_MESSAGE}

**

Informação de segurança:
Se este email foi enviado inapropriadamente, por favor envie a mesma para {ADMIN_EMAIL}.
Endereço de IP: {USER_IP}
Browser: {USER_BROWSER}
Hora do envio: {USER_TIME}

-- 
 {SITE_NAME} {SITE_URL}');

define('_MI_ART_OPTION_DATEFRMT',	'Formato de data - artigo');
define('_MI_ART_OPTION_DATEFRMTSC',	'Formato de data para os artigos da página inicial. Veja a página de a href="http://www.php.net/date" target="_blank">formatos de data</a> do PHP para ver os diferentes caracteres que você pode usar.');
define('_MI_ART_OPTION_DATEFRMTP',	'Formato de data - Impressão');
define('_MI_ART_OPTION_DATEFRMTPSC',	'Formato de data para a página versão de impressão. Veja a página de a href="http://www.php.net/date" target="_blank">formatos de data</a> do PHP para ver os diferentes caracteres que você pode usar.');
define('_MI_ART_OPTION_ALLWPRT',	'Permitir página de impressão');
define('_MI_ART_OPTION_ALLWPRTDSC',	'permite aos visitantes usar a página versão de impressão. Desabilitar irá também esconder o link de impressão.');


?>
