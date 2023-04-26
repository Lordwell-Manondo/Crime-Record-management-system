<!-- <?php

// Define the menu options
$menu = array(
    "1" => "Admin",
    "2" => "Staff",
    "3" => "Public User"
);

// Display the menu to the user
echo "Select a login type:\n";
foreach ($menu as $key => $value) {
    echo "$key. $value\n";
}

// Get user input for the selected menu option
$selection = readline("Enter the number corresponding to your choice: ");

// Use a conditional statement to determine the selected login type
if ($selection == "1") {
    echo "Selected login type: Admin\n";
} elseif ($selection == "2") {
    echo "Selected login type: Staff\n";
} elseif ($selection == "3") {
    echo "Selected login type: Public User\n";
} else {
    echo "Invalid selection. Please try again.\n";
}

?> -->
<! DOCTYPE html>
<html>
    <head>
        <title>Master_login</title>
        <h1 style=" text-align: center; background-color: grey; color: white;SSS">Welcome to Crime Record Management portal</h1><br><br><br><br>
         
    </head>
    <body>
    <div class="login-types">
  <h2>Select a login type:</h2><br><br>
  <ul>
    <li><a href="#" class="admin">Admin</a></li>
    <li><a href="Login.php" class="staff">Officer</a></li>
    <li><a href="Login1.php" class="public-user">Public User</a></li>
  </ul>
</div>
<style>
body{
    background-color: aqua;
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
