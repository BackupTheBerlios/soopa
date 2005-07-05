<?php
// $Id: notification.php,v 1.1 2005/07/05 04:56:36 mauriciodelima Exp $

// RMV-NOTIFY

// Text for various templates...

define ('_NOT_NOTIFICATIONOPTIONS', 'Op��es de aviso');
define ('_NOT_UPDATENOW', 'Atualizar');
define ('_NOT_UPDATEOPTIONS', 'Op��es de avisos sobre atualiza��es');

define ('_NOT_CLEAR', 'Limpar');
define ('_NOT_CHECKALL', 'Checar tudo');
define ('_NOT_MODULE', 'M�dulo');
define ('_NOT_CATEGORY', 'Categoria');
define ('_NOT_ITEMID', 'Id');
define ('_NOT_ITEMNAME', 'Nome');
define ('_NOT_EVENT', 'Evento');
define ('_NOT_EVENTS', 'Eventos');
define ('_NOT_ACTIVENOTIFICATIONS', 'Avisos ativos');
define ('_NOT_NAMENOTAVAILABLE', 'Nome n�o dispon�vel');
// RMV-NEW : TODO: remove NAMENOTAVAILBLE above
define ('_NOT_ITEMNAMENOTAVAILABLE', 'Nome do item n�o dispon�vel');
define ('_NOT_ITEMTYPENOTAVAILABLE', 'Tipo de item n�o dispon�vel');
define ('_NOT_ITEMURLNOTAVAILABLE', 'URL do item n�o dispon�vel');
define ('_NOT_DELETINGNOTIFICATIONS', 'Excluindo avisos');
define ('_NOT_DELETESUCCESS', 'Avisos exclu�dos corretamente');
define ('_NOT_UPDATEOK', 'Op��es de aviso atualizadas');
define ('_NOT_NOTIFICATIONMETHODIS', 'Modo de aviso');
define ('_NOT_EMAIL', 'e-mail');
define ('_NOT_PM', 'Mensagem particular');
define ('_NOT_DISABLE', 'Desativado');
define ('_NOT_CHANGE', 'Alterar');

define ('_NOT_NOACCESS', 'Voc� n�o tem permiss�o para acessar essa p�gina');

// Text for module config options

define ('_NOT_ENABLE', 'Ativar');
define ('_NOT_NOTIFICATION', 'aviso');

define ('_NOT_CONFIG_ENABLED', 'Ativar avisos');
define ("_NOT_CONFIG_ENABLEDDSC", "Este m�dulo permite que os usu�rios sejam avisado quando certos eventos ocorrerem. Marque 'sim' para ativar esta op��o.");

define ('_NOT_CONFIG_EVENTS', 'Ativar eventos espec�ficos');
define ('_NOT_CONFIG_EVENTSDSC', 'Selecione os eventos que os usu�rios podem usar.');

define ('_NOT_CONFIG_ENABLE', _NOT_CONFIG_ENABLED);
define ("_NOT_CONFIG_ENABLEDSC", "Este m�dulo permite que os usu�rios sejam avisados quando certos eventos ocorrerem.<br/><u>Estilo Bloco</u> - Mostra op��es de aviso em um bloco, que dever� estar ativo na p�gina do m�dulo.<br/><u>Estilo Inserido</u> - Inclui uma tabela no rodap� da p�gina principal do m�dulo.");
define ('_NOT_CONFIG_DISABLE', 'Desativar avisos');
define ('_NOT_CONFIG_ENABLEBLOCK', 'Ativar estilo bloco');
define ('_NOT_CONFIG_ENABLEINLINE', 'Ativar estilo inserido');
define ('_NOT_CONFIG_ENABLEBOTH', 'Ativar ambos os estilos');

// For notification about comment events

define ('_NOT_COMMENT_NOTIFY', 'Novo coment�rio');
define ('_NOT_COMMENT_NOTIFYCAP', 'Avise-me quando um novo coment�rio for publicado neste item.');
define ('_NOT_COMMENT_NOTIFYDSC', 'Receba aviso quando um novo coment�rio for publicado neste item.');
define ('_NOT_COMMENT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Aviso: Coment�rio inclu�do para {X_ITEM_TYPE}');

define ('_NOT_COMMENTSUBMIT_NOTIFY', 'Novo coment�rio para an�lise');
define ('_NOT_COMMENTSUBMIT_NOTIFYCAP', 'Avise-me quando um novo coment�rio for enviado para an�lise');
define ('_NOT_COMMENTSUBMIT_NOTIFYDSC', 'Receba aviso quando um novo coment�rio, neste item, for enviado para an�lise');
define ('_NOT_COMMENTSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Aviso: Coment�rio enviado para {X_ITEM_TYPE}');

// For notification bookmark feature
// (Not really notification, but easy to do with this module)

define ('_NOT_BOOKMARK_NOTIFY', 'Incluir como favorito');
define ('_NOT_BOOKMARK_NOTIFYCAP', 'Inclui o item como favorito, sem aviso.');
define ('_NOT_BOOKMARK_NOTIFYDSC', 'Acompanhe este item sem receber avisos de qualquer evento.');

// For user profile
// FIXME: These should be reworded a little...

define ('_NOT_NOTIFYMETHOD', 'Modo de aviso<br/>Ao monitorar um m�dulo, como voc� gostaria de ser avisado?');
define ('_NOT_METHOD_EMAIL', 'e-mail cadastrado no perfil');
define ('_NOT_METHOD_PM', 'Mensagem particular');
define ('_NOT_METHOD_DISABLE', 'Desativar');

define ('_NOT_NOTIFYMODE', 'Modo de aviso padr�o');
define ('_NOT_MODE_SENDALWAYS', 'Avise-me de todas as atualiza��es selecionadas');
define ('_NOT_MODE_SENDONCE', 'Avise-me apenas uma vez');
define ('_NOT_MODE_SENDONCEPERLOGIN', 'Avise-me uma vez e suspenda at� minha pr�xima visita.');

define ('_NOT_NOTIFYMETHOD_DESC', "When you monitor e.g. a forum, how would you like to receive notifications of updates?");
?>