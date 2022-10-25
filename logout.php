<?php

session_start();


//When user logs out, it will unset the user id from the specific page
if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
}

//redirect user to the login page when officially logged out
header("Location: login.php");