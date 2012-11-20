<?php
session_start();
include_once 'common/define.php';
include_once 'common/config.php';

$nexturl = BASEURL."result.php";
$code_url = APIURL."authorization.php?afterurl=".$nexturl."&wb_app_conn_weifushi=".WB_APP_CONN_WEIFUSHI;

if($_POST['username'] == false || $_POST['item']==false)
{
	header("Location: ".BASEURL);
	exit;	
}
$username = $_POST['username'];
$item = $_POST['item'];

//工资数
$money = 0;
switch ($item)
{
	case "1" : $money = rand($category[$item]["0"], $category[$item]["1"]); break;
	case "2" : $money = rand($category[$item]["0"], $category[$item]["1"]); break;
	case "3" : $money = rand($category[$item]["0"], $category[$item]["1"]); break;
	case "4" : $money = rand($category[$item]["0"], $category[$item]["1"]); break;
	case "5" : $money = rand($category[$item]["0"], $category[$item]["1"]); break;
	case "6" : $money = rand($category[$item]["0"], $category[$item]["1"]); break;
	case "7" : $money = rand($category[$item]["0"], $category[$item]["1"]); break;
	case "8" : $money = rand($category[$item]["0"], $category[$item]["1"]); break;
	default:$money = rand(1000, 20000);
}
$_SESSION['money'] = $money;
$_SESSION['username'] = $username;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo TITLE;?></title>
<link href="src/css/style.css" rel="stylesheet" type="text/css" />
<style>
.hover{
	width: 94px;
	height: 133px;
	background: white;
	border: 4px solid #FFA800;
}
</style>
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
         <div class="main2 J_main">
         	<p class="p1"><span><?php echo $username;?></span>的工资是月薪<span><?php echo $money;?></span></p>
            <a class="a1" data-val="1" style="margin-top:78px; margin-left:77px;"><img src="src/images/card4.jpg"/></a>
            <a class="a1" data-val="2" style="margin-top:78px; margin-left:85px;"><img src="src/images/card1.jpg"/></a>
            <a class="a1" data-val="3" style="margin-top:78px; margin-left:85px;"><img src="src/images/card2.jpg"/></a>
            <a class="a1" data-val="4" style="margin-top:78px; margin-left:61px;"><img src="src/images/card3.jpg"/></a>

            <form action="next2.php" method="post" id="form1">
            	<input type="hidden" value="0" name="ka" id="J_ka" />
            	<input type="submit" value=""  id="J_submit" style="width:182px; height:52px; margin-left:294px; margin-top:56px; background:url(src/images/182x52_2.png) no-repeat; border:none; cursor:pointer;">
            </form>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script>
$(function(){
	$(".J_main a").click(function(){
		$(this).addClass("hover").siblings().removeClass("hover").stop();
		$("#J_ka").val($(this).attr("data-val"));
	});	
	$("#J_submit").click(function(){
		if($("#J_ka").val() == 0){
			alert("请选择一张卡片");
			return false;
			}
			
		});
});

</script>
</body>
</html>
