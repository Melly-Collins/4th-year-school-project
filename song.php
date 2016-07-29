

<?php

$si = array( '', 'k', 'm', 'g' ); // You should extend this.
define( 'BRNL', '<br />' . "\n" ); // Ja
$types = array( 'audio/mp3' => 'mp3', 'image/png' => 'png' ); // Guess

if ( isset($_POST['submit'] /* Whatever you have assigned to submit button/checker */ ) )
{
    extract( $_FILES['file'], EXTR_PREFIX_ALL, 'file' );
    if ( in_array($file_type, array_keys($types)) and in_array(array_pop(explode('.', $file_name)), array_values($types)) and $file_size < 50000000 )
    {
        if ( $file_error > 0 )
            echo 'Return Code: ' . $file_error . BRNL;
        else
        {
            echo 'Upload: ' . $file_name . BRNL;
            echo 'Type: ' . $file_type . BRNL;
            echo 'Size: ' . round( $file_size / pow(1024, floor($l = log($file_size, 1024))), 2 ) . ' ' . $si[$l] . 'b' . BRNL;
            echo 'Temp file: ' . $file_tmp_name . BRNL;

            if ( file_exists('./upload/' . $file_name) )
                echo $file_name . ' already exists. ';
            else
            {
                move_uploaded_file( $file_tmp_name, './upload/' . $file_name );
                echo 'Stored in: ' . 'upload/' . $file_name;
            }

        }
    }
    else
        echo 'Invalid file.';
}
else
    echo 'No file.';

PHP:
 