<!--
- The code includes the necessary PHP include statement to load the database connection file.
- The HTML structure and CSS styles are defined to create a news and events web page.
- The navigation bar is created using Bootstrap's navbar component with a customized logo and title.
- A database query is executed to retrieve news data from the "images" table.
- If there are news records available, a loop is used to display each news article with its title, date, image, and details.
- The news articles are enclosed in a container with appropriate styling.
- If no news records are found, a message indicating no news is displayed.
-->


<?php
	include "../db/Connections.php"; // Include the database connection file
?>

<!DOCTYPE html>
<html>
<head>
	<style> 		/* Styles for the news container */

		.news-container {
			margin-left: auto;
			margin-right: auto;
			padding: 30px;
			border: 1px solid #ccc;
			border-radius: 1px;
			background-color: white;
			border-radius: 5px;
			height: 700px;
			width: 1000px;
		}

		.news-title {
			font-size: 20px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.news-date {
			font-size: 14px;
			color: #888;
			margin-bottom: 5px;
		}

		.news-details {
			margin-bottom: 15px;
		}

		.news-image {
			max-width: 100%;
			max-height: 100%;
			margin-top: 10px;
			object-fit: contain;
			padding-left: 90px;
			padding-right: 50px;
			margin-left: 20px;
			margin-right: 20px;
		}

		body {
			background-color: white;
		}

		.navbar {
			height: 65px; /* Adjust the height as per your requirement */
		}

		.navbar-brand {
			display: flex;
			
		}

		.log {
			display: flex;
			align-items: center;
		}
	</style>
</head>
<body>
	<!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="background-color: rgb(0, 109, 139);">
	<div class="log">
		<img src="../home/policeLog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-top: 0px;">
		<h3 style="text-align: center; color: white; margin: auto;">News and Events</h3>
	</div>
</nav>

		<!--Retrieve data from the database-->

	<?php
		$query = "SELECT * FROM images";
		$result = mysqli_query($conn, $query);

		// Check if the query was successful
		if (!$result) {
			echo $result . "<br/>" . mysqli_error($conn);
		}

		// Check if there are news records in the database
		if (mysqli_num_rows($result) > 0) {

		// Loop through each news record
			while ($row = mysqli_fetch_array($result)) {
				$title = $row['title'];
				$date = $row['date'];
				$image = $row['image'];
				$details = $row['details'];
	?>

			<!-- Display the news record in a container -->
				<div class="news-container">
					<h3 class="news-title"><?php echo $title; ?></h3>
					<p class="news-date">Date: <?php echo $date; ?></p>
					<img class="news-image" src="<?php echo $image; ?>" alt="News Image">
					<p class="news-details"><?php echo $details; ?></p>
				</div>
	<?php
			}
		} else {
	?>

	<!--No news records found-->
		<h3>No news found!</h3>
	<?php
		}
	?>
</body>
</html>
