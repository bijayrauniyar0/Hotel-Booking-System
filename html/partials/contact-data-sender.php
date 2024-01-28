<?php
    if($_SERVER['REQUEST_METHOD']== "POST"){
        include '_dbconnect.php';
        $sql= "INSERT INTO to_be_contacted  (`FirstName`, `LastName`, `Email`, `Message`, `dt`) VALUES
        ('".$_POST['first-name']."','".$_POST['last-name']."','".$_POST['email']."','".$_POST['message']."',current_timestamp() )";

        $result = mysqli_query($conn,$sql);
        if($result){
            echo'<div id="error-alert" role="alert">
            <h2>Success</h2> Your Message is succesfully sent
            <button type="button" class="btn-ok"><a href="index.php">OK</a></button><br>
        </div>';
        echo 
        '<script>
            setTimeout(function() {
                var errorAlert = document.getElementById("error-alert");
                if (errorAlert) {
                    errorAlert.style.display = "none";
                    window.location.href = "../index.php";
                }
            }, 4000);
            
            </script>';
        }
        else{
            echo'<div id="error-alert" role="alert">
            <h2>Error!</h2> Try Again
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
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .btn-ok a{
            text-decoration:none; 
            color: white;
        }
        .btn-ok{
            margin-bottom:10px;
            background-color: rgb(12, 24, 180);
            border-radius: 10px;
        }
        #error-alert{
            box-shadow: 5px 5px 10px  rgb(6, 179, 0);
            width: 60%;
            text-align: center;
            font-size: 3rem;
            background-color: beige !important;
            position: fixed; 
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            padding: 20px; 
            border-radius: 5px; 
            z-index: 9999;
        }
    </style>
    <title>Document</title>
</head>
<body>
    
</body>
</html>