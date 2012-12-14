<?php 
header("content-type:text/html;charset=utf-8");

include 'class/TuolarApi.class.php';
include 'class/Globals.php';

session_start();

$userinfo	= array(
		'email'		=> "qz_".strtolower($_SESSION['userinfo']["id"])."@qq.com",//必需
		'username'	=> $_SESSION['userinfo']['nick'],//必需
		'head_pic'	=> $_SESSION['userinfo']['head'].'/120.jpg',
		'sex'		=> $_SESSION['userinfo']['sex'],
		'reg_ip'	=> getClientIp(false),//必需
		'province'	=> $_SESSION['userinfo']['province_code'],
		'city'		=> "",
);


$sns		= '3';//qq 必需
$connfrom	= $_SESSION['userinfo']['wb_app_connweifushi'];//必需
$authinfo	= array(
		'connuid' 		=> $_SESSION['userinfo']["id"],//必需
		'connuname' 	=> $_SESSION['userinfo']['nick'],
		'token' 		=> $_SESSION['t_access_token'],//必需
		'token_secret' 	=> $_SESSION['t_openid'],
		'expiretime'	=> $_SESSION['t_expire_in'] == false ? '':$_SESSION['t_expire_in'],
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