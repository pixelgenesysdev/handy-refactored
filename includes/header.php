
    <?php include 'top_bar.php'; ?>
<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Ab tum yahan user ka data use kar sakte ho
$user_id    = $_SESSION['user_id'];
$user_name  = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_role  = $_SESSION['user_role'];  // "user" ya "provider"
?>