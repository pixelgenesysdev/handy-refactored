// Extracted from: auth/reset-password.php

const buttonreset = document.getElementById('continueBtnreset');
const passwordcheck1 = document.getElementsByClassName('password22')[0];
const passwordcheck2 = document.getElementsByClassName('password-confirm')[0];
console.log(passwordcheck1.value);

buttonreset.addEventListener('click', () => {
    const passVal = passwordcheck1.value.trim();
    const confirmVal = passwordcheck2.value.trim();
console.log(passVal);
    if (passVal === '' || confirmVal === '') {
        showPopup(
            'Please fill out all fields.', 
            'error', 
            'Error', 
            'OK',
            '#'
        );
    } else if (passVal !== confirmVal) {
        showPopup(
            'Passwords do not match, please try again.', 
            'error', 
            'Error', 
            'OK',
            '#'
        );
    } else {
        showPopup(
            'Your password has been changed successfully. Use your new password to login.', 
            'success', 
            'Password Updated!', 
            'Back to Login',
            () => {
                window.location.href = SITE_URL + '/auth/index.php';
            }
        );
    }
});