<?php
// Include the file for database connection
require_once '../db/Connections.php';
// Create a new instance of the Connection class
$connection = new Connection();
    
// Call the connect() method to establish a database connection
$conn = $connection->connect();

// Create a new instance of the Connection class
$connection = new Connection();
    
// Call the connect() method to establish a database connection
$conn = $connection->connect();

// Function to insert form data into the database
function insertFormData($phone, $location, $description, $conn) {
    // Prepare the SQL statement
    $statement = $conn->prepare("INSERT INTO reportform (phone, location, description) VALUES (?, ?, ?)");

    // Bind the parameters with the form values
    $statement->bind_param("sss", $phone, $location, $description);

    // Execute the SQL statement
    if ($statement->execute()) {
        // Submission successful
        return true;
    } else {
        // Submission failed
        return false;
    }
}

// Variables to track success/error messages
$successMessage = "";
$errorMessage = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form values
    $phone = $_POST["phone"];
    $location = $_POST["location"];
    $description = $_POST["description"];

    // Call the function to insert the form data into the database
    $isSubmitted = insertFormData($phone, $location, $description, $conn);

    if ($isSubmitted) {
        $successMessage = "Form submitted successfully.";
    } else {
        $errorMessage = "Oops! Something went wrong. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Form</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi1Re9rRPX6TGBv81ox0H7tRXfQ7eg9lo&libraries=places"></script>
    <script>
        // Initialize Google Places Autocomplete
        function initializeAutocomplete() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
        google.maps.event.addDomListener(window, 'load', initializeAutocomplete);
    </script>
</head>
<body>
    <h2>Report Form</h2>
    <?php if (!empty($successMessage)) : ?>
        <div style="color: white; text-align: center;"><?php echo $successMessage; ?></div>
    <?php endif; ?>
    <?php if (!empty($errorMessage)) : ?>
        <div style="color: red; text-align: center;"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
    <br>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required><br><br>
        
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required><br><br>
        
        <label for="description">Description:</label><br>
        <textarea name="description" id="description" rows="5" required></textarea><br><br>
        
        <input type="submit" value="Submit">
        <button type="button" onclick="window.history.back();">Cancel</button>
    </form>
</body>
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
    button[type="button"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        margin-left: 232px;
    }
    
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    form {
        width: 400px;
        border: 2px solid #ccc;
        padding: 30px;
        background: #fff;
        border-radius: 15px;
        margin: auto;
    }
</style>
</html>
