<?php
session_start();
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }

$email = trim($_POST['email'] ?? '');
$pass = $_POST['password'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?msg=" . urlencode("Invalid email."));
    exit;
}

$stmt = $conn->prepare("SELECT id,name,password FROM users WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 1) {
    $stmt->bind_result($id,$name,$hash);
    $stmt->fetch();
    if (password_verify($pass, $hash)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;
        header("Location: index.php?msg=" . urlencode("Welcome, $name"));
        exit;
    } else {
        header("Location: index.php?msg=" . urlencode("Incorrect password."));
        exit;
    }
} else {
    header("Location: index.php?msg=" . urlencode("User not found."));
    exit;
}
$stmt->close();
$conn->close();
?>
