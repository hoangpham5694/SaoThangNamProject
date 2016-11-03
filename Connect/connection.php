<?php

$servername = "localhost";
$username = "root";
$password = "123123";
$dbname= "saothangnamdb";

// Create connection
/*
$servername = "localhost";
$username = "u311643457_admin";
$password = "123123";
$dbname= "u311643457_stn";
*/


$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
mysqli_set_charset($conn,'utf8');
?>