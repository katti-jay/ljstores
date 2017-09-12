<?php

// connect to my database
// 
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);

global $connection;
$connection = @mysqli_connect($servername, $username, $password) or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@ljstores.com</font>');
@mysqli_select_db($connection, "ljstores") or die('Connection could not be made to the database. Please report this system error at <font color="blue">info@ljstores.com</font>');

?>

<?php 
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

