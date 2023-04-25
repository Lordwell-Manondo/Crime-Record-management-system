<?php
session_start();

$_SESSION;
$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Crime record management system
        </title>
        <h1>Welcome to Crime Record Management System</h1>
    </head> 
    <br>
    <body>
        Hello! Username.
        <br>
        <a href="Logout.php">Logout</a>
    </body>   
</html>
