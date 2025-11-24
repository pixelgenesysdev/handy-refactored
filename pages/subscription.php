<?php
$page_js = 'pages_services.js';
 include '../includes/head.php';
  include '../includes/providerpage.php';
?>

<div id="subscriptionPage">


    <div id="planpagecontent" style="display: none;">
        <div class="topbarwithbtn" class="withbackbutton">
            <h3 style="cursor: pointer;">Subscription Plan</h3>
        </div>

        <div class="content" style="width: 80%;">
                <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                </p>
        </div>

        <div class="pricing-container col-sm-12 col-md-12 col-lg-12 d-flex flex-wrap ">
                <!-- Starter -->
                <div class="pricing-card black col-sm-12 col-md-12 col-lg-4" onclick="selectPlan('Starter Package - Legal Intelligence & Support', 258)">
                    <div class="inner">
                        <div class="maininfo">
                            <h4>Starter Package - Legal Intelligence & Support</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </div>
                        <p class="price">Price: <span>$258.00</span></p>
                    </div>
                </div>

                <!-- Monthly -->
                <div class="pricing-card orange col-sm-12 col-md-12 col-lg-4" onclick="selectPlan('Monthly', 258)">
                    <div class="inner">
                        <div class="maininfo">
                            <h3>Monthly</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </div>
                        <p class="price">Price: <span>$258.00</span></p>
                    </div>
                </div>

                <!-- Yearly -->
                <div class="pricing-card black col-sm-12 col-md-12 col-lg-4" onclick="selectPlan('Yearly', 258)">
                    <div class="inner">
                        <div class="maininfo">
                            <h3>Yearly</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </div>
                        <p class="price">Price: <span>$258.00</span></p>
                    </div>
                </div>
        </div>
    </div>

    <div id="planpagelogs">
        <div class="topbarwithbtn" class="withbackbutton">
            <h3 style="cursor: pointer;">Subscription Log</h3>
        </div>

        <div class="subscription-section">
            <div class="topheadingbtn">
                <h4>Current Subscription</h4>
                <button id="cancel-btn" class="cancel-btn">Cancel Subscription</button>
            </div>
            <div class="subscription-box">
            <div class="subscription-item">
                <span>Subscribed On:</span>
                <span class="value">Reviews</span>
            </div>
            <div class="subscription-item">
                <span>Expires On:</span>
                <span class="value">Sept 27, 2022</span>
            </div>
            <div class="subscription-item">
                <span>Amount Paid:</span>
                <span class="value">$200.00</span>
            </div>
            <div class="subscription-item">
                <span>Duration:</span>
                <span class="value">Monthly</span>
            </div>
            </div>
        </div>

        <div class="subscription-section">
            <h4>Past Subscription</h4>
            <div class="subscription-box">
            <div class="subscription-item">
                <span>Subscribed On:</span>
                <span class="value">Sept 27, 2022</span>
            </div>
            <div class="subscription-item">
                <span>Expired On:</span>
                <span class="value">Sept 26, 2023</span>
            </div>
            <div class="subscription-item">
                <span>Amount Paid:</span>
                <span class="value">$200</span>
            </div>
            <div class="subscription-item">
                <span>Duration:</span>
                <span class="value">Yearly</span>
            </div>
            </div>

            <div class="subscription-box">
            <div class="subscription-item">
                <span>Subscribed On:</span>
                <span class="value">Sept 27, 2022</span>
            </div>
            <div class="subscription-item">
                <span>Expired On:</span>
                <span class="value">Sept 26, 2023</span>
            </div>
            <div class="subscription-item">
                <span>Amount Paid:</span>
                <span class="value">$200</span>
            </div>
            <div class="subscription-item">
                <span>Duration:</span>
                <span class="value">Yearly</span>
            </div>
            </div>
        </div>


    </div>
    
</div>

<script>
        function selectPlan(planName, price) {
        // Save selected plan info to localStorage
        localStorage.setItem("selectedPlan", JSON.stringify({ planName, price }));

        // Redirect to plan details page
        window.location.href = "payment_methods.php";
        }

        const planpagelogs = document.getElementById('planpagelogs');
        const planpagecontent = document.getElementById('planpagecontent');
        const cancelbtn = document.getElementById('cancel-btn');
        cancelbtn.addEventListener('click', () => {
           showPopup( 
            'Are you sure you want to cancel your subscription?',
            'delete',
            'Cancel Subscription',
            'Yes',
            () => {
               planpagelogs.style.display = 'none';
               planpagecontent.style.display = 'block';
            }
           );
        });

</script>

<style>
    div#subscriptionPage {
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    .pricing-card .inner {
         border-radius: 16px;
         margin: 5px;
         padding: 25px;
         color: #fff;
         cursor: pointer;
         transition: transform 0.3s, box-shadow 0.3s;
         display: flex;
         flex-direction: column;
         justify-content: space-between;
             height: 100%;  
    }

    .pricing-card .inner:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .pricing-card.black .inner {
      background-color: #000;
    }

    .pricing-card.orange .inner {
      background-color: #ff6600;
    }

    .pricing-card h3 {
        margin-top: 0;
        color: white !important;
        font-size: 38px !important;
        font-weight: 400 !important;
        line-height: 50px;
    }
    .pricing-card h4 {
        font-size: 22px;
        font-weight: 400;
    }
    .pricing-card p {
        font-size: 16px;
        line-height: 1.6;
        color: #fff;
        opacity: 0.9;
    }

    .pricing-card .price {
      font-weight: 700;
      color: #fff;
      font-family: 'roboto' !important;
      font-size: 27px;
      margin: 20px 0px 0px !important;
    }

    .price span {
      font-weight: 600;
      color: #fff;
    }

    @media (max-width: 768px) {
      .pricing-container {
        flex-direction: column;
        align-items: center;
      }
    }

    
    h4 {
      font-weight: 600;
      margin-bottom: 10px;
    }

    .subscription-section {
      margin-bottom: 30px;
    }

    .subscription-box {
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 20px;
      background-color: #fff;
    }

    .subscription-item {
      display: flex;
      justify-content: space-between;
      padding: 5px 0;
    }

    .subscription-item span {
      color: #555;
    }

    .subscription-item .value {
      color: #ff6600;
      font-weight: 500;
    }

    .cancel-btn {
      background-color: #ff6600;
      color: white;
      border: none;
      padding: 14px 34px;
      font-size: 18px;
      border-radius: 10px;
      cursor: pointer;
      font-weight: 500;
    }

    .cancel-btn:hover {
      background-color: #e65c00;
    }

    .subscription-box + .subscription-box {
      margin-top: 20px;
    }

    .topheadingbtn {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 0px 20px;
    }

    .topheadingbtn h4 {
        margin: 0;
    }
</style>


<?php include '../includes/footer.php'; ?>