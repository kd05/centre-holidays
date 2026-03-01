<?php ob_start(); ?>
<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 
						

$Title=sanitize_sql_string(trim($_GET['Title']));


//=================add a new record=============================================
//Generate a new unique id =====================================================
$string=md5(time().rand(1000000,999999));
$CIDUniqID=substr($string, 0, 8); 		

$sql = "INSERT INTO ch_certifications (CID, Title, active) VALUES ('', '$Title', '1')";
if (mysqli_query($conn, $sql)) {
	header('Location: certificates.php?results=success');
} else {
echo "Error opening a new record: " . mysqli_error($conn);
	header('Location: certificates.php?results=error');
}

?>


<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>