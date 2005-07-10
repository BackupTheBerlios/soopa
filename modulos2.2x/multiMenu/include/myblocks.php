<?php

/**
* $Id: myblocks.php,v 1.2 2005/07/10 03:37:10 mauriciodelima Exp $
* Module: MultiMenu
* Author: The WolFactory <www.wolfpackclan.com/wolfactory>
* Licence: GNU
*/

// ------------------------------------------------------------------------- //
//                            myblocksadmin.php                              //
//                - XOOPS block admin for each modules -                     //
//                          GIJOE <http://www.peak.ne.jp/>                   //
// ------------------------------------------------------------------------- //

include_once(XOOPS_ROOT_PATH."/class/xoopsblock.php");
$xoops_system_path = XOOPS_ROOT_PATH."/modules/system";


function list_blocks()
{
	global $block_arr, $xoopsModule ;

// get blocks owned by the module
$module_id = $xoopsModule->getVar('mid');
$block_arr =& XoopsBlock::getByModule( $xoopsModule->mid() ) ;
$count = 1;
	// blocks displaying loop
	foreach( array_keys( $block_arr ) as $i ) {
		
		$title = $block_arr[$i]->getVar("title") ;
		$name =  $block_arr[$i]->getVar("name") ;
		$bid =   $block_arr[$i]->getVar("bid") ;

		// visible and side
		if ( $block_arr[$i]->getVar("visible") != 1 ) {
			$ssel = "#E88";
		} else {
			$ssel = "#8E8";
		}
	
		// displaying part
		echo "<li style='list-style: none; margin: 0; display: inline; '>
				<a href='../../system/admin.php?fct=blocksadmin&amp;op=edit&amp;bid=$bid' style='padding: 1px 0.5em; margin-left: 1px; border: 1px solid #778; background: $ssel; text-decoration: none;' title='".$name."'>".$title."</a></li>";
if ($count >= 4 ) { echo '<br /><br />'; $count = '1'; } else { $count++; }
	}



}
echo "<a href='../../system/admin.php?fct=blocksadmin&selmod=-1&selgrp=2&selvis=1'>"._AD_MULTIMENU_BLOCK_LINK."</a> :<ul>";
list_blocks() ;
echo"</ul>";
?>