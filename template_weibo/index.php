<?php
session_start();
include_once 'common/define.php';

if(isset($_SESSION['code_url']) == false)
{
	// 生成授权url $_SESSION['code_url'];
	header("Location: ".APIURL."?WB_CALLBACK_URL=".WB_CALLBACK_URL."&nexturl=".BASEURL);
	exit;
}


//下一页url
$_SESSION['afterurl'] = BASEURL.'choice.php';
$_SESSION['WB_APP_CONN_WEIFUSHI'] = WB_APP_CONN_WEIFUSHI;

$code_url = $_SESSION['code_url'];
?>

<title><?php echo TITLE;?></title>

<?php echo $code_url;?>





