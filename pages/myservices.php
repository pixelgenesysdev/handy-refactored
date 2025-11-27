<?php
include '../includes/head.php';
include '../includes/providerpage.php';
?>

<div id="pagebox">
    <div class="topbarwithbtn">
        <h3>My Services</h3>
        <button class="btn btn-primary" style="max-width: 40%;" id="createjob">Create Services</button>
    </div>

    <div id="mybookings">

        <!-- Services List -->
        <div id="ServicesLists" class="Myservice-list col-12 d-flex flex-wrap">

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

    let ServicesList = document.getElementById("ServicesLists");

    // Load Services
    function loadServices() {

        myservices.forEach(service => {
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


    }
    loadServices()

    // Create Job
    document.getElementById("createjob").addEventListener("click", () => {
        window.location.href = "create-service.php";
    });

});
</script>


