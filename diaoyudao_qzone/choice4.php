<?php 
include_once 'common/define.php';
session_start();
$_SESSION['three'] = $_GET['three'];

header("Location: ".APIURL."guanzhu.php?nexturl=".BASEURL.'result.php');
?>