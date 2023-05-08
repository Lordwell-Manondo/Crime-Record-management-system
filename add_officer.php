<?php
session_start();
include("Connections.php");

// Process the form submission if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the form data and sanitize it
	$name =  $_POST["name"];
	$dob =  $_POST["dob"];
	$emp_number =  $_POST["emp_number"];
	$user_rank =  $_POST["user_rank"];
	$station =  $_POST["station"];
	$password =  $_POST["password"];

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
		$query= "INSERT INTO officers (name, dob, emp_number, user_rank, station, password) VALUES ('$name', '$dob', '$emp_number', '$user_rank', '$station', '$password')";
		if (mysqli_query($con, $query)) {
			echo "Officer added successfully";
		} else {
			echo "Error adding officer: " . mysqli_error($con);
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
?>



<!DOCTYPE html>
<html>
<head>
	<title>Add Officer</title>
	<style>

body {
			background-color: aqua;
			padding: 50px;
		}
		h1 {
			text-align: center;
		}
		form {
			width: 50%;
			margin: 0 auto;
			background-color: white;
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-size: 16px;
		}
		input[type="text"], input[type="password"], select, input[type="date"] {
			display: block;
			margin-bottom: 20px;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 16px;
			width: 100%;
			box-sizing: border-box;
			outline: none;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
			outline: none;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

	</style>
</head>
<body>
	<h1>Add Officer</h1>
	<form action="add_officer.php" method="post">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required>

		<label for="dob">Date of Birth:</label>
		<input type="date" name="dob" id="dob" placeholder="YYYY-MM-DD" required>

		<label for="emp_number">Employee Number:</label>
		<input type="text" name="emp_number" id="emp_number" required>

		<label for="user_rank">User Rank:</label>
		<input type="text" name="user_rank" id="user_rank" required>

		<label for="station">Select Station:</label>
		<select name="station" id="station" required>
			<option value="">Select Station</option>
			<option value="Station 1">Station 1</option>
			<option value="Station 2">Station 2</option>
			<option value="Station 3">Station 3</option>
		</select>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required>

		<input type="submit" value="Add Officer">
	</form>
</body>
</html>
