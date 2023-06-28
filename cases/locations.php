<?php
// Assuming you have a database connection
// include('../db/Connections.php');

 //Create a new instance of the Connection class
 $connection = new Connection();
    
 // Call the connect() method to establish a database connection
 $conn = $connection->connect();

// Check if the connection was successful


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$area='';

// SQL query to retrieve distinct locations
$query = "SELECT DISTINCT location FROM cases";

// Execute the query
$result = mysqli_query($conn, $query);



// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {

    // Create an array to store the locations
    $location = array();
    // Iterate through the rows and display the locations
    while ($row = mysqli_fetch_assoc($result)) {
        $location [] =$row['location'] ;
    }
     // Display the locations
     foreach ($location as $locations) {
        echo '<a href="location.php?name=' . urlencode($locations) . '">' . $locations . '</a><br>';
    }
    
} else {
    echo "No locations found.";
}

// Close the database connection
mysqli_close($conn);
?>
