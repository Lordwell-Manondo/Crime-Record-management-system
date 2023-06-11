<?php
session_start();
include('../db/Connections.php');

$myname='';
$sql ="SELECT * FROM officers WHERE officers.service_no=" .$_SESSION['service_no'];

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Display the heading for case types and their counts

    
        
        while ($row = mysqli_fetch_assoc($result)) {
        // Display the data

       $myname = $row['first_name']. " ".  $row['last_name'] ;
       
         }
    }
    else{
        echo"Invalid user";
    }

?>