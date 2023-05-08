<?php 
// include database connection file
include_once("../common/db_con.php");

// Retrieve the list of cases from the database
$sql = isset($_GET["query"])? "SELECT * FROM `case` WHERE incident  like '%".$_GET["query"]."%' OR case_type  like '%".$_GET["query"]."%' ORDER BY serial_no" : "SELECT * FROM `case` ORDER BY serial_no";
$result = mysqli_query($conn, $sql);
$cases = "";
$suspects = "";
// Display the list of cases in an HTML table
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $cases .= "<tr><td>" . $row["serial_no"] . "</td><td>" . $row["suspect_name"] . "</td><td>" . $row["victim_name"] . "</td><td>" . $row["case_type"] . "</td><td>" . $row["incident"] . "</td><td>" . $row["location"] . "</td><td>" . $row["date"] . "</td></tr>";
    $suspects .= "<li><a href='#'>".$row['suspect_name']."</a></li>";
  }
}


// Retrieve the list of suspects from the database
// $sql = "SELECT * FROM `suspects`";
// $result = mysqli_query($conn, $sql);
// $suspects = "";
// if (mysqli_num_rows($result) > 0) {
//   while ($row = mysqli_fetch_assoc($result)) {
//     $suspects .= "<li><a href='#'>".$row['name']."</a></li>";
//   }
// }


// Close the database connection
mysqli_close($conn);
?>