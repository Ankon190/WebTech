<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'appointment_ms';

$conn = new mysqli($host, $username, $password, $database);
$success = $error = "";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    $success = "Connection successful";
}

?>