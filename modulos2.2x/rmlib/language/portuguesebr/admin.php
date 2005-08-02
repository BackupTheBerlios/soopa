<?php
// $Id: admin.php,v 1.2 2005/08/02 04:07:07 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//              RM+SOFT - Systema de Ayuda y Manuales en L�nea               //
//                Copyright RM+SOFT � 2005. (Eduardo Cort�s)                 //
//                     <http://www.redmexico.com.mx/>                        //
//  ------------------------------------------------------------------------ //
//				   Archivo de Lenguaje Creado Por AdminOne				     //
//							   Espa�ol M�xico								 //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//  ------------------------------------------------------------------------ //
//	Este programa es un programa libre; puedes distribuirlo y modificarlo	 //
//	bajo los t�rminos de al GNU General Public Licencse como ha sido		 //
//	publicada por The Free Software Foundation (Fundaci�n de Software Libre; //
//	en cualquier versi�n 2 de la Licencia o mas reciente.					 //
//                                                                           //
//	Este programa es distribuido esperando que sea �ltil pero SIN NINGUNA	 //
//	GARANT�A. Ver The GNU General Public License para mas detalles.			 //
//  ------------------------------------------------------------------------ //
//	Questions, Bugs or any comment plese write me						 	 //
//	Preguntas, errores o cualquier comentario escribeme						 //
//	<adminone@redmexico.com.mx>												 //
//  ------------------------------------------------------------------------ //

define("_RH_THEMES_TITLE", "Livros existentes em: %s");
define("_RH_THEMES_NOTFOUND", "N�o existem livros na base de dados");
define("_RH_THEMES_TITLET", "T�tulo do livro");
define("_RH_THEMES_DATE", "Inclu�do");
define("_RH_THEMES_TYPE", "Tipo");
define("_RH_THEMES_ORDER", "Posi��o");
define("_RH_THEMES_OPTIONS", "Op��es");
define("_RH_THEMES_NEWTHEME", "Criar Novo Livro");
define("_RH_THEMES_DESC", "Descri��o do Livro");
define("_RH_THEMES_TYPENEW", "Tipo de Livro");
define("_RH_THEMES_TYPEHELP", "Ajuda");
define("_RH_THEMES_TYPEMANUAL", "Manual");
define("_RH_THEMES_TYPEFAQ", "Perguntas Frequentes");
define("_RH_THEMES_TYPEBOOK", "Livro");
define("_RH_THEMES_TYPETUTORIAL", "Tutorial");
define("_RH_THEMES_DATAMISSING", "Faltam Dados. Por favor complete todos os campos.");
define("_RH_THEMES_EXIST", "ERRO! Ja existe um livro com o mesmo t�tulo");
define("_RH_THEMES_SUCEFULLY", "Livro criado corretamente");
define("_RH_THEMES_PERMISSIONS", "Permiss�es do livro");
define("_RH_THEMES_EXISTSPERM", "Usuarios com permiso de Escrita:");
define("_RH_THEMES_USEREXIST", "O usu�rio especificado j� tem permiss�o de escrita neste livro");
define("_RH_THEMES_USERADDED", "O usu�rio foi adicionado a este livro");

/***
* Cadenas para la administraci�n de categor�as
***/
define("_RH_CATEGOS_TITLE", "Se��es existentes em RM+Help");
define("_RH_CATEGOS_TITLEC", "T�tulo da Se��o");
define("_RH_CATEGOS_DATE", "Criada");
define("_RH_CATEGOS_DESC", "Descri��o");
define("_RH_CATEGOS_NOTFOUND", "N�o foram encontradas op��es na base de dados.");
define("_RH_CATEGOS_NEWCATEGO", "Criada nova se��o");
define("_RH_CATEGOS_EXIST", "ERRO! J� existe uma se��o com o mesmo t�tulo");
define("_RH_CATEGOS_SUCEFULLY", "Se��o criada corretamente");
define("_RH_CATEGOS_DELETED", "Se��o apagada correctamente");
define("_RH_CATEGOS_CATNAME", "Nome da se��o");

/***
* Cadenas para la administraci�n de los indices
***/
define("_RH_INDEX_TITLE", "Indices Existentes em: %s: %s");
define("_RH_INDEX_NOTFOUND", "N�o foi encontrado indice para este livro");
define("_RH_INDEX_NEWINDEX", "Criar �ndice");
define("_RH_INDEX_TITLEI", "T�tulo do �ndice");
define("_RH_INDEX_THEME", "Livro a que pertenece");
define("_RH_INDEX_PARENT", "�ndice Superior");
define("_RH_INDEX_ORDER", "Posi��o");
define("_RH_INDEX_SUCESS", "�ndice criado corretamente");
define("_RH_INDEX_CONFIRM", "Realmente deseja apagar este �ndice?<br /> Todos os sub�ndices que lhe pertencem ser�o enviados para o nivel superior.");
define("_RH_INDEX_BEFORE", "Antes de eliminar um �ndice � recomendado eliminar os sub�ndices");
define("_RH_INDEX_EDIT","Edi��o do �ndice");
define("_RH_INDEX_NOPARENT", "Sem �ndice superior");

/***
* Cadenas para la administraci�n de contenidos
***/
define("_RH_CONTENT_TITLE", "Conte�do para: %s");
define("_RH_CONTENT_TEXT", "Texto do Conte�do");
define("_RH_CONTENT_INST", "Se deseja vincular o conte�do a um livro especifico, selecione o elemento na lista da direita.");
define("_RH_CONTENT_CATEGO", "Se��es:");
define("_RH_CONTENT_THEME", "Livros:");
define("_RH_CONTENT_INDEX", "�ndices:");
define("_RH_CONTENT_ADD", "Adicionar");
define("_RH_CONTENT_LINKS", "Links");
define("_RH_CONTENT_DELETE", "Excluir");
define("_RH_CONTENT_SUCESS", "Conte�do criado corretamente");

/***
* Cadenas generales para la administraci�n de RM+Help
**/
define("_RH_GENERAL_DELELEMET", "�Realmente deseas eliminar este elemento?");
define("_RH_GENERAL_DELETED", "Elemento eliminado correctamente");
define("_RH_GENERAL_SEND", "Enviar");
define("_RH_GENERAL_CANCEL", "Cancelar");
define("_RH_GENERAL_BACKCATEGO", "Volver a las Secciones");
define("_RH_GENERAL_BACKTHEMES", "Volver a los Libros");
define("_RH_GENERAL_DELETEUSERCONFIRM", "�Realmente deseas eliminar permisos para este usuario?");
?>