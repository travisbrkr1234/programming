<?php
$servername = "127.0.0.1";
$username = "wyatt";
$password = "password";
$dbname = "php_examples";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `name`, `brewery`, `abv` FROM beer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $count = 0;
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $count++;
        echo "Beer Name: " . $row["name"]. " Brewery Name: " . $row["brewery"] . " " . $row["abv"]. "%ABV" . "<br>";
    }
    echo "<p>Count: $count</p>";
    echo "<br>";
    echo "<a href=index.html>Add Moar Beerz Here</a>";
    echo "<br>";
    echo "<br>";
    echo "<a href=./deleteBeers.php>Clear Beer List</a>";
} else {
    echo "0 results";
    echo "<br>";
    echo "<br>";
    echo "<a href=index.html>Add Beer Here</a>";
}
$conn->close();
?>