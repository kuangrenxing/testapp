<?php 
include_once 'common/define.php';
include_once 'common/config.php';
session_start();

if(isset($_SESSION['one']) == false || isset($_SESSION['two']) == false || isset($_SESSION['three']) == false)
{
	header("Location: ".BASEURL);
	exit;
}
$one = $_SESSION['one'];
$two = $_SESSION['two'];
$three = $_SESSION['three'];

$content = "";
$image = "";
if($one == "a" && $three == "a")
{
	$content = $result['0']['content'];
	$image = $result['0']['image'];
}
elseif ($one == "a" && $three == "b")
{
	$content = $result['1']['content'];
	$image = $result['1']['image'];
}
elseif ($one == "a" && $three == "c")
{
	$content = $result['2']['content'];
	$image = $result['2']['image'];
}
elseif ($one == "a" && $three == "d")
{
	$content = $result['3']['content'];
	$image = $result['3']['image'];
}
elseif ($one == "b" && $three == "a")
{
	$content = $result['4']['content'];
	$image = $result['4']['image'];
}
elseif ($two == "b" && $three == "b")
{
	$content = $result['5']['content'];
	$image = $result['5']['image'];
}
elseif ($two == "b" && $three == "c")
{
	$content = $result['6']['content'];
	$image = $result['6']['image'];
}
elseif ($two == "b" && $three == "d")
{
	$content = $result['7']['content'];
	$image = $result['7']['image'];
}
elseif ($one == "c")
{
	$content = $result['8']['content'];
	$image = $result['8']['image'];
}
elseif ($one == "d")
{
	$content = $result['9']['content'];
	$image = $result['9']['image'];
}

$_SESSION['image'] = $image;


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
    <div id="ztcontent">
    	<div class="box1">
         <div class="haed">
         	<div class="head_logo left"><a class="logo" title="拖拉网" href="http://www.tuolar.com"></a><div class="fashion_more"></div></div>
            <div class="sign right"></div>
         </div>  
         <!--测试题出题部分-->
         <div class="main4">
         	<div class="share">
            	<div class="share_up">
                	<img src="src/images/<?php echo $image;?>"/>
                    <div class="share_detail right">
                    	<p class="p5"><span>把结果分享到QQ：</span><a href="<?php echo BASEURL;?>">重新测试</a></p>
                        <textarea   class="yijian J_content" style="resize: none;height:92px; overflow-y:scroll; width:222px; vertical-align: top; text-align:left; line-height:13px; margin-top:10px; font-size:13px;" /><?php echo $content.BASEURL;?>（网址）</textarea>
                        <p class="p6">还可以输入<span id="J_keycount">50</span>个字符</p>
                        <a href="<?php echo BASEURL.'weibo.php'?>" class="kankan J_kankan"><img src="src/images/110x30.jpg"/></a>
                    </div>
                </div>
                <p class="p7"><?php echo $content;?></p>
            </div>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>
$(function(){
	$(".J_kankan").click(function(){
		var content = $(".J_content").val();
		location.href="<?php echo BASEURL.'weibo.php'?>?content="+content;
		return false;
		});
	$(".J_content").keyup(function(){
		var content = $(".J_content").val();
		
		var conCount = content.length;
		var count = 130; //总字数
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
});
</script>
</body>
</html>