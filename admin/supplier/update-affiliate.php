<?php
ob_start();
if (!isset($_COOKIE['admin']))
header('Location: index.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========

	
	//=====================in case admin make updates the below code will exicute==========
	if (isset($_POST['afid']))
	{	
		echo $tuniquetime=time();
		
		echo $affiliatename=sanitize_sql_string($_POST['affiliatename']);
		
		echo $afid=trim($_POST['afid']);
		
		echo $affiliatedescreption=sanitize_sql_string($_POST['affiliatedescreption']);
		
		echo $affiliatesqimage=$_POST['affiliatesqimage'];
		
		echo $afhimage=$_POST['afhimage'];
		
		echo $cafhimage=$_POST['cafhimage'];		
		
		echo $preferred=$_POST['preferred'];
		
		echo $affiliattags=sanitize_sql_string($_POST['affiliattags']);				
		
		echo $affiliatdetails=$_POST['affiliatdetails'];
		$affiliatdetails=sanitize_sql_string($affiliatdetails);
		
		echo $affnotes=$_POST['affnotes'];
		$affnotes=sanitize_sql_string($affnotes);		
		
		echo $affilter=$_POST['affilter'];	
		foreach($affilter as $item344) {	
		$affilter244=$item344.', '.$affilter244;
		}
		
		$sql2 = "UPDATE affiliates SET 
		affiliatename='$affiliatename',
		affiliatedescreption='$affiliatedescreption', 
		afhimage='$afhimage',
		cafhimage='$cafhimage',
		affiliatesqimage='$affiliatesqimage', 
		preferred='$preferred', 
		affiliatdetails='$affiliatdetails',
		affiliateactive='0',
		affiliattags='$affiliattags',
		affilter='$affilter244',
		affiliatetime='$tuniquetime',
		affilter='$affilter244',
		affnotes='$affnotes'				 										
		WHERE afid=$afid LIMIT 1";
		
		if (mysqli_query($conn, $sql2)) {
    		echo "<h4>Success</h4>";
			header('Location: ../suppliers-edit.php?affiliatetime='.$tuniquetime.'&results=success');
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			header('Location: ../suppliers-edit.php?affiliatetime='.$tuniquetime.'&results=error');
		}
	}

	
include_once($_SERVER['DOCUMENT_ROOT'].'/library/closebi.php');

ob_flush();
?>