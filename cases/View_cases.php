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


  <a href="../home/home.php" style="text-decolation: none; margin-left: 1250px; margin-top: 20px; color: black; font-size: 20px; font-weight: 100;">Logout</a>
  <a href="../home/admin_landing_page.php" style="text-decolation: none; margin-left: 50px; margin-top: 20px; color: white; font-size: 20px; font-weight: 100;">Back</a>

  <h1>RECORDED CASES</h1>

<form method="POST" action="View_cases.php" class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" placeholder="Search for case..." aria-label="Search" name="search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

</form>

<table class="cases-table">

<tr>
    <th style="width: 10%;">Serial No.</th> 
    <th style="width: 15%;">Suspect</th>
    <th style="width: 15%;">Victim</th>
    <th style="width: 40%;">Incident</th>
    <th style="width: 15%;">Location</th>
    <th style="width: 15%;">Date</th>
    <th style="width: 15%;">Type</th>
    <th style="width: 10%;">Status</th>
  </tr>
<?php
//linking up Record_case.php file with database using Connections.php file
include('../db/Connections.php');

// Define the number of records to display per page
$records_per_page = 7;

// Determine the current page number
if (!isset($_GET['page'])) {
  $current_page = 1;
} else {
  $current_page = $_GET['page'];
}

// Calculate the starting record number for the current page
$start_record = ($current_page - 1) * $records_per_page;

// Modify the SQL query to use the LIMIT clause
if (!empty($_POST['search'])) {
  $search = mysqli_real_escape_string($conn, $_POST['search']);
  $sql = "SELECT * FROM cases WHERE suspect_name LIKE '%$search%' OR victim_name LIKE '%$search%'  OR serial_no LIKE '%$search%' OR status LIKE '%$search%' OR type LIKE '%$search%' ORDER BY id DESC LIMIT $start_record, $records_per_page";
} else {
  $sql = "SELECT * FROM cases ORDER BY id DESC LIMIT $start_record, $records_per_page";
}

$result = mysqli_query($conn, $sql);

// Get the total number of records
if (!empty($_POST['search'])) {
  $search = mysqli_real_escape_string($conn, $_POST['search']);
  $sql = "SELECT COUNT(*) FROM cases WHERE suspect_name LIKE '%$search%' OR victim_name LIKE '%$search%'";
} else {
  $sql = "SELECT COUNT(*) FROM cases";
}
$total_records_result = mysqli_query($conn, $sql);
$total_records = mysqli_fetch_array($total_records_result)[0];

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// check if the data is available in the database
echo '<div class="data-container">';
if(mysqli_num_rows($result) <0){
  $message = "No case recorded.";
}
else if(mysqli_num_rows($result) >0) {


     // count the total number of rows in the table
     $sql = "SELECT COUNT(*) FROM cases";
    
     
  while ($row = mysqli_fetch_assoc($result)) {


    // display the data
    echo "<tr>";
    
    echo "<td>" . $row['serial_no'] . "</td>";
    echo "<td>" . $row['suspect_name'] . "</td>";
    echo "<td>" . $row['victim_name'] . "</td>";
    echo "<td>" . $row['incident'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo '<td >' . $row['status'] . '</td>';

   
   // edit the case
    echo "<td><a href='update_case.php?id=" . $row["id"] . "'style='color: white; background-color: #3663c9; text-decoration: none; border-radius: 10px; font-size: 15px; padding: 5px;'>Edit</a></td>";
    echo "</tr>";
  
  }
}
 else  {

  
$message = "No suspect, victim, serial or case type named:  ".$_POST['search'];
echo "<div style='color: white; padding: 10px; font-size: 30px; font-weight: 300;'>" . $message . "</div>";


}

// Display the navigation links
echo "<div class='pagination'>";
if ($current_page > 1) {
  echo "<a href='View_cases.php?page=".($current_page-1)."' style='color: white;'>Previous</a>";
}
for ($i = 1; $i <= $total_pages; $i++) {
  if ($i == $current_page) {
    echo "<a class='active' href='View_cases.php?page=".$i."'>".$i."</a>";
  } else {
    echo "<a href='View_cases.php?page=".$i."'>".$i."</a>";
  }
}
if ($current_page < $total_pages) {
  echo "<a  href='View_cases.php?page=".($current_page+1)."' style='color: white;'>Next</a>";
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


 

  