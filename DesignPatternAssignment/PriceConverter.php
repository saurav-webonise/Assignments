<?php  
	require_once "Currency.php";
	interface Observer{
		public function addCurrency(Currency $currency);
	}
	class PriceConverter implements Observer{
		private $currencies;
		public function __construct() {
        		$this->currencies = array();
    		}
    		public function addCurrency(Currency $currency) {
        		array_push($this->currencies, $currency);
    		} 
    		public function findCurrency() {
        		foreach ($this->currencies as $currency) {
            			$currency->findPrice();
        		}
    		}
	}
?>
