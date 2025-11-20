<?php
// auth/login-process.php
ob_start();           // YE LINE ADD KAR DO → sab output buffer kar dega
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Fake users (testing ke liye)
$fake_users = [
    'admin@handy.com'    => ['pass' => 'admin123',     'role' => 'admin',    'name' => 'Admin'],
    'provider@handy.com' => ['pass' => 'provider123',  'role' => 'provider', 'name' => 'Provider User'],
    'customer@handy.com' => ['pass' => 'user123',      'role' => 'customer', 'name' => 'Customer User']
];

if (isset($fake_users[$email]) && $fake_users[$email]['pass'] === $password) {

    // Session set karo
    $_SESSION['loggedin']   = true;
    $_SESSION['user_id']    = rand(100, 999); // simple ID
    $_SESSION['user_email'] = $email;
    $_SESSION['user_name']  = $fake_users[$email]['name'];
    $_SESSION['user_role']  = $fake_users[$email]['role'];

    // Role ke hisaab se redirect
    if ($fake_users[$email]['role'] === 'admin') {
        $redirect = '../pages/admin-dashboard.php';
    } elseif ($fake_users[$email]['role'] === 'provider') {
        $redirect = '../pages/provider-dashboard.php';
    } else {
        $redirect = '../pages/dashboard.php';
    }

    header("Location: $redirect");
    exit();

} else {
    $_SESSION['login_error'] = "Invalid email or password!";
    header("Location: login.php");
    exit();
}

ob_end_flush(); // end of file pe ye bhi daal sakte ho (optional)


// all cridentials
// admin@handy.com    admin123
// provider@handy.com provider123
// customer@handy.com user123
?>