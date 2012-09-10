<?php
header("content-type:text/html;charset=utf-8;");


require_once("../qq/comm/config.php");
include_once './functions.php';
//图片在该应用的路径
$hourPath='src/images';
//本应用url
$baseUrl='http://testapp.dev/youthroad_qqconnect';


echo $name = $_GET['name'];
exit;
$beforeContent = "《北京青年》最近可火了，自从被青春撞了一下腰之后就隐隐作痛，你是否也想重走青春路？我刚才参加了一个很好玩的测试，如果想重走青春路，";
$afterContent = "想知道你要怎么重走青春路吗，一起来测测吧";

$result_content=array(
		0=>array(				
				'content'=>"一起在高中教室里吃着火锅唱着歌",				
				'weiboimage'=>'content_07.jpg',				
		),	
		1=>array(				
				'content'=>'钓鱼岛狂跳最炫民族风，呼唤标哥一起来 ',				
				'weiboimage'=>'satuation1.jpg',				
		),
		2=>array(			
				'content'=>'一起在高中班长面前放个屁',				
				'weiboimage'=>'satuation2.jpg',				
		),	
		3=>array(				
				'content'=>'一起去荒野求生，吃虫子，喝河水',				
				'weiboimage'=>'satuation3.jpg',				
		),
		4=>array(				
				'content'=>'一起回到母校，把画好的黑板报擦掉嫁祸给别人',				
				'weiboimage'=>'satuation7.jpg',				
		),
		5=>array(				
				'content'=>'化身美少女战士，代表月亮消灭班里的恶势力 ',				
				'weiboimage'=>'satuation4.jpg',				
		),
		6=>array(				
				'content'=>'一起回到小学二年级，上课的时候光明正大的涂口红',				
				'weiboimage'=>'satuation5.jpg',				
		),
		7=>array(				
				'content'=>'一起回到婴儿时期，啃自己的脚趾',				
				'weiboimage'=>'satuation6.jpg',				
		),		
);




//随机得到下标
$a=array_rand($result_content,1);
//得到内容
$textcontent=$result_content[$a]['content'];
//得到标题
// $newTitle=$result_content[$a]['title'];
//得到图片
$imageFile=$result_content[$a]['weiboimage'];


$result=array(
		"access_token" => $_SESSION["access_token"],
		"appid" => $_SESSION["appid"],
		"openid" => $_SESSION["openid"],
		'title' => '【《北京青年》测测】'."就和".$result_content[$a]['content']."就可以重走青春路！",
		'url' => $baseUrl,
		'comment' => $beforeContent."就和".$result_content[$a]['content'].$afterContent,
		'summary' => '一部《北京青年》看得观众热血澎湃，剧中何家四兄弟“重走青春路”， 作为何家四兄弟的爱人，都纷纷追随。回想青春，你是否也留有遗憾，想要重走青春路？想知道要做什么才能重走青春路吗？马上就来测测吧。',
		'images' => $baseUrl.'/'.$hourPath.'/'.$imageFile
);



$arr = array();
$arr = add_share($result);
$aResult = json_decode($arr,true);
if($aResult["ret"] != '0'){
	$result1 = array(
			"access_token" => $_SESSION["access_token"],
			"appid" => $_SESSION["appid"],
			"openid" => $_SESSION["openid"],
			'con' => '【《爱情公寓3》测测剧中那位人物和你心心相惜】'.$_SESSION["username"].'你在爱情公寓3里面的人物是'.$result_content[$a]['title'].' 快来邀请你QQ空间的好友看她会像哪位人物!'.$result_content[$a]['content'],
			'img' => $baseUrl.'/'.$hourPath.'/'.$imageFile,
			'third_source'=>1
	);
	sendshuoshuo($result1);
	$content = '【《爱情公寓3》测测剧中那位人物和你心心相惜】'.$_SESSION["username"].'你在爱情公寓3里面的人物是'.$result_content[$a]['title'].' 快来邀请你QQ微博中的好友粉丝看她会像哪位人物!';
	$pic = $baseUrl."/".$hourPath."/".$imageFile;
	$sUrl = "https://graph.qq.com/t/add_pic_t";
	$aPOSTParam = array(
			"access_token" => $_SESSION["access_token"],
			"oauth_consumer_key" => $_SESSION["appid"],
			"openid" => $_SESSION["openid"],
			"format" => "json",
			"content" => $content,
			"clientip" => getClientIP(),
			"syncflag" => "0"
	);
	preg_match("/.*\.(.*?)$/i",$pic,$aTemp);//$aTemp不明白
	$sFile = date("YmdHis").".".$aTemp[1];
	if(download($pic,$sFile)){
		$aFileParam = array(
				"pic" => dirname(__FILE__)."/".$sFile
		);
	}
	$arr_w = upload_add_weibo($sUrl,$aPOSTParam,$aFileParam);
}
header('Location:'.$baseUrl.'/guanzhu.php?access='.$a);
?>













