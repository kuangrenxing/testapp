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
         <!--测试题出题部分-->
         <div class="main2">
         	<p class="diaosi1">下面屌丝十个特征中  你中了几枪？</p>
            <form action="weibo.php" id="" method="post" >
            <p class="question"><label><input type="checkbox" name="ck6" class="bingo" /><span><i class="i1">6.</i><i class="i2"> 讨厌别人用照相机照自己。 </i></span></label></p>
            <p class="question"><label><input type="checkbox" name="ck7" class="bingo" /><span><i class="i1">7.</i><i class="i2">看见美女就脸红。</i></span></label></p>
            <p class="question"><label><input type="checkbox" name="ck8" class="bingo" /><span><i class="i1">8.</i> <i class="i2">喜欢看小说，特别是YY小说休闲小说。经常把自己幻想成小说或者电影里的英雄，身边木耳环绕。</i>   </span></label></p>
            <p class="question"><label><input type="checkbox" name="ck9" class="bingo" /><span><i class="i1">9.</i><i class="i2">不敢进入高档的美发屋和装修华丽的餐厅。</i></span></label></p>
            <p class="question"><label><input type="checkbox" name="ck10" class="bingo" /><span><i class="i1">10.</i><i class="i2">坐位置一定要选在后面，迟到了总想从后门进。</i></span></label></p>
            
            <input type="submit" class="jixu" value="" />
            </form>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
</body>
</html>