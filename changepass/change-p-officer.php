<?php
session_start();
include("../db/Connections.php");

if (isset($_SESSION['id']) && isset($_SESSION['service_no'])) {

    if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $op = validate($_POST['op']);
        $np = validate($_POST['np']);
        $c_np = validate($_POST['c_np']);

        if (empty($op)) {
            header("Location: change-password-officer.php?error=Old Password is required");
            exit();
        } else if (empty($np)) {
            header("Location: change-password-officer.php?error=New Password is required");
            exit();
        } else if ($np !== $c_np) {
            header("Location: change-password-officer.php?error=The confirmation password does not match");
            exit();
        } else {
            $id = $_SESSION['id'];

            // Check if the old password matches the stored password
            $stmt = $conn->prepare("SELECT password FROM officers WHERE id = ?");
            if (!$stmt) {
                header("Location: change-password-officer.php?error=Database Error: " . $conn->error);
                exit();
            }

            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($row) {
                $hashed_password = $row['password'];

                if (password_verify($op, $hashed_password)) {
                    // Hash the new password
                    $hashed_np = password_hash($np, PASSWORD_DEFAULT);

                    // Update the password in the database
                    $stmt2 = $conn->prepare("UPDATE officers SET password = ? WHERE id = ?");
                    if (!$stmt2) {
                        header("Location: change-password-officer.php?error=Database Error: " . $conn->error);
                        exit();
                    }

                    $stmt2->bind_param("si", $hashed_np, $id);
                    $stmt2->execute();

                    header("Location: change-password-officer.php?success=Your password has been changed successfully");
                    exit();
                } else {
                    header("Location: change-password-officer.php?error=Incorrect password");
                    exit();
                }
            } else {
                header("Location: change-password-officer.php?error=User not found");
                exit();
            }
        }
    } else {
        header("Location: change-password-officer.php");
        exit();
    }
} else {
    header("Location: ../login/index-officer.php");
    exit();
}
?>