<?php
session_start();
include("../db/Connections.php");

$empNumberErr = $passwordErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $emp_number = $_POST['emp_number'];
    $password = $_POST['password'];

    if (empty($emp_number)) {
        $empNumberErr = "Username is required";
    }

    if (empty($password)) {
        $passwordErr = "Password is required";
    }

    if (empty($empNumberErr) && empty($passwordErr) && is_numeric($emp_number)) {
        // Read from database
        $query = "SELECT * FROM officers WHERE emp_number = '$emp_number' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if (password_verify($password, $user_data['password'])) {
                $_SESSION['id'] = $user_data['id'];
                header("Location: ../home/Officer.php");
                die;
            } else {
                $passwordErr = "Incorrect password";
            }
        } else {
            $empNumberErr = "Invalid username";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <br>
    <div id="box">
        <form method="post">
            <h2><div style="font-size: 20px; margin: 10px; color: black; text-align: center;">Login</div></h2>
            <label for="Username:"> Username: </label><br><br>
            <input id="text" type="text" name="emp_number" placeholder="Use employee number">
            <span class="error"><?php echo $empNumberErr; ?></span><br><br>
            <label for="Password:"> Password: </label><br><br>
            <input id="text" type="password" name="password" placeholder="Type here">
            <span class="error"><?php echo $passwordErr; ?></span><br><br>
           
            <button type="submit">Login</button>
            <a href="#" class="ca">Change password</a>
        </form>
    </div>
</body>
</html>
