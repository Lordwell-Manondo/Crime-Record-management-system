<?php
session_start();
include("connections.php");

// Select all data from the officers table
$query = "SELECT * FROM officers";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Officers List</title>
	<style>
		body {
			background-color: aqua;
			padding: 50px;
		}
		h1 {
			text-align: center;
		}
		table {
			width: 80%;
			margin: 0 auto;
			background-color: white;
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
			text-align: center;
			border-collapse: collapse;
		}
		th {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
		}
		td {
			padding: 10px;
			border: 1px solid #ccc;
		}
	</style>
</head>
<body>
	<h1>Officers List</h1>
	<table>
		<tr>
			<th>Name</th>
			<th>Date of Birth</th>
			<th>Employee Number</th>
			<th>User Rank</th>
			<th>Station</th>
		</tr>
		<?php
		// Loop through the result set and display the data in a table
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['dob']."</td>";
			echo "<td>".$row['emp_number']."</td>";
			echo "<td>".$row['user_rank']."</td>";
			echo "<td>".$row['station']."</td>";
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>
