<?php
// Consolidated head include: links to single global CSS and single JS file,
// and optionally per-page CSS/JS through $page_css and $page_js variables.
?>
<?php include '../global.inc.php'; ?>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php echo isset($page_title) ? $page_title . ' - ' . SITE_NAME : SITE_NAME; ?></title>
<link rel="icon" href="<?php echo SITE_URL; ?>/assets/images/favicon.png" />
<!-- Global stylesheet -->
<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css" />

<?php
// Per-page stylesheet (set $page_css = 'filename.css' before including head.php)
if (isset($page_css) && trim($page_css) !== '') {
    echo '<link rel="stylesheet" href="'.SITE_URL.'/assets/css/'.htmlspecialchars($page_css, ENT_QUOTES).'">';
}

// Global JS (deferred)
echo '<script src="'.SITE_URL.'/assets/js/main.js" defer></script>';

// Per-page JS (set $page_js = 'filename.js' before including head.php)
if (isset($page_js) && trim($page_js) !== '') {
    // Load page-specific JS after HTML is parsed to avoid null DOM references
    echo '<script src="'.SITE_URL.'/assets/js/'.htmlspecialchars($page_js, ENT_QUOTES).'" defer></script>';
}

// Additional per-page head content
if (isset($extra_head)) echo $extra_head;
?>
<script src="<?php echo SITE_URL; ?>assets/js/script.js"></script>
<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



<!-- Owl Carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>




<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/loader/loader.css">

<script src="<?php echo SITE_URL; ?>/assets/loader/loader.js" defer></script>



</head>

<?php include 'loader.php'; ?>
<body style="margin:0; background: #F16622;">
<!-- Row start -->
    <div class="d-flex col-md-12" style="min-height: 100vh;">

    
        <?php include 'sidebar.php'; ?>

        <!-- main box start -->
        <div id="main-box" class="col-md-9">
            <!-- main box start -->
            <div class="innermain-box" style="background-color: #fff; padding: 0px 0; margin: 20px; border-radius: 25px; height: calc(100vh - 40px);overflow-y: auto;overflow-x: hidden;">
                <?php include 'top_bar.php'; ?>
                <div id="content-box" style="padding: 20px;">
                    <!-- content box start -->