<?php
// Database credentials
session_start();
include('../db/Connections.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE officers SET first_name=?, last_name=?, emp_number=?, date_of_entry=?, officer_rank=?, station=? WHERE id=?");

    // Bind the parameters to the statement
    $stmt->bind_param("ssssssi", $first_name, $last_name, $emp_number, $date_of_entry, $officer_rank, $station, $id);

    // Set the parameter values
    $id = $_POST["id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $emp_number = $_POST["emp_number"];
    $date_of_entry = $_POST["date_of_entry"];
    $officer_rank = $_POST["officer_rank"];
    $station = $_POST["station"];

    // Execute the statement
    if ($stmt->execute()) {
        echo "Officer updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Check if an officer ID was provided in the URL
if (isset($_GET["id"])) {
    // Retrieve the officer's data from the database
    $stmt = $conn->prepare("SELECT * FROM officers WHERE id=?");
    $stmt->bind_param("i", $id);
    $id = $_GET["id"];
    $stmt->execute();
    $result = $stmt->get_result();
    $officer = mysqli_fetch_assoc($result);

    // Close the statement
    $stmt->close();

    // Check if any data was returned
    if ($officer) {
        ?>
        <html>
        <head>
            <title>Edit Officer</title>
        </head>
        <body>
        <h1>Edit Officer</h1>
        <div class="conntainer">
        <form method="post" > 
            <input type="hidden" name="id" value="<?php echo $officer['id']; ?>">
            <label>First Name:</label>
            <input type="text" name="first_name" value="<?php echo $officer['first_name']; ?>"><br>
            <label>Last Name:</label>
            <input type="text" name="last_name" value="<?php echo $officer['last_name']; ?>"><br>
            <label>Employee Number:</label>
            <input type="text" name="emp_number" value="<?php echo $officer['emp_number']; ?>"><br>
            <label>Date of Entry:</label>
            <input type="text" name="date_of_entry" value="<?php echo $officer['date_of_entry']; ?>"><br>
            <label>Officer Rank:</label>
            <input type="text" name="officer_rank" value="<?php echo $officer['officer_rank']; ?>"><br>
            <label>Station:</label>
            <input type="text" name="station" value="<?php echo $officer['station']; ?>"><br>
            <input type="submit" value="Update"><br>
            <input type="button" value="View officers" onclick="location.href='view_officers.php';">
            </div>
        </form>
            
                <style>
		body {
			height: 100vh;
            font-family: Arial, sans-serif;
            background-color: rgb(0, 109, 139);
		}

		.conntainer {
			width: 25%;
			padding: 20px;
			background-color: #f0f0f0;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			margin-top: 20px;
            margin-left: 480px;

        }

		h1 {
            /* justify-conntent: center; */
            text-align: center;
            color: white;
            font-weight: 200;

		}

		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}

		input[type="text"] {
			padding: 5px;
			border-radius: 3px;
			border: 1px solid #ccc;
			margin-bottom: 20px;
			width: 100%;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 3px;
			cursor: pointer;
			width: 100%;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

        input[type="button"] {
			background-color: blue;
			color: white;
			padding: 10px;
			border: none;
			border-radius: 3px;
			cursor: pointer;
			width: 100%;
		}
	</style>

     
        </body>
        </html>
        <?php
    } else {
        echo "Officer not found.";
    }
} else {
    echo "No officer ID provided.";
}

// Close the connnection
mysqli_close($conn);
?>
