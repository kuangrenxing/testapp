<?php
header("content-type:text/html;charset=utf-8;");
session_start();

include_once 'common/define.php';

//下一页面文件
$nextFile = "choice.php";
//授权url
$code_url = APIURL."?url=".BASEURL.$nextFile."&type=".WB_APP_CONN_WEIFUSHI;
?>




<?php echo $code_url;?>

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
         <div class="main1">
         		<a href="next1.php" class="start_button"><img src="src/images/start.jpg"/></a>     
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>
        