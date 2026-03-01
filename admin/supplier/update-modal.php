<?php
ob_start();
if (!isset($_COOKIE['admin']))
header('Location: index.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========

	
	//=====================in case admin make updates the below code will exicute==========
	if (isset($_POST['modalid']))
	{	
		
		echo $modaletitle=sanitize_sql_string($_POST['modaletitle']);
		
		echo $modalid=trim($_POST['modalid']);
		
		echo $modaldescription=sanitize_sql_string($_POST['modaldescription']);
		
		echo $modalsize=$_POST['modalsize'];
		
		echo $modalidactive=$_POST['modalidactive'];		
		
		echo $preferred=$_POST['preferred'];				
		
		echo $modalheadercolour=$_POST['modalheadercolour'];
				
		echo $modalhtmlcontents=sanitize_sql_string($_POST['modalhtmlcontents']);
				
		$sql2 = "UPDATE affiliatemodals SET 
		modaletitle='$modaletitle',
		modaldescription='$modaldescription', 
		modalidactive='$modalidactive',
		modalsize='$modalsize', 
		modalheadercolour='$modalheadercolour',
		modalhtmlcontents='$modalhtmlcontents'							 										
		WHERE modalid=$modalid LIMIT 1";
		
		if (mysqli_query($conn, $sql2)) {
    		echo "<h4>Success</h4>";
			header('Location: ../suppliers-edit.php?affiliatetime='.$_POST['affiliatetime'].'&results=success');
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			header('Location: ../suppliers-edit.php?affiliatetime='.$_POST['affiliatetime'].'&results=error');
		}
	}

	
include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');

ob_flush();
?>