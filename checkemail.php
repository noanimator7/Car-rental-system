<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_system";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the email value from the Ajax request
$email = $_POST['email'];
$password = password_hash($_POST['password']);

// SQL query to check if the email exists in the database
$sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
$result = $conn->query($sql);

// Check if the email exists
if ($result->num_rows > 0) {
    // Email exists, return 'exist' to the client
    echo 'exist';
} else {
    // Email does not exist, continue with form submission
    echo 'not_exist';
}
$conn->close();
?>
