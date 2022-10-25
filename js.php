<?php

function check_login($con)
{

    if(isset($_SESSION['user_id']))
    {

        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if ($result && mysqli_num_rows($result) > 0)
        {

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;

        }

    }

    //redirect to login

    header("Location: login.php");
    die;
        

}

function randomiser($length)
{
    //ensure the length is never less than 7 characters
    $txt = "";
    if($length < 7)
    {
        $length = 7;
    }

    $len_final = rand(6,$length);

    for ($i=0; $i < $length; $i++) {

        //get another random number between 0 and 9
        $txt .= rand(0,9);
    }

    return $txt;

}