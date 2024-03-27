<?php 
session_start();
include 'partials/_dbconnect.php';
?>
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

    <main style="position: relative;">
        <!-- Slide show container -->
        <div class="slideshow-container">
            <?php 
            $sql = "SELECT * FROM `roomprices`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo'
                
                <div class="mySlides">
                    <img src="../images/rooms/'.$row['image'].'" alt="Slide 1">
                    <div class="text">Welcome to Verse Resort</div>
                    <div class="text1">Experience something magical</div>
                    <div class="imgBook"><a href="reservations.php"><img src="../images/book-now.png" alt=""></a></div>
                </div>
            ';} ?>
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
                <img src="../images/facilities/conference.jpg" alt="Image Description">
                <div class="content-container">
                    <h2 class="label-img">Conference</h2>
                </div>
            </div>
            <div class="image-box">
                <img src="../images/facilities/gym.jpg" alt="Image Description">
                <div class="content-container">
                    <h2 class="label-img">GYM</h2>
                </div>
            </div>
            <div class="image-box">
                <img src="../images/facilities/swimming-pool.jpg" alt="Image Description">
                <div class="content-container">
                    <h2 class="label-img">Swimming Pool</h2>
                </div>
            </div>
        </div>
        <div class="image-container">
            <div class="image-box">
                <img src="../images/facilities/dininghall.jpg" alt="Image Description" class="dining">
                <div class="content-container">
                    <h2 class="label-img">Dining Hall</h2>
                </div>
            </div>
            <div class="image-box">
                <img src="../images/facilities/banquet-hall.jpg" alt="Image Description">
                <div class="content-container">
                    <h2 class="label-img">Banquet Hall</h2>
                </div>
            </div>
            <div class="image-box">
                <img src="../images/facilities/kids-zone.jpg" alt="Image Description" class="last-img">
                <div class="content-container">
                    <h2 class="label-img">Kids Zone</h2>
                </div>
            </div>
        </div>
    </section>

    <?php require 'partials/_footer.php'; ?>

    <script src="../js/script.js"></script>
</body>
</html>