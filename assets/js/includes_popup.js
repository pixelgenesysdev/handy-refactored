// Extracted from: includes/popup.php

// ===========================
    // Popup Notification Script
    // ===========================

    // Get popup and close icon elements
    const popupBox = document.getElementById('popup-box');
    const closeIcon = document.querySelector('.closeicon i');

    /**
     * Show the popup box with a custom message and style
     * @param {string} message - Message text inside the popup
     * @param {string} type - Popup type (success, error, info, logout, delete)
     * @param {string} title - Title text for the popup
     * @param {string} btnText - Text for the main button
     * @param {function|null} onclickfunction - Optional callback when main button is clicked
     */

    function showPopup(
        message = 'Your action was successful!',
        type = 'success',
        title = 'Success',
        btnText = 'OK',
        onclickfunction = null
    ) {
        // Get popup inner elements
        const messageElem = popupBox.querySelector('.popup-message');
        const titleElem = popupBox.querySelector('.popup-title');
        const btnElem = document.getElementById('continueBtnpopup');
        const btnElem2 = document.getElementById('continueBtnpopup2');
        const iconElem = popupBox.querySelector('.icon img');

        // Reset any previous changes
        btnElem.classList.remove('half-btn');
        btnElem2.classList.add('d-none');
        btnElem2.style.display = 'none';
        closeIcon.style.display = 'block';

        // Set message, title, and button text
        messageElem.textContent = message;
        titleElem.textContent = title;
        btnElem.textContent = btnText;

        // Assign click handler
        btnElem.onclick = () => {
            if (typeof onclickfunction === 'function') {
                onclickfunction(); // Call the passed function if valid
            }
            hidePopup(); // Always hide popup after click
        };

        // Customize icon and layout based on popup type
        switch (type) {
            case 'success':
                iconElem.src = `${SITE_URL}assets/images/popup-success.png`;
                closeIcon.style.display = 'none';
                popupBox.classList.remove('error-popup', 'info-popup', 'logout-popup', 'delete-popup');
                popupBox.classList.add('success-popup');
                break;

            case 'error':
                iconElem.src = `${SITE_URL}assets/images/popup-error.png`;
                popupBox.classList.remove('success-popup', 'info-popup', 'logout-popup', 'delete-popup');
                popupBox.classList.add('error-popup');
                break;

            case 'info':
                iconElem.src = `${SITE_URL}assets/images/popup-info.png`;
                popupBox.classList.remove('success-popup', 'error-popup', 'logout-popup', 'delete-popup');
                popupBox.classList.add('info-popup');
                break;

            case 'logout':
                iconElem.src = `${SITE_URL}assets/images/popup-error.png`;
                closeIcon.style.display = 'none';
                popupBox.classList.remove('error-popup', 'info-popup', 'success-popup', 'delete-popup');
                btnElem2.style.display = 'block';
                btnElem2.classList.remove('d-none');
                btnElem2.onclick = hidePopup;
                btnElem.classList.add('half-btn');
                popupBox.classList.add('logout-popup');
                break;
            case 'pro':
                iconElem.src = `${SITE_URL}assets/images/popup-pro.png`;
                closeIcon.style.display = 'none';
                popupBox.classList.remove('error-popup', 'info-popup', 'success-popup', 'delete-popup');
                btnElem2.style.display = 'block';
                btnElem2.classList.remove('d-none');
                btnElem2.onclick = hidePopup;
                btnElem.classList.add('half-btn');
                popupBox.classList.add('logout-popup');
                break;

            case 'delete':
                iconElem.src = `${SITE_URL}assets/images/popup-error.png`;
                popupBox.classList.remove('success-popup', 'info-popup', 'logout-popup', 'error-popup');
                btnElem2.style.display = 'block';
                btnElem2.classList.remove('d-none');
                btnElem2.onclick = hidePopup;
                btnElem.classList.add('half-btn');
                closeIcon.style.display = 'none';
                popupBox.classList.add('delete-popup');
                break;

            default:
                iconElem.src = `${SITE_URL}assets/images/popup-info.png`;
        }

        // Finally, show the popup
        popupBox.style.display = 'flex';
    }

    // Hide popup function
    function hidePopup() {
        popupBox.style.display = 'none';
    }

    // Event listener for close icon
    closeIcon.addEventListener('click', hidePopup);

    // Example Usage:
    // showPopup('Your action was successful!', 'success');