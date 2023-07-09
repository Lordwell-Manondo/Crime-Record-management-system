<!DOCTYPE html>
<html>
<head>
	<style>
       	body {
			font-family: Arial, sans-serif;
			background-color: white;
		}

		h2 {
			color: white;
        }
		/* CSS styles */
	</style>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg" style="background-color: rgb(0, 109, 139);">
        <div class="log">
            <img src="../home/policeLog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-top: 0px;">
            <h3 style="text-align: center; margin: 0 auto;">Submission Status</h3>
        </div>
    </nav>
</head>
<body>
	<!-- Message Section -->
	<div class="message">
		<?php
			$message = isset($_GET["message"]) ? $_GET["message"] : "";
			echo $message;
		?>
	</div>
	
	<!-- Link to View News -->
    <a href="view.php">View the news</a>
    <br>
	
	<!-- Link to Home Page -->
	<a href="../home/Officer-incharge_landing_page.php">Go to Home</a>
</body>
</html>
