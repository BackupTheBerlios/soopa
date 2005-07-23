<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: main.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                   //
// ------------------------------------------------------------------------ //
//                 RM+SOFT - Control de Servicios                           //
//        Copyright Red M�xico Soft � 2005. (Eduardo Cort�s)                //
//                  <http:www.redmexico.com.mx/>                            //
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
//                                                                          //
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //
// ------------------------------------------------------------------------ //
// Para Desarrollo de m�dulos, Dise�o de temas para XOOPS y otros servicios //
// dirigete a http://www.redmexico.com.mx                                   //
//////////////////////////////////////////////////////////////////////////////
// Traduzido pela equipe XoopsTotal - www.xoopstotal.com.br - by GibaPhp
// Revisado pelo site: http://tradux.xoopstotal.com.br - By

define('_MM_PRICE','Pre�o:');
define('_MM_PROMOS','Promo��es atuais');
define('_MM_LNGSERVICES','Servi�os');
define('_MM_LNGPROMOS','Promo��es');
define('_MM_CONVERT_CUR','Quanto custa na moeda local? (valor aproximado)');

if ($location=='index'){
	define('_MM_OURSERVICES','Novos Servi�os');
}elseif($location=='servicios'){
	define('_MM_NOEXIST','N�o existe o servi�o especificado');
	define('_MM_CARACT','Caracteristicas do Servi�o');
	define('_MM_CONTACT','Entre em contato para receber mais detalhes');
	define('_MM_PRESUP','Requer informa��o');
}elseif($location=='caracts'){
	define('_MM_NOEXIST','N�o existe a caracter�stica especificada');
	define('_MM_YOUARE','Est� em:');
}elseif($location=='promos'){
	define('_MM_NOEXIST','N�o existe a promoc�o especificada');
	define('_MM_CONTACT','Entre em contato para receber mais detalhes');
	define('_MM_INCLUDED','Servi�os Incluidos');
	define('_MM_LIST','Lista de Promo��es');
}elseif($location=='order'){
	define('_MM_NOT_FOUND','N�o encontrou o elemento selecionado');
	define('_MM_SRV_NAME','Nome do Servi�o:');
	define('_MM_PROMO_NAME','Nome da Promo��o:');
	define('_MM_ITEM_CODE','C�digo:');
	define('_MM_FORM_TITLE','Formul�rio de solicita��o');
	define('_MM_ITEM_MAIL','Email de contato');
	define('_MM_ORDER_SEND','Tua solicita��o foi enviada. Em breve receber�s informa��es adicionais');
	define('_MM_RMSRV_ACCEPT','Por favor antes de solicitar uma informa��o, ler os termos do servi�o.');
	define('_MM_RMSRV_PROMOACCEPT','Por favor antes de enviar a sua solicita��o, ler os termos para os t�rminos de servi�os que foram incluidos nesta promo��o.');
	define('_MM_TERMS_FOR','T�rminos de Servi�o para %s');
	define('_RMDP_ERRORS_HAPPEND','Ocorreram os seguintes erros:');
	define('_RMDP_MUSTBE_NUM','Precisa conter um n�mero');
	define('_RMDP_IS_EMPTY','n�o foi compleatado');
}
?>
