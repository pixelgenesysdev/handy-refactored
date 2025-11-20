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
?>

<!-- redirect to => dashboard -->
