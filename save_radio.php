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


$rname = $_POST['rname'];
$passwd =$_POST['passwd'];
$verify = $_POST['verify'];
$genre = $_POST['genre'];
$county = $_POST['county'];
$website = $_POST['website'];
$email = $_POST['email'];
$phone_no = $_POST['phone_no'];
$freq= $_POST['freq'];
$date = date("Y-m-d");


}

$sql = "INSERT INTO radio_signup (rname, passwd, verify, genre, county, website, email, phone_no, freq, date)

VALUES ('$rname', '$passwd', '$verify', '$genre', '$county', '$website', '$email', '$phone_no', '$freq','$date')";

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
