<?php
 session_start(); 
 include  "../partials/_dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .main-title{
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
        
        }
        .main-title:hover{
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
        }
        .image-box{
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }
        .image-box img{
            width: 200px;
            height: 200px;
            border-radius: 8px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <?php require 'partials/admin_nav.php'; ?>
    <button class="main-title">Change Availability</button>
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
            if($j==1){
                echo'
                <h2 class="available-title"> Unavailable Rooms</h2>
                ';
            }
            if($j==1){
                echo'
                <div class="container">
                ';
            }
            if($row1['availability'] == 0){
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
</body>
</html>