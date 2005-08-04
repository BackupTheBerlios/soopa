<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: main.php,v 1.3 2005/08/04 05:20:00 mauriciodelima Exp $                    //
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
//  bajo los t&eacute;rminos de al GNU General Public Licencse como ha sido  //
//  publicada por The Free Software Foundation (Fundaci&oacute;n de Software Libre; //
//  en cualquier versi&oacute;n 2 de la Licencia o mas reciente.                    //
//                                                                           //
//  Este programa es distribuido esperando que sea &uacute;ltil pero		 //
//	SIN NINGUNA GARANT�A. Ver The GNU General Public License para mas 		 //
//	detalles.          														 //
//  ------------------------------------------------------------------------ //
//  Questions, Bugs or any comment plese write me                            //
//  Preguntas, errores o cualquier comentario escribeme                      //
//  <adminone@redmexico.com.mx>                                              //
//  ------------------------------------------------------------------------ //
//                                                                           //
///////////////////////////////////////////////////////////////////////////////

define('_RMDP_DOWNLOAD_NOW','Iniciar Download');
define('_RMDP_DOWNLOAD_TODAY','Download de Hoje');
define('_RMDP_THENEW_INCAT','Novo em: %s');
define('_RMDP_SEALL_INCAT','Ver Tudo');
define('_RMDP_MORE_DOWNLOADS','Mais Downloads');
define('_RMDP_POPULAR','Popular');
define('_RMDP_BEST_RATED','Melhor Avaliado');
define('_RMDP_FORUMS','F�runs');
define('_RMDP_OUR_FAVORITES','Favoritos');
define('_RMDP_POPULAR_SOFT','Software Popular');
define('_RMDP_FAVORITE_TEXT','Downloads gratuitos %s ser�o mostrados aqui');
define('_RMDP_SPONSOR_NEWS','Novidades em destaque');
define('_RMDP_TOTAL_RESULTS','%s - %s de %s');
define('_RMDP_RESULT_PAGES','P�gina: ');
define('_RMDP_VOTES','(%s votos)');
define('_RMDP_NEW_DOWN','Novo');
define('_RMDP_UPDATE_DOWN','Atualizado');
define('_RMDP_ERR_ACCESS','Voc� n�o tem acesso a esta categoria');

/**
 * Cadenas para la barra de busqueda
 */
define('_RMDP_ALL_WEB','Pesquisar em toda web %s');
define('_RMDP_SEARCH_BUTTON','Pesquisar');
define('_RMDP_VIEW_FAV','Ver Favoritos');
define('_RMDP_VIEW_POP','Ver Popular');
define('_RMDP_VIEW_RATED','Ver Melhor avaliado');
define('_RMDP_SUBMIT_DOWN','Enviar Downloads');

/**
* Cadenas para los resultados
**/
define('_RMDP_SUBCATEGOS_IN','Subcategorias em "%s"');
define('_RMDP_DOWNS_INCATEGO','Download em %s');
define('_RMDP_RESORT_BY','Ordenar por:');
define('_RMDP_ORDER_NAME','Nome');
define('_RMDP_ORDER_DATE','Data');
define('_RMDP_ORDER_RATING','Avalia��o');
define('_RMDP_ORDER_OURRATING','Nosso avaliado');
define('_RMDP_ORDER_DOWNLOADS','Downloads');
define('_RMDP_ORDER_SUBMITTER','Enviar');
define('_RMDP_OS','Plataformas:');
define('_RMDP_VERSION','Vers�o:');
define('_RMDP_FILE_SIZE','Tamanho:');
define('_RMDP_LICENCE','Licen�a:');
define('_RMDP_SPONSORED','DESTACADO');
define('_RMDP_VIEW_SHOT','Ver imagens');
	
//if($rmdp_location=='downloads'){

	define('_RMDP_DOWNLOADS','Downloads:');
	define('_RMDP_WEB_SITE','Site:');
	define('_RMDP_DATE','Data:');
	define('_RMDP_LICENCE','Licen�a:');
	define('_RMDP_OS','Plataformas:');
	define('_RMDP_SCREEN_SHOT','Capturas de Tela');
	define('_RMDP_SEND_BY','Enviado por:');
	define('_RMDP_USER_RATING','Avalia��o dos Usu�rios:');
	define('_RMDP_VOTE','Votar');
	define('_RMDP_OUR_RATING','Nosso Avaliado:');
	define('_RMDP_SIZE','Tamanho:');
	define('_RMDP_USER_COMMENTS','Coment�rios dos Usu�rios');
	define('_RMDP_EDITOR_COM','Coment�rio de %s');
	define('_RMDP_PUBLISHER_DESC','Descri��o de %s');
	define('_RMDP_REPORT_BROKEN','Reportar Link quebrado');
	
	define('_RMDP_ERR_NOTFOUND','O download especificado n�o foi encontrado');
	define('_RMDP_ERR_NOACCESS','Registrar-se para fazer download desse arquivo');

	define('_DOWNLOAD_IN_PROGRESS','DOWNLOAD EM ANDAMENTO');
	define('_RMDP_CLICK_HERE','Se o download n�o iniciar automaticamente <a href="%s" target="_blank">click aqui.</a>');
	define('_RMDP_WHILE_DOWN','O download abriu em uma nova janela. Continue navegando enquanto seu download termina');

//} elseif ($rmdp_location=='votos'){

	define('_RMDP_NO_ACCESS','Registre-se para poder votar');
	define('_RMDP_IS_PUBLISHER','Voc� n�o pode votar nos seus pr�prios downloads');
	define('_RMDP_VOTE_ONEDAY','S� � permitido votar uma vez por dia no mesmo arquivo');
	define('_RMDP_VOTE_THX','Obrigado por seu voto. Por favor adicione um coment�rio a respeito desse arquivo');
	define('_RMDP_VOTE_ERR','Ocorreu um erro ao registrar seu voto, por favor tente novamente');
	define('_RMDP_NOVOTE_TWICE','N�o � permitido votar duas vezes no mesmo arquivo');

//} elseif ($rmdp_location=='shots'){

	define('_RMDP_LOCATION_SHOT','Imagens');
	define('_RMDP_DOWN_SHOTS','Imagens de %s');
	define('_RMDP_ERR_NOTFOUND','O download especificado n�o foi encontrado');

//} elseif ($rmdp_location=='popular'){
	define('_RMDP_POPULAR_TITLE','Downloads Populares');
	define('_RMDP_TOP_POP','Nossos <strong>%s</strong> downloads mais populares');
//} elseif ($rmdp_location=='favoritos'){
	define('_RMDP_TOP_FAVS','Nosso Software Favorito');
	define('_RMDP_FAVORITE_TITLE','Nossos Favoritos');
//}  elseif ($rmdp_location=='mejorval'){

	define('_RMDP_RATED_TITLE','Downloads Melhores Avaliados');
	define('_RMDP_TOP_RATE','Os <strong>%s</strong> Downloads melhores avaliados');
	
//} elseif ($rmdp_location=='submit'){
	
	define('_RMDP_SUBMIT_INACTIVE','O envio de downloads est� desabilitado no momento');
	define('_RMDP_REGISTER_FORSUBMIT','Para enviar downloads � necess�rio estar registrado');
	define('_RMDP_FNAME','Nome:');
	define('_RMDP_FVERSION','Vers�o:');
	define('_RMDP_FLIC','Licen�a:');
	define('_RMDP_FFILE','Arquivo:');
	define('_RMDP_FIMAGE','imagem:');
	define('_RMDP_FIMAGETIP','A imagem deve ter %s pixel. de largura');
	define('_RMDP_FCATEGO','Categoria');
	define('_RMDP_FDESC','Descri��o:');
	define('_RMDP_FDESCTIP','Por favor inclua os detalhes do seu download (caracter�sticas, diferen�as, tamanho etc.)');
	define('_RMDP_FSIZE','Tamanho em bytes:');
	define('_RMDP_FANONIM','Permitir downloads an�nimos:');
	define('_RMDP_FWEB','T�tulo do Site do Autor:');
	define('_RMDP_FURL','URL do autor:');
	define('_RMDP_SEND','Enviar Download');
	define('_RMDP_OSS','Plataformas:');
	define('_RMDP_YES','Sim');
	define('_RMDP_NO','N�o');
	define('_RMDP_FORM_TITLE','Alterar download');
	define('_RMDP_SUBMIT_INFO','As altera��es est�o sujeitas a aprova��o. Por favor completa todos os campos requeridos (*).<br /><br />');
	define('_RMDP_SUBMIT_INFO2','Quando seu download for aprovado, voc� receber� um e-mail de confirma��o com um Link para poder editar os dados do seu download');
	
	// Cadenas de Errores y redirecciones
	define('_RMDP_ERRORS_HAPPEND','Ocorreram os seguintes erros:');
	define('_RMDP_MUSTBE_NUM','deve conter um n�mero');
	define('_RMDP_IS_EMPTY','n�o foi completado');
	define('_RMDP_PLEASE_FILL', 'Por favor complete os campos requeridos');
	define('_RMDP_NAME_EXIST', 'J� existe um download com um o mesmo nome');
	define('_RMDP_SENDOK','Sua solicita��o de altera��o foi enviada corretamente, obrigado.');
	define('_RMDP_SENDFAIL','Ocorreu um erro ao enviar sua solicita��o. Por favor, tente novamente.');
	define('_RMDP_MAIL_SUBJECT','Enviar novo download');
	define('_RMDP_MAIL_BODY','Um usu�rio solicitou a modifica��o de um download. Para revisar os detalhes desse download: %s');

//} elseif ($rmdp_location=='mysends'){
	
	define('_RMDP_FIRST_LOGIN','Entre com o nome de usu�rio e senha para ver seus downloads');
	define('_RMDP_NOHAVE_DOWNS','N�o enviou nenhum download');
	define('_RMDP_MY_SENDS','Meus downloads');
	define('_RMDP_MODIFY_DOWN','Alterar');
	define('_RMDP_DELETE_DOWN','Excluir');
	define('_RMDP_NAME_DOWN','Nome');
	define('_RMDP_DATE_DOWN','Data');
	define('_RMDP_DOWNS_DOWN','Downloads');
	define('_RMDP_OPTIONS_DOWN','Op��es');
	define('_RMDP_ERR_NOTFOUND','O download especificado n�o foi encontrado');
	define('_RMDP_NOT_OWNER','Voc� n�o � o publica-dor desse download');
	define('_RMDP_FORM_TITLE', 'Alterar download');
	define('_RMDP_FNAME','Nome:');
	define('_RMDP_FVERSION','Vers�o:');
	define('_RMDP_FLIC','Licen�a:');
	define('_RMDP_FFILE','Arquivo:');
	define('_RMDP_FIMAGE','imagem:');
	define('_RMDP_FIMAGETIP','A imagem deve ter %s pixel. de largura');
	define('_RMDP_FCATEGO','Categoria');
	define('_RMDP_FDESC','Descri��o:');
	define('_RMDP_FDESCTIP','Inclua os detalhes do seu download (caracteristicas, diferen�as, tamanho etc)');
	define('_RMDP_FSIZE','Tamanho em bytes:');
	define('_RMDP_FANONIM','Permitir downloads an�nimos');
	define('_RMDP_FWEB','T�tulo do Site do Autor:');
	define('_RMDP_FURL','URL do autor:');
	define('_RMDP_SEND','Enviar download');
	define('_RMDP_OSS','Plataformas:');
	define('_RMDP_YES','Sim');
	define('_RMDP_NO','N�o');
	define('_RMDP_SUBMIT_INFO','As altera��es est�o sujeitas a aprova��o. Por favor complete todos os campos requeridos (*).<br /><br />');
	define('_RMDP_MAIL_BODY','Um usu�rio solicitou a altera��o de um download. Para revisar os detalhes deste download: %s');
	define('_RMDP_SENDOK','Sua solicita��o de altera��o foi enviada corretamente, obrigado.');
	define('_RMDP_SENDFAIL','Ocorreu um erro ao enviar sua solicita��o. Por favor, tente novamente.');
	define('_RMDP_PLEASE_FILL', 'Por favor, complete os campos requeridos');
	define('_RMDP_NAME_EXIST', 'J� existe um download com o mesmo nome');
	define('_RMDP_SEND_SHOTS','Telas');
	define('_RMDP_SHOTS_TITLE','Capturas de Tela de "%s"');
	define('_RMDP_SEND_HITS','Pontos:');
	define('_RMDP_SEND_DATE','Data:');
	define('_RMDP_NEW_SHOT','Nova Tela');
	define('_RMDP_MOD_SHOT','Alterar Tela');
	define('_RMDP_NEW_SMALLIMG','URL do imagem Pequena:');
	define('_RMDP_NEW_BIGIMG','URL do imagem Normal:');
	define('_RMDP_NEW_TEXT','Texto Descritivo:');
	define('_RMDP_NEW_SEND','Enviar');
	define('_RMDP_SHOT_LIMIT','Voc� chegou ao limite de imagens para o seu download');
	
	define('_RMDP_ERR_IMAGES','Por favor especifique a URL para a imagem pequena e imagem normal');
	
//} elseif ($rmdp_location=='search'){

	define('_RMDP_SEARCH_RESULTS','Resultados para "%s"');
	define('_RMDP_NOSEARCH_KEY','N�o foi especificado uma palavra para busca');

//}	elseif ($rmdp_location=='broken'){
	
	define('_RMDP_ERR_NOTFOUND','O download especificado n�o foi encontrado');
	define('_RMDP_NO_USER','Para reportar um Link quebrado, voc� deve ser um usu�rio registrado.');
	define('_RMDP_BROKEN_BODY',"Ol�! %s:\n\n Um dos seus downloads foi reportado com erro. Verifique os dados o mais r�pido poss�vel. Entre em:\n\n%s\n\n Tamb�m pode comprovar todos seus downloads em ".XOOPS_URL."/modules/rmdp/mysend.php \n\n Atenciosamente:\n XoopsBR.org\nwww.xoopsbr.org");
	define('_RMDP_BROKEN_BODYADMIN',"O usu�rio %s reportou um download com erro. Pode revisar os dados em:\n\n%s\n\n Ou pode ver o download em\n\n%s");
	define('_RMDP_BROKEN_SEND','Sua confirma��o foi enviada. Obrigado.');
	define('_RMDP_BROKEN_SUBJECT','Confirma��o de download com erro.');

//}
?>
