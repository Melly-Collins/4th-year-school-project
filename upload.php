<?php
        session_start();
        if(!isset($_SESSION['uname']))
        {
                header("location: index.html");
        }
        $uname=$_SESSION['uname'];
?>
<?php

   //Redirect browser if the upload form WAS NOT submited.
       if (!isset($_POST['submit_upload'])) {
           header("location: artist_profile.php");
       }

   //Continue if the upload form WAS SUBMITED
       else {
           //Set the upload directory path
           $target_path ="uploads/";

           //Array to store validation errors
           $error_msg = array();

           // Validation error flag, if this becomes true we won't upload
           $error_flag = false;

           // Connect to database: host, username, password.
           mysql_connect("localhost","root","");

           // Specify database to use
           mysql_select_db("254_iplugger") or die("Unable to select database");

           //Function to sanitize values received from the form. Prevents SQL injection
            function clean($str) {
                $str = @trim($str);
                if(get_magic_quotes_gpc()) {
                    $str = stripslashes($str);
                }
                return mysql_real_escape_string($str);
            }

            //Sanitize the POST values
            $title = clean($_POST['title']);
            $description = clean($_POST['description']);
            $tags = clean($_POST['tags']);

            if($title == '') {
                $error_msg[] = 'Title is missing';
                $error_flag = true;
            }
            if($tags == '') {
                $error_msg[] = 'Tags are missing';
                $error_flag = true;
            }

           // We get the data from the upload form
           $filename = $_FILES['user_file']['name'];
           $temp_filename = $_FILES['user_file']['tmp_name'];
           $filesize = $_FILES['user_file']['size'];
           $mimetype = $_FILES['user_file']['type'];

           //Convert all applicable characters to HTML entities
           $filename = htmlentities($filename);
           $mimetype = htmlentities($mimetype);

           //Check for empty file
           if($filename == ""){
               $error_msg[] = 'No file selected!';
               $error_flag = true;
           }

           //Check the mimetype of the file
           if($mimetype != "audio/mpeg" && $mimetype != "audio/mp3"){
               $error_msg[] = 'The file you are trying to upload does not contain expected data.
               Are you sure that the file is an MP3 one?';
               $error_flag = true;
           }

           //Get the file extension, an honest file should have one
           $ext = substr(strrchr($filename, '.'), 1);
           if($ext != 'mp3') {
               $error_msg[] = 'The file type or extention you are trying to upload is not allowed!
                   You can only upload MP3 files to the server!';
               $error_flag = true;

           }

           //Check that the file really is an MP3 file by reading the first few characters of the file
           $open = @fopen($_FILES['user_file']['tmp_name'],'r');
           $read = @fread($open,3);
           @fclose($open);
           if($read != "ID3"){
               $error_msg[] = "The file you are trying to upload does not seem to be an MP3 file.";
               $error_flag = true;
           }

           //Now we check the filesize.
           //The file size shouldn't include any other type of character than numbers
           if (!is_numeric($filesize)) {
               $error_msg[] = 'Bad filesize!';
               $error_flag = true;
           }

           //If it is too big or too small then we reject it
           //MP3 files should be at least 1MB and no more than 10 MB
           // Check if the file is too large
           if($filesize > 10485760){
               $error_msg[] = 'The file you are trying to upload is too large!
               Please upload a smaller MP3 file';
               $error_flag = true;
           }

           // Check if the file is too small
           if($filesize < 1048600){
               $error_msg[] = 'The file you are trying to upload is too small!
               It is too small to be a valid MP3 file.';
               $error_flag = true;
           }


           //Sanitize the POST values
           $title = clean($_POST['title']);
           $description = clean($_POST['description']);
           $tags = clean($_POST['tags']);

           if($title == '') {
               $error_msg[] = 'Title is missing';
               $error_flag = true;
           }
           if($tags == '') {
               $error_msg[] = 'Tags are missing';
               $error_flag = true;
           }

           //If there are input validations, show errors
           if($error_flag == true) {
               foreach ($error_msg as $c=>$p)
               echo "Error " . $c . ": " . $p . "<br>";

           }
           //Else, all checks are done, move the file.
           else {
               if (is_uploaded_file($temp_filename)){

                   //If the file was moved, change the filename
                   if(move_uploaded_file($temp_filename, $target_path . $filename)) {

                       //Again check that the file exists in the target path
                       if(@file_exists($target_path . $filename)) {
                         $error_msg[] = 'Song Exists';
                         $error_flag = true;
                           //Assign upload date to a variable
                           $date = date("Y-m-d");


                           //Create INSERT query
                           $qry = "INSERT INTO uploads ( uname, filename, title, description, tags, date)
                           VALUES('$uname','$filename','$title','$description','$tags','$date')";
                           $result = @mysql_query($qry);

                           if ($result) {
                               echo "The file " . $filename . " has been uploaded successfuly. <br>";
 header("Location:artist_profile.php");
                               mysql_close();
                               die();


                           }
                       }

                       else{
                           echo "There was an error uploading the file, please try again!";

                       }
                   }
               }

               else {
                   echo "There was an error uploading the file, please try again!";
               }

           }
       }
?>
