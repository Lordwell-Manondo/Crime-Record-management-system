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
       // Find the category with the maximum count
$maxCount = max($categoryCounts);
$maxCategory = array_search($maxCount, $categoryCounts);
//get the max category
//echo "".$maxCategory.""  .$maxCount."";


} else {
  echo "0 results";
}

 //$totalCount = array_sum($categoryCounts); // Calculate the total count of all categories
 
  // $count = $categoryCounts[$category];
   //$percentage = round(($count / $totalCount) * 100, 2); // Calculate the percentage
   //echo "". $percentage ."";
   //echo "" . $category . "     " . $count ."      ". $percentage . "% " ."<br>";
 



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
    ['CATEGORY', { role: 'annotation' }, " "],
    <?php
      // Print the category counts
foreach ($categoryCounts as $category => $count) {
}

    $totalCount = array_sum($categoryCounts); 
    foreach ($caseCategories as $category) {
      $count = $categoryCounts[$category];
      $percentage = round(($count / $totalCount) * 100, 2);
      echo "['" . $category ."(" .$count. ")". "', " . $percentage . ", {v: '" . $percentage . "%', f: ' $percentage '}],";
    }
  

    ?>
  ]);

  var options = {
    chart: {
      title: 'Bar chart showing the recorded cases in Malawi',
      data: 'in',
       borderRadius: 10,
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
      }
    },
    bar: {
      groupWidth: '60%',
    },
    colors: function () {
      var colors = [];
      for (var i = 0; i < (countValues.length); i++) {
        if (countValues[i]=== maxCount) {
          colors.push('red');
        } else {
          colors.push('#3366cc'); // Default color for other categories
        }
      }
      return colors;
    }()
  };

  var chart = new google.charts.Bar(document.getElementById('chart_div'));
  chart.draw(data, google.charts.Bar.convertOptions(options));
}
</script>
</head>
<body>
 
  <style>
    body{
      background-color: khaki;
    }
    .count{
      margin-bottom: 10%;
    }

    
  </style>
  <div id="chart_div" style="width: 100%; height: 500px; border-radius: 10%;"></div>

<?php


?>


</body>
</html>
