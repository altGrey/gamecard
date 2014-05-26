<?php
/*		GameCardis Open Source Distance Learning 3D Web Software.
		GameCardis Copyright (C) 2014 Joel Ward.
		GameCardis available for use under the terms of the MIT License.
		
		To view the MIT License, see the "LICENSE" document included in this
		archive or visit: http://opensource.org/licenses/MIT
		
		For the Latest Versions of this software see: https://github.com/altGrey/wager
*/
wageCheck() or die("Illogical.");
//MySQL Query Database
function myquery($itt,$varkey,$query) {
	mysql_connect(dbhost, dbuser, dbpass);
	mysql_select_db(dbname);
	$result = mysql_query($query);
	if (!mysql_errno() && @mysql_num_rows($result) > 0) {
}
else {
$result=FALSE;
}
	mysql_close();
	return $result;
}
// MySQL Num Rows
function myrows($result) {
	$rows = @mysql_num_rows($result);
	return $rows;
}
// MySQL fetch array
function myarray($result) {
	$array = mysql_fetch_array($result);
	return $array;
}
// MySQL escape string
function myescape($query) {
	$escape = mysql_escape_string($query);
	return $escape;
}
//Initilize Session
function initSession($session) {
	if (!isset($session['initiated'])) {
		session_regenerate_id();
		$session['initiated'] = true;
	}
	return $session;
}
//Agent Session
function agentSession($session,$agent) {
	$fingerprint = md5($agent . secretPUB);
	if (isset($session['HTTP_USER_AGENT'])) {
		if ($session['HTTP_USER_AGENT'] != $fingerprint) {
			die();
			exit;
		}
	} else {
		$session['HTTP_USER_AGENT'] = $fingerprint;
	}
	return $session;
}