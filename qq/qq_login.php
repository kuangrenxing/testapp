<?php
	if(isset($_GET["oauth_qqzone"])){
		if($_GET["oauth_qqzone"] == 1){
			header('Location:/apps/qq/qq/oauth/qq_login.php');
			exit;
		}
	}
	//header('Location:http://www.tuolar.com');
	if (isset($_SESSION["LOCATION_URL"])){
		$location_url = $_SESSION["LOCATION_URL"];
		unset($_SESSION["LOCATION_URL"]);
		header('Location:'.$location_url);
	}else{
		header('Location:'.TUOLAR_DOMAIN);
	}
?>