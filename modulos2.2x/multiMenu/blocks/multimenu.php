<?php
//  ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System				//
//                    Copyright (c) 2004 XOOPS.org					//
//                       <http://www.xoops.org/>					//
//													//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)			//
//                                 	- herve (www.herve-thouzard.com)		//
//                  multiMenu v1.6							//
//  ------------------------------------------------------------------------	//

function multimenu_show($options) {
	global $xoopsDB, $xoopsUser, $xoopsModule; 
	$myts =& MyTextSanitizer::getInstance();
    	$block = array();

include("block.php");

        return $block;
}

function multimenu_edit($options) {

include("edit.php");

// Menu concerné
	$form.='<tr><td colspan="2">';
	$form.= '<input type="hidden" name="options[]" value="'.$options[13].'">
		<p align="center"><a href="../multiMenu/admin/index.php?op=help&Menu=&Help=04" target="_blank">'._MB_MULTIMENU_HELP.'</a></p>';
	$form.= '</td></tr>';

	$form.= '
		</tbody>
		</tr>
		</table>';

return $form;
}


?>
