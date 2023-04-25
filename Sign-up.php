<?php
session_start();

$_SESSION;
    include(Connection.php);
    include(Functions.php);
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
            <label for="Password:">Confirm: </label><br><br>
            <input id="text" type="password" name="password" placeholder="Type here"><br><br>
            
            <input id="button" type="submit" value="Submit"> <button>  <a id="button1" href="Index.php">Cancel</a></button> <br><br>

            <a id="button" href="Login.php">Click to Login</a><br><br>
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