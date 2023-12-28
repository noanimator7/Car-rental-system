<?php
    session_start();
    if (!isset($_SESSION["SESSION_EMAIL"])) {// 3shan lw d5lt 3l page dy 3ltol mn localhost
        header("Location: index.php");
    }
    include 'config.php';
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION["SESSION_EMAIL"]}'");
    //echo $_SESSION['SESSION_EMAIL'];
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Home Page</title>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $data["SSN"]; ?> <p><a href="logout.php">Logout</a></p></h2>
    </div>
</body>
</html>
