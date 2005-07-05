<?php
// $Id: modulesadmin.php,v 1.1 2005/07/05 05:10:36 mauriciodelima Exp $
//%%%%%%	File Name  modulesadmin.php 	%%%%%
define("_MD_AM_MODADMIN","Administra��o de m�dulos");
define("_MD_AM_MODULE","M�dulo");
define("_MD_AM_VERSION","Vers�o");
define("_MD_AM_LASTUP","�ltima atualiza��o");
define("_MD_AM_DEACTIVATED","Desativado");
define("_MD_AM_ACTION","A��o");
define("_MD_AM_DEACTIVATE","Desativar");
define("_MD_AM_ACTIVATE","Desativar");
define("_MD_AM_UPDATE","Atualizar");
define("_MD_AM_DUPEN","Registro duplicado na tabela de m�dulos.");
define("_MD_AM_DEACTED","O m�dulo selecionado foi desativado. Agora poder� ser desinstalado com seguran�a.");
define("_MD_AM_ACTED","O m�dulo selecionado foi ativado.");
define("_MD_AM_UPDTED","O m�dulo selecionado foi atualizado.");
define("_MD_AM_SYSNO","O m�dulo do sistema n�o pode ser desativado.");
define("_MD_AM_STRTNO","Este m�dulo est� definido para abertura na p�gina principal.</b>Altere a p�gina principal nas configura��es gerais do site.");

// added in RC2
define("_MD_AM_PCMFM","Confirme:");

// added in RC3
define("_MD_AM_ORDER","Ordem");
define("_MD_AM_ORDER0","(0 = ocultar)");
define("_MD_AM_ACTIVE","Ativado");
define("_MD_AM_INACTIVE","Desativado");
define("_MD_AM_NOTINSTALLED","N�o instalado");
define("_MD_AM_NOCHANGE","Sem altera��o");
define("_MD_AM_INSTALL","Instalar");
define("_MD_AM_UNINSTALL","Desinstalar");
define("_MD_AM_SUBMIT","Prosseguir");
define("_MD_AM_CANCEL","Cancelar");
define("_MD_AM_DBUPDATE","As informa��es foram salvas corretamente.");
define("_MD_AM_BTOMADMIN","Retornar � p�gina de administra��o dos m�dulos");

// %s represents module name
define("_MD_AM_FAILINS","N�o foi poss�vel instalar %s.");
define("_MD_AM_FAILACT","N�o foi poss�vel ativar %s.");
define("_MD_AM_FAILDEACT","N�o foi poss�vel desativar %s.");
define("_MD_AM_FAILUPD","N�o foi poss�vel atualizar o m�dulo %s.");
define("_MD_AM_FAILUNINS","N�o foi poss�vel desinstalar o m�dulo %s.");
define("_MD_AM_FAILORDER","N�o foi poss�vel reordenar %s.");
define("_MD_AM_FAILWRITE","N�o foi poss�vel salvar no menu principal.<br/>Verifique se o diret�rio <i>/cache</i> tem permiss�o para grava��o (chmod 777)");
define("_MD_AM_ALEXISTS","O m�dulo %s j� estava instalado.");
define("_MD_AM_ERRORSC", "Erro(s):");
define("_MD_AM_OKINS","O m�dulo %s foi instalado corretamente.");
define("_MD_AM_OKACT","O m�dulo %s foi ativado corretamente.");
define("_MD_AM_OKDEACT","O m�dulo %s foi desativado corretamente.");
define("_MD_AM_OKUPD","O m�dulo %s foi atualizado corretamente.");
define("_MD_AM_OKUNINS","O m�dulo %s foi desinstalado corretamente.");
define("_MD_AM_OKORDER","O m�dulo %s foi reorganizado corretamente.");

define('_MD_AM_RUSUREINS', 'Deseja instalar este m�dulo?');
define('_MD_AM_RUSUREUPD', 'Deseja atualizar este m�dulo?');
define('_MD_AM_RUSUREUNINS', 'Deseja desinstalar este m�dulo?');
define('_MD_AM_LISTUPBLKS', 'Os seguintes blocos ser�o atualizados.<br/>Selecione os blocos para atualiza��o de modelos e op��es.<br/>');
define('_MD_AM_NEWBLKS', 'Novos blocos');
define('_MD_AM_DEPREBLKS', 'Blocos desatualizados');

// added in 2.2
define("_MD_AM_SELECT_ADMINS", "Grupos para administrar<i><br/><br/> Selecione o(s) grupo(s) que poder�o <br/>administrar o m�dulo.</i>");
define("_MD_AM_SELECT_ACCESS", "Grupos para acessar <i><br/><br/> Selecione o(s) grupo(s) que poder�o<br/> acessar o m�dulo.");
?>