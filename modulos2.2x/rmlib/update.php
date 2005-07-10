<?php

include 'mainfile.php';

$pref = $xoopsDB->prefix('')."_";
$tblcat = $pref."rmlib_categos";
$tblcont = $pref."rmlib_contenido";
$tblindex = $pref."rmlib_indice";
$tbltemas = $pref."rmlib_temas";
$tblusers = $pref."rmlib_users";

// Iniciamos la actualización
# Tabla contenido

$xoopsDB->query(" ALTER TABLE `$tblindex` ADD `lecturas` INT DEFAULT '0' NOT NULL AFTER `fecha` ");


//redirect_header(XOOPS_URL, 2, "Actualización completa");

?>