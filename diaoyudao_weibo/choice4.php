<?php 
include_once 'common/define.php';
session_start();
$_SESSION['three'] = $_GET['three'];

header("Location: ".BASEURL.'result.php');
?>