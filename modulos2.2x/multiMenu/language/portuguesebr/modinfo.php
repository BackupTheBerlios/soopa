<?php
//  ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System				//
//                    Copyright (c) 2004 XOOPS.org					//
//                       <http://www.xoops.org/>					//
//													//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)			//
//                                 	- herve (www.herve-thouzard.com)		//
//                  multiMenu v1.7								//
//  ------------------------------------------------------------------------	//
//Traduzido para portugu�s do Brasil (portuguesebr) por Wilson e GibaPhp > www.xoopstotal.com.br//
//Revisado pela equipe XoopsTotal                                                               //

define("_MI_MULTIMENU_MODULE",	"multiMenu");
define("_MI_MULTIMENU_NAME_",		"multiMenu ");

for ($i = 1; $i <= 8; $i++) {
$idMenu = sprintf("%02d",$i);
define("_MI_MULTIMENU_NAME_".$idMenu,	"multiMenu ".$idMenu);
define("_MI_MULTIMENU_MM_INDEX_".$idMenu, "Mostra o multiMenu Principal ".$idMenu);
define("_MI_MULTIMENU_MM_TITLE_".$idMenu,	"T�tulo do Menu ".$idMenu);
}
define("_MI_MULTIMENU_NAME_A",	"multiMenu A");
define("_MI_MULTIMENU_NAME_B",	"multiMenu B");
define("_MI_MULTIMENU_NAME_ADMIN",	"Bloco do Admin");
define("_MI_MULTIMENU_DESC",		"Permite que voc� possa criar 7 diferentes tipos de menus customizados.");

define("_MI_MULTIMENU_TEXT_INDEX",	"Texto Introdut�rio");
define("_MI_MULTIMENU_TEXT_INDEXDSC","Inserir aqui o texto para ser mostrado na p�gina inicial");
define("_MI_MULTIMENU_WELCOME",	"Bem-vindo ao multiMenu*.

Para maiores informa��es, bugs d�vidas sobre o m�dulo, sugest�es , visite o <a href='http://www.wolfpackclan.com/wolfactory/' target='_blank'>WolFactory</a>.

:-D

<div align='right'>Solo</div>

<div align='left'>*Para editar este texto, voc� dever� entrar nas configura��es.</div>");
define("_MI_MULTIMENU_SHOW_MAIN",	"Mostrar Menu Principal");
define("_MI_MULTIMENU_DISPLAY_NAV",	"Mostra Barra de navega��o");

define("_MI_MULTIMENU_INDEX",		"�ndice");
define("_MI_MULTIMENU_ADMIN",		"Admin");
define("_MI_MULTIMENU_READ",		"Lidos: ");
define("_MI_MULTIMENU_IMAGE_WIDTH",	"Tamanho padr�o da Imagem com: ");
define("_MI_MULTIMENU_ICONS",		"Mostrar �cones: ");
define("_MI_MULTIMENU_THEME",		"Menu para mostrar no theme:<br /><br />
inserir o seu tema :<br /><font color='blue'><nobr><{include file=\"../modules/multiMenu/theme/multimenu.php\"}></nobr></font><br /><br />
<font color='red'> Nota: Somente no '<i>Menu Principal de links</i>' � que ser� mostrado neste tema !</font>");

define("_MI_MULTIMENU_BANNER_DISP",	"Mostrar banner:");
define("_MI_MULTIMENU_BANNER",	"Banner");
define("_MI_MULTIMENU_MODULENAME",	"Nome do M�dulo");
define("_MI_MULTIMENU_NONE",		"Nenhum");
define("_MI_MULTIMENU_THEME_TYPE",	"Modelo de exposi��o do menu do tema");
define("_MI_MULTIMENU_THEME_TABLE",	"Tabela");
define("_MI_MULTIMENU_THEME_PATH",	"Path");
?>
