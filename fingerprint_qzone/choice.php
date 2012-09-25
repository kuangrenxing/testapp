<?php 
include 'common/config.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $appTitle;?></title>
<link href="src/css/style.css" rel="stylesheet" type="text/css" />

</head>
 
<body id="ztBodyBg">
<div id="ztcontainer">
    <div id="ztcontent">
        <div class="BG1">
        	<div class="head">
            	<div class="head1 left">
                	<a href="http://www.tuolar.com" class="logo"><img title="拖拉网" src="src/images/img_start_03.jpg"/></a>
                    <img title="" class="s1" src="src/images/img_start_06.jpg"/>
                </div>
                <div class="head2 ">
                	<img src="src/images/finger_03.jpg" title="指纹测试"/>
                </div>
            </div>
            <div class="content_3">
            	<div class="d2">
                	<div class="d3 left">
                            <a href="">0</a>
                            <a href="">1</a>
                            <a href="">2</a>
                            <a href="">3</a>
                            <a href="">4</a>
                            <a href="">5</a>
                     </div>
                    <div class="d3 right">
                    	<div class="d3 left">
                            <a href="">0</a>
                            <a href="">1</a>
                            <a href="">2</a>
                            <a href="">3</a>
                            <a href="">4</a>
                            <a href="">5</a>
                        </div>
                    </div>
                </div>
                
                <a class="result" href="guanzhu.php"><img src="src/images/finger2_10.jpg" title="查看结果"/></a>
            </div>
        </div>            
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<style>
a.addbgimage{
	background-image:url(./src/images/img.jpg);
}
</style>
<script src="src/js/jquery-1.8.2.min.js"></script>
<script>
$(function(){
	$(".d3 a").click(function(){		
		$(this).addClass("addbgimage").siblings().removeClass("addbgimage");
		return false;
	});

	$(".result").click(function(){
		if($(".d2>.left a").hasClass("addbgimage")){
			var left = $(".d2>.left a[class='addbgimage']").text();
			
			if($(".d2>.right>.left a").hasClass("addbgimage")){	
				var right = $(".d2>.right>.left a[class='addbgimage']").text();				
				window.location.href="guanzhu.php?left="+left+"&right="+right;
			}else{
				alert("请选择右手螺数");
			}
			
		}else{
			alert("请选择左手螺数");
		}
		
		return false;			
	});
});
</script>
</body>
</html>