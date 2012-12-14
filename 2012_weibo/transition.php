<?php
header("content-type:text/html;charset=utf-8;");
include_once 'common/define.php';
session_start();

if(isset($_SESSION['t_access_token']) == false)
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
         <div class="main3">
					<div class="dd">
                    	<div class="user_img">
                        		<img src="<?php echo $_SESSION['userinfo']['head'].'/120';?>"/>
                                <p><?php echo $_SESSION['userinfo']['nick'];?></p>
                        </div>
                    	<!-- <a class="check_result_sina" href=""></a> -->
                        <a href="result.php" class="check_result_qqweibo" href=""></a> 
                        <!-- <a href="result.php" class="check_result_qqzone" href=""></a> -->
                    </div>
                      
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright &copy Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>