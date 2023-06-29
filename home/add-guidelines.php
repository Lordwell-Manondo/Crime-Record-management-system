<!DOCTYPE html>
<html>
<head>
    <title>Add Website Guidelines</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    padding: 20px;
    background-color: white;
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

   
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="title">Title:</label>
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
