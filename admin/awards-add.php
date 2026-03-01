<?php ob_start(); ?>
<?php

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 
						

//=================add a new record=============================================
//Generate a new unique id =====================================================
$string=md5(time().rand(1000000,999999));
$AwardsUniqID=substr($string, 0, 8); 		

$sql = "INSERT INTO ch_awards (AwardsID, AwardsUniqID, active) VALUES ('', '$AwardsUniqID', '0')";
if (mysqli_query($conn, $sql)) {
	header('Location: awards.php?results=success');
} else {
echo "Error opening a new record: " . mysqli_error($conn);
	header('Location: awards.php?results=error');
}

?>


<?php include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php'); ?>
<? ob_flush(); ?>