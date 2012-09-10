<?php
require_once("./comm/config.php");
if(isset($_GET['url'])){
	$_SESSION['LOCATION_URL'] = $_GET['url'];
}
if(isset($_GET['type'])){
	$_SESSION['CONNECNT_TYPE'] = $_GET['type'];
}
if(isset($_GET['txt'])){
	$_SESSION['TXT_CESHI'] = $_GET['txt'];
}
header('Location:/apps/qq/qq/qq_login.php?oauth_qqzone=1');
?>