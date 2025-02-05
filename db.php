<?php
// Use correct port if you changed it
$servername = "localhost";
$username = "root";
$password = "your_password"; // default is no password for 'root' in XAMPP
$dbname = "user_data";
// Use 3306 if you changed the port in the config file

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
