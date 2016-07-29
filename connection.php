
<?php
$servername = "localhost";
$username = "root";
$password = "";
$mysql_database = "254_iplugger";
$prefix = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
