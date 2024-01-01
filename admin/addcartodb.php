<?php
header('Location: temp.php');
// echo 'Iam in insert car to db ' ;
$con = mysqli_connect('localhost', 'root', '', 'car_rental_system');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$brand = $_POST['Brand'];
$brandname = $_POST['brandname'];
$category = $_POST['category'];
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
// $imageblob=$conn->real_escape_string(file_get_contents($image)) ;
$sql = "INSERT INTO `car` (`CarName`, `PricePerDay`, `DriverAirbag`, `PlateId`, `Overview`, `Seating_capacity`, `Year`, 
`Air_conditioner` ,`Status` , `Color` ,`OId` , `Image` ,`category` , `brandName`) VALUES 
('$brand', '$price', '$airbag', '$plate', '$overview', '$seatingcapacity', '$year', '$airconditioner','$status','$color','$oid' , '{$image}',
<<<<<<< HEAD
'$category' , '$brandname' )
";
=======
'$category' , '$brandname')";
>>>>>>> 844694b5bcdd6ec1448b88e94443998445eadda6

$rs = mysqli_query($con, $sql);

if ($rs) {
    echo "success";
} else {
    echo "error ya 7amada ";
}

mysqli_close($con);
?>

