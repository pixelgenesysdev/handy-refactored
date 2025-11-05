<?php
$page_css = 'pages_services_providers.css';
 include '../includes/head.php'; ?>

<div id="ServicesUsersPage">

    <div class="topbarwithbtn">
        <h3 onclick="history.back()" style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i>Services Users</h3>
    </div>

    <div class="search-container">
        <input type="text" placeholder="Search User" id="searchUser">
    </div>

    <div class="card-grid">
        <?php 
        // Example loop — in real use, replace with dynamic DB data
        for ($i = 0; $i < 8; $i++) { ?>
            <div class="carduserbox col-lg-6 col-md-12" onclick="window.location.href='<?php echo SITE_URL; ?>pages/services_providers_details.php'" style="cursor:pointer;">
                <div class="inner">
                    <div class="user-info">
                        <img src="<?php echo SITE_URL; ?>assets/images/avatar1.png" alt="User">
                        <div class="details">
                            <h4>Smith Roy</h4>
                            <p>Lorem Ipsum • <span class="rating">★ 4.3</span></p>
                            <p>1.2 km away — quick and convenient access!</p>
                        </div>
                    </div>
                    <div class="price">$15/h</div>
                </div>    
            </div>
        <?php } ?>
    </div>

</div>

<?php include '../includes/footer.php'; ?>

