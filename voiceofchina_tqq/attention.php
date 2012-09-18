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

//关注
if ($_SESSION['t_access_token'] || ($_SESSION['t_openid'] && $_SESSION['t_openkey'])) {//用户已授权

	$paramsListener = array(
					'name' => 'tuolarfashion',
					'format'=>'json'
					
										
			);
	$listener = Tencent::api('friends/add',$paramsListener, 'POST');	
	
	
	// 发微博
	if($_GET['artist'] == 0)
	{
		$content = "《中国好声音》 恐怕火星人都知道了，想知道哪位老师会为你转身，为你心动? 由于竞争太过激烈，你很遗憾地没有入选。一起来测试吧!网址:".BASEURL;
		$pic_url = BASEURL."src/images/test2_03.jpg";
	}
	else
	{
		$content = "@".$artist[$_GET['artist']]['name']." 《中国好声音》 恐怕火星人都知道了，想知道哪位老师会为你转身，为你心动?我得到".$artist[$_GET['artist']]['name']."导师认可：I WANT U ".$artist[$_GET['artist']]['content']."一起来测试吧!网址:".BASEURL;
		$pic_url = BASEURL.$artist[$_GET['artist']]['img'];
	}
	
	$params = array(
			'content' => $content,
			'pic_url' => $pic_url			
	);
	$add = Tencent::api('t/add_pic_url', $params, 'POST');
	$add = json_decode($add, true);
	
	header('Location: '.BASEURL."result.php?artist=".$_GET['artist']);
	
}
else
{
	header('Location: '.BASEURL);
}
