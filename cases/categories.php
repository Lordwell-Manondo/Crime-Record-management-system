<?php
include('../db/Connections.php');

$categoryCounts = array();

// Retrieve the case categories and their counts
$sql = "SELECT type, COUNT(*) AS count FROM cases GROUP BY type";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $categoryCounts[$row['type']] = $row['count'];
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
</head>
<body>
  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg " style="background-color: black;">
    <div class="log">
      <img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
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
  <span class="categories">Case categories</span>
  
  <?php
        // Output the category links
        foreach ($categoryCounts as $category => $count) {
            echo '<li style="margin-left: 5%; text-decoration: none; list-style: none;">';
            echo '<a class="category" href="#" style="color: white; text-decoration: none; font-size: 20px; font-weight: 200px;">';
            echo $category;
            echo "";
            echo '</a>';
            echo '</li>';
        }
        ?>
        <style>
          body{
            background-color: rgb(0, 109, 139);
          }
          .categories{
            color: white;
            font-size: 30px;
            font-weight: 300;
            margin-left: 5%;
          }
 

          
        </style>
</body>
</html>
