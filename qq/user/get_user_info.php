<?php
require_once("../comm/config.php");
require_once("../comm/utils.php");


function get_user_info()
{
    $get_user_info = "https://graph.qq.com/user/get_user_info?"
        . "access_token=" . $_SESSION['access_token']
        . "&oauth_consumer_key=" . $_SESSION["appid"]
        . "&openid=" . $_SESSION["openid"]
        . "&format=json";

    $info = get_url_contents($get_user_info);
    
    $arr = json_decode($info, true);

    return $arr;
}

//print_r($_SESSION);
//email		qz_	$_SESSION["openid"] @qq.com
//获取用户基本资料
$userinfo = get_user_info();

$openid = $_SESSION["openid"];
$nickname = $userinfo["nickname"];
$headimg = $userinfo['figureurl_2']."/.jpg";
$gender = $userinfo["gender"] == "男" ? 1 : 2;

header('Location:http://apptest.tuolar.com/qq/qq/user3.php?openid='.rawurlencode($openid)."&gender=".rawurlencode($gender)."&nickname=".rawurlencode($nickname)."&headimg=".rawurlencode($headimg));

?>
