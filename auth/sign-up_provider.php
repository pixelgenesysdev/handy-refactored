    <?php include 'includes/header.php'; ?>



<div class="col-md-6 firstcol align-items-center d-flex p-0 text-center justify-content-center">
    <div class="firstcol-wrapper">
       
        <div class="firstcol-box">
            <img src="./assets/img/welcome-icon.png" alt="welcome-icon" class="welcome-icon">
            <h2>Create an Account!</h2>
            <p>Create your account in seconds—start your journey with us now!</p>

            <form class="signup-form form" id="signupForm">
                <!-- Username -->
                <div class="form-group">
                    <label for="username">Full Name*</label>
                    <div class="input-wrapper">
                        <i class="fa-regular fa-user"></i>
                        <input type="text" id="username" required placeholder="Enter Full Name">
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email Address*</label>
                    <div class="input-wrapper">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="email" id="email" required placeholder="Enter Email Address">
                    </div>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">Phone Number*</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" id="phone" required placeholder="Enter Phone Number">
                    </div>
                </div>

                <!-- Language -->
                <div class="form-group">
                    <label for="language">Language</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-language"></i>
                        <input type="text" id="language" placeholder="Enter Language">
                    </div>
                </div>

                <!-- Gender -->
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-venus-mars"></i>
                        <select id="gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password*</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock"></i>
                        <div class="pass-box">
                            <input type="password" id="password" class="toggle-password-input" required placeholder="Enter Password">
                            <i class="fa-solid fa-eye-slash toggle-password-btn" id="togglePassword" style="cursor: pointer;"></i>
                        </div>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="confirm-password">Confirm Password*</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock"></i>
                        <div class="pass-box">
                            <input type="password" id="confirm-password" class="toggle-password-input" required placeholder="Confirm Password">
                            <i class="fa-solid fa-eye-slash toggle-password-btn" id="toggleConfirmPassword" style="cursor: pointer;"></i>
                        </div>
                    </div>
                </div>

                <!-- Certifications Details -->
                <h3>Certifications Details</h3>

                <div id="certificationsContainer">
                    
                    <div class="certification-group">
                        <div class="form-group">
                            <label>Institution Name</label>
                            <div class="input-wrapper">
                                <i class="fa-solid fa-building-columns"></i>
                                <input type="text" name="institutionName[]" required placeholder="Enter Institution Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Certificate Title</label>
                            <div class="input-wrapper">
                                <i class="fa-solid fa-file-lines"></i>
                                <input type="text" name="certificateTitle[]" required placeholder="Enter Certificate Title">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Certificate Picture</label>
                            <div class="input-wrapper">
                                <i class="fa-solid fa-image"></i>
                                <input type="file" name="certificatePicture[]" required accept="image/*">
                            </div>
                        </div>
                         
                        <button type="button" class="delete-certification" style="color: red; background: none; border: none; cursor: pointer;">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                        <hr width="100%">
                    </div>
                </div>

                <!-- Add More -->
                <button type="button" id="addMoreCertifications" style=" cursor: pointer;">
                    <i class="fa-solid fa-plus"></i> Add More
                </button>

                <!-- Submit Button -->
                <button id="continueBtn" type="submit" class="btn btn-primary">Sign Up</button>
            </form>

            <p class="bottom-link-txt">Already have an account! <a href="login.php">Sign In</a></p>
        </div>

        <script>
            // Add and delete certification sections dynamically
            const container = document.getElementById("certificationsContainer");
            const addBtn = document.getElementById("addMoreCertifications");

            addBtn.addEventListener("click", () => {
                const newCert = document.querySelector(".certification-group").cloneNode(true);
                newCert.querySelectorAll("input").forEach(input => input.value = "");
                container.appendChild(newCert);
            });

            container.addEventListener("click", function(e) {
                if (e.target.closest(".delete-certification")) {
                    const certBlock = e.target.closest(".certification-group");
                    if (document.querySelectorAll(".certification-group").length > 1) {
                        certBlock.remove();
                    } else {
                        showPopup(
                            'You must have at least one certification block.',
                            'error',
                            '',
                            'OK',
                            '#'
                        )
                    }
                }
            });
        </script>

    </div>
</div>

<style>
    
button#addMoreCertifications {
    background: white !important;
    border: midnightblue;
    float: left;
    position: relative;
    font-size: 18px;
}

button#addMoreCertifications i {
    background: #f26e21;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 30px;
    font-size: 17px;
    color: white;
    margin-right: 2px;
}

button.delete-certification {
    float: right;
}

button.delete-certification {
    font-weight: 600;
    float: right;
    position: relative;
    font-size: 20px;
        margin: 0px 0px 10px;
}
.firstcol-wrapper {
    height: 86vh;
    overflow-y: scroll;
    padding: 20px 0px;
}

</style>

<?php include 'includes/footer.php'; ?>
