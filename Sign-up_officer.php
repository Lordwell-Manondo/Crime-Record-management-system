<?php
session_start();

    include('Connections.php');
    include('Functions.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            //save to database
            $user_id = random_num(4);
            $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

            mysqli_query($con, $query);

            header("Location: Login_officer.php");
            die;
        }
        else
        {
            echo "Please enter valid information!";
        }

    }
?>
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
        <header style="background-color: grey; red; text-align: center; color: white;">
            <div>
                <h1>Crime Record Management</h1>
            </div>
</header>
    </head>
    <br>
<body>
        <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: black; text-align: center;">Signup</div>
            <label for="Username:"> Username: </label><br><br>
            <input id="text" type="text" name="user_name" placeholder="Type here"><br><br>
            <label for="Password:">Password: </label><br><br>
            <input id="text" type="password" name="password" placeholder="Type here"><br><br>
            <!-- <label for="Password:">Confirm: </label><br><br>
            <input id="text" type="password" name="password" placeholder="Type here"><br><br> -->
            
            <input id="button" type="submit" value="Submit"> <button>  <a id="button1" href="Home.html">Cancel</a></button> <br><br>

            <a id="button" href="Login1.php">Click to Login</a><br><br>
        </form>
        </div>
            
    </body>
    <style type = "text/css">
        #text{
            height: 25px;
            boader-radius: 5px;
            padding: 4px;
            boarder: solid thin #aaa;
            width: 100%;
        }

        #button{
            padding: 10px;
            width: 100px;
            color: blue;
            boarder: none;
        }

        #box{
            background-color: white;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
       
        body{
            background-color: aqua;
      }

    </style>