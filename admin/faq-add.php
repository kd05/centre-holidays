<?php ob_start(); ?>
<?php
//----------------------------Connect to database-------------------------
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========
						

$faqTime=time();

$sql = "INSERT INTO faq (faqID, faqFilter, faqTitle, faqDescription, faqContent, faqVideoUrl, faqTags, faqInternalNotes, faqActive, faqTime) 
VALUES ('', '', '', '', '', '', '', '', '0', '$faqTime')";
if (mysqli_query($conn, $sql)) {
	header('Location: faq-edit.php?results=success&faqTime='.$faqTime);
?>
<h4>Success, a new notification recored opened, to complete the details</h4>
<a href="faq-edit.php?results=success&faqTime=<?php echo $faqTime ?>" class="btn btn-lg btn-primary" title="Edit Details">Click Here</a>
<?php
} else {
echo "Error opening a new record: " . mysqli_error($conn);
	header('Location: faq-edit.php?results=error');
}

include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');

?>

<? ob_flush(); ?>