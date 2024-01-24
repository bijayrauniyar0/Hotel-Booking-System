
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/guest-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com../css2?family=DM+Serif+Display:ital@1&display=swap" rel="stylesheet">
    <title>Hotel Booking System</title>
</head>
<body>
<?php require 'partials/nav.php'; ?>
    <section class="main-block">
        <div class="form-container">
            <div class="wrapper">
                <div id="navbar">
                    <div id="user-info">
                        Welcome, <span id="username-display"></span>!
                        <button id="logout">Logout</button>
                        <button id="edit">Edit</button>
                    </div>
                </div>
                <h1>Login as Guest</h1>
                <form id="login-form" name="myform" action="user.php" method="post">
                    <div class="field">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="pass-txt"><a href="#">Forgot password?</a></div>
                    <input type="submit" value="Login">
                </form>
                <div class="sign-txt">Not yet a member? <a href="signup.html">Sign up now</a></div>
            </div>
        </div>
    </section>
    
    <?php require 'partials/_footer.php'; ?>
<script src="../js/script.js"></script>
<script src="../js/login.js"></script>
</body>
</html>