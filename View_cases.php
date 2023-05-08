<!DOCTYPE html>
<html>
<head>
  <title>Recorded cases</title>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


 
  <h2> Recorded cases</h2>

  
<form method="GET" action="View_cases.php" class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" placeholder="Search of suspect..." aria-label="Search" style="margin-left: 70%">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>



   <h3>SUSPECT</h3>
  
  <div class="table-container">
  <table>
    <tr>
      <th>Suspect</th>
      <th>Victim</th>
      <th>Incident</th>
      <th>Location</th>
      <th>date</th>
      <th>Type</th>
    </tr>
    
  <?php
  //linking up Record_case.php file with database using Connections.php file
  include('Connections.php');
 


    // Retrieve recorded cases from the database
    $sql = 'SELECT *  FROM cases ';
    $result = mysqli_query($con, $sql);

    
      
     //check if the data is available in the database 
     echo '<div class="data-container">';
    if (mysqli_num_rows($result) > 0 ) {
      
        // display the recorded cases of each row
      while($row = mysqli_fetch_assoc($result)) {

      
  
  // Loop through the results and output the data
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['suspect_name'] . "</td>";
    echo "<td>" . $row['victim_name'] . "</td>";
    echo "<td>" . $row['incident'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "</tr>";
  }
}
  
    }
    

    else {
      echo "0 results";
    }

    mysqli_close($con);
  ?>
  
  </table>
</div>
</form>
  <style>
    .table-container {
     margin-left: 20%;
    
   
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
    background-color: khaki;
   
  }
  td {
    background-color: white;
    text-align: left;
  }
  td + td {
    margin-left: 10px;
  }
  .searchbar{
    margin-left: 70%;
    
  }
h3{
    margin-left: 3%;
}
  </style>
</body>
</html>
