<?php
// $Id: modinfo.php,v 1.3 2005/07/09 18:09:26 mauriciodelima Exp $
define("_PROFILE_MI_NAME", "Perfil Extendido");
define("_PROFILE_MI_DESC", "M�dulo para gerenciamento do perfil do usu�rio.");

//Main menu links
define("_PROFILE_MI_EDITACCOUNT", "Editar perfil");
define("_PROFILE_MI_CHANGEPASS", "Mudar senha");
define("_PROFILE_MI_CHANGEMAIL", "Mudar e-mail");

//Admin links
define("_PROFILE_MI_INDEX", "In�cio");
define("_PROFILE_MI_CATEGORIES", "Categorias");
define("_PROFILE_MI_FIELDS", "Campos");
define("_PROFILE_MI_USERS", "Usu�rios");
define("_PROFILE_MI_PERMISSIONS", "Permiss�es");

//User Profile Category
define("_PROFILE_MI_CATEGORY_TITLE", "Perfil do Usu�rio");
define("_PROFILE_MI_CATEGORY_DESC", "For those user fields");

//User Profile Fields
define("_PROFILE_MI_AIM_TITLE", "AIM");
define("_PROFILE_MI_AIM_DESCRIPTION", "America Online Instant Messenger ID");
define("_PROFILE_MI_ICQ_TITLE", "ICQ");
define("_PROFILE_MI_ICQ_DESCRIPTION", "ICQ Instant Messenger ID");
define("_PROFILE_MI_YIM_TITLE", "YIM");
define("_PROFILE_MI_YIM_DESCRIPTION", "Yahoo! Instant Messenger ID");
define("_PROFILE_MI_MSN_TITLE", "MSN");
define("_PROFILE_MI_MSN_DESCRIPTION", "Microsoft Messenger ID");
define("_PROFILE_MI_FROM_TITLE", "Cidade/UF");
define("_PROFILE_MI_FROM_DESCRIPTION", "Cidade / Estado onde reside");
define("_PROFILE_MI_SIG_TITLE", "Assinatura");
define("_PROFILE_MI_SIG_DESCRIPTION", "Digite a assinatura que ser� usada para as mensagens nos f�runs, coment�rios, etc..");
define("_PROFILE_MI_VIEWEMAIL_TITLE", "Exibir meu e-mail");
define("_PROFILE_MI_BIO_TITLE", "Outras Informa��es");
define("_PROFILE_MI_BIO_DESCRIPTION", "Digite outras informa��es que achar interessante para os outros usu�rios deste portal");
define("_PROFILE_MI_INTEREST_TITLE", "Interesses");
define("_PROFILE_MI_INTEREST_DESCRIPTION", "Seus interesses, suas atividades...");
define("_PROFILE_MI_OCCUPATION_TITLE", "Ocupa��o");
define("_PROFILE_MI_OCCUPATION_DESCRIPTION", "Sua profiss�o");
define("_PROFILE_MI_URL_TITLE", "Home Page");
define("_PROFILE_MI_URL_DESCRIPTION", "Sua p�gina pessoal");
define("_PROFILE_MI_NEWEMAIL_TITLE", "Novo E-mai");
define("_PROFILE_MI_NEWEMAIL_DESCRIPTION", "Antes de efetuar a mudan�a de e-mail do cadastro, dever� ser confirmado o novo e-mail. Veja modules/profile/changemail.php");

//Configuration categories
define("_PROFILE_MI_CAT_SETTINGS", "Configura��es Gerais");
define("_PROFILE_MI_CAT_SETTINGS_DSC", "...");
define("_PROFILE_MI_CAT_USER", "Configura��o de Usu�rios");
define("_PROFILE_MI_CAT_USER_DSC", "");

//Configuration items
define("_PROFILE_MI_PROFILE_SEARCH", "Exibir as �ltimas participa��es do usu�rio em seu perfil?");
define("_PROFILE_MI_MAX_UNAME", "Tamanho m�ximo do nome de usu�rio");
define("_PROFILE_MI_MAX_UNAME_DESC", "Indica o tamanho m�nimo de caracteres que o usu�rio dever� fornecer no formul�rio de registro");
define("_PROFILE_MI_MIN_UNAME", "Tamanho m�nimo do nome de usu�rio");
define("_PROFILE_MI_MIN_UNAME_DESC", "Indica o tamanho m�nimo de caracteres que o usu�rio dever� fornecer no formul�rio de registro.");
define("_PROFILE_MI_DISPLAY_DISCLAIMER", "Exibir o termo de responsabilidade?");
define("_PROFILE_MI_DISPLAY_DISCLAIMER_DESC", "Selecione sim para exibir o termo de responsabilidade no formul�rio de registro");
define("_PROFILE_MI_DISCLAIMER", "Termo de responsabilidade");
define("_PROFILE_MI_DISCLAIMER_DESC", "Digite o texto do termo de responsabilidade que ser� exibido formul�rio de registro se a op��o acima estiver selecionada.");
define("_PROFILE_MI_BAD_UNAMES", "Digite os nomes que n�o devem ser usados para nome de usu�rio");
define("_PROFILE_MI_BAD_UNAMES_DESC", "Separar cada um por um <b>|</b>, � indiferente o uso de mai�sculas ou min�sculas, regex ligadas.");
define("_PROFILE_MI_BAD_EMAILS", "Digite os endere�os de e-mail que n�o devem ser usados pelos usu�rios");
define("_PROFILE_MI_BAD_EMAILS_DESC", "Separar cada um por um <b>|</b>, � indiferente o uso de mai�sculas ou min�sculas, regex ligadas..");
define("_PROFILE_MI_MINPASS", "Tamanho m�nimo para as senhas");
define("_PROFILE_MI_NEWUNOTIFY", "Avisar por e-mail quando novo usu�rio se redistrar?");
define("_PROFILE_MI_NOTIFYTO", "Selecione qual o grupo que receber� os avisos acima");
define("_PROFILE_MI_ACTVTYPE", "Como ser�o ativados os novos usu�rios?");
define("_PROFILE_MI_USERACTV","Ativa��o pelo usu�rio (recomendado)");
define("_PROFILE_MI_AUTOACTV","Ativa��o autom�tica");
define("_PROFILE_MI_ADMINACTV","Ativa��o pelo administrador");
define("_PROFILE_MI_ACTVGROUP", "Selecione o grupo que ativar� os novos usu�rios");
define("_PROFILE_MI_ACTVGROUP_DESC", "Somente quando 'Ativa��o pelo administrador' est� selecionado");
define("_PROFILE_MI_UNAMELVL","Qual deve ser a restri��o dos caracteres permitidos ao usu�rio?");
define("_PROFILE_MI_STRICT","M�ximo (somente letras e n�meros)");
define("_PROFILE_MI_MEDIUM","M�dio");
define("_PROFILE_MI_LIGHT","M�nimo (recomendado para caracteres de m�ltiplos bytes)");
define("_PROFILE_MI_ALLOWREG", "Permitir o registro de novos usu�rios?");
define("_PROFILE_MI_ALLOWREG_DESC", "Selecione 'sim' para permitir registro de novos usu�rios");
define("_PROFILE_MI_AVATARALLOW", "Permitir o envio de avatares?");
define("_PROFILE_MI_AVATARALLOW_DESC", "Selecionando 'sim' os usu�rio poder�o enviar avatares personalizados.");
define("_PROFILE_MI_AVATARWIDTH", "Largura m�xima da imagem do avatar (px)");
define("_PROFILE_MI_AVATARWIDTH_DESC", "Avatares com largura maior que a permitida ser�o recusados.");
define("_PROFILE_MI_AVATARHEIGHT", "Altura m�xima da imagem do avatar (px)");
define("_PROFILE_MI_AVATARHEIGHT_DESC", "Avatares com altura maior que a permitida ser�o recusados.");
define("_PROFILE_MI_AVATARMAX", "Tamanho m�ximo da imagem do avatar (em bytes)");
define("_PROFILE_MI_AVATARMAX_DESC", "Avatares com tamanho de arquivo da imagem maior que o permitido ser�o recusados");
define("_PROFILE_MI_SELFDELETE", "Permitir aos usu�rios esclu�rem suas pr�prias contas?");
define("_PROFILE_MI_SELFDELETE_DESC", "Os usu�rios poder�o excluir sua pr�pria contas se estiver selecionado 'sim'");
define("_PROFILE_MI_AVATARMINPOSTS", "N�mero m�nimo de mensagens");
define("_PROFILE_MI_AVATARMINPOSTS_DESC", "Digite o n�mero m�nimo de mensagens para permitir o envio de avatares");
define("_PROFILE_MI_ALLOWCHGMAIL", "Permitir que os usu�rios mudem de e-mail?");
define("_PROFILE_MI_ALLOWCHGMAIL_DESC", "Permite que usu�rios mudarem o endere�o de e-mail que usaram quando se cadastraram no portal.");
define("_PROFILE_MI_ALLOWVIEWACC", "Allow to view account");
define("_PROFILE_MI_ALLOWVIEWACC_DESC", "Individual fields can be set visible or invisible to users in fields administration,<br />but if you want to allow access to other users' accounts for certain groups only,<br /> while still allowing anonymous users to register,<br /> select the groups here");

//Pages
define("_PROFILE_MI_PAGE_INFO", "Informa��es do Usu�rio");
define("_PROFILE_MI_PAGE_EDIT", "Editar Usu�rio");
define("_PROFILE_MI_PAGE_SEARCH", "Pesquisar");
?>