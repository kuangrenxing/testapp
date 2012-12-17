<?php
include_once 'common/define.php';
session_start();
if(isset($_GET['chose2']))
{
	$_SESSION['chose2'] = $_GET['chose2'];
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
                 	<p>问题3：你总共换过几次工作？</p>
                    <div class="process">
                    	<img style="margin-top:26px;" src="src/images/bar3.jpg"/>
                        <a class="J_back" href=""><img style="margin-top:24px; margin-left:3px;" src="src/images/return.jpg"/></a>
                        <span class="d3">3/5题</span>
                    </div>
                 </div>	
                 
                 <div class="question_content">
                 		<form id="form1" action="next4.php" method="get">
                        	<p><input id="ck9" value="1"  name="chose3" type="radio" /><label for="ck9">&nbsp; A &nbsp; 0次</label></p>
                        	<p><input id="ck10" value="2"  name="chose3" type="radio" /><label for="ck10">&nbsp; B &nbsp; 1~2次</label></p>
                            <p><input id="ck11" value="3"  name="chose3" type="radio" /><label for="ck11">&nbsp; C &nbsp; 3~4次</label></p>
                            <p><input id="ck12"  value="4" name="chose3" type="radio" /><label for="ck12">&nbsp; D &nbsp; 5次以上</label></p>
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