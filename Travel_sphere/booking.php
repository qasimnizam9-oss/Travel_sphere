<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }

$destination = trim($_POST['destination'] ?? '');
$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$contact = trim($_POST['contact'] ?? '');
$people = $_POST['people'] ?? null;
$arrival = $_POST['arrival'] ?? null;
$leaving = $_POST['leaving'] ?? null;

if (!$destination || !$fullname || !$email) {
    header("Location: index.php?msg=" . urlencode("Please fill required fields."));
    exit;
}

$stmt = $conn->prepare("INSERT INTO bookings (destination,fullname,email,contact,people,arrival,leaving) VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param("ssssiss", $destination, $fullname, $email, $contact, $people, $arrival, $leaving);
if ($stmt->execute()) {
    header("Location: index.php?msg=" . urlencode("Booking successful. Thank you, $fullname."));
} else {
    header("Location: index.php?msg=" . urlencode("Booking failed: " . $conn->error));
}
$stmt->close();
$conn->close();
?>
