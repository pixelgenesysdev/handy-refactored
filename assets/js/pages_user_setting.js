// Extracted from: pages/user_setting.php

const editprofilebtn = document.getElementById('editprofilebtn');
    const changepasswordlink = document.getElementById('changepassword');
    const deleteaccountlink = document.getElementById('deleteaccount');
    const userinfobox = document.getElementById('userinfobox');
    const topbarwithbtntext = document.querySelector('.topbarwithbtn h3');

    const editprofilebox = document.getElementById('editprofilebox');
    const changepasswordbox = document.getElementById('changepasswordbox');

    editprofilebtn.addEventListener('click', (e) => {
        e.preventDefault();
        editprofilebox.classList.toggle('d-none');
        changepasswordbox.classList.add('d-none');
        userinfobox.classList.add('d-none');
        topbarwithbtntext.textContent = 'Edit Profile';
    });

    changepasswordlink.addEventListener('click', (e) => {
        e.preventDefault();
        changepasswordbox.classList.toggle('d-none');
        editprofilebox.classList.add('d-none');
        userinfobox.classList.add('d-none');
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
                    'Your account has been deleted successfully.',
                    'success',
                    'Account Deleted',
                    'OK',
                    () => {
                        // Redirect to homepage or login page after deletion
                        window.location.href = '<?php echo SITE_URL; ?>';
                    }
                );
            }
        );
    });