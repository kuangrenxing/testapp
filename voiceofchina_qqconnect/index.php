<?php
session_start();
$_SESSION["SFZ"] = "3200";
include_once 'common/define.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>中国好声音 - 应用小测试 - 拖拉网</title>
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
                	<img src="src/images/img_08.jpg" title="中国好声音"/>
                </div>
            </div>
            <div class="content">
            	<a class="start" href="javascript:void(0);" onclick="location_url();" ><img src="src/images/img_14.jpg"/></a>
            </div>
        </div>            
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<script language="javascript">
function location_url(){
	var url = "<?php echo BASEURL;?>";	
	var qqurl = "http://www.tuolar.com/apps/qq/qq/";	
	
	window.location.href= qqurl+"?url="+url+"song.php&type=324";		
	
}
</script>

</body>
</html>