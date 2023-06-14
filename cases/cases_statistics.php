<?php

$sqlCaseTypes = "SELECT type, COUNT(*) as count FROM cases GROUP BY type ORDER BY count DESC";
$resultCaseTypes = mysqli_query($conn, $sqlCaseTypes);



while ($rowCaseTypes = mysqli_fetch_assoc($resultCaseTypes)) {
   $caseTyp= $rowCaseTypes['type'];
   $caseCount= $rowCaseTypes['count'];
}



//linking up Record_case.php file with database using Connections.php file
// include('../db/Connections.php');

// // Create a new instance of the Connection class
// $connection = new Connection();
    
// // Call the connect() method to establish a database connection
// $conn = $connection->connect();

// Initialize an empty array to store the categories
// $caseCategories = [];
// $caseLocations=[];

//   // Initialize an empty array to store the category counts
//   $categoryCounts = [];
//   $locationCounts =[];
  
  
//   $totalCases = 0;
//   $maxCategoryCount = 0;
//   $maxCategory = '';
//   $totalCount=0;
//   $totalLocationCount=0;
//     $sql = "SELECT *, COUNT(*) AS count FROM cases GROUP BY type ORDER BY count DESC";
//   //$sql = "SELECT * FROM cases GROUP BY serial_no";
//   $result = mysqli_query($conn, $sql);
  
//   if (!$result) {
//       die("Query failed: " . mysqli_error($conn));
//   }
//   if (mysqli_num_rows($result) > 0) {
//       // Display the heading for case types and their counts
     
          
//           while ($row = mysqli_fetch_assoc($result)) {
//           // Display the data
         
//            $row['type'] ;
          
//           $row['count'];
        
  
//           // Increment the total cases count
//           $totalCases += $row['count'];
  
//           $maxCategoryCount;
  
//        }
//       }else{
//           echo"No data available";
//        }

//        // retrieving cases data
// //$sql = "SELECT *, COUNT(*) AS count FROM cases GROUP BY type";

// $sql = "SELECT * FROM cases ORDER BY date";
// $result = mysqli_query($conn, $sql);

// if (!$result) {
//     die("Query failed: " . mysqli_error($conn));
// }
// if (mysqli_num_rows($result) > 0) {
    
//         while ($row = mysqli_fetch_assoc($result)) {
        
//             $category = $row['type'];
//         $area = $row['location'];

//         if (!in_array($category, $caseCategories)) {
//             $caseCategories[] = $category;
//         }
        

//         // Count the occurrences of each category
//         if (isset($categoryCounts[$category])) {
//             // If the category exists, increment the count
//             $categoryCounts[$category]++;
//             //total count of categories
//             $totalCategoryCount = array_sum($categoryCounts); 
          
//            } 
//            else {
//             $categoryCounts[$category] = 1;
//            }


//            if (!in_array($area, $caseLocations)) {
//             $caseLocations[] = $area;
//         }
//            if (isset($locationCounts[$area])) {
//             // If the category exists, increment the count
//             $locationCounts[$area]++;
//             //total count of categories 
//           $totalLocationCount = array_sum($locationCounts);
          
//            }

           
//         else {
//             // If the category doesn't exist, initialize the count to 1
    
//             $locationCounts[$area] = 1;
//         }
//     }
    
          
// // Find the category with the maximum count
//   $maxCategoryCount = max($categoryCounts);
//   $maxCategory = array_search($maxCategoryCount, $categoryCounts);

//   // Find the location with the maximum count
// $maxLocationCount = max($locationCounts);
// $maxLocation = array_search($maxLocationCount, $locationCounts);


// echo $category;


// }
// else {
//     echo "<div>No cases available</div>";
// }
        

    
// // Call the connect() method to establish a database connection
// $conn = $connection->connect();

//         foreach ($locationCounts as $location => $count) {
//             // Retrieve the case category for the current location
//             $sql = "SELECT * FROM cases WHERE location = '$location' ";
//             $result = mysqli_query($conn, $sql);
//             $category = "";
            
//             if ($result && mysqli_num_rows($result) > 0) {
//                 $row = mysqli_fetch_assoc($result);
//                 $category = $row['type'];
//             }
        
       
//         }
        mysqli_close($conn);

        ?>
    
