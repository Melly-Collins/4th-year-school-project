
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

  </head>
<body>
<body bgcolor="#000000">

<body bgcolor="#000000">
<div id="outer">
<div id="wrapper">
  <div id="logo">
    </div>

</div>
</div>

<div id="topnav">


  <h1>Admin Profile: <?php echo $name;?></h1>

  <hr>
    <ul>

        <li><a href="manage_artist.php">Manage  Music Artists</a></li>
        <li><a href="manage_stations.php"> Manage Radio Stations</a></li>
          <li><a href="manage_songs.php"> Manage Songs</a></li>
          <li><a href="reports.php">Reports</a></li>
</ul>
</hr>

</div>
  <div class="CSSTableGenerator" >
    <table style="color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:20px " >

    <tr>
      	    <td><h2>Artist Name</h2></td>
      	    <td><h2>Song Title</h2></td>
      	    <td><h2>Description</h2></td>
              <td><h2>Tags</h2></td>
            <td><h2>Action</h2></td>



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

          		$sql = "SELECT *  FROM uploads";
          		$result = $conn->query($sql) or die (mysql_error());

          		if ($result->num_rows > 0) {
          		    // output data of each row
          		    while($row = $result->fetch_assoc()) {

          			?>
          	<tr>
          	        <td><?php echo $row['uname'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['tags'] ?></td>

                    <?php echo '<td><a href="del_songs1.php?mp3_id=' . $row['mp3_id'] . '"><img src="images/delete-icon.png" alt="edit" width=20 height="20" border="0"/></a>Delete';?>
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


</div>
<p>
	<form method="post" action="logout.php">
	<input type="submit" value="Logout" />
</form> </p>

<div id="footer">
<p class="footer-text">Copyright  2015 Melly Collins Design</p>

</div>
	</body>
	</html>
