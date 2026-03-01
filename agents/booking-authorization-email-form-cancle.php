<?php ob_start(); ?>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$BookID=$_GET['BookID'];

$sql2 = "UPDATE booking_1 SET FormCancelled='Yes' WHERE BookID='$BookID'";

if (mysqli_query($conn, $sql2)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

header('Location: manage-email-forms2.php?results=1#email-forms-list');


?>

<?php ob_flush() ?>