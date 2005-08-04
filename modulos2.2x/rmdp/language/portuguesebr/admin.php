<?
///////////////////////////////////////////////////////////////////////////////
// $Id: admin.php,v 1.4 2005/08/04 05:18:21 mauriciodelima Exp $                   //
// ------------------------------------------------------------------------  //
//                         RM+SOFT.Download.Plus                             //
//                    Copyright � 2005. Red Mexico Soft                      //
//                     <http:www.redmexico.com.mx>                           //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it andor modify      //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//  ------------------------------------------------------------------------ //
//  Este programa es un programa libre; puedes distribuirlo y modificarlo    //
//  bajo los t�rminos de al GNU General Public Licencse como ha sido         //
//  publicada por The Free Software Foundation (Fundaci�n de Software Libre; //
//  en cualquier versi�n 2 de la Licencia o mas reciente.                    //
//                                                                           //
//  Este programa es distribuido esperando que sea �ltil pero SIN NINGUNA    //
//  GARANT�A. Ver The GNU General Public License para mas detalles.          //
//  ------------------------------------------------------------------------ //
//  Questions, Bugs or any comment plese write me                            //
//  Preguntas, errores o cualquier comentario escribeme                      //
//  <adminone@redmexico.com.mx>                                              //
//  ------------------------------------------------------------------------ //
//                                                                           //
///////////////////////////////////////////////////////////////////////////////
//global $location;

define('_AM_RMDP_SEND','Enviar');
define('_AM_RMDP_CANCEL','Cancelar');
define('_AM_RMDP_MODIFY','Modificar');
define('_AM_RMDP_DELETE','Excluir');
define('_AM_RMDP_NEWCATEGO','Nova Categoria');
define('_AM_RMDP_YES','Sim;');
define('_AM_RMDP_NO','N�o');
define('_AM_RMDP_CATEGOFAIL','Ocorreu o seguinte erro:<br>');

/**
 * Declaraciones para la barra de navegaci�n
 */
define('_AM_RMDP_CATEGOS','N�mero das Categorias:');
define('_AM_RMDP_DOWNLOADS','Downloads');
define('_AM_RMDP_CARACTS','Caracter�sticas');
define('_AM_RMDP_DSPONSOR','Patroc�nio');
define('_AM_RMDP_OS','Plataformas');
define('_AM_RMDP_OPTIONS','Op��es');
define('_AM_RMDP_SLICS','Licen�as');
define('_AM_RMDP_SNSENDED','Enviadas');
define('_AM_RMDP_SMODIFIED','Alteradas');
define('_AM_RMDP_GOPAGE','P�gina: ');
define('_AM_RMDP_HELP','Ajuda');

//if ($location=='�ndice'){

	define('_AM_RMDP_ACTUALSTATUS','Estado Atual do M�dulo');
	define('_AM_RMDP_CATEGOS','N�mero das Categorias:');
	define('_AM_RMDP_SEE','Ver');
	define('_AM_RMDP_DOWNS','N�mero de Downloads:');
	define('_AM_RMDP_SPONSOR','Downloads:');
	define('_AM_RMDP_CARS','Caracter�sticas:');
	define('_AM_RMDP_LICS','N�mero de Licen�as:');
	define('_AM_RMDP_OSNUM','N�mero de Plataformas:');
	define('_AM_RMDP_DSEND','Downloads Enviados:');
	define('_AM_RMDP_NSHOTS','Captura de telas:');

//} elseif ($location=='Categorias'){
	define('_AM_RMDP_FNAME','Nome:');
	define('_AM_RMDP_FACCESS','Acesso:');
	define('_AM_RMDP_REGISTERED','S� Registrados');
	define('_AM_RMDP_EVERYBODY','Todos');
	define('_AM_RMDP_FPARENT','Categoria Pai:');
	define('_AM_RMDP_FIMG','Imagem:');
	define('_AM_RMDP_SELECT','Selecionar...');
	
	define('_AM_RMDP_ERRNAME','O nome do download n�o foi especificado');
	define('_AM_RMDP_ERREXIST','J� existe um download com o mesmo nome');
	define('_AM_RMDP_ERRNOEXIST','N�o existe o download especificado');
	define('_AM_RMDP_CATEGOOK','Categoria criada corretamente');
	define('_AM_RMDP_CATEGOMODOK','Categoria modificada corretamente');
	define('_AM_RMDP_CATEGOLIST','Lista de Categorias');
	define('_AM_RMDP_LNAME','Nome');
	define('_AM_RMDP_LACCESS','Acesso');
	define('_AM_RMDP_MODCATEGO','Modificar Categoria');
	define('_AM_RMDP_DELOK','Plataforma exclu�da corretamente');
	define('_AM_RMDP_CONFIRM','Realmente deseja excluir este download ?');
	
	define('_AM_RMDP_DOWNSLIST','Lista de Downloads');
	define('_AM_RMDP_SOFTCARS','Caracter�sticas');
	define('_AM_RMDP_SOFTOS','Plataformas');
	define('_AM_RMDP_SOFTSHOTS','Imagens');
	define('_AM_RMDP_NEWDOWN','Novo Download');
	define('_AM_RMDP_SHOWNEWS','Mostrar novidades na p�gina principal:');
	
//} elseif ($location=='downloads'){
	
	define('_AM_RMDP_DOWNSLIST','Lista de Downloads');
	define('_AM_RMDP_SOFTCARS','Caracter�sticas');
	define('_AM_RMDP_SOFTOS','Plataformas');
	define('_AM_RMDP_SOFTSHOTS','Imagens');
	define('_AM_RMDP_NEWDOWN','Novo Download');
	define('_AM_RMDP_MODDOWN','Modificar Download');
	define('_AM_RMDP_FNAME','Nome:');
	define('_AM_RMDP_SENDBY','Enviado por:');
	define('_AM_RMDP_FVERSION','Vers�o:');
	define('_AM_RMDP_FLICENSE','Licen�a:');
	define('_AM_RMDP_FFILE','Arquivo:');
	define('_AM_RMDP_RATING','Calcifica��o:');
	define('_AM_RMDP_FIMG','Imagem:');
	define('_AM_RMDP_FCATEGO','Categoria:');
	define('_AM_RMDP_SELECT','Selecionar...');
	define('_AM_RMDP_FLONG','Descri��o:');
	define('_AM_RMDP_FSIZE','Tamanho (em bytes):');
	define('_AM_RMDP_FFAVS','Adicionar aos Favoritos:');
	define('_AM_RMDP_FALLOWANONIM','Permitir downloads an�nimos:');
	define('_AM_RMDP_FRESALTE','Ressaltar:');
	define('_AM_RMDP_FURLTITLE','T�tulo do Site do Autor:');
	define('_AM_RMDP_FURL','URL do Autor:');
	define('_AM_RMDP_ERRNAME','O nome do download n�o foi especificado');
	define('_AM_RMDP_ERRNAMECAR','O nome da caracter�stica n�o foi especificado');
	define('_AM_RMDP_ERRVERSION','Por favor indique vers�o do arquivo');
	define('_AM_RMDP_ERRVFILE','Indique o arquivo para download');
	define('_AM_RMDP_ERRCATEGO','Selecione uma categoria para este download');
	define('_AM_RMDP_ERRDESC','Voc� deve adiciona ao menos uma descri��o curta para este download');
	define('_AM_RMDP_ERREXIST','J� existe um download com este nome');
	define('_AM_RMDP_ERRCAREXIST','J� existe uma caracter�stica com este nome');
	define('_AM_RMDP_DOWNOK','Download enviado corretamente');
	define('_AM_RMDP_CAROK','Caracter�stica criada corretamente');
	define('_AM_RMDP_CARMODOK','Caracter�stica alterada corretamente');
	define('_AM_RMDP_DOWNMODOK','Download Modificado Corretamente');
	define('_AM_RMDP_ERRNOEXIST','N�o existe o download especificado');
	define('_AM_RMDP_ERRCARNOEXIST','N�o existe a caracter�stica especificada');
	define('_AM_RMDP_CONFIRM','Realmente deseja excluir este download ?');
	define('_AM_RMDP_CONFIRMCAR','Realmente deseja excluir esta caracter�stica?');
	define('_AM_RMDP_DELOK','Plataforma eliminada corretamente');
	define('_AM_RMDP_DELCAROK','Caracter�stica exclu�da corretamente');
	define('_AM_RMDP_ALLCARS','Todas as Caracter�sticas');
	define('_AM_RMDP_ASSIGNEDCARS','Caracter�sticas atribu�das a "%s"');
	define('_AM_RMDP_ADD','Adicionar');
	define('_AM_RMDP_NEWCAR','Nova Caracter�stica');
	define('_AM_RMDP_MODCAR','Modificar Caracter�sticas');
	define('_AM_RMDP_CARINFO','As imagens devem estar localizadas em "modules/rmdp/images/caracts"');
	define('_AM_RMDP_OSALL','Plataformas Existentes');
	define('_AM_RMDP_OSASSIGN','Plataformas Adicionadas'); 
	define('_AM_RMDP_OSEXIST','Esta Plataforma j� foi atribu�da previamente');
	define('_AM_RMDP_LISTNAME','Nome');
	define('_AM_RMDP_LISTACCESS','Acesso');
	define('_AM_RMDP_REGISTERED','S� Registrados');
	define('_AM_RMDP_EVERYBODY','Todos');
	
	// Secci�n para las capturas de pantalla
	define('_AM_RMDP_SHOTLIST','Imagens existentes para "%s"');
	define('_AM_RMDP_SHOTNEW','Nova Imagem');
	define('_AM_RMDP_SHOTMOD','Modificar Imagem');
	define('_AM_RMDP_SHOTDOWN','Download:');
	define('_AM_RMDP_SHOTSMALL','Imagem pequena:');
	define('_AM_RMDP_SHOTBIG','Imagem Grande:');
	define('_AM_RMDP_SHOTDESC','Descri��o:');
	define('_AM_RMDP_SHOTERRSB','Erro: Especifique a imagem pequena e a imagem grande');
	define('_AM_RMDP_SHOTNOEXIST','N�o existe a imagem especificada');
	define('_AM_RMDP_SHOTCONFIRM','Desejas excluir esta imagem?');
	define('_AM_RMDP_SHOTDEL','Imagem exclu�da corretamente');
	
	// Secci�n de Reviews
	define('_AM_RMDP_REVIEWTITLE','Coment�rios do Editor');
	define('_AM_RMDP_REVIEW','Coment�rio:');
	define('_AM_RMDP_REVIEWOK','Seu coment�rio foi adicionado corretamente');	
	
//} elseif ($location=='licen�as'){
	define('_AM_RMDP_LICEXISTS','Licen�as Existentes');
	define('_AM_RMDP_NEWLIC','Nova Licen�a');
	define('_AM_RMDP_MODLIC','Modificar Licen�a');
	define('_AM_RMDP_FNAME','Nome:');
	define('_AM_RMDP_FURL','URL do Autor:');
	define('_AM_RMDP_ERRNAME','O nome do download n�o foi especificado');
	define('_AM_RMDP_ERREXIST','J� existe um download com o mesmo nome');
	define('_AM_RMDP_LICOK','Licen�a criada corretamente');
	define('_AM_RMDP_LICMODOK','Licen�a modificada corretamente');
	define('_AM_RMDP_ERRNOEXIST','O download especificado n�o existe');
	define('_AM_RMDP_DELOK','Plataforma exclu�da corretamente');
	define('_AM_RMDP_CONFIRM','Realmente deseja excluir este download?');
//} elseif ($location=='plataformas'){
	
	define('_AM_RMDP_OSEXISTS','Plataformas Existentes');
	define('_AM_RMDP_NEWOS','Nova Plataforma');
	define('_AM_RMDP_FNAME','Nome:');
	define('_AM_RMDP_FIMG','Imagem:');
	define('_AM_RMDP_ERRNAME','O nome do download n�o foi especificado');
	define('_AM_RMDP_ERREXIST','J� existe um download com o mesmo nome');
	define('_AM_RMDP_OSOK','Plataforma criada corretamente');
	define('_AM_RMDP_CONFIRM','Realmente deseja excluir este download?');
	define('_AM_RMDP_DELOK','Plataforma exclu�da corretamente');
	
//} elseif ($location=='sponsor'){

	define('_AM_RMDP_SPONSORLIST','Lista de Downloads');
	define('_AM_RMDP_SNAME','Nome');
	define('_AM_RMDP_SOPTIONS','Op��es');
	define('_AM_RMDP_NEWSPONSOR','Novo Download');
	define('_AM_RMDP_FDOWN','Selecionar Download:');
	define('_AM_RMDP_FTEXT','Texto:');
	define('_AM_RMDP_ERRDOWN','Erro: Nenhum download especificado');
	define('_AM_RMDP_ERRTEXT','Erro: Nenhum o texto para este download');
	define('_AM_RMDPO_SPONNOEXIST','O download especificado n�o existe');
	define('_AM_RMDP_CONFIRM','Realmente deseja excluir este download ?');

//} elseif ($location=='sended'){
	
	define('_RMDP_SENDED_TITLE','Downloads Enviados por Usu�rios');
	define('_RMDP_NAME','Nome');
	define('_RMDP_SENDBY','Enviou');
	define('_RMDP_DATE','Data');
	define('_AM_RMDP_ERRNOEXIST','O download especificado n�o existe');
	define('_AM_RMDP_FNAME','Nome:');
	define('_AM_RMDP_SENDBY','Enviado por:');
	define('_AM_RMDP_FVERSION','Vers�o:');
	define('_AM_RMDP_FLICENSE','Licen�a:');
	define('_AM_RMDP_FFILE','Arquivo:');
	define('_AM_RMDP_RATING','Qualifica��o:');
	define('_AM_RMDP_FIMG','Imagem:');
	define('_AM_RMDP_FCATEGO','Categoria:');
	define('_AM_RMDP_SELECT','Selecionar...');
	define('_AM_RMDP_FLONG','Descri��o:');
	define('_AM_RMDP_FSIZE','Tamanho (em bytes):');
	define('_AM_RMDP_FFAVS','Adicionar aos Favoritos:');
	define('_AM_RMDP_FALLOWANONIM','Permitir downloads an�nimos:');
	define('_AM_RMDP_FRESALTE','Ressaltar:');
	define('_AM_RMDP_FURLTITLE','T�tulo do Site do Autor:');
	define('_AM_RMDP_FURL','URL do Autor:');
	define('_AM_RMDP_SAVE','Salvar');
	define('_AM_RMDP_ACEPT','Aceitar Download');
	define('_AM_RMDP_ERRNAME','O nome do download n�o foi especificado');
	define('_AM_RMDP_ERREXIST','J� existe um download com o mesmo nome');
	define('_AM_RMDP_ERRVERSION','Por favor indique a vers�o do arquivo');
	define('_AM_RMDP_ERRVFILE','Indique o arquivo para download');
	define('_AM_RMDP_ERRCATEGO','Selecione uma categoria para este download');
	define('_AM_RMDP_SENDOK','Download enviado corretamente');
	define('_RMDP_MAIL_SUBJECT','Seu download foi enviado');
	define('_AM_RMDP_OSS','Plataformas:');
	
	// Mensajes y redirecciones
	define('_AM_RMDP_DELCONFIRM', 'Realmente deseja excluir ?');

//}
?>
