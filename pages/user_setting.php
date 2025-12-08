<?php

$page_js = 'pages_user_setting.js';
 include '../includes/head.php'; 
 include '../includes/bothpage.php';
?>




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

                <span class="userphone">+1 234 567 8901</span>
                <span class="useremail">2dMxW@example.com</span>
                <span class="userlocation">New York, USA</span>
            </div>
        </div>


        <div class="actionprofilebox col-lg-4 col-md-12 col-12">
            <div class="boxshare" id="sharebox">

            </div>
            <button class="btn btn-primary" id="editprofilebtn" href="<?php echo SITE_URL; ?>pages/edit_profile.php">Edit Profile</button>
            <a href="" id="changepassword">Change Password</a>
            <a href="" id="deleteaccount">Delete Account</a>
        </div>

        <div id="usercertificatebox" class="usercertificatebox col-lg-12" style="margin-top: 60px;">
            <h4>Certificate Details</h4>
            <div class="certificate-details p-2 " >
                <div class="certificate-item">
                    <p><strong>Institute Name:</strong> Institute lorem</p>
                    <p><strong>Course Name:</strong> Course lorem</p>
                    <img src="<?php echo SITE_URL; ?>assets/images/certificate.png" alt="Certificate">
                </div>
            </div>
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

                <!-- Name -->
                <div class="form-groupfield">
                    <label class="form-label">Name*</label>
                    <div class="input-wrapper">
                        <i class="fa fa-user"></i>
                        <input type="text" value="James Anderson" class="form-control" id="name" name="name" placeholder="Enter your name" required />
                    </div>
                </div>

                <!-- Email -->
                <div class="form-groupfield">
                    <label class="form-label">Email*</label>
                    <div class="input-wrapper">
                        <i class="fa fa-envelope"></i>
                        <input type="email" class="form-control" id="email" name="email"
                            value="2dMxW@example.com" disabled />
                    </div>
                </div>

                <!-- Phone -->
                <div class="form-groupfield">
                    <label class="form-label">Phone*</label>
                    <div class="input-wrapper">
                        <i class="fa fa-phone"></i>
                        <input type="tel" value="+1 234 567 8901" class="form-control" id="phone" name="phone" placeholder="Enter phone number"
                            required />
                    </div>
                </div>

                <!-- Location -->
                <div class="form-groupfield">
                    <label class="form-label">Location*</label>
                    <div class="input-wrapper">
                        <i class="fa fa-location-dot"></i>
                        <input type="text" value="New York, USA" class="form-control" id="location" name="location"
                            placeholder="Enter your location" required />
                    </div>
                </div>

                <!-- Language -->
                <div class="form-groupfield">
                    <label class="form-label">Language*</label>
                    <div class="input-wrapper">
                        <i class="fa fa-language"></i>
                        <input type="text" value="English" class="form-control" id="language" name="language"
                            placeholder="Enter your language" required />
                    </div>
                </div>

                <!-- Gender -->
                <div class="form-groupfield">
                    <label for="gender">Gender</label>
                    <div class="input-wrapper">
                        <i class="fa fa-venus-mars"></i>
                        <select id="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

            <div id="certificatedetails">

            </div>
                
                <div class="d-flex gap-2 mt-3">
                    <button type="submit" id="updateprofilebtn" class="btn btn-primary">Update Profile</button>
                    <button type="button" id="shareProfileBtnEdit" class="btn btn-outline-primary" onclick="openShareProfileModal()">
                        <i class="fa-solid fa-share"></i> Share Profile
                    </button>
                </div>

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

    <!-- Share Profile Modal -->
    <div id="shareProfileModal" class="share-profile-modal" style="display: none;">
        <div class="share-modal-overlay"></div>
        <div class="share-modal-container">
            <div class="share-modal-header">
                <h3>Share Profile</h3>
                <button class="share-modal-close" id="closeShareModal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="share-modal-body">
                <p class="share-success-message">Your Profile has been Updated successfully</p>
                
                <div class="social-share-buttons">
                    <button class="social-share-btn facebook-btn" onclick="shareOnFacebook()">
                        <i class="fa-brands fa-facebook-f"></i>
                        <span>Facebook</span>
                    </button>
                    <button class="social-share-btn twitter-btn" onclick="shareOnTwitter()">
                        <i class="fa-brands fa-twitter"></i>
                        <span>Twitter</span>
                    </button>
                    <button class="social-share-btn instagram-btn" onclick="shareOnInstagram()">
                        <i class="fa-brands fa-instagram"></i>
                        <span>Instagram</span>
                    </button>
                </div>

                <div class="share-url-section">
                    <label for="shareUrlInput">Share Link:</label>
                    <div class="share-url-input-wrapper">
                        <input type="text" id="shareUrlInput" readonly value="" />
                        <button class="copy-url-btn" id="copyUrlBtn" onclick="copyShareUrl()">
                            <i class="fa-solid fa-copy"></i>
                        </button>
                    </div>
                    <span class="copy-success-message" id="copySuccessMsg" style="display: none;">Link copied!</span>
                </div>
            </div>
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
    .boxshare {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 0px 0px 30px;
    }

    .boxshare .shareicon i{
        border: 2px solid #D9D9D9;
        width: 50px;
        height: 50px;
        line-height:46px;
        border-radius: 100px;
        font-size: 18px;
        transition: all 0.3s ease;
    }
    
    .boxshare .shareicon i:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
        transform: scale(1.1);
    }
    
    .btn-outline-primary {
        background: white;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-outline-primary:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
    }
    
    .d-flex.gap-2 {
        gap: 10px !important;
    }


    div#editprofilebox .certification-group.form-groupfield {
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 20px 0px;
        margin: 0;
    }

    div#editprofilebox .certification-group.form-groupfield label {
        margin-bottom: 3px;
    }

    /* Share Profile Modal Styles */
    .share-profile-modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .share-modal-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
    }

    .share-modal-container {
        position: relative;
        background: white;
        border-radius: 16px;
        width: 90%;
        max-width: 500px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        z-index: 10001;
        animation: modalSlideIn 0.3s ease-out;
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-20px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .share-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 25px;
        border-bottom: 1px solid #e0e0e0;
    }

    .share-modal-header h3 {
        margin: 0;
        font-size: 1.5em;
        font-weight: 600;
        color: #333;
    }

    .share-modal-close {
        background: none;
        border: none;
        font-size: 1.5em;
        color: #999;
        cursor: pointer;
        padding: 5px;
        transition: color 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
    }

    .share-modal-close:hover {
        color: #333;
        background: #f5f5f5;
    }

    .share-modal-body {
        padding: 25px;
    }

    .share-success-message {
        text-align: center;
        font-size: 1.1em;
        color: #666;
        margin-bottom: 30px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
    }

    .social-share-buttons {
        display: flex;
        justify-content: space-around;
        gap: 15px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .social-share-btn {
        flex: 1;
        min-width: 120px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        padding: 15px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        background: white;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.95em;
        font-weight: 500;
    }

    .social-share-btn i {
        font-size: 1.8em;
    }

    .social-share-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .facebook-btn {
        color: #1877F2;
        border-color: #1877F2;
    }

    .facebook-btn:hover {
        background: #1877F2;
        color: white;
    }

    .twitter-btn {
        color: #1DA1F2;
        border-color: #1DA1F2;
    }

    .twitter-btn:hover {
        background: #1DA1F2;
        color: white;
    }

    .instagram-btn {
        color: #E4405F;
        border-color: #E4405F;
    }

    .instagram-btn:hover {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        color: white;
        border-color: transparent;
    }

    .share-url-section {
        margin-top: 25px;
    }

    .share-url-section label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: #333;
        font-size: 0.95em;
    }

    .share-url-input-wrapper {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    #shareUrlInput {
        flex: 1;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 0.9em;
        background: #f8f9fa;
        color: #666;
    }

    #shareUrlInput:focus {
        outline: none;
        border-color: var(--primary-color);
        background: white;
    }

    .copy-url-btn {
        padding: 12px 20px;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1em;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 50px;
    }

    .copy-url-btn:hover {
        background: #e55a2b;
        transform: scale(1.05);
    }

    .copy-url-btn:active {
        transform: scale(0.95);
    }

    .copy-success-message {
        display: block;
        margin-top: 8px;
        color: #4caf50;
        font-size: 0.85em;
        font-weight: 500;
        text-align: center;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .share-modal-container {
            width: 95%;
            margin: 20px;
        }

        .social-share-buttons {
            flex-direction: column;
        }

        .social-share-btn {
            width: 100%;
        }
    }
</style>


<?php include '../includes/footer.php'; ?>


