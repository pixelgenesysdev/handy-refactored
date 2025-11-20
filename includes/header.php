
    <?php include 'top_bar.php'; ?>


    <?php
// includes/auth_check.php
session_start();

// Agar login nahi hai → login page pe bhej do
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../auth/login.php");
    exit();
}

// Current user ka role nikaal lo (har jagah use kar sakte ho)
$current_role = $_SESSION['user_role'];  // admin, provider, customer
$current_name = $_SESSION['user_name'];
?>