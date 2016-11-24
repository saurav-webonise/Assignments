<?php
	function dateDifference($firstDate,$secondDate)
	{
		$firstDateToTime=strtotime($firstDate);
		$secondDateToTime=strtotime($secondDate);
		$dateDifference = $firstDateToTime - $secondDateToTime;
		echo "<br/>Date Difference : ".floor($dateDifference / (60 * 60 * 24));	
	}
	$firstDate = "12-5-2011";
	$secondDate = "12-4-2010";
	echo "First Date : ".$firstDate;
	echo "<br/>Second Date : ".$secondDate;	
	dateDifference($firstDate,$secondDate);
?>