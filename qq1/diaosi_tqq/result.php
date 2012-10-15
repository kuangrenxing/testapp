<?php
session_start();
include_once 'common/define.php';
include_once 'common/config.php';

if(isset($_SESSION['meting'])==false || isset($_GET['key'])==false)
{
	header("Location: ".BASEURL);
	exit;
}
$key = $_GET['key'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo TITLE;?></title>
<link href="../../assets_testapp/diaosi/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8"    src="http://fusion.qq.com/fusion_loader?appid=<?php echo "100648214";?>&platform=qzone"></script>
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
         	<div class="t1"><img src="../../assets_testapp/diaosi/images/161x44.jpg"/></div>
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
               
                <input  class="qq share" type="button" value="" style="border:none; " /> 
                 </form>
                <p class="p3">还可以输入<span id="J_keycount">50</span>个字符</p>
            </div>
            <div class="try">
            	<a class="a1" title="拖拉网" href="http://www.tuolar.com"><img src="../../assets_testapp/diaosi/images/196x47.jpg"/></a>
                <a class="a2" href="<?php echo BASEURL;?>"><img src="../../assets_testapp/diaosi/images/148x47.jpg"/></a>
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
	


	
	$(".share").click(function(){
		fusion2.dialog.share
		({
		  // 可选。默认展示在分享弹框的输入框里的分享理由，建议传入，而且分享理由要简短而有吸引力
		  desc:$(".J_content").val(),

		  // 必须。应用简要描述。
		  summary :"测一测你属于哪种屌丝",

		  // 必须。分享的标题。
		  title :"屌丝测试",
		  

		  // 可选。图片的URL。建议为应用的图标或者与分享相关的主题图片，规格为120*120 px
		  // hosting应用要求将图片存放在APP域名下或腾讯CDN
		  // non-hosting应用要求将图片上传到该应用开发者QQ号对应的QQ空间加密相册中。 
		  // 即non-hosting应用图片域名必须为：qq.com、pengyou.com、qzoneapp.com、qqopenapp.com、tqapp.cn。
		  pics :"<?php echo BASEURL."../../assets_testapp/diaosi/images/".$result[$key]['image'];?>",

		  // 可选。透传参数，用于onSuccess回调时传入的参数，用于识别请求。
		  context:"share",

		  // 可选。用户操作后的回调方法。
		  onSuccess : function (opt) {  
		 

	  	  },

		  // 可选。用户取消操作后的回调方法。
		  onCancel : function (opt) {  },

		  // 可选。对话框关闭时的回调方法。
		  onClose : function () {  


			  }

		});
		
		return false;
	});
	






	
});


</script>
</body>
</html>