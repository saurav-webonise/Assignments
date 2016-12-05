<?php
	require_once 'Currency.php';
	class Dollar implements Currency{
		private $price;
		const private dollarPrice=68.32;
		public function __construct($price){
	        	$this->price = $price;
	    	}     
	    	public function findPrice(){
	       		echo "<br><b>Price In Dollar : " . round($this->price/(self::dollarPrice),2) . " $</b>";
		}
	}
?>
