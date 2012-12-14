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
//下一页面文件
$nextFile = "weibo.php";
//授权url
$code_url = APIURL."?url=".BASEURL.$nextFile."&type=".WB_APP_CONN_WEIFUSHI;

header("location: ".$code_url);

?>