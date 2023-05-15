<?php
session_start();
// include database connection file
include("../Connections.php");
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get form data
    // check that POST data is not empty
    $is_valid = true;
    if (empty($_POST['case_id']) || empty($_POST['emp_number']) || empty($_POST['date_to_report'])) {
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Please fill all fields.</div>";
        $is_valid = false;
    }
    $case_id = $_POST['case_id'];
    $emp_number = $_POST['emp_number'];
    $date_to_report = $_POST['date_to_report'];

    // Check that the id and officer_id are valid integers
    if (!is_numeric($case_id) || !is_string($emp_number)) {
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Invalid input data. Please try again.</div>";
        $is_valid = false;
    }
    
    // Check that the date_to_report is a valid date
    if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $date_to_report)) {
        // Error message
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Invalid date format. Please enter a date in the format YYYY-MM-DD.</div>";
        $is_valid = false;
    }

    if ($is_valid) {
        // Prepare SQL query
        $sql = "INSERT INTO duty (case_id, emp_number, date_to_report)
            VALUES ('$case_id', '$emp_number', '$date_to_report')";

        // Execute SQL query
        if (mysqli_query($conn, $sql)) {
        // Success message
        $message = "<div style='background-color: #d4edda; color: #155724; padding: 10px;'>Duty assigned successfully</div>";
        } else {
        // Error message
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Failed to assign duty: " . mysqli_error($conn) . "</div>";
        }
    }
}

// Retrieve the available case serial numbers from the database
$sql = "SELECT * FROM `cases` ORDER BY id";
$result = mysqli_query($conn, $sql);
$cases = "";
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $cases.="<option value='" . $row['id'] . "'>" . $row['id'] ." (". $row['incident'] . ")</option>";
  }
}

// Retrieve the available officer IDs from the database
$sql = "SELECT * FROM `officers` ORDER BY `first_name`";
$result = mysqli_query($conn, $sql);
$officers = "";
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $officers.="<option value='" . $row['employee_number'] . "'>".$row['employee_number']." (" . $row['first_name'] .' '.$row['last_name'] . ")</option>";
  }
}

// Close MySQL connection
mysqli_close($conn);

?>
