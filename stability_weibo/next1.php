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
         <!--测试题出题部分-->
         <div class="main2">
         	     <div class="question_title">
                 	<p>问题1：现在上班需要花费的时间？</p>
                    <div class="process">
                    	<img style="margin-top:26px;" src="src/images/bar1.jpg"/>
                        <img style="margin-top:24px; margin-left:3px;" src="src/images/return_false.jpg"/>
                        <span class="d1">1/5题</span>
                    </div>
                 </div>	
                 
                 <div class="question_content">
                 		<form id="form1" action="next2.php" method="get">
                        	<p><input id="ck" name="chose1" value="1" type="radio" /><label for="ck">&nbsp; A &nbsp; 半小时以内</label></p>
                        	<p><input  id="ck2" name="chose1" value="2" type="radio" /><label for="ck2">&nbsp; B &nbsp; 地铁一个小时以内</label></p>
                            <p><input id="ck3" name="chose1" value="3" type="radio" /><label for="ck3">&nbsp; C &nbsp; 公交换乘地铁一个小时以内</label></p>
                            <p><input id="ck4" name="chose1" value="4" type="radio" /><label for="ck4">&nbsp; D &nbsp; 公交或者地铁一个小时以上</label></p>
                 		</form>
                 </div>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<script src="src/js/jquery.min.js"></script>
<script src="src/js/formsub.js"></script>
</body>
</html>