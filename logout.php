<?php

  if(isset($_SESSION['uname']))
                {
      unset($_SESSION['uname']);
                }
                echo '<h1>You have been successfully logout</h1>';
header("location:index.html");
?>
