<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "listingdb";

$conn = mysqli_connect($mysql_hostname,$mysql_user,$mysql_password,$mysql_database);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }  
// Check connection

?>