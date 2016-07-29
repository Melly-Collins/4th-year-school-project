
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
<div>
    <div class="CSSTableGenerator" >
<table  border="3" style="color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:15px ">



                                                                <tr>
                                                                  <td><h2>Report Type</h2></td>
                                                                  <td ><h2>Action</h2></td>
                                                                </tr>
                         <tr>
                           <td style=" font-size:15px">Music artists</td>
                           <td ><h1><a href="reports/pdf/artists.php" target="_blank">Print</h1></a> </td>
                         </tr>
                                                   <tr>
                           <td style=" font-size:15px">Radio Stations</td>
                           <td style="color:black"><h1><a href="reports/pdf/radio.php" target="_blank">Print</h1></a> </td>
                         </tr>
                                                   <tr>
                           <td style=" font-size:15px">Songs </td>
                           <td ><h1><a href="reports/pdf/songs.php" target="_blank">Print</h1></a> </td>
                         </tr>



                       </table>

</div>

<p>
	<form method="post" action="logout.php">
	<input type="submit" value="Logout" />
</form> </p>

<div id="footer">
<p class="footer-text">Copyright  2015 Melly Collins Design</p>


	</body>
	</html>
