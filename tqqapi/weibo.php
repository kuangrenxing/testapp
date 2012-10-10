<?php
header("content-type:text/html;charset=utf-8;");

error_reporting(0);
require_once './class/Tencent.php';
require_once './common/config.php';
require_once './common/define.php';

OAuth::init($client_id, $client_secret);
Tencent::$debug = $debug;

//打开session
session_start();

if(isset($_GET['content']) == false || isset($_GET['pic_url']) == false)
{
	echo 'content or pic_url is null';
	exit;
}
	
//关注
if ($_SESSION['t_access_token'] || ($_SESSION['t_openid'] && $_SESSION['t_openkey'])) {//用户已授权

	
	$paramsListener = array(
					'name' => 'tuolarfashion',
					'format'=>'json'
					
										
			);
	$listener = Tencent::api('friends/add',$paramsListener, 'POST');	
	
	
	// 发微博
	$content = $_GET['content'];
	$pic_url = $_GET['pic_url'];

	
	$params = array(
			'content' => $content,
			'pic_url' => $pic_url			
	);
	$add = Tencent::api('t/add_pic_url', $params, 'POST');
	$add = json_decode($add, true);

	if(stripos($_GET['nexturl'], "http") !== false)
	{
		$nexturl = $_GET['nexturl'];
	}
	else
	{
		$nexturl = $_GET['baseurl'].$_GET['nexturl'];
	}
	
	header('Location: '.$nexturl);
	exit;	
}
else
{
	header('Location: '.$_GET['baseurl']);
	exit;
}
