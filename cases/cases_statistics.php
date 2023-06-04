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
  $maxCount = 0;
  $maxCategory = '';
  $totalCount=0;
  $locationTotalCount=0;
    $sql = "SELECT *, COUNT(*) AS count FROM cases GROUP BY type";
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
       ///echo "<th>Location</th>";
     // echo "<th>Status</th>";
      echo "</tr>";
          
          while ($row = mysqli_fetch_assoc($result)) {
          // Display the data
          echo "<tr>";
          echo "<td>" . $row['type'] . "</td>";
          
          echo "<td>" . $row['count'] . "</td>";
          // echo "<td>" . $row['location'] . "</td>";
         // echo "<td>" . $row['status'] . "</td>";
          echo "</tr>";
  
          // Increment the total cases count
          $totalCases += $row['count'];
  
          $maxCount;
  
          // $category = $row['type'];
  
          // if (!in_array($category, $caseCategories)) {
          //     $caseCategories[] = $category;
          // }
  
          // // Count the occurrences of each category
          // if (isset($categoryCounts[$category])) {
          //     // If the category exists, increment the count
          //     $categoryCounts[$category]++;
          //     //total count of categories 
          //   $totalCount = array_sum($categoryCounts);
          //    } 
  
          // else {
          //     // If the category doesn't exist, initialize the count to 1
          //     $categoryCounts[$category] = 0;
          // }
       }
      }else{
          echo"chamecho";
       }

       // retrieving cases data
//$sql = "SELECT *, COUNT(*) AS count FROM cases GROUP BY type";
$sql = "SELECT * FROM cases GROUP BY serial_no";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
if (mysqli_num_rows($result) > 0) {
    // Display the heading for case types and their counts
    // echo "<table>";
    // echo "<tr>";
    // echo "<th>Case Type</th>";
    // echo "<th>Recorded</th>";
    // echo "</tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
        // Display the data
    //     echo "<tr>";
    //     echo "<td>" . $row['type'] . "</td>";
        
    //    // echo "<td>" . $row['count'] . "</td>";
    //     echo "</tr>";

        // Increment the total cases count
       // $totalCases += $row['count'];

        $category = $row['type'];
        $area = $row['location'];

        if (!in_array($category, $caseCategories)) {
            $caseCategories[] = $category;
        }

        // Count the occurrences of each category
        if (isset($categoryCounts[$category])) {
            // If the category exists, increment the count
            $categoryCounts[$category]++;
            //total count of categories 
          $totalCount = array_sum($categoryCounts);
          
           } 

           
        else {
            // If the category doesn't exist, initialize the count to 1
            $categoryCounts[$category] = 1;
        }

       
       // Increment the location counts
if (isset($locationCounts[$area])) {
    // If the location exists, increment the count
    $locationCounts[$area]++;
    // Total count of locations
    $locationTotalCount = array_sum($locationCounts);
} else {
    // If the location doesn't exist, initialize the count to 1
    $locationCounts[$area] = 1;
}
        }
        $maxLocation = [];
// Find the location with the maximum count
$maxLocationCount = max($locationCounts);
$maxLocation = array_search($maxLocationCount, $locationCounts);

// //printing total recorded cases
// echo "Total recorded cases: " . $totalCount;
// echo "<br>";

//printing location recorded more
// echo $maxLocation . ": " . $maxLocationCount;
// echo "<br>";
     
$maxCaseCategories = [];
// Find the category with the maximum count
  $maxCount = max($categoryCounts);
  $maxCategory = array_search($maxCount, $categoryCounts);

//printing category with highest record
// echo "Case category with highest record: " . $maxCategory . " (" . $maxCount . ")";
// echo "</div>";
    }else {
        echo "<div>No cases available</div>";
    }
    mysqli_close($conn);

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
         h1 {
            color: khaki;
            font-weight: 300;
            margin-top: 200px;
            text-align: center;
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
      width: 50%;
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
      background-color: #f2f2f2;
      font-weight: bold;
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
    
  <table>
    <thead>
    <tr>
    <hr>
        <th>Category</th>
        <th>Value</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td>Total recorded cases</td>
        <td><?php echo $totalCount ?></td>
      </tr>
      <tr>
        <td>Case category with highest record</td>
        <td><?php echo $maxCategory."(".$maxCount.")" ?></td>
      </tr>
      <tr>
        <td>Area with more cases</td>
        <td><?php echo $maxLocation."(".$maxLocationCount.")" ?></td>
      </tr>
    
    </tbody>
  </table>
 
  <main>
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
