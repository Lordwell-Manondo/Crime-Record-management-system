<?php 
session_start();
// include database connection file
include("../db/Connections.php");

session_unset();
session_destroy();

header("Location: Home.php");