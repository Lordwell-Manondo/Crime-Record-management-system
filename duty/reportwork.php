<?php
session_start();
include('../db/Connections.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // rest of your code


// Retrieve data from the database
$id = $_GET['id'];
$sql = "SELECT * FROM duty WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Check if $row is not null before trying to access its indices
if (isset($row)) {
    // Populate the input fields with the retrieved data
    $case_id = $row['$case_id'];
    $date = $row['date'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Report Findings</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>


  
  <!-- Header -->
  <header>
      <!-- Header content -->
      <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " style="background-color: black;">
      <div class="log">
          <img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-left: 0px; margin-top: 0px;">
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
             
                 
          <span class="heading">Update case</span>
        </div>

        <li class="nav-item dropdown">
                    <a  class="nav-link" href="#"  id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 150px;">
                        <i class="fas fa-user" style="font-size: 25px;  color: darkgray;"></i>
                        <i class="fas fa-angle-down" style=" color: white; font-size: small; font-weight: 550; transition: transform 0.3s;"></i>

                    </a>
                    <!-- submenu for profile -->
                    <ul class="dropdown-menu" aria-labelledby="submenu">
                    <li><a class="dropdown-item" style=" font-size: 20px%; color: white;" href="../home/home.php">Logout</a></li>
                    </ul>
                    </li>
     </nav>
  </header>

    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="suspect">Case ID:</label>
                <input type="text" class="form-control" id="suspect" name="suspect" value="<?php echo $case_id ?? ''; ?>">
            </div>
        
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo $date ?? ''; ?>">
            </div>

            <div class="form-group">
                
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <style>
         form{
            width: 80%;
            margin-left: 10%;
            margin-top: 10px;
         }
        label{
            font-size: 20px;
        }
        .heading{
            
            color: white;
            margin-right: 400px;
            font-size: 25px;
        }
        </style>
        

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>


<?php
// Update the data in the database
if (isset($_POST['submit'])) {
    $suspect = $_POST['suspect'];
    $victim = $_POST['victim'];
    $incident = $_POST['incident'];
    $location = $_POST['location']; 
    $date = $_POST['date']; 
    $type = $_POST['type']; 
    $status = $_POST['status'];
    $sql = "UPDATE cases SET suspect_name='$suspect', victim_name='$victim', incident='$incident', location='$location', date='$date', type='$type', status='$status' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: case_updated_message.php");
        
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
}
}
else{
    echo'no data found';
}
// Close database connection
mysqli_close($conn);
?> 
