<?php
include 'config.php';

$plateid = $_POST["plateid"];
//echo $plateid;

$sql = "SELECT * FROM car where PlateId = $plateid";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
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
                    <div class="plate"><?php echo $row["PlateId"]?></div>
                </div>
                
            </div>
            <div class="form-container">
                <form action="payment.php" method="post">
                    <input type="text" name="price" id="priceperday" value="<?php echo $row["PricePerDay"]; ?>" hidden>
                    <input type="text" id="plateids" name="plateids" value="<?php echo $row["PlateId"]; ?>" hidden>
                    <div class="dates">
                        <div class="date1">
                            <input type="date" placeholder="Enter Start Date" name="start-date" id="start-date" class="inputs">
                        </div>
                        <div class="date2">
                            <input type="date" placeholder="Enter End Date" name="end-date" id="end-date" class="inputs">
                        </div>
                    </div>
                    <div class="price" id="pricese"></div>
                    <button class="proceed" name=proceed>PROCEED</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End Section -->
</body>

<script>
    // Assuming you have elements with IDs 'startdate', 'priceperday', and 'enddate'
    const startdate = document.getElementById('start-date');
    const priceperday = document.getElementById('priceperday').value; // replace 'priceperday' with the actual ID
    const enddate = document.getElementById('end-date'); // replace 'enddate' with the actual ID
    const price = document.getElementById('pricese');

    startdate.addEventListener('blur', function() {
        const startvalue = startdate.value;
        console.log(startvalue);

        if (startvalue.trim() !== "" && enddate.value.trim()!=="") {
            $.ajax({
                type: 'POST',
                url: 'checkplate.php',
                data: {
                    priceperday: priceperday,
                    start_date: startvalue, // use startvalue instead of startdate
                    end_date: enddate.value
                },
                success: function(response) {
                    if (!isNaN(response)) {
                        console.log('unique office id');
                        price.innerHTML=response;
                        return true;
                    } else {
                        console.log('non-unique office id');
                    }
                },
            });
        }
    });

    enddate.addEventListener('blur', function() {
        const endvalue = enddate.value;
        console.log(endvalue);

        if (endvalue.trim() !== "" && startdate.value.trim()!=="") {
            $.ajax({
                type: 'POST',
                url: 'checkplate.php',
                data: {
                    priceperday: priceperday,
                    start_date: startdate.value, // use startvalue instead of startdate
                    end_date: endvalue
                },
                success: function(response) {
                    if (!isNaN(response)) {
                        console.log('unique office id');
                        console.log(response);
                        price.innerHTML=response;
                    } else {
                        console.log('non-unique office id');
                    }
                },
            });
        }
    });
</script>