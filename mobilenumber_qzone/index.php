<?php
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
         			<p class="introduce">号码就像姓名、风水会影响运势命运的意义是一样的。虽然这只是一个号码，但是它与您的生活息息相关，也是您与很多人沟通的桥梁！所以『吉』与『凶』关系非常大，的确不可轻忽！</p>
                    <div class="inputID"><form action="next.php" method="post">
                    	<input type="text" name="number" class="input J_number">
                    	<input type="submit" name="submit" class="submit J_sub" value=" "> 
                    </form></div>
                    
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<script src="src/js/jquery-1.8.2.min.js"></script>
<script>
$(function(){
	$(".J_sub").click(function(){
		var number = $(".J_number").val();
		if(number.length==0){
			alert("请输入手机号码");
			return false;
			}
		else if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(number))){
			alert("请输入正确的手机号码");
			return false;
			}
		});	
});
</script>
</body>
</html>