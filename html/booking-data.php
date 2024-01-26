<?php 
$data=false;
    session_start();
    if (!isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] != true) {
        header("location: guest-login.php");
        exit;
    }
else {
    include "partials/_dbconnect.php";
   $sql = "SELECT * FROM `bookingdetails`";
    $result= mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);

    $booking_data = mysqli_fetch_assoc($result);


    if($num>0){
        $data=true;
    }

}
include "partials/nav.php";

if($data){
    
    
echo'
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel"stylesheet" href="../css/booking-data.css">
    <style>
    table {
        border-collapse: collapse;
        width: 90%;
        margin: 20px auto;
       
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    </style>
    <title>Document</title>
</head>
<body>

    <table>
    <thead>';
        echo'<tr>
            <th>S. No.</th>
            <th>Name</th>
            <th>Name of Booking</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Room Type</th>
            <th>No. of Guests</th>
            <th>No of Rooms</th>
            <th>Check-in Date</th>
            <th>Checkout Date</th>
        </tr>
    </thead>
    <tbody>';
    
        while($booking_data = mysqli_fetch_assoc($result)){

            echo "<tr>";
            echo "<td>" . $booking_data["sno"] . "</td>";
            echo "<td>" . $booking_data["Name"] . "</td>";
            echo "<td>" . $booking_data["NameForBooking"] . "</td>";
            echo "<td>" . $booking_data["Phone"] . "</td>";
            echo "<td>" . $booking_data["Email"] . "</td>";
            echo "<td>" . $booking_data["RoomType"] . "</td>";
            echo "<td>" . $booking_data["NumberOfGuests"] . "</td>";
            echo "<td>" . $booking_data["NumberOfRooms"] . "</td>";
            echo "<td>" . $booking_data["CheckIn"] . "</td>";
            echo "<td>" . $booking_data["CheckOut"] . "</td>";
            echo "</tr>";
            echo'</tbody>';
        
        }
echo'
</body>
</html>';
}
