<?php ob_start();
if (empty($flip))
header('Location: http://www.google.com/');


include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========

$sqlinfo2 = "SELECT * FROM blacklist WHERE blip='$flip'";
$result2 = mysqli_query($conn, $sqlinfo2);
$flcount2=mysqli_num_rows($result2);// number of messages in the last 24 hrs 

if ($flcount2 > 0)
{
	//header('Location: http://www.google.com/');
}

mysqli_close($conn);


ob_flush();
?>