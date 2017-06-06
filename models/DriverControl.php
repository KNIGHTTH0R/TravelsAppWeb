<?php
	include "../dataBase/DBManager.php";


	class DriverControl{
		private static $instance;

		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}

		function getDriverByID($trip){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT driverUsername FROM trips WHERE tripID = '$trip'");
			return $query;
		}
	}
?>