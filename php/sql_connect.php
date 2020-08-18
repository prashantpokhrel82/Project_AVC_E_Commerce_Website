<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "avcproject";

// Create connection
$conn = new mysqli($server_name, $user_name, $password, $database_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
