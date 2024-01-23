<?php require 'partials/nav.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/sign-up.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com../css2?family=DM+Serif+Display:ital@1&display=swap" rel="stylesheet">
    <title>Hotel Booking System</title>
</head>
<body>
    <section class="main-block">
        <div class="form-container">
            <div class="wrapper">
                <h1>Sign Up</h1>
                <form id="signup-form" name="signupForm" action="#" method="post">
                    <div class="field">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>
                    </div>
                    <div class="field">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="field">
                        <label for="phoneNumber">Phone Number</label>
                        <div class="phone-input">
                            <!-- <input type="tel" id="countryCode" name="countryCode" placeholder="Country Code" required> -->
                            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        <input type="password" id="password" name="password" placeholder="Re-enter your password" required>
                    </div>
                    <input type="submit" value="Sign Up">
                </form>
                <div class="sign-txt">Already a member? <a href="login.html">Login here</a></div>
            </div>
        </div>
    </section>
    

    <footer>
        <div class="left-section">
            <h2 class="sign-h2">A trademark of</h2>
            <div class="sign">
                <img src="../images/sign-1.png" alt="signature">
                <img src="../images/sign-2.png" alt="signature">
            </div>
            
        </div>

        <div class="vertical"></div> 
        <!-- vertical line for border -->
        <section class="mid-footer">
            <h2 class="mid-heading">Get Connected:</h2>
            <div class="horizental"></div> 
          
            <div class="sub-sections">
                <div class="mid-left">
                  <div class="image-row">
                      <div class="icon-box">
                        <a href="#"><img src="../images/insta.png" alt=""></a>
                      </div>
                      <div class="icon-box">
                          <a href="#"><img src="../images/fb.png" alt=""></a>
                      </div>
                    </div>
                    <div class="image-row">
                      <div class="icon-box">
                          <a href="#"><img src="../images/linkedin.png" alt=""></a>
                      </div>
                      <div class="icon-box">
                          <a href="#"><img src="../images/twitter.png" alt=""></a>
                      </div>
                    </div>
                    <div class="image-row">
                      <div class="icon-box">
                          <a href="#"><img src="../images/whatsapp.png" alt=""></a>
                      </div>
                      <div class="icon-box">
                          <a href="#"><img src="../images/gmail.png" alt=""></a>
                      </div>
                    </div>
                </div>
            
                <div class="mid-vertical"></div>
            
                <div class="mid-right">
                  <h2 class="location">Kathmandu, Nepal</h2>
                  <h2 class="number">+977-9876543210</h2>
                  <h2 class="email">info@brhotel.com</h2>
                </div>
            </div>
        </section>
        
        
       
        <div class="vertical"></div> 
        <!-- vertical line for border -->



        <div class="right-section">
            <div class="contact-form">
                <h2 class="contact-h2">Contact Us</h2>
            
            <div class="horizental"></div> 
            <!-- design under h2 -->

                <form id="contactForm">
                    <div class="full-name">
                        <label for="name">First Name:</label>
                        <input type="text" id="name" name="name" required>
                        <label for="name">Last Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required>
        
                    <label for="message">Your Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
        
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </footer>
    <div class="end">
    <div class="vertical-end">Copyright 2022-2025. All rights reserved</div>
    </div>
<script src="../js/script.js"></script>
<script src="../js/login.js"></script>
</body>
</html>