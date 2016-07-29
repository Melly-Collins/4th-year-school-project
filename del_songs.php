<?php
ob_start();
// Define database credentials
$servername = 'localhost';
$username = 'root';
$password = '';
$database = '254_iplugger';
// Create db connection
mysql_select_db($database,mysql_connect('localhost','root',''))or die(mysql_error());

  if(isset($_GET['mp3_id'])!="")
  {
  $delete=$_GET['mp3_id'];
  $sql="DELETE  FROM uploads WHERE mp3_id='$delete'";
  $result =mysql_query($sql);

if ($result)
  {
      header("Location:artist_profile.php");
  }
  else
  {
      echo "Error deleting record: " . $conn->error;
  }
  }
  ob_end_flush();
?>
