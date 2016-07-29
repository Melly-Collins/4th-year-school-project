<html>
<head>

    <link href="ntw-home.css" rel="stylesheet" type="text/css" />
      <link href="table.css" rel="stylesheet" type="text/css" />

  </head>
<body>
<body bgcolor="#000000">

<div id="topnav">
<h1>View Radio Stations</h1>
<hr>
<ul>

    <li><a href="artist_profile.php">Manage Songs</a></li>
    <li><a href="view_stations.php"> View Radio Stations</a></li>
    <!--  <li><a href="edit_artistprofile.php"> Edit your Information</a></li> -->
    </ul>

<div>
  <div class="CSSTableGenerator" >
      	<table style="color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:12px " >

      	    <tr>
      	    <td><h2>Radio Station</h2></td>
      	    <td><h2>Genre</td></h2>
      	    <td><h2>County</td></h2>
            <td><h2>Website</td></h2>
            <td><h2>Email</td></h2>
            <td><h2>Frequency</td></h2>
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

          		$sql = "SELECT *  FROM radio_signup";
          		$result = $conn->query($sql) or die (mysql_error());

          		if ($result->num_rows > 0) {
          		    // output data of each row
          		    while($row = $result->fetch_assoc()) {

          			?>
          	<tr>
          	        <td><?php echo $row['rname'] ?></td>
                    <td><?php echo $row['genre'] ?></td>
                    <td><?php echo $row['county'] ?></td>
                    <td><?php echo $row['website'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['freq'] ?></td>


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
