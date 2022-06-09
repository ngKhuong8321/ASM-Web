<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "joblister";

if($con = mysqli_connect($dbhost, $dbname, $dbpass, $dbuser))
{
    die("Failed to Connect");
}