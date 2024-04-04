<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Adjust the path as needed

// Create a new PHPMailer instance
$mail = new PHPMailer(true);


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
{       echo 
       '<script>
            alert("Error! Booking Already Exists")
            window.location.href="index.php";
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
                try {
                    // SMTP configuration
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'your_mail_id'; // Your Gmail email address
                    $mail->Password = 'your_pw'; // Your Gmail password
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587; // TCP port to connect to
                
                    // Sender and recipient settings
                    $mail->setFrom('verse@resort.com', 'Verse Resort'); // Sender's email address and name
                    $mail->addAddress($_SESSION["email"], $_SESSION["userName"]); // Recipient's email address and name
                
                    // Email content
                    $mail->isHTML(true);
                    $mail->Subject = 'Test Email';
                    $mail->Body = 'Your Booking has been confirmed. Thank you for choosing us.';
                
                    // Send the email
                    $mail->send();
                    echo '
                    <script>
                    alert("Success! Booking Confirmed");
                    window.location.href="index.php";
                    </script>
                    ';
                } catch (Exception $e) {
                    echo "Email sending failed: {$mail->ErrorInfo}";
                }
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
