

<aside id="sidebar" class="sidebar col-md-3">
  <div class="logo mobhide">
    <img src="<?php echo SITE_URL; ?>assets/images/logo.png" style="cursor:pointer;" alt="League Live Karaoke" onclick="window.location.href='<?php echo SITE_URL; ?>pages/'" />
  </div>
            <div class="profile-image mobshow">
                <img src="../assets/images/avatar1.png" alt="User Profile"  onclick="window.location.href='user_setting.php'" style="cursor: pointer;" />
            </div>




  <nav class="menu">

    <a id="nav-btn" data-auth="yes" data-role="customer" class="btn-sidebar side-menu <?php echo ($currentPage == 'dashboard.php' || $currentPage == 'user_setting.php' || $currentPage == 'notification.php' || $currentPage == 'services.php' || $currentPage == 'services_providers.php' || $currentPage == 'services_providers.php' || $currentPage == 'services_providers_details.php' || $currentPage == 'providers_services-details.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/">
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/home.png" alt="Home" /><span>Home</span>
    </a>
    <a id="nav-btn" data-auth="yes" data-role="provider" class="btn-sidebar side-menu <?php echo ($currentPage == 'provider_dashboard.php' || $currentPage == 'user_setting.php' || $currentPage == 'notification.php' || $currentPage == 'reviews.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/provider_dashboard.php">
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/home.png" alt="Home" /><span>Home</span>
    </a>

    <a id="nav-btn" data-auth="yes" data-role="provider" class="btn-sidebar side-menu <?php echo ($currentPage == 'myservices.php' || $currentPage == 'past-experience.php' || $currentPage == 'new_service.php' || $currentPage == 'create-service.php' || $currentPage == 'providers_services-details.php'|| $currentPage == 'edit-service.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/myservices"> 
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/marketplace.png" alt="Marketplace" /><span>My Services</span>
    </a>


    <a id="nav-btn" data-auth="yes" data-role="both" class="btn-sidebar side-menu <?php echo ($currentPage == 'marketplace.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/marketplace"> 
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/marketplace.png" alt="Market Place" /><span>Market Place</span>
    </a>


    <a id="nav-btn" data-auth="yes" data-role="both" class="btn-sidebar side-menu <?php echo ($currentPage == 'transactionhistory.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/transactionhistory.php">
       <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/transaction.png" alt="Transaction" /><span>Transaction History</span>
    </a>
    <a id="nav-btn" data-auth="yes" data-role="both" class="btn-sidebar side-menu <?php echo ($currentPage == 'affiliate.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/affiliate">
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/affiliate.png" alt="Affiliate" /><span>Affiliate Earning</span>
    </a>
    <a id="nav-btn" data-auth="yes" data-role="provider" class="btn-sidebar side-menu <?php echo ($currentPage == 'alljobs.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/alljobs">
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/history.png" alt="VoteNow" /><span>All Jobs</span>
    </a>
    <a id="nav-btn" data-auth="yes" data-role="provider" class="btn-sidebar side-menu <?php echo ($currentPage == 'bankdetails.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/bankdetails">
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/history.png" alt="VoteNow" /><span>Bank Details</span>
    </a>
    <a id="nav-btn" data-auth="yes" data-role="provider" class="btn-sidebar side-menu <?php echo ($currentPage == 'payment_logs.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/payment_logs">
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/history.png" alt="VoteNow" /><span>Payment Logs</span>
    </a>
     <a id="nav-btn" data-auth="yes" data-role="provider" class="btn-sidebar side-menu <?php echo ($currentPage == 'subscription.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/subscription">
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/history.png" alt="subscription" /><span>Subscription</span>
    </a>
    <a id="nav-btn" data-auth="yes" data-role="customer" class="btn-sidebar side-menu <?php echo ($currentPage == 'allbookings.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/allbookings">
          <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/history.png" alt="allbookings" /><span>All bookings</span>
    </a>

    <a id="nav-btn" data-auth="yes" data-role="both" class="btn-sidebar side-menu <?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/about">
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/about.png" alt="VoteNow" /><span>About Us</span>
    </a>

    <a id="nav-btn" data-auth="yes" data-role="both" class="btn-sidebar side-menu <?php echo ($currentPage == 'terms.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/terms">
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/terms.png" alt="VoteNow" /><span>Terms & Conditions</span>
    </a>
    <a id="nav-btn" data-auth="yes" data-role="both" class="btn-sidebar side-menu <?php echo ($currentPage == 'policy.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/policy">
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/policy.png" alt="VoteNow" /><span>Privacy Policy</span>
    </a>


    <a id="nav-btn" data-auth="yes" data-role="both" class="btn-sidebar side-menu <?php echo ($currentPage == 'contact.php') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>pages/contact">
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/contact.png" alt="VoteNow" /><span>Contact Us</span>
    </a>


    <a id="nav-btn" 
    data-auth="yes" data-role="both" 
      class="btn-sidebar side-menu" 
      onclick="showPopup(
          'Are you sure you want to sign out?',
          'logout',
          'Sign Out?',
          'Yes',
          () => { window.location.href = '<?php echo SITE_URL; ?>auth/logout.php'; }
      );">
      <img src="<?php echo SITE_URL; ?>assets/images/sidebar-icons/logout.png" alt="VoteNow" />
      <span>Sign Out</span>
    </a>
   
  </nav>


</aside>


<script>
document.addEventListener("DOMContentLoaded", () => {
    const userData = JSON.parse(localStorage.getItem("handyUser"));
    const role = userData?.role || null;

    console.log("ROLE:", role);

    document.querySelectorAll("nav.menu a").forEach(item => {
        const itemRole = item.dataset.role;
        item.style.display = "none";

        if (itemRole === "both") {
            item.style.display = "flex";
        } 
        else if (role === "provider" && itemRole === "provider") {
            item.style.display = "flex";
        } 
        else if (role === "customer" && itemRole === "customer") {
            item.style.display = "flex";
        }
    });
});

</script>
