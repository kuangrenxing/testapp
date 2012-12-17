<?php
include_once 'common/define.php';
session_start();

if(isset($_SESSION['result']) == false || isset($_SESSION['count']) == false){
	header("location: ".BASEURL);
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
         <div class="main4">
         	    <img class="result_img" src="src/images/<?php echo $_SESSION['result']['retimg'];?>"/> 
                <p class="zhishu">
                		<span class="zhishu_title">安定指数：<?php echo $_SESSION['count'];?></span>
                		<span class="zhishu_content"><?php echo $_SESSION['result']['content'];?></span>
                </p>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>