<?php 
$data=false;
    session_start();
    if (!isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] != true) {
        header("location: ../guest-login.php");
        exit;
    }
else {
    include "../partials/_dbconnect.php";
    $sql = "SELECT * FROM `bookingdetails`";
    $result= mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);


    if($num>0){
        $data=true;
    }

}

if($data){
    
    
echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    table {
        border-collapse: collapse;
        width: 98%;
        margin: 50px auto 20px;
       
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
    <title>Booking Data</title>
</head>
<body>';

include "./partials/admin_nav.php";

    echo'
    <h1 style="text-align: center; margin-top: 20px;">Booking Data</h1>
    <table>
    <thead><tr>
            <th>S. No.</th>
            <th>Name</th>
            <th>Name of Booking</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Room Type</th>
            <th>Rate</th>
            <th>No. of Guests</th>
            <th>No of Rooms</th>
            <th>Check-in Date</th>
            <th>Checkout Date</th>
            <th>Days</th>
            <th>Total</th>
            <th>VAT</th>
            <th>Grand Total</th>
        </tr>
    </thead>
    <tbody>';
        $i=0;
        while($booking_data = mysqli_fetch_assoc($result)){
            $i++;

            echo "<tr>";
            echo "<td>" . $i. "</td>";
            echo "<td>" . $booking_data["Name"] . "</td>";
            echo "<td>" . $booking_data["NameForBooking"] . "</td>";
            echo "<td>" . $booking_data["Phone"] . "</td>";
            echo "<td>" . $booking_data["Email"] . "</td>";
            echo "<td>" . $booking_data["RoomType"] . "</td>";
            echo "<td>" . $booking_data["Rate"] . "</td>";
            echo "<td>" . $booking_data["NumberOfGuests"] . "</td>";
            echo "<td>" . $booking_data["NumberOfRooms"] . "</td>";
            echo "<td>" . $booking_data["CheckIn"] . "</td>";
            echo "<td>" . $booking_data["CheckOut"] . "</td>";
            echo "<td>" . $booking_data["Days"] . "</td>";
            echo "<td>" . $booking_data["Total"] . "</td>";
            echo "<td>" . $booking_data["VAT"] . "</td>";
            echo "<td>" . $booking_data["GrandTotal"] . "</td>";
            echo "</tr>";
            echo'</tbody>';
        
        }
echo'
</body>
</html>';
}
