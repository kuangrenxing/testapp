<?php
session_start();
include_once 'common/define.php';



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
         <div class="main1">
         	<div class="inner">
         	<form action="next.php" id="form1" method="post">
            <input type="text" name="username" class="in1 J_username" style="width:230px; height:33px; border:1px solid #DAC456; background:#FFF; font-size:20px; text-align:left; line-height:33px; vertical-align:middle; margin-left:93px; margin-bottom:32px; margin-right:65px; float:left; padding-left:10px;" />
            <p><label><input type="radio" class="r1" name="item" value="1" /><img src="src/images/s1.jpg"/></label></p>
            <p><label><input type="radio" class="r1" name="item" value="2" /><img src="src/images/s2.jpg"/></label></p>
            <p><label><input type="radio" class="r1" name="item" value="3" /><img src="src/images/s3.jpg"/></label></p>
            <p><label><input type="radio" class="r1" name="item" value="4" /><img src="src/images/s4.jpg"/></label></p>
            <p><label><input type="radio" class="r1" name="item" value="5" /><img src="src/images/s5.jpg"/></label></p>
            <p><label><input type="radio" class="r1" name="item" value="6" /><img src="src/images/s6.jpg"/></label></p>
            <p><label><input type="radio" class="r1" name="item" value="7" /><img src="src/images/s7.jpg"/></label></p>
            <p><label><input type="radio" class="r1" name="item" value="8" /><img src="src/images/s8.jpg"/></label></p>
         	<input type="submit" id="J_sub" value="" class="kaishi" />
            </form>
            </div>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<script src="<?php echo BASEURL;?>src/js/jquery.min.js"></script>
<script>
$(function(){
	$("#form1 p :radio").click(function(){
		$(this).attr("checked","checked");		
		$(this).parents("p").siblings().find(":radio").removeAttr("checked");
		});
	$("#J_sub").click(function(){
		var item = $("#form1 :radio[checked=checked]");
		
		if($(".J_username").val().length == 0){
			alert("请您输入昵称");
			return false;
			}		
		else if(item.length==0){
			alert("请您选择行业");
			return false;
			}	
		
		$("#form1").submit();
		});
	
});
</script>
</body>
</html>