<?php
// $Id: user.php,v 1.1 2005/07/05 04:56:36 mauriciodelima Exp $
//%%%%%%		File Name user.php 		%%%%%
define('_US_NOTREGISTERED','Você ainda não está cadastrado? Clique <a href=register.php>aqui</a> para fazer seu cadastro.');
define('_US_LOSTPASSWORD','Esqueceu a senha?');
define('_US_NOPROBLEM','Digite o e-mail que você usou para cadastrar-se no site.');
define('_US_YOUREMAIL','Seu e-mail: ');
define('_US_SENDPASSWORD','Enviar senha');
define('_US_LOGGEDOUT','Você saiu do site.');
define('_US_THANKYOUFORVISIT','Obrigado por sua visita.');
define('_US_INCORRECTLOGIN','Dados incorretos!');
define('_US_LOGGINGU','Obrigado por entrar no site, %s.');

// 2001-11-17 ADD
define('_US_NOACTTPADM','O cadastro do usuário selecionado foi desativado ou ainda não foi ativado.<br/>Entre em contato com o administrador para maiores informações.');
define('_US_ACTKEYNOT','A código de ativação <b>não</b> está correta.');
define('_US_ACONTACT','A conta selecionada está ativa.');
define('_US_ACTLOGIN','Seu cadastro foi ativado.<br/>Você já pode entrar no site com a senha escolhida.');
define('_US_NOPERMISS','Você não tem permissão para executar esta operação.');
define('_US_SURETODEL','Tem certeza de que deseja excluir seu cadastro?');
define('_US_REMOVEINFO','Esta ação irá excluir todas as suas informações do nosso banco de dados.');
define('_US_BEENDELED','O seu cadastro foi excluído!');


//%%%%%%        File Name register.php  DEPRECATED AND MOVED TO PROFILE MODULE  %%%%%

// AVATAR
define('_US_MYAVATAR', 'Meu avatar');
define('_US_UPLOADMYAVATAR', 'Enviar Avatar');
define('_US_MAXPIXEL','Tamanho máximo da imagem (em pixels)');
define('_US_MAXIMGSZ','Tamanho máximo da imagem (em bytes)');
define('_US_SELFILE','Selecione o arquivo');
define('_US_OLDDELETED','O avatar anterior será excluido.');
define('_US_CHOOSEAVT', 'Escolha um avatar disponível na lista');

define('_US_PRESSLOGIN', 'Pressione o botão para entrar');

define('_US_ADMINNO', 'Administradores não podem ser excluidos.');
define('_US_GROUPS', 'Grupos de Usuários');

define("_US_RESENDACTIVATIONMAIL", "Reenviar e-mail de ativação");
?>