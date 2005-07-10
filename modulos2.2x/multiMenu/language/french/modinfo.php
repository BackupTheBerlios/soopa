<?php
//  ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System				//
//                    Copyright (c) 2004 XOOPS.org					//
//                       <http://www.xoops.org/>					//
//													//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)			//
//                                 	- herve (www.herve-thouzard.com)		//
//                  multiMenu v1.6								//
//  ------------------------------------------------------------------------	//

define("_MI_MULTIMENU_MODULE",	"multiMenu");
define("_MI_MULTIMENU_NAME_",		"multiMenu ");

for ($i = 1; $i <= 8; $i++) {
$idMenu = sprintf("%02d",$i);
define("_MI_MULTIMENU_NAME_".$idMenu,	"multiMenu ".$idMenu);
define("_MI_MULTIMENU_MM_INDEX_".$idMenu, "Afficher dans l'index le menu ".$idMenu);
define("_MI_MULTIMENU_MM_TITLE_".$idMenu,	"Titre du Menu".$idMenu);
}

define("_MI_MULTIMENU_NAME_A",	"multiMenu A");
define("_MI_MULTIMENU_NAME_B",	"multiMenu B");
define("_MI_MULTIMENU_NAME_ADMIN",	"Admin Bloc");
define("_MI_MULTIMENU_DESC",		"Permet de créer jusqu'à 8 menus personnalisés différents.");

define("_MI_MULTIMENU_NAME_ADMIN",	"Bloc Admin");
define("_MI_MULTIMENU_TEXT_INDEX",	"Texte d'introduction de la page d'index");
define("_MI_MULTIMENU_TEXT_INDEXDSC","Insérez ici le texte d'introduction<br />à afficher dans la page d'accueil");
define("_MI_MULTIMENU_WELCOME",	"<div align='center'>Bienvenue dans multiMenu 1.7. 
<i>\"Quand multiMenu devient SiteMap !\"</i>


Pour plus d'informations ou pour rapporter d'éventuels beugs, visitez <a href='http://www.wolfpackclan.com/wolfactory/' target='_blank'>WolFactory</a>.

:-D
</div>
<div align='left'>Solo</div>

<div align='left'>Note : pour éditer ce texte, allez dans les préférences du module.</div>");
define("_MI_MULTIMENU_SHOW_MAIN",	"Afficher la page principale :");
define("_MI_MULTIMENU_DISPLAY_NAV",	"Afficher le menu de navigation :");

define("_MI_MULTIMENU_MM01_INDEX",	"Afficher Menu 1 dans l'index");
define("_MI_MULTIMENU_MM02_INDEX",	"Afficher Menu2 dans l'index");
define("_MI_MULTIMENU_MM03_INDEX",	"Afficher Menu3 dans l'index");
define("_MI_MULTIMENU_MM04_INDEX",	"Afficher Menu4 dans l'index");
define("_MI_MULTIMENU_MM05_INDEX",	"Afficher Liens Admin dans l'index");

define("_MI_MULTIMENU_MM01_TITLE",	"Titre Menu 1");
define("_MI_MULTIMENU_MM02_TITLE",	"Titre Menu 2");
define("_MI_MULTIMENU_MM03_TITLE",	"Titre Menu 3");
define("_MI_MULTIMENU_MM04_TITLE",	"Titre Menu 4");
define("_MI_MULTIMENU_MM05_TITLE",	"Titre Menu Admin");

define("_MI_MULTIMENU_INDEX",		"Index");
define("_MI_MULTIMENU_ADMIN",		"Admin");
define("_MI_MULTIMENU_READ",		"Lectures : ");
define("_MI_MULTIMENU_IMAGE_WIDTH",	"Largeur d'image par défaut : ");
define("_MI_MULTIMENU_ICONS",		"Afficher les icônes : ");
define("_MI_MULTIMENU_THEME",		"Menu à afficher dans le thème : <br /><br />
<i>Code à insérer dans le thème :</i><br /><font color='blue' size='1'><nobr><{include file=\"../modules/multiMenu/theme/multimenu.php\"}></nobr></font><br /><br />
<font color='red'> Note: Seuls les '<i>liens principaux</i>' <br />sont affichés dans le thème !</font>");

define("_MI_MULTIMENU_BANNER_DISP",	"Afficher la bannière :");
define("_MI_MULTIMENU_BANNER",	"Bannière");
define("_MI_MULTIMENU_MODULENAME",	"Nom du module");
define("_MI_MULTIMENU_NONE",		"- Rien -");
define("_MI_MULTIMENU_THEME_TYPE",	"Type de menu à afficher dans le thème :");
define("_MI_MULTIMENU_THEME_TABLE",	"Table");
define("_MI_MULTIMENU_THEME_PATH",	"Chemin");
?>
