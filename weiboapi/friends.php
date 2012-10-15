<?php
/*
 * 获得用户好友列表
 */

header("content-type:text/html;charset=utf-8;");
//打开session
session_start();

include_once 'common/define.php';
include_once 'common/config.php';
include_once 'class/saetv2.ex.class.php';

if(isset($_GET['nexturl']) == false)
{
	echo "得到好友列表后，我应该到哪里去呢？郁闷……你可以告诉我吗？";
	exit;
}


$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );

$uid_get = $c->get_uid();
$uid = $uid_get['uid'];
$friends = $c->friends_by_id($uid);

$_SESSION['friends'] = $friends;

header("Location: ".$_GET['nexturl']);
exit;
	