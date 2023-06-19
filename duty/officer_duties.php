<?php 
// session_start();


//  if (!isset($_SESSION['service_no'])) {
// //header('location: ../login/Login-officer.php');
// }
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Duties</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('../home/officer_session.php');?>
<header>
<nav class="navbar navbar-expand-lg" style="background-color: black;">
<div class="log">
          <img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-left: 0px; margin-top: 0px;">
      </div>
<span class="recordedcases">My Duties</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
 
      <form method="POST" action="officer_duties.php" class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" placeholder="Search for case..." aria-label="Search" name="search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color: white; background:green;">Search</button>
</form>
<li class="nav-item dropdown">
                    <a  class="nav-link" href="#"  id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user" style="font-size: 25px; margin-left: 90px; color: darkgray;"></i>
                        <?php echo $myname; ?>
                        <i class="fas fa-angle-down" style="margin-left: 5px; color: white; font-size: small; font-weight: 550; transition: transform 0.3s;"></i>

                    </a>
                    <!-- submenu for profile -->
                    <ul class="dropdown-menu" aria-labelledby="submenu">
                    <li><a class="dropdown-item" style=" font-size: 100%;" href="../home/home.php">Logout</a></li>
                    </ul>
                    </li>
    </nav>
</header>
<br>
<br>
<table class="cases-table">

<tr>
   <th style="text-size: 10px; ">Serial No</th> 
   <th style="text-size: 10px;">Suspect Name</th>
    <th style="text-size: 10px;">Victim Name</th>
    <th style="text-size: 10px;">Incident</th>
    <th style="text-size: 10px;">Date Assigned</th>
    <th style="text-size: 10px;">Date to Report</th>
    <th style="text-size: 10px;">Remaining Time</th>
  </tr>
<?php
//linking up Record_case.php file with database using Connections.php file
// include('../db/Connections.php');





// Retrieve the list of cases from the database
$sql = "SELECT * FROM `duty` JOIN `cases` ON duty.serial_no=cases.serial_no JOIN officers ON officers.service_no=duty.service_no WHERE officers.service_no = ". $_SESSION["service_no"] . " ORDER BY date_assigned";
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
 

    $targetDate = date_create($row['date_to_report']); // Convert the target date to a DateTime object
    $currentDate = new DateTime(); // Get the current date

    $interval = $currentDate->diff($targetDate); // Calculate the difference between current date and target date

    if ($interval->days > 0) {
        $remainingDays = $interval->days . " day(s)";
    } else {
        $remainingDays = $interval->h . " hour(s)";
    }


    // display the data
    echo "<tr>";
    
    echo "<td>" . $row['serial_no'] . "</td>";
    echo "<td>" . $row['suspect_name'] . "</td>";
    echo "<td>" . $row['victim_name'] . "</td>";
    echo "<td>" . $row['incident'] . "</td>";
    echo "<td>" . $row['date_assigned'] . "</td>";
    echo "<td>" . $row['date_to_report'] . "</td>";
    echo "<td><div class='case-status' style='width: fit-content;color: white; background-color: gray; padding: 5px; border-radius: 10px; font-weight: 600;'>" . $remainingDays . "</div></td>";

    
   // edit the case
    echo "<td><a href='officer_duties.php?id=" . $row["id"] . "'style='color: white; background-color: #3663c9; text-decoration: none; width: 96px; border-radius: 10px; font-size: 15px; padding: 5px;'>Report</a></td>";
    echo "</tr>";
  
  }
}

mysqli_close($conn);
?>

</table>
<style>
    .table-container {
    margin-top: 10px;
    
   
    }
   
    h1{  
      
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
   th {
    border: 1px;
    padding: 5px;
    color: black;
    font-weight: 450;
  }
  td{
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
  background-color: khaki;
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
  
  /* font-weight: 350; */
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
    font-weight: 0; /* Make the text bold on hover */
  }

  table .cases-table tbody tr td {
    padding: 10px; /* Add padding to the table cells */
    vertical-align: middle; /* Center the content vertically */
  }

  table .cases-table tbody tr:first-child {
    background-color: #dee2e6; /* Customize the header row background color */
    font-weight: bold;
  }

  form{
        margin-left: 20%;
      }
    .table-container {
    margin-top: 10px;
    
   
    }
   
    .recordedcases{  
        font-weight: 100;
        margin-left: 15%;
        color: white;
        font-size: 30px;
       
        letter-spacing: 2px;
        word-spacing: 10px;
        
    }
    .recordedcases:hover{
      font-weight: none;
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