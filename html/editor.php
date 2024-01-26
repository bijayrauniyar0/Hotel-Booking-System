<?php require "partials/nav.php";
$bookingHistory = false;
$userdata=false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
{   include "partials/_dbconnect.php";
    $loggedin=true;

    $sql = "SELECT * FROM bookingdetails WHERE Email = '".$_SESSION['email']."'";
    $sql1= "SELECT * FROM users WHERE Email = '".$_SESSION['email']."'";

    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);

    $num = mysqli_num_rows($result);
    $num1 = mysqli_num_rows($result1);

    $user_data = mysqli_fetch_assoc($result1);
    if($num == 0){
        echo'
        <h1> No Data Available</h1>';
    }
    else{
        $bookingHistory=true;
    }
    if($num1==1){
        $userdata=true;
    }
}

if($loggedin){
echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="../css/editor.css">
</head>
<body>
    <section id="data-container">
    <div class="my-profile">
    <h1> My Profile </h1>
    </div>
    <div class="profile-container">
    <div class="left-container">
        <h2 class="credentials"> Credintials </h2>
            <div class="user-details">';
            if($userdata)
            {    
                echo '<h2 class="details-holder">Name:'.$user_data["Name"].'</h2>';
                echo '<h2 class="details-holder">Phone:'.$user_data["Phone"].'</h2>';
                echo '<h2 class="details-holder">Email:'.$user_data["Email"].'</h2>';
                echo '<h2 class="details-holder">Location: '.$user_data["Address"].'</h2>';
                echo '<h2 class="details-holder" id="last-detail">Gender:'.$user_data["Gender"].'</h2>';
            }
            
            echo'
            </div>
    </div>
    <div class="right-container">
    <h2 class="credentials"> Booking Information</h2>
            <div class="booking-details">    
            <table>
                <thead>
                    
                    <tr>
                        <th>Name of Booking</th>
                        <th>Room Type</th>
                        <th>No of Rooms</th>
                        <th>Check-in Date</th>
                        <th>Checkout Date</th>
                    </tr>
                </thead>
                <tbody>';
                if($bookingHistory){
                    $row = mysqli_fetch_assoc($result);

                    echo "<tr>";
                    echo "<td>" . $row["NameForBooking"] . "</td>";
                    echo "<td>" . $row["RoomType"] . "</td>";
                    echo "<td>" . $row["NumberOfRooms"] . "</td>";
                    echo "<td>" . $row["CheckIn"] . "</td>";
                    echo "<td>" . $row["CheckOut"] . "</td>";
                    echo "</tr>";
                }
                echo'</tbody>
                </table>
            </div>
    </div>
    </div>
    </section>
</body>
</html>';
require "partials/_footer.php";
} 
else{
header("location:guest:login.php");
}
?>