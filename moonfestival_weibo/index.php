<?php
session_start();
include_once 'common/define.php';
include_once 'class/saetv2.ex.class.php';
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );


//下一页url
$_SESSION['afterurl'] = BASEURL.'attention.php';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>嫦娥测试-测试小应用-拖拉网</title>
<link href="src/css/style.css" rel="stylesheet" type="text/css" />

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
            <div class="content">
            	<div class="d1">
                  
                    <a onclick="location_url();" href="javascript:void(0);" class="start"><img src="src/images/img_10.jpg"/></a>
            	</div>
            </div>
        </div>            
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

<script language="javascript">
function location_url(){
	var url = "<?php echo $code_url;?>";	
	window.location.href= url;	
}
</script>


</body>
</html>