<?php
require_once("../comm/config.php");
require_once('../functions.php');
$arr = array(
		"access_token" => $_SESSION["access_token"],
		"appid" => $_SESSION["appid"],
		"openid" => $_SESSION["openid"]
);
$result = check_fans($arr);
echo $result['isfans'];

exit;