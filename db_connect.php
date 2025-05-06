<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mpris_db";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    exit("Database connection error.");
}

$conn->close();
?>
