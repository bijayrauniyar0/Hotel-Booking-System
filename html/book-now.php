<?php 

session_start();
include 'partials/_dbconnect.php';
 
$loggedin = false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
}



if (!$loggedin) {
    echo '
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
        #error-alert {
            text-align: center;
            width: 30%;
            margin: 70px auto;
            font-size: 20px;
            border-radius: 8px;
            border: 1px solid rgb(218, 18, 18);
            background-color: rgba(233, 25, 25, 0.555);
        }

        .btn-ok a {
            text-decoration: none;
            color: white;
        }

        .btn-ok {
            margin-bottom: 10px;
        }
    </style>
    <title>Book Now</title>
</head>

<body>
    <?php require 'partials/nav.php'; ?>
    <main>
        <section id="main-booking">
            
            <div class="right-space">
                <div class="book-form">
                    <div class="form-title">
                        <h2>Book Now</h2>
                    </div>

                    <form action="../html/billing.php" method="POST">
                        <div class="form-container">
                            <div class="select-name">
                                <div class="form-group">
                                    <label for="nameForBooking" class="form-margin">
                                        <p>Name for Booking</p>
                                    </label>
                                    <input type="text" class="form-control" name="bookingName" id="nameForBooking" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="roomType" class="form-margin">
                                        <p>Select Suites</p>
                                    </label>
                                    <select class="form-drop-down" id="roomType" name="roomType" required>
                                        <?php
                                        $sql = "SELECT * FROM `roomprices`";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row['room_name'] . '">' . $row['room_name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="booking-dates">
                                <div class="form-group">
                                    <label for="checkInDate" class="form-margin">
                                        <p>Check In</p>
                                    </label>
                                    <input type="date" class="form-control" id="checkInDate" name="checkIn" placeholder="Check In" required>
                                </div>
                                <div class="form-group">
                                    <label for="checkOutDate" class="form-margin">
                                        <p>Check Out</p>
                                    </label>
                                    <input type="date" class="form-control" id="checkOutDate" name="checkOut" placeholder="Check Out" required>
                                </div>
                            </div>
                            <div class="numbers-holder">
                                <div class="form-group">
                                    <label for="numberOfRooms" class="form-margin">
                                        <p>Number of Rooms</p>
                                    </label>
                                    <input type="number" class="form-control" id="numberOfRooms" value="1" min="1" name="roomNumber" required>
                                </div>
                                <div class="form-group">
                                    <label for="numberOfGuests" class="form-margin">
                                        <p>Number of Guests</p>
                                    </label>
                                    <input type="number" class="form-control" id="numberOfGuests" name="guestNumber" value="1" min="1" required>
                                </div>
                            </div>
                            <span id="btn">
                                <button type="submit" class="booking-btn" value="Submit">Book</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>';


<?php require 'partials/_footer.php'; ?>