<?

include("../../mainfile.php");
include XOOPS_ROOT_PATH."/header.php";
$myts =& MyTextSanitizer::getInstance();
$xoopsOption['template_main'] = 'rmlib_categos.html'; //Plantilla para esta página

$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("rmlib_categos")." ORDER BY titulo");
$num = $xoopsDB->getRowsNum($result) or $num=0;

$xoopsTpl->assign("lang_thereare", sprintf(_RH_CATEGO_THEREARE, $num));
$xoopsTpl->assign('lib_name', $xoopsModuleConfig['libname']);

while (list($cid,$titulo,$desc,$fecha) = $xoopsDB->fetchRow($result)){
	$title = "<a href='sections.php?section=$cid'>$titulo</a>";
	$desc = $myts->makeTareaData4Show($desc);
	$xoopsTpl->append('categos', array('id'=>$cid,'titulo'=>$title,'desc'=>$desc,'fecha'=>sprintf(_RH_CATEGOS_DATE, date("d/m/Y", $fecha))));
}

include XOOPS_ROOT_PATH."/footer.php";
?>