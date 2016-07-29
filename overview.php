
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

  			<h1>Welcome To Your Profile: <?php echo $name;?></h1>
  <hr>
<hr>
<ul>
  <li><a href="overview.php">Messages</a></li>
    <li><a href="manage_artist.php">Manage  Music Artists</a></li>
    <li><a href="manage_stations.php"> Manage Radio Stations</a></li>
    <li><a href="reports.php">Reports</a></li>
</ul>
</hr>
<div id="topnav">

  <?php
  //We check if the user is logged
  if(isset($_SESSION['username']))
  {
  //We list his messages in a table
  //Two queries are executes, one for the unread messages and another for read messages
  $req1 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="no" and users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="no" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
  $req2 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="yes" and users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="yes" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
  ?>
  This is the list of your messages:<br />
  <a href="new_pm.php" class="link_new_pm">New PM</a><br />
  <h3>Unread Messages(<?php echo intval(mysql_num_rows($req1)); ?>):</h3>
  <table>
  	<tr>
      	<th class="title_cell">Title</th>
          <th>Nb. Replies</th>
          <th>Participant</th>
          <th>Date of creation</th>
      </tr>
  <?php
  //We display the list of unread messages
  while($dn1 = mysql_fetch_array($req1))
  {
  ?>
  	<tr>
      	<td class="left"><a href="read_pm.php?id=<?php echo $dn1['id']; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
      	<td><?php echo $dn1['reps']-1; ?></td>
      	<td><a href="profile.php?id=<?php echo $dn1['userid']; ?>"><?php echo htmlentities($dn1['username'], ENT_QUOTES, 'UTF-8'); ?></a></td>
      	<td><?php echo date('Y/m/d H:i:s' ,$dn1['timestamp']); ?></td>
      </tr>
  <?php
  }
  //If there is no unread message we notice it
  if(intval(mysql_num_rows($req1))==0)
  {
  ?>
  	<tr>
      	<td colspan="4" class="center">You have no unread message.</td>
      </tr>
  <?php
  }
  ?>
  </table>
  <br />
  <h3>Read Messages(<?php echo intval(mysql_num_rows($req2)); ?>):</h3>
  <table>
  	<tr>
      	<th class="title_cell">Title</th>
          <th>Nb. Replies</th>
          <th>Participant</th>
          <th>Date or creation</th>
      </tr>
  <?php
  //We display the list of read messages
  while($dn2 = mysql_fetch_array($req2))
  {
  ?>
  	<tr>
      	<td class="left"><a href="read_pm.php?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
      	<td><?php echo $dn2['reps']-1; ?></td>
      	<td><a href="profile.php?id=<?php echo $dn2['userid']; ?>"><?php echo htmlentities($dn2['username'], ENT_QUOTES, 'UTF-8'); ?></a></td>
      	<td><?php echo date('Y/m/d H:i:s' ,$dn2['timestamp']); ?></td>
      </tr>
  <?php
  }
  //If there is no read message we notice it
  if(intval(mysql_num_rows($req2))==0)
  {
  ?>
  	<tr>
      	<td colspan="4" class="center">You have no read message.</td>
      </tr>
  <?php
  }
  ?>
  </table>
  <?php
  }
  else
  {
  	echo 'You must be logged to access this page.';
  }
  ?>
  		</div>
  <p>
  	<form method="post" action="logout.php">
  	<input type="submit" value="Logout" />
  </form> </p>
</div>
<div id="footer">
	<p class="footer-text">Copyright  2015 Melly Collins Design</p>

</div>
	</body>
	</html>
