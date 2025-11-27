// Universal Show/Hide Password

document.querySelectorAll('.toggle-password-btn').forEach((btn, index) => {
    const passwordField = document.querySelectorAll('.toggle-password-input')[index];

    btn.addEventListener('click', function () {
        const type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
});
