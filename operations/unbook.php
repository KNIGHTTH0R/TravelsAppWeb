<?php
	namespace travels\operations;
	use travels\models as models;
	include "../models/JourneyPassengersControl.php";
	include "../models/JourneyControl.php";
	$idTrip = $_POST['idTrip'];
	$idJourney = $_POST['idJourney'];
	$username = $_POST['username'];

	$journeyControl = models\JourneyControl::getInstance();
	$journey = $journeyControl->getJourneyDatabyJourneyAndTrip($idJourney, $idTrip);
	while($rowJourney = $journey->fetch_array()){
		$date = $rowJourney['departureDate'];
	}
	$currentDate = $milliseconds = round(microtime(true));

	if(($date - $currentDate) > 21600){ //se puede cancelar hasta 6 horas antes del viaje
		$journeyPassengersControl = models\JourneyPassengersControl::getInstance();
		$journeyPassengersControl->cancelJourney($idTrip, $idJourney, $username);
		echo "Ha cancelado su trayecto";
	}else{
		echo "Es demasiado tarde para cancelar su trayecto";
	}

?>