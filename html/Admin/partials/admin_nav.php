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
        }
        nav {
            display: flex;
            align-items: center;
            padding: 10px;
        }
        nav h1{
           
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
    </style>

<header>
    <nav>
        <h1>Admin Panel</h1>
        <ul>
            <li><a href="check-rooms.php">Check Rooms</a></li>
            <li><a href="">Check Bookings</a></li>
            <li><a href="./partials/admin_logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
</body>
</html>