<?php
session_start();

// Include the file for database connection
require_once '../db/Connections.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Case Reported Successful</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: rgb(0, 109, 139);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 5px;
            text-align: center;
        }

        .btn-primary {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Display success message -->
        <div class="alert alert-success" role="alert">
            Case Reported successfully!
        </div>
        <!-- Create buttons to go back and go to dashboard -->
        <div class="text-center">
            <a href="Home.php" class="btn btn-primary">Ok</a>
        </div>
    </div>
</body>
</html>
