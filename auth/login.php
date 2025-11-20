 <?php include 'includes/header.php'; ?>



<div class="col-md-6 firstcol align-items-center d-flex p-0 text-center justify-content-center">
    <div class="firstcol-wrapper">
        <div class="firstcol-box">
            <img src="./assets/img/welcome-icon.png" alt="welcome-icon" class="welcome-icon">
            <h2>Welcome Back!</h2>
             <p>Enter your Sign In details below.</p>
             
             <form class="signup-form form">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrapper">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="email" id="email"  required placeholder="Enter Email Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Password</label>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-lock"></i>
                            <div class="pass-box">
                                <input type="password" id="password"  class="toggle-password" required placeholder="Enter password">
                                <i class="fa-solid fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                            </div>
        
                        </div>
                    </div>

                    <!-- remember me -->
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="remember-me d-flex align-items-center gap-2">
                            <input type="checkbox" id="rememberMe" name="rememberMe">
                            <label for="rememberMe" style="cursor: pointer; margin: 0;">Remember Me</label>
                        </div>
                        <div class="forget-password"><a href="forgot-password.php">Forgot Password?</a></div>
                    </div>

                    
            </form>
            <button id="continueBtn" type="submit" class="btn btn-primary" >Log In</button>
            <p class="bottom-link-txt">If you don't have an account! <a href="index.php">Sign Up</a></p>

            
        </div>
    </div>
</div>


<script>
    const continueBtn = document.getElementById('continueBtn');

    continueBtn.addEventListener('click', () => {
        window.location.href = '<?php echo SITE_URL; ?>/pages/dashboard.php'
    })


   
</script>
<?php include 'includes/footer.php'; ?>
