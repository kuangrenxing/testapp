<?php
session_start();
include_once 'common/define.php';
include_once 'class/saetv2.ex.class.php';

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

if(isset($_GET['WB_CALLBACK_URL']) == false)
{
	echo "NO WB_CALLBACK_URL";
	exit;
}
if(isset($_GET['nexturl']) == false)
{
	echo "NO index nexturl";
	exit;
}
$_SESSION['WB_CALLBACK_URL'] = $_GET['WB_CALLBACK_URL'];

$code_url = $o->getAuthorizeURL( $_GET['WB_CALLBACK_URL'] );

$_SESSION['code_url'] = $code_url;

header("location: ".$_GET['nexturl']);
exit;

?>
