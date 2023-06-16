<?php
session_start();
include('../db/Connections.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $service_no='';
    $officers='';
// Retrieve data from the database
$id = $_GET['id'];
$sql = "SELECT * FROM cases WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$cases="";
// Check if $row is not null before trying to access its indices
if (isset($row)) {
    // Populate the input fields with the retrieved data
    $case = $row['serial_no'];
   
    
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
  
  $first_name= $row['first_name'];
  $last_name = $row['last_name'];
  $officers.="<option value='".$row['service_no']."'>".$row['service_no']." (" . $row['first_name'] .' '.$row['last_name'] . ")</option>";
    
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $service_no = $_POST['service_no'];
    $date_to_report = $_POST['date_to_report'];

    // send the duty details into the database
    $sql = "INSERT INTO duty (serial_no, service_no, date_to_report)
            VALUES ('$case', '$service_no', '$date_to_report')";

    // Execute/saving the details
    mysqli_query($conn, $sql);

    //success message
    $message = "<div style='width: 20%; background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-left: 42%;'>Duty assigned successfully</div>";
}
// Close database connection
mysqli_close($conn);
}

// Success message
// $
// } 
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
    <input type="text" class="form-control" id="serial_no" name="serial_no" value="<?php echo $case; ?>" required>
</div>

<div class="form-group">
    <label for="service_no">Officer:</label>
    <select type="text" class="form-control" id="service_no" name="service_no" required>
        <?php echo $officers; ?>
    </select>
</div>

                <div class="form-group">
                <label for="date">Date to report:</label>
                <input type="date" class="form-control" id="date_to_report" name="date_to_report" min="<?php echo date('Y-m-d'); ?>" required>
            </div>

 <button type="submit" name="submit" class="btn btn-primary">Assign</button>
        </form>
    </div>
    <style>
        
        form{
            background-color: white;
            height: 400px;
            width: 600px;
        } 
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




