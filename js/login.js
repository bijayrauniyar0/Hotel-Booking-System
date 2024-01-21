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
