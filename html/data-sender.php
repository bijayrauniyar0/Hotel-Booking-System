<?php
session_start();
if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true){
    header("location: guest-login.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'partials/_dbconnect.php';

    $createBookingTable = "CREATE TABLE IF NOT EXISTS `bookingdetails` (
        `ID` INT AUTO_INCREMENT PRIMARY KEY,
        `Name` VARCHAR(255),
        `Phone` VARCHAR(20),
        `Email` VARCHAR(255),
        `NameForBooking` VARCHAR(255),
        `RoomType` VARCHAR(255),
        `CheckIn` DATE,
        `CheckOut` DATE,
        `NumberOfRooms` INT,
        `Rate` INT,
        `NumberOfGuests` INT,
        `Days` INT,
        `Total` INT,
        `VAT` INT,
        `GrandTotal` INT
    );";

    $createTableResult = mysqli_query($conn,$createBookingTable);
    

    $existingBookingQuery = "SELECT * FROM bookingdetails WHERE Email = '".$_SESSION['email']."' AND CheckIn='".$_SESSION["checkIn_date"]."' AND CheckOut='".$_SESSION["checkOut_date"]."'";
    $existingBookingResult = mysqli_query($conn, $existingBookingQuery);

    if(mysqli_num_rows($existingBookingResult) > 0)
    {
        echo'<div id="error-alert" role="alert">
        <h2>Error!</h2> Booking already exists.
        <button type="button" class="btn-ok"><a href="index.php">OK</a></button><br>
       </div>';
       echo 
       '<script>
            alert("Error! Booking Already Exists")
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

            $sql1 = "INSERT INTO `bookingdetails` (`Name`, `Phone`, `Email`, `NameForBooking`, `RoomType`, `CheckIn`, `CheckOut`, `NumberOfRooms`, `Rate`, `NumberOfGuests`, `Days`, `Total`, `VAT`, `GrandTotal`) 
            VALUES 
            ('" . $row["Name"] . "', '" . $row["Phone"] . "', '" . $row["Email"] . "', '".$_SESSION["name"]."', '".$_SESSION["roomType"]."', '".$_SESSION["checkIn_date"]."', '".$_SESSION["checkOut_date"]."', '".$_SESSION["roomNumber"]."', '".$_SESSION["price"]."', '".$_SESSION["guestsNumber"]."', '".$_SESSION["days"]."', '".$_SESSION["Total"]."', '".$_SESSION["vat"]."', '".$_SESSION["grandTotal"]."')";

            $_SESSION["Name"] = $row["Name"];
            $result1=mysqli_query($conn,$sql1);
            if($result1){
                echo'
                <script>
                alert("Successfully Booked");
                window.location.href = "../html/index.php"; 
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

?>

