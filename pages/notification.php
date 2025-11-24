<?php
$page_js = 'pages_notification.js';
 include '../includes/head.php'; 
 include '../includes/bothpage.php';
?>



 

<div id="notificationPage">

   <div class="topbarwithbtn">
        <h3>Notification</h3>
    </div>

    <div class="filter-container">
      <select id="statusFilter">
        <option value="all">All</option>
        <option value="showing">Showing</option>
        <option value="hidden">Hidden</option>
      </select>
    </div>

  <div class="notifications-list" id="notificationsList">
    <!-- Notifications will be appended here -->
  </div>

</div>








<?php include '../includes/footer.php'; ?>
