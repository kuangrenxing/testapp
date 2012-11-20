<?php
session_start();
include_once 'common/define.php';

$ka = $_POST['ka'];
$_SESSION['ka'] = $ka;

$nexturl = BASEURL."result.php";
$code_url = APIURL."authorization.php?afterurl=".$nexturl."&wb_app_conn_weifushi=".WB_APP_CONN_WEIFUSHI;

header("location: ".$code_url);
exit;

?>