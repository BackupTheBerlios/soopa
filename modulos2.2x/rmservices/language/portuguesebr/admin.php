<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: admin.php,v 1.3 2005/08/05 21:34:10 mauriciodelima Exp $                  //
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
// Este programa es un programa libre; puedes distribuirlo y modificarlo    //
// bajo los términos de al GNU General Public Licencse como ha sido         //
// publicada por The Free Software Foundation (Fundación de Software Libre; //
// en cualquier versión 2 de la Licencia o mas reciente.                    //
//                                                                          //
// Este programa es distribuido esperando que sea últil pero SIN NINGUNA    //
// GARANTÍA. Ver The GNU General Public License para mas detalles.          //
// ------------------------------------------------------------------------ //
// Questions, Bugs or any comment plese write me                            //
// Preguntas, errores o cualquier comentario escribeme                      //
// <adminone@redmexico.com.mx>                                              //
// ------------------------------------------------------------------------ //
//////////////////////////////////////////////////////////////////////////////
// Traduzido pela equipe XoopsTotal - www.xoopstotal.com.br - by GibaPhp
// Revisado pelo site: http://tradux.xoopstotal.com.br - By
define('_AM_CATEGOS','Categorias');
define('_AM_SERVICES','Serviços');
define('_AM_PROMOS','Promoções');
define('_AM_BANNERS','Banners');
define('_AM_PROMOV','Vendas de Promoções');
define('_AM_SERVICEV','Vendas de Serviços');
define('_AM_PANEL','Painél de Controle');
define('_AM_SEND','OK');
define('_AM_CANCEL','Cancelar');
define('_AM_DELETE','Eliminar');
define('_AM_MODIFY','Editar');
define('_AM_OPTIONS','Opções');
define('_AM_FORMNAME','Nome:');
define('_AM_FORMCODE','Código:');
define('_AM_YES','Sim;');
define('_AM_NO','Não');
define('_AM_ERRNEXT','Ocorreu o seguinte erro:<br>');
define('_AM_VIEW','Ver');
define('_AM_SRV_TERMS','Términos');
define('_AM_HELP','Ajuda');

//if ($location=='categos'){
	define('_AM_NEWFORM','Criar uma categoría');
	define('_AM_MODIFYFORM','Editar Categoría');
	define('_AM_FORMIMG','Imagem da Categoría:');
	define('_AM_DESC','Descrição:');
	define('_AM_NOCATEGOS','Não existem categorias ainda. Por favor, crie uma agora.');
	define('_AM_ERRNAME','ERROR: Não foi especificado um nome para a categoria');
	define('_AM_ERRDESC','ERROR: Não foi digitado uma descrição para esta categoría');
	define('_AM_ERREXIST','ERROR: Já existe uma categoria com o mesmo nome');
	define('_AM_ERRNEXT','Ocorreu o seguinte erro:<br>');
	define('_AM_CATEGOOK','Categoria incluída com sucesso!');
	define('_AM_INFOIMG','As imagens devem existir em '.XOOPS_ROOT_PATH.'/modules/rmservices/images/categos/');
	define('_AM_CATEGOLIST','Lista de Categorias');
	define('_AM_NOEXIST','Não existe a categoría especificada');
	define('_AM_CONFIRMDEL','Realmente desejas eliminar esta categoria?');
	define('_AM_DELETED','Categoria eliminada corretamente');
	define('_AM_NEWCATEGO','Criar uma nova Categoria');
	define('_AM_NOTDELETE','Perdão, esta categoría não pode ser eliminada <br>ela contém Serviços. Primero você precisa eliminar os serviços dentro desta categoría');
	define('_AM_SERVICESIN','Serviços em - %s -');
	define('_AM_ACTIVE','Ativo');
	define('_AM_INACTIVE','Inativo');
}

if ($location=='services'){
	define('_AM_NEWSERVICE','Criar novo Serviço');
	define('_AM_FORMCATEGO','Categorias:');
	define('_AM_SELECTCAT','Seleciona...');
	define('_AM_FORMPRICE','Preço:');
	define('_AM_FORMPRE','Campo Requerido:');
	define('_AM_SRV_HAVETERMS','Mostrar Términos de Serviços:');
	define('_AM_ALL_TERMS','Términos Existentes');
	define('_AM_ASSIGNED_TERMS','Términos de: "%s"');
	define('_AM_CHKPAYPAL','Comprovar pagamento de PayPal&reg; Localmente:');
	define('_AM_PAYPALURL','URL externa para comprovar o pagamento:');
	define('_AM_SHORTDESC','Descrição simples:');
	define('_AM_LONGDESC','Descrição completa:');
	define('_AM_FORMIMG','Imagem:');
	define('_AM_SHOWINBLOCK','Mostrar no Bloco:');
	define('_AM_FORMACTIVE','Ativar Serviço:');
	define('_AM_ERRNAME','ERROR: Não foi digitado o nome do Serviço');
	define('_AM_ERRCAT','ERROR: Não foi selecionado uma categoría para este serviço');
	define('_AM_ERRPRICE','ERROR: O preço deste serviço não pode ser menor que zero');
	define('_AM_ERRCODE','ERROR: Não foi digitado o código do serviço');
	define('_AM_ERRFORM','Não foi especificado ítens no formulário de compra');
	define('_AM_ERRSDESC','ERROR: Não foi informado a descrição simplificada para este serviço');
	define('_AM_ERRLDESC','ERROR: Não foi informado a descrição completa para este serviço');
	define('_AM_ERREXIST','Já existe um serviço com o mesmo nome dentro desta mesma categoría');
	define('_AM_TERMS_EXIST','Estes términos já foram agregados a este serviço anteriormente');
	define('_AM_TERM_ADDED','Término informado corretamente');
	define('_AM_TERMS_DELETED','Términos eliminados do serviço');
	define('_AM_SERVICEOK','Serviço criado corretamente');
	define('_AM_SERVICEMODOK','Serviço modificado corretamente');
	define('_AM_SERVICESLIST','Lista de Serviços Existentes');
	define('_AM_ACTIVE','Ativo');
	define('_AM_INACTIVE','Inativo');
	define('_AM_CARACTS','Características');
	define('_AM_SRVNAME','Nome do Serviço');
	define('_AM_SRVSTATUS','Estado');
	define('_AM_SRVPRICE','Preço');
	define('_AM_DELETED','Serviço eliminado corretamente');
	define('_AM_SRVNOEXIST','Não existe o serviço especificado');
	define('_AM_CONFIRMDEL','Realmente desejas eliminar este Serviço junto com <br>suas características e banners?');
	define('_AM_NOTDELETE','Desculpe, este serviço não pode ser eliminado pelas seguintes razões:<br><br>');
	define('_AM_INPROMO','Este serviço pertence a uma promoção');
	define('_AM_INSALES','Existem registros de venda para este serviço');
	define('_AM_EXISTCAR','Características Existentes em "%s"');
	define('_AM_ALLCARACT','Características Existentes');
	define('_AM_ADD','Agregar');
	define('_AM_NEWCAR','Nova Característica');
	define('_AM_MODCAR','Editar Característica');
	define('_AM_ERRNAMECAR','ERROR: Não foi informado o nome para esta categoria');
	define('_AM_ERRSDESCCAR','ERROR: Não foi informado uma descrição curta para esta caracteristica');
	define('_AM_ERRLDESCCAR','ERROR: Não foi informado uma descrição completa para esta caracteristica');
	define('_AM_ERRLCAREXIST','ERROR: Já existe esta característica');
	define('_AM_ALREADYADD','Esta característica já foi incluida anteriormente');
	define('_AM_CARDELSOK','Característica eliminada do serviço corretamente');
	define('_AM_CARACTOK','Característica criada corretamente');
	define('_AM_CARNOEXIST','Não existe a característica especificada');
	define('_AM_CARMODOK','Característica modificada corretamente');
	define('_AM_CONFIRMDELCAR','Realmente desejas eliminar esta Característica?');
	define('_AM_CARDELETED','Característica eliminada corretamente');
	define('_AM_CAROK','Característica incluída correctamente');
	define('_AM_FORM','Campos do formulário de solicitação:');
	define('_AM_FORM_TIP','Os campos devem ser criados com o seguinte formato: Texto do Campo{/}Campo. Por exemplo: Nome {/} &lt;input type="text" name="nome" size="30"&gt;');
}

if ($location=='promos'){
	define('_AM_NEWPROMO','Criar Nova Promoção');
	define('_AM_FORMNAME','Nome:');
	define('_AM_FORMPRICE','Preço:');
	define('_AM_FORMIMG','Imagem:');
	define('_AM_SHORTDESC','Descrição Curta:');
	define('_AM_LONGDESC','Descrição Completa:');
	define('_AM_CHKPAYPAL','Comprovar pagamento PayPal&reg; Localmente:');
	define('_AM_PAYPALURL','URL externa para comprovar se pago:');
	define('_AM_SHOWINBLOCK','Mostrar no Bloco:');
	define('_AM_FORMACTIVE','Ativar Promoção:');
	define('_AM_ERRNAME','ERROR: Não especificou o nome da promocão');
	define('_AM_ERRCODE','ERROR: Não especificou o código da promocção');
	define('_AM_ERRPRICE','ERROR: O preço desta promoção não pode ser menor que zero');
	define('_AM_ERRSDESC','ERROR: Não especificou a descrição curta para esta promoção');
	define('_AM_ERRLDESC','ERROR: Não especificou a descrição completa para esta promoção');
	define('_AM_PROMOEXIST','Já existe a promoção especificada');
	define('_AM_PROMOOK', 'Promoção criada corretamente');
	define('_AM_PROMOMODOK', 'Promoção modificada corretamente');
	define('_AM_PROMOSLIST','Lista de Promoções Existentes');
	define('_AM_PROMONAME','Nome desta Promoção');
	define('_AM_PROMOPRICE','Preço');
	define('_AM_PROMOSTATUS','Estado');
	define('_AM_ACTIVE','Ativo');
	define('_AM_INACTIVE','Inativo');
	define('_AM_SERVS','Serviços');
	define('_AM_NOEXIST','Não existe a promoção especificada');
	define('_AM_PROMOINSALES','Desculpe, não foi possível eliminar esta promoção porque<br>já existem registros de vendas para ela.');
	define('_AM_CONFIRMDEL','Realmente desejas eliminar esta promoção?');
	define('_AM_EXISTSERVICES','Serviços Existentes');
	define('_AM_ADDSERVICE','Incluir Serviço');
	define('_AM_ASSIGNED','Serviços Incluídos');
	define('_AM_ERRSERVICE','Não informou nenhum serviço');
	define('_AM_SRVNOEXIST','Não existe o serviço especificado');
	define('_AM_ADDSERVOK','Serviço incluído corretamente');
	define('_AM_DELSERVOK','Serviço eliminado corretamente desta promoção');
	define('_AM_RELATION_EXIST','Este produto já foi incluído para esta promoção');
}

//if ($location=='banners'){
	define('_AM_NEWBANN','Criar Novo Banner');
	define('_AM_MODBANN','Editar Banner');
	define('_AM_FORMSERV','Serviço:');
	define('_AM_SELECTSRV','Seleciona um serviço...');
	define('_AM_FORMIMG','Imagem:');
	define('_AM_DESC','Texto dos Banners:');
	define('_AM_SHOWBUY','Mostrar vínculo de compra direta');
	define('_AM_SHOWBORDER','Mostrar borda de tabela no banner');
	define('_AM_ERRSRV','ERROR: Não foi escolhido um serviço');
	define('_AM_ERRIMG','ERROR: Não foi escolhido uma URL para a imagem');
	define('_AM_BANNOK','O banner foi criado corretamente');
	define('_AM_BANNMODOK','O banner foi modificado corretamente');
	define('_AM_BANNDELOK','O banner foi eliminado corretamente');
	define('_AM_BANNLIST','Lista de Banners Existentes');
	define('_AM_NOEXIST','Não existe o banner especificado');
	define('_DEL_CONFIRM','Realmente desejas eliminar este banner?');
}

if ($location=='sales'){
	define('_AM_PROMOS_LIST','Venda de Promoções');
	define('_AM_SERVS_LIST','Venda de Serviços');
}

//if ($location=='terminos'){
	define('_AM_ERROR_NOTITLE','ERROR: NÃO especificou um título');
	define('_AM_ERROR_NOTEXT','ERROR: Não foi escrito um texto para os términos');
	define('_AM_ERROR_EXIST','ERROR: Já existem términos con este mesmo título');
	define('_AM_ERROR_NOEXIST','ERROR: Não existem os términos especificados');
	define('_AM_TERMS_OK','Términos criados corretamente');
	define('_AM_TERMS_MODOK','Términos modificados corretamente');
	define('_AM_TERM_LIST','Términos Existentes');
	define('_AM_TERMS_NEW','Criar Novos Términos');
	define('_AM_TERMS_MOD','Editar Términos');
	define('_AM_TERM_TITLE','Título descritivo:');
	define('_AM_TERMS_TEXT','Texto Completo:');
	define('_AM_TERM_CONFIRMDEL','Realmente desejas eliminar estes términos?');
	define('_AM_TERMS_DELETED','Términos eliminados');
//}
?>
