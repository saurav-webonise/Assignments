<?php
	require_once 'Currency.php';
	class Dollar implements Currency{
		private $price;     
	    public function __construct($price) {
	        $this->price = $price;
	    }     
	    public function findPrice() {
	       echo "<br><b>Price In Dollar : ".round($this->price/(68.28),2)." $</b>";
		}
	}
?>