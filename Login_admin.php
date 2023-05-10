<?php
session_start();
    include("Connections.php");
    include("Functions.php");
    //$user_data = check_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        //read from database
        $query = "select * from login_admin where user_name = '$user_name' limit 1";

        $result = mysqli_query($conn,$query);

        if($result)
        {
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);

            if($user_data['password'] == $password)
            {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: Admin_landing_page.html");
                die; 
            }       
            else {
                echo "<script>alert('Wrong password!');</script>";
            }       
        } else {
            echo "<script>alert('Wrong username!');</script>";
        }
    } else {
        echo "<script>alert('Please enter valid information!');</script>";
    }
}
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <header style="text-align: center; color: white;">
            <div>
                <h1>Use the details provided!</h1>
            </div>
</header>
</head>
  
    <br>
<body>
        <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: black; text-align: center;">Login</div>
            <label for="Username:"> Username: </label><br><br>
            <input id="text" type="text" name="user_name" placeholder="Type here"><br><br>
            <label for="Password:"> Password: </label><br><br>
            <input id="text" type="password" name="password" placeholder="Type here"><br><br>
            
            <input id="button" type="submit" value="Login"> 
        </form>
        </div>
            
</body>

<style type = "text/css">
        body{
            background-color: rgb(0, 109, 139);
        }
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

    </style>
    
</html>