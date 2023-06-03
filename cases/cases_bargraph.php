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
$totalCount=0;
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
         //total count of categories 
          $totalCount = array_sum($categoryCounts);
      } else {
          // If the category doesn't exist, initialize the count to 1
          $categoryCounts[$category] = 1;
      }
      
      
  }

  // Find the category with the maximum count
  $maxCount = max($categoryCounts);
  $maxCategory = array_search($maxCount, $categoryCounts);

  // Set the color based on the category
  $color = ($maxCategory== true) ? 'red' : 'green';

} else {
  echo "0 results";
}

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

    // creating a function for drawing the bar chart
    function drawChart() {
      var categories = <?php echo json_encode($caseCategories); ?>;
      var countValues = <?php echo json_encode(array_values($categoryCounts)); ?>;
      var maxCategory = <?php echo json_encode($maxCategory); ?>;
      var maxCount = <?php echo $maxCount; ?>;

      var data = new google.visualization.arrayToDataTable([
        ['CATEGORY', 'percentage', { role: 'style' }],
        <?php
        foreach ($caseCategories as $category) {
          $count = $categoryCounts[$category];
          $percentage = (($count / $totalCount) * 100);

          // Set the color based on the category
         // $color = ($category === $maxCategory) ? 'pink' : 'green';

          $bargraph= "['" . $category . "(".$count.")"."',". $percentage . ", ''],";
          echo"".$bargraph;
          
        }
        ?>
      ]);

      var options = {
        chart: {
          title: 'Bar chart showing the recorded cases in Malawi',
          data: 'in',
        },
        titleTextStyle: {
          color: 'gray',
          fontSize: 30,
          marginLeft: 30,
          bold: true
        },
        bar: {
          groupWidth: '60%',
        },
        colors: ['<?php echo"".$color?>'], // Set the colors for green and red bars
        annotations: {
          textStyle: {
            fontSize: 12,
          }
        }
      };

      var chart = new google.charts.Bar(document.getElementById('chart_div'));
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>
</head>
<body>
  <style>
    body {
      background-color: rgb(0, 109, 139);
    }

  </style>
  <div id="chart_div" style="width: 98%; height: 550px; border-radius: 10%; margin-left: 1%;"></div> 
 
</body>
</html>
