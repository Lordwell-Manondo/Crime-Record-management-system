<!DOCTYPE html>
<html>
<head>
   
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: white;
        }

        h2 {
            color: black;
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
            color: black;
        }

        .update-button {
            background-color: blue;
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
    <nav class="navbar navbar-expand-lg " style="background-color: rgb(0, 109, 139);;">
    <div class="log">
        <img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
    </div>
    <div>
        <h1 style="color: white; text-align: center; ">Website Guidelines</h1>
    </div>
</nav>
    
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../login/login.css">

    
  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg " style="background-color: rgb(0, 109, 139);;">
    <div class="log">
      <img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
      <h3>ADDING NEWS</h3>
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

    // Retrieve guidelines from the database
    $sql = "SELECT * FROM guidelines";
    $result = mysqli_query($conn, $sql);

    // Check if there are any guidelines
    if (mysqli_num_rows($result) > 0) {
       
        echo "<div class='guidelines'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='guideline'>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['content'] . "</p>";
            echo "<form method='GET' action='update-guidelines.php'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<input type='submit' class='update-button' value='Update'>";
            echo "</form>";
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
