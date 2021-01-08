<?php 
class Car{

	function accelerate() {
		echo "I go Vroom";
	}

	function brake($feet) {
		print("I stopped in: " . $feet);
	}
}
// $mx5 = new Car;
// $mx5::accelerate();
// $mx5->brake("10 feet");

// $cx7 = new Car;
// $cx7->brake("15 feet");
//  

Car::brake("");
?>
