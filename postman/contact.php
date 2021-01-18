<?php
 $servername = "localhost";
 $username = "";
 $password = "";
 $dbname = "storee";
 $tableName = "contact";
 $databaseConnection;
 
 if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $databaseConnection = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($databaseConnection->connect_error) {
        die("Connection failed: " . $databaseConnection->connect_error);
    }

    $reqId = $_REQUEST['id'];
    $password = $_REQUEST['password'];

    if (isset($password) && (htmlspecialchars($password) === 'example')) {
        if (isset($reqId)) {
            $stmt = $databaseConnection->prepare("DELETE FROM $tableName WHERE id=?");
            $stmt->bind_param("i", $reqId);
            $result = $stmt->execute();

            if ($result === TRUE && $mysqli->affected_rows > 0) {
                echo "Record id $reqId deleted successfully";
            } else {
                // echo "Error deleting record: $reqId\nthis record may have already been removed\n" . var_dump($databaseConnection->error);
                echo "Error deleting record: $reqId\nThis record may have already been removed";
            }

            $databaseConnection->close();
        } else {
            echo "Please provide an id to remove";
        }
    } else {
        echo "Please provide a valid password";
    }
}
?>
