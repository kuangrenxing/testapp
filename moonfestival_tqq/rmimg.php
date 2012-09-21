 <?php 
$result = 0;
//不要删除用户生成物的图片
//   if(file_exists($_POST['image']))
//   {
// 	if(unlink($_POST['image']))
// 		$result=+1;
	
//   }

  
  if(file_exists($_POST['waterImg']))
  {
  	if(unlink($_POST['waterImg']))
  		$result=+1;
  }
  	
echo $result;
  
  
?>