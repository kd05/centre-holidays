<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 
						

$string=md5(time().rand(1000000,999999));
$PUniqID=substr($string, 0, 8); 

$sql = "INSERT INTO ch_partners (PID, PUniqID) VALUES ('', '$PUniqID')";
if (mysqli_query($conn, $sql)) {
	header('Location: unpaid-partners-editdetails.php?results=success&PUniqID='.$PUniqID);
?>
<h4>Success, a new Agent recored opened, to complete the details</h4>
<a href="unpaid-partners.php" class="btn btn-lg btn-primary" title="Edit Details">Click Here</a>
<?php
} else {
echo "Error opening a new record: " . mysqli_error($conn);
	header('Location: unpaid-partners-editdetails.php?results=error');
}

include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');

?>

<? ob_flush(); ?>