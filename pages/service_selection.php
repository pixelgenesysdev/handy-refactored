<?php include '../includes/head.php'; ?>

<div id="ServicesSelectionPage" class="provider-profile">

    <div class="topbarwithbtn">
        <h3 onclick="history.back()" style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i>Service Selection</h3>
    </div>

    <div id="ServicesSelectionPagecontent" class="provider-profile">

        <div class="service-wrapper">
        <div class="service-section">
            <h4>Section 1 - Primary Service</h4>
            <div class="select-box">
            <div class="label">Select Service</div>
            <select>
                <option>Select Service</option>
                <option>Logo Design</option>
                <option>Web Development</option>
                <option>SEO Optimization</option>
                <option>Content Writing</option>
            </select>
            </div>
        </div>

        <div class="service-section">
            <h4>Section 2 - Secondary Service</h4>
            <div class="select-box">
            <div class="label">Select Service</div>
            <select>
                <option>Select Service</option>
                <option>Social Media Marketing</option>
                <option>Graphic Design</option>
                <option>Video Editing</option>
                <option>Email Marketing</option>
            </select>
            </div>
        </div>
        </div>

        <div class="note">
            <strong>Note:</strong> *You can discuss and confirm this with the service provider later. Charges will be added only if agreed.
        </div>

        <div class="ServicesSelectionbtn" >
            <button class="btn btn-primary" onclick="window.location.href='<?php echo SITE_URL; ?>pages/payment_methods.php'">Continue</button>
        </div>

    </div>


</div>



<?php include '../includes/footer.php'; ?>

