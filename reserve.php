<?php
include 'config.php';
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: index.php");
}
$plateid = $_POST["plateid"];
//echo $plateid;

$sql = "SELECT * FROM car where PlateId = $plateid";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$email = $_SESSION["SESSION_EMAIL"] ;
//echo $email ; 
$sql = "SELECT * FROM users WHERE EMAIL = '$email'" ; 
$result2 = $conn->query($sql);
$row2 = $result2->fetch_assoc();
//echo $row["CarName"];
?>

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
                <div class="about-us"><a href="#about">ABOUT US</a></div>
                <div class="login "><a href="#testimonials" class="button">PROFILE</a></div>
                <div class="register "><a href="logout.php">LOG OUT</a></div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start Section -->
    <div class="main-header reserve">
        <div class="text">
            <h1>Reservations</h1>
            <p>Choose start and end dates to make a reservation </p>
        </div>
        <div class="overlay"></div>
    </div>
    <div class="section">
        <div class="container">
            <div class="top-box">
            <?php
                echo    '<div class="image">';
                echo        '<img src="data:image/jpeg;base64,' . base64_encode($row["Image"]) . '" alt="Car Image">';
                echo    '</div>';
                ?>
                <div class="text">
                    <div class="car-name"><?php echo $row["CarName"]?></div>
                    <!-- <div class="overview"><?php //echo $row["Overview"]?></div> -->
                    <div class="color">Color : <?php echo $row["Color"]?></div>
                    <div class="year">Year : <?php echo $row["Year"]?></div>
                    <div class="ppd">Price Per Day : $<span id="pricepd"><?php echo $row["PricePerDay"]?></span></div>
                    <div class="plate">Plate ID : <?php echo $row["PlateId"]?></div>
                    <div class="ac">Air Conditioner : <?php if($row["Air_conditioner"] === "Y"){echo "Yes";}else{echo "No";}?></div>
                    <div class="sc">Seating Capacity : <?php echo $row["Seating_capacity"]?></div>
                    <div class="tp">Total Price : <span class="price" id="result">Select Dates To Calculate</span></div>
                    
                </div>
                
            </div>
            <form action="payment.php" method="post">
                    
                    
                    


                </form>
            <div class="form-container">
                <form action="payment.php" method="post" id="form">
                    <input type="text" name="priceperday" id="priceperday" value="<?php echo $row["PricePerDay"]; ?>" hidden>
                    <input type="text" name="ssn" id="ssn" value="<?php echo $row2["SSN"]; ?>" hidden >
                    <input type="text" id="plateids" name="plateids" value="<?php echo $row["PlateId"]; ?>" hidden>
                    <div class="dates">
                        <div class="date1">
                            <div class="icon"><i class="fa-regular fa-calendar"></i></div>
                            <input type="date" oninput="calculatePrice()" placeholder="Enter Start Date" name="start-date" id="start-date" class="inputs">
                        </div>
                        <div class="date2">
                            <div class="icon"><i class="fa-regular fa-calendar-xmark"></i></div>
                            <input type="date" oninput="calculatePrice()" placeholder="Enter End Date" name="end-date" id="end-date" class="inputs">
                        </div>
                    </div>
                    
                    
                    <div class="button">
                        <button class="proceed" name=proceed>PROCEED TO PAYMENT</button>
                    </div>


                    <div class="error" id="error"></div>

                    
                </form>
            </div>
        </div>
    </div>
    <!-- End Section -->
</body>

<script>
    function isValidDate(d) {
  return d instanceof Date && !isNaN(d);
}
    function calculatePrice() {

      var startDate = new Date(document.getElementById('start-date').value);
      var endDate = new Date(document.getElementById('end-date').value);
      var pricePerDay = document.getElementById('pricepd').innerHTML;
    //   console.log(pricePerDay);
    //   console.log( endDate)
    //   console.log(typeof startDate)
    //   if( endDate === "Invalid Date"){
    //     console.log("7amda");
    //   }
    //   if(isValidDate(endDate) === false ){
    //     console.log("Hassona is here") ;
    //   }

      var price = calculatePriceLogic(startDate, endDate, pricePerDay);

      if(!isNaN(price) && price>=0 ){
            document.getElementById('result').innerText = price + "$";
      }
      else if(price <=0){
        document.getElementById('result').innerText = "$0";

        
      }
      
    }
    function calculatePriceLogic(startDate, endDate, pricePerDay) {      
      var daysDifference = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
      var totalPrice = daysDifference * pricePerDay;
      return totalPrice;
    }
    const form  =document.getElementById("form") ;
    const error =document.getElementById("error") ; 
    form.addEventListener("submit" , (e)=>{
      var startDate = new Date(document.getElementById('start-date').value);
      var endDate = new Date(document.getElementById('end-date').value);
      console.log("Migzo is here");
      if (startDate >= endDate  || isValidDate(endDate) === false || isValidDate(startDate) ===  false ){
        console.log("Migzo is here part2 ");
        console.log(error) ;

        document.getElementById('result').innerText = "$0";

        error.innerHTML = "You cannot insert start date > end date" ;
        console.log(error.innerHTML)
        e.preventDefault() ;
      }
      else {
        error.innerText="" ;
        return true ;
      }




    })
  </script>



