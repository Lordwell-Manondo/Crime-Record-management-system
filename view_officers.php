<html>
<head>
	<title>View Officers</title>
</head>
<body>
	<h1>Officers</h1>
	<table border="1">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Date of Entry</th>
			<th>Employee Number</th>
			<th>Officer Rank</th>
			<th>Station</th>
			<th>Edit</th>
			<th>Delete</th>
			</tr>
		<?php
		// Connect to the database
		$conn = mysqli_connect("localhost", "username", "password", "database_name");

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Retrieve data from the officers table
		$sql = "SELECT * FROM officers";
		$result = mysqli_query($conn, $sql);

		// Output data for each row
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["first_name"] . "</td>";
				echo "<td>" . $row["last_name"] . "</td>";
				echo "<td>" . $row["username"] . "</td>";
				echo "<td>" . $row["date_of_entry"] . "</td>";
				echo "<td>" . $row["employee_number"] . "</td>";
				echo "<td>" . $row["officer_rank"] . "</td>";
				echo "<td>" . $row["station"] . "</td>";
				echo "<td><a href='edit_officer.php?id=" . $row["id"] . "'>Edit</a></td>";
				echo "<td><a href='delete_officer.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this officer?\")'>Delete</a></td>";
				echo "</tr>";
			}
		} else {
			echo "0 results";
		}

		// Close the connection
		mysqli_close($conn);
		?>
	</table>
	<br>
	<a href="add_officer.php">Add Officer</a>
</body>
</html>