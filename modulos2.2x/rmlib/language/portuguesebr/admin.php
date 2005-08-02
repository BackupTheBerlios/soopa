<?php
// $Id: admin.php,v 1.2 2005/08/02 04:07:07 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//              RM+SOFT - Systema de Ayuda y Manuales en Línea               //
//                Copyright RM+SOFT © 2005. (Eduardo Cortés)                 //
//                     <http://www.redmexico.com.mx/>                        //
//  ------------------------------------------------------------------------ //
//				   Archivo de Lenguaje Creado Por AdminOne				     //
//							   Español México								 //
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
//	bajo los términos de al GNU General Public Licencse como ha sido		 //
//	publicada por The Free Software Foundation (Fundación de Software Libre; //
//	en cualquier versión 2 de la Licencia o mas reciente.					 //
//                                                                           //
//	Este programa es distribuido esperando que sea últil pero SIN NINGUNA	 //
//	GARANTÍA. Ver The GNU General Public License para mas detalles.			 //
//  ------------------------------------------------------------------------ //
//	Questions, Bugs or any comment plese write me						 	 //
//	Preguntas, errores o cualquier comentario escribeme						 //
//	<adminone@redmexico.com.mx>												 //
//  ------------------------------------------------------------------------ //

define("_RH_THEMES_TITLE", "Livros existentes em: %s");
define("_RH_THEMES_NOTFOUND", "Não existem livros na base de dados");
define("_RH_THEMES_TITLET", "Título do livro");
define("_RH_THEMES_DATE", "Incluído");
define("_RH_THEMES_TYPE", "Tipo");
define("_RH_THEMES_ORDER", "Posição");
define("_RH_THEMES_OPTIONS", "Opções");
define("_RH_THEMES_NEWTHEME", "Criar Novo Livro");
define("_RH_THEMES_DESC", "Descrição do Livro");
define("_RH_THEMES_TYPENEW", "Tipo de Livro");
define("_RH_THEMES_TYPEHELP", "Ajuda");
define("_RH_THEMES_TYPEMANUAL", "Manual");
define("_RH_THEMES_TYPEFAQ", "Perguntas Frequentes");
define("_RH_THEMES_TYPEBOOK", "Livro");
define("_RH_THEMES_TYPETUTORIAL", "Tutorial");
define("_RH_THEMES_DATAMISSING", "Faltam Dados. Por favor complete todos os campos.");
define("_RH_THEMES_EXIST", "ERRO! Ja existe um livro com o mesmo título");
define("_RH_THEMES_SUCEFULLY", "Livro criado corretamente");
define("_RH_THEMES_PERMISSIONS", "Permissões do livro");
define("_RH_THEMES_EXISTSPERM", "Usuarios com permiso de Escrita:");
define("_RH_THEMES_USEREXIST", "O usuário especificado já tem permissão de escrita neste livro");
define("_RH_THEMES_USERADDED", "O usuário foi adicionado a este livro");

/***
* Cadenas para la administración de categorías
***/
define("_RH_CATEGOS_TITLE", "Seções existentes em RM+Help");
define("_RH_CATEGOS_TITLEC", "Título da Seção");
define("_RH_CATEGOS_DATE", "Criada");
define("_RH_CATEGOS_DESC", "Descrição");
define("_RH_CATEGOS_NOTFOUND", "Não foram encontradas opções na base de dados.");
define("_RH_CATEGOS_NEWCATEGO", "Criada nova seção");
define("_RH_CATEGOS_EXIST", "ERRO! Já existe uma seção com o mesmo título");
define("_RH_CATEGOS_SUCEFULLY", "Seção criada corretamente");
define("_RH_CATEGOS_DELETED", "Seção apagada correctamente");
define("_RH_CATEGOS_CATNAME", "Nome da seção");

/***
* Cadenas para la administración de los indices
***/
define("_RH_INDEX_TITLE", "Indices Existentes em: %s: %s");
define("_RH_INDEX_NOTFOUND", "Não foi encontrado indice para este livro");
define("_RH_INDEX_NEWINDEX", "Criar Índice");
define("_RH_INDEX_TITLEI", "Título do Índice");
define("_RH_INDEX_THEME", "Livro a que pertenece");
define("_RH_INDEX_PARENT", "Índice Superior");
define("_RH_INDEX_ORDER", "Posição");
define("_RH_INDEX_SUCESS", "Índice criado corretamente");
define("_RH_INDEX_CONFIRM", "Realmente deseja apagar este Índice?<br /> Todos os subíndices que lhe pertencem serão enviados para o nivel superior.");
define("_RH_INDEX_BEFORE", "Antes de eliminar um índice é recomendado eliminar os subíndices");
define("_RH_INDEX_EDIT","Edição do Índice");
define("_RH_INDEX_NOPARENT", "Sem índice superior");

/***
* Cadenas para la administración de contenidos
***/
define("_RH_CONTENT_TITLE", "Conteúdo para: %s");
define("_RH_CONTENT_TEXT", "Texto do Conteúdo");
define("_RH_CONTENT_INST", "Se deseja vincular o conteúdo a um livro especifico, selecione o elemento na lista da direita.");
define("_RH_CONTENT_CATEGO", "Seções:");
define("_RH_CONTENT_THEME", "Livros:");
define("_RH_CONTENT_INDEX", "Índices:");
define("_RH_CONTENT_ADD", "Adicionar");
define("_RH_CONTENT_LINKS", "Links");
define("_RH_CONTENT_DELETE", "Excluir");
define("_RH_CONTENT_SUCESS", "Conteúdo criado corretamente");

/***
* Cadenas generales para la administración de RM+Help
**/
define("_RH_GENERAL_DELELEMET", "¿Realmente deseas eliminar este elemento?");
define("_RH_GENERAL_DELETED", "Elemento eliminado correctamente");
define("_RH_GENERAL_SEND", "Enviar");
define("_RH_GENERAL_CANCEL", "Cancelar");
define("_RH_GENERAL_BACKCATEGO", "Volver a las Secciones");
define("_RH_GENERAL_BACKTHEMES", "Volver a los Libros");
define("_RH_GENERAL_DELETEUSERCONFIRM", "¿Realmente deseas eliminar permisos para este usuario?");
?>