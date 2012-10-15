<?php 
include_once 'common/define.php';
session_start();
$_SESSION['two'] = $_GET['two'];
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
         	<p class="p3">3.你认为中方最应该采用什么手段反制日本？</p>
            <div class="item3">
            	<a href="choice4.php?three=a" class="item3_a d1"></a>
                <a href="choice4.php?three=b" class="item3_b d1"></a>
                <a href="choice4.php?three=c" class="item3_c d1"></a>
                <a href="choice4.php?three=d" class="item3_d d1"></a>
            </div>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>