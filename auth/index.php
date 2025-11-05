 <?php include 'includes/header.php'; ?>



<div class="col-md-6 firstcol align-items-center d-flex p-0 text-center justify-content-center">
    <div class="firstcol-wrapper">
        <div class="firstcol-box">
            <img src="./assets/img/welcome-icon.png" alt="welcome-icon" class="welcome-icon">
            <h2>Welcome Back!</h2>
             <p>Enter your login details below.</p>
             
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
                                <i class="fa-solid fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                            </div>
        
                        </div>
                    </div>


                    <div class="forget-password"><a href="forgot-password.php">Forget Password?</a></div>
                    <button id="continueBtn" type="submit" class="btn btn-primary">Log In</button>
            </form>
            <p class="bottom-link-txt">If you don't have an account! <a href="sign-up.php">Sign Up</a></p>

            
        </div>
    </div>
</div>



<?php include 'includes/footer.php'; ?>
