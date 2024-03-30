<?php 
session_start();
require 'partials/_dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/reservation.css">
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
    <div class="suites-title">
        <h2>Suites & Rates</h2>
    </div>
    <div class="rev-horizental"></div> 
    
    <?php 
    $sql2 = "SELECT * FROM `roomprices`";
    $result2 = mysqli_query($conn, $sql2);
    echo'
    <div class="suites-main">';
    while($row2 = mysqli_fetch_assoc($result2)){
      if($row2['availability'] == 1){
        echo '
        <div class="suites-image">
          <img src="../images/rooms/'.$row2['image'].'" alt="Image 1" class="image">
          <div class="content-container">
            <h2 class="rate">'.$row2['room_name'].': &nbsp; '.$row2['room_rate'].'</h2>
            <a href="book-now.php"><h2 class="bordered-h2">Book Now</h2></a>
          </div>
        </div>
    
        ';}
      }

    echo '</div>';
    ?>
    <!-- <div class="suites-image">
          <img src="../images/beach-side.jpg" alt="Image 2" class="image">
          <div class="content-container">
            <h2 class="rate">Island Hut: &nbsp;&nbsp;Nrs 21,000 </h2>
            <a href="book-now.php"><h2 class="bordered-h2">Book Now</h2></a>
          </div>
        </div>
    
        <div class="suites-image">
          <img src="../images/private-pool.jpg" alt="Image 3" class="image">
          <div class="content-container">
            <h2 class="rate">Pool Suite: &nbsp;&nbsp;Nrs 18,000 </h2>
            <a href="book-now.php"><h2 class="bordered-h2">Book Now</h2></a>
          </div>
        </div>  -->
    <!-- <div class="suites-main">
        <div class="suites-image">
          <img src="../images/super-deluxe.jpg" alt="Image 1" class="image">
          <div class="content-container">
            <h2 class="rate">Super Deluxe: &nbsp;&nbsp;Nrs 15,000 </h2>
            <a href="book-now.php"><h2 class="bordered-h2">Book Now</h2></a>
          </div>
        </div>
    
        <div class="suites-image">
          <img src="../images/general.jpg" alt="Image 2" class="image">
          <div class="content-container">
            <h2 class="rate">Deluxe Room: &nbsp;&nbsp;Nrs 12,000 </h2>
            <a href="book-now.php"><h2 class="bordered-h2">Book Now</h2></a>
          </div>
        </div>
    
        <div class="suites-image">
          <img src="../images/non-balcony.jpg" alt="Image 3" class="image">
          <div class="content-container">
            <h2 class="rate">Non-Balcony: &nbsp;&nbsp;Nrs 10,500 </h2>
            <a href="book-now.php"><h2 class="bordered-h2">Book Now</h2></a>
          </div>
        </div>
    </div> -->
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