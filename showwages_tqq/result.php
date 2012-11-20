<?php
header("content-type:text/html;charset=utf-8");
session_start();
include_once 'common/define.php';

if($_SESSION['money'] == false || $_SESSION['ka']==false || $_SESSION['username']==false)
{
	header("Location: ".BASEURL);
	exit;
}
$money = $_SESSION['money'];
$ka = $_SESSION['ka'];
$username = $_SESSION['username'];

$description = "";
$content = "";
$image = "";
$card = '';

$extract = rand(100,1000);
if($ka == "1")//穷神卡片
{
	$image = "result4.jpg";
	$card = "card4.jpg";
	$description = "$username 对你说：   禽兽。。。 放开那money";
	$content = "刚刚发现一个超好玩的测试，测得@".$username." 的工资是".$money." ，不过我'丧心病狂'的使用了一张穷神卡片收取了他".$extract."块。大家都来测试吧，一起“劫富济贫”，网址";
}
elseif ($ka == "2")//财神卡
{
	$image = "result1.jpg";
	$card = "card1.jpg";
	$description = $username."对你说：  你真是个好人！！ 我会好好报答你的";
	if($money<2000)
	{
		$content = "刚刚发现一个超好玩的测试，测得@".$username." 的工资是".$money." ，不过本人很有爱心的对他使用了一张财神卡送了他".$extract."块，大家都来帮帮他吧。赶快来测试吧，一起“劫富济贫”，网址";
	}
	else
	{
		$content = "刚刚发现一个超好玩的测试，测得@".$username." 的工资是".$money." ，不过我的工资比他高多了，很有爱心的对他使用了一张财神卡送了他".$extract."块。赶快来测试吧，一起“劫富济贫”，网址";
	}
	
}
elseif($ka == "3")//查税卡
{
	$image = "result2.jpg";
	$card = "card2.jpg";
	$description = $username."对你说：  小心点！！ 我盯上你了";
	$content = "刚刚发现一个超好玩的测试，测得@".$username." 的工资是 ".$money." ，不过我发现他竟然木有交税！！于是我毫不留情得对他使用了查税卡。赶快来测试吧，一起'劫富济贫'，网址";
}
elseif($ka == "4")//抢夺卡
{
	$image = "result3.jpg";
	$card = "card3.jpg";
	
	$description = $username."对你说：  这年头，赚点钱容易吗我，光天化日的被抢了。";
	if($money<2000)
	{
		$content = "刚刚发现一个超好玩的测试，测得@".$username." 的工资是".$money." ，我竟然丧心病狂得对他使用了抢夺卡，抢占了他10%的薪水，好心人来帮帮他吧。赶快来测试吧，一起“劫富济贫”，网址";
	}
	else
	{
		$content = "刚刚发现一个超好玩的测试，测得@".$username." 的工资是".$money." ，竟然这么高，我对他使用了一张抢夺卡，抢占了他10%的薪水，大家都来抢啊。赶快来测试吧，一起“劫富济贫”，网址";
	}	
}

$content.=BASEURL;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo TITLE;?></title>
<link href="src/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8"    src="http://fusion.qq.com/fusion_loader?appid=<?php echo "100648214";?>&platform=qzone"></script>
</head>
 
<body id="ztBodyBg">
<div id="ztcontainer">
    <div id="ztcontent">
    	<div class="box1">
         <div class="haed">
         	<div class="head_logo left"><a class="logo" title="拖拉网" href="http://www.tuolar.com"></a><div class="fashion_more"></div></div>
            <div class="sign right"></div>
         </div>  
         <!--测试题出题部分-->
         <div class="main3">
         	<div class="inner">
            	<div class="d1 left">
                	<img src="src/images/<?php echo $card;?>" title=""/>
                    <p class="p2"><?php echo $description;?></p>
                </div>
                <div class="d2 right">
                	<p class="p3">那结果分享到腾讯微博：</p>
                    <form action="#" name="" id="form1" method="post">
                    	<textarea class="dd J_content"  /><?php echo $content;?></textarea>
                        <input type="button" class="J_share" style="background:url(src/images/133x31_2.png) no-repeat; width:133px; height:31px; border:none; display:block; float:left; margin-top:6px; cursor:pointer;" value="" />
                        <p class="p4">还可以输入<span id="J_keycount">50</span>个字</p>
                    </form>
                </div>
                <a class="a2" href="<?php echo BASEURL;?>"><img src="src/images/161x46.jpg"/></a>
                <a class="a3" href="http://www.tuolar.com"><img src="src/images/172x47.jpg"/></a>
            </div>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<script src="<?php echo BASEURL;?>src/js/jquery.min.js"></script>
<script>
$(function(){
	

		$(".J_content").keyup(function(){
			var content = $(".J_content").val();
			
			var conCount = content.length;
			var count = 140; //总字数
			if(conCount >= count)
			{
				var newCont = content.substring(0,count);
				$(".J_content").val(newCont);
			}
			//重新计算
			var content = $(".J_content").val();
			var conCount = content.length;
			$("#J_keycount").text(count-conCount);
			
			});

		$(".J_content").trigger("keyup");
	


	
	$(".J_share").click(function(){
		
		fusion2.dialog.share
		({
		  // 可选。默认展示在分享弹框的输入框里的分享理由，建议传入，而且分享理由要简短而有吸引力
		  desc:$(".J_content").val(),

		  // 必须。应用简要描述。
		  summary :"测一测工资有多少",

		  // 必须。分享的标题。
		  title :"晒工资",
		  

		  // 可选。图片的URL。建议为应用的图标或者与分享相关的主题图片，规格为120*120 px
		  // hosting应用要求将图片存放在APP域名下或腾讯CDN
		  // non-hosting应用要求将图片上传到该应用开发者QQ号对应的QQ空间加密相册中。 
		  // 即non-hosting应用图片域名必须为：qq.com、pengyou.com、qzoneapp.com、qqopenapp.com、tqapp.cn。
		  pics :"<?php echo BASEURL."src/images/".$image;?>",

		  // 可选。透传参数，用于onSuccess回调时传入的参数，用于识别请求。
		  context:"share",

		  // 可选。用户操作后的回调方法。
		  onSuccess : function (opt) { 
		 
			  window.location.href="http://www.tuolar.com";
	  	  },

		  // 可选。用户取消操作后的回调方法。
		  onCancel : function (opt) {  },

		  // 可选。对话框关闭时的回调方法。
		  onClose : function () {  
					

			  }

		});
		
		return false;
	});
	






	
});


</script>

</body>
</html>