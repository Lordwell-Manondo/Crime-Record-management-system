<!--
- The code includes the necessary PHP include statement to load the database connection file.
- The HTML structure and CSS styles are defined for creating a form to add news.
- JavaScript functions are included for setting the maximum date value and form validation.
- The Bootstrap and Font Awesome libraries are linked for styling and icons.
- A navbar is created using Bootstrap's navbar component with a customized logo and title.
- The PHP code handles the form submission. It retrieves the image file, renames it with the current time, and moves it to the designated folder. The form data (title, date, details, and image path) is inserted into the database table.
- If there are any errors during the database query, an error message is displayed. Otherwise, a success message is shown, and the user is redirected to a success page.
- The form includes input fields for title, date, details, and image, along with a submit button. It also displays the message variable, which contains either an error or success message.
-->

<?php
	include "../db/Connections.php"; // Include the database connection file
	?>


<!DOCTYPE html>
<html>
<head>
	<style>		/* Styles */
		body {
			font-family: Arial, sans-serif;
			background-color: white;
		}

		h2 {
			color: black;
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
 
  border-radius: 5px;
 
  padding: 10px 20px;
  /* other properties */
}

		input[type="submit"]:hover,
		button.back-button:hover {
			background-color: blue;
			
		}

		form {
			width: 550px;
			height: 500px;
			border: 2px solid #ccc;
			padding: 30px;
			background: #fff;
			border-radius: 15px;
			margin-top: 5px;
			margin-left:300px;
		}

		.message {
			text-align: center;
			margin-top: 20px;
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="../login/login.css">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg " style="background-color: rgb(0, 109, 139);">
		<div class="log">
			<img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
			<h3>ADDING NEWS</h3>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
			</ul>
		</div>
	</nav>
</head>
<body onload="setMaxDate()">
	<?php
		$message = "";
		if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
			$image = $_FILES["image"]["name"]; //getting the image name from the client machine

			// Set image name with the current time
			$imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
			$randomName = "IMG_" . date("his") . "." . $imageFileType; 

			$tempName = $_FILES["image"]["tmp_name"]; //temporary file name of the file on the server.
			$imageName = $randomName; //set the image name with the current name
			$targetDirectory = "upload/" . $imageName; //declaring the folder in which the image will be stored
			move_uploaded_file($tempName, $targetDirectory); //move the image to that folder

			$title = isset($_POST["title"]) ? $_POST["title"] : "";
			$date = isset($_POST["date"]) ? $_POST["date"] : "";
			$details = isset($_POST["details"]) ? $_POST["details"] : "";

			$query = "INSERT INTO images(title, date, details, image) VALUES ('$title', '$date', '$details', '$targetDirectory')";
			$result = mysqli_query($conn, $query);

			if (!$result) {
				$message = "Error: " . mysqli_error($conn);
			} else {
				$message = "News Submitted successfully.";
				// Redirect to a new page displaying the success message
				header("Location: success.php?message=" . urlencode($message));
				exit();
			}
		}
	?>
	
	<form name="submissionForm" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
		<input type="text" name="title" placeholder="Title"><br><br>
		<input type="date" id="date" name="date"><br><br>
		<textarea name="details" rows="4" cols="50" placeholder="Details"></textarea><br><br>
		<input type="file" name="image"><br><br>
		<input type="submit" name="submit" value="Upload" style="background-color: blue; color:white;">

	
		<div class="message">
			<?php echo $message; ?>
		</div>
	</form>
</body>
</html>
