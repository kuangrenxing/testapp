<?php
session_start();
include_once 'common/define.php';

if(isset($_POST['ka']))
{
	$ka = $_POST['ka'];
	$_SESSION['ka'] = $ka;
}


if(isset($_SESSION['code_url']) == false)
{
	// 生成授权url $_SESSION['code_url'];
	header("Location: ".APIURL."?WB_CALLBACK_URL=".WB_CALLBACK_URL."&nexturl=".BASEURL.'next2.php');
	exit;
}


//下一页url
$_SESSION['afterurl'] = BASEURL.'result.php';
$_SESSION['WB_APP_CONN_WEIFUSHI'] = WB_APP_CONN_WEIFUSHI;

$code_url = $_SESSION['code_url'];


header("location: ".$code_url);
exit;

?>