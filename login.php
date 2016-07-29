<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$database = '254_iplugger';

mysql_select_db($database,mysql_connect('localhost','root',''))or die(mysql_error());

		if(isset($_POST['submit']))
		{
		$uname=$_POST['uname'];
		$passwd=$_POST['passwd'];
		$position=$_POST['position'];
		switch($position){

		case 'Admin':

		$query = mysql_query("SELECT admin_id, uname, passwd FROM admin WHERE uname='$_POST[uname]' AND passwd='$_POST[passwd]'")or die(mysql_error());
		$count= mysql_num_rows($query);
    if($count>0){

		session_start();
		 $_SESSION['uname']=$_POST['uname'];

		header("location:admin.php");
		}
		else{
		?>
		        <script>alert('Wrong details');</script>
		<?php
		}
		break;

		case 'Radio Station':
			$query= mysql_query("SELECT id, rname, passwd FROM radio_signup WHERE rname='$_POST[uname]' AND passwd='$_POST[passwd]'")or die(mysql_error());
			$count= mysql_num_rows($query);
	    if($count>0){
		session_start();

   $_SESSION['rname']=$_POST['uname'];


		header("location:radio_profile.php");
		}else{
			?>
			        <script>alert('Wrong details');</script>
			<?php
		}
		break;

		case 'Music Artist':
		$query=mysql_query("SELECT id, uname, passwd FROM artist_signup WHERE uname='$_POST[uname]' AND passwd='$_POST[passwd]'")or die(mysql_error());
		$count= mysql_num_rows($query);
		if($count>0){
		session_start();

	  $_SESSION['uname']=$_POST['uname'];


		header("location:artist_profile.php");
		}else{
			?>
			        <script>alert('Wrong details');</script>
			<?php
		}
		break;
	}}

		?>
