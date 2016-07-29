<!DOCTYPE html>

<?php
function valid($id, $uname, $passwd, $artist_name, $stage_name, $genre, $county, $website, $email, $phone_no, $error)
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



  <div id="topnav">

    <h1>Edit Music Artist Information</h1>
  <hr>

<form action="" method="post"  style="width: 500px;color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:12px " >
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<table border="1">

<tr>
<td width="179"><b><font color='green'>Username<em>*</em></font></b></td>
<td><label>
<input type="text" name="uname" value="<?php echo $uname; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='green'>Password<em>*</em></font></b></td>
<td><label>
<input type="password" name="passwd" value="<?php echo $passwd; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='green'>Artist Name<em>*</em></font></b></td>
<td><label>
<input type="text" name="artist_name" value="<?php echo $artist_name; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='green'>Stage Name<em>*</em></font></b></td>
<td><label>
<input type="text" name="stage_name" value="<?php echo $stage_name; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='green'>Genre<em>*</em></font></b></td>
<td><label>
<input type="text" name="genre" value="<?php echo $genre; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='green'>County<em>*</em></font></b></td>
<td><label>
<input type="text" name="county" value="<?php echo $county; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='green'>Website<em>*</em></font></b></td>
<td><label>
<input type="text" name="website" value="<?php echo $website; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='green'>Email<em>*</em></font></b></td>
<td><label>
<input type="text" name="email" value="<?php echo $email; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='green'>Phone No.<em>*</em></font></b></td>
<td><label>
<input type="text" name="phone_no" value="<?php echo $phone_no; ?>" />
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

if (is_numeric($_POST['id']))
{

$id = $_POST['id'];
$uname = mysql_real_escape_string(htmlspecialchars($_POST['uname']));
$passwd = mysql_real_escape_string(htmlspecialchars($_POST['passwd']));
$artist_name = mysql_real_escape_string(htmlspecialchars($_POST['artist_name']));
$stage_name = mysql_real_escape_string(htmlspecialchars($_POST['stage_name']));
$genre = mysql_real_escape_string(htmlspecialchars($_POST['genre']));
$county = mysql_real_escape_string(htmlspecialchars($_POST['county']));
$website = mysql_real_escape_string(htmlspecialchars($_POST['website']));
$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
$phone_no = mysql_real_escape_string(htmlspecialchars($_POST['phone_no']));


if ($uname == '' || $passwd == '' || $artist_name =='' || $stage_name == '' || $genre == '' || $county == '' || $website == '' || $email == ''|| $phone_no == '')
{

$error = 'ERROR: Please fill in all required fields!';


valid( $uname, $passwd, $artist_name, $stage_name, $county, $website, $email, $phone_no, $error);
}
else
{

mysql_query("UPDATE artist_signup SET uname='$uname', passwd='$passwd', artist_name='$artist_name', stage_name='$stage_name', county='$county', website='$website', email='$email', phone_no ='$phone_no' WHERE id='$id'")
or die(mysql_error());

header("Location:artist_profile.php");
}
}
else
{

echo 'Error!';
}
}
else

{

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysql_query("SELECT * FROM artist_signup WHERE id=$id")
or die(mysql_error());
$row = mysql_fetch_array($result);

if($row)
{
$id = $row['id'];
$uname = $row['uname'];
$passwd = $row['passwd'];
$artist_name = $row['artist_name'];
$stage_name = $row['stage_name'];
$genre = $row['genre'];
$county = $row['county'];
$website = $row['website'];
$email = $row['email'];
$phone_no = $row['phone_no'];

valid($id, $uname, $passwd, $artist_name, $stage_name, $genre, $county, $website, $email, $phone_no);
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
