const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function () {
    // Toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    // Toggle the eye slash icon
    this.querySelector('i').classList.toggle('fa-eye-slash');
    this.querySelector('i').classList.toggle('fa-eye');
});

// Toggle Confirm Password Visibility
const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
const confirmPassword = document.querySelector('#confirmPassword');

toggleConfirmPassword.addEventListener('click', function () {
    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPassword.setAttribute('type', type);
    this.querySelector('i').classList.toggle('fa-eye-slash');
    this.querySelector('i').classList.toggle('fa-eye');
});