<!DOCTYPE html>
<?php
function valid($mp3_id, $uname, $title, $description, $tags, $error)
{
?>
<html>

<head>

    <link href="ntw-home.css" rel="stylesheet" type="text/css" />



	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <meta http-equiv="content-type" content="cache"/>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="enter keywords" />
    <meta name="description" content="type description here" />
    <title>254 iPlugger</title>

</head>

<body>
<body bgcolor="#000000">


  <div id="topnav">

    <h1>Edit Song Information</h1>
  <hr>

<form action="" method="post"  style="width: 500px;color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:12px " >
<input type="hidden" name="id" value="<?php echo $mp3_id; ?>"/>

<table border="1">

<tr>
<td width="179"><b><font color='green'>Artist Name<em>*</em></font></b></td>
<td><label>
<input type="text" name="uname" value="<?php echo $uname; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='green'>Title<em>*</em></font></b></td>
<td><label>
<input type="text" name="title" value="<?php echo $title; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='green'>Description<em>*</em></font></b></td>
<td><label>

<input type="text" name="description" value="<?php echo $description; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='green'>Tags<em>*</em></font></b></td>
<td><label>
<input type="text" name="tags" value="<?php echo $tags; ?>" />
</label></td>
</tr>


  <td><input name="submit" type="submit" value="Edit Records" /></td>
</table>
</form>
</hr>


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


<?php
}
// Define database credentials
$conn = mysql_connect('localhost','root','') or die (mysql_error());
mysql_select_db('254_iplugger', $conn) or die (mysql_error());

if (isset($_POST['submit']))
{

if (is_numeric($_POST['mp3_id']))
{

$mp3_id = $_POST['mp3_id'];
$uname = mysql_real_escape_string(htmlspecialchars($_POST['uname']));
$title = mysql_real_escape_string(htmlspecialchars($_POST['title']));
$description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
$tags = mysql_real_escape_string(htmlspecialchars($_POST['tags']));




if ($uname == '' || $title == '' || $description == '' || $tags == '' )
{

$error = 'ERROR: Please fill in all required fields!';


valid($mp3_id, $uname, $title, $description, $tags, $error);
}
else
{

mysql_query("UPDATE uploads SET uname='$uname', title='$title', description='$description', tags='$tags',  WHERE mp3_id='$mp3_id'")
or die(mysql_error());

header("Location: manage_songs.php");
}
}
else
{

echo 'Error!';
}
}
else

{

if (isset($_GET['mp3_id']) && is_numeric($_GET['mp3_id']) && $_GET['mp3_id'] > 0)
{

$mp3_id = $_GET['mp3_id'];
$result = mysql_query("SELECT * FROM uploads WHERE mp3_id=$mp3_id")
or die(mysql_error());
$row = mysql_fetch_array($result);

if($row)
{

$uname = $row['uname'];
$title = $row['genre'];
$description = $row['description'];
$tags = $row['tags'];



valid($mp3_id, $uname, $title, $description, $tags );
}
else
{
echo "No results!";
}
}
else

{
echo 'Error!';
}
}
?>
