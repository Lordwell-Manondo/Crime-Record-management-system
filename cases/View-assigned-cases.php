<!DOCTYPE html>
<html>
<head>
  <title>Assigned cases</title>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <a href="../home/logout.php" style="text-decolation: none; margin-left: 1250px; margin-top: 20px; color: black; font-size: 20px; font-weight: 100;">Logout</a>
  <a href="../home/admin_landing_page.php" style="text-decolation: none; margin-left: 50px; margin-top: 20px; color: white; font-size: 20px; font-weight: 100;">Back</a>

  <h1>ASSIGNED CASES</h1>

  

<form method="POST" action="duty.php" class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" placeholder="Search of suspect..." aria-label="Search" name="search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>



</form>

<table class="cases-table">

<tr>
 
   <th style="width: 10%;">Case id</th> 
    <th style="width: 15%;">Employee Number</th>
    <th style="width: 15%;">Date Assigned</th>
    <th style="width: 40%;">Date to report</th>
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
  $sql = "SELECT * FROM duty WHERE case_id LIKE '%$search%' OR emp_number LIKE '%$search%'  OR date_assigned LIKE '%$search%' OR date_to_report LIKE '%$search%' ORDER BY id DESC LIMIT $start_record, $records_per_page";
} else {
  $sql = "SELECT * FROM duty ORDER BY id DESC LIMIT $start_record, $records_per_page";
}

$result = mysqli_query($conn, $sql);

// Get the total number of records
if (!empty($_POST['search'])) {
  $search = mysqli_real_escape_string($conn, $_POST['search']);
  $sql = "SELECT COUNT(*) FROM duty WHERE case_idLIKE '%$search%' OR emp_number LIKE '%$search%'";
} else {
  $sql = "SELECT COUNT(*) FROM duty";
}
$total_records_result = mysqli_query($conn, $sql);
$total_records = mysqli_fetch_array($total_records_result)[0];

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// check if the data is available in the database
echo '<div class="data-container">';
 if(mysqli_num_rows($result) > 0) {
     // count the total number of rows in the table
     $sql = "SELECT COUNT(*) FROM duty";     
  while ($row = mysqli_fetch_assoc($result)) {
    // display the data
    echo "<tr>";
    
    echo "<td>" . $row['case_id'] . "</td>";
    echo "<td>" . $row['emp_number'] . "</td>";
    echo "<td>" . $row['date_assigned'] . "</td>";
    echo "<td>" . $row['date_to_report'] . "</td>";
   
    echo "</tr>";
  
  }
}
 
// Display the navigation links
echo "<div class='pagination'>";
if ($current_page > 1) {
  echo "<a href='View_cases.php?page=".($current_page-1)."' style='color: white;'>Previous</a>";
}
for ($i = 1; $i <= $total_pages; $i++) {
  if ($i == $current_page) {
    echo "<a class='active' href='View-assigned-cases.php?page=".$i."'>".$i."</a>";
  } else {
    echo "<a href='View-assigned-cases.php?page=".$i."'>".$i."</a>";
  }
}
if ($current_page < $total_pages) {
  echo "<a  href='View-assigned-cases.php?page=".($current_page+1)."' style='color: white;'>Next</a>";
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


 

  