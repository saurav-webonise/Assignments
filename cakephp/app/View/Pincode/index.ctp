<h2>Pincodes</h2>
<?php 
	foreach ($pincodes as $pincode): 
	 echo $pincode['Pincodes']['pincode']."		".$pincode['Pincodes']['district']; 
	 endforeach; 
	 unset($pincode); 
?>
