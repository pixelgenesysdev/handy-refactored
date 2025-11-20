<?php
// auth/login-process.php
session_start();

// Fake users database (ID + Name + Email + Password + Role)
$fake_users = [
    1 => ['id' => 1, 'name' => 'Zawwar Ahmed',     'email' => 'provider@handy.com', 'password' => 'provider123', 'role' => 'provider'],
    2 => ['id' => 2, 'name' => 'Ali Khan',         'email' => 'user1@handy.com',    'password' => 'user123',     'role' => 'user'],
    3 => ['id' => 3, 'name' => 'Dr. Sara',         'email' => 'doctor@handy.com',   'password' => 'doc123',      'role' => 'provider'],
    4 => ['id' => 4, 'name' => 'Ahmed Raza',       'email' => 'user2@handy.com',    'password' => 'user456',     'role' => 'user'],
    5 => ['id' => 5, 'name' => 'Fatima Electrician','email' => 'fatima@handy.com',   'password' => 'fatima123',   'role' => 'provider'],
];

$email    = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

$logged_in_user = null;

foreach ($fake_users as $user) {
    if ($user['email'] === $email && $user['password'] === $password) {
        $logged_in_user = $user;
        break;
    }
}

if ($logged_in_user) {
    // Session mein proper data daal do
    $_SESSION['user_id']   = $logged_in_user['id'];
    $_SESSION['user_name'] = $logged_in_user['name'];
    $_SESSION['user_email']= $logged_in_user['email'];
    $_SESSION['user_role'] = $logged_in_user['role'];  // ye important hai

    // Success redirect
    header("Location: ../pages/dashboard.php");
    exit();
} else {
    $_SESSION['login_error'] = "Email ya password galat hai!";
    header("Location: login.php");
    exit();
}
?>