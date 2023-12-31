<?php
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: index.php");
}
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION["SESSION_EMAIL"]}'");
//echo $_SESSION['SESSION_EMAIL'];
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result);
}
?>


<?php
/******************************************************************************* */
// i use this query to get all distinct colors in db and put them in options of color 

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

    $sql_overview = "SELECT DISTINCT Overview FROM car"; 
    $result_overview = $conn->query($sql_overview);
    $overviews = [];

    if ($result_overview->num_rows > 0) {
        while ($row_overview = $result_overview->fetch_assoc()) {
            $overviews[] = $row_overview["Overview"];
        }
    }
/******************************************************************************* */
// i use this query to get all distinct seating capacity

    $sql_overview = "SELECT DISTINCT Seating_capacity FROM car ORDER BY Seating_capacity"; 
    $result_seat = $conn->query($sql_overview);
    $seats = [];

    if ($result_seat->num_rows > 0) {
        while ($row_seat = $result_seat->fetch_assoc()) {
            $seats[] = $row_seat["Seating_capacity"];
        }
    }

/******************************************************************************* */
// i use this query to get all distinct  years 


$sql_overview = "SELECT DISTINCT Year FROM car"; 
$result_year = $conn->query($sql_overview);
$years = [];

if ($result_year->num_rows > 0) {
    while ($row_year = $result_year->fetch_assoc()) {
        $years[] = $row_year["Year"];
    }
}
/******************************************************************************* */
$sql_overview = "SELECT DISTINCT Country FROM offices"; 
$result_country = $conn->query($sql_overview);
$countries = [];

if ($result_country->num_rows > 0) {
    while ($row_country = $result_country->fetch_assoc()) {
        $countries[] = $row_country["Country"];
    }
}


// print($result->num_rows);
/******************************************************************************* */




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>RentCar</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/master.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body>


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
                    <i class="fas fa-envelope"></i> contact@rentcar.com
                </div>
            </div>
        </div>
    </div>
    <!-- End Header bar -->

    <!-- Start Header -->
    <div class="header" id="header">
        <div class="container">
            <div class="logo">
                <img src="../Car-rental-system/images/logo.png" alt="">
            </div>
            <div class="rl-container">
                <div class="home"><a href="profile.php">HOME</a></div>
                <div class="search active"><a href="search.php">SEARCH</a></div>
                <div class="login "><a href="#testimonials" class="button">PROFILE</a></div>
                <div class="register "><a href="logout.php">LOG OUT</a></div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <div class="main-header search">
        <div class="text">
            <h1>Search</h1>
            <p>Search For A Car Suitable For You </p>
        </div>
        <div class="overlay"></div>
    </div>

    <div class="caratts">
            <div class="container">
                <form action="" method="post" id="form">
                <div class="inputs-container">
                    <div class="left">
                    <div class="ppd">    
                        <label for="price">Price per Day:</label>
                        <input type="text" name="price" id="price">
                    </div>

                    <div class="brand-name">
                        <label for="Brand">Car Name:</label>
                        <input type="text" name="Brand" id="Brand">
                    </div>
                    
                    <div class="oview">                        
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
                
                    <div class="clr">
                        
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
                    </div>
                    <div class="sc">
                        <label for="seatingcapacity">Seating Capacity</label>
                        <select name="seatingcapacity" id="seatingcapacity">
                            <option value="Null"></option>

                            <?php
                            foreach ($seats as $s) {
                            echo '<option value="'. $s .'">' . $s . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    </div>
                    <div class="right">
                    

                    <div class="yr">
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


                    <div class="ab">
                        <label for="airbag">Airbag:</label>
                        <select name="airbag" id="airbag">
                            <option value="Null"></option>

                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                    </div>
                    <div class="ac">
                        <label for="airconditioner">Airconditioner:</label>
                        <select name="airconditioner" id="airconditioner">
                            <option value="Null"></option>

                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                    </div>

                    <div class="cty">
                    <label for="country">Select Country:</label>
                        <select name="country" id="country">
                            <option value="Null"></option> 
                            <?php
                        foreach ($countries as $y) {
                        echo '<option value="' . $y . '">' . $y . '</option>';
                        }
                        ?> 

                        </select>
                    </div>
                    </div>
                   
                    <div class="submit">            
                    <button class="submit-btn" onclick="scrollDown()">Search For Car</button>
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


            <div class="search-result" id="search-result">
                
            </div>


    
</body>
<script>


const form = document.getElementById("form") ; 
const resultbox = document.getElementById("search-result")


form.addEventListener("submit", (e) => {

    while (resultbox.firstChild) {
            resultbox.removeChild(resultbox.lastChild);
  }
    const brand  = document.getElementById("Brand") ;
    const overview =document.getElementById("overview") ;
    const airbag =document.getElementById("airbag") ;
    const price =document.getElementById("price") ; 
    const color =document.getElementById("color") ; 
    const seatingcapacity =document.getElementById("seatingcapacity") ; 
    const year =document.getElementById("year") ; 
    const airconditioner =document.getElementById("airconditioner") ;
    const country =document.getElementById("country") ;
    e.preventDefault();
    const data = {
    brand : brand.value  ,
    overview : overview.value  ,
    airbag : airbag.value  ,
    price : price.value  ,
    color : color.value  ,
    seatingcapacity : seatingcapacity.value  ,
    year : year.value  ,
    airconditioner : airconditioner.value  ,
     country  : country.value
  };
  console.log("megzo is 3ars");
  $.ajax({
    type: 'POST',
    url: 'searchprocessing.php',
    data: data,
  })
    .done((data) => {

        if(data==="error"){
            return false;
        }
        else {
            
            // const para = document.createElement("p");
            // const node = document.createTextNode(item.a);

        for (let i = 0; i < data.length; i++){
            let maindiv = document.createElement("div");
            let item=data[i];
            const para = document.createElement("p");
            const node = document.createTextNode(item.a);
            para.appendChild(node);
            maindiv.appendChild(para);


            const para2 = document.createElement("p");
            const nodeb = document.createTextNode(item.b);
            para2.appendChild(nodeb);
            maindiv.appendChild(para2);



            const para3 = document.createElement("p");
            const nodec = document.createTextNode(item.c);
            para3.appendChild(nodec);
            maindiv.appendChild(para3);



            const para4 = document.createElement("p");
            const noded = document.createTextNode(item.d);
            para4.appendChild(noded);
            maindiv.appendChild(para4);



            const para5 = document.createElement("p");
            const nodee = document.createTextNode(item.e);
            para5.appendChild(nodee);
            maindiv.appendChild(para5);


            const para6 = document.createElement("p");
            const nodef = document.createTextNode(item.f);
            para6.appendChild(nodef);
            maindiv.appendChild(para6);

            const para7 = document.createElement("p");
            const nodeg = document.createTextNode(item.g);
            para7.appendChild(nodeg);
            maindiv.appendChild(para7);

            const para8 = document.createElement("p");
            const nodeh = document.createTextNode(item.h);
            para8.appendChild(nodeh);
            maindiv.appendChild(para8);

            resultbox.appendChild(maindiv)
        }
    }
    })
    .fail((err) => {
      console.error(err);
    })
    .always(() => {
      console.log('always called');
    });
});
</script>
<script>
    function scrollDown() {
      // You can adjust the scroll amount based on your needs
      window.scrollBy(0, 500); // Scroll down by 100 pixels
    }
  </script>

</html>
