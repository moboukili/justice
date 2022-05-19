<?php
$hostname     = "localhost:3306"; // Enter Your Host Name
$username     = "root";      // Enter Your Table username
$password     = "";          // Enter Your Table Password
$databasename = "justice1"; // Enter Your database Name


$conn = new mysqli($hostname, $username, $password, $databasename);
mysqli_query($conn,"SET CHARACTER SET 'utf8'");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>

