<?php
$page_js = 'pages_alljobs.js';

$page_css = 'page_alljobs.css';

include '../includes/head.php';
include '../includes/providerpage.php';
?>



<!-- Add jsPDF for PDF generation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<div id="bookingPage">

  <div id="topbarwithbtn" class="topbarwithbtn">
    <h3>All Jobs</h3>
  </div>
    <!-- <div class="block-toggle">
            <h4>Urgent Bookings</h4>
            <div class="toggle off" id="toggleblock">
                <input type="checkbox" id="toggle">
                <div class="slider"></div>
            </div>
    </div> -->

    <input type="search" id="searchInput" placeholder="Search by ID or Name..." />

  <!-- Booking List -->
  <div class="booking-list" id="bookingList"></div>

  <!-- Detail Section -->
  <div class="booking-detail hidden" id="bookingDetail">

    <div id="backBtn" class="detail-header">
      <h3 style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i> Booking Details</h3>
      <span id="messageicon"><i class="fa-solid fa-envelope"></i></span>
      <span id="detailStatus" class="status-badge"></span>
    </div>

    <!-- Service Name Section -->
    <div class="detail-box">
      <h5>Service Name</h5>
      <table class="detail-table">
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

    <!-- Booking Details Section -->
    <div class="detail-box">
      <h5 class="detail-boxtitle">Booking Details</h5>
      <table class="detail-table">
        <tr><td>Booking ID:</td><td class="orange" id="detailId">#0000001</td></tr>
        <tr><td>Booking Date:</td><td class="orange" id="detailDate">21/11/2025</td></tr>
        <tr><td>User Name:</td><td class="orange" id="detailUser">John Doe</td></tr>
        <tr><td>Phone Number:</td><td class="orange" id="detailPhone">111-111-1111</td></tr>
        <tr><td>E-mail Address:</td><td class="orange" id="detailEmail">john@example.com</td></tr>
        <tr><td>Address:</td><td class="orange" id="detailAddress">123 Street</td></tr>
        <tr><td>Service Date:</td><td class="orange" id="detailServiceDate">22/11/2025</td></tr>
        <tr><td>Service Time:</td><td class="orange" id="detailServiceTime">10:00 AM</td></tr>
      </table>
    </div>

    <!-- User Details Section -->
    <div class="detail-box hidden" id="providerSection">
      <h5>User Details</h5>
      <table class="detail-table">
        <tr><td>Provider Name:</td><td class="orange" id="detailProviderName">Provider A</td></tr>
        <tr><td>Provider Phone:</td><td class="orange" id="detailProviderPhone">0301-123-4567</td></tr>
      </table>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37487298.55536108!2d-140.84395936386323!3d42.30356956719025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e1!3m2!1sen!2s!4v1764184923226!5m2!1sen!2s" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <!-- <div id="mapPlaceholder" style="height: 200px; background: #f0f0f0; margin-top: 10px; display: flex; align-items: center; justify-content: center; border-radius: 8px; color: #999;">
        <i class="fa fa-map-marker-alt" style="font-size: 3em;"></i>
        <span style="margin-left: 10px;">Map Integration Placeholder</span>
      </div> -->
    </div>

    <!-- Start Time Section -->
    <div class="detail-box hidden" id="startTimeSection">
      <h5>Work Started At</h5>
      <p id="detailStartTime" class="orange" style="font-size: 1.1em; font-weight: 600;">18/11/2025 01:00 PM</p>
    </div>

    <!-- End Time Section -->
    <div class="detail-box" id="endTimeSection">
      <h5>Work End At</h5>
      <p id="detailendTime" class="orange" style="font-size: 1.1em; font-weight: 600;">18/11/2025 01:00 PM</p>
    </div>

    <!-- Images Section -->
    <div class="detail-box hidden" id="imagesSection">
      <h5 id="imagesTitle">Work Images</h5>
      <div id="beforeWorkDiv">
        <h6 style="color: #666; margin-top: 15px;">Before Work:</h6>
        <div id="beforeImagesGrid" class="images-grid"></div>
      </div>
      <div id="afterWorkDiv" class="hidden">
        <h6 style="color: #666; margin-top: 20px;">After Work:</h6>
        <div id="afterImagesGrid" class="images-grid"></div>
      </div>
    </div>

    <!-- Document Section -->
    <div class="detail-box" id="documentIconSection">
      <h5>Work Documents</h5>
      <div style="padding: 20px;">
        <i class="fa fa-file-text icon-btn" onclick="openDocumentModal(false)" style="font-size: 3em; cursor: pointer; color: #ff6b35;"></i>
      </div>
    </div>

    <!-- Invoice Section -->
    <div class="detail-box hidden" id="invoiceIconSection">
      <h5>Invoice</h5>
      <div style="padding: 20px;">
        <i class="fa fa-file-invoice-dollar icon-btn" onclick="openInvoiceModal(false, true)" style="font-size: 3em; cursor: pointer; color: #ff6b35;"></i>
      </div>
    </div>

    <!-- Rejected Reason -->
    <div class="detail-box hidden" id="rejectedSection">
      <div class="alert alert-danger">
        <strong>Rejection Reason:</strong>
        <p id="rejectedReason" style="margin: 10px 0 0 0;"></p>
      </div>
    </div>

    <!-- Actions Buttons Section -->
    <div id="actionsSection" class="detail-box actions-section"></div>

  </div>

</div>

<!-- Document Modal -->
<div id="documentModal" class="modal-overlay hidden">
  <div class="modal-container">
    <div class="modal-header">
      <h2>Work Documents</h2>
      <span class="modal-close" onclick="closeDocumentModal()">&times;</span>
    </div>
    <div class="modal-body" id="modalDocumentContent"></div>
    <div class="modal-footer">
      <button id="modalDownloadPdfBtn" class="btn btn-success hidden" onclick="downloadDocumentPDF()">
        <i class="fa fa-download"></i> Download as PDF
      </button>
      <button class="btn btn-secondary" onclick="closeDocumentModal()">Close</button>
    </div>
  </div>
</div>

<!-- Invoice Modal -->
<div id="invoiceModal" class="modal-overlay hidden">
  <div class="modal-container">
    <div class="modal-header">
      <h2>Invoice</h2>
      <span class="modal-close" onclick="closeInvoiceModal()">&times;</span>
    </div>
    <div class="modal-body" id="modalInvoiceContent"></div>
    <div class="modal-footer">
      <button class="btn btn-secondary" onclick="closeInvoiceModal()">Close</button>
    </div>
  </div>
</div>

<!-- Review Form -->
<div id="newreviewform" class="reviewformhidden d-none">

  <div id="backBtn" class="detail-header">
    <h3 style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i> Leave a Review for <span id="providername" class="orange"></span></h3>
  </div>

  <div class="container mt-4 p-4" style="max-width: 700px;">

    <form id="reviewForm">

      <!-- Star Rating -->
      <div class="mb-4">
        <label class="form-label fw-bold">Rating</label>
        <div id="starContainer" class="fs-3 text-warning" style="cursor:pointer;">
          <i class="fa-regular fa-star star" data-value="1"></i>
          <i class="fa-regular fa-star star" data-value="2"></i>
          <i class="fa-regular fa-star star" data-value="3"></i>
          <i class="fa-regular fa-star star" data-value="4"></i>
          <i class="fa-regular fa-star star" data-value="5"></i>
        </div>
        <input type="hidden" id="rating" name="rating" required>
      </div>

      <!-- Review Text -->
      <div class="mb-4">
        <label class="form-label fw-bold">Review</label>
        <textarea class="form-control p-3" id="comments" name="comments" rows="5" placeholder="Write your review here..." required></textarea>
      </div>

      <!-- Submit Button -->
      <div class="text-end">
        <button class="btn btn-primary" type="submit" style="padding: 10px 30px;">Submit Review</button>
      </div>

    </form>

  </div>

</div>



<script>
  // Star Rating Logic
  const stars = document.querySelectorAll(".star");
  const ratingInput = document.getElementById("rating");

  stars.forEach(star => {
    star.addEventListener("mouseover", function () {
      const value = this.getAttribute("data-value");
      highlightStars(value);
    });

    star.addEventListener("mouseleave", function () {
      highlightStars(ratingInput.value);
    });

    star.addEventListener("click", function () {
      const value = this.getAttribute("data-value");
      ratingInput.value = value;
      highlightStars(value);
    });
  });

  function highlightStars(rating) {
    stars.forEach(star => {
      if (star.getAttribute("data-value") <= rating) {
        star.classList.remove("fa-regular");
        star.classList.add("fa-solid");
      } else {
        star.classList.add("fa-regular");
        star.classList.remove("fa-solid");
      }
    });
  }

  // Review Form Submission
  document.getElementById('reviewForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const rating = document.getElementById('rating').value;
    const comments = document.getElementById('comments').value;
    
    if (!rating) {
      alert('Please select a rating');
      return;
    }

    console.log('Review Submitted:', { rating, comments });
    alert('Review submitted successfully!');
    
    // Reset form and go back
    this.reset();
    ratingInput.value = '';
    highlightStars(0);
    document.getElementById('newreviewform').classList.add('d-none');
    document.getElementById('bookingDetail').classList.remove('hidden');
  });
</script>

<?php include '../includes/footer.php'; ?>