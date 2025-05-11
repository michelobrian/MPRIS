<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "mpris_db";

// Create a connection
$connection = new mysqli($host, $user, $password, $db);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


?>
