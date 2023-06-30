<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <title>Add Website Guidelines</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
    font-family: Arial, sans-serif;
    padding: 20px;
    background-color: rgb(0, 109, 139);
}

h2 {
    color: khaki;
    text-align: center;
}

form {
    margin-top: 20px;
    text-align: center;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
textarea {
    width: 50%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

input[type="submit"] {
    background-color: blue;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
li{
    list-style: none;
}
label{
    font-size: 20px;
}

    </style>
    	<nav class="navbar navbar-expand-lg " style="background-color: rgb(0, 109, 139);;">
    <div class="log">
        <img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
    </div>
    <div>
        <h1 style="color: white; text-align: center; ">Add Website Guidelines</h1>
    </div>
</nav>
<body>
</head>
<body>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../login/login.css">

    
  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg " style="background-color: rgb(0, 109, 139);">
    <div class="log">
      <img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
      <h3>ADDING GUIDLINES</h3>
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
<body>
    <?php
   session_start();
   // include database connection file
   include("../db/Connections.php");

    // Function to add website guidelines to the database
    function addWebsiteGuidelines($title, $content)
    {
        global $conn;

        // Prepare the SQL statement
        $sql = "INSERT INTO guidelines (title, content) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind the parameters
        mysqli_stmt_bind_param($stmt, 'ss', $title, $content);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        // Check if the insertion was successful
        if ($result) {
            echo "Website guidelines added successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $content = $_POST["content"];

        // Add website guidelines
        addWebsiteGuidelines($title, $content);
    }
    ?>

    <h2>Add Website Guidelines</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
      <li>  <label for="title">Title:</label></li>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="5" cols="40" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
