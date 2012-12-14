<?php
header("content-type:text/html;charset=utf-8;");
include_once 'common/define.php';
include_once 'common/functions.php';
session_start();

//是否已收听 为1表示已经收听
$arr = array(
		"access_token" => $_SESSION["access_token"],
		"appid" => $_SESSION["appid"],
		"openid" => $_SESSION["openid"]
);
$result = check_fans($arr);

if(isset($result['isfans']) && $result['isfans'] == 1)
{
	header("location: transition.php");
}
else
{
	header("location: attention.php");
}


?>