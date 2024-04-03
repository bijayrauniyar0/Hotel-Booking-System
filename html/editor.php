<?php
session_start();
include "partials/_dbconnect.php";

$bookingHistory = false;

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
    header("location:guest:login.php");
}
    $sql3 = "SELECT * FROM bookingdetails WHERE Email = '".$_SESSION['email']."'";
    $sql1= "SELECT * FROM users WHERE Email = '".$_SESSION['email']."'";

    $result3 = mysqli_query($conn, $sql3);
    $result1 = mysqli_query($conn, $sql1);

    $num3 = mysqli_num_rows($result3);
    $num1 = mysqli_num_rows($result1);

    $user_data = mysqli_fetch_assoc($result1);
    if($num3 == 0){
        $bookingHistory = false;
    }
    else{
        $bookingHistory=true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2f01e0402b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/editor.css">
    <title>My Profile</title>
</head>
<body>
    <?php include "partials/nav.php"; ?>

    <section id="data-container">
    <div class="my-profile">
    <h1> My Profile </h1>
    </div>
    <div class="profile-container">
        <div class="left-container">
            <h2 class="credentials"> Credintials </h2>
            <div class="full-profile">
                <div class="user-details">
                    <?php
  
                        echo '
                        <h2 class="details-holder">&nbsp&nbspName:&nbsp&nbsp'.$user_data["Name"].' </h2>
                        ' ;

                        echo '
                        <h2 class="details-holder">&nbsp&nbspPhone:&nbsp&nbsp'.$user_data["Phone"].'</h2> ' ;

                        echo '
                        <h2 class="details-holder">&nbsp&nbspEmail:&nbsp&nbsp'.$user_data["Email"].' </h2> ' ;

                        echo '
                        <h2 class="details-holder">&nbsp&nbspLocation:&nbsp&nbsp '.$user_data["Address"].' </h2> ' ;

                        echo '
                        <h2 class="details-holder" id="last-detail">&nbsp&nbspGender:&nbsp&nbsp'.$user_data["Gender"].' </h2> ' ;
                    ?>
                </div>
            </div>
            <!-- <span class="edit-profile">
                <button onclick="openEditor()">Edit Profile</button>
            </span> -->
        </div>
        <div class="right-container">
        <h2 class="credentials"> Booking Information</h2>
            <div class="booking-details">    
            <table>
                <thead>
                    <?php
                if($bookingHistory){
                    
                    echo'<tr>
                        <th>Name of Booking</th>
                        <th>Room Type</th>
                        <th>No of Rooms</th>
                        <th>Check-in Date</th>
                        <th>Checkout Date</th>
                    </tr>
                </thead>
                <tbody>';
                
                    while($row3 = mysqli_fetch_assoc($result3)){

                    echo "<tr>";
                    echo "<td>" . $row3["NameForBooking"] . "</td>";
                    echo "<td>" . $row3["RoomType"] . "</td>";
                    echo "<td>" . $row3["NumberOfRooms"] . "</td>";
                    echo "<td>" . $row3["CheckIn"] . "</td>";
                    echo "<td>" . $row3["CheckOut"] . "</td>";
                    echo "</tr>";
                    }
                }
                else{
                    echo'<h2 style="font-size:3rem; text-align:center; margin-top:100px; color:beige;"> Booking Data not Available</h2>';
                }
                echo'</tbody>
                </table>
            </div>
        </div>
    </div>
    </section>';
    require "partials/_footer.php";
    echo'
</body>
</html>';
?>