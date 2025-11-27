<?php
$page_js = 'pages_allbookings.js';
 include '../includes/head.php';
 include '../includes/userspage.php'; ?>



<div id="bookingPage">

  <div id="topbarwithbtn" class="topbarwithbtn">
    <h3>Booking History</h3>
  </div>

  <input type="search" id="searchInput" placeholder="Search Here" />

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

      <div id="newreviewform" class="reviewformhidden">
      <div class="review-card">
        <div id="backBtn" class="detail-header">
          <h3><i class="fa-solid fa-arrow-left"></i> Leave a Review for <span id="providername">Provider Name</span></h3>
        </div>

        <form id="reviewForm" class="review-form">
          
          <!-- Star Rating -->
          <div class="form-group">
            <label for="rating">Rating:</label>
            <div class="star-rating">
              <input type="radio" id="star5" name="rating" value="5" required>
              <label for="star5" title="5 stars">&#9733;</label>

              <input type="radio" id="star4" name="rating" value="4">
              <label for="star4" title="4 stars">&#9733;</label>

              <input type="radio" id="star3" name="rating" value="3">
              <label for="star3" title="3 stars">&#9733;</label>

              <input type="radio" id="star2" name="rating" value="2">
              <label for="star2" title="2 stars">&#9733;</label>

              <input type="radio" id="star1" name="rating" value="1">
              <label for="star1" title="1 star">&#9733;</label>
            </div>
          </div>

          <!-- Comments -->
          <div class="form-group">
            <label for="comments">Comments:</label>
            <textarea id="comments" name="comments" rows="4" placeholder="Write your review here..." required></textarea>
          </div>



        </form>
          <!-- Submit Button -->
          <button type="submit" id="submitBtnreview" class="btn-submit btn btn-primary">Submit Review</button>
      </div>
    </div>

  </div>

<script>
  const submitBtnreview = document.getElementById('submitBtnreview');

  submitBtnreview.addEventListener('click', function() {
    showPopup(
      'Review submitted successfully!',
      'success',
      'Success',
      'OK',
      () => {
        window.location.reload();
      }
    );
  })
</script>
  <style>

/* Card style */


.review-card:hover {
    transform: translateY(-2px);
}

/* Header */
.detail-header h3 {
    font-size: 1.3rem;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    color: #333;
}


/* Form */
.review-form .form-group {
    margin-bottom: 20px;
}

.review-form label {
    display: block;
    margin: 18px 0 9px;
    font-weight: 600;
    color: #555;
}

/* Textarea */
.review-form textarea {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 1rem;
    resize: vertical;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.review-form textarea:focus {
    outline: none;
    border-color: #007BFF;
    box-shadow: 0 0 6px rgba(0,123,255,0.3);
}

/* Star Rating */
.star-rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    gap: 5px;
}

.star-rating input[type="radio"] {
    display: none;
}

.star-rating label {
    font-size: 2rem;
    color: #ccc;
    cursor: pointer;
    transition: color 0.3s;
    margin: 0;
    line-height: 22px;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
    color: #ffca08;
}

.star-rating input[type="radio"]:checked ~ label {
    color: #ffca08;
}

/* Submit Button */
.btn-submit {
    width: 100%;
    padding: 12px;
    color: #fff;
    font-weight: 600;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}

.btn-submit:hover {
    transform: translateY(-2px);
}

/* Responsive */
@media(max-width: 576px) {
    .review-card {
        padding: 20px;
    }
}


form#reviewForm {
    padding-top: 20px;
}
  </style>

  




<?php include '../includes/footer.php'; ?>
