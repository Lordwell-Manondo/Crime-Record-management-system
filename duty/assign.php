<?php
session_start();
include('../db/Connections.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    // Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $serial_no = $_POST['serial_no'];
    $service_no= $_POST['service_no'];
   
    $date_to_report = $_POST['date_to_report'];
   
 // Prepare SQL query
 $sql = "INSERT INTO duty (serial_no, service_no, date_to_report)
 VALUES ('$serial_no', '$service_no', '$date_to_report')";

// Execute SQL query
(mysqli_query($conn, $sql)) ;
}
// Retrieve data from the database
$id = $_GET['id'];
$sql = "SELECT * FROM cases WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$cases="";
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
  $officers.="<option value='".$row['service_no']."'>".$row['service_no']." (" . $row['first_name'] .' '.$row['last_name'] . ")</option>";
    
}


// Close database connection
mysqli_close($conn);
}

// Success message
// $
// } message = "<div style='width: 20%; background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-left: 42%;'>Duty assigned successfully</div>";
// $refreshTime = 5;
// // Generate the meta tag with the refresh time
// $metaTag = "<meta http-equiv='refresh' content='$refreshTime'>";

// // Output the meta tag
// echo $metaTag;


// else {
// // Error message
// $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Failed to assign duty: " . mysqli_error($conn) . "</div>";
// }




?>
<!DOCTYPE html>
<html>
<head>
    <title>Assign duty</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<h2>Duty Assignment</h2>
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

                <div class="form-group">
                <label for="date">Date to report:</label>
                <input type="date" class="form-control" id="date_to_report" name="date_to_report" min="<?php echo date('Y-m-d'); ?>">
            </div>

 <button type="submit" name="submit" class="btn btn-primary">Assign</button>
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
        h2{
            text-align: center;
        }
        
        </style>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>


</html>




