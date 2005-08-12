<?php
// $Id: schinese.php,v 1.4 2005/08/12 00:03:54 mauriciodelima Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //
require NEWS_FPDF_PATH.'/chinese.php';

// For end users
$valid_pfd_charset = "GB2312";

$pdf_config['margin'] = array(
	'left'=>25,
	'top'=>25,
	'right'=>25
	);

$pdf_config['logo'] = array(
	'path'=>'images/xoopsbb_slogo.png',
	'left'=>150,
	'top'=>10,
	'width'=>0,
	'height'=>0
	);

$pdf_config['font']['slogan'] = array(
	'family'=>'simhei',
	'style'=>'',
	'size'=>20
	);

$pdf_config['font']['title'] = array(
	'family'=>'simhei',
	'style'=>'bu',
	'size'=>12
	);

$pdf_config['font']['subject'] = array(
	'family'=>'simhei',
	'style'=>'b',
	'size'=>11
	);

$pdf_config['font']['author'] = array(
	'family'=>'simsun',
	'style'=>'',
	'size'=>10
	);

$pdf_config['font']['subtitle'] = array(
	'family'=>'simhei',
	'style'=>'b',
	'size'=>11
	);

$pdf_config['font']['subsubtitle'] = array(
	'family'=>'simhei',
	'style'=>'b',
	'size'=>10
	);

$pdf_config['font']['content'] = array(
	'family'=>'simsun',
	'style'=>'',
	'size'=>10
	);

$pdf_config['font']['footer'] = array(
	'family'=>'simsun',
	'style'=>'',
	'size'=>8
	);

$pdf_config['action_on_error'] = 0; // 0 - continue; 1 - die
$pdf_config['creator'] = 'CBB BASED ON FPDF v1.53';
$pdf_config['url'] = XOOPS_URL;
$pdf_config['mail'] = 'mailto:'.$xoopsConfig['adminmail'];
$pdf_config['slogan']=xoops_substr($myts->htmlspecialchars( $xoopsConfig['sitename'] ),0,30);
$pdf_config['scale'] = '0.8';
$pdf_config['dateformat'] = _DATESTRING;
$pdf_config['footerpage'] = _MD_PDF_PAGE;

// For local support sites
define('NEWS_PDF_FORUM', '论坛');
define('NEWS_PDF_TOPIC', '主题');
define('NEWS_PDF_SUBJECT', '标题');
define('NEWS_PDF_AUTHOR', _POSTEDBY);
define('NEWS_PDF_DATE', _MD_POSTEDON);

// For more details, refer to: http://fpdf.org
class PDF_language extends PDF_Chinese
{
	function PDF_language($orientation='P',$unit='mm',$format='A4')
	{
	    //Call parent constructor
	    $this->FPDF($orientation,$unit,$format);
	    //Initialization
		$this->AddGBhwFont('simsun','宋体');
		$this->AddGBhwFont('simhei','黑体');
		$this->AddGBhwFont('simkai','楷体_GB2312');
		$this->AddGBhwFont('sinfang','仿宋_GB2312');
	}

	function Error($msg)
	{
		global $pdf_config;
		if($pdf_config['action_on_error']){
			//Fatal error
			die('<B>FPDF 错误: </B>'.$msg);
		}
	}

	function encoding(&$text, $in_charset)
	{
		$out_charset = $GLOBALS["valid_pfd_charset"];
	    if (empty($in_charset) || empty($out_charset) || !strcasecmp($out_charset, $in_charset)) return;

	    if(is_array($text) && count($text)>0){
		    foreach($text as $key=>$val){
		    	$this->_encoding($text[$key], $in_charset, $out_charset);
	    	}
    	}else{
		    $this->_encoding($text, $in_charset, $out_charset);
	    }
	}

	function _encoding(&$text, $in_charset, $out_charset)
	{
		if(function_exists("xoopschina_convert_encoding")) {
			$text = xoopschina_convert_encoding($text, $in_charset, $out_charset);
			return;
		}

		$xconv_handler = @xoops_getmodulehandler('xconv', 'xconv', true);
		if($xconv_handler &&
			$converted_text = @$xconv_handler->convert_encoding($text, $out_charset, $in_charset)
		){
			$text = $converted_text;
			return;
		}
		if(XOOPS_USE_MULTIBYTES && function_exists('mb_convert_encoding')) $converted_text = @mb_convert_encoding($text, $out_charset, $in_charset);
		else
		if(function_exists('iconv')) $converted_text = @iconv($in_charset, $out_charset . "//TRANSLIT", $text);
		$text = empty($converted_text)?$text:$converted_text;
	}
}
?>