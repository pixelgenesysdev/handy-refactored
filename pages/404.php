<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
 include '../includes/head.php'; ?>



<div id="errorpage" class="box-main-row">


    <div id="box-main">
        <h2>Page Not Found</h2>
    </div>


</div>


<?php include '../includes/footer.php'; ?>