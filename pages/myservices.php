<?php
$page_js = '';
include '../includes/head.php';
include '../includes/providerpage.php';
?>

<div id="pagebox">
    <div class="topbarwithbtn">
        <h3>My Services</h3>
    </div>

    <div id="mybookings">

        <!-- Services List -->
        <div id="ServicesLists" class="Myservice-list col-12 d-flex flex-wrap"></div>

        <button class="btn btn-primary" style="max-width: 40%;" id="loadMore">Load More</button>
        <button class="btn btn-primary" style="max-width: 40%;" id="createjob">Create Job</button>

        <div class="col-lg-12 content_box d-flex flex-wrap" style="margin: 20px 0;">
            <div class="contentboxmain col-lg-6 col-md-12 p-1">
                <div class="contentbox flex-wrap d-flex align-items-center" style="background-color: #FEF7EC;border-radius: 15px;">
                    <div class="col-lg-6 content" style="padding: 15px; text-align: left;">
                        <h3>Our Story?</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's Lorem Ipsum 
                            is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's Lorem Ipsum 
                            is simply dummy text of the printing and typesetting. </p>
                    </div>
                    <div class="col-lg-6 imagecontent">
                        <img src="<?php echo SITE_URL; ?>assets/images/ourstory.png" alt="" width="100%">
                    </div>

                </div>
            </div>
            <div class="contentboxmain col-lg-6 col-md-12 p-1 ">
                <div class="contentbox d-flex flex-wrap align-items-center" style="background-color: #FEF7EC;border-radius: 15px;">
                    <div class="col-lg-6 content" style="padding: 15px; text-align: left;">
                        <h3>Our AIM?</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's Lorem Ipsum 
                            is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's Lorem Ipsum 
                            is simply dummy text of the printing and typesetting. </p>
                    </div>
                    <div class="col-lg-6 imagecontent">
                        <img src="<?php echo SITE_URL; ?>assets/images/ourstory.png" alt="" width="100%">
                    </div>

                </div>
            </div>
        </div>

        <style>
            .contentbox p { font-size: 15px !important; }
            .service-item { cursor: pointer; transition: transform 0.3s ease; } 
        </style>


    </div>
</div>

<?php include '../includes/footer.php'; ?>


<!-- ==========================================
      JavaScript for Services + Load More
=========================================== -->
<script>
document.addEventListener("DOMContentLoaded", () => {


    const ServicesList = document.getElementById("ServicesLists");
    const loadMoreBtn = document.getElementById("loadMore");

    let currentIndex = 0;
    const itemsPerLoad = 3;

    // Load services in chunks of 3
    function loadServices() {
        const end = currentIndex + itemsPerLoad;
        const servicesToShow = myservices.slice(currentIndex, end);

        servicesToShow.forEach(service => {
            const item = document.createElement("div");
            item.classList.add('col-12', 'col-md-6', 'col-lg-4', 'mb-4','Listofservicesitem');

            item.innerHTML = `
                <div class="servicebox" style="cursor: pointer;" onclick="window.location.href='${SITE_URL}pages/providers_services-details.php?service=${service.id}'">
                    <div class="serviceimage">
                        <img src="${SITE_URL}assets/images/services-images/${service.image}" alt="${service.name}">
                    </div>
                    <div class="servicename">
                        <div class="serviceicon">
                            <img src="${SITE_URL}assets/images/services-images/${service.image}" alt="${service.name}">
                        </div>
                        <div class="servicetext">
                            <h5>${service.name}</h5>
                            <p>${service.discription}</p>
                        </div>
                    </div>
                </div>
            `;
            ServicesList.appendChild(item);
        });

        currentIndex = end;

        // Hide Load More button when all services are loaded
        if (currentIndex >= myservices.length) {
            loadMoreBtn.style.display = "none";
        }
    }

    // Load first 3 services
    loadServices();

    // Load more on click
    loadMoreBtn.addEventListener("click", loadServices);

    // Create Job
    document.getElementById("createjob").addEventListener("click", () => {
        window.location.href = "new_service.php";
    });

});
</script>


