<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
else
{
    header("Location: ../pages/dashboard.php");
    exit();
}
$user_name = $_SESSION['user_name'];
$user_role = $_SESSION['user_role'];
?>



<!-- redirect to => dashboard -->
