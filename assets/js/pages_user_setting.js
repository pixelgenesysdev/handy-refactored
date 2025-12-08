    const sharebox = document.getElementById('sharebox');
    let certificatedetails = document.getElementById('certificatedetails');

    if (loginUser.role === 'provider') {
       sharebox.innerHTML=`
                <div class="hourBox">
                    <h6 class="hourlyratetitle">Hourly Rate</h6>
                    <h2 class="hourlyrate" style="color: var(--primary-color);">$25.00</h2>
                    <a href="${SITE_URL}pages/reviews.php" id="sharelink">My Reviews</a>
                </div>
                <div class="shareicon">
                    <i class="fa-solid fa-share" id="shareProfileBtn" style="cursor: pointer;" title="Share Profile"></i>
                </div>
       `;
       
       // Add click handler for share button
       const shareProfileBtn = document.getElementById('shareProfileBtn');
       if (shareProfileBtn) {
           shareProfileBtn.addEventListener('click', openShareProfileModal);
       } 
       usercertificatebox.style.display = 'block';
       certificatedetails.innerHTML=`                
       <!-- Certifications -->
                <h3>Certifications Details</h3>

                <div id="certificationsContainer">

                    <div class="certification-group form-groupfield">
                        <div class="form-group">
                            <label>Institution Name</label>
                            <div class="input-wrapper">
                                <i class="fa fa-building"></i>
                                <input type="text" value="Institute lorem" class="form-control" name="institutionName[]" required placeholder="Enter Institution Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Course Title</label>
                            <div class="input-wrapper">
                                <i class="fa fa-certificate"></i>
                                <input type="text" value="Course lorem"  class="form-control" name="certificateTitle[]" required placeholder="Enter Certificate Title">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Certificate Picture</label>
                            <div class="input-wrapper">
                                <i class="fa fa-image"></i>
                                <input type="file" class="form-control" name="certificatePicture[]" required accept="image/*">
                            </div>
                        </div>


                        <hr>
                    </div>
                </div>
                <div class="addcertificate">
                    <button type="button" id="addCertificationBtn" class="btn btn-primary">+ Add Certification</button>
                </div>
                `
                    const addCertificationBtn = document.getElementById("addCertificationBtn");
            // ADD NEW CERTIFICATION
            // Add new certification
            addCertificationBtn.addEventListener("click", () => {
                const container = document.getElementById("certificationsContainer");

                const newField = document.createElement("div");
                newField.classList.add("certification-group", "form-groupfield");

                newField.innerHTML = `
                    <div class="form-group">
                        <label>Institution Name</label>
                        <div class="input-wrapper">
                            <i class="fa fa-building"></i>
                            <input type="text" class="form-control" name="institutionName[]" required placeholder="Enter Institution Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Certificate Title</label>
                        <div class="input-wrapper">
                            <i class="fa fa-certificate"></i>
                            <input type="text" class="form-control" name="certificateTitle[]" required placeholder="Enter Certificate Title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Certificate Picture</label>
                        <div class="input-wrapper">
                            <i class="fa fa-image"></i>
                            <input type="file" class="form-control" name="certificatePicture[]" required accept="image/*">
                        </div>
                    </div>

                        <button type="button" class="delete-certification" style="color: red; background:none;border:none;">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    <hr>
                `;

                container.appendChild(newField);
            });
            // Event delegation for delete buttons
            document.getElementById("certificationsContainer").addEventListener("click", (e) => {
                if (e.target.closest(".delete-certification")) {
                    const certGroup = e.target.closest(".certification-group");
                    certGroup.remove();
                }
            });
    }
    else{
            // For non-provider users, add share button
            sharebox.innerHTML=`
                <div class="shareicon">
                    <i class="fa-solid fa-share" id="shareProfileBtn" style="cursor: pointer;" title="Share Profile"></i>
                </div>
            `;
            
            // Add click handler for share button
            const shareProfileBtn = document.getElementById('shareProfileBtn');
            if (shareProfileBtn) {
                shareProfileBtn.addEventListener('click', openShareProfileModal);
            }
            
            certificatedetails.innerHTML="";
            usercertificatebox.style.display = 'none';
    }








    // DELETE CERTIFICATION (BUT KEEP AT LEAST ONE)
    document.addEventListener("click", function (e) {
        if (e.target.closest(".delete-certification")) {

            let allCerts = document.querySelectorAll(".certification-group");

            // ❌ If only 1 left → Do NOT delete
            if (allCerts.length <= 1) {
                alert("At least one certification is required.");
                return;
            }

            // ✔ Remove clicked certification
            e.target.closest(".certification-group").remove();
        }
    });




// Extracted from: pages/user_setting.php

const editprofilebtn = document.getElementById('editprofilebtn');
    const changepasswordlink = document.getElementById('changepassword');
    const deleteaccountlink = document.getElementById('deleteaccount');
    const userinfobox = document.getElementById('userinfobox');
    const topbarwithbtntext = document.querySelector('.topbarwithbtn h3 span.pagetitle');
    const topbarwithbtntexticon = document.querySelector('.topbarwithbtn h3 i');
    const topbarwithbtn = document.querySelector('.topbarwithbtn h3');
    
    const updatepasswordbtn = document.getElementById('updatepasswordbtn');
    const editprofilebox = document.getElementById('editprofilebox');
    const changepasswordbox = document.getElementById('changepasswordbox');
    const updateprofilebtn = document.getElementById('updateprofilebtn');

    editprofilebtn.addEventListener('click', (e) => {
        e.preventDefault();
        editprofilebox.classList.toggle('d-none');
        changepasswordbox.classList.add('d-none');
        userinfobox.classList.add('d-none');
        topbarwithbtntext.textContent = 'Edit Profile';
        topbarwithbtn.style.cursor = 'pointer';
        topbarwithbtntexticon.classList.remove('d-none');
        topbarwithbtn.addEventListener('click', () => {
            editprofilebox.classList.add('d-none');
            changepasswordbox.classList.add('d-none');
            userinfobox.classList.remove('d-none');
            topbarwithbtntext.textContent = 'My Profile';
            topbarwithbtntexticon.classList.add('d-none');
        })
        // topbarwithbtntexticon.classList.remove('d-none');
    });

    updateprofilebtn.addEventListener('click', (e) => {
        e.preventDefault();

                showPopup(
            'Profile has been updated successfully.',
            'success',
            'Profile Updated',
            'OK',
                    () => {
                        editprofilebox.classList.add('d-none');
                        changepasswordbox.classList.add('d-none');
                        userinfobox.classList.remove('d-none');
                        topbarwithbtntext.textContent = 'My Profile';
                        topbarwithbtntexticon.classList.add('d-none');
                        window.location.href = 'user_setting.php';
                    }
        );
        



    })
    changepasswordlink.addEventListener('click', (e) => {
        e.preventDefault();
        changepasswordbox.classList.toggle('d-none');
        editprofilebox.classList.add('d-none');
        userinfobox.classList.add('d-none');
        topbarwithbtntext.textContent = 'Change Password';
        topbarwithbtntexticon.classList.remove('d-none');
        topbarwithbtn.style.cursor = 'pointer';
        topbarwithbtn.addEventListener('click', () => {
            changepasswordbox.classList.add('d-none');
            editprofilebox.classList.add('d-none');
            userinfobox.classList.remove('d-none');
            topbarwithbtntext.textContent = 'My Profile';
            topbarwithbtntexticon.classList.add('d-none');
        })
    });

    deleteaccountlink.addEventListener('click', (e) => {
        e.preventDefault();
        showPopup(
            'Are you sure you want to delete your account? This action cannot be undone.',
            'delete',
            'Delete Account',
            'Yes, Delete',
            () => {
                showPopup(
                    'Account has been deleted successfully.',
                    'success',
                    'Account Deleted',
                    'OK',
                    () => {
                        window.location.href = 'logout.php';
                    }
                );
            }
        );
    });

    updatepasswordbtn.addEventListener('click', (e) => {
        e.preventDefault();
        showPopup(
            'Your password has been changed successfully.',
            'success',
            'Password Changed',
            'Okay',
            () => {
                window.location.href = 'user_setting.php';
            }
        );
    });



    // Show/Hide Password

const togglePassword = document.querySelectorAll('#togglePassword');
const password = document.querySelectorAll('.toggle-password');
    function togglePasswordVisibility(togglePassword, password, passwordConfirm) {
        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    }

    for(let i = 0; i < togglePassword.length; i++) {
        togglePasswordVisibility(togglePassword[i], password[i]);
    }

// End Show/Hide Password

// ==========================================
// SHARE PROFILE MODAL FUNCTIONS
// ==========================================

// Get user profile URL
function getProfileUrl() {
    const userId = loginUser?.id || 'user';
    const userName = document.querySelector('.username')?.textContent?.trim().replace(/\s+/g, '-').toLowerCase() || 'profile';
    return `${SITE_URL}pages/user_setting.php?profile=${userId}`;
}

// Open Share Profile Modal
function openShareProfileModal() {
    const modal = document.getElementById('shareProfileModal');
    const urlInput = document.getElementById('shareUrlInput');
    
    if (!modal || !urlInput) return;
    
    // Generate and set profile URL
    const profileUrl = getProfileUrl();
    urlInput.value = profileUrl;
    
    // Show modal
    modal.style.display = 'flex';
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

// Close Share Profile Modal
function closeShareProfileModal() {
    const modal = document.getElementById('shareProfileModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
}

// Copy Share URL to Clipboard
function copyShareUrl() {
    const urlInput = document.getElementById('shareUrlInput');
    const copySuccessMsg = document.getElementById('copySuccessMsg');
    
    if (!urlInput) return;
    
    // Select and copy
    urlInput.select();
    urlInput.setSelectionRange(0, 99999); // For mobile devices
    
    try {
        navigator.clipboard.writeText(urlInput.value).then(() => {
            // Show success message
            if (copySuccessMsg) {
                copySuccessMsg.style.display = 'block';
                setTimeout(() => {
                    copySuccessMsg.style.display = 'none';
                }, 2000);
            }
            
            // Visual feedback
            const copyBtn = document.getElementById('copyUrlBtn');
            if (copyBtn) {
                const originalHTML = copyBtn.innerHTML;
                copyBtn.innerHTML = '<i class="fa-solid fa-check"></i>';
                copyBtn.style.background = '#4caf50';
                setTimeout(() => {
                    copyBtn.innerHTML = originalHTML;
                    copyBtn.style.background = '';
                }, 1500);
            }
        }).catch(err => {
            // Fallback for older browsers
            document.execCommand('copy');
            if (copySuccessMsg) {
                copySuccessMsg.style.display = 'block';
                setTimeout(() => {
                    copySuccessMsg.style.display = 'none';
                }, 2000);
            }
        });
    } catch (err) {
        // Fallback
        document.execCommand('copy');
        if (copySuccessMsg) {
            copySuccessMsg.style.display = 'block';
            setTimeout(() => {
                copySuccessMsg.style.display = 'none';
            }, 2000);
        }
    }
}

// Share on Facebook
function shareOnFacebook() {
    const url = encodeURIComponent(getProfileUrl());
    const text = encodeURIComponent('Check out my profile on EZHANDY!');
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${text}`, '_blank', 'width=600,height=400');
}

// Share on Twitter
function shareOnTwitter() {
    const url = encodeURIComponent(getProfileUrl());
    const text = encodeURIComponent('Check out my profile on EZHANDY!');
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
}

// Share on Instagram (Note: Instagram doesn't support direct URL sharing, so we'll copy URL)
function shareOnInstagram() {
    // Instagram doesn't support direct URL sharing via web
    // So we'll copy the URL and show a message
    copyShareUrl();
    const instagramBtn = document.querySelector('.instagram-btn');
    if (instagramBtn) {
        const originalHTML = instagramBtn.innerHTML;
        instagramBtn.innerHTML = '<i class="fa-solid fa-check"></i><span>Link Copied!</span>';
        instagramBtn.style.background = '#4caf50';
        instagramBtn.style.borderColor = '#4caf50';
        instagramBtn.style.color = 'white';
        setTimeout(() => {
            instagramBtn.innerHTML = originalHTML;
            instagramBtn.style.background = '';
            instagramBtn.style.borderColor = '';
            instagramBtn.style.color = '';
        }, 2000);
    }
}

// Initialize modal close handlers
document.addEventListener('DOMContentLoaded', () => {
    const closeBtn = document.getElementById('closeShareModal');
    const modal = document.getElementById('shareProfileModal');
    const overlay = modal?.querySelector('.share-modal-overlay');
    
    if (closeBtn) {
        closeBtn.addEventListener('click', closeShareProfileModal);
    }
    
    if (overlay) {
        overlay.addEventListener('click', closeShareProfileModal);
    }
    
    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal && modal.style.display === 'flex') {
            closeShareProfileModal();
        }
    });
    
    // Prevent modal close when clicking inside modal container
    const modalContainer = modal?.querySelector('.share-modal-container');
    if (modalContainer) {
        modalContainer.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    }
});

// Make functions globally available
window.openShareProfileModal = openShareProfileModal;
window.closeShareProfileModal = closeShareProfileModal;
window.copyShareUrl = copyShareUrl;
window.shareOnFacebook = shareOnFacebook;
window.shareOnTwitter = shareOnTwitter;
window.shareOnInstagram = shareOnInstagram;


