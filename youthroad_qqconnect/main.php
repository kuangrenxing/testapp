<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
                	<a href="http://www.tuolar.com" class="logo"><img src="src/images/img_start_03.jpg"/></a>
                    <img class="s1" src="src/images/img_start_06.jpg"/>
                </div>
                <div class="head2 ">
                	<h1>重走青春路</h1>
                    <img class="s2" src="src/images/img_start_09.jpg"/>
                </div>
            </div>
            <div class="content">
            	<div class="d1">
                	<img class="m1" src="src/images/image_15.jpg"/>
                    <div class="d2">
                    	<p class="p1">输入你的微博昵称</p>
                        <form ><input id="search1" name="" class="name" style=" background:url(src/images/start2_03.jpg) no-repeat; width:251px; height:53px; margin-top:15px; margin-bottom:25px; background-position:100% 100%;  padding:0; border:0; font-size:30px;" type="text"></form>
                        <a style="margin-left:18px;" href="javascript:void(0);" onclick="location_url();" ><img src="src/images/image_18.jpg"/></a>
                    </div>
                </div>
            </div>
        </div>            
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>


<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script language="javascript">
function location_url(){
	var url = "http://testapp.dev/youthroad_qqconnect/";	
	var qqurl = "http://www.tuolar.com/apps/qq/qq/";
	//var qqurl = "http://testapp.dev/qq/";
	
	var txt = $('#search1').val();
	
	if(txt != ''){
		window.location.href= qqurl+"?url="+url+"results.php&type="+txt;		
	}else{
		alert('请您输入微博昵称!');
	}
}
</script>
</body>
</html>