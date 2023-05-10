<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Connect to the MySQL database
include('Connections.php');

//SQL statement
$sql = "SELECT * FROM reportform";

// Step 3: Execute the SQL statement
$result = mysqli_query($conn, $sql);

// Step 4: Fetch the data

// check if the data is available in the database
echo '<div class="data-container">';
if (mysqli_num_rows($result) > 0) {
    // display the recorded cases of each row
    $count = 1;
    while ($row = mysqli_fetch_array($result)) {
        // Use the retrieved data as desired
        echo '<a href="#">' . $row["name"] . $count . '</a> ';
        echo '<a href="#">' . $row["phone"] . $count . '</a> ';
        echo '<a href="#">' . $row["date"] . $count . '</a> ';
        echo '<a href="#">' . $row["location"] . $count . '</a> ';
        echo '<a href="#">' . $row["incident"] . $count . '</a> ';
        echo "<br>";
        
        $count++;
    }
} 

// Step 5: Close the database connection
mysqli_close($conn);

?>
</body>
</html>
