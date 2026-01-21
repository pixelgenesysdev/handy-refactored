 <?php
$page_js = 'auth_otp.js';
 include 'includes/header.php'; ?>



<div class="col-md-6 firstcol align-items-center d-flex p-0 text-center justify-content-center align-items-center">
    <div class="firstcol-wrapper">
        <div class="firstcol-box">
            <img src="./assets/img/forgot-icon.png" alt="forgot-icon" class="forgot-icon">
            <h2>Verification</h2>
             <p>Please check your email for verification code.
                Your code is 4 digit in length.</p>
             
                <form>
                <div class="otp-inputs">
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                </div>
                <div class="timer">Code expires in <strong id="timer">00:30s</strong></div>
                </form>
                <button id="continueBtn" type="submit" class="btn btn-primary" onclick="  window.location.href = 'reset-password.php'" >Continue</button>
                <div class="resend">
                Didn't get code? <a href="otp.php" class="disabled" >Resend Code</a>
                </div>


            
        </div>
    </div>
</div>

  



<?php include 'includes/footer.php'; ?>







