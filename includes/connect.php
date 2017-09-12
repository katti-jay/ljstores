<?php
 session_start();
// connect to my database

 
$conn=mysqli_connect("localhost","root","p@55w0rd","ljstores");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<?php 
// Script Error Reporting
 error_reporting(E_ALL & ~E_NOTICE);
 
ini_set('display_errors', '1');
?>