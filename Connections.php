<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";

if($con = msqli_connect($dbhost, $dbuser, $dbpass, $dbname )){
    die("failed to connect");
}