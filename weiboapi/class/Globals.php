<?php 
function getClientIp($returnLong = false)
{
	if (isset($_SERVER['HTTP_CLIENT_IP']))
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			
		if ($pos = strpos($ip, ','))
			$ip = trim(substr($ip, 0, $pos));
			
		if (strpos($ip, '10.') === 0)
			$ip = $_SERVER['REMOTE_ADDR'];
	}
	else $ip = $_SERVER['REMOTE_ADDR'];

	return $returnLong ? ip2long($ip) : $ip;
}
?>