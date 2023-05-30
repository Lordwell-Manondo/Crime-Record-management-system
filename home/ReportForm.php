<?php
// Include the file for database connection
require_once '../db/Connections.php';

// Function to insert form data into the database
function insertFormData($phone, $location, $description, $connection) {
    // Prepare the SQL statement
    $statement = $connection->prepare("INSERT INTO reportform (phone, location, description) VALUES (?, ?, ?)");

    // Bind the parameters with the form values
    $statement->bind_param("sss", $phone, $location, $description);

    // Execute the SQL statement
    $statement->execute();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form values
    $phone = $_POST["phone"];
    $location = $_POST["location"];
    $description = $_POST["description"];

    // Call the function to insert the form data into the database
    insertFormData($phone, $location, $description, $conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Form</title>
</head>
<body>
    <h2>Report Form</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required><br><br>
        
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required><br><br>
        
        <label for="description">Description:</label><br>
        <textarea name="description" id="description" rows="5" required></textarea><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        
        h2 {
            color: #333;
        }
        
        form {
            width: 300px;
            margin: 0 auto;
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
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</html>
