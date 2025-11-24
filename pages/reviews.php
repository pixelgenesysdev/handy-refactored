<?php
$page_css = 'pages_reviews.css';
$page_js = 'pages_reviews.js';
 include '../includes/head.php'; 
include '../includes/bothpage.php';
?>


<div id="reviewsPage">
    <div class="topbarwithbtn" class="withbackbutton">
        <h3 onclick="history.back()" style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i>Reviews</h3>
    </div>


    <div class="reviews-section">

        <div class="rating-summary">
            <div class="rating-bars" id="ratingBars"></div>
            <div class="avg-rating">
            <h2 id="avgRating">0.0</h2>
            <p id="totalReviews">0 Reviews</p>
            </div>
        </div>

        <div id="reviewsContainer"></div>
        </div>


    </div>
</div>



<?php include '../includes/footer.php'; ?>