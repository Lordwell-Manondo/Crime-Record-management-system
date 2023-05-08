<?php
session_start();

include('Connections.php');
include('Functions.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $user_id = $_SESSION['user_id'];
    $query = "SELECT password FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
        if ($user && password_verify($old_password, $user['password'])) {
            if ($new_password === $confirm_password) {
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $query = "UPDATE users SET password = '$new_password' WHERE user_id = '$user_id'";
                mysqli_query($con, $query);
                echo "<script>alert('Password changed successfully!');</script>";
            } else {
                echo "New password and confirm password do not match!";
            }
        } else {
            echo "Incorrect old password!";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Change Password</title>
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
                <div style="font-size: 20px; margin: 10px; color: black; text-align: center;">Change Password</div>
                <label for="old_password:"> Old Password: </label><br><br>
                <input id="text" type="password" name="old_password" placeholder="Type here"><br><br>
                <label for="new_password:"> New Password: </label><br><br>
                <input id="text" type="password" name="new_password" placeholder="Type here"><br><br>
                <label for="confirm_password:"> Confirm Password: </label><br><br>
                <input id="text" type="password" name="confirm_password" placeholder="Type here"><br><br>
                
                <input id="button" type="submit" value="Change Password"> <button>  <a id="button1" href="Home.html">Cancel</a></button> <br><br>
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
            width: 150px;
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
</html>
