<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: main.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                   //
// ------------------------------------------------------------------------ //
//                 RM+SOFT - Control de Servicios                           //
//        Copyright Red México Soft © 2005. (Eduardo Cortés)                //
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
// Para Desarrollo de módulos, Diseño de temas para XOOPS y otros servicios //
// dirigete a http://www.redmexico.com.mx                                   //
//////////////////////////////////////////////////////////////////////////////
// Traduzido pela equipe XoopsTotal - www.xoopstotal.com.br - by GibaPhp
// Revisado pelo site: http://tradux.xoopstotal.com.br - By

define('_MM_PRICE','Preço:');
define('_MM_PROMOS','Promoções atuais');
define('_MM_LNGSERVICES','Serviços');
define('_MM_LNGPROMOS','Promoções');
define('_MM_CONVERT_CUR','Quanto custa na moeda local? (valor aproximado)');

if ($location=='index'){
	define('_MM_OURSERVICES','Novos Serviços');
}elseif($location=='servicios'){
	define('_MM_NOEXIST','Não existe o serviço especificado');
	define('_MM_CARACT','Caracteristicas do Serviço');
	define('_MM_CONTACT','Entre em contato para receber mais detalhes');
	define('_MM_PRESUP','Requer informação');
}elseif($location=='caracts'){
	define('_MM_NOEXIST','Não existe a característica especificada');
	define('_MM_YOUARE','Está em:');
}elseif($location=='promos'){
	define('_MM_NOEXIST','Não existe a promocão especificada');
	define('_MM_CONTACT','Entre em contato para receber mais detalhes');
	define('_MM_INCLUDED','Serviços Incluidos');
	define('_MM_LIST','Lista de Promoções');
}elseif($location=='order'){
	define('_MM_NOT_FOUND','Não encontrou o elemento selecionado');
	define('_MM_SRV_NAME','Nome do Serviço:');
	define('_MM_PROMO_NAME','Nome da Promoção:');
	define('_MM_ITEM_CODE','Código:');
	define('_MM_FORM_TITLE','Formulário de solicitação');
	define('_MM_ITEM_MAIL','Email de contato');
	define('_MM_ORDER_SEND','Tua solicitação foi enviada. Em breve receberás informações adicionais');
	define('_MM_RMSRV_ACCEPT','Por favor antes de solicitar uma informação, ler os termos do serviço.');
	define('_MM_RMSRV_PROMOACCEPT','Por favor antes de enviar a sua solicitação, ler os termos para os términos de serviços que foram incluidos nesta promoção.');
	define('_MM_TERMS_FOR','Términos de Serviço para %s');
	define('_RMDP_ERRORS_HAPPEND','Ocorreram os seguintes erros:');
	define('_RMDP_MUSTBE_NUM','Precisa conter um número');
	define('_RMDP_IS_EMPTY','não foi compleatado');
}
?>
