<?php
$page_js = 'pages_user_setting.js';
 include '../includes/head.php'; ?>


<div id="pagebox">

 
    <div class="topbarwithbtn">
        <h3><i class="fa fa-arrow-left d-none"></i><span class="pagetitle">My Profile</span></h3>
    </div>

    <div id="userinfobox" class="d-flex flex-wrap justify-content-center col-12 align-items-center">
        <div class="userimagebox col-lg-2 col-md-12 col-12">
            <img src="<?php echo SITE_URL; ?>/assets/images/avatar1.png" alt="User Image">
        </div>
        <div class="userdetailsbox col-lg-6 col-md-12 col-12">
            <h3 class="username">James Anderson</h3>
            <div class="detialmy d-flex ">
                <span class="userlocation">New York, USA</span>
                <span class="userphone">+1 234 567 8901</span>
                <span class="useremail">2dMxW@example.com</span>
            </div>
        </div>

        <div class="actionprofilebox col-lg-4 col-md-12 col-12">
            <button class="btn btn-primary" id="editprofilebtn" href="<?php echo SITE_URL; ?>pages/edit_profile.php">Edit Profile</button>
            <a href="" id="changepassword">Change Password</a>
            <a href="" id="deleteaccount">Delete Account</a>
        </div>
    </div>


    <!-- Edit Profile Form -->
    <div class="MyProductsDetailsform d-none" id="editprofilebox">
        <div class="inner">
            <form class="col-12">
                <!-- Profile Image Upload -->
                <div class="form-groupfield">
                    <label class="form-label" for="profileimage">Profile Image*</label>
                    <div class="upload-box" id="profileUploadBox">
                    <input type="file" id="profileimage" name="profileimage" accept="image/*" />
                    <div class="upload-content" id="profileUploadContent">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p>Upload Image</p>
                    </div>
                    </div>
                </div>

                <div class="form-groupfield">
                    <label for="name" class="form-label">Name*</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required />
                </div>

                <div class="form-groupfield">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required value="2dMxW@example.com"  disable/>
                </div>

                <div class="form-groupfield">
                    <label for="phone" class="form-label">Phone*</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required />
                </div>


                <button type="submit" id="updateprofilebtn" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>

    <!-- Change Password Form -->
    <div class="MyProductsDetailsform d-none" id="changepasswordbox">
        <div class="inner">
            <form class="col-12">
            <div class="form-groupfield">
                <label for="currentpassword" class="form-label">Current Password*</label>
                <div class="pass-box input-wrapper">
                    <input type="password" id="passwordConfirm"  class="password-confirm toggle-password" required placeholder="Enter Current Password">
                    <i class="fa-solid fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                </div>
            </div>

            <div class="form-groupfield">
                <label for="newpassword" class="form-label">New Password*</label>
                <div class="pass-box input-wrapper">
                    <input type="password" id="passwordConfirm"  class="password-confirm toggle-password " required placeholder="Enter New Password">
                    <i class="fa-solid fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                </div>
            </div>

            <div class="form-groupfield">
                <label for="newpassword" class="form-label">Confirm Password*</label>
                <div class="pass-box input-wrapper">
                    <input type="password" id="passwordConfirm"  class="password-confirm toggle-password" required placeholder="Enter Confirm Password">
                    <i class="fa-solid fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                </div>
            </div>

                     

            <button type="submit" id="updatepasswordbtn" class="btn btn-primary">Update Password</button>
            </form>
        </div>
    </div>


</div>    


<style>

     .form-groupfield .input-wrapper {
      display: flex;
      align-items: center;
      background-color: #f5f5f5;
      border-radius: 8px;
      padding: 14px 15px;
    }

    .form-groupfield .input-wrapper input {
      border: none;
      background: transparent;
      outline: none;
      flex: 1;
      font-size: 16px;
    }
    .form-groupfield .input-wrapper i {
      color: var(--primary-color);
      margin-right: 10px;
      font-size: 17px;
    }


</style>
<?php include '../includes/footer.php'; ?>