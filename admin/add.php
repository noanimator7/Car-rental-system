<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "car_rental_system";
/******************************************************************************* */
$conn8 = new mysqli($host, $username, $password, $database);

$sql_overview = "SELECT DISTINCT OId FROM offices Order by OId"; 
$result_office = $conn8->query($sql_overview);
$oids = [];

if ($result_office->num_rows > 0) {
    while ($row_office = $result_office->fetch_assoc()) {
        $oids[] = $row_office["OId"];
    }
}
?>
<!-- note hwa m4 hysubmit ay 3rbya fel db ela lw enta md5l el byanat zy el db blzbt -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Main Menu</title>
    <link rel="stylesheet" href="master.css">

  <style>
    .error{
        margin-bottom: 20px;
        color: red;
    }
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
.inputerror{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center
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
                    <h2>Add New Car</h2>
                </div>
                <div class="image">
                    <img src="./images.jfif" alt="car photo is not here now">
                </div>
            </div>
            </div>
    </section>
     
    <div class="caratts">
            <div class="container">
                <form action="addcartodb.php" method="post" id="form">

            <label for="Brand">Car Name:</label>
            <input type="text" name="Brand" id="Brand">
                    <div class="error"></div>

                    
            <label for="price">Price per Day:</label>

                        <input type="text" name="price" id="price">
                        <div class="error"></div>
             

                    <label for="airbag">Airbag:</label>
                        <select name="airbag" id="airbag">

                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                        <div class="error"></div>


                        <label for="plate">Plate ID:</label>
                        <input type="text" name="plate" id="plate">
                        <div class="error"></div>
                       


                        <label for="oid">Office Id</label>
                            <select name="oid" id="oid">

                    <?php
                    // Generate HTML options for countries
                    foreach ($oids as $o) {
                    echo '<option value="' . $o . '">' . $o . '</option>';
                    }
                    ?>
                    </select>
                    <div class="error"></div>

                    <label for="status">Car Status:</label>
                    <select name="status" id="status">
                        <option value="Available">Available</option>
                        <option value="Reserved">Reserved</option>
                    </select> 
                    <div class="error"></div>


                    <label for="color">Car Color:</label>
                    <input type="text" name="color" id="color">

                        <div class="error"></div>

                        <label for="overview">OverView</label>
                        <input type="text" name="overview" id="overview">
                        <div class="error"></div>
   
                        <label for="seatingcapacity">Seating Capacity</label>
                        <input type="text" name="seatingcapacity" id="seatingcapacity">
                        <div class="error"></div>

                        <label for="year">Year</label>

                        <input type="text" name="year" id="year">
                        <div class="error"></div>


                        <label for="airconditioner">Airconditioner:</label>
                        <select name="airconditioner" id="airconditioner">

                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                        <div class="error"></div>

    


<!-- 
                    <label for="status">Car Status:</label>
                    <select name="status" id="status">
                        
                        <option value="available">Available</option>
                        <option value="rented">Rented</option>
                    </select> -->
                
                 




                    <div class="submit">            
                    <button class="submit-btn">Submit</button>
                    </div>
                </form>
            </div>
    </div>
           
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        let id = (id) => document.getElementById(id);
        let classes = (classes) => document.getElementsByClassName(classes);
        var ofidunique = true
        let brand = id("Brand");
        let price = id("price");
        let airbag = id("airbag");
        let plate = id("plate");
        let oid = id("oid");
        let status = id("status");
        let color = id("color");
        let overview = id("overview");
        let seatingcapacity = id("seatingcapacity");
        let year = id("year");
        let airconditioner =id("airconditioner") ;


        let form = id("form");
        let errorMsg = classes("error");

  
        let uniqueerror = false
        plate.addEventListener("blur", () => {
    const plateid =plate.value;
    console.log(plateid) ;
    if (plateid.trim() !== "") {
        $.ajax({
            type: "POST",
            url: "check_plate.php",
            data: { plate_id: plateid },
            success: function(response) {
                if (response === "unique") {
                    console.log("uniqe office id") ;
                    errorMsg[3].innerHTML = "";
                    plate.style.border = "2px solid green";
                    uniqueerror = false;
                } else {
                    console.log("non uniqe office id") ;

                    uniqueerror = true;
                    plate.style.border = "2px solid red";
                    errorMsg[3].innerHTML = "Plate Id already exists";
                }
            },
        });
    } else {
        errorMsg[3].innerHTML = "";
        ofid.style.border = "2px solid green";
        uniqueerror = false;
    }
});


        form.addEventListener("submit", (e) => {
            let validationPassed1 = true;
            let validationPassed2 = true;
            let validationPassed3 = true;
            let validationPassed4 = true;
            let validationPassed5 = true;
            let validationPassed6 = true;
            let validationPassed7 = true;
            let validationPassed8 = true;
            let validationPassed9 = true;
            let validationPassed10 = true;
            let validationPassed11= true;
            validationPassed1 = validationPassed1 && engine(brand, 0, "Brand cannot be blank");


            validationPassed2 = validationPassed2 && engine(price, 1, "price cannot be blank");
            validationPassed4 = validationPassed4 && engine(plate, 3, "plate cannot be blank");
            // validationPassed5 = validationPassed5 && engine(oid, 4, "office id cannot be blank");
            // validationPassed6 = validationPassed6 && engine(status, 5, "status  cannot be blank");
            validationPassed7 = validationPassed7 && engine(color, 6, "color  cannot be blank");
            validationPassed8 = validationPassed8 && engine(overview, 7, "overview  cannot be blank");
            validationPassed9 = validationPassed9 && engine(seatingcapacity, 8, "seating capacity  cannot be blank");
            validationPassed10 = validationPassed10 && engine(year, 9, "year  cannot be blank");

            // validationPassed1 = validationPassed1 && engine(price, 1, "price cannot be blank");
            




            if (uniqueerror) {
                ofid.style.border = "2px solid red";
                errorMsg[3].innerHTML = "Office Id already exists";
            }

            if (!validationPassed1 || !validationPassed2 ||  !validationPassed4 || !validationPassed5 || !validationPassed6 || !validationPassed7 || !validationPassed8 || !validationPassed9 || !validationPassed10 || uniqueerror) {
            e.preventDefault();
        }
        });

        let engine = (id, serial, message) => {
            if (id.value.trim() === "") {
                errorMsg[serial].innerHTML = "";
                errorMsg[serial].innerHTML = message;
                id.style.border = "2px solid red";
                return false;
            } else {
                if(id === price){
                   if( isNaN(id.value) || id.value <= 0){

                        errorMsg[serial].innerHTML = "";
                        errorMsg[serial].innerHTML = "Please Enter A Valid Price";
                        id.style.border = "2px solid red";
                        return false;
                   }
                }
                if(id  === plate){
                    if( isNaN(id.value) || id.value <= 0){

                            errorMsg[serial].innerHTML = "";
                            errorMsg[serial].innerHTML = "Please Enter A Valid Plate Number";
                            id.style.border = "2px solid red";
                            return false;
                        }
                }
                if(id === year ){
                    let pattern = /^(19|20)\d{2}$/;
                    if (! pattern.test(id.value)) {
                        errorMsg[serial].innerHTML = "";
                            errorMsg[serial].innerHTML = "Please Enter A Valid Year";
                            id.style.border = "2px solid red";
                            return false;
                                    }
                }

                errorMsg[serial].innerHTML = "";
                id.style.border = "2px solid green";
                return true;
            }
        };
//         window.addEventListener('pageshow', function(event) {
//       if (event.persisted) {
//           document.getElementById('form').reset();
//           for(let i =0 ; i<4 ; i++){
//             errorMsg[i].innerHTML="" ;

//           }
//           ofid.style.border="none";
//           country.style.border="none";
//           password.style.border="none";
//           confirm_pass.style.border="none";
//       }
//   });
//         ofid.value = "";
 
//         country.value = "";
    </script>


    </html>