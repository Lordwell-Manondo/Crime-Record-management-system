<?php
// connect to database
session_start();
include('../db/Connections.php');

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
    //total count of categories 
  $totalCount = array_sum($categoryCounts);
   } 

else {
    // If the category doesn't exist, initialize the count to 1
    $categoryCounts[$category] = 1;
}

      
  }
// Initialize totalCount to 0
$totalCount = 0;

// Loop through the categoryCounts array and sum up the counts
foreach ($categoryCounts as $count) {
    $totalCount += $count;
}

// Find the category with the maximum count
  $maxCount = max($categoryCounts);
  $maxCategory = array_search($maxCount, $categoryCounts);
  //echo $maxCategory."".$maxCount;
 
  // Set the color based on the category
  $color = ($maxCategory== true) ? 'skyblue' : 'green';

  //total cases recorded
  // echo $totalCount;

} else {
  echo "0 results";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>cases bar chart</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
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
          $percentage = round(($count/$totalCount) * 100, 2);
        
          // Set the color based on the category
         // $color = ($category === $maxCategory) ? 'pink' : 'green';
      
          
          $bargraph= "['" . $category . "(".$count.")"."',". $percentage . ", ''],";
          echo"".$bargraph;
          
          
        }
        ?>
      ]);

      var options = {
        chart: {
          title: 'Bar chart showing the recorded case categories',
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
  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg " style="background-color: black;">
    <div class="log">
      <img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
      <h3>STATISTICS OF RGISTERED CASES</h3>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">

      
         </ul>
    </div>
  </nav>
<body>

<style>
    body {
      background-color: rgb(0, 109, 139);
    }
    h3{
            color: white;
            margin-left: 400px;
            font-size: 30px;
            margin-top: -40px;
            word-spacing: 5px;

        }
        
        .container {
            background-color: rgb(0, 109, 139);
            width: 100%; 
            height: 300px;
            /* margin-left: 30%; */
            margin-top: 5%;
        }
        
        .form-group {
            margin-top: 10%;
        }
        
        h4 {
            
            margin-top: -5%;
        }
        
        i {
            width: 30px;
            color: blue;
        }
        
        button[type="button"] {
            width: fit-content;
            margin-top: 10%;
        }
        
        button[type="submit"] {
            margin-top: 10%;
            width: fit-content;
            margin-left: 30%;
        }
        .box-container{
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 45%;
            margin-left: 25%;
         border: 1px black solid;
         
        }
        hr{
           border-color: gray;
        }
        .box-container {
      position: absolute;
      top: 15%;
      border: 3px solid gray;
      padding: 2%;
      border-radius: 2%;
      background-color: white;
    }
        .box {
      position: absolute;
      top: 15%;
      left: 0.5%;
      background-color: white;
      border: 1px solid gray;
      width: 20%;
      height: 550px;
      border-radius: 1%;
      
    
    }
        a{
          color: black;
          text-align: start;
          margin-left: 3%;
          font-size: 20px;
        }
        li{
          list-style: none;
        }
       
  </style>
  
 <li> <div class="box-container" id="chart_div" style="width: 73%; height: 550px; border-radius: 0.5%; "></div> </li>
 <div class="box">
 <li><a class="case-categories" href="#">Case categories</a></li>
<li><a class="case-locations" href="#">Locations</a></li>
 </div>
 
</body>
</html>
