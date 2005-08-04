<?php
// $Id: preferences.php,v 1.4 2005/08/04 05:43:41 mauriciodelima Exp $
//%%%%%%	Admin Module Name  AdminGroup 	%%%%%
// dont change

define("_MD_AM_SITEPREF","Prefer�ncias de %s");
define("_MD_AM_SITENAME","Nome do site");
define("_MD_AM_SLOGAN","Slogan do seu site");
define("_MD_AM_ADMINML","E-mail do administrador");
define("_MD_AM_LANGUAGE","Idioma");
define("_MD_AM_STARTPAGE","M�dulo para p�gina inicial");
define("_MD_AM_NONE","Nenhum");
define("_MD_AM_SERVERTZ","Fuso hor�rio do servidor");
define("_MD_AM_DEFAULTTZ","Fuso hor�rio padr�o");
define("_MD_AM_DTHEME","Tema Padr�o do Usu�rio");
define("_MD_AM_THEMESET","Conjunto de temas");
define("_MD_AM_ANONNAME","Denomina��o para visitantes an�nimos");
define("_MD_AM_LOADINGIMG","Exibir a imagem de 'Carregando...'?");
define("_MD_AM_USEGZIP","Utilizar compress�o gzip? Recomendado para vers�es do PHP a partir da 4.0.5");
define("_MD_AM_USERCOOKIE","Nome do cookie dos usu�rios. Este cookie cont�m o nome do usu�rio e � salvo no computador do visitante durante um ano. Se o usu�rio possuir este cookie, o nome de usu�rio ser� inserido no campo da entrada do site.");
define("_MD_AM_USERCOOKIEDSC","Este cookie somente tem o usu�rio e � gravado por um ano no pc do usu�rio (Se selecionado). Com esta cookie o usu�rio � logo inserido na caixa da entrada do site.");
define("_MD_AM_USEMYSESS","Usar sess�o personalizada");
define("_MD_AM_USEMYSESSDSC","Selecione 'Sim' para ajustar os valores para sess�es.");
define("_MD_AM_SESSNAME","Nome da sess�o");
define("_MD_AM_SESSNAMEDSC","Nome da sess�o (v�lido apenas se a op��o 'Usar sess�o personalizada' estiver ativada)");
define("_MD_AM_SESSEXPIRE","Dura��o m�xima da sess�o em segundos");
define("_MD_AM_SESSEXPIREDSC","Tempo m�ximo em segundos para uma sess�o desativada (v�lido apenas quando n�o se usar o gerenciador de sess�es do PHP)");
define("_MD_AM_BANNERS","Ativar os banners?");
define("_MD_AM_MYIP","O seu IP. Este IP n�o contar� como impress�o para banners");
define("_MD_AM_MYIPDSC","Este n�mero IP n�o conta como uma impress�o de um banner");
define("_MD_AM_ALWDHTML","HTML permitido");
define("_MD_AM_INVLDMINPASS","Valor inv�lido para o tamanho m�nimo de senha.");
define("_MD_AM_INVLDUCOOK","Valor inv�lido para o nome do cookie do usu�rio.");
define("_MD_AM_INVLDSCOOK","Valor inv�lido para o nome do cookie de sess�o.");
define("_MD_AM_INVLDSEXP","Valor inv�lido para a data de expira��o da sess�o.");
define("_MD_AM_ADMNOTSET","O e-mail do administrador n�o foi definido.");
define("_MD_AM_YES","Sim");
define("_MD_AM_NO","N�o");
define("_MD_AM_DONTCHNG","N�o altere.");
define("_MD_AM_REMEMBER","Execute 'CHMOD 666' para este arquivo para permitir grava��o pelo sistema.");
define("_MD_AM_IFUCANT","Se voc� n�o puder modificar as permiss�es voc� pode editar o resto deste arquivo manualmente.");


define("_MD_AM_COMMODE","Padr�o de visualiza��o dos coment�rios");
define("_MD_AM_COMORDER","Padr�o de visualiza��o dos coment�rios");
define("_MD_AM_ALLOWHTML","Permitir o uso de tags html nos coment�rios dos usu�rios?");
define("_MD_AM_DEBUGMODE","Ligar o modo de teste (debug)? (para exibir todos os erros de SQL apenas enquanto estiver a fazer debug. Um site que estiver presente, deve ter esta op��o desligada.)");
define("_MD_AM_DEBUGMODEDSC","V�rias op��es de debug. Um site em produ��o normal deve ter esta op��o desativada.");
define("_MD_AM_AVATARCONF","Configura��es personalizadas dos avatares");
define("_MD_AM_CHNGUTHEME","Editar o tema de todos os usu�rios");
define("_MD_AM_NOTIFYTO","Avisar os grupos:");
define("_MD_AM_ALLOWTHEME","Permitir que usu�rios selecionem temas?");
define("_MD_AM_ALLOWIMAGE","Permitir o uso de imagens nas mensagens");

define('_MD_AM_USESSL', 'Usar SSL ao entrar no site?');
define('_MD_AM_SSLPOST', 'Nome da vari�vel SSL Post');
define('_MD_AM_SSLPOSTDSC', 'Digite o nome da vari�vel com o valor da sess�o, usada na passagem de vari�veis via POST. Se n�o tiver seguro de que nome usar, escolha um dif�cil de adivinhar.');
define('_MD_AM_DEBUGMODE0','Desativado');
define('_MD_AM_DEBUGMODE1','Exibir erros do PHP');
define('_MD_AM_DEBUGMODE2','Exibir erros do MySQL/Blocos');
define('_MD_AM_DEBUGMODE3',"Exibir erros do Smarty");
define('_MD_AM_GENERAL', 'Configura��es gerais');
define('_MD_AM_IPBAN', 'Banir IP');
define('_MD_AM_DOBADIPS', 'Ativar as restri��es de IP');
define('_MD_AM_DOBADIPSDSC', 'Os usu�rios dos IP especificados n�o ter�o acesso ao site.');
define('_MD_AM_BADIPS', 'Digite os IP que devem ser banidos do site.<br>Separar cada um por um <b>|</b> � indiferente o uso de maiusculas ou minusculas, regex ligadas.');
define('_MD_AM_BADIPSDSC', 'aaa.bbb.ccc restringe os com IP que comecem por aaa.bbb.ccc<br>aaa.bbb.ccc$ restringe os IP que acabem em aaa.bbb.ccc<br>aaa.bbb.ccc restringe os IP que contenham aaa.bbb.ccc');
define('_MD_AM_PREFMAIN', 'Prefer�ncias');
define('_MD_AM_METAKEY', 'Palavras-chave (meta-dados)');
define('_MD_AM_METAKEYDSC', 'As palavras-chave s�o uma s�rie de palavras, separadas por v�rgula, que representam o conte�do do seu site (ex: xoops, php, mysql, sistema de portais).');
define('_MD_AM_METARATING', 'Meta Rating (classifica��o)');
define('_MD_AM_METARATINGDSC', 'O campo Meta Rating define a classifica��o do conte�do do site.');
define('_MD_AM_METAOGEN', 'Geral');
define('_MD_AM_METAO14YRS', '14 anos');
define('_MD_AM_METAOREST', 'Restrito');
define('_MD_AM_METAOMAT', 'Adulto');
define('_MD_AM_METAROBOTS', 'Meta Robots');
define('_MD_AM_METAROBOTSDSC', 'O campo Meta Robots informa aos sistemas de busca qual tipo de conte�do ser� indexado ou rastreado.');
define('_MD_AM_INDEXFOLLOW', 'Indexar, seguindo todos os links');
define('_MD_AM_NOINDEXFOLLOW', 'N�o indexar, seguir');
define('_MD_AM_INDEXNOFOLLOW', 'Indexar apenas a p�gina inicial');
define('_MD_AM_NOINDEXNOFOLLOW', 'N�o indexar, n�o seguir');
define('_MD_AM_METAAUTHOR', 'Autor');
define('_MD_AM_METAAUTHORDSC', 'O campo Autor define o nome do autor do documento que est� a ser lido. Pode-se usar o nome, e-mail do Administrador, nome da compania ou URL.');
define('_MD_AM_METACOPYR', 'Meta Copyright (Direitos Autorais)');
define('_MD_AM_METACOPYRDSC', 'O campo Meta Copyright cont�m as informa��es sobre os direitos de reprodu��o dos documentos dispon�veis.');
define('_MD_AM_METADESC', 'Descri��o do site');
define('_MD_AM_METADESCDSC', 'O campo Meta Description � uma descri��o geral do conte�do da sua p�gina.');
define('_MD_AM_METAFOOTER', 'Meta-dados e rodap�');
define('_MD_AM_FOOTER', 'Rodap�');
define('_MD_AM_FOOTERDSC', 'Use endere�o completo, incluindo o "http://", para os links.');
define('_MD_AM_CENSOR', 'Palavras censuradas');
define('_MD_AM_DOCENSOR', 'Ligar a censura de palavras?');
define('_MD_AM_DOCENSORDSC', 'As palavras ser�o censuradas se esta op��o estiver ligada. Esta op��o pode ser desligada para aumentar a velocidade do site.');
define('_MD_AM_CENSORWRD', 'Palavras para censurar');
define('_MD_AM_CENSORWRDDSC', 'Digite as mensagens para serem censuradas nas mensagens dos usu�rios.<br>Separar cada um por um <b>|</b>, � indiferente o uso de maiusculas ou minusculas');
define('_MD_AM_CENSORRPLC', 'As palavras censuradas ser�o substituidas por:');
define('_MD_AM_CENSORRPLCDSC', 'As palavras censuradas ser�o substituidas por pelos caracteres inseridos neste campo');

define('_MD_AM_SEARCH', 'Op��es de pesquisa');
define('_MD_AM_DOSEARCH', 'Permitir procuras globais?');
define('_MD_AM_DOSEARCHDSC', 'Permitir a procura em todo o conte�do do seu site.');
define('_MD_AM_MINSEARCH', 'Tamanho m�nimo para as buscas');
define('_MD_AM_MINSEARCHDSC', 'Digite o tamanho m�nimo da palavra a ser pesquisada');
define('_MD_AM_MODCONFIG', 'Configura��o do m�dulo');
define('_MD_AM_DSPDSCLMR', 'Exibir o termo de responsabilidade?');
define('_MD_AM_DSPDSCLMRDSC', 'Selecione sim para exibir o termo de responsabilidade na p�gina de registro');
define('_MD_AM_REGDSCLMR', 'Termo de responsabilidade');
define('_MD_AM_REGDSCLMRDSC', 'Digite o texto do termo de responsabilidade');
define('_MD_AM_ALLOWREG', 'Permitir o registro de novos usu�rios?');
define('_MD_AM_ALLOWREGDSC', "Selecione 'sim' para permitir o registro de novos usu�rios");
define('_MD_AM_THEMEFILE', 'Atualizar os modelos de m�dulo do diret�rio "themes/templates"?');
define('_MD_AM_THEMEFILEDSC', 'Atualiza os modelos(templates) de m�dulos para vers�es mais novas existentes em /themes/seuTema/templates. Use apenas quando o site estiver em desenvolvimento.');
define('_MD_AM_CLOSESITE', 'Desligar o site?');
define('_MD_AM_CLOSESITEDSC', 'Desligar o site significa que apenas grupos selecionados de usu�rios ter�o acesso ao site.');
define('_MD_AM_CLOSESITEOK', 'Selecione os grupos que ter�o acesso ao site enquanto estiver desabilitado.');
define('_MD_AM_CLOSESITEOKDSC', 'Os usu�rios do grupo administradores ter�o sempre permiss�o de acesso.');
define('_MD_AM_CLOSESITETXT', 'Raz�o do site estar desabilitado.');
define('_MD_AM_CLOSESITETXTDSC', 'O texto que ser� apresentado quando o site estiver fechado.');
define('_MD_AM_SITECACHE', 'Cache geral do site');
define('_MD_AM_SITECACHEDSC', 'Faz cache de todo o conte�do do site para aumento de performance, indepentemente das caches ao n�vel dos blocos, ou m�dulos.');
define('_MD_AM_MODCACHE', 'Cache de m�dulos');
define('_MD_AM_MODCACHEDSC', 'Faz cache do conte�do do m�dulo para aumentar a performance. Este par�metro sobrep�e-se ao tempo de cache de cada item do m�dulo.');
define('_MD_AM_NOMODULE', 'N�o existe nenhum m�dulo para ser feito cache.');
define('_MD_AM_DTPLSET', 'Conjunto de modelos (templates)');
define('_MD_AM_SSLLINK', 'URL onde a p�gina de entrada com SSL est� localizada');

// added for mailer
define("_MD_AM_MAILER","Configura��o do e-mail");
define("_MD_AM_MAILER_MAIL","E-mail do remetente");
define("_MD_AM_MAILER_SENDMAIL","'Mailer Sendmail'");
define("_MD_AM_MAILER_","Nome do remetente");
define("_MD_AM_MAILFROM","E-mail do remetente");
define("_MD_AM_MAILFROMDESC","E-mail do remetente");
define("_MD_AM_MAILFROMNAME","Nome do remetente");
define("_MD_AM_MAILFROMNAMEDESC","Nome do remetente que constar� na mensagem");
// RMV-NOTIFY
define("_MD_AM_MAILFROMUID","Usu�rio remetente de MP");
define("_MD_AM_MAILFROMUIDDESC","Quando o sistema enviar uma mensagem particular, qual usu�rio dever� aparecer como remetente?");
define("_MD_AM_MAILERMETHOD","M�todo de envio");
define("_MD_AM_MAILERMETHODDESC","M�todo usado para envio de email o padr�o � 'Mail()' Use outros se este n�o funcionar");
define("_MD_AM_SMTPHOST","Servidor(es) SMTP");
define("_MD_AM_SMTPHOSTDESC","Lista de servidores smtp aos quais o xoops tentar� usar para enviar as mensagens.");
define("_MD_AM_SMTPUSER","Nome de usu�rio do SMTPAuth");
define("_MD_AM_SMTPUSERDESC","Nome de usu�rio para se conectar ao servidor SMTP com autoriza��o SMTPAuth.");
define("_MD_AM_SMTPPASS","Senha do SMTPAuth");
define("_MD_AM_SMTPPASSDESC","Senha para se conectar ao servidor smtp usando o sistema de autoriza��o SMTPAuth.");
define("_MD_AM_SENDMAILPATH","Caminho do sendmail");
define("_MD_AM_SENDMAILPATHDESC","Caminho para o sendmail, ou substituto, no servidor web");
define("_MD_AM_THEMEOK","Temas selecion�veis");
define("_MD_AM_THEMEOKDSC","Escolha os temas que os usu�rios podem selecionar como o tema padr�o");

define("_MD_AM_ADMINTHEME", "Tema da Administra��o");
define("_MD_AM_FRONTSIDE_THEME", "Tema padr�o do usu�rio");

define('_MD_AM_MODULEPREF', 'Configura��es Gerais');

// Authentication constants

define("_MD_AM_AUTHENTICATION", "Op��es de Autentica��o");
define("_MD_AM_AUTHMETHOD", "M�todo de Autentica��o");
define("_MD_AM_AUTHMETHODDESC", "Define o m�todo usado para autenticar os usu�rios que entram no portal.");
define("_MD_AM_LDAP_MAIL_ATTR", "LDAP - Mail Field Name");
define("_MD_AM_LDAP_MAIL_ATTR_DESC","The name of the E-Mail field in your LDAP directory tree.");
define("_MD_AM_LDAP_NAME_ATTR","LDAP - Common Name Field Name");
define("_MD_AM_LDAP_NAME_ATTR_DESC","The name of the Comman Name field in your LDAP directory.");
define("_MD_AM_LDAP_SURNAME_ATTR","LDAP - Surname Fiend Name");
define("_MD_AM_LDAP_SURNAME_ATTR_DESC","The name of the Surname field in your LDAP directory.");
define("_MD_AM_LDAP_GIVENNAME_ATTR","LDAP - Given Name Field Name");
define("_MD_AM_LDAP_GIVENNAME_ATTR_DSC","The name of the Given Name field in your LDAP directory.");
define("_MD_AM_LDAP_UID_ATTR","LDAP - UID Field Name");
define("_MD_AM_LDAP_UID_ATTR_DESC","The name of the User ID field in your LDAP directory.");
define("_MD_AM_LDAP_BASE_DN", "LDAP - Base DN");
define("_MD_AM_LDAP_BASE_DN_DESC", "The base DN (Distinguished Name) of your LDAP directory tree.");
define("_MD_AM_LDAP_PORT","LDAP - Port Number");
define("_MD_AM_LDAP_PORT_DESC","The port number needed to access your LDAP directory server.");
define("_MD_AM_LDAP_SERVER","LDAP - Server Name");
define("_MD_AM_LDAP_SERVER_DESC","The name of your LDAP directory server.");
define("_MD_AM_LDAP_UID_ASDN", "UID as DN");
define("_MD_AM_LDAP_UID_ASDN_DESC", "The uid attribute is used as DN");

define("_MD_AM_LDAP_MANAGER_DN", "DN of the LDAP manager");
define("_MD_AM_LDAP_MANAGER_DN_DESC", "The DN of the user allow to make search (eg manager)");
define("_MD_AM_LDAP_MANAGER_PASS", "Password of the LDAP manager");
define("_MD_AM_LDAP_MANAGER_PASS_DESC", "The password of the user allow to make search");

?>