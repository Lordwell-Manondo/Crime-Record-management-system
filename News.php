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
<h1>News and Events</h1>
<?php
//Retrieving data from database
// Connect to the database
include('Connections.php');

//SQL statement
$sql = "SELECT * FROM news";

// Step 3: Execute the SQL statement
$result = mysqli_query($conn, $sql);

// Step 4: Fetch the data

// check if the data is available in the database
echo '<div class="data-container">';
if (mysqli_num_rows($result) > 0) {
    // display the recorded cases of each row
    while ($row = mysqli_fetch_array($result)) {
        // Use the retrieved data as desired
    
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["type"] . "</p>";
        echo "<p>" . $row["date"] . "</p>";
        echo "<p>" . $row["description"] . "</p>";
        
        // convert the binary data from hexadecimal string
        //$binaryData = hex2bin(str_pad($row["file"], (strlen($row["file"]) + 1) & ~1, '0', STR_PAD_LEFT));
        
        // output the binary data as an image
        //if (ctype_xdigit($row["file"]) && strlen($row["file"]) % 2 == 0) {
         //   echo '<img src="data:image/jpeg;base64,' . base64_encode($binaryData) . '"/>';
        //} else {
           // echo 'Invalid file name';
       // }
        
          
if (!empty($row["file"]) && ctype_xdigit($row["file"]) && strlen($row["file"]) % 2 == 0) {
    // convert the binary data from hexadecimal string
    $binaryData = hex2bin(str_pad($row["file"], (strlen($row["file"]) + 1) & ~1, '0', STR_PAD_LEFT));
    // output the binary data as an image
    echo '<img src="data:image/jpeg;base64,' . base64_encode($binaryData) . '"/>';
} else {
    echo 'Invalid file name';
}

       
        echo "<hr>";
    }
} else {
    echo "No news available";
}

// Step 5: Close the database connection
mysqli_close($conn);
?>

</body>
</html>
