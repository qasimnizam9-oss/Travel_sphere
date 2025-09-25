<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$pass = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

if ($pass !== $confirm) {
    header("Location: index.php?msg=" . urlencode("Passwords do not match."));
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?msg=" . urlencode("Invalid email."));
    exit;
}

$hash = password_hash($pass, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
$stmt->bind_param("sss", $name, $email, $hash);
if ($stmt->execute()) {
    header("Location: index.php?msg=" . urlencode("Registration successful. You can login now."));
} else {
    // duplicate email or other error
    header("Location: index.php?msg=" . urlencode("Registration failed: " . $conn->error));
}
$stmt->close();
$conn->close();
?>
