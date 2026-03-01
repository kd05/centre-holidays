<?php
ob_start();
if (!isset($_COOKIE['admin']))
header('Location: index.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========

	
	//=====================in case admin make updates the below code will exicute==========
	if (isset($_GET['afid']))
	{	
		echo $tunique_id=time();
		
		echo $affiliatename=sanitize_sql_string($_GET['affiliatename']);
		
		echo $afid=trim($_GET['afid']);
		
		echo $affiliatedescreption=sanitize_sql_string($_GET['affiliatedescreption']);
		
		echo $affiliatesqimage=$_GET['affiliatesqimage'];
		
		echo $afhimage=$_GET['afhimage'];		
		
		echo $preferred=$_GET['preferred'];
		
		echo $affiliattags=sanitize_sql_string($_GET['affiliattags']);				
		
		echo $affiliatdetails=$_GET['affiliatdetails'];
		$affiliatdetails=sanitize_sql_string($affiliatdetails);
		
		if ($_GET['page']==0)
		$goto='suppliers.php';
		elseif ($_GET['page']==1)
		$goto='suppliers-edit.php';
						
		$sql2 = "UPDATE affiliates SET 
		affiliateactive='1'						 										
		WHERE afid=$afid";
		
		if (mysqli_query($conn, $sql2)) {
    		echo "<h4>Success</h4>";
			header('Location: ../'.$goto.'?affiliatetime='.$_GET['affiliatetime'].'&results=success');
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			header('Location: ../'.$goto.'?affiliatetime='.$_GET['affiliatetime'].'&results=error');
		}
	}

	
include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');

ob_flush();
?>