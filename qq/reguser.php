<?php 
include 'comm/TuolarApi.class.php';
include 'comm/Globals.php';

session_start();


$userinfo	= array(
		'email'		=> "qz_".strtolower($_SESSION['openid'])."@qq.com",//必需
		'username'	=> $_SESSION['userinfo']['nickname'],//必需
		'head_pic'	=> $_SESSION['userinfo']['figureurl_2'].".jpg",//必需
		'sex'		=> $_SESSION['userinfo']['gender'] == "男" ? 1 : 2,
		'reg_ip'	=> getClientIp(false),//必需
		'province'	=> "",
		'city'		=> "",
);


$sns		= '3';//qq 必需
$connfrom	= $_SESSION["CONNECNT_TYPE"];//必需
$authinfo	= array(
		'connuid' 		=> $_SESSION['openid'],//必需
		'connuname' 	=> $_SESSION['userinfo']['nickname'],
		'token' 		=> $_SESSION['openid'],//必需
		'token_secret' 	=> $_SESSION['access_token'],
		'expiretime'	=> ''
);
$tuolarApi 	= new TuolarApi();


$userdata	= $tuolarApi->update_user($userinfo , $sns , $connfrom , $authinfo);

print_r($_SESSION);
print_r($userdata);

$life_time = COOKIE_EXPIRE;
$expire_time = time() + $life_time;

setcookie("px_uid", $userdata['uid'], $expire_time, "/",COOKIE_DOMAIN,0);
setcookie("px_username", $userdata['username'], $expire_time, "/",COOKIE_DOMAIN,0);
setcookie("px_head_pic", $userdata['head_pic'], $expire_time, "/",COOKIE_DOMAIN,0);
setcookie("px_sex", $_SESSION['gender'] == "男" ? 1 : 2, $expire_time, "/",COOKIE_DOMAIN,0);
setcookie("px_stgle", "", $expire_time, "/",COOKIE_DOMAIN,0);


$_SESSION["username"] = $userdata['username'];
$_SESSION["head_pic"] = $userdata['head_pic'];


if(isset($_SESSION["TXT_CESHI"]))
{
	$txt = $_SESSION["TXT_CESHI"];
	$_SESSION["txt_name"] = $txt;
	unset($_SESSION['TXT_CESHI']);
}

if (isset($_SESSION["LOCATION_URL"])){
	$location_url = $_SESSION["LOCATION_URL"];
	unset($_SESSION["LOCATION_URL"]);
	header('Location:'.$location_url);
}else{
	header('Location:'.TUOLAR_DOMAIN);
}

?>