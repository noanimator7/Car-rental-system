<?php
// Replace the following logic with your actual logic to check the uniqueness of plate_id
$host = "localhost";
$username = "root";
$password = "";
$database = "car_rental_system";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['start_date'])) {
    $price=$_POST["priceperday"];
    $start_date=$_POST["start_date"];
    $end_date=$_POST["end_date"];


    $date1 = strtotime($start_date);
    $date2 = strtotime($end_date);
    
    $daysDifference = floor(($date2 - $date1) / (60 * 60 * 24));
    echo $daysDifference * $price;


    }
else{
    echo "hassan";
}
?>
