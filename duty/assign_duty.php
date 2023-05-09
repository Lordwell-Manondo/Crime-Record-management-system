<?php

// include database connection file
include_once("../common/db_con.php");
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get form data
    // check that POST data is not empty
    $is_valid = true;
    if (empty($_POST['case_serial_no']) || empty($_POST['officer_id']) || empty($_POST['date_to_report'])) {
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Please fill all fields.</div>";
        $is_valid = false;
    }
    $case_serial_no = $_POST['case_serial_no'];
    $officer_id = $_POST['officer_id'];
    $date_to_report = $_POST['date_to_report'];

    // Check that the case_serial_no and officer_id are valid integers
    if (!is_numeric($case_serial_no) || !is_numeric($officer_id)) {
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
        $sql = "INSERT INTO duty (case_serial_no, officer_id, date_to_report)
            VALUES ('$case_serial_no', '$officer_id', '$date_to_report')";

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
$sql = "SELECT * FROM `case` WHERE status = 'Open' ORDER BY serial_no";
$result = mysqli_query($conn, $sql);
$cases = "";
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $cases.="<option value='" . $row['serial_no'] . "'>" . $row['serial_no'] ." (". $row['incident'] . ")</option>";
  }
}

// Retrieve the available officer IDs from the database
$sql = "SELECT * FROM `officer` ORDER BY `name`";
$result = mysqli_query($conn, $sql);
$officers = "";
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $officers.="<option value='" . $row['id'] . "'>".$row['id']." (" . $row['name'] . ")</option>";
  }
}

// Close MySQL connection
mysqli_close($conn);

?>
