<?php
// $Id: modinfo.php,v 1.2 2005/07/09 18:19:21 mauriciodelima Exp $
// Module Info

// The name of this module
define('_MI_NEWS_NAME','Not�cias');

// A brief description of this module
define('_MI_NEWS_DESC','Cria um grupo de not�cias, onde os usu�rio podem enviar not�cias, coment�rios e anexar arquivos.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NEWS_BNAME1','T�picos');
define('_MI_NEWS_BNAME3','Not�cia do dia');
define('_MI_NEWS_BNAME4','Not�cias mais lidas');
define('_MI_NEWS_BNAME5','�ltimas not�cias');
define('_MI_NEWS_BNAME6','Not�cias pendentes');
define('_MI_NEWS_BNAME7','Navegar pelos t�picos');

// Sub menus in main menu block
define('_MI_NEWS_SMNAME1','Enviar not�cia');
define('_MI_NEWS_SMNAME2','Hist�rico');

// Names of admin menu items
define('_MI_NEWS_ADMENU2', 'T�picos');
define('_MI_NEWS_ADMENU3', 'Not�cias');
define('_MI_NEWS_GROUPPERMS', 'Permiss�es');
// Added by Herv� for prune option
define('_MI_NEWS_PRUNENEWS', 'Exclus�es');
// Added by Herv�
define('_MI_NEWS_EXPORT', 'Exportar XML');

// Title of config items
define('_MI_STORYHOME', 'Selecione o n�mero de not�cias a serem mostradas no topo das p�ginas');
define('_MI_NOTIFYSUBMIT', 'Notificar por e-mail a cada nova not�cia?');
define('_MI_DISPLAYNAV', 'Mostrar a caixa de navega��o?');
define('_MI_AUTOAPPROVE','Aprovar automaticamente as novas not�cias?');
define("_MI_ALLOWEDSUBMITGROUPS", "Grupos de usu�rios que podem enviar not�cias");
define("_MI_ALLOWEDAPPROVEGROUPS", "Grupos com permiss�o de aprovar not�cias");
define("_MI_NEWSDISPLAY", "Alterar a apar�ncia");
define("_MI_NAMEDISPLAY","Nome do autor");
define("_MI_COLUMNMODE","Colunas");
define("_MI_STORYCOUNTADMIN","N�mero de novas not�cias a serem mostradas na administra��o: ");
define('_MI_UPLOADFILESIZE', 'Tamanho m�ximo dos anexos em KB (1048576 = 1 Meg)');
define("_MI_UPLOADGROUPS","Grupos com permiss�o de enviar aquivos");


// Description of each config items
define('_MI_STORYHOMEDSC', 'Selecione o n�mero de not�cias na p�gina principal');
define('_MI_NOTIFYSUBMITDSC', 'Selecione ');
define('_MI_DISPLAYNAVDSC', 'Sim, mostra a caixa de navega��o no topo de cada p�gina de not�cias');
define('_MI_AUTOAPPROVEDSC', 'Aprovar automaticamente as not�cias enviadas');
define("_MI_ALLOWEDSUBMITGROUPSDESC", "Selecionados o grupo que poder� enviar not�cias");
define("_MI_ALLOWEDAPPROVEGROUPSDESC", "Selecione os grupos com permiss�o para aprovar as not�cias");
define("_MI_NEWSDISPLAYDESC", "Cl�ssica mostra todas as not�cias por data de publica��o. Moderna, agrupa as not�cia por t�picos, mostrando s� as mais recente em tamanho original.");
define('_MI_ADISPLAYNAMEDSC', 'Selecione como ser�o mostrados os nomes dos autores');
define("_MI_COLUMNMODE_DESC","Escolher com quantas colunas ser� mostrada a lista de not�cia. Dispon�vel s� no layout cl�ssico.");
define("_MI_STORYCOUNTADMIN_DESC","");
define("_MI_UPLOADFILESIZE_DESC","");
define("_MI_UPLOADGROUPS_DESC","Selecione os grupos que poder�o anexar arquivos nas not�cias");

// Name of config item values
define("_MI_NEWSCLASSIC", "Cl�ssico");
define("_MI_NEWSBYTOPIC", "Moderno");
define("_MI_DISPLAYNAME1", "Apelido");
define("_MI_DISPLAYNAME2", "Nome commpleto");
define("_MI_DISPLAYNAME3", "N�o mostrar o nome do autor");
define("_MI_UPLOAD_GROUP1","Editores e redatores");
define("_MI_UPLOAD_GROUP2","Apenas os editores");
define("_MI_UPLOAD_GROUP3","O envio de arquivos est� desabilitado.");

// Text for notifications

define('_MI_NEWS_GLOBAL_NOTIFY', 'Geral');
define('_MI_NEWS_GLOBAL_NOTIFYDSC', 'Op��es gerais dos avisos de not�cias.');

define('_MI_NEWS_STORY_NOTIFY', 'Not�cia');
define('_MI_NEWS_STORY_NOTIFYDSC', 'Op��es de aviso que se aplicam a esta not�cia.');

define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY', 'Novo t�pico');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Quando criar um t�pico.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receber aviso de um novo t�pico for criado.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso autom�tico: um novo t�pico foi criado na se��o de not�cias.');

define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY', 'Nova not�cia enviada');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Quando uma not�cia aguardar por aprova��o.');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Receber aviso quando uma nova not�cia for enviado (esperando por aprova��o).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso autom�tico: uma nova not�cia foi enviada...');

define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY', '�ltima not�cia');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP', 'Quando not�cias forem publicadas.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC', 'Receber aviso quando uma nova not�cia for enviado.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso autom�tico: uma nova not�cia foi publicada.');

define('_MI_NEWS_STORY_APPROVE_NOTIFY', 'Not�cia aprovada');
define('_MI_NEWS_STORY_APPROVE_NOTIFYCAP', 'Quando esta not�cia for aprovada.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYDSC', 'Receber aviso quando esta not�cia for aprovada.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso autom�tico: not�cia aprovada.');

define('_MI_RESTRICTINDEX', 'Mostrar os t�picos apenas na p�gina inicial das not�cias?');
define('_MI_RESTRICTINDEXDSC', 'Sim, para os usu�rios ver somente os artigos alistados nos t�picos, ajustados nas permiss�es das not�cia.');

define('_MI_NEWSBYTHISAUTHOR', 'Not�cias do mesmo autor');
define('_MI_NEWSBYTHISAUTHORDSC', 'Se voc� habilitou essa op��o, ent�o um link \'Not�cias deste autor\' estar� vis�vel');

define('_MI_NEWS_PREVNEX_LINK','Mostrar links de pr�ximo e anterior?');
define('_MI_NEWS_PREVNEX_LINK_DESC','Quando est� op��o � habilitada, dois novos links estar�o vis�veis no fim de cada artigo. Estes links ser�o usados para ir para o artigo anterior e pr�ximo de acordo com a data publicada.');
define('_MI_NEWS_SUMMARY_SHOW','Mostrar tabela de resumo?');
define('_MI_NEWS_SUMMARY_SHOW_DESC','Quando voc� usa esta op��o, um resumo contendo links para todos artigos publicados recentementes estar� vis�vel no fim de cada artigo.');
define('_MI_NEWS_AUTHOR_EDIT','Habilitar autores a editar suas publica��es?');
define('_MI_NEWS_AUTHOR_EDIT_DESC','Com esta op��o, autores podem editar seus posts.');
define('_MI_NEWS_RATE_NEWS','Habilitar usu�rios a avaliar noticias?');
define('_MI_NEWS_TOPICS_RSS','Habilitar RSS feeds por t�picos?');
define('_MI_NEWS_TOPICS_RSS_DESC',"Se voc� habilitar esta op��o ent�o o conte�do dos topicos estar�o dispon�veis como RSS feeds");
define('_MI_NEWS_DATEFORMAT', "Formato de data");
define('_MI_NEWS_DATEFORMAT_DESC',"Por favor, procure a documenta��o do PHP (http://fr.php.net/manual/en/function.date.php) para mais informa��es sobre como selecionar um formato. Se voc� n�o digitar algo ent�o a op��o padr�o ser� usada.");
define('_MI_NEWS_META_DATA', "Habilitar meta dados (palavras chave e descri��o) ?");
define('_MI_NEWS_META_DATA_DESC', "Se esta op��o � habilitadas ent�o os aprovadores poder�o entrar com meta dados: palavras chave e descri��o");
define('_MI_NEWS_BNAME8','Recent articles in a topic');
define('_MI_NEWS_NEWSLETTER','Informativo');
define('_MI_NEWS_STATS','Estatisticas');
define("_MI_NEWS_FORM_OPTIONS","Op��o de formulario");
define("_MI_NEWS_FORM_COMPACT","Compacto");
define("_MI_NEWS_FORM_DHTML","DHTML");
define("_MI_NEWS_FORM_SPAW","Editor SPAWN");
define("_MI_NEWS_FORM_HTMLAREA","Editor html area");
define("_MI_NEWS_FORM_FCK","Editor FCK");
define("_MI_NEWS_FORM_KOIVI","Editor Koivi");
define("_MI_NEWS_FORM_OPTIONS_DESC","Selecione o editor a ser usado. Note que instala��es simples apenas funcionar�o com a op��o de DHTML e compacto");
define("_MI_NEWS_KEYWORDS_HIGH","Usar real�e de palavras chave?");
define("_MI_NEWS_KEYWORDS_HIGH_DESC","Se voc� usar esta op��o ent�o as palavras chave digitadas na se��o de procura ser�o real�adas nos artigos");
define("_MI_NEWS_HIGH_COLOR","Cor usada para real�ar palavras chave");
define("_MI_NEWS_HIGH_COLOR_DES","Apenas use esta op��o se voc� habilitou a op��o anterior");
define("_MI_NEWS_INFOTIPS","Tamanho das dicas");
define("_MI_NEWS_INFOTIPS_DES","Se voc� usar esta op��o, links relacionados a noticia ir�o conter os primeiros caracteres do artigo. Se voc� usar o valor 0 as dicas ficar�o vazias");
define("_MI_NEWS_SITE_NAVBAR","Usar a barra de navega��o do mozilla e do opera?");
define("_MI_NEWS_SITE_NAVBAR_DESC","Se voc� habilitar esta op��o, os visitantes com estes navegadores poder�o utilizar a barra de navega��o.");
define("_MI_NEWS_TABS_SKIN","Selecione o visual para usar nas tabs");
define("_MI_NEWS_TABS_SKIN_DESC","Este visual ser� usado por todos blocos que usam tabs");
define("_MI_NEWS_SKIN_1","Estilo da barra");
define("_MI_NEWS_SKIN_2","Chanfrado");
define("_MI_NEWS_SKIN_3","Classico");
define("_MI_NEWS_SKIN_4","Pastas");
define("_MI_NEWS_SKIN_5","MacOs");
define("_MI_NEWS_SKIN_6","Plano");
define("_MI_NEWS_SKIN_7","Redondo");
define("_MI_NEWS_SKIN_8","Estilo ZDnet");
?>
