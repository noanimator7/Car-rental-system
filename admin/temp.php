<?php
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ../index.php");
}
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "car_rental_system";
/******************************************************************************* */
// i use this query to get all distinct colors in db and put them in options of color 
$conn = new mysqli($host, $username, $password, $database);

    $sql_colors = "SELECT DISTINCT Color FROM car"; 
    $result_colors = $conn->query($sql_colors);
    $colors = [];

    if ($result_colors->num_rows > 0) {
        while ($row_country = $result_colors->fetch_assoc()) {
            $colors[] = $row_country["Color"];
        }
    }

/******************************************************************************* */
// i use this query to get all car overviews from db
$conn2 = new mysqli($host, $username, $password, $database);

    $sql_overview = "SELECT DISTINCT Overview FROM car"; 
    $result_overview = $conn2->query($sql_overview);
    $overviews = [];

    if ($result_overview->num_rows > 0) {
        while ($row_overview = $result_overview->fetch_assoc()) {
            $overviews[] = $row_overview["Overview"];
        }
    }
/******************************************************************************* */
// i use this query to get all distinct seating capacity
    $conn3 = new mysqli($host, $username, $password, $database);

    $sql_overview = "SELECT DISTINCT Seating_capacity FROM car ORDER BY Seating_capacity"; 
    $result_seat = $conn3->query($sql_overview);
    $seats = [];

    if ($result_seat->num_rows > 0) {
        while ($row_seat = $result_seat->fetch_assoc()) {
            $seats[] = $row_seat["Seating_capacity"];
        }
    }

/******************************************************************************* */
// i use this query to get all distinct  years 
$conn4 = new mysqli($host, $username, $password, $database);

$sql_overview = "SELECT DISTINCT Year FROM car"; 
$result_year = $conn4->query($sql_overview);
$years = [];

if ($result_year->num_rows > 0) {
    while ($row_year = $result_year->fetch_assoc()) {
        $years[] = $row_year["Year"];
    }
}
/******************************************************************************* */
$conn8 = new mysqli($host, $username, $password, $database);

$sql_overview = "SELECT DISTINCT OId FROM offices Order by OId"; 
$result_office = $conn4->query($sql_overview);
$oids = [];

if ($result_office->num_rows > 0) {
    while ($row_office = $result_office->fetch_assoc()) {
        $oids[] = $row_office["OId"];
    }
}
/******************************************************************************* */

/******************************************************************************* */
//trying to search the car by the specs the admin entered 
//even if the admin didnot enter all the specs i will search with the entered specs

$conn5 = new mysqli($host, $username, $password, $database);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $color = isset($_POST["color"]) ? $_POST["color"] : null;
    $brand = isset($_POST["Brand"]) ? $_POST["Brand"] : null;
    $plate_id = isset($_POST["plate"]) ? $_POST["plate"] : null;
    $status = isset($_POST['status']) ? $_POST['status'] : null;
    $airbag = isset($_POST['airbag']) ? $_POST['airbag'] : null;
    $airconditioner = isset($_POST['airconditioner']) ? $_POST['airconditioner'] : null;
    $price =  isset($_POST["price"]) ? $_POST["price"] : null;
    $overview =  isset($_POST["overview"]) ? $_POST["overview"] : null;
    $seatingcapacity =  isset($_POST["seatingcapacity"]) ? $_POST["seatingcapacity"] : null;
    $year =  isset($_POST["year"]) ? $_POST["year"] : null;
    $oid =  isset($_POST["oid"]) ? $_POST["oid"] : null;




    if ($conn5->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// echo($plate_id);
$sql = "SELECT * FROM car WHERE 1";
if ($color !== "Null") {
    $sql .= " AND Color = '$color'";
}
if ($oid !== "Null") {
    $sql .= " AND OId = '$oid'";
}
if (!empty($brand)) {
    $sql .= " AND CarName = '$brand'";
}
if (!empty($plate_id)) {
    // $x = intval($plate_id) ;
    $sql .= " AND PlateId ='$plate_id'";
}
if ($status !== "Null") {
    $sql .= " AND Status = '$status'";
}
if ( $airbag !== "Null") {
    $sql .= " AND DriverAirbag = '$airbag'";
}
if (!empty($price) ) {
    $sql .= " AND PricePerDay = '$price'";
}
if ( $overview !== "Null") {
    $sql .= " AND Overview = '$overview'";
}
if ($seatingcapacity !== "Null") {
    $sql .= " AND Seating_capacity = '$seatingcapacity'";
}
if ($year !== "Null") {
    $sql .= " AND Year = '$year'";
}
if ($airconditioner !== "Null") {
    $sql .= " AND Air_conditioner = '$airconditioner'";
}
// echo $sql;
// echo $sql ;
$result = $conn5->query($sql);
// print($result->num_rows);
/******************************************************************************* */



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
            /* .header a {
    text-decoration: none;
}

.header .rl-container nav {
    font-family: monospace;
} */

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
    /* background: orange; */
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

    <section class="welcome">
        <div class="container">
            <div class="welpar">
                <div class="welh1">
                    <h1>Welcome!</h1>
                    <h2>Explore Cars</h2>
                </div>
                <div class="image">
                    <img src="./images.jfif" alt="car photo is not here now">
                </div>
            </div>
            </div>
    </section>
     
    <div class="caratts">
            <div class="container">
                <form action="" method="post">

                    <div class="brandatts">
                        <label for="plate">Plate ID:</label>
                        <input type="text" name="plate" id="plate">
                        
                        <label for="price">Price per Day:</label>
                        <input type="text" name="price" id="price">
                    </div>


                <div class="brandatts">
                    <label for="Brand">Car Name:</label>
                    <input type="text" name="Brand" id="Brand">
                        <label for="overview">OverView</label>
                        
                        <select name="overview" id="overview">
                        <option value="Null"></option>

                    <?php
                    foreach ($overviews as $overview) {
                    echo '<option value="' . $overview . '">' . $overview . '</option>';
                    }
                    ?>
                    </select> 
                </div>
                <div class="brandatts">
                        
                    <label for="color">Car Color:</label>
                    <select name="color" id="color">
                        <option value="Null"></option>
                    <?php
                    // Generate HTML options for countries
                    foreach ($colors as $color) {
                    echo '<option value="' . $color . '">' . $color . '</option>';
                    }
                    ?>
                    </select>



                 
                    <label for="status">Car Status:</label>
                    <select name="status" id="status">
                        <option value="Null"></option>
                        <option value="Available">Available</option>
                        <option value="Reserved">Reserved</option>
                    </select> 
                </div>
    
                    <div class="brandatts">
                        <label for="seatingcapacity">Seating Capacity</label>
                        <select name="seatingcapacity" id="seatingcapacity">
                            <option value="Null"></option>

                        <?php
                        foreach ($seats as $s) {
                        echo '<option value="'. $s .'">' . $s . '</option>';
                        }
                        ?>
                        </select> 

                        <label for="year">Year</label>

                        <select name="year" id="year">
                            <option value="Null"></option>

                        <?php
                        foreach ($years as $y) {
                        echo '<option value="' . $y . '">' . $y . '</option>';
                        }
                        ?>
                        </select> 
                    </div>


                    <div class="brandatts">
                        <label for="airbag">Airbag:</label>
                        <select name="airbag" id="airbag">
                            <option value="Null"></option>

                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                        <label for="airconditioner">Airconditioner:</label>
                        <select name="airconditioner" id="airconditioner">
                            <option value="Null"></option>

                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                    </div>
                    <div class="brandatts">
                            <label for="oid">Office Id</label>
                            <select name="oid" id="oid">

                            <option value="Null"></option>
                    <?php
                    // Generate HTML options for countries
                    foreach ($oids as $o) {
                    echo '<option value="' . $o . '">' . $o . '</option>';
                    }
                    ?>
                    </select>

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
            // Display the results
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($result)) {
                echo '<div class="results">';
                // echo($result->num_rows );
                if ($result->num_rows > 0) {
                    // Output the car information in a box
                    while ($row = $result->fetch_assoc()) {

                echo '<div class="car-info-box">';
                echo '<h3>Car Information</h3>';
                echo '<form action="edit.php" method="post">';
                echo '<div class="image-box"> ';
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row["Image"]).'" ><br>';
                echo '</div>';




                echo '<div class="results-box"> ';
                echo '<label for="brand">Brand Name:</label>' ;
                echo '<input type="text" id = "brand" name="brand" value="' . $row["CarName"] . '" readonly>';
                echo '</div>';
                
                echo '<div class="results-box"> ';
                echo '<label for="overview">OverView:</label>' ;
                echo '<input type="text" id = "overview" name="overview" value="' . $row["Overview"] . '" readonly>';
                echo '</div>';

                // echo '<input type="text" id="color" name="color" value="' . $row["color"] . '" readonly>';
                echo '<div class="results-box"> ';
                echo '<label for="airbag">Airbag:</label>' ;
                echo '<input type="text" id="airbag" name="airbag" value="' . $row["DriverAirbag"] . '" readonly>';
                echo '</div>';


                echo '<div class="results-box"> ';
                echo '<label for="plate_id">Plate Id:</label>' ;
                echo '<input type="text"  id="plate_id" name="plate_id" value="' . $row["PlateId"] . '" readonly>';
                echo '</div>';

                // echo '<input type="text" id="status" name="status" value="' . $row["status"] . '" readonly>';
                echo '<div class="results-box"> ';
                echo '<label for="price_per_day">Price Per Day:</label>' ;
                echo '<input type="text" id="price_per_day" name="price_per_day" value="' . $row["PricePerDay"] . '" readonly>';
                echo '</div>';


                echo '<div class="results-box"> ';
                echo '<label for="seatingcapacity">Seating Capacity:</label>' ;
                echo '<input type="text" id="seatingcapacity" name="seatingcapacity" value="' . $row["Seating_capacity"] . '" readonly>';
                echo '</div>';

                echo '<div class="results-box"> ';
                echo '<label for="year">Year:</label>' ;
                echo '<input type="text" id="year" name="year" value="' . $row["Year"] . '" readonly>';
                echo '</div>';

                echo '<div class="results-box"> ';
                echo '<label for="airconditioner">Air Conditioner:</label>' ;
                echo '<input type="text" id="airconditioner" name="airconditioner" value="' . $row["Air_conditioner"] . '" readonly>';
                echo '</div>';
                echo '<div class="results-box"> ';
                echo '<label for="status">Status:</label>' ;
                echo '<input type="text" id="status" name="status" value="' . $row["Status"] . '" readonly>';
                echo '</div>';
                echo '<div class="results-box"> ';
                echo '<label for="airconditioner">Office Id:</label>' ;
                echo '<input type="text" id="oid" name="oid" value="' . $row["OId"] . '" readonly>';
                echo '</div>';
                echo '<div class="results-box"> ';
                echo '<label for="color">Color:</label>' ;
                echo '<input type="text" id="color" name="color" value="' . $row["Color"] . '" readonly>';
                echo '</div>';


                echo '<button type="submit" class="submit-btn" name="edit" value="EDIT">EDIT</button>';
                echo '</form>';
                echo '</div>';}

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
