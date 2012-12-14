<?php
header("content-type:text/html;charset=utf-8;");
include_once 'common/define.php';
session_start();
if(isset($_GET['val']))
{
	$_SESSION['val'] = $_GET['val'];
}
else 
{
	header("location: ".BASEURL);
	exit;
}
$nexturl = BASEURL."weibo.php";
$code_url = APIURL."authorization.php?afterurl=".$nexturl."&wb_app_conn_weifushi=".WB_APP_CONN_WEIFUSHI;

header("location: ".$code_url);

?>