<?php
// $Id: main.php,v 1.4 2005/07/11 04:05:43 mauriciodelima Exp $
define("_PROFILE_MA_ERRORDURINGSAVE", "Error during save");
define('_PROFILE_MA_USERREG','Cadastro de Usuários');
define('_PROFILE_MA_NICKNAME','Nome do usuário');
define('_PROFILE_MA_EMAIL','E-mail');
define('_PROFILE_MA_ALLOWVIEWEMAIL','Exibir e-mails a outros usuários');
define('_PROFILE_MA_TIMEZONE','Fuso Horário');
define('_PROFILE_MA_AVATAR','Avatar');
define('_PROFILE_MA_VERIFYPASS','Verificar senha');
define('_PROFILE_MA_SUBMIT','Enviar');
define('_PROFILE_MA_USERNAME','Nome de Usuário');
define('_PROFILE_MA_FINISH','Finalizar');
define('_PROFILE_MA_REGISTERNG','Não é possível registrar novos usuários.');
define('_PROFILE_MA_MAILOK','Receive occasional email notices <br />from administrators and moderators?');
define('_PROFILE_MA_DISCLAIMER','Disclaimer');
define('_PROFILE_MA_IAGREE','I agree to the above');
define('_PROFILE_MA_UNEEDAGREE', 'Sorry, you have to agree to our disclaimer to get registered.');
define('_PROFILE_MA_NOREGISTER','Sorry, we are currently closed for new user registrations');

// %s is username. This is a subject for email
define('_PROFILE_MA_USERKEYFOR','Link de ativação de %s');

define('_PROFILE_MA_YOURREGISTERED','An email containing an user activation key has been sent to the email account you provided. Please follow the instructions in the mail to activate your account. ');
define('_PROFILE_MA_YOURREGMAILNG','You are now registered. However, we were unable to send the activation mail to your email account due to an internal error that had occurred on our server. We are sorry for the inconvenience, please send the webmaster an email notifying him/her of the situation.');
define('_PROFILE_MA_YOURREGISTERED2','You are now registered.  Please wait for your account to be activated by the adminstrators.  You will receive an email once you are activated.  This could take a while so please be patient.');

// %s is your site name
define('_PROFILE_MA_NEWUSERREGAT','New user registration at %s');
// %s is a username
define('_PROFILE_MA_HASJUSTREG','%s has just registered!');

define('_PROFILE_MA_INVALIDMAIL','ERROR: Invalid email');
define('_PROFILE_MA_EMAILNOSPACES','ERROR: Email addresses do not contain spaces.');
define('_PROFILE_MA_INVALIDNICKNAME','ERROR: Invalid Username');
define("_PROFILE_MA_INVALIDDISPLAYNAME", "Nome para exibição inálivo");
define('_PROFILE_MA_NICKNAMETOOLONG','Username is too long. It must be less than %s characters.');
define('_PROFILE_MA_DISPLAYNAMETOOLONG','O Nome para exibição muito longo. Deve conter no máximo %s caracteres.');
define('_PROFILE_MA_NICKNAMETOOSHORT','O Nome de Usuário deve conter mais de  %s caracteres.');
define('_PROFILE_MA_DISPLAYNAMETOOSHORT','O Nome para exibição é muito curto. Deve conter mais de %s caracteres.');
define('_PROFILE_MA_NAMERESERVED','Desculpe, este é um nome reservado.');
define('_PROFILE_MA_DISPLAYNAMERESERVED','O Nome para Exibição é reservado.');
define('_PROFILE_MA_NICKNAMENOSPACES','O Nome de Usuário não pode conter espaços.');
define('_PROFILE_MA_DISPLAYNAMENOSPACES','Não podem haver espaços no nome de exibição.');
define('_PROFILE_MA_NICKNAMETAKEN','ERROR: Username taken.');
define('_PROFILE_MA_DISPLAYNAMETAKEN','ERROR: Displayname taken.');
define('_PROFILE_MA_EMAILTAKEN','Desculpe o Nome de Usuário já existe.');
define('_PROFILE_MA_ENTERPWD','ERROR: You must provide a password.');
define('_PROFILE_MA_SORRYNOTFOUND','Sorry, no corresponding user info was found.');
define("_PROFILE_MA_WRONGPASSWORD", "ERROR: Wrong Password");
define("_PROFILE_MA_USERALREADYACTIVE", "User with email %s is already activated");

// %s is your site name
define('_PROFILE_MA_YOURACCOUNT', 'Your account at %s');

// %s is a username
define('_PROFILE_MA_ACTVMAILNG', 'Failed sending notification mail to %s');
define('_PROFILE_MA_ACTVMAILOK', 'Notification mail to %s sent.');

define("_PROFILE_MA_DEFAULT", "Configurações Padrão");

//%%%%%%		File Name userinfo.php 		%%%%%
define('_PROFILE_MA_SELECTNG','Você deve selecionar um usuários.');
define('_PROFILE_MA_PM','PM');
define('_PROFILE_MA_ICQ','ICQ');
define('_PROFILE_MA_AIM','AIM');
define('_PROFILE_MA_YIM','YIM');
define('_PROFILE_MA_MSNM','MSNM');
define('_PROFILE_MA_LOCATION','Localização');
define('_PROFILE_MA_OCCUPATION','Ocupação');
define('_PROFILE_MA_INTEREST','Interesse');
define('_PROFILE_MA_SIGNATURE','Assinatura');
define('_PROFILE_MA_EXTRAINFO','Informações extras');
define('_PROFILE_MA_EDITPROFILE','Editar Perfil');
define('_PROFILE_MA_LOGOUT','Sair');
define('_PROFILE_MA_INBOX','Mensagens');
define('_PROFILE_MA_MEMBERSINCE','Member Since');
define('_PROFILE_MA_RANK','Rank');
define('_PROFILE_MA_POSTS','Comments/Posts');
define('_PROFILE_MA_LASTLOGIN','Last Login');
define('_PROFILE_MA_ALLABOUT','All about %s');
define('_PROFILE_MA_STATISTICS','Statistics');
define('_PROFILE_MA_MYINFO','My Info');
define('_PROFILE_MA_BASICINFO','Basic information');
define('_PROFILE_MA_MOREABOUT','More About Me');
define('_PROFILE_MA_SHOWALL','Exibir tudo');

//%%%%%%		File Name edituser.php 		%%%%%
define('_PROFILE_MA_PROFILE','Perfil');
define('_PROFILE_MA_DISPLAYNAME','Nome para exibição');
define('_PROFILE_MA_SHOWSIG','Sempre incluir a minha assinatura');
define('_PROFILE_MA_CDISPLAYMODE','Exibição dos comentários');
define('_PROFILE_MA_CSORTORDER','Ordem dos comentário');
define('_PROFILE_MA_PASSWORD','Senha');
define('_PROFILE_MA_TYPEPASSTWICE','(digite a senha duas vezes)');
define('_PROFILE_MA_SAVECHANGES','Salvar');
define('_PROFILE_MA_NOEDITRIGHT',"Sorry, you don't have the right to edit this user's info.");
define('_PROFILE_MA_PASSNOTSAME','Senha não conicide. Os campos devem ser iguais.');
define('_PROFILE_MA_PWDTOOSHORT','Sorry, your password must be at least <b>%s</b> characters long.');
define('_PROFILE_MA_PROFUPDATED','Perfil de Usuário atualizado com sucesso!');
define('_PROFILE_MA_USECOOKIE','Salvar meu cookie de usuário por 1 ano');
define('_PROFILE_MA_NO','Não');
define('_PROFILE_MA_DELACCOUNT','Excluir Perfil');
define('_PROFILE_MA_MYAVATAR', 'Meu Avatar');
define('_PROFILE_MA_UPLOADMYAVATAR', 'Incluir Avatar');
define('_PROFILE_MA_MAXPIXEL','Resolução máx Pixels');
define('_PROFILE_MA_MAXIMGSZ','Tamanho máx. (Bytes)');
define('_PROFILE_MA_SELFILE','Selecionar arquivo');
define('_PROFILE_MA_OLDDELETED','Seu outro avatar será deletado!');
define('_PROFILE_MA_CHOOSEAVT', 'Escolha um avatar na lista.');
define('_PROFILE_MA_CHOOSEAVT', 'Choose avatar from the available list');

define('_PROFILE_MA_PRESSLOGIN', 'Press the button below to login');

define('_PROFILE_MA_ADMINNO', 'User in the webmasters group cannot be removed');
define('_PROFILE_MA_GROUPS', 'Grupo de Usuários');

//changepass.php
define("_PROFILE_MA_CHANGEPASSWORD", "Alterar Senha");
define("_PROFILE_MA_PASSWORDCHANGED", "Senha alterada com sucesso!");
define("_PROFILE_MA_OLDPASSWORD", "Senha atual");
define("_PROFILE_MA_NEWPASSWORD", "Nova senha");

//search.php
define("_PROFILE_MA_SORTBY", "Sort By");
define("_PROFILE_MA_ORDER", "Order");
define("_PROFILE_MA_PERPAGE", "Items per page");
define("_PROFILE_MA_LATERTHAN", "%s is later than");
define("_PROFILE_MA_EARLIERTHAN", "%s is earlier than");
define("_PROFILE_MA_LARGERTHAN", "%s is larger than");
define("_PROFILE_MA_SMALLERTHAN", "%s is smaller than");

define("_PROFILE_MA_NOUSERSFOUND", "No users found");
define("_PROFILE_MA_RESULTS", "Search Results");

//changemail.php
define("_PROFILE_MA_CHANGEMAIL", "Change Email");
define("_PROFILE_MA_NEWMAIL", "New Email Address");

define("_PROFILE_MA_NEWEMAILREQ", "New Email Address Request");
define("_PROFILE_MA_NEWMAILMSGSENT", "An email with an activation link has been sent to the specified email address. Responding to the link will complete the email change procedure");
define("_PROFILE_MA_EMAILCHANGED", "Your Email Address Has Been Changed");

define("_PROFILE_MA_CONFCODEMISSING", "Confirmation Code Missing");
?>