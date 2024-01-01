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
<script type="text/javascript" src="../Car-rental-system/validation/registerValidation.js"></script>

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
                <div class="home"><a href="#">HOME</a></div>
                <div class="about-us"><a href="#about">ABOUT US</a></div>
                <div class="login "><a href="#testimonials" class="button">TESTIMONIALS</a></div>
                <div class="register "><a href="#contact" class="button">CONTACT US</a></div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start Landing -->
    <div class="landing">
        <div class="overlay"></div>
        <div class="container auth-container signup">
            <!-- <div id="error" style="display: block; height: 20px; text-align: center; color: #ddd; margin-bottom: 20px;"></div> -->
            <div class="signup-form">
                <div class="text">
                    <span>LUXURY CARS FOR <br> RENT!</span>
                    <p>Login or Sign Up to start making reservations!</p>
                </div>
                <form action="" id="signupForm" method="post">
                    <div class="left">
                        <div class="first-name">
                            <input type="text" id="fname" name="fname" placeholder="Enter Your Firstname" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="last-name">
                            <input type="text" id="lname" name="lname" placeholder="Enter Your Lastname" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="email">
                            <input type="text" id="email" name="email" placeholder="Enter Your Email" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="password">
                            <input type="password" id="password" name="password" placeholder="Enter Your Password" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="cpassword">
                            <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="ssn">
                            <input type="text" name="ssn" id="ssn" placeholder="Enter Your SSN" class="inputs">
                            <div class="error"></div>
                        </div>
                    </div>

                    <div class="right">
                        <div class="dob">
                            <input type="text" placeholder="Enter Date Of Birth" name="dob" id="dob" onfocus="(this.type='date')" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="address">
                            <input type="text" name="address" id="address" placeholder="Enter Address" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="contact">
                            <input type="tel" name="contact_number" id="contact_number" placeholder="Enter Contact Number" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="city">
                            <input type="text" name="city" id="city" placeholder="Enter City" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="country">
                            <input type="text" name="country" id="country" placeholder="Enter Country" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="submit">
                            <input type="submit" value="SIGN UP">
                        </div>
                    </div>
                </form>
                <p>Already have an account? <a href="index.php">Login</a></p>
            </div>
        </div>
    </div>


</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        let id = (id) => document.getElementById(id);
        let classes = (classes) => document.getElementsByClassName(classes);

        let fname = id('fname');
        let lname = id('lname');
        let email = id('email');
        let password = id('password');
        let cpassword = id('cpassword');
        let ssn = id('ssn');
        let dob = id('dob');
        let address = id('address');
        let contact_number = id('contact_number');
        let city = id('city');
        let country = id('country');
        let form = id("signupForm");
        let errorMsg = classes("error");
        let uniqueerror = false
        let uniqueerror2 = false
        email.addEventListener("blur", () => {
            if(email.value.trim()!== ""  || ssn.value.trim() !== ""){
                // console.log(ssn.value) ; 
                // console.log(typeof(ssn)) ; 
                // console.log(typeof(email)) ; 

        $.ajax({
            type: "POST",
            url: "register.php",
            data: {
            fname: fname.value,
            lname: lname.value,
            email: email.value,
            password: password.value,
            ssn: ssn.value,
            dob: dob.value,
            address: address.value,
            contact_number: contact_number.value,
            city: city.value,
            country: country.value
            },
            dataType: "text",
            success: function(response){
            console.log("In ajax");
            console.log(response);
            // if(response === 'success'){
            //     window.location.href = "profile.php";
            // } 
           // else
           console.log(email.value)
             if(response === 'email'){
                errorMsg[2].innerText = "";
                errorMsg[2].innerText = "Email Already Exists";
                uniqueerror = true;

            } else if(response === 'sqlfailure'){

                console.log("sql failure") ;
                uniqueerror = false;

            }
            else if(response === 'ssn'){
                console.log("SSN problem");
                errorMsg[5].innerText = ""

                errorMsg[5].innerText = "SSN already exists"
                uniqueerror = true;

            }
            else {
                // error.innerText = "Error";
                errorMsg[2].innerText = "";
                email.style.border = "2px solid green";

                console.log("error");
                uniqueerror = false;

            }
            }
  
            
        });
    }
    else {
                // error.innerText = "Error";
                errorMsg[2].innerText = "";
                email.style.border = "2px solid green";

                console.log("error");
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
        
            validationPassed1 = validationPassed1   && engine(fname, 0, "first name cannot be blank");
            validationPassed2 = validationPassed2   && engine(lname, 1, "last name cannot be blank");
            validationPassed3 = validationPassed3   && engine(email, 2, "email cannot be blank");
            validationPassed4 = validationPassed4   && engine(password, 3, "Password  cannot be blank");
            validationPassed5 = validationPassed5   && engine(cpassword, 4, "confirm password  cannot be blank");
            validationPassed6 = validationPassed6   && engine(ssn, 5, "SSN  cannot be blank");
            validationPassed7 = validationPassed7   && engine(dob, 6, "DOB  cannot be blank");
            validationPassed8 = validationPassed8   && engine(address, 7, "Address  cannot be blank");
            validationPassed9 = validationPassed9   && engine(contact_number, 8, "Contact Number  cannot be blank");
            validationPassed10 = validationPassed10 && engine(city, 9, "City  cannot be blank");
            validationPassed11 = validationPassed11 && engine(country, 10, "Country  cannot be blank");


            




            if (!validationPassed1 || !validationPassed2 ||  !validationPassed3||!validationPassed4 || 
            !validationPassed5 || !validationPassed6 || !validationPassed7 || !validationPassed8 || !validationPassed9 
            || !validationPassed10 || !validationPassed11  || uniqueerror ) {
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
                if (uniqueerror) {
                console.log("IN unique error");
                email.style.border = "2px solid red";
                errorMsg[2].innerHTML = "Email already exists";
                return false ;
            }
                
                if(serial === 2){
                    console.log("SIU") ;
                    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    if(!emailRegex.test(id.value)){
                        console.log("invalid email");
                        errorMsg[serial].innerHTML = "";
                errorMsg[serial].innerHTML = "Invalid email format";
                        return false;
                        }
                }
                if(serial === 4 ){
                    console.log("confirm password check") ;
                    if(password.value !== cpassword.value){
                        errorMsg[serial].innerHTML = "";
                        errorMsg[serial].innerHTML = "Confirm Password Must be the same as password";
                        return false;

                    }
                }


                errorMsg[serial].innerHTML = "";
                id.style.border = "2px solid green";
                return true;
            }
        };

    </script> -->

</html>