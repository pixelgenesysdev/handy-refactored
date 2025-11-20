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
            'Your password has been changed successfully. Use your new password to login.',
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
