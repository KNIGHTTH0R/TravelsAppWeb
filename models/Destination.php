<?php
	class Destination{
		private $city;
		private $price;
		private $arrivalTime;

		public function __construct($city, $price, $arrivalTime){
			$this->city = $city;
			$this->price = $price;
			$this->arrivalTime = $arrivalTime;
		}

		//TODO here needed getters and setters
	}
?>