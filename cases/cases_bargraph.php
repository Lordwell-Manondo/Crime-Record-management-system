<?php

// connect to database
session_start();
include('../db/Connections.php');

// Create a new instance of the Connection class
$connection = new Connection();

// Call the connect() method to establish a database connection
$conn = $connection->connect();

$sql = "SELECT type FROM cases";

$result = mysqli_query($conn, $sql);

// Initialize an empty array to store the categories
$caseCategories = [];

// Initialize an empty array to store the category counts
$categoryCounts = [];

// Check if the data is available in the database
if (mysqli_num_rows($result) > 0) {
  // Loop through the results and add each category to the array
  while ($row = mysqli_fetch_assoc($result)) {
      $category = $row['type'];

      if (!in_array($category, $caseCategories)) {
          $caseCategories[] = $category;
      }
      
      // Count the occurrences of each category
      if (isset($categoryCounts[$category])) {
          // If the category exists, increment the count
          $categoryCounts[$category]++;
      } else {
          // If the category doesn't exist, initialize the count to 1
          $categoryCounts[$category] = 1;
      }
  }
} else {
  echo "0 results";
}

// Print the category counts
//foreach ($categoryCounts as $category => $count) {
 
  //echo $category . ": " . $count . "<br>";

 //$totalCount = array_sum($categoryCounts); // Calculate the total count of all categories
 
  // $count = $categoryCounts[$category];
   //$percentage = round(($count / $totalCount) * 100, 2); // Calculate the percentage
   //echo "". $percentage ."";
   //echo "" . $category . "     " . $count ."      ". $percentage . "% " ."<br>";
 

//}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>cases bar chart</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    //creating a function for drawing the bar chart
    function drawChart() {
      //defining and initializing variable categories and countValues and give them the values of categories and number of 
      //categories respectively
  var categories = <?php echo json_encode($caseCategories); ?>;
  var countValues = <?php echo json_encode(array_values($categoryCounts)); ?>;

  var data = new google.visualization.arrayToDataTable([
    ['CATEGORY', { role: 'annotation' }," "],
    <?php
    
    // Calculate the total count of all categories
    $totalCount = array_sum($categoryCounts); 
    
    foreach ($caseCategories as $category) {
      $count = $categoryCounts[$category];
      $percentage = round(($count / $totalCount) * 100, 2); // Calculate the percentage
     //display the category bar with its percentage
      echo "['" . $category . "', " . $percentage . ", {v: '" . $percentage . "%', f: ' $percentage '}],";
    }
    ?>
  ]);

  var options = {
    chart: {
      title: 'Bar chart showing the recorded cases in Malawi',
      data : 'in',
      bar: ''
     
      
    },

    titleTextStyle: {
    color: 'gray',
    fontSize: 30,
    marginLeft: 30,
    bold: true
    
    
    
    
  },
    annotations: {
      textStyle: {
        fontSize: 12,
        },
   },
   bar: { groupWidth: '60%',
        color: 'red',
      
      }
  };

  var chart = new google.charts.Bar(document.getElementById('chart_div'));
  chart.draw(data, google.charts.Bar.convertOptions(options));

}


  </script>
</head>
<body>
   
   </style>
  <div id="chart_div" style="width: 100%; height: 500px; "></div>
</body>
</html>