<?php
header("content-type:text/html;charset=utf-8;");
session_start();

include_once 'common/define.php';

//下一页面文件
$nextFile = "choice.php";
//授权url
$url = APIURL."?url=".BASEURL.$nextFile."&type=".WB_APP_CONN_WEIFUSHI;
?>


<title><?php echo TITLE;?></title>

<?php echo $url;?>
        