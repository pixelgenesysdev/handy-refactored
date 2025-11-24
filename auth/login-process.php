<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$fake_users = [
    'provider@handy.com' => ['pass' => 'provider123',  'role' => 'provider', 'name' => 'Provider User'],
    'customer@handy.com' => ['pass' => 'user123',      'role' => 'customer', 'name' => 'Customer User']
];

// MATCH USER
if (isset($fake_users[$email]) && $fake_users[$email]['pass'] === $password) {

    // USER DATA
    $userData = [
        'loggedin' => true,
        'user_id'  => rand(100, 999),
        'email'    => $email,
        'name'     => $fake_users[$email]['name'],
        'role'     => $fake_users[$email]['role']
    ];

    // Convert PHP array → JSON
    $json = json_encode($userData);

    // Send JavaScript to store in localStorage
    echo "
    <script>
        localStorage.setItem('handyUser', '$json');
        window.location.href = '../pages/dashboard.php';
    </script>
    ";
    exit;

} else {
    echo "
    <script>
        localStorage.setItem('login_error', 'Invalid email or password!');
        window.location.href = 'login.php';
    </script>
    ";
    exit;
}

ob_end_flush();
?>
