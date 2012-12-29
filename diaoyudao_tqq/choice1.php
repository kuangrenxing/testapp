<?php 
include_once 'common/define.php';
header("content-type:text/html;charset=utf-8");

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
         <div class="main2">
         	<p class="p1">1.你愿意为收回钓鱼岛浮出什么样的代价？</p>
            <div class="item1">
            	<a href="choice2.php?one=a" class="item1_a d1"></a>
                <a href="choice2.php?one=b" class="item1_b d1"></a>
                <a href="choice2.php?one=c" class="item1_c d1"></a>
                <a href="choice2.php?one=d" class="item1_d d1"></a>
            </div>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>