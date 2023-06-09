<?php
	include "../db/Connections.php";
?>

<!DOCTYPE html>
<html>
<head>
	<style>
		.news-container {
			margin-left: auto;
			margin-right: auto;
			padding: 30px;
			border: 1px solid #ccc;
			border-radius: 1px;
			background-color: white;
			border-radius: 5px;
			height: 250px;
			width: 1200px;
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
			max-width: 200px;
			max-height: 200px;
			margin-top: 10px;
		}

		body {
			background-color: rgb(0, 109, 139);
		}

		.back-button {
			position: fixed;
			top: 20px;
			left: 20px;
			background-color: white;
			color: #4CAF50;
			border: none;
			border-radius: 50%;
			padding: 10px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<a href="../home/Home.php"><button class="back-button">&#8592;</button></a>

	<?php
		$query = "SELECT * FROM images";
		$result = mysqli_query($conn, $query);

		if(!$result){
			echo $result . "<br/>" . mysqli_error($conn);
		}

		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result)){
				$title = $row['title'];
				$date = $row['date'];
				$image = $row['image'];
				$details = $row['details'];
				
	?>
		<div class="news-container">
			<h3 class="news-title"><?php echo $title; ?></h3>
			<p class="news-date">Date: <?php echo $date; ?></p>
			<p class="news-details"><?php echo $details; ?></p>
			<img class="news-image" src="<?php echo $image; ?>" alt="News Image">
		</div>
	<?php
			}
		} else {
	?>
		<h3>No news found!</h3>
	<?php
		}
	?>
</body>
</html>
