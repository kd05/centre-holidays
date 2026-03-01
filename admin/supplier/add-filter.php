<?php
ob_start();
if (!isset($_COOKIE['admin']))
header('Location: index.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========

	
	//=====================in case admin make updates the below code will exicute==========
		
		echo $affilter=sanitize_sql_string($_POST['affilter']);
				
		$sql2 = "INSERT INTO affiliatefilter (affilterid, affilter, affilteractive) VALUES ('', '$affilter', '1')";						 										
		
		if (mysqli_query($conn, $sql2)) {
    		echo "<h4>Success</h4>";
			header('Location: ../suppliers-filter.php?results=success');
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			header('Location: ../suppliers-filter.php?results=error');
		}

	
include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');

ob_flush();
?>
