<?php include '../includes/head.php'; ?>

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
                <img src="<?php echo SITE_URL; ?>assets/images/cleaningimage.png" alt="Certificate">
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

            <div class="profile-tags">
                <div class="tag">$10.00<br><span>Visit Charges</span></div>
                <div class="tag">$05.00<br><span>Hourly rate</span></div>
            </div>
            <div class="buttons">
                <span>A minimum of 2 hours of service booking is mandatory.</span>
                <button class="btn primary" onclick="showPopup(
          'Are you sure you want to book the Quick Service?',
          'logout',
          '',
          'Yes',
                () => { window.location.href = '<?php echo SITE_URL; ?>pages/appointment_booking.php'; });" >Book Now</button>
            </div>
            
        </div>



    </div>

</div>




<?php include '../includes/footer.php'; ?>

