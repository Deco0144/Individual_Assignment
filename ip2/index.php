<?php
session_start();

include("connect.php");
include("js.php");


//check if user is signed in on the index page and welcome users information
$u_data = check_login($con);



?>

<!DOCTYPE html>
<html>
<head>
    <title>Hello</title>
</head>
<body>
    <a href="logout.php">Press here to log out!</a>
    <h1>Testing</h1>
    <br> Welcome, <?php echo $u_data['uname']; ?>
</body>
</html>