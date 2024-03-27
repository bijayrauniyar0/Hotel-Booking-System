<?php 
    session_start();
    include 'partials/_dbconnect.php';

    $loginError = false;
  
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)  {
        header("location: index.php");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM `users` WHERE Email = '$email' ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ( $num == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['name'] = $row['Name'];
                if(password_verify($password, $row["Password"])){ 
                    //input password is converted into has then the hash checked from the database
                    session_start();
                    $_SESSION['loggedin']=true;
                    echo'<div id="error-alert" role="alert">
                        <h2>Success</h2> Welcome to Paradise Resort
                        <button type="button" class="btn-ok"><a href="index.php">OK</a></button><br>
                    </div>';
                    echo 
                    '<script>
                        setTimeout(function() {
                            var errorAlert = document.getElementById("error-alert");
                            if (errorAlert) {
                                errorAlert.style.display = "none";
                                window.location.href = "../html/index.php";
                            }
                        }, 4000);
                        
                        </script>';
                

                }
                else{
                    $loginError=true;
                }
            }

        }
        if($_SESSION['loggedin'])
        {
            $_SESSION['email']=$email;
            
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/guest-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com../css2?family=DM+Serif+Display:ital@1&display=swap" rel="stylesheet">
    <title>Hotel Booking System</title>
    <style>
        .btn-ok a{
            text-decoration:none;
            color: white;
        }
        .btn-ok{
           margin-bottom:10px;
        }
        .sign-up a{
            text-decoration:none;
            color: rgb(13, 54, 190);
            
        }
        .sign-up{
            font-size:14px;
            margin-bottom: 10px;
        }
        .sign-up a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php require 'partials/nav.php'; ?>

<?php
    if($loginError){
        echo'<div id="error-alert" role="alert" >
        <h2>Error!</h2> Invalid Credentials 
        <button type="button" class="btn-ok"><a href="guest-login.php">OK</a></button><br>
        <p class="sign-up">Not a member! <a href="sign-up.php">Sign Up</a></p>
        
    </div>';
    }
?>
    <section class="main-block">
        <div class="form-container">
            <div class="wrapper">
                <div id="navbar">
                    <div id="user-info">
                        Welcome, <span id="username-display"></span>!
                        <button id="logout">Logout</button>
                        <button id="edit">Edit</button>
                    </div>
                </div>
                <h1>Login as Guest</h1>
                <form id="login-form" name="myform" action="../HTML/guest-login.php" method="POST">
                    <div class="field">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="pass-txt"><a href="#">Forgot password?</a></div>
                    <input type="submit" value="Login">
                </form>
                <div class="sign-txt">Not yet a member? <a href="signup.html">Sign up now</a></div>
            </div>
        </div>
    </section>
    
<?php require 'partials/_footer.php'; ?>
<script src="../js/login.js"></script>
</body>
</html>