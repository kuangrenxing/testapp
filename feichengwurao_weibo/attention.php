<?php
header("content-type:text/html;charset=utf-8;");
//打开session
session_start();

include_once 'common/define.php';
include_once 'common/config.php';
include_once 'class/saetv2.ex.class.php';

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );

	$uid_get = $c->get_uid();
	$uid = $uid_get['uid'];
	$friends = $c->friends_by_id($uid);
	$friendsKey = array_rand($friends,3);
	
	$meting = "";
	foreach($friendsKey as $i=>$v)
	{
		$meting .= "@".$friends[$v]['name'].' ';
	}
	print_r($friends);
	exit;


	// 发微博
	//随机下标
	$key = array_rand($people);
	
	$content = "【非诚勿扰】测测。刚做一个很有意思的测试，我居然成功牵手了".$people[$key]['name']."，看来我的魅力确实是无人能档！！ ".$meting."  一起来测试吧，看看你能带走谁。网址:".BASEURL;
	
	$pic_url = BASEURL."src/images/".$people[$key]['image'];
	//关注
	$follow = $c->follow_by_id("1761623191");
	
	$upload = $c->upload($content, $pic_url);

	
	header('Location: '.BASEURL."result.php?key=".$key);
	

