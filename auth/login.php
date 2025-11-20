    <?php include 'includes/header.php'; ?>



        <div class="col-md-6 firstcol align-items-center d-flex p-0 text-center justify-content-center">
            <div class="firstcol-wrapper">
                <div class="firstcol-box">
                    <img src="./assets/img/welcome-icon.png" alt="welcome-icon" class="welcome-icon">
                    <h2>Welcome Back!</h2>
                    <p>Enter your Sign In details below.</p>
                    
                    <form action="login-process.php" method="POST" class="signup-form form">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-wrapper">
                                <i class="fa-regular fa-envelope"></i>
                                <input type="email" name="email" id="email" required placeholder="Enter Email Address">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-wrapper" style="position: relative;">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" name="password" id="password" required placeholder="Enter password" style="width: 100%; padding-right: 40px; border: none; outline: none;">
                                <i class="fa-solid fa-eye-slash" id="togglePassword" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="remember-me d-flex align-items-center gap-2">
                                <input type="checkbox" id="rememberMe" name="rememberMe">
                                <label for="rememberMe" style="cursor: pointer; margin: 0;">Remember Me</label>
                            </div>
                            <div class="forget-password"><a href="forgot-password.php">Forgot Password?</a></div>
                        </div>
                        
                        <button id="continueBtn1" type="submit" class="btn btn-primary">Log In</button>
                    </form>
                
                    <p class="bottom-link-txt">If you don't have an account! <a href="index.php">Sign Up</a></p>

                    
                </div>
            </div>
        </div>


    <script>
        // const continueBtn = document.getElementById('continueBtn');

        // continueBtn.addEventListener('click', () => {
        //     window.location.href = '<?php echo SITE_URL; ?>/pages/dashboard.php'
        // })


    
    </script>
    <?php include 'includes/footer.php'; ?>
