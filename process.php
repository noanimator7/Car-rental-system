<?php
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plateid=$_POST["plateid"];
    $sql="UPDATE car set status = 'Reserved' where PlateId = '$plateid' ";
    $result = $conn->query($sql);
    header("Location: profile.php");
}
?>