<?php 
header("content-type:text/html;charset=utf-8");

include 'class/TuolarApi.class.php';
include 'class/Globals.php';

session_start();


$userinfo	= array(
		'email'		=> "".strtolower($_SESSION['userinfo']["id"])."@sina.com",//必需
		'username'	=> $_SESSION['userinfo']['screen_name'],//必需
		'head_pic'	=> str_replace("/50", "/180", $_SESSION['userinfo']['profile_image_url']).'.jpg',
		'sex'		=> $_SESSION['userinfo']['gender'] == 'm' ? 1 : 2,
		'reg_ip'	=> getClientIp(false),//必需
		'province'	=> $_SESSION['userinfo']['province'],
		'city'		=> $_SESSION['userinfo']['city'],
);


$sns		= '1';// 必需
$connfrom	= $_SESSION['userinfo']['wb_app_connweifushi'];//必需
$authinfo	= array(
		'connuid' 		=> $_SESSION['userinfo']["id"],//必需
		'connuname' 	=> $_SESSION['userinfo']['screen_name'],
		'token' 		=> $_SESSION['token']['access_token'],//必需
		'token_secret' 	=> "",
		'expiretime'	=> $_SESSION['token']['expires_in'],
);

$tuolarApi 	= new TuolarApi();
$userdata	= $tuolarApi->update_user($userinfo , $sns , $connfrom , $authinfo);


$_SESSION['userinfo']['uid'] = $userdata['uid'];
$_SESSION['userinfo']['head_pic'] = $userdata['head_pic'];


if(isset($_SESSION['afterurl']))
{
	header("location: ".$_SESSION['afterurl']);	
}
elseif(isset($_GET['afterurl']))
{
	header("location: ".$_GET['afterurl']);
	
}


?>