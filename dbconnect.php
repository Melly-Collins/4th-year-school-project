<?php

// Define database credentials
$servername = 'localhost';
$username = 'root';
$password = '';
$database = '254_iplugger';
// Create db connection

mysql_select_db($database,mysql_connect('localhost','root',''))or die(mysql_error());

?>
