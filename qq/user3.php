<?php
define('TUOLAR_CONNECT' , 1);
require_once('../config.php');
require_once("../functions.php");
require_once("../class.Mysql.php");
require_once("./comm/config.php");
if (isset($_SESSION["CONNECNT_TYPE"])){
	define('CONNECT_TYPE_QQ' , $_SESSION["CONNECNT_TYPE"]);
	unset($_SESSION["CONNECNT_TYPE"],$_SESSION["SFZ"]);
}
$email = "qz_".strtolower($_GET["openid"])."@qq.com";
$gender = $_GET["gender"];
$username = $_GET["nickname"];
$head_pic = $_GET['headimg'];

$newUser['password']  	= generatePassword(8);
if($username != ''){
	$newUser['username']  	= $username;
}else{
	$newUser['username']  	= 'QQ_'.strtolower($_GET["openid"]);
}
$newUser['email']  		= $email;
$newUser['head_pic'] 	= $head_pic;
$newUser['reg_ip'] 		= $newUser['log_ip'] = getClientIP();
$newUser['connfrom'] 	= CONNECT_TYPE_QQ;
$newUser['sex'] = $gender;
$newUser['time_created']= $newUser['log_time'] = time();

if (strpos($newUser['head_pic'] , "/50/") !== false){
	$newUser['head_pic'] = str_replace("/50/" , "/180/" , $newUser['head_pic']);
}
$db = new mysql();

//查询用户
$query = $db->query("select id,head_pic,stgle from tb_user where email = '".$newUser['email']."'");
$res   = $db->fetch_row($query);

if (!$res){//用户存在 更新connect数据
	$imgPath = "../../../img/user/".date("Ym")."/".date('d')."/".date("g")."/";
	if (!is_dir($imgPath)){
		makeDeepDir($imgPath);
	}
	$imgUrl = $imgPath.date("YmdHis").rand(10,99).strrchr($newUser['head_pic'], '.');
	$imgUrl_128 = substr($imgUrl , 0 , strrpos($imgUrl , '.'))."_128.".substr(strrchr($imgUrl, "."), 1);
	$imgUrl_80 = substr($imgUrl , 0 , strrpos($imgUrl , '.'))."_80.".substr(strrchr($imgUrl, "."), 1);
	$imgUrl_36 = substr($imgUrl , 0 , strrpos($imgUrl , '.'))."_36.".substr(strrchr($imgUrl, "."), 1);
	$headImg = GetImage($newUser['head_pic'] , $imgUrl , 1);
	
//	require_once("../ImageMagick.php");
//	$imageMagick = new ImageMagick();
//	@$imageMagick->MagickThumb($headImg, $imgUrl_128 , 128 , 128 , '' , 1);
//	@$imageMagick->MagickThumb($headImg, $imgUrl_80 , 80 , 80 , '' , 1);
//	@$imageMagick->MagickThumb($headImg, $imgUrl_36 , 36 , 36 , '' , 1);
	
	$headImg_128 = GetImage($newUser['head_pic'] , $imgUrl_128 , 1);
	$headImg_80 = GetImage($newUser['head_pic'] , $imgUrl_80 , 1);
	$headImg_36 = GetImage($newUser['head_pic'] , $imgUrl_36 , 1);
	$headImgUrl = substr($headImg , 4);
	
	$db->query('insert into tb_user(username , password , sex , email , head_pic , reg_ip ,connfrom , time_created , log_ip , log_time) values ("'.$newUser['username'].'","'.$newUser['password'].'","'.$newUser['sex'].'","'.$newUser['email'].'","'.$headImgUrl.'","'.$newUser['reg_ip'].'","'.$newUser['connfrom'].'","'.$newUser['time_created'].'","'.$newUser['log_ip'].'","'.$newUser['log_time'].'")');
	$uid = $db->insert_id();
	
	$conn['type'] 	= CONNECT_TYPE_QQ;
	$conn['uid'] 	= $uid;
	$conn['connuid'] 	= 0;
	$conn['connuname'] 	= $username;
	$conn['isbind'] = 1;
	$conn['issync'] = 1;
	$conn['token'] 	= $_SESSION['openid'];
	$conn['token_secret'] = $_SESSION['access_token'];
	$conn['createtime'] = $conn['updatetime'] = time();
	$stgle = 0;
	$db->query('insert into tb_connect (type,uid,connuid,connuname,token,token_secret,isbind,issync,createtime,updatetime) values ("'.$conn['type'].'","'.$conn['uid'].'","'.$conn['connuid'].'","'.$conn['connuname'].'","'.$conn['token'].'","'.$conn['token_secret'].'",1,1,"'.$conn['createtime'].'","'.$conn['updatetime'].'")');
}else{//用户不存在 记录connect数据
	$uid = $res[0];
	$stgle = $res[2];
	$headImgUrl = $res[1];
//	$imgPath = "../../img/user/".date("Ym")."/".date('d')."/".date("g")."/";
//	if (!is_dir($imgPath)){
//		makeDeepDir($imgPath);
//	}
//	$imgUrl = $imgPath.date("YmdHis").rand(10,99).strrchr($newUser['head_pic'], '.');
//	$imgUrl_128 = substr($imgUrl , 0 , strrpos($imgUrl , '.'))."_128.".substr(strrchr($imgUrl, "."), 1);
//	$imgUrl_80 = substr($imgUrl , 0 , strrpos($imgUrl , '.'))."_80.".substr(strrchr($imgUrl, "."), 1);
//	$imgUrl_36 = substr($imgUrl , 0 , strrpos($imgUrl , '.'))."_36.".substr(strrchr($imgUrl, "."), 1);
//	$headImg = GetImage($newUser['head_pic'] , $imgUrl);
//	
//	require_once("../ImageMagick.php");
//	$imageMagick = new ImageMagick();
//	@$imageMagick->MagickThumb($headImg, $imgUrl_128 , 128 , 128 , '' , 1);
//	@$imageMagick->MagickThumb($headImg, $imgUrl_80 , 80 , 80 , '' , 1);
//	@$imageMagick->MagickThumb($headImg, $imgUrl_36 , 36 , 36 , '' , 1);
//	
////	$headImg_128 = GetImage($newUser['head_pic'] , $imgUrl_128);
////	$headImg_80 = GetImage($newUser['head_pic'] , $imgUrl_80);
////	$headImg_36 = GetImage($newUser['head_pic'] , $imgUrl_36);
//	$headImgUrl = substr($headImg , 4);
	
	$conn['type'] 	= CONNECT_TYPE_QQ;
	$conn['uid'] 	= $uid;
	$conn['connuid'] 	= 0;
	$conn['connuname'] 	= $username;
	$conn['isbind'] = 1;
	$conn['issync'] = 1;
//	$conn['head_pic'] = $headImgUrl;
	$conn['token'] 	= $_SESSION['openid'];
	$conn['token_secret'] = $_SESSION['access_token'];
	$conn['updatetime'] = time();
	
	$update1 = 'update tb_user set username = "'.$newUser['username'].'" , sex = "'.$newUser['sex'].'" , log_ip = "'.$newUser['log_ip'].'" , log_time = "'.$newUser['log_time'].'" where id ='.$conn['uid'];
	$update2 = 'update tb_connect set connuid = "'.$conn['connuid'].'" , connuname = "'.$conn['connuname'].'" , token = "'.$conn['token'].'" , token_secret = "'.$conn['token_secret'].'" , updatetime = '.$conn['updatetime'].' where type = '.$conn["type"].' and uid ='.$conn['uid'];
	
	$db->query($update1);
	$db->query($update2);
}

$life_time = COOKIE_EXPIRE;
$expire_time = time() + $life_time;

header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
header("Content-Type: text/html; charset=UTF-8");
		
setcookie("px_uid", $uid, $expire_time, "/",COOKIE_DOMAIN,0);
setcookie("px_username", $newUser['username'], $expire_time, "/",COOKIE_DOMAIN,0);
setcookie("px_head_pic", $headImgUrl, $expire_time, "/",COOKIE_DOMAIN,0);
setcookie("px_sex", $newUser['sex'], $expire_time, "/",COOKIE_DOMAIN,0);
setcookie("px_stgle", $stgle, $expire_time, "/",COOKIE_DOMAIN,0);
$_SESSION["username"] = $newUser['username'];
$txt = $_SESSION["TXT_CESHI"];
$_SESSION["txt_name"] = $txt;
$_SESSION["gender"] = $gender;
unset($_SESSION['TXT_CESHI']);
if (isset($_SESSION["LOCATION_URL"])){
	$location_url = $_SESSION["LOCATION_URL"];
	unset($_SESSION["LOCATION_URL"]);
	header('Location:'.$location_url);
}else{
	header('Location:'.TUOLAR_DOMAIN);
}
?>