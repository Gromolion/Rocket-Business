<?php
$servername = "localhost";
$database = "test";
$username = "test";
$password = "20035363";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}

return $conn;