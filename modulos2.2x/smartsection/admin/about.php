<?php

/**
* $Id: about.php,v 1.1 2005/07/05 05:34:13 mauriciodelima Exp $
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