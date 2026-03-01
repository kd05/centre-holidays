<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 
						

$afid=$_GET['afid'];
$affiliatetime=$_GET['affiliatetime'];
$modaltime=time();

$sql = "INSERT INTO affiliatemodals (modalid, afid, modaltime) VALUES ('', '$afid', '$modaltime')";
if (mysqli_query($conn, $sql)) {
	header('Location: suppliers-edit.php?results=success&affiliatetime='.$affiliatetime);
?>
<h4>Success, a new affiliate recored opened, to complete the details</h4>
<a href="suppliers-edit.php?results=success&affiliatetime=<?php echo $affiliatetime ?>" class="btn btn-lg btn-primary" title="Edit Details">Click Here</a>
<?php
} else {
echo "Error opening a new record: " . mysqli_error($conn);
	header('Location: suppliers-edit.php?results=error');
}

include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');

?>

<? ob_flush(); ?>