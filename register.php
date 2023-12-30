<?php
session_start();
if (isset($_SESSION["SESSION_EMAIL"])) {
  header("Location: profile.php");
}
if (isset($_POST["register"])) {
  include 'config.php';
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $ssn = $_POST["ssn"];
  $dob = $_POST["dob"];
  $address = $_POST["address"];
  $contactNumber = $_POST["contact_number"];
  $city = $_POST["city"];
  $country = $_POST["country"];
  //md5 to make password hashed
  $password = md5($_POST["password"]);
  if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
    // Email Already Exists    
    echo "email";
  } else if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE SSN ='{$ssn}'")) > 0) {
    echo "ssn";
  } else {
    $sql = "INSERT INTO users (SSN,FirstName, LastName, Email, Password, ContactNo, dob, address, city, country,admin)
      VALUES ('$ssn', '$fname', '$lname','$email', '$password', '$contactNumber','$dob', '$address', '$city', '$country', '0')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      //header("Location: login.html");
      echo "success";
    } else {
      // Error sql query failure
      echo "sqlfailure";
    }
  }
}
?>
