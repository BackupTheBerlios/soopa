<?php
// $Id: admin.php,v 1.1 2005/07/10 02:32:18 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//              RM+SOFT - Systema de Ayuda y Manuales en Línea               //
//                Copyright RM+SOFT © 2005. (Eduardo Cortés)                 //
//                     <http://www.redmexico.com.mx/>                        //
//  ------------------------------------------------------------------------ //
//				   Archivo de Lenguaje Creado Por AdminOne				     //
//							     English									 //
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

define("_RH_THEMES_TITLE", "Books in: %s");
define("_RH_THEMES_NOTFOUND", "There are not books in the database");
define("_RH_THEMES_TITLET", "Book Title");
define("_RH_THEMES_DATE", "Created");
define("_RH_THEMES_TYPE", "Type");
define("_RH_THEMES_ORDER", "Position");
define("_RH_THEMES_OPTIONS", "Options");
define("_RH_THEMES_NEWTHEME", "New Book");
define("_RH_THEMES_DESC", "Book Description");
define("_RH_THEMES_TYPENEW", "Book Type");
define("_RH_THEMES_TYPEHELP", "Help");
define("_RH_THEMES_TYPEMANUAL", "Manual");
define("_RH_THEMES_TYPEFAQ", "FAQ");
define("_RH_THEMES_TYPEBOOK", "Generic Book");
define("_RH_THEMES_TYPETUTORIAL", "Tutorial");
define("_RH_THEMES_DATAMISSING", "Data Missing. Please fill all the fields.");
define("_RH_THEMES_EXIST", "¡ERROR! Already exists a book with the same title.");
define("_RH_THEMES_SUCEFULLY", "Book created correctly");

/***
* Cadenas para la administración de categorías
***/
define("_RH_CATEGOS_TITLE", "Existing sections in RM+Soft Library");
define("_RH_CATEGOS_TITLEC", "Section Title");
define("_RH_CATEGOS_DATE", "Created");
define("_RH_CATEGOS_DESC", "Description");
define("_RH_CATEGOS_NOTFOUND", "There are not sections in the database.");
define("_RH_CATEGOS_NEWCATEGO", "New Section");
define("_RH_CATEGOS_EXIST", "¡ERROR! Already exists a section with the same title.");
define("_RH_CATEGOS_SUCEFULLY", "Section created correctly");
define("_RH_CATEGOS_DELETED", "Section deleted correctly");
define("_RH_CATEGOS_CATNAME", "Section Name");

/***
* Cadenas para la administración de los indices
***/
define("_RH_INDEX_TITLE", "Existing Index: %s: %s");
define("_RH_INDEX_NOTFOUND", "There are not index for this book.");
define("_RH_INDEX_NEWINDEX", "New Index");
define("_RH_INDEX_TITLEI", "Index Title");
define("_RH_INDEX_THEME", "Belogn To");
define("_RH_INDEX_PARENT", "Parent Index");
define("_RH_INDEX_ORDER", "Position");
define("_RH_INDEX_SUCESS", "Index created correctly");
define("_RH_INDEX_CONFIRM", "¿Do you really want to delete this index?<br /> All the subindex will be sent to the parent index.?");
define("_RH_INDEX_BEFORE", "Before to delete an index delete the subindex");
define("_RH_INDEX_EDIT","Index Edition");
define("_RH_INDEX_NOPARENT", "No Parent Index");

/***
* Cadenas para la administración de contenidos
***/
define("_RH_CONTENT_TITLE", "Content to: %s");
define("_RH_CONTENT_TEXT", "Content Text");
define("_RH_CONTENT_INST", "Select the element from the right list if you wish create a link to a book or specific index.");
define("_RH_CONTENT_CATEGO", "Sections:");
define("_RH_CONTENT_THEME", "Books:");
define("_RH_CONTENT_INDEX", "Index:");
define("_RH_CONTENT_ADD", "Add");
define("_RH_CONTENT_LINKS", "Links");
define("_RH_CONTENT_SUCESS", "Content created correctly");

/***
* Cadenas generales para la administración de RM+Help
**/
define("_RH_GENERAL_DELELEMET", "¿Do you really wnat to delete this element?");
define("_RH_GENERAL_DELETED", "Element deleted succesfully");
define("_RH_GENERAL_SEND", "Send");
define("_RH_GENERAL_CANCEL", "Cancel");
define("_RH_GENERAL_BACKCATEGO", "Back to Sections");
define("_RH_GENERAL_BACKTHEMES", "Back to Books");
?>