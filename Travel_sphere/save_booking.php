<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_sphere"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$service = $_POST['service'];
$option = $_POST['option'];
$user_id = 1; // Replace with session user ID later

$sql = "INSERT INTO bookings (user_id, service_type, option_selected) 
        VALUES ('$user_id', '$service', '$option')";

if ($conn->query($sql) === TRUE) {
  echo "Booking confirmed: $service - $option";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
