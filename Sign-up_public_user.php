<?php
session_start();

    include('Connections.php');
    include('Functions.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $fname = $_POST['fname'];
        $sname = $_POST['sname'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!is_numeric($fname) && !is_numeric($sname) && !is_numeric($user_name) && !empty($password))
        {
            //save to database
            // $user_id = random_num(20);
            $query = "insert into users (fname,sname,user_name,password) values ('$fname','$sname','$user_name','$password')";

            mysqli_query($con, $query);
            echo "<script>alert('Welcome to Crime record management system, $fname!');</script>";
            
            // $show_popup = true;
            // die;
        }
        else
        {
            echo "Please enter valid information!";
        }

    }
?>
<!DOCTYPE html>
<html>
    <head>
       <title>Signup</title>
        <!-- <header style="background-color: grey; red; text-align: center; color: white;">
            <div>
                <h1>Crime Record Management</h1>
            </div> -->
</header>
    </head>
    <br>
<body>
        <div id="box">
        <form method="post">
        <h2> <div style="font-size: 20px; margin: 10px; color: black; text-align: center;">Signup</div></h2>
            <label for="fname:"> First name: </label><br><br>
            <input id="text" type="text" name="fname" placeholder="Type here"><br><br>
            <label for="sname:"> Sir name: </label><br><br>
            <input id="text" type="text" name="sname" placeholder="Type here"><br><br>
            <label for="Username:"> Username: </label><br><br>
            <input id="text" type="text" name="user_name" placeholder="Type here"><br><br>
            <label for="Password:">Password: </label><br><br>
            <input id="text" type="password" name="password" placeholder="Type here"><br><br>
            <!-- <label for="Password:">Confirm: </label><br><br>
            <input id="text" type="password" name="password" placeholder="Type here"><br><br> -->
            
            <input id="button" type="submit" value="Submit">
            <button id="button" style="margin-left: 180px"><a href="Home.html" style="text-decoration:none; color:blue; ">Cancel</a></button>
            <h2>Already have an account</h2>
            <button id="button" style="margin-left: 100px; width: 200px;"><a href="Login_public_user.php" style="text-decoration:none; color:blue; ">Click to Login</a></button>
            <!-- <a id="button1" href="Home.html">Cancel</a></button> <br><br> -->
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
            width: 400px;
            padding: 20px;
        }
       
        body{
            background-color: aqua;
      }

    </style>