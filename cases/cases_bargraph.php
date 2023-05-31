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
foreach ($categoryCounts as $category => $count) {
  echo $category . ": " . $count . "<br>";
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html>
<head>
  <title>cases</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

 
    function drawChart() {
  var categories = <?php echo json_encode($caseCategories); ?>;
  var countValues = <?php echo json_encode(array_values($categoryCounts)); ?>;

  var data = new google.visualization.arrayToDataTable([
    ['Category', 'Value', { role: 'annotation' }],
    <?php
    $totalCount = array_sum($categoryCounts); // Calculate the total count of all categories
    
    foreach ($caseCategories as $category) {
      $count = $categoryCounts[$category];
      $percentage = round(($count / $totalCount) * 100, 2); // Calculate the percentage
      
      echo "['" . $category . "', " . $count . ", {v: '" . $percentage . "%', f: '<span style=\"color: red;\">" . $percentage . "%</span>'}],";
    }
    ?>
  ]);

  var options = {
    chart: {
      title: 'Bar Chart Title',
      subtitle: 'Bar Chart Subtitle',
    },
    annotations: {
      textStyle: {
        fontSize: 12,
        
        
         },

    },
  
      bar: { groupWidth: '20%'}
    
    
  };

  var chart = new google.charts.Bar(document.getElementById('chart_div'));
  chart.draw(data, google.charts.Bar.convertOptions(options));
}


  </script>
</head>
<body>
  <div id="chart_div" style="width: 100%; height: 500px; "></div>
</body>
</html>