<?php
ob_start();
if (!isset($_COOKIE['admin']))
header('Location: index.php');

$affiliatetime=$_GET['affiliatetime'];
		
		if (!empty($_GET['modalid']))
		{
		$modalid=trim($_GET['modalid']);
		
		include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========


		$sql2 = "Delete from affiliatemodals WHERE modalid=$modalid LIMIT 1";
		
		if (mysqli_query($conn, $sql2)) {
    		echo "<h4>Success</h4>";
			header('Location: ../suppliers-edit.php?results=success&affiliatetime='.$affiliatetime);
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			header('Location: ../suppliers-edit.php?results=error$affiliatetime='.$affiliatetime);
		}

	
	mysqli_close($conn);
		}
ob_flush();
?>