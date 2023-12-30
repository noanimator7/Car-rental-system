<?php 
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ../index.php");
}
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "car_rental_system";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'] ;
    }

    $email = $_SESSION["SESSION_EMAIL"] ;
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM users WHERE EMAIL = '$email'" ; 
    $result = $conn->query($sql);


    $sql2 = 
    " SELECT r.*  
    FROM reservation AS r 
    JOIN  users AS  u
    ON r.SSN = u.SSN  
    WHERE u.Email = '$email'
    "; 
    $result2 = $conn->query($sql2);
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="output">

<div class="container">

<?php   
                if ($result->num_rows > 0) {
                    // Output the car information in a box
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="info">' ;
                        echo '<input type="text" id = "ssn" name="ssn" value="' . $row["SSN"] . '" readonly>';
                        echo '<input type="text" id = "fname" name="fname" value="' . $row["FirstName"] . '" readonly>'; 
                        echo '<input type="text" id = "lname" name="lname" value="' . $row["LastName"] . '" readonly>'; 
                        echo '<input type="text" id = "email" name="email" value="' . $row["Email"] . '" readonly>'; 
                        echo '<input type="text" id = "contactno" name="contactno" value="' . $row["ContactNo"] . '" readonly>'; 
                        echo '<input type="text" id = "dob" name="dob" value="' . $row["dob"] . '" readonly>'; 
                        echo '<input type="text" id = "address" name="address" value="' . $row["Address"] . '" readonly>'; 
                        echo '<input type="text" id = "country" name="city" value="' . $row["City"] . '" readonly>'; 
                        echo '<input type="text" id = "country" name="country" value="' . $row["Country"] . '" readonly>'; 
                        echo '</div>' ;
                    }
                }
?>
</div>


</div>


<div class="outputreserv">
    <div class="container">
        <?php
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                echo '<div class="reserve">' ; 
                                echo '<input type="text" id = "rnum" name="rnum" value="' . $row["Reservation_number"] . '" readonly>';
                                echo '<input type="text" id = "plateid" name="plateid" value="' . $row["PlateId"] . '" readonly>';
                                echo '<input type="text" id = "pickupdate" name="pickupdate" value="' . $row["pickup_date"] . '" readonly>';
                                echo '<input type="text" id = "returndate" name="returndate" value="' . $row["return_date"] . '" readonly>';
                                echo '<input type="text" id = "paymentmethod" name="paymentmethod" value="' . $row["Payment_method"] . '" readonly>';
                                echo '<input type="text" id = "totalprice" name="totalprice" value="' . $row["Total_price"] . '" readonly>';
                                echo '</div>' ;
                            }
                        
                        }
        ?>
    </div>
</div>





</body>
</html>