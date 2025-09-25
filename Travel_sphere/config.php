<?php
$servername = "localhost";
$username   = "root";     // change if needed
$password   = "";         // change if set
$dbname     = "travel_spher";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
