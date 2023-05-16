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


 
  <h2 style="color: khaki; font-weight: 300; margin-top: 20px"> Recorded cases</h2>

  

<form method="POST" action="View_cases.php" class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" placeholder="Search of suspect..." aria-label="Search" name="search">
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
include('Connections.php');

// Define the number of records to display per page
$records_per_page = 10;

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
// check if the data is available in the database
echo '<div class="data-container">';
if (mysqli_num_rows($result) >0) {


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
    echo '<td style="background-color: green; color: white; padding: 5px;">' . $row['status'] . '</td>';

   
   // edit the case
    echo "<td><a href='update_case.php?id=" . $row["id"] . "' style='background-color: blue; text-decoration: none; border-radius: 5px, width: 30px, height: 12px; color: white; font-size: 20px;'>Edit</a></td>";
  
    
    echo "</tr>";
  
  }
} else {

  
$message = "Currently there is no suspect or victim named "  .$_POST['search']; ;
echo "<div style='color: white; padding: 10px; font-size: 30px; font-weight: 300;'>" . $message . "</div>";


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
        background-color: gray;
        text-align: center;
        color: white;
        border-radius: 3px;
        margin-top: 0%;
    }
    h2{
        text-align: center;
    }
    body{
        background-color:  rgb(0, 109, 139);
    }

   
  table {
   margin-left: 50px;
   margin-right: 20px;
   border-collapse: collapse;
   text-align: center;
   background-color: white;
   margin-top: 20px;
   margin-bottom: 20px;
   border-collapse: separate;
   border-spacing: 1 10px;
  width: 1200px;
   
   
  }
  td, th {
    border: 1px solid black;
    padding: 10px;
  }
  th {
    background-color: khaki;
  
    
  }
  td {
    background-color: white;
    text-align: left;
  }
  td + td {
    margin-left: 10px;
  }
  tr:nth-child(even) {
  background-color: #f2f2f2;
  
}
tr {
  border-bottom: 1px solid #ddd;

}
tr:hover {
  color: green;
  font-weight: 400;
  font-size: 18px;
}
  .searchbar{
    margin-left: 70%;
    
  }
h3{
    margin-left: 3%;
}

  </style>
</body>
</html>


 

  