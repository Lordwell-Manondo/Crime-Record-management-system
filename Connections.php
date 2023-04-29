<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
//$confirm_password = "$dbpass";
$dbname = "login";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
        die("failed to connect");
}