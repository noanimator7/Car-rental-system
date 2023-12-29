<?php 
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ../index.php");
}
$host = "localhost";
$username = "root";
$password = "";
$database = "car_rental_system";
$conn = new mysqli($host, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start = $_POST['startdate'];


    $sqlrented = "
    SELECT c.*
    FROM car as  c 
    where c.PlateId LIKE '$start' OR 
    c.CarName LIKE '$start' OR 
    c.Overview LIKE '$start' OR 
    c.PricePerDay LIKE '$start' OR 
    c.Year LIKE '$start' OR 
    c.DriverAirbag LIKE '$start' OR 
    c.Status LIKE '$start'  OR
    c.Color LIKE '$start'  OR
    c.OId LIKE '$start'  OR
    c.Seating_capacity LIKE '$start'  OR
    c.Air_conditioner LIKE '$start'  
";
echo "SIU" ;
//  echo $sqlrented;
$resultrented = $conn->query($sqlrented);
// echo $resultrented. ;
if ($resultrented === false) {
    echo "SIU" ; 
    die("Error executing the query: " . $conn->error);
}



    $conn->close();
}
    ?>


<!DOCTYPE html>
<meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>RentCar</title>
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rubik:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="master.css">
    <style>
            .header a {
    text-decoration: none;
}

.header .rl-container nav {
    font-family: monospace;
}

.header .rl-container ul {
    /* background: darkorange; */
    list-style: none;
    margin: 0;
    padding-left: 0;
}

.header .rl-container li {
    color: #fff;
    background:  #2196F3;
    display: inline-block;
    padding: 1rem;
    position: relative;
    text-decoration: none;
    transition-duration: 0.5s;
}

.header .rl-container li a {
    color: #fff;
}

.header .rl-container li:hover,
.header .rl-container li:focus-within {
    background: red;
    cursor: pointer;
}

.header .rl-container li:focus-within a {
    outline: none;
}

.header .rl-container .dropdown {
    position: relative;
}

.header .rl-container .dropdown-menu {
    background: orange;
    visibility: hidden;
    opacity: 0;
    position: absolute;
    transition: all 0.5s ease;
    margin-top: 1rem;
    left: 0;
    display: none;
}

.header .rl-container .dropdown:hover > .dropdown-menu,
.header .rl-container .dropdown:focus-within > .dropdown-menu {
    visibility: visible;
    opacity: 1;
    display: block;
}

.header .rl-container .dropdown-menu li {
    clear: both;
    width: 100%;
}

        </style>
</head>
<body>
        

        <!-- Start Header bar -->
        <div class="header-bar">
        <div class="container">
            <div class="icons">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                <a href="https://twitter.com/?lang=en"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="text">
                <div class="phone">
                    <i class="fas fa-phone-square-alt"></i>
                    01234567891
                </div>
                <div class="email">
                    <i class="fas fa-envelope"></i> contact@rentacar.com
                </div>
            </div>
        </div>
    </div>
    <!-- End Header bar -->
    <!-- Start Header -->
    <div class="header" id="header" style="margin-bottom:200px;">
    <div class="container">
        <div class="logo">
            <img src="logo.png" alt="">
        </div>
        <div class="rl-container">
            <nav>
                <ul>
                    <li class="home"><a href="temp.php">HOME</a></li>
                    <li class="about-us"><a href="add.php">ADD NEW CAR</a></li>
                    <li class="login"><a href="addnewoffice.php" class="button">ADD NEW OFFICE</a></li>
                    <li class="register"><a href="../logout.php" class="button">LOGOUT</a></li>
                    <li class="dropdown">
                        <a href="#" aria-haspopup="true">Advanced Search</a>
                        <ul class="dropdown-menu" aria-label="submenu">
                            <li><a href="customeradvancesearch.php">By Customer</a></li>
                            <li><a href="caradvancedsearch.php">By Car</a></li>


                        </ul>
                    </li>

                    <li class="dropdown">
                    <a href="#" aria-haspopup="true"> Search</a>

                        <ul class="dropdown-menu" aria-label="submenu">
                            <li><a href="reservecar.php">Reservations of car</a></li>
                            <li><a href="daily_payments.php">Daily Payments</a></li>
                            <li><a href="statusofcar.php">Status of cars</a></li>
                            <li><a href="reservecustomer.php">Reservations of customer</a></li>
                            <li><a href="reserveperiod.php">Reservations of period</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

    <!-- End Header -->

    <div class="caratts">
            <div class="container">
                <form action="" method="post">
        <div class="brandatts">
                <label for="startdate">Enter Car data</label>
                <input type="text" id="startdate" name="startdate">
               
        </div>
   
        <div class="submit">            
                    <button class="submit-btn">Submit</button>
                    </div>

    </form>
</div>
</div>
<div class="output">
    <div class="container">
        <?php
        // Display car information
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($resultrented)) {
            echo '<div class="results">';
            echo '<h3 style="width:100%;">Car Information</h3>';

            if ($resultrented->num_rows > 0) {
                // Output car information in a box
                while ($carRow = $resultrented->fetch_assoc()) {
                    echo '<div class="car-info-box">';
                    echo '<form action="" method="post">';

                    // Display car attributes
                    foreach ($carRow as $key => $value) {
                        echo '<div class="results-box"> ';
                        echo '<label for="' . $key . '">' . ucfirst(str_replace('_', ' ', $key)) . ':</label>';
                        echo '<input type="text" id="' . $key . '" name="' . $key . '" value="' . $value . '" readonly>';
                        echo '</div>';
                    }

                    // Add more attributes as needed

                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo '<div class="car-info-box">';
                echo '<p>No cars found matching the criteria.</p>';
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </div>
</div>



</body>
</html>