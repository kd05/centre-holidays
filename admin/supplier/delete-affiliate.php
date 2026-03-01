<?php
ob_start();
if (!isset($_COOKIE['admin']))
header('Location: index.php');


		if (!empty($_GET['afid']))
		{
		$afid=trim($_GET['afid']);
		
		include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========


		$sql2 = "Delete from affiliates WHERE afid=$afid LIMIT 1";
		
		if (mysqli_query($conn, $sql2)) {
    		echo "<h4>Success</h4>";
			header('Location: ../suppliers.php?results=success');
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			header('Location: ../suppliers.php?results=error');
		}

	
	mysqli_close($conn);
		}
ob_flush();
?>