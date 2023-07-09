<?php
	include "../db/Connections.php";

	// Retrieve news from the database
	$query = "SELECT * FROM images";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		echo "Error: " . mysqli_error($conn);
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: white;
		}

		h2 {
			color: black;
			text-align: center;
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		th, td {
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: #f2f2f2;
		}

		.actions {
			display: flex;
			justify-content: center;
		}

		.actions a {
			margin-right: 10px;
		}
	</style>
    <nav class="navbar navbar-expand-lg" style="background-color: rgb(0, 109, 139);">
    <div class="log">
        <img src="../home/policeLog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-top: 0px;">
        <h3 style="text-align: center; margin: 0 auto;">View Details</h3>
    </div>
</nav>
</head>
<body>
	<!-- Table for displaying news details -->
	<table>
		<thead>
			<tr>
				<th>Title</th>
				<th>Date</th>
				<th>Details</th>
				<th>Image</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?php echo $row['title']; ?></td> <!-- Display the title of the news item -->
					<td><?php echo $row['date']; ?></td> <!-- Display the date of the news item -->
					<td><?php echo $row['details']; ?></td> <!-- Display the details of the news item -->
					<td><img src="<?php echo $row['image']; ?>" height="100" width="100"></td> <!-- Display the image of the news item -->
					<td class="actions">
						<a href="edit_news.php?id=<?php echo $row['id']; ?>">Edit</a> <!-- Link to edit the news item, passing the news ID as a parameter -->
						<a href="delete_news.php?id=<?php echo $row['id']; ?>">Delete</a> <!-- Link to delete the news item, passing the news ID as a parameter -->
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>
