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
<title>Profile of <?php echo $name;?></title>
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

			<h1>Welcome To Your Profile: <?php echo $name;?></h1>
		<hr>
		  <ul>
		        <li><a href="view_artists.php">View Artists</a></li>
						<li><a href="view_songs.php">View Songs</a></li>
					<!--	<li><a href="edit_radioprofile.php">Edit Profile</a></li>-->
</ul>
</hr>



	<form method="post" action="logout.php">
	<input type="submit" value="Logout" />
	</form>

</div>


<div id="footer">
	<p class="footer-text">Copyright  2015 Melly Collins Design</p>


	</body>
	</html>
