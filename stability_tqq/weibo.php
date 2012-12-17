<?php
header("content-type:text/html;charset=utf-8;");
include 'common/define.php';


session_start();

if(isset($_SESSION['idollist']) == false)
{
	//得到我收听的人列表保存$_SESSION['idollist']
	$getidolisturl = APIURL."idollist.php?baseurl=".BASEURL."&nexturl=weibo.php";
	header("location: ".$getidolisturl);
	exit;
}
$idollist = $_SESSION['idollist']['data']['info'];
$idollistKey = array_rand($idollist,3);

$meting = "";
foreach($idollistKey as $i=>$v)
{
	$meting .= " @".$idollist[$v]['name'];
}

//必要的参数
if(isset($_SESSION['chose1']) == false || isset($_SESSION['chose5']) == false)
{
	header("location: ".BASEURL);
	exit;
}
$chose1 = 0;
$chose2 = 0;
$chose3 = 0;
$chose4 = 0;

switch ($_SESSION['chose1'])
{
	case 1: $chose1 = 4;break;
	case 2: $chose1 = 3;break;
	case 3: $chose1 = 2;break;
	case 4: $chose1 = 1;break;
	default:$chose1 = 0;
}

switch ($_SESSION['chose2'])
{
	case 1: $chose2 = 4;break;
	case 2: $chose2 = 3;break;
	case 3: $chose2 = 2;break;
	case 4: $chose2 = 1;break;
	default:$chose2 = 0;
}

switch ($_SESSION['chose3'])
{
	case 1: $chose3 = 4;break;
	case 2: $chose3 = 3;break;
	case 3: $chose3 = 2;break;
	case 4: $chose3 = 1;break;
	default:$chose3 = 0;
}

switch ($_SESSION['chose4'])
{
	case 1: $chose4 = 4;break;
	case 2: $chose4 = 3;break;
	case 3: $chose4 = 2;break;
	case 4: $chose4 = 1;break;
	default:$chose4 = 0;
}

switch ($_SESSION['chose5'])
{
	case 1: $chose5 = 4;break;
	case 2: $chose5 = 3;break;
	case 3: $chose5 = 2;break;
	case 4: $chose5 = 1;break;
	default:$chose5 = 0;
}

$count = ($chose1 + $chose2 + $chose3 + $chose4 + $chose5)*5 + rand(-5, 5);



if($count > 89){
	$result = array(
			'content' => "您的生活太安定了，我都不知道说什么好，不知道元芳兄怎么看分享图片：元芳图片+“靠，I服了U”",
			'image' => "ret1.jpg",
			'retimg' => 'result_img1.jpg',
	);
}elseif ($count > 60){
	$result = array(
			'content' => "您的生活中安定与新鲜刺激并存，这是最适合年轻人的生活了。",
			'image' => "ret2.jpg",
			'retimg' => 'result_img2.jpg',
	);
}elseif ($count > 40){
	$result = array(
			'content' => "安定暂时与你无缘，努力吧少年。",
			'image' => "ret3.jpg",
			'retimg' => 'result_img3.jpg',
	);
}else {
	$result = array(
			'content' => "你的生活如此漂泊不定，流浪歌才是你的主题曲吧",
			'image' => "ret4.jpg",
			'retimg' => "result_img4.jpg",
	);
}

//微博内容
$content = "【安定指数】这年头在城市想有个安定的生活可不是件容易的事，来测一测你的安定指数吧。".$meting.' '.BASEURL;

$pic_url = BASEURL."src/images/".$result['image'];
//下一页面 可不用加http:// 则会自动加BASEURL
$nexturl = "result.php";


$_SESSION['count'] = $count;
$_SESSION['result'] = $result;

		
$url = APIURL."weibo.php?baseurl=".BASEURL."&content=$content&pic_url=$pic_url&nexturl=$nexturl";
header("location: ".$url);
exit;






