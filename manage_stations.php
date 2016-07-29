
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

<div id="topnav">
  <h1>Admin Profile: <?php echo $name;?></h1>
<hr>
<ul>

    <li><a href="manage_artist.php">Manage  Music Artists</a></li>
    <li><a href="manage_stations.php"> Manage Radio Stations</a></li>
      <li><a href="manage_songs.php">Manage  Music songs</a></li>
      <li><a href="reports.php">Reports</a></li>

    </ul>

<div>
  <div class="CSSTableGenerator" >
    	<table style="color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:20px " >


      	    <tr>
      	    <td><h2>Radio Station</h2></td>
      	    <td><h2>Genre</td></h2>
      	    <td><h2>County</td></h2>
            <td><h2>Website</td></h2>
            <td><h2>Email</td></h2>
            <td><h2>Frequency</td></h2>
            <td><h2>Actions</td><h2>
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
                    <?php echo '<td><a href="del_radio.php?id=' . $row['id'] . '"><img src="images/delete-icon.png" alt="edit" width=20 height="20" border="0"/></a>Delete';?>
                      <?php echo '<a href="edit_radio.php?id=' . $row['id'] . '"><img src="images/edit-icon.png" alt="edit" width=20 height="20" border="0"/></a>Edit</td>';?>


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
