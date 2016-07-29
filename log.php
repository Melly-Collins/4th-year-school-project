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

if(isset($_POST['submit']))
{

	$username = mysqli_real_escape_string($_POST['uname']);
	$upass = mysqli_real_escape_string($_POST['passwd']);
	$res=mysqli_query("SELECT * FROM radio_signup WHERE uname='$uname'");
	$row=mysqli_fetch_array($res);

	if($row['password']==($upass))
	{
		$_SESSION['user'] = $row['id'];
		header("Location: radio_profile.php");
	}
	else
	{
echo "string";
	}

}
?>
