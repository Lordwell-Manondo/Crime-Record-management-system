<?php
session_start(); 
include "../db/Connections.php";
// Create a new instance of the Connection class
$connection = new Connection();
    
// Call the connect() method to establish a database connection
$conn = $connection->connect();

// Create a new instance of the Connection class
$connection = new Connection();
    
// Call the connect() method to establish a database connection
$conn = $connection->connect();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $serviceNo = $_POST["service_no"];
    $password = $_POST["password"];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM officers WHERE service_no = ?");
    $stmt->bind_param("s", $serviceNo);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a row is returned
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row["password"])) {
            // Password is correct, redirect to the home page or perform any other necessary actions
            header("Location: ../home/Officer.php");
            exit();
        } else {
            // Password is incorrect
            $error = "Invalid service number or password.";
        }
    } else {
        // No matching user found
        $error = "Invalid service number or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* Reset default browser styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: rgb(0, 109, 139);
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.login-form {
  background-color: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  width: 100%;
}

.login-form h2 {
  margin-bottom: 20px;
  color: #333;
  text-align: center;
}

.login-form label {
  display: block;
  margin-bottom: 10px;
  color: #666;
}

.login-form input[type="text"],
.login-form input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  font-size: 16px;
  color: #333;
}

.login-form input[type="text"]:focus,
.login-form input[type="password"]:focus {
  outline: none;
  border-color: #57a3f3;
}

.login-form input[type="submit"] {
  background-color: #57a3f3;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 3px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease;
}

.login-form input[type="submit"]:hover {
  background-color: #3f8ce8;
}

.login-form p.error-message {
  color: #ff0000;
  margin-top: 10px;
  text-align: center;
}

.login-form p.error-message:before {
  content: "⚠";
  margin-right: 5px;
}
.button-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
}
.forgot-password {
    color: #333;
    text-decoration: none;
    font-size: 14px;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Login</h2>
            <?php if (isset($error)) echo "<p class='error-message'>$error</p>"; ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="service_no">Service Number:</label>
                <input type="text" name="service_no" required><br><br>
                <label for="password">Password:</label>
                <input type="password" name="password" required><br><br>
                <div class="button-group">
                    <input type="submit" value="Login">
                    <a href="forgot-password.php" class="forgot-password">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
