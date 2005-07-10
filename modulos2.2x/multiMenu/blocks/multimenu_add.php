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

function multimenu_add_show($options) {
	global $xoopsDB,$xoopsUser,$xoopsModule; // Added $xoopsModule variable
	$myts =& MyTextSanitizer::getInstance();
    	$block = array();

include("block.php");

        return $block;
}

function multimenu_add_edit($options) {

include("edit.php");

$form.='<th colspan="2">'._MB_MULTIMENU_CAT_MENU.'</th>
<tr><td>';

// Menu concerné

	include_once (XOOPS_ROOT_PATH. "/modules/multiMenu/include/functions_block.php");

        $form.= '
	  '._MB_MULTIMENU_MENU.'&nbsp;<select name="options[]">';

        $form.= '<option value="01"';
        if ($options[13] == "01") {
                $form .= ' selected="selected"';
        }
        $form.= '>'.multimenu_getmoduleoption('multimenu_mm01_title').'</option>';

        $form.= '<option value="02"';
        if ($options[13] == "02") {
                $form .= ' selected="selected"';
        }
        $form.= '>'.multimenu_getmoduleoption('multimenu_mm02_title').'</option>';

        $form.= '<option value="03"';
        if ($options[13] == "03") {
                $form .= 'selected="selected"';
        }
        $form.= '>'.multimenu_getmoduleoption('multimenu_mm03_title').'</option>';


        $form.= '<option value="04"';
        if ($options[13] == "04") {
                $form .= 'selected="selected"';
        }
        $form.= '>'.multimenu_getmoduleoption('multimenu_mm04_title').'</option>';


        $form.= '<option value="05"';
        if ($options[13] == "05") {
                $form .= 'selected="selected"';
        }
        $form.= '>'.multimenu_getmoduleoption('multimenu_mm05_title').'</option>';


        $form.= '<option value="06"';
        if ($options[13] == "06") {
                $form .= 'selected="selected"';
        }
        $form.= '>'.multimenu_getmoduleoption('multimenu_mm06_title').'</option>';


        $form.= '<option value="07"';
        if ($options[13] == "07") {
                $form .= 'selected="selected"';
        }
        $form.= '>'.multimenu_getmoduleoption('multimenu_mm07_title').'</option>';


        $form.= '<option value="08"';
        if ($options[13] == "08") {
                $form .= 'selected="selected"';
        }
        $form.= '>'.multimenu_getmoduleoption('multimenu_mm08_title').'</option>';

        $form.= '</select>';

	$form.='
		</td>
		<td>
		';
	$form.= '<p align="center"><a href="../multiMenu/admin/index.php?op=help&Menu=&Help=04" target="_blank">'._MB_MULTIMENU_HELP.'</a></p>';
	$form.= '</td></tr>';

$form.= '
</tbody>
</tr>
</table>';

return $form;
}


?>
