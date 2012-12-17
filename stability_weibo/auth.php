<?php
include_once 'common/define.php';
session_start();
if(isset($_GET['chose5']))
{
	$_SESSION['chose5'] = $_GET['chose5'];
}
else
{
	header("location: ".BASEURL);
	exit;
}
$code_url = $_SESSION['code_url'];

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
         <div class="main3">
         	     <span  class="score  J_random">100</span>
                 <a href="<?php echo $code_url;?>" class="shareto"><img src="src/images/sina_check.jpg"/></a>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<script src="src/js/jquery.min.js"></script>
<script>
$(function(){
	var delay = 90;
	function randomVal(){
		var n = 100;
		var m = 1;
		var ret = Math.floor(Math.random()*n)+m;
		$(".J_random").text(ret);

		setTimeout(arguments.callee, delay);
	}
	setTimeout(randomVal, delay);	
});
</script>
</body>
</html>