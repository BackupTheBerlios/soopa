<?php
//  ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System				//
//                    Copyright (c) 2004 XOOPS.org					//
//                       <http://www.xoops.org/>					//
//													//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)			//
//                                 	- herve (www.herve-thouzard.com)		//
//                  multiMenu v1.4								//
//  ------------------------------------------------------------------------	//


	$myts =& MyTextSanitizer::getInstance();
	$title = $myts->makeTboxData4Edit($title);
	$link = $myts->makeTboxData4Edit($link);
	echo "<h3><a href='index.php?Menu=$Menu' \>"._AD_MULTIMENU_ADMIN.$multimenu."</a></h3>";
	echo "
	<form action='index.php?op=new&Menu=".$Menu."' method='post' name='form1'>
	<div align='right'>
	<input type='hidden' name='Menu' value='".$Menu."'>
	<input type='submit' name='submit' value='"._AD_MULTIMENU_NEW."'>
	</div>
	</form>
	";
	$formtitle = new XoopsFormText(_AD_MULTIMENU_TITLE, "title", 50, 150, $title);
	$formlink = new XoopsFormText(_AD_MULTIMENU_LINK, "link", 50, 255, $link);
	$formimageurl = new XoopsFormText(_AD_MULTIMENU_IMAGE, "imageurl", 50, 255, $imageurl);
	$formhide = new XoopsFormSelect(_AD_MULTIMENU_STATUS, "hide", $hide);
	$formhide->addOption("1", _AD_MULTIMENU_ONLINE);
	$formhide->addOption("0", _AD_MULTIMENU_OFFLINE);
	$formsubmenu = new XoopsFormSelect(_AD_MULTIMENU_SUBMENU._AD_MULTIMENU_SUBMENUEXP, "submenu", $submenu);
	$formsubmenu->addOption("4", _AD_MULTIMENU_CATEGORY);
	$formsubmenu->addOption("0", _AD_MULTIMENU_MAINLINK);
	$formsubmenu->addOption("1", _AD_MULTIMENU_PERMSUBLINK);
	$formsubmenu->addOption("2", _AD_MULTIMENU_SUBLINK);
	$formsubmenu->addOption("3", _AD_MULTIMENU_NOTE);
	$formtarget  = new XoopsFormSelect(_AD_MULTIMENU_TARGET, "target", $target);
	$formtarget->addOption("_self", _AD_MULTIMENU_TARG_SELF);
	$formtarget->addOption("_blank", _AD_MULTIMENU_TARG_BLANK);
	$formtarget->addOption("_parent", _AD_MULTIMENU_TARG_PARENT);
	$formtarget->addOption("_top", _AD_MULTIMENU_TARG_TOP);
	$formgroups = new XoopsFormSelectGroup(_AD_MULTIMENU_GROUPS, "groups", true, $groups, 5, true);
	$submit_button = new XoopsFormButton("", "submit", _AD_MULTIMENU_SUBMIT, "submit");

	$form->addElement(new XoopsFormHidden("id",  $id));
	$form->addElement(new XoopsFormHidden("pid", $pid));
	$form->addElement($formtitle, true);
	$form->addElement($formlink, false);
	$form->addElement($formimageurl, false);
	$form->addElement($formhide);
	$form->addElement($formsubmenu);
	$form->addElement($formtarget);
	$form->addElement($formgroups);
	$form->addElement(new XoopsFormHidden("op", "update"));
	$form->addElement($submit_button);
	$form->addElement($notes);


?>
