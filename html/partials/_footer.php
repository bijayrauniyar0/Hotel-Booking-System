<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Document</title>
</head>
<body>
<footer id="contact">
        <div class="left-section">
            <h2 class="sign-h2">A trademark of</h2>
            <div class="sign">
                <img src="../images/logo.jpg" alt="signature">
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
      <h2 class="email">info@versehotel.com</h2>
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

                <form id="contactForm" name="contact-form" action="../html/partials/contact-data-sender.php" method="POST">
                    <div class="full-name">
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" name="first-name" placeholder="First Name"required>
                        <input type="text" id="name" name="last-name" placeholder="Last Name">
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
        <div class="vertical-end">Copyright 2022-2025. Created By Bijay Rauniyar</div>
    </div>
</body>
</html>