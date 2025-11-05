<?php
$page_js = 'pages_dashboard.js';
 include '../includes/head.php'; ?>

<div id="pagebox">
    <div class="topbarwithbtn">
        <h3 style="margin-bottom: 0px;">Our Services</h3>
        <a class="btntransparent" onclick="window.location.href='<?php echo SITE_URL; ?>pages/services.php'">View All</a>
    </div>
    <ul id="categoriesServices">
        <!-- Categories will be dynamically inserted here -->
    </ul>

    <div class="topbarwithbtn">
        <h3>Select</h3>
    </div>

    <div id="boxesactions" class="d-flex flex-wrap justify-content-center">
        <div class="actionbox" id="instantbooking" onclick="window.location.href='<?php echo SITE_URL; ?>pages/services.php'">
            <div class="actionimage">
                <img src="<?php echo SITE_URL; ?>/assets/images/actionbox1.png" alt="box Image">
            </div>
            <div id="contentboxaction" class="d-flex justify-content-center align-items-center">
                <img src="<?php echo SITE_URL; ?>/assets/images/actionboxicon1.png" alt="box Icon">
                <h3>Instant Booking</h3>
            </div>
        </div>    
        <div class="actionbox" id="schedulebooking" onclick="window.location.href='<?php echo SITE_URL; ?>pages/services.php'">
            <div class="actionimage">
                <img src="<?php echo SITE_URL; ?>/assets/images/actionbox2.png" alt="box Image">
            </div>
            <div id="contentboxaction" class="d-flex justify-content-center align-items-center">
                <img src="<?php echo SITE_URL; ?>/assets/images/actionboxicon2.png" alt="box Icon">
                <h3>Schedule a Booking</h3>
            </div>
        </div>    
    </div>
</div>

<?php include '../includes/footer.php'; ?>




