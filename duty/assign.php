<?php
session_start();
include('../db/Connections.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // rest of your code


// Retrieve data from the database
$id = $_GET['id'];
$sql = "SELECT * FROM cases WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Check if $row is not null before trying to access its indices
if (isset($row)) {
    // Populate the input fields with the retrieved data
    
    $serial_no = $row['serial_no'];
    $incident = $row['incident'];
    
}}
else{
    echo'no case selected';
}

// Retrieve the available officer IDs from the database
$sql = "SELECT * FROM `officers` ORDER BY `first_name`";
$result = mysqli_query($conn, $sql);
$officers = "";
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
   
  
  
   // get officers from database 
  $service_no = $row['service_no'];
  $first_name= $row['first_name'];
  $last_name = $row['last_name'];
  $officers.= $row['service_no']." (" . $row['first_name'] .' '.$row['last_name'] . ")"  .'<br>';
  }
}
// Close database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Updating-case</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="serial_no">Case:</label>
                <input type="text" class="form-control" id="serial_no" name="serial_no" value="<?php echo $serial_no ."  (".$incident.")"?? ''; ?>">
            </div>

            <div class="form-group">
                <label for="serial_no">Officers:</label>
                <select  type="text" class="form-control" id="serial_no" name="serial_no">
                <option  value="<?php echo $service_no; ?>"><?php echo $officers; ?></option>
                </select>
            </div>



            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <style>
         
        label{
            font-size: 20px;
        }
        form{
            width: 70%;
            margin-left: 15%;
        }
        </style>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>




