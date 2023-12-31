<?php 

session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ../index.php");
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
                    <li class="dropdown">
                        <a href="#" aria-haspopup="true">Advanced Search</a>
                        <ul class="dropdown-menu" aria-label="submenu">
                            <li><a href="customeradvancesearch.php">By Customer</a></li>
                            <li><a href="caradvancedsearch.php">By Car</a></li>
                            <li><a href="reservationadvancedsearch.php">By Reservation</a></li>


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
                    <li class="register"><a href="../logout.php" class="button">LOGOUT</a></li>

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
                    <h2>Add New Office</h2>
                </div>
                <div class="image">
                    <img src="./images.jfif" alt="car photo is not here now">
                </div>
            </div>
        </div>
    </section>

    <div class="caratts">
        <div class="container">
            <form action="addofficetodb.php" method="post" id="form">


                <label for="ofid">Office Id</label>
                <input type="text" name="ofid" id="ofid">
                <div class="error"></div>
                <!-- <div class="uniqueofid"></div> -->


                    <label for="ofid">Country</label>
                    <input type="text" name="country" id="country">
                    <div class="error"></div>



                <div class="submit">
                    <button class="submit-btn" id="submit">Submit</button>
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
    let country = id("country");
    let ofid = id("ofid");
    let form = id("form");
    let errorMsg = classes("error");


    let uniqueerror = false
    ofid.addEventListener("blur", () => {
        const userofid = ofid.value;
        console.log(userofid);
        if (userofid.trim() !== "") {
            $.ajax({
                type: "POST",
                url: "check_office_id.php",
                data: { officeId: userofid },
                success: function (response) {
                    if (response === "unique") {
                        console.log("uniqe office id");
                        errorMsg[0].innerHTML = "";
                        ofid.style.border = "2px solid green";
                        uniqueerror = false;
                    } else {
                        console.log("non uniqe office id");

                        uniqueerror = true;
                        ofid.style.border = "2px solid red";
                        errorMsg[0].innerHTML = "Office Id already exists";
                    }
                },
            });
        } else {
            errorMsg[0].innerHTML = "";
            ofid.style.border = "2px solid green";
            uniqueerror = false;
        }
    });


    form.addEventListener("submit", (e) => {
        let validationPassed1 = true;
        let validationPassed2 = true;
        validationPassed2 = validationPassed2 && engine(ofid, 0, "OID cannot be blank");


        validationPassed1 = validationPassed1 && engine(country, 1, "country cannot be blank");




        if (uniqueerror) {
            ofid.style.border = "2px solid red";
            errorMsg[0].innerHTML = "Office Id already exists";
        }

        if (!validationPassed1 || !validationPassed2 || uniqueerror) {
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
            errorMsg[serial].innerHTML = "";
            id.style.border = "2px solid green";
            return true;
        }
    };
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            document.getElementById('form').reset();
            for (let i = 0; i < 4; i++) {
                errorMsg[i].innerHTML = "";

            }
            ofid.style.border = "none";
            country.style.border = "none";
            password.style.border = "none";
            confirm_pass.style.border = "none";
        }
    });
    ofid.value = "";

    country.value = "";
</script>

</html>