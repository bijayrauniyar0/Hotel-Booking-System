<!-- temporary file to keep backup -->




<?php require 'partials/nav.php'; ?>
<?php $loggedin = false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
{
    $loggedin=true;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
    include 'partials/_dbconnect.php';
    
    $name = $_POST['bookingName'];
    $roomType = $_POST['roomType'];
    $checkIn = $_POST['checkIn'];
    $checkOut= $_POST['checkOut'];
    $numberOfRooms = $_POST['roomNumber'];
    $numberOfGuests = $_POST['guestNumber'];

    $existingBookingQuery = "SELECT * FROM bookingdetails WHERE Email = '".$_SESSION['email']."' AND CheckIn='$checkIn' AND CheckOut='$checkOut'";
    $existingBookingResult = mysqli_query($conn, $existingBookingQuery);

    if(mysqli_num_rows($existingBookingResult) > 0)
    {
        echo'<div id="error-alert" role="alert" style="">
        <h2>Error!</h2> Booking already exists.
        <button type="button" class="btn-ok"><a href="index.php">OK</a></button><br>
       </div>';
       echo '<script>
        setTimeout(function() {
            var errorAlert = document.getElementById("error-alert");
            if (errorAlert) {
                errorAlert.style.display = "none";
            }
        }, 5000);
       </script>';
    }
    else
    {
        $sql = "SELECT * FROM users WHERE Email = '".$_SESSION['email']."'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ( $num==1) 
        {
            $row = mysqli_fetch_assoc($result);

            $sql1 = "INSERT INTO `bookingdetails` (`Name`, `Phone`, `Email`, `NameForBooking`, `RoomType`, `CheckIn`, `CheckOut`, `NumberOfRooms`, `NumberOfGuests`) 
            VALUES ('" . $row["Name"] . "', '" . $row["Phone"] . "', '" . $row["Email"] . "', '$name', '$roomType', '$checkIn', '$checkOut', '$numberOfRooms', '$numberOfGuests')";

            $result1=mysqli_query($conn,$sql1);
            if($result1){
                echo'
                <script>
                alert("Successfully Booked");
                </script>
                ';
            }
            else{
                echo'
                <script>
                alert("Error! Booking Error");
                </script>
                ';
            }
        }
    }
}



if(!$loggedin)
    {
        echo'
        <script>
        alert("You are not logged in");
        window.location.href="../HTML/guest-login.php";
        </script>
        ';
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/book-now.css">
        <style>
            #error-alert{
                text-align: center;
                width: 30%;
                margin: 70px auto;
                font-size: 20px;
                border-radius: 8px;
                border: 1px solid rgb(218, 18, 18);
                background-color: rgba(233, 25, 25, 0.555);
            }
            .btn-ok a{
                text-decoration:none; 
                color: white;
            }
            .btn-ok{
           margin-bottom:10px;
        }
        </style>
        <title>Book Now</title>
    </head>
    <body>
        <main>
            <section id="main-booking">
                <div class="left-space">
                    <div class="image-holder">
                        <div class="suites-title">
                            <h2>Our Suites</h2>
                        </div>
                    <div class="rev-horizental"></div> 
    
                    <div class="suites-main">
                        <div class="suites-image">
                            <img src="../images/villa.jpg" alt="Image 1" class="image">
                            <div class="content-container">
                                <h2 class="rate">Villa Suite </h2>  
                            </div>
                        </div>
                    
                        <div class="suites-image">
                        <img src="../images/pool-side.jpg" alt="Image 2" class="image">
                        <div class="content-container">
                            <h2 class="rate">Executive Suite</h2>
                            
                        </div>
                        </div>
                    
                        <div class="suites-image">
                        <img src="../images/terrace-suite.jpeg" alt="Image 3" class="image">
                        <div class="content-container">
                            <h2 class="rate">Terrace Suite</h2>
                            
                        </div>
                        </div>
                    </div>
                    <div class="suites-main">
                        <div class="suites-image">
                            <img src="../images/honeymoon-suite.jpg" alt="Image 1" class="image">
                            <div class="content-container">
                                <h2 class="rate">Honeymoon Suite</h2>  
                            </div>
                        </div>
                    
                        <div class="suites-image">
                        <img src="../images/beach-side.jpg" alt="Image 2" class="image">
                        <div class="content-container">
                            <h2 class="rate">Island Hut</h2>
                            
                        </div>
                        </div>
                    
                        <div class="suites-image">
                        <img src="../images/private-pool.jpg" alt="Image 3" class="image">
                        <div class="content-container">
                            <h2 class="rate">Pool Suite</h2>
                            
                        </div>
                        </div>
                    </div>
                    <div class="suites-main">
                        <div class="suites-image">
                        <img src="../images/super-deluxe.jpg" alt="Image 1" class="image">
                        <div class="content-container">
                            <h2 class="rate">Super Deluxe</h2>
                            
                        </div>
                        </div>
                    
                        <div class="suites-image">
                        <img src="../images/general.jpg" alt="Image 2" class="image">
                        <div class="content-container">
                            <h2 class="rate">Deluxe Room</h2>
                            
                        </div>
                        </div>
                    
                        <div class="suites-image">
                        <img src="../images/non-balcony.jpg" alt="Image 3" class="image">
                        <div class="content-container">
                            <h2 class="rate">Non-Balcony</h2>
                            
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="right-space">
                    <div class="book-form">
                        <div class="form-title">
                            <h2>Book Now</h2>
                        </div>
                        <div class="form-horizental"></div> 
    
                            <form action="../html/billing.php" method="POST">
                                <div class="select-name">
                                    <div class="form-group">
                                        <label for="nameForBooking" class="form-margin"><p>Name for Booking</p></label>
                                        <input type="text" class="form-control" name="bookingName" id="nameForBooking" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="roomType" class="form-margin"><p>Select Suites</p></label>
                                        <select class="form-drop-down" id="roomType" name="roomType" required>
                                            <option value="non-balcony">Non-Balcony</option>
                                            <option value="deluxe">Deluxe Room</option>
                                            <option value="super-deluxe">Super Deluxe</option>
                                            <option value="pool-suite">Pool Suite</option>
                                            <option value="island-hut">Island Hut</option>
                                            <option value="honeymoon-suite">Honeymoon Suite</option>
                                            <option value="terrace-suite">Terrace Suite</option>
                                            <option value="executive-suite">Executive Suite</option>
                                            <option value="villa">Villa</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="booking-dates">
                                <div class="form-group">
                                    <label for="checkInDate" class="form-margin"><p>Check In</p></label>
                                    <input type="date" class="form-control" id="checkInDate" name="checkIn" placeholder="Check In" required>
                                </div>
                                <div class="form-group">
                                    <label for="checkOutDate" class="form-margin"><p>Check Out</p></label>
                                    <input type="date" class="form-control" id="checkOutDate" name="checkOut"  placeholder="Check Out" required>
                                </div>
                            </div>
                            <div class="numbers-holder">
                                <div class="form-group">
                                    <label for="numberOfRooms" class="form-margin"><p>Number of Rooms</p></label>
                                    <input type="number" class="form-control" id="numberOfRooms" value="1" min="1" name="roomNumber" required>
                                </div>
                                <div class="form-group">
                                    <label for="numberOfGuests" class="form-margin"><p>Number of Guests</p></label>
                                    <input type="number" class="form-control" id="numberOfGuests" name="guestNumber"value="1" min="1" required>
                                </div>
                                </div>
                            <input type="submit" class="booking-btn" value="Submit">
                    </form>
                    </div>
                </div>
            </section>
        </main>
    </body>
    </html>';


<?php require 'partials/_footer.php'; ?>
