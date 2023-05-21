<?php
session_start();
include("../db/Connections.php");

$currentPasswordErr = $newPasswordErr = $confirmPasswordErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if (empty($currentPassword)) {
        $currentPasswordErr = "Current password is required";
    }

    if (empty($newPassword)) {
        $newPasswordErr = "New password is required";
    }

    if (empty($confirmPassword)) {
        $confirmPasswordErr = "Confirm password is required";
    } elseif ($newPassword !== $confirmPassword) {
        $confirmPasswordErr = "Passwords do not match";
    }

    if (empty($currentPasswordErr) && empty($newPasswordErr) && empty($confirmPasswordErr)) {
        $userId = $_SESSION['id'];

        // Read user data from the database
        $query = "SELECT * FROM officers WHERE id = '$userId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if (password_verify($currentPassword, $user_data['password'])) {
                // Update password in the database
                $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateQuery = "UPDATE officers SET password = '$newPasswordHash' WHERE id = '$userId'";
                $updateResult = mysqli_query($conn, $updateQuery);

                if ($updateResult) {
                    echo "Password changed successfully.";
                } else {
                    echo "Error updating password.";
                }
            } else {
                $currentPasswordErr = "Incorrect current password";
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
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <br>
    <div id="box">
        <form method="post">
            <h2><div style="font-size: 20px; margin: 10px; color: black; text-align: center;">Change Password</div></h2>
            <label for="Current Password:">Current Password:</label><br><br>
            <input id="text" type="password" name="current_password" placeholder="Enter current password">
            <span class="error"><?php echo $currentPasswordErr; ?></span><br><br>
            <label for="New Password:">New Password:</label><br><br>
            <input id="text" type="password" name="new_password" placeholder="Enter new password">
            <span class="error"><?php echo $newPasswordErr; ?></span><br><br>
            <label for="Confirm Password:">Confirm Password:</label><br><br>
            <input id="text" type="password" name="confirm_password" placeholder="Confirm new password">
            <span class="error"><?php echo $confirmPasswordErr; ?></span><br><br>
            <a href="../login/Login-officer.php" class="ca">Login</a>
            <button type="submit">Change Password</button>
            <br>
        </form>
    </div>
</body>
</html>
