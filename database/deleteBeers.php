<?php
$servername = "127.0.0.1";
$username = isset($_ENV["MYSQL_USER"]) ? $_ENV["MYSQL_USER"] : "root";
$password = isset($_ENV["MYSQL_PASSWORD"]) ? $_ENV["MYSQL_PASSWORD"] : "password";
$dbname = "php_examples";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "TRUNCATE beer";
$result = $conn->query($sql);
    echo "Beer List Cleared";
    echo "<br>";
    echo "<br>";
    echo "<a href=index.html>Add Beer Here</a>";
    echo "<br>";
    echo "<br>";
    echo "<a href=./showBeer.php>Show Beers</a>";
$conn->close();
?>