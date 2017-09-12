<?php
 session_start();
// connect to my database

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
 
$conn=mysqli_connect($host, $username, $password, $db);
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