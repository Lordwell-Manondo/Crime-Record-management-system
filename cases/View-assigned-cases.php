<!DOCTYPE html>
<html>
<head>
  <title>Assigned cases</title>
</head>
<body>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <!-- Include Bootstrap JS -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
        </script>

<nav class="navbar navbar-expand-lg" style="background-color: black;">
<div class="log">
          <img src="policeLog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-left: 0px; margin-top: 0px;">
      </div>
<span class="recordedcases">ASSIGNED CASES</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
  </button>
 
  <form method="POST" action="View-assigned-cases.php" class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="text" id="myInput" placeholder="Search for case..." aria-label="Search" name="search">
  <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color: white; background:green;">Search</button> -->
</form>
<li class="nav-item dropdown">
                    <a  class="nav-link" href="#"  id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user" style="font-size: 25px; margin-left: 90px; color: darkgray;"></i>
                        <i class="fas fa-angle-down" style="margin-left: 5px; color: white; font-size: small; font-weight: 550; transition: transform 0.3s;"></i>

                    </a>
                    <!-- submenu for profile -->
                    <ul class="dropdown-menu" aria-labelledby="submenu">
                    <li><a class="dropdown-item" style=" font-size: 100%;" href="../home/home.php">Logout</a></li>
                    </ul>
                    </li>
    </nav>


<table class="cases-table">

<tr>
    <th>Serial No.</th> 
    <th>Service No</th>
    <th>Date Assigned</th>
    <th>Date to Report</th>
    <th>Status</th>
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
  $sql = "SELECT * FROM duty WHERE serial_no LIKE '%$search%' OR service_no LIKE '%$search%' OR date_assigned LIKE '%$search%' OR date_to_report LIKE '%$search%' ORDER BY date_assigned DESC LIMIT $start_record, $records_per_page";
} else {
  $sql = "SELECT * FROM duty ORDER BY date_assigned DESC LIMIT $start_record, $records_per_page";
}

$result = mysqli_query($conn, $sql);

// Get the total number of records
if (!empty($_POST['search'])) {
  $search = mysqli_real_escape_string($conn, $_POST['search']);
  $sql = "SELECT COUNT(*) FROM duty WHERE serial_no LIKE '%$search%' OR service_no LIKE '%$search%'";
} else {
  $sql = "SELECT COUNT(*) FROM duty";
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
     $sql = "SELECT COUNT(*) FROM duty";
    
     
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tbody id="myTable">';

    // display the data
    echo "<tr>";
    
    echo "<td>" . $row['serial_no'] . "</td>";
    echo "<td>" . $row['service_no'] . "</td>";
    echo "<td>" . $row['date_assigned'] . "</td>";
    echo "<td>" . $row['date_to_report'] . "</td>";

   
  //  $statusColor = ($row['status'] == 'Investigating') ? 'red' : 'green';
   echo "<td><div class='case-status' style='color: white; background-color: red; padding: 5px; border-radius: 10px; font-weight: 700;'>". "</div>Investigating</td>";


   
   // edit the case
    echo "<td> <a href='View-assigned-cases.php'?id=" . $row["id"] . "'style='color: white; background-color: #3663c9; text-decoration: none; border-radius: 10px; font-size: 15px; padding: 5px;'>Edit</a></td>";
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
  echo "<a href='View-assigned-cases.php?page=".($current_page-1)."' style='color: white;'>Previous</a>";
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
        margin-left: 20%;
      }
    .table-container {
    margin-top: 10px;
    
   
    }
   
    .recordedcases{  
        font-weight: 100;
        margin-left: 25%;
        color: khaki;
        font-size: 20px;
        font-family: normal; 
        letter-spacing: 2px;
        word-spacing: 10px;
        
         
      
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
  
 @media (max-width: 500px) {
            .recordedcases {
                flex-direction: none;
            }
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

@media (max-width: 768px) {
  /* Apply responsive styles for screens up to 768px width */
  .cases-table {
    flex-direction: column;
  }

  form {
    flex-direction: column;
  }
}

@media (max-width: 500px) {
  /* Apply responsive styles for screens up to 500px width */
  span {
    flex-direction: none;
  }
}
@media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column;
            }
            .navbar-nav .nav-item {
                margin: 10px 0;
            }
            .navbar-toggler {
                margin-left: auto;
            }

        }

  td, th {
    border: 1px;
    padding: 10px;
    
  }
  th{
    color: khaki;
    font-size: 15px;
    background-color: black;
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
  color: black;   
  }
h3{
    margin-left: 3%;
}

  .fas .fa-angle-down:hover{
            font-weight: 100; 
        }
        
        i {
            color: gray;
        }
        .dropdown-menu{
            background-color: transparent; 
            
            margin-trim: none;
            width: 60px;
            }
         .dropdown-item{
            /* color: white; */
         } 
         .dropdown-item:hover{
          color: black;
         }
        li{
          list-style: none;
        }
 </style>
</body>
</html>