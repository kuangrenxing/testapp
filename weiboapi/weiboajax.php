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
	
	//关注 tuolar.com
	$follow = $c->follow_by_id("1761623191");

	
	
	// 发微博内容	
	if(isset($_POST['content']))
		$content = $_POST['content'];
	elseif(isset($_GET['content']))
		$content = $_GET['content'];
	else
		$content = "";
	
	//发微博的图片	
	if(isset($_POST['pic_url']))
		$pic_url = $_POST['pic_url'];
	elseif(isset($_GET['pic_url']))
		$pic_url = $_GET['pic_url'];
	else
		$pic_url = "";
	
	// 发布有图片微博
	if(strlen($pic_url) != 0)
	{
		$upload = $c->upload($content, $pic_url);
	}
	//发布文字微博
	else
	{
		$upload = $c->update($content);
	}
	


	echo json_encode($upload);
	

