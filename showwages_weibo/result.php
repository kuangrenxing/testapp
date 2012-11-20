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

</head>
 
<body id="ztBodyBg">
<div id="ztcontainer">
<div id="J_loading">正在发送微博……</div>
<div id="J_cuccess">发送微博成功!</div>
<div id="J_lose">发送微博失败!</div>
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
                        <input type="button" class="J_share" style="background:url(src/images/133x31.jpg) no-repeat; width:133px; height:31px; border:none; display:block; float:left; margin-top:6px; cursor:pointer;" value="" />
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

		//ajax发微博
		$(".J_share").click(function(){
			$.ajax({
				url:"<?php echo APIURL;?>weiboajax.php",
				type:"POST",
				data:{content:$('.J_content').val(),pic_url:"<?php echo BASEURL."src/images/".$image;?>"},
				beforeSend:function (XMLHttpRequest) {
				    //this; // 调用本次AJAX请求时传递的options参数
				    $("#J_loading").show();
				},
				complete:function (XMLHttpRequest, textStatus) {					
					setTimeout("$('#J_lose').hide();$('#J_cuccess').hide();",2000);
					window.location.href="http://www.tuolar.com";
				},
				success:function(data, textStatus){					
					var result = eval('(' + data + ')');
					if(typeof result['error'] == "undefined"){//发微博成功
						$("#J_loading").hide();
						$("#J_cuccess").show();
					}else{//发微博失败
						$("#J_loading").hide();
						$("#J_lose").show();
						
						}
						
					}	
				});
			
			});
		
});
</script>


</body>
</html>