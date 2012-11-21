<?php
header("content-type:text/html; charset=utf-8");
require_once("./comm/config.php");
session_start();
if(isset($_GET['url'])){
	$_SESSION['LOCATION_URL'] = $_GET['url'];
}
if(isset($_GET['type'])){
	$_SESSION['CONNECNT_TYPE'] = $_GET['type'];
}
if(isset($_GET['txt'])){
	$_SESSION['TXT_CESHI'] = $_GET['txt'];
}

// header('Location:/apps/qq/qq/qq_login.php?oauth_qqzone=1');
// header('Location:/qq/qq/qq_login.php?oauth_qqzone=1');

//检查授权
if(!isset($_SESSION["access_token"]) || !isset($_SESSION["appid"]) || !isset($_SESSION["openid"]))
{
	header('Location:/qq/qq/qq_login.php?oauth_qqzone=1');
}
else
{
	header("location: ".$_SESSION['LOCATION_URL']);
}
?>