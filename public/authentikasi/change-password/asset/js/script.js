const form = document.getElementById('changePasswordForm');
const passwordInput = document.getElementById('password');
const confirmInput = document.getElementById('confirmPassword');
const passwordError = document.getElementById('passwordError');
const confirmError = document.getElementById('confirmError');

form.addEventListener('submit', function(e) {
    let valid = true;
    passwordError.style.display = 'none';
    confirmError.style.display = 'none';

    if (passwordInput.value.length < 8) {
    passwordError.style.display = 'block';
    valid = false;
    }

    if (confirmInput.value !== passwordInput.value) {
    confirmError.style.display = 'block';
    valid = false;
    }

    if (!valid) {
    e.preventDefault();
    }
});