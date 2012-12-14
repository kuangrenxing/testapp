<?php
include_once 'common/define.php';
session_start();
if(isset($_GET['chose1']))
{
	$_SESSION['chose1'] = $_GET['chose1'];
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
                 	<p>问题2：从开始工作算起，你总共呆过几个城市？</p>
                    <div class="process">
                    	<img style="margin-top:26px;" src="src/images/bar2.jpg"/>
                        <a href=""><img style="margin-top:24px; margin-left:3px;" src="src/images/return.jpg"/></a>
                        <span class="d2">2/5题</span>
                    </div>
                 </div>	
                 
                 <div class="question_content">
                 		<form action="next3.php" method="get">
                        	<p><input id="ck5" name="chose2" type="radio" /><label for="ck5">&nbsp; A &nbsp; 一个</label></p>
                        	<p><input id="ck6" name="chose2" type="radio" /><label for="ck6">&nbsp; B &nbsp; 两个</label></p>
                            <p><input id="ck7" name="chose2" type="radio" /><label for="ck7">&nbsp; C &nbsp; 三个</label></p>
                            <p><input id="ck8" name="chose2" type="radio" /><label for="ck8">&nbsp; D &nbsp; 四个以上</label></p>
                 		</form>
                 </div>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>