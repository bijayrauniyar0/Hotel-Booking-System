<?php 
session_start();

include 'partials/_dbconnect.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header("location: index.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $createTableSql = "CREATE TABLE IF NOT EXISTS `users` (
            `ID` INT AUTO_INCREMENT PRIMARY KEY,
            `Name` VARCHAR(255),
            `Phone` VARCHAR(20),
            `Gender` VARCHAR(10),
            `Address` VARCHAR(255),
            `Email` VARCHAR(255),
            `Password` VARCHAR(255),
            `dt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );";
        $resultTable = mysqli_query($conn,$createTableSql);

        $name = $_POST["fullName"];
        $phoneNumber = $_POST["phoneNumber"];
        $Gender = $_POST["gender"];
        $Address = $_POST["address"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cPassword = $_POST["confirmPassword"];

        $passwordLength = strlen($password);
        $numberLength = strlen($phoneNumber);
        $exists = false;

        //check if the email exists

        $checkEmailQuery = "SELECT * FROM `users` WHERE `Email` = '$email'";
        $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($checkEmailResult) > 0) {
            echo '
                <script>
                    alert("Error! Account Already Exists")
                </script>';
        }
        elseif ($passwordLength < 8) {
            echo '<script>
            alert("Error! Password Length Cannot Be Less Than 8 Characters")
           </script>';
        } 
        elseif ($password != $cPassword) {
            echo '<script>
        alert("Error! Passwords Do Not Match")
       </script>';
        } 
        elseif ($numberLength != 10 || !is_numeric($phoneNumber)) {
            echo '<script>
        alert("Error! Please Enter a Valid Phone Number")
       </script>';
        }
        elseif ($passwordLength >= 8 && $password == $cPassword && $exists == false) {
            
            //hashing pw and storing pw in form of hash

            $hash= password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`Name`, `Phone`, `Gender`, `Address`, `Email`, `Password`, `dt`) VALUES ('$name', '$phoneNumber', '$Gender', '$Address', '$email', '$hash', current_timestamp());";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '<script>
                        alert("Success! Account Created Successfully")
                        window.location.href="guest-login.php";
                    </script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0../css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com../css2?family=DM+Serif+Display:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/sign-up.css">
    <title>Hotel Booking System</title>
</head>
<body>

<?php require 'partials/nav.php'; ?>

    <section class="main-block">
        <div class="form-container">
            <div class="wrapper">
                <h1>Sign Up</h1>
                <form id="signup-form" name="signupForm" action="../html/sign-up.php" method="POST">
                    <div class="field">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>
                    </div>
                    <div class="field">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="field">
                        <label for="phoneNumber">Phone Number</label>
                        <span id=checkNumber></span>
                        <div class="phone-input">
                            <!-- <input type="tel" id="countryCode" name="countryCode" placeholder="Country Code" required> -->
                            <input type="tel" maxlength="10" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" required>
                        </div>
                    <div class="field">
                        <label for="roomType" class="form-margin"><p>Gender</p></label>
                        <select class="gender-drop-down" id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="fullName">Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter your address" required>
                    </div>
                    </div>
                    <div class="field">
                        <span id=password-length-error></span>
                        <label for="password">Password</label>
                        <input type="password" maxlength="16" id="password" name="password" placeholder="Enter your password" required>
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" maxlength="16" id="confirmPassword" name="confirmPassword" placeholder="Re-Enter your password" required>
                        <span id="match-Error"></span>

                    </div>
                    <input type="submit" value="Sign Up">
                </form>
                <div class="sign-txt">Already a member? <a href="guest-login.php">Login here</a></div>
            </div>
        </div>
    </section>

<script src="../js/login.js"></script>
  </body>
</body>
</html>