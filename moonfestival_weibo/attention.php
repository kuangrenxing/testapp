<?php
header("content-type:text/html;charset=utf-8;");
//打开session
session_start();

include_once 'common/define.php';
include_once 'common/config.php';
include_once 'common/function.php';
include_once 'class/saetv2.ex.class.php';

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );

	$uid_get = $c->get_uid();
	$uid = $uid_get['uid'];
	$friends = $c->friends_by_id($uid);
	$friends = $friends['users'];
	
	
	
	//我的异性好友
	$mynsex =  $_SESSION['userinfo']['gender']=="m" ? "f" : "m";
	$nsexIdollist = array();// 我异性的好友
	foreach($friends as $i=>$v)
	{
		if($v['gender'] == $mynsex)
			$nsexIdollist[] = $v;
	}
	
	$idollistKey = array_rand($nsexIdollist,1);
	
	$niceringName = $nsexIdollist[$idollistKey]['name'];
	$nicering = $nsexIdollist[$idollistKey]['screen_name'];
	$niceringImg = $nsexIdollist[$idollistKey]['avatar_large'];
	
	//生成水印
	if($_SESSION['userinfo']['gender']=="m")//男得用背景weibobgwoman.jpg
	{
		$waterSBg = "src/watermark/weibobgwoman.jpg";
		$waterbg = "src/watermark/weibobgwoman".$_SESSION['userinfo']['uid'].".jpg";//背景图
		$_SESSION['title'] = "你朝思暮想的“嫦娥”是".$nicering;
	}
	else
	{
		$waterSBg = "src/watermark/weibobgman.jpg";
		$waterbg = "src/watermark/weibobgman".$_SESSION['userinfo']['uid'].".jpg";//背景图
		$_SESSION['title'] = "你的傻瓜“猪八戒”是".$nicering;
	}
	
	$waterImg = "src/watermark/water".$_SESSION['userinfo']['uid'].".jpg";//人像头图名
	if(file_exists($waterImg))
	{
		unlink($waterImg);
	}
	
	GetImage($niceringImg,$waterImg);
	if(file_exists($waterbg))
	{
		unlink($waterbg);
	}
	copy($waterSBg, $waterbg);
	
	if(file_exists($waterImg) == false)
	{
		GetImage($niceringImg,$waterImg);
	}
	//文字水印
	imageWaterMark($waterbg,10,$waterImg,$nicering,5,"#FFFF00");
	
	
	$_SESSION['nicering'] = $nicering;
	$_SESSION['niceringImg'] = $niceringImg;
	$_SESSION['waterbg'] = $waterbg;


	$content = "刚刚玩了一个非常有趣的测试，原来我朝思暮想的“嫦娥”是 @$niceringName ，大家赶快一起来测测谁是你的嫦娥吧，".BASEURL."（网址），并祝大家中秋快乐。";
	$_SESSION['content'] =$content; 
	
	$pic_url = BASEURL.$waterbg;
	$nexturl = "result.php";

	$_SESSION['weiboimg'] = $pic_url;
	

	// 发微博

	//关注
	$follow = $c->follow_by_id("1761623191");
	
	$upload = $c->upload($content, $pic_url);
	

	if(file_exists($waterbg))
		unlink($waterbg);
	if(file_exists($waterImg))
		unlink($waterImg);
	header('Location: '.BASEURL."result.php");
	exit;
	

