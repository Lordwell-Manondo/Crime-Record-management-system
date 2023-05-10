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
        $query = "select * from users where user_name = '$user_name' limit 1";

        $result = mysqli_query($conn,$query);

        if($result)
        {
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);

            if($user_data['password'] == $password)
            {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: Officer.php");
                die; 
            }
            else {
                echo "<script>alert('Wrong Password! Please try again.');</script>";
            }
        }else{
            echo "<script>alert('Wrong username! Please try again.');</script>";
        } 
    }   
}
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <header style=" text-align: center; color: white;">
            <div>
                <h1>You must login firt to access our services!</h1>
            </div>
</header>
</head>
  
    <br>
<body>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div id="box">
        <form method="post">
            <h2><div style="font-size: 20px; margin: 10px; color: black; text-align: center;">Login</div></h2>
            <label for="Username:"> Username: </label><br><br>
            <input id="text" type="text" name="user_name" placeholder="Type here"><br><br>
            <label for="Password:"> Password: </label><br><br>
            <input id="text" type="password" name="password" placeholder="Type here"><br><br>
           
            <input id="button" type="submit" value="Login"> 
                
            <button id="button" style="margin-left: 6px; width: 190px;"><a href="change-password.php" style="text-decoration:red; color:blue; ">Change Password</a></button> 
                
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
            height: 300px;
        }
        body{
            background-color: rgb(0, 109, 139);
      }

    </style>
    
</html>