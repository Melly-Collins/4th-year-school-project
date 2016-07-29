<?php

// Define database credentials
$servername = 'localhost';
$username = 'root';
$password = '';
$database = '254_iplugger';
// Create db connection
$conn = new mysqli($servername, $username, $password, $database);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = "SELECT mp3_id, username, filename, title, description, tags ,date FROM uploads";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " Song: " . $row["filename"]. "Title: " . $row["title"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
