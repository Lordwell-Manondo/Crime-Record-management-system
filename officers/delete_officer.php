<?php
session_start();
include('../db/Connections.php');

// Check if an officer ID was provided
if (isset($_GET['id'])) {
    $officer_id = $_GET['id'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("DELETE FROM officers WHERE id = ?");

    // Bind the parameter to the statement
    $stmt->bind_param("i", $officer_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Officer deleted successfully!";
        header("location: view_officers.php");
        exit();
        
    } else {
       
        echo "Error deleting officer: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No officer ID provided.";
}

// Close the connection
$conn->close();
?>
