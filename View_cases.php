<!DOCTYPE html>
<html>
<head>
  <title>Recorded cases</title>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


 
  <h2 style="color: khaki; font-weight: 300; margin-top: 20px"> Recorded cases</h2>

  

<form method="POST" action="View_cases.php" class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" placeholder="Search of suspect..." aria-label="Search" name="search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

 
</form>

<table>


<?php
//linking up Record_case.php file with database using Connections.php file
include('Connections.php');

// Check if the search input field is not empty
if (!empty($_POST['search'])) {
  $search = mysqli_real_escape_string($conn, $_POST['search']);
  $sql = "SELECT * FROM cases WHERE suspect_name LIKE '%$search%' OR victim_name LIKE '%$search%' OR serial_no LIKE  '%$search%'";
} else {
  $sql = "SELECT * FROM cases";


}

$result = mysqli_query($conn, $sql);

$suspects="";
// check if the data is available in the database
echo '<div class="data-container">';
if (mysqli_num_rows($result) > 0) {


     // count the total number of rows in the table
     $sql = "SELECT COUNT(*) FROM cases";
    
     
  // specify the number of rows to display per page
  $rows_per_page = 10;
  
  
  while ($row = mysqli_fetch_assoc($result)) {


    // display the data
    echo "<tr>";
    echo "<td>" . $row['suspect_name'] . "</td>";
    echo "<td>" . $row['victim_name'] . "</td>";
    echo "<td>" . $row['incident'] . "</td>";
    echo "<td>" . $row['serial_no'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
   

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
    margin-left: 20px;
    margin-right: 20px;
    border-collapse: collapse;
    text-align: center;
   background-color: white;
   margin-top: 20px;
   margin-bottom: 20px;
   
   
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
  .searchbar{
    margin-left: 70%;
    
  }
h3{
    margin-left: 3%;
}

  </style>

</body>
</html>


 

  