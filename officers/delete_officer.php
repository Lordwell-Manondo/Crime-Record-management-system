<?php
session_start();
include('../db/Connections.php');

// Check if an officer ID was provided
if (isset($_GET['id'])) {
    $officer_id = $_GET['id'];

    // Prepare the SQL statement to delete the officer from the database
    $stmt = $conn->prepare("DELETE FROM officers WHERE id = ?");

    // Bind the parameter to the statement
    $stmt->bind_param("i", $officer_id);

    // Execute the statement to delete the officer
    if ($stmt->execute()) {
        echo "Officer deleted successfully!";
        header("location: view_officers.php");
        exit();
        
    } else {
       
        echo "Error deleting officer: " . $stmt->error;
    }

   // Close the prepared statement
    $stmt->close();
} else {
    echo "No officer ID provided.";
}

// Close the database connection
$conn->close();
?>
