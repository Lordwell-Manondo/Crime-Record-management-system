<?php
	include "../db/Connections.php";
?>

<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: rgb(0, 109, 139);
		}

		h2 {
			color: white;
			text-align: center;
		}

		label {
			display: block;
			margin-bottom: 5px;
		}

		input[type="text"],
		textarea {
			width: 100%;
			padding: 5px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			cursor: pointer;
		}

		button.back-button {
			background-color: navy;
			color: #4CAF50;
			padding: 10px 20px;
			border: none;
			cursor: pointer;
			margin-left: 232px;
		}

		input[type="submit"]:hover,
		button.back-button:hover {
			background-color: #45a049;
		}

		form {
			width: 550px;
            height: 300px;
			border: 2px solid #ccc;
			padding: 30px;
			background: #fff;
			border-radius: 15px;
			margin: auto;
		}

		.message {
			text-align: center;
			margin-top: 20px;
		}

		.back-link {
			text-align: center;
			margin-top: 10px;
		}

		.back-link a {
			color: #4CAF50;
			text-decoration: non;
		}
	</style>
	<script>
		// JavaScript function to set the maximum date value to today's date
		function setMaxDate() {
			var today = new Date().toISOString().split('T')[0];
			document.getElementById("date").setAttribute('max', today);
		}

		// JavaScript function to validate the form before submission
		function validateForm() {
			var title = document.forms["submissionForm"]["title"].value;
			var date = document.forms["submissionForm"]["date"].value;
			var details = document.forms["submissionForm"]["details"].value;
			var image = document.forms["submissionForm"]["image"].value;
			
			if (title === "" || date === "" || details === "" || image === "") {
				alert("Please fill in all the fields.");
				return false;
			}
		}
	</script>
</head>
<body onload="setMaxDate()">
	<?php
		$message = "";
		if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST" ){
			$image = $_FILES["image"]["name"]; //getting the image name from client machine
			
			// Set image name with current time
			$imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
			$randomName = "IMG_" . date("his") . "." . $imageFileType; 
			
			$tempName = $_FILES["image"]["tmp_name"]; //temporary file name of the file on the server.
			$imageName = $randomName; //set the image name with current name
			$targetDirectory = "upload/" . $imageName; //declaring the folder in which the image will be stored
			move_uploaded_file($tempName, $targetDirectory); //move the image to that folder

			$title = isset($_POST["title"]) ? $_POST["title"] : "";
			$date = isset($_POST["date"]) ? $_POST["date"] : "";
			$details = isset($_POST["details"]) ? $_POST["details"] : "";

			$query = "INSERT INTO images(title, date, details, image) VALUES ('$title', '$date', '$details', '$targetDirectory')";
			$result = mysqli_query($conn, $query);

			if(!$result){
				$message = "Error: " . mysqli_error($conn);
			} else {
				$message = "News Submitted successfully.";
			}
		}
	?>
	<h2>News Submission Form</h2>
	<form name="submissionForm" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
		<input type="text" name="title" placeholder="Title"><br><br>
		<input type="date" id="date" name="date"><br><br>
        <textarea name="details" rows="4" cols="50" placeholder="Details"></textarea><br><br>
		<input type="file" name="image">
		<input type="submit" name="submit" value="Upload">
	
		<div class="message">
			<?php echo $message; ?>
		</div>
		<div class="back-link">
			<a href="../home/Admin_landing_page.php"><button class="back-button">Back</button></a>
		</div>
	</form>
</body>
</html>
