<?php

include '../includes/head.php'; 
include '../includes/bothpage.php'; ?> 


<div id="ServicesUserdetailsPage" class="provider-profile">

    <div class="topbarwithbtn">
        <h3 onclick="history.back()" style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i>Service Detail</h3>
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
                <div id="button_boxtop">
                    <button class="btn btn-primary" id="reviewsbtn" onclick="window.location.href='<?php echo SITE_URL; ?>pages/reviews.php'">Reviews</button>
                    <button class="btn btn-primary" id="editService" onclick="window.location.href='<?php echo SITE_URL; ?>pages/myservicedetail.php'">Edit Service</button>
                </div>
                
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
            <div id="servicesdetailforprovider">
                
                <div class="servicesdetailforproviderbox">
                    <div class="row">
                        <div>Visiting Amount:</div>
                        <div class="amount">$30</div>
                    </div>
                    <div class="row">
                        <div>Price on Profile:</div>
                        <div class="amount">$10</div>
                    </div>
                    <div class="row">
                        <div>Per Hour Amount:</div>
                        <div class="amount">$10</div>
                    </div>
                    <div class="row">
                        <div>Price on Profile:</div>
                        <div class="amount">$20</div>
                    </div>
                </div>

                <div class="servicesdetailforproviderbox">
                    <div class="title">Quick Service</div>

                    <div class="row">
                        <div>Visiting Amount:</div>
                        <div class="amount">$50</div>
                    </div>

                    <div class="row">
                        <div>Per Hour Amount:</div>
                        <div class="amount">$60</div>
                    </div>
                </div>

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

    const servicesdetailforprovider = document.getElementById('servicesdetailforprovider');
    const reviewsbtn = document.getElementById('reviewsbtn');
    const editService = document.getElementById('editService');
    const button_boxtop = document.getElementById('button_boxtop'); // Add this line to get the button_boxtop
    button_boxtop.innerHTML = '';
    if (loginUser.role === 'provider') {
        servicesdetailforprovider.innerHTML =
        `<div id="servicesdetailforproviderinner">      
                <div class="servicesdetailforproviderbox">
                    <div class="row">
                        <div>Visiting Amount:</div>
                        <div class="amount">$30</div>
                    </div>
                    <div class="row">
                        <div>Price on Profile:</div>
                        <div class="amount">$10</div>
                    </div>
                    <div class="row">
                        <div>Per Hour Amount:</div>
                        <div class="amount">$10</div>
                    </div>
                    <div class="row">
                        <div>Price on Profile:</div>
                        <div class="amount">$20</div>
                    </div>
                </div>

                <div class="servicesdetailforproviderbox">
                    <div class="title">Quick Service</div>

                    <div class="row">
                        <div>Visiting Amount:</div>
                        <div class="amount">$50</div>
                    </div>
 
                    <div class="row">
                        <div>Per Hour Amount:</div>
                        <div class="amount">$60</div>
                    </div>
                </div>
        </div>`;
        button_boxtop.innerHTML = `
            <button class="btn btn-primary" id="ServicePastexperience">Past Experience</button>
            <button class="btn btn-primary" id="editService" onclick="window.location.href='<?php echo SITE_URL; ?>pages/edit-service.php'">Edit Service</button> 
            <button class="btn btn-primary" id="deleteService"><i class="fa fa-trash" aria-hidden="true"></i>Delete Service</button>
        `;
    }else{
        servicesdetailforprovider.innerHTML = '';
        button_boxtop.innerHTML = `<button class="btn btn-primary" id="reviewsbtn" onclick="window.location.href='<?php echo SITE_URL; ?>pages/reviews.php'">Reviews</button>`;
    }

    const ServicePastexperience = document.getElementById('ServicePastexperience');
    ServicePastexperience.addEventListener('click', () => {
        window.location.href = '<?php echo SITE_URL; ?>pages/past-experience.php';
    })
const deleteService = document.getElementById('deleteService');
deleteService.addEventListener('click', () => {
    showPopup(
        'Are you sure you want to delete this service?',
        'delete',
        'Delete Service',
        'Yes',
        () => {
            window.location.href = '<?php echo SITE_URL; ?>pages/myservices.php';
        }
    )
})
</script>
<style>
    #servicesdetailforprovider {
    padding: 20px 0 0;
}

.servicesdetailforproviderbox {
    background: #fff;
    padding: 10px 25px;
    margin-bottom: 15px;
    border: 1px solid #e3e3e3;
    border-radius: 6px;
}

.servicesdetailforproviderbox .title {
    font-weight: bold;
    margin-bottom: 12px;
    font-size: 21px;
    font-weight: 600;
}

.servicesdetailforproviderbox .row {
    display: flex;
    justify-content: space-between;
    margin: 4px 0;
    font-size: 15px;
}

.servicesdetailforproviderbox .amount {
    color: #ff7a2c;
    font-weight: bold;
}


.servicesdetailforproviderbox .row div {
    width: fit-content;
    padding: 0;
}
</style>

<?php include '../includes/footer.php'; ?>

