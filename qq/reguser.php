<?php 
include 'comm/TuolarApi.class.php';
include 'comm/Globals.php';

session_start();

function regUser()
{
	$userinfo	= array(
			'email'		=> "qz_".strtolower($_SESSION['openid'])."@qq.com",//必需
			'username'	=> $_SESSION['nickname'],//必需
			'head_pic'	=> $_SESSION['figureurl_2'].".jpg",//必需
			'sex'		=> $_SESSION['gender'] == "男" ? 1 : 2,
			'reg_ip'	=> Globals::getClientIp(false),//必需
			'province'	=> "",
			'city'		=> "",
	);

	$sns		= '3';//qq 必需
	$connfrom	= $_SESSION["CONNECNT_TYPE"];//必需
	$authinfo	= array(
			'connuid' 		=> $_SESSION['openid'],//必需
			'connuname' 	=> $_SESSION['nickname'],
			'token' 		=> $_SESSION['openid'],//必需
			'token_secret' 	=> $_SESSION['access_token'],
			'expiretime'	=> ''
	);
	$tuolarApi 	= new TuolarApi();

	$userdata	= $tuolarApi->update_user($userinfo , $sns , $connfrom , $authinfo);

	return $userdata;

}
$ret = regUser();
print_r($ret);

?>