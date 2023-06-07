<?php
session_start();
include "../db/Connections.php";

if (isset($_POST['service_no']) && isset($_POST['password'])) {
    $service_no = $_POST['service_no'];
    $password = $_POST['password'];

    if (empty($service_no)) {
        header("Location: index-officer.php?error=User Name is required");
        exit();
    } elseif (empty($password)) {
        header("Location: index-officer.php?error=Password is required");
        exit();
    } else {
        // Prepare the SQL statement with placeholders
        $sql = "SELECT * FROM officers WHERE service_no = ? LIMIT 1";
        $stmt = $conn->prepare($sql);

        // Bind the parameter and execute the statement
        $stmt->bind_param("s", $service_no);
        $stmt->execute();

        // Get the result from the executed statement
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            // Verify the password using password_verify function
            if (password_verify($password, $hashed_password)) {
                $_SESSION['service_no'] = $row['service_no'];
                $_SESSION['id'] = $row['id'];
                header("Location: ../home/Officer.php");
                exit();
            } else {
                header("Location: index-officer.php?error=Incorrect User name or password");
                exit();
            }
        } else {
            header("Location: index-officer.php?error=Incorrect User name or password");
            exit();
        }
    }
} else {
    header("Location: index-officer.php");
    exit();
}
