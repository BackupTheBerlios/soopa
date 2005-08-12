<?php /* Brazilian Portuguese Translation by Marcelo Yuji Himoro <www.yuji.eu.org> */

// index.php
define("_AM_TH_DATETIME","Data");
define("_AM_TH_USER","Usu�rio");
define("_AM_TH_IP","IP");
define("_AM_TH_AGENT","AGENT");
define("_AM_TH_TYPE","Tipo");
define("_AM_TH_DESCRIPTION","Descri��o");

define( "_AM_TH_BADIPS","Lista de IPs banidos");
define( "_AM_TH_ENABLEIPBANS","Ativar banimento por IP?");

define("_AM_LABEL_REMOVE","");
define("_AM_BUTTON_REMOVE","Excluir");
define("_AM_JS_REMOVECONFIRM","Voc� realmente deseja excluir os itens selecionados?");
define( "_AM_MSG_PRUPDATED","As configura��es foram atualizadas com sucesso.");
define("_AM_MSG_REMOVED","Os itens selecionados foram apagados com sucesso.");


// prefix_manager.php
define("_AM_H3_PREFIXMAN","Gerenciador de PREFIX");
define("_AM_MSG_DBUPDATED","O banco de dados foi atualizado com sucesso.");
define("_AM_CONFIRM_DELETE","Voc� realmente deseja excluir todas as tabelas?");
define("_AM_TXT_HOWTOCHANGEDB","Quando voc� mudar o prefix, altere o conte�do abaixo em seu %s/mainfile.php.<br /><br />define('XOOPS_DB_PREFIX', '<b>%s</b>');");


// advisory.php
define("_AM_ADV_NOTSECURE","INSEGURO");

define("_AM_ADV_REGISTERGLOBALS","Esta configura��o permite uma variedade de ataques por inje��o.<br />Se seu servidor suportar .htaccess, crie ou edite o .htaccess no diret�rio em que o XOOPS estiver instalado.");
define("_AM_ADV_ALLOWURLFOPEN","Esta configura��o permite que atacantes executem scripts remotamente � vontade.<br />Para alterar esta op��o, � necess�rio ter permiss�o de administrador do servidor.<br />Se voc� � um administrador do servidor, edite o php.ini ou httpd.conf.<br /><b>Exemplo de httpd.conf:<br /> &nbsp; php_admin_flag &nbsp; allow_url_fopen &nbsp; off</b><br />Caso contr�rio, contate o suporte de seu host.");
define("_AM_ADV_DBPREFIX","O prefixo do seu banco de dados � \"xoops\", o que o faz vulner�vel � SQL injection.<br />N�o se esque�a de ativar \"Sanitiza��o for�ada em caso de detec��o de coment�rio isolado\" e as prote��es contra SQL injection nas prefer�ncias deste m�dulo.");
define("_AM_ADV_LINK_TO_PREFIXMAN","Ir para o Gerenciador de PREFIX");
define("_AM_ADV_MAINUNPATCHED","Quando chamado no mainfile.php, a prote��o fornecida pelo Xoops Protector � aumentada.<br />Leia o README e edite seu mainfile.php como indicado.");
define("_AM_ADV_RESCUEPASSWORD","Senha de restaura��o");
define("_AM_ADV_RESCUEPASSWORDUNSET","Indefinida.");
define("_AM_ADV_RESCUEPASSWORDSHORT","Utilize senhas maiores ou iguais � 6 caracteres.");

define("_AM_ADV_SUBTITLECHECK","Checagem das a��es do Protector");
define("_AM_ADV_AT1STSETPASSWORD","Por haver a possibilidade de voc� mesmo ser adicionado � lista de IPs banidos, primeiramente defina uma senha de restaura��o.");
define("_AM_ADV_CHECKCONTAMI","Ataques por contamina��o");
define("_AM_ADV_CHECKISOCOM","Coment�rios isolados");
?>