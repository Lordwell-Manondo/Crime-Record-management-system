<?php
// Connect to the MySQL database
$db_host = "localhost";
$db_user = "your_username";
$db_pass = "your_password";
$db_name = "crms";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die("Failed to connect to database: " . mysqli_connect_error());
}

// Process the form submission if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the form data and sanitize it
	$name = mysqli_real_escape_string($conn, $_POST["name"]);
	$dob = mysqli_real_escape_string($conn, $_POST["dob"]);
	$emp_number = mysqli_real_escape_string($conn, $_POST["emp_number"]);
	$user_rank = mysqli_real_escape_string($conn, $_POST["user_rank"]);
	$station = mysqli_real_escape_string($conn, $_POST["station"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);

	// Validate the form data
	$errors = array();
	if (empty($name)) {
		$errors[] = "Name is required";
	}
	if (empty($dob) || !preg_match("/^\d{4}-\d{2}-\d{2}$/", $dob)) {
		$errors[] = "Date of birth is required and must be in the format YYYY-MM-DD";
	}
	if (empty($emp_number)) {
		$errors[] = "Employee number is required";
	}
	if (empty($user_rank)) {
		$errors[] = "User rank is required";
	}
	if (empty($station)) {
		$errors[] = "Station is required";
	}
	if (empty($password)) {
		$errors[] = "Password is required";
	}

	// If there are no errors, insert the officer data into the database
	if (empty($errors)) {
		$sql = "INSERT INTO officers (name, dob, emp_number, user_rank, station, password) VALUES ('$name', '$dob', '$emp_number', '$user_rank', '$station', '$password')";
		if (mysqli_query($conn, $sql)) {
			echo "Officer added successfully";
		} else {
			echo "Error adding officer: " . mysqli_error($conn);
		}
	} else {
		// If there are errors, display them to the user
		echo "<ul>";
		foreach ($errors as $error) {
			echo "<li>$error</li>";
		}
		echo "</ul>";
	}
}

// Close the database connection
mysqli_close($conn);
?>

