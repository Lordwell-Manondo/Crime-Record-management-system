<html>
<head>
	<title>Add Officer</title>
</head>
<body>
	<h1>Add Officer</h1>
	<form method="post" action="add_officer_process.php">
		<label>First Name:</label><input type="text" name="first_name"><br><br>
		<label>Last Name:</label><input type="text" name="last_name"><br><br>
		<label>Username:</label><input type="text" name="username"><br><br>
		<label>Date of Entry:</label><input type="date" name="date_of_entry"><br><br>
		<label>Employee Number:</label><input type="text" name="employee_number"><br><br>
		<label>Officer Rank:</label><input type="text" name="officer_rank"><br><br>
		<label>Station:</label><input type="text" name="station"><br><br>
		<label>Password:</label><input type="password" name="password"><br><br>
		<input type="submit" name="submit" value="Add">
		<input type="button" name="cancel" value="Cancel" onclick="window.location='view_officers.php';">
	</form>
</body>
</html>
