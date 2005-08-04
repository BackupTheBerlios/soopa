<?php
// $Id: preferences.php,v 1.4 2005/08/04 05:43:41 mauriciodelima Exp $
//%%%%%%	Admin Module Name  AdminGroup 	%%%%%
// dont change

define("_MD_AM_SITEPREF","Preferências de %s");
define("_MD_AM_SITENAME","Nome do site");
define("_MD_AM_SLOGAN","Slogan do seu site");
define("_MD_AM_ADMINML","E-mail do administrador");
define("_MD_AM_LANGUAGE","Idioma");
define("_MD_AM_STARTPAGE","Módulo para página inicial");
define("_MD_AM_NONE","Nenhum");
define("_MD_AM_SERVERTZ","Fuso horário do servidor");
define("_MD_AM_DEFAULTTZ","Fuso horário padrão");
define("_MD_AM_DTHEME","Tema Padrão do Usuário");
define("_MD_AM_THEMESET","Conjunto de temas");
define("_MD_AM_ANONNAME","Denominação para visitantes anônimos");
define("_MD_AM_LOADINGIMG","Exibir a imagem de 'Carregando...'?");
define("_MD_AM_USEGZIP","Utilizar compressão gzip? Recomendado para versões do PHP a partir da 4.0.5");
define("_MD_AM_USERCOOKIE","Nome do cookie dos usuários. Este cookie contém o nome do usuário e é salvo no computador do visitante durante um ano. Se o usuário possuir este cookie, o nome de usuário será inserido no campo da entrada do site.");
define("_MD_AM_USERCOOKIEDSC","Este cookie somente tem o usuário e é gravado por um ano no pc do usuário (Se selecionado). Com esta cookie o usuário é logo inserido na caixa da entrada do site.");
define("_MD_AM_USEMYSESS","Usar sessão personalizada");
define("_MD_AM_USEMYSESSDSC","Selecione 'Sim' para ajustar os valores para sessões.");
define("_MD_AM_SESSNAME","Nome da sessão");
define("_MD_AM_SESSNAMEDSC","Nome da sessão (válido apenas se a opção 'Usar sessão personalizada' estiver ativada)");
define("_MD_AM_SESSEXPIRE","Duração máxima da sessão em segundos");
define("_MD_AM_SESSEXPIREDSC","Tempo máximo em segundos para uma sessão desativada (válido apenas quando não se usar o gerenciador de sessões do PHP)");
define("_MD_AM_BANNERS","Ativar os banners?");
define("_MD_AM_MYIP","O seu IP. Este IP não contará como impressão para banners");
define("_MD_AM_MYIPDSC","Este número IP não conta como uma impressão de um banner");
define("_MD_AM_ALWDHTML","HTML permitido");
define("_MD_AM_INVLDMINPASS","Valor inválido para o tamanho mínimo de senha.");
define("_MD_AM_INVLDUCOOK","Valor inválido para o nome do cookie do usuário.");
define("_MD_AM_INVLDSCOOK","Valor inválido para o nome do cookie de sessão.");
define("_MD_AM_INVLDSEXP","Valor inválido para a data de expiração da sessão.");
define("_MD_AM_ADMNOTSET","O e-mail do administrador não foi definido.");
define("_MD_AM_YES","Sim");
define("_MD_AM_NO","Não");
define("_MD_AM_DONTCHNG","Não altere.");
define("_MD_AM_REMEMBER","Execute 'CHMOD 666' para este arquivo para permitir gravação pelo sistema.");
define("_MD_AM_IFUCANT","Se você não puder modificar as permissões você pode editar o resto deste arquivo manualmente.");


define("_MD_AM_COMMODE","Padrão de visualização dos comentários");
define("_MD_AM_COMORDER","Padrão de visualização dos comentários");
define("_MD_AM_ALLOWHTML","Permitir o uso de tags html nos comentários dos usuários?");
define("_MD_AM_DEBUGMODE","Ligar o modo de teste (debug)? (para exibir todos os erros de SQL apenas enquanto estiver a fazer debug. Um site que estiver presente, deve ter esta opção desligada.)");
define("_MD_AM_DEBUGMODEDSC","Várias opções de debug. Um site em produção normal deve ter esta opção desativada.");
define("_MD_AM_AVATARCONF","Configurações personalizadas dos avatares");
define("_MD_AM_CHNGUTHEME","Editar o tema de todos os usuários");
define("_MD_AM_NOTIFYTO","Avisar os grupos:");
define("_MD_AM_ALLOWTHEME","Permitir que usuários selecionem temas?");
define("_MD_AM_ALLOWIMAGE","Permitir o uso de imagens nas mensagens");

define('_MD_AM_USESSL', 'Usar SSL ao entrar no site?');
define('_MD_AM_SSLPOST', 'Nome da variável SSL Post');
define('_MD_AM_SSLPOSTDSC', 'Digite o nome da variável com o valor da sessão, usada na passagem de variáveis via POST. Se não tiver seguro de que nome usar, escolha um difícil de adivinhar.');
define('_MD_AM_DEBUGMODE0','Desativado');
define('_MD_AM_DEBUGMODE1','Exibir erros do PHP');
define('_MD_AM_DEBUGMODE2','Exibir erros do MySQL/Blocos');
define('_MD_AM_DEBUGMODE3',"Exibir erros do Smarty");
define('_MD_AM_GENERAL', 'Configurações gerais');
define('_MD_AM_IPBAN', 'Banir IP');
define('_MD_AM_DOBADIPS', 'Ativar as restrições de IP');
define('_MD_AM_DOBADIPSDSC', 'Os usuários dos IP especificados não terão acesso ao site.');
define('_MD_AM_BADIPS', 'Digite os IP que devem ser banidos do site.<br>Separar cada um por um <b>|</b> é indiferente o uso de maiusculas ou minusculas, regex ligadas.');
define('_MD_AM_BADIPSDSC', 'aaa.bbb.ccc restringe os com IP que comecem por aaa.bbb.ccc<br>aaa.bbb.ccc$ restringe os IP que acabem em aaa.bbb.ccc<br>aaa.bbb.ccc restringe os IP que contenham aaa.bbb.ccc');
define('_MD_AM_PREFMAIN', 'Preferências');
define('_MD_AM_METAKEY', 'Palavras-chave (meta-dados)');
define('_MD_AM_METAKEYDSC', 'As palavras-chave são uma série de palavras, separadas por vírgula, que representam o conteúdo do seu site (ex: xoops, php, mysql, sistema de portais).');
define('_MD_AM_METARATING', 'Meta Rating (classificação)');
define('_MD_AM_METARATINGDSC', 'O campo Meta Rating define a classificação do conteúdo do site.');
define('_MD_AM_METAOGEN', 'Geral');
define('_MD_AM_METAO14YRS', '14 anos');
define('_MD_AM_METAOREST', 'Restrito');
define('_MD_AM_METAOMAT', 'Adulto');
define('_MD_AM_METAROBOTS', 'Meta Robots');
define('_MD_AM_METAROBOTSDSC', 'O campo Meta Robots informa aos sistemas de busca qual tipo de conteúdo será indexado ou rastreado.');
define('_MD_AM_INDEXFOLLOW', 'Indexar, seguindo todos os links');
define('_MD_AM_NOINDEXFOLLOW', 'Não indexar, seguir');
define('_MD_AM_INDEXNOFOLLOW', 'Indexar apenas a página inicial');
define('_MD_AM_NOINDEXNOFOLLOW', 'Não indexar, não seguir');
define('_MD_AM_METAAUTHOR', 'Autor');
define('_MD_AM_METAAUTHORDSC', 'O campo Autor define o nome do autor do documento que está a ser lido. Pode-se usar o nome, e-mail do Administrador, nome da compania ou URL.');
define('_MD_AM_METACOPYR', 'Meta Copyright (Direitos Autorais)');
define('_MD_AM_METACOPYRDSC', 'O campo Meta Copyright contém as informações sobre os direitos de reprodução dos documentos disponíveis.');
define('_MD_AM_METADESC', 'Descrição do site');
define('_MD_AM_METADESCDSC', 'O campo Meta Description é uma descrição geral do conteúdo da sua página.');
define('_MD_AM_METAFOOTER', 'Meta-dados e rodapé');
define('_MD_AM_FOOTER', 'Rodapé');
define('_MD_AM_FOOTERDSC', 'Use endereço completo, incluindo o "http://", para os links.');
define('_MD_AM_CENSOR', 'Palavras censuradas');
define('_MD_AM_DOCENSOR', 'Ligar a censura de palavras?');
define('_MD_AM_DOCENSORDSC', 'As palavras serão censuradas se esta opção estiver ligada. Esta opção pode ser desligada para aumentar a velocidade do site.');
define('_MD_AM_CENSORWRD', 'Palavras para censurar');
define('_MD_AM_CENSORWRDDSC', 'Digite as mensagens para serem censuradas nas mensagens dos usuários.<br>Separar cada um por um <b>|</b>, é indiferente o uso de maiusculas ou minusculas');
define('_MD_AM_CENSORRPLC', 'As palavras censuradas serão substituidas por:');
define('_MD_AM_CENSORRPLCDSC', 'As palavras censuradas serão substituidas por pelos caracteres inseridos neste campo');

define('_MD_AM_SEARCH', 'Opções de pesquisa');
define('_MD_AM_DOSEARCH', 'Permitir procuras globais?');
define('_MD_AM_DOSEARCHDSC', 'Permitir a procura em todo o conteúdo do seu site.');
define('_MD_AM_MINSEARCH', 'Tamanho mínimo para as buscas');
define('_MD_AM_MINSEARCHDSC', 'Digite o tamanho mínimo da palavra a ser pesquisada');
define('_MD_AM_MODCONFIG', 'Configuração do módulo');
define('_MD_AM_DSPDSCLMR', 'Exibir o termo de responsabilidade?');
define('_MD_AM_DSPDSCLMRDSC', 'Selecione sim para exibir o termo de responsabilidade na página de registro');
define('_MD_AM_REGDSCLMR', 'Termo de responsabilidade');
define('_MD_AM_REGDSCLMRDSC', 'Digite o texto do termo de responsabilidade');
define('_MD_AM_ALLOWREG', 'Permitir o registro de novos usuários?');
define('_MD_AM_ALLOWREGDSC', "Selecione 'sim' para permitir o registro de novos usuários");
define('_MD_AM_THEMEFILE', 'Atualizar os modelos de módulo do diretório "themes/templates"?');
define('_MD_AM_THEMEFILEDSC', 'Atualiza os modelos(templates) de módulos para versões mais novas existentes em /themes/seuTema/templates. Use apenas quando o site estiver em desenvolvimento.');
define('_MD_AM_CLOSESITE', 'Desligar o site?');
define('_MD_AM_CLOSESITEDSC', 'Desligar o site significa que apenas grupos selecionados de usuários terão acesso ao site.');
define('_MD_AM_CLOSESITEOK', 'Selecione os grupos que terão acesso ao site enquanto estiver desabilitado.');
define('_MD_AM_CLOSESITEOKDSC', 'Os usuários do grupo administradores terão sempre permissão de acesso.');
define('_MD_AM_CLOSESITETXT', 'Razão do site estar desabilitado.');
define('_MD_AM_CLOSESITETXTDSC', 'O texto que será apresentado quando o site estiver fechado.');
define('_MD_AM_SITECACHE', 'Cache geral do site');
define('_MD_AM_SITECACHEDSC', 'Faz cache de todo o conteúdo do site para aumento de performance, indepentemente das caches ao nível dos blocos, ou módulos.');
define('_MD_AM_MODCACHE', 'Cache de módulos');
define('_MD_AM_MODCACHEDSC', 'Faz cache do conteúdo do módulo para aumentar a performance. Este parâmetro sobrepõe-se ao tempo de cache de cada item do módulo.');
define('_MD_AM_NOMODULE', 'Não existe nenhum módulo para ser feito cache.');
define('_MD_AM_DTPLSET', 'Conjunto de modelos (templates)');
define('_MD_AM_SSLLINK', 'URL onde a página de entrada com SSL está localizada');

// added for mailer
define("_MD_AM_MAILER","Configuração do e-mail");
define("_MD_AM_MAILER_MAIL","E-mail do remetente");
define("_MD_AM_MAILER_SENDMAIL","'Mailer Sendmail'");
define("_MD_AM_MAILER_","Nome do remetente");
define("_MD_AM_MAILFROM","E-mail do remetente");
define("_MD_AM_MAILFROMDESC","E-mail do remetente");
define("_MD_AM_MAILFROMNAME","Nome do remetente");
define("_MD_AM_MAILFROMNAMEDESC","Nome do remetente que constará na mensagem");
// RMV-NOTIFY
define("_MD_AM_MAILFROMUID","Usuário remetente de MP");
define("_MD_AM_MAILFROMUIDDESC","Quando o sistema enviar uma mensagem particular, qual usuário deverá aparecer como remetente?");
define("_MD_AM_MAILERMETHOD","Método de envio");
define("_MD_AM_MAILERMETHODDESC","Método usado para envio de email o padrão é 'Mail()' Use outros se este não funcionar");
define("_MD_AM_SMTPHOST","Servidor(es) SMTP");
define("_MD_AM_SMTPHOSTDESC","Lista de servidores smtp aos quais o xoops tentará usar para enviar as mensagens.");
define("_MD_AM_SMTPUSER","Nome de usuário do SMTPAuth");
define("_MD_AM_SMTPUSERDESC","Nome de usuário para se conectar ao servidor SMTP com autorização SMTPAuth.");
define("_MD_AM_SMTPPASS","Senha do SMTPAuth");
define("_MD_AM_SMTPPASSDESC","Senha para se conectar ao servidor smtp usando o sistema de autorização SMTPAuth.");
define("_MD_AM_SENDMAILPATH","Caminho do sendmail");
define("_MD_AM_SENDMAILPATHDESC","Caminho para o sendmail, ou substituto, no servidor web");
define("_MD_AM_THEMEOK","Temas selecionáveis");
define("_MD_AM_THEMEOKDSC","Escolha os temas que os usuários podem selecionar como o tema padrão");

define("_MD_AM_ADMINTHEME", "Tema da Administração");
define("_MD_AM_FRONTSIDE_THEME", "Tema padrão do usuário");

define('_MD_AM_MODULEPREF', 'Configurações Gerais');

// Authentication constants

define("_MD_AM_AUTHENTICATION", "Opções de Autenticação");
define("_MD_AM_AUTHMETHOD", "Método de Autenticação");
define("_MD_AM_AUTHMETHODDESC", "Define o método usado para autenticar os usuários que entram no portal.");
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