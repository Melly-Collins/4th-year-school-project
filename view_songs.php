<?php
        session_start();
        if(!isset($_SESSION['rname']))
        {
                header("location: index.html");
        }
        $name=$_SESSION['rname'];
?>
<html>
<head>

    <link href="ntw-home.css" rel="stylesheet" type="text/css" />
      <link href="table.css" rel="stylesheet" type="text/css" />

  </head>
<body>
<body bgcolor="#000000">

<div id="topnav">
<h1>Welcome To Your Profile: <?php echo $name;?></h1>
<hr>
<ul>

      <li><a href="view_artists.php">View Artists</a></li>
      <li><a href="view_songs.php"> View Songs</a></li>
    <!--  <li><a href="edit_radioprofile.php">Edit Profile</a></li>-->
    </ul>

<div>
  <div class="CSSTableGenerator" >
      	<table  border="3" style="color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:12px " >

      	    <tr>
      	    <td><h2>Title</h2></td>
      	    <td><h2>Description</td></h2>
      	    <td><h2>Tags</td></h2>
            <td><h2>Song</td></h2>
            <td><h2>Date Added</td></h2>
            <td><h2>Artist Name</td></h2>

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
          	        <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['tags'] ?></td>
                  <td><a href="uploads/<?php echo $row['filename'] ?>" target="_blank">Play file</a></td>
                    <td><?php echo $row['date'] ?></td>
                    <td><?php echo $row['uname'] ?></td>


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

</ul>
</hr>
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
