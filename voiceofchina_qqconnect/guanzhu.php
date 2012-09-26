<?php
include 'common/define.php';
require_once('../functions.php');
require_once("../qq/comm/config.php");

//图片在该应用的路径
$hourPath='src/images';
//本应用url
$baseUrl=BASEURL;

if(isset($_GET['artist']) == false)
{
	header("Location: ".BASEURL);
	exit;
}
//检查授权
if(!isset($_SESSION["access_token"])){
	header('Location:'.$baseUrl);
	exit;
}
//是否已收听 为1表示已经收听
$arr = array(
	"access_token" => $_SESSION["access_token"],
	"appid" => $_SESSION["appid"],
	"openid" => $_SESSION["openid"]
);
$result = check_fans($arr);

//已经授权 跳到下一页面
$nexturl = "attention.php?artist=".$_GET['artist'];
if($result['isfans'] == 1)
{
	header("location: ".$nexturl);
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>非诚勿扰-测试小应用-拖拉网</title>
<style type="text/css">
body,p,h1,h2,h3,h4,h5,h6,dd,dl,dt,form,th,td,ul,li,ol,p,input,select,textarea,button{ margin:0;padding:0;}
input,select,textarea{font-family:Arial, Helvetica, sans-serif; font-size:12px;}
table{border-collapse:collapse;border-spacing:0;}
img{ border:0;}
em,i{font-style:normal;}
ul,ol{list-style-type:none;}
a{color:#333;text-decoration:none;}
a:hover,a:active,a:focus{ color:#FF0000; text-decoration:underline;}
.clear {clear: both;}
.clearfix:after {clear:both; content:'';display: block;font-size: 0;line-height: 0;visibility: hidden;	width: 0;height: 0;}
.clearfix {+display: inline-block;}
* html .clearfix {height: 1%;}
body{font-size:12px; font-family:"微软雅黑", Arial, sans-serif; background:#FFF; color:#000;}
.qqgz{ background:url(src/images/qqgzBg.jpg) repeat; height:496px;}
.w780{ width:780px; margin:0 auto;}
.qqMain{ width:409px; margin:0 auto; padding-top:148px;} 
.bordBm{ background:url(src/images/qqLine.gif) repeat-x center bottom; padding-bottom:25px;}
.bordBm dl{ margin-left:65px;}
.bordBm dl dt{ float:left; margin-right:12px;}
.bordBm dl dd{ font-size:14px; color:#666; padding-top:5px;}
.bordBm p{ margin:15px 0px 0px 136px;}
.bordBm p a,.bordBm p span{ background:url(src/images/qqSprite.gif) no-repeat; overflow:hidden; display:block; float:left;}
.bordBm p a{ width:63px; height:21px; background-position:-79px -24px; margin-right:5px; position:relative; top:2px;}
.bordBm p span{ width:136px; height:24px; line-height:24px; color:#fff; font-size:14px; padding-left:20px;}
.qCkjg{ text-align:center; height:29px; line-height:29px; margin-top:15px;}
.qCkjg a{ display:inline-block; background:url(src/images/qqSprite.gif) no-repeat 0px -24px; width:79px; height:29px; overflow:hidden; vertical-align:middle; margin-left:15px;}
</style>
<!--[if IE 6]>
<script type="text/javascript" src="src/js/DD_belatedPNG_0.0.8a.js"></script>
<script type="text/javascript">DD_belatedPNG.fix('.pngFix');</script> <![endif]-->
</head>

<body>
<div class="w780 qqgz">
    	<div class="qqMain">
        	<div class="bordBm">
            	<dl>
                	<dt><a href="http://www.tuolar.com/" target="_blank"><img src="src/images/tuolarIcon.gif" /></a></dt>
                    <dd><img src="src/images/tuolarName.jpg" /></dd>
                    <dd>已有157万人关注</dd>
                </dl>
                <p class="clearfix"><a href="javascript:void(0);"><iframe src="http://open.qzone.qq.com/like?url=http%3A%2F%2Fuser.qzone.qq.com%2F622001561&type=button&width=400&height=30&style=3" allowtransparency="true" scrolling="no" border="0" frameborder="0" style="width:400px;height:30px;border:none;overflow:hidden;"></iframe></a><span id="alertAttention" style="display:none;">请先关注拖拉网</span></p>
            </div>
            <p class="qCkjg">关注拖拉网QQ空间，然后<a href="javascript:void(0);" onclick="vResult();"><!--查看结果--></a></p>
        </div>
    </div>
<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script language="javascript">
var b_flag = <?php echo $result['isfans']; ?>;
var nexturl = '<?php echo $nexturl;?>';

function vResult(){
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
					location.href = nexturl;
				}
			}
		});
	}else{
		location.href = nexturl;
	}
}
</script>
</body>
</html>
