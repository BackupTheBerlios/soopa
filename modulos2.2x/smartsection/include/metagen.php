<?php

/**
* $Id: metagen.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Credits : Many thanks to Solo :-)
* Licence: GNU
*/

function smartsection_purifyText($text)
{
	$myts =& MyTextSanitizer::getInstance();
	$text = str_replace('&nbsp;', ' ', $text);
	$text = str_replace('<br />', ' ', $text);
	$text = strip_tags($text);
	$text = html_entity_decode($text);
	$text = $myts->undoHtmlSpecialChars($text);
	$text = str_replace('. ', ' ', $text);
	$text = str_replace(', ', ' ', $text);
	$text = str_replace(')', '', $text);
	$text = str_replace('(', '', $text);
	$text = str_replace(':', '', $text);
	$text = str_replace('&euro', '', $text);
	$text = str_replace(';', '', $text);	
	
	return $text;
}

function smartsection_createMetaDescription($description, $maxWords = 30)
{
	$description = smartsection_purifyText($description);
	$description = smartsection_metagen_html2text($description);	
	
	$words = array();
	$words = explode(" ", $description);
	
	$ret = '';
	$i = 1;
	$wordCount = count($words);
	foreach ($words as $word) {
		$ret .= $word;
		if ($i < $wordCount) {
			$ret .= ' ';
		}
		$i++;
	}

	return $ret;
}

function smartsection_findMetaKeywords($text, $minChar)
{
	$keywords = array();
	
	$text = smartsection_purifyText($text);
	$text = smartsection_metagen_html2text($text);
	
	$originalKeywords = explode(" ", $text);
	foreach ($originalKeywords as $originalKeyword) {
		$secondRoundKeywords = explode("'", $originalKeyword);
		foreach ($secondRoundKeywords as $secondRoundKeyword) {
			If (strlen($secondRoundKeyword) >= $minChar) {
				if (!in_array($secondRoundKeyword, $keywords)) {
					$keywords[] = trim($secondRoundKeyword);
				}
			}
		}
	}
	return $keywords;
}

function smartsection_createMetaTags($title, $categoryPath='', $description = '', $minChar=4)
{
	global $xoopsTpl, $xoopsModule, $xoopsModuleConfig;
	$myts =& MyTextSanitizer::getInstance();
	
	$ret = '';
	
	$title = $myts->displayTarea($title);
	$title = $myts->undoHtmlSpecialChars($title);
	
	If (isset($categoryPath)) {
		$categoryPath = $myts->displayTarea($categoryPath);
		$categoryPath = $myts->undoHtmlSpecialChars($categoryPath);
	}
	
	// Creating Meta Keywords
	If (isset($title) && ($title != '')) {
		$keywords = smartsection_findMetaKeywords($title, $minChar);
		
		If (isset($xoopsModuleConfig) && isset($xoopsModuleConfig['moduleMetaKeywords']) && $xoopsModuleConfig['moduleMetaKeywords'] != '') {
			$moduleKeywords = explode(",", $xoopsModuleConfig['moduleMetaKeywords']);
			foreach ($moduleKeywords as $moduleKeyword) {
				If (!in_array($moduleKeyword, $keywords)) {
					$keywords[] = trim($moduleKeyword);
				}
			}
		}
		
		$keywordsCount = count($keywords);
		for ($i = 0; $i < $keywordsCount; $i++) {
			$ret .= $keywords[$i];
			if ($i < $keywordsCount -1) {
				$ret .= ', ';
			}
		}
		
		$xoopsTpl->assign('xoops_meta_keywords', $ret);
	}
	// Creating Meta Description
	If ($description != '') {
		$xoopsTpl->assign('xoops_meta_description', smartsection_createMetaDescription($description));	
	}
			
	// Creating Page Title
	$moduleName = '';
	$titleTag = array();
	
	If (isset($xoopsModule)) {
		$moduleName = $myts->displayTarea($xoopsModule->name());
		$titleTag['module'] = $moduleName;
	}

	If (isset($title) && ($title != '') && (strtoupper($title) != strtoupper($moduleName))) {
		$titleTag['title'] = $title;
	}
		
	If (isset($categoryPath) && ($categoryPath != '')) {
		$titleTag['category'] = $categoryPath;
	}
		
	$ret = '';

	If (isset($titleTag['title']) && $titleTag['title'] != '') {
		$ret .= smartsection_metagen_html2text($titleTag['title']);
	}
	
	If (isset($titleTag['category']) && $titleTag['category'] != '') {
		If ($ret != '') {
			$ret .= ' - ';
		}
		$ret .= $titleTag['category'];
	}
	If (isset($titleTag['module']) && $titleTag['module'] != '') {
		If ($ret != '') {
			$ret .= ' - ';
		}
		$ret .= $titleTag['module'];
	}
	$xoopsTpl->assign('xoops_pagetitle', $ret);
	
	
}

?>