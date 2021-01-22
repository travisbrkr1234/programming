<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "storee";
$tableName = "contact";
$databaseConnection;

      //Check post Verb for GET
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $databaseConnection = new mysqli($servername, $username, $password, $dbname);
    // Returns either a successful connection pool OR an error

    $dataBaseConnectionError = $databaseConnection->connect_error;

    if (isset($dataBaseConnectionError)) {
        die("Connection failed: " . $$dataBaseConnectionError);
    }

    $selectStatement = "SELECT * FROM $tableName ORDER BY id DESC";
    $result = $databaseConnection->query($selectStatement);
    $results = [];
    if ($result->num_rows > 0 && $result->num_rows < 500) {
        while($row = $result->fetch_assoc()) {
            array_push($results, $row);
        }
        
        //check GET parameter for api not NULL and fale
        $apiIsNull = null == $_GET['api'];
        $apiIsFalse = (isset($_GET['api']) && htmlspecialchars($_GET['api']) == 'false');
        $doThisCodeBlock = $apiIsNull || $apiIsFalse;
        if ($doThisCodeBlock) {
            foreach ($results as $row) {
                echo "<br> id: ". $row['id'] . " " . $row['first_name'] . " " . $row['email'];
            }
            // Create new variable GET parameter of true
        } else if (isset($_GET['api']) && htmlspecialchars($_GET['api']) == 'true') {
            echo json_encode($results);
        }
        //Cant find anything return error message
    } else {
        echo "No resutls found for table: " . $tableName . " check to see if it exists in database " . $databaseConnection;
    }
    //End Connection
    $databaseConnection->close();
} else {
    echo "HTTP method not supported, please use GET";
}

?>