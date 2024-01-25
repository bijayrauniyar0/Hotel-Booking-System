<?php
    $loginMSG = false;
    session_start();

    if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
            header("location: guest-login.php");
            exit;
        }
    else {
        $loginMSG=true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome </title>
    <style>
        body{
            background-image:url(../images/resort-blur.jpg);
        }
        #welcome-alert{
            position: absolute; 
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            color: white;
            width: 80%;
            text-align:center;
        }
        #welcome-alert .ok-btn{
            width:40px;
            height: 20px;
        }
        h1{
            font-size: 6rem;
        }
        .welcome{
            font-size: 5rem;
        }
        #welcome-alert a{
            text-decoration: none;
        }
        .welcome-ok{
            display: inline-block;
            border: 1px solid #2a4dec;
            padding: 10px; 
            font-size: 40px !important;
            margin: 0 0 10px 0 !important;
            border-radius: 10px;
            color: black;
            
            
        }
        .welcome-ok:hover{
            background-color: rgb(0, 60, 255);
            color: white;

        }
        #log-out a{
            color:rgb(52, 96, 240);
        }
        #log-out a:hover{
            text-decoration: underline;
        }
        #log-out .log-out {
            font-size: 28px;
        }
    </style>
</head>
<body>
    <?php
        if($loginMSG ){
            echo'<div id="welcome-alert" role="alert" style="">
            <h1>Success!</h1> 
            <h2 class="welcome">Welcome to Paradise Resort</h2>
            <a href="index.php"><h2 class="welcome-ok">OK</h2></a>
            <div id="log-out">
                <p class="log-out">You can logout clicking <a href="partials/log-out.php"> this link.</a></p>
            </div>
            </div>';
        }
    ?>
    <script src="../js/script.js"></script>
    
</body>
</html>