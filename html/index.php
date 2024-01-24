<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com../css2?family=DM+Serif+Display:ital@1&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>Hotel Booking System</title>
</head>
<body>
<?php require 'partials/nav.php'; ?>
    <main>
        <!-- Slide show container -->
        <div class="slideshow-container">
            <div class="mySlides">
                <img src="../images/image1.jpg" alt="Slide 1">
                <div class="text">Welcome to Paradise Resort</div>
                <div class="text1">Experience something magical</div>
                <div class="imgBook"><a href="reservations.php"><img src="../images/book-now.png" alt=""></a></div>
            </div>
            <div class="mySlides">
                <img src="../images/suite1.jpg" alt="Slide 2">
                <div class="text">Welcome to Paradise Resort</div>
                <div class="text1">Experience something magical</div>
                <div class="imgBook"><a href="reservations.php"><img src="../images/book-now.png" alt=""></a></div>
            </div>
            <div class="mySlides">
                <img src="../images/image3.jpg" alt="Slide 2">
                <div class="text">Welcome to Paradise Resort</div>
                <div class="text1">Experience something magical</div>
                <div class="imgBook"><a href="reservations.php"><img src="../images/book-now.png" alt=""></a></div>
            </div>
            <div class="mySlides">
                <img src="../images/suite.jpeg" alt="Slide 2">
                <div class="text">Welcome to Paradise Resort</div>
                <div class="text1">Experience something magical</div>
                <div class="imgBook"><a href="reservations.php"><img src="../images/book-now.png" alt=""></a></div>
            </div>

            <!-- Navigation buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
  
    </main>
    <hr>
    <section class="quarter">
        <div class="facilities">
            <h2>Facilities & Services</h2>
        </div>

        <div class="horizental"></div> 
        <!-- design under h2 -->

        <div class="image-container">
            <div class="image-box">
                <img src="../images/conference.jpg" alt="Image Description">
                <div class="content-container">
                    <h2 class="label-img">Conference</h2>
                    <a href="#"><h2 class="bordered-h2">Read More</h2></a>
                </div>
            </div>
            <div class="image-box">
                <img src="../images/gym.jpg" alt="Image Description">
                <div class="content-container">
                    <h2 class="label-img">GYM</h2>
                    <a href="#"><h2 class="bordered-h2">Read More</h2></a>
                </div>
            </div>
            <div class="image-box">
                <img src="../images/swimming-pool.jpg" alt="Image Description">
                <div class="content-container">
                    <h2 class="label-img">Swimming Pool</h2>
                    <a href="#"><h2 class="bordered-h2">Read More</h2></a>
                </div>
            </div>
        </div>
        <div class="image-container">
            <div class="image-box">
                <img src="../images/dininghall.jpg" alt="Image Description" class="dining">
                <div class="content-container">
                    <h2 class="label-img">Dining Hall</h2>
                    <a href="#"><h2 class="bordered-h2">Read More</h2></a>
                </div>
            </div>
            <div class="image-box">
                <img src="../images/wifi.jpg" alt="Image Description">
                <div class="content-container">
                    <h2 class="label-img">Fast Wifi</h2>
                    <a href="#"><h2 class="bordered-h2">Read More</h2></a>
                </div>
            </div>
            <div class="image-box">
                <img src="../images/banquet-hall.jpg" alt="Image Description">
                <div class="content-container">
                    <h2 class="label-img">Banquet Hall</h2>
                    <a href="#"><h2 class="bordered-h2">Read More</h2></a>
                </div>
            </div>
        </div>
        <div class="image-container">
            <div class="image-box">
                <img src="../images/shower.jpg" alt="Image Description" class="last-img">
                <div class="content-container">
                    <h2 class="label-img">Hot Water</h2>
                    <a href="#"><h2 class="bordered-h2">Read More</h2></a>
                </div>
            </div>
            <div class="image-box">
                <img src="../images/air-conditioner.jpg" alt="Image Description" class="last-img">
                <div class="content-container">
                    <h2 class="label-img">Air Conditioner</h2>
                    <a href="#"><h2 class="bordered-h2">Read More</h2></a>
                </div>
            </div>
            <div class="image-box">
                <img src="../images/kids-zone.jpg" alt="Image Description" class="last-img">
                <div class="content-container">
                    <h2 class="label-img">Kids Zone</h2>
                    <a href="#"><h2 class="bordered-h2">Read More</h2></a>
                </div>
            </div>
        </div>
    </section>

    <?php require 'partials/_footer.php'; ?>

    <script src="../js/script.js"></script>
</body>
</html>