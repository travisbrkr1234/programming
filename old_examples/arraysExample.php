<?php
// Associative array examples

// Example with mixed keys
$mixedArrayKeys = [
    'item1',
    'item2',
    'keyName1' => 'item3',
    'item4',
    'keyName2' => 'item5',
];

echo "before sort: ";
var_dump($mixedArrayKeys);
echo "\n\n\n";
echo "after sort: ";
sort($mixedArrayKeys);
var_dump($mixedArrayKeys);

// Example with no provided keys
echo "\n\n\n";
$noGivenArrayKeys = ["one", "two", "three"];
var_dump($noGivenArrayKeys);

// Example with all keys provided
echo "\n\n\n";
$givenArrayKeys = [
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "four" => 4,
    "five" => 5,
    "six" => 6,
    "seven" => 7,
];
var_dump($givenArrayKeys);
//sort($givenArrayKeys);
//var_dump($givenArrayKeys);
?>