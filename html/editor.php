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
        $bookingHistory = false;
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
    <script src="https://kit.fontawesome.com/2f01e0402b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/editor.css">
    <title>My Profile</title>
</head>
<body>
    <section id="data-container">
    <div class="my-profile">
    <h1> My Profile </h1>
    </div>
    <div class="profile-container">
    <div class="left-container">
        <h2 class="credentials"> Credintials </h2>
        <div class="full-profile">
            <div class="user-details">';
            if($userdata)
            {    
                echo '
                <h2 class="details-holder">&nbsp&nbspName:&nbsp&nbsp'.$user_data["Name"].' 
                <a href="#" class="profile-editor"> 
                <i class="fa-solid fa-pen-to-square" id="editor" style="color:black;">
                </i></a> </h2> ' ;

                echo '
                <h2 class="details-holder">&nbsp&nbspPhone:&nbsp&nbsp'.$user_data["Phone"].'
                <a href="#" class="profile-editor"> 
                <i class="fa-solid fa-pen-to-square" id="editor" style="color:black;">
                </i></a> </h2> ' ;

                echo '
                <h2 class="details-holder">&nbsp&nbspEmail:&nbsp&nbsp'.$user_data["Email"].'
                <a href="#" class="profile-editor"> 
                <i class="fa-solid fa-pen-to-square" id="editor" style="color:black;">
                </i> </a> </h2> ' ;

                echo '
                <h2 class="details-holder">&nbsp&nbspLocation:&nbsp&nbsp '.$user_data["Address"].'
                <a href="#" class="profile-editor"> 
                <i class="fa-solid fa-pen-to-square" id="editor" style="color:black;">
                </i></a> </h2> ' ;

                echo '
                <h2 class="details-holder" id="last-detail">&nbsp&nbspGender:&nbsp&nbsp'.$user_data["Gender"].'<a href="#" class="profile-editor"> 
                <i class="fa-solid fa-pen-to-square" id="editor" style="color:black;"></i></a> </h2> 
                </div>' ;
            }
            
            echo'
                <div class="profile-pic">
                    <img src="../images/profile.jpg">
                </div>
            </div>
    </div>
    <div class="right-container">
    <h2 class="credentials"> Booking Information</h2>
            <div class="booking-details">    
            <table>
                <thead>';
                if($bookingHistory){
                    $row = mysqli_fetch_assoc($result);
                    echo'<tr>
                        <th>Name of Booking</th>
                        <th>Room Type</th>
                        <th>No of Rooms</th>
                        <th>Check-in Date</th>
                        <th>Checkout Date</th>
                    </tr>
                </thead>
                <tbody>';
                
                    

                    echo "<tr>";
                    echo "<td>" . $row["NameForBooking"] . "</td>";
                    echo "<td>" . $row["RoomType"] . "</td>";
                    echo "<td>" . $row["NumberOfRooms"] . "</td>";
                    echo "<td>" . $row["CheckIn"] . "</td>";
                    echo "<td>" . $row["CheckOut"] . "</td>";
                    echo "</tr>";
                }
                else{
                    echo'<h2 style="font-size:3rem; text-align:center; margin-top:100px; color:beige;"> Booking Data not Available</h2>';
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