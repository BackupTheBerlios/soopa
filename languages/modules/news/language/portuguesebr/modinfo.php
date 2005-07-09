<?php
// $Id: modinfo.php,v 1.2 2005/07/09 18:19:21 mauriciodelima Exp $
// Module Info

// The name of this module
define('_MI_NEWS_NAME','Notícias');

// A brief description of this module
define('_MI_NEWS_DESC','Cria um grupo de notícias, onde os usuário podem enviar notícias, comentários e anexar arquivos.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NEWS_BNAME1','Tópicos');
define('_MI_NEWS_BNAME3','Notícia do dia');
define('_MI_NEWS_BNAME4','Notícias mais lidas');
define('_MI_NEWS_BNAME5','Últimas notícias');
define('_MI_NEWS_BNAME6','Notícias pendentes');
define('_MI_NEWS_BNAME7','Navegar pelos tópicos');

// Sub menus in main menu block
define('_MI_NEWS_SMNAME1','Enviar notícia');
define('_MI_NEWS_SMNAME2','Histórico');

// Names of admin menu items
define('_MI_NEWS_ADMENU2', 'Tópicos');
define('_MI_NEWS_ADMENU3', 'Notícias');
define('_MI_NEWS_GROUPPERMS', 'Permissões');
// Added by Hervé for prune option
define('_MI_NEWS_PRUNENEWS', 'Exclusões');
// Added by Hervé
define('_MI_NEWS_EXPORT', 'Exportar XML');

// Title of config items
define('_MI_STORYHOME', 'Selecione o número de notícias a serem mostradas no topo das páginas');
define('_MI_NOTIFYSUBMIT', 'Notificar por e-mail a cada nova notícia?');
define('_MI_DISPLAYNAV', 'Mostrar a caixa de navegação?');
define('_MI_AUTOAPPROVE','Aprovar automaticamente as novas notícias?');
define("_MI_ALLOWEDSUBMITGROUPS", "Grupos de usuários que podem enviar notícias");
define("_MI_ALLOWEDAPPROVEGROUPS", "Grupos com permissão de aprovar notícias");
define("_MI_NEWSDISPLAY", "Alterar a aparência");
define("_MI_NAMEDISPLAY","Nome do autor");
define("_MI_COLUMNMODE","Colunas");
define("_MI_STORYCOUNTADMIN","Número de novas notícias a serem mostradas na administração: ");
define('_MI_UPLOADFILESIZE', 'Tamanho máximo dos anexos em KB (1048576 = 1 Meg)');
define("_MI_UPLOADGROUPS","Grupos com permissão de enviar aquivos");


// Description of each config items
define('_MI_STORYHOMEDSC', 'Selecione o número de notícias na página principal');
define('_MI_NOTIFYSUBMITDSC', 'Selecione ');
define('_MI_DISPLAYNAVDSC', 'Sim, mostra a caixa de navegação no topo de cada página de notícias');
define('_MI_AUTOAPPROVEDSC', 'Aprovar automaticamente as notícias enviadas');
define("_MI_ALLOWEDSUBMITGROUPSDESC", "Selecionados o grupo que poderá enviar notícias");
define("_MI_ALLOWEDAPPROVEGROUPSDESC", "Selecione os grupos com permissão para aprovar as notícias");
define("_MI_NEWSDISPLAYDESC", "Clássica mostra todas as notícias por data de publicação. Moderna, agrupa as notícia por tópicos, mostrando só as mais recente em tamanho original.");
define('_MI_ADISPLAYNAMEDSC', 'Selecione como serão mostrados os nomes dos autores');
define("_MI_COLUMNMODE_DESC","Escolher com quantas colunas será mostrada a lista de notícia. Disponível só no layout clássico.");
define("_MI_STORYCOUNTADMIN_DESC","");
define("_MI_UPLOADFILESIZE_DESC","");
define("_MI_UPLOADGROUPS_DESC","Selecione os grupos que poderão anexar arquivos nas notícias");

// Name of config item values
define("_MI_NEWSCLASSIC", "Clássico");
define("_MI_NEWSBYTOPIC", "Moderno");
define("_MI_DISPLAYNAME1", "Apelido");
define("_MI_DISPLAYNAME2", "Nome commpleto");
define("_MI_DISPLAYNAME3", "Não mostrar o nome do autor");
define("_MI_UPLOAD_GROUP1","Editores e redatores");
define("_MI_UPLOAD_GROUP2","Apenas os editores");
define("_MI_UPLOAD_GROUP3","O envio de arquivos está desabilitado.");

// Text for notifications

define('_MI_NEWS_GLOBAL_NOTIFY', 'Geral');
define('_MI_NEWS_GLOBAL_NOTIFYDSC', 'Opções gerais dos avisos de notícias.');

define('_MI_NEWS_STORY_NOTIFY', 'Notícia');
define('_MI_NEWS_STORY_NOTIFYDSC', 'Opções de aviso que se aplicam a esta notícia.');

define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY', 'Novo tópico');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Quando criar um tópico.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receber aviso de um novo tópico for criado.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso automático: um novo tópico foi criado na seção de notícias.');

define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY', 'Nova notícia enviada');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Quando uma notícia aguardar por aprovação.');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Receber aviso quando uma nova notícia for enviado (esperando por aprovação).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso automático: uma nova notícia foi enviada...');

define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY', 'Última notícia');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP', 'Quando notícias forem publicadas.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC', 'Receber aviso quando uma nova notícia for enviado.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso automático: uma nova notícia foi publicada.');

define('_MI_NEWS_STORY_APPROVE_NOTIFY', 'Notícia aprovada');
define('_MI_NEWS_STORY_APPROVE_NOTIFYCAP', 'Quando esta notícia for aprovada.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYDSC', 'Receber aviso quando esta notícia for aprovada.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso automático: notícia aprovada.');

define('_MI_RESTRICTINDEX', 'Mostrar os tópicos apenas na página inicial das notícias?');
define('_MI_RESTRICTINDEXDSC', 'Sim, para os usuários ver somente os artigos alistados nos tópicos, ajustados nas permissões das notícia.');

define('_MI_NEWSBYTHISAUTHOR', 'Notícias do mesmo autor');
define('_MI_NEWSBYTHISAUTHORDSC', 'Se você habilitou essa opção, então um link \'Notícias deste autor\' estará visível');

define('_MI_NEWS_PREVNEX_LINK','Mostrar links de próximo e anterior?');
define('_MI_NEWS_PREVNEX_LINK_DESC','Quando está opção é habilitada, dois novos links estarão visíveis no fim de cada artigo. Estes links serão usados para ir para o artigo anterior e próximo de acordo com a data publicada.');
define('_MI_NEWS_SUMMARY_SHOW','Mostrar tabela de resumo?');
define('_MI_NEWS_SUMMARY_SHOW_DESC','Quando você usa esta opção, um resumo contendo links para todos artigos publicados recentementes estará visível no fim de cada artigo.');
define('_MI_NEWS_AUTHOR_EDIT','Habilitar autores a editar suas publicações?');
define('_MI_NEWS_AUTHOR_EDIT_DESC','Com esta opção, autores podem editar seus posts.');
define('_MI_NEWS_RATE_NEWS','Habilitar usuários a avaliar noticias?');
define('_MI_NEWS_TOPICS_RSS','Habilitar RSS feeds por tópicos?');
define('_MI_NEWS_TOPICS_RSS_DESC',"Se você habilitar esta opção então o conteúdo dos topicos estarão disponíveis como RSS feeds");
define('_MI_NEWS_DATEFORMAT', "Formato de data");
define('_MI_NEWS_DATEFORMAT_DESC',"Por favor, procure a documentação do PHP (http://fr.php.net/manual/en/function.date.php) para mais informações sobre como selecionar um formato. Se você não digitar algo então a opção padrão será usada.");
define('_MI_NEWS_META_DATA', "Habilitar meta dados (palavras chave e descrição) ?");
define('_MI_NEWS_META_DATA_DESC', "Se esta opção é habilitadas então os aprovadores poderão entrar com meta dados: palavras chave e descrição");
define('_MI_NEWS_BNAME8','Recent articles in a topic');
define('_MI_NEWS_NEWSLETTER','Informativo');
define('_MI_NEWS_STATS','Estatisticas');
define("_MI_NEWS_FORM_OPTIONS","Opção de formulario");
define("_MI_NEWS_FORM_COMPACT","Compacto");
define("_MI_NEWS_FORM_DHTML","DHTML");
define("_MI_NEWS_FORM_SPAW","Editor SPAWN");
define("_MI_NEWS_FORM_HTMLAREA","Editor html area");
define("_MI_NEWS_FORM_FCK","Editor FCK");
define("_MI_NEWS_FORM_KOIVI","Editor Koivi");
define("_MI_NEWS_FORM_OPTIONS_DESC","Selecione o editor a ser usado. Note que instalações simples apenas funcionarão com a opção de DHTML e compacto");
define("_MI_NEWS_KEYWORDS_HIGH","Usar realçe de palavras chave?");
define("_MI_NEWS_KEYWORDS_HIGH_DESC","Se você usar esta opção então as palavras chave digitadas na seção de procura serão realçadas nos artigos");
define("_MI_NEWS_HIGH_COLOR","Cor usada para realçar palavras chave");
define("_MI_NEWS_HIGH_COLOR_DES","Apenas use esta opção se você habilitou a opção anterior");
define("_MI_NEWS_INFOTIPS","Tamanho das dicas");
define("_MI_NEWS_INFOTIPS_DES","Se você usar esta opção, links relacionados a noticia irão conter os primeiros caracteres do artigo. Se você usar o valor 0 as dicas ficarão vazias");
define("_MI_NEWS_SITE_NAVBAR","Usar a barra de navegação do mozilla e do opera?");
define("_MI_NEWS_SITE_NAVBAR_DESC","Se você habilitar esta opção, os visitantes com estes navegadores poderão utilizar a barra de navegação.");
define("_MI_NEWS_TABS_SKIN","Selecione o visual para usar nas tabs");
define("_MI_NEWS_TABS_SKIN_DESC","Este visual será usado por todos blocos que usam tabs");
define("_MI_NEWS_SKIN_1","Estilo da barra");
define("_MI_NEWS_SKIN_2","Chanfrado");
define("_MI_NEWS_SKIN_3","Classico");
define("_MI_NEWS_SKIN_4","Pastas");
define("_MI_NEWS_SKIN_5","MacOs");
define("_MI_NEWS_SKIN_6","Plano");
define("_MI_NEWS_SKIN_7","Redondo");
define("_MI_NEWS_SKIN_8","Estilo ZDnet");
?>
