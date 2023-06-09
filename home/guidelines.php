<!DOCTYPE html>
<html>
<head>
    <title>Website Guidelines</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: rgb(0, 109, 139);
        }

        h2 {
            color: khaki;
            margin-bottom: 20px;
        }

        .guidelines {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .guideline {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
        }

        .guideline h3 {
            margin: 0 0 10px;
            color: black;
        }

        .guideline p {
            margin: 0;
            color: white;
        }

        .update-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-transform: uppercase;
        }

        .update-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
  session_start();
  // include database connection file
  include("../db/Connections.php");
    // Retrieve guidelines from the database
    $sql = "SELECT * FROM guidelines";
    $result = mysqli_query($conn, $sql);

    // Check if there are any guidelines
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Website Guidelines</h2>";
        echo "<div class='guidelines'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='guideline'>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['content'] . "</p>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>No guidelines found.</p>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
