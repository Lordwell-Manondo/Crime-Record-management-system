<?php
include('../db/Connections.php');

$category[]='';

$sql = "SELECT *, COUNT(*) AS count FROM cases GROUP BY type ORDER BY count DESC";
//$sql = "SELECT * FROM cases GROUP BY serial_no";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

else if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
        $cat = $row['type']. '<br>'.'<br>';

        
    }
    
}else{
    echo"No location available";
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

  <li>
    <a class="category" href="#" style="color: green; text-decoration: none; "> 
        <?php echo $cat;?>
    </a>
</li>  
</body>
</html>

