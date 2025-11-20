 <?php
$page_js = 'auth_reset-password.js';
 include 'includes/header.php'; ?>



<div class="col-md-6 firstcol align-items-center d-flex p-0 text-center justify-content-center">
    <div class="firstcol-wrapper">
        <div class="firstcol-box">
            <img src="./assets/img/forgot-icon.png" alt="forgot-icon" class="forgot-icon">
            <h2>Set New Password!</h2>
             <p>Must be at least 8 characters</p>
             
             <form class="signup-form form">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-lock"></i>
                            <div class="pass-box">
                                <input type="password" id="password" class="password22 toggle-password" required placeholder="Enter password">
                                <i class="fa-solid fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                            </div>
                        </div>
                    </div>

                      <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-lock"></i>
                            <div class="pass-box">
                                <input type="password" id="passwordConfirm"  class="password-confirm toggle-password" required placeholder="Enter password">
                                <i class="fa-solid fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                            </div>
                        </div>
                    </div>
            </form>
            <button 
               id="continueBtnreset" 
               type="submit" 
               class="btn btn-primary"  >

               Reset Password</button>

            
        </div>
    </div>
</div>




<?php include 'includes/footer.php'; ?>
