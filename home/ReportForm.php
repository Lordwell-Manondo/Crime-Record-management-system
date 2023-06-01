<?php
// Include the file for database connection
require_once '../db/Connections.php';

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
    <div>
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
    <!-- <div id="map" style="height: 400px; width: 100%; margin-left: 10px;"></div>

    <script>
        function initMap() {
            // Create a map object and specify the initial coordinates
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 0, lng: 0},
                zoom: 15
            });

            // Add a marker to the map based on the selected location
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();

                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(15);
                }

                var marker = new google.maps.Marker({
                    map: map,
                    position: place.geometry.location
                });
            });
        }

        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
        </div> -->
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
