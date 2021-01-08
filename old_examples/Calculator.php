<?php 

class Calculator {

	var $number1 = 500;
	var $counter = 1;
	
	function add($number2) {
		$equation = $this->number1 + $number2;
		$this->counter+1;
		print_r($equation);
	}

	function subtract($number1, $number2) {
		$equation = $number1 - $number2;
		$this->counter+1;
		print_r($equation);
	}

	function getValue($poop) {
		echo $poop;
	}

	function multiply($number1, $number2) {
		$valid = intval($number1) && intval($number2);
		if ($valid == 0) {
			echo "Invalid input";
		}
		else{
		 $equation = $number1 * $number2;
		 $this->counter++;
		 print_r($equation);
		}
	}

	function checkString($i) {
	switch ($i) {
    	case "appple":
        	echo "i is apple";
        	break;
    	case "apple":
        	echo "i is bar";
        	break;
    	case "cake":
        	echo "i is cake";
        	break;
        case "four":
        	echo "I is four";
        	break;
		default:
       		echo "i is none of the above";
   		}
	}

	function checkString2($i) {
	if($i == 'apple') {
		echo 'I is apple';
	}	
	if($i == 'appple') {
		echo 'I is bar';
	}	
	if($i == 'cake'){
		echo 'I is cake';
	}
	if($i == 'four'){
		echo 'I is four';
	}
	}
}


// $newCalculator = new Calculator();
// $newCalculator->multiply(5,8);
// $newCalculator->checkString2('apple');

$tern = false ? false ? 'poop' : 'not poop' : "banna";
print_r($tern);

// $newCalculator->add(2);
// $newCalculator->subtract(100, 50);
// print "\n";
// $newCalculator->getValue(9);
// print "\n";
// Calculator::getValue(6);
// echo "\n";
// $newCalculator->subtract(666,420);

//Calculator::add(1, 2);

/*
using ($this) Make line 8 function to add var 500 + $number2 = 502 as the end result
php pass by reference

Week3
Create a calculator class with a function that adds 2 numbers and a function that subtracts 2 numbers.
This class must have 0 properties.
These methods will need to be able to be called statically https://www.geeksforgeeks.org/static-function-in-php/ 
These methods will need to validate that the input argument is a valid integer https://www.php.net/manual/en/function.intval.php */

?>



