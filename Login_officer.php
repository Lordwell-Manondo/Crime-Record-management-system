<?php
session_start();
    include("Connections.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $employee_number = $_POST['employee_number'];
    $password = $_POST['password'];

    if(!empty($employee_number) && !empty($password) && is_numeric($employee_number))
    {
        //read from database
        $query = "select * from officers where employee_number = '$employee_number' limit 1";

        $result = mysqli_query($conn,$query);

    if($result && mysqli_num_rows($result) > 0)
{
    $user_data = mysqli_fetch_assoc($result);

    if(password_verify($password, $user_data['password']))
    {
        $_SESSION['id'] = $user_data['id'];
        header("Location: Officer.php");
        die; 
    }
    else {
        echo "<script>alert('Wrong Password or Username! Please try again.');</script>";
    }
}

}
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
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
            <input id="text" type="text" name="employee_number" placeholder="Use employee number"><br><br>
            <label for="Password:"> Password: </label><br><br>
            <input id="text" type="password" name="password" placeholder="Type here"><br><br>
           
            <input id="button" type="submit" value="Login"> 
                
            <button id="button" style="margin-left: 6px; width: 190px;"><a href="#" style="text-decoration:red; color:blue; ">Change Password</a></button> 
                
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