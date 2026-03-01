<?php ob_start() ?>

<?php

$UGroupName=$_GET['UGroupName'];
$GroupName=$_GET['GroupName'];

$source=$_GET['source'];//admin

include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$path='../img/agents/booking-authorization-email-form/';

if (!empty($GroupName)){ $sql22 = "SELECT * FROM booking_1 WHERE GroupName = '".$GroupName."'"; }

if (!empty($UGroupName)) { $sql22 = "SELECT * FROM booking_1 WHERE UGroupName = '".$UGroupName."'"; }


$result22 = mysqli_query($conn, $sql22);
if (mysqli_num_rows($result22) > 0) {
	
	while($row22 = mysqli_fetch_assoc($result22)) {	
	
//===================================================================================	
	
	$BookID=$row22['BookID'];
	unlink($path.$row22['GovernmentID']);
	unlink($path.$row22['CCBack']);
	unlink($path.$row22['CCFront']);
	unlink($path.$row22['ServicePDF']);
	unlink($path.$row22['TripDetailsPDF']);
	unlink($path.$row22['TermsAndConditionsPDF']);
	unlink($path.$row22['CancellationPolicyPDF']);
	unlink($path.$row22['InsurancePDF']);
	unlink($path.$row22['AdditionalPDF1']);
	unlink($path.$row22['AdditionalPDF2']);
	unlink($path.$row22['AdditionalPDF3']);
	unlink($path.$row22['PrimePassport']);
	unlink($path.$row22['AddPassport1']);
	unlink($path.$row22['AddPassport2']);
	unlink($path.$row22['AddPassport3']);
	unlink($path.$row22['AddPassport4']);
	unlink($path.$row22['AddPassport5']);
	unlink($path.$row22['AddPassport6']);
	unlink($path.$row22['AddPassport7']);
	unlink($path.$row22['AddPassport8']);

//===================================================================================

	$sql = "DELETE FROM booking_1 WHERE BookID=$BookID";
	
	if (mysqli_query($conn, $sql)) {
	  echo "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . mysqli_error($conn);
	}
	
	
	$sql2 = "DELETE FROM booking_2 WHERE BookID2=$BookID";
	
	if (mysqli_query($conn, $sql2)) {
	  echo "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . mysqli_error($conn);
	}

//====================================================================================

	}
}


if ($source=='admin')
header('Location: https://www.epikescapes.com/admin/booking-authorization-email-form.php');
else
header('Location: manage-email-forms.php?results=2#email-forms-list');


?>

<?php ob_flush() ?>