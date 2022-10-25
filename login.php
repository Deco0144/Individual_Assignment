<?php
session_start();

include("connect.php");
include("js.php");

if($_SERVER['REQUEST_METHOD']== "POST")
{
    //an entity has been posted
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];



    //checks if a user has filled in something
    if(!empty($uname) && !empty($pass) && !is_numeric($uname))
    {

        //read the database to ensure data matches up
        $user_id = randomiser(7);
        $query = "select * from users where uname = '$uname' limit 1";

        $result = mysqli_query($con, $query);


        //check the result is successful and password is correct
        if($result)
        {
            if ($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['pass'] === $pass)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }

            }
        }

        echo "Please fill in the correct username of password, thanks!";
    }else
    {
        echo "Please fill in certain information";
    }

}




?>

<!DOCTYPE html>
<html>
<head>
    <title>Hello</title>
</head>
<body>
    <style type="text/css">
        #text {
            height: 28px;
            border-radius: 2px;
            padding: 2px;
            border: solid thin #aaa;
            width: 80%;
        }

        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: purple;
            border: none;
        }

        #box {

            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 18px;
        }

    </style>

    <div id="box">


        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">Login</div>
            <input id="text" type="username" name="uname"><br><br>
            <input id="text" type="password" name="pass"><br><br>
            <input id="button" type="submit" value="Login"><br><br>

            <a href="signup.php">Click here to Sign Up!</a>

        </form>


    </div>
</body>
</html>