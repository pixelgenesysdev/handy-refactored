// Show/Hide Password

const togglePassword = document.querySelectorAll('#togglePassword');
const password = document.querySelectorAll('.toggle-password');
    function togglePasswordVisibility(togglePassword, password, passwordConfirm) {
        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });
    }

    for(let i = 0; i < togglePassword.length; i++) {
        togglePasswordVisibility(togglePassword[i], password[i]);
    }

// End Show/Hide Password
