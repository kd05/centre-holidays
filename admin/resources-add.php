<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 
						

$inchTime=time();

/*
$sql = "INSERT INTO resource (inchID, inchFilter, inchImage, inchTitle, inchDescription, inchContent, inchVideoUrl, inchTags, inchInternalNotes, inchActive, inchTime)
VALUES ('', '', '', '', '', '', '', '', '', '0', '$inchTime')";
*/

$sql = "INSERT INTO resource (inchID, inchFilter,  inchTitle, inchDescription,  inchTags, inchInternalNotes, inchActive, inchTime) 
VALUES ('', '',  '', '',  '', '', '0', '$inchTime')";

if (mysqli_query($conn, $sql)) {
	header('Location: resources-edit.php?results=success&inchTime='.$inchTime);
?>
<h4>Success, a new notification recored opened, to complete the details</h4>
<a href="inch-edit.php?results=success&inchTime=<?php echo $inchTime ?>" class="btn btn-lg btn-primary" title="Edit Details">Click Here</a>
<?php
} else {
echo "Error opening a new record: " . mysqli_error($conn);
	header('Location: resources-edit.php?results=error');
}

include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');

?>

<? ob_flush(); ?>