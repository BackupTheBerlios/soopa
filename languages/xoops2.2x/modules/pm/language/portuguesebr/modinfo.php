<?php
define("_PM_MI_NAME", "Mensagem Privada");
define("_PM_MI_DESC", "Módulo para comunicação interna entre os usuários.");

define("_PM_MI_INDEX", "Início");
define("_PM_MI_PRUNE", "Prune Messages");

define("_PM_MI_LINK_TITLE", "MP Link");
define("_PM_MI_LINK_DESCRIPTION", "Shows a link to send a private message to the user");
define("_PM_MI_MESSAGE", "Escrever uma mensagem para");

define("_PM_MI_PRUNESUBJECT", "Prune PM subject line");
define("_PM_MI_PRUNESUBJECT_DESC", "This will be the subject of the PM to the user, received after a PM prune");
define("_PM_MI_PRUNEMESSAGE", "Prune PM body message");
define("_PM_MI_PRUNEMESSAGE_DESC", "This message will be in the body of the message to users after one or more of their messages have been removed from their inbox during a PM prune. Use {PM_COUNT} in the text to be replaced with the number of messages removed from this user's inbox");
define("_PM_MI_PRUNESUBJECTDEFAULT", "Mensagens excluídas durante a limpeza");
define("_PM_MI_PRUNEMESSAGEDEFAULT", "During a cleanup of the Private Messaging, we have deleted {PM_COUNT} of the messages in your inbox to save space and resources");
?>