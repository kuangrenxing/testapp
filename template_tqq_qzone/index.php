<?php
session_start();
include_once 'common/define.php';

$nexturl = BASEURL."result.php";
$code_url = APIURL."authorization.php?afterurl=".$nexturl."&wb_app_conn_weifushi=".WB_APP_CONN_WEIFUSHI;

?>

<title><?php echo TITLE;?></title>
