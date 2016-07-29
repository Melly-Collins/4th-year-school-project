<?php

// Define database credentials
$servername = 'localhost';
$username = 'root';
$password = '';
$database = '254_iplugger';
// Create db connection

$conn = mysql_connect('localhost','root','') or die (mysql_error());
mysql_select_db('254_iplugger', $conn) or die (mysql_error());
$html = '

<!DOCTYPE html>
<html>
<head>
    <title>System Users</title>
    <style>
	table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%;
}

.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc;
    -moz-box-shadow: 0 1px 1px #ccc;
    box-shadow: 0 1px 1px #ccc;
}

.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;
}

.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

.bordered th {
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5);
}

.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}

.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}

.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}
    </style>
</head>
<body>
<h2 style="text-align:center" >254_iPlugger</h2>
</div>
<table class="bordered">
    	<thead>
    		<tr>
                <th><h2>ID</h2></th>
				<th><h2>Artist Name</h2></th>
                <th><h2>Song Title</h2></th>
                <th><h2>Description</h2></th>
                <th><h2>Tags</h2></th>
			      	<th><h2>Date Added</h2></th>

            </tr>
    	</thead>';

											$query="SELECT * FROM uploads ";
		  									$resource=mysql_query($query,$conn);
											while($result=mysql_fetch_array($resource))
												{
														$mp3_id=$result['mp3_id'];
														$uname=$result['uname'];
														$title=$result['title'];
														$description=$result['description'];
														$tags=$result['tags'];
														$date=$result['date'];





							$html .='<tr>
										<td>'.$mp3_id.'</td>
										<td>'.$uname.'</td>
										<td>'.$title.'</td>
										<td>'.$description.'</td>
										<td>'.$tags.'</td>
										<td>'.$date.'</td>

									</tr>';
						   }


$html .='</table>

</body>
</html>
';


//==============================================================
//==============================================================
//==============================================================

include("../mpdf.php");

//$mpdf=new mPDF();
$mpdf=new mPDF('c','A4-L','','' , 0 , 0 , 0 , 0 , 0 , 0,'L');

$mpdf->SetDisplayMode('fullpage');


$mpdf->WriteHTML($html);

$mpdf->Output();

exit;
//==============================================================
//==============================================================
//==============================================================

?>
