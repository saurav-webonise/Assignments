<?php
	function ukTimeZone($userTime)
	{
		$ukTime = date('Y-m-d H:i', strtotime('-5 hours -30 minutes',strtotime($userTime)));
		echo "<br/>UK Time : ".$ukTime;
	}
	function usaTimeZone($userTime)
	{
		$usaTime = date('Y-m-d H:i', strtotime('-10 hours -30 minutes',strtotime($userTime)));
		echo "<br/>USA Time : ".$usaTime;
	}
	$userTime = '2015-01-01 00:00:00';
	echo "User Time : ".$userTime;
	ukTimeZone($userTime);
	usaTimeZone($userTime);

?>