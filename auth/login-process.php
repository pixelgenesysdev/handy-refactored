<?php
echo "Form submitted!<br>";
echo "Email: " . ($_POST['email'] ?? 'none') . "<br>";
echo "Password: " . ($_POST['password'] ?? 'none');
die();

session_start();

// Debug line (temporary) — baad mein hata dena
// echo "<pre>"; print_r($_POST); die();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Fake users — password sabka "123"
$users = [
    "user@gmail.com"     => "user",
    "provider@gmail.com" => "provider",
    "customer@gmail.com" => "user",
    "handyman@gmail.com" => "provider",
    "test@gmail.com"     => "user",
    "pro@gmail.com"      => "provider"
];

if (isset($users[$email]) && $password === "123") {
    $_SESSION['user_id'] = 999;
    $_SESSION['user_name'] = ucfirst(explode("@", $email)[0]);
    $_SESSION['user_email'] = $email;
    $_SESSION['user_type'] = $users[$email];

    // Success — dashboard pe bhejo
    header("Location: ../pages/dashboard.php");
    exit();
} else {
    $_SESSION['error'] = "Wrong email or password! Try: provider@gmail.com / 123";
    header("Location: login.php");
    exit();
}
?>