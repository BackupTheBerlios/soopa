<?php
// $Id: modulesadmin.php,v 1.1 2005/07/05 05:10:36 mauriciodelima Exp $
//%%%%%%	File Name  modulesadmin.php 	%%%%%
define("_MD_AM_MODADMIN","Administração de módulos");
define("_MD_AM_MODULE","Módulo");
define("_MD_AM_VERSION","Versão");
define("_MD_AM_LASTUP","Última atualização");
define("_MD_AM_DEACTIVATED","Desativado");
define("_MD_AM_ACTION","Ação");
define("_MD_AM_DEACTIVATE","Desativar");
define("_MD_AM_ACTIVATE","Desativar");
define("_MD_AM_UPDATE","Atualizar");
define("_MD_AM_DUPEN","Registro duplicado na tabela de módulos.");
define("_MD_AM_DEACTED","O módulo selecionado foi desativado. Agora poderá ser desinstalado com segurança.");
define("_MD_AM_ACTED","O módulo selecionado foi ativado.");
define("_MD_AM_UPDTED","O módulo selecionado foi atualizado.");
define("_MD_AM_SYSNO","O módulo do sistema não pode ser desativado.");
define("_MD_AM_STRTNO","Este módulo está definido para abertura na página principal.</b>Altere a página principal nas configurações gerais do site.");

// added in RC2
define("_MD_AM_PCMFM","Confirme:");

// added in RC3
define("_MD_AM_ORDER","Ordem");
define("_MD_AM_ORDER0","(0 = ocultar)");
define("_MD_AM_ACTIVE","Ativado");
define("_MD_AM_INACTIVE","Desativado");
define("_MD_AM_NOTINSTALLED","Não instalado");
define("_MD_AM_NOCHANGE","Sem alteração");
define("_MD_AM_INSTALL","Instalar");
define("_MD_AM_UNINSTALL","Desinstalar");
define("_MD_AM_SUBMIT","Prosseguir");
define("_MD_AM_CANCEL","Cancelar");
define("_MD_AM_DBUPDATE","As informações foram salvas corretamente.");
define("_MD_AM_BTOMADMIN","Retornar à página de administração dos módulos");

// %s represents module name
define("_MD_AM_FAILINS","Não foi possível instalar %s.");
define("_MD_AM_FAILACT","Não foi possível ativar %s.");
define("_MD_AM_FAILDEACT","Não foi possível desativar %s.");
define("_MD_AM_FAILUPD","Não foi possível atualizar o módulo %s.");
define("_MD_AM_FAILUNINS","Não foi possível desinstalar o módulo %s.");
define("_MD_AM_FAILORDER","Não foi possível reordenar %s.");
define("_MD_AM_FAILWRITE","Não foi possível salvar no menu principal.<br/>Verifique se o diretório <i>/cache</i> tem permissão para gravação (chmod 777)");
define("_MD_AM_ALEXISTS","O módulo %s já estava instalado.");
define("_MD_AM_ERRORSC", "Erro(s):");
define("_MD_AM_OKINS","O módulo %s foi instalado corretamente.");
define("_MD_AM_OKACT","O módulo %s foi ativado corretamente.");
define("_MD_AM_OKDEACT","O módulo %s foi desativado corretamente.");
define("_MD_AM_OKUPD","O módulo %s foi atualizado corretamente.");
define("_MD_AM_OKUNINS","O módulo %s foi desinstalado corretamente.");
define("_MD_AM_OKORDER","O módulo %s foi reorganizado corretamente.");

define('_MD_AM_RUSUREINS', 'Deseja instalar este módulo?');
define('_MD_AM_RUSUREUPD', 'Deseja atualizar este módulo?');
define('_MD_AM_RUSUREUNINS', 'Deseja desinstalar este módulo?');
define('_MD_AM_LISTUPBLKS', 'Os seguintes blocos serão atualizados.<br/>Selecione os blocos para atualização de modelos e opções.<br/>');
define('_MD_AM_NEWBLKS', 'Novos blocos');
define('_MD_AM_DEPREBLKS', 'Blocos desatualizados');

// added in 2.2
define("_MD_AM_SELECT_ADMINS", "Grupos para administrar<i><br/><br/> Selecione o(s) grupo(s) que poderão <br/>administrar o módulo.</i>");
define("_MD_AM_SELECT_ACCESS", "Grupos para acessar <i><br/><br/> Selecione o(s) grupo(s) que poderão<br/> acessar o módulo.");
?>