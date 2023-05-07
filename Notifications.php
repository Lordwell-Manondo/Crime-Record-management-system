<?php
// Connect to the MySQL database
$mysqli = new mysqli("localhost", "username", "", "database_name");

// Check for connection errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Retrieve the form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$location = $_POST['location'];
$message = $_POST['message'];

// Insert the form data into the database
$insert_stmt = $mysqli->prepare("INSERT INTO form_data (phone, name, date, location, message) VALUES (?, ?, ?,?, ?)");
$insert_stmt->bind_param("sss",$phone, $name, $date, lcation, $message);
$insert_stmt->execute();

// Send a notification to the admin
$to = "admin@example.com";
$subject = "New Form Submission";
$body = "A new form submission has been received from " . $name . " (" . $phone . ").\n\nMessage:\n" . $message;
$headers = "From: 09958699955";
mail($to, $subject, $body, $headers);

// Redirect the user to a thank-you page
header("Location: thank_you.html");
exit();
?>