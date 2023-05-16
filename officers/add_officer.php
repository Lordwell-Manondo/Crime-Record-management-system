<?php
// connect to database
session_start();
    include('../db/Connections.php');
    
	
	// Check if the fsorm was submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		// Prepare the SQL statement
		$stmt = $conn->prepare("INSERT INTO officers (first_name, last_name, emp_number, date_of_entry, officer_rank, station, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
	
		// Bind the parameters to the statement
		$stmt->bind_param("sssssss", $first_name, $last_name, $emp_number, $date_of_entry, $officer_rank, $station, $password);
	
		// Set the parameter values
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$emp_number = $_POST["emp_number"];
		$date_of_entry = $_POST["date_of_entry"];
		$officer_rank = $_POST["officer_rank"];
		$station = $_POST["station"];
		$password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security
	
		// Execute the statement
		if ($stmt->execute()) {
			echo "<span style='color: bolue; font-weight: bold;'>Officer added successfully!</span>";
			// Set the refresh time to 5 seconds
			  $refreshTime = 5;
	
			  // Generate the meta tag with the refresh time
			  $metaTag = "<meta http-equiv='refresh' content='$refreshTime'>";
	
			  // Output the meta tag
			  echo $metaTag;
	
		} else {
			echo "Error: " . $stmt->error;
			// Set the refresh time to 5 seconds
			$refreshTime = 5;
	
			// Generate the meta tag with the refresh time
			$metaTag = "<meta http-equiv='refresh' content='$refreshTime'>";
  
			// Output the meta tag
			echo $metaTag;
		}
	
		// Close the statement
		$stmt->close();
	}

	// Close the conection
	$conn->close();
	?>
	

<html>
<head>
	<title>Add Officer</title>
</head>
<body>
<header>
			<a href="../home/Admin_landing_page.html" style="margin-left: 1230px; color: white;"> <p style="font-size: 15px;  margin-left: 50px; color: white;">Back</p> </a>
</header>
	<h2>Add Officer</h2>
	<form action="add_officer.php" method="post">
		<label>First Name:</label>
		<input type="text" name="first_name" required><br><br>
		<label>Last Name:</label>
		<input type="text" name="last_name" required><br><br>
		<label>Employee Number:</label>
		<input type="text" name="emp_number" required><br><br>
		<label>Date of Entry:</label>
		<input type="date" name="date_of_entry" required><br><br>
		<label>Officer Rank:</label>
		<select name="officer_rank" required>
			<option value="" selected disabled hidden>Select Rank</option>
			<option value="Officer">Officer</option>
			<option value="Sergeant">Sergeant</option>
			<option value="Lieutenant">Lieutenant</option>
			<option value="Captain">Captain</option>
			<option value="Chief">Chief</option>
		</select><br><br>
		<label>Station:</label>
		<select name="station" required>
			<option value="" selected disabled hidden>Select Station</option>
			<option value="Area 3 police">Area 3 police</option>
			<option value="Kanengo police">Kanengo police</option>
			<option value="Lumbadzi police">Lumbadzi police</option>
			<option value="Zomba police">Zomba police</option>
			<option value="Wenera police">Wenera police</option>
		</select><br><br>
		<label>Password:</label>
		<input type="password" name="password" required><br><br>
		<input type="submit" value="Add Officer" onclick="location.href='view_officers.php';">
		<input type="button" value="View officers" onclick="location.href='view_officers.php';">
	</form>
</body>


<style>
	
 
  body {
  font-family: Arial, sans-serif;
  background-color: rgb(0, 109, 139);
  color: white;
}	
	a {
		display: inline;
		float: left;
		color: #ffffff;
		text-decoration: none;
		margin-right: 10px;
		font-size: 30px;
	}
h2 {
  text-align: center;
  color: white;
  font-weight: 200px;
}

form {
  max-width: 500px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 20px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
  color: #333;
}

input[type="text"],
input[type="password"],
select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 20px;
  font-size: 16px;
}

input[type="date"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 20px;
  font-size: 16px;
}

input[type="submit"],
input[type="button"] {
  background-color: blue;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover,
input[type="button"]:hover {
  background-color: green;
}
</style> 
</html>