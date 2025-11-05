<?php include '../includes/head.php'; ?>

<div id="paymentmethodPage" class="provider-profile">

    <div class="topbarwithbtn">
        <h3 onclick="history.back()" style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i>Choose Your Payment Method</h3>
    </div>

    <div id="paymentmethodPagecontent" class="provider-profile">

        <div class="payment-options">
            <div class="payment-item">
                <input type="radio" id="credit" name="payment" value="credit">
                <label for="credit">Credit Card</label>
            </div>

            <div class="payment-item">
                <input type="radio" id="google" name="payment" value="google">
                <label for="google">Google Play</label>
            </div>

            <div class="payment-item">
                <input type="radio" id="apple" name="payment" value="apple">
                <label for="apple">Apple Pay</label>
            </div>
        </div>

        <div class="paymentmethodbtn" >
            <button class="btn btn-primary" onclick="showPopup('Payment Succesfuly Done','success','Payment Done','Go to My Bookings',() => {window.location.href = '<?php echo SITE_URL; ?>pages/allbookings.php'})">Continue</button>
        </div>
    </div>


</div>



<?php include '../includes/footer.php'; ?>

