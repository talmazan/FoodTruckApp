<?php
// Database connection parameters
$servername = "localhost"; 
$username = "talmazanmacedo"; 
$password = "ma40769"; 
$database = "talmazanmacedo_foodtruck"; 

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
