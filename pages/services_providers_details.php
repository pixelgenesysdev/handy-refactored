<?php include '../includes/head.php'; ?>

<div id="ServicesUserdetailsPage" class="provider-profile">

    <div class="topbarwithbtn">
        <h3 onclick="history.back()" style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i>Services Provider Detail</h3>
    </div>

    <div class="profile-container d-flex flex-wrap">

        <!-- Left Section -->
        <div class="profile-left col-lg-8   col-md-12">
            <div class="profile-header">
                <img src="<?php echo SITE_URL; ?>assets/images/avatar1.png" alt="Profile" class="profile-pic">
                <div class="profile-info">
                    <h2>James Anderson</h2>
                    <span class="status active">Active Now</span>
                </div>
            </div>

            <div class="about">
                <h4>About Us</h4>
                <p>
                    Certified experts helping athletes stay fit, prevent injuries, and recover faster with personalized care.
                    We combine performance science with hands-on support for athletic potential.
                </p>
                <p>
                    Certified experts helping athletes stay fit, prevent injuries, and recover faster with personalized care.
                    We combine performance science with hands-on support for athletic potential.
                </p>
            </div>

            <div class="profile-tags">
                <div class="tag">10Y<br><span>Experience</span></div>
                <div class="tag">English<br><span>Language</span></div>
                <div class="tag">Male<br><span>Gender</span></div>
            </div>
            <div id="serviceslists" class="services-lists d-flex flex-wrap gap-3">    

                    <div class="servicebox" style="cursor: pointer;" onclick="window.location.href='<?php echo SITE_URL; ?>pages/providers_services-details.php'" id="serviceboxmain">
                        <div class="serviceimage">
                            <img src="../assets/images/services-images/cleaning_service_image.webp" alt="cleaning_service_image.webp Icon">
                        </div>
                        <div class="servicename">
                            <div class="serviceicon">
                                <img src="../assets/images/servicesiconbox.png" alt="Cleaning Icon">
                            </div>
                            <div class="servicetext">    
                                <h5>Cleaning</h5>
                                <p>Cleaning discription lorem ipsum dolor sit amet consectetur adipiscing elit</p>
                            </div>
                        </div>
                    </div>
                    <div class="servicebox" style="cursor: pointer;" onclick="window.location.href='<?php echo SITE_URL; ?>pages/providers_services-details.php'" id="serviceboxmain">
                        <div class="serviceimage">
                            <img src="../assets/images/services-images/complete-kitchen-remodel.webp" alt="complete-kitchen-remodel Icon">
                        </div>
                        <div class="servicename">
                            <div class="serviceicon">
                                <img src="../assets/images/servicesiconbox.png" alt="Cleaning Icon">
                            </div>
                            <div class="servicetext">    
                                <h5>Kitchen</h5>
                                <p>Upgrade kitchen layout, cabinets, countertops, and overall modern functionality.</p>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>

        <!-- Right Section -->
        <div class="profile-right col-lg-4 col-md-12">
            <h4>Certificate Details</h4>
            <div class="certificate-details">
                <p><strong>Institute Name:</strong> Institute lorem ipsum dolor sit amet</p>
                <p><strong>Certificate Title:</strong> Institute lorem ipsum dolor sit amet</p>
            </div>

            <div class="certificate-img">
                <img src="<?php echo SITE_URL; ?>assets/images/certificate.png" alt="Certificate">
            </div>

            <div class="buttons">
                <button class="btn primary">Past Work</button>
                <button class="btn outline" onclick="window.location.href='<?php echo SITE_URL; ?>pages/reviews.php'">Reviews</button>
            </div>
        </div>

    </div>

</div>




<?php include '../includes/footer.php'; ?>

