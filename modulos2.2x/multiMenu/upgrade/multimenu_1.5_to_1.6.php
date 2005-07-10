<?php

include '../../../mainfile.php';

echo '<html><head><title>multiMenu 1.5 to 1.6</title></head><body>';

if (isset($HTTP_POST_VARS['submit'])) {

	if (!$xoopsDB->queryFromFile('./upgrade_1.5_to_1.6.sql')) {
		echo 'File upgrade_1.5_to_1.6.sql not found!';
	}
	echo 'Upgraded from multiMenu 1.5 to multiMenu 1.6. <br />
- 1)  delete "/modules/multiMenu/upgrade/" directory and its content from your server!<br />
- 2) update your multiMenu module in the Xoops admin -> Click on OK!<br />
	<p />
	<form action="../../system/admin.php?fct=modulesadmin&op=update&module=multiMenu" method="post">
	<input type="submit" name="submit" value="OK" />
	</form>';
	echo $xoopsLogger->dumpQueries();

} else {
	echo '<h1>multiMenu 1.5 to multiMenu 1.6</h1><p />Press the button below to upgrade from multiMenu 1.5 to 1.6<br />
<form action="multimenu_1.5_to_1.6.php" method="post">
<input type="submit" name="submit" value="OK" />
</form>';
}

echo '</body></html>';
?>