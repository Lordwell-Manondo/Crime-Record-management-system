<?php

// include database connection file
include_once("../common/db_con.php");
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get form data
    // check that POST data is not empty
    $is_valid = true;
    if (empty($_POST['name']) || empty($_POST['dob']) || empty($_POST['employee_num']) || empty($_POST['rank']) || empty($_POST['station']) || empty($_POST['password'])) {
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Please fill all fields.</div>";
        $is_valid = false;
    }
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $employee_num = $_POST['employee_num'];
    $rank = $_POST['rank'];
    $station = $_POST['station'];
    $password = $_POST['password'];

    // Check that the employee_num is a valid integer
    if (!is_numeric($employee_num)) {
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Invalid input data. Please try again.</div>";
        $is_valid = false;
    }

    // Check that the dob is a valid date
    if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $dob)) {
        // Error message
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Invalid date format. Please enter a date in the format YYYY-MM-DD.</div>";
        $is_valid = false;
    }

    // Check that the rank is a valid integer
    if (!is_numeric($rank)) {
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Invalid input data. Please try again.</div>";
        $is_valid = false;
    }

    // Check that the station is a valid integer
    if (!is_string($station)) {
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Invalid input data. Please try again.</div>";
        $is_valid = false;
    }

    // Check that the password is a valid string
    if (!is_string($password) || strlen($password) < 8) {
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Invalid input data. Please try again.</div>";
    }

    // Check that name is a valid string
    if (!is_string($name) || strlen($name) < 4) {
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Invalid input data. Please try again.</div>";
    }

    if ($is_valid) {
        // Hash the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        // Prepare SQL query
        $sql = "INSERT INTO officer (name, dob, employee_num, rank, station, password)
                VALUES ('$name', '$dob', '$employee_num', '$rank', '$station', '$password')";
        // Execute SQL query
        if (mysqli_query($conn, $sql)) {
            // Success message
            $message = "<div style='background-color: #d4edda; color: #155724; padding: 10px;'>Officer added successfully</div>";
        } else {
            // Error message
            $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Error adding officer: " . mysqli_error($conn) . "</div>";
        }
    }
    // Close MySQL connection
    mysqli_close($conn);
}
?>