<?php
/*		GameCardis Open Source Distance Learning 3D Web Software.
		GameCardis Copyright (C) 2014 Joel Ward.
		GameCardis available for use under the terms of the MIT License.
		
		To view the MIT License, see the "LICENSE" document included in this
		archive or visit: http://opensource.org/licenses/MIT
		
		For the Latest Versions of this software see: https://github.com/altGrey/wager
*/
wageCheck() or die("Illogical.");
include(pathPRV.'inc/pro-factory.php');
$itx['master'] = getLocalConfig($itt,$varkey,"master");
include('../../wt-ps/config/http-config.php');
if ($itx['master']['display']['errors'] == 1) { ini_set("display_errors", 1); }
if (!isset($_SESSION['token'])) {
	$itx['token'] = md5(uniqid(rand(), true));
	$_SESSION['token'] = $itx['token'];
}
$itx['token'] = $_SESSION['token'];
$itx['ip'] = $_SERVER['REMOTE_ADDR'];
initSession($_SESSION);
agentSession($itt,$varkey,$_SESSION,$_SERVER['HTTP_USER_AGENT']);

$itx['get'] = safeGet($itt,$varkey,$_GET);
date_default_timezone_set($itx['master']['time']['timezone']);
$itx['time']['unix'] = time();
$itx['time']['pretty'] = getPrettyTime($itx['time']['unix']);
include($itx['master']['path']['private'].'includes/plugin-loader.php');
