<?php
session_start();
include_once 'common/define.php';

$qqurl = "http://www.tuolar.com/apps/qq/qq/";
$nextFile = "constellation.php";
$url = $qqurl."?url=".BASEURL.$nextFile;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>非诚勿扰-测试小应用-拖拉网</title>
<link href="src/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"> 
window.onload=function(){ 
for(var ii=0; ii<document.links.length; ii++) document.links[ii].onfocus=function(){this.blur()} 
} 
</script>
</head>
 
<body id="ztBodyBg">
<div id="ztcontainer">
    <div id="ztcontent">
        <div class="BG1">
        	<div class="head">
            	<div class="head1 left">
                	<a href="http://www.tuolar.com" class="logo"><img title="拖拉网" src="src/images/img_start_03.jpg"/></a>
                    <img title="" class="s1" src="src/images/img_start_06.jpg"/>
                </div>
                <div class="head2 ">
                	<img src="src/images/img_03.jpg" title="非诚勿扰"/>
                </div>
            </div>
            <div class="content">
            	<p class="p1">看《非诚勿扰》时，是否也曾经想过，假如在屏幕上的男嘉宾是你，你能否带走你的心动女生。赶快来测试吧。</p>
            	<a class="start" href="<?php echo $url;?>" ><img src="src/images/img_14.png"/></a>
            </div>
        </div>            
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>




</body>
</html>