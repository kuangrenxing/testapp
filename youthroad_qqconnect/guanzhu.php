<?php
//图片在该应用的路径
$hourPath='src/images';
//本应用url
$baseUrl='http://testapp.dev/youthroad_qqconnect';


require_once("../qq/comm/config.php");

// if(!isset($_SESSION["access_token"])){
// 	header('Location:'.$baseUrl);
// 	exit;
// }
require_once('./functions.php');
/*
$arr = array(
	"access_token" => $_SESSION["access_token"],
	"appid" => $_SESSION["appid"],
	"openid" => $_SESSION["openid"]
);
$result = check_fans($arr);
$a = $_REQUEST['access'];
*/
?>
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
            	<div class="j1">
                	<h1 class="name">Kenny</h1>
                    <a class="a1" href="" target=""><img src="src/images/start3_03.jpg"/></a>
                    <iframe src="http://open.qzone.qq.com/like?url=http%3A%2F%2Fuser.qzone.qq.com%2F622001561&type=button&width=400&height=30&style=3" allowtransparency="true" scrolling="no" border="0" frameborder="0" style="width:400px;height:30px;border:none;overflow:hidden;"></iframe>
                   <span id="alertAttention" style="display:none;">请先关注拖拉网</span>
                    <a class="a1" href="javascript:void(0);"  target=""><img  id="validate" src="src/images/start2_07.jpg"/></a>
                
                </div>
                
            </div>
        </div>            
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>



<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script language="javascript">
$(function(){
	var b_flag = <?php echo $result['isfans']; ?>;
	$("#validate").click(function(){
		if(b_flag == '0'){
			$.ajax({
				type:'post',
				url:'doAjax.php',
				cache:false,
				data:'',
				success:function(data){
					if(data==0){
						$('#alertAttention').css('display','block');
					}else{
						location.href='show.php?access=<?php echo $a; ?>';
					}
				}
			});
		}else{
			location.href='show.php?access=<?php echo $a; ?>';
		}
		});
	
});

</script>
</body>
</html>
