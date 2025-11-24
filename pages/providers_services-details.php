<?php

include '../includes/head.php'; 
include '../includes/bothpage.php'; ?> 


<div id="ServicesUserdetailsPage" class="provider-profile">

    <div class="topbarwithbtn">
        <h3 onclick="history.back()" style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i>Services Provider Detail</h3>
    </div>

    <div class="profile-container d-flex flex-wrap">

        <!-- Left Section -->
        <div class="profile-left col-lg-12   col-md-12">
            <div class="headerDetSer-main">
                <div class="profile-header">
                    <img src="<?php echo SITE_URL; ?>assets/images/avatar1.png" alt="Profile" class="profile-pic">
                    <div class="profile-info">
                        <h2>James Anderson</h2>
                        <span class="status active">Active Now</span>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="window.location.href='<?php echo SITE_URL; ?>pages/reviews.php'">Reviews</button>
            </div>
            <div class="provider-servicedetails-img">
                <img src="<?php echo SITE_URL; ?>/assets/images/services-images/complete-kitchen-remodel.webp" alt="service image">
            </div>
            <div class="about">
                <h4>Service Name</h4>
                <p>
                    Certified experts helping athletes stay fit prevent injuries, &
                     recover faster with personalized care. We combine performance science with hands-on
                      support for athletic potential.. Certified experts helping athletes stay fit prevent injuries, & recover faster with personalized care. We combine performance science with hands-on support for athletic potential....
                </p>
                <p>
                    Certified experts helping athletes stay fit prevent injuries,
                     & recover faster with personalized care. We combine performance science with hands-on 
                     support for athletic potential..
                </p>
            </div>

            <div id="bookNowbtn" class="buttons">
                <span>A minimum of 2 hours of service booking is mandatory.</span>
                <button class="btn primary" onclick="showPopup(
                        'Are you sure you want to book the Quick Service?',
                        'logout',
                        '',
                        'Yes',
                                () => { window.location.href = '<?php echo SITE_URL; ?>pages/appointment_booking.php'; });" >Book Now
                </button>
            </div>
            
        </div>


    </div>

</div>


<script>
    const bookNowbtn = document.getElementById('bookNowbtn');

    if (loginUser.role === 'provider') {
       bookNowbtn.style.display = 'none';
    }
</script>


<?php include '../includes/footer.php'; ?>

