<?php

/**
* $Id: about.php,v 1.2 2005/08/02 03:47:51 mauriciodelima Exp $
* Module: SmartPartner
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
//
include_once("admin_header.php");

include_once(SMARTSECTION_ROOT_PATH . "class/about.php");
$aboutObj = new SmartsectionAbout(_AM_SS_ABOUT);
$aboutObj->render();

?>