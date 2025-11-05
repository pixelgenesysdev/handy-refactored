<?php
$page_js = 'pages_user_setting.js';
 include '../includes/head.php'; ?>


<div id="pagebox">


    <div class="topbarwithbtn">
        <h3>My Profile</h3>
    </div>

    <div id="userinfobox" class="d-flex flex-wrap justify-content-center col-12 align-items-center">
        <div class="userimagebox col-lg-2 col-md-12 col-12">
            <img src="<?php echo SITE_URL; ?>/assets/images/avatar1.png" alt="User Image">
        </div>
        <div class="userdetailsbox col-lg-7 col-md-12 col-12">
            <h3 class="username">James Anderson</h3>
            <div class="detialmy d-flex ">
                <span class="userlocation">New York, USA</span>
                <span class="userphone">+1 234 567 8901</span>
                <span class="useremail">2dMxW@example.com</span>
            </div>
        </div>

        <div class="actionprofilebox col-lg-3 col-md-12 col-12">
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
                <label for="email" class="form-label">Email*</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required />
            </div>

            <div class="form-groupfield">
                <label for="phone" class="form-label">Phone*</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required />
            </div>

            <div class="form-groupfield">
                <label for="location" class="form-label">Location*</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter your location" required />
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>

    <!-- Change Password Form -->
    <div class="MyProductsDetailsform d-none" id="changepasswordbox">
        <div class="inner">
            <form class="col-12">
            <div class="form-groupfield">
                <label for="currentpassword" class="form-label">Current Password*</label>
                <input type="password" class="form-control" id="currentpassword" name="currentpassword" placeholder="Enter current password" required />
            </div>

            <div class="form-groupfield">
                <label for="newpassword" class="form-label">New Password*</label>
                <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter new password" required />
            </div>

            <div class="form-groupfield">
                <label for="confirmpassword" class="form-label">Confirm New Password*</label>
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm new password" required />
            </div>

            <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
        </div>
    </div>


</div>    



<?php include '../includes/footer.php'; ?>