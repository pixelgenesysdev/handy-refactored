<?php
$page_js = 'pages_allbookings.js';
 include '../includes/head.php';
 include '../includes/userspage.php'; ?>



<div id="bookingPage">

  <div id="topbarwithbtn" class="topbarwithbtn">
    <h3>All Booking</h3>
  </div>

  <input type="search" id="searchInput" placeholder="Search User" />

  <div class="booking-list" id="bookingList">
    
  </div>

  <!-- Detail Section -->
  <div class="booking-detail hidden" id="bookingDetail">

    <div id="backBtn" class="detail-header">
      <h3 style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i>Booking Details</h3>
      <span id="detailStatus"></span>
    </div>

    <div class="detail-box">
      <h5>Service Name</h5>
      <table>
        <tr>
          <td>Service:</td>
          <td class="orange" id="detailService">Type Name</td>
        </tr>
        <tr>
          <td>Visit Charges:</td>
          <td class="orange" id="detailCharges">$10</td>
        </tr>
        <tr>
          <td>Hourly rate:</td>
          <td class="orange" id="detailRate">$05</td>
        </tr>
      </table>
    </div>

    <div class="detail-box">
      <h5 class="detail-boxtitle">Booking Details</h5>
      <table>
        <tr><td>Booking ID:</td><td class="orange" id="detailId"></td></tr>
        <tr><td>Booking Date:</td><td class="orange" id="detailDate"></td></tr>
        <tr><td>User Name:</td><td class="orange" id="detailUser"></td></tr>
        <tr><td>Phone Number:</td><td class="orange" id="detailPhone"></td></tr>
        <tr><td>E-mail Address:</td><td class="orange" id="detailEmail"></td></tr>
        <tr><td>Address:</td><td class="orange" id="detailAddress"></td></tr>
        <tr><td>Service Date:</td><td class="orange" id="detailServiceDate"></td></tr>
        <tr><td>Service Time:</td><td class="orange" id="detailServiceTime"></td></tr>
      </table>
    </div>
  </div>

</div>

<!-- review form for uer giving review by id of provider -->

  <div id="newreviewform" class="reviewformhidden d-none">

    <div id="backBtn" class="detail-header">
      <h3 style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i>Leave a Review for <span id="providername"></span></h3>
    </div>

    <div class="reviewformbody">
      <form id="reviewForm">
        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
          <option value="">Select Rating</option>
          <option value="1">1 Star</option>
          <option value="2">2 Stars</option>
          <option value="3">3 Stars</option>
          <option value="4">4 Stars</option>
          <option value="5">5 Stars</option>
        </select>

        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" rows="4" required></textarea>

        <button type="submit" class="btn btn-primary">Submit Review</button>
      </form>
    </div>
  </div>

  




<?php include '../includes/footer.php'; ?>
