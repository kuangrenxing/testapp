<?php
session_start();
include_once 'common/define.php';
include 'common/config.php';

$key = $_GET['key'];


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo TITLE;?></title>
<link href="src/css/style.css" rel="stylesheet" type="text/css" />
<style>
#J_loading,#J_cuccess,#J_lose{
	width: 150px;
	height: 50px;
	position: absolute;
	border: 1px solid #999;
	text-align: center;
	line-height: 50px;
	font-size: 14px;
	font-weight: bold;
	-webkit-border-radius: 5px;
	--moz-border-radius: 5px;
	border-radius: 5px; 
	left:50%;
	top:50%;
	margin: -25px 0 0 -75px;
	z-index: 3;
	display:none;
	filter:alpha(opacity=90);  /*IE5、IE5.5、IE6、IE7*/
     opacity: 0.9;  /*Opera9.0+、Firefox1.5+、Safari、Chrome*/
     background:#fff;
}
</style>
</head>
 
<body id="ztBodyBg">
<div id="ztcontainer">
<div id="J_loading">正在发送微博……</div>
<div id="J_cuccess">发送微博成功!</div>
<div id="J_lose">发送微博失败!</div>
    <div id="ztcontent">
    	<div class="box1">
         <div class="haed">
         	<div class="head_logo left"><a class="logo" title="拖拉网" href="http://www.tuolar.com"></a><div class="fashion_more"></div></div>
            <div class="sign right"></div>
         </div>  
         <!--测试题出题部分-->
         <div class="main2">
         	<div class="t1"><img src="src/images/161x44.jpg"/></div>
            <div class="result">
            	<p class="p1"><?php echo $result[$key]['title'];?></p>
                <p class="p2">
                <?php echo $result[$key]['content']?>
                <br />
                <?php echo $result[$key]['keywords1']?>
                <br />
                <?php echo $result[$key]['keywords2']?>
                </p>
            </div>
            <div class="fenxiang">
            	<p class="p3_2">把结果分享到新浪微博：</p>
                <form>
                	<textarea class="d2 J_content">我是屌丝我怕谁，真屌丝，不做表面功夫！我居然是<?php echo $result[$key]['title'];?>，大家都来测一测属于哪种屌丝吧。<?php echo BASEURL.$_SESSION['meting'];?></textarea>
               
                <input class="weibo share" type="button" value="" style="border:none; " /> 
                 </form>
               <p class="p3">还可以输入<span id="J_keycount">50</span>个字符</p>
            </div>
            <div class="try">
            	<a class="a1" title="拖拉网" href="http://www.tuolar.com"><img src="src/images/196x47.jpg"/></a>
                <a class="a2" href="<?php echo BASEURL;?>"><img src="src/images/148x47.jpg"/></a>
            </div>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script>
$(function(){	

		$(".J_content").keyup(function(){
			var content = $(".J_content").val();
			
			var conCount = content.length;
			var count = 140; //总字数
			if(conCount >= count)
			{
				var newCont = content.substring(0,count);
				$(".J_content").val(newCont);
			}
			//重新计算
			var content = $(".J_content").val();
			var conCount = content.length;
			$("#J_keycount").text(count-conCount);
			
			});

		$(".J_content").trigger("keyup");

		//ajax发微博
		$(".share").click(function(){
			$.ajax({
				url:"<?php echo APIURL;?>weiboajax.php",
				type:"POST",
				data:{content:$('.J_content').val(),pic_url:"<?php echo BASEURL."src/images/".$result[$key]['image'];?>"},
				beforeSend:function (XMLHttpRequest) {
				    //this; // 调用本次AJAX请求时传递的options参数
				    $("#J_loading").show();
				},
				complete:function (XMLHttpRequest, textStatus) {					
					setTimeout("$('#J_lose').hide();$('#J_cuccess').hide();",2000);
				},
				success:function(data, textStatus){					
					var result = eval('(' + data + ')');
					if(typeof result['error'] == "undefined"){//发微博成功
						$("#J_loading").hide();
						$("#J_cuccess").show();
					}else{//发微博失败
						$("#J_loading").hide();
						$("#J_lose").show();
						
						}
						
					}	
				});
			
			});
		
});
</script>

</body>
</html>