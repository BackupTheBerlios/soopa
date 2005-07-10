<?php
//  ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System				//
//                    Copyright (c) 2004 XOOPS.org					//
//                       <http://www.xoops.org/>					//
//													//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)			//
//                                 	- herve (www.herve-thouzard.com)		//
//                  multiMenu v1.7								//
//  ------------------------------------------------------------------------	//

for ($i = 1; $i <= 8; $i++) {
$idMenu = sprintf("%02d",$i);
$adminmenu[$i]['title'] = _MI_MULTIMENU_NAME_.$idMenu;
$adminmenu[$i]['link'] = "admin/index.php?Menu=".$idMenu;
}
?>