<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Page</title>
    <style>
        body {
            background-color: rgb(0, 109, 139);
        }
        .data-container {
            margin: 20px;
            padding: 10px;
            background-color: #fff;
            color: #000;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<?php
//Retrieving data
// Connect to the database
include('Connections.php');

//SQL statement
$sql = "SELECT * FROM news";

// Step 3: Execute the SQL statement
$result = mysqli_query($con, $sql);

// Step 4: Fetch the data

// check if the data is available in the database
echo '<div class="data-container">';
if (mysqli_num_rows($result) > 0) {
    // display the recorded cases of each row
    while ($row = mysqli_fetch_array($result)) {
        // Use the retrieved data as desired
        echo $row["title"] . " " . $row["description"] . " " . $row["date"] .  "" . $row["type"] . $row["file"] . "<br>";
    }
} else {
    echo "No news available";
}

// Step 5: Close the database connection
mysqli_close($con);
?>

<h1>Hello</h1>

</body>
</html>
