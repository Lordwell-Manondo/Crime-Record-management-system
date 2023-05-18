<?php
session_start();
include("../db/Connections.php");

$emailErr = $newPasswordErr = $confirmPasswordErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if (empty($email)) {
        $emailErr = "Email is required";
    }

    if (empty($newPassword)) {
        $newPasswordErr = "New password is required";
    }

    if (empty($confirmPassword)) {
        $confirmPasswordErr = "Confirm password is required";
    } elseif ($newPassword !== $confirmPassword) {
        $confirmPasswordErr = "Passwords do not match";
    }

    if (empty($emailErr) && empty($newPasswordErr) && empty($confirmPasswordErr)) {
        // Read user data from the database
        $query = "SELECT * FROM officers WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            $userId = $user_data['id'];

            // Update password in the database
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE officers SET password = '$newPasswordHash' WHERE id = '$userId'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                echo "Password reset successfully.";
            } else {
                echo "Error resetting password.";
            }
        } else {
            echo "User not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <br>
    <div id="box">
        <form method="post">
            <h2><div style="font-size: 20px; margin: 10px; color: black; text-align: center;">Forgot Password</div></h2>
            <label for="Email:">Email:</label><br><br>
            <input id="text" type="email" name="email" placeholder="Enter your email">
            <span class="error"><?php echo $emailErr; ?></span><br><br>
            <label for="New Password:">New Password:</label><br><br>
            <input id="text" type="password" name="new_password" placeholder="Enter new password">
            <span class="error"><?php echo $newPasswordErr; ?></span><br><br>
            <label for="Confirm Password:">Confirm Password:</label><br><br>
            <input id="text" type="password" name="confirm_password" placeholder="Confirm new password">
            <span class="error"><?php echo $confirmPasswordErr; ?></span><br><br>
            <button type="submit">Reset Password</button><br>
        </form>
    </div>
</body>
</html>
