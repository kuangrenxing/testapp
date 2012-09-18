<?php
header("content-type:text/html;charset=utf-8;");

include_once './common/config.php';
include_once './common/define.php';
require_once('./functions.php');
require_once("../qq/comm/config.php");


//随机下标
$key = array_rand($people);

$result=array(
		"access_token" => $_SESSION["access_token"],
		"appid" => $_SESSION["appid"],
		"openid" => $_SESSION["openid"],
		'title' => '【非诚勿扰】测测',
		'url' => BASEURL,
		'comment' => "刚做一个很有意思的测试，我居然成功牵手了".$people[$key]['name']."，看来我的魅力确实是无人能档！！ 一起来测试吧，看看你能带走谁。网址:".BASEURL,
		'summary' => '看《非诚勿扰》时，是否也曾经想过，假如在屏幕上的男嘉宾是你，你能否带走你的心动女生。快来看看吧！',
		'images' => BASEURL."src/images/".$people[$key]['image']
);


$arr = add_share($result);



header("location: ".BASEURL."result.php?key=".$key);

?>