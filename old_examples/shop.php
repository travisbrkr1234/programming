<?php
require_once 'CarGarage.php';

class Shop {
	var $shops = ['Toyota','Nissan','Butt stuff'];

	function listShops() {
		echo "List of shops:";
        print_r ($this->shops);
    }

}

$newGarage = new Garage();

$shopMagazine = new Shop();
array_push($shopMagazine->shops, $newGarage);

$shopMagazine->listShops();

/* 1. Create a “Shops” clas
2. This shops class should have 1 property (variable) and 1 function
3. The property will be called shops  and it should be an empty array
4. The function should print out the list(array) of shops
5. import your garage file
6. instantiate a new Garage object and assign it to $newGarage. Add the $newGarage object to a new Shops object called $shopMagazine
7. Call the function that prints out the list of shops in step 4 */

?>
