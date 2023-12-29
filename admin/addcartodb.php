<?php
header('Location: temp.php');
// echo 'Iam in insert car to db ' ;
$con = mysqli_connect('localhost', 'root', '', 'car_rental_system');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$brand = $_POST['Brand'];
$price = $_POST['price'];
$airbag = $_POST['airbag'];
$plate = $_POST['plate'];
$overview = $_POST['overview'];
$seatingcapacity = $_POST['seatingcapacity'];
$year = $_POST['year'];
$airconditioner = $_POST['airconditioner'];
$oid = $_POST['oid'] ;
$color = $_POST['color'] ;
$status =$_POST['status'] ; 

$sql = "INSERT INTO `car` (`CarName`, `PricePerDay`, `DriverAirbag`, `PlateId`, `Overview`, `Seating_capacity`, `Year`, 
`Air_conditioner` ,`Status` , `Color` ,`OId`) VALUES 
('$brand', '$price', '$airbag', '$plate', '$overview', '$seatingcapacity', '$year', '$airconditioner','$status','$color','$oid')";

$rs = mysqli_query($con, $sql);

if ($rs) {
    echo "success";
} else {
    echo "error ya 7amada ";
}

mysqli_close($con);
?>
