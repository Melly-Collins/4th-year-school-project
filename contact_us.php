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

if(isset($_POST['submit'])) {

$uname = $_POST['uname'];
$email =($_POST['email']);
$topic =($_POST['topic']);
$message =$_POST['message'];
$date = date("Y-m-d");

}


$sql = "INSERT INTO contact_us (uname, email, topic, message, date)

VALUES ('$uname', '$email', '$topic', '$message', '$date') ";

if(mysqli_query ($conn,$sql))
{
    echo "User information saved successfully.";
    echo '<br/>';
    echo "<a href='index.html'>Return to Home page</a>";
}else
{
   echo("Error description: " . mysqli_error($conn));

}

mysqli_close($conn);
?>
