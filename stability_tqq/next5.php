<?php
include_once 'common/define.php';
session_start();
if(isset($_GET['chose4']))
{
	$_SESSION['chose4'] = $_GET['chose4'];
}
else
{
	header("location: ".BASEURL);
	exit;
}
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
                 	<p>问题5：从开始工作算起，你总共呆过几个城市？</p>
                    <div class="process">
                    	<img style="margin-top:26px;" src="src/images/bar5.jpg"/>
                        <a class="J_back" href=""><img style="margin-top:24px; margin-left:3px;" src="src/images/return.jpg"/></a>
                        <span class="d5">5/5题</span>
                    </div>
                 </div>	
                 
                 <div class="question_content">
                 		<form id="form1" action="auth.php" method="get">
                        	<p><input id="ck17" value="1" name="chose5" type="radio" /><label for="ck17">&nbsp; A &nbsp; 一年以上</label></p>
                        	<p><input id="ck18" value="2" name="chose5" type="radio" /><label for="ck18">&nbsp; B &nbsp; 半年</label></p>
                            <p><input id="ck19" value="3" name="chose5" type="radio" /><label for="ck19">&nbsp; C &nbsp; 三个月之内</label></p>
                            <p><input id="ck20" value="4"  name="chose5" type="radio" /><label for="ck20">&nbsp; D &nbsp; 一个月之内</label></p>
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