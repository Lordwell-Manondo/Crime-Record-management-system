<?php
session_start();
include("../db/Connections.php");

$service_noErr = $passwordErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $service_no = $_POST['service_no'];
    $password = $_POST['password'];

    if (empty($service_no)) {
        $service_noErr = "Username is required";
    }

    if (empty($password)) {
        $passwordErr = "Password is required";
    }

    if (empty($service_noErr) && empty($passwordErr) && is_numeric($service_no)) {
        // Read from database
        $query = "SELECT * FROM officers WHERE service_no = '$service_no' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            //echo $user_data['password'] ." and ". md5($password);
            if (md5($password) == $user_data['password']) {
                $_SESSION['id'] = $user_data['id'];
                $_SESSION['service_no'] = $service_no;
                header("Location: ../home/Officer.php");
                die;
            } else {
                $passwordErr = "Incorrect password";
            }
        } else {
            $service_noErr = "Invalid username";
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
            <input id="text" type="text" name="service_no" placeholder="Use employee number">
            <span class="error"><?php echo $service_noErr; ?></span><br><br>
            <label for="Password:"> Password: </label><br><br>
            <input id="text" type="password" name="password" placeholder="Type here">
            <span class="error"><?php echo $passwordErr; ?></span><br><br>
           
            <button type="submit">Login</button> <a href="../changepass/Forgot-password-officer.php" class="ca">Forgot Password</a>
        </form>
    </div>
</body>
</html>
