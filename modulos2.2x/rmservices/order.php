<?php
//////////////////////////////////////////////////////////////////////////////
// $Id: order.php,v 1.1 2005/07/23 22:30:38 mauriciodelima Exp $                  //
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

$location = 'order';
include '../../mainfile.php';

$myts =& MyTextSanitizer::getInstance();

$op = $_GET['op'];
if ($op==''){ $op = $_POST['op']; }

switch ($op){
	case 'order':
		foreach($_POST as $key => $value){
			$body .= "$key = $value\n";
			$kkey = $body;
		}
		//Enviamos Email a los administradores
		$xoopsMailer =& getMailer();
		$xoopsMailer->useMail();
		$xoopsMailer->setToEmails($xoopsModuleConfig['mailorder']);
		$xoopsMailer->setFromEmail($xoopsModuleConfig['mailorder']);
		$xoopsMailer->setFromName($xoopsConfig['sitename']);
		$xoopsMailer->setSubject($xoopsModuleConfig['subject']);
		$xoopsMailer->setBody($xoopsModuleConfig['mailbodyadmin'] ."\n\n". $body);
		$xoopsMailer->send();
		
		$xoopsMailer =& getMailer();
		$xoopsMailer->useMail();
		$xoopsMailer->setToEmails($user_mail);
		$xoopsMailer->setFromEmail($xoopsModuleConfig['mailorder']);
		$xoopsMailer->setFromName($xoopsConfig['sitename']);
		$xoopsMailer->setSubject($xoopsModuleConfig['subject']);
		$xoopsMailer->setBody($xoopsModuleConfig['mailbody'] ."\n\n". $body);
		$xoopsMailer->send();
		
		redirect_header('index.php', 2, _MM_ORDER_SEND);
		break;
	default:
		include XOOPS_ROOT_PATH."/header.php";
		include_once 'include/terminos.php';
		$xoopsOption['template_main'] = 'rmsrv_order.html'; //Plantilla para esta página
		$item = $_GET['item'];
		if ($item==''){ header('location: index.php'); die(); }
		if ($_GET['type']=='srv'){
			$sql = "SELECT * FROM ".$xoopsDB->prefix("rmsrv_servicios")." WHERE codigo='$item'";
			$name = _MM_SRV_NAME;
		} else {
			$sql = "SELECT * FROM ".$xoopsDB->prefix("rmsrv_promos")." WHERE codigo='$item'";
			$name = _MM_PROMO_NAME;
		}
		$result = $xoopsDB->query($sql);
		$num = $xoopsDB->getRowsNum($result);
		if ($num<=0){ redirect_header('index.php', 1, _MM_NOT_FOUND); die(); }
		$row = $xoopsDB->fetchArray($result);
		setlocale(LC_MONETARY, $xoopsModuleConfig['money']);
		$p1 = money_format($xoopsModuleConfig['formatmoney'], $row['precio']);
		$xoopsTpl->append('formelements', array('element'=>"<strong>$row[nombre]</strong><input type='hidden' name='item_name' value='$row[nombre]'>",
				'text'=>$name));
		$xoopsTpl->append('formelements', array('element'=>"<strong>$row[codigo]</strong><input type='hidden' size='30' name='item_code' value='$row[codigo]'>",
				'text'=>_MM_ITEM_CODE));
		$xoopsTpl->append('formelements', array('element'=>"<strong>$p1</strong><input type='hidden' size='30' name='item_price' value='$p1'><input type='hidden' name='op' value='order'><br>
				<a href='javascript:;' style='font-size: 10px; font-weight: normal;' onClick=\"openWithSelfMain('http://www.xe.com/ecc/input.cgi?Template=sw&Amount=$row[precio]&From=USD','convert',600,170)\">"._MM_CONVERT_CUR."</a>",
				'text'=>_MM_ITEM_CODE));
		$xoopsTpl->append('formelements', array('element'=>"<input type='text' size='30' name='user_mail' value=''>",
				'text'=>_MM_ITEM_MAIL));
				
		$form = explode("|", $row['form']);
		foreach($form as $element){
			$val = explode('{/}', $element);
			$tarea = str_replace("<ta ", "<textarea ", $val[1]);
			$tarea = str_replace("</ta>", "</textarea>", $tarea);
			$xoopsTpl->append('formelements', array('element'=>$tarea,'text'=>$val[0]));
		}
		if ($_GET['type']=='srv'){
			$xoopsTpl->append('formelements', array('element'=>MakeTermsServs($row['id_srv']), 'text'=>''));
		} else {
			$xoopsTpl->append('formelements', array('element'=>MakeTermsPromos($row['id_promo']), 'text'=>''));
		}
		$xoopsTpl->assign('lng_titulo',_MM_FORM_TITLE);
		$xoopsTpl->assign('lng_services', _MM_LNGSERVICES);
		$xoopsTpl->assign('lng_lnkpromos', _MM_LNGPROMOS);
		// Cadenas de errores
		$xoopsTpl->assign('lang_errores_happen', _RMDP_ERRORS_HAPPEND);
		$xoopsTpl->assign('lang_mustbe_num', _RMDP_MUSTBE_NUM);
		$xoopsTpl->assign('lang_is_empty', _RMDP_IS_EMPTY);
		include XOOPS_ROOT_PATH."/footer.php";
		break;
}


?>
