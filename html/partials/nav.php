<?php
include 'partials/_dbconnect.php';
$loggedin = false;
$adminLogin=false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin=true;
    $sql = "SELECT * FROM users WHERE Email = '" . $_SESSION['email'] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
elseif(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true){
    $adminLogin=true;
    $loggedin=false;
}

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0../css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com../css2?family=DM+Serif+Display:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2f01e0402b.js" crossorigin="anonymous"></script>
    <title>Hotel Booking System</title>
</head>
<body>
    <header>
        <nav>
            <div class="left">
                <ul>
                    <li>
                        <a href="index.php">Verse Resort</a>
                    </li>
                </ul>
            </div>
            <div class="mid">
                <ul>
                    <li><a href="../html/index.php">Home</a></li>
                    <li><a href="../html/reservations.php">Reservations</a></li>';
                    // <li><a href="#contact" data-target="contact">Contact US</a></li>';
                    
                    //if user is logged in then only logout option is shown

                    if(!$loggedin){
                        if(!$adminLogin){
                    echo'
                    <li id="products"><a>
                    <i class="fa-solid fa-user" style="font-size: 13px; margin: 0 2px 3px 0; color:rgb(66, 66, 66);"></i>   Guest   <i class="fa fa-caret-down" style="font-size: 13px; margin: 0 0 3px 4px; color:rgb(66, 66, 66);"></i></a>
                        <ul>
                        <li><a href="../html/admin-login.php">Admin Login</a></li>
                        <li><a href="../html/guest-login.php">Guest Login</a></li>
                        </ul>
                    </li>
                    <li><a href="../html/sign-up.php">Sign Up</a></li>';
                    }}
                    if($loggedin==true && $adminLogin==false){
                    echo'
                    <li id="products"><a><i class="fa-solid fa-user" style="font-size: 13px; margin: 0 4px 3px 0; color:rgb(66, 66, 66);"></i>'.$row['Name'].'<i class="fa fa-caret-down" style="font-size: 13px; margin: 0 0 3px 4px; color:rgb(66, 66, 66);"></i></a>
                        <ul>
                        <li><a href="../html/editor.php">My Profile</a></li>
                         <li><a href="partials/log-out.php">Log Out</a></li>
                        </ul>
                    </li>';}
                    elseif($adminLogin){
                        echo'
                        <li><a href="partials/log-out.php">Log Out</a></li>
                        ';
                    }
                
                echo' </ul>
            </div>';
            if(!$adminLogin){
            echo'<div class="right">
            <div class="vertical">
            <ul>
                    <li><a href="../html/book-now.php"><img src="../images/book-now.png" alt="booking" class="book-img"></a></li>
                </ul>
                </div>
            </div>';
            }
            
            ?>
            <!-- drop menu -->
            <div class="toggler">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="dropMenu">
                <ol>
                    <?php
                    echo'
                        <li><a href="../html/index.php">Home</a></li>
                        <li><a href="../html/reservations.php">Reservations</a></li>
                        <li><a href="#contact" data-target="contact">Contact US</a></li>
                        ';
                        if(!$loggedin){
                            if(!$adminLogin){
                                echo'
                        <li id="products"><a>
                        <i class="fa-solid fa-user" style="font-size: 13px; margin: 0 2px 3px 0; color:rgb(66, 66, 66);"></i>   Guest   <i class="fa fa-caret-down" style="font-size: 13px; margin: 0 0 3px 4px; color:rgb(66, 66, 66);"></i></a>
                            <ul>
                            <li><a href="../html/Admin/admin-login.php">Admin Login</a></li>
                            <li><a href="../html/guest-login.php">Guest Login</a></li>
                            </ul>
                        </li>
                        <li><a href="../html/sign-up.php">Sign Up</a></li>';}}
                        if($loggedin==true && $adminLogin==false){
                        echo'
                        <li id="products"><a><i class="fa-solid fa-user" style="font-size: 13px; margin: 0 4px 3px 0; color:rgb(66, 66, 66);"></i>Bijay<i class="fa fa-caret-down" style="font-size: 13px; margin: 0 0 3px 4px; color:rgb(66, 66, 66);"></i></a>
                            <ul>
                            <li><a href="../html/editor.php">My Profile</a></li>
                            <li><a href="partials/log-out.php">Log Out</a></li>
                            </ul>
                        </li>';
                        }
                        elseif($adminLogin){
                            echo'
                            <li><a href="partials/log-out.php">Log Out</a></li> '; 
                        }
                        ?>
                </ol>
            </div>
            
        </nav>
    </header>
    <script src="../js/script.js""></script>
    <script>
        const toggler = document.querySelector('.toggler');
        const dropMenu = document.querySelector('.dropMenu');
        toggler.addEventListener('click', () => {
            dropMenu.classList.toggle('active');
            if(dropMenu.classList.contains('active')){
                toggler.innerHTML = '<i class="fa-solid fa-times"></i>';
            }else{
                toggler.innerHTML = '<i class="fa-solid fa-bars"></i>';
            }
        });
    </script>
</body>
</html>