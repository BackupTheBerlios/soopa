<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: admin.php,v 1.3 2005/08/05 21:34:10 mauriciodelima Exp $                  //
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
// Este programa es un programa libre; puedes distribuirlo y modificarlo    //
// bajo los t�rminos de al GNU General Public Licencse como ha sido         //
// publicada por The Free Software Foundation (Fundaci�n de Software Libre; //
// en cualquier versi�n 2 de la Licencia o mas reciente.                    //
//                                                                          //
// Este programa es distribuido esperando que sea �ltil pero SIN NINGUNA    //
// GARANT�A. Ver The GNU General Public License para mas detalles.          //
// ------------------------------------------------------------------------ //
// Questions, Bugs or any comment plese write me                            //
// Preguntas, errores o cualquier comentario escribeme                      //
// <adminone@redmexico.com.mx>                                              //
// ------------------------------------------------------------------------ //
//////////////////////////////////////////////////////////////////////////////
// Traduzido pela equipe XoopsTotal - www.xoopstotal.com.br - by GibaPhp
// Revisado pelo site: http://tradux.xoopstotal.com.br - By
define('_AM_CATEGOS','Categorias');
define('_AM_SERVICES','Servi�os');
define('_AM_PROMOS','Promo��es');
define('_AM_BANNERS','Banners');
define('_AM_PROMOV','Vendas de Promo��es');
define('_AM_SERVICEV','Vendas de Servi�os');
define('_AM_PANEL','Pain�l de Controle');
define('_AM_SEND','OK');
define('_AM_CANCEL','Cancelar');
define('_AM_DELETE','Eliminar');
define('_AM_MODIFY','Editar');
define('_AM_OPTIONS','Op��es');
define('_AM_FORMNAME','Nome:');
define('_AM_FORMCODE','C�digo:');
define('_AM_YES','Sim;');
define('_AM_NO','N�o');
define('_AM_ERRNEXT','Ocorreu o seguinte erro:<br>');
define('_AM_VIEW','Ver');
define('_AM_SRV_TERMS','T�rminos');
define('_AM_HELP','Ajuda');

//if ($location=='categos'){
	define('_AM_NEWFORM','Criar uma categor�a');
	define('_AM_MODIFYFORM','Editar Categor�a');
	define('_AM_FORMIMG','Imagem da Categor�a:');
	define('_AM_DESC','Descri��o:');
	define('_AM_NOCATEGOS','N�o existem categorias ainda. Por favor, crie uma agora.');
	define('_AM_ERRNAME','ERROR: N�o foi especificado um nome para a categoria');
	define('_AM_ERRDESC','ERROR: N�o foi digitado uma descri��o para esta categor�a');
	define('_AM_ERREXIST','ERROR: J� existe uma categoria com o mesmo nome');
	define('_AM_ERRNEXT','Ocorreu o seguinte erro:<br>');
	define('_AM_CATEGOOK','Categoria inclu�da com sucesso!');
	define('_AM_INFOIMG','As imagens devem existir em '.XOOPS_ROOT_PATH.'/modules/rmservices/images/categos/');
	define('_AM_CATEGOLIST','Lista de Categorias');
	define('_AM_NOEXIST','N�o existe a categor�a especificada');
	define('_AM_CONFIRMDEL','Realmente desejas eliminar esta categoria?');
	define('_AM_DELETED','Categoria eliminada corretamente');
	define('_AM_NEWCATEGO','Criar uma nova Categoria');
	define('_AM_NOTDELETE','Perd�o, esta categor�a n�o pode ser eliminada <br>ela cont�m Servi�os. Primero voc� precisa eliminar os servi�os dentro desta categor�a');
	define('_AM_SERVICESIN','Servi�os em - %s -');
	define('_AM_ACTIVE','Ativo');
	define('_AM_INACTIVE','Inativo');
}

if ($location=='services'){
	define('_AM_NEWSERVICE','Criar novo Servi�o');
	define('_AM_FORMCATEGO','Categorias:');
	define('_AM_SELECTCAT','Seleciona...');
	define('_AM_FORMPRICE','Pre�o:');
	define('_AM_FORMPRE','Campo Requerido:');
	define('_AM_SRV_HAVETERMS','Mostrar T�rminos de Servi�os:');
	define('_AM_ALL_TERMS','T�rminos Existentes');
	define('_AM_ASSIGNED_TERMS','T�rminos de: "%s"');
	define('_AM_CHKPAYPAL','Comprovar pagamento de PayPal&reg; Localmente:');
	define('_AM_PAYPALURL','URL externa para comprovar o pagamento:');
	define('_AM_SHORTDESC','Descri��o simples:');
	define('_AM_LONGDESC','Descri��o completa:');
	define('_AM_FORMIMG','Imagem:');
	define('_AM_SHOWINBLOCK','Mostrar no Bloco:');
	define('_AM_FORMACTIVE','Ativar Servi�o:');
	define('_AM_ERRNAME','ERROR: N�o foi digitado o nome do Servi�o');
	define('_AM_ERRCAT','ERROR: N�o foi selecionado uma categor�a para este servi�o');
	define('_AM_ERRPRICE','ERROR: O pre�o deste servi�o n�o pode ser menor que zero');
	define('_AM_ERRCODE','ERROR: N�o foi digitado o c�digo do servi�o');
	define('_AM_ERRFORM','N�o foi especificado �tens no formul�rio de compra');
	define('_AM_ERRSDESC','ERROR: N�o foi informado a descri��o simplificada para este servi�o');
	define('_AM_ERRLDESC','ERROR: N�o foi informado a descri��o completa para este servi�o');
	define('_AM_ERREXIST','J� existe um servi�o com o mesmo nome dentro desta mesma categor�a');
	define('_AM_TERMS_EXIST','Estes t�rminos j� foram agregados a este servi�o anteriormente');
	define('_AM_TERM_ADDED','T�rmino informado corretamente');
	define('_AM_TERMS_DELETED','T�rminos eliminados do servi�o');
	define('_AM_SERVICEOK','Servi�o criado corretamente');
	define('_AM_SERVICEMODOK','Servi�o modificado corretamente');
	define('_AM_SERVICESLIST','Lista de Servi�os Existentes');
	define('_AM_ACTIVE','Ativo');
	define('_AM_INACTIVE','Inativo');
	define('_AM_CARACTS','Caracter�sticas');
	define('_AM_SRVNAME','Nome do Servi�o');
	define('_AM_SRVSTATUS','Estado');
	define('_AM_SRVPRICE','Pre�o');
	define('_AM_DELETED','Servi�o eliminado corretamente');
	define('_AM_SRVNOEXIST','N�o existe o servi�o especificado');
	define('_AM_CONFIRMDEL','Realmente desejas eliminar este Servi�o junto com <br>suas caracter�sticas e banners?');
	define('_AM_NOTDELETE','Desculpe, este servi�o n�o pode ser eliminado pelas seguintes raz�es:<br><br>');
	define('_AM_INPROMO','Este servi�o pertence a uma promo��o');
	define('_AM_INSALES','Existem registros de venda para este servi�o');
	define('_AM_EXISTCAR','Caracter�sticas Existentes em "%s"');
	define('_AM_ALLCARACT','Caracter�sticas Existentes');
	define('_AM_ADD','Agregar');
	define('_AM_NEWCAR','Nova Caracter�stica');
	define('_AM_MODCAR','Editar Caracter�stica');
	define('_AM_ERRNAMECAR','ERROR: N�o foi informado o nome para esta categoria');
	define('_AM_ERRSDESCCAR','ERROR: N�o foi informado uma descri��o curta para esta caracteristica');
	define('_AM_ERRLDESCCAR','ERROR: N�o foi informado uma descri��o completa para esta caracteristica');
	define('_AM_ERRLCAREXIST','ERROR: J� existe esta caracter�stica');
	define('_AM_ALREADYADD','Esta caracter�stica j� foi incluida anteriormente');
	define('_AM_CARDELSOK','Caracter�stica eliminada do servi�o corretamente');
	define('_AM_CARACTOK','Caracter�stica criada corretamente');
	define('_AM_CARNOEXIST','N�o existe a caracter�stica especificada');
	define('_AM_CARMODOK','Caracter�stica modificada corretamente');
	define('_AM_CONFIRMDELCAR','Realmente desejas eliminar esta Caracter�stica?');
	define('_AM_CARDELETED','Caracter�stica eliminada corretamente');
	define('_AM_CAROK','Caracter�stica inclu�da correctamente');
	define('_AM_FORM','Campos do formul�rio de solicita��o:');
	define('_AM_FORM_TIP','Os campos devem ser criados com o seguinte formato: Texto do Campo{/}Campo. Por exemplo: Nome {/} &lt;input type="text" name="nome" size="30"&gt;');
}

if ($location=='promos'){
	define('_AM_NEWPROMO','Criar Nova Promo��o');
	define('_AM_FORMNAME','Nome:');
	define('_AM_FORMPRICE','Pre�o:');
	define('_AM_FORMIMG','Imagem:');
	define('_AM_SHORTDESC','Descri��o Curta:');
	define('_AM_LONGDESC','Descri��o Completa:');
	define('_AM_CHKPAYPAL','Comprovar pagamento PayPal&reg; Localmente:');
	define('_AM_PAYPALURL','URL externa para comprovar se pago:');
	define('_AM_SHOWINBLOCK','Mostrar no Bloco:');
	define('_AM_FORMACTIVE','Ativar Promo��o:');
	define('_AM_ERRNAME','ERROR: N�o especificou o nome da promoc�o');
	define('_AM_ERRCODE','ERROR: N�o especificou o c�digo da promoc��o');
	define('_AM_ERRPRICE','ERROR: O pre�o desta promo��o n�o pode ser menor que zero');
	define('_AM_ERRSDESC','ERROR: N�o especificou a descri��o curta para esta promo��o');
	define('_AM_ERRLDESC','ERROR: N�o especificou a descri��o completa para esta promo��o');
	define('_AM_PROMOEXIST','J� existe a promo��o especificada');
	define('_AM_PROMOOK', 'Promo��o criada corretamente');
	define('_AM_PROMOMODOK', 'Promo��o modificada corretamente');
	define('_AM_PROMOSLIST','Lista de Promo��es Existentes');
	define('_AM_PROMONAME','Nome desta Promo��o');
	define('_AM_PROMOPRICE','Pre�o');
	define('_AM_PROMOSTATUS','Estado');
	define('_AM_ACTIVE','Ativo');
	define('_AM_INACTIVE','Inativo');
	define('_AM_SERVS','Servi�os');
	define('_AM_NOEXIST','N�o existe a promo��o especificada');
	define('_AM_PROMOINSALES','Desculpe, n�o foi poss�vel eliminar esta promo��o porque<br>j� existem registros de vendas para ela.');
	define('_AM_CONFIRMDEL','Realmente desejas eliminar esta promo��o?');
	define('_AM_EXISTSERVICES','Servi�os Existentes');
	define('_AM_ADDSERVICE','Incluir Servi�o');
	define('_AM_ASSIGNED','Servi�os Inclu�dos');
	define('_AM_ERRSERVICE','N�o informou nenhum servi�o');
	define('_AM_SRVNOEXIST','N�o existe o servi�o especificado');
	define('_AM_ADDSERVOK','Servi�o inclu�do corretamente');
	define('_AM_DELSERVOK','Servi�o eliminado corretamente desta promo��o');
	define('_AM_RELATION_EXIST','Este produto j� foi inclu�do para esta promo��o');
}

//if ($location=='banners'){
	define('_AM_NEWBANN','Criar Novo Banner');
	define('_AM_MODBANN','Editar Banner');
	define('_AM_FORMSERV','Servi�o:');
	define('_AM_SELECTSRV','Seleciona um servi�o...');
	define('_AM_FORMIMG','Imagem:');
	define('_AM_DESC','Texto dos Banners:');
	define('_AM_SHOWBUY','Mostrar v�nculo de compra direta');
	define('_AM_SHOWBORDER','Mostrar borda de tabela no banner');
	define('_AM_ERRSRV','ERROR: N�o foi escolhido um servi�o');
	define('_AM_ERRIMG','ERROR: N�o foi escolhido uma URL para a imagem');
	define('_AM_BANNOK','O banner foi criado corretamente');
	define('_AM_BANNMODOK','O banner foi modificado corretamente');
	define('_AM_BANNDELOK','O banner foi eliminado corretamente');
	define('_AM_BANNLIST','Lista de Banners Existentes');
	define('_AM_NOEXIST','N�o existe o banner especificado');
	define('_DEL_CONFIRM','Realmente desejas eliminar este banner?');
}

if ($location=='sales'){
	define('_AM_PROMOS_LIST','Venda de Promo��es');
	define('_AM_SERVS_LIST','Venda de Servi�os');
}

//if ($location=='terminos'){
	define('_AM_ERROR_NOTITLE','ERROR: N�O especificou um t�tulo');
	define('_AM_ERROR_NOTEXT','ERROR: N�o foi escrito um texto para os t�rminos');
	define('_AM_ERROR_EXIST','ERROR: J� existem t�rminos con este mesmo t�tulo');
	define('_AM_ERROR_NOEXIST','ERROR: N�o existem os t�rminos especificados');
	define('_AM_TERMS_OK','T�rminos criados corretamente');
	define('_AM_TERMS_MODOK','T�rminos modificados corretamente');
	define('_AM_TERM_LIST','T�rminos Existentes');
	define('_AM_TERMS_NEW','Criar Novos T�rminos');
	define('_AM_TERMS_MOD','Editar T�rminos');
	define('_AM_TERM_TITLE','T�tulo descritivo:');
	define('_AM_TERMS_TEXT','Texto Completo:');
	define('_AM_TERM_CONFIRMDEL','Realmente desejas eliminar estes t�rminos?');
	define('_AM_TERMS_DELETED','T�rminos eliminados');
//}
?>
