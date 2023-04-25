<?php



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
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
            <div style="font-size: 20px; margin: 10px; color: black; text-align: center;">Login</div>
            <label for="Username:"> Username: </label><br><br>
            <input id="text" type="text" name="user_name" placeholder="Type here"><br><br>
            <label for="Password:"> Password: </label><br><br>
            <input id="text" type="password" name="password" placeholder="Type here"><br><br>
            
            <input id="button" type="submit" value="Login"><br><br>

            <a id="button" href="sign-up.php">Click to Signup</a><br><br>
        </form>
        </div>
            
    </body>
    <style type = "text/css">
        body{
            backgroud-color: aqua;
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
            background-color: blue;
            color: white;
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