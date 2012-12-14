<?php
include_once 'common/define.php';
session_start();
if(isset($_GET['chose3']))
{
	$_SESSION['chose3'] = $_GET['chose3'];
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
                 	<p>问题4：工作以后，搬过几次家？</p>
                    <div class="process">
                    	<img style="margin-top:26px;" src="src/images/bar4.jpg"/>
                        <a href=""><img style="margin-top:24px; margin-left:3px;" src="src/images/return.jpg"/></a>
                        <span class="d4">4/5题</span>
                    </div>
                 </div>	
                 
                 <div class="question_content">
                 		<form action="next5.php" method="get">
                        	<p><input id="ck13" name="chose4" type="radio" /><label for="ck13">&nbsp; A &nbsp; 一个</label></p>
                        	<p><input id="ck14" name="chose4" type="radio" /><label for="ck14">&nbsp; B &nbsp; 两个</label></p>
                            <p><input id="ck15" name="chose4" type="radio" /><label for="ck15">&nbsp; C &nbsp; 三个</label></p>
                            <p><input id="ck16" name="chose4" type="radio" /><label for="ck16">&nbsp; D &nbsp; 四个以上</label></p>
                 		</form>
                 </div>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>