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
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        if (isset($firstName) && isset($lastName) && isset($email)) {
            $insertContact = $databaseConnection->prepare("INSERT INTO contact (first_name, last_name, email) VALUES (?, ?, ?)");
            $insertContact->bind_param("sss", $cleanedFirstName, $cleanedLastName, $cleanedEmail);

            $cleanedFirstName = htmlspecialchars($firstName);
            $cleanedLastName = htmlspecialchars($lastName);
            $cleanedEmail = htmlspecialchars($email);
            
            $emailCheck = $databaseConnection->prepare("SELECT * FROM contact WHERE (email)=?");
            $emailCheck->bind_param("s", $cleanedEmail);
            $emailCheck->execute();
            $result = $emailCheck->get_result(); // get the mysqli result
            $dupContact = $result->fetch_assoc(); // fetch data   

            if (isset($dupContact['id']) && $dupContact['id'] > 0) {
                $databaseConnection->close();
                http_response_code(400);
                echo "Cannot add this email address, duplicate email found.";
            } else {
                $result = $insertContact->execute();
                $databaseConnection->close();
                echo "Successfully added $cleanedFirstName $cleanedLastName $cleanedEmail";
            }
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
