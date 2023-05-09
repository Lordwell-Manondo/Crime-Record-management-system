<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Master_login</title>
        <h1 style=" text-align: center; color: white;SSS">Welcome to Crime Record Management portal</h1><br><br><br><br>
         
    </head>
    <body>
    <div class="login-types">
  <h2>Select a login/registration type:</h2><br><br>
  <ul>
    <li><a href="Login_admin.php" class="admin">Admin</a></li>
    <li><a href="Login_officer.php" class="staff">Officer</a></li>
    <li><a href="Sign-up_public_user.php" class="public-user">Public User</a></li>
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
