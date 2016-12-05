<?php
	require_once 'Currency.php';
	class Pound implements Currency{
		private $price;  
		const private poundPrice=86.18;   
	    	public function __construct($price){
	        	$this->price = $price;
	    	}     
	    	public function findPrice(){
	       		echo "<br><b>Price In Pound : " . round($this->price/(self::poundPrice),2) . " &pound;</b>";
		}
	}
?>
