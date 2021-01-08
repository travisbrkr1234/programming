<?php

class Garage{
	var $ShopName = "Nosko's Place";
	var $Equipment;
	function liftCar() {
		echo "Car Lift";
	}
	function changeOil() {
		echo "Oil Change";
	}
}
Garage::liftCar();
?>


