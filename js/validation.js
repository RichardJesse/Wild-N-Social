document.getElementById('signup-form').addEventListener('submit', function (event) {
    var name = document.getElementById('name');
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var cpassword = document.getElementById('cpassword');
    var termCon = document.getElementById('termCon');

    var errorMessage = document.getElementById('error-message');

    var isValid = true;

    
    name.classList.remove('input-error');
    email.classList.remove('input-error');
    password.classList.remove('input-error');
    cpassword.classList.remove('input-error');

    
    if (name.value.trim() === '') {
        name.classList.add('input-error');
        isValid = false;
    }

    if (email.value.trim() === '' || !isValidEmail(email.value.trim())) {
        email.classList.add('input-error');
        isValid = false;
    }

    if (password.value.trim() === '') {
        password.classList.add('input-error');
        isValid = false;
    }

    if (cpassword.value.trim() === '' || cpassword.value.trim() !== password.value.trim()) {
        cpassword.classList.add('input-error');
        isValid = false;
    }

    if (!termCon.checked) {
        termCon.classList.add('input-error');
        isValid = false;
    }

    if (!isValid) {
        errorMessage.style.display = 'block';
        errorMessage.textContent = 'Please correct the errors in the form.';
        event.preventDefault();
    }
});

function isValidEmail(email) {
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}