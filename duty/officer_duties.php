<?php 
session_start();
 if (!isset($_SESSION['emp_number'])) {
    header('location: ../login/Login-officer.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Recorded cases</title>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <a href="../home/officer.php" style="text-decolation: none; margin-left: 50px; margin-top: 20px; color: white; font-size: 20px; font-weight: 100;">Back</a>

  <h1 style="padding: 32px;">Assigned CASES</h1>

<table class="cases-table">

<tr>
   <th style="width: 10%;">Case ID</th> 
    <th style="width: 10%;">Date Assigned</th>
    <th style="width: 10%;">Date to Report</th>
    <th style="width: 10%;">Suspect Name</th>
    <th style="width: 10%;">Victim Name</th>
    <th style="width: 40%;">Incident</th>
    <th style="width: 20%;"></th>
  </tr>
<?php
//linking up Record_case.php file with database using Connections.php file
include('../db/Connections.php');

// Retrieve the list of cases from the database
$sql = "SELECT * FROM `duty` JOIN `cases` ON duty.case_id=cases.id JOIN officers ON officers.emp_number=duty.emp_number WHERE officers.emp_number = ". $_SESSION["emp_number"] . " ORDER BY date_assigned";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: ". $conn->error);
} 
// check if the data is available in the database
echo '<div class="data-container">';
if(mysqli_num_rows($result) <= 0){
  $message = "No cases assigned.";
}
else if(mysqli_num_rows($result) >0) {
     
  while ($row = mysqli_fetch_assoc($result)) {


    // display the data
    echo "<tr>";
    
    echo "<td>" . $row['case_id'] . "</td>";
    echo "<td>" . $row['date_assigned'] . "</td>";
    echo "<td>" . $row['date_to_report'] . "</td>";
    echo "<td>" . $row['suspect_name'] . "</td>";
    echo "<td>" . $row['victim_name'] . "</td>";
    echo "<td>" . $row['incident'] . "</td>";
   
   // edit the case
    echo "<td><a href='report_work.php?id=" . $row["id"] . "'style='color: white; background-color: #3663c9; text-decoration: none; width: 96px; border-radius: 10px; font-size: 15px; padding: 5px;'>Report Work</a></td>";
    echo "</tr>";
  
  }
}

mysqli_close($conn);
?>

</table>
<style>
      form{
        margin-left: 1000px;
      }
    .table-container {
    margin-top: 10px;
    
   
    }
   
    h1{  
        font-weight: 100;
        text-align: center;
        color: khaki; 
        margin-top: -30px; 
         
      
    }
    body{
        background-color:  rgb(0, 109, 139);
    }

   
  table {
   border-collapse: collapse;
   text-align: center;
   background-color: white;
   margin-top: -10px;
   margin-bottom: 20px;
   border-collapse: separate;
   border-spacing: 1 10px;
  width: 90%;
  margin-left: 5%;
   
   
  }
  td, th {
    border: 1px;
    padding: 10px;
  }
  
  td {
    background-color: white;
    text-align: left;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

    
  }
  td + td {
    margin-left: 10px;
  }
  /* Customize the first row (header row) */
table tr:first-child {
  background-color: #ddd;
  font-weight: bold;
  font-size: 18px;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

/* Customize a specific row by its class */
table .highlighted-row {
  background-color: yellow;
  font-weight: bold;
}

tr:hover {
  
  font-weight: bold;
  font-size: 15px;
  margin-left: 70%;
   
    
  }
h3{
    margin-left: 3%;
}

  /* Add custom styles for the table rows */
  table .cases-table tbody tr {
    background-color: #f8f9fa; /* Set a background color for the table rows */
  }

  table .cases-table tbody tr:hover {
    background-color: #e9ecef; /* Change the background color on hover */
    font-weight: bold; /* Make the text bold on hover */
  }

  table .cases-table tbody tr td {
    padding: 10px; /* Add padding to the table cells */
    vertical-align: middle; /* Center the content vertically */
  }

  table .cases-table tbody tr:first-child {
    background-color: #dee2e6; /* Customize the header row background color */
    font-weight: bold;
  }

  

  </style>
</body>
</html>