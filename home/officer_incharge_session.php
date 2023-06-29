<?php
session_start();
// include('../db/Connections.php');


$name = $_SESSION['first_name']. " ".  $_SESSION['last_name'] ;


?>