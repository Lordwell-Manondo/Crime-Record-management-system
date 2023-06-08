<?php
//linking up Record_case.php file with database using Connections.php file
include('../db/Connections.php');

// Create a new instance of the Connection class
$connection = new Connection();
    
// Call the connect() method to establish a database connection
$conn = $connection->connect();

// Initialize an empty array to store the categories
$caseCategories = [];
$caseLocations=[];

  // Initialize an empty array to store the category counts
  $categoryCounts = [];
  $locationCounts =[];
  
  
  $totalCases = 0;
  $maxCategoryCount = 0;
  $maxCategory = '';
  $totalCount=0;
  $totalLocationCount=0;
    $sql = "SELECT *, COUNT(*) AS count FROM cases GROUP BY type ORDER BY count DESC";
  //$sql = "SELECT * FROM cases GROUP BY serial_no";
  $result = mysqli_query($conn, $sql);
  
  if (!$result) {
      die("Query failed: " . mysqli_error($conn));
  }
  if (mysqli_num_rows($result) > 0) {
      // Display the heading for case types and their counts
      echo "<table>";
      echo "<tr>";
      echo "<th>Case category</th>";
      echo "<div>"; 
      echo "<th>Recorded</th>";
      echo "<div>";
      echo "</div>";
       //echo "<th>Location</th>";
     // echo "<th>Status</th>";
      echo "</tr>";
          
          while ($row = mysqli_fetch_assoc($result)) {
          // Display the data
          echo "<tr>";
          echo "<td>" . $row['type'] . "</td>";
          
          echo "<td>" . $row['count'] . "</td>";
        //  echo "<td>" . $row['location'] . "</td>";
         // echo "<td>" . $row['status'] . "</td>";
          echo "</tr>";
  
          // Increment the total cases count
          $totalCases += $row['count'];
  
          $maxCategoryCount;
  
       }
      }else{
          echo"No data available";
       }

       // retrieving cases data
//$sql = "SELECT *, COUNT(*) AS count FROM cases GROUP BY type";

$sql = "SELECT * FROM cases ORDER BY date";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
if (mysqli_num_rows($result) > 0) {
    
        while ($row = mysqli_fetch_assoc($result)) {
        
            $category = $row['type'];
        $area = $row['location'];

        if (!in_array($category, $caseCategories)) {
            $caseCategories[] = $category;
        }
        if (!in_array($area, $caseLocations)) {
            $caseLocations[] = $category;
        }

        // Count the occurrences of each category
        if (isset($categoryCounts[$category])) {
            // If the category exists, increment the count
            $categoryCounts[$category]++;
            //total count of categories
            $totalCategoryCount = array_sum($categoryCounts); 
          
           } 
           if (isset($locationCounts[$area])) {
            // If the category exists, increment the count
            $locationCounts[$area]++;
            //total count of categories 
          $totalLocationCount = array_sum($locationCounts);
          
           }

           
        else {
            // If the category doesn't exist, initialize the count to 1
            $categoryCounts[$category] = 1;
            $locationCounts[$area] = 1;
        }
    }
    
          
// Find the category with the maximum count
  $maxCategoryCount = max($categoryCounts);
  $maxCategory = array_search($maxCategoryCount, $categoryCounts);

  // Find the location with the maximum count
$maxLocationCount = max($locationCounts);
$maxLocation = array_search($maxLocationCount, $locationCounts);


}
else {
    echo "<div>No cases available</div>";
}
        
     ?>
       

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cases statistics</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background-color: rgb(0, 109, 139);
            /* margin-bottom: 15%; */
          
            
        }
        
        a {
            padding: 10%;
            font-size: 20px;
            margin-right: 70px;
            font-weight: 400;
            color: white;
            text-decoration: none;
            display: flex;
        }
         .heading {
            color: khaki;
            font-weight: 500;
            font-size: 150%;
            margin-left: 40%;
            font-family: normal;
        }
       
 h4 {
            color: white;
            font-weight: 300;
            text-align: center;
            margin-top: -180px;
        }
        
        a:hover {
            font-weight: 300;
            color: aliceblue;
            text-decoration: none;
        }
        
        i {
            color: gray;
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
        .dropdown-menu{
            background-color: transparent;
            width: 90px;
        }
        
        @media (max-width: 576px) {
            .contact {
                text-align: center;
                margin-left: 0;
            }
        }
        @media (max-width: 576px) {
            h1 {
                font-size: 24px;
            }
            
            h4 {
                font-size: 14px;
            }
        }
        table {
      width: 60%;
      border-collapse: collapse;
      margin-bottom: 20px;
      height: 10%;
      margin-left: 25%;
    }
    
    th, td{
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    th{
      background-color: khaki;
      font-weight: bold;
      color: gray;
    }
    
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    tr:nth-child(odd) {
      background-color: #f9f9f9;
    }
    
    tr:hover {
      background-color: #e2e2e2;
    }
    li{
          list-style: none;
         
        }
        
</style>
</head>
<body>
   <!-- Main content -->
<div class="content">
  
  <!-- Header -->
  <header>
      <!-- Header content -->
      <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <li><span class="totalcases" style="color: white; font-size: 18px; color: khaki;">Total cases:    </span></li>
    <li><span class="total" style="color: white; margin-left: 10px; font-size: 18px; color: khaki;" ><?php echo "   ". $totalCases; ?> </span></li>
      
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
          </li>
                  <li class="nav-item">
                  <a class="nav-link" style="color: white;" href="cases_bargraph.php">Bar chart</a>
                  </li>
              <li class="nav-item dropdown">
                  <a class="nav-link" style="color: white;" href="../news/News.php" id="linearGraph" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Linear graph</a>
                
                  </li>
                  <li class="nav-item dropdown">
                  <a  class="nav-link" style="color: white;" href="#"  id="pieChart" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pie chart</a>
                  
                  </ul>
                  </div>
                  </nav>
  </header>
  <!-- Page content -->
  
 
  <title>case statistics</title>

</head>
<body>
  <span class="heading">CASES STATISTICAL DATA</span>
  <!-- <p style="margin-left: 80%;">Total recorded cases : <?php echo $totalCases; ?></p>
    <p style="margin-left: 80%;">Location : <?php echo $maxLocation." (" .$maxLocationCount.") "; ?></p> -->
<hr>  
<main>

  <!-- <table>
    <thead>
        <tr>
            <th>Location</th>
            <th>Total Cases</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody> -->
        <?php

        

    
// Call the connect() method to establish a database connection
$conn = $connection->connect();

        foreach ($locationCounts as $location => $count) {
            // Retrieve the case category for the current location
            $sql = "SELECT * FROM cases WHERE location = '$location' ";
            $result = mysqli_query($conn, $sql);
            $category = "";
            
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $category = $row['type'];
            }
        ?>
        <!-- <tr>
            <td><//?php echo $location; ?></td>
            <td><//?php echo $count; ?></td>
            <td><//?php echo $category; ?></td>
        </tr> -->
        <?php
        }
        mysqli_close($conn);

        ?>
    </tbody>
</table>

</main>
</div>
<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include Adminator JS -->
<script src="path/to/adminator.js"></script>
</body>
</html>
