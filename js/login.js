function validateform() {
    var email = document.myform.email.value;
    var password = document.myform.password.value;

    // Validate email
    if (email == null || email === "") {
        alert("Email cannot be blank")
        return false;
    } else if (!validateEmail(email)) {
        alert("Enter a valid email address")
        return false;
    }

    // Validate password length
    if (password == null || password.length < 8) {
        alert("Password must be 8 character long")
        return false;
    }

    return true;
}

function validateEmail(email) {
    // Regular expression for basic email validation
    var email_check = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return email_check.test(email);
}


//login option 

document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
    const navbar = document.getElementById('navbar');
    const userInfo = document.getElementById('user-info');
    const usernameDisplay = document.getElementById('username-display');
    const logoutButton = document.getElementById('logout');
    const editButton = document.getElementById('edit');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const emailInput = document.getElementById('email').value;
        // Perform login logic here (validate credentials, etc.)

        // For simplicity, let's assume the login is successful
        showNavbar(emailInput);
    });

    logoutButton.addEventListener('click', function() {
        hideNavbar();
    });

    editButton.addEventListener('click', function() {
        // Implement your edit logic here
        alert('Edit functionality to be implemented.');
    });

    function showNavbar(email) {
        navbar.style.display = 'block';
        userInfo.style.display = 'block';
        usernameDisplay.textContent = email;
    }

    function hideNavbar() {
        navbar.style.display = 'none';
        userInfo.style.display = 'none';
        // Clear any user-specific data or perform logout logic here
    }
});