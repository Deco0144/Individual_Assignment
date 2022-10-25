<?php
session_start();

    include("connect.php");
    include("js.php");

    if($_SERVER['REQUEST_METHOD']== "POST")
    {
        //an entity has been posted
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];



        //checks if a user has filled in somethinf
        if(!empty($uname) && !empty($pass) && !is_numeric($uname))
        {
            $user_id = randomiser(7);
            $query = "insert into users (user_id,uname,pass) values ('$user_id','$uname','$pass')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }else
        {
            echo "Please fill in certain information";
        }

    }

    





?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
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
            <div style="font-size: 20px; margin: 10px; color: white;">Sign Up</div>
            <input id="text" type="username" name="uname"><br><br>
            <input id="text" type="password" name="pass"><br><br>
            <input id="button" type="submit" value="Signup"><br><br>

            <a href="login.php">Click here to Login!</a>

        </form>


    </div>
</body>
</html>