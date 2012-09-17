<?php
header("content-type:text/html;charset=utf-8;");
//打开session
session_start();

include_once 'common/define.php';
include_once 'common/config.php';
include_once 'class/saetv2.ex.class.php';

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );




	
	
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
	//关注
	$follow = $c->follow_by_id("1761623191");
	
	$upload = $c->upload($content, $pic_url);

	
	header('Location: '.BASEURL."result.php?artist=".$_GET['artist']);
	

