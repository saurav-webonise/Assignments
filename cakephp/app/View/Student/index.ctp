<h2>Students</h2>
<?php 
	foreach ($students as $student): 
	 echo $student['Student']['prn']."		".$student['Student']['name']."		".$student['Student']['city']."		".$student['pincode']['pincode']; 
	 endforeach; 
	 unset($student); 
?>