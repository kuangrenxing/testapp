<?php 
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

header("location: ".$_SESSION['code_url']);

?>