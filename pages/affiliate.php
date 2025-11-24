<?php
$page_js = 'pages_affiliate.js';
 include '../includes/head.php';
 include '../includes/userspage.php'; ?>





<div id="affiliatepage">

    <div class="topbarwithbtn">
        <h3>Affiliate Earning</h3>
    </div>

    <div class="referral-container">
    <div class="total-earnings" id="totalEarnings">$0.00 <span>Total Earnings </span></div>
    <div class="referral-code-box">
        <div class="referral-code" id="referralCode">CODE12345</div>
        <button class="copy-btn" onclick="copyReferralCode()">Copy</button>
    </div>
    </div>

    <div class="earnings-list" id="earningsList">
    <!-- List items will be injected here -->
    </div>


</div>






<?php include '../includes/footer.php'; ?>