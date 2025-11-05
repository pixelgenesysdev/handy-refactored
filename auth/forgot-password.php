<?php include 'includes/header.php'; ?>



<div class="col-md-6 firstcol align-items-center d-flex p-0 text-center justify-content-center">
    <div class="firstcol-wrapper">
        <div class="firstcol-box">
            <img src="./assets/img/forgot-icon.png" alt="Forgot Password! -icon" class="forgot-icon">
            <h2>Forgot Password!</h2>
             <p>Enter email address to get a verification code.</p>
             
             <form class="signup-form form">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrapper">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="email" id="email"  required placeholder="Enter Email Address">
                        </div>
                    </div>
                    
            </form>
            <button id="continueBtn" type="submit" class="btn btn-primary" onclick="  window.location.href = 'otp.php'" >Continue</button>

            
        </div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>
