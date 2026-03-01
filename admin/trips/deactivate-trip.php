<?php
ob_start();
if (!isset($_COOKIE['admin']))
header('Location: index.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING=========== 

		if (!empty($_GET['tid']))
		{
			
		$tid=trim($_GET['tid']);
		echo $tunique_id=time();		
		
		$sql2 = "UPDATE trips SET  
		active='0'		 										 		
		WHERE tid=$tid LIMIT 1";
		
		if (mysqli_query($conn, $sql2)) {
    		echo "<h4>Success</h4>";
			header('Location: ../trips-edit.php?results=success');
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			header('Location: ../trips-edit.php?results=error');
		}
	
	
include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');
		}
ob_flush();
?>