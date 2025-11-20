    <?php include 'includes/header.php'; ?>



<div class="col-md-6 firstcol align-items-center d-flex p-0 text-center justify-content-center">
    <div class="firstcol-wrapper">
        <div class="firstcol-box">
            <img src="./assets/img/welcome-icon.png" alt="welcome-icon" class="welcome-icon">
            <h2>Sign Up!</h2>
             <p>Enter your personal details below.</p>
             
             <form class="signup-form form">
                    <div class="form-group">
                        <label for="username">Full Name</label>
                        <div class="input-wrapper">
                            <i class="fa-regular fa-user"></i>
                            <input type="text" id="username" required placeholder="Enter Full Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrapper">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="email" id="email"  required placeholder="Enter Email Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-phone"></i>
                            <input type="tel" id="phone"  required placeholder="Enter Phone Number">
                        </div>
                    </div>
                    <!-- referal Code field -->
                     <div class="form-group">
                        <label for="referalCode">Referal Code</label>
                        <div class="input-wrapper">
                            <i class="fa-regular fa-user"></i>
                            <input type="text" id="referalCode"  placeholder="Enter Referal Code">
                        </div>
                    </div>
                    <div  class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-lock"></i>
                            <div class="pass-box">
                                <input type="password" id="password"  class="toggle-password" required placeholder="Enter password">
                                <i class="fa-solid fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div  class="form-group">
                        <label for="password">Confirm Password</label>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-lock"></i>
                            <div class="pass-box">
                                <input type="password" id="passwordConfirm"  class="toggle-password" required placeholder="Enter password">
                                <i class="fa-solid fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Add Profile Picture -->
                    <div class="form-group">
                        <label for="profilePicture">Profile Picture</label>
                        <div class="input-wrapper">
                            <i class="fa-regular fa-user"></i>
                            <input type="file" id="profilePicture"  required placeholder="Enter Profile Picture">
                        </div>
                    </div>
                
                    <!-- <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <div class="input-wrapper">
                            <i class="fab fa-facebook"></i>
                            <input type="url" id="facebook"  required placeholder="Enter Facebook URL">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <div class="input-wrapper">
                            <i class="fab fa-instagram"></i>
                            <input type="url" id="instagram"  required placeholder="Enter Instagram URL">
                        </div>
                    </div> -->
            </form>
            <button id="continueBtn" type="submit" class="btn btn-primary" onclick="  window.location.href = 'login.php'" >Sign Up</button>
            <p class="bottom-link-txt">Already have an account! <a href="login.php">Sign In</a></p>

            
        </div>
    </div>
</div>
<style>
    .firstcol-wrapper {
    height: 86vh;
    overflow-y: scroll;
    padding: 20px 0px;
}

</style>

<?php include 'includes/footer.php'; ?>
