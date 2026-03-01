<?php ob_start(); ?>

<?php
$temp=time();
$ip=$_SERVER['REMOTE_ADDR'];

echo $adminsid=(trim($_POST['adminsid']));
$adminspassword=md5(trim($_POST['mypassword']).'Q1!W2@e3r4t5');

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');

$sql2 = "UPDATE admins SET adminspassword='".$adminspassword."', Temp='$temp', IP='$ip' WHERE adminsid='".$adminsid."' LIMIT 1";

if (mysqli_query($conn, $sql2)) {
	echo "success";
	header('Location: reset-admin-password.php?code=1');
} else {
	echo "Error updating record: " . mysqli_error($conn);
	header('Location: reset-admin-password.php?code=0');
}
?>

<? ob_flush(); ?>