<?php
 $servername = "localhost";
 $username = "";
 $password = "";
 $dbname = "storee";
 $tableName = "contact";
 $databaseConnection;
 
 if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $databaseConnection = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($databaseConnection->connect_error) {
        die("Connection failed: " . $databaseConnection->connect_error);
    }

    $sql = "SELECT * FROM $tableName";
    $result = $databaseConnection->query($sql);
    $results = [];
    if ($result->num_rows > 0 && $result->num_rows < 500) {
        while($row = $result->fetch_assoc()) {
            array_push($results, $row);
        }
        if (null == $_GET['api'] || (isset($_GET['api']) && htmlspecialchars($_GET['api']) == 'false')) {
            foreach ($results as $row) {
                echo "<br> id: ". $row['id'] . " " . $row['first_name'] . " " . $row['email'];
            }
        } else if (isset($_GET['api']) && htmlspecialchars($_GET['api']) == 'true') {
            echo json_encode($results);
        }
    } else {
        echo "No resutls found for table: " . $tableName . " check to see if it exists in database " . $databaseConnection;
    }

    $databaseConnection->close();
} else {
    echo "HTTP method not supported, please use GET";
}
?>
