<?php
session_start();

// Fake login – database nahi hai abhi
$email = $_POST['email'] ?? '';
$pass  = $_POST['password'] ?? '';

// Ye emails se login hoga – password sabka 123
$valid_users = [
    "user@gmail.com"     => "user",
    "provider@gmail.com" => "provider",
    "customer@gmail.com" => "user",
    "handyman@gmail.com" => "provider",
    "test@gmail.com"     => "user",
    "pro@gmail.com"      => "provider"
];

if (isset($valid_users[$email]) && $pass === "123") {
    $_SESSION['user_id']    = 999;
    $_SESSION['user_name']  = explode("@", $email)[0];
    $_SESSION['user_email'] = $email;
    $_SESSION['user_type']  = $valid_users[$email];  // ← ROLE SET

    header("Location: ../pages/dashboard.php");
    exit();
} else {
    $_SESSION['login_error'] = "Wrong email or password!";
    header("Location: login.php");
    exit();
}
?>