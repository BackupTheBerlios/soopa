<?php
///////////////////////////////////////////////////////////////////////////////
// $Id: modinfo.php,v 1.3 2005/08/02 05:41:21 mauriciodelima Exp $                 //
//  ------------------------------------------------------------------------ //
//                         RM+SOFT.Download.Plus                             //
//                    Copyright © 2005. Red Mexico Soft                      //
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
//  bajo los t&eacute;rminos de al GNU General Public Licencse como ha sido         //
//  publicada por The Free Software Foundation (Fundaci&oacute;n de Software Libre; //
//  en cualquier versi&oacute;n 2 de la Licencia o mas reciente.                    //
//                                                                           //
//  Este programa es distribuido esperando que sea últil pero SIN NINGUNA    //
//  GARANTÍA. Ver The GNU General Public License para mas detalles.          //
//  ------------------------------------------------------------------------ //
//  Questions, Bugs or any comment plese write me                            //
//  Preguntas, errores o cualquier comentario escribeme                      //
//  <adminone@redmexico.com.mx>                                              //
//  ------------------------------------------------------------------------ //
///////////////////////////////////////////////////////////////////////////////
define("_MI_RMDP_NAME", "RM+Soft.Download.Plus");
define("_MI_RMDP_DESC", "Modulo para administração avançada de software");

/**
 * Menus del administrador
 */
define('_MI_RMDP_AM1','Categorias Existentes');
define('_MI_RMDP_AM2','Nova Categoria');
define('_MI_RMDP_AM3','Downloads Existentes');
define('_MI_RMDP_AM4','Novo Download');
define('_MI_RMDP_AM5','Downloads');
define('_MI_RMDP_AM6','Nova Compatibilidade');
define('_MI_RMDP_AM8','Plataformas');
define('_MI_RMDP_AM9','Licenças');
define('_MI_RMDP_AM10','Downloads Enviados');
define('_MI_RMDP_AM11','Modificações');

/**
 * SubMenu
 */
define('_MI_SEND_DOWNLOAD','Enviar');
define('_MI_SENDED_DOWNS','Meus Downloads');

/**
 * Opciones de Configuraci&oacute;n
 */
define('_MI_RMDP_MODTITLE','Título do Módulo:');
define('_MI_RMDP_CATGOIMGW','Tamanho das imagens das categorias:');
define('_MI_RMDP_DOWNIMGW',' Tamanho das imagens dos downloads:');
define('_MI_RMDP_SHOTIMGW','Tamanho das imagens pequenas:');
define('_MI_RMDP_SHOTIMGBIGW','Tamanho das imagens grandes:');
define('_MI_RMDP_SHOTIMGBIGD','Útil só quando não for vincula diretamente às imagens');
define('_MI_RMDP_SHOTLINK','Vincular imagens diretamente:');
define('_MI_RMDP_CATEGODAYSNEW','Dias para mostrar uma categorias como nova:');
define('_MI_RMDP_CARACTDAYSNEW','Dias para mostrar uma característica como nova:');
define('_MI_RMDP_SHOTDAYSNEW','Dias para mostrar uma tela como nova:');
define('_MI_RMDP_SENDDOWN','Ativar o envio de downloads:');
define('_MI_RMDP_SENDANONIMO','Usuários anônimos podem enviar downloads:');
define('_MI_RMDP_CATWITHNEWS','Número de categorias com novidades na página principal:');
define('_MI_RMDP_SPONSORNUM','Mostrar número de downloads:');
define('_MI_RMDP_FAVORITESNUM','Mostrar número de downloads nos Favoritos:');
define('_MI_RMDP_POPULARNUM','Mostrar número de downloads nos Populares:');
define('_MI_RMDP_LENDESC','Tamanho em caracteres na descrição<br>dos downloads:');
define('_MI_RMDP_SHOTLIMIT','Limite de imagens por downloads:');
define('_MI_RMDP_SUBCATLIMIT','Número de subcategorias a mostrar:');
define('_MI_RMDP_RESALTEBG','Cor de Fundo para downloads em destaque (HEX):');
define('_MI_RMDP_LIMITRESULT','Limite de resultados por página:');
define('_MI_RMDP_UPDATEDAYS','Dias para considerar um elemento como atualizado:');
define('_MI_RMDP_DOWNNEW','Dias para considerar uma download como novo:');
define('_MI_RMDP_DATEFORMAT','Formato da Data:');
define('_MI_RMDP_POPULARNEEDS','Numero de downloads para considerar como popular<br>um arquivo:');
define('_MI_RMDP_USERVOTE','Permitir votos de usuários anônimos');
define('_MI_RMDP_OPENWINDOW','Comportamento dos downloads:');
define('_MI_RMDP_OPENSAME','Abrir na mesma janela');
define('_MI_RMDP_OPENNEW','Abrir em outra janela');
define('_MI_RMDP_SHOTCOLS','Número de colunas:');
define('_MI_RMDP_TOPPOP','Mostrar número de downloads populares');
define('_MI_RMDP_TOPFAV','Mostrar número de downloads favoritos');
define('_MI_RMDP_TOPRATE','Mostrar número de download melhor avaliado');
define('_MI_RMDP_SENDMAIL','Notificar por e-mail quando for enviado um download');
define('_MI_RMDP_BODYMAIL','Corpo da mensagem para usuários');
define('_MI_RMDP_BODYMAIL','Cuerpo del mensaje a usuarios');

// Bloques
define('_MI_RMDP_RECENT_TITLE','Downloads Recentes');
?>
