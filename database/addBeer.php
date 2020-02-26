<?php
if (count($_POST) > 0 && isset($_POST["beerName"])) { //Check for post params
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

// prepare and bind
    $stmt = $conn->prepare("INSERT INTO beer (`name`, `brewery`, `abv`) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $brewery, $abv);

// set parameters and execute
    $name = htmlspecialchars($_POST["beerName"]);
    $brewery = htmlspecialchars($_POST["brewery"]);
    $abv = htmlspecialchars($_POST["abv"]);
    $stmt->execute();

    echo "Beer Added: " . $_POST['beerName'] . " by " . $_POST['brewery'] . " " . $_POST['abv'] . "%ABV";
    echo "<br> <a href=showBeer.php>Show Beers</a>";
    $stmt->close();
    $conn->close();
}
else {
    echo "<a href=index.html>Add Beer Here</a>";
}