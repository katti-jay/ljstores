<?php

// connect to my database


$servername = "localhost";
$username = "root";
$password = "p@55w0rd";
$database = "ljstores";

global $connection;
$connection = @mysqli_connect($servername, $username, $password) or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@ljstores.com</font>');
@mysqli_select_db($connection, "ljstores") or die('Connection could not be made to the database. Please report this system error at <font color="blue">info@ljstores.com</font>');

?>

<?php 
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

