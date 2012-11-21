<?php
require_once("../comm/config.php");
require_once("../comm/utils.php");

if(isset($_REQUEST["title"]) == false)
{
	echo "分享无标题";
	exit;
}
if(isset($_REQUEST["url"]) == false)
{
	echo "分享无url";
	exit;
}
if(isset($_REQUEST["comment"]) == false)
{
	echo "分享无comment";
	exit;
}
if(isset($_REQUEST["summary"]) == false)
{
	echo "分享无summary";
	exit;
}
if(isset($_REQUEST["images"]) == false)
{
	echo "分享无images";
	exit;
}
if(isset($_REQUEST["nexturl"]) == false)
{
	echo "分享无后不知道应该到哪个页面了";
	exit;
}



function add_share()
{
    //发布一条动态的接口地址, 不要更改!!
    $url = "https://graph.qq.com/share/add_share?"
        ."access_token=".$_SESSION["access_token"]
        ."&oauth_consumer_key=".$_SESSION["appid"]
        ."&openid=".$_SESSION["openid"]
        ."&format=json"
        ."&title=".urlencode($_REQUEST["title"])
        ."&url=".urlencode($_REQUEST["url"])
        ."&comment=".urlencode($_REQUEST["comment"])
        ."&summary=".urlencode($_REQUEST["summary"])
        ."&images=".urlencode($_REQUEST["images"]);   

    $ret = get_url_contents($url);
}

//接口调用示例：
$ret = add_share();


header("Location: ".$_REQUEST["nexturl"]);
exit;

?>
