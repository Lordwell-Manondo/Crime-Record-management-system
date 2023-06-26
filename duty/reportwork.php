<?php
session_start();
// include database connection file
include("../db/Connections.php");


$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get form data
    // check that POST data is not empty
    $is_valid = true;
    if (empty($_POST['serial_no']) || empty($_POST['service_no']) || empty($_POST['date_to_report'])) {
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Please fill all fields.</div>";
        //echo $_POST['case_id'] . " ". $_POST['service_no'] . " " . $_POST['date_to_report'];
        $is_valid = false;
    }
    $serial_no = $_POST['serial_no'];
    $service_no = $_POST['service_no'];
    $date_to_report = $_POST['date_to_report'];

    // Check that the id and officer_id are valid integers
    if (!is_string($service_no)) {
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Invalid input data. Please try again.</div>";
        $is_valid = false;
    }
    
    // Check that the date_to_report is a valid date
    if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $date_to_report)) {
        // Error message
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Invalid date format. Please enter a date in the format YYYY-MM-DD.</div>";
        $is_valid = false;
    }

    if ($is_valid) {
        // Prepare SQL query
        $sql = "INSERT INTO duty (serial_no, service_no, date_to_report)
            VALUES ('$serial_no', '$service_no', '$date_to_report')";

        // Execute SQL query
        if (mysqli_query($conn, $sql)) {
        // Success message
        $message = "<div style='width: 20%; background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-left: 42%;'>Duty assigned successfully</div>";
        $refreshTime = 5;
         // Generate the meta tag with the refresh time
         $metaTag = "<meta http-equiv='refresh' content='$refreshTime'>";

         // Output the meta tag
         echo $metaTag;
        
      } 
      
      else {
        // Error message
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>Failed to assign duty: " . mysqli_error($conn) . "</div>";
        }
    }
}

// Retrieve the available case serial numbers from the database
$sql = "SELECT * FROM `cases` WHERE status='Open' ORDER BY id";
$result = mysqli_query($conn, $sql);
$cases = "";
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $cases.="<option value='" . $row['serial_no'] . "'>" . $row['serial_no'] ." (". $row['incident'] . ")</option>";
  }
}

// Retrieve the available officer IDs from the database
$sql = "SELECT * FROM `officers` ORDER BY `first_name`";
$result = mysqli_query($conn, $sql);
$officers = "";
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $officers.="<option value='".$row['service_no']."'>".$row['service_no']." (" . $row['first_name'] .' '.$row['last_name'] . ")</option>";
  }
}

// Close MySQL connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Duty Assignment</title>

</head>
<body>
  <h2>Duty Assignment</h2>
  <?php echo $message; ?>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label for="serial_no">Select   case:</label>
    <select id="serial_no" name="serial_no">
      <?php echo $cases; ?>                                         
    </select>
    <br><br>
    <label for="service_no">Select officer:</label>
    <select id="service_no" name="service_no"> 
      <?php echo $officers; ?>                                     
    </select>
    <br><br>
    <label for="date_to_report">Date to report:</label> 
    <input type="date" id="date_to_report" name="date_to_report" style="width: 95%;"  min="<?php echo date('Y-m-d'); ?>">
    <br><br>
    <input type="submit" value="Assign">
  </form>
 
  <style>
    body {
      background-color: rgb(0, 109, 139);
      color: white;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
    }

    form {
      max-width: 500px;
      margin: 0 auto;
      background-color: whitesmoke;
      padding: 20px;
      border-radius: 5px;
      height: 450px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: black;
    }

    select, input[type="date"], input[type="submit"] {
      width: 100%;
      height: 10%;
      padding: 10px;
      margin-bottom: 25px;
      border: green;
      border-radius: 5px;
      font-size: 20px;

    }

    input[type="submit"] {
      background-color: #007bff;
      color: white;
      cursor: pointer;
      border-radius: 8px;
      height: 8%;
      width: 20%;
      margin-left: 40%;
      font-size: 20px;
      font-weight: 100;
      padding: 5px;
      margin-top: 25px;
      
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .message {
      background-color: #f8d7da;
      color: #721c24;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 3px;
    }
   select, input[type="date"] {
      color: gray;
    }
    select{
      background-color: white;
    }
   
  </style>

<script>
    // JavaScript code to hide the success message after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
      var successMessage = document.getElementById('success-message');
      if (successMessage) {
        setTimeout(function() {
          successMessage.style.display = 'none';
        }, 5000); // Hide after 5 seconds (5000 milliseconds)
      }
    });
  </script>

</body>
</html>

