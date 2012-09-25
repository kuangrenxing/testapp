<?php
header("content-type:text/html;charset=utf-8;");
//打开session
session_start();

include_once 'common/define.php';
include_once 'common/config.php';
include_once 'class/saetv2.ex.class.php';

if(isset($_GET['content']) == false)
{
	echo "发微博内容不能为空";
	exit;
}
if(isset($_GET['nexturl']) == false)
{
	echo "发完微博不知道应该到哪个页面了。";
	exit;
}

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );

	$uid_get = $c->get_uid();
	$uid = $uid_get['uid'];
	
	//关注
	$follow = $c->follow_by_id("1761623191");

	
	$content = "";
	// 发微博	
	$content = $_GET['content'];
		
	if(isset($_GET['pic_url']))
	{
		$pic_url = $_GET['pic_url'];
	}
	else 
		$pic_url = "";		
	
	$upload = $c->upload($content, $pic_url);


	header('Location: '.$_GET['nexturl']);
	exit;
	

