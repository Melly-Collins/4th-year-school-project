<?php
        session_start();
        if(!isset($_SESSION['uname']))
        {
                header("location: index.html");
        }
        $name=$_SESSION['uname'];
?>
	<html>
	<head>

		  <link href="ntw-home.css" rel="stylesheet" type="text/css" />
			<link href="table.css" rel="stylesheet" type="text/css" />

			<title>Profile of <?php echo $name;?></title>
			</head>

		</head>
	<body>
<body bgcolor="#000000">

	<div id="outer">
	<div id="wrapper">
		<div id="logo">
      </div>

	</div>
	</div>

	<div id="topnav">


			<h1>Welcome To Your Profile: <?php echo $name;?></h1>
		<hr>


		  <ul>

		  		<li><a href="artist_profile.php">Manage Songs</a></li>
		      <li><a href="view_stations.php"> View Radio Stations</a></li>
             <!---<li><a href="edit_artistprofile.php"> Edit your Information</a></li> -->
</ul>
</hr>







</div>

<div id="rightside_artist">
	<h1> Your Songs</h1>

  <div class="CSSTableGenerator" >
	<table width="100%" style="color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:12px " >

	    <tr>
	    <td>Title</td>
	    <td>Play</td>
	    <td>Action</td>

	    </tr>
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

		$sql = "SELECT mp3_id, filename, title FROM `uploads` WHERE uname ='$name'";
		$result = $conn->query($sql) or die (mysql_error());

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {

			?>
	<tr>
	        <td><?php echo $row['title'] ?></td>
	        <td><a href="uploads/<?php echo $row['filename'] ?>" target="_blank">Play file</a></td>

<?php echo '<td><a href="del_songs.php?mp3_id=' . $row['mp3_id'] . '"><img src="images/delete-icon.png" alt="edit" width=20 height="20" border="0"/></a>Delete';?>
<?php echo '<a href="edit_songs.php?mp3_id=' . $row['mp3_id'] . '"><img src="images/edit-icon.png" alt="edit" width=20 height="20" border="0"/></a>Edit</td>';?>
	  </tr>
	        <?php
				}
		} else {
		    echo "0 results";
		}
	$conn->close();
	?>
  </table>

</div>
<form name="uploadForm" method="post" action="upload.php" style="width: 500px;color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:12px " enctype="multipart/form-data">
</form>

</div>

<div>
  <form name="uploadForm" method="post" action="upload.php" style="width: 500px;color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:12px " enctype="multipart/form-data">
    Select an mp3 file only: <br>
    <input name="user_file" type="file" />
    <br>
    Title: <br>
    <input type="text" name="title" size="40" required=""/>
    <br>
    Description: <br>
    <textarea name="description" rows="3" cols="32"  required=""></textarea>
    <br>
    Tags (Descriptive keywords find your tune easily.): <br>
    <input type="text" name="tags" size="40"required=""/>
    <br>
    <input type="submit" name="upload" value="Upload">
    <input type="hidden" name="submit_upload" value="yes" />
  </form>
</div>
<br>
<br>
<br>
<p>
	<form method="post" action="logout.php">
	<input type="submit" value="Logout" />
</form> </p>

<div id="footer">
<p class="footer-text">Copyright  2015 Melly Collins Design</p>


	</body>
	</html>
