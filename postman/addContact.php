<?php
 $servername = "localhost";
 $username = "";
 $password = "";
 $dbname = "storee";
 $tableName = "contact";
 $databaseConnection;
 
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['password']) && $_POST['password'] == 'example') {
        $databaseConnection = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($databaseConnection->connect_error) {
            die("Connection failed: " . $databaseConnection->connect_error);
        }
        $fn = $_POST['first_name'];
        $ln = $_POST['last_name'];
        $em = $_POST['email'];
        if (isset($fn) && isset($ln) && isset($em)) {
            $stmt = $databaseConnection->prepare("INSERT INTO contact (first_name, last_name, email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $firstname, $lastname, $email);
            $firstname = htmlspecialchars($fn);
            $lastname = htmlspecialchars($ln);
            $email = htmlspecialchars($em);
            $result = $stmt->execute();
            $databaseConnection->close();
            echo "Succesfully added $result $firstname $lastname $email";
    } else {
        echo "Please provide a first name, last name, and email address";
    }
    } else {
        echo "Please provide a valid password";
    }
} else {
    echo "HTTP method not supported, please use POST";
}
?>
