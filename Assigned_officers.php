<!DOCTYPE html>
<html>
<head>
  <title>Assigen Officers</title>
</head>
<body>
  <h1>CRIME RECORD MANAGEMENT SYSTEM</h1>
  <h2> Assigned Officers</h2>
  
  <div class="table-container">
  <table>
    <tr>
      <th>case_id</th>
      <th>officer_id</th>
      <th>assigned_date</th>
      <th>report_date</th>
    </tr>
    
  <?php
  //linking up Record_case.php file with database using Connections.php file
  include('Connections.php');

    // Retrieve recorded cases from the database
    $sql = 'SELECT *  FROM assign_work';
    $result = mysqli_query($con, $sql);

    
      
     //check if the data is available in the database 
     echo '<div class="data-container">';
    if (mysqli_num_rows($result) > 0 ) {
      
        // display the recorded cases of each row
      while($row = mysqli_fetch_assoc($result)) {

      
  
  // Loop through the results and output the data
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['case_id'] . "</td>";
    echo "<td>" . $row['officer_id'] . "</td>";
    echo "<td>" . $row['assigned_date'] . "</td>";
    echo "<td>" . $row['report_date'] . "</td>";
    echo "</tr>";
  }
 
  
    }
    } else {
      echo "0 results";
    }

    mysqli_close($con);
  ?>
  
  </table>
</div>

  <style>
    .table-container {
    width: 80%;
    margin-left: 25%;
    }
    h1{
        background-color: gray;
        text-align: center;
        color: white;
        border-radius: 3px;
        margin-top: 0%;
    }
    h2{
        text-align: center;
    }
    body{
        background-color: aqua;
    }

   
  table {
    border-collapse: collapse;
    text-align: center;
   background-color: white;
   
  }
  td, th {
    border: 1px solid black;
    padding: 10px;
  }
  th {
    background-color: lightgray;
  }
  td {
    text-align: center;
  }
  td + td {
    margin-left: 10px;
  }

  </style>
</body>
</html>
