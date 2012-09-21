<?php 
include 'common/define.php';
include 'common/config.php';
include 'common/function.php';
session_start();

if(isset($_SESSION['nicering']) == false)
{
	if(isset($_SESSION['idollist']) == false)
	{
		echo "NO idollist";exit;
	}
	
	header("location: ".BASEURL);
	exit;
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>结果 嫦娥测试-测试小应用-拖拉网</title>
<link href="src/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8"    src="http://fusion.qq.com/fusion_loader?appid=<?php echo "100648214";?>&platform=qzone"></script>
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
                	<img src="src/images/img_03.jpg" title="嫦娥测试"/>
                </div>
            </div>
            <div class="content_2">
            	<div class="d2">
                	<p class="p1"><?php echo $_SESSION['title'];?></p>
                    <div class="d3">
                    	<img src="<?php echo $_SESSION['niceringImg'];?>" class="image" />
                        <div class="d4">
                        	<a href="" class="share"><img src="src/images/image_06.jpg"/> </a>
                            <p class="p2">转发到<?php echo $_SESSION['nicering']?>微博并祝大家中秋快乐，给远方的朋友送去一份祝福</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script>
$(function(){
	$(".share").click(function(){
		fusion2.dialog.share
		({
		  // 可选。默认展示在分享弹框的输入框里的分享理由，建议传入，而且分享理由要简短而有吸引力
		  desc:"<?php echo $_SESSION['content'];?>",

		  // 必须。应用简要描述。
		  summary :"测测看谁是你的嫦娥（猪八戒）？",

		  // 必须。分享的标题。
		  title :"嫦娥测测",
		  

		  // 可选。图片的URL。建议为应用的图标或者与分享相关的主题图片，规格为120*120 px
		  // hosting应用要求将图片存放在APP域名下或腾讯CDN
		  // non-hosting应用要求将图片上传到该应用开发者QQ号对应的QQ空间加密相册中。 
		  // 即non-hosting应用图片域名必须为：qq.com、pengyou.com、qzoneapp.com、qqopenapp.com、tqapp.cn。
		  pics :"<?php if(file_exists($_SESSION['waterbg'])) echo BASEURL.$_SESSION['waterbg']; else echo $_SESSION['niceringImg'];?>",

		  // 可选。透传参数，用于onSuccess回调时传入的参数，用于识别请求。
		  context:"share",

		  // 可选。用户操作后的回调方法。
		  onSuccess : function (opt) {  
		 

	  	  },

		  // 可选。用户取消操作后的回调方法。
		  onCancel : function (opt) {  },

		  // 可选。对话框关闭时的回调方法。
		  onClose : function () {  
			  $.post(
						"rmimg.php",
						{ image: "<?php echo $_SESSION['waterbg'];?>",
							waterImg:"<?php echo $_SESSION['waterImg']; ?>"
							},
						function(data){
							
						}
					  );

			  }

		});
		
		return false;
	});
	






	
});


</script>
</body>
</html>