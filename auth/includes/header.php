<?php include '../global.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ezhandy web app</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="<?php echo SITE_URL?>assets/images/favicon.png">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://db.onlinewebfonts.com/c/a2021d3d882d11183ba0b0ff3f95f984?family=Hellix" rel="stylesheet">
<?php
// Per-page stylesheet (set $page_css = 'filename.css' before including head.php)
if (isset($page_css) && trim($page_css) !== '') {
    echo '<link rel="stylesheet" href="'.SITE_URL.'assets/css/'.htmlspecialchars($page_css, ENT_QUOTES).'">';
}

// Global JS (deferred)
echo '<script src="'.SITE_URL.'assets/js/main.js" defer></script>';

// Per-page JS (set $page_js = 'filename.js' before including head.php)
if (isset($page_js) && trim($page_js) !== '') {
    echo '<script src="'.SITE_URL.'assets/js/'.htmlspecialchars($page_js, ENT_QUOTES). '" defer></script>';
}

// Additional per-page head content
if (isset($extra_head)) echo $extra_head;
?>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/loader/loader.css">

<script src="<?php echo SITE_URL; ?>/assets/loader/loader.js" defer></script>



</head>

<?php include '../includes/loader.php'; ?>
<body>
    <?php include '../includes/popup.php'; ?>
    <div class="container-fluid">
        <div class="box">
            <div class="row">
           











    
