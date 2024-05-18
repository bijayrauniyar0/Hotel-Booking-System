<?php
 session_start(); 
 include  "../partials/_dbconnect.php";
    if(!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin']!=true){
        header("location: ../admin-login.php");
        exit;
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $sql4 = "SELECT * FROM `roomprices`";
        $result4 = mysqli_query($conn, $sql4);
        $num4 = mysqli_num_rows($result4);
        while($row4 = mysqli_fetch_assoc($result4)){
            $room_name = $row4['room_name'];
            $trimmedRoom = str_replace(' ', '', $room_name);
            $availability = $_POST[$trimmedRoom];
            if($availability == 'on'){
                $availability = 1;
            }
            else{
                $availability = 0;
            }
            $sql5 = "UPDATE `roomprices` SET `availability` = '$availability' WHERE `room_name` = '$room_name'";
            $result5 = mysqli_query($conn, $sql5);

            if($result5){
                echo'
                <script>
                    window.location.href = "check-rooms.php";
                    alert("Availability Changed Successfully");
                </script>
                ';
            }
            else{
                echo'
                <script>
                    alert("Failed to Change Availability");
                    window.location.href = "check-rooms.php";
                </script>
                ';
            }

        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .change-btn{
            text-align: center;
           position: absolute;
           right: 20px;
           background-color: #70aee8;
           color: white;
           border-radius: 7px;
           border: 1px solid black;
           padding: 12px 16px;
           margin: 10px 0;
           font-size: 18px;
           cursor: pointer;
           margin-top: 100px;
        
        }
        .chnage-btn:hover{
            background-color: #759bbf;
        }
        .available-title{
            margin: 10px 20px;
            color: #70aee8;
        }
        .container{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: start;
            align-items: center;
        }
        .image-box{
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }
        main{
            position: absolute;
            top: 120px;
        }
        .image-box img{
            width: 200px;
            height: 200px;
            border-radius: 8px;
            object-fit: cover;
        }
        @media screen and (max-width: 576px){
           .change-btn{
               font-size: 14px;
               padding: 8px 12px;
           }
            
        }
        /* change availabilty of rooms */
        .change-content{
            display: none;
            position: absolute;
            top: 120px;
            left: 0;
            right: 0;
            margin: 0 auto;
            width: 50%;
            min-height: 50%;
            background-color: white;
            border: 1px solid black;
            border-radius: 10px;
            z-index: 1;
            padding: 20px 30px;
        }
        .change-content.active{
            display: block;
        }
        .top-box{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .top-box i{
            font-size: 24px;
            cursor: pointer;
        }
        .rooms-content{
            padding: 20px;
        }
        .rooms-content-top{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0;
        }
        .check-box{
            margin-right: 20px;
            cursor: pointer;
        }
        form button{
            background-color: #70aee8;
            color: white;
            width: 100%;
            padding: 10px 20px;
            border: 1px solid black;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php require 'partials/admin_nav.php'; ?>
    <button class="change-btn" onclick="showContent()">Change Availability</button>
        <div class="change-content">
            <div class="top-box">
                <h2>Change Availability</h2>
                <span onclick="hideContent()"><i class="fa fa-close"></i></span>
            </div>
            <div class="rooms-content">
                <div class="rooms-content-top">
                    <h2>Rooms</h2>
                    <h2>Availability</h2>
                </div>
                <div class="rooms-list">
                    <?php 
                    $sql3 = "SELECT * FROM `roomprices`";
                    $result3 = mysqli_query($conn, $sql3);
                    $num3 = mysqli_num_rows($result3);
                    if($num3>0){
                        echo'<form action="check-rooms.php" method="post">';
                        while($row3 = mysqli_fetch_assoc($result3)){
                            echo'
                            <div class="rooms-content-top">
                                <p>'.$row3['room_name'].'</p>';
                                $string = $row3['room_name'];
                                $trimmedString = str_replace(' ', '', $string);

                                    echo'<input type="checkbox" name="'.$trimmedString.'" class="check-box" '; 
                                    if($row3['availability'] == 1){ 
                                        echo'checked';
                                    }
                                    echo'>'; 
                           echo' </div>';
                        }
                        echo'<button type="submit">Change</button>';
                        echo'</form>';
                    }
                    ?>
                </div>
            </div>    
        </div>
    <main>
    <?php 
    $sql = "SELECT * FROM `roomprices`";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num>0){
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i==1){
                echo'
                <h2 class="available-title"> Available Rooms</h2>
                ';
            }
            if($i==1){
                echo'
                <div class="container">
                ';
            }
            if($row['availability'] == 1){
                    echo'
                    <div class="image-box">
                        <img src="../../images/rooms/'.$row['image'].'" alt="Room Image">
                        <h3>'.$row['room_name'].'</h3>
                    </div>
                    ';
                
            }
           
           
        }
        echo'
        </div>
        ';
    }
    ?>
    <?php 
    $sql1 = "SELECT * FROM `roomprices`";
    $result1 = mysqli_query($conn, $sql1);
    $num1 = mysqli_num_rows($result1);
    if($num1>0){
        $j = 0;
        while($row1 = mysqli_fetch_assoc($result1)){
            $j++;
            
            if($row1['availability'] == 0){
                if($j==1){
                    echo'
                    <h2 class="available-title"> Unavailable Rooms</h2>
                    ';
                    echo'
                    <div class="container">
                    ';
                }
                    echo'
                    <div class="image-box">
                        <img src="../../images/rooms/'.$row1['image'].'" alt="Room Image">
                        <h3>'.$row1['room_name'].'</h3>
                    </div>
                    ';
            }
           
        }
        echo'
            </div>
        ';
    }
    ?>
    </main>
    <script>
        function showContent(){
            const content = document.querySelector('.change-content');
            content.classList.add('active');
        }
        function hideContent(){
            const content = document.querySelector('.change-content');
            content.classList.remove('active');
        }
    </script>
</body>
</html>