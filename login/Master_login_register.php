<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Master Login</title>
        <h1 style="text-align: center; color: white; color: khaki; font-weight: 300;">Crime Record Management portal</h1><br><br><br><br>
         
    </head>
    <body>
    <div class="login-types">
  <h2 style="font-size: 25px; color: white; font-weight: 100;">Login as:</h2>
  <ul>
    <li><a href="index-officer-incharge.php" class="admin">Officer in charge</a></li>
    <li><a href="index-officer.php" class="staff">Officer</a></li>
  </ul>
</div>
<style>
 
body{
  background-color: rgb(0, 109, 139);
}
.login-types {
  width: 50%;
  margin: 0 auto;
}
a{
  margin-left: 50px;
}
.login-types h2 {
  font-size: 24px;
  font-weight: bold;
  text-align: center;
}

.login-types ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  justify-content: center;
}

.login-types li {
  margin: 0 10px;
}

.login-types a {
  display: block;
  padding: 10px 20px;
  background-color: #eee;
  color: #333;
  border-radius: 5px;
  text-align: center;
  text-decoration: none;
  transition: background-color 0.2s ease;
}

.login-types a:hover {
  background-color: #ccc;
  color: #fff;
}

</style>

    </body>
</html>
