<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
//$confirm_password = "$dbpass";
$dbname = "crms";

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
        die("failed to connect");
}