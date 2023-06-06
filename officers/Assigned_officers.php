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
      <th>serial_no</th>
      <th>service_no</th>
      <th>assigned_date</th>
      <th>report_date</th>
    </tr>
    
  <?php
  //linking up Record_case.php file with database using Connections.php file
  include('../db/Connections.php');

    // Retrieve recorded cases from the database
    $sql = 'SELECT *  FROM duty';
    $result = mysqli_query($conn, $sql);

    
      
     //check if the data is available in the database 
     echo '<div class="data-container">';
    if (mysqli_num_rows($result) > 0 ) {
      
        // display the recorded cases of each row
      while($row = mysqli_fetch_assoc($result)) {

      
  
  // Loop through the results and output the data
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['serial_no'] . "</td>";
    echo "<td>" . $row['service_no'] . "</td>";
    echo "<td>" . $row['date_assigned'] . "</td>";
    echo "<td>" . $row['date_to_report'] . "</td>";
    echo "</tr>";
  }
 
  
    }
    } else {
      echo "0 results";
    }

    mysqli_close($conn);
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
