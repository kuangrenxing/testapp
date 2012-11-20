<?php
header("content-type:text/html;charset=utf-8");
session_start();
include_once 'common/define.php';

if($_SESSION['money'] == false || $_SESSION['ka']==false || $_SESSION['username']==false)
{
	header("Location: ".BASEURL);
	exit;
}
$money = $_SESSION['money'];
$ka = $_SESSION['ka'];
$username = $_SESSION['username'];

$description = "";
$content = "";
$image = "";
$card = '';

$extract = rand(100,1000);


$content.=BASEURL;


?>
<script type="text/javascript" charset="utf-8"    src="http://fusion.qq.com/fusion_loader?appid=<?php echo "100648214";?>&platform=qzone"></script>

<title><?php echo TITLE;?></title>

                    <form action="#" name="" id="form1" method="post">
                    	<textarea class="dd J_content"  /><?php echo $content;?></textarea>
                        <input type="button" class="J_share" style="background:url(src/images/133x31_2.png) no-repeat; width:133px; height:31px; border:none; display:block; float:left; margin-top:6px; cursor:pointer;" value="" />
                        <p class="p4">还可以输入<span id="J_keycount">50</span>个字</p>
                    </form>
               
<script src="<?php echo BASEURL;?>src/js/jquery.min.js"></script>
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
	


	
	$(".J_share").click(function(){
		
		fusion2.dialog.share
		({
		  // 可选。默认展示在分享弹框的输入框里的分享理由，建议传入，而且分享理由要简短而有吸引力
		  desc:$(".J_content").val(),

		  // 必须。应用简要描述。
		  summary :"测一测工资有多少",

		  // 必须。分享的标题。
		  title :"晒工资",
		  

		  // 可选。图片的URL。建议为应用的图标或者与分享相关的主题图片，规格为120*120 px
		  // hosting应用要求将图片存放在APP域名下或腾讯CDN
		  // non-hosting应用要求将图片上传到该应用开发者QQ号对应的QQ空间加密相册中。 
		  // 即non-hosting应用图片域名必须为：qq.com、pengyou.com、qzoneapp.com、qqopenapp.com、tqapp.cn。
		  pics :"<?php echo BASEURL."src/images/".$image;?>",

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