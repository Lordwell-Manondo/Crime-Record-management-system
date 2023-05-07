<!DOCTYPE html>
<html>
<head>
  <title>Display Data from Database</title>
</head>
<body>
  <h1>Display Data from Database</h1>

  <?php
  //linking up Record_case.php file with database using Connections.php file
  include('Connections.php');

   

    // Retrieve recorded cases from the database
    $sql = 'SELECT supect, victim FROM cases';
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
      // display the recorded cases of each row
      while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["suspect"]. " - Email: " . $row["victim"]. "<br>";
      }
    } else {
      echo "0 results";
    }

    mysqli_close($con);
  ?>
</body>
</html>
