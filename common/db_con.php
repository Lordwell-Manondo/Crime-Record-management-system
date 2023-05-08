<?php

// Connect to MySQL server
$conn = mysqli_connect("localhost", "root", "", "crime_management", "3306");

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>