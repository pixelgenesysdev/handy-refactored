<?php
$page_js = '';
include '../includes/head.php';
include '../includes/providerpage.php';
?>
<script>
    
    function BecomePro(e) {
        e.classList.add("d-none");
    
            showPopup(
            'Are you sure you want to become a pro?',
            'pro',
            'Confirm Become a Pro',
            'OK',
            () => {
                setTimeout(() => {
                    showPopup(
                    'You’re now a Pro handyman.Premium tasks are live.',
                    'success',
                    'You’re officially a Pro',
                    'OK',
                    () => {
                        ProRequests.classList.remove("d-none");
                    }
                    );
                    
                }, 500);
                
            }
            );

    

    }



    </script>
<div id="pagebox">
    <div class="topbarwithbtn mb-4">
        <h3>My Services</h3>
        <button class="btn btn-primary black    " id="VeiwAll" onclick="BecomePro(this)">Become a Pro</button>
        <button class="btn btn-primary  d-none  " id="ProRequests" onclick="window.location.href='<?php echo SITE_URL; ?>pages/pro-requests.php'">Pro Requests</button>
    </div>

    <!-- toggle urgent -->
    <div class="block-toggle">
            <h4>Urgent Bookings</h4>
            <!-- toggle -->
            <div class="toggle off" id="toggleblock">
                <input type="checkbox" id="toggle">
                <div class="slider"></div>
            </div>
    </div>
    <!-- Dashboard Section -->
    <div id="mybookings">

        <!-- Pending Jobs Section -->
        <div style="margin-bottom: 30px;">
            <h4 style="margin-bottom: 15px; font-weight: 600;">Pending Jobs</h4>
            <div id="PendingJobsList" class="booking-list"></div>
        </div>

        <!-- Services List -->
        <div style="margin-bottom: 30px;">
            <h4 style="margin-bottom: 15px; font-weight: 600;">My Services</h4>
            <div id="ServicesLists" class="Myservice-list col-12 d-flex flex-wrap"></div>
        </div>

        <button class="btn btn-primary" id="VeiwAll" onclick="window.location.href='<?php echo SITE_URL; ?>pages/alljobs.php'">View All Jobs</button>
        <button class="btn btn-primary" id="createjob">Create Services</button>

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
            
            /* Booking Item Styles (same as alljobs page) */
            .booking-list {
                padding: 15px 0;
            }

            .booking-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px;
                margin-bottom: 10px;
                background: white;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                cursor: pointer;
                transition: transform 0.2s;
            }

            .booking-item:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            }

            .booking-left {
                flex: 1;
            }

            .booking-date {
                color: #999;
                font-size: 0.9em;
                margin-bottom: 5px;
            }

            .booking-id {
                font-size: 1em;
            }

            .booking-right {
                text-align: right;
            }

            .booking-status {
                display: inline-block;
                padding: 5px 15px;
                border-radius: 20px;
                font-size: 0.85em;
                font-weight: 600;
            }

            /* Status Colors */
            .booking-status.pending { background: #f0f0f0; color: #666; }
            .booking-status.assigned { background: #e3f2fd; color: #1976d2; }
            .booking-status.route { background: #e8f5e9; color: #388e3c; }
            .booking-status.started { background: #fff9c4; color: #f57f17; }
            .booking-status.completed_unpaid { background: #ffe0b2; color: #e65100; }
            .booking-status.completed { background: #c8e6c9; color: #2e7d32; }
            .booking-status.unpaid_urgent { background: #ffebee; color: #c62828; border: 2px solid #c62828; }
            .booking-status.rejected { background: #ffcdd2; color: #b71c1c; }
        </style>


    </div>
</div>

<?php include '../includes/footer.php'; ?>


<!-- ==========================================
      JavaScript for Services + Pending Jobs
=========================================== -->
<script>
document.addEventListener("DOMContentLoaded", () => {

    const ServicesList = document.getElementById("ServicesLists");
    const PendingJobsList = document.getElementById("PendingJobsList");

    let currentIndex = 0;
    const itemsPerLoad = 3;

    // Sample booking data for dashboard (simplified version)
    const dashboardBookingData = [
        {
            id: '0000001',
            date: '21/11/2025',
            status: 'pending',
            price: 10,
            user: 'John Doe Pending',
            phone: '111-111-1111',
            email: 'john.pending@example.com',
            address: '123 Pending St, City',
            service: 'Cleaning Service',
            hourlyRate: 5,
            serviceDate: '22/11/2025',
            serviceTime: '10:00 AM'
        },
        {
            id: '0000002',
            date: '20/11/2025',
            status: 'pending',
            price: 15,
            user: 'Jane Smith',
            phone: '222-222-2222',
            email: 'jane.smith@example.com',
            address: '456 Main Ave',
            service: 'Plumbing',
            hourlyRate: 8,
            serviceDate: '21/11/2025',
            serviceTime: '11:00 AM'
        }
    ];

    // Status text mapping
    const statusTextMap = {
        pending: "Pending",
        assigned: "Assigned",
        route: "In Route",
        started: "Started",
        completed_unpaid: "Completed Unpaid",
        completed: "Completed",
        unpaid_urgent: "Unpaid Urgent",
        rejected: "Rejected"
    };

    // Load pending jobs
    function loadPendingJobs() {
        const pendingJobs = dashboardBookingData.filter(booking => booking.status === 'pending').slice(0, 2);
        
        if (pendingJobs.length === 0) {
            PendingJobsList.innerHTML = '<p style="text-align: center; padding: 40px; color: #999;">No pending jobs available</p>';
            return;
        }

        pendingJobs.forEach(job => {
            const item = document.createElement('div');
            item.className = 'booking-item';
            
            item.innerHTML = `
                <div class="booking-left">
                    <div class="booking-date">${job.date}</div>
                    <div class="booking-id">Booking ID: <strong>#${job.id}</strong></div>
                    <div style="margin-top: 5px; font-size: 0.9em; color: #666;">
                        <strong>${job.service}</strong> • ${job.user} • ${job.serviceDate} at ${job.serviceTime}
                    </div>
                </div>
                <div class="booking-right">
                    <div class="booking-status ${job.status}">${statusTextMap[job.status] || job.status}</div>
                </div>
            `;
            
            item.addEventListener('click', () => viewJobDetail(job.id));
            PendingJobsList.appendChild(item);
        });
    }

    // Function to view job detail
    function viewJobDetail(jobId) {
        // Navigate to alljobs page and trigger detail view
        window.location.href = `${SITE_URL}pages/alljobs.php?job=${jobId}`;
    }

    // Make function globally available
    window.viewJobDetail = viewJobDetail;

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
            if (typeof loadMoreBtn !== 'undefined') {
                loadMoreBtn.style.display = "none";
            }
        }
    }

    // Load pending jobs first
    loadPendingJobs();

    // Load first 3 services
    loadServices();

    // Create Job
    document.getElementById("createjob").addEventListener("click", () => {
        window.location.href = "new_service.php";
    });

});
</script>


