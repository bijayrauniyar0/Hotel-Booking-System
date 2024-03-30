    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header {
            background-color: #759bbf;
            color: white;
            padding: 10px;
            text-align: center;
            height: 9vh;
            display: flex;
            align-items: center;
            width: 100%;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 11;
        }
        nav {
            display: flex;
            align-items: center;
            padding: 10px;
        }
        nav .admin-title{
           
            position: absolute;
            left: 20px;
            font-size: 28px;
            cursor: pointer;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            position: absolute;
            right: 20px;
        }

        nav ul li {
            display: inline;
           margin: 0 25px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 22px;
        }
        @media screen and (max-width: 576px){
            nav .admin-title{
                font-size: 16px;
            }
            nav ul li{
                margin: 0 12px;
            }
            nav ul li a{
                font-size: 12px;
            }
            
        }
    </style>
    
<script src="https://kit.fontawesome.com/2f01e0402b.js" crossorigin="anonymous"></script>

<header>
    <nav>
        <h1 class="admin-title">Admin Panel</h1>
        <ul>
            <li><a href="check-rooms.php">Rooms</a></li>
            <li><a href="admin-booking-data.php">Bookings</a></li>
            <li><a href="./partials/admin_logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
</body>
</html>