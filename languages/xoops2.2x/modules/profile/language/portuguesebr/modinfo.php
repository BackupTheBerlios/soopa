<?php
// $Id: modinfo.php,v 1.3 2005/07/09 18:09:26 mauriciodelima Exp $
define("_PROFILE_MI_NAME", "Perfil Extendido");
define("_PROFILE_MI_DESC", "Módulo para gerenciamento do perfil do usuário.");

//Main menu links
define("_PROFILE_MI_EDITACCOUNT", "Editar perfil");
define("_PROFILE_MI_CHANGEPASS", "Mudar senha");
define("_PROFILE_MI_CHANGEMAIL", "Mudar e-mail");

//Admin links
define("_PROFILE_MI_INDEX", "Início");
define("_PROFILE_MI_CATEGORIES", "Categorias");
define("_PROFILE_MI_FIELDS", "Campos");
define("_PROFILE_MI_USERS", "Usuários");
define("_PROFILE_MI_PERMISSIONS", "Permissões");

//User Profile Category
define("_PROFILE_MI_CATEGORY_TITLE", "Perfil do Usuário");
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
define("_PROFILE_MI_SIG_DESCRIPTION", "Digite a assinatura que será usada para as mensagens nos fóruns, comentários, etc..");
define("_PROFILE_MI_VIEWEMAIL_TITLE", "Exibir meu e-mail");
define("_PROFILE_MI_BIO_TITLE", "Outras Informações");
define("_PROFILE_MI_BIO_DESCRIPTION", "Digite outras informações que achar interessante para os outros usuários deste portal");
define("_PROFILE_MI_INTEREST_TITLE", "Interesses");
define("_PROFILE_MI_INTEREST_DESCRIPTION", "Seus interesses, suas atividades...");
define("_PROFILE_MI_OCCUPATION_TITLE", "Ocupação");
define("_PROFILE_MI_OCCUPATION_DESCRIPTION", "Sua profissão");
define("_PROFILE_MI_URL_TITLE", "Home Page");
define("_PROFILE_MI_URL_DESCRIPTION", "Sua página pessoal");
define("_PROFILE_MI_NEWEMAIL_TITLE", "Novo E-mai");
define("_PROFILE_MI_NEWEMAIL_DESCRIPTION", "Antes de efetuar a mudança de e-mail do cadastro, deverá ser confirmado o novo e-mail. Veja modules/profile/changemail.php");

//Configuration categories
define("_PROFILE_MI_CAT_SETTINGS", "Configurações Gerais");
define("_PROFILE_MI_CAT_SETTINGS_DSC", "...");
define("_PROFILE_MI_CAT_USER", "Configuração de Usuários");
define("_PROFILE_MI_CAT_USER_DSC", "");

//Configuration items
define("_PROFILE_MI_PROFILE_SEARCH", "Exibir as últimas participações do usuário em seu perfil?");
define("_PROFILE_MI_MAX_UNAME", "Tamanho máximo do nome de usuário");
define("_PROFILE_MI_MAX_UNAME_DESC", "Indica o tamanho mínimo de caracteres que o usuário deverá fornecer no formulário de registro");
define("_PROFILE_MI_MIN_UNAME", "Tamanho mínimo do nome de usuário");
define("_PROFILE_MI_MIN_UNAME_DESC", "Indica o tamanho mínimo de caracteres que o usuário deverá fornecer no formulário de registro.");
define("_PROFILE_MI_DISPLAY_DISCLAIMER", "Exibir o termo de responsabilidade?");
define("_PROFILE_MI_DISPLAY_DISCLAIMER_DESC", "Selecione sim para exibir o termo de responsabilidade no formulário de registro");
define("_PROFILE_MI_DISCLAIMER", "Termo de responsabilidade");
define("_PROFILE_MI_DISCLAIMER_DESC", "Digite o texto do termo de responsabilidade que será exibido formulário de registro se a opção acima estiver selecionada.");
define("_PROFILE_MI_BAD_UNAMES", "Digite os nomes que não devem ser usados para nome de usuário");
define("_PROFILE_MI_BAD_UNAMES_DESC", "Separar cada um por um <b>|</b>, é indiferente o uso de maiúsculas ou minúsculas, regex ligadas.");
define("_PROFILE_MI_BAD_EMAILS", "Digite os endereços de e-mail que não devem ser usados pelos usuários");
define("_PROFILE_MI_BAD_EMAILS_DESC", "Separar cada um por um <b>|</b>, é indiferente o uso de maiúsculas ou minúsculas, regex ligadas..");
define("_PROFILE_MI_MINPASS", "Tamanho mínimo para as senhas");
define("_PROFILE_MI_NEWUNOTIFY", "Avisar por e-mail quando novo usuário se redistrar?");
define("_PROFILE_MI_NOTIFYTO", "Selecione qual o grupo que receberá os avisos acima");
define("_PROFILE_MI_ACTVTYPE", "Como serão ativados os novos usuários?");
define("_PROFILE_MI_USERACTV","Ativação pelo usuário (recomendado)");
define("_PROFILE_MI_AUTOACTV","Ativação automática");
define("_PROFILE_MI_ADMINACTV","Ativação pelo administrador");
define("_PROFILE_MI_ACTVGROUP", "Selecione o grupo que ativará os novos usuários");
define("_PROFILE_MI_ACTVGROUP_DESC", "Somente quando 'Ativação pelo administrador' está selecionado");
define("_PROFILE_MI_UNAMELVL","Qual deve ser a restrição dos caracteres permitidos ao usuário?");
define("_PROFILE_MI_STRICT","Máximo (somente letras e números)");
define("_PROFILE_MI_MEDIUM","Médio");
define("_PROFILE_MI_LIGHT","Mínimo (recomendado para caracteres de múltiplos bytes)");
define("_PROFILE_MI_ALLOWREG", "Permitir o registro de novos usuários?");
define("_PROFILE_MI_ALLOWREG_DESC", "Selecione 'sim' para permitir registro de novos usuários");
define("_PROFILE_MI_AVATARALLOW", "Permitir o envio de avatares?");
define("_PROFILE_MI_AVATARALLOW_DESC", "Selecionando 'sim' os usuário poderão enviar avatares personalizados.");
define("_PROFILE_MI_AVATARWIDTH", "Largura máxima da imagem do avatar (px)");
define("_PROFILE_MI_AVATARWIDTH_DESC", "Avatares com largura maior que a permitida serão recusados.");
define("_PROFILE_MI_AVATARHEIGHT", "Altura máxima da imagem do avatar (px)");
define("_PROFILE_MI_AVATARHEIGHT_DESC", "Avatares com altura maior que a permitida serão recusados.");
define("_PROFILE_MI_AVATARMAX", "Tamanho máximo da imagem do avatar (em bytes)");
define("_PROFILE_MI_AVATARMAX_DESC", "Avatares com tamanho de arquivo da imagem maior que o permitido serão recusados");
define("_PROFILE_MI_SELFDELETE", "Permitir aos usuários escluírem suas próprias contas?");
define("_PROFILE_MI_SELFDELETE_DESC", "Os usuários poderão excluir sua própria contas se estiver selecionado 'sim'");
define("_PROFILE_MI_AVATARMINPOSTS", "Número mínimo de mensagens");
define("_PROFILE_MI_AVATARMINPOSTS_DESC", "Digite o número mínimo de mensagens para permitir o envio de avatares");
define("_PROFILE_MI_ALLOWCHGMAIL", "Permitir que os usuários mudem de e-mail?");
define("_PROFILE_MI_ALLOWCHGMAIL_DESC", "Permite que usuários mudarem o endereço de e-mail que usaram quando se cadastraram no portal.");
define("_PROFILE_MI_ALLOWVIEWACC", "Allow to view account");
define("_PROFILE_MI_ALLOWVIEWACC_DESC", "Individual fields can be set visible or invisible to users in fields administration,<br />but if you want to allow access to other users' accounts for certain groups only,<br /> while still allowing anonymous users to register,<br /> select the groups here");

//Pages
define("_PROFILE_MI_PAGE_INFO", "Informações do Usuário");
define("_PROFILE_MI_PAGE_EDIT", "Editar Usuário");
define("_PROFILE_MI_PAGE_SEARCH", "Pesquisar");
?>