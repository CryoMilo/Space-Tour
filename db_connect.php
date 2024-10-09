<?php
$servername = "db"; // As mentioned earlier, 'db' is the service name in Docker Compose
$db_user = "user"; // MySQL username
$db_password = "password"; // MySQL password
$dbname = "space_tourism"; // The database name

// Create connection
$conn = new mysqli($servername, $db_user, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
