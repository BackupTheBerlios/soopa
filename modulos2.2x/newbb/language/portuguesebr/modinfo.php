<?php
// $Id: modinfo.php,v 1.1 2005/07/13 03:55:49 mauriciodelima Exp $
// Thanks Tom (http://www.wf-projects.com), for correcting the Engligh language package

// Module Info

// The name of this module
define("_MI_NEWBB_NAME","F�rum");

// A brief description of this module
define("_MI_NEWBB_DESC","M�dulo de F�rum para XOOPS");

// Names of blocks for this module (Not all module has blocks)
define("_MI_NEWBB_BLOCK_TOPIC_POST","�ltimas respostas");
define("_MI_NEWBB_BLOCK_TOPIC","T�picos recentes");
define("_MI_NEWBB_BLOCK_POST","�ltimas Postagens");
define("_MI_NEWBB_BLOCK_AUTHOR","Autores");
/*
define("_MI_NEWBB_BNAME2","T�picos mais ativos");
define("_MI_NEWBB_BNAME3","T�picos mais visitados");
define("_MI_NEWBB_BNAME4","T�picos privativos recentes");
define("_MI_NEWBB_BNAME5","�ltimos t�picos fixos");
define("_MI_NEWBB_BNAME6","Novas mensagens");
define("_MI_NEWBB_BNAME7","Usu�rios com mais t�picos");
define("_MI_NEWBB_BNAME8","Usu�rios com mais mensagens");
define("_MI_NEWBB_BNAME9","Usu�rios com mais resumos");
define("_MI_NEWBB_BNAME10","Usu�rios com mais t�picos fixos");
define("_MI_NEWBB_BNAME11","�ltimas mensagens - com texto");
*/

// Names of admin menu items
define("_MI_NEWBB_ADMENU_INDEX","�ndice");
define("_MI_NEWBB_ADMENU_CATEGORY","Categorias");
define("_MI_NEWBB_ADMENU_FORUM","F�runs");
define("_MI_NEWBB_ADMENU_PERMISSION","Permiss�es");
define("_MI_NEWBB_ADMENU_BLOCK","Blocos");
define("_MI_NEWBB_ADMENU_ORDER","Reorganiza��o");
define("_MI_NEWBB_ADMENU_SYNC","Sincronizar");
define("_MI_NEWBB_ADMENU_PRUNE","Exclus�es");
define("_MI_NEWBB_ADMENU_REPORT","Relat�rios");
define("_MI_NEWBB_ADMENU_DIGEST","Resumo");
define("_MI_NEWBB_ADMENU_VOTE","Vota��es");



//config options

define("_MI_DO_DEBUG","Modo de testes (debug)");
define("_MI_DO_DEBUG_DESC","Exibir mensagens de erro");

define("_MI_IMG_SET","Conjunto de Imagens");
define("_MI_IMG_SET_DESC","Selecione o conjunto de imagens a ser usado");
define("_MI_DIR_ATTACHMENT","Caminho f�sico para anexos");
define("_MI_DIR_ATTACHMENT_DESC","� necess�rio somente o caminho ap�s o diret�rio raiz do site. Se os anexos devem ficar em www.seusite.com.br/uploads/newbb, informe somente '/uploads/newbb' (sem a '/'). As miniaturas ficar�o em '/uploads/newbb/thumbs'.");
define("_MI_PATH_MAGICK","Caminho para ImageMagick");
define("_MI_PATH_MAGICK_DESC","Geralmente � '/usr/bin/X11/'. Deixe em branco se voc� n�o tem o ImageMagicK instalado ou para autodetec��o.");

define("_MI_SUBFORUM_DISPLAY","Modo de exibi��o dos sub-f�runs na p�gina inicial");
define("_MI_SUBFORUM_DISPLAY_DESC","");
define("_MI_SUBFORUM_EXPAND","Desagrupar");
define("_MI_SUBFORUM_COLLAPSE","Agrupar");
define("_MI_SUBFORUM_HIDDEN","Ocultar");

define("_MI_POST_EXCERPT","Trecho de mensagem na p�gina do f�rum");
define("_MI_POST_EXCERPT_DESC","Largura de parte da mensagem que ser� mostrada ao passar o mouse. 0 para desativar.");

define("_MI_PATH_NETPBM","Caminho para NetPBM");
define("_MI_PATH_NETPBM_DESC","Geralmente � '/usr/bin'. Deixe em branco se voc� n�o tem o NetPBM instalado ou para autodetec��o.");

define("_MI_IMAGELIB","Selecione a biblioteca de imagem a ser usada");
define("_MI_IMAGELIB_DESC","Seleciona a biblioteca de fun��es de tratamento de imagens para cria��o de miniaturas ou para sele��o autom�tica.");

define("_MI_MAX_IMG_WIDTH","Largura m�xima da imagem");
define("_MI_MAX_IMG_WIDTH_DESC", "Configure a <strong>largura</strong> m�xima permitida para imagem, do contr�rio ser� usado uma miniatura.<br>Informe 0 se voc� n�o quer sejam criadas miniaturas das imagens.");

define("_MI_MAX_IMAGE_WIDTH","Largura m�xima cria��o de miniatura");
define("_MI_MAX_IMAGE_WIDTH_DESC", "Configure a <strong>largura</strong> m�xima para cria��o de uma miniatura da imagem. <br >Se a imagem for menor n�o ser� criada miniatura.");

define("_MI_MAX_IMAGE_HEIGHT","Altura m�xima cria��o de miniatura");
define("_MI_MAX_IMAGE_HEIGHT_DESC", "Configure a <strong>altura</strong> m�xima para cria��o de uma miniatura da imagem. <br >Se a imagem for menor n�o ser� criada miniatura.");

define("_MI_SHOW_DIS","Mostrar Declara��o de Isen��o de Responsabilidade");
define("_MI_DISCLAIMER","Declara��o de Isen��o de Responsabilidade");
define("_MI_DISCLAIMER_DESC","Insira a Declara��o que ser� mostrada conforme acima selecionado.");
define("_MI_DISCLAIMER_TEXT", "Este f�rum cont�m muitas informa��es �teis. <br /><br />Pedimos evitar a cria��o de t�picos com assuntos j� abordados anteriormente, efetuando uma busca no f�rum antes de criar de um novo t�pico.");
define("_MI_NONE","Nenhum");
define("_MI_POST","Novos T�picos");
define("_MI_REPLY","Respostas");
define("_MI_OP_BOTH","Ambos");
define("_MI_WOL_ENABLE","Ativar 'Usu�rios online'");
define("_MI_WOL_ENABLE_DESC","Ativa bloco 'Quem est� online' mostrado abaixo na p�gina inicial do F�rum");
define("_MI_WOL_ADMIN_COL","Cor de destaque do Administrador");
define("_MI_WOL_ADMIN_COL_DESC","Cor dos administradores que aparecerem no bloco 'Quem est� online'");
define("_MI_WOL_MOD_COL","Cor de destaque do Moderador");
define("_MI_WOL_MOD_COL_DESC","Cor dos moderadores que aparecerem no bloco 'Quem est� online'");
//define("_MI_LEVELS_ENABLE", "Ativar n�veis de HP/MP/EXP");
//define("_MI_LEVELS_ENABLE_DESC", "<strong>HP</b> � determinado pela m�dia di�ria de mensagens.<br /><strong>MP</b> � determinado pelas mensagens enviadas desde o cadastramento.<br /><strong>EXP</strong> sobe toda vez que voc� envia uma mensagem, e quando chega a  100%, voc� sobe um nivel e EXP cai para 0 novamente.");
define("_MI_NULL", "desativado");
define("_MI_TEXT", "texto");
define("_MI_GRAPHIC", "imagem");
define("_MI_USERLEVEL", "Exibi��o de n�veis HP/MP/EXP");
define("_MI_USERLEVEL_DESC", "<strong>HP</strong> � a m�dia de mensagens por dia.<br /><strong>MP</strong> � determinado pelo total de mensagens em rela��o � data de cadastramento.<br /><strong>EXP</strong> sobre a cada mensagem e quando chega a 100% aumenta o n�vel e volta a 0.");
define("_MI_RSS_ENABLE","Ativar RSS");
define("_MI_RSS_ENABLE_DESC","Ativa RSS com o n�mero m�ximo de itens e tamanho da descri��o conforme abaixo");
define("_MI_RSS_MAX_ITEMS", "Quantidade m�xima de itens");
define("_MI_RSS_MAX_DESCRIPTION", "Tamanho m�ximo da descri��o");
define("_MI_RSS_UTF8", "Codifica��o de RSS com UTF-8");
define("_MI_RSS_UTF8_DESCRIPTION", "'UTF-8' ser� usado, se n�o ser� usado '"._CHARSET."' como padr�o de codifica��o.");
define("_MI_RSS_CACHETIME", "Tempo de cache do RSS");
define("_MI_RSS_CACHETIME_DESCRIPTION", "Intervalo de tempo para atualiza��o do RSS, em minutos.");

define("_MI_MEDIA_ENABLE","Ativar fun��es de m�dia");
define("_MI_MEDIA_ENABLE_DESC","Exibe imagens anexadas na pr�pria mensagem.");
define("_MI_USERBAR_ENABLE","Ativar barras de usu�rio");
define("_MI_USERBAR_ENABLE_DESC","Exibe barra de usu�rio expandida: Perfil, MP, ICQ, MSN, etc.");

define("_MI_GROUPBAR_ENABLE","Ativar informa��es de grupos");
define("_MI_GROUPBAR_ENABLE_DESC","Exibe grupos do usu�rio nas informa��es sobre a mensagem.");

define("_MI_RATING_ENABLE","Ativar fun��o de avalia��o");
define("_MI_RATING_ENABLE_DESC","Permite avaliar um t�pico");

define("_MI_VIEWMODE","Modo de visualiza��o dos t�picos");
define("_MI_VIEWMODE_DESC","Para ignorar o modo de exibi��o de Configura��es Gerais para os t�picos.");
define("_MI_COMPACT","Compacto");

define("_MI_MENUMODE","Modo padr�o de exibi��o do Menu");
define("_MI_MENUMODE_DESC","'SELECT' - Caixa de Sele��o, 'HOVER' - Mais lento no IE, 'CLICK' - requer JavaScript");

define("_MI_REPORTMOD_ENABLE","Relat�rio de mensagens para Moderador");
define("_MI_REPORTMOD_ENABLE_DESC","O usu�rio pode enviar uma mensagem ao moderador para que esse tome as medidas cab�veis");
define("_MI_SHOW_JUMPBOX", "Exibir Caixa de Sele��o de F�runs");
define("_MI_JUMPBOXDESC", "Se ativado, um menu drop-down permitir� aos usu�rios o acesso a outro f�rum a partir de um f�rum ou t�pico");

define("_MI_SHOW_PERMISSIONTABLE", "Exibir permiss�es");
define("_MI_SHOW_PERMISSIONTABLE_DESC", "Acrescenta uma lista de permiss�es do usu�rio");

define("_MI_EMAIL_DIGEST", "Resumo as mensages por e-mail");
define("_MI_EMAIL_DIGEST_DESC", "Configure a periodicidade para envio de envio de resumos do f�rum para os usu�rios");
define("_MI_NEWBB_EMAIL_NONE", "Nunca");
define("_MI_NEWBB_EMAIL_DAILY", "Diariamente");
define("_MI_NEWBB_EMAIL_WEEKLY", "Semanalmente");

define("_MI_SHOW_IP", "Exibir IP do usu�rio");
define("_MI_SHOW_IP_DESC", "Se ativado, o IP dos usu�rios ser� mostrado aos Moderadores");

define("_MI_ENABLE_KARMA", "Ativar verifica��o de Karma");
define("_MI_ENABLE_KARMA_DESC", "Permite que o usu�rio configure a pontua��o de Karma requerida para ler a mensagem");

define("_MI_KARMA_OPTIONS", "Op��es de pontua��es de Karma por envios");
define("_MI_KARMA_OPTIONS_DESC", "Use ',' como delimitador para as op��es. Deixe em branco para desabilitar esta op��o");

define("_MI_SINCE_OPTIONS", "Op��es para 'Desde' filtro de t�picos e procura");
define("_MI_SINCE_OPTIONS_DESC", "Positivo para dias e negativo para horas. Use ',' como delimitador.");

define("_MI_SINCE_DEFAULT", "Valor padr�o para 'Desde'");
define("_MI_SINCE_DEFAULT_DESC", "Valor usado quando n�o especificado pelos usu�rios.");

define("_MI_MODERATOR_HTML", "Ativar HTML para moderadores");
define("_MI_MODERATOR_HTML_DESC", "Permite que moderadores usem HTML no assunto da mensagem");

define("_MI_USER_ANONYMOUS", "Ativar envio de mensagens como an�nimo");
define("_MI_USER_ANONYMOUS_DESC", "Permite que um usu�rio registrado envie mensagens como an�nimo");

define("_MI_ANONYMOUS_PRE", "Ativar uso de Prefixo para an�nimos");
define("_MI_ANONYMOUS_PRE_DESC", "Permite que usu�rios an�nimos adicionem prefixo nos t�picos");

define("_MI_REQUIRE_REPLY", "Ativar requisito de resposta para ler um t�pico");
define("_MI_REQUIRE_REPLY_DESC", "Permite que um usu�rio solicite resposta antes da leitura do t�pico");

define("_MI_EDIT_TIMELIMIT", "Ativar limite de tempo para editar uma mensagem");
define("_MI_EDIT_TIMELIMIT_DESC", "Permite ajustar um tempo m�ximo, em minutos, para edi��o da mensagem.");

define("_MI_DELETE_TIMELIMIT", "Ativar limite de tempo para excluir uma mensagem");
define("_MI_DELETE_TIMELIMIT_DESC", "Permite ajustar um tempo m�ximo, em minutos, para exclus�o da mensagem.");

define("_MI_POST_TIMELIMIT", "Ativar limite de tempo para mensagens consecutivas");
define("_MI_POST_TIMELIMIT_DESC", "Permite ajustar um tempo m�ximo, em segundos, para mensagnes consecutivas.");

define("_MI_RECORDEDIT_TIMELIMIT", "Ativar limite de tempo para informa��o de edi��o");
define("_MI_RECORDEDIT_TIMELIMIT_DESC", "Permite ajustar um tempo m�ximo, em segundos, para n�o incluir informa��o sobre edi��o da mensagem");

define("_MI_SUBJECT_PREFIX", "Incluir prefixo no assunto do t�pico");
define("_MI_SUBJECT_PREFIX_DESC", "Permite incluir um prefixo [solucionado] no in�cio do assunto.<br>Use ',' como delimitador para mais de uma op��o ou 'NONE' para desabilitar.");
define("_MI_SUBJECT_PREFIX_DEFAULT", '<font color="#00CC00">[Ok]</font>,<font color="#00CC00">[aguardando]</font>,<font color="#FF0000">[pedido]</font>,<font color="#FF0000">[bug]</font>,<font color="#FF0000">[pendente]</font>');

define("_MI_SUBJECT_PREFIX_LEVEL", "Grupos que podem usar Prefixo");
define("_MI_SUBJECT_PREFIX_LEVEL_DESC", "Selecione os grupos que podem usar Prefixo.");
define("_MI_SPL_DISABLE", 'Desativado');
define("_MI_SPL_ANYONE", 'Todos');
define("_MI_SPL_MEMBER", 'Usu�rios');
define("_MI_SPL_MODERATOR", 'Moderadores');
define("_MI_SPL_ADMIN", 'Administradores');

define("_MI_SHOW_REALNAME", "Exibir nome completo");
define("_MI_SHOW_REALNAME_DESC", "Use nome completo nas mensagens, em vez do nome do usu�rio.");

define("_MI_CACHE_ENABLE", "Ativar cache");
define("_MI_CACHE_ENABLE_DESC", "Grava dados tempor�rios da sess�o para agilizar pesquisas.");

define("_MI_QUICKREPLY_ENABLE", "Ativar resposta r�pida");
define("_MI_QUICKREPLY_ENABLE_DESC", "Inclui formul�rio de resposta r�pida no rodap� do t�pico");

define("_MI_POSTSPERPAGE","Mensagens por p�gina");
define("_MI_POSTSPERPAGE_DESC","N�mero m�ximo de mensagens a serem exibidas em cada p�gina");

define("_MI_POSTSFORTHREAD","Mensagens por t�pico");
define("_MI_POSTSFORTHREAD_DESC","Ser� usado modo agrupado se for excedido este n�mero");

define("_MI_TOPICSPERPAGE","T�picos por p�gina");
define("_MI_TOPICSPERPAGE_DESC","N�mero m�ximo de t�picos a serem exibidos em cada p�gina");

define("_MI_IMG_TYPE","Formato de imagens");
define("_MI_IMG_TYPE_DESC","Selecione o tipo de imagens para bot�es do f�rum.<br />- png: para servidores r�pidos;<br />- gif: para velocidade normal;<br />- auto: GIF para Internet Explorer e and PNG para outros browsers");

define("_MI_PNGFORIE_ENABLE","Ativar hack de PNG");
define("_MI_PNGFORIE_ENABLE_DESC","Permitir transpar�ncia em PNG para Internet Explorer");

define("_MI_FORM_OPTIONS","Op��es de formul�rio");
define("_MI_FORM_OPTIONS_DESC","Tipos de formul�rios que os usu�rios poder�o usar para escrever, editar ou responder.");
define("_MI_FORM_COMPACT","Compacto");
define("_MI_FORM_DHTML","DHTML");
define("_MI_FORM_SPAW","Spaw Editor");
define("_MI_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_FORM_FCK","FCK Editor");
define("_MI_FORM_KOIVI","Koivi Editor");
define("_MI_FORM_TINYMCE","TinyMCE Editor");

define("_MI_MAGICK","ImageMagick");
define("_MI_NETPBM","NetPBM");
define("_MI_GD1","Biblioteca GD1");
define("_MI_GD2","Biblioteca GD2");
define("_MI_AUTO","AUTO");

define("_MI_WELCOMEFORUM","F�rum para apresenta��o de novo usu�rio");
define("_MI_WELCOMEFORUM_DESC","Um perfil ser� publicado quando um novo acessar o f�rum pela primeira vez.");


// RMV-NOTIFY
// Notification event descriptions and mail templates

define ('_MI_NEWBB_THREAD_NOTIFY', 'T�pico');
define ('_MI_NEWBB_THREAD_NOTIFYDSC', 'Op��es de aviso aplic�veis neste t�pico.');

define ('_MI_NEWBB_FORUM_NOTIFY', 'F�rum');
define ('_MI_NEWBB_FORUM_NOTIFYDSC', 'Op��es de aviso aplic�veis neste f�rum.');

define ('_MI_NEWBB_GLOBAL_NOTIFY', 'Geral');
define ('_MI_NEWBB_GLOBAL_NOTIFYDSC', 'Op��es gerais de aviso do F�rum.');

define ('_MI_NEWBB_THREAD_NEWPOST_NOTIFY', 'Nova Mensagem');
define ('_MI_NEWBB_THREAD_NEWPOST_NOTIFYCAP', 'Avise-me sobre novas mensagens neste t�pico.');
define ('_MI_NEWBB_THREAD_NEWPOST_NOTIFYDSC', 'Receba avisos de novas mensagens no t�pico atual.');
define ('_MI_NEWBB_THREAD_NEWPOST_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso: Nova mensagem no t�pico');

define ('_MI_NEWBB_FORUM_NEWTHREAD_NOTIFY', 'Novo T�pico');
define ('_MI_NEWBB_FORUM_NEWTHREAD_NOTIFYCAP', 'Avise-me sobre novos t�picos deste f�rum.');
define ('_MI_NEWBB_FORUM_NEWTHREAD_NOTIFYDSC', 'Receba aviso quando um novo t�pico for iniciado no f�rum atual.');
define ('_MI_NEWBB_FORUM_NEWTHREAD_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso: Novo t�pico no f�rum');

define ('_MI_NEWBB_GLOBAL_NEWFORUM_NOTIFY', 'Novo F�rum');
define ('_MI_NEWBB_GLOBAL_NEWFORUM_NOTIFYCAP', 'Avise-me sobre novos f�runs.');
define ('_MI_NEWBB_GLOBAL_NEWFORUM_NOTIFYDSC', 'Receba aviso quando for criado um novo f�rum.');
define ('_MI_NEWBB_GLOBAL_NEWFORUM_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso: Novo f�rum');

define ('_MI_NEWBB_GLOBAL_NEWPOST_NOTIFY', 'Nova Mensagem');
define ('_MI_NEWBB_GLOBAL_NEWPOST_NOTIFYCAP', 'Avise-me de qualquer nova mensagem.');
define ('_MI_NEWBB_GLOBAL_NEWPOST_NOTIFYDSC', 'Receba aviso quando uma nova mensagem for enviada.');
define ('_MI_NEWBB_GLOBAL_NEWPOST_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso: Nova mensagem');

define ('_MI_NEWBB_FORUM_NEWPOST_NOTIFY', 'Nova Mensagem');
define ('_MI_NEWBB_FORUM_NEWPOST_NOTIFYCAP', 'Avise-me sobre novas mensagens neste f�rum.');
define ('_MI_NEWBB_FORUM_NEWPOST_NOTIFYDSC', 'Receba aviso quando uma nova mensagem for enviada para este f�rum');
define ('_MI_NEWBB_FORUM_NEWPOST_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso: Nova mensagem no f�rum');

define ('_MI_NEWBB_GLOBAL_NEWFULLPOST_NOTIFY', 'Nova Mensagem (texto completo)');
define ('_MI_NEWBB_GLOBAL_NEWFULLPOST_NOTIFYCAP', 'Avise-me de qualquer nova mensagem (inclui texto completo no aviso).');
define ('_MI_NEWBB_GLOBAL_NEWFULLPOST_NOTIFYDSC', 'Receba aviso com o texto completo quando uma nova mensagem for enviada.');
define ('_MI_NEWBB_GLOBAL_NEWFULLPOST_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso: Nova mensagem (texto completo)');

define ('_MI_NEWBB_GLOBAL_DIGEST_NOTIFY', 'Resumo');
define ('_MI_NEWBB_GLOBAL_DIGEST_NOTIFYCAP', 'Envie-me resumo do f�rum.');
define ('_MI_NEWBB_GLOBAL_DIGEST_NOTIFYDSC', 'Receba resumos do f�rum.');
define ('_MI_NEWBB_GLOBAL_DIGEST_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso: Resumo do f�rum');

?>
